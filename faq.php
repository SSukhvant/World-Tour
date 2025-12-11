<?php 
include("include/header.php");

// SEO for FAQ Page
$seoData = [
    'title' => 'Frequently Asked Questions | WorldTour4u Travel',
    'description' => 'Find answers to common questions about travel packages, bookings, cancellations, and travel insurance. Visit our FAQ page for more information.',
    'keywords' => 'FAQ, frequently asked questions, travel help, travel information, booking help',
    'type' => 'website'
];
?>
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
        <h1 class="mb-2 mb-lg-0">Frequently Asked Questions</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index">Home</a></li>
            <li class="current">FAQ</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

<!-- FAQ INTRO SECTION -->
<section class="section py-5 light-background">
  <div class="container" style="max-width:1100px;" data-aos="fade-up">
    <div class="text-center">
      <h2 class="section-heading fw-bold mb-3">Got Questions?</h2>
      <p class="section-subtitle text-muted">Find answers to the most common questions about our travel packages, bookings, and services. Can't find what you're looking for? <a href="contact" class="link-primary">Contact us</a></p>
    </div>
  </div>
</section>
<br>
<!-- FAQ Content Start -->
    <?php 
        $faqs_sql = "SELECT * FROM faqs ORDER BY id DESC";
        $faqs_result = mysqli_query($con,$faqs_sql);
        $faqs_array = [];
        mysqli_data_seek($faqs_result, 0);
        while($row = mysqli_fetch_assoc($faqs_result)) {
            $faqs_array[] = $row;
        }
    ?>
    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-5">
                
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.5s">
                    <h2 class="faq-header">Common Questions About Our Travel Services</h2>

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

<?php
// Generate FAQ Schema for better SEO
if (!empty($faqs_array)) {
    $faqSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => []
    ];
    
    foreach ($faqs_array as $faq) {
        $faqSchema['mainEntity'][] = [
            '@type' => 'Question',
            'name' => htmlspecialchars($faq['title']),
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => strip_tags($faq['description'])
            ]
        ];
    }
    ?>
    <script type="application/ld+json">
    <?php echo json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
    </script>
    <?php
}
?>

<?php include("include/footer.php");?>