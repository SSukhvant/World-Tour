<?php
	include("../include/connectDB.php");
	$con = connectDB();

	// Hero Update ******************************************************************************

			if(isset($_POST['banner_update'])){
				$id = $_GET['id'];
				$title = mysqli_real_escape_string($con,$_POST['title']);
				$content = mysqli_real_escape_string($con,$_POST['content']);
				$image = $_FILES['image']['name'];

					$delete_image_sql = "SELECT * FROM banner WHERE id='$id'";
					$delete_query = mysqli_query($con,$delete_image_sql);
					$delete_row = mysqli_fetch_assoc($delete_query);
					$select_image = $delete_row['image'];

				if($image != ""){
					$rand = rand(0000,9999).$image;
					$upload = "../image/".$rand;
					move_uploaded_file($_FILES['image']['tmp_name'],$upload);
					$sql = "UPDATE banner SET title = '$title', content='$content' ,image='$rand' WHERE id='$id'";
					$result = mysqli_query($con,$sql);
					if($result){
					// image directory delete**********************
						if($select_image !="" && file_exists('../image/'.$select_image)){
								unlink('../image/'.$select_image);
							}
						header("location:../banner.php");
					}else{
						echo "not update";
					}
			
				}else{
					$sql = "UPDATE banner SET title = '$title', content='$content' WHERE id='$id'";
					$result = mysqli_query($con,$sql);
					if($result){
						header("location:../banner.php");
					}else{
						echo "not update";
					}
				}

			}


?>