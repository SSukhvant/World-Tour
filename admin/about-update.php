<?php include('include/header.php'); ?>

<?php 
// Fetch existing about data
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM about WHERE id='$id' LIMIT 1";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>

<div id="page-wrapper">
    <br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>About Update Page</h2>
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">

                            <form action="sql/about.php?id=<?= $row['id']; ?>" method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md-8">

                                        <!-- TITLE -->
                                        <div class="mb-3">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title" required value="<?= $row['title']; ?>" class="form-control">
                                        </div><br>

                                        <!-- CONTENT -->
                                        <div class="mb-3">
                                            <label class="form-label">Content</label>
                                            <textarea name="content" class="form-control" rows="4"><?= $row['content']; ?></textarea>
                                        </div><br>

                                        <!-- PHONE -->
                                        <div class="mb-3">
                                            <label class="form-label">Phone</label>
                                            <input type="text" name="phone" required value="<?= $row['phone']; ?>" class="form-control">
                                        </div><br>

                                        <!-- EMAIL -->
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="text" name="email" required value="<?= $row['email']; ?>" class="form-control">
                                        </div><br>

                                        <!-- LOCATION -->
                                        <div class="mb-3">
                                            <label class="form-label">Location / Address</label>
                                            <input type="text" name="location" required value="<?= $row['location']; ?>" class="form-control">
                                        </div><br>

                                        <!-- OFFICE HOURS WEEK -->
                                        <div class="mb-3">
                                            <label class="form-label">Office Hours (Weekdays)</label>
                                            <input type="text" 
                                                   name="office_hours_week" 
                                                   value="<?= $row['office_hours_week']; ?>" 
                                                   class="form-control"
                                                   placeholder="Example: Mon–Sat: 9AM–7PM">
                                        </div><br>

                                        <!-- OFFICE HOURS SUNDAY -->
                                        <div class="mb-3">
                                            <label class="form-label">Office Hours (Sunday)</label>
                                            <input type="text" 
                                                   name="office_hours_sun" 
                                                   value="<?= $row['office_hours_sun']; ?>" 
                                                   class="form-control"
                                                   placeholder="Example: Sunday: Closed">
                                        </div><br>

                                        <!-- ABOUT IMAGE -->
                                        <div class="mb-3">
                                            <img width="100" src="image/<?= $row['about_image']; ?>"><br><br>
                                            <label class="form-label">About Image</label>
                                            <input type="file" name="image">
                                        </div><br>

                                        <!-- LOGO -->
                                        <div class="mb-3">
                                            <img width="100" src="image/<?= $row['logo']; ?>"><br><br>
                                            <label class="form-label">Logo</label>
                                            <input type="file" name="logo">
                                        </div><br>

                                        <input type="submit" class="btn btn-primary form-control" value="Update" name="about_update">
                                        <br><br><br>

                                    </div>
                                </div>

                                <!-- CKEditor -->
                                <script>
                                    CKEDITOR.replace('content', { height: 200 });
                                </script>

                            </form>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>