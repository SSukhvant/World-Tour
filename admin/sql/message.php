<?php
	include("../include/connectDB.php");
	$con = connectDB();


	// Delete Appointment *********************************************************************

		if(isset($_GET['message_delete_id'])){
				$id = $_GET['message_delete_id'];

				$delete_sql = "DELETE FROM message WHERE id = $id";
		      	$delete_result = mysqli_query($con,$delete_sql);
		      	if($delete_result){
		      		header('location:../message.php');
		      	}else{
		      		echo "not delete";
		      	}
			}



?>