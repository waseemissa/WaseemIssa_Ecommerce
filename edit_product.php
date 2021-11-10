<?php
require 'php/connection.php';

$product_id = $_GET['pid'];

$query = "SELECT * FROM products WHERE id = ?";
$stmt =  $connection->prepare($query);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

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
                        <a class="navbar-brand" href="index.php">
                            <u><i class="fa fa-music"></i>Live Love Music</u>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto main-nav ">

                                <li class="nav-item">
                                    <a class="nav-link text-white add-button" href="php/logout.php">Log Out</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <?php if($row = $result->fetch_assoc()){ ?>

    <section class="ad-post bg-gray py-5">
        <div class="container">
            <form action="php/edit_product.php?pid=<?php echo $row['id']; ?>" method="POST"
                enctype="multipart/form-data">
                <!-- Post Your ad start -->
                <fieldset class="border border-gary p-4 mb-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Edit Product</h3>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Title of Product:</h6>
                            <input name="product_name" id="product_name" type="text"
                                class="border w-100 p-2 bg-white text-capitalize"
                                placeholder="<?php echo $row['name']; ?>">
                            <h6 class="font-weight-bold pt-4 pb-1">Artist:</h6>
                            <div class="row px-3">
                                <input name="product_artist" id="product_artist" type="text"
                                    class="border w-100 p-2 bg-white text-capitalize"
                                    placeholder="<?php echo $row['artist']; ?>">
                            </div>
                            <h6 class="font-weight-bold pt-4 pb-1">Quantity:</h6>
                            <div class="row px-3">
                                <input name="product_amount" id="product_amount" type="text"
                                    class="border w-100 p-2 bg-white text-capitalize"
                                    placeholder="<?php echo $row['amount']; ?>">
                            </div>
                            <h6 class="font-weight-bold pt-4 pb-1">Price (in USD):</h6>
                            <div class="row px-3">
                                <input name="product_price" id="product_price" type="text"
                                    class="border w-100 p-2 bg-white text-capitalize"
                                    placeholder="<?php echo $row['price']; ?>">
                            </div>
                            <h6 class="font-weight-bold pt-4 pb-1">Description:</h6>
                            <textarea name="product_description" id="product_description" class="border p-3 w-100"
                                rows="7" placeholder="<?php echo $row['description']; ?>"></textarea>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <center> <img style="width: 250px; height=:250px;"
                                        src="database_images/<?php echo $row['picture']; ?>"></img></center>
                            </div>
                            <div class="choose-file text-center my-4 py-4 rounded">
                                <label for="file-upload">
                                    <span class="d-block font-weight-bold text-dark">Drop files anywhere to
                                        upload</span>
                                    <span class="d-block">or</span>
                                    <span class="d-block btn bg-primary text-white my-3 select-files">Select
                                        files</span>
                                    <span class="d-block">Maximum upload file size: 500 KB</span>
                                    <input type="file" class="form-control-file d-none" id="file-upload"
                                        name="file_upload">
                                </label>
                            </div>
                            <center><button name="submit_button" id="btn_submit" type="submit"
                                    class="btn btn-primary d-block mt-2">Submit Edition</button></center>
                        </div>
                    </div>
                </fieldset>
                <!-- Post Your ad end -->



            </form>
        </div>
    </section>
    <?php } ?>
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
    <script src="js/script.js"></script>

</body>

</html>