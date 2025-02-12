<div class="sidebar" data-background-color="white">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="purple2">
            <a href="index.html" class="logo">
                <img src="{{ asset('') }}assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                    height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="collapsed">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <h1 class="text-section">Menu</h1>
                </li>
                <li class="nav-item {{ Request::is('alternative') ? 'active' : '' }}">
                    <a href="{{ route('alternative.index') }}">
                        <i class="fas fa-car-alt"></i>
                        <p>Alternatives</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('criteria') ? 'active' : '' }}">
                    <a href="{{ route('criteria.index') }}">
                        <i class="fas fa-file-alt"></i>
                        <p>Criterias</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('subcriteria') ? 'active' : '' }}">
                    <a href="{{ route('subcriteria.index') }}">
                        <i class="fas fa-file-archive"></i>
                        <p>Subcriterias</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('calculation') ? 'active' : '' }}">
                    <a href="{{ route('calc.index') }}">
                        <i class="fas fa-calculator"></i>
                        <p>Calculation</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
