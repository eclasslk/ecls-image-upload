<?php

namespace domain\Paper\Controllers;

use App\Http\Controllers\Controller;
use domain\Grade\Models\Grade;
use domain\Level\Models\Level;
use domain\Medium\Models\Medium;
use domain\Paper\Models\Paper;
use domain\Province\Models\Province;
use domain\School\Models\School;
use domain\Subject\Models\Subject;
use domain\Suffix\Models\Suffix;
use domain\Suffix\Models\SuffixType;
use domain\Syllabus\Models\Syllabus;
use domain\Term\Models\Term;
use domain\Type\Models\Type;
use domain\Year\Models\Year;
use domain\Zone\Models\Zone;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PaperController extends Controller
{
    public function index(): View
    {
        $papers = Paper::all();
        $types = Type::all();
        $provinces = Province::all();
        $zones = Zone::all();
        $schools = School::all();
        $subjects = Subject::all();
        $mediums = Medium::all();
        $suffixes = SuffixType::all();
        $years = Year::all();
        $grades = Grade::all();
        $terms = Term::all();
        $syllabuses = Syllabus::all();

        return view(
            'papers.index',
            compact(
                'papers',
                'types',
                'provinces',
                'zones',
                'schools',
                'subjects',
                'mediums',
                'suffixes',
                'years',
                'terms',
                'grades',
                'syllabuses'
            )
        );
    }

    public function create(): View
    {
        return view('papers.create', [
            'types' => Type::all(),
            'provinces' => Province::all(),
            'zones' => Zone::all(),
            'schools' => School::all(),
            'levels' => Level::all(),
            'subjects' => Subject::all(),
            'mediums' => Medium::all(),
            'suffixTypes' => SuffixType::all(),
            'years' => Year::orderBy('year', 'desc')->get(),
            'grades' => Grade::all(),
            'terms' => Term::all(),
            'syllabuses' => Syllabus::all(),

        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'year_id' => 'required|integer',
            'grade_id' => 'sometimes|required|integer',
            'term_id' => 'sometimes|required|integer',
            'syllabus_id' => 'sometimes|required|integer',
            'question_count' => 'required|integer',
            'type_id' => 'required|integer',
            'province_id' => 'sometimes|required|integer',
            'zone_id' => 'sometimes|required|integer',
            'school_id' => 'sometimes|required|integer',
            'level_id' => 'required|integer',
            'medium_id' => 'required|integer',
            'subject_id' => 'required|integer',
            'suffix_ids' => 'nullable|array',
            'suffix_ids.*' => 'exists:suffixes,id',
            'file_path' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240', // 10MB max
        ], [
//            'suffix_ids.required' => 'The suffix field is required.',
            'suffix_ids.array' => 'The suffix field must be a valid array.',
            'suffix_ids.*.exists' => 'One or more selected suffixes are invalid.',
            'file_path.required' => 'The file upload is required.',

        ]);


        $data['updated_by'] = auth()->id();
        $paper = Paper::create($data);
        $paper->suffixes()->sync($request->suffix_ids ?? []);
        $fileName = $request->name;

        $fileName .= '.' . $request->file('file_path')->getClientOriginalExtension();

        $path = $request->file('file_path')->storeAs('papers', $fileName, 'public');

        $paper->update(['file_path' => $path]);

        return redirect()->route('papers.index')->with('success', 'Paper created!');
    }


    public function show(Paper $paper): View
    {
        if ($paper->file_path && Storage::disk('public')->exists($paper->file_path)) {
            $filePath = Storage::url($paper->file_path); // generates URL like /storage/papers/filename.pdf
        } else {
            $filePath = null;
        }

        return view('papers.create', [
            'paper' => $paper,
            'types' => Type::all(),
            'provinces' => Province::all(),
            'zones' => Zone::all(),
            'schools' => School::all(),
            'levels' => Level::all(),
            'subjects' => Subject::all(),
            'mediums' => Medium::all(),
            'suffixTypes' => SuffixType::all(),
            'filePath' => $filePath,
            'years' => Year::orderBy('year', 'desc')->get(),
            'grades' => Grade::all(),
            'terms' => Term::all(),
            'syllabuses' => Syllabus::all(),
        ]);
    }

    public function update(Request $request, Paper $paper): RedirectResponse
    {

        $data = $request->validate([
            'name' => 'required|string',
            'year_id' => 'integer|string',
            'grade_id' => 'sometimes|required|integer',
            'term_id' => 'sometimes|required|integer',
            'syllabus_id' => 'sometimes|required|integer',
            'question_count' => 'required|integer',
            'type_id' => 'required|integer',
            'province_id' => 'sometimes|required|integer',
            'zone_id' => 'sometimes|required|integer',
            'school_id' => 'sometimes|required|integer',
            'level_id' => 'required|integer',
            'medium_id' => 'required|integer',
            'subject_id' => 'required|integer',
            'suffix_ids' => 'nullable|array',
            'suffix_ids.*' => 'exists:suffixes,id',
        ],[
//            'suffix_ids.required' => 'The suffix field is required.',
            'suffix_ids.array' => 'The suffix field must be a valid array.',
            'suffix_ids.*.exists' => 'One or more selected suffixes are invalid.',
        ]);

        $data['updated_by'] = auth()->id();

        $nullableFields = [
            'grade_id', 'term_id', 'syllabus_id',
             'type_id', 'province_id', 'zone_id',
            'school_id'
        ];

        foreach ($nullableFields as $field) {
            if (!$request->has($field)) {
                $data[$field] = null;
            }
        }


        if ($request->hasFile('file_path')) {

            if ($paper->file_path && \Storage::disk('public')->exists($paper->file_path)) {
                \Storage::disk('public')->delete($paper->file_path);
            }

            $fileName = $request->name . '.' . $request->file('file_path')->getClientOriginalExtension();
            $path = $request->file('file_path')->storeAs('papers', $fileName, 'public');

            $paper->update(['file_path' => $path]);

        } else {
            if ($paper->file_path) {
                $oldPath = $paper->file_path;

                $extension = pathinfo($oldPath, PATHINFO_EXTENSION);

                $newPath = 'papers/' . $request->name . '.' . $extension;

                if ($oldPath !== $newPath && \Storage::disk('public')->exists($oldPath)) {

                    \Storage::disk('public')->move($oldPath, $newPath);

                    $paper->update(['file_path' => $newPath]);
                }
            }
        }


        $paper->update($data);
        $paper->suffixes()->sync($request->suffix_ids ?? []);

        return redirect()->route('papers.index')->with('success', 'Paper update!');
    }



    public function destroy(Paper $paper): RedirectResponse
    {
        // Delete file if it exists
        if ($paper->file_path && Storage::disk('public')->exists($paper->file_path)) {
            Storage::disk('public')->delete($paper->file_path);
        }

        // Delete record from DB
        $paper->delete();

        return redirect()->route('papers.index')
            ->with('success', 'Paper deleted successfully.');
    }

    public function checkName(Request $request)
    {
        $name = $this->normalizeName($request->name);
        $paperId = $request->paper_id;

        $duplicatePaper = Paper::get()->filter(function ($paper) use ($name, $paperId) {
            if ($paperId && $paper->id == $paperId) return false;

            return $this->normalizeName($paper->name) === $name;
        })->first();

        if ($duplicatePaper) {
            return response()->json([
                'exists' => true,
                'file_path' => $duplicatePaper->file_path,
                'id' => $duplicatePaper->id
            ]);
        }

        return response()->json(['exists' => false]);
    }

    /**
     * Remove ending markers like _inco / _ocrf / _unid / etc.
     */
    private function normalizeName($name)
    {
        // Convert to array by splitting _
        $parts = preg_split('/[_ ]+/', trim($name));

        // Unwanted endings
        $removeList = ['inco', 'ocrf', 'unid'];

        // Remove trailing unwanted tokens
        while (!empty($parts) && in_array(strtolower(end($parts)), $removeList)) {
            array_pop($parts);
        }

        // Join back using underscore (or space if you prefer)
        return trim(implode('_', $parts));
    }



}
