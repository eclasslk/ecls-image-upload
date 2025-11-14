<nav class="sidebar" id="sidebarMenu">
    <ul class="list-unstyled">

        {{-- Dashboard --}}
        <li>
            <a href="{{ route('admin.dashboard') }}"
               class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> DASHBOARD
            </a>
        </li>

        {{-- Users --}}
        <li>
            <a href="{{ route('admin.users.index') }}"
               class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i> USERS
            </a>
        </li>

        <li>
            <a href="{{ route('admin.schools.index') }}"
               class="{{ request()->routeIs('admin.schools.*') ? 'active' : '' }}">
                <i class="bi bi-book"></i> SCHOOLS
            </a>
        </li>

    </ul>
</nav>
