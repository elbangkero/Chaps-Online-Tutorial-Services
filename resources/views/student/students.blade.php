<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chaps Online Tutorial Services</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/storage/img/image0.jpeg')}}" />
    <link rel="stylesheet" href="{{asset('public/storage/fontawesome/css/all.min.css')}}"> <!-- https://fontawesome.com/ -->
    <link href="{{asset('public/storage/css/fonts.googleapis.css')}}" rel="stylesheet"> <!-- https://fonts.google.com/ -->
    <link href="{{asset('public/storage/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('public/storage/css/templatemo-xtra-blog.css')}}" rel="stylesheet">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>

<body>

    <header class="tm-header" id="tm-header">
        <div class="tm-header-wrapper">
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="tm-site-header">
                <img src="{{asset('public/storage/img/image0.jpeg')}}" alt="" id="headertitle">
            </div>
            <nav class="tm-nav" id="tm-nav">
                <ul>
                    <li class="tm-nav-item active">
                        <a href="index.html" class="tm-nav-link">
                            <i class="fas fa-file"></i>
                            Reviewers
                        </a>
                    </li>
                    <li class="tm-nav-item"><a href="post.html" class="tm-nav-link">
                            <i class="fas fa-video"></i>
                            Videos
                        </a></li>
                </ul>
            </nav>
            <div class="tm-mb-65">
                <a rel="nofollow" href="https://fb.com/templatemo" class="tm-social-link">
                    <i class="fab fa-facebook tm-social-icon"></i>
                </a>
                <a href="https://youtube.com" class="tm-social-link">
                    <i class="fab fa-youtube tm-social-icon"></i>
                </a>
            </div>
        </div>
    </header>
    <!-- Header Logout-->
    <div class="container-fluid" id="nav-header">
        <div class="dropdown">
            <button class="dropbtn"> <span class="fa fa-user" style="color:white"></span> Gajelomo <span style="color:white" class="fa fa-caret-down"></span></button>
            <div class="dropdown-content">
                <a href="#"> <span class="fas fa-cogs"></span> Profile</a>
                <a href="#"> <span class="fas fa-question-circle"></span> Help</a>
                <a href="#" id='logout_link'> <span class="fas fa-sign-out-alt"></span> Log out </a>
                <form action="{{route('student_logout')}}" name="logout_header" method="POST">
                    @csrf
                    <button id="logout_btn" type="submit"></button>
                </form>
            </div>
        </div>
    </div>
    <!-- Header Logout-->
    <div class="container-fluid">
        <main class="tm-main">
            <!-- Search form -->
            <div class="row tm-row">
                <div class="col-12">
                    <form method="GET" class="form-inline tm-mb-80 tm-search-form">
                        <input class="form-control tm-search-input" name="query" type="text" placeholder="Search..." aria-label="Search">
                        <button class="tm-search-button" type="submit">
                            <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="row tm-row">
                <article class="col-12 col-md-4 tm-post">
                    <hr class="tm-hr-primary">
                    <a href="post.html" class="effect-lily tm-post-link tm-pt-60">
                        <div class="tm-post-link-inner">
                            <img src="{{asset('public/storage/img/img-01.jpg')}}" alt="Image" class="img-fluid">
                        </div>
                        <span class="position-absolute tm-new-badge">New</span>
                        <h2 class="tm-pt-20 tm-color-primary tm-post-title">Simple and useful HTML layout</h2>
                    </a>
                    <div class="d-flex justify-content-between tm-pt-20">
                        <span class="tm-color-primary">Date Uploaded : June 24, 2020</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>By : Admin Nat</span>
                    </div>
                </article>
                <article class="col-12 col-md-4 tm-post">
                    <hr class="tm-hr-primary">
                    <a href="post.html" class="effect-lily tm-post-link tm-pt-60">
                        <div class="tm-post-link-inner">
                            <img src="{{asset('public/storage/img/img-01.jpg')}}" alt="Image" class="img-fluid">
                        </div>
                        <span class="position-absolute tm-new-badge">New</span>
                        <h2 class="tm-pt-20 tm-color-primary tm-post-title">Simple and useful HTML layout</h2>
                    </a>
                    <div class="d-flex justify-content-between tm-pt-20">
                        <span class="tm-color-primary">Date Uploaded : June 24, 2020</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>By : Admin Nat</span>
                    </div>
                </article>
                <article class="col-12 col-md-4 tm-post">
                    <hr class="tm-hr-primary">
                    <a href="post.html" class="effect-lily tm-post-link tm-pt-60">
                        <div class="tm-post-link-inner">
                            <img src="{{asset('public/storage/img/img-01.jpg')}}" alt="Image" class="img-fluid">
                        </div>
                        <span class="position-absolute tm-new-badge">New</span>
                        <h2 class="tm-pt-20 tm-color-primary tm-post-title">Simple and useful HTML layout</h2>
                    </a>
                    <div class="d-flex justify-content-between tm-pt-20">
                        <span class="tm-color-primary">Date Uploaded : June 24, 2020</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>By : Admin Nat</span>
                    </div>
                </article>
                <article class="col-12 col-md-4 tm-post">
                    <hr class="tm-hr-primary">
                    <a href="post.html" class="effect-lily tm-post-link tm-pt-60">
                        <div class="tm-post-link-inner">
                            <img src="{{asset('public/storage/img/img-01.jpg')}}" alt="Image" class="img-fluid">
                        </div>
                        <span class="position-absolute tm-new-badge">New</span>
                        <h2 class="tm-pt-20 tm-color-primary tm-post-title">Simple and useful HTML layout</h2>
                    </a>
                    <div class="d-flex justify-content-between tm-pt-20">
                        <span class="tm-color-primary">Date Uploaded : June 24, 2020</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>By : Admin Nat</span>
                    </div>
                </article>
                <article class="col-12 col-md-4 tm-post">
                    <hr class="tm-hr-primary">
                    <a href="post.html" class="effect-lily tm-post-link tm-pt-60">
                        <div class="tm-post-link-inner">
                            <img src="{{asset('public/storage/img/img-01.jpg')}}" alt="Image" class="img-fluid">
                        </div>
                        <span class="position-absolute tm-new-badge">New</span>
                        <h2 class="tm-pt-20 tm-color-primary tm-post-title">Simple and useful HTML layout</h2>
                    </a>
                    <div class="d-flex justify-content-between tm-pt-20">
                        <span class="tm-color-primary">Date Uploaded : June 24, 2020</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>By : Admin Nat</span>
                    </div>
                </article>
                <article class="col-12 col-md-4 tm-post">
                    <hr class="tm-hr-primary">
                    <a href="post.html" class="effect-lily tm-post-link tm-pt-60">
                        <div class="tm-post-link-inner">
                            <img src="{{asset('public/storage/img/img-01.jpg')}}" alt="Image" class="img-fluid">
                        </div>
                        <span class="position-absolute tm-new-badge">New</span>
                        <h2 class="tm-pt-20 tm-color-primary tm-post-title">Simple and useful HTML layout</h2>
                    </a>
                    <div class="d-flex justify-content-between tm-pt-20">
                        <span class="tm-color-primary">Date Uploaded : June 24, 2020</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>By : Admin Nat</span>
                    </div>
                </article>
                <article class="col-12 col-md-4 tm-post">
                    <hr class="tm-hr-primary">
                    <a href="post.html" class="effect-lily tm-post-link tm-pt-60">
                        <div class="tm-post-link-inner">
                            <img src="{{asset('public/storage/img/img-01.jpg')}}" alt="Image" class="img-fluid">
                        </div>
                        <span class="position-absolute tm-new-badge">New</span>
                        <h2 class="tm-pt-20 tm-color-primary tm-post-title">Simple and useful HTML layout</h2>
                    </a>
                    <div class="d-flex justify-content-between tm-pt-20">
                        <span class="tm-color-primary">Date Uploaded : June 24, 2020</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>By : Admin Nat</span>
                    </div>
                </article>
                <article class="col-12 col-md-4 tm-post">
                    <hr class="tm-hr-primary">
                    <a href="post.html" class="effect-lily tm-post-link tm-pt-60">
                        <div class="tm-post-link-inner">
                            <img src="{{asset('public/storage/img/img-01.jpg')}}" alt="Image" class="img-fluid">
                        </div>
                        <span class="position-absolute tm-new-badge">New</span>
                        <h2 class="tm-pt-20 tm-color-primary tm-post-title">Simple and useful HTML layout</h2>
                    </a>
                    <div class="d-flex justify-content-between tm-pt-20">
                        <span class="tm-color-primary">Date Uploaded : June 24, 2020</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>By : Admin Nat</span>
                    </div>
                </article>
                <article class="col-12 col-md-4 tm-post">
                    <hr class="tm-hr-primary">
                    <a href="post.html" class="effect-lily tm-post-link tm-pt-60">
                        <div class="tm-post-link-inner">
                            <img src="{{asset('public/storage/img/img-01.jpg')}}" alt="Image" class="img-fluid">
                        </div>
                        <span class="position-absolute tm-new-badge">New</span>
                        <h2 class="tm-pt-20 tm-color-primary tm-post-title">Simple and useful HTML layout</h2>
                    </a>
                    <div class="d-flex justify-content-between tm-pt-20">
                        <span class="tm-color-primary">Date Uploaded : June 24, 2020</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>By : Admin Nat</span>
                    </div>
                </article>
            </div>
            <div class="row tm-row tm-mt-100 tm-mb-75">
                <div class="tm-prev-next-wrapper">
                    <a href="#" class="mb-2 tm-btn tm-btn-primary tm-prev-next disabled tm-mr-20">Prev</a>
                    <a href="#" class="mb-2 tm-btn tm-btn-primary tm-prev-next">Next</a>
                </div>
                <div class="tm-paging-wrapper">
                    <span class="d-inline-block mr-3">Page</span>
                    <nav class="tm-paging-nav d-inline-block">
                        <ul>
                            <li class="tm-paging-item active">
                                <a href="#" class="mb-2 tm-btn tm-paging-link">1</a>
                            </li>
                            <li class="tm-paging-item">
                                <a href="#" class="mb-2 tm-btn tm-paging-link">2</a>
                            </li>
                            <li class="tm-paging-item">
                                <a href="#" class="mb-2 tm-btn tm-paging-link">3</a>
                            </li>
                            <li class="tm-paging-item">
                                <a href="#" class="mb-2 tm-btn tm-paging-link">4</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </main>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('public/storage/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/storage/js/templatemo-script.js')}}"></script>
    <script>
        $('#logout_link').click(function(e) {
            $("#logout_btn").trigger("click");
        });
    </script>
</body>

</html>