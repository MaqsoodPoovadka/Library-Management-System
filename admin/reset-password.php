
<?php 
	include 'config.php'; 
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Library | Admin Login</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!----webfonts--->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
	<!---//webfonts--->
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</head>


<body id="login">
<div class="login-logo">
	<a href="index.php"><h1>GCK Library</h1></a>
</div>
	<h2 class="form-heading">Reset Password</h2>
    
    <form method="post" class="form-signin app-cam" action="#">
        <p>Enter your personal details below</p>
        <input type="text" name="uid" class="form-control1" placeholder="User ID" autofocus="" required>
        <input type="email" name="email" class="form-control1" placeholder="Email" autofocus="" required>
        <input type="text" name="mobno" class="form-control1" placeholder="Mobile Number" autofocus="" required>
        <input type="date" name="dob" class="form-control1" placeholder="Date of Birth" autofocus="" required>
      
	    <p> Enter your new password below</p>
        <input type="password" name="n_pswd" class="form-control1" placeholder="Password" required>
        <input type="password" name="cn_pswd" class="form-control1" placeholder="Re-type Password"required>
        <label class="checkbox-custom check-success">
            <input type="checkbox" value="agree this condition" id="checkbox1" required> <label for="checkbox1">I agree to the Terms of Service and Privacy Policy</label>
        </label>
        <button class="btn btn-lg btn-success1 btn-block" type="submit" name='reset'>Submit</button>
        <div class="registration">
            Know Password.
            <a class="" href="login.php">
                Login
            </a>
        </div>
        <?php
                                
        if (isset($_POST['reset'])) {
            $uid    = $_POST['uid'];
            $email  =  $_POST['email'];
            $mobno  =  $_POST['mobno'];
            $dob    =  $_POST['dob'];

            $new_pswrd = hash('sha256', $_POST['n_pswd']);
            $cnf_pswrd = hash('sha256', $_POST['cn_pswd']);

            //$password= hash('sha256', $_POST['dob']);
                                    
                if ($new_pswrd==$cnf_pswrd) {
                    $change = "UPDATE `admin` SET `password`='$new_pswrd' WHERE `userid`='$uid' AND `email_id`='$email' AND `mob_no`='$mobno' AND `dob`='$dob'";
                    $sql = mysqli_query($connect, $change);
                    
                    echo '<meta http-equiv="refresh" content="0; url=login.php">';
                } else {
                    echo '<br>
                        <div class="alert alert-danger m-5" role="alert">
                            <strong>Error!</strong> Wrong Crediantial(s).
                        </div>';
                                                
                }
            }
        ?>
    </form>

    
                                    
   <!-- Site Footer -->
	<?php include 'footer-login.html';?>
	<!-- Site Footer -->
</body>
</html>
