<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once '../vendor/autoload.php';

use app\src\User;
$user = new User();

if (!$user->getSession()) {
    header('Location:../login.php');
}
$allUsers = $user->getAllUser();

$id = $_SESSION['uid'];
$username = $_SESSION['uname'];
$email = $_SESSION['uemail'];

$sID        =  $_SESSION['uid'];
$sUname     =  $_SESSION['uname'];
$sUemail    =  $_SESSION['uemail'];
$sUuniqueID =  $_SESSION['uniqueid'];

$allCategory = $user->allCategory();
// echo "<pre>";
// print_r($allCategory);
// echo "</pre>";
// die();


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add post | OWN CMS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


    <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><O>O</O>WN</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Own</b>CMS</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">Admin</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="../logout.php" class="btn btn-default btn-flat">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Admin</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">

                <li class="active">
                    <a href="index.php">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="pull-right"></i>
                    </a>
                </li>

                <li class="treeview">
                    <a href="user-list.php">
                        <i class="fa fa-user"></i> <span>User</span> <i class="pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#">Add User</a></li>
                        <li><a href="user-list.php">All Users</a></li>
                        <li><a href="#">Trashed Users</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="index.php">
                        <i class="fa fa-pencil"></i> <span>Post</span> <i class="pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="post-new.php">Add new</a></li>
                        <li><a href="post-list.php">All posts</a></li>
                        <li><a href="post-trashed.php">Trashed posts</a></li>
                    </ul>
                </li>

                <li>
                    <a href="index.php">
                        <i class="fa fa-bars"></i> <span>Menu</span> <i class="pull-right"></i>
                    </a>
                </li>

                <li>
                    <a href="index.php">
                        <i class="fa fa-tags"></i> <span>Category</span> <i class="pull-right"></i>
                    </a>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <section class="content-header">
            <h1>
                All Category
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Category</a></li>
                <li class="active">All Category</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">


                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                            </div><!-- /. tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body pad">
                          <div class="box-body table-responsive no-padding">
                              <table class="table table-hover">
                                  <tr>
                                      <th>Serial</th>
                                      <th>Category</th>
                                      <th>Action</th>
                                  </tr>

                                          <?php
                                            if ($id == $user->isAdmin($id)) {

                                            $slNo = 0;
                                            foreach ($allCategory as $singleUser) {
                                              $slNo++;

                                              ?>

                                              <tr>
                                                <td><?php echo $slNo; ?></td>
                                                <td><?php echo $singleUser['title']; ?></td>
                                                <td>
                                                    <a href="editCategory.php?id=<?php echo $singleUser['id']?>" title="edit" data-toggle="tooltip"> <i class="fa fa-edit"></i></a><?php echo "  |  ";?>
                                                    <a href="deleteCategory.php?id=<?php echo $singleUser['id']?>" title="move to trash" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                                                </td>
                                              </tr>
                                              <?php

                                            }

                                            } else {
                                          ?>

                                              <tr>
                                                <td>
                                                  <a href="#"title="edit" data-toggle="tooltip"> <i class="fa fa-edit"></i></a>
                                                  <a href="#" title="move to trash"data-toggle="tooltip"> <i class="fa fa-trash"></i></a>
                                                </td>
                                              </tr>


                                          <?php } ?>
                                        </table>
                                      </div><!-- /.box-body -->


                        </div>
                    </div><!-- /.box -->

                </div><!-- /.col-->


            </div><!-- ./row -->
        </section><!-- /.content -->


    </div><!-- /.content-wrapper -->



    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->

        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab"></div>

        </div>

    </aside><!-- /.control-sidebar -->


    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
    });
</script>
</body>
</html>
