<?php 
include 'config.php';
include 'session.php'; 
?>

<!DOCTYPE HTML>
<html>

<?php include 'header.html'; ?>

<body>
    <div id="wrapper">
        
        
                    
                    <!--Add Category-->
                    <div class="col-md-12">
                        <div class="Add-Book">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Issue Book
                                </div>
                                <div class="panel-body">
                                    <form action="" method="post">

                                        <label>Register No : </label>
    									<input list="member" name="member_id" id="member_id" class="form-control1 control3" value="">
                                        <datalist id="member">
                                            <option value="" disabled selected></option>
                                            <?php
                                                $crun = mysqli_query($connect, "SELECT * FROM `students`");
                                                while ($rw = mysqli_fetch_assoc($crun)) {
                                                    echo '
                                                        <option value="' . $rw['reg_no'] . '">'. $rw['name'] . '</option>
                                                    ';
                                                }
                                            ?>
						    			</datalist>

                                        <label>ACC ID/Book ID : </label>
                                        <input list="books" name="acc_id" id="acc_id" class="form-control1 control3" value="">
                                        <datalist id="books">
                                            <option value="" disabled selected></option>
                                            <?php
                                                $crun = mysqli_query($connect, "SELECT * FROM `books` inner JOIN `copies` on books.book_id=copies.book_id WHERE `avail`='Available'");
                                                while ($rw = mysqli_fetch_assoc($crun)) {
                                                    echo '
                                                        <option value="' . $rw['acc_id'] . '">'. $rw['book_id'] ." - ". $rw['title'] . '</option>
                                                    ';
                                                }
                                            ?>
									    </datalist>
                    
                                        <hr>
                                        <input type="submit" name="submitIssue" class="btn-success btn" value="Submit" />
                                        <input type="cancel" name="cancle" class="btn-info btn" value="Cancel" />
                                        <input type="reset" name="reset" class="btn-danger btn" value="Reset" />
                                        <!--<button class="btn-success btn">Submit</button>
                                        <button class="btn-info btn">Cancel</button>
                                        <button class="btn-danger btn">Reset</button>-->
                                    </form>


                                    <?php
                                
                                        if (isset($_POST['submitIssue'])) {
                                            $member_id  = $_POST['member_id'];
                                            $acc_id     = $_POST['acc_id'];

                                            echo '<meta http-equiv="refresh" content="0; url=issue-book.php?m_id='.$member_id.'&a_id='.$acc_id.'">';
                                        }
                                    
                                    ?>




                                </div>
                            </div>
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