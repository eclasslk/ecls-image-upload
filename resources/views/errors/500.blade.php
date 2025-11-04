<!-- resources/views/errors/404.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Server Issue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .error-container { text-align: center; margin-top: 100px; }
        .error-code { font-size: 120px; font-weight: bold; }
        .error-message { font-size: 24px; margin-bottom: 20px; }
    </style>
</head>
<body>
<div class="container error-container">
    <div class="error-code">500</div>
    <div class="error-message">Oops! Server Error.</div>
    <a href="{{ url('/') }}" class="btn btn-primary">Go Home</a>
</div>
</body>
</html>
