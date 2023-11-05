<?php
  include "../connection.php";
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <title>Sky Stream</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2>SKY STREAM<em> ENTERPRISE </em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item"><a class="nav-link" href="Headers/jobs.php">Jobs</a></li>
                <li class="nav-item"><a class="nav-link" href="Headers/about-us.php">About us</a></li>
                <li class="nav-item"><a class="nav-link" href="Headers/contact.php">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <div class="banner header-text">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>We are Hiring!</h4>
            <h2>WELCOME APPLICANT</h2>
          </div>
        </div> 
    </div>


    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Featured Jobs</h2>
              <a href="Headers/jobs.php">view more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="product-item">
              <a href="Jobs/CustomerServiceAgent.php"><img src="assets/images/ACallCenter.jpg" alt=""></a>
              <div class="down-content">
                <a href="Jobs/CustomerServiceAgent.php"><h4>Costumer Service Agent</h4></a>

                <h6>Php 25,000 - 30,000</h6>

                <h4><small><i class='bx bxs-phone-call '></i>&nbsp;Costumer Service <br> <strong><i class='bx bx-location-plus'></i> Metro Manila</strong></small></h4>

                <small>
                    <button type="button" class="btn btn-primary btn-sm">FULLTIME</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-success btn-sm">PARTIME</button>&nbsp;&nbsp;&nbsp;&nbsp;
                </small>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-item">
              <a href="#"><img src="assets/images/TravelConsultant.jpg" alt=""></a>
              <div class="down-content">
                <a href="#"><h4>Travel Consultant</h4></a>

                <h6>Php 30,000 - 40,000</h6>

                <h4><small><i class='bx bx-analyse'></i> Consultant <br> <strong><i class='bx bx-location-plus'></i> International</strong></small></h4>

                <small>
                     <button type="button" class="btn btn-primary btn-sm">FULLTIME</button>&nbsp;&nbsp;&nbsp;&nbsp;
                </small>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-item">
              <a href="#"><img src="assets/images/NPGeneralManager.png" alt=""></a>
              <div class="down-content">
                <a href="#"><h4>General Manager</h4></a>

                <h6>Php 50,000 - 65,000</h6>

                <h4><small><i class='bx bx-user-circle'></i> Manager <br> <strong><i class='bx bx-location-plus'></i> Metro Manila</strong></small></h4>

                <small>
                     <button type="button" class="btn btn-primary btn-sm">FULLTIME</button>&nbsp;&nbsp;&nbsp;&nbsp;
                </small>
              </div>
            </div>
          </div>

        </div>
        <style>
  .product-item img {
    width: 100%;
    height: 300px; /* Set the desired height for your images */
    object-fit: cover; /* This will make the image cover the container while maintaining its aspect ratio */
  }
</style>
      </div>
    </div>

    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2 class="fw-bold">ABOUT US</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
           <h4>SKY STREAM ENTERPRISE</h4>
           "Sky Stream Enterprise is an airport management company responsible for 
           overseeing and operating Our company's mission is to ensure the safe and efficient 
           functioning of this airport, providing top-notch services to passengers and 
           airlines while adhering to all regulatory standards.
              <ul class="featured-list">
              
              </ul>
              <a href="Headers/about-us.php" class="filled-button">Read More</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/skystreamlogo.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>IF YOU HAVE QUESTIONS, DON'T HESITATE TO ASK</h4>
                  <p>Just Click the Button for more Details</p>
                </div>
                <div class="col-lg-4 col-md-6 text-right">
                  <a href="Headers/contact.php" class="filled-button">Contact Us</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>THIS IS ONLY FOR EDUCATIONAL PURPOSE</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>
</html>