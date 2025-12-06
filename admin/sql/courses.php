<?php 
    include("../include/connectDB.php");
    $con = connectDB();

// Add Blog category ***********************************************************************

    if(isset($_POST['category_submit'])){
    $category = mysqli_real_escape_string($con,$_POST['category']);


    $sql = "INSERT INTO courses_category VALUES(NULL,'$category')";
    $query = mysqli_query($con,$sql);
    if($query){
         header("location:../courses.php");
        }else{
            echo "not connected";
        }

    }

// Delete Category ***********************************************************************
    if(isset($_GET['delete_category_id'])){
        $id = $_GET['delete_category_id'];

        $delete_sql = "DELETE FROM courses_category WHERE id = $id";
        $delete_result = mysqli_query($con,$delete_sql);
        if($delete_result){
            header('location:../courses.php');
        }else{
            echo "not delete";
        }
    }


// Add Courses ***********************************************************************
    if(isset($_POST['add_courses'])){
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $content = mysqli_real_escape_string($con,$_POST['content']);
    $category = mysqli_real_escape_string($con,$_POST['category']);
    $dayorweek = mysqli_real_escape_string($con,$_POST['dayorweek']);
    $price = mysqli_real_escape_string($con,$_POST['price']);

    $slug_url = strtolower($title);
    $slug_url = str_replace([" ", "'"], ["-", ""], $slug_url);
    

    $rand = rand(00000,99999);
    $image = $rand.$_FILES['image']['name'];
    $upload ="../image/".$rand.$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],$upload);

    $sql = "INSERT INTO courses VALUES(NULL,'$title','$slug_url','$content','$category','$dayorweek','$price','$image',NOW())";
    $query = mysqli_query($con,$sql);
    if($query){
         header("location:../courses.php");
        }else{
            echo "not connected";
        }

    }

// Courses Delete sql query *****************************************************************************

        if(isset($_GET['delete_courses_id'])){
        $id = $_GET['delete_courses_id'];

        $delete_sql = "SELECT * FROM courses WHERE id = '$id'";
        $delete_result = mysqli_query($con,$delete_sql);
        $delete_row = mysqli_fetch_assoc($delete_result);
        $image = "../image/".$delete_row['image'];

        
        if(file_exists("../image/".$delete_row['image'])){
            unlink($image);
        }

        $delete_sql = "DELETE FROM courses WHERE id = $id";
        $delete_result = mysqli_query($con,$delete_sql);
        if($delete_result){
            header('location:../courses.php');
        }else{
            echo "not delete";
        }
    
  }


  
 // Courses Update sql query *****************************************************************************

        if(isset($_POST['update_courses'])){
            $id = $_GET['id'];
            $title = mysqli_real_escape_string($con,$_POST['title']);
            $content = mysqli_real_escape_string($con,$_POST['content']);
            $category = mysqli_real_escape_string($con,$_POST['category']);
            $dayorweek = mysqli_real_escape_string($con,$_POST['dayorweek']);
            $price = mysqli_real_escape_string($con,$_POST['price']);
            $image  = htmlspecialchars($_FILES['image']['name']);

            $slug_url = strtolower($title);
            $slug_url = str_replace([" ", "'"], ["-", ""], $slug_url);

            $delete_image_sql = "SELECT * FROM courses WHERE id='$id'";
            $delete_query = mysqli_query($con,$delete_image_sql);
            $delete_row = mysqli_fetch_assoc($delete_query);
            $select_image = $delete_row['image'];

        if($image != ""){
            $rand = rand(0000,9999).$image;
            $upload = "../image/".$rand;
            move_uploaded_file($_FILES['image']['tmp_name'],$upload);
            $sql = "UPDATE courses SET title = '$title',slug_url='$slug_url', content='$content', category='$category', dayorweek='$dayorweek', price='$price',image='$rand' WHERE id='$id'";
            $result = mysqli_query($con,$sql);
            if($result){
            // image directory delete**********************
                if($select_image !="" && file_exists('../image/'.$select_image)){
                        unlink('../image/'.$select_image);
                    }
                header("location:../courses.php");
            }else{
                echo "not update";
            }
    
        }else{
            $sql = "UPDATE courses SET title = '$title',slug_url='$slug_url', content='$content', category='$category', dayorweek='$dayorweek', price='$price' WHERE id='$id'";
            $result = mysqli_query($con,$sql);
            if($result){
                header("location:../courses.php");
            }else{
                echo "not update";
            }
        }

    }

?>