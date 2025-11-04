@extends('layouts.admin')

@section('content')
    <div class="card shadow p-4">
        <h2 class="fw-bold text-primary">Welcome to Admin Dashboard</h2>
        <p class="fs-5 mt-3">
            Current Date & Time:
            <span id="datetime" class="fw-semibold text-dark"></span>
        </p>
    </div>
@endsection
@section('scripts')
    <script>
        function updateDateTime() {
            document.getElementById('datetime').innerText = new Date().toLocaleString();
        }
        setInterval(updateDateTime, 1000);
        updateDateTime();
    </script>
@endsection
