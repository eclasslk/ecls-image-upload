@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <h2 class="mb-4 text-center text-primary fw-bold display-5">
            PAPERS INFORMATION
        </h2>

        <div class="card shadow-sm">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-header d-flex justify-content-between align-items-center bg-light">
                <h5 class="mb-0 fw-bold text-secondary">Papers List</h5>
                <a href="{{route('papers.create')}}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-circle me-1"></i> Add Paper
                </a>
            </div>
            <div class="card-body">
                <div class="row mb-5">
                    <div class="col-md-2 mb-3">
                        <select id="filter_type" class="form-select">
                            <option value="">-- All Types --</option>
                            @foreach($types as $type)
                                <option value="{{ $type->name }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <select id="filter_province" class="form-select">
                            <option value="">-- All Provinces --</option>
                            @foreach($provinces as $province)
                                <option value="{{ $province->name }}"
                                        data-id="{{ $province->id }}">
                                    {{ $province->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <select id="filter_zone" class="form-select">
                            <option value="">-- All Zones --</option>
                            @foreach($zones as $zone)
                                <option value="{{ $zone->name }}"
                                        data-id="{{ $zone->id }}"
                                        data-province="{{ $zone->province_id }}">
                                    {{ $zone->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <select id="filter_school" class="form-select">
                            <option value="">-- All Schools --</option>
                            @foreach($schools as $school)
                                <option value="{{ $school->name }}"
                                        data-id="{{ $school->id }}"
                                        data-province="{{ $school->province_id }}">
                                    {{ $school->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <select id="filter_level" class="form-select">
                            <option value="">-- All Levels --</option>
                            @foreach($levels as $level)
                                <option value="{{ $level->name }}"
                                        data-id="{{ $level->id }}">
                                    {{ $level->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <select id="filter_subject" class="form-select">
                            <option value="">-- All Subjects --</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->name }}"
                                        data-level="{{ $subject->level_id }}">
                                    {{ $subject->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select id="filter_medium" class="form-select">
                            <option value="">-- All Mediums --</option>
                            @foreach($mediums as $medium)
                                <option value="{{ $medium->name }}">{{ $medium->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select id="filter_year" class="form-select">
                            <option value="">-- All Years --</option>
                            @foreach($years as $year)
                                <option value="{{ $year->year }}">{{ $year->year }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select id="filter_grade" class="form-select">
                            <option value="">-- All Grades --</option>
                            @foreach($grades as $grade)
                                <option value="{{ $grade->grade }}"
                                        data-level="{{ $grade->level_id }}">
                                    {{ $grade->grade }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select id="filter_term" class="form-select">
                            <option value="">-- All Terms --</option>
                            @foreach($terms as $term)
                                <option value="{{ $term->name }}">{{ $term->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select id="filter_suffix" class="form-select">
                            <option value="">-- All Suffixes --</option>
                            @foreach($suffixes as $suffix)
                                <option value="{{ $suffix->name }}">{{ $suffix->name }}</option>
                            @endforeach
                        </select>
                    </div>


                </div>
                <table id="paperTable" class="table table-hover table-bordered align-middle">
                    <thead class="table-dark">
                    <tr>
                        <th width="5%">ID</th>
                        <th width="40%">Name</th>
                        <th width="12%">No. of Questions</th>
                        <th width="10%">Link</th>

                        <th width="10%">Updated On</th>
                        <th width="10%">Updated By</th>
                        <th width="10%">Action</th>

                        {{-- Hidden filterable columns --}}
                        <th class="d-none">Type</th>
                        <th class="d-none">Zone</th>
                        <th class="d-none">Subject</th>
                        <th class="d-none">School</th>
                        <th class="d-none">Year</th>

                        <th class="d-none">Province</th>
                        <th class="d-none">Medium</th>
                        <th class="d-none">Grade</th>
                        <th class="d-none">Term</th>
                        <th class="d-none">Suffix</th>
                        <th class="d-none">Level</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($papers as $paper)
                        <tr class="clickable-row" data-href="">
                            <td>{{ $paper->id }}</td>
                            <td>{{ $paper->name ?? null }}</td>
                            <td>{{ $paper->question_count ?? null }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $paper->file_path) }}" target="_blank"
                                   class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-eye"></i> View Paper
                                </a>
                            </td>

                            <td>{{ $paper->updated_at->format('Y-m-d') }}</td>
                            <td>{{ $paper->user->name ?? null}}</td>
                            <td class="text-center">
                                {{--                                 Edit--}}
                                <a href="{{ route('papers.show', $paper->id) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                {{--                                 Delete--}}
                                <form action="{{ route('papers.destroy', $paper->id) }}" method="POST"
                                      style="display:inline-block;"
                                      onsubmit="return confirm('Are you sure you want to delete this paper?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>

                            {{-- Hidden columns --}}
                            <td class="d-none">{{ $paper->type->name ?? null }}</td>
                            <td class="d-none">{{ $paper->zone->name ?? null }}</td>
                            <td class="d-none">{{ $paper->subject->name ?? null }}</td>
                            <td class="d-none">{{ $paper->school->name ?? null }}</td>
                            <td class="d-none">{{ $paper->year->year ?? null }}</td>

                            <td class="d-none">{{ $paper->province->name ?? '' }}</td>
                            <td class="d-none">{{ $paper->medium->name ?? '' }}</td>
                            <td class="d-none">{{ $paper->grade->grade ?? '' }}</td>
                            <td class="d-none">{{ $paper->term->name ?? '' }}</td>
                            <td class="d-none">
                                @foreach($paper->suffixes as $suffix)
                                    {{ $suffix->name ?? '' }}\
                                @endforeach
                            </td>
                            <td class="d-none">{{ $paper->level->name ?? '' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>No. Of Questions</th>
                        <th>Link</th>
                        <th>Updated On</th>
                        <th>Updated By</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    {{-- DataTables JS --}}
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {

            let table = $('#paperTable').DataTable({
                responsive: true,
                paging: true,
                info: true,
                searching: true,
                ordering: true,
                order: [[0, 'desc']],
                language: { search: "_INPUT_", searchPlaceholder: "Search papers..." },
                columnDefs: [
                    // { targets: [3,6,7,8,9,10,11,12,13,14,15,16,17], searchable: false }, // disable search
                    {targets: [7,8,9,10,11,12,13,14,15,16,17], visible: false}
                ]
            });

            // =========================
            // RESET ALL FILTERS TO DEFAULT
            // =========================
            function resetFilters() {
                $('#filter_province, #filter_zone, #filter_school, #filter_grade, #filter_term, #filter_suffix')
                    .prop('disabled', false);

                // Show all options again
                $("#filter_zone option, #filter_school option, #filter_subject option").show();
            }

            // =========================
            // HANDLE TYPE CHANGE
            // =========================
            // ========== TYPE FILTER HANDLING ==========
            $('#filter_type').on('change', function () {
                let val = $(this).val();

                // RESET ALL DROPDOWNS
                $('#filter_province, #filter_zone, #filter_school, #filter_grade, #filter_term, #filter_suffix, #filter_level, #filter_subject, #filter_medium, #filter_year')
                    .val('')                      // reset selected value
                    .prop('disabled', false);     // enable again by default

                // SHOW ALL OPTIONS AGAIN
                $("#filter_zone option, #filter_school option, #filter_subject option").show();

                // If no type selected → do nothing more
                if (val === "") return;

                // APPLY DISABLE RULES
                if (val === "National") {
                    $('#filter_province, #filter_zone, #filter_school, #filter_grade, #filter_term').prop('disabled', true);
                }
                else if (val === "Provincial") {
                    $('#filter_zone, #filter_school, #filter_suffix').prop('disabled', true);
                }
                else if (val === "Zonal") {
                    $('#filter_school, #filter_suffix').prop('disabled', true);
                }
                else if (val === "School") {
                    $('#filter_zone, #filter_suffix').prop('disabled', true);
                }
            });



            // =========================
            // PROVINCE → FILTER ZONE & SCHOOL
            // =========================
            $('#filter_province').on('change', function () {
                let selectedProvinceID = $("#filter_province option:selected").data('id');

                // Reset if empty
                if (!selectedProvinceID) {
                    $("#filter_zone option, #filter_school option").show();
                    return;
                }

                $("#filter_zone option").each(function () {
                    let zoneProvince = $(this).data('province');
                    if (zoneProvince != selectedProvinceID && $(this).val() !== "") {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                });

                $("#filter_school option").each(function () {
                    let schoolProvince = $(this).data('province');
                    if (schoolProvince != selectedProvinceID && $(this).val() !== "") {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                });
            });


            // =========================
            // LEVEL → FILTER SUBJECTS
            // =========================
            $('#filter_level').on('change', function () {
                let levelID = $("#filter_level option:selected").data("id");

                if (!levelID) {
                    $("#filter_subject option").show();
                    return;
                }

                $("#filter_subject option").each(function () {
                    let subjectLevel = $(this).data('level');
                    if (subjectLevel != levelID && $(this).val() !== "") {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                });
            });


            // =========================
            // DATATABLE FILTERS
            // =========================
            $('#filter_type, #filter_province, #filter_zone, #filter_school, #filter_subject, #filter_medium, #filter_year, #filter_grade, #filter_term, #filter_suffix, #filter_level')
                .on('change', function () {

                    table.column(7).search($('#filter_type').val());
                    table.column(8).search($('#filter_zone').val());
                    table.column(9).search($('#filter_subject').val());
                    table.column(10).search($('#filter_school').val());
                    table.column(11).search($('#filter_year').val());
                    table.column(12).search($('#filter_province').val());
                    table.column(13).search($('#filter_medium').val());
                    table.column(14).search($('#filter_grade').val());
                    table.column(15).search($('#filter_term').val());
                    table.column(16).search($('#filter_suffix').val());
                    table.column(17).search($('#filter_level').val());

                    table.draw();
                });
        });

        $('#filter_province').on('change', function () {
            let selectedProvinceID = $("#filter_province option:selected").data('id');

            // RESET selected values first
            $('#filter_zone').val('');
            $('#filter_school').val('');

            // SHOW all options
            $("#filter_zone option, #filter_school option").show();

            // If empty → do nothing
            if (!selectedProvinceID) return;

            // Filter Zones
            $("#filter_zone option").each(function () {
                let zoneProvince = $(this).data('province');
                if (zoneProvince != selectedProvinceID && $(this).val() !== "") {
                    $(this).hide();
                }
            });

            // Filter Schools
            $("#filter_school option").each(function () {
                let schoolProvince = $(this).data('province');
                if (schoolProvince != selectedProvinceID && $(this).val() !== "") {
                    $(this).hide();
                }
            });
        });


        $('#filter_level').on('change', function () {
            let levelID = $("#filter_level option:selected").data('id');

            // RESET selected values first
            $('#filter_subject').val('');
            $('#filter_grade').val('');

            // SHOW all options again
            $("#filter_subject option, #filter_grade option").show();

            // If empty → do nothing
            if (!levelID) return;

            // Filter Subjects
            $("#filter_subject option").each(function () {
                let subjectLevel = $(this).data('level');
                if (subjectLevel != levelID && $(this).val() !== "") {
                    $(this).hide();
                }
            });

            // Filter Grades
            $("#filter_grade option").each(function () {
                let gradeLevel = $(this).data('level');
                if (gradeLevel != levelID && $(this).val() !== "") {
                    $(this).hide();
                }
            });
        });


    </script>

@endsection
