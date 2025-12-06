<?php
    include("include/connectDB.php");
    $con = connectDB();
    session_start();
    $msg = "";
    
    $profile_sql = "SELECT * FROM admin";
    $profile_query = mysqli_query($con, $profile_sql);
    $profile_row = mysqli_fetch_assoc($profile_query);
    
    $profile_email = $profile_row['email'];
    
    if (isset($_POST['forgot_password'])) {
        $email = $_POST['email'];
    
        if ($email != $profile_email) {
            $msg = "Your Email is incorrect";
        } else {
            $otp = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            $to = $profile_email;
            $subject = "Your verification OTP";
            $txt = "Your verification OTP is $otp. Please don't share this OTP with anyone.";
            $headers = "From: info@worldtour4u.in";
    
            if (mail($to, $subject, $txt, $headers)) {
                $_SESSION['otp'] = $otp;
                header("Location: forgot-otp.php");
                exit;
            } else {
                $msg = "Email send failed";
            }
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password</title>
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
                            <h3 class="panel-title">Enter Your Email</h3>
                            <p style="color:red;"><?php echo $msg;?></p>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                <fieldset>
                                    <div class="form-group">
                                        <input required class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    </div>

                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" name="forgot_password" class="btn btn-lg btn-success btn-block">Send OTP</button>
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
