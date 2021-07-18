<?php 
include 'config.php';
include 'session.php'; 
?>
<?php
    $book_id =$_GET['book_id'];
    // SQL query to select data from database 
    $sql1 = "SELECT * FROM books WHERE book_id='$book_id'"; 
    $result1 = $connect->query($sql1);

    $sql2 = "SELECT * FROM copies WHERE book_id='$book_id'"; 
    $result2 = $connect->query($sql2);

    
    
    //$connect->close();
    $rows=$result1->fetch_assoc()
?> 
                                                    <?php
                                                        $qavil = mysqli_query($connect, "SELECT avail FROM copies WHERE book_id='$rows[book_id]' AND avail='Available'");
									                    $avail = mysqli_num_rows($qavil); 
                                                        //echo $avail;
                                                        if ($avail==0) {
                                                            $availno = 'No';
                                                        } else {
                                                            $availno = $avail;
                                                        }
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
                    <h3>Book</h3>

                    

                    <div class="col-md-3">
                        <div class="Book-Image">
                            <div class="panel panel-default">
                                
                                <div class="panel-body">
                                    <?php
                                        if ($rows['book_img']>1) {
                                            echo '<img src="uploads/'. $rows['book_img'].  '" width="100%" alt="no-image">';
                                        } else {
                                            echo '<img src="images/no-image.jpg" width="100%" alt="no-image">';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="mb-5 text-center">
                                <a href="upload-book-image.php?book_id=<?php echo $rows['book_id'];?>" class="btn btn-primary btn-block">Add/Change Images</a>
                                <a href="edit-book.php?book_id=<?php echo $rows['book_id'];?>" title="Edit" class="btn btn-primary btn-block">Edit Book Details </a>
                                <a href="edit-description.php?book_id=<?php echo $rows['book_id'];?>" title="Edit Desc" class="btn btn-primary btn-block">Edit Description </a>
                                <br>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-9">
                        <div class="Book-Details">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Details
                                </div>
                                <div class="panel-body">
                                
            
                                <ul>
                                    <li><b class="float-left">Book ID</b> : <?php echo $rows['book_id'];?></li>
                                    <li><b class="float-left">ISBN</b> : <?php echo $rows['isbn'];?></li>
                                    <li><b class="float-left">Title</b> : <?php echo $rows['title'];?></li>
                                    <li><b class="float-left">Author</b> : <?php echo $rows['author'];?></li>
                                    <li><b class="float-left">Category</b> : <?php echo $rows['category'];?></li>
                                    <li><b class="float-left">Publisher</b> : <?php echo $rows['publisher'];?></li>
                                    <li><b class="float-left">Edition</b> : <?php echo $rows['edition'];?></li>
                                    <li><b class="float-left">Language</b> : <?php echo $rows['lang'];?></li>
                                    <li><b class="float-left">Pages</b> : <?php echo $rows['pages'];?></li>
                                    <li><b class="float-left">No. of copies</b> : <?php echo $rows['copies'];?></li>
                                                    
                                    <li><b class="float-left">Availablity</b> : <?php echo $availno;?> Available</li>
                                    <hr>
                                    <li><b>Description</b> :<br><?php echo $rows['description'];?></li>

                                </ul>



                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="col-md-12">
                        <div class="Add-Book">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Related Copies
                                    <a href="add-copies.php?book_id=<?php echo $rows['book_id'];?>" class="btn btn-primary float-right">
                                        <i class="fa fa-plus"></i> Add Copies
                                    </a>
                                </div>
                                <div class="panel-body">
                                
            
                                <table class="table table-striped" id="dtBasic">
                                        <thead>
                                            <tr>
                                                <th>Access ID</th>
                                                <th>Copy No</th>
                                                <th>Availablity</th>
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
                                                <th scope="row"><?php echo $rows['acc_id'];?></th>
                                                <td><?php echo $rows['copy_no'];?></td>
                                                <td><?php echo $rows['avail'];?></td>
                                                <td>
                                                    <a href="edit-copies.php?acc_id=<?php echo $rows['acc_id'];?>" title="Edit" class="btn btn-primary"><i class="fa fa-edit"></i> </a>
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