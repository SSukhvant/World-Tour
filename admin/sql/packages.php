<?php 
    include("../include/connectDB.php");
    $con = connectDB();

// Add Blog category ***********************************************************************

    if(isset($_POST['time_submit'])){
    $time = mysqli_real_escape_string($con,$_POST['title']);


    $sql = "INSERT INTO time VALUES(NULL,'$time')";
    $query = mysqli_query($con,$sql);
    if($query){
         header("location:../packages.php");
        }else{
            echo "not connected";
        }

    }

// Delete Category ***********************************************************************
    if(isset($_GET['delete_time_id'])){
        $id = $_GET['delete_time_id'];

        $delete_sql = "DELETE FROM time WHERE id = $id";
        $delete_result = mysqli_query($con,$delete_sql);
        if($delete_result){
            header('location:../packages.php');
        }else{
            echo "not delete";
        }
    }


// Add packages ***********************************************************************
     if (isset($_POST['add_packages'])) {
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $content = mysqli_real_escape_string($con,$_POST['content']);
    $time = mysqli_real_escape_string($con,$_POST['time']);
    $price = mysqli_real_escape_string($con,$_POST['price']);

    $slug_url = strtolower($title);
    $slug_url = str_replace([" ", "'"], ["-", ""], $slug_url);

    // Allowed extensions
    $allowedImageExts = ['jpg', 'jpeg', 'png', 'gif'];
    

    // Image 1 validation
    $imageName1 = $_FILES['image1']['name'];
    $imageExt1 = strtolower(pathinfo($imageName1, PATHINFO_EXTENSION));

    if (!in_array($imageExt1, $allowedImageExts)) {
        echo ("<script>
            alert('Invalid image1 format. Allowed: jpg, jpeg, png, gif');
            window.location.href='../packages-add.php';
        </script>");
        exit();
    }

    // Upload image
    $newImageName1 = uniqid() . "_" . basename($imageName1);
    $imageUploadPath1 = "../image/" . $newImageName1;
    move_uploaded_file($_FILES['image1']['tmp_name'], $imageUploadPath1);




// // Image 2 validation*****************************************************************************
//     $imageName2 = $_FILES['image2']['name'];
//     $imageExt2 = strtolower(pathinfo($imageName2, PATHINFO_EXTENSION));

//     if (!in_array($imageExt2, $allowedImageExts)) {
//         echo ("<script>
//             alert('Invalid image2 format. Allowed: jpg, jpeg, png, gif');
//             window.location.href='../packages-add.php';
//         </script>");
//         exit();
//     }

//     // Upload image
//     $newImageName2 = uniqid() . "_" . basename($imageName2);
//     $imageUploadPath2 = "../image/" . $newImageName2;
//     move_uploaded_file($_FILES['image2']['tmp_name'], $imageUploadPath2);


// // Image 3 validation*****************************************************************************
//     $imageName3 = $_FILES['image3']['name'];
//     $imageExt3 = strtolower(pathinfo($imageName3, PATHINFO_EXTENSION));

//     if (!in_array($imageExt3, $allowedVideoExts)) {
//         echo ("<script>
//             alert('Invalid Video format. Allowed: mp4, avi, mov, wmv');
//             window.location.href='../packages-add.php';
//         </script>");
//         exit();
//     }

//     // Upload image
//     $newImageName3 = uniqid() . "_" . basename($imageName3);
//     $imageUploadPath3 = "../image/" . $newImageName3;
//     move_uploaded_file($_FILES['image3']['tmp_name'], $imageUploadPath3);




    // Insert into DB
    // $sql = "INSERT INTO packages VALUES(NULL, '$title', '$slug_url', '$price', '$time', '$content', '$newImageName1', '0','0','Disable', NOW())";
    // $query = mysqli_query($con, $sql);

// Insert into DB  *** FIXED COLUMN ORDER ***
// Insert into DB  *** FIXED COLUMN ORDER ***
$sql = "INSERT INTO packages 
(id, title, slug_url, destination, category, travel_month, price, time, content, image1, image2, image3, status, date)
VALUES
(NULL, '$title', '$slug_url', '$destination', '$category', '$travel_month', '$price', '$time', '$content', '$newImageName1', '0', '0', 'Disable', NOW())";

$query = mysqli_query($con, $sql);

if ($query) {
    header("Location: ../packages.php");
    exit();
} else {
    echo "Insert failed: " . mysqli_error($con);
}

}

// packages Delete sql query *****************************************************************************

        if(isset($_GET['delete_packages_id'])){
        $id = $_GET['delete_packages_id'];

        $delete_sql = "SELECT * FROM packages WHERE id = '$id'";
        $delete_result = mysqli_query($con,$delete_sql);
        $delete_row = mysqli_fetch_assoc($delete_result);
        $image = "../image/".$delete_row['image'];

        
        if(file_exists("../image/".$delete_row['image'])){
            unlink($image);
        }

        $delete_sql = "DELETE FROM packages WHERE id = $id";
        $delete_result = mysqli_query($con,$delete_sql);
        if($delete_result){
            header('location:../packages.php');
        }else{
            echo "not delete";
        }
    
  }


  
 // packages Update sql query *****************************************************************************

if (isset($_POST['update_packages'])) {
    $id = $_GET['id']; // Assuming you pass the package ID
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $content = mysqli_real_escape_string($con,$_POST['content']);
    $time = mysqli_real_escape_string($con,$_POST['time']);
    $price = mysqli_real_escape_string($con,$_POST['price']);

        // NEW FIELDS
    $destination  = mysqli_real_escape_string($con, $_POST['destination']);
    $category     = mysqli_real_escape_string($con, $_POST['category']);
    $travel_month = mysqli_real_escape_string($con, $_POST['travel_month']);

    $slug_url = strtolower($title);
    $slug_url = str_replace([" ", "'"], ["-", "-"], $slug_url);

    $allowedImageExts = ['jpg', 'jpeg', 'png', 'gif'];

    // Handle image1
    $newImageName1 = '';
    if (!empty($_FILES['image1']['name'])) {
        $imageName1 = $_FILES['image1']['name'];
        $imageExt1 = strtolower(pathinfo($imageName1, PATHINFO_EXTENSION));

        if (!in_array($imageExt1, $allowedImageExts)) {
            echo ("<script>
                alert('Invalid image1 format. Allowed: jpg, jpeg, png, gif');
                window.location.href='../packages-update.php?id=$id';
            </script>");
            exit();
        }

        $newImageName1 = uniqid() . "_" . basename($imageName1);
        $imageUploadPath1 = "../image/" . $newImageName1;
        move_uploaded_file($_FILES['image1']['tmp_name'], $imageUploadPath1);
    }

    // Handle image2
    $newImageName2 = '';
    if (!empty($_FILES['image2']['name'])) {
        $imageName2 = $_FILES['image2']['name'];
        $imageExt2 = strtolower(pathinfo($imageName2, PATHINFO_EXTENSION));

        if (!in_array($imageExt2, $allowedImageExts)) {
            echo ("<script>
                alert('Invalid image2 format. Allowed: jpg, jpeg, png, gif');
                window.location.href='../packages-update.php';
            </script>");
            exit();
        }

        $newImageName2 = uniqid() . "_" . basename($imageName2);
        $imageUploadPath2 = "../image/" . $newImageName2;
        move_uploaded_file($_FILES['image2']['tmp_name'], $imageUploadPath2);
    }

    // Handle image3
    $newImageName3 = '';
    if (!empty($_FILES['image3']['name'])) {
        $imageName3 = $_FILES['image3']['name'];
        $imageExt3 = strtolower(pathinfo($imageName3, PATHINFO_EXTENSION));
        $allowedVideoExts = ['mp4', 'avi', 'mov', 'wmv'];

        if (!in_array($imageExt3, $allowedVideoExts)) {
            echo ("<script>
                alert('Invalid Video format. Allowed: mp4, avi, mov, wmv');
                window.location.href='../packages-update.php';
            </script>");
            exit();
        }

        $newImageName3 = uniqid() . "_" . basename($imageName3);
        $imageUploadPath3 = "../image/" . $newImageName3;
        move_uploaded_file($_FILES['image3']['tmp_name'], $imageUploadPath3);
    }

    // Build dynamic SQL query
    // $sql = "UPDATE packages SET 
    //             title = '$title',
    //             slug_url = '$slug_url',
    //             price = '$price',
    //             time = '$time',
    //             content = '$content'";

    // if ($newImageName1) $sql .= ", image1 = '$newImageName1'";

    // $sql .= " WHERE id = $id";

    // $query = mysqli_query($con, $sql);

    // if ($query) {
    //     header("Location: ../packages.php");
    //     exit();
    // } else {
    //     echo "Update failed: " . mysqli_error($con);
    // }

    $sql = "UPDATE packages SET 
        title        = '$title',
        slug_url     = '$slug_url',
        destination  = '$destination',
        category     = '$category',
        travel_month = '$travel_month',
        price        = '$price',
        time         = '$time',
        content      = '$content'";

if ($newImageName1) {
    $sql .= ", image1 = '$newImageName1'";
}

$sql .= " WHERE id = $id";

// $query = mysqli_query($con, $sql);

// if ($query) {
//     header("Location: ../packages.php");
//     exit();
// } else {
//     echo \"Update failed: \" . mysqli_error($con);
// }
$query = mysqli_query($con, $sql);

if ($query) {
    header("Location: ../packages.php");
    exit();
} else {
    echo "Update failed: " . mysqli_error($con);
}

}


// packages offer section update page ********************************************************************************************************
    if(isset($_POST['offer_submit'])){
		$title = mysqli_real_escape_string($con,$_POST['title']);

		$sql = "UPDATE offer SET title = '$title'";
		$result = mysqli_query($con,$sql);
		if($result){
			header("location:../packages-offer.php");
		}else{
			echo "not update";
		}


	}




?>