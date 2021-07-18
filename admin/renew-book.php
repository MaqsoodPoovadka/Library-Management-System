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
                    <h3>Renew Book</h3>

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
                                                    $crun = mysqli_query($connect, "SELECT * FROM `circulation` WHERE status='Issued' AND overdue!='YES'");
                                                    while ($rw = mysqli_fetch_assoc($crun)) {
                                                        echo '
                                                            <option value="' . $rw['id'] . '">'. $rw['book_id'] . ' - '. $rw['acc_id'] . ' - ' . $rw['member_id'] .'</option>
                                                        ';
                                                    }
                                                ?>
                                            </datalist>
                                        <!--/fieldset-->



                                        <!--fieldset class="col-md-4"-->
                                            <label>Date of Issue : </label>
                                            <input type="date" name="xi_date" value="<?php echo date('Y-m-d');?>"
                                                class="form-control1 control3">
                                        <!--/fieldset-->


                                        <hr>
                                        <input type="submit" name="fetch" class="btn-info btn" value="Fetch" />
                                        <input type="reset" name="reset" class="btn-danger btn" />

                                    </form>


                                    <?php
                                
                                    if (isset($_POST['fetch'])) {
                                        $c_id    = $_POST['c_id'];
                                        $xi_date = $_POST['xi_date'];

                                    
                                        echo '<meta http-equiv="refresh" content="0; url=?id='.$c_id.'&xidate='.$xi_date.'">';
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
                                    if (isset($_GET['id'],$_GET['xidate'])) {
                                        $id  = $_GET["id"];
                                        $xidate = $_GET["xidate"];
                                        $xrdate = date('Y-m-d', strtotime("$xidate +15 days"));

                                        $sql = mysqli_query($connect, "SELECT * FROM `circulation` WHERE id = '$id' AND status='Issued' AND overdue!='YES'");
                                        $row = mysqli_fetch_assoc($sql);
                                        if (empty($id)) {
                                            echo '<meta http-equiv="refresh" content="0; url=circulation.php">';
                                        }
                                        if (mysqli_num_rows($sql) == 0) {
                                            echo '<meta http-equiv="refresh" content="0; url=renew-book.php">';
                                        }
                                    
                        ?>
                        <div class="renew-book">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Renew Details
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
                                        <input type="date" class="form-control1 control3" value="<?php echo $row['i_date'];?>" readonly>
                                        
                                        <label>Date of Return : </label>
                                        <input type="date" class="form-control1 control3" value="<?php echo $row['r_date'];?>" readonly>
        
                                        <hr>

                                        <label>Extented Issue Date : </label>
                                        <input type="date" name="xi_date" value="<?php echo $xidate;?>" class="form-control1 control3" readonly>
                                    
                                        <label>Extented Return Date : </label>
                                        <input type="date" name="xr_date" value="<?php echo $xrdate;?>" class="form-control1 control3">
        
                                        <hr>
                                        <input type="submit" name="extend" class="btn-info btn" value="Extend" />
                                        <input type="reset" name="reset" class="btn-danger btn" />

                                    </form>

                                    <?php
                                
                                    if (isset($_POST['extend'])) {
                                        $id = $_POST['id'];
                                        $xr_date= $_POST['xr_date'];
                                        
    
                                        $extend = "UPDATE `circulation` SET `r_date`='$xr_date' WHERE `id`='$id'";
                                        $sql = mysqli_query($connect, $extend);
                                    
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