<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @if (\Route::getFacadeRoot()->current()->uri() == 'reviewers') active @endif" href="{{route('reviewers')}}?page=1"><i class="fa fa-fw fa-file"></i>Reviewers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (\Route::getFacadeRoot()->current()->uri() == 'videos' || \Route::getFacadeRoot()->current()->uri() == 'view_video') active @endif" href="{{route('videos')}}?page=1"><i class="fa fa-fw fa-video"></i>Videos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (\Route::getFacadeRoot()->current()->uri() == 'manage_reviewers') active @endif" href="{{route('manage_reviewers')}}"><i class="fa fa-fw fa-tasks"></i>Manage Reviewers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (\Route::getFacadeRoot()->current()->uri() == 'manage_videos') active @endif" href="{{route('manage_videos')}}"><i class="fas fa-file-video"></i>Manage Video</a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link @if (\Route::getFacadeRoot()->current()->uri() == 'student_index' || \Route::getFacadeRoot()->current()->uri() == 'admin_index') active @endif" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i> Manage Users <span class="badge badge-success">6</span></a>
                        <div id="submenu-1" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{route('student_index')}}">Students</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin_index')}}">Admin</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('services_index')}}"><i class="fas fa-clipboard"></i>Manage Services</a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</div>