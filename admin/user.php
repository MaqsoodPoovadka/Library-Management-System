<?php 
    include 'config.php';
    include 'session.php'; 
    include 'admin-only.php';
?>
<?php
    $usrid = $_REQUEST['id'];
    // SQL query to select data from database 
    $sql = "SELECT * FROM admin WHERE userid='$usrid'"; 
    $result = $connect->query($sql);
    
    $connect->close();
    $rows=$result->fetch_assoc()
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
                    <?php
                     if ($uid==$usrid){
                         echo '<h3>Profile</h3>';
                     } else {
                         echo '<h3>User</h3>';
                     }

                    ?>
                    <!--h3>User</h3-->

                    

                    <div class="col-md-3">
                        <div class="Add-Book">
                            <div class="panel panel-default">
                                
                                <div class="panel-body">
                                    <?php
                                        if ($rows['photo']>1) {
                                            echo '<img src="uploads/user/'. $rows['photo'].  '" width="100%" alt="no-image">';
                                        } else {
                                            echo '<img src="images/0.png" width="100%" alt="no-image">';
                                        }
                                    ?>
                                <!--<img src="" alt="no-image">-->
                            
                                </div>
                            </div>
                            <div class="mb-5 text-center">
                                <a href="upload-book-image.php?uid=<?php echo $rows['userid'];?>" class="btn btn-primary btn-block">Add/Change Images</a>
                                <a href="edit-user.php?id=<?php echo $rows['userid'];?>" title="Edit" class="btn btn-primary btn-block">Edit User Details </a>
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
                                    <li><b class="float-left">Name</b> : <?php echo $rows['username'];?></li>
                                    <li><b class="float-left">User ID</b> : <?php echo $rows['userid'];?></li>
                                    <li><b class="float-left">Date of Birth</b> : <?php echo $rows['dob'];?></li>
                                    <li><b class="float-left">Gender</b> : <?php echo $rows['gender'];?></li>
                                    <li><b class="float-left">Role</b> : <?php echo $rows['designation'];?></li>
                                    <li><b class="float-left">Mobile No</b> : <?php echo $rows['mob_no'];?></li>
                                    <li><b class="float-left">Email ID</b> : <?php echo $rows['email_id'];?></li>
                                    <li><b class="float-left">Role</b> : <?php echo $rows['role'];?></li>
                                    <li><b class="float-left">Active</b> : <?php echo $rows['active'];?></li>
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