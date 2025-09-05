<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <a class="nav-link" href="{{ route('admin.create') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>
                    Create Blog
                </a>

                <a class="nav-link" href="{{ route('categories.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    Categories
                </a>

                <a class="nav-link" href="{{ route('admin.create') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                    Add Admin
                </a>

                <a class="nav-link" href="{{ route('blogs.index') }}" target="_blank">
                    <div class="sb-nav-link-icon"><i class="fas fa-globe"></i></div>
                    View Site
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name ?? 'Admin' }}
        </div>
    </nav>
</div>
