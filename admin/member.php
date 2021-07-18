<?php 
    include 'config.php';
    include 'session.php'; 
?>
<?php
    $mbr_id = $_REQUEST['id'];
    // SQL query to select data from database 
    $sql1 = "SELECT * FROM members WHERE member_id='$mbr_id'"; 
    $result1 = $connect->query($sql1);

    $sql2 = "SELECT * FROM circulation JOIN `copies` on circulation.acc_id=copies.acc_id WHERE member_id='$mbr_id' AND status='Issued'"; 
    $result2 = $connect->query($sql2);
    
    $connect->close();
    $rows=$result1->fetch_assoc()
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
                    <h3>Member</h3>

                    <div class="col-md-3">
                        <div class="Add-Book">
                            <div class="panel panel-default">
                                
                                <div class="panel-body">
                                    <?php
                                        if ($rows['photo']>1) {
                                            echo '<img src="uploads/'. $rows['photo'].  '" width="100%" alt="no-image">';
                                        } else {
                                            echo '<img src="images/0.png" width="100%" alt="no-image">';
                                        }
                                    ?>
                                <!--<img src="" alt="no-image">-->
                            
                                </div>
                            </div>
                            <div class="mb-5 text-center">
                                <a href="upload-book-image.php?m_id=<?php echo $rows['member_id'];?>" class="btn btn-primary btn-block">Add/Change Images</a>
                                <?php if ($rows['member_type']=='Student') { ?>
                                    <a href="edit-member.php?reg_no=<?php echo $rows['member_id'];?>" title="Edit" class="btn btn-primary btn-block">Edit Student Details</a>
                                <?php   }   else if ($rows['member_type']=='Staff') { ?>
                                    <a href="edit-member.php?staff_id=<?php echo $rows['member_id'];?>" title="Edit" class="btn btn-primary btn-block">Edit Staff Details</a>
                                <?php   }   ?>
                                <br>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-9">
                        <!--Student-->
                        
                        <div class="Student-Detail">
                            <?php if ($rows['member_type']=='Student') { ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?php echo $rows['member_type'];?> - Details
                                </div>
                                <div class="panel-body">
                                
            
                                <ul>
                                    <li><b class="float-left">Register No</b> : <?php echo $rows['member_id'];?></li>
                                    <li><b class="float-left">Name</b> : <?php echo $rows['name'];?></li>
                                    <li><b class="float-left">Gender</b> : <?php echo $rows['gender'];?></li>
                                    <li><b class="float-left">Date of Birth</b> : <?php echo $rows['dob'];?></li>
                                    <li><b class="float-left">Department</b> : <?php echo $rows['program'];?> - <?php echo $rows['dept'];?></li>
                                    <li><b class="float-left">Mobile No</b> : <?php echo $rows['mobno'];?></li>
                                    <li><b class="float-left">Email ID</b> : <?php echo $rows['email'];?></li>
                                    <li><b class="float-left">Member Type</b> : <?php echo $rows['member_type'];?></li>
                                    <li><b class="float-left">Status</b> : <?php echo $rows['status'];?></li>
                                </ul>



                                </div>
                            </div>
                            <?php   }   ?>
                        </div>
                        

                        <!--Staff-->
                        <div class="Staff-Detail">
                            <?php if ($rows['member_type']=='Staff') { ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?php echo $rows['member_type'];?> - Details
                                </div>
                                <div class="panel-body">
                                
            
                                <ul>
                                    <li><b class="float-left">Staff ID</b> : <?php echo $rows['member_id'];?></li>
                                    <li><b class="float-left">Name</b> : <?php echo $rows['name'];?></li>
                                    <li><b class="float-left">Gender</b> : <?php echo $rows['gender'];?></li>
                                    <li><b class="float-left">Date of Birth</b> : <?php echo $rows['dob'];?></li>
                                    <li><b class="float-left">Department</b> : <?php echo $rows['dept'];?></li>
                                    <li><b class="float-left">Mobile No</b> : <?php echo $rows['mobno'];?></li>
                                    <li><b class="float-left">Email ID</b> : <?php echo $rows['email'];?></li>
                                    <li><b class="float-left">Member Type</b> : <?php echo $rows['member_type'];?></li>
                                    <li><b class="float-left">Staff Type</b> : <?php echo $rows['staff_type'];?></li>
                                </ul>



                                </div>
                            </div>
                            <?php   }   ?>
                        </div>
                    </div>




                    <div class="col-md-12">
                        <div class="Add-Book">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Issued Books
                                </div>
                                <div class="panel-body">
                                
            
                                <table class="table table-striped" id="dtBasic">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>ACC ID</th>
                                                <th>Book</th>
                                                <th>Issue Date</th>
                                                <th>Return Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                
                                            </tr>
                                        </thead>

                                        
                                        <tbody>
                                            <!-- PHP CODE TO FETCH DATA FROM ROWS--> 
                                            <?php   // LOOP TILL END OF DATA  
                                                while($rows=$result2->fetch_assoc()) 
                                                { 
                                            ?> 
                                            <tr>
                                                <th scope="row"><?php echo $rows['id'];?></th>
                                                <td><?php echo $rows['acc_id'];?></td>
                                                <td><?php echo $rows['book_id'];?></td>
                                                <td><?php echo $rows['i_date'];?></td>
                                                <td><?php echo $rows['r_date'];?></td>
                                                <td><?php echo $rows['status'];?></td>
                                                <td><a href="return-book.php?id=<?php echo $rows['id'];?>" title="Check In" class="btn btn-primary"><i class="fa fa-search"></i> </a></td>
                                                
                            
                                                
                                            </tr>
                                            <?php 
                                                } 
                                            ?>
                                            
                                        </tbody>
                                        
                                    </table>



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