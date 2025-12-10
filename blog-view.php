<?php 
include("include/header.php");

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
?>

<!-- Blog HTML -->
<section class="blog-details container mt-5">
    <h1><?= $blog['title'] ?></h1>
    <p><i><?= date("F d, Y", strtotime($blog['created_at'])) ?></i></p>

    <?php if ($blog['featured_image']) { ?>
        <img src="admin/image/blog/<?= $blog['featured_image'] ?>" class="img-fluid mb-4">
    <?php } ?>

    <div class="content">
        <?= $blog['content'] ?>
    </div>
</section>

<?php include("include/footer.php"); ?>