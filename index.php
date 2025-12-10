<?php include("include/header.php");?>
  <main class="main">
    <?php if(isset($_GET['success'])): ?>
    <script>
        alert("Your enquiry has been submitted successfully!");
    </script>
<?php endif; ?>

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
      <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
          <?php 
              $banner_sql = "SELECT * FROM banner WHERE id='1'";
              $banner_result = mysqli_query($con,$banner_sql);
              $banner_row = mysqli_fetch_assoc($banner_result); 
          ?>
        <div class="carousel-item active">
          <img src="admin/image/<?= $banner_row['image'];?>" alt="">
          <div class="carousel-container">
            <h2><?= $banner_row['title'];?><br></h2>
            <p><?= $banner_row['content'];?></p>
            <div class="hero-buttons mt-3">
  <a target="_blank" href="https://wa.me/<?= $about_row['phone']; ?>" class="btn-hero-primary">
    <i class="bi bi-telephone-fill"></i> Call Us
  </a>

  <a href="packages" class="btn-hero-outline">
    <i class="bi bi-arrow-right-circle"></i> Get Started
  </a>
</div>

          </div>
        </div><!-- End Carousel Item -->

        <?php 
            $banner_sql = "SELECT * FROM banner WHERE id='2'";
            $banner_result = mysqli_query($con,$banner_sql);
            $banner_row = mysqli_fetch_assoc($banner_result); 
        ?>
        <div class="carousel-item">
          <img src="admin/image/<?= $banner_row['image'];?>" alt="">
          <div class="carousel-container">
            <h2><?= $banner_row['title'];?><br></h2>
            <p><?= $banner_row['content'];?></p>
<div class="hero-buttons mt-3">
  <a target="_blank" href="https://wa.me/<?= $about_row['phone']; ?>" class="btn-hero-primary">
    <i class="bi bi-telephone-fill"></i> Call Us
  </a>

  <a href="packages" class="btn-hero-outline">
    <i class="bi bi-arrow-right-circle"></i> Get Started
  </a>
</div>
          </div>
        </div><!-- End Carousel Item -->

        <?php 
            $banner_sql = "SELECT * FROM banner WHERE id='3'";
            $banner_result = mysqli_query($con,$banner_sql);
            $banner_row = mysqli_fetch_assoc($banner_result); 
        ?>
        <div class="carousel-item">
          <img src="admin/image/<?= $banner_row['image'];?>" alt="">
          <div class="carousel-container">
            <h2><?= $banner_row['title'];?><br></h2>
            <p><?= $banner_row['content'];?></p>
<div class="hero-buttons mt-3">
  <a target="_blank" href="https://wa.me/<?= $about_row['phone']; ?>" class="btn-hero-primary">
    <i class="bi bi-telephone-fill"></i> Call Us
  </a>

  <a href="packages" class="btn-hero-outline">
    <i class="bi bi-arrow-right-circle"></i> Get Started
  </a>
</div>
          </div>
        </div><!-- End Carousel Item -->

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>

      </div>

    </section><!-- /Hero Section -->

    <!-- Service Section -->
<section class="services-section" id="services">
  <div class="services-container container">

    <div class="py-5 section-title" data-aos="fade-up">
      <h2>Services</h2>
      <p>How can we help you today?</p>
      <span class="services-subtitle">
        Choose a service and share a few details. Our team will call you back.
      </span>
    </div>

    <div class="services-grid row g-4 justify-content-center" data-aos="fade-up" data-aos-delay="200">

      <!-- Tour Packages -->
      <div class="col">
        <button class="service-card w-100" type="button" onclick="scrollToPackageSearch()">

          <img src="assets/img/services/tour.jpg" class="service-img" alt="Tour Packages">

          <div class="service-card-body">
            <div class="service-icon service-icon--blue">
              <i class="bi bi-globe2"></i>
            </div>
            <h3 class="service-title">Tour Packages</h3>
            <p class="service-desc">
              Domestic & international tour packages.
            </p>

            <span class="service-cta">
              Browse packages <i class="bi bi-arrow-right-short"></i>
            </span>
          </div>

        </button>
      </div>

      <!-- Taxi Service -->
      <div class="col">
        <button class="service-card w-100" type="button" onclick="openPopup('taxiPopup')">

          <img src="assets/img/services/taxi.jpg" class="service-img" alt="Taxi Service">

          <div class="service-card-body">
            <div class="service-icon service-icon--green">
              <i class="bi bi-taxi-front-fill"></i>
            </div>
            <h3 class="service-title">Taxi Services</h3>
            <p class="service-desc">
              Outstation & local cabs with driver.
            </p>

            <span class="service-cta">
              Request a cab <i class="bi bi-arrow-right-short"></i>
            </span>
          </div>

        </button>
      </div>

      <!-- Passport Assistance -->
      <div class="col">
        <button class="service-card w-100" type="button" onclick="openPopup('passportPopup')">

          <img src="assets/img/services/passport.jpg" class="service-img" alt="Passport Service">

          <div class="service-card-body">
            <div class="service-icon service-icon--orange">
              <i class="bi bi-passport"></i>
            </div>
            <h3 class="service-title">Passport Assistance</h3>
            <p class="service-desc">
              New passport or renewal help.
            </p>

            <span class="service-cta">
              Get help <i class="bi bi-arrow-right-short"></i>
            </span>
          </div>

        </button>
      </div>

    </div>
  </div>
</section>

<!-- End Service Section -->
<!--Search Package Section -->
<section id="packageSearchSection" class="package-search-section">
  <div class="container search-containe">
          <!-- Section Title -->
      <div class="container py-5 section-title" data-aos="fade-up">
        <h2>Packages</h2>
        <p>Find Your Perfect Tour Package<br></p>
        <span class="search-subtitle">Choose travel type, destination and travel month.</span>
      </div><!-- End Section Title -->
<div class="search-panel">
  <div class="search-field">
    <i class="bi bi-briefcase search-field-icon"></i>
    <select id="searchType">
      <option value="">Travel Type</option>
      <option value="Domestic">Domestic</option>
      <option value="International">International</option>
    </select>
  </div>
  <div class="search-field">
    <i class="bi bi-geo-alt search-field-icon"></i>
    <select id="searchDestination">
      <option value="">Destination</option>
      <option value="Thailand">Thailand</option>
      <option value="Vietnam">Vietnam</option>
      <option value="Dubai">Dubai</option>
      <option value="Singapore">Singapore</option>
      <option value="Goa">Goa</option>
      <option value="Kerala">Kerala</option>
      <option value="Manali">Manali</option>
    </select>
  </div>
  <div class="search-field">
    <i class="bi bi-calendar2-week search-field-icon"></i>
    <select id="searchMonth">
      <option value="">Month</option>
      <option value="January">January</option>
      <option value="February">February</option>
      <option value="March">March</option>
      <option value="April">April</option>
      <option value="May">May</option>
      <option value="June">June</option>
      <option value="July">July</option>
      <option value="August">August</option>
      <option value="September">September</option>
      <option value="October">October</option>
      <option value="November">November</option>
      <option value="December">December</option>
    </select>
  </div>
  <button class="search-panel-btn" onclick="openPackageSearchPopup()">
    <i class="bi bi-search"></i>
  </button>
</div>
  </div>
</section>
<!-- End Search Package Section -->

<?php
$featuredPackages = mysqli_query($con, "
  SELECT * FROM packages 
  WHERE status='Active' 
  ORDER BY id DESC 
  LIMIT 8
");
?>

<section class="py-5">
  <div class="container" style="max-width: 1100px;">

    <div class="text-center mb-4 position-relative section-title-lined">
      <span>Popular Packages</span>
    </div>

    <div class="row g-4">

      <?php while($p = mysqli_fetch_assoc($featuredPackages)): ?>
      <div class="col-12 col-sm-6 col-lg-4">

        <div class="card h-100 shadow-sm border-0">

          <!-- IMAGE -->
          <div class="ratio ratio-4x3">
            <img 
              src="admin/image/<?= $p['image1'] ?>" 
              class="card-img-top img-fluid rounded-top"
              style="object-fit: cover;"
              alt="<?= $p['title'] ?>"
            >
          </div>

          <!-- CARD BODY -->
          <div class="card-body d-flex flex-column">

            <h5 class="card-title fw-semibold mb-1"><?= $p['title'] ?></h5>

            <p class="text-muted small mb-2">
              <i class="bi bi-geo-alt-fill text-danger"></i> 
              <?= $p['destination'] ?> • <?= $p['category'] ?>
            </p>

            <p class="fw-bold text-primary mb-4">
              ₹<?= $p['price'] ?>
              <span class="text-muted fw-normal small"><?= $p['time'] ?></span>
            </p>

            <!-- BUTTON STAYS AT THE BOTTOM -->
            <a 
              onclick="openPackageEnquiry('<?= $p['title'] ?>')" 
              class="btn btn-primary w-100 mt-auto"
            >
              Enquire Now
            </a>

          </div>

        </div>

      </div>
      <?php endwhile; ?>

    </div>

    <!-- View All Button -->
    <div class="text-center mt-4">
      <a href="packages" class="btn btn-primary px-4 py-2 fw-semibold rounded-3">
        View All Packages
      </a>
    </div>

  </div>
</section>

<section id="about" class="py-5 about-section">
  <div class="container" style="max-width:1100px;">

    <!-- Title -->
    <!-- <div class="section-title-lined mb-4 text-center">
      <span>About Us</span>
    </div> -->
          <div class="container py-5 section-title" data-aos="fade-up">
        <h2>About</h2>
        <p><?= $about_row['title']; ?><br></p>
      </div><!-- End Section Title -->

    <div class="row align-items-center g-5">

      <!-- IMAGE -->
      <div class="col-lg-5">
        <div class="about-img-wrapper rounded shadow-sm">
          <img 
            src="admin/image/<?= $about_row['about_image']; ?>" 
            alt="<?= $about_row['title']; ?>"
            class="img-fluid w-100 h-100"
          >
        </div>
      </div>

      <!-- CONTENT -->
      <div class="col-lg-7">

        <!-- <h2 class="about-title fw-bold mb-3">
          <?= $about_row['title']; ?>
        </h2> -->

        <p class="about-text mb-4">
          <?= nl2br($about_row['content']); ?>
        </p>

        <!-- Highlights -->
        <div class="row g-3 about-highlights">
          
          <div class="col-6 d-flex align-items-center gap-2">
            <div class="highlight-icon">
              <i class="bi bi-check-circle-fill"></i>
            </div>
            <span>Trusted Agency</span>
          </div>

          <div class="col-6 d-flex align-items-center gap-2">
            <div class="highlight-icon">
              <i class="bi bi-check-circle-fill"></i>
            </div>
            <span>Best Price Guarantee</span>
          </div>

          <div class="col-6 d-flex align-items-center gap-2">
            <div class="highlight-icon">
              <i class="bi bi-check-circle-fill"></i>
            </div>
            <span>100% Customizable Trips</span>
          </div>

          <div class="col-6 d-flex align-items-center gap-2">
            <div class="highlight-icon">
              <i class="bi bi-check-circle-fill"></i>
            </div>
            <span>24x7 Expert Support</span>
          </div>

        </div>

      </div>

    </div>

  </div>
</section>

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

<!-- Testimonials Section -->
<section id="testimonials" class="py-5 testimonials-section">
  <div class="container" style="max-width:1100px;">

    <!-- Section Title -->
    <!-- <div class="section-title-lined mb-4 text-center">
      <span>Latest Reviews</span>
    </div> -->
              <!-- Section Title -->
      <div class="container py-5 section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p>Latest Reviews<br></p>
        <span class="search-subtitle">Experiences Shared by Our Happy Customers</span>
      </div><!-- End Section Title -->

    <div class="row g-4">

      <?php 
        $review_sql = "SELECT * FROM review ORDER BY id DESC LIMIT 4";
        $review_query = mysqli_query($con, $review_sql);
      ?>

      <?php while($review_row = mysqli_fetch_assoc($review_query)) { 

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
              alt="<?= $review_row['name']; ?>"
            >

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


    <!-- About Section -->
    <section id="about" class="about section">
      <!-- Section Title -->
      <div class="container py-5 section-title" data-aos="fade-up">
        <h2>About</h2>
        <p>About Us<br></p>
      </div><!-- End Section Title -->
    <!-- About 2 Section -->
    <section id="about-2" class="about-2 section">
      <div class="container" data-aos="fade-up">
        <div class="row g-lg-5" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-5">
            <div class="about-img">
              <img src="admin/image/<?= $about_row['about_image'];?>" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-lg-7">
            <h3 class="pt-0 pt-lg-5"><?= $about_row['title'];?></h3>
            <!-- Tabs -->
            <ul class="nav nav-pills mb-3">
              <li><a class="nav-link active" data-bs-toggle="pill" href="#about-2-tab1">About</a></li> 
            </ul><!-- End Tabs -->
            <!-- Tab Content -->
              <div>
                <?= $about_row['content'];?>
              </div>
          </div>
        </div>
      </div>
    </section><!-- /About 2 Section -->
    </section><!-- /About Section -->


   <section id="about" class="about section">
      <section id="pricing" class="pricing section">
        <div class="container section-title" data-aos="fade-up">
            <?php 
                $packages_offer_sql = "SELECT * FROM offer ORDER BY id DESC limit 3";
                $packages_offer_result = mysqli_query($con,$packages_offer_sql);
                $packages_offer_row = mysqli_fetch_assoc($packages_offer_result)
            ?>
          <h2>Package</h2>
          <p><?= $packages_offer_row['title'];?><br></p>
        </div><!-- End Section Title -->
        <div class="container">
          <div class="row gy-3">
            <?php 
                $packages_sql = "SELECT * FROM packages WHERE status='Active' ORDER BY id DESC limit 3";
                $packages_result = mysqli_query($con,$packages_sql);
            ?>
            <?php while($packages_row = mysqli_fetch_assoc($packages_result)) {?>

            <div class="col-xl-4 col-lg-4" data-aos="fade-up" data-aos-delay="100">
              <div class="pricing-item featured">
                <h3><?= $packages_row['title'];?></h3>
                <h4><sup>₹</sup><?= $packages_row['price'];?><span> / <?= $packages_row['time'];?></span></h4>
                <ul>
            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
              <div class="col portfolio-item isotope-item filter-app">
                  <a href="admin/image/<?= $packages_row['image1'];?>" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><img style="width: 100%; height: 300px;" src="admin/image/<?= $packages_row['image1'];?>" class="img-fluid" alt=""></a>
              </div>
            </div>
                </ul>
                <div class="btn-wrap">
                  <a href="packages-view/<?= $packages_row['id'];?>" class="btn-buy">Know more</a>
                </div>
              </div>
            </div><!-- End Pricing Item -->
          <?php }?>
        </div>
      </div>
    </section>
  </section>
   <section id="testimonials" class="testimonials section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Review</h2>
        <p>latest Reviews<br></p>
      </div><!-- End Section Title -->
      <div class="container">
              <div class="row gy-4">
                <?php 
                  $review_sql = "SELECT * FROM review ORDER BY id DESC limit 4";
                  $review_query = mysqli_query($con,$review_sql);
                  
                ?>
                <?php while($review_row = mysqli_fetch_assoc($review_query)) { ?>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                  <div class="testimonial-item">
                    <img src="admin/image/<?= $review_row['image'];?>" class="testimonial-img" alt="">
                    <h3><?php echo $review_row['name'];?></h3>
                    <h4><?php echo $review_row['email'];?></h4>
                    <?php
                      $rating_id = $review_row['star'];
                      $rating_sql = "SELECT * FROM rating where id='$rating_id'";
                      $rating_query = mysqli_query($con,$rating_sql);
                      $rating_row = mysqli_fetch_assoc($rating_query);
                    ?>
                    <div class="stars">
                      <?php echo $rating_row['rating_list']?>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      <span><?php echo $review_row['content']?></span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div><!-- End testimonial item -->
              <?php }?>
              <a href="reviews">See More</a>
              </div>
            </div>
    </section><!-- /Testimonials Section -->

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
        onclick="openPackageEnquiry('General Enquiry')"
      >
        Enquire Now
      </button>

    </div>

  </div>
</section>

    <!-- Package Enquiry Popup -->
<div class="popup-overlay" id="packageEnquiryPopup">
  <div class="popup-content">
    <button class="popup-close" onclick="closePopup('packageEnquiryPopup')">&times;</button>
    <h3 class="popup-title">Enquire About This Package</h3>
    <p class="popup-subtitle">We will call you shortly.</p>
    <form method="post" action="submit_package.php">
      <input type="hidden" name="package_name" id="enquiry_package_name">
      <div class="popup-form-group">
        <label>Your Name</label>
        <input type="text" name="name" placeholder="Your full name" required>
      </div>
      <div class="popup-form-group">
        <label>Phone Number</label>
        <input type="text" name="phone" placeholder="10-digit mobile number" required>
      </div>
      <div class="popup-form-group">
        <label>No. of Persons</label>
        <input type="number" name="pax" placeholder="Number of persons" required>
      </div>
      <div class="popup-form-group">
        <label>Tour Duration</label>
        <input type="text" name="duration" placeholder="Duration of the tour" required>
      </div>
      <button class="popup-submit-btn">Submit Enquiry</button>
    </form>
  </div>
</div>
    <!-- Taxi Service Popup -->
<div class="popup-overlay" id="taxiPopup">
  <div class="popup-content">
    <button class="popup-close" onclick="closePopup('taxiPopup')">&times;</button>
    <h3 class="popup-title">Taxi Service Enquiry</h3>
    <p class="popup-subtitle">Fill your travel details and we’ll call you shortly.</p>
    <form method="post" action="submit_taxi.php">
      <div class="popup-form-group">
        <label for="taxi_car_type">Car Type</label>
        <select name="car_type" id="taxi_car_type" required>
          <option value="">Select car type</option>
          <option value="Swift Dzire / Sedan">Swift Dzire / Sedan</option>
          <option value="Ertiga / MPV">Ertiga / MPV</option>
          <option value="Innova / SUV">Innova / SUV</option>
          <option value="Tempo Traveller">Tempo Traveller</option>
        </select>
      </div>
      <div class="popup-form-group">
        <label for="taxi_date">Travel Date</label>
        <input type="date" name="travel_date" id="taxi_date" required>
      </div>
      <div class="popup-form-group">
        <label for="taxi_name">Name</label>
        <input type="text" name="name" id="taxi_name" placeholder="Your full name" required>
      </div>
      <div class="popup-form-group">
        <label for="taxi_phone">Phone Number</label>
        <input type="tel" name="phone" id="taxi_phone" placeholder="10-digit mobile number" required>
      </div>
      <button type="submit" class="popup-submit-btn">Submit Taxi Enquiry</button>
    </form>
  </div>
</div>
<!-- Passport Service Popup -->
<div class="popup-overlay" id="passportPopup">
  <div class="popup-content">
    <button class="popup-close" onclick="closePopup('passportPopup')">&times;</button>
    <h3 class="popup-title">Passport Service Enquiry</h3>
    <p class="popup-subtitle">Share your contact details and we will call you for passport assistance.</p>
    <form method="post" action="submit_passport.php">
      <div class="popup-form-group">
        <label for="passport_name">Name</label>
        <input type="text" name="name" id="passport_name" placeholder="Your full name" required>
      </div>
      <div class="popup-form-group">
        <label for="passport_phone">Phone Number</label>
        <input type="tel" name="phone" id="passport_phone" placeholder="10-digit mobile number" required>
      </div>
      <button type="submit" class="popup-submit-btn">Submit Passport Enquiry</button>
    </form>
  </div>
</div>

<!-- Package Search Results Popup -->
<!-- Package Search Results Popup -->
<div class="popup-overlay" id="packageResultsPopup">
  <div class="popup-content package-popup">

    <button class="popup-close" onclick="closePopup('packageResultsPopup')">&times;</button>

    <h3 class="popup-title">Available Tour Packages</h3>
    <p class="popup-subtitle">Select a package to proceed.</p>
    <!-- Fallback message will be injected here -->
    <div id="fallbackMessageBox"></div>
    <!-- Scrollable container only for packages -->
    <div id="packageResultsContainer" class="scrollable-results"></div>
  </div>
</div>
  </main>

<?php include("include/footer.php");?>