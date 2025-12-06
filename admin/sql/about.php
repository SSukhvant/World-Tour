<?php
	include("../include/connectDB.php");
	$con = connectDB();

	// Hero Update ******************************************************************************

			if(isset($_POST['about_update'])){
				$id = $_GET['id'];
				$title = mysqli_real_escape_string($con,$_POST['title']);
				$content = mysqli_real_escape_string($con,$_POST['content']);
				$phone = mysqli_real_escape_string($con,$_POST['phone']);
				$email = mysqli_real_escape_string($con,$_POST['email']);
				$location = mysqli_real_escape_string($con,$_POST['location']);
				$image = $_FILES['image']['name'];
				$logo = $_FILES['logo']['name'];

					$delete_image_sql = "SELECT * FROM about WHERE id='$id'";
					$delete_query = mysqli_query($con,$delete_image_sql);
					$delete_row = mysqli_fetch_assoc($delete_query);
					$select_background_image = $delete_row['image'];
					$logo_image = $delete_row['logo'];

				if($image != ""){
					$background_image_rand = rand(0000,9999).$image;
					$upload = "../image/".$background_image_rand;
					move_uploaded_file($_FILES['image']['tmp_name'],$upload);
					$sql = "UPDATE about SET title = '$title', content='$content', phone='$phone', email='$email', location='$location',about_image='$background_image_rand' WHERE id='$id'";
					$result = mysqli_query($con,$sql);
					if($result){
					// image directory delete**********************
						if($select_background_image !="" && file_exists('../image/'.$select_background_image)){
								unlink('../image/'.$select_background_image);
							}
						header("location:../about.php");
					}else{
						echo "not update";
					}
			
				}else{
					$sql = "UPDATE about SET title = '$title', content='$content', phone='$phone', email='$email', location='$location' WHERE id='$id'";
					$result = mysqli_query($con,$sql);
					if($result){
						header("location:../about.php");
					}else{
						echo "not update";
					}
				}



				if($logo != ""){
					$logo_image_rand = rand(0000,9999).$logo;
					$upload = "../image/".$logo_image_rand;
					move_uploaded_file($_FILES['logo']['tmp_name'],$upload);
					$sql = "UPDATE about SET title = '$title', content='$content', phone='$phone', email='$email', location='$location', logo='$logo_image_rand' WHERE id='$id'";
					$result = mysqli_query($con,$sql);
					if($result){
					// image directory delete**********************
						if($logo_image !="" && file_exists('../image/'.$logo_image)){
								unlink('../image/'.$logo_image);
							}
						header("location:../about.php");
					}else{
						echo "not update";
					}
			
				}else{
					$sql = "UPDATE about SET title = '$title', content='$content', phone='$phone', email='$email', location='$location' WHERE id='$id'";
					$result = mysqli_query($con,$sql);
					if($result){
						header("location:../about.php");
					}else{
						echo "not update";
					}
				}




			}


?>