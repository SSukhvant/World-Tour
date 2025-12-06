<?php
	session_start();
	if(!isset($_SESSION['IS_ADMIN_LOGIN'])){
			header('location:login_reg.php');
	}
	
	unset($_SESSION['IS_ADMIN_LOGIN']);
	header('location:index');

?>