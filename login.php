<?php
    include("admin/config.php");
    session_start();
    if (isset($_SESSION['sec-userid'])) {
        $userid = $_SESSION['sec-userid'];
        $ses_sql = mysqli_query($connect, "SELECT * FROM `members` WHERE member_id='$userid'");
        $count = mysqli_num_rows($ses_sql);
        if ($count > 0) {
            echo '<meta http-equiv="refresh" content="0; url=index.php" />';
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<?php 
	$h_title = 'Login';
	include 'head.html';
 ?>

<body>
                <div class="agileinfo-ads-display">
					
						<!--Horizontal Tab-->
                        <!--h1 class="col-md-12 text-center font-weight-bold">LOGIN</h1-->
							<div class="resp-tabs-container d-flex justify-content-center">

                                                            
									<div class="resp-tab-content col-lg-6 my-5 mx-2" style="display: block;">
										
                                        <div class="row">
											<div class="col-md-6">
                                                    <a href="index.php" class="font-weight-bold font-italic">
                                                        <img src="images/library-logo.jpg" width=80px alt=" " class="img-fluid"> 
                                                        <h2 class="text-left"> GCK Library </h2>
                                                    </a>
                                                
												<p>Welcome to Government College Kasaragod, General Library Portal </p>
												<a href="admin" class="btn btn-primary mt-4">Admin Login</a>
											</div>
											<div class="col-md-6">
												<form action="#" method="post">
													
															<div class="controls mt-3">
																<label class="control-label">User ID </label>
                                                                <input type="text" class="form-control" name="userid" placeholder="UserID" required />
															</div>
															
															<div class="controls mt-3">
																<label class="control-label">Password</label>
                                                                <input type="password" class="form-control" name="password" placeholder="Password" required />
															</div>
															
                                                            <div class="number-paymk">
                                                                <input type="submit" class="submit" name="login" value="Login">
															</div>
												</form>
												<p><a class="" href="reset-password.php">Forgot Password</a></p>
                                                <?php
                                          	        if (isset($_POST['login'])) {
                                                	    $userid = mysqli_real_escape_string($connect, $_POST['userid']);
                                    	            	//$password = hash('sha256', $_POST['password']);
                                            		    $password = $_POST['password'];
                                		                $result   = mysqli_query($connect, "SELECT * FROM members WHERE member_id = '$userid' and password = '$password'");

                                                        if (mysqli_num_rows($result) > 0) {
                                                           	$_SESSION['sec-userid'] = $userid;
                                             		        echo '<meta http-equiv="refresh" content="0;url=index.php">';
                                             		    } else {
  			                                                echo '<br />
			                                                <div class="alert alert-danger">
    			                                                <i class="fa fa-exclamation-circle"></i> The entered <strong>UserID</strong> or <strong>Password</strong> is incorrect.
  			                                                </div>';
		                                                }
	                                                }
                                                ?>
											</div>
										</div>
									</div>
								
							</div>
						
						
						

				</div>
    
    
    
                <!-- easy-responsive-tabs -->
    <link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
	<script src="js/easyResponsiveTabs.js"></script>

</body>
</html>