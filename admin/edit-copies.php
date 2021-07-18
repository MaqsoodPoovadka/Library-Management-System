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
                                    if (isset($_GET['acc_id'])) {
                                        $id  = $_GET["acc_id"];
                                        $sql = mysqli_query($connect, "SELECT * FROM `copies` WHERE acc_id = '$id'");
                                        $row = mysqli_fetch_assoc($sql);
                                        if (empty($id)) {
                                            echo '<meta http-equiv="refresh" content="0; url=book-catalogue.php.php">';
                                        }
                                        if (mysqli_num_rows($sql) == 0) {
                                            echo '<meta http-equiv="refresh" content="0; url=edit-copies.php">';
                                        }
                                    }
                                ?>



                                    <form action="" method="post">
                                    <label>Access ID : </label>
                                    <input type="text" class="form-control1 control3" name="acc_id" id="acc_id" value="<?php echo $row['acc_id'];?>" readonly>

                                    <label>Book ID : </label>
                                    <input type="text" class="form-control1 control3" name="book_id" id="book_id" value="<?php echo $row['book_id'];?>">
                                        
                                    <label>Copy Number : </label>
                                    <input type="number" class="form-control1 control3" name="copy_no" id="copy_no" min="0" value="<?php echo $row['copy_no'];?>">

                                    <label>Status : </label>
									<select name="avail" id="avail" class="form-control1 control3">
                                        <option selected><?php echo $row['avail'];?></option>
                                        <option disabled></option>
                                        <option>Available</option>
										<option>Unavailable</option>
										<option>Others</option>
									</select>
                                                    
                                    <hr>
                                    <input type="submit" name="edit" class="btn-success btn" value="Edit" />
                                    
                                    <input type="reset" name="reset" class="btn-danger btn" value="Reset" />
                                    <!--<button class="btn-success btn">Submit</button>
                                    <button class="btn-info btn">Cancel</button>
                                    <button class="btn-danger btn">Reset</button>-->
                                </form>


                                <?php
                                
                                    if (isset($_POST['edit'])) {
                                        $acc_id    = $_POST['acc_id'];
                                        $book_id    = $_POST['book_id'];
                                        $copy_no    = $_POST['copy_no'];
                                        $avail    = $_POST['avail'];
                                        


                                        $edit = "UPDATE `copies` SET `book_id`='$book_id', `copy_no`='$copy_no', `avail`='$avail' WHERE `acc_id`='$acc_id'";
                                        $sql = mysqli_query($connect, $edit);
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