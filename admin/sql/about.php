<?php
include("../include/connectDB.php");
$con = connectDB();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_POST['about_update'])) {

        $title = mysqli_real_escape_string($con, $_POST['title']);
        $content = mysqli_real_escape_string($con, $_POST['content']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $location = mysqli_real_escape_string($con, $_POST['location']);

        // NEW FIELDS
        $office_week = mysqli_real_escape_string($con, $_POST['office_hours_week']);
        $office_sun  = mysqli_real_escape_string($con, $_POST['office_hours_sun']);

        // Handle About Image
        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image']['name'];
            $path = "../image/" . $image;
            move_uploaded_file($_FILES['image']['tmp_name'], $path);

            $update_img = ", about_image='$image'";
        } else {
            $update_img = "";
        }

        // Handle Logo
        if (!empty($_FILES['logo']['name'])) {
            $logo = $_FILES['logo']['name'];
            $path2 = "../image/" . $logo;
            move_uploaded_file($_FILES['logo']['tmp_name'], $path2);

            $update_logo = ", logo='$logo'";
        } else {
            $update_logo = "";
        }

        // FINAL UPDATE QUERY
        $update_sql = "
            UPDATE about SET 
                title='$title',
                content='$content',
                phone='$phone',
                email='$email',
                location='$location',
                office_hours_week='$office_week',
                office_hours_sun='$office_sun'
                $update_img
                $update_logo
            WHERE id='$id'
        ";

        if (mysqli_query($con, $update_sql)) {
            header("Location: ../about-update.php?id=$id&success=1");
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
?>
