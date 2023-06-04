@include('home.header')
<div class="dashboard-main-wrapper">
    @include('home.navbar')
    @include('home.sidebars.admin_sidebar')
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Manage Videos</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Manage Videos</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @empty($edit_video)
                <div class="col-md-12">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                        Session::forget('success');
                        @endphp
                    </div>
                    @endif
                    @if ($message = Session::get('delete'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <h6>{{ $error }}</h6>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Add New Video</h5>
                        <div class="card-body">
                            <form id="validationform" data-parsley-validate="" novalidate="" action="{{ route('store_video') }}" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Video Name</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input type="text" required="" placeholder="Enter Name" name="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row" id="parent_folder">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Select Folder</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="folder_id" class="form-control">

                                            @foreach($parent as $parent)
                                            <option value="{{$parent->id}}" style="font-weight: bold; text-transform: uppercase;"> {{$parent->name}} </option>
                                            @php
                                            $id = $parent->id;
                                            $child_folder = DB::select("select * from folders where parent_id = '".$id."' AND status = '1' ");
                                            foreach($child_folder as $folder)
                                            echo "<option value='$folder->id'>
                                                &nbsp&nbsp&nbsp&nbsp
                                                $parent->name : $folder->name
                                            </option>";
                                            @endphp
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Video Type</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <div class="offset-lg-1">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="folder_function()" name='parent_option' checked>
                                            <label class="form-check-label" for="exampleCheck1">Youtube Video</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row"  id="yt_link">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Youtube Video Link</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input type="text" required="" placeholder="Enter youtube link" name="link" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row" style="visibility:hidden"  id="local_link">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Video File</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input type="file" name="video">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Status</label>
                                    <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                        <div class="switch-button switch-button-yesno">
                                            <input type="checkbox" checked="" name="status" id="switch19"><span>
                                                <label for="switch19"></label></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row text-right">
                                    <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                        <button type="submit" onclick="return handleChange()" class="btn btn-space btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                @foreach ($edit_video as $video)
                <div class="col-md-12">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                        Session::forget('success');
                        @endphp
                    </div>
                    @endif
                    @if ($message = Session::get('delete'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <h6>{{ $error }}</h6>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Edit Admin</h5>
                        <div class="card-body">
                            <form id="validationform" data-parsley-validate="" novalidate="" action="{{ route('update_video',$video->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Video Name</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input type="text" required="" placeholder="Enter Name" name="name" class="form-control" value="{{$video->name}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Youtube Video Link</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input type="text" required="" placeholder="Enter Name" name="link" class="form-control" value="https://www.youtube.com/watch?v={{$video->link}}" required>
                                    </div>
                                </div>
                                <div class="form-group row" id="parent_folder">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Select Folder</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="folder_id" class="form-control">
                                            <option value="{{$selected_folder->id}}">{{$selected_folder->name}}</option>
                                            @foreach($parent as $parent)
                                            <option value="{{$parent->id}}" style="font-weight: bold; text-transform: uppercase;"> {{$parent->name}} </option>
                                            @php
                                            $id = $parent->id;
                                            $child_folder = DB::select("select * from folders where parent_id = '".$id."' AND status = '1' ");
                                            foreach($child_folder as $folder)
                                            echo "<option value='$folder->id'>
                                                &nbsp&nbsp&nbsp&nbsp
                                                $parent->name : $folder->name
                                            </option>";
                                            @endphp
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Status</label>
                                    <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                        <div class="switch-button switch-button-yesno">
                                            <input type="checkbox" @if ($video->status=='1') ? checked="" : ; @endif name="status" id="switch19"><span>
                                                <label for="switch19"></label></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row text-right">
                                    <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                        <button type="submit" onclick="return handleChange()" class="btn btn-space btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
                @endempty
            </div>
            <div class="row">
                <!-- ============================================================== -->
                <!-- data table  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Video List</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Video Name</th>
                                            <th>Created By</th>
                                            <th>Video Status</th>
                                            <th>Date Created </th>
                                            <th>Video Type </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($table as $table)
                                        <tr>
                                            <td>{{ $table->id }}</td>
                                            <td>{{ $table->name }}</td>
                                            <td>{{ $table->created_by }}</td>
                                            <td>@if ( $table->status == "1")
                                                Active @else Inactive @endif</td>
                                            <td>{{ $table->created_at }}</td>
                                            <td>@if ( $table->video_type == "1")
                                                Youtube @else Local @endif</td>
                                            <td>
                                                <form action="{{ route('delete_video',$table->id) }}" method="POST">
                                                    <a class="btn btn-primary btn-xs" type="button" href="{{ route('edit_video',$table->id) }}"> <i class="fa fa-edit"></i> Edit </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirmSubmit()" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-remove"></i> Delete </button>

                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Video Name</th>
                                            <th>Created By</th>
                                            <th>Video Status</th>
                                            <th>Date Created </th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end data table  -->
                <!-- ============================================================== -->
            </div>





        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white mt-5 py-3 px-sm-3 px-md-5 footer-home">
            <div class="row">
                <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                    <p class="m-0 text-white">&copy; <a href="#">Chaps Online Tutorial Services</a>. All Rights Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed by <a href="https://github.com/elbangkero">https://github.com/elbangkero</a>
                    </p>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>
</div>
<script>
    function confirmSubmit() {
        var agree = confirm("Are you sure you wish to continue?");
        if (agree)
            return true;
        else
            return false;
    }

    function handleChange() {
        myfile = $('#PDFupload').val();
        var ext = myfile.split('.').pop();
        if (ext != "pdf") {
            if (document.getElementById("PDFupload").files.length == 0) {
                alert('Missing File');
                return false;
            } else {
                alert('File Must be .pdf ');
                return false;
            }
        }
    }

    function folder_function() {
        var checkBox = document.getElementById("exampleCheck1");
        var yt_link = document.getElementById("yt_link");
        var local_link = document.getElementById("local_link");
        if (checkBox.checked == true) {
            yt_link.style.visibility = "visible";
            local_link.style.visibility = "hidden";
        } else {
            yt_link.style.visibility = "hidden";
            local_link.style.visibility = "visible";
        }
    }
</script>
@include('home.footer')