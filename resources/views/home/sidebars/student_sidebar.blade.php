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
                        Student Menu
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link @if (\Route::getFacadeRoot()->current()->uri() == 'reviewers') active @endif" href="{{route('reviewers')}}?page=1"><i class="fa fa-fw fa-file"></i>Reviewers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (\Route::getFacadeRoot()->current()->uri() == 'videos' || \Route::getFacadeRoot()->current()->uri() == 'view_video') active @endif" href="{{route('videos')}}?page=1"><i class="fa fa-fw fa-video"></i>Videos</a>
                    </li> 
                </ul>
            </div>
        </nav>
    </div>
</div>