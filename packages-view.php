<?php include("include/header.php"); ?>

<?php
if (isset($_GET['id'])) {
  $id = (int) $_GET['id'];
  $sql = mysqli_query($con, "SELECT * FROM packages WHERE id='$id' LIMIT 1");
  $p = mysqli_fetch_assoc($sql);

  // SEO for Package Details Page
  $seoData = [
    'title' => $p['title'] . ' - Book Now | WorldTour4u',
    'description' => substr(strip_tags($p['content']), 0, 160) . '...',
    'keywords' => $p['destination'] . ', ' . $p['category'] . ', travel package, tour, vacation',
    'image' => (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/admin/image/" . htmlspecialchars($p['image1']),
    'type' => 'product'
  ];
}
?>

<main class="main">
  <!-- Breadcrumb -->
  <div class="page-title light-background py-4">
    <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-lg-center">
      <h1 class="mb-2 mb-lg-0"><?= $p['title'] ?></h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="index">Home</a></li>
          <li><a href="packages">Packages</a></li>
          <li class="current"><?= $p['title'] ?></li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- MAIN CONTENT + STICKY SIDEBAR -->
  <section class="section py-5 package-details">
    <div class="container" style="max-width:1150px;">
      <div class="row g-4">
        <!-- LEFT CONTENT AREA -->
        <div class="col-lg-8">
          <h2 class="package-title mb-3"><?= $p['title']; ?></h2>
          <div class="package-meta mb-3">
            <span><i class="bi bi-geo-alt-fill text-danger"></i> <?= $p['destination']; ?> • <?= $p['category']; ?></span>
            <span><i class="bi bi-clock"></i> <?= $p['time']; ?></span>
            <span><i class="bi bi-cash-coin"></i> ₹<?= $p['price']; ?></span>
          </div>
          <!-- FULL CONTENT -->
          <div class="package-full-content p-3 mb-4 shadow-sm rounded">
            <?= $p['content']; ?>
          </div>
        </div>
        <!-- RIGHT SIDEBAR (STICKY) -->
        <div class="col-lg-4">
          <div class="sticky-sidebar">
            <!-- PACKAGE IMAGE WITH VIEW BUTTON -->
            <div class="package-detail-img shadow-sm rounded overflow-hidden mb-4 position-relative">
              <img src="admin/image/<?= $p['image1']; ?>" class="img-fluid w-100 h-100">
              <a href="admin/image/<?= $p['image1']; ?>"
                class="view-btn glightbox"
                data-gallery="package-gallery">
                <i class="bi bi-arrows-fullscreen"></i> View Image
              </a>
            </div>
            <!-- OTHER PACKAGES -->
            <h4 class="sidebar-title">Other Packages</h4>
            <ul class="sidebar-package-list mb-4">
              <?php
              $others = mysqli_query(
                $con,
                "SELECT id,title FROM packages 
                 WHERE id!='$id' ORDER BY id DESC LIMIT 10"
              );
              while ($op = mysqli_fetch_assoc($others)) { ?>
                <li>
                  <a href="packages-view/<?= $op['id']; ?>">
                    <i class="bi bi-chevron-right"></i> <?= $op['title']; ?>
                  </a>
                </li>
              <?php } ?>
            </ul>
            <!-- CTA SMALL BOX -->
            <div class="cta-side-box text-center shadow-sm p-3 rounded mt-4">
              <h5 class="fw-bold mb-2">Need Help?</h5>
              <p class="small mb-3">Talk to our travel expert anytime.</p>
              <a href="tel:<?= $about_row['phone']; ?>"
                class="btn btn-primary w-100 fw-semibold rounded-pill">
                Call Us
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- POPULAR PACKAGES -->
  <section class="popular-packages section py-5">
    <div class="container" style="max-width:1150px;">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="section-heading mb-0">Popular Packages</h3>
        <a href="packages" class="text-primary small fw-semibold">View All Packages →</a>
      </div>
      <div class="row gy-4">
        <?php
        $popular = mysqli_query(
          $con,
          "SELECT * FROM packages WHERE id!='$id' ORDER BY RAND() LIMIT 6"
        );
        while ($pp = mysqli_fetch_assoc($popular)) { ?>
          <div class="col-md-6 col-lg-4">
            <div class="package-card shadow-sm h-100">
              <div class="package-image-wrapper">
                <a href="packages-view/<?= $pp['id']; ?>">
                  <img src="admin/image/<?= $pp['image1']; ?>" class="package-img">
                </a>
              </div>
              <div class="package-body p-3 d-flex flex-column">
                <h3 class="package-title-sm"><?= $pp['title']; ?></h3>
                <p class="package-location mb-1">
                  <i class="bi bi-geo-alt-fill text-danger"></i>
                  <?= $pp['destination']; ?> • <?= $pp['category']; ?>
                </p>
                <p class="package-price mb-2">
                  ₹<?= $pp['price']; ?>
                  <span><?= $pp['time']; ?></span>
                </p>
                <a href="packages-view/<?= $pp['id']; ?>"
                  class="btn btn-outline-primary w-100 mt-auto package-btn">
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
<?php
// Generate Package Product Schema
if (isset($p) && $p) {
  generatePackageSchema($p);
}
?>
<?php include("include/footer.php"); ?>