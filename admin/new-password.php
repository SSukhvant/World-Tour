<?php 
    include("include/connectDB.php");
    $con = connectDB();
    session_start();
    if(isset($_POST['new_password'])){
        $password = $_POST['password'];
        
        $sql = "UPDATE admin SET password = '$password'";
        
        $result = mysqli_query($con,$sql);
        
        if($result){
            $_SESSION['IS_ADMIN_LOGIN'] = true;
            header('location:dashboard.php');
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Password</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.5.2/metisMenu.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/3.3.7/css/sb-admin-2.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/416491/timeline.css">
    <link rel="stylesheet" type="text/css" href="assets/css/index.css">

  </head>
  <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Enter New Password</h3>
                            <p style="color:red;"><?php echo $msg;?></p>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="*******" name="password" type="password" autofocus>
                                    </div>

                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" name="new_password" class="btn btn-lg btn-success btn-block">Change Now</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>