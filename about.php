<?php
include("include/header.php");

$seoData = [
  'title' => 'About WorldTour4u | Your Trusted Travel & Tour Operator',
  'description' => 'Learn about WorldTour4u, your trusted travel partner. Discover our mission, values, and why thousands of travelers choose us for their adventures.',
  'keywords' => 'about us, travel operator, trusted travel agency, tour company, travel experts',
  'type' => 'organization'
];
?>

<main class="main">
  <div class="page-title light-background py-4">
    <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-lg-center">
      <h1 class="mb-2 mb-lg-0">About Us</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="index">Home</a></li>
          <li class="current">About</li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- End Page Title -->
  <!-- About Section -->
  <section class="about-page section py-5">
    <div class="container" style="max-width:1100px;" data-aos="fade-up">
      <div class="row g-4 g-lg-5 align-items-center">
        <!-- LEFT IMAGE -->
        <div class="col-lg-5">
          <div class="about-img-wrapper shadow-sm rounded overflow-hidden">
            <img
              src="admin/image/<?= $about_row['about_image']; ?>"
              class="img-fluid w-100 h-100"
              loading="lazy"
              style="object-fit: cover;"
              alt="<?= htmlspecialchars($about_row['title']) ?> - WorldTour4u Team">
          </div>
        </div>
        <!-- RIGHT CONTENT -->
        <div class="col-lg-7">
          <h2 class="fw-bold mb-3 about-title">
            <?= $about_row['title']; ?>
          </h2>
          <!-- Tab Content -->
          <div class="tab-content">
            <div id="about-tab" class="tab-pane fade show active">
              <div class="about-text">
                <?= nl2br($about_row['content']); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End About Section -->
  <!-- WHY CHOOSE US SECTION (Matching Theme) -->
  <section class="services-section">
    <div class="services-container container">
      <div class="py-5 section-title" data-aos="fade-up">
        <h2>Why Choose Us</h2>
        <p>What Makes WorldTour4u Different</p>
      </div>
      <div class="services-grid" data-aos="fade-up" data-aos-delay="200">
        <!-- Expert Guides -->
        <div class="service-card">
          <img src="assets/img/services/experts-guide.jpg" class="service-img" loading="lazy" alt="Expert Guides">
          <div class="service-card-body">
            <div class="service-icon service-icon--blue">
              <i class="bi bi-award"></i>
            </div>
            <h3 class="service-title">Expert Guides</h3>
            <p class="service-desc">Experienced travel experts with 10+ years in the industry</p>
          </div>
        </div>
        <!-- Best Prices -->
        <div class="service-card">
          <img src="assets/img/services/best-price.jpg" class="service-img" loading="lazy" alt="Best Prices">
          <div class="service-card-body">
            <div class="service-icon service-icon--green">
              <i class="bi bi-shield-check"></i>
            </div>
            <h3 class="service-title">Best Prices</h3>
            <p class="service-desc">Competitive rates and exclusive discounts for all packages</p>
          </div>
        </div>
        <!-- 24/7 Support -->
        <div class="service-card">
          <img src="assets/img/services/24x7.jpg" class="service-img" loading="lazy" alt="24/7 Support">
          <div class="service-card-body">
            <div class="service-icon service-icon--blue">
              <i class="bi bi-headset"></i>
            </div>
            <h3 class="service-title">24/7 Support</h3>
            <p class="service-desc">Round-the-clock customer support for your peace of mind</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Why Choose Us Section -->
  <!-- MISSION & VALUES SECTION -->
  <section class="py-5">
    <div class="container" style="max-width:1100px;" data-aos="fade-up">
      <div class="text-center mb-5">
        <h2 class="section-heading fw-bold">Our Mission & Values</h2>
        <p class="section-subtitle text-muted">Guided by purpose and principles</p>
      </div>
      <div class="row g-4 align-items-center">
        <!-- LEFT CONTENT -->
        <div class="col-lg-6">
          <h3 class="fw-bold mb-3">Our Mission</h3>
          <p class="text-muted mb-3">
            At WorldTour4u, our mission is to make travel accessible, affordable, and unforgettable for everyone.
            We believe that travel enriches lives, broadens perspectives, and creates lasting memories.
          </p>
          <ul class="list-unstyled">
            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> Provide customized travel experiences</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> Ensure customer satisfaction</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> Support sustainable tourism</li>
          </ul>
        </div>
        <!-- RIGHT CONTENT -->
        <div class="col-lg-6">
          <h3 class="fw-bold mb-3">Our Values</h3>
          <p class="text-muted mb-3">
            We are committed to excellence, integrity, and customer-first service in everything we do.
          </p>
          <ul class="list-unstyled">
            <li class="mb-2"><i class="bi bi-heart-fill text-danger me-2"></i> <strong>Passion:</strong> Love for travel and discovery</li>
            <li class="mb-2"><i class="bi bi-star-fill text-warning me-2"></i> <strong>Quality:</strong> Excellence in every service</li>
            <li class="mb-2"><i class="bi bi-hand-thumbs-up-fill text-info me-2"></i> <strong>Trust:</strong> Reliability and transparency</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Mission & Values -->
  <!-- Achievements Section -->
  <section class="achievements-section">
    <div class="achievements-container">
      <div class="achievement-card">
        <div class="achievement-icon">
          <i class="bi bi-people-fill"></i>
        </div>
        <div class="achievement-value" data-value="10000">0</div>
        <p class="achievement-label">Happy Customers</p>
      </div>
      <div class="achievement-card">
        <div class="achievement-icon">
          <i class="bi bi-airplane-fill"></i>
        </div>
        <div class="achievement-value" data-value="250">0</div>
        <p class="achievement-label">Successful Trips</p>
      </div>
      <div class="achievement-card">
        <div class="achievement-icon">
          <i class="bi bi-geo-alt-fill"></i>
        </div>
        <div class="achievement-value" data-value="20">0</div>
        <p class="achievement-label">Destinations Covered</p>
      </div>
      <div class="achievement-card">
        <div class="achievement-icon">
          <i class="bi bi-award-fill"></i>
        </div>
        <div class="achievement-value" data-value="8">0</div>
        <p class="achievement-label">Years of Experience</p>
      </div>
    </div>
  </section>
  <!-- End Achievements Section -->
  <!-- Testimonials Section -->
  <section id="testimonials" class="py-5 testimonials-section">
    <div class="container" style="max-width:1100px;">
      <div class="container py-5 section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p>Latest Reviews<br></p>
        <span class="search-subtitle">Experiences Shared by Our Happy Customers</span>
      </div>
      <div class="row g-4">
        <?php
        $review_sql = "SELECT * FROM review ORDER BY id DESC LIMIT 4";
        $review_query = mysqli_query($con, $review_sql);
        ?>
        <?php while ($review_row = mysqli_fetch_assoc($review_query)) {
          // Fetch Rating
          $rating_id = $review_row['star'];
          $rating_sql = "SELECT * FROM rating WHERE id='$rating_id'";
          $rating_query = mysqli_query($con, $rating_sql);
          $rating_row = mysqli_fetch_assoc($rating_query);
        ?>
          <div class="col-lg-6">
            <div class="card testimonial-card shadow-sm border-0 h-100 d-flex flex-column" data-aos="fade-up">
              <!-- Header -->
              <div class="testimonial-header d-flex align-items-start">
                <img
                  src="admin/image/<?= $review_row['image']; ?>"
                  class="testimonial-img me-3"
                  alt="<?= $review_row['name']; ?>">
                <div class="flex-grow-1">
                  <h5 class="testimonial-name mb-1"><?= $review_row['name']; ?></h5>
                  <p class="testimonial-email mb-1">
                    <?= $review_row['email']; ?>
                  </p>
                  <div class="testimonial-stars mb-1">
                    <?= $rating_row['rating_list']; ?>
                  </div>
                </div>
              </div>
              <!-- Review Content -->
              <div class="testimonial-content mt-3 flex-grow-1 d-flex align-items-end">
                <p class="testimonial-message mb-0">
                  <i class="bi bi-quote"></i>
                  <?= $review_row['content']; ?>
                  <i class="bi bi-quote quote-right"></i>
                </p>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="text-center mt-4">
        <a href="reviews" class="btn btn-primary px-4 fw-semibold">See More</a>
      </div>
    </div>
  </section>
  <!-- End Testimonials Section -->
  <!-- CTA Section -->
  <section class="cta-section py-5 mt-5">
    <div class="container text-center" style="max-width:900px;">
      <h2 class="cta-title mb-3">Ready to Plan Your Next Trip?</h2>
      <p class="cta-subtitle mb-4">
        Let our expert travel team help you customize the perfect itinerary
        for your dream vacation.
      </p>
      <div class="d-flex justify-content-center gap-3 flex-wrap">
        <a href="contact" class="btn btn-primary px-4 py-2 fw-semibold rounded-3">
          Contact Us
        </a>
        <button
          class="btn btn-outline-primary px-4 py-2 fw-semibold rounded-3"
          onclick="openPackageEnquiry('General Enquiry')">
          Enquire Now
        </button>
      </div>
    </div>
  </section>
  <!-- End CTA -->
</main>

<?php include("include/footer.php"); ?>