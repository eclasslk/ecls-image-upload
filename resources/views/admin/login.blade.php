<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #c2d4e8, #b1cbe1);
        }
        .login-card {
            border-radius: 15px;
            overflow: hidden;
        }
        .login-logo img {
            max-width: 120px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow login-card">
                <div class="text-center p-4 login-logo">
                    <!-- Replace with your logo path -->
                    <img src="{{ asset('image/logo/logo.png') }}" alt="Logo">
                </div>
                <div class="card-header text-center bg-primary text-white">
                    <h4>Admin Login</h4>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input type="email" name="email" class="form-control" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button class="btn btn-primary w-100">Login</button>
                        @include('common.version')

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
