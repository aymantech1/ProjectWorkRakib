<?php

if (!isset($_SESSION)) {
	session_start();
}

include_once 'vendor/autoload.php';

use app\src\User;
$user = new User();

$userAllPosts = $user->showArticles();

// echo '<pre>';
// print_r($userAllPosts);
// echo "</pre>";
// die();

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>

	<!-- Responsive Meta Tag -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- main stylesheet -->
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- responsive stylesheet -->
	<link rel="stylesheet" href="assets/css/responsive.css">


	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!--[if lt IE 9]>
		<script src="assets/js/respond.js"></script>
	<![endif]-->


</head>
<body>

	<!-- preloader -->
	<div class="preloader"></div>

	<!-- #topbar -->
	<section id="topbar">
		<div class="container">
			<div class="row">
				<div class="social pull-left">
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</div> <!-- /.social -->
				<div class="contact-info pull-right">
					<ul>
						<li><a href="tel:+1234567890" class="hvr-bounce-to-bottom"><i class="fa fa-phone"></i>  + (123) 456 7890 </a></li>
						<li><a href="mailto:info@plumberx.com" class="hvr-bounce-to-bottom"><i class="fa fa-envelope-o"></i> info@owncms.com</a></li>
					</ul>
				</div> <!-- /.contact-info -->
			</div>
		</div>
	</section> <!-- /#topbar -->

	<!-- header -->
	<header>
		<div class="search-box">
			<div class="container">
				<div class="pull-right search  col-lg-3 col-md-4 col-sm-5 col-xs-12">
					<form action="#">
						<input type="text" placeholder="Search Here"> <button type="submit"><i class="icon icon-Search"></i></button>
					</form>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-4 col-lg-offset-0 col-md-offset-4 logo">
					<a href="index.php">
						<img src="assets/img/resources/logo-209x51.png" alt="Plumberx">
					</a>
				</div>
				<nav class="col-lg-9 col-md-12 col-lg-pull-0 col-md-pull-1 mainmenu-container">
					<button class="mainmenu-toggler">
						<i class="fa fa-bars"></i>
					</button>
					<ul class="mainmenu col-md-offset-3">
						<?php if(isset($_SESSION['uid'])) : ?>
						<li>
							<a href="admin/index.php" class="hvr-overline-from-left">Dashboard</a>
						</li>
						<?php endif; ?>
						<li>
							<a href="index.php" class="hvr-overline-from-left">Home</a>
						</li>
						<li>
							<a href="about.php" class="hvr-overline-from-left">About Us</a>
						</li>
						<li>
							<a href="contact.php" class="hvr-overline-from-left">Contact Us</a>
						</li>
						<?php if(!isset($_SESSION['uid'])) : ?>
						<li>
							<a href="register.php" class="hvr-overline-from-left">Register</a>
						</li>
						<li>
							<a href="login.php" class="hvr-overline-from-left">Login</a>
						</li>
						<?php endif; ?>
					</ul>
				</nav>
			</div>
		</div>
	</header> <!-- /header -->

	<!-- #page-title -->
	<section id="page-title">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- .title -->
					<div class="title pull-left">
						<h1>Home</h1>
					</div> <!-- /.title -->
					<!-- .page-breadcumb -->
					<div class="page-breadcumb pull-right">
						<i class="fa fa-home"></i> <a href="index.php">Home</a>
					</div> <!-- /.page-breadcumb -->
				</div>
			</div>
		</div>
	</section> <!-- /#page-title -->

	<!-- #blog-post -->
	<section id="blog-post">
		<div class="container">
			<div class="row">
				<!-- .blog-content -->
				<div class="col-lg-8 col-md-8 blog-content">

				<?php foreach ($userAllPosts as $userSinglePost) : ?>

					<!-- article -->
					<article class="wow fadeInUp" data-wow-duration=".5s" >
						<div class="img-holder">
							<?php $l=strlen($userSinglePost['image_name']);
							if($l>0){?>
									<img src="<?php echo "assets/img/post/".$userSinglePost['image_name']; ?>" alt=""width="770px" height="330px">
							<?php
							}
							else {?>
									<img src="<?php echo "assets/img/post/fi.png"?>" alt=""width="770px" height="330px"><?php
							}
							?>
						</div>
						<div class="post-meta clearfix">
							<div class="post-date">
								<?php
								$dateMysql = strtotime($userSinglePost['created_at']);
								$dateFormat = date("d", $dateMysql);
								$monthFormat = date("M", $dateMysql);
								$timeFormat = date("g:i A", $dateMysql);
								echo $dateFormat;
								?>
								<span><?php echo $monthFormat; ?></span>
								<span><?php echo $timeFormat; ?></span>
							</div>
							<div class="post-title">
								<h2><?php echo $userSinglePost['title']; ?></h2>
								<ul>
									<li><span>By <?php echo $userSinglePost['username']; ?></span></li>
									<li><span>Outside Plumbing Tips</span></li>
									<li><span>Comments: 8</span></li>
								</ul>
							</div>
						</div>
						<?php echo $userSinglePost['html_details']; ?>
						<a href="singlePost.php?id=<?php echo $userSinglePost['id'];?>" class="read-more">Read more</a>
					</article> <!-- /article -->

					<?php endforeach; ?>

					<div class="post-pagination">
						<ul>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
						</ul>
					</div>

				</div> <!-- /.blog-content -->

				<!-- .sidebar -->
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-lg-push-0 col-md-push-0 col-sm-push-3 col-xs-push-0 sidebar">
					<!-- .sidebar-widget -->
					<div class="sidebar-widget">
						<h4>Search</h4>
						<form action="#" class="search-form">
							<input type="text" placeholder="Enter Search Keywords">
							<button type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div> <!-- /.sidebar-widget -->

					<!-- .sidebar-widget -->
					<div class="sidebar-widget">
						<h4>Quick links</h4>
						<ul class="category-list">
							<li><a href="#"><i class="fa fa-angle-right"></i> Bathroom Plumbing</a></li>
							<li><a class="active" href="#"><i class="fa fa-angle-right"></i> Kitchen Plumbing</a></li>
							<li><a href="#"><i class="fa fa-angle-right"></i> Outside Plumbing</a></li>
							<li><a href="#"><i class="fa fa-angle-right"></i> Pipe Fixing</a></li>
							<li><a href="#"><i class="fa fa-angle-right"></i> Drane Cloge</a></li>
							<li><a href="#"><i class="fa fa-angle-right"></i> Broken Toilets</a></li>
						</ul>
					</div> <!-- /.sidebar-widget -->

					<!-- .sidebar-widget -->
					<div class="sidebar-widget">
						<h4>Popular Posts</h4>
						<ul class="popular-post">
							<li class="clearfix">
								<img src="assets/img/blog-popular-post/1.jpg" alt="">
								<div class="content-wrap">
									<h5>Neque porro quisqua mest qui dolorem.</h5>
									<span>20 June</span>
								</div>
							</li>
							<li class="clearfix">
								<img src="assets/img/blog-popular-post/2.jpg" alt="">
								<div class="content-wrap">
									<h5>Neque porro quisqua mest qui dolorem.</h5>
									<span>20 June</span>
								</div>
							</li>
							<li class="clearfix">
								<img src="assets/img/blog-popular-post/3.jpg" alt="">
								<div class="content-wrap">
									<h5>Neque porro quisqua mest qui dolorem.</h5>
									<span>20 June</span>
								</div>
							</li>
						</ul>
					</div> <!-- /.sidebar-widget -->

					<!-- .sidebar-widget -->
					<div class="sidebar-widget text-widget">
						<h4>Text Widget</h4>
						<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore que laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi arch itecto beatae vitae dict eaque ipsa quae.</p>
					</div> <!-- /.sidebar-widget -->

					<!-- .sidebar-widget -->
					<div class="sidebar-widget">
						<h4>Tags Clouds</h4>
						<div class="tag-cloud">
							<a href="#">Kitchen Plumbing </a>
							<a href="#">Pipe fixes</a>
							<a href="#">Drain Cleaning</a>
							<a href="#">tips</a>
							<a href="#">Pipe leakages</a>
							<a href="#">outside Plumbing </a>
						</div>
					</div> <!-- /.sidebar-widget -->
				</div> <!-- /.sidebar -->
			</div>
		</div>
	</section> <!-- /#blog-post -->



	<!-- #bottom-bar -->
	<section id="bottom-bar">
		<div class="container">
			<div class="row">
				<!-- .copyright -->
				<div class="copyright pull-left">
					<p>Copyright &copy; OWNCMS <?php echo date('Y');?>. All rights reserved. </p>
				</div> <!-- /.copyright -->
				<!-- .credit -->
				<div class="credit pull-right">
					<p>Created by: </p>
				</div> <!-- /.credit -->
			</div>
		</div>
	</section><!-- /#bottom-bar -->



	<script src="assets/js/jquery.min.js"></script> <!-- jQuery JS -->
	<script src="assets/js/bootstrap.min.js"></script> <!-- BootStrap JS -->
	<script src="http://maps.google.com/maps/api/js"></script> <!-- Gmap Helper -->
	<script src="assets/js/gmap.js"></script> <!-- gmap JS -->
	<script src="assets/js/wow.js"></script> <!-- WOW JS -->
	<script src="assets/js/isotope.pkgd.min.js"></script> <!-- iSotope JS -->
	<script src="assets/js/owl.carousel.min.js"></script> <!-- OWL Carousle JS -->
	<script src="assets/js/jquery.fancybox.pack.js"></script> <!-- FancyBox -->
	<script src="assets/js/jquery.easing.min.js"></script> <!-- EaseIng JS -->
	<script src="assets/js/custom.js"></script> <!-- Custom JS -->

</body>
</html>
