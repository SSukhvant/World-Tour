<?php include("include/header.php"); ?>

<main class="main">

  <!-- Page Title + Breadcrumb -->
  <div class="page-title light-background py-4">
    <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-lg-center">
      <h1 class="mb-2 mb-lg-0">All Reviews</h1>

      <nav class="breadcrumbs">
        <ol>
          <li><a href="index">Home</a></li>
          <li class="current">Reviews</li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- End Page Title -->

  <!-- REVIEWS INTRO SECTION -->
  <section class="section py-5 light-background">
    <div class="container" style="max-width:1100px;" data-aos="fade-up">
      <div class="text-center">
        <h2 class="section-heading fw-bold mb-3">Traveler Reviews</h2>
        <p class="section-subtitle text-muted">Read genuine reviews from our customers and see why thousands of travelers choose WorldTour4u for their vacations</p>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section class="reviews-page section py-5">
    <div class="container" style="max-width:1100px;" data-aos="fade-up">

      <div class="row gy-4">

        <?php 
          $review_sql = "SELECT * FROM review ORDER BY id DESC";
          $review_query = mysqli_query($con,$review_sql);
        ?>

        <?php while($r = mysqli_fetch_assoc($review_query)) { 
          $rating_id = $r['star'];
          $rating_sql = "SELECT * FROM rating WHERE id='$rating_id'";
          $rating_query = mysqli_query($con,$rating_sql);
          $rating_row = mysqli_fetch_assoc($rating_query);
        ?>

        <div class="col-12 col-md-6">
          <div class="testimonial-card shadow-sm h-100" data-aos="fade-up">

            <div class="d-flex align-items-start">

              <!-- IMAGE -->
              <img src="admin/image/<?= $r['image']; ?>" class="testimonial-img me-3" alt="">

              <div class="flex-grow-1">
                <h5 class="testimonial-name mb-1"><?= $r['name']; ?></h5>
                <p class="testimonial-email mb-1"><?= $r['email']; ?></p>

                <div class="testimonial-stars mb-1">
                  <?= $rating_row['rating_list'] ?>
                </div>
              </div>

            </div>

            <p class="testimonial-message mt-3">
              <i class="bi bi-quote"></i>
              <?= $r['content']; ?>
              <i class="bi bi-quote quote-right"></i>
            </p>

          </div>
        </div>

        <?php } ?>

      </div>

    </div>
  </section>
  <!-- End Testimonials -->

</main>

<?php include("include/footer.php"); ?>