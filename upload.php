<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />

    <!--====== Title ======-->
    <title>Home</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!--====== Favicon Icon ======-->
    <link
      rel="shortcut icon"
      href="assets/images/favicon.png"
      type="image/png"
    />

    <!--====== CSS Files LinkUp ======-->
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="assets/css/lineIcons.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>

  <body>
    <!--[if IE]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->
    <!--====== PRELOADER PART START ======-->
    <div class="preloader">
      <div class="loader">
        <div class="spinner">
          <div class="spinner-container">
            <div class="spinner-rotator">
              <div class="spinner-left">
                <div class="spinner-circle"></div>
              </div>
              <div class="spinner-right">
                <div class="spinner-circle"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--====== PRELOADER PART ENDS ======-->

    <!--====== HEADER PART START ======-->
    <header class="header-area">
      <div class="navbar-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.html">
                  <img src="assets/images/logo/logo.svg" alt="Logo" />
                </a>
                <button
                  class="navbar-toggler"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span class="toggler-icon"> </span>
                  <span class="toggler-icon"> </span>
                  <span class="toggler-icon"> </span>
                </button>

                <div
                  class="collapse navbar-collapse sub-menu-bar"
                  id="navbarSupportedContent"
                >
                  <ul id="nav" class="navbar-nav ms-auto">
                    <li class="nav-item">
                      <a class="page-scroll active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="page-scroll" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                      <a class="page-scroll" href="#about">About</a>
                    </li>
                    </li>
                  </ul>
                </div>
                <!-- navbar collapse -->
              </nav>
              <!-- navbar -->
            </div>
          </div>
          <!-- row -->
        </div>
        <!-- container -->
      </div>
      <!-- navbar area -->

      <div
        id="home"
        class="header-hero bg_cover"
        style="background-image: url(assets/images/header/banner-bg.svg)"
      >
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="header-hero-content text-center">
                <h3
                  class="header-sub-title wow fadeInUp"
                  data-wow-duration="1.3s"
                  data-wow-delay="0.2s"
                >
                <h3>Meeting Summariser</h3>
                </h3>
                <h2
                  class="header-title wow fadeInUp"
                  data-wow-duration="1.3s"
                  data-wow-delay="0.5s"
                >
                  <h2>Kickstart Your Meeting Summariser</h2>
                </h2>
                <p
                  class="text wow fadeInUp"
                  data-wow-duration="1.3s"
                  data-wow-delay="0.8s"
                >
               <h5> Do you spend 5+ hours a week in meetings & it's hard to remember key points?
                No worries,Meeting Summariser helps you.</h5>
                </p>
                <div class="row">
                  <div class="col-lg-12">
                    <div
                      class="header-hero-image text-center wow fadeIn"
                      data-wow-duration="1.3s"
                      data-wow-delay="1.4s"
                    >
                    <h3
                    class="header-hero-image text-center wow fadeIn"
                    data-wow-duration="1.3s"
                    data-wow-delay="0.2s"
                    >Selected Audio</h3>
                    
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form was submitted with a file upload
    if (isset($_FILES["audio_file"])) {
        // Specify the directory where uploaded files will be stored
        $target_dir = "uploads/";

        // Get the filename of the uploaded file
        $target_file = $target_dir . basename($_FILES["audio_file"]["name"]);

        // Check if the file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
        } else {
            // Move the uploaded file to the uploads directory
            if (move_uploaded_file($_FILES["audio_file"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["audio_file"]["name"]) . " has been uploaded.";

                // Create an audio element to play the uploaded audio
                echo '<br><br><audio controls><source src="' . $target_file . '" type="audio/wav"></audio>';


		//-------echo "target file- ' $target_file '";
                                
            } else {
                echo "Sorry, there was an error uploading your file.";
            }


        }
    }
}
?>
<div class="form-control">
        <div
          class="form-control"
          data-wow-duration="1s"
          data-wow-delay="0.5s"
          rows="10" readonly>
        <h3> Converted Audio To Text </h3>
        <textarea id="output" name="rawtext"
       class="form-control"
       rows="10" readonly>
       <?php
            $audio_file = "uploads/". basename( $_FILES['audio_file']['name']);
            $output = shell_exec("python audiototext.py " . $audio_file);
            echo "$output";
          ?>
        </textarea>
        <form id="my-form" action="summary.php" method="POST">
  <input type="hidden" name="output" id="output" value="<?php echo htmlspecialchars($output); ?>">
  <a href="javascript:void(0)" class="main-btn wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="1.1s" onclick="submitForm()">GetTextSummary</a>
</form>
</div>
                    </div>
                    <!-- header hero image -->
                  </div>
                </div>
              </div>
              <!-- header hero content -->
            </div>
          </div>
        </div>
        <!-- container -->
        <div id="particles-1" class="particles"></div>
      </div>
      <!-- header hero -->
    </header>
    <!--====== HEADER PART ENDS ======-->
    
    <!--====== FOOTER PART START ======-->
    <footer id="footer" class="footer-area pt-120">
      

<script>
function submitForm() {
  document.getElementById("my-form").submit();
}
</script>


          
          <div class="row">
          </div>
          <!-- row -->
        </div>
        <!-- subscribe area -->
        <div class="footer-widget pb-100">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-8">
              <div
                class="footer-about mt-50 wow fadeIn"
                data-wow-duration="1s"
                data-wow-delay="0.2s"
              >
                <a class="logo" href="javascript:void(0)">
                  <img src="assets/images/logo/logo.svg" alt="logo" />
                </a>
                <p class="text">
                  It's Short & Insightful.
                </p>
                <ul class="social">
                  <li>
                    <a href="javascript:void(0)">
                      <i class="lni lni-facebook-filled"> </i>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0)">
                      <i class="lni lni-twitter-filled"> </i>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0)">
                      <i class="lni lni-instagram-filled"> </i>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0)">
                      <i class="lni lni-linkedin-original"> </i>
                    </a>
                  </li>
                </ul>
              </div>
              <!-- footer about -->
            </div>
            <div class="col-lg-5 col-md-7 col-sm-12">
              <div class="footer-link d-flex mt-50 justify-content-sm-between">
                <div
                  class="link-wrapper wow fadeIn"
                  data-wow-duration="1s"
                  data-wow-delay="0.4s"
                >
                </div>
                <!-- footer wrapper -->
                <div
                  class="link-wrapper wow fadeIn"
                  data-wow-duration="1s"
                  data-wow-delay="0.6s"
                >
                  <div class="footer-title">
                    <h4 class="title">Resources</h4>
                  </div>
                  <ul class="link">
                    <li><a href="javascript:void(0)">Home</a></li>
                    <li><a href="javascript:void(0)">Contact</a></li>
                  </ul>
                </div>
                <!-- footer wrapper -->
              </div>
              <!-- footer link -->
              </div>
                <div class="col-lg-3 col-md-5 col-sm-12">
                  <div
                    class="footer-contact mt-50 wow fadeIn"
                    data-wow-duration="1s"
                    data-wow-delay="0.8s"
                  >
                    <div class="footer-title">
                      <h4 class="title">Contact Us</h4>
                    </div>
                    <ul class="contact">
                      <li>ssit@gmail.com</li>
                      <li>www.summary.com</li>
                      <li>
                        Tumkur, Karnataka<br />
                        India
                      </li>
                    </ul>
                  </div>
              <!-- footer contact -->
            </div>
          </div>
          <!-- row -->
        </div>
        <!-- footer widget -->
        <div class="footer-copyright">
          <div class="row">
            <div class="col-lg-12">
              <div class="copyright d-sm-flex justify-content-between">
                <div class="copyright-content">
                  <p class="text">
                    Designed and Developed by
                    <a href="" rel="nofollow">PJSSSBSR</a>
                  </p>
                </div>
                <!-- copyright content -->
              </div>
              <!-- copyright -->
            </div>
          </div>
          <!-- row -->
        </div>
        <!-- footer copyright -->
      </div>
      <!-- container -->
      <div id="particles-2"></div>
    </footer>
    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TOP TOP PART START ======-->
    <a href="#" class="back-to-top"> <i class="lni lni-chevron-up"> </i> </a>
    <!--====== BACK TOP TOP PART ENDS ======-->

    <!--====== Javascript Files ======-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="assets/js/count-up.min.js"></script>
    <script src="assets/js/particles.min.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>

