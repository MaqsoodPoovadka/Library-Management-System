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
                    <h3>New Book</h3>
                    <div class="col-md-8">
                        <div class="Add-Book">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Add New Book
                                </div>
                                <div class="panel-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                    <?php
                                        $sqlbid = mysqli_query($connect, "SELECT book_id FROM `books` ORDER BY book_id DESC");
                                        $bid = mysqli_fetch_assoc($sqlbid);
                                        //echo $cno['copy_no'];
                                    ?>
                                    <label>Book ID : </label>
                                    <input type="text" class="form-control1 control3" name="book_id" value="<?php echo $bid['book_id']+1;?>" required>
                                    <label>ISBN : </label>
                                    <input type="text" class="form-control1 control3" name="isbn">
                                    <label>Book Title : </label>
                                    <input type="text" class="form-control1 control3" name="title" required>

                                    <label>Author : </label>
									<input list="authors" name="author" id="author" class="form-control1 control3" required>
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
                            
                                        <option>Other</option>
									</datalist>

                                    <label>Category : </label>
                                    <input list="categories" name="category" id="category" class="form-control1 control3" required>
                                    <datalist id="categories">
                                        <option value="" disabled selected></option>
                                        <?php
                                            $crun = mysqli_query($connect, "SELECT * FROM `categories`");
                                            while ($rw = mysqli_fetch_assoc($crun)) {
                                                echo '
                                                    <option value="' . $rw['category'] . '">' . $rw['category'] . '</option>
                                                ';
                                            }
                                        ?>
                            
                                        <option>Other</option>
									</datalist>

                                    <label>Publisher : </label>
                                    <input list="publishers" name="publisher" id="publisher" class="form-control1 control3" required>
                                    <datalist id="publishers">
                                        <option value="" disabled selected></option>
                                        <?php
                                            $crun = mysqli_query($connect, "SELECT * FROM `publishers`");
                                            while ($rw = mysqli_fetch_assoc($crun)) {
                                                echo '
                                                    <option value="' . $rw['publisher'] . '">' . $rw['publishers'] . '</option>
                                                ';
                                            }
                                        ?>
                            
                                        <option>Other</option>
									</datalist>

                                    <label>Language : </label>
                                    <input list="languages" name="lang" id="lang" class="form-control1 control3" required>
                                    <datalist id="languages">
                                        <option value="" disabled selected></option>
                                        <?php
                                            $crun = mysqli_query($connect, "SELECT * FROM `languages`");
                                            while ($rw = mysqli_fetch_assoc($crun)) {
                                                echo '
                                                    <option value="' . $rw['language'] . '">' . $rw['language'] . '</option>
                                                ';
                                            }
                                        ?>
                            
                                        <option>Other</option>
									</datalist>

                                    <label>Edition : </label>
                                    <input type="number" class="form-control1 control3" name="edition" min="0" required>
                                    
                                    <label>Pages : </label>
                                    <input type="number" class="form-control1 control3" name="pages" min="0" required>

                                    <label>Price : </label>
                                    <input type="text" class="form-control1 control3" name="price">
                                    
                                    <label>Description : </label>
                                    <textarea rows="6" class="form-control1 control3" name="description"></textarea>
                                    
                                    <label for="img_upload">Book Image</label>
                                    <input type="file" name="img_upload" id="img_upload" >
                                    <p class="help-block">Upload Cover photo</p>
                    
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
                                        $isbn       = $_POST['isbn'];
                                        $title      = $_POST['title'];
                                        $author     = $_POST['author'];
                                        $category   = $_POST['category'];
                                        $publisher  = $_POST['publisher'];
                                        $edition    = $_POST['edition'];
                                        $lang       = $_POST['lang'];
                                        $pages      = $_POST['pages'];
                                        $price      = $_POST['price'];
                                        $description= $_POST['description'];

                                        $msg        = "";
                                        $book_img   = $_FILES["img_upload"]["name"]; 
                                        $tempname   = $_FILES["img_upload"]["tmp_name"];     
                                            $folder = "uploads/".$book_img;
                                        
    
                                        $add1 = "INSERT INTO `books`(`book_id`, `isbn`, `title`, `author`, `category`, `book_img`, `publisher`, `edition`, `lang`, `pages`, `price`, `description`) VALUES ('$book_id', '$isbn', '$title', '$author', '$category', '$book_img', '$publisher', '$edition', '$lang', '$pages', '$price', '$description')";
                                        $sql = mysqli_query($connect, $add1);
                                        if (move_uploaded_file($tempname, $folder))  { 
                                            $msg = "Image uploaded successfully"; 
                                        }else{ 
                                            $msg = "Failed to upload image"; 
                                        }
                                        

                                        $add2 = "INSERT INTO `copies`(`book_id`, `title`,  `copy_no`, `avail`) VALUES ('$book_id', '$title', '1', 'Available')";
                                        $sql = mysqli_query($connect, $add2);

                                        echo '<meta http-equiv="refresh" content="0; url=book-catalogue.php">';
                                    }
                                    $result = mysqli_query($connect, "SELECT * FROM image");
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