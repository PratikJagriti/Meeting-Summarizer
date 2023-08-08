<?php
$output = $_POST['output'];
//echo $output;
exec('python text_summary.py ' . escapeshellarg($output), $result);

$summary=$result[0];
$original_txt=$result[1];
$len_orig_txt=$result[2];
$len_summary=$result[3];
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />


    <!--====== Title ======-->
    <title>Basic - SaaS Landing Page</title>

   

    <!--====== Favicon Icon ======-->
    <link
      rel="shortcut icon"
      href="static/assets/images/favicon.png"
      type="image/png"
    />

    <!--====== CSS Files LinkUp ======-->
    <link rel="stylesheet" href="static/assets/css/animate.css" />
    <link rel="stylesheet" href="static/assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="static/assets/css/lineIcons.css" />
    <link rel="stylesheet" href="static/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="static/assets/css/style.css" />
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
                <a class="navbar-brand" href="textindex.html">
                  
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
                      <a class="page-scroll" href="#about">About</a>
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
        style="background-image: url(static/assets/images/header/banner-bg.svg)"
      >
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="header-hero-content text-center">
                <h2
                  class="header-title wow fadeInUp"
                  data-wow-duration="1.3s"
                  data-wow-delay="0.5s"
                >
                  Text Summarization
                </h2>

                <h3
                  class="header-sub-title wow fadeInUp"
                  data-wow-duration="1.3s"
                  data-wow-delay="0.2s"
                >
                  Retrieve the best summary for the text
                </h3>
                
                <p
                  class="text wow fadeInUp"
                  data-wow-duration="1.3s"
                  data-wow-delay="0.8s"
                >
                </div>
                </div>
              </div>
            </div>
        
            
                
                </p>
                <link
                rel="stylesheet"
                href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
                integrity="sha384-Gn5384xqQ1ackXA+058RXPxPg6fy4IWvTNh@E263XaFc315A1GgFAM/dA1563Xm"
                crossorigin="anonynous"
               />
          
              <link rel="stylesheet" href="static/styles.css" />

              </head>
             
    <section id="about">


      <body>
        
   
     <div class="container srt" style="display: flex; justify-content: space-around">
        <p class="original_title col-sm-4">Original Text</p>
        <p class="summary_title col-sm-4">Summary</p>
   </div>
   
     <div class="container srt">
      <p class="originalTxt col-sm-6"><?php echo $original_txt; ?></p>
        <div class="container col-sm-6">
          <p class="summaryTxt"><?php echo $summary; ?></p>
         <button class="btn btn-success" type="submit" style="margin-left:10px">
           Words : <?php echo $len_summary; ?>
        </button>
      </div>
     </div>
     
     <div class="container">
       <button class="btn btn-danger" type="submit">
           Words : <?php echo $len_orig_txt; ?>
       </button>
     </div>
   </div>
   
<div>
  <center>
  <form id="my-form" action="pdf.php" method="POST">
  <input type="hidden" name="original_txt" id="original_txt" value="<?php echo htmlspecialchars($original_txt); ?>">
  <input type="hidden" name="summary" id="summary" value="<?php echo htmlspecialchars($summary); ?>">
  <a href="javascript:void(0)" class="main-btn wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="1.1s" onclick="submitForm()">Download Summary and Original Text</a>
</form>
  </center>

  <script>
function submitForm() {
  document.getElementById("my-form").submit();
}
</script>

</div>
    <script
     src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
     integrity="sha384-K33020KtIkvYIK3UENz7KCkRr/rE9/Qpg6aAZGJFDMVA/Gp6FF93hXpGSKKN"
     crossorigin="anonynous"
    ></script>
   
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/und/popper.min.js"
      integrity="sha384-ApNbah98+Y10Ktv3Rn7W3mgPxhU9K/Sc0sAP7hU1bx3917fakFPskvusvfa0b40"
     crossorigin="anonymous"
   ></script>
   
    <script
     src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/1s/bootstrap.min.1s"
     integrity="sha384-3ZR6Spejh4082d8jot6vLEHfe/JQG1RRSQQXSFFWp11MquVdAyjuar5+76PVCWY1"
     crossorigin="anonymous"
    ></script>
  
     
  

    <!--====== FOOTER PART START ======-->
    <footer id="footer" class="footer-area pt-120">
      <div class="container">
        <div
          class="subscribe-area wow fadeIn"
          data-wow-duration="1s"
          data-wow-delay="0.5s"
        >
          <div class="row">
            <div class="col-lg-6">
              <div class="subscribe-content mt-45">
                <h2 class="subscribe-title">
                  Subscribe Our Newsletter <span>get reguler updates</span>
                </h2>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="subscribe-form mt-50">
                <form action="#">
                  <input type="text" placeholder="Enter eamil" />
                  <button class="main-btn">Subscribe</button>
                </form>
              </div>
            </div>
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
                  
                </a>
                <p class="text">
                  
                </p>
                
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
                  <div class="footer-title">
                    
                  </div>
                  
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
                    <li><a href="javascript:void(0)">Page</a></li>
                    <li><a href="javascript:void(0)">Portfolio</a></li>
                    <li><a href="javascript:void(0)">Blog</a></li>
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
                  <li>+809272561823</li>
                  <li>info@gmail.com</li>
                  <li>www.yourweb.com</li>
                  <li>
                    123 Stree New York City , United <br />
                    States Of America 750.
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
                    <a href="https://uideck.com" rel="nofollow">UIdeck</a>
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
    <script src="static/assets/js/bootstrap.bundle.min.js"></script>
    <script src="static/assets/js/wow.min.js"></script>
    <script src="static/assets/js/glightbox.min.js"></script>
    <script src="static/assets/js/count-up.min.js"></script>
    <script src="static/assets/js/particles.min.js"></script>
    <script src="static/assets/js/main.js"></script>
  </body>
</html>
