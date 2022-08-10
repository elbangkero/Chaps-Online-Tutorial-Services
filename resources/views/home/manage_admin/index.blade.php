@include('home.header')
<div class="dashboard-main-wrapper">
    @include('home.navbar')
    @include('home.sidebar')
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content"> 
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Manage Admin Accounts </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Manage Users</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Admin</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="row">
                @empty($edit_admin)
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
                        <h5 class="card-header">Add New Admin</h5>
                        <div class="card-body">
                            <form id="validationform" data-parsley-validate="" novalidate="" action="{{ route('store_admin') }}" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Full Name</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input type="text" required="" placeholder="Enter Name" name="full_name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">E-Mail</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input type="email" required="" data-parsley-type="email" placeholder="Enter a valid e-mail" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Password</label>
                                    <div class="col-sm-4 col-lg-3 mb-3 mb-sm-0">
                                        <input id="pass2" type="password" required="" placeholder="Password" name="password" class="form-control">
                                    </div>
                                    <div class="col-sm-4 col-lg-3">
                                        <input type="password" required="" data-parsley-equalto="#pass2" name="password_confirmation" placeholder="Re-Type Password" class="form-control">
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
                @foreach ($edit_admin as $admin)
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
                            <form id="validationform" data-parsley-validate="" novalidate="" action="{{ route('update_admin',$admin->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Full Name</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input type="text" required="" placeholder="Enter Name" name="full_name" value="{{$admin->full_name}}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">E-Mail</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input type="email" required="" data-parsley-type="email" placeholder="Enter a valid e-mail" value="{{$admin->email}}" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Password</label>
                                    <div class="col-sm-4 col-lg-3 mb-3 mb-sm-0">
                                        <input id="pass2" type="password" required="" placeholder="Password" name="password" class="form-control">
                                    </div>
                                    <div class="col-sm-4 col-lg-3">
                                        <input type="password" required="" data-parsley-equalto="#pass2" name="password_confirmation" placeholder="Re-Type Password" class="form-control">
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
                            <h5 class="mb-0">Admin Accounts</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Date Created</th>
                                            <th>Date Updated </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($table as $table)
                                        <tr>
                                            <td>{{ $table->id }}</td>
                                            <td>{{ $table->full_name }}</td>
                                            <td>{{ $table->email }}</td>
                                            <td>{{ $table->created_at }}</td>
                                            <td>{{ $table->updated_at }}</td>
                                            <td>
                                                <form action="{{ route('delete_admin',$table->id) }}" method="POST">
                                                    <a class="btn btn-primary btn-xs" type="button" href="{{ route('edit_admin',$table->id) }}"> <i class="fa fa-edit"></i> Edit </a>
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
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Date Created</th>
                                            <th>Date Updated </th>
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
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="javascript: void(0);">About</a>
                            <a href="javascript: void(0);">Support</a>
                            <a href="javascript: void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
</script>
@include('home.footer')