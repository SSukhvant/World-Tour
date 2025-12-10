<?php include("include/header.php"); ?>

<main class="main">

  <!-- Page Title -->
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
              style="object-fit: cover;"
              alt="About Image">
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

</main>

<?php include("include/footer.php"); ?>