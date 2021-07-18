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
                    <h3>Edit Copies</h3>
                    <div class="col-md-8">
                        <div class="Add-Book">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit
                                </div>
                                <div class="panel-body">

                                <?php
                                    if (isset($_GET['book_id'])) {
                                        $id  = $_GET['book_id'];
                                        $sql = mysqli_query($connect, "SELECT * FROM books WHERE book_id='$id'");
                                        $row = mysqli_fetch_assoc($sql);
                                        if (empty($id)) {
                                            echo '<meta http-equiv="refresh" content="0; url=book-catalogue.php.php">';
                                        }
                                        //if (mysqli_num_rows($sql) == 0) {
                                          //  echo '<meta http-equiv="refresh" content="0; url=edit-description.php">';
                                        //}
                                    }
                                ?>



                                    <form action="" method="post">
                                    
                                    <label>Book ID : </label>
                                    <input type="text" class="form-control1 control3" name="book_id" id="book_id" value="<?php echo $row['book_id'];?>" readonly>
                                        
                                    <label>Description : </label>
                                    <textarea rows="6" class="form-control1 control3" name="description"><?php echo $row['description'];?></textarea>
                                                    
                                    <hr>
                                    <input type="submit" name="edit" class="btn-success btn" value="Edit" />
                                    
                                    <input type="reset" name="reset" class="btn-danger btn" value="Reset" />
                                    <!--<button class="btn-success btn">Submit</button>
                                    <button class="btn-info btn">Cancel</button>
                                    <button class="btn-danger btn">Reset</button>-->
                                </form>


                                <?php
                                
                                    if (isset($_POST['edit'])) {
                                        $book_id    = $_POST['book_id'];
                                        $descrptn    = $_POST['description'];
                                        

                                        $edit = "UPDATE `books` SET `description`='$descrptn' WHERE `book_id`='$book_id'";
                                        $sql = mysqli_query($connect, $edit);

                                        echo '<meta http-equiv="refresh" content="0; url=book-details.php?book_id='.$book_id. '">';
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