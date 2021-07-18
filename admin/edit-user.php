<?php
	include "config.php";
	include "session.php";
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
                    <h3>Edit</h3>
                    <div class="col-md-8">
                        <div class="Add-Student">
                            <?php
                                if (isset($_GET['id'])) {
                                    $usr_id =$_GET['id'];
                                    // SQL query to select data from database 
                                    $sqlusr = "SELECT * FROM admin WHERE userid='$usr_id' "; 
                                    $result = mysqli_query($connect, $sqlusr);
                                    $ru=mysqli_fetch_assoc($result);
                                

                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit User
                                </div>
                                <div class="panel-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                    <label>User ID : </label>
                                    <input type="text" class="form-control1 control3" name="userid" value="<?php echo $ru['userid'];?>" readonly>
                                    <label>Name : </label>
                                    <input type="text" class="form-control1 control3" name="username" value="<?php echo $ru['username'];?>">
                                    <label>Designation : </label>
                                    <input type="text" class="form-control1 control3" name="desgn" value="<?php echo $ru['designation'];?>">

                                    <label>Gender : </label>
									<select name="gender" id="gender" class="form-control1 control3">
                                        <option selected><?php echo $ru['gender'];?></option>
                                        <option disabled></option>
                                        <option>Female</option>
										<option>Male</option>
										<option>Others</option>
									</select>

                                    <label>Date of Birth : </label>
                                    <input type="date" class="form-control1 control3" name="dob" value="<?php echo $ru['dob'];?>">
                                    
                                    <label>Mobile Number : </label>
                                    <input type="tel" class="form-control1 control3" name="mobno" value="<?php echo $ru['mob_no'];?>">
                                    <label>Email Id : </label>
                                    <input type="email" class="form-control1 control3" name="email" value="<?php echo $ru['email_id'];?>">

                                    <label>Role : </label>
                                    <select name="role" id="role" class="form-control1 control3">
                                        <option selected><?php echo $ru['role'];?></option>
                                        <option disabled></option>
                                        <option>User</option>
										<option>Admin</option>
										<option>Other</option>
									</select>

                                    <label>Active : </label>
                                    <select name="active" id="active" class="form-control1 control3">
                                        <option selected><?php echo $ru['active'];?></option>
                                        <option disabled></option>
                                        <option>Yes</option>
										<option>No</option>
									</select>
                
            
                                    <hr>
                                    <input type="submit" name="edit" class="btn-success btn" value="Submit" />
                                    <input type="cancel" name="cancle" class="btn-info btn" value="Cancel" />
                                    <input type="reset" name="reset" class="btn-danger btn" />
                                    <!--<button class="btn-success btn">Submit</button>
                                    <button class="btn-info btn">Cancel</button>
                                    <button class="btn-danger btn">Reset</button>-->
                                </form>


                                <?php
                                    if (isset($_POST['edit'])) {
                                        $usrid  = $_POST['userid'];
                                        $name   = $_POST['username'];
                                        $desgn  = $_POST['desgn'];
                                        $gender = $_POST['gender'];
                                        $dob    = $_POST['dob'];
                                        
                                        $mobno  = $_POST['mobno'];
                                        $email  = $_POST['email'];
                                        
                                        $role   = $_POST['role'];
                                        $active = $_POST['active'];

                                        
                                        
    
                                        $edit = "UPDATE admin SET username='$name', gender='$gender', dob='$dob', designation='$desgn', role='$role', mob_no='$mobno', email_id='$email', active='$active' WHERE userid='$usrid'";
                                        $sql = mysqli_query($connect, $edit);
                                        


                                        echo '<meta http-equiv="refresh" content="0; url=user.php?id='.$usrid.'">';
                                    }
                                ?>


                                </div>
                            </div>
                            <?php   }   ?>
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