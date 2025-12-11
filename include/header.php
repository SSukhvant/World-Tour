<?php 
    include("admin/include/connectDB.php");
    include("include/BrowserDetection.php");
    include("include/Mobile_Detect.php");
    include("include/seo.php");
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
  
  <?php
  // SEO Meta Tags - Use page-specific SEO data or defaults
  $defaultSEO = [
      'title' => $profile_row['name'],
      'description' => 'Explore amazing travel packages, book tours, and create unforgettable travel experiences with WorldTour4u - Your Trusted Travel & Tour Operator.',
      'keywords' => 'travel packages, tour operator, vacation, holidays, travel agency, worldwide tours, adventure travel',
      'url' => (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
      'image' => (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/admin/image/" . htmlspecialchars($about_row['logo']),
      'type' => 'website'
  ];
  
  // Use page-specific SEO if defined, otherwise use defaults
  $seo = isset($seoData) ? array_merge($defaultSEO, $seoData) : $defaultSEO;
  
  // Sanitize
  $seoTitle = htmlspecialchars($seo['title'], ENT_QUOTES, 'UTF-8');
  $seoDesc = htmlspecialchars($seo['description'], ENT_QUOTES, 'UTF-8');
  $seoKeywords = htmlspecialchars($seo['keywords'], ENT_QUOTES, 'UTF-8');
  $seoUrl = htmlspecialchars($seo['url'], ENT_QUOTES, 'UTF-8');
  $seoImage = htmlspecialchars($seo['image'], ENT_QUOTES, 'UTF-8');
  $seoType = htmlspecialchars($seo['type'], ENT_QUOTES, 'UTF-8');
  ?>
  
  <title><?= $seoTitle ?></title>
  <meta name="description" content="<?= $seoDesc ?>">
  <meta name="keywords" content="<?= $seoKeywords ?>">
  <meta name="author" content="WorldTour4u">
  <meta name="robots" content="index, follow">
  <meta name="language" content="English">
  <meta name="revisit-after" content="7 days">
  
  <link rel="canonical" href="<?= $seoUrl ?>">
  
  <!-- Open Graph Tags (Social Media) -->
  <meta property="og:title" content="<?= $seoTitle ?>">
  <meta property="og:description" content="<?= $seoDesc ?>">
  <meta property="og:url" content="<?= $seoUrl ?>">
  <meta property="og:image" content="<?= $seoImage ?>">
  <meta property="og:type" content="<?= $seoType ?>">
  <meta property="og:site_name" content="WorldTour4u">
  <meta property="og:locale" content="en_US">
  
  <!-- Twitter Card Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= $seoTitle ?>">
  <meta name="twitter:description" content="<?= $seoDesc ?>">
  <meta name="twitter:image" content="<?= $seoImage ?>">
  <meta name="twitter:site" content="@worldtour4u">
  
  <!-- Hreflang Tags -->
  <?php generateHrefLangTags(); ?>

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
  <div class="container-fluid container d-flex align-items-center justify-content-between">

    <!-- LEFT: LOGO -->
    <a href="index" class="logo d-flex align-items-center">
      <img src="admin/image/<?= $about_row['logo']; ?>" width="70" alt="Logo">
    </a>

    <!-- CENTER: NAV MENU (Sailor requires single UL) -->
    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="index" class="<?= basename($_SERVER['PHP_SELF'])=='index.php'?'active':'' ?>">Home</a></li>
        <li><a href="about" class="<?= basename($_SERVER['PHP_SELF'])=='about.php'?'active':'' ?>">About</a></li>
        <li><a href="packages" class="<?= basename($_SERVER['PHP_SELF'])=='packages.php'?'active':'' ?>">Packages</a></li>
        <li><a href="blog" class="<?= basename($_SERVER['PHP_SELF'])=='blog.php'?'active':'' ?>">Blog</a></li>
        <li><a href="contact" class="<?= basename($_SERVER['PHP_SELF'])=='contact.php'?'active':'' ?>">Contact</a></li>
      </ul>
      <!-- MOBILE TOGGLE (Required for Sailor JS) -->
      <i class="mobile-nav-toggle bi bi-list d-xl-none"></i>
    </nav>

    <!-- RIGHT CTA BUTTON (desktop only) -->
    <a href="https://wa.me/<?= $about_row['phone']; ?>" 
       class="btn-getstarted d-none d-xl-inline-block">
      Get Started
    </a>

  </div>
</header>


