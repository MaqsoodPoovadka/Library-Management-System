
<?php include 'config.php'; 
include 'session.php';
?>

<?php
    // SQL query to select data from database 
    $sql = "SELECT * FROM books ORDER BY book_id DESC "; 
    $result = $connect->query($sql); 
    //$connect->close();  
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
                    <h3>Book Catalogue</h3>
                    <div class="col-md-12">
                        <div class="book-details">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Books
                                </div>
                                <div class="panel-body">
                                

                            
                                    <table class="table table-striped" id="bookCat">
                                        <thead>
                                            <tr>
                                                <th>Book ID</th>
                                                <th>Title</th>
                                                <th>ISBN</th>
                                                <th>Author</th>
                                                <th>Category</th>
                                                <th>Language</th>
                                                <th>Publisher</th>
                                                <th>Copies</th>
                                                <th>Available</th>
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
                                                <th scope="row"><?php echo $rows['book_id'];?></th>
                                                <td><?php echo $rows['title'];?></td>
                                                <td><?php echo $rows['isbn'];?></td>
                                                <td><?php echo $rows['author'];?></td>
                                                <td><?php echo $rows['category'];?></td>
                                                <td><?php echo $rows['lang'];?></td>
                                                <td><?php echo $rows['publisher'];?></td>
                                                <td><?php echo $rows['copies'];?></td>
                                                <td>
                                                    <?php
                                                        $qavil = mysqli_query($connect, "SELECT avail FROM copies WHERE book_id='$rows[book_id]' AND avail='Available'");
									                    $avail = mysqli_num_rows($qavil); 
                                                        //echo $avail;
                                                        if ($avail==0) {
                                                            echo 'No';
                                                        } else {
                                                            echo $avail;
                                                        }
                                                    ?>
                                                </td>

                                                <td>
                                                    <a href="book-details.php?book_id=<?php echo $rows['book_id'];?>" title="View" class="btn btn-primary"><i class="fa fa-search"></i> </a>
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
            $('#bookCat').DataTable( {
                "order": [[ 0, "desc" ]]
            });
        } );
    </script>
</body>

</html>