<header class="header d-flex justify-content-between align-items-center px-3 py-2 shadow-sm">
    <div class="d-flex align-items-center">
        <!-- Sidebar Toggle Button -->
        <button id="sidebarToggle" class="btn btn-outline-primary me-3">
            <i class="bi bi-list"></i>
        </button>

        <!-- Logo -->
        <div class="logo">
            <img src="{{ asset('image/logo/logo.png') }}" alt="Logo" style="height:40px;">
        </div>
    </div>

    <!-- User Dropdown -->
    <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
            {{ Auth::user()->name ?? 'Admin' }}
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
            <li>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</header>
