<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Background */
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #fff4e6, #ffe8cc); /* soft warm orange */
        }

        /* Login card */
        .login-card {
            border-radius: 18px;
            overflow: hidden;
            border: 2px solid #ffb347;  /* soft orange border */
            box-shadow: 0 8px 22px rgba(255, 133, 27, 0.25); /* warm orange shadow */
            background: white;
        }

        /* Logo */
        .login-logo img {
            max-width: 120px;
        }

        /* Header */
        .card-header {
            background-color: #ff851b !important;
            color: white;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        /* Labels */
        label.form-label {
            color: #b34700;
            font-weight: 600;
        }

        /* Inputs */
        .form-control {
            border: 1px solid #ffa94d;
            border-radius: 8px;
        }

        .form-control:focus {
            border-color: #ff851b;
            box-shadow: 0 0 0 0.15rem rgba(255,133,27,0.35);
        }

        /* Login button */
        .btn-login {
            background-color: #ff851b;
            color: white;
            font-weight: 600;
            padding: 10px;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-size: 1rem;
            border: none;
        }

        .btn-login:hover {
            background-color: #e67300;
            transform: translateY(-3px);
            box-shadow: 0 8px 18px rgba(0,0,0,0.2);
        }

    </style>
</head>

<body>

<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-5">
            <div class="card shadow login-card">

                <!-- LOGO -->
                <div class="text-center p-4 login-logo">
                    <img src="{{ asset('image/logo/logo.png') }}" alt="Logo">
                </div>

                <!-- HEADER -->
                <div class="card-header text-center">
                    <h4>Admin Login</h4>
                </div>

                <!-- BODY -->
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button class="btn-login w-100">Login</button>

                        @include('common.version')
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>

</body>
</html>
