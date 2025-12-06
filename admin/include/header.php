<?php
  session_start();
  if(!isset($_SESSION['IS_ADMIN_LOGIN'])){
    header('location:index.php');
  }


  include("include/connectDB.php");
  $con = connectDB();
  
    $about_sql = "SELECT * FROM about";
    $about_query = mysqli_query($con,$about_sql);
    $about_row = mysqli_fetch_assoc($about_query);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="image/<?= $about_row['logo'];?>" rel="icon">
    <link href="image/<?= $about_row['logo'];?>" rel="apple-touch-icon">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.5.2/metisMenu.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/3.3.7/css/sb-admin-2.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/416491/timeline.css">
    <link rel="stylesheet" type="text/css" href="assets/css/index.css">
    <script src="assets/ckeditor/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
  <body>
    
    <div id="wrapper">
      <!-- Navigation -->
      <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="dashboard">Admin Panel</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-messages">
              
              <?php 
                $message_sql = "SELECT * FROM message ORDER BY id DESC LIMIT 4";
                $message_result = mysqli_query($con,$message_sql);
              ?>
              <?php while($message_row = mysqli_fetch_assoc($message_result)){ ?>
                    <li>
                      <a href="message-view.php?id=<?php echo $message_row['id'];?>">
                        <div>
                          <strong><?php echo $message_row['name'];?></strong>
                          <span class="pull-right text-muted">
                            <!-- <em>Yesterday</em> -->
                          </span>
                        </div>
                        <div><?php echo substr($message_row['message'],0,100);?>...</div>
                      </a>
                    </li>
                    <li class="divider"></li>


                    
                <?php }?>
              <li>
                <a class="text-center" href="message">
                  <strong>Read All Messages</strong>
                  <i class="fa fa-angle-right"></i>
                </a>
              </li>
            </ul>
            <!-- /.dropdown-messages -->
          </li>
          <!-- /.dropdown -->
          
          <!-- /.dropdown -->
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
              <li>
                <a href="profile"><i class="fa fa-gear fa-fw"></i> Settings</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
              </li>
            </ul>
            <!-- /.dropdown-user -->
          </li>
          <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
          <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
              <li class="sidebar-search">
                <div class="input-group custom-search-form">
                  <input type="text" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                      <i class="fa fa-search"></i>
                    </button>
                  </span>
                </div>
                <!-- /input-group -->
              </li>
              <li>
                <a href="dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
              </li>



              <li>
                <a href="#"><i class="fa fa-edit fa-fw"></i> Content Management <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li>
                    <a href="banner">Banners</a>
                  </li>
                </ul>
                <!-- /.nav-second-level -->
              </li>



              <li>
                <a href="#"><i class="fa fa-files-o fa-fw"></i>Pages<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li>
                    <a href="about">About Us</a>
                  </li>

                  <li>
                    <a href="socialmedia">Social Media</a>
                  </li>

                </ul>
                <!-- /.nav-second-level -->
              </li>


              <li>
                <a href="#"><i class="fa fa-star"></i> Reviews <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li>
                    <a href="review">User Review</a>
                  </li>
                </ul>
                <!-- /.nav-second-level -->
              </li>

              <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Packages <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li>
                    <a href="packages">Packages</a>
                  </li>
                  <li>
                    <a href="packages-offer">Packages Offer</a>
                  </li>
                </ul>
                <!-- /.nav-second-level -->
              </li>

               <li>
                <a href="#"><i class="fa fa-comment fa-fw"></i> Message <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li>
                    <a href="message">Message List</a>
                  </li>
                </ul>
                <!-- /.nav-second-level -->
              </li>

              <li>
                <a href="#"><i class="fa fa-info-circle fa-fw"></i> Enquiries <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                <li><a href="taxi-enquiries.php">Taxi Enquiries</a></li>
               <li><a href="passport-enquiries.php">Passport Enquiries</a></li>
               <li><a href="package-enquiries.php">Package Enquiries</a></li>
                </ul>
                <!-- /.nav-second-level -->
              </li>

              <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Support <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li>
                    <a href="faqs">faqs</a>
                  </li>
                  <li>
                    <a href="termandcondition">Term And Condition</a>
                  </li>
                </ul>
                <!-- /.nav-second-level -->
              </li>

              

              <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i>Setting<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li>
                    <a href="profile">Profile</a>
                  </li>
                  <li>
                </ul>
                <!-- /.nav-second-level -->
              </li>
            </ul>
          </div>
          <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
      </nav>