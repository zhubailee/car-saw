<nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom" data-background-color="purple">
    <div class="container-fluid">
        <nav
            class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
        </nav>

        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">

            <li class="nav-item topbar-user dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                    aria-expanded="false">
                    <span class="profile-username">
                        <span class="op-7">Hi,</span>
                        <span class="fw-bold">{{ Auth::check() ? Auth::user()->name : 'Demo' }}</span>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="u-text">
                                    <h4>{{ Auth::check() ? Auth::user()->name : 'Demo' }}</h4>
                                    <p class="text-muted">{{ Auth::check() ? Auth::user()->email : 'hello@example.com' }}</p>
                                    <button type="button" class="btn btn-xs btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#viewProfile">View
                                        Profile</button>
                                    <button type="button" class="btn btn-xs btn-danger btn-sm" onclick="window.location='{{ route('logout') }}'">Logout</button>
                                </div>
                            </div>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>
