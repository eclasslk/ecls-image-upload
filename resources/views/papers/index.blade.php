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
                    <div class="col-md-3 mb-3">
                    <select id="filter_type" class="form-select">
                            <option value="">-- All Types --</option>
                            @foreach($types as $type)
                                <option value="{{ $type->name }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                    <select id="filter_province" class="form-select">
                            <option value="">-- All Provinces --</option>
                            @foreach($provinces as $province)
                                <option value="{{ $province->name }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                    <select id="filter_zone" class="form-select">
                            <option value="">-- All Zones --</option>
                            @foreach($zones as $zone)
                                <option value="{{ $zone->name }}">{{ $zone->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                    <select id="filter_school" class="form-select">
                            <option value="">-- All Schools --</option>
                            @foreach($schools as $school)
                                <option value="{{ $school->name }}">{{ $school->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                    <select id="filter_subject" class="form-select">
                            <option value="">-- All Subjects --</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->name }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="filter_medium" class="form-select">
                            <option value="">-- All Mediums --</option>
                            @foreach($mediums as $medium)
                                <option value="{{ $medium->name }}">{{ $medium->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
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
                                <option value="{{ $grade->grade }}">{{ $grade->grade }}</option>
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
                        <th width="20%">Name</th>
                        <th width="20%">Type</th>
                        <th width="20%">Zone</th>
                        <th width="20%">Subject</th>
                        <th width="20%">School</th>
                        <th width="20%">Year</th>
                        <th width="25%">Updated At</th>
                        <th width="20%">Action</th>

                        {{-- Hidden filterable columns --}}
                        <th class="d-none">Province</th>
                        <th class="d-none">Medium</th>
                        <th class="d-none">Grade</th>
                        <th class="d-none">Term</th>
                        <th class="d-none">Suffix</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($papers as $paper)
                        <tr class="clickable-row" data-href="">
                            <td>{{ $paper->id }}</td>
                            <td>{{ $paper->name ?? null }}</td>
                            <td>{{ $paper->type->name ?? null }}</td>
                            <td>{{ $paper->zone->name ?? null }}</td>
                            <td>{{ $paper->subject->name ?? null }}</td>
                            <td>{{ $paper->school->name ?? null }}</td>
                            <td>{{ $paper->year->year ?? null }}</td>
                            <td>{{ $paper->updated_at->format('Y-m-m') }}</td>
                            <td class="text-center">
{{--                                 Edit--}}
                                <a href="{{ route('papers.show', $paper->id) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>

{{--                                 Delete--}}
                                <form action="{{ route('papers.destroy', $paper->id) }}" method="POST" style="display:inline-block;"
                                      onsubmit="return confirm('Are you sure you want to delete this paper?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>

                            {{-- Hidden columns --}}
                            <td class="d-none">{{ $paper->province->name ?? '' }}</td>
                            <td class="d-none">{{ $paper->medium->name ?? '' }}</td>
                            <td class="d-none">{{ $paper->grade ?? '' }}</td>
                            <td class="d-none">{{ $paper->term ?? '' }}</td>
                            <td class="d-none">{{ $paper->suffix->name ?? '' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Zone</th>
                        <th>Subject</th>
                        <th>School</th>
                        <th>Year</th>
                        <th>Updated At</th>
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
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search papers..."
                },
                columnDefs: [
                    { targets: [9,10,11,12,13], visible: false } // Hide extra columns but keep searchable
                ]
            });

            // Unified filter binding
            $('#filter_type, #filter_province, #filter_zone, #filter_school, #filter_subject, #filter_medium, #filter_year, #filter_grade, #filter_term, #filter_suffix')
                .on('change', function () {
                    table.column(2).search($('#filter_type').val());
                    table.column(9).search($('#filter_province').val());   // hidden province
                    table.column(3).search($('#filter_zone').val());
                    table.column(5).search($('#filter_school').val());
                    table.column(4).search($('#filter_subject').val());
                    table.column(10).search($('#filter_medium').val());   // hidden medium
                    table.column(6).search($('#filter_year').val());
                    table.column(11).search($('#filter_grade').val());    // hidden grade
                    table.column(12).search($('#filter_term').val());     // hidden term
                    table.column(13).search($('#filter_suffix').val());   // hidden suffix
                    table.draw();
                });
        });
    </script>

@endsection
