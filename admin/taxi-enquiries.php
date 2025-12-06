<?php include('include/header.php'); ?>

<?php
$enq = mysqli_query($con, "SELECT * FROM taxi_enquiries ORDER BY id DESC");
?>

<div id="page-wrapper">
<br><br>
<div class="container-fluid">

<div class="panel panel-default">
<div class="panel-heading">
<h6>Taxi Enquiries</h6>
</div>

<div class="panel-body">
<div class="table-responsive">

<table class="table table-bordered table-hover">
<thead>
<tr>
<th>ID</th>
<th>Car Type</th>
<th>Date</th>
<th>Name</th>
<th>Phone</th>
<th>Action</th>
</tr>
</thead>

<tbody>
<?php $i = 1; ?>
<?php while($row = mysqli_fetch_assoc($enq)) { ?>
<tr>
<td><?= $i++; ?></td>
<td><?= $row['car_type'] ?></td>
<td><?= $row['travel_date'] ?></td>
<td><?= $row['name'] ?></td>
<td><?= $row['phone'] ?></td>

<td>
<a href="sql/delete-taxi-enquiry.php?id=<?= $row['id']; ?>" 
   onclick="return confirm('Delete this enquiry?')">
   <i class="fa fa-trash"></i>
</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>

</div>
</div>

</div>
</div>
</div>

<?php include('include/footer.php'); ?>
