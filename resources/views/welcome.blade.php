<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MCQ - Image Upload</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>

<div class="container text-center">
    <h2 class="welcome-text">MCQ - PDF UPLOADER</h2>
    <p class="welcome-subtext">MCQ</p>

    @if (Route::has('login'))
        <div class="login-section">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-primary login-btn">Go to Dashboard</a>
                <p class="login-note">Access your dashboard for full features</p>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary login-btn">LOG IN</a>
            @endauth
        </div>
    @endif

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
