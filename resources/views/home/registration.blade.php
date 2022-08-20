<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Chaps Online Tutorial Services</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/storage/img/image0.png')}}" />

    <!-- Google Web Fonts -->
    <link href="{{asset('public/storage/css/fonts.googleapis.css')}}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{asset('public/storage/fontawesome/css/all.min.css')}}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('storage/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('public/storage/css/style.css')}}" rel="stylesheet">

    <!-- DateTimePicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid" style="background-color: #060c35;">
        <div class="row py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center text-white">
                    <small><i class="fa fa-phone-alt mr-2"></i>+012 345 6789</small>
                    <small class="px-3">|</small>
                    <small><i class="fa fa-envelope mr-2"></i>chapsonlinets2021@gmail.com</small>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
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

    <div class="row" style="margin: 10px;">
        <div class="col-12 col-lg-12">
            <a href="{{route('login_page')}}" style="float:right;" class="btn btn-primary ">Go Back!</a>
        </div>
    </div>
    <div class="register">

        <div class="row">
            <div class="col-md-3 register-left">
                <span>Join Us Now!</span>
                <img src="{{asset('public/storage/img/register-left-image.png')}}" alt="" />
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Basic Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Services</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Reviewer's Info</h3>
                        <form method="POST" action="{{ route('store_students') }}">
                            @csrf
                            <div class="row register-form" style="width: 100% !important; ">

                                <div class="col-md-12">
                                    @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                        @php
                                        Session::forget('success');
                                        @endphp
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name" value="" required autocomplete="off" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Home Address" value="" required autocomplete="off" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Date of birth" value="" id="date_of_birth" required autocomplete="off" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number" value="" required autocomplete="off" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="school_graduated" name="school_graduated" placeholder="School Graduated" value="" autocomplete="off" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="date_graduated" name="date_graduated" placeholder="Date Graduated" id="date_graduated" value="" autocomplete="off" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exam_takes" name="exam_takes" placeholder="Number of exam taken" value="" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email *" value="" required autocomplete="off" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password *" value="" required autocomplete="off" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password *" value="" required autocomplete="off" />
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-heading">Choose a service</h3>
                        <div class="row register-form" style="width: 100% !important; ">
                            <div class="col-md-6">
                                @foreach($services as $data)
                                <div class="form-check" style="margin: 20px;">
                                    <input style="cursor: pointer;" type="radio" class="form-check-input radio-size" id="radio-{{$data->id}}" name="service_id" value="{{$data->id}}" checked>
                                    <label class="form-check-label" for="radio-{{$data->id}}" style="cursor: pointer;margin-left:10px">
                                        <h5> {{$data->service_name}} </h5>
                                        <span>Price : ₱ {{$data->price}}</span>
                                    </label>
                                    <br>
                                    <label for="radio-{{$data->id}}">
                                        <div class="card" style="cursor: pointer;">
                                            <div class="card-body">
                                                <p class="card-text">{{$data->description}} </p>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-md-6">
                                <img style="max-width:100%;
                                max-height:100%;
                                height: auto;
                                width:auto;" src="{{asset('public/storage/img/293465589_828160171890357_5435663303333464587_n.jpg')}}" alt="">
                                <div style="text-align: center;">
                                    <h5>Pay on Gcash</h5>
                                    <span>And send the receipt to our facebook page for your account activation : <a href="https://www.facebook.com/CHAPOPOYCRIMINOLOGY" target="_blank">https://www.facebook.com/CHAPOPOYCRIMINOLOGY</a></span>
                                </div>

                                <input type="submit" class="btnRegister" onclick="return handleChange()" value="Register" />
                            </div>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>

    </div>



    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-7 col-md-6">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <h3 class="text-primary mb-4">Get In Touch</h3>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>123 Pandacan,Manila, Philippines</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                        <p><i class="fa fa-envelope mr-2"></i>chapsonlinets2021@gmail.com</p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light btn-social mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" target=”_blank” href="https://www.youtube.com/c/ACLEMentoringbyChapsBLEC"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <h3 class="text-primary mb-4">Quick Links</h3>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Services</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Pricing Plan</a>
                            <a class="text-white" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
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
                <p class="m-0 text-white">&copy; <a href="#">Chaps Online Tutorial Servicese</a>. All Rights Reserved.

                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed by <a href="https://htmlcodex.com">https://github.com/elbangkero</a>
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
        $(function() {
            $("#date_of_birth").datepicker();
        });
        $(function() {
            $("#date_graduated").datepicker();
        });
    </script>

    <script>
        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

        function handleChange() {

            if (document.getElementById("full_name").value == "") {
                alert('Please Enter Full Name');
                return false;
            } else if (document.getElementById("address").value == "") {
                alert('Please Enter Address');
                return false;
            } else if (document.getElementById("date_of_birth").value == "") {
                alert('Please Enter Date of birth');
                return false;
            } else if (document.getElementById("contact_number").value == "") {
                alert('Please Enter Contact number');
                return false;
            } else if (document.getElementById("school_graduated").value == "") {
                alert('Please Enter School graduated');
                return false;
            } else if (document.getElementById("date_graduated").value == "") {
                alert('Please Enter Date graduated');
                return false;
            } else if (document.getElementById("exam_takes").value == "") {
                alert('Please Enter Exam takes');
                return false;
            } else if (document.getElementById("email").value == "") {

                alert('Please Enter Email');
                return false;
            } else if (document.getElementById("password").value == "") {
                alert('Please Enter Password');
                return false;
            } else if (document.getElementById("password_confirmation").value == "") {
                alert('Please Enter Confirm Password');
                return false;
            }
            if (document.getElementById("email").value.match(validRegex)) {
                return true;
            } else {
                alert('Please Enter valid email');
                return false;
            }
        }
    </script>
</body>

</html>