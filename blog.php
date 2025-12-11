<?php 
include("include/header.php");

// SEO for Blog Page
$seoData = [
    'title' => 'Travel Blog | Tips, Guides & Stories | WorldTour4u',
    'description' => 'Read our travel blog for tips, destination guides, and travel stories. Get inspired for your next adventure with WorldTour4u.',
    'keywords' => 'travel blog, travel tips, travel guides, destination guides, travel stories, travel inspiration',
    'type' => 'website'
];
?>

<main class="main">

  <!-- Page Title + Breadcrumb -->
  <div class="page-title light-background py-4">
    <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-lg-center">
      <h1 class="mb-2 mb-lg-0">All Blogs</h1>

      <nav class="breadcrumbs">
        <ol>
          <li><a href="index">Home</a></li>
          <li class="current">Blogs</li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- End Page Title -->

  <!-- BLOG GRID SECTION -->
  <section class="blogs-page section py-5">
    <div class="container" style="max-width:1100px;" data-aos="fade-up">

      <div class="row gy-4">

        <?php 
          $blogs_sql = "SELECT * FROM blog WHERE status='Published' ORDER BY id DESC";
          $blogs_result = mysqli_query($con, $blogs_sql);
        ?>

        <?php while($blog = mysqli_fetch_assoc($blogs_result)) { ?>

        <div class="col-12 col-md-6 col-lg-4">
          <div class="blog-card h-100 shadow-sm">

            <!-- IMAGE -->
            <div class="blog-image-wrapper">
              <a href="blog-view/<?= $blog['slug']; ?>">
                <img src="admin/image/blog/<?= $blog['featured_image']; ?>" class="blog-img" alt="<?= $blog['title']; ?>">
              </a>
            </div>

            <!-- BODY -->
            <div class="blog-body p-3 d-flex flex-column">

              <h3 class="blog-title"><?= $blog['title']; ?></h3>

              <p class="blog-category mb-1">
                <i class="bi bi-tag-fill text-primary"></i>
                <?= $blog['category']; ?>
              </p>

              <p class="blog-date mb-2">
                <i class="bi bi-calendar-event"></i>
                <?= date("d M Y", strtotime($blog['created_at'])); ?>
              </p>

              <p class="blog-excerpt mb-3">
                <?= substr($blog['excerpt'], 0, 100); ?>...
              </p>

              <a href="blog-view/<?= $blog['slug']; ?>" class="btn btn-primary w-100 mt-auto blog-btn">
                Read Article
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