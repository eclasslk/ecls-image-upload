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
                        <div class="row mb-3 align-items-end border-bottom pb-2">
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
                        <div class="row mb-3 align-items-end border-bottom pb-2">
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
                            </div>
                        </div>

                        <!-- Row 3: Subject -->
                        <div class="row mb-3 align-items-end border-bottom pb-2">
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
                            </div>
                        </div>

                        <!-- Row 4: Paper -->
                        <div class="row mb-3 align-items-end border-bottom pb-2">
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
                            </div>
                            <div class="col-md" style="flex: 0 0 12.5%; max-width: 12.5%;">
                                <select name="syllabus_id" class="form-select">
                                    <option value="">-- Syllabus --</option>
                                    @foreach($syllabuses as $syllabus)
                                        <option value="{{ $syllabus->id }}"
                                            {{ old('syllabus_id',$paper->syllabus_id ?? '') == $syllabus->id ? 'selected' : '' }}>
                                            {{ $syllabus->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Row 5: Suffix + Question -->
                        <div class="row mb-3 align-items-end border-bottom pb-2">
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
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold text-secondary mb-0">NO OF QUESTIONS</label>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="number" name="question_count" class="form-control"
                                           value="{{ old('question_count', $paper->question_count ?? 50) }}"
                                           min="1" step="1" inputmode="numeric"
                                           oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                    <select class="form-select" onchange="this.previousElementSibling.value = this.value">
                                        <option value="">Q</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="60">60</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Row 6: Name + File Upload -->
                        <div class="row mb-4 align-items-end">
                            <div class="col-md-2">
                                <label class="form-label fw-bold text-secondary mb-0">NAME</label>
                            </div>
                            <div class="col-md-3 position-relative">

                                <input type="text" name="name" id="generated_name"
                                       class="form-control"
                                       value="{{ old('name', $paper->name ?? '') }}"
                                       readonly>

                                <small class="text-danger d-none" id="name-duplicate-warning">
                                    Duplicate name exists!
                                </small>

                                <!-- Popup Window -->
                                <div id="duplicate-popup" class="popup-duplicate">
                                    Duplicate found!<br>
                                    <a href="#" id="duplicate-file-link" target="_blank">View PDF</a>
                                </div>


                                <small class="text-muted">Auto-generated based on fields</small>
                            </div>


                            <div class="col-md-3">
                                <label class="form-label fw-bold text-secondary mb-0">UPLOAD</label>
                            </div>
                            <div class="col-md-3">
                                <input type="file" name="file_path" class="form-control" accept="application/pdf">
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

                // Source selects
                const $province = $('select[name="province_id"]');
                const $zone = $('select[name="zone_id"]');
                const $school = $('select[name="school_id"]');

                // Paper selects
                const $grade = $('select[name="grade_id"]');
                const $term = $('select[name="term_id"]');

                // Reset all to enabled
                $province.add($zone).add($school).add($grade).add($term).prop('disabled', false);
                $province.add($zone).add($school).add($grade).add($term)
                    .closest('.col-md-4, .col-md-3').css('opacity', 1);

                // --- SOURCE CONDITIONS ---
                if (selectedTypeText === 'National') {
                    $province.add($zone).add($school).prop('disabled', true);
                    $province.add($zone).add($school).closest('.col-md-4').css('opacity', 0.5);

                    // Disable Grade + Term
                    $grade.add($term).prop('disabled', true);
                    $grade.add($term).closest('.col-md-3').css('opacity', 0.5);
                }
                else if (selectedTypeText === 'Provincial') {
                    $province.prop('disabled', false);
                    $zone.add($school).prop('disabled', true);
                    $zone.add($school).closest('.col-md-4').css('opacity', 0.5);
                }
                else if (selectedTypeText === 'Zonal') {
                    $province.add($zone).prop('disabled', false);
                    $school.prop('disabled', true).closest('.col-md-4').css('opacity', 0.5);
                }
                else if (selectedTypeText === 'School') {
                    $province.add($school).prop('disabled', false);
                    $zone.prop('disabled', true).closest('.col-md-4').css('opacity', 0.5);
                }

                generateName(); // regenerate when conditions change
            }

            // Function to auto-generate the name field
            function generateName() {
                const type = $('select[name="type_id"] option:selected').text().trim();
                const province = $('select[name="province_id"]:enabled option:selected').text().trim();
                const provinceCode = $('select[name="province_id"]:enabled option:selected').data('code') || province;

                const zone = $('select[name="zone_id"]:enabled option:selected').text().trim();
                const school = $('select[name="school_id"]:enabled option:selected').text().trim();

                const levelCode = $('select[name="level_id"] option:selected').data('code') || $('select[name="level_id"] option:selected').text().trim();
                const subject = $('select[name="subject_id"] option:selected').text().trim();
                const mediumCode = $('select[name="medium_id"] option:selected').data('code') || $('select[name="medium_id"] option:selected').text().trim();
                const year = $('select[name="year_id"] option:selected').text().trim();

                const grade = $('select[name="grade_id"]:enabled option:selected').text().trim();
                const termCode = $('select[name="term_id"]:enabled option:selected').data('code') || $('select[name="term_id"]:enabled option:selected').text().trim();

                // Handle multiple suffix selections
                const suffixes = $('select[name="suffix_ids[]"]').val() || [];
                const suffixNames = suffixes.map(id => {
                    return $('select[name="suffix_ids[]"] option[value="'+id+'"]').text().trim();
                }).join(' ');

                // Construct name groups
                const parts = [];

                if (type) parts.push(type);
                if (provinceCode || zone || school) {
                    const group2 = [provinceCode, zone, school].filter(Boolean).join(' ');
                    if (group2) parts.push(group2);
                }
                const group3 = [levelCode, subject, mediumCode].filter(Boolean).join(' ');
                if (group3) parts.push(group3);

                const group4 = [year, grade, termCode].filter(Boolean).join(' ');
                if (group4) parts.push(group4);

                if (suffixNames) parts.push(suffixNames);

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
                        input.addClass('duplicate-border');
                        warning.removeClass('d-none');

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
                        input.removeClass('duplicate-border');
                        warning.addClass('d-none');

                        // Ensure popup does NOT show at all
                        popup.hide();
                    }
                }
            });
        }




    </script>
@endsection

