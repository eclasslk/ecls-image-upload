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
            'years' => Year::all(),
            'grades' => Grade::all(),
            'terms' => Term::all(),
            'syllabuses' => Syllabus::all(),

        ]);
    }

    public function store(Request $request): RedirectResponse
    {
//        dd($request);
        $data = $request->validate([
            'name' => 'required|string',
            'year_id' => 'required|integer',
            'grade_id' => 'nullable|integer',
            'term_id' => 'nullable|integer',
            'syllabus_id' => 'required|integer',
            'question_count' => 'required|integer',
            'type_id' => 'required|integer',
            'province_id' => 'nullable|integer',
            'zone_id' => 'nullable|integer',
            'school_id' => 'nullable|integer',
            'level_id' => 'required|integer',
            'medium_id' => 'required|integer',
            'subject_id' => 'required|integer',
            'suffix_ids' => 'required|array',
            'suffix_ids.*' => 'exists:suffixes,id',
            'file_path' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240', // 10MB max
        ], [
            'suffix_ids.required' => 'The suffix field is required.',
            'suffix_ids.array' => 'The suffix field must be a valid array.',
            'suffix_ids.*.exists' => 'One or more selected suffixes are invalid.',
            'file_path.required' => 'The file upload is required.',

        ]);


        $data['updated_by'] = auth()->id();
        $paper = Paper::create($data);
        $paper->suffixes()->sync($request->suffix_ids ?? []);

        $typeName = $paper->type->name ?? '';
        $provinceName = $paper->province->name ?? '';
        $zoneName = $paper->zone->name ?? '';
        $levelName = $paper->level->name ?? '';
        $subjectName = $paper->subject->name ?? '';
        $mediumName = $paper->medium->name ?? '';
        $year = $paper->year->year;
        $grade = $paper->grade->grade;
        $term = $paper->term->name;

        // get suffix names (multiple, comma-separated)
        $suffixNames = $paper->suffixes->pluck('name')->implode(',');

        // sanitize file name (no spaces, special chars)
        $fileName = preg_replace(
            '/[^A-Za-z0-9_\-,]+/',
            '_',
            "{$typeName} {$provinceName} {$zoneName} {$levelName} {$subjectName} {$mediumName} {$year} {$grade} {$term} {$suffixNames}"
        );

        $fileName .= '.' . $request->file('file_path')->getClientOriginalExtension();

        // 4️⃣ Store file in storage/app/public/papers
        $path = $request->file('file_path')->storeAs('papers', $fileName, 'public');

        // 5️⃣ Save file path to Paper
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
            'years' => Year::all(),
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
            'grade_id' => 'nullable|string',
            'term_id' => 'nullable|string',
            'syllabus_id' => 'integer|string',
            'question_count' => 'required|integer',
            'type_id' => 'required|integer',
            'province_id' => 'nullable|integer',
            'zone_id' => 'nullable|integer',
            'school_id' => 'nullable|integer',
            'level_id' => 'required|integer',
            'medium_id' => 'required|integer',
            'subject_id' => 'required|integer',
            'suffix_ids' => 'required|array',
            'suffix_ids.*' => 'exists:suffixes,id',
//            'file_path' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240', // 10MB max
        ], [
            'suffix_ids.required' => 'The suffix field is required.',
            'suffix_ids.array' => 'The suffix field must be a valid array.',
            'suffix_ids.*.exists' => 'One or more selected suffixes are invalid.',
//            'file_path.required' => 'The file upload is required.',

        ]);

        $data['updated_by'] = auth()->id();

        if ($request->hasFile('file_path')) {
            // Remove old file (optional cleanup)
            if ($paper->file_path && \Storage::disk('public')->exists($paper->file_path)) {
                \Storage::disk('public')->delete($paper->file_path);
            }

            // Build new file name just like in store()
            $typeName = $paper->type->name ?? '';
            $provinceName = $paper->province->name ?? '';
            $zoneName = $paper->zone->name ?? '';
            $levelName = $paper->level->name ?? '';
            $subjectName = $paper->subject->name ?? '';
            $mediumName = $paper->medium->name ?? '';
            $year = $paper->year->year;
            $grade = $paper->grade->grade;
            $term = $paper->term->name;

            // get suffix names (multiple, comma-separated)
            $suffixNames = collect($request->suffix_ids)
                ->map(fn($id) => Suffix::find($id)?->name)
                ->filter()
                ->implode(',');

            $fileName = preg_replace(
                '/[^A-Za-z0-9_\-,]+/',
                '_',
                "{$typeName} {$provinceName} {$zoneName} {$levelName} {$subjectName} {$mediumName} {$year} {$grade} {$term} {$suffixNames}"
            );

            $fileName .= '.' . $request->file('file_path')->getClientOriginalExtension();

            // Save new file
            $path = $request->file('file_path')->storeAs('papers', $fileName, 'public');

            $data['file_path'] = $path; // include in update
        }

        // ✅ Update paper and suffixes
        $paper->update($data);
        $paper->suffixes()->sync($request->suffix_ids ?? []);

        return redirect()->route('papers.index')->with('success', 'Paper update!');
    }



    public function destroy(Paper $paper): RedirectResponse
    {
        $paper->delete();

        return redirect()->route('papers.index')
            ->with('success', 'Paper deleted successfully.');
    }
}
