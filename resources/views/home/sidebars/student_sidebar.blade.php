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
                        <a class="nav-link @if (\Route::getFacadeRoot()->current()->uri() == 'reviewers' && app('request')->input('folder')==null) active @endif " href="{{route('reviewers')}}?page=1"><i class="fa fa-fw fa-file" style="color: #f88c20;"></i>Reviewers</a>
                        <div class="collapse show" id="submenu1" aria-expanded="false">
                            <ul class="flex-column pl-2 nav">
                                @foreach($folders_pdf as $folder)
                                <li class="nav-item">
                                    <a class="nav-link  py-0 @if(app('request')->input('folder')==$folder->id) active @endif" href="{{route('reviewers')}}?page=1&folder={{$folder->id}}"><i class="fa fa-fw fa-folder"></i>{{$folder->name}}</a>
                                    <div class="collapse show" id="submenu1sub1" aria-expanded="false">
                                        <ul class="flex-column nav pl-4">
                                            @php
                                            $parent_id = $folder->id;
                                            $child_folder = DB::select("select * FROM folders where status = '1' and parent_id = '".$parent_id."' and folder_type ='pdf'");
                                            foreach($child_folder as $name)  
                                            echo " <li class='nav-item'>
                                                <a class='nav-link p-1 text-truncate ".(app("request")->input("folder")==$name->id ? "active" : "")."' href='".route("reviewers")."?page=1&folder=$name->id'>
                                                    <i class='fa fa-fw fa-folder'></i> $name->name
                                                </a>
                                            </li>";
                                            @endphp

                                        </ul>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link @if (\Route::getFacadeRoot()->current()->uri() == 'videos' && app('request')->input('folder')==null) active @endif" href="{{route('videos')}}?page=1"><i class="fa fa-fw fa-video" style="color: #f88c20;"></i>Videos</a>
                        <div class="collapse show" id="submenu1" aria-expanded="false">
                            <ul class="flex-column pl-2 nav">
                                @foreach($folders_video as $folder)
                                <li class="nav-item">
                                    <a class="nav-link  py-0 @if(app('request')->input('folder')==$folder->id) active @endif" href="{{route('videos')}}?page=1&folder={{$folder->id}}"><i class="fa fa-fw fa-folder"></i>{{$folder->name}}</a>
                                    <div class="collapse show" id="submenu1sub1" aria-expanded="false">
                                        <ul class="flex-column nav pl-4">
                                            @php
                                            $parent_id = $folder->id;
                                            $child_folder = DB::select("select * FROM folders where status = '1' and parent_id = '".$parent_id."' and folder_type ='video'");
                                            foreach($child_folder as $name)
                                            echo " <li class='nav-item'>
                                                <a class='nav-link p-1 text-truncate ".(app("request")->input("folder")==$name->id ? "active" : "")."' href='".route("videos")."?page=1&folder=$name->id'>
                                                    <i class='fa fa-fw fa-folder'></i> $name->name
                                                </a>
                                            </li>";
                                            @endphp

                                        </ul>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>