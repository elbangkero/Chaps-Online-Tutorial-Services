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
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">{{ __('Verify Your Email Address') }} <i class="fas fa-exclamation-circle" style="color:red"></i> </div>

                                <div class="card-body">
                                    @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        {{ __('A fresh verification link has been sent to your email address.') }}
                                    </div>
                                    @endif
                                    {{ __('Before proceeding, please check your email for a verification link.') }}
                                    {{ __('If you did not receive the email') }},
                                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style="color:red"> {{ __('Click here to request another') }}</button>.
                                    </form>
                                </div>
                            </div>
                        </div>

                        @if(Auth::user()->is_active!=1)
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">Unsettled Payment <i class="fas fa-exclamation-circle" style="color:red"></i> </div>

                                <div class="card-body"> 
                                    Before Accessing our services you need to settle the payment first. Please settle your payment here :
                                    <a href="https://www.facebook.com/CHAPOPOYCRIMINOLOGY" style="color:red">https://www.facebook.com/CHAPOPOYCRIMINOLOGY</a>
                                </div>
                            </div>
                        </div>
                        @endif

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