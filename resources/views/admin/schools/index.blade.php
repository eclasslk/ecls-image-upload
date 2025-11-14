@extends('layouts.admin')

@section('content')
    <div class="card shadow p-4">
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
            <h5 class="mb-0 fw-bold text-secondary">Schools List</h5>
            <a href="{{route('admin.schools.create')}}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle me-1"></i> Add School
            </a>
        </div>
            <table id="teachersTable" class="table table-hover table-bordered align-middle">
            <thead class="table-dark">
            <tr>
                <th width="5%">ID</th>
                <th width="20%">Name</th>
                <th width="25%">Province</th>
                <th width="15%">Updated At</th>
                <th width="10%">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($schools as $school)
                <tr>
                    <td>{{ $school->id }}</td>
                    <td>{{ $school->name }}</td>
                    <td>{{ $school->province->name }}</td>
                    <td>{{ $school->updated_at }}</td>

                    <td class="text-center">
                        <a href="{{ route('admin.schools.show', $school->id) }}">
                            <button class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil"></i>
                            </button></a>
                        <form action="{{ route('admin.schools.destroy', $school->id) }}" method="POST" style="display:inline-block;"
                              onsubmit="return confirm('Are you sure you want to delete this school?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
            <tfoot class="table-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Province</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
