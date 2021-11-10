<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Live Love Music</title>

    <!-- FAVICON -->
    <link href="img/favicon.png" rel="shortcut icon">
    <!-- PLUGINS CSS STYLE -->
    <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap-slider.css">
    <!-- Font Awesome -->
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="plugins/slick-carousel/slick/slick.css" rel="stylesheet">
    <link href="plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
    <!-- Fancy Box -->
    <link href="plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
    <link href="plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <link href="css/style.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body class="body-wrapper">


    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light navigation">
                        <a class="navbar-brand" href="index.html">
                            <u><i class="fa fa-music"></i>Live Love Music</u>
                        </a>

                </div>
            </div>
        </div>
    </section>

    <section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center register_container">
                    <div class="border">
                        <h3 class="bg-gray p-4">Store Sign Up</h3>
                        <form id="register_form" action="php/store_register.php" method="POST">
                            <div class="row" style="padding: 10px;">
                                <div class="col-md-6">
                                    <input required name="name" id="name" type="text" placeholder="Store Name"
                                        class="border p-3 w-100 my-2">
                                </div>
                                <div class="col-md-6">
                                    <input required name="email" id="email" type="text" placeholder="Email"
                                        class="border p-3 w-100 my-2">
                                </div>
                            </div>

                            <div class="row" style="padding: 10px;">
                                <div class="col-md-6">
                                    <input required name="phone_number" id="phone_number" type="text"
                                        placeholder="Phone Number" class="border p-3 w-100 my-2">
                                </div>
                                <div class="col-md-6">
                                    <input required name="address" id="address" type="text" placeholder="Address"
                                        class="border p-3 w-100 my-2">
                                </div>
                            </div>

                            <div class="row" style="padding: 10px;">
                                <div class="col-md-6">
                                    <input required name="password" id="password_reg" type="password"
                                        placeholder="Password" class="border p-3 w-100 my-2">
                                </div>
                                <div class="col-md-6">
                                    <input required name="confirm_password" id="confirm_password_reg" type="password"
                                        placeholder="Confirm Password" class="border p-3 w-100 my-2">
                                </div>
                            </div>

                            <div id="error" class="alert alert-light" role="alert">
                                <?php
                            if(isset($_SESSION['name_error']))
                            echo nl2br($_SESSION['name_error']."\n");
                            if(isset($_SESSION['email_error']))
                            echo nl2br($_SESSION['email_error']."\n");
                            if(isset($_SESSION['password_error']))
                            echo nl2br($_SESSION['password_error']."\n");
                            if(isset($_SESSION['confirm_password_error']))
                            echo nl2br($_SESSION['confirm_password_error']."\n");
                            if(isset($_SESSION['phone_error']))
                            echo nl2br($_SESSION['phone_error']."\n");
                            if(isset($_SESSION['error_email']))
                            echo nl2br($_SESSION['error_email']."\n");
                            ?>



                            </div>


                            <button name="submit_button" id="btn-submit" type="submit"
                                class="d-block py-3 px-5 bg-primary text-white border-0 rounded font-weight-bold mt-3">Sign
                                Up</button>
                            <a class="mt-3 d-inline-block text-primary" href="store_login.php">already have an account?
                                Login instead.</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====================================
=            Call to Action            =
=====================================-->

    <section class="call-to-action overly bg-3 section-sm">
        <!-- Container Start -->
        <div class="container">
            <div class="row justify-content-md-center text-center">
                <div class="col-md-8">
                    <div class="content-holder">
                        <h2>Are you a customer? Here you go!</h2>
                        <ul class="list-inline mt-30">
                            <li class="list-inline-item"><a class="btn btn-main" href="register.php">Sign Up</a></li>
                            <li class="list-inline-item"><a class="btn btn-secondary" href="login.php">Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>

    <!-- Footer Bottom -->
    <footer class="footer-bottom">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-12">
                    <!-- Copyright -->
                    <div class="copyright">
                        <p>Copyright © <script>
                            var CurrentYear = new Date().getFullYear()
                            document.write(CurrentYear)
                            </script>. All Rights Reserved, theme by <a class="text-primary"
                                href="https://themefisher.com" target="_blank">themefisher.com</a></p>
                    </div>
                </div>
                <div class="col-sm-6 col-12">
                    <!-- Social Icons -->
                    <ul class="social-media-icons text-right">
                        <li><a class="fa fa-facebook" href="https://www.facebook.com/themefisher" target="_blank"></a>
                        </li>
                        <li><a class="fa fa-twitter" href="https://www.twitter.com/themefisher" target="_blank"></a>
                        </li>
                        <li><a class="fa fa-pinterest-p" href="https://www.pinterest.com/themefisher"
                                target="_blank"></a></li>
                        <li><a class="fa fa-vimeo" href=""></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Container End -->
        <!-- To Top -->
        <div class="top-to">
            <a id="top" class="" href="#"><i class="fa fa-angle-up"></i></a>
        </div>
    </footer>

    <!-- JAVASCRIPTS -->
    <script src="plugins/jQuery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/popper.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap-slider.js"></script>
    <script src="js/store_register.js"></script>
    <!-- tether js -->
    <script src="plugins/tether/js/tether.min.js"></script>
    <script src="plugins/raty/jquery.raty-fa.js"></script>
    <script src="plugins/slick-carousel/slick/slick.min.js"></script>
    <script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="plugins/fancybox/jquery.fancybox.pack.js"></script>
    <script src="plugins/smoothscroll/SmoothScroll.min.js"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places">
    </script>
    <script src="plugins/google-map/gmap.js"></script>


</body>

</html>