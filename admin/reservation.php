<?php 
    include 'config.php';
    include 'session.php'; 
?>

<?php
    // SQL query to select data from database 
    $sql = "SELECT * FROM reservation ORDER BY r_id DESC "; 
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
                    <h3>Book Reservations</h3>
                    <div class="col-md-12">
                        <div class="book-details">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Reservation
                                </div>
                                <div class="panel-body">
                                

                            
                                                    <table class="table table-striped" id="resTable">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Book ID</th>
                                                                <th>Title</th>
                                                                <th>Member ID</th>
                                                                <th>Name</th>
                                                                <th>Reserved Date</th>
                                                                <th>Access ID</th>
                                                                <th>Issued Date</th>
                                                                <th>Status</th>
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
                                                                <th scope="row">
                                                                    <?php echo $rows['r_id'];?>
                                                                </th>
                                                                <th scope="row">
                                                                    <?php echo $rows['book_id'];?>
                                                                </th>
                                                                <td>
                                                                    <?php echo $rows['title'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['member_id'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['name'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['res_date'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['acc_id'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['isd_date'];?>
                                                                </td>
                                                        
                                                                <td>
                                                                    <?php echo $rows['status'];?>
                                                                </td>

                                                                <td><!--<a href="reserve.php?id=<?php echo $rows['r_id'];?>" title="Check Out"
                                                                        class="btn btn-primary"><i
                                                                            class="fa fa-search">res</i> </a>-->
                                                                    
                                                                    
                                                                    <?php 
                                                                        if ($rows['status']=='Requested') { 
                                                                            echo '<a href="reserve.php?id='. $rows['r_id'].'" title="View"
                                                                            class="btn btn-primary"><i
                                                                            class="fa fa-search"></i> Allote</a>';
                                                                        } else if ($rows['status']=='Reserved') {
                                                                            echo '<a href="issue-res-book.php?r_id='. $rows['r_id'].'" title="View"
                                                                            class="btn btn-primary"><i
                                                                            class="fa fa-search"></i> Issue</a> ';
                                                                        } 
                                                                         ?>

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
        $('#resTable').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
        } );
    </script>
</body>

</html>