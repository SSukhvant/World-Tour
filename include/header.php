<?php 
    include("admin/include/connectDB.php");
    include("include/BrowserDetection.php");
    include("include/Mobile_Detect.php");
    setcookie('visitor_logged', '1', time() + 1200, "/");
    $con = connectDB();

      $browser=new Wolfcast\BrowserDetection;

      $browser_name=$browser->getName();
      $browser_version=$browser->getVersion();

      $detect=new Mobile_Detect();

      if($detect->isMobile()){
        $type='Mobile';
      }elseif($detect->isTablet()){
        $type='Tablet';
      }else{
        $type='PC';
      }

      if($detect->isiOS()){
        $os='IOS';
      }elseif($detect->isAndroidOS()){
        $os='Android';
      }else{
        $os='Window';
      }

      $url=(isset($_SERVER['HTTPS'])) ? "https":"http";
      $url.="//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
      $ref='';
      if(isset($_SERVER['HTTP_REFERER'])){
        $ref=$_SERVER['HTTP_REFERER'];
      }
      $broswer_ip = gethostbyaddr($_SERVER['REMOTE_ADDR']);
      
      if (!isset($_COOKIE['visitor_logged'])) {
        setcookie('visitor_logged', '1', time() + 1200, "/"); // 1 hour cookie

        // Insert visitor data
        $insert_sql = "INSERT INTO visitor(browser_name, browser_version, broswer_ip, type, os, url, ref, brows_date) 
                       VALUES('$browser_name','$browser_version','$broswer_ip','$type','$os','$url','$ref', NOW())";
        mysqli_query($con, $insert_sql);
    }

    if($con){

    $about_sql = "SELECT * FROM about";
    $about_query = mysqli_query($con,$about_sql);
    $about_row = mysqli_fetch_assoc($about_query);

    $social_link = "SELECT * FROM socialmedia";
    $social_query = mysqli_query($con,$social_link);
    $social_row = mysqli_fetch_assoc($social_query);

    $termandcondition_link = "SELECT * FROM termandcondition";
    $termandcondition_query = mysqli_query($con,$termandcondition_link);
    $termandcondition_row = mysqli_fetch_assoc($termandcondition_query);

    $profile_sql = "SELECT * FROM admin";
    $profile_query = mysqli_query($con,$profile_sql);
    $profile_row = mysqli_fetch_assoc($profile_query);

    $map_sql = "SELECT * FROM map";
    $map_query = mysqli_query($con,$map_sql);
    $map_row = mysqli_fetch_assoc($map_query);
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo $_SERVER['PHP_SELF'];?>" target="_self">
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?= $profile_row['name'];?></title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="admin/image/<?= $about_row['logo'];?>" rel="icon">
  <link href="admin/image/<?= $about_row['logo'];?>" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/custom.css" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container position-relative d-flex align-items-center justify-content-between">

      <a href="index" class="d-flex align-items-center me-aut">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <img width="70" src="admin/image/<?= $about_row['logo'];?>">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index" class="active">Home</a></li>
          <li><a href="about">About</a></li>
          <li><a href="packages">Packages</a></li>
          <li><a href="contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a target="_blank" class="btn-getstarted" href="https://wa.me/<?= $about_row['phone']; ?>">Get Started</a>

    </div>
  </header>