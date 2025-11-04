<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #ffecd2, #ffe6b3); /* soft orange-peach gradient */
            font-family: "Inter", sans-serif;
        }

        .login-card {
            max-width: 400px;
            width: 100%;
            background: #fff;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        .form-control {
            border-radius: 8px;
            height: 50px;
            background-color: #fff8f0;
            border: 1px solid #ffd6a5;
        }

        .form-control:focus {
            border-color: #ff851b;
            box-shadow: 0 0 0 0.2rem rgba(255,133,27,0.25);
        }

        .btn-login {
            border-radius: 8px;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            background-color: #ff851b;
            border: none;
            color: #fff;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background-color: #e67300;
            transform: scale(1.03);
        }

        .logo {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .logo img {
            max-height: 60px;
        }

        .subtitle {
            text-align: center;
            font-style: italic;
            margin-bottom: 1.5rem;
            color: #8c6239;
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="logo">
        <!-- Replace with your actual logo -->
        <img src="{{asset('image/logo/logo.png')}}" alt="Logo">
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required autofocus>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

{{--        <!-- Remember Me -->--}}
{{--        <div class="form-check mb-3">--}}
{{--            <input class="form-check-input" type="checkbox" id="remember_me" name="remember">--}}
{{--            <label class="form-check-label" for="remember_me">Remember me</label>--}}
{{--        </div>--}}

        <!-- Button -->
        <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-login">Log In</button>
        </div>
        @include('common.version')

    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
