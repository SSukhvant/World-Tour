<?php 
    include("../include/connectDB.php");
    $con = connectDB();


// Add item***********************************************************************
    if(isset($_POST['item_add'])){

    $rand = rand(00000,99999);
    $image = $rand.$_FILES['image']['name'];
    $upload ="../image/".$rand.$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],$upload);

    $sql = "INSERT INTO item VALUES(NULL,'$image')";
    $query = mysqli_query($con,$sql);
    if($query){
         header("location:../item.php");
        }else{
            echo "not connected";
        }

    }


// item Delete sql query *****************************************************************************

        if(isset($_GET['delete_item_id'])){
        $id = $_GET['delete_item_id'];

        $delete_sql = "SELECT * FROM item WHERE id = '$id'";
        $delete_result = mysqli_query($con,$delete_sql);
        $delete_row = mysqli_fetch_assoc($delete_result);
        $image = "../image/".$delete_row['image'];

        
        if(file_exists("../image/".$delete_row['image'])){
            unlink($image);
        }

        $delete_sql = "DELETE FROM item WHERE id = $id";
        $delete_result = mysqli_query($con,$delete_sql);
        if($delete_result){
            header('location:../item.php');
        }else{
            echo "not delete";
        }
    
  }


  // item update sql query *****************************************************************************

        if(isset($_POST['item_update'])){
        $id = $_GET['id'];

        $image  = htmlspecialchars($_FILES['image']['name']);

            $delete_image_sql = "SELECT * FROM item WHERE id='$id'";
            $delete_query = mysqli_query($con,$delete_image_sql);
            $delete_row = mysqli_fetch_assoc($delete_query);
            $select_image = $delete_row['image'];

        if($image != ""){
            $rand = rand(0000,9999).$image;
            $upload = "../image/".$rand;
            move_uploaded_file($_FILES['image']['tmp_name'],$upload);
            $sql = "UPDATE item SET image='$rand' WHERE id='$id'";
            $result = mysqli_query($con,$sql);
            if($result){
            // image directory delete**********************
                if($select_image !="" && file_exists('../image/'.$select_image)){
                        unlink('../image/'.$select_image);
                    }
                header("location:../item.php");
            }else{
                echo "not update";
            }
    
        }else{
            
                header("location:../item.php");
           
        }

    }

?>