@include('home.header')
<div class="dashboard-main-wrapper">
    @include('home.navbar')
    @include('home.sidebars.admin_sidebar')
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
                            <form id="frm-edt-admin" data-parsley-validate="" novalidate="" data-id="{{ $admin->id }}" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Full Name</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input type="text" required="" placeholder="Enter Name" name="full_name" id="full_name" value="{{$admin->full_name}}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">E-Mail</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input type="email" required="" data-parsley-type="email" placeholder="Enter a valid e-mail" value="{{$admin->email}}" name="email" id="email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Password</label>
                                    <div class="col-sm-4 col-lg-3 mb-3 mb-sm-0">
                                        <input id="pass2" type="password"  placeholder="Password" name="password" id="password" class="form-control">
                                    </div>
                                    <div class="col-sm-4 col-lg-3">
                                        <input type="password"  data-parsley-equalto="#pass2" name="password_confirmation" placeholder="Re-Type Password" class="form-control">
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
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script type="text/javascript">
    $("#frm-edt-admin").validate({
        submitHandler: function(form) {
            // Retrieve form field values
            var full_name = $("#full_name").val();
            var email = $("#email").val();
            var password = $("#pass2").val(); // Get the password field value
            var password_confirmation = $("input[name='password_confirmation']").val();
            // Get the ID from the form's data-id attribute
            var id = $('#frm-edt-admin').data('id');

            // Set the URL for the Ajax request
            var url = `/update_admin/${id}`;


            $.ajax({
                url: url,
                type: 'POST',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'), // Laravel CSRF token
                    full_name: full_name, // Match backend field names
                    email: email,
                    password: password,
                    password_confirmation: password_confirmation
                },
                success: function(response) {
                    // Handle successful update
                    if (response.status === 'success') {
                        alert('Data updated successfully');
                        $("input[name='password_confirmation']").val('');
                        $("#pass2").val(''); 
                    } else {
                        alert('Failed to update data.');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(xhr.responseText);
                    alert('An error occurred while updating the data.');
                }
            });
        }
    });
</script>
@include('home.footer')