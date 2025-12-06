<?php include('include/header.php'); ?>

	<?php 
		$sql = "SELECT * FROM admin";
		$query = mysqli_query($con,$sql);
		$row = mysqli_fetch_assoc($query);
	?>

	 <div id="page-wrapper"><br><br>
    	<div class="container-fluid">
         	<div class="row">
         		<div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">User Page</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="sql/profile.php">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="name" class="form-label">Name</label>
                                        <input class="form-control" value="<?php echo $row['name'];?>" placeholder="Full Name" name="name" type="text" autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input class="form-control" value="<?php echo $row['email'];?>" placeholder="Email" name="email" type="text" autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label for="about" class="form-label">About</label>
                                        <textarea class="form-control" rows="4" name="about" placeholder="About"><?php echo $row['about'];?></textarea>
                                    </div>
                                    <label>
                                    	
                                    </label>

                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" name="about_update" class="btn btn-lg btn-success btn-block">Update Now</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
         	</div>
         </div>
     </div>

<?php include('include/footer.php'); ?>