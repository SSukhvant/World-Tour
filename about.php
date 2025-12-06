<?php include("include/header.php");?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">About</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">About</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

       <!-- About Section -->
    <section id="about" class="about section">

    <!-- About 2 Section -->
    <section id="about-2" class="about-2 section">

      <div class="container" data-aos="fade-up">

        <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

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
  </main>

 <?php include("include/footer.php");?>