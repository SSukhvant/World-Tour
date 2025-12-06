<?php
	include("../admin/include/connectDB.php");
	$con = connectDB();
	
	$profile_sql = "SELECT * FROM admin";
    $profile_query = mysqli_query($con, $profile_sql);
    $profile_row = mysqli_fetch_assoc($profile_query);
    
    $profile_email = $profile_row['email'];
	// Help add *********************************************************************

	$name = mysqli_real_escape_string($con,$_POST['name']);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$subject = mysqli_real_escape_string($con,$_POST['subject']);
	$message = mysqli_real_escape_string($con,$_POST['message']);
	$sql = "INSERT INTO message VALUES(null,'$name','$email','$subject','$message',NOW())";
      	$result = mysqli_query($con,$sql);
      	if($result){
      	    $to = "$profile_email";
            $subject = "$subject";
            $txt = "$message";
            $headers = "From: $email";
            
            mail($to,$subject,$txt,$headers);
      		echo "Message send successfully";
      	}else{
      		echo "not connected";
      	}
			

?>