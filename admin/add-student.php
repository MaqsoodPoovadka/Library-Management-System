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
                    <h3>New Student</h3>
                    <div class="col-md-8">
                        <div class="Add-Student">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Add New Student
                                </div>
                                <div class="panel-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                    <label>Register No : </label>
                                    <input type="text" class="form-control1 control3" name="reg_no" required>
                                    <label>Name : </label>
                                    <input type="text" class="form-control1 control3" name="name" required>


                                    <label>Gender : </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><input type="radio" name="gender" id="female" value="Female"></div>
                                            <input type="text" class="form-control1" value="Female" disabled>

                                        <div class="input-group-addon"><input type="radio" name="gender" id="male" value="Male"></div>
                                            <input type="text" class="form-control1" value="Male" disabled>

                                        <div class="input-group-addon"><input type="radio" name="gender" id="others" value="Others"></div>
                                            <input type="text" class="form-control1" value="Others" disabled>
								    </div>
                                        
									
                                    
                                    <label>Date of Birth : </label>
                                    <input type="date" class="form-control1 control3" name="dob" required>
                                    
                                    <label>Program : </label>
                                    <select id="prog" class="form-control1 control3" name="prog" required>
                                        <option value="" disabled selected>Program</option>
                                        <option value="UG">Degree</option>
										<option value="PG">Post Graduation</option>
										<option value="PhD">PhD/Research Scholar</option>
                                    </select>
                                    
                                    <label>Department : </label>
                                    <select id="dept" class="form-control1 control3" name="dept" required>
                                        <option value="" disabled selected>Department</option>
                                        
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
                                    <input type="tel" class="form-control1 control3" name="mobno" required>
                                    <label>Email Id : </label>
                                    <input type="email" class="form-control1 control3" name="email" required>
                                    
                                    <label for="img_upload">Student Photo</label>
                                    <input type="file" name="img_upload" id="img_upload">
                                    <p class="help-block">Upload Student Profile photo</p>
                
            
                                    <hr>
                                    <input type="submit" name="add" class="btn-success btn" value="Add Student" />
                                    <input type="cancel" name="cancle" class="btn-info btn" value="Cancel" />
                                    <input type="reset" name="reset" class="btn-danger btn" />
                                    <!--<button class="btn-success btn">Submit</button>
                                    <button class="btn-info btn">Cancel</button>
                                    <button class="btn-danger btn">Reset</button>-->
                                </form>


                                <?php
                                    if (isset($_POST['add'])) {
                                        $reg_no = $_POST['reg_no'];
                                        $name   = $_POST['name'];
                                        $gender = $_POST['gender'];
                                        $dob    = $_POST['dob'];
                                        $prog   = $_POST['prog'];
                                        $dept   = $_POST['dept'];
                                        $mobno  = $_POST['mobno'];
                                        $email  = $_POST['email'];
                                        $password= $_POST['dob'];
                                        

                                        $msg        = "";
                                        $stud_img   = $_FILES["img_upload"]["name"]; 
                                        $tempname   = $_FILES["img_upload"]["tmp_name"];     
                                            $folder = "uploads/".$stud_img;
                                        
    
                                        $add = "INSERT INTO `members`(`member_id`, `name`, `photo`, `gender`, `dob`, `program`, `dept`, `mobno`, `email`, `status`, `password`, `member_type`) VALUES ('$reg_no','$name','$stud_img','$gender','$dob','$prog','$dept','$mobno','$email','Active','$password', 'Student')";
                                        $sql = mysqli_query($connect, $add);
                                        if (move_uploaded_file($tempname, $folder))  { 
                                            $msg = "Image uploaded successfully"; 
                                        }else{ 
                                            $msg = "Failed to upload image"; 
                                        }

                                        //$mail = "You are registered";
                                        //mail("maqsoodpoovadka@gmail.com","Test",$mail);

                                        echo '<meta http-equiv="refresh" content="0; url=members.php">';
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