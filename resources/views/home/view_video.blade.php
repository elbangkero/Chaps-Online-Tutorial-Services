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
          @if($video_type=='2')


          <!-- Clappr video player -->
          <div id="player" style="max-width: 100%; width: 100%; height: auto;"></div>
          <script src="https://cdn.jsdelivr.net/npm/clappr@latest/dist/clappr.min.js"></script>

          <!-- Responsive Video Player -->
          <style>
            #player {
              position: relative;
              padding-bottom: 56.25%;
              /* 16:9 aspect ratio */
              height: 0;
              overflow: hidden;
            }

            #player>div {
              position: absolute;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
            }

            /* Fullscreen fixes */
            .clappr-fullscreen {
              width: 100% !important;
              height: 100% !important;
            }

            /* Ensure controls are always visible */
            .media-control {
              display: block !important;
              opacity: 1 !important;
              visibility: visible !important;
            }

            /* Force controls to show up in fullscreen */
            .media-control .media-control-background {
              bottom: 0 !important;
            }

            /* Ensure controls are aligned in fullscreen */
            .media-control[data-fullscreen] {
              bottom: 0;
              position: fixed;
              width: 100%;
            }

            /* Fix for mobile fullscreen */
            @media screen and (max-width: 768px) {
              .media-control[data-fullscreen] {
                position: fixed;
                bottom: 0;
                width: 100%;
              }
            }
          </style>

          <script>
            // Initialize Clappr Player
            var player = new Clappr.Player({
              source: '{{$video}}',
              parentId: '#player',
              width: '100%',
              height: '100%',
              autoPlay: false, // Disable auto-play
              mediacontrol: {
                seekbar: "#FF0000",
                buttons: "#FF0000"
              }, // Custom control colors
              fullscreenEnabled: true, // Enable fullscreen
            });

            // Disable right-click on the video player
            document.getElementById('player').addEventListener('contextmenu', function(e) {
              e.preventDefault();
            });
          </script>


          @else
          <!--- <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="{{$video}}"></div> --->
          <iframe style="max-width: 100%;width:100%;max-height:800px;height:700px" src="https://www.youtube-nocookie.com/embed/{{$video}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
          @endif
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
<script>
  // Change "{}" to your options:
  // https://github.com/sampotts/plyr/#options
  const player = new Plyr('#player', {});

  // Expose player so it can be used from the console
  window.player = player;

  // Select the video element
  var video = document.getElementById('videoElement');

  // Prevent right-click context menu
  video.addEventListener('contextmenu', function(event) {
    event.preventDefault();
  });

  // Optional: Prevent right-click on the entire document
  document.addEventListener('contextmenu', function(event) {
    event.preventDefault();
  });
</script>

@include('home.footer')