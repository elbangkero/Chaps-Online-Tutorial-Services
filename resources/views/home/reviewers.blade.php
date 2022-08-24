@include('home.header')

<div class="dashboard-main-wrapper">
    @include('home.navbar')
    @include('home.sidebars.student_sidebar')
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
        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white mt-5 py-3 px-sm-3 px-md-5 footer-home">
            <div class="row">
                <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                    <p class="m-0 text-white">&copy; <a href="#">Chaps Online Tutorial Services</a>. All Rights Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed by <a href="https://htmlcodex.com">https://github.com/elbangkero</a>
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