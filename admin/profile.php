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
                    
                    <h3>Profile</h3>

                    

                    <div class="col-md-3">
                        <div class="Add-Book">
                            <div class="panel panel-default">
                                
                                <div class="panel-body">
                                    <?php
                                        if ($user['photo']>1) {
                                            echo '<img src="uploads/user/'. $user['photo'].  '" width="100%" alt="no-image">';
                                        } else {
                                            echo '<img src="images/0.png" width="100%" alt="no-image">';
                                        }
                                    ?>
                                <!--<img src="" alt="no-image">-->
                            
                                </div>
                            </div>
                            <div class="mb-5 text-center">
            
                                <a href="change-password.php" title="Edit" class="btn btn-primary btn-block">Change Password </a>
                                <br>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-9">
                        <div class="Add-Book">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Details
                                </div>
                                <div class="panel-body">
                                
            
                                <ul>
                                    <li><b class="float-left">Name</b> : <?php echo $user['username'];?></li>
                                    <li><b class="float-left">User ID</b> : <?php echo $user['userid'];?></li>
                                    <li><b class="float-left">Date of Birth</b> : <?php echo $user['dob'];?></li>
                                    <li><b class="float-left">Gender</b> : <?php echo $user['gender'];?></li>
                                    <li><b class="float-left">Role</b> : <?php echo $user['designation'];?></li>
                                    <li><b class="float-left">Mobile No</b> : <?php echo $user['mob_no'];?></li>
                                    <li><b class="float-left">Email ID</b> : <?php echo $user['email_id'];?></li>
                                    <li><b class="float-left">Role</b> : <?php echo $user['role'];?></li>
                                    <li><b class="float-left">Active</b> : <?php echo $user['active'];?></li>
                                    

                                </ul>
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