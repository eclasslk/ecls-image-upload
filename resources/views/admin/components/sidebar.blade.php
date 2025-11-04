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

        {{-- Subjects --}}
        <li>
            <a href="{{ route('admin.subjects.index') }}"
               class="{{ request()->routeIs('admin.subjects.*') ? 'active' : '' }}">
                <i class="bi bi-book"></i> SUBJECTS
            </a>
        </li>

        {{-- Cities --}}
        <li>
            <a href="{{ route('admin.cities.index') }}"
               class="{{ request()->routeIs('admin.cities.*') ? 'active' : '' }}">
                <i class="bi bi-c-circle"></i> CITIES
            </a>
        </li>
    </ul>
</nav>
