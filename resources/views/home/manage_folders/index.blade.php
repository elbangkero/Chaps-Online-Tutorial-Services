@include('home.header')
<div class="dashboard-main-wrapper">
    @include('home.navbar')
    @include('home.sidebars.admin_sidebar')
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Manage Folders </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Manage Folders</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Folders</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @empty($edit_folder)
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
                        <h5 class="card-header">Add New Folder</h5>
                        <div class="card-body">
                            <form id="validationform" data-parsley-validate="" novalidate="" action="{{ route('store_folders') }}" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Folder Name</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input type="text" required="" placeholder="Enter Name" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Folder Type</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="folder_type" class="form-control">
                                            <option value="pdf">PDF</option>
                                            <option value="video">Video</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Folder option</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <div class="offset-lg-1">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="folder_function()" name='parent_option'>
                                            <label class="form-check-label" for="exampleCheck1">Root Folder</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" id="parent_folder">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Select Parent Folder</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="parent_id" class="form-control">

                                            @foreach($parent as $parent)
                                            <option value="{{$parent->id}}"> <b> {{$parent->folder_type}}</b> : {{$parent->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row text-right">
                                    <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                        <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                @foreach ($edit_folder as $folder)
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
                        <h5 class="card-header">Edit Folder</h5>
                        <div class="card-body">
                            <form id="validationform" data-parsley-validate="" novalidate="" action="{{ route('update_folders',$folder->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Folder Name</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input type="text" required="" placeholder="Enter Name" name="name" value="{{$folder->name}}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Folder Type</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="folder_type" class="form-control">
                                            @if($folder->folder_type=='pdf')
                                            <option value="pdf">PDF</option>
                                            <option value="video">Video</option>
                                            @elseif($folder->folder_type=='video')
                                            <option value="video">Video</option>
                                            <option value="pdf">PDF</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Folder option</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <div class="offset-lg-1">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="folder_function()" name='parent_option' @if($folder->parent_id=='0') checked @endif>
                                            <label class="form-check-label" for="exampleCheck1">Root Folder</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" id="parent_folder">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Select Parent Folder</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="parent_id" class="form-control">
                                            @if($selected_parent)
                                            <option value="{{$selected_parent->id}}"><b> {{$selected_parent->folder_type}}</b> : {{$selected_parent->name}}</option>
                                            @endif
                                            @foreach($parent as $parent)
                                            <option value="{{$parent->id}}"> <b> {{$parent->folder_type}}</b> : {{$parent->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row text-right">
                                    <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                        <button type="submit" class="btn btn-space btn-primary">Submit</button>
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
                            <h5 class="mb-0">Folder List</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Folder Name</th>
                                            <th>Folder Type</th>
                                            <th>Parent Folder</th>
                                            <th>Created By</th>
                                            <th>Date Created </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($table as $table)
                                        <tr>
                                            <td>{{ $table->id }}</td>
                                            <td>{{ $table->name }}</td>
                                            <td>{{ $table->folder_type }}</td>
                                            <td>
                                                @if($table->parent_id==0)
                                                Root Folder
                                                @else
                                                @php
                                                $id = $table->parent_id;
                                                $folder_name = DB::select("select * from folders where id = '".$id."' AND status = '1'");
                                                foreach($folder_name as $name)
                                                echo "$name->name";
                                                @endphp
                                                @endif

                                            </td>
                                            <td>{{ $table->created_by }}</td>
                                            <td>{{ $table->created_at }}</td>
                                            <td>
                                                <form action="{{ route('delete_folders',$table->id) }}" method="POST">
                                                    <a class="btn btn-primary btn-xs" type="button" href="{{ route('edit_folders',$table->id) }}"> <i class="fa fa-edit"></i> Edit </a>
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
                                            <th>Folder Name</th>
                                            <th>Folder Type</th>
                                            <th>Parent Folder</th>
                                            <th>Created By</th>
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

    function folder_function() {
        var checkBox = document.getElementById("exampleCheck1");
        var content = document.getElementById("parent_folder");
        if (checkBox.checked == true) {
            content.style.visibility = "hidden";
        } else {
            content.style.visibility = "visible";
        }
    }

    $(document).ready(function() {
        var checkBox = document.getElementById("exampleCheck1");
        var content = document.getElementById("parent_folder");
        if (checkBox.checked == true) {
            content.style.visibility = "hidden";
        } else {
            content.style.visibility = "visible";
        }
    });
</script>
@include('home.footer')