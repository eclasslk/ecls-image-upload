@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h4 class="mb-0 fw-bold text-secondary">
                    {{ isset($paper) ? 'Edit Paper' : 'Add Paper' }}
                </h4>
                <a href="{{ route('papers.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
            </div>

            <div class="card-body">
                <form action="{{ isset($paper) ? route('papers.update', $paper->id) : route('papers.store') }}"
                      method="POST" enctype="multipart/form-data">

                    @csrf
                    @if(isset($paper))
                        @method('PUT')
                    @endif

                    <div class="container-fluid py-3">

                        <!-- Row 1: Type -->
                        <div class="row mb-3 border-bottom pb-2">
                            <div class="col-md-2">
                                <label class="form-label fw-bold text-secondary mb-0">TYPE</label>
                            </div>
                            <div class="col-md-3">
                                <select name="type_id" class="form-select">
                                    <option value="">-- Select Type --</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}"
                                            {{ old('type_id',$paper->type_id ?? '') == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Row 2: Source -->
                        <div class="row mb-3 border-bottom pb-2">
                            <div class="col-md-2">
                                <label class="form-label fw-bold text-secondary mb-0">SOURCE</label>
                            </div>
                            <div class="col-md-3">
                                <select name="province_id" class="form-select">
                                    <option value="">-- Province --</option>
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->id }}" data-code="{{ $province->code }}"
                                            {{ old('province_id',$paper->province_id ?? '') == $province->id ? 'selected' : '' }}>
                                            {{ $province->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('province_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <select name="zone_id" class="form-select">
                                    <option value="">-- Zone --</option>
                                    @foreach($zones as $zone)
                                        <option value="{{ $zone->id }}"
                                            {{ old('zone_id',$paper->zone_id ?? '') == $zone->id ? 'selected' : '' }}>
                                            {{ $zone->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('zone_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <select name="school_id" class="form-select">
                                    <option value="">-- School --</option>
                                    @foreach($schools as $school)
                                        <option value="{{ $school->id }}"
                                            {{ old('school_id',$paper->school_id ?? '') == $school->id ? 'selected' : '' }}>
                                            {{ $school->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('school_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Row 3: Subject -->
                        <div class="row mb-3 border-bottom pb-2">
                            <div class="col-md-2">
                                <label class="form-label fw-bold text-secondary mb-0">SUBJECT</label>
                            </div>
                            <div class="col-md-3">
                                <select name="level_id" class="form-select">
                                    <option value="">-- Level --</option>
                                    @foreach($levels as $level)
                                        <option value="{{ $level->id }}" data-code="{{ $level->code }}"
                                            {{ old('level_id',$paper->level_id ?? '') == $level->id ? 'selected' : '' }}>
                                            {{ $level->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('level_id')
                                <small class="text-danger d-block mt-1">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <select name="subject_id" class="form-select">
                                    <option value="">-- Subject --</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}"
                                            {{ old('subject_id',$paper->subject_id ?? '') == $subject->id ? 'selected' : '' }}>
                                            {{ $subject->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('subject_id')
                                <small class="text-danger d-block mt-1">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <select name="medium_id" class="form-select">
                                    <option value="">-- Medium --</option>
                                    @foreach($mediums as $medium)
                                        <option value="{{ $medium->id }}" data-code="{{ $medium->code }}"
                                            {{ old('medium_id',$paper->medium_id ?? '') == $medium->id ? 'selected' : '' }}>
                                            {{ $medium->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('medium_id')
                                <small class="text-danger d-block mt-1">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Row 4: Paper -->
                        <div class="row mb-3 border-bottom pb-2">
                            <div class="col-md-2">
                                <label class="form-label fw-bold text-secondary mb-0">PAPER</label>
                            </div>
                            <div class="col-md-3">
                                <select name="year_id" class="form-select">
                                    <option value="">-- Year --</option>
                                    @foreach($years as $year)
                                        <option value="{{ $year->id }}"
                                            {{ old('year_id',$paper->year_id ?? '') == $year->id ? 'selected' : '' }}>
                                            {{ $year->year }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('year_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <select name="grade_id" class="form-select">
                                    <option value="">-- Grade --</option>
                                    @foreach($grades as $grade)
                                        <option value="{{ $grade->id }}"
                                            {{ old('grade_id',$paper->grade_id ?? '') == $grade->id ? 'selected' : '' }}>
                                            {{ $grade->grade }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('grade_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md" style="flex: 0 0 12.5%; max-width: 12.5%;">
                                <select name="term_id" class="form-select">
                                    <option value="">-- Term/Pilot --</option>
                                    @foreach($terms as $term)
                                        <option value="{{ $term->id }}" data-code="{{ $term->code }}"
                                            {{ old('term_id',$paper->term_id ?? '') == $term->id ? 'selected' : '' }}>
                                            {{ $term->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('term_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md" style="flex: 0 0 12.5%; max-width: 12.5%;">
                                <select name="syllabus_id" class="form-select">
                                    <option value="">-- Syllabus --</option>
                                    @foreach($syllabuses as $syllabus)
                                        <option value="{{ $syllabus->id }}" data-code="{{ $syllabus->code }}"
                                            {{ old('syllabus_id',$paper->syllabus_id ?? '') == $syllabus->id ? 'selected' : '' }}>
                                            {{ $syllabus->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('syllabus_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Row 5: Suffix + Question -->
                        <div class="row mb-3 border-bottom pb-2">
                            <div class="col-md-2">
                                <label class="form-label fw-bold text-secondary mb-0">SUFFIX</label>
                            </div>
                            <div class="col-md-3">
                                <select name="suffix_ids[]" class="form-select select2" multiple="multiple" style="width:100%;">
                                    @foreach($suffixTypes as $suffixType)
                                        <option value="{{ $suffixType->id }}"
                                            {{ isset($paper) && $paper->suffixes->contains($suffixType->id) ? 'selected' : '' }}>
                                            {{ $suffixType->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('suffix_ids')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold text-secondary mb-0">NO OF QUESTIONS</label>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="number"
                                           name="question_count"
                                           id="question_count_input"
                                           class="form-control"
                                           value="{{ old('question_count', $paper->question_count ?? 50) }}"
                                           min="1"
                                           max="60"
                                           step="1"
                                           inputmode="numeric">

                                    <select class="form-select" id="question_count_select">
                                        <option value="">Q</option>
                                        <option value="25" {{ (old('question_count', $paper->question_count ?? 50) == 25) ? 'selected' : '' }}>25</option>
                                        <option value="50" {{ (old('question_count', $paper->question_count ?? 50) == 50) ? 'selected' : '' }}>50</option>
                                        <option value="60" {{ (old('question_count', $paper->question_count ?? 50) == 60) ? 'selected' : '' }}>60</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <!-- Row 6: Name + File Upload -->
                        <div class="row mb-4 align-items-end">
{{--                            <div class="col-md-2">--}}
{{--                                <label class="form-label fw-bold text-secondary mb-0">NAME</label>--}}
{{--                            </div>--}}
                            <div class="col-md-5 position-relative">

                                <input type="text" name="name" id="generated_name"
                                       class="form-control"
                                       value="{{ old('name', $paper->name ?? '') }}"
                                       readonly
                                       style="background-color: #f0f0f0 !important; color: #333333 !important;">


                                <!-- NEW simple duplicate message -->
                                <small class="text-danger d-none" id="name-duplicate-warning">
                                    Duplicate name found! <a id="duplicate-file-link" href="#" class="text-decoration-underline" target="_blank">View</a>
                                </small>

                            </div>

                            <div class="col-md-6">
                                <input type="file" name="file_path" class="form-control" accept="application/pdf">
                                @error('file_path')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                @if(isset($paper) && $paper->file_path)
                                    <div class="mt-1">
                                        <a href="{{ asset('storage/' . $paper->file_path) }}" target="_blank"
                                           class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-eye"></i> View Current PDF
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-save"></i> {{ isset($paper) ? 'Update' : 'Save' }}
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(function () {
            $('.select2').select2({
                placeholder: "Select suffixTypes",
                allowClear: true
            });

            // Function to enable/disable dependent dropdowns
            function handleFieldConditions() {
                const selectedTypeText = $('select[name="type_id"] option:selected').text().trim();

                // Fields
                const $province = $('select[name="province_id"]');
                const $zone = $('select[name="zone_id"]');
                const $school = $('select[name="school_id"]');

                const $grade = $('select[name="grade_id"]');
                const $term = $('select[name="term_id"]');
                const $syllabus = $('select[name="syllabus_id"]');

                // Reset all first (enable + full opacity)
                $province.add($zone).add($school)
                    .add($grade).add($term).add($syllabus)
                    .prop("disabled", false)
                    .closest('.col-md-4, .col-md-3').css("opacity", 1);

                // ------------------------------------------------------
                // 1️⃣ NATIONAL
                // disable: province, zone, school, grade, term
                // ------------------------------------------------------
                if (selectedTypeText === "National") {

                    $province.add($zone).add($school)
                        .add($grade).add($term)
                        .prop("disabled", true)
                        .closest('.col-md-4, .col-md-3').css("opacity", 0.5);
                }

                    // ------------------------------------------------------
                    // 2️⃣ PROVINCIAL
                    // disable: zone, school, syllabus
                // ------------------------------------------------------
                else if (selectedTypeText === "Provincial") {

                    $zone.add($school).add($syllabus)
                        .prop("disabled", true)
                        .closest('.col-md-4, .col-md-3').css("opacity", 0.5);
                }

                    // ------------------------------------------------------
                    // 3️⃣ ZONAL
                    // disable: school, syllabus
                // ------------------------------------------------------
                else if (selectedTypeText === "Zonal") {

                    $school.add($syllabus)
                        .prop("disabled", true)
                        .closest('.col-md-4, .col-md-3').css("opacity", 0.5);
                }

                    // ------------------------------------------------------
                    // 4️⃣ SCHOOL
                    // disable: zone, syllabus
                // ------------------------------------------------------
                else if (selectedTypeText === "School") {

                    $zone.add($syllabus)
                        .prop("disabled", true)
                        .closest('.col-md-4, .col-md-3').css("opacity", 0.5);
                }

                generateName(); // refresh name after restrictions apply
            }


            // Function to auto-generate the name field
            function generateName() {
                function getEnabledSelectValue(name) {
                    const $sel = $(`select[name="${name}"]:enabled`);
                    const val = $sel.val();
                    if (!val) return "";   // ignore empty
                    return $sel.find("option:selected").text().trim();
                }

                function getEnabledSelectCode(name) {
                    const $sel = $(`select[name="${name}"]:enabled`);
                    const val = $sel.val();
                    if (!val) return "";
                    return $sel.find("option:selected").data("code")
                        || $sel.find("option:selected").text().trim();
                }

                // SIMPLE safe getters
                const type = getEnabledSelectValue("type_id");

                const province = getEnabledSelectValue("province_id");
                const provinceCode = getEnabledSelectCode("province_id");

                const zone = getEnabledSelectValue("zone_id");
                const school = getEnabledSelectValue("school_id");

                const levelCode = getEnabledSelectCode("level_id");
                const subject = getEnabledSelectValue("subject_id");
                const mediumCode = getEnabledSelectCode("medium_id");
                const year = getEnabledSelectValue("year_id");

                const grade = getEnabledSelectValue("grade_id");
                const termCode = getEnabledSelectCode("term_id");
                const syllabusCode = getEnabledSelectCode("syllabus_id");

                // Suffixes
                const suffixes = $('select[name="suffix_ids[]"]').val() || [];
                const suffixNames = suffixes.map(id =>
                    $(`select[name="suffix_ids[]"] option[value="${id}"]`).text().trim()
                ).join(' ');

                // --- BUILD THE NAME (only include selected fields) ---
                const parts = [];

                // Type
                if (type) parts.push(type);

                // Province → Zone → School group
                const group2 = [provinceCode, zone, school]
                    .filter(v => v && v !== "-- Province --" && v !== "-- Zone --" && v !== "-- School --")
                    .join(' ');
                if (group2) parts.push(group2);

                // Level + Subject + Medium
                const group3 = [levelCode, subject, mediumCode].filter(Boolean).join(' ');
                if (group3) parts.push(group3);

                // Year + Grade + Term + Syllabus
                const group4 = [year, grade, termCode, syllabusCode].filter(Boolean).join(' ');
                if (group4) parts.push(group4);

                // Suffix
                if (suffixNames) parts.push(suffixNames);

                // Final string
                const generated = parts.join('_').replace(/\s+/g, ' ').trim();

                $('#generated_name').val(generated);

                checkDuplicateName(generated);
            }


            // Add listeners for all relevant dropdowns
            $('select').on('change', function() {
                handleFieldConditions();
                generateName();
            });

            // Initial load (for edit mode)
            handleFieldConditions();
            generateName();
        });

        const allSchools = @json($schools);


        $('select[name="province_id"]').on('change', function () {

            let selectedProvince = $(this).val();
            let schoolSelect = $('select[name="school_id"]');

            schoolSelect.empty().append('<option value="">-- School --</option>');

            if (!selectedProvince) return;

            let filteredSchools = allSchools.filter(s => s.province_id == selectedProvince);

            filteredSchools.forEach(school => {
                schoolSelect.append(
                    `<option value="${school.id}">${school.name}</option>`
                );
            });
        });

        let allZones = @json($zones);

        $('select[name="province_id"]').on('change', function () {

            let selectedProvince = $(this).val();
            let zoneSelect = $('select[name="zone_id"]');

            zoneSelect.empty().append('<option value="">-- Zone --</option>');

            if (!selectedProvince) return;

            let filteredZones = allZones.filter(z => z.province_id == selectedProvince);

            filteredZones.forEach(zone => {
                zoneSelect.append(
                    `<option value="${zone.id}">${zone.name}</option>`
                );
            });
        });


        const allSubjects = @json($subjects);

        $('select[name="level_id"]').on('change', function () {

            let selectedLevel = $(this).val();
            let subjectSelect = $('select[name="subject_id"]');

            subjectSelect.empty().append('<option value="">-- Subject --</option>');

            if (!selectedLevel) return;

            let filteredSubjects = allSubjects.filter(s => s.level_id == selectedLevel);

            filteredSubjects.forEach(subject => {
                subjectSelect.append(
                    `<option value="${subject.id}">${subject.name}</option>`
                );
            });
        });

        const allGrades = @json($grades);

        // ========== LEVEL → FILTER GRADES ==========
        $('select[name="level_id"]').on('change', function () {

            let selectedLevel = $(this).val();
            let gradeSelect = $('select[name="grade_id"]');

            // Reset grade dropdown
            gradeSelect.empty().append('<option value="">-- Grade --</option>');

            if (!selectedLevel) return;

            // Filter grades by level_id
            let filteredGrades = allGrades.filter(g => g.level_id == selectedLevel);

            filteredGrades.forEach(grade => {
                gradeSelect.append(
                    `<option value="${grade.id}">${grade.grade}</option>`
                );
            });
        });

        function checkDuplicateName(name) {
            $.ajax({
                url: "{{ route('papers.checkName') }}",
                method: "GET",
                data: {
                    name: name,
                    paper_id: "{{ $paper->id ?? '' }}"
                },
                success: function(res) {
                    const input = $('#generated_name');
                    const warning = $('#name-duplicate-warning');
                    const popup = $('#duplicate-popup');
                    const link = $('#duplicate-file-link');

                    // Remove ALL previous hover/click handlers to avoid conflicts
                    input.off('mouseenter mouseleave');
                    popup.off('mouseenter mouseleave');
                    warning.off('click');

                    if (res.exists) {

                        // Update link
                        let fileUrl = "/storage/" + res.file_path;
                        link.attr("href", fileUrl);

                        // UI Updates
                        warning.removeClass('d-none');
                        input.addClass('duplicate-border');

                        // Attach NEW listeners (only when duplicate exists)
                        input.on('mouseenter', function () {
                            popup.show();
                        });

                        popup.on('mouseenter', function () {
                            popup.show();
                        });

                        input.on('mouseleave', function () {
                            setTimeout(function () {
                                if (!input.is(':hover') && !popup.is(':hover')) {
                                    popup.hide();
                                }
                            }, 100);
                        });

                        popup.on('mouseleave', function () {
                            setTimeout(function () {
                                if (!input.is(':hover') && !popup.is(':hover')) {
                                    popup.hide();
                                }
                            }, 100);
                        });

                        warning.on('click', function () {
                            popup.show();
                        });

                    } else {
                        // Cleanup when NO duplicate found
                        warning.addClass('d-none');
                        input.removeClass('duplicate-border');

                        // Ensure popup does NOT show at all
                        popup.hide();
                    }
                }
            });
        }


        // When select changes -> update input
        $('#question_count_select').on('change', function () {
            let val = $(this).val();
            $('#question_count_input').val(val);
        });

        $('#question_count_input').on('input', function () {
            let val = parseInt($(this).val());

            // force max 60
            if (val > 60) {
                $(this).val(60);
                val = 60;
            }

            let select = $('#question_count_select');

            // Sync dropdown
            if (select.find(`option[value="${val}"]`).length > 0) {
                select.val(val);
            } else {
                select.val('');
            }
        });

        // When input changes -> update select
        $('#question_count_input').on('input', function () {
            let val = $(this).val();
            let select = $('#question_count_select');

            // Find matching option
            if (select.find(`option[value="${val}"]`).length > 0) {
                select.val(val);  // match found -> update dropdown
            } else {
                select.val('');   // no match -> reset dropdown
            }
        });


    </script>
@endsection

