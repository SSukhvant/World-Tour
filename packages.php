<?php
include("include/header.php");

// SEO for Packages Page
$seoData = [
  'title' => 'Travel Packages | Book Your Dream Vacation with WorldTour4u',
  'description' => 'Discover our collection of exclusive travel packages worldwide. From adventure tours to relaxing vacations, find the perfect holiday package for you. Best prices guaranteed!',
  'keywords' => 'travel packages, tour packages, vacation packages, holiday packages, tour deals, adventure tours, travel deals',
  'type' => 'website'
];
?>

<main class="main">
  <!-- Page Title + Breadcrumb -->
  <div class="page-title light-background py-4">
    <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-lg-center">
      <h1 class="mb-2 mb-lg-0">All Packages</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="index">Home</a></li>
          <li class="current">Packages</li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- End Page Title -->
  <!-- PACKAGE GRID SECTION -->
  <section class="packages-page section py-5">
    <div class="container" style="max-width:1100px;" data-aos="fade-up">
      <div class="row gy-4">
        <?php
        $packages_sql = "SELECT * FROM packages ORDER BY id DESC";
        $packages_result = mysqli_query($con, $packages_sql);
        ?>
        <?php while ($p = mysqli_fetch_assoc($packages_result)) { ?>
          <div class="col-12 col-md-6 col-lg-4">
            <div class="package-card h-100 shadow-sm">
              <!-- IMAGE -->
              <div class="package-image-wrapper">
                <a href="packages-view/<?= $p['id']; ?>">
                  <img src="admin/image/<?= $p['image1']; ?>" class="package-img" alt="<?= $p['title']; ?>">
                </a>
              </div>
              <!-- BODY -->
              <div class="package-body p-3 d-flex flex-column">
                <h3 class="package-title"><?= $p['title']; ?></h3>
                <p class="package-location mb-1">
                  <i class="bi bi-geo-alt-fill text-danger"></i>
                  <?= $p['destination']; ?> • <?= $p['category']; ?>
                </p>
                <p class="package-price">
                  ₹<?= $p['price']; ?>
                  <span class="package-time"><?= $p['time']; ?></span>
                </p>
                <a href="packages-view/<?= $p['id']; ?>" class="btn btn-primary w-100 mt-auto package-btn">
                  View Details
                </a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
</main>
<?php include("include/footer.php"); ?>