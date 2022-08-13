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
                        <div class="col-md-6">
                            <div class="page-header" id="top">
                                <h2 class="pageheader-title">Reviewers</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Reviewers PDF</a></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <form action="{{route('reviewers')}}" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="keyword" placeholder="Search PDF here....">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary"><span class="fa fa-search"></span></button>
                                    </div>

                                </div>
                            </form> 
                        </div>
                    </div>
                    <div class="row">
                        @foreach($pdf as $data)
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-6 card-wrapper">
                            <!-- .card -->
                            <div class="card card-figure">
                                <!-- .card-figure -->
                                <figure class="figure">
                                    <!-- .figure-img -->
                                    <div class="figure-img">
                                        <div class="box-img">
                                            <img src="{{ asset('public/' . $data->thumbnail) }}" class="pdf-img" alt="Example image" />
                                        </div>
                                        <div class="figure-action">
                                            <a href="{{route('view_reviewers',$data->id)}}" class="btn btn-block btn-sm btn-primary">View PDF</a>
                                        </div>
                                    </div>
                                </figure>
                                <!-- /.card-figure -->
                            </div>

                            <h2 class="card-title">{{$data->name}}</h2>
                            <!-- /.card -->
                        </div>

                        @endforeach
                    </div>
                    <div class="row" style="float: right;">
                        <!-- ============================================================== -->
                        <!-- paginations  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination"> 
                                    {{$pdf->appends(['keyword' => $keyword] )->links()}}
                                </ul>
                            </nav>
                        </div>
                        <!-- ============================================================== -->
                        <!-- pagination  -->
                        <!-- ============================================================== -->
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