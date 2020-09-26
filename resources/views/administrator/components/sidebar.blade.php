<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        {{-- <img src="{{ asset('img/logo-light.png') }}" alt="Logo" width="80%"> --}}
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">DarmaHenwa <sup>Panel</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{Route::is('dashboard') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading"> Website </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{Route::is('files.index') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('files.index')}}">
            <i class="fas fa-fw fa-image"></i>
            <span>Media</span>
        </a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{Route::is('sliders.index') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('sliders.index')}}">
            <i class="fas fa-fw fa-image"></i>
            <span>Sliders</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading"> Pengaturan </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{Route::is('users.index') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('users.index')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>User</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
