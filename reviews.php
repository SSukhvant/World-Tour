<?php include("include/header.php");?>
	<!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Review</h2>
        <p>All Reviews<br></p>
      </div><!-- End Section Title -->
      <div class="container">

              <div class="row gy-4">
                <?php 
                  $review_sql = "SELECT * FROM review ORDER BY id DESC";
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
              </div>

            </div>

    </section><!-- /Testimonials Section -->
<?php include("include/footer.php");?>
