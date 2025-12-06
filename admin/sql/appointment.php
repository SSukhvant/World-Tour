<?php
	include("../include/connectDB.php");
	$con = connectDB();


	// Delete Appointment *********************************************************************

		if(isset($_GET['appoinment_delete_id'])){
				$id = $_GET['appoinment_delete_id'];

				$delete_sql = "DELETE FROM appoinment WHERE id = $id";
		      	$delete_result = mysqli_query($con,$delete_sql);
		      	if($delete_result){
		      		header('location:../appointment.php');
		      	}else{
		      		echo "not delete";
		      	}
			}



?>