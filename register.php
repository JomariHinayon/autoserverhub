<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <title>AutoServeHub</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <style>
    span {
color:white;
    }
    i {
      color:yellow;
    }
  </style>
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <div class="hero_bg_box">
      <div class="img-box">
        <img src="images/hero-bg.jpg" alt="">
      </div>
    </div>

    <header class="header_section">
      <div class="header_top">
        <div class="container-fluid">
          <div class="contact_link-container">
            <span href="" class="contact_link1">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>
                Colegio De Montalban
              </span>
            </span>
            <span href="" class="contact_link2">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
                Call : +63 9935153842
              </span>
            </span>
            <span href="" class="contact_link3">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>
                AutoServeHub@gmail.com
              </span>
            </span>
          </div>
        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container">
            <span class="navbar-brand" href="index.html">
              <span>
              AutoserverHub
              </span>
            </span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""></span>
            </button>

            <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
              <ul class="navbar-nav  ">
                <li class="nav-item ">
                  <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>
               
                <li class="nav-item">
                  <a class="nav-link" href="service.html"> Products </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="guard.html"> About Us </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Login</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="contact_bg_box">
      <div class="img-box">
        <img src="images/contact-bg.jpg" alt="">
      </div>
    </div>
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Register
        </h2>
      </div>
      <div class="">
        <div class="row">
          <div class="col-md-7 mx-auto">
          <form action="signup.php" method="POST">
    <div class="contact_form-container">
        <div>
            <input type="text" name="name" placeholder="Full Name" autocomplete="off" required/>
        </div>
        <div>
            <input type="text" name="age" placeholder="Age" autocomplete="off" required/>
        </div>
        <div>
            <input type="email" name="email" placeholder="Email" autocomplete="off" required/>
        </div>
        <div>
            <input type="password" name="password" placeholder="Password" id="passwordField" autocomplete="off" required/>
            <i id="showPasswordIcon" class="fas fa-eye" onclick="togglePasswordVisibility()"></i>
            <label for="passwordField">Show Password</label>
        </div>

        <script>
            function togglePasswordVisibility() {
                var passwordField = document.getElementById('passwordField');
                var showPasswordIcon = document.getElementById('showPasswordIcon');

                if (showPasswordIcon.classList.contains('fa-eye')) {
                    passwordField.type = 'text';
                    showPasswordIcon.classList.remove('fa-eye');
                    showPasswordIcon.classList.add('fa-eye-slash');
                } else {
                    passwordField.type = 'password';
                    showPasswordIcon.classList.remove('fa-eye-slash');
                    showPasswordIcon.classList.add('fa-eye');
                }
            }
        </script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <div class="btn-box">
            <button type="submit">Send</button>
        </div>
    </div>
</form>


          </div>
        </div>
      </div>
      
    </div>
  </section>

  <!-- end contact section -->

  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_logo">
            <a class="navbar-brand" href="index.html">
              <span>
                AutoServeHub
              </span>
            </a>
            <p>
              Driven by Excellence, Delivered to You. Your Destination for Premier Automotive Solutions.
            </p>
          </div>
        </div>
       
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              Contact Us
            </h5>
          </div>
          <div class="info_contact">
            <a href="" class="">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>
                Colegio De Montalban
              </span>
            </a>
            <a href="" class="">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
                Call : +63 9935153842
              </span>
            </a>
            <a href="" class="">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>
                AutoServeHub@gmail.com
              </span>
            </a>
          </div>
        </div>
        
      </div>
    </div>
  </section>

  <!-- end info_section -->




  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <p>
      &copy; <span id="currentYear"></span> All Rights Reserved. Design by
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </footer>
  <!-- footer section -->

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>