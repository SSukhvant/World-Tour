<?php include('include/header.php'); ?>

<?php
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}

$per_page = 9;
$start_page = ($page - 1) * 9;

$message_sql = "SELECT * FROM message ORDER BY id DESC LIMIT $start_page, $per_page";
$message_result = mysqli_query($con, $message_sql);
?>

<div id="page-wrapper">
<br><br>
<div class="container-fluid">
     <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading d-flex justify-content-between">
                    <h6 class="mb-0">All Messages</h6>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">

                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php while ($message_row = mysqli_fetch_assoc($message_result)) { ?>
                                <tr>
                                    <td><?php echo date('Y-m-d', strtotime($message_row['date'])); ?></td>
                                    <td><?php echo htmlspecialchars($message_row['name']); ?></td>
                                    <td><?php echo htmlspecialchars($message_row['email']); ?></td>

                                    <td>
                                        <a href="message-view.php?id=<?php echo $message_row['id']; ?>">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        &nbsp;&nbsp;

                                        <a onclick="return confirm('Delete this message?')" 
                                           href="sql/message.php?message_delete_id=<?php echo $message_row['id']; ?>">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <br>

                        <center>
                            <?php
                            $total_record_query = mysqli_query($con, "SELECT * FROM message");
                            $total_record = mysqli_num_rows($total_record_query);
                            $total_page = ceil($total_record / $per_page);

                            if ($page > 1) {
                                echo "<a href='message.php?page=" . ($page - 1) . "'>Previous</a>";
                            }

                            for ($i = 1; $i <= $total_page; $i++) {
                                echo "<a href='message.php?page=$i' style='color:red; padding:10px 5px;'>$i</a>";
                            }

                            if ($page < $total_page) {
                                echo "<a href='message.php?page=" . ($page + 1) . "'>Next</a>";
                            }
                            ?>
                        </center>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

<?php include('include/footer.php'); ?>