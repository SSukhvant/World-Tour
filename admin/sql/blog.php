<?php
include("../include/connectDB.php");
$con = connectDB();

// -------------------------------
// ADD BLOG
// -------------------------------
if (isset($_POST['add_blog'])) {

    $title   = mysqli_real_escape_string($con, $_POST['title']);
    $slug    = mysqli_real_escape_string($con, $_POST['slug']);
    $excerpt = mysqli_real_escape_string($con, $_POST['excerpt']);
    $content = mysqli_real_escape_string($con, $_POST['content']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $tags = mysqli_real_escape_string($con, $_POST['tags']);
    $seo_title = mysqli_real_escape_string($con, $_POST['seo_title']);
    $seo_description = mysqli_real_escape_string($con, $_POST['seo_description']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    // IMAGE UPLOAD
    $img = "";
    if (!empty($_FILES['featured_image']['name'])) {
        $img = time() . "_" . basename($_FILES['featured_image']['name']);
        move_uploaded_file($_FILES['featured_image']['tmp_name'], "../image/blog/" . $img);
    }

    // Ensure status is set to 'Published' or 'Draft'
    $status = ($status === 'Published') ? 'Published' : 'Draft';

    $sql = "INSERT INTO blog (title, slug, excerpt, content, category, tags, featured_image, seo_title, seo_description, status, created_at) 
            VALUES ('$title', '$slug', '$excerpt', '$content', '$category', '$tags', '$img', '$seo_title', '$seo_description', '$status', NOW())";

    mysqli_query($con, $sql);

    header("Location: ../blog.php");
    exit;
}


// -------------------------------
// UPDATE BLOG
// -------------------------------
if (isset($_POST['update_blog'])) {

    $id = $_GET['id'];

    $title   = mysqli_real_escape_string($con, $_POST['title']);
    $slug    = mysqli_real_escape_string($con, $_POST['slug']);
    $excerpt = mysqli_real_escape_string($con, $_POST['excerpt']);
    $content = mysqli_real_escape_string($con, $_POST['content']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $tags = mysqli_real_escape_string($con, $_POST['tags']);
    $seo_title = mysqli_real_escape_string($con, $_POST['seo_title']);
    $seo_description = mysqli_real_escape_string($con, $_POST['seo_description']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    // IMAGE UPDATE
    $img = $_FILES['featured_image']['name'];
    if (!empty($img)) {
        $img_name = time() . "_" . $img;
        move_uploaded_file($_FILES['featured_image']['tmp_name'], "../image/blog/" . $img_name);
        $image_sql = ", featured_image='$img_name'";
    } else {
        $image_sql = "";
    }

    // Ensure status is set to 'Published' or 'Draft'
    $status = ($status === 'Published') ? 'Published' : 'Draft';

    $sql = "UPDATE blog SET 
            title='$title',
            slug='$slug',
            excerpt='$excerpt',
            content='$content',
            category='$category',
            tags='$tags',
            seo_title='$seo_title',
            seo_description='$seo_description',
            status='$status'
            $image_sql
            WHERE id='$id'";

    mysqli_query($con, $sql);

    header("Location: ../blog.php");
    exit;
}


// -------------------------------
// DELETE BLOG
// -------------------------------
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($con, "DELETE FROM blog WHERE id='$id'");
    header("Location: ../blog.php");
    exit;
}
?>