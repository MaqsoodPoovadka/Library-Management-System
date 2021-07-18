<?php 
include 'config.php';
include 'session.php'; 
?>
<?php
    /*$book_id =$_GET['book_id'];
    // SQL query to select data from database 
    $sql = "SELECT * FROM books WHERE book_id='$book_id' "; 
    $result = mysqli_query($connect, $sql);
    $rows=mysqli_fetch_assoc($result);*/
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
                    <h3>Upload</h3>
                    <div class="col-md-6">

                        <!--Book Upload-->
                        <div class="Book-Image">
                            <?php
                                if (isset($_GET['book_id'])) {
                                    $book_id =$_GET['book_id'];
                                    // SQL query to select data from database 
                                    $sqlbook = "SELECT * FROM books WHERE book_id='$book_id' "; 
                                    $result = mysqli_query($connect, $sqlbook);
                                    $rb=mysqli_fetch_assoc($result);
                                

                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Book Image
                                </div>
                                <div class="panel-body">


                                



                                    <form action="" method="post" enctype="multipart/form-data">
                                        
                                        
                                        <input type="text" class="form-control1 control3" name="book_id" value="<?php echo $rb['book_id'];?>" readonly>
                                    
                                        <label for="img_upload">Book Image</label>
                                        <input type="file" name="img_upload" id="img_upload" value="">
                                        <p class="help-block">Upload Cover photo</p>
                    
                                        <hr>
                                        <input type="submit" name="upload" class="btn-success btn" value="Upload Image" />
                                        <input type="reset" name="reset" class="btn-danger btn" value="Reset" />
                                   
                                </form>
                                


                                <?php
                                
                                    if (isset($_POST['upload'])) {
                                        $book_id    = $_POST['book_id'];

                                        $msg        = "";
                                        $book_img   = $_FILES["img_upload"]["name"]; 
                                        $tempname   = $_FILES["img_upload"]["tmp_name"];     
                                            $folder = "uploads/".$book_img;
                                        
    
                                        $upload = "UPDATE `books` SET `book_img`='$book_img' WHERE `book_id`='$book_id'";
                                        $sql = mysqli_query($connect, $upload);
                                        
                                        if (move_uploaded_file($tempname, $folder))  { 
                                            $msg = "Image uploaded successfully"; 
                                        }else{ 
                                            $msg = "Failed to upload image"; 
                                        }

                                        echo '<meta http-equiv="refresh" content="0; url=book-details.php?book_id='.$book_id. '">';
                                    }
                                ?>






                                </div>
                            </div>
                            <?php   }   ?>
                        </div>
                        
                        <!--Member Upload-->
                        <div class="Member-Image">
                            <?php
                                if (isset($_GET['m_id'])) {
                                    $m_id =$_GET['m_id'];
                                    // SQL query to select data from database 
                                    $sqlmbr = "SELECT * FROM members WHERE member_id='$m_id' "; 
                                    $result = mysqli_query($connect, $sqlmbr);
                                    $rm=mysqli_fetch_assoc($result);
                                

                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Member Image
                                </div>
                                <div class="panel-body">
                                


                                    <form action="" method="post" enctype="multipart/form-data">
                                        
                                        
                                        <input type="text" class="form-control1 control3" name="member_id" value="<?php echo $rm['member_id'];?>" readonly>
                                    
                                        <label for="img_upload">Member Image</label>
                                        <input type="file" name="img_upload" id="img_upload" value="">
                                        <p class="help-block">Upload Member Photo</p>
                    
                                        <hr>
                                        <input type="submit" name="upload" class="btn-success btn" value="Upload Image" />
                                        <input type="reset" name="reset" class="btn-danger btn" value="Reset" />
                                   
                                </form>
                                


                                <?php
                                
                                    if (isset($_POST['upload'])) {
                                        $mid    = $_POST['member_id'];

                                        $msg        = "";
                                        $mbr_img   = $_FILES["img_upload"]["name"]; 
                                        $tempname   = $_FILES["img_upload"]["tmp_name"];     
                                            $folder = "uploads/".$mbr_img;
                                        
    
                                        $upload = "UPDATE `members` SET `photo`='$mbr_img' WHERE `member_id`='$mid'";
                                        $sql = mysqli_query($connect, $upload);
                                        
                                        if (move_uploaded_file($tempname, $folder))  { 
                                            $msg = "Image uploaded successfully"; 
                                        }else{ 
                                            $msg = "Failed to upload image"; 
                                        }

                                        echo '<meta http-equiv="refresh" content="0; url=member.php?id='.$mid. '">';
                                    }
                                ?>






                                </div>
                            </div>
                            <?php   }   ?>
                        </div>

                        <!--User Upload-->
                        <div class="User-Image">
                            <?php
                                if (isset($_GET['uid'])) {
                                    $usr_id =$_GET['uid'];
                                    // SQL query to select data from database 
                                    $sqlusr = "SELECT * FROM admin WHERE userid='$usr_id' "; 
                                    $result = mysqli_query($connect, $sqlusr);
                                    $ru=mysqli_fetch_assoc($result);
                                

                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    User Image
                                </div>
                                <div class="panel-body">
                                


                                    <form action="" method="post" enctype="multipart/form-data">
                                        
                                        
                                        <input type="text" class="form-control1 control3" name="userid" value="<?php echo $ru['userid'];?>" readonly>
                                    
                                        <label for="img_upload">User Image</label>
                                        <input type="file" name="img_upload" id="img_upload" value="">
                                        <p class="help-block">Upload User Photo</p>
                    
                                        <hr>
                                        <input type="submit" name="upload" class="btn-success btn" value="Upload Image" />
                                        <input type="reset" name="reset" class="btn-danger btn" value="Reset" />
                                   
                                </form>
                                


                                <?php
                                
                                    if (isset($_POST['upload'])) {
                                        $usrid    = $_POST['userid'];

                                        $msg        = "";
                                        $usr_img   = $_FILES["img_upload"]["name"]; 
                                        $tempname   = $_FILES["img_upload"]["tmp_name"];     
                                            $folder = "uploads/user/".$usr_img;
                                        
    
                                        $upload = "UPDATE `admin` SET `photo`='$usr_img' WHERE `userid`='$usrid'";
                                        $sql = mysqli_query($connect, $upload);
                                        
                                        if (move_uploaded_file($tempname, $folder))  { 
                                            $msg = "Image uploaded successfully"; 
                                        }else{ 
                                            $msg = "Failed to upload image"; 
                                        }

                                        echo '<meta http-equiv="refresh" content="0; url=user.php?id='.$usrid. '">';
                                    }
                                ?>






                                </div>
                            </div>
                            <?php   }   ?>
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