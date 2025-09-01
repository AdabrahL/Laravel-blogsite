<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Brand -->
    <a class="navbar-brand ps-3" href="{{ route('admin.dashboard') }}">My Admin</a>

    <!-- Sidebar Toggle -->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0"
        id="sidebarToggle"><i class="fas fa-bars"></i></button>

    <!-- Right Side -->
    <ul class="navbar-nav ms-auto me-3">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</nav>
