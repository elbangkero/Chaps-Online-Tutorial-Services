@include('home.header')

<div class="dashboard-main-wrapper">
    @include('home.navbar')
    @include('home.sidebar')
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-12">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header" id="top">
                                <h2 class="pageheader-title">Videos </h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Reviewers Videos</a></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <!-- .card -->
                            <div class="card card-figure">
                                <!-- .card-figure -->
                                <figure class="figure">
                                    <!-- .figure-img -->
                                    <div class="figure-img">
                                        <img class="img-fluid" src="{{asset('public/storage/assets/images/card-img.jpg')}}" alt="Card image cap">
                                        <div class="figure-action">
                                            <a href="{{route('view_reviewers')}}" class="btn btn-block btn-sm btn-primary">View PDF</a>
                                        </div>
                                    </div>
                                </figure>
                                <!-- /.card-figure -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <!-- .card -->
                            <div class="card card-figure">
                                <!-- .card-figure -->
                                <figure class="figure">
                                    <!-- .figure-img -->
                                    <div class="figure-img">
                                        <img class="img-fluid" src="{{asset('public/storage/assets/images/card-img.jpg')}}" alt="Card image cap">
                                        <div class="figure-action">
                                            <a href="#" class="btn btn-block btn-sm btn-primary">View PDF</a>
                                        </div>
                                    </div>
                                </figure>
                                <!-- /.card-figure -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <!-- .card -->
                            <div class="card card-figure">
                                <!-- .card-figure -->
                                <figure class="figure">
                                    <!-- .figure-img -->
                                    <div class="figure-img">
                                        <img class="img-fluid" src="{{asset('public/storage/assets/images/card-img.jpg')}}" alt="Card image cap">
                                        <div class="figure-action">
                                            <a href="#" class="btn btn-block btn-sm btn-primary">View PDF</a>
                                        </div>
                                    </div>
                                </figure>
                                <!-- /.card-figure -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <!-- .card -->
                            <div class="card card-figure">
                                <!-- .card-figure -->
                                <figure class="figure">
                                    <!-- .figure-img -->
                                    <div class="figure-img">
                                        <img class="img-fluid" src="{{asset('public/storage/assets/images/card-img.jpg')}}" alt="Card image cap">
                                        <div class="figure-action">
                                            <a href="#" class="btn btn-block btn-sm btn-primary">View PDF</a>
                                        </div>
                                    </div>
                                </figure>
                                <!-- /.card-figure -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <!-- .card -->
                            <div class="card card-figure">
                                <!-- .card-figure -->
                                <figure class="figure">
                                    <!-- .figure-img -->
                                    <div class="figure-img">
                                        <img class="img-fluid" src="{{asset('public/storage/assets/images/card-img.jpg')}}" alt="Card image cap">
                                        <div class="figure-action">
                                            <a href="#" class="btn btn-block btn-sm btn-primary">View PDF</a>
                                        </div>
                                    </div>
                                </figure>
                                <!-- /.card-figure -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>


                </div>
            </div>
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
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
</div>
@include('home.footer')