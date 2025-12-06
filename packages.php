<?php include("include/header.php");?>
	    <!-- Services Section -->
    <section id="services" class="services section">
    	<div class="container section-title" data-aos="fade-up">
	        <h2>Packages</h2>
	        <p>All Packages<br></p>
	    </div><!-- End Section Title -->
      <div class="container">

      <section id="pricing" class="pricing section">
        <div class="container">
          <div class="row gy-3">

            <?php 
                $packages_sql = "SELECT * FROM packages ORDER BY id DESC";
                $packages_result = mysqli_query($con,$packages_sql);
                
            ?>

            <?php while($packages_row = mysqli_fetch_assoc($packages_result)) {?>

            <div class="col-xl-4 col-lg-4" data-aos="fade-up" data-aos-delay="100">
              <div class="pricing-item featured">
                <h3><?= $packages_row['title'];?></h3>
                <h4><sup>₹</sup><?= $packages_row['price'];?><span> / <?= $packages_row['time'];?></span></h4>
                <ul>
              
            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

              <div class="col col portfolio-item isotope-item filter-app">
                  <a href="admin/image/<?= $packages_row['image1'];?>" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><img style="width: 100%; height: 300px;" src="admin/image/<?= $packages_row['image1'];?>" class="img-fluid" alt=""></a>
              </div>

            </div>
                </ul>
                <div class="btn-wrap">
                  <a href="packages-view/<?= $packages_row['id'];?>" class="btn-buy">Visit Now</a>
                </div>
              </div>
            </div><!-- End Pricing Item -->

          <?php }?>

        </div>
      </div>
    </section>

      </div>

    </section><!-- /Services Section -->
<?php include("include/footer.php");?>