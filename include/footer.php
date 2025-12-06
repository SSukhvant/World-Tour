  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index" class="logo d-flex align-items-center">
            <span class="sitename"><?= $profile_row['name'];?></span>
          </a>
          <div class="footer-contact pt-3">
            <p><?= $about_row['location'];?></p>
            <p class="mt-3"><strong>Phone:</strong> <span><?= $about_row['phone'];?></span></p>
            <p><strong>Email:</strong> <span><?= $about_row['email'];?></span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <!--<a target="_blank" href="<?= $social_row['twitter'];?>"><i class="bi bi-twitter-x"></i></a>-->
            <a target="_blank" href="<?= $social_row['facebook'];?>"><i class="bi bi-facebook"></i></a>
            <a target="_blank" href="<?= $social_row['instagram'];?>"><i class="bi bi-instagram"></i></a>
            <!--<a target="_blank" href="<?= $social_row['linkedin'];?>"><i class="bi bi-linkedin"></i></a>-->
          </div>
        </div>

        <div class="col-lg-4 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="index">Home</a></li>
            <li><a href="about">About us</a></li>
            <li><a href="term-and-condition">Terms & Condition</a></li>
            <li><a href="faq">FAQ</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="index">Home</a></li>
            <li><a href="contact">Contact</a></li>            
            <li><a href="packages">Packages</a></li>
            <li><a href="reviews">Reviews</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename"><?= $profile_row['name'];?></strong> <span>All Rights Reserved</span></p>
      <!--<div  class="credits">Developed by <a target="_blank" href="https://www.freelancer.com/u/mithunsarker1516">Mithun Sarker</a>-->
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

 <!-- Sailor Theme JS -->
<script src="assets/js/main.js"></script>

<!-- custom popup + search JS -->
<script src="assets/js/custom.js?v=1"></script>

      <script>
        $(document).ready(function() {
            $('#message').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'sql/message.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#success').html(response);
                        $('#message')[0].reset(); // Corrected to reset the right form
                    },
                    error: function() {
                        $('#success').html("<span style='color: red;'>Error submitting form. Please try again.</span>");
                    }
                });
            });
        });


</script>

</body>

</html>