<?php
//include "overdue.php";
include "config.php";

session_start();

/*if (isset($_SESSION['sec-username'])) {
    $uname = $_SESSION['sec-username'];
    $usql = mysqli_query($connect, "SELECT * FROM `admin` WHERE username='$uname' ");
    $count = mysqli_num_rows($usql);
    if ($count > 0) {
        echo '<meta http-equiv="refresh" content="0; url=index.php" />';
        exit;
    }
}*/


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
	<h2 class="form-heading">Admin login</h2>
	<div class="app-cam">
		<form method="post">
			<input type="text" class="text" name="uid" placeholder="UserID" required />
			<input type="password" class="text" name="password" placeholder="Password" required />


			<!--<input type="text" class="text" value="UserID" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';}">
				<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">-->

			<div class="submit"><input type="submit" name="signin" value="Login"></div>

			<ul class="new">
				<li class="new_left">
					<p><a href="reset-password.php">Forgot Password ?</a></p>
				</li>
				<li class="new_right">
					<p class="sign">Member<a href="../login.php"> LogIn ?</a></p>
				</li>
				<div class="clearfix"></div>
			</ul>
		</form>


		<?php
			if (isset($_POST['signin'])) {
    			$uid = mysqli_real_escape_string($connect, $_POST['uid']);
    			$password = hash('sha256', $_POST['password']);
				//$password = $_POST['password'];
    			$check    = mysqli_query($connect, "SELECT userid, password FROM `admin` WHERE `userid`='$uid' AND password='$password' AND active='Yes'");
    			
				if (mysqli_num_rows($check) > 0) {
        			$_SESSION['sec-user'] = $uid;
        			echo '<meta http-equiv="refresh" content="0;url=index.php">';
    			} else {
        			echo '<br />
					<div class="alert alert-danger">
              			<i class="fa fa-exclamation-circle"></i> The entered <strong>User ID</strong> or <strong>Password</strong> is incorrect.
        			</div>';
    			}
			}
		?>

		
	</div>
	<!-- Site Footer -->
	<?php include 'footer-login.html';?>
	<!-- Site Footer -->
</body>

</html>