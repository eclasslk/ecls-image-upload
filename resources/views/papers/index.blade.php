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
{{--                <a href="{{route('institutes.create')}}" class="btn btn-primary btn-sm">--}}
{{--                    <i class="bi bi-plus-circle me-1"></i> Add Paper--}}
{{--                </a>--}}
            </div>
            <div class="card-body">
                <div class="row mb-3">
{{--                    <div class="col-md-4">--}}
{{--                        <select id="filter_province" class="form-select">--}}
{{--                            <option value="">-- All Provinces --</option>--}}
{{--                            @foreach($provinces as $province)--}}
{{--                                <option value="{{ $province->id }}">{{ $province->name }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}

{{--                    <div class="col-md-4">--}}
{{--                        <select id="filter_district" class="form-select">--}}
{{--                            <option value="">-- All Districts --</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}

{{--                    <div class="col-md-4">--}}
{{--                        <select id="filter_city" class="form-select">--}}
{{--                            <option value="">-- All Cities --</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}



{{--                    <div class="col-md-4">--}}
{{--                        <select id="filter_level" class="form-select">--}}
{{--                            <option value="">-- All Levels --</option>--}}
{{--                            @foreach($levels as $level)--}}
{{--                                <option value="{{ $level->name }}">{{ $level->name }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4">--}}
{{--                        <select id="filter_capacity" class="form-select">--}}
{{--                            <option value="">-- All Capacities --</option>--}}
{{--                            @foreach($capacities as $capacity)--}}
{{--                                <option value="{{ $capacity->name }}">{{ $capacity->name }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4">--}}
{{--                        <select id="filter_priority" class="form-select">--}}
{{--                            <option value="">-- Priority --</option>--}}
{{--                            <option value="0">Normal</option>--}}
{{--                            <option value="1">High</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}

                </div>
                <table id="institutesTable" class="table table-hover table-bordered align-middle">
                    <thead class="table-dark">
                    <tr>
                        <th width="5%">ID</th>
                        <th width="20%">Name</th>
                        <th width="20%">Type</th>
                        <th width="20%">Zone</th>
                        <th width="20%">Subject</th>
                        <th width="20%">Paper</th>
                        <th width="15%">Updated At</th>
                        <th width="10%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($papers as $paper)
                        <tr class="clickable-row" data-href="">
                            <td>{{ $paper->id }}</td>
                            <td>{{ $paper->name ?? null }}}</td>
                            <td>{{ $paper->type ?? null }}}</td>
                            <td>{{ $paper->zone ?? null }}}</td>
                            <td>{{ $paper->subject ?? null }}}</td>
                            <td>{{ $paper->paper ?? null }}}</td>
                            <td>{{ $paper->name ?? null }}}</td>


                            <td>{{ $paper->updated_at }}</td>
                            <td class="text-center">
                                {{-- Edit --}}
{{--                                <a href="{{ route('papers.show', $paper->id) }}" class="btn btn-sm btn-primary">--}}
{{--                                    <i class="bi bi-pencil"></i>--}}
{{--                                </a>--}}

{{--                                --}}{{-- Delete --}}
{{--                                <form action="{{ route('papers.destroy', $paper->id) }}" method="POST" style="display:inline-block;"--}}
{{--                                      onsubmit="return confirm('Are you sure you want to delete this institute?');">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button type="submit" class="btn btn-sm btn-danger">--}}
{{--                                        <i class="bi bi-trash"></i>--}}
{{--                                    </button>--}}
{{--                                </form>--}}
                            </td>
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
                        <th>Paper</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
@endsection
