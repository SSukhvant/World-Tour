<?php include("include/header.php"); ?>

<main class="main">

  <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Blogs</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="index">Home</a></li>
          <li class="current">Blogs</li>
        </ol>
      </nav>
    </div>
  </div>

  <section class="section">
    <div class="container">

      <div class="row gy-4">

        <?php
        // Only show published blogs on frontend
        $blog_sql = mysqli_query($con, "SELECT * FROM blog WHERE status='Published' ORDER BY id DESC");
        while ($blog = mysqli_fetch_assoc($blog_sql)) { 
        ?>

        <div class="col-lg-4 col-md-6">
          <div class="blog-card google-card p-3">

            <div class="blog-img mb-3">
              <?php if (!empty($blog['featured_image'])) { ?>
                <img src="admin/image/blog/<?php echo $blog['featured_image']; ?>" class="img-fluid rounded" alt="">
              <?php } ?>
            </div>

            <h5 class="fw-semibold"><?php echo $blog['title']; ?></h5>

            <p class="small text-muted">
              <?php echo substr($blog['excerpt'], 0, 120); ?>...
            </p>

            <a href="blog-view/<?php echo $blog['slug']; ?>" class="btn btn-primary btn-sm mt-2">
              Read More
            </a>

          </div>
        </div>

        <?php } ?>

      </div>

    </div>
  </section>

</main>

<?php include("include/footer.php"); ?>