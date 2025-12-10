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
    <h4>View Blog</h4>
</div>

<div class="panel-body">

<h3><?= $row['title']; ?></h3>
<p><strong>Category:</strong> <?= $row['category']; ?></p>
<p><strong>Tags:</strong> <?= $row['tags']; ?></p>

<img src="image/blog/<?= $row['featured_image']; ?>" width="350" class="mb-3">

<hr>

<div><?= $row['content']; ?></div>

</div>
</div>

</div>
</div>

<?php include('include/footer.php'); ?>