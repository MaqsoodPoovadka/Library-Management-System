
<?php
    include 'config.php'; 
    include 'session.php';
    include 'admin-only.php';
?>

<?php
    // SQL query to select data from database 
    $sql = "SELECT * FROM admin ORDER BY userid DESC "; 
    $result = $connect->query($sql); 
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
                    <h3>Users Details</h3>
                    <div class="col-md-12">
                        <div class="students-details">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Librarians
                                    <button type="button" class="btn btn-primary float-right" onclick="location.href='add-user.php';">
                                        Add New User
                                    </button>
                                </div>
                                <div class="panel-body">
                                

                            
                                    <table class="table table-striped" id="user">
                                        <thead>
                                            <tr>
                                                
                                                <th>ID</th>
                                                <th>User ID</th>
                                                <th>User Name</th>
                                                <th>Designation</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Active</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        
                                        <tbody>
                                            <!-- PHP CODE TO FETCH DATA FROM ROWS--> 
                                            <?php   // LOOP TILL END OF DATA  
                                                while($rows=$result->fetch_assoc()) 
                                                { 
                                            ?> 
                                            <tr>
                                                <th scope="row"><?php echo $rows['id'];?></th>
                                                
                                                <td><?php echo $rows['userid'];?></td>
                                                
                                                <td><?php echo $rows['username'];?></td>
                                                <td><?php echo $rows['designation'];?></td>
                                                <td><?php echo $rows['mob_no'];?></td>
                                                <td><?php echo $rows['email_id'];?></td>
                                                <td><?php echo $rows['role'];?></td>
                                                <td><?php echo $rows['active'];?></td>
                                                <td>
                                                    <a href="user.php?id=<?php echo $rows['userid'];?>" title="View" class="btn btn-primary"><i class="fa fa-search"></i> </a>
                                                </td>
                                                
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
        $('#user').DataTable();
        } );
    </script>
</body>

</html>