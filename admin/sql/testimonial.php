<?php 
    include("../include/connectDB.php");
    $con = connectDB();

// Add testimonial***********************************************************************
    if(isset($_POST['testimonial_add'])){
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $content = mysqli_real_escape_string($con,$_POST['content']);

    $rand = rand(00000,99999);
    $image = $rand.$_FILES['image']['name'];
    $upload ="../image/".$rand.$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],$upload);

    $sql = "INSERT INTO testimonial VALUES(NULL,'$name','$content','$image')";
    $query = mysqli_query($con,$sql);
    if($query){
         header("location:../testimonial.php");
        }else{
            echo "not connected";
        }

    }


// testimonial Delete sql query *****************************************************************************

        if(isset($_GET['delete_testimonial_id'])){
        $id = $_GET['delete_testimonial_id'];

        $delete_sql = "SELECT * FROM testimonial WHERE id = '$id'";
        $delete_result = mysqli_query($con,$delete_sql);
        $delete_row = mysqli_fetch_assoc($delete_result);
        $image = "../image/".$delete_row['image'];

        
        if(file_exists("../image/".$delete_row['image'])){
            unlink($image);
        }

        $delete_sql = "DELETE FROM testimonial WHERE id = $id";
        $delete_result = mysqli_query($con,$delete_sql);
        if($delete_result){
            header('location:../testimonial.php');
        }else{
            echo "not delete";
        }
    
  }


  // testimonial update sql query *****************************************************************************

        if(isset($_POST['testimonial_update'])){
        $id = $_GET['id'];
        $name = mysqli_real_escape_string($con,$_POST['name']);
        $content = mysqli_real_escape_string($con,$_POST['content']);
        $image  = htmlspecialchars($_FILES['image']['name']);

            $delete_image_sql = "SELECT * FROM testimonial WHERE id='$id'";
            $delete_query = mysqli_query($con,$delete_image_sql);
            $delete_row = mysqli_fetch_assoc($delete_query);
            $select_image = $delete_row['image'];

        if($image != ""){
            $rand = rand(0000,9999).$image;
            $upload = "../image/".$rand;
            move_uploaded_file($_FILES['image']['tmp_name'],$upload);
            $sql = "UPDATE testimonial SET name = '$name', content='$content', image='$rand' WHERE id='$id'";
            $result = mysqli_query($con,$sql);
            if($result){
            // image directory delete**********************
                if($select_image !="" && file_exists('../image/'.$select_image)){
                        unlink('../image/'.$select_image);
                    }
                header("location:../testimonial.php");
            }else{
                echo "not update";
            }
    
        }else{
            $sql = "UPDATE testimonial SET name = '$name', content='$content' WHERE id='$id'";
            $result = mysqli_query($con,$sql);
            if($result){
                header("location:../testimonial.php");
            }else{
                echo "not update";
            }
        }

    }

?>