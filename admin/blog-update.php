<?php include('include/header.php'); ?>

<?php
$id = $_GET['id'];
$res = mysqli_query($con, "SELECT * FROM blog WHERE id='$id'");
$row = mysqli_fetch_assoc($res);
?>

<div id="page-wrapper">
<br><br>
<div class="container-fluid">

<div class="panel panel-default">
<div class="panel-heading">
    <h4>Edit Blog</h4>
</div>

<div class="panel-body">

<form action="sql/blog.php?id=<?= $row['id']; ?>" method="post" enctype="multipart/form-data">

<div class="row">
<div class="col-md-8">

    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" value="<?= $row['title']; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Slug</label>
        <input type="text" name="slug" value="<?= $row['slug']; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Excerpt</label>
        <textarea name="excerpt" rows="3" class="form-control"><?= $row['excerpt']; ?></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Content</label>
        <textarea name="content" id="content-editor" rows="6" class="form-control"><?= $row['content']; ?></textarea>
    </div>

</div>

<div class="col-md-4">

    <div class="mb-3">
        <label>Category</label>
        <input type="text" name="category" value="<?= $row['category']; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Tags</label>
        <input type="text" name="tags" value="<?= $row['tags']; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Current Image</label><br>
        <img src="image/<?= $row['featured_image']; ?>" width="120" class="mb-2">
        <input type="file" name="featured_image" class="form-control">
    </div>

    <div class="mb-3">
        <label>SEO Title</label>
        <input type="text" name="seo_title" value="<?= $row['seo_title']; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>SEO Description</label>
        <textarea name="seo_description" rows="3" class="form-control"><?= $row['seo_description']; ?></textarea>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option <?= $row['status']=="Published"?"selected":"" ?>>Published</option>
            <option <?= $row['status']=="Draft"?"selected":"" ?>>Draft</option>
        </select>
    </div>

</div>
</div>

<input type="submit" name="update_blog" class="btn btn-success" value="Update Blog">

</form>

</div>
</div>

</div>
</div>

<script>
CKEDITOR.replace('content-editor');
</script>

<?php include('include/footer.php'); ?>