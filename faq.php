<?php include("include/header.php");?>
<style>
        .faq-header {
          font-size: 42px;
          border-bottom: 1px dotted #ccc;
          padding: 24px;
        }

        .faq-content {
          margin: 0 auto;
        }

        .faq-question {
          padding: 20px 0;
          border-bottom: 1px dotted #ccc;
        }

        .panel-title {
          font-size: 16px;
          width: 100%;
          position: relative;
          margin: 0;
          padding: 10px 10px 0 48px;
          display: block;
          cursor: pointer;
        }

        .panel-content {
          font-size: 14px;
          padding: 0px 14px;
          margin: 0 40px;
          height: 0;
          overflow: hidden;
          z-index: -1;
          position: relative;
          opacity: 0;
          -webkit-transition: 0.4s ease;
          -moz-transition: 0.4s ease;
          -o-transition: 0.4s ease;
          transition: 0.4s ease;
        }

        .panel:checked ~ .panel-content {
          height: auto;
          opacity: 1;
          padding: 14px;
        }

        .plus {
          position: absolute;
          margin-left: 20px;
          margin-top: 4px;
          z-index: 5;
          font-size: 42px;
          line-height: 100%;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          -o-user-select: none;
          user-select: none;
          -webkit-transition: 0.2s ease;
          -moz-transition: 0.2s ease;
          -o-transition: 0.2s ease;
          transition: 0.2s ease;
        }

        .panel:checked ~ .plus {
          -webkit-transform: rotate(45deg);
          -moz-transform: rotate(45deg);
          -o-transform: rotate(45deg);
          transform: rotate(45deg);
        }

        .panel {
          display: none;
        }


    </style>

<div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">FAQ</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">FAQ</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->
<br><br>
<!-- Term And Condition Start -->
    <?php 
        $faqs_sql = "SELECT * FROM faqs ORDER BY id DESC";
        $faqs_result = mysqli_query($con,$faqs_sql);
    ?>
    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-5">
                
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="faq-header">Frequently Asked Questions</div>

            <div class="faq-content">
                <?php while($faqs_row = mysqli_fetch_assoc($faqs_result)) { ?>
                  <div class="faq-question">
                    <input id="<?php echo $faqs_row['id'];?>" type="checkbox" class="panel">
                    <div class="plus">+</div>
                    <label for="<?php echo $faqs_row['id'];?>" class="panel-title"><?php echo $faqs_row['title'];?></label>
                    <div class="panel-content"><?php echo $faqs_row['description'];?></div>
                  </div>
                <?php }?>   
            </div>
        </div>
    </div>
</div>
</div>


<?php include("include/footer.php");?>