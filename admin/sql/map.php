<?php
	include("../include/connectDB.php");
	$con = connectDB();

	if(isset($_POST['map_update'])){
			$id = $_GET['id'];
			$map_link = mysqli_real_escape_string($con,$_POST['map_link']);


			$sql = "UPDATE map SET map_link = '$map_link' WHERE id='$id'";
			$result = mysqli_query($con,$sql);
			if($result){
				header("location:../map.php");
			}else{
				echo "not update";
			}
		


		}	

?>