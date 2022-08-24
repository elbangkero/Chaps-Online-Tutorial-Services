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
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
</div>
@include('home.footer')