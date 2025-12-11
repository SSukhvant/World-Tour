  <footer id="footer" class="footer bg-dark text-light py-5">

  <div class="container" style="max-width:1100px;">
    <div class="row gy-4">

      <!-- ABOUT -->
      <div class="col-lg-4 col-md-6">
        <h4 class="footer-title mb-3"><?= $profile_row['name']; ?></h4>

        <p class="footer-text mb-2"><?= $about_row['location']; ?></p>
        <p class="footer-text mb-1"><strong>Phone:</strong> <?= $about_row['phone']; ?></p>
        <p class="footer-text"><strong>Email:</strong> <?= $about_row['email']; ?></p>

        <div class="footer-social d-flex gap-3 mt-3">
          <a href="<?= $social_row['facebook']; ?>" target="_blank" class="footer-social-icon">
            <i class="bi bi-facebook"></i>
          </a>
          <a href="<?= $social_row['instagram']; ?>" target="_blank" class="footer-social-icon">
            <i class="bi bi-instagram"></i>
          </a>
        </div>
      </div>

      <!-- USEFUL LINKS -->
      <div class="col-lg-4 col-md-3">
        <h5 class="footer-subtitle mb-3">Useful Links</h5>
        <ul class="footer-links list-unstyled">
          <li><a href="index">Home</a></li>
          <li><a href="about">About Us</a></li>
          <li><a href="term-and-condition">Terms & Condition</a></li>
          <li><a href="faq">FAQ</a></li>
        </ul>
      </div>

      <!-- SERVICES -->
      <div class="col-lg-4 col-md-3">
        <h5 class="footer-subtitle mb-3">Our Services</h5>
        <ul class="footer-links list-unstyled">
          <li><a href="contact">Contact</a></li>
          <li><a href="packages">Packages</a></li>
          <li><a href="reviews">Reviews</a></li>
        </ul>
      </div>

    </div>

    <!-- COPYRIGHT -->
    <div class="footer-bottom text-center pt-4 mt-3 border-top border-secondary">
      <p class="mb-0 small">
        © <?= date("Y"); ?> <strong><?= $profile_row['name']; ?></strong> — All Rights Reserved
      </p>
    </div>

  </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
  <i class="bi bi-arrow-up-short"></i>
</a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js" defer></script>
    <script src="assets/vendor/php-email-form/validate.js" defer></script>
    <script src="assets/vendor/aos/aos.js" defer></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js" defer></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js" defer></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js" defer></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js" defer></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js" defer></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" defer></script>

   <!-- Sailor Theme JS -->
  <script src="assets/js/main.js" defer></script>

  <!-- custom popup + search JS -->
  <script src="assets/js/custom.js?v=1" defer></script>

  <!-- Inline message handler moved to assets/js/custom.js -->

</body>

</html>