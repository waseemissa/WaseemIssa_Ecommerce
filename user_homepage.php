<?php
session_start();
require 'php/connection.php';

//get products
$query1 = "SELECT * FROM products";
$stmt1 = $connection->prepare($query1);
$stmt1->execute();
$result1 = $stmt1->get_result();

//get count of purchases
$query2 = "SELECT SUM(amount) AS total FROM users_buy_products WHERE user_id = ? GROUP BY user_Id";
$stmt2 = $connection->prepare($query2);
$stmt2->bind_param("i", $_SESSION['user_id']);
$stmt2->execute();
$result2 = $stmt2->get_result();

//get Likes

$query3 = "SELECT COUNT(*) as total_likes FROM users_like_products WHERE user_id=?";
$stmt3 = $connection->prepare($query3);
$stmt3->bind_param("i", $_SESSION['user_id']);
$stmt3->execute();
$result3 = $stmt3->get_result();


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
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <div class="advance-search">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 align-content-center">
                    <form method="POST" action="search_after_login.php">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control my-2 my-lg-1" id="item_name" name="name"
                                    placeholder="What are you looking for">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control my-2 my-lg-1" id="description_text"
                                    name="description" placeholder="Details">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control my-2 my-lg-1" id="artist_name" name="artist"
                                    placeholder="Artist">
                            </div>
                            <div class="form-group col-md-2 align-self-center">
                                <button name="submit" type="submit" class="btn btn-primary">Search Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--==================================
=            User Profile            =
===================================-->
    <section class="dashboard section">
        <!-- Container Start -->
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
                    <div class="sidebar">
                        <!-- User Widget -->
                        <div class="widget user-dashboard-profile">
                            <!-- User Image -->
                            <div class="profile-thumb">
                                <img src="database_images/profile_pic.png" alt="" class="rounded-circle">
                            </div>
                            <!-- User Name -->
                            <h5 class="text-center">
                              <?php
                              echo $_SESSION['first_name']." ".$_SESSION['last_name'];
                              ?>
                            </h5>
                            <p><?php
                                echo nl2br($_SESSION['address']."\n");
                                echo nl2br($_SESSION['email']."\n");
                                ?>
                            </p>
                        </div>
                        <!-- Dashboard Links -->
                        <div class="widget user-dashboard-menu">
                            <ul>
                                <li class="active"><a href="#"><i class="fa fa-user"></i> All Products</a></li>
                                <li><a href="user_cart.php"><i class="fa fa-bookmark-o"></i>Cart
                                        <span id="#total_in_cart">
                                            <?php 
                                            if($row2 = $result2->fetch_assoc()){
                                                echo $row2['total'];
                                            }
                                            ?>
                                        </span>
                                    </a></li>
                                <li><a href="#"><i class="fa fa-heart"></i>Likes
                                        <span id="#total_likes">
                                            <?php 
                                            if($row3 = $result3->fetch_assoc()){
                                                echo $row3['total_likes'];
                                            }
                                            ?>
                                        </span>
                                    </a></li>
                                <li><a href="php/logout.php"><i class="fa fa-cog"></i> Logout</a></li>
                                <li><a href="php/delete_user_account.php?uid=<?php echo $_SESSION['user_id']; ?>"><i
                                            class="fa fa-power-off"></i>Delete Account</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">


                    <!-- Products -->
                    <div class="widget dashboard-container my-adslist">
                        <h3 class="widget-header">All Products</h3>
                        <table class="table table-responsive product-dashboard-table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th class="text-center">Artist</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <?php
                                    while($row1 = $result1->fetch_array()){
                                    ?>
                                    <td class="product-thumb">
                                        <img width="80px" height="auto"
                                            src="<?php echo "database_images/".$row1['picture'];?>"
                                            alt="image description">
                                    </td>
                                    <td class="product-details">
                                        <h3 class="title"><?php echo $row1['name'];?></h3>
                                        <span class="add-id"><strong><?php echo $row1['description'];?></span>
                                    </td>
                                    <td class="product-category"><span
                                            class="categories"><?php echo $row1['artist'];?></span></td>
                                    <td class="action" data-title="Action">
                                        <div class="">
                                            <ul class="list-inline justify-content-center">
                                                <li class="list-inline-item">
                                                    <button class="edit like"
                                                        style="color: red; height: 41px; width: 41px; border:none; border-radius: 50%; "
                                                        name="like" id="like" data-toggle="tooltip" data-placement="top"
                                                        title="Like" value="<?php echo $row1['id']; ?>">
                                                        <i class="fa fa-heart"></i>
                                                    </button>
                                                    <a data-toggle="tooltip" data-placement="top" title="view"
                                                        class="view"
                                                        href="display_product_for_client.php?pid=<?php echo $row1['id']; ?>">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <button class="edit add_to_cart"
                                                        style="color: cyan; height: 41px; width: 41px; border:none; border-radius: 50%; "
                                                        name="add_to_cart" id="add_to_cart" data-toggle="tooltip"
                                                        data-placement="top" title="Add To Cart"
                                                        value="<?php echo $row1['id']; ?>">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Row End -->
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
    <script src="js/user_homepage.js"></script>
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