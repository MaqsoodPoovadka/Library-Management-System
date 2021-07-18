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
                    <h3>Add New Copies</h3>
                    <div class="col-md-8">
                        <div class="Add-Book">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Add Copy
                                </div>
                                <div class="panel-body">

                                <?php
                                    if (isset($_GET['book_id'])) {
                                        $id  = $_GET["book_id"];
                                        $sql = mysqli_query($connect, "SELECT * FROM `books` WHERE book_id = '$id'");
                                        $row = mysqli_fetch_assoc($sql);
                                        if (empty($id)) {
                                            echo '<meta http-equiv="refresh" content="0; url=book-catalogue.php.php">';
                                        }
                                        if (mysqli_num_rows($sql) == 0) {
                                            echo '<meta http-equiv="refresh" content="0; url=add-copies.php">';
                                        }
                                    }
                                ?>



                                    <form action="" method="post">
                                    <label>Book ID : </label>
                                    <input type="text" class="form-control1 control3" name="book_id" id="book_id" value="<?php echo $row['book_id'];?>" readonly>
                        
                                    <label>Book Title : </label>
                                    <input type="text" class="form-control1 control3" name="title" value="<?php echo $row['title'];?>" readonly>
                                    
                                    <?php
                                        $sqlcno = mysqli_query($connect, "SELECT copy_no FROM `copies` WHERE book_id = '$id' ORDER BY copy_no DESC");
                                        $cno = mysqli_fetch_assoc($sqlcno);
                                        //echo $cno['copy_no'];
                                    ?>

                                    <label>Copy Number : </label>
                                    <input type="text" class="form-control1 control3" name="copy_no" id="copy_no" min="0" value="<?php echo $cno['copy_no']+1;?>">
                                                    
                                    <hr>
                                    <input type="submit" name="add" class="btn-info btn" value="Add Book" />
                                    
                                    <input type="reset" name="reset" class="btn-danger btn" value="Reset" />
                                    <!--<button class="btn-success btn">Submit</button>
                                    <button class="btn-info btn">Cancel</button>
                                    <button class="btn-danger btn">Reset</button>-->
                                </form>


                                <?php
                                
                                    if (isset($_POST['add'])) {
                                        $book_id    = $_POST['book_id'];
                                        $title    = $_POST['title'];
                                        $copy_no    = $_POST['copy_no'];
                                        


                                        $add = "INSERT INTO `copies`(`book_id`, `title`, `copy_no`, `avail`) VALUES ('$book_id', '$title', '$copy_no', 'Available')";
                                        $sql = mysqli_query($connect, $add);
                                        echo '<meta http-equiv="refresh" content="0; url=book-details.php?book_id=' . $row['book_id'] . '">';
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