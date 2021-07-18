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
                    <h3>Payment</h3>

                    <?php 
                        //if (isset)
                    ?>

                    <div class="col-md-6">
                        <div class="pay-due">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Fine
                                </div>
                                <div class="panel-body">
                                    <?php
                                        if(isset($_GET['id'])) {
                                            $id = $_GET['id'];

                                            $sql = mysqli_query($connect, "SELECT * FROM `dues` WHERE id = '$id'");
                                            $row = mysqli_fetch_assoc($sql);
                                            if (empty($id)) {
                                                echo '<meta http-equiv="refresh" content="0; url=due.php">';
                                            }
                                            if (mysqli_num_rows($sql) == 0) {
                                                echo '<meta http-equiv="refresh" content="0; url=pay-due.php">';
                                            }
                                        
                                    ?>
                                    <form  action="" method="post">

                                        <label>ID : </label>
                                        <input list="books" name="id" id="id" class="form-control1 control3" value="<?php echo $row['id']; ?>" readonly>

                                        <label>Circulation ID - Member ID : </label>
                                        <input type="text" class="form-control1 control3" value="<?php echo $row['c_id'] . ' - ' . $row['member_id']; ?>" readonly>
                                        
                                        <label>From - To : </label>
                                        <input type="text" class="form-control1 control3" value="<?php echo $row['due_date'] . '  -  ' . $row['rec_date']; ?>" readonly>
                                        
                                        <label>Days : </label>
                                        <input type="number" class="form-control1 control3" value="<?php echo $row['due_days']; ?>" readonly>

                                        <label>Due Amount : </label>
                                        <input type="text" class="form-control1 control3" value="&#x20b9; <?php echo $row['due_amount']; ?>" readonly>
        
                                        <hr>
                                    
                                        <label>Payment Date : </label>
                                        <input type="date" name="pay_date" value="<?php echo date('Y-m-d');?>" class="form-control1 control3">
        
                                        <hr>
                                        <input type="submit" name="pay_fine" class="btn-info btn" value="Paid" />
                                        <input type="reset" name="reset" class="btn-danger btn" />

                                    </form>

                                    <?php
                                
                                        if (isset($_POST['pay_fine'])) {
                                            $id     = $_POST['id'];
                                            $p_date = $_POST['pay_date'];
                                        
    
                                            $pay_fine = "UPDATE `dues` SET `pay_date`='$p_date',`remark`='Paid' WHERE `id`='$id'";
                                            $sql = mysqli_query($connect, $pay_fine);
                                    
                                            echo '<meta http-equiv="refresh" content="0; url=due.php">';
                                        }
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