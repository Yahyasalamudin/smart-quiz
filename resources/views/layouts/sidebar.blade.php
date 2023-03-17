<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="profile-holder">
                <img src="{{ url('storage/profile/' . auth()->user()->profile) }}" alt="Profile"
                    class="img-circle profile">
            </div>
            <div class="info">
                <a href="#" class="pl-3 d-block">{{ auth()->user()->nama }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('class') }}" class="nav-link {{ Route::is('class') ? 'active' : '' }}">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>
                            Class
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('quiz') }}" class="nav-link {{ Route::is('quiz') ? 'active' : '' }}">
                        <i class="nav-icon far fa-question-circle"></i>
                        <p>
                            Quiz
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profile', auth()->user()->id) }}"
                        class="nav-link {{ Route::is('editprofile') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-edit"></i>
                        <p>
                            Edit Profile
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
