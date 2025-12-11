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
<!-- FAQ Content Start -->
<section class="section py-5">
  <div class="container" style="max-width:1100px;">
    <div class="accordion smooth-accordion" id="faqAccordion">
      <?php
      $faq_sql = mysqli_query($con, "SELECT * FROM faqs ORDER BY id ASC");
      $faq_index = 1;
      $faqs_array = []; // Initialize for schema generation
      while ($faq = mysqli_fetch_assoc($faq_sql)) {
        $faqs_array[] = $faq;
        $answer = $faq['content'] ?? $faq['description'] ?? $faq['answer'] ?? "";
        $collapse_id = "faq_" . $faq_index;
      ?>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed"
              data-bs-toggle="collapse"
              data-bs-target="#<?= $collapse_id; ?>">
              <?= htmlspecialchars($faq['title']); ?>
            </button>
          </h2>
          <div id="<?= $collapse_id; ?>" class="accordion-collapse collapse">
            <div class="accordion-body">
              <?= nl2br(htmlspecialchars($answer)); ?>
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
<?php
// Generate FAQ Schema for better SEO
if (!empty($faqs_array)) {
  $faqSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => []
  ];
  foreach ($faqs_array as $faq) {
    $answer = $faq['content'] ?? $faq['description'] ?? $faq['answer'] ?? "";
    $faqSchema['mainEntity'][] = [
      '@type' => 'Question',
      'name' => htmlspecialchars($faq['title']),
      'acceptedAnswer' => [
        '@type' => 'Answer',
        'text' => strip_tags($answer)
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
<?php include("include/footer.php"); ?>