<?php 
    include("../include/connectDB.php");
    $con = connectDB();

// Add team category ***********************************************************************

    if(isset($_POST['team_category_submit'])){
    $title = mysqli_real_escape_string($con,$_POST['title']);


    $sql = "INSERT INTO designation VALUES(NULL,'$title')";
    $query = mysqli_query($con,$sql);
    if($query){
         header("location:../team.php");
        }else{
            echo "not connected";
        }

    }

    // Delete team category ***********************************************************************
    if(isset($_GET['delete_team_category_id'])){
        $id = $_GET['delete_team_category_id'];

        $delete_sql = "DELETE FROM designation WHERE id = $id";
        $delete_result = mysqli_query($con,$delete_sql);
        if($delete_result){
            header('location:../team.php');
        }else{
            echo "not delete";
        }
    }

// Add team***********************************************************************
    if(isset($_POST['team_add'])){
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $designation = mysqli_real_escape_string($con,$_POST['designation']);
    $facebook = mysqli_real_escape_string($con,$_POST['facebook']);
    $twitter = mysqli_real_escape_string($con,$_POST['twitter']);
    $instagram = mysqli_real_escape_string($con,$_POST['instagram']);

    $rand = rand(00000,99999);
    $image = $rand.$_FILES['image']['name'];
    $upload ="../image/".$rand.$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],$upload);

    $sql = "INSERT INTO team VALUES(NULL,'$name','$designation','$facebook','$twitter','$instagram','$image')";
    $query = mysqli_query($con,$sql);
    if($query){
         header("location:../team.php");
        }else{
            echo "not connected";
        }

    }


// team Delete sql query *****************************************************************************

        if(isset($_GET['delete_team_id'])){
        $id = $_GET['delete_team_id'];

        $delete_sql = "SELECT * FROM team WHERE id = '$id'";
        $delete_result = mysqli_query($con,$delete_sql);
        $delete_row = mysqli_fetch_assoc($delete_result);
        $image = "../image/".$delete_row['image'];

        
        if(file_exists("../image/".$delete_row['image'])){
            unlink($image);
        }

        $delete_sql = "DELETE FROM team WHERE id = $id";
        $delete_result = mysqli_query($con,$delete_sql);
        if($delete_result){
            header('location:../team.php');
        }else{
            echo "not delete";
        }
    
  }


  // team update sql query *****************************************************************************

        if(isset($_POST['team_update'])){
        $id = $_GET['id'];
        $name = mysqli_real_escape_string($con,$_POST['name']);
        $designation = mysqli_real_escape_string($con,$_POST['designation']);
        $facebook = mysqli_real_escape_string($con,$_POST['facebook']);
        $twitter = mysqli_real_escape_string($con,$_POST['twitter']);
        $instagram = mysqli_real_escape_string($con,$_POST['instagram']);
        $image  = htmlspecialchars($_FILES['image']['name']);

            $delete_image_sql = "SELECT * FROM team WHERE id='$id'";
            $delete_query = mysqli_query($con,$delete_image_sql);
            $delete_row = mysqli_fetch_assoc($delete_query);
            $select_image = $delete_row['image'];

        if($image != ""){
            $rand = rand(0000,9999).$image;
            $upload = "../image/".$rand;
            move_uploaded_file($_FILES['image']['tmp_name'],$upload);
            $sql = "UPDATE team SET name = '$name', designation='$designation', facebook='$facebook', twitter='$twitter', instagram='$instagram', image='$rand' WHERE id='$id'";
            $result = mysqli_query($con,$sql);
            if($result){
            // image directory delete**********************
                if($select_image !="" && file_exists('../image/'.$select_image)){
                        unlink('../image/'.$select_image);
                    }
                header("location:../team.php");
            }else{
                echo "not update";
            }
    
        }else{
            $sql = "UPDATE team SET name = '$name', designation='$designation', facebook='$facebook', twitter='$twitter', instagram='$instagram' WHERE id='$id'";
            $result = mysqli_query($con,$sql);
            if($result){
                header("location:../team.php");
            }else{
                echo "not update";
            }
        }

    }

?>