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
                    <h3>Reserve Book</h3>
                    
                    <div class="col-md-6">
                        <div class="reserve-book">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Reservation
                                </div>
                                <div class="panel-body">

                                <?php
                                    if (isset($_GET['id'])) {
                                        $id  = $_GET["id"];
                        
                                        $sql = mysqli_query($connect, "SELECT * FROM `reservation` WHERE r_id = '$id'");
                                        $row = mysqli_fetch_assoc($sql);
                                        
                                        if (empty($id)) {
                                            echo '<meta http-equiv="refresh" content="0; url=reservation.php">';
                                        }
                                        if (mysqli_num_rows($sql) == 0) {
                                            echo '<meta http-equiv="refresh" content="0; url=reserve.php">';
                                        }
                                        
                                        /*$check= mysqli_query($connect, "SELECT book_nos FROM `members` WHERE member_id = '$row[member_id]'");
                                        $checkrow = mysqli_fetch_assoc($check);
                                        if ($checkrow['book_nos'] >= 3) {
                                            echo '<script>alert("Full")</script>';
                                            echo 'check';
                                        } else {
                                            echo 'fail';
                                        }*/
                                    }
                                ?>


                                <form  action="" method="post">


                                    <label>Reservation ID : </label>
                                    <input list="ResID" name="r_id" id="r_id" class="form-control1 control3" value="<?php echo $row['r_id'];?>">
                                    <datalist id="ResID">
                                        <option value="" disabled selected></option>
                                        <?php
                                            $crun = mysqli_query($connect, "SELECT * FROM `reservation`");
                                            while ($rw = mysqli_fetch_assoc($crun)) {
                                                echo '
                                                    <option value="' . $rw['r_id'] . '">'. $rw['title'] ." - ". $rw['name'] . '</option>
                                                ';
                                            }
                                        ?>
									</datalist>


                                    <label>Member ID : </label>
									<input type="text" name="mbrid" id="mbrid" class="form-control1 control3" value="<?php echo $row['member_id'];?>" readonly>

                                    <label>Name : </label>
									<input type="text" name="mbrid" id="mbrid" class="form-control1 control3" value="<?php echo $row['name'];?>" readonly>
                                    

                                    <label>Book ID : </label>
                                    <input type="text" name="book_id" id="book_id" class="form-control1 control3" value="<?php echo $row['book_id'];?>" readonly>

                                    <label>Title : </label>
                                    <input type="text" name="title" id="title" class="form-control1 control3" value="<?php echo $row['title'];?>" readonly>

                                    <hr>
                                    <label>Access ID : </label>
                                    <select id="copies" name="acc_id" id="acc_id" class="form-control1 control3" value="<?php echo $row['acc_id'];?>" required>
                                    
                                        <?php
                                            $crun = mysqli_query($connect, "SELECT * FROM `copies` WHERE book_id='$row[book_id]' AND avail='Available'");
                                            while ($rw = mysqli_fetch_assoc($crun)) {
                                                echo '
                                                    <option value="' . $rw['acc_id'] . '">'. $rw['book_id'] ." - ". $rw['title'] . '</option>
                                                ';
                                            }
                                        ?>
                                        <option value="" disabled>No Other Availablity</option>
                                        </select>

                                    <label>Date of Reserved : </label>
                                    <input type="date" name="res_date" value="<?php echo $row['res_date'];?>" class="form-control1 control3" readonly>
                                

                                    <hr>        
                                    <input type="submit" name="submit" class="btn-success btn" value="Submit" />
                                    <input type="cancel" name="cancle" class="btn-info btn" value="Cancel" />
                                    <input type="reset" name="reset" class="btn-danger btn" />

                                </form>


                                <?php
                                
                                    if (isset($_POST['submit'])) {
                                        $r_id = $_POST['r_id'];
                                        $acc_id = $_POST['acc_id'];
                                        
                                        
                                        //$isd_date= $_POST['isd_date'];
                                        
    
                                        $submit1 = "UPDATE `reservation` SET `acc_id`='$acc_id', `status`='Reserved' WHERE `r_id`='$r_id'";
                                        $sql = mysqli_query($connect, $submit1);

                                        $submit2 = "UPDATE `copies` SET `avail`='Reserved' WHERE `acc_id`='$acc_id'";
                                        $sql = mysqli_query($connect, $submit2);
                                    
                                        echo '<meta http-equiv="refresh" content="0; url=reservation.php">';
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