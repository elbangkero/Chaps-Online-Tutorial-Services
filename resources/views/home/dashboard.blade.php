@include('home.header')

<div class="dashboard-main-wrapper">
    @include('home.navbar')
 

    <div class="home-dashboard">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-12">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header" id="top">
                                <h2 class="pageheader-title">Dashboard</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                        </ol>
                                    </nav>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                @if(auth()->user()->user_type =='1')
                <div class="col-lg-6">
                    <a class="card-cta" href="{{route('manage_reviewers')}}">
                        <div class="card card-large-icons  card-left ">
                            <div class="row">
                                <div class="col-xs-6 col-lg-3 col-4">
                                    <i class="fas fa-users icon-dashboard"></i>
                                </div>
                                <div class="col-xs-6 ol-lg-9 col-8">
                                    <div class="card-body">
                                        <h4>Admin</h4>
                                        <p>Administration Panel</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                 @endif
                <div class="col-lg-6">
                    <a class="card-cta" href="{{route('reviewers')}}">
                        <div class="card card-large-icons  card-left ">
                            <div class="row">
                            <div class="col-xs-6 col-lg-3 col-4">
                                    <i class="fab fa-readme icon-dashboard"></i>
                                </div>
                                <div class="col-xs-6 ol-lg-9 col-8">
                                    <div class="card-body">
                                        <h4>Student</h4>
                                        <p>Collection of reviewer and videos</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>


        </div>
        <div class="footer" style="   position: fixed;bottom: 0;width: 100%;">
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
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
</div>
@include('home.footer')