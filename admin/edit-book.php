<?php 
include 'config.php';
include 'session.php'; 
?>
<?php
    $book_id =$_GET['book_id'];
    // SQL query to select data from database 
    $sql = "SELECT * FROM books WHERE book_id='$book_id' "; 
    $result = mysqli_query($connect, $sql);
    $rows=mysqli_fetch_assoc($result);
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
                    <h3>Edit Book</h3>
                    <div class="col-md-8">
                        <div class="Edit-Book">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit Book
                                </div>
                                <div class="panel-body">


                                



                                    <form action="" method="post" enctype="multipart/form-data">
                                    <label>Book ID : </label>
                                    <input type="text" class="form-control1 control3" name="book_id" value="<?php echo $rows['book_id'];?>" readonly>
                                    <label>ISBN : </label>
                                    <input type="text" class="form-control1 control3" name="isbn" value="<?php echo $rows['isbn'];?>">
                                    <label>Book Title : </label>
                                    <input type="text" class="form-control1 control3" name="title" value="<?php echo $rows['title'];?>">

                                    <label>Author : </label>
									<input list="authors" name="author" id="author" class="form-control1 control3" value="<?php echo $rows['author'];?>">
                                    <datalist id="authors">
                                        <option value="" disabled selected></option>
                                        <?php
                                            $crun = mysqli_query($connect, "SELECT * FROM `authors`");
                                            while ($rw = mysqli_fetch_assoc($crun)) {
                                                echo '
                                                    <option value="' . $rw['author_name'] . '">' . $rw['author_name'] . '</option>
                                                ';
                                            }
                                        ?>
									</datalist>

                                    <label>Category : </label>
									<select name="category" id="category" class="form-control1 control3">
                                        <option value="<?php echo $rows['category'];?>"><?php echo $rows['category'];?></option>
                                        <option value=""></option>
                                        <?php
                                            $crun = mysqli_query($connect, "SELECT * FROM `categories`");
                                            while ($rw = mysqli_fetch_assoc($crun)) {
                                                echo '
                                                    <option value="' . $rw['category'] . '">' . $rw['category'] . '</option>
                                                ';
                                            }
                                        ?>
                                        <option>Other</option>
									</select>

                                    <label>Publisher : </label>
                                    <select name="publisher" id="publisher" class="form-control1 control3">
                                        <option value="<?php echo $rows['publisher'];?>"><?php echo $rows['publisher'];?></option>
                                        <option value=""></option>
                                        <?php
                                            $crun = mysqli_query($connect, "SELECT * FROM `publishers`");
                                            while ($rw = mysqli_fetch_assoc($crun)) {
                                                echo '
                                                    <option value="' . $rw['publisher'] . '">' . $rw['publisher'] . '</option>
                                                ';
                                            }
                                        ?>
                                        <option>Other</option>
									</select>
                                    
                                    <label>Edition : </label>
                                    <input type="text" class="form-control1 control3" name="edition" value="<?php echo $rows['edition'];?>">
                                    <label>Language : </label>
                                    <select name="lang" id="lang" class="form-control1 control3">
                                        <option value="<?php echo $rows['lang'];?>"><?php echo $rows['lang'];?></option>
                                        <option value=""></option>
                                        <?php
                                            $crun = mysqli_query($connect, "SELECT * FROM `languages`");
                                            while ($rw = mysqli_fetch_assoc($crun)) {
                                                echo '
                                                    <option value="' . $rw['language'] . '">' . $rw['language'] . '</option>
                                                ';
                                            }
                                        ?>
                                        <option>Other</option>
									</select>


                                    <label>Pages : </label>
                                    <input type="text" class="form-control1 control3" name="pages" value="<?php echo $rows['pages'];?>">
                                    
                                    <!--label>Description : </label>
                                    <textarea rows="6" class="form-control1 control3" name="desc"><?php echo $rows['description'];?></textarea-->
                                    
                    
                                    <hr>
                                    <input type="submit" name="edit" class="btn-success btn" value="Update Book" />
                                    <input type="cancel" name="cancle" class="btn-info btn" value="Cancel" />
                                    <input type="reset" name="reset" class="btn-danger btn" value="Reset" />
                                    <!--<button class="btn-success btn">Submit</button>
                                    <button class="btn-info btn">Cancel</button>
                                    <button class="btn-danger btn">Reset</button>-->
                                </form>
                                


                                <?php
                                
                                    if (isset($_POST['edit'])) {
                                        $book_id    = $_POST['book_id'];
                                        $isbn       = $_POST['isbn'];
                                        $title      = $_POST['title'];
                                        $author     = $_POST['author'];
                                        $category   = $_POST['category'];
                                        $publisher  = $_POST['publisher'];
                                        $edition    = $_POST['edition'];
                                        $lang       = $_POST['lang'];
                                        $pages      = $_POST['pages'];
                                        //$desc       = $_POST['desc'];

                                        
    
                                        $edit = "UPDATE `books` SET `isbn`='$isbn', `title`='$title', `author`='$author', `category`='$category', `publisher`='$publisher', `edition`='$edition', `lang`='$lang', `pages`='$pages' WHERE `book_id`='$book_id'";
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