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
                    <h3>Return Book</h3>

                    <div class="col-md-6">
                        <div class="fetch">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Fetch Detail
                                </div>
                                <div class="panel-body">
                                    <form action="" method="post">

                                        <!--fieldset class="col-md-12"-->
                                            <label>Circulation ID : </label>
                                            <input list="circulation" name="c_id" id="c_id" class="form-control1 control3" value="">
                                            <datalist id="circulation">
                                                <option value="" disabled selected></option>
                                                <?php
                                                    $crun = mysqli_query($connect, "SELECT * FROM `circulation` WHERE status='Issued'");
                                                    while ($rw = mysqli_fetch_assoc($crun)) {
                                                        echo '
                                                            <option value="' . $rw['id'] . '">'. $rw['book_id'] . ' - '. $rw['acc_id'] . ' - '. $rw['title'] . ' | ' . $rw['member_id'] .' - ' . $rw['name'] .'</option>
                                                        ';
                                                    }
                                                ?>
                                            </datalist>
                                        <!--/fieldset-->



                                        <!--fieldset class="col-md-4">
                                            <label>Date of Issue : </label>
                                            <input type="date" name="i_date" value="<?php echo date('Y-m-d');?>"
                                                class="form-control1 control3">
                                        </fieldset-->


                                        <hr>
                                        <input type="submit" name="fetch" class="btn-info btn" value="Fetch" />
                                        <input type="reset" name="reset" class="btn-danger btn" />

                                    </form>


                                    <?php
                                
                                    if (isset($_POST['fetch'])) {
                                        $c_id    = $_POST['c_id'];
                                        

                                    
                                        echo '<meta http-equiv="refresh" content="0; url=?id='.$c_id.'">';
                                    }
                                ?>




                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"> </div>

                    <!--if-->
                    <div class="col-md-6">
                        <?php
                                    if (isset($_GET['id'])) {
                                        $id  = $_GET["id"];

                                        $sql = mysqli_query($connect, "SELECT * FROM `circulation` WHERE id = '$id' AND status='Issued'");
                                        $row = mysqli_fetch_assoc($sql);
                                        if (empty($id)) {
                                            echo '<meta http-equiv="refresh" content="0; url=circulation.php">';
                                        }
                                        if (mysqli_num_rows($sql) == 0) {
                                            echo '<meta http-equiv="refresh" content="0; url=return-book.php">';
                                        }
                                    
                        ?>
                        <div class="return-book">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Return Details
                                </div>
                                <div class="panel-body">
                                    <form  action="" method="post">
                                        <label>Circulation ID : </label>
                                        <input type="text" name="id" id="id" class="form-control1 control3" value="<?php echo $row['id'];?>" readonly>

                                        <label>Access ID : </label>
                                        <input type="text" name="acc_id" id="acc_id" class="form-control1 control3" value="<?php echo $row['acc_id'];?>" readonly>

                                        <label>Book : </label>
                                        <input type="text" name="book" id="book" class="form-control1 control3" value="<?php echo $row['book_id']. ' - ' .$row['title'];?>" readonly>

                                        <label>Member ID : </label>
	    								<input type="text" name="mbr_id" id="mbr_id" class="form-control1 control3" value="<?php echo $row['member_id']. ' - ' .$row['name'];?>" readonly>


                                        <label>Date of Issue : </label>
                                        <input type="date" name="i_date" value="<?php echo $row['i_date'];?>" class="form-control1 control3" readonly>
                                        
                                        <label>Date to be Returned : </label>
                                        <input type="date" name="r_date" value="<?php echo $row['r_date'];?>"class="form-control1 control3" readonly>
                                        
                                        <hr>
                                        <label>Recieved Date : </label>
                                        <input type="date" name="rd_date" id="rd_date" value="<?php echo date('Y-m-d');?>" class="form-control1 control3">

                                        <hr>        
                                        <input type="submit" name="return" class="btn-info btn" value="Return Book" />
                                        <input type="reset" name="reset" class="btn-danger btn" />

                                    </form>
                                

                                    <?php
                                        if (isset($_POST['return'])) {
                                            $id     = $_POST['id'];
                                            $acc_id = $_POST['acc_id'];
                                            $rd_date= $_POST['rd_date'];
                                        
    
                                            $return1 = "UPDATE `circulation` SET `rd_date`='$rd_date', `status`='Returned' WHERE `id`='$id'";
                                            $sql = mysqli_query($connect, $return1);

                                            $return2 = "UPDATE `copies` SET `avail`='Available' WHERE `acc_id`='$acc_id'";
                                            $sql = mysqli_query($connect, $return2);
                                    
                                            echo '<meta http-equiv="refresh" content="0; url=circulation.php">';
                                        }
                                    ?>


                                </div>
                            </div>
                        </div>
                        <?php   }   ?>
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