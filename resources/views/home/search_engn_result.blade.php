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
            <div class="row" style="margin-bottom:30px;">
                <div class="col-lg-6 offset-lg-3">
                    <form action="{{route('search_engine')}}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="keyword" placeholder="Search what you need here... ">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary"><span class="fa fa-search"></span></button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>


            <!-- BODY Start -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header" id="top">
                        <h2 class="pageheader-title">Search Result : {{$result->count()}} </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <div class="col-lg-6">
                                        @foreach($result as $data)
                                        <h3>

                                            @if($data->type=='pdf')
                                            <a href="{{route('view_reviewers',$data->id)}}">{{$data->name}}</a>
                                            @elseif($data->type=='videos')
                                            <a href="{{route('view_video',$data->id)}}">{{$data->name}}</a>
                                            @elseif($data->type=='users')
                                            @if($data->first_entry == '1')
                                            <a href="{{ route('edit_admin',$data->id) }}">{{$data->name}} :  <a style="font-size: 15px;color:black">[Admin account], {{$data->email}}</a>
                                                @else
                                                <a href="{{ route('edit_student',$data->id) }}">{{$data->name}} : <a style="font-size: 15px;color:black">[Student account], {{$data->email}}</a>
                                                    @endif
                                                    @endif
                                                    <div class="col-lg-12">
                                                        @if($data->type=='pdf')
                                                        @php
                                                        $convert = strtotime($data->first_entry);
                                                        $date = date('M d, Y', $convert);
                                                        @endphp
                                                        <ol style="font-size: 15px;color:black">[PDF Reviewer], Date Uploaded : {{$date}}, Uploaded by : {{$data->last_entry}}</ol>
                                                        @elseif($data->type=='videos')
                                                        @php
                                                        $convert = strtotime($data->first_entry);
                                                        $date = date('M d, Y', $convert);
                                                        @endphp
                                                        <ol style="font-size: 15px;color:black">[Video], Date Uploaded : {{$date}}, Uploaded by : {{$data->last_entry}}</ol>
                                                        @elseif($data->type=='users')
                                                        @php
                                                        $convert = strtotime($data->last_entry);
                                                        $date = date('M d, Y', $convert);
                                                        @endphp
                                                        <ol style="font-size: 15px;color:black">[Account], Last Login: {{$date}}</ol>
                                                        @endif
                                                    </div>
                                                </a>
                                        </h3>
                                        @endforeach
                                    </div>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="float: right;margin:0 0 200px 0">
                <!-- ============================================================== -->
                <!-- paginations  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            {{$result->appends(['keyword' => $keyword] )->links()}}
                        </ul>
                    </nav>
                </div>
                <!-- ============================================================== -->
                <!-- pagination  -->
                <!-- ============================================================== -->
            </div>

            <!-- BODY END -->




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