@include('home.header')
<div class="dashboard-main-wrapper">
    @include('home.navbar')
    @include('home.sidebar')
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Manage Students Accounts </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Manage Users</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Students</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


            @empty($edit_admin)

            <div class="row">
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
                            <form method="POST" action="{{ route('store_students') }}">
                                @csrf
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-12 col-sm-8 col-lg-10">
                                                <input type="text" required="" placeholder="Full Name" name="full_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12 col-sm-8 col-lg-10">
                                                <input type="text" required="" placeholder="Home Address" name="address" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="input-group date col-12 col-sm-8 col-lg-10" id="datetimepicker1" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" placeholder="Date of birth" name="date_of_birth" data-target="#datetimepicker1" />
                                                <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12 col-sm-8 col-lg-10">
                                                <input type="text" required="" placeholder="Contact Number" name="contact_number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12 col-sm-8 col-lg-10">
                                                <input type="text" required="" placeholder="School graduated" name="school_graduated" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="input-group date col-12 col-sm-8 col-lg-10" id="datetimepicker2" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" placeholder="Date graduated" name="date_graduated" data-target="#datetimepicker2" />
                                                <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12 col-sm-8 col-lg-10">
                                                <input type="text" required="" placeholder="Exam taken" name="exam_takes" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-12 col-sm-8 col-lg-10">
                                                <input type="email" required="" placeholder="Email" name="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12 col-sm-8 col-lg-10">
                                                <input type="password" required="" placeholder="Password" name="password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12 col-sm-8 col-lg-10">
                                                <input type="password" required="" placeholder="Confirm Password" name="password_confirmation" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row text-left">
                                            <div class="col col-sm-12 col-lg-9 offset-sm-0 offset-lg-12">
                                                <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Students Accounts</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Date of Birth</th>
                                            <th>Exam Takes</th>
                                            <th>School Graduated</th>
                                            <th>Date Graduated</th>
                                            <th>Contact Number</th>
                                            <th>Registration Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($table as $table)
                                        <tr>
                                            <td>{{ $table->id }}</td>
                                            <td>{{ $table->full_name }}</td>
                                            <td>{{ $table->email }}</td>
                                            <td>{{ $table->date_of_birth }}</td>
                                            <td>{{ $table->exam_takes }}</td>
                                            <td>{{ $table->school_graduated }}</td>
                                            <td>{{ $table->date_graduated }}</td>
                                            <td>{{ $table->contact_number }}</td>
                                            <td>{{ $table->created_at }}</td>
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
                                            <th>Date of Birth</th>
                                            <th>Exam Takes</th>
                                            <th>School Graduated</th>
                                            <th>Date Graduated</th>
                                            <th>Contact Number</th>
                                            <th>Registration Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <h1>edit</h1>
            @endif

        </div>
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