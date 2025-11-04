<!-- resources/views/errors/403.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>403 Forbidden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .error-container { text-align: center; }
        .error-code { font-size: 120px; font-weight: bold; color: #dc3545; }
        .error-message { font-size: 24px; margin-bottom: 20px; }
    </style>
</head>
<body>
<div class="container error-container">
    <div class="error-code">403</div>
    <div class="error-message">Access Forbidden</div>
    <p>You do not have permission to access this page.</p>
    <a href="{{ route('force.logout') }}" class="btn btn-primary">Go Home</a>
</div>
</body>
</html>
