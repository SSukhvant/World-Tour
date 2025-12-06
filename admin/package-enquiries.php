<?php include('include/header.php'); ?>

<div id="page-wrapper">
<br><br>
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h2>Package Enquiries</h2>
</div>

<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>ID</th>
<th>Package Name</th>
<th>Name</th>
<th>Phone</th>
<th>Pax</th>
<th>Duration</th>
<th>Submitted At</th>
<th>Action</th>
</tr>
</thead>

<tbody>
<?php $i=1; ?>
<?php 
$enq = mysqli_query($con, "SELECT * FROM package_enquiries ORDER BY id ASC");
while($row = mysqli_fetch_assoc($enq)){ ?>
<tr>
<td><?= $i++; ?></td>
<td><?= $row['package_name']; ?></td>
<td><?= $row['name']; ?></td>
<td><?= $row['phone']; ?></td>
<td><?= $row['pax']; ?></td>
<td><?= $row['duration']; ?></td>
<td><?= $row['created_at']; ?></td>
<td>
  <a href="sql/delete-package-enquiry.php?id=<?= $row['id']; ?>" 
     onclick="return confirm('Delete this enquiry?')" 
     class="btn btn-trash btn-sm">
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
</div>

<?php include('include/footer.php'); ?>