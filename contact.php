<?php 
include("include/header.php");

// SEO for Contact Us Page
$seoData = [
    'title' => 'Contact WorldTour4u | Get in Touch with Our Team',
    'description' => 'Have questions about travel packages? Contact WorldTour4u today. Call us, email, or fill out our contact form. We are here to help you plan your perfect vacation.',
    'keywords' => 'contact us, travel inquiries, get in touch, customer support, travel booking',
    'type' => 'website'
];
?>

<main class="main">

  <!-- PAGE TITLE -->
  <div class="page-title light-background py-4">
    <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-lg-center">
      <h1 class="mb-2 mb-lg-0">Contact Us</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="index">Home</a></li>
          <li class="current">Contact</li>
        </ol>
      </nav>
    </div>
  </div>

  <!-- MAIN CONTACT BLOCK -->
  <section class="section py-5">
    <div class="container" style="max-width:1100px;">

      <div class="row g-4">

        <!-- LEFT INFO CARD -->
<!-- LEFT: ONE CLEAN CARD -->
<div class="col-lg-4">
  <div class="google-card p-3 h-100">

    <h6 class="label-title">Address</h6>
    <p class="label-value"><?= $about_row['location']; ?></p>
    <a href="https://maps.google.com/?q=<?= urlencode($about_row['location']); ?>"
       target="_blank" class="link-primary small">View on Google Maps →</a>

    <hr>

    <h6 class="label-title">Call Us</h6>
    <p class="label-value"><?= $about_row['phone']; ?></p>

    <hr>

    <h6 class="label-title">Email Us</h6>
    <p class="label-value"><?= $about_row['email']; ?></p>

    <hr>

    <h6 class="label-title">Office Hours</h6>
    <p class="label-value"><?= $about_row['office_hours_week']; ?></p>
    <p class="label-value"><?= $about_row['office_hours_sun']; ?></p>
  </div>
</div>


        <!-- RIGHT FORM CARD -->
        <div class="col-lg-8">
          <div class="google-card p-3 h-100">

            <h5 class="fw-semibold mb-3">Send us a Message</h5>
<form id="message" method="POST" action="sql/message.php">
    <div class="row g-3">

        <div class="col-md-6">
            <input type="text" name="name" class="form-control google-input" placeholder="Your Name" required>
        </div>

        <div class="col-md-6">
            <input type="email" name="email" class="form-control google-input" placeholder="Your Email" required>
        </div>

        <div class="col-md-12">
            <input type="tel" name="mobile" pattern="[0-9]{10}" maxlength="10" class="form-control google-input" placeholder="Mobile Number" required>
        </div>

        <div class="col-md-12">
            <input type="text" name="subject" class="form-control google-input" placeholder="Subject (Optional)">
        </div>

        <div class="col-md-12">
            <textarea name="message" rows="5" class="form-control google-input" placeholder="Your Message" required></textarea>
        </div>

    </div>

    <button type="submit" class="btn btn-primary w-100 fw-semibold mt-3">Send Message</button>

    <div id="success" class="text-center mt-2 small"></div>
</form>


          </div>
        </div>

      </div>

    </div>
  </section>


  <!-- FULL WIDTH MAP BLOCK -->
<section class="section pb-4">
  <div class="container" style="max-width:1100px;">
    <div class="google-card map-block">

      <?= $map_row['map_link'] ?? '' ?>

    </div>
  </div>
</section>



  <!-- FAQ SECTION -->
  <section class="section pb-4">
    <div class="container" style="max-width:1100px;">

      <h4 class="fw-semibold mb-3">Frequently Asked Questions</h4>

      <div class="accordion smooth-accordion" id="faqAccordion">

        <?php 
        $faq_sql = mysqli_query($con, "SELECT * FROM faqs ORDER BY id ASC");
        $faq_index = 1;

        while ($faq = mysqli_fetch_assoc($faq_sql)) {
          $answer = $faq['content'] ?? $faq['description'] ?? $faq['answer'] ?? "";
          $collapse_id = "faq_" . $faq_index;
        ?>

        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed"
                    data-bs-toggle="collapse"
                    data-bs-target="#<?= $collapse_id; ?>">
              <?= $faq['title']; ?>
            </button>
          </h2>

          <div id="<?= $collapse_id; ?>" class="accordion-collapse collapse">
            <div class="accordion-body">
              <?= nl2br($answer); ?>
            </div>
          </div>
        </div>

        <?php 
        $faq_index++;
        } 
        ?>

      </div>

    </div>
  </section>


  <!-- SOCIAL ICONS -->
  <section class="section py-4 text-center">
    <div class="container" style="max-width:1100px;">
      <h5 class="fw-semibold mb-2">Follow Us</h5>

      <div class="d-flex justify-content-center gap-3">

        <?php if ($social_row['facebook']) { ?>
        <a class="social-icon" href="<?= $social_row['facebook']; ?>" target="_blank">
          <i class="bi bi-facebook"></i>
        </a>
        <?php } ?>

        <?php if ($social_row['instagram']) { ?>
        <a class="social-icon" href="<?= $social_row['instagram']; ?>" target="_blank">
          <i class="bi bi-instagram"></i>
        </a>
        <?php } ?>

        <?php if ($social_row['twitter']) { ?>
        <a class="social-icon" href="<?= $social_row['twitter']; ?>" target="_blank">
          <i class="bi bi-twitter-x"></i>
        </a>
        <?php } ?>

        <?php if ($social_row['linkedin']) { ?>
        <a class="social-icon" href="<?= $social_row['linkedin']; ?>" target="_blank">
          <i class="bi bi-linkedin"></i>
        </a>
        <?php } ?>

      </div>
    </div>
  </section>


  <!-- NEWSLETTER -->
<!-- newsletter block -->
<section class="section pb-5">
  <div class="container" style="max-width:600px;">
    <div class="newsletter-box p-4 rounded text-center">

      <h5 class="fw-semibold mb-1">Stay Updated</h5>
      <p class="small mb-3">Subscribe to get travel deals & exclusive offers.</p>

      <!-- NOTE: action uses path relative to site root. Update if you used different location -->
      <form id="newsletter-form" action="admin/sql/newsletter.php" method="post">
        <input type="email" name="email" id="newsletter-email" placeholder="Enter your email"
               class="form-control google-input mb-2" required>
        <button type="submit" class="btn btn-primary w-100 fw-semibold">
          Subscribe
        </button>
<div id="newsletter-success"
     class="alert d-none text-center py-2 mt-2"
     style="border-radius: 6px; font-size: 14px;">
</div>

      </form>

    </div>
  </div>
</section>


</main>

<?php
// Generate Contact/Organization Schema
$contactSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'ContactPage',
    'name' => 'WorldTour4u Contact',
    'url' => (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
    'contactPoint' => [
        '@type' => 'ContactPoint',
        'contactType' => 'Customer Service',
        'telephone' => $about_row['phone'] ?? '+91-XXXXXXXXXX',
        'email' => $about_row['email'] ?? 'info@worldtour4u.com',
        'areaServed' => 'IN'
    ]
];
?>

<script type="application/ld+json">
<?php echo json_encode($contactSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
</script>

<?php include("include/footer.php"); ?>