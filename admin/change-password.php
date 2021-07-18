<?php 
    include 'config.php';
    include 'session.php'; 
?>
<!DOCTYPE HTML>
<html>

<?php include 'header.html'; ?>

<body>
    <div id="wrapper">
        <!-- Navigation -->
		<?php include 'navigation.php';?>
		<!-- /Navigation -->
        <div id="page-wrapper">
            <div class="graphs">
                <div class="xs">
                    <h3>Change Password</h3>

                    <div class="col-md-6">
                        <div class="issue-book">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    New Password
                                </div>
                                <div class="panel-body">
                                    <form  action="" method="post">

                                        <label>Current Password : </label>
                                        <input type="password" name="c_pswd" class="form-control1 control3" placeholder="Enter Current Password">

                                        <label>New Password : </label>
                                        <input type="password" name="n_pswd" class="form-control1 control3" placeholder="Enter New Password">
                                        
                                        <label>Confirm New Password : </label>
                                        <input type="password" name="cn_pswd" class="form-control1 control3" placeholder="Re-Type New Password">
                                        
        
                                        <hr>
                                        <input type="submit" name="change" class="btn-info btn" value="Change Password" />
                                        <input type="reset" name="reset" class="btn-danger btn" />

                                    </form>

                                    <?php
                                
                                        if (isset($_POST['change'])) {
                                            $old_pswrd = hash('sha256', $_POST['c_pswd']);
                                            $cnt_pswrd =  hash('sha256', $user['password']);
                                            $new_pswrd = hash('sha256', $_POST['n_pswd']);
                                            $cnf_pswrd = hash('sha256', $_POST['cn_pswd']);

                                            //$password= hash('sha256', $_POST['dob']);
                                    
                                            if ($old_pswrd==$cnt_pswrd & $new_pswrd==$cnf_pswrd) {
                                                $change = "UPDATE `admin` SET `password`='$new_pswrd' WHERE `userid`='$uid'";
                                                $sql = mysqli_query($connect, $change);
                                                echo '<meta http-equiv="refresh" content="0; url=profile.php">';
                                            } else {
                                                echo '<br>
                                                <div class="alert alert-danger m-5" role="alert">
                                                    <strong>Error!</strong> Wrong Crediantial(s).
                                                </div>';
                                                

                                            }
                                        }
                                    ?>


                                </div>
                            </div>
                        </div>
                    </div>
 

                    <div class="clearfix"> </div>
                </div>
                <!-- Site Footer -->
				<?php include 'footer.html';?>
    			<!-- Site Footer -->
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- Nav CSS -->
    <link href="css/custom.css" rel="stylesheet">
    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/metisMenu.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>