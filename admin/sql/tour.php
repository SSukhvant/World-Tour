<?php 
    include("../include/connectDB.php");
    $con = connectDB();
    session_start();

// Add Blog category ***********************************************************************

    if(isset($_POST['category_submit'])){
    $category = mysqli_real_escape_string($con,$_POST['category']);


    $sql = "INSERT INTO tour_category VALUES(NULL,'$category')";
    $query = mysqli_query($con,$sql);
    if($query){
         header("location:../tour.php");
        }else{
            echo "not connected";
        }

    }

// Delete Category ***********************************************************************
    if(isset($_GET['delete_category_id'])){
        $id = $_GET['delete_category_id'];

        $delete_sql = "DELETE FROM tour_category WHERE id = $id";
        $delete_result = mysqli_query($con,$delete_sql);
        if($delete_result){
            header('location:../tour.php');
        }else{
            echo "not delete";
        }
    }


// Add tour ***********************************************************************
   if (isset($_POST['add_tour'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];

    $slug_url = strtolower(str_replace([" ", "'"], ["-", ""], $title));

    // Allowed extensions
    $allowedImageExts = ['jpg', 'jpeg', 'png', 'gif'];
    $allowedVideoExts = ['mp4', 'avi', 'mov', 'wmv'];

    // Image validation
    $imageName = $_FILES['image']['name'];
    $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

    // Video validation
    $videoName = $_FILES['video']['name'];
    $videoExt = strtolower(pathinfo($videoName, PATHINFO_EXTENSION));

    if (!in_array($imageExt, $allowedImageExts)) {
        echo ("<script>
            alert('Invalid image format. Allowed: jpg, jpeg, png, gif');
            window.location.href='../tour-add.php';
        </script>");
        exit();
    }

    if (!in_array($videoExt, $allowedVideoExts)) {
        echo ("<script>
            alert('Invalid video format. Allowed: mp4, avi, mov, wmv');
            window.location.href='../tour-add.php';
        </script>");
        exit();
    }

    // Upload image
    $newImageName = uniqid() . "_" . basename($imageName);
    $imageUploadPath = "../image/" . $newImageName;
    move_uploaded_file($_FILES['image']['tmp_name'], $imageUploadPath);

    // Upload video
    $newVideoName = uniqid() . "_" . basename($videoName);
    $videoUploadPath = "../image/" . $newVideoName;
    move_uploaded_file($_FILES['video']['tmp_name'], $videoUploadPath);

    // Insert into DB
    $sql = "INSERT INTO tour VALUES(NULL, '$title', '$slug_url', '$content', '$category', '$newImageName', '$newVideoName', NOW())";
    $query = mysqli_query($con, $sql);

    if ($query) {
        header("Location: ../tour.php");
        exit();
    } else {
        echo "Insert failed: " . mysqli_error($con);
    }
}

// tour Delete sql query *****************************************************************************

        if(isset($_GET['delete_tour_id'])){
        $id = $_GET['delete_tour_id'];

        $delete_sql = "SELECT * FROM tour WHERE id = '$id'";
        $delete_result = mysqli_query($con,$delete_sql);
        $delete_row = mysqli_fetch_assoc($delete_result);
        $image = "../image/".$delete_row['image'];

        
        if(file_exists("../image/".$delete_row['image'])){
            unlink($image);
        }

        $delete_sql = "DELETE FROM tour WHERE id = $id";
        $delete_result = mysqli_query($con,$delete_sql);
        if($delete_result){
            header('location:../tour.php');
        }else{
            echo "not delete";
        }
    
  }


  
 // tour Update sql query *****************************************************************************

        if(isset($_POST['update_tour'])){
            $id = $_GET['id'];
            $title = mysqli_real_escape_string($con,$_POST['title']);
            $content = mysqli_real_escape_string($con,$_POST['content']);
            $category = mysqli_real_escape_string($con,$_POST['category']);
            $dayorweek = mysqli_real_escape_string($con,$_POST['dayorweek']);
            $price = mysqli_real_escape_string($con,$_POST['price']);
            $image  = htmlspecialchars($_FILES['image']['name']);

            $slug_url = strtolower($title);
            $slug_url = str_replace([" ", "'"], ["-", ""], $slug_url);

            $delete_image_sql = "SELECT * FROM tour WHERE id='$id'";
            $delete_query = mysqli_query($con,$delete_image_sql);
            $delete_row = mysqli_fetch_assoc($delete_query);
            $select_image = $delete_row['image'];

        if($image != ""){
            $rand = rand(0000,9999).$image;
            $upload = "../image/".$rand;
            move_uploaded_file($_FILES['image']['tmp_name'],$upload);
            $sql = "UPDATE tour SET title = '$title',slug_url='$slug_url', content='$content', category='$category', dayorweek='$dayorweek', price='$price',image='$rand' WHERE id='$id'";
            $result = mysqli_query($con,$sql);
            if($result){
            // image directory delete**********************
                if($select_image !="" && file_exists('../image/'.$select_image)){
                        unlink('../image/'.$select_image);
                    }
                header("location:../tour.php");
            }else{
                echo "not update";
            }
    
        }else{
            $sql = "UPDATE tour SET title = '$title',slug_url='$slug_url', content='$content', category='$category', dayorweek='$dayorweek', price='$price' WHERE id='$id'";
            $result = mysqli_query($con,$sql);
            if($result){
                header("location:../tour.php");
            }else{
                echo "not update";
            }
        }

    }

?>