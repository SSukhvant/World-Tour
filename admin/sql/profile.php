<?php
    include("../include/connectDB.php");
    $con = connectDB();
    if(isset($_POST['about_update'])){
        $name = mysqli_real_escape_string($con,$_POST['name']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $about = mysqli_real_escape_string($con,$_POST['about']);

        $sql = "UPDATE admin SET name = '$name', email='$email', about='$about'";
        $result = mysqli_query($con,$sql);
        if($result){
            header("location:../profile.php");
        }else{
            echo "not update";
        }



    }   
?>