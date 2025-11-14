<?php

namespace domain\Dashboard\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\UserCreatedMail;
use App\Models\User;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\DNSCheckValidation;
use Egulias\EmailValidator\Validation\RFCValidation;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class UserController extends Controller
{

    public function index():View
    {
        $users = User::where('role', 'user')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create():View
    {
        return view('admin.users.create');
    }

    public function store(Request $request):RedirectResponse
    {

        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email|regex:/^[^@]+@[^@]+\.[^@]+$/',
        ]);

        $validator = new EmailValidator();

        // DNS (domain must exist)
        if (! $validator->isValid($data['email'], new DNSCheckValidation())) {
            return back()->withErrors(['email' => 'This email domain is not valid!'])->withInput();
        }

        // (Optional) RFC syntax check
        if (! $validator->isValid($data['email'], new RFCValidation())) {
            return back()->withErrors(['email' => 'This email address format is invalid!'])->withInput();
        }

        $plainPassword = Str::random(12);
        $data['password'] = bcrypt($plainPassword);

        $data['role'] = 'user';
        $data['added_by'] = auth()->id();
        $data['modified_by'] = auth()->id();

        $user = User::create($data);

        try {
            Mail::to($user->email)->send(new UserCreatedMail([
                'name'     => $user->name,
                'email'    => $user->email,
                'password' => $plainPassword,
            ]));
        } catch (\Exception $e) {
            \Log::error('Mail send failed: ' . $e->getMessage());
            // optional: flash warning
            return redirect()->route('admin.users.index')->with('warning', 'User created, but email could not be sent.');
        }


        return redirect()->route('admin.users.index')->with('success','User created!');
    }

    public function show(User $user):View
    {
        return view('admin.users.create', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user):RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'is_active' => 'nullable|boolean',
        ]);


        $data['modified_by'] = auth()->id();
        $data['updated_at'] = now();

        $user->update($data);


        return redirect()->route('admin.users.index')->with('success','User updated!');
    }

    public function destroy(User $user): RedirectResponse
    {
        try {
            $user->delete();

            return redirect()->route('admin.users.index')
                ->with('success', 'User deleted successfully.');
        } catch (QueryException $e) {
            // SQLSTATE[23000] = Integrity constraint violation
            if ($e->getCode() === '23000') {
                return redirect()->route('admin.users.index')
                    ->with('error', "You can't delete this user. This user is already assigned.");
            }

            // for other DB errors
            throw $e;
        }
    }

    public function passwordUpdate(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|string|min:8',
        ]);
        $plainPassword = $request->password;

        $user->update([
            'password' => bcrypt($request->password),
            'modified_by' => auth()->id(),
            'updated_at' => now(),

        ]);

        try {
            Mail::to($user->email)->send(new UserCreatedMail([
                'name'     => $user->name,
                'email'    => $user->email,
                'password' => $plainPassword,
            ]));


        } catch (\Exception $e) {
            \Log::error('Mail send failed: ' . $e->getMessage());
            // optional: flash warning
            return redirect()->route('admin.users.index')->with('warning', 'Password updated, but email could not be sent.');
        }

        return redirect()->route('admin.users.index')->with('success', 'Password updated successfully!');
    }


}
