<?php include('include/header.php'); ?>

<?php
$id = $_GET['id'];
$sql = mysqli_query($con, "SELECT * FROM message WHERE id = $id LIMIT 1");
$details = mysqli_fetch_assoc($sql);
?>

<div id="page-wrapper">
<br><br>
<div class="container-fluid">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Message Details</h4>
        </div>

        <div class="panel-body">

            <p><strong>Name:</strong> <?= $details['name'] ?></p>
            <p><strong>Email:</strong> <?= $details['email'] ?></p>
            <p><strong>Mobile:</strong> <?= $details['mobile'] ?></p>
            <p><strong>Subject:</strong> <?= $details['subject'] ?></p>
            <p><strong>Message:</strong> <?= nl2br($details['message']) ?></p>
            <p><strong>Date:</strong> <?= $details['date'] ?></p>

            <a href="message.php" class="btn btn-primary btn-sm mt-3">Back</a>

        </div>
    </div>

</div>
</div>

<?php include('include/footer.php'); ?>