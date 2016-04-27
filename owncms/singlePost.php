<?php
include_once 'vendor/autoload.php';
use app\src\User;

$id = $_GET['id'];
$user = new User();
$userSinglePosts = $user->SinglePostsRakib($id);
$featured_image = $user->fImageRakib($id);
// echo "<pre>";
// print_r($featured_image);
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

    <section id="page-title">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <!-- .title -->
            <div class="title pull-left">
              <h1>Single View</h1>
            </div> <!-- /.title -->
            <!-- .page-breadcumb -->
            <div class="page-breadcumb pull-right">
              <i class="fa fa-home"></i>Single View
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

          <?php foreach ($userSinglePosts as $userSinglePost) : ?>

            <!-- article -->
            <article class="wow fadeInUp" data-wow-duration=".5s" >
              <div class="img-holder">

                <?php
                if(!empty($featured_image)){?>
                    <img src="<?php echo "assets/img/post/".$featured_image[0]['image_name']; ?>"alt="" width="770px" height="330px">
                <?php
                }
                elseif(empty($featured_image)) {
                ?>
                    <img src="<?php echo "assets/img/post/fi.png"?>" alt=""width="770px" height="330px">
                <?php
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
                  </ul>
                </div>
              </div>
              <?php echo $userSinglePost['html_details']; ?>
            </article> <!-- /article -->

            <?php endforeach; ?>
          </div> <!-- /.blog-content -->
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
            <p>Created by: Rakib Hossain</p>
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
