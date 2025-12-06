
<?php include("include/header.php");?>
  <?php 
      if(isset($_GET['id'])){
        $id = $_GET['id'];
        $slug_url_sql = "SELECT * FROM packages WHERE id='$id'";
        $slug_url_result = mysqli_query($con,$slug_url_sql);
        $packages_row = mysqli_fetch_assoc($slug_url_result);
    
    }
  ?>


 <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Packages</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index">Home</a></li>
            <li class="current">Packages</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <div class="container">
      <div class="row">

        <div class="col-lg-4">

          <!-- Blog Details Section -->
          <section id="blog-details" class="blog-details section">
            <div class="container">

              <article class="article">

                <div class="post-img">
                  <div class="row">
                        <div class="col-lg">
                          <div class="col portfolio-item isotope-item filter-app">
                            <a href="admin/image/<?= $packages_row['image1'];?>" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><img src="admin/image/<?= $packages_row['image1'];?>" class="img-fluid" alt=""></a>
                          </div>
                        </div>

                        <!--<div class="col-lg-6">-->
                        <!--  <div class="col portfolio-item isotope-item filter-app">-->
                        <!--    <a href="admin/image/<?= $packages_row['image2'];?>" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><img src="admin/image/<?= $packages_row['image2'];?>" class="img-fluid" alt=""></a>-->
                        <!--  </div>-->
                        <!--</div>-->

                        <!--<div class="col-lg-6">-->
                        <!--  <video style="margin-top:20px;" width="360" height="250" controls><source src="admin/image/<?php echo $packages_row['image3'];?>" type="video/mp4"></video>-->
                        <!--</div>-->
                                   
                      </div>
                </div>
               
              </article>

            </div>
          </section><!-- /Blog Details Section -->

        </div>

        <div class="col-lg-8 sidebar blog-posts section">
          <div class="-container">
              <article class="article">

                <h2 class="title"><?php echo $packages_row['title']?></h2>

                <div class="meta-top">
                  <ul>
                   <li class="d-flex align-items-center"><i class="bi bi-arrow-right"></i><?php echo $packages_row['time']?></li>
                   <li class="d-flex align-items-center"><i class="bi bi-arrow-right"></i><?php echo $packages_row['price']?><sup>&nbsp;₹</sup></li>
                  </ul>
                </div><!-- End meta top -->

                <div class="content">
                  <?php echo $packages_row['content']?>
                </div><!-- End post content -->

              </article>


          </div>
        </div>

      </div>
    </div>

  </main>

<?php include("include/footer.php");?>
