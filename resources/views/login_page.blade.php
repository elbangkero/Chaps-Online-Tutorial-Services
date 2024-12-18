<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Chaps Online Tutorial Services</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/storage/img/image0.png')}}" />

    <!-- Google Web Fonts -->
    <link href="{{asset('public/storage/css/fonts.googleapis.css')}}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{asset('public/storage/fontawesome/css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('storage/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('public/storage/css/style.css')}}" rel="stylesheet">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>


</head>
<style>
    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 9999;
        /* Sit on top */
        padding-top: 7px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        position: relative;
        background-color: #f88c20;
        margin: auto;
        padding: 0;
        border: 1px solid black;
        max-width: 100%;
        width: 400px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }

    @keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }

    /* The Close Button */
    .close {
        color: black;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-header {
        padding: 2px 16px;
        height: 30px;
        background-color: white;
        color: white;
    }

    .modal-body {
        padding: 2px 16px;
    }

    .modal-footer {
        padding: 2px 16px;
        background-color: #004F9E;
        color: white;
    }

    div.parent {
        text-align: center;
    }

    ul {
        display: inline-block;
        text-align: left;
    }

    button {
        background-color: #004F9E;
        /* Green */
        border: 2px solid #004F9E;
        border-radius: 5px;
        color: white;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
    }

    button {
        transition-duration: 0.4s;
    }

    button:hover {
        background-color: white;
        color: black;
        border: 2px solid #004F9E;
    }

    /* #myBtn {
            display: flex;
            justify-content: center;
            border: none;
        } */
</style>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid" style="background-color: #060c35;">
        <div class="row py-3 px-lg-3">
            <div class="col-lg-6 text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex  text-white">
                    <small><i class="fa fa-phone-alt mr-2"></i>0926-056-8167</small>
                    <small class="px-3">|</small>
                    <small>chapsonlinets2021@gmail.com</small>
                </div>
            </div>
            <div class="col-lg-6  text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white pl-2" target=”_blank” href="https://www.youtube.com/c/ACLEMentoringbyChapsBLEC">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
    <!-- Trigger/Open The Modal -->
    <div class="parent" style="display:none">
        <button id="myBtn">Ver Video</button>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-body">
                <span class="close">&times;</span>
                <div style='text-align:center'>
                    <video id="myVideo" width="100%" height="95%" controls>
                        <source src="/public/storage/videos/OST_CHAPS.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>


        </div>
    </div>

    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand ml-lg-3">
                <h6 class="m-0 display-10 text-uppercase text-primary"><i><img src="{{asset('public/storage/img/image0.png')}}" alt="" id="IdTitle"></i> <u><b> Chaps Online Tutorial Services </b></u> </h6>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" style="display:none">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav m-auto py-0" style="visibility: hidden;">
                    <a href="index.html" class="nav-item nav-link active">Home</a>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="service.html" class="nav-item nav-link">Service</a>
                    <a href="price.html" class="nav-item nav-link">Price</a>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                </div>
                <a href="{{route('registration')}}" class="btn btn-primary py-2 px-4 d-none d-lg-block">Register Now!</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div id='carousel-login'>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item">
                    <img class="d-block carousel-img" src="{{asset('public/storage/img/car1.jpg')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block carousel-img" src="{{asset('public/storage/img/car2.jpg')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block carousel-img" src="{{asset('public/storage/img/car3.jpg')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block carousel-img" src="{{asset('public/storage/img/car4.jpg')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block carousel-img" src="{{asset('public/storage/img/car5.jpg')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block carousel-img" src="{{asset('public/storage/img/car6.jpg')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block carousel-img" src="{{asset('public/storage/img/car7.jpg')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block carousel-img" src="{{asset('public/storage/img/may_3_2023/new1.png')}}" alt="First slide">
                </div>

                <div class="carousel-item">
                    <img class="d-block carousel-img" src="{{asset('public/storage/img/may_3_2023/new3.png')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block carousel-img" src="{{asset('public/storage/img/may_3_2023/new5.png')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block carousel-img" src="{{asset('public/storage/img/may_3_2023/new7.png')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block carousel-img" src="{{asset('public/storage/img/car10.png')}}" alt="First slide">
                </div>
                                <div class="carousel-item">
                    <img class="d-block carousel-img" src="{{asset('public/storage/img/main.png')}}" alt="First slide">
                </div>
                                <div class="carousel-item">
                    <img class="d-block carousel-img" src="{{asset('public/storage/img/car12.png')}}" alt="First slide">
                </div>
                                <div class="carousel-item">
                    <img class="d-block carousel-img" src="{{asset('public/storage/img/car13.png')}}" alt="First slide">
                </div>
                <div class="carousel-item active">
                    <img class="d-block carousel-img" src="{{asset('public/storage/img/main.png')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block carousel-img" src="{{asset('public/storage/img/lecture1.jpg')}}" alt="First slide">
                </div>
                                <div class="carousel-item">
                    <img class="d-block carousel-img" src="{{asset('public/storage/img/lecture2.jpg')}}" alt="First slide">
                </div>
                                <div class="carousel-item">
                    <img class="d-block carousel-img" src="{{asset('public/storage/img/lecture3.jpg')}}" alt="First slide">
                </div>
                                <div class="carousel-item">
                    <img class="d-block carousel-img" src="{{asset('public/storage/img/lecture4.jpg')}}" alt="First slide">
                </div>
                                <div class="carousel-item">
                    <img class="d-block carousel-img" src="{{asset('public/storage/img/lecture5.jpg')}}" alt="First slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span> </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span> </a>
        </div>
    </div>
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 pb-4 pb-lg-0">
                    <img class="card-img-top" src="{{asset('public/storage/img/team/nolie.jpg')}}" alt="">
                    <div class="bg-primary text-dark text-center p-4">
                        <h4 class="m-0">Nolie Z. Ingcad</h4>
                        <span>Review Director</span>
                    </div>
                </div>
                <div class="col-lg-7">
                    <h6 class="text-primary text-uppercase font-weight-bold">About Us</h6>
                    <h4 class="mb-4"> Chaps Online Tutorial Services (Chapopoy Criminology) <br> OWNED BY A REGISTERED CRIMINOLOGIST.
                    </h4>
                    <p class="mb-4"> ACHIEVE YOUR DREAMS WITH US!</p>
                </div>
            </div>
        </div>
        <!-- Video Modal -->
        <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <!-- 16:9 aspect ratio -->
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always" allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!--  Quote Request Start -->
    <div class="container-fluid bg-secondary my-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 py-5 py-lg-0">
                    <h6 class="text-primary text-uppercase font-weight-bold">Get A Quote</h6>
                    <h1 class="mb-4">Join us now!</h1>
                    <p class="mb-4">The most reliable and effective review center today in the Philippines. <br> Chaps Online Tutorial services</p>
                  
                    <div class="row mb-3 d-flex flex-column justify-content-center align-items-center">

                        
                        <div class="col-sm-4 d-flex flex-column justify-content-center align-items-center">
                            <h6 style="font-size: 13px;" class="font-weight-bold">842/1,038 PASSERS</h6>
                            <h1 class="text-primary" data-toggle="counter-up">81.11%</h1>
                            <h6 class="font-weight-bold">JULY - AUGUST 2024</h6>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4 d-flex flex-column justify-content-center align-items-center">
                            <h6 style="font-size: 13px;" class="font-weight-bold">517/613 PASSERS</h6>
                            <h1 class="text-primary" data-toggle="counter-up">84.34%</h1>
                            <h6 class="font-weight-bold">FEBRUARY 2024</h6>
                        </div>
                        
                        <div class="col-sm-4 d-flex flex-column justify-content-center align-items-center">
                            <h6 style="font-size: 13px;" class="font-weight-bold">242/257 PASSERS</h6>
                            <h1 class="text-primary" data-toggle="counter-up">94.16%</h1>
                            <h6 class="font-weight-bold">AUGUST 2023</h6>
                        </div>
                        
                        <div class="col-sm-4 d-flex flex-column justify-content-center align-items-center">
                            <h6 style="font-size: 13px;" class="font-weight-bold">187/213 PASSERS</h6>
                            <h1 class="text-primary" data-toggle="counter-up">87.79%</h1>
                            <h6 class="font-weight-bold">APRIL 2023</h6>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-4 d-flex flex-column justify-content-center align-items-center">
                            <h6 style="font-size: 13px;" class="font-weight-bold">323/330 PASSERS</h6>
                            <h1 class="text-primary" data-toggle="counter-up">97.5%</h1>
                            <h6 class="font-weight-bold">DECEMBER 2022</h6>
                        </div>
                        <div class="col-sm-4 d-flex flex-column justify-content-center align-items-center">
                            <h6 style="font-size: 13px;" class="font-weight-bold">508/514 PASSERS</h6>
                            <h1 class="text-primary" data-toggle="counter-up">98.83%</h1>
                            <h6 class="font-weight-bold">JUNE 2022</h6>
                        </div>
                        <div class="col-sm-4 d-flex flex-column justify-content-center align-items-center">
                            <h6 style="font-size: 13px;" class="font-weight-bold">257/261 PASSERS</h6>
                            <h1 class="text-primary" data-toggle="counter-up">98.47%</h1>
                            <h6 class="font-weight-bold">DECEMBER 2021</h6>
                        </div>

                        
                    </div>
                    
                    
                    
                    
                </div>
                <div class="col-lg-5">
                    <div class="bg-primary py-5 px-4 px-sm-5">
                        <form class="py-5" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{route('registration')}}" style="color:white">Register Now!</a>
                                </div>
                            </div>
                            <button class="btn btn-dark btn-block border-0 py-3" type="submit"> Login</button>
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" style="color:white" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>

                            @endif
                            <div class="d-flex justify-content-start mt-4">
                                <a class="btn btn-outline-light btn-social mr-2" target=”_blank” href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-light btn-social" target=”_blank” href="https://www.youtube.com/c/ACLEMentoringbyChapsBLEC"><i class="fab fa-youtube"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote Request Start -->






    <!-- Team Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <h1 class="mb-4">Meet our Lecturers</h1>
            </div>

            <div class="row">

                <div class="col-lg-4 col-md-6  offset-md-4">
                    <div class="team card position-relative overflow-hidden border-0 mb-5" style="pointer-events: none;">
                        <img class="card-img-top" src="{{asset('public/storage/img/team/nolie-team.jpg')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h5 class="font-weight-bold">Nolie Z. Ingcad</h5>
                                <span>Review Director</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/1.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">JOHN MICHAEL PONTINVEROS</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/3.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">NOLIE Z. INGCAD</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/4.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">REXANN TARLE</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/5.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">MA. CHRISTINA MAE LAGUDA</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/6.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">PAOLA BLANCA CAMBEL</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/7.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">ATTY. ROMNICK ERICE</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/8.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">KAROLINA ERIKA BUTED</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/9.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">CENTENIEL SUMILANG</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/10.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">ATTY. JIMBOY FERNANDEZ</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/11.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">GLADYS OLIVERIO</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/12.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">BRYAN S. RODADO</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/13.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">ALLAN SANTOS</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/14.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">PROF. RYAN DE MESA</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/15.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">JAYSON ESPEJO</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/16.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">JESSA SINGCOY</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/17.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">JANE BORJA</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/18.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">ORLANDO BADIANGO</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/19.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">PROF. MARIA TANGLAO</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/20.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">PROF. JOHN MARK CUARTERO</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/22.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">MICHO MANALO</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/23.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">MARY ANN DEOGRACIA</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/24.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">ROZEANLYN GARCIA</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/25.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">FREDERICK RODRIGUEZ</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/26.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">ATTY. STEPHEN GUMBOC</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/27.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">PROF. JAYSON TUPAZ</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/28.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">PROF. RENIEL CENTENO</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/29 Thirdy Rosalia.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">THIRDY ROSALIA</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/30 John Michael dionisio.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">JOHN MICHAEL DIONISIO</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/31 charlamagne james ramos.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">CHARLMAGNE JAMES RAMOS</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/32 renjomar almujela baltazar.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">RENJOMAR A. BALTAZAR</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/33 feliciano almajuela.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">FELICIANO ALMAJUELA</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div><div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/35 roy e estillero.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">ROY E. ESTILLERO</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/38  allan tilla-in.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">ALLAN TILLA-IN</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div><div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/39 sean francis san diego.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">SEAN FRANCIS SAN DIEGO</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/40 AttyRodolfo Castillo Jr.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">ATTY. RODOLFO CASTILLO Jr</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/41 Jaenard Gonzales.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">JAENARD GONZALES</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/42 chervin loewe navilla.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">CHERVIN LOEWE NAVILLA</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/43 germain rae surban.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">GERMAINE RAE SURBAN</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-xs-1 col-lg-2 col-md-3 col-6 center-team-img">
                    <div class="team card position-relative overflow-hidden border-0 mb-5 " style="pointer-events: none;">
                        <img class="card-img-top team-img" src="{{asset('public/storage/img/lecturer/44 john mclaine tullao.png')}}" alt="">

                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-secondary">
                                <h6 class="font-weight-bold">JOHN MCLAINE TULLAO</h6>
                                <span>Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            
            


        </div>
    </div>
    <!-- Team End -->



    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-7 col-md-6">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <h3 class="text-primary mb-4">Get In Touch</h3>
                        <p><i class="fa fa-envelope mr-2"></i>chapsonlinets2021@gmail.com</p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light btn-social mr-2"  href="https://www.facebook.com/chapsonlinets2021"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social mr-2"  href="https://www.tiktok.com/@chapsonlinets2021"><i class="fab fa-tiktok"></i>
                            <a class="btn btn-outline-light btn-social" target=”_blank” href="https://www.youtube.com/c/ACLEMentoringbyChapsBLEC"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 mb-5">
                <h3 class="text-primary mb-4">Newsletter</h3>
                <p>Rebum labore lorem dolores kasd est, et ipsum amet et at kasd, ipsum sea tempor magna tempor. Accu kasd sed ea duo ipsum. Dolor duo eirmod sea justo no lorem est diam</p>
                <div class="w-100">
                    <div class="input-group">
                        <input type="text" class="form-control border-light" style="padding: 30px;" placeholder="Your Email Address">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: #3E3E4E !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">&copy; <a href="#">Chaps Online Tutorial Services</a>. All Rights Reserved.

                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed by <a href="https://github.com/elbangkero">https://github.com/elbangkero</a>
                </p>
            </div>
            <div class="col-lg-6 text-center text-md-right">
                <ul class="nav d-inline-flex">
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Privacy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Terms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Help</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('public/storage/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('public/storage/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('public/storage/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('public/storage/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<script>
  var modal = document.getElementById("myModal");
  var btn = document.getElementById("myBtn");
  var span = document.getElementsByClassName("close")[0];

  btn.onclick = function() {
    modal.style.display = "block";
    playVideo();
  };

  span.onclick = function() {
    modal.style.display = "none";
    pauseVideo();
  };

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
      pauseVideo();
    }
  };

  $(function() {
    modal.style.display = "block";
    playVideo();
  });

  function playVideo() {
    var video = document.getElementById("myVideo");
    video.muted = true;
    video.play().catch(function(error) {
      // Autoplay was prevented
      // You can add fallback logic here
      console.log("Autoplay prevented: " + error);
    });
  }

  function pauseVideo() {
    var video = document.getElementById("myVideo");
    video.pause();
  }
</script>

</body>

</html>