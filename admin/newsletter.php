<?php include('include/header.php'); ?>
<?php include('include/connectDB.php'); ?>

<?php 
$conn = connectDB();
$sql = mysqli_query($conn, "SELECT * FROM newsletter ORDER BY id DESC");
?>

<div id="page-wrapper">
<br><br>
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading d-flex justify-content-between">
                    <h3 class="mb-0">Newsletter Subscribers</h3>
                    <div>
                        <a href="export-newsletter.php" class="btn btn-success btn-sm">Export CSV</a>
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Email</th>
                                <th>Subscribed At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                        $sn = 1;
                        while($row = mysqli_fetch_assoc($sql)) { ?>
                            <tr>
                                <td><?= $sn++; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td><?= date("d M Y h:i A", strtotime($row['subscribed_at'])); ?></td>
                                <td>
                                    <a href="sql/delete-newsletter.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm"
                                       onclick="return confirm('Delete this subscriber?')">
                                       Delete
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