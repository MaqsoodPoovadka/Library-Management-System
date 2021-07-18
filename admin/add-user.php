<?php
	include "config.php";
	include "session.php";
    include "admin-only.php";
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
                    <h3>New User</h3>
                    <div class="col-md-8">
                        <div class="Add-Student">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Add New User
                                </div>
                                <div class="panel-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                    <label>User ID : </label>
                                    <input type="text" class="form-control1 control3" name="userid" required>
                                    <label>Name : </label>
                                    <input type="text" class="form-control1 control3" name="username" required>
                                    <label>Designation : </label>
                                    <input type="text" class="form-control1 control3" name="desgn" id="desgn">

                                    <label>Gender : </label>
									<select name="gender" id="gender" class="form-control1 control3" required>
                                        <option value="" disabled selected>Select you gender</option>
                                        <option>Female</option>
										<option>Male</option>
										<option>Others</option>
									</select>

                                    <label>Date of Birth : </label>
                                    <input type="date" class="form-control1 control3" name="dob" required>
                                    
                                    <label>Mobile Number : </label>
                                    <input type="tel" class="form-control1 control3" name="mobno" required>
                                    <label>Email Id : </label>
                                    <input type="email" class="form-control1 control3" name="email" required>

                                    <label>Role : </label>
                                    <select name="role" id="role" class="form-control1 control3" required>
                                        <option value="" disabled selected>Select you gender</option>
                                        <option selected>User</option>
										<option>Admin</option>
										<option>Other</option>
									</select>

                                    <label for="img_upload">User Photo</label>
                                    <input type="file" name="img_upload" id="img_upload">
                                    <p class="help-block">Upload Staff Profile photo</p>
                
            
                                    <hr>
                                    <input type="submit" name="add" class="btn-success btn" value="Add Staff" />
                                    <input type="cancel" name="cancle" class="btn-info btn" value="Cancel" />
                                    <input type="reset" name="reset" class="btn-danger btn" />
                                    <!--<button class="btn-success btn">Submit</button>
                                    <button class="btn-info btn">Cancel</button>
                                    <button class="btn-danger btn">Reset</button>-->
                                </form>


                                <?php
                                    if (isset($_POST['add'])) {
                                        $usrid = $_POST['userid'];
                                        $name   = $_POST['username'];
                                        $desgn  = $_POST['desgn'];
                                        $gender = $_POST['gender'];
                                        $dob    = $_POST['dob'];
                                        
                                        $mobno  = $_POST['mobno'];
                                        $email  = $_POST['email'];
                                        //$password= $_POST['dob'];
                                        $password= hash('sha256', $_POST['dob']);
                                        $role  = $_POST['role'];

                                        
                                        

                                        $msg        = "";
                                        $user_img   = $_FILES["img_upload"]["name"]; 
                                        $tempname   = $_FILES["img_upload"]["tmp_name"];     
                                            $folder = "uploads/user/".$user_img;
                                        
    
                                        $add = "INSERT INTO `admin`(`userid`, `username`, `photo`, `gender`, `dob`, `designation`, `role`, `mob_no`, `email_id`, `active`, `password`) VALUES ('$usrid','$name','$user_img','$gender','$dob','$desgn','$role','$mobno','$email','Yes','$password')";
                                        $sql = mysqli_query($connect, $add);
                                        if (move_uploaded_file($tempname, $folder))  { 
                                            $msg = "Image uploaded successfully"; 
                                        }else{ 
                                            $msg = "Failed to upload image"; 
                                        }

                                        //$mail = "You are registered";
                                        //mail("maqsoodpoovadka@gmail.com","Test",$mail);

                                        echo '<meta http-equiv="refresh" content="0; url=users.php">';
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