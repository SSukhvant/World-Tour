<?php
	include("../include/connectDB.php");
	$con = connectDB();

	if(isset($_POST['socialmedia_update'])){
		$facebook = mysqli_real_escape_string($con,$_POST['facebook']);
		$twitter = mysqli_real_escape_string($con,$_POST['twitter']);
		$instagram = mysqli_real_escape_string($con,$_POST['instagram']);
		$linkedin = mysqli_real_escape_string($con,$_POST['linkedin']);

		$sql = "UPDATE socialmedia SET facebook = '$facebook',twitter='$twitter',instagram='$instagram',linkedin='$linkedin'";
		$result = mysqli_query($con,$sql);
		if($result){
			header("location:../socialmedia.php");
		}else{
			echo "not update";
		}


	}
?>