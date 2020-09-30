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

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#about" aria-expanded="true" aria-controls="about">
            <i class="fas fa-info-circle fa-sm fa-fw"></i>
            <span>About</span>
        </a>
        <div id="about" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Page:</h6>
                <a class="collapse-item {{Route::is('company-profile.index') ? 'active' : ''}}" href="{{route('company-profile.index')}}">Company Profile</a>
                <a class="collapse-item {{Route::is('mvv.index') ? 'active' : ''}}" href="{{route('mvv.index')}}">Mission, Vision, Value</a>
                <a class="collapse-item {{Route::is('milestones.index') ? 'active' : ''}}" href="{{route('milestones.index')}}">Milestones</a>
                <a class="collapse-item {{Route::is('executives.index') ? 'active' : ''}}" href="{{route('executives.index')}}">Executives</a>
                <a class="collapse-item {{Route::is('awards.index') ? 'active' : ''}}" href="{{route('awards.index')}}">Awards / Certification</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#business" aria-expanded="true" aria-controls="business">
            <i class="fas fa-business-time fa-sm fa-fw"></i>
            <span>Business</span>
        </a>
        <div id="business" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Page:</h6>
                <a class="collapse-item {{Route::is('coals.index') ? 'active' : ''}}" href="{{route('coals.index')}}">Coal & Mining Service</a>
                <a class="collapse-item {{Route::is('infrastructures.index') ? 'active' : ''}}" href="{{route('infrastructures.index')}}">Mining Infratructure & Other Service</a>
                <a class="collapse-item {{Route::is('port.index') ? 'active' : ''}}" href="{{route('port.index')}}">Port Management Service</a>
                <a class="collapse-item {{Route::is('operational-area.index') ? 'active' : ''}}" href="{{route('operational-area.index')}}">Operational Area</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{Route::is('blogs.index') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('blogs.index')}}">
            <i class="fas fa-rss fa-fw"></i>
            <span>Press Release</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading"> Pengaturan </div>

    <li class="nav-item {{Route::is('website.index') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('website.index')}}">
            <i class="fas fa-globe fa-fw"></i>
            <span>Website Profile</span>
        </a>
    </li>

    <li class="nav-item {{Route::is('sliders.index') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('sliders.index')}}">
            <i class="fas fa-fw fa-image"></i>
            <span>Sliders</span>
        </a>
    </li>

    <li class="nav-item {{Route::is('files.index') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('files.index')}}">
            <i class="fas fa-fw fa-image"></i>
            <span>Media</span>
        </a>
    </li>

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
