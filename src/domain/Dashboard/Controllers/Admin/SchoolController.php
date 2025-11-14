<?php

namespace domain\Dashboard\Controllers\Admin;

use App\Http\Controllers\Controller;
use domain\Province\Models\Province;
use domain\School\Models\School;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class SchoolController extends Controller
{
    public function index():View
    {
        $schools = School::get();
        return view('admin.schools.index', compact('schools'));
    }

    public function create():View
    {
        $provinces = Province::get();
        return view('admin.schools.create', compact('provinces'));
    }

    public function store(Request $request):RedirectResponse
    {

        $data = $request->validate([
            'name' => [
                'required',
                'string',
                Rule::unique('schools')->where(function ($query) use ($request) {
                    return $query->where('province_id', $request->province_id);
                }),
            ],
            'province_id' => 'required|exists:provinces,id',
        ], [
            'name.unique' => 'This school already exists in the selected province.',
        ]);

        $data['updated_by'] = auth()->id();

        School::create($data);

        return redirect()->route('admin.schools.index')->with('success','School created!');
    }

    public function show(School $school):View
    {
        return view('admin.schools.create', [
            'school' => $school,
            'provinces' => Province::get()
        ]);
    }

    public function update(Request $request, School $school):RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'province_id' => 'required|exists:provinces,id',
        ]);

        $data['updated_by'] = auth()->id();
        $data['updated_at'] = now();

        $school->update($data);


        return redirect()->route('admin.schools.index')->with('success','School updated!');
    }


    public function destroy(School $school): RedirectResponse
    {
        try {
            $school->delete();

            return redirect()->route('admin.schools.index')
                ->with('success', 'School deleted successfully.');
        } catch (QueryException $e) {
            // SQLSTATE[23000] = Integrity constraint violation
            if ($e->getCode() === '23000') {
                return redirect()->route('admin.schools.index')
                    ->with('error', "You can't delete this school. This school is already assigned.");
            }

            // for other DB errors
            throw $e;
        }
    }
}
