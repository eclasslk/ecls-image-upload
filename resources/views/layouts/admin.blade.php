<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
@include('admin.components.header')

<div class="d-flex flex-grow-1">
    @include('admin.components.sidebar')

    <main class="content flex-grow-1">
        @yield('content')
    </main>
</div>

@include('admin.components.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- DataTables --}}
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<script>
    $(document).ready(function () {
        var table = $('#teachersTable').DataTable({
            responsive: true,
            paging: true,
            info: true,
            searching: true,
            ordering: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search ..."
            },
            order: [[0, 'asc']]
        });

    });


</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const sidebar = document.getElementById("sidebarMenu");
        const toggleBtn = document.getElementById("sidebarToggle");

        toggleBtn.addEventListener("click", function () {
            if (window.innerWidth <= 992) {
                sidebar.classList.toggle("show"); // for mobile
            } else {
                sidebar.classList.toggle("collapsed"); // for desktop
            }
        });
    });
</script>

@yield('scripts')


</body>
</html>
