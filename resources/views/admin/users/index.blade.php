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
            <h5 class="mb-0 fw-bold text-secondary">User List</h5>
            <a href="{{route('admin.users.create')}}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle me-1"></i> Add User
            </a>
        </div>        <table id="teachersTable" class="table table-hover table-bordered align-middle">
            <thead class="table-dark">
            <tr>
                <th width="5%">ID</th>
                <th width="20%">Name</th>
                <th width="25%">Email</th>
                <th width="15%">Is Active</th>
                <th width="15%">Updated At</th>
                <th width="10%">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->is_active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>                    <td>{{ $user->updated_at }}</td>

                    <td class="text-center">
                        <a href="{{ route('admin.users.show', $user->id) }}">
                            <button class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil"></i>
                            </button></a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline-block;"
                              onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                        <button type="button"
                                class="btn btn-sm btn-secondary btn-password"
                                data-id="{{ $user->id }}"
                                data-url="{{ route('admin.users.password.update', $user->id) }}">
                            <i class="bi bi-key"></i>
                        </button>

                    </td>

                </tr>
            @endforeach
            </tbody>
            <tfoot class="table-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Is Active</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <!-- Password Modal -->
    <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" id="updatePasswordForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="passwordModalLabel">Generate Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="user_id" id="modalUserId">

                        <div class="mb-3">
                            <label class="form-label fw-bold">Password <span class="text-danger">*</span></label>
                            <div class="d-flex align-items-center">
                                <button type="button" id="generatePassword" class="btn btn-sm btn-outline-primary me-2">
                                    <i class="bi bi-key"></i> Generate
                                </button>
                                <span id="generatedPassword" class="fw-bold text-success"></span>
                            </div>
                            <small class="text-muted">Click Generate to create a random password.</small>

                            <!-- hidden password field -->
                            <input type="hidden" name="password" id="passwordField" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="updatePasswordBtn" class="btn btn-success" disabled>
                            Update Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
@section('scripts')

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // open modal & set form action
            document.querySelectorAll(".btn-password").forEach(function (btn) {
                btn.addEventListener("click", function () {
                    const userId = this.dataset.id;
                    const url = this.dataset.url;

                    // set hidden user_id + form action
                    document.getElementById("modalUserId").value = userId;
                    document.getElementById("updatePasswordForm").action = url;

                    // clear old password
                    document.getElementById("generatedPassword").innerText = "";
                    document.getElementById("passwordField").value = "";

                    // show modal
                    const passwordModal = new bootstrap.Modal(document.getElementById("passwordModal"));
                    passwordModal.show();
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const generateBtn = document.getElementById("generatePassword");
            const updateBtn = document.getElementById("updatePasswordBtn");
            const passwordField = document.getElementById("passwordField");
            const generatedPassword = document.getElementById("generatedPassword");

            // disable button by default
            updateBtn.disabled = true;

            generateBtn.addEventListener("click", function () {
                const chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()";
                let password = "";
                for (let i = 0; i < 10; i++) {
                    password += chars.charAt(Math.floor(Math.random() * chars.length));
                }

                passwordField.value = password;
                generatedPassword.innerText = '*'.repeat(password.length);

                // enable update button now
                updateBtn.disabled = false;
            });

            // Reset modal each time it is closed
            document.getElementById('passwordModal').addEventListener('hidden.bs.modal', function () {
                updateBtn.disabled = true;
                passwordField.value = "";
                generatedPassword.innerText = "";
            });
        });
    </script>


@endsection
