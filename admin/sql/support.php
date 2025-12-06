<?php
	include("../include/connectDB.php");
	$con = connectDB();

	// termandcondition add *********************************************************************
		if(isset($_POST['termandcondition_add'])){
			$title = mysqli_real_escape_string($con,$_POST['title']);
			$content = mysqli_real_escape_string($con,$_POST['description']);
			$sql = "INSERT INTO termandcondition VALUES(null,'$title','$content')";
		      	$result = mysqli_query($con,$sql);
		      	if($result){
		      		header("location:../termandcondition.php");
		      	}else{
		      		echo "not connected";
		      	}
			

		}


	// termandcondition Update *********************************************************************	
		if(isset($_POST['update_termandcondition'])){
			$id = $_GET['id'];
			$title = mysqli_real_escape_string($con,$_POST['title']);
			$description = mysqli_real_escape_string($con,$_POST['description']);
			$sql = "UPDATE termandcondition SET title = '$title',description='$description' WHERE id='$id'";
			$result = mysqli_query($con,$sql);
		      	if($result){
		      		header("location:../termandcondition.php");
		      	}else{
		      		echo "not connected";
		      	}
		}

	// Delete termandcondition *********************************************************************

		if(isset($_GET['termandcondition_delete_id'])){
				$id = $_GET['termandcondition_delete_id'];

				$delete_sql = "DELETE FROM termandcondition WHERE id = $id";
		      	$delete_result = mysqli_query($con,$delete_sql);
		      	if($delete_result){
		      		header('location:../termandcondition.php');
		      	}else{
		      		echo "not delete";
		      	}
			}






//-----------------------------------------------------------------------------------------------------
			


	// faqs add *********************************************************************
		if(isset($_POST['faqs_add'])){
			$title = mysqli_real_escape_string($con,$_POST['title']);
			$description = mysqli_real_escape_string($con,$_POST['description']);
			$sql = "INSERT INTO faqs VALUES(null,'$title','$description')";
		      	$result = mysqli_query($con,$sql);
		      	if($result){
		      		header("location:../faqs.php");
		      	}else{
		      		echo "not connected";
		      	}
			

		}


	// faqs Update *********************************************************************	
		if(isset($_POST['update_faqs'])){
			$id = $_GET['id'];
			$title = mysqli_real_escape_string($con,$_POST['title']);
			$description = mysqli_real_escape_string($con,$_POST['description']);
			$sql = "UPDATE faqs SET title = '$title',description='$description' WHERE id='$id'";
			$result = mysqli_query($con,$sql);
		      	if($result){
		      		header("location:../faqs.php");
		      	}else{
		      		echo "not connected";
		      	}
		}

	// Delete faqs *********************************************************************

		if(isset($_GET['faqs_delete_id'])){
				$id = $_GET['faqs_delete_id'];

				$delete_sql = "DELETE FROM faqs WHERE id = $id";
		      	$delete_result = mysqli_query($con,$delete_sql);
		      	if($delete_result){
		      		header('location:../faqs.php');
		      	}else{
		      		echo "not delete";
		      	}
			}



?>