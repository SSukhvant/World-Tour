<?php include('include/header.php'); ?>

<div id="page-wrapper">
<br><br>
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">

<div class="panel panel-default">
<div class="panel-heading d-flex justify-content-between align-items-center">
    <h4 class="mb-0">Add New Blog</h4>
    <a href="blog.php" class="btn btn-primary btn-sm">View All</a>
</div>

<div class="panel-body">

<form action="sql/blog.php" method="post" enctype="multipart/form-data">

<div class="row">
<div class="col-md-8">

    <div class="mb-3">
        <label class="form-label">Blog Title</label>
        <input type="text" name="title" id="title" required class="form-control" placeholder="Enter blog title">
    </div>

    <div class="mb-3">
        <label class="form-label">Slug (Auto)</label>
        <input type="text" name="slug" id="slug" required class="form-control" readonly>
    </div>

    <div class="mb-3">
        <label class="form-label">Excerpt</label>
        <textarea name="excerpt" rows="3" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Content</label>
        <textarea name="content" id="content-editor" rows="6" class="form-control"></textarea>
    </div>

</div>

<div class="col-md-4">

    <div class="mb-3">
        <label class="form-label">Category</label>
        <input type="text" name="category" class="form-control" placeholder="e.g. Travel, Tips">
    </div>

    <div class="mb-3">
        <label class="form-label">Tags</label>
        <input type="text" name="tags" class="form-control" placeholder="e.g. thailand, manali">
    </div>

    <div class="mb-3">
        <label class="form-label">Featured Image</label>
        <input type="file" name="featured_image" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">SEO Title</label>
        <input type="text" name="seo_title" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">SEO Description</label>
        <textarea name="seo_description" rows="3" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-control">
            <option value="Published">Published</option>
            <option value="Draft">Draft</option>
        </select>
    </div>

</div>
</div>

<input type="submit" name="add_blog" class="btn btn-success" value="Publish Blog">

</form>

</div>
</div>

</div>
</div>
</div>
</div>

<script>
CKEDITOR.replace('content-editor');

document.getElementById("title").addEventListener("keyup", function () {
    let slug = this.value.toLowerCase().trim()
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/^-+|-+$/g, '');
    document.getElementById("slug").value = slug;
});
</script>

<?php include('include/footer.php'); ?>