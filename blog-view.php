<?php include("include/header.php"); ?>

<?php
$slug = $_GET['slug'] ?? '';
if ($slug == '') {
    die("Invalid Blog URL");
}

$blog_sql = "SELECT * FROM blog WHERE slug = '$slug' AND status='Published' LIMIT 1";
$blog_query = mysqli_query($con, $blog_sql);
$blog = mysqli_fetch_assoc($blog_query);

if (!$blog) {
    die("Blog not found or not published.");
}

// SEO for Blog Details Page
$seoData = [
    'title' => $blog['seo_title'] ?? ($blog['title'] . ' | Travel Blog | WorldTour4u'),
    'description' => $blog['seo_description'] ?? htmlspecialchars($blog['excerpt']),
    'keywords' => $blog['tags'] ?? ($blog['category'] . ', travel, guide'),
    'image' => (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/admin/image/blog/" . htmlspecialchars($blog['featured_image']),
    'type' => 'article'
];
?>
?>

<main class="main">
    <!-- Breadcrumb -->
    <div class="page-title light-background py-4">
        <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-lg-center">
            <h1 class="mb-2 mb-lg-0"><?= $blog['title'] ?></h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index">Home</a></li>
                    <li><a href="blog">Blogs</a></li>
                    <li class="current"><?= $blog['title'] ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- MAIN CONTENT + STICKY SIDEBAR -->
    <section class="section py-5 blog-details">
        <div class="container" style="max-width:1150px;">
            <div class="row g-4">
                <!-- LEFT CONTENT AREA -->
                <div class="col-lg-8">
                    <h2 class="blog-title mb-3"><?= $blog['title']; ?></h2>
                    <div class="blog-meta mb-3">
                        <span><i class="bi bi-calendar-event"></i> <?= date("d M Y", strtotime($blog['created_at'])); ?></span>
                        <span><i class="bi bi-tag-fill"></i> <?= $blog['category']; ?></span>
                        <?php if ($blog['tags']) { ?>
                            <span><i class="bi bi-bookmark-fill"></i> <?= $blog['tags']; ?></span>
                        <?php } ?>
                    </div>
                    <!-- FULL CONTENT -->
                    <div class="blog-full-content p-3 mb-4 shadow-sm rounded">
                        <?= $blog['content']; ?>
                    </div>
                </div>
                <!-- RIGHT SIDEBAR (STICKY) -->
                <div class="col-lg-4">
                    <div class="sticky-sidebar">
                        <!-- BLOG IMAGE WITH VIEW BUTTON -->
                        <div class="blog-detail-img shadow-sm rounded overflow-hidden mb-4 position-relative">
                            <img src="admin/image/blog/<?= $blog['featured_image']; ?>" class="img-fluid w-100 h-100" alt="<?= $blog['title']; ?>">
                            <a href="admin/image/blog/<?= $blog['featured_image']; ?>"
                                class="view-btn glightbox"
                                data-gallery="blog-gallery">
                                <i class="bi bi-arrows-fullscreen"></i> View Image
                            </a>
                        </div>
                        <!-- BLOG INFO BOX -->
                        <div class="blog-info-box shadow-sm p-3 rounded mb-4">
                            <h5 class="fw-bold mb-3">Blog Information</h5>
                            <div class="info-item mb-2">
                                <strong>Category:</strong>
                                <p><?= $blog['category']; ?></p>
                            </div>
                            <?php if ($blog['tags']) { ?>
                                <div class="info-item mb-2">
                                    <strong>Tags:</strong>
                                    <p><?= $blog['tags']; ?></p>
                                </div>
                            <?php } ?>
                            <div class="info-item">
                                <strong>Published:</strong>
                                <p><?= date("F d, Y", strtotime($blog['created_at'])); ?></p>
                            </div>
                        </div>
                        <!-- OTHER BLOGS -->
                        <h4 class="sidebar-title">Other Articles</h4>
                        <ul class="sidebar-blog-list mb-4">
                            <?php
                            $others = mysqli_query(
                                $con,
                                "SELECT id, slug, title FROM blog 
                 WHERE slug!='$slug' AND status='Published' ORDER BY id DESC LIMIT 5"
                            );
                            while ($ob = mysqli_fetch_assoc($others)) { ?>
                                <li>
                                    <a href="blog-view/<?= $ob['slug']; ?>">
                                        <i class="bi bi-chevron-right"></i> <?= substr($ob['title'], 0, 30); ?>...
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                        <!-- CTA SMALL BOX -->
                        <div class="cta-side-box text-center shadow-sm p-3 rounded mt-4">
                            <h5 class="fw-bold mb-2">Have Questions?</h5>
                            <p class="small mb-3">Contact our travel team for more information.</p>
                            <a href="contact"
                                class="btn btn-primary w-100 fw-semibold rounded-pill">
                                Get in Touch
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- POPULAR BLOGS -->
    <section class="popular-blogs section py-5">
        <div class="container" style="max-width:1150px;">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="section-heading mb-0">More Articles</h3>
                <a href="blog" class="text-primary small fw-semibold">View All Articles →</a>
            </div>
            <div class="row gy-4">
                <?php
                $popular = mysqli_query(
                    $con,
                    "SELECT * FROM blog WHERE slug!='$slug' AND status='Published' ORDER BY RAND() LIMIT 3"
                );
                while ($pb = mysqli_fetch_assoc($popular)) { ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-card shadow-sm h-100">
                            <div class="blog-image-wrapper">
                                <a href="blog-view/<?= $pb['slug']; ?>">
                                    <img src="admin/image/blog/<?= $pb['featured_image']; ?>" class="blog-img" alt="<?= $pb['title']; ?>">
                                </a>
                            </div>
                            <div class="blog-body p-3 d-flex flex-column">
                                <h3 class="blog-title-sm"><?= substr($pb['title'], 0, 50); ?>...</h3>
                                <p class="blog-category mb-1">
                                    <i class="bi bi-tag-fill text-primary"></i>
                                    <?= $pb['category']; ?>
                                </p>
                                <p class="blog-date mb-2">
                                    <i class="bi bi-calendar-event"></i>
                                    <?= date("d M Y", strtotime($pb['created_at'])); ?>
                                </p>
                                <a href="blog-view/<?= $pb['slug']; ?>"
                                    class="btn btn-outline-primary w-100 mt-auto blog-btn">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</main>
<?php
// Generate Article Schema
if (isset($blog) && $blog) {
    generateArticleSchema($blog);
}
?>
<?php include("include/footer.php"); ?>