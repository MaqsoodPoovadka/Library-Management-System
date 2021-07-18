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

                        <!--Student-->
                        <div class="Edit-Student">
                            <?php
                                if (isset($_GET['reg_no'])) {
                                    $reg_no =$_GET['reg_no'];
                                    // SQL query to select data from database 
                                    $sqlstd = "SELECT * FROM members WHERE member_id='$reg_no' AND member_type='Student' "; 
                                    $result = mysqli_query($connect, $sqlstd);
                                    $std=mysqli_fetch_assoc($result);
                                

                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Student
                                </div>
                                <div class="panel-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                    <label>Register Number : </label>
                                    <input type="text" class="form-control1 control3" name="reg_no" value="<?php echo $std['member_id'];?>" readonly>
                                    <label>Name : </label>
                                    <input type="text" class="form-control1 control3" name="name" value="<?php echo $std['name'];?>">

                                    <label>Gender : </label>
									<select name="gender" id="gender" class="form-control1 control3">
                                        <option selected><?php echo $std['gender'];?></option>
                                        <option disabled></option>
                                        <option>Female</option>
										<option>Male</option>
										<option>Others</option>
									</select>

                                    <label>Date of Birth : </label>
                                    <input type="date" class="form-control1 control3" name="dob" value="<?php echo $std['dob'];?>">

                                    <label>Program : </label>
                                    <select id="prog" class="form-control1 control3" name="prog">
                                        <option selected><?php echo $std['program'];?></option>
                                        <option disabled></option>
                                        <option value="UG">Degree (UG)</option>
										<option value="PG">Post Graduation (PG)</option>
										<option value="PhD">PhD/Research Scholar</option>
                                    </select>


                                    <label>Department : </label>
                                    <select id="dept" class="form-control1 control3" name="dept">
                                        <option selected><?php echo $std['dept'];?></option>
                                        <option disabled></option>
                                        
                                        <optgroup label="Arts">
                                            <option>Arabic</option>
	    									<option>Economics</option>
		    								<option>English</option>
                                            <option>Hindi</option>
                                            <option>History</option>
                                            <option>Kannada</option>
                                            <option>Malayalam</option>
                                            <option disabled>Political Science</option>
                                            <option disabled>Sanskrit</option>
                                        </optgroup>
                                        <optgroup label="Science">
                                            <option>Botany</option>
                                            <option>Chemistry</option>
                                            <option>Computer Science</option>
                                            <option>Geology</option>
                                            <option>Mathematics</option>
                                            <option>Physics</option>
                                            <option disabled>Statistics</option>
                                            <option>Zoology</option>
                                        </optgroup>
                                            <option>Commerce</option>
                                            <option disabled>Physical Education</option>
                                    </select>
                                    
                                    <label>Mobile Number : </label>
                                    <input type="tel" class="form-control1 control3" name="mobno" value="<?php echo $std['mobno'];?>">

                                    <label>Email Id : </label>
                                    <input type="email" class="form-control1 control3" name="email" value="<?php echo $std['email'];?>">

                                    <label>Active : </label>
                                    <select name="status" id="status" class="form-control1 control3">
                                        <option selected><?php echo $std['status'];?></option>
                                        <option disabled></option>
                                        <option>Active</option>
										<option>Deactive</option>
									</select>
                
            
                                    <hr>
                                    <input type="submit" name="edit" class="btn-info btn" value="Submit" />
                                    <input type="reset" name="reset" class="btn-danger btn" />
                                    <!--<button class="btn-success btn">Submit</button>
                                    <button class="btn-info btn">Cancel</button>
                                    <button class="btn-danger btn">Reset</button>-->
                                </form>


                                <?php
                                    if (isset($_POST['edit'])) {
                                        $reg_no = $_POST['reg_no'];
                                        $name   = $_POST['name'];
                                        $gender = $_POST['gender'];
                                        $dob    = $_POST['dob'];
                                        $prog   = $_POST['prog'];
                                        $dept   = $_POST['dept'];
                                        $mobno  = $_POST['mobno'];
                                        $email  = $_POST['email'];
                                        $status = $_POST['status'];

                                        
                                        
    
                                        $edit = "UPDATE members SET name='$name', gender='$gender', dob='$dob', program='$prog', dept='$dept', mobno='$mobno', email='$email', status='$status' WHERE member_id='$reg_no'";
                                        $sql = mysqli_query($connect, $edit);
                                        


                                        echo '<meta http-equiv="refresh" content="0; url=member.php?id='.$reg_no.'">';
                                    }
                                ?>


                                </div>
                            </div>
                            <?php   }   ?>
                        </div>

                        <!--Student-->
                        <div class="Edit-Staff">
                            <?php
                                if (isset($_GET['staff_id'])) {
                                    $staff_id =$_GET['staff_id'];
                                    // SQL query to select data from database 
                                    $sqlstf = "SELECT * FROM members WHERE member_id='$staff_id' AND member_type='Staff' "; 
                                    $result = mysqli_query($connect, $sqlstf);
                                    $stf=mysqli_fetch_assoc($result);
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Staff
                                </div>
                                <div class="panel-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                    <label>Staff ID : </label>
                                    <input type="text" class="form-control1 control3" name="staff_id" value="<?php echo $stf['member_id'];?>" readonly>
                                    
                                    <label>Name : </label>
                                    <input type="text" class="form-control1 control3" name="name" value="<?php echo $stf['name'];?>">

                                    <label>Gender : </label>
									<select name="gender" id="gender" class="form-control1 control3">
                                        <option selected><?php echo $stf['gender'];?></option>
                                        <option disabled></option>
                                        <option>Female</option>
										<option>Male</option>
										<option>Others</option>
									</select>

                                    <label>Date of Birth : </label>
                                    <input type="date" class="form-control1 control3" name="dob" value="<?php echo $stf['dob'];?>">

                                    <label>Staff Type : </label>
                                    <select id="stype" class="form-control1 control3" name="stype">
                                        <option selected><?php echo $stf['staff_type'];?></option>
                                        <option disabled></option>
                                        <option>Teaching Staff</option>
										<option>Non Teaching Staff</option>
                                    </select>

                                    <label>Department : </label>
                                    <select id="dept" class="form-control1 control3" name="dept">
                                        <option selected><?php echo $stf['dept'];?></option>
                                        <option disabled></option>

                                        <optgroup label="Arts">
                                            <option>Arabic</option>
	    									<option>Economics</option>
		    								<option>English</option>
                                            <option>Hindi</option>
                                            <option>History</option>
                                            <option>Kannada</option>
                                            <option>Malayalam</option>
                                            <option>Political Science</option>
                                            <option>Sanskrit</option>
                                        </optgroup>
                                        <optgroup label="Science">
                                            <option>Botany</option>
                                            <option>Chemistry</option>
                                            <option>Computer Science</option>
                                            <option>Geology</option>
                                            <option>Mathematics</option>
                                            <option>Physics</option>
                                            <option>Statistics</option>
                                            <option>Zoology</option>
                                        </optgroup>
                                            <option>Commerce</option>
                                            <option>Physical Education</option>
                                    </select>

                                    <label>Designation : </label>
                                    <input type="text" class="form-control1 control3" name="email" value="<?php echo $stf['designation'];?>">
                                    
                                    <label>Mobile Number : </label>
                                    <input type="tel" class="form-control1 control3" name="mobno" value="<?php echo $stf['mobno'];?>">

                                    <label>Email Id : </label>
                                    <input type="email" class="form-control1 control3" name="email" value="<?php echo $stf['email'];?>">

                                    <label>Active : </label>
                                    <select name="status" id="status" class="form-control1 control3">
                                        <option selected><?php echo $stf['status'];?></option>
                                        <option disabled></option>
                                        <option>Active</option>
										<option>Deactive</option>
									</select>
                
            
                                    <hr>
                                    <input type="submit" name="edit" class="btn-info btn" value="Submit" />
                                    <input type="reset" name="reset" class="btn-danger btn" />
                                    <!--<button class="btn-success btn">Submit</button>
                                    <button class="btn-info btn">Cancel</button>
                                    <button class="btn-danger btn">Reset</button>-->
                                </form>


                                <?php
                                    if (isset($_POST['edit'])) {
                                        $staff_id= $_POST['staff_id'];
                                        $name   = $_POST['name'];
                                        $gender = $_POST['gender'];
                                        $dob    = $_POST['dob'];
                                        $stype  = $_POST['stype'];
                                        $dept   = $_POST['dept'];
                                        $mobno  = $_POST['mobno'];
                                        $email  = $_POST['email'];
                                        $status = $_POST['status'];

                                        
                                        
    
                                        $edit = "UPDATE members SET name='$name', gender='$gender', dob='$dob', staff_type='$stype', dept='$dept', mobno='$mobno', email='$email', status='$status' WHERE member_id='$staff_id'";
                                        $sql = mysqli_query($connect, $edit);
                                        


                                        echo '<meta http-equiv="refresh" content="0; url=member.php?id='.$staff_id.'">';
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