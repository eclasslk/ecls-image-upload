@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h4 class="mb-0 fw-bold text-secondary">
                    {{ isset($school) ? 'Edit School' : 'Add School' }}
                </h4>
                <a href="{{ route('admin.schools.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
            </div>

            <div class="card-body">
                <form action="{{ isset($school) ? route('admin.schools.update',$school->id) : route('admin.schools.store') }}"
                      method="POST">
                    @csrf
                    @if(isset($school))
                        @method('PUT')
                    @endif

                    <div class="row g-3">
                        <!-- Name -->


                        <!-- Level -->
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Province <span class="text-danger">*</span></label>
                            <select name="province_id" class="form-select" required>
                                <option value="">-- Select Province --</option>
                                @foreach($provinces as $province)
                                    <option value="{{ $province->id }}"
                                        {{ old('province_id',$school->province_id ?? '') == $province->id ? 'selected' : '' }}>
                                        {{ $province->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div><!-- Level -->
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control"
                                   value="{{ old('name',$school->name ?? '') }}" required>
                            @error('name')
                            <span class="text-danger" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="mt-4">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save"></i> {{ isset($school) ? 'Update' : 'Save' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection
