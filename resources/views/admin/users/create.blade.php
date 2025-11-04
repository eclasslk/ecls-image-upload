@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h4 class="mb-0 fw-bold text-secondary">
                    {{ isset($user) ? 'Edit User' : 'Add User' }}
                </h4>
                <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
            </div>

            <div class="card-body">
                <form action="{{ isset($user) ? route('admin.users.update',$user->id) : route('admin.users.store') }}"
                      method="POST">
                    @csrf
                    @if(isset($user))
                        @method('PUT')
                    @endif

                    <div class="row g-3">
                        <!-- Name -->
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control"
                                   value="{{ old('name',$user->name ?? '') }}" required>
                            @error('name')
                            <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Password -->
                        @if(!isset($user))
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control"
                                       value="{{ old('email',$user->email ?? '') }}" required>
                                @error('email')
                                <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                        @else
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control"
                                       value="{{ old('email',$user->email ?? '') }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold d-block">Is Active</label>
                                <div class="form-check form-switch">
                                    <input type="hidden" name="is_active" value="0">

                                    <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                        {{ old('is_active',$user->is_active ?? false) ? 'checked' : '' }}>
                                    <label class="form-check-label">Is Active</label>
                                </div>
                            </div>
                        @endif


                    </div>

                    <!-- Submit -->
                    <div class="mt-4">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save"></i> {{ isset($user) ? 'Update' : 'Save' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        document.getElementById('generatePassword')?.addEventListener('click', function () {
            // Characters allowed
            const chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()";
            let password = "";
            for (let i = 0; i < 10; i++) {
                password += chars.charAt(Math.floor(Math.random() * chars.length));
            }

            // Set real password to hidden field
            document.getElementById('passwordField').value = password;

            // Show only masked version (same length as password)
            const masked = '*'.repeat(password.length);
            document.getElementById('generatedPassword').innerText = masked;
        });
    </script>
@endsection
