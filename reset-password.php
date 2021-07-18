<?php
    include("admin/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<?php 
	$h_title = 'Reset Password';
	include 'head.html';
 ?>

<body>
                <div class="agileinfo-ads-display">
					
						<!--Horizontal Tab-->
                        <!--h1 class="col-md-12 text-center font-weight-bold">LOGIN</h1-->
				    <div class="resp-tabs-container d-flex justify-content-center">

                                                            
					    <div class="resp-tab-content col-lg-6 my-5 mx-2" style="display: block;">
                            <h2 class="text-center font-weight-bold font-italic"><u> Reset Password </u></h2>
                            <div>
							    <form action="#" method="post" class="creditly-card-form agileinfo_form">
                                                            <div class="controls mt-3">
																<label class="control-label">User ID </label>
                                                                <input type="text" class="form-control" name="userid" placeholder="UserID" required />
															</div>

                                                            <div class="controls mt-3">
																<label class="control-label">Member Type </label>
                                                                <select type="text" class="form-control" name="mtype" required >
                                                                    <option disabled selected>-- Select Member Type --</option>
                                                                    <option>Student</option>
                                                                    <option>Staff</option>
                                                                </select>
															</div>
															
															<div class="controls mt-3">
																<label class="control-label">Email</label>
                                                                <input type="email" class="form-control" name="email" placeholder="Email" required />
															</div>
                                                            <div class="controls mt-3">
																<label class="control-label">Date of Birth</label>
                                                                <input type="date" class="form-control" name="dob" required />
															</div>

                                                            <hr>

                                                            <div class="controls mt-3">
																<label class="control-label">New Password </label>
                                                                <input type="password" class="form-control" name="n_pswd" placeholder="Type Password" required />
															</div>

                                                            <div class="controls mt-3">
																<label class="control-label">Confirm Password </label>
                                                                <input type="password" class="form-control" name="cn_pswd" placeholder="Re-type Password" required />
															</div>
                                                            <div class="number-paymk">
                                                                <input type="submit" class="submit" name="reset" value="Reset Password">
															</div>

                                                            <?php
                                
                                                                if (isset($_POST['reset'])) {
                                                                    $mrid   = $_POST['userid'];
                                                                    $mtype  =  $_POST['mtype'];
                                                                    $email  =  $_POST['email'];
                                                                    $dob    =  $_POST['dob'];

                                                                    $new_pswrd = $_POST['n_pswd'];
                                                                    $cnf_pswrd = $_POST['cn_pswd'];
                                    
                                                                    if ($new_pswrd==$cnf_pswrd) {
                                                                        $change = "UPDATE `members` SET `password`='$new_pswrd' WHERE `member_id`='$mrid' AND `email`='$email' AND `member_type`='$mtype' AND `dob`='$dob'";
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

						    </div>
						</div>
								
					</div>
						
						
						

				</div>
    
    
    
                <!-- easy-responsive-tabs -->
    <link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
	<script src="js/easyResponsiveTabs.js"></script>

</body>
</html>