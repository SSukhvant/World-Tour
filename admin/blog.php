<?php include('include/header.php'); ?>

<div id="page-wrapper">
<br><br>
<div class="container-fluid">

<div class="panel panel-default">
<div class="panel-heading d-flex justify-content-between align-items-center">
    <h4>All Blog Posts</h4>
    <a href="blog-add.php" class="btn btn-primary btn-sm">Add New</a>
</div>

<div class="panel-body">

<table class="table table-bordered table-hover">
<thead>
<tr>
    <th>#</th>
    <th>Title</th>
    <th>Category</th>
    <th>Status</th>
    <th>Date</th>
    <th>Action</th>
</tr>
</thead>

<tbody>
<?php
$blogs = mysqli_query($con, "SELECT * FROM blog ORDER BY id DESC");
$sn = 1;

while ($b = mysqli_fetch_assoc($blogs)) { ?>
<tr>
    <td><?= $sn++; ?></td>
    <td><?= substr($b['title'], 0, 40); ?></td>
    <td><?= $b['category']; ?></td>
    <td><?= $b['status']; ?></td>
    <td><?= date("Y-m-d", strtotime($b['created_at'])); ?></td>

    <td>
        <a href="blog-view.php?id=<?= $b['id']; ?>"><i class="fa fa-eye"></i></a>
        &nbsp;
        <a href="blog-update.php?id=<?= $b['id']; ?>"><i class="fa fa-edit"></i></a>
        &nbsp;
        <a onclick="return confirm('Delete blog?')" href="sql/blog.php?delete=<?= $b['id']; ?>"><i class="fa fa-trash"></i></a>
    </td>
</tr>
<?php } ?>
</tbody>
</table>

</div>
</div>

</div>
</div>

<?php include('include/footer.php'); ?>