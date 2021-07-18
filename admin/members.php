
<?php 
    include 'config.php';
    include 'session.php';
?>

<?php
    // SQL query to select data from database 
    $stud_sql = "SELECT * FROM members WHERE member_type='Student' ORDER BY member_id DESC "; 
    $stud_res = $connect->query($stud_sql);
    $staffsql = "SELECT * FROM members WHERE member_type='Staff' ORDER BY member_id DESC "; 
    $staffres = $connect->query($staffsql); 
    $connect->close();  
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
                    <h3>Member Details</h3>
                    <div class="col-md-12">
                        <div class="students-details">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Members
                                </div>
                                <div class="panel-body">


                                    <div class="but_list-mt0">
                                        <div class="bs-example bs-example-tabs" role="tabpanel"
                                            data-example-id="togglable-tabs">
                                            <ul id="myTab" class="nav nav-tabs" role="tablist">
                                                    <!--Add 'class="Active"' if needed -->
                                                <li role="presentation" class="active"><a href="#student" role="tab" id="stud-tab"
                                                    data-toggle="tab" aria-controls="stud" aria-expanded="true">Students</a></li>
                                                <li role="presentation"><a href="#staff" role="tab" id="staff-tab"
                                                    data-toggle="tab" aria-controls="staff">Staffs</a></li>
                                                
                                            </ul>
                                            <div id="myTabContent" class="tab-content">

                                                <div role="tabpanel" class="tab-pane fade in active" id="student"
                                                    aria-labelledby="stud-tab">
                                                    <table class="table table-striped" id="studTable">
                                                        <thead>
                                                            <tr>
                                                
                                                                <th>Register No</th>
                                                                <th>Name</th>
                                                                <th>Department</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>

                                        
                                                        <tbody>
                                                            <!-- PHP CODE TO FETCH DATA FROM ROWS--> 
                                                            <?php   // LOOP TILL END OF DATA  
                                                                while($rows=$stud_res->fetch_assoc()) 
                                                                { 
                                                            ?> 
                                                            <tr>
                                                                <th scope="row"><?php echo $rows['member_id'];?></th>
                                                                <td><?php echo $rows['name'];?></td>
                                                                <td><?php echo $rows['dept'];?></td>
                                                                
                                                                <td><?php echo $rows['status'];?></td>
                                                                <td>
                                                                    <a href="member.php?id=<?php echo $rows['member_id'];?>" title="View" class="btn btn-primary"><i class="fa fa-search"></i> </a>
                                                                </td>
                                                            </tr>
                                                            <?php   }   ?> 
                                                        </tbody>
                                        
                                                    </table>

                                                </div>

                                                <div role="tabpanel" class="tab-pane fade" id="staff"
                                                    aria-labelledby="staff-tab">
                                                    <table class="table table-striped" id="staffTable">
                                                        <thead>
                                                            <tr>
                                                
                                                                <th>Staff ID</th>
                                                                <th>Name</th>
                                                                <th>Department</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>

                                        
                                                        <tbody>
                                                            <!-- PHP CODE TO FETCH DATA FROM ROWS--> 
                                                            <?php   // LOOP TILL END OF DATA  
                                                                while($rows=$staffres->fetch_assoc()) 
                                                                { 
                                                            ?> 
                                                            <tr>
                                                                <th scope="row"><?php echo $rows['member_id'];?></th>
                                                                <td><?php echo $rows['name'];?></td>
                                                                <td><?php echo $rows['dept'];?></td>
                                                                
                                                                <td><?php echo $rows['status'];?></td>
                                                                <td>
                                                                    <a href="member.php?id=<?php echo $rows['member_id'];?>" title="View" class="btn btn-primary"><i class="fa fa-search"></i> </a>
                                                                </td>
                                                            </tr>

                                                            <?php   }   ?> 

                                                        </tbody>
                                        
                                                    </table>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                

                            
                                    
                                </div>


                                


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
    <script>
        $(document).ready( function () {
        $('#studTable').DataTable();
        } );

        $('#staffTable').DataTable( {
            "order": [[ 0, "desc" ]]
        });
    </script>
</body>

</html>