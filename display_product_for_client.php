<?php
require 'php/connection.php';

$query1 = "SELECT * FROM products WHERE id=?";
$stmt1 = $connection->prepare($query1);
$stmt1->bind_param("i", $_GET['pid']);
$stmt1->execute();
$result1 = $stmt1->get_result();

$query2 = "SELECT s.name name, s.address address, s.phone_number phone, s.email email FROM stores s, products p WHERE p.id=? AND p.store_id=s.id";
$stmt2 = $connection->prepare($query2);
$stmt2->bind_param("i", $_GET['pid']);
$stmt2->execute();
$result2 = $stmt2->get_result();


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
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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

<!--===================================
=            Store Section            =
====================================-->
<?php
if($row1 = $result1->fetch_assoc()){
?>
<section class="section bg-gray">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<!-- Left sidebar -->
			<div class="col-md-8">
				<div class="product-details">
					<h1 class="product-title"><?php echo $row1['name']; ?></h1>
					<div class="product-meta">
						<ul class="list-inline">
							<li class="list-inline-item"><i class="fa fa-user-o"></i> By <a href=""><?php echo $row1['artist']; ?></a></li>
						</ul>
					</div>
					<br>

					<!-- product slider -->
					<div >
						<div class="product-slider-item">
							<img class="img-fluid w-100" src="database_images/<?php echo $row1['picture']; ?>" alt="product-img">
						</div>
						
					</div>
					<!-- product slider -->

					<div class="content mt-5 pt-5">
						
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">Product Description</h3>
								<p><?php echo $row1['description']; ?></p>
							</div>
							
						</div>
					</div>
				</div>
			</div>

	<?php } 
	if($row2 = $result2->fetch_assoc()){
	?>
			<div class="col-md-4">
				<div class="sidebar">
					<div class="widget price text-center">
						<h1 style="color: white;"><?php 
                        if($row1['amount']>0){
                            echo nl2br("Available in Stock\n");
                        }
                        echo $row1['price']; ?>&nbsp USD</h1>
					</div>
					<!-- User Profile widget -->
					<div class="widget user text-center">
						<img class="rounded-circle img-fluid mb-5 px-5" src="database_images/profile_pic.png" alt="">
						<h4><a href=""><?php echo $row2['name']; ?></a></h4>
						<p class="member-time"><?php echo $row2['address']; ?></p>
						<ul class="list-inline mt-20">
							<li class="list-inline-item"><?php echo $row2['email']; ?></li>
							<li class="list-inline-item"><?php echo $row2['phone']; ?></li>
						</ul>
					</div>
                    <div class="widget rate">
					<form method="POST" action="php/add_amount_to_cart.php?pid=<?php echo $_GET['pid'];?>">
						<h5 class="widget-header text-center">Add to Cart</h5>
						<div >
						<input type="text" class="form-control my-2 my-lg-1" id="quantity" name="quantity" placeholder="Quantity">
						</div>
                        <div>
						<button name="submit" class="btn btn-primary" type="submit">Add</button>
						</div>
                    </form>
					</div>
					
					

				</div>
			</div>

			<?php } ?>

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
            </script>. All Rights Reserved, theme by <a class="text-primary" href="https://themefisher.com" target="_blank">themefisher.com</a></p>
        </div>
      </div>
      <div class="col-sm-6 col-12">
        <!-- Social Icons -->
        <ul class="social-media-icons text-right">
          <li><a class="fa fa-facebook" href="https://www.facebook.com/themefisher" target="_blank"></a></li>
          <li><a class="fa fa-twitter" href="https://www.twitter.com/themefisher" target="_blank"></a></li>
          <li><a class="fa fa-pinterest-p" href="https://www.pinterest.com/themefisher" target="_blank"></a></li>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="plugins/google-map/gmap.js"></script>
<script src="js/script.js"></script>

</body>

</html>