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
                    <h3>Add</h3>
                    <!--Add Category-->
                    <div class="col-md-6">
                        <div class="Add-Book">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Add New Book
                                </div>
                                <div class="panel-body">
                                    <form action="" method="post">
                                        <label>Category : </label>
                                        <input type="text" class="form-control1 control3" name="cat" value="">
                    
                                        <hr>
                                        <input type="submit" name="addCat" class="btn-success btn" value="Add Category" />
                                        <input type="cancel" name="cancle" class="btn-info btn" value="Cancel" />
                                        <input type="reset" name="reset" class="btn-danger btn" value="Reset" />
                                        <!--<button class="btn-success btn">Submit</button>
                                        <button class="btn-info btn">Cancel</button>
                                        <button class="btn-danger btn">Reset</button>-->
                                    </form>


                                    <?php
                                
                                        if (isset($_POST['addCat'])) {
                                            $cat    = $_POST['cat'];

    
                                            $addCat = "INSERT INTO `categories`(`category`) VALUES ('$cat')";
                                            $sqlCat = mysqli_query($connect, $addCat);

                                            echo '<meta http-equiv="refresh" content="0; url=categories.php">';
                                        }
                                    
                                    ?>




                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Add Author-->
                    <div class="col-md-6">
                        <div class="Add-Book">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Add Author
                                </div>
                                <div class="panel-body">
                                    <form action="" method="post">
                                    <label>Author Name : </label>
                                    <input type="text" class="form-control1 control3" name="author" value="">
                    
                                    <hr>
                                    <input type="submit" name="addAut" class="btn-success btn" value="Add Author" />
                                    <input type="cancel" name="cancle" class="btn-info btn" value="Cancel" />
                                    <input type="reset" name="reset" class="btn-danger btn" value="Reset" />
                                    <!--<button class="btn-success btn">Submit</button>
                                    <button class="btn-info btn">Cancel</button>
                                    <button class="btn-danger btn">Reset</button>-->
                                </form>


                                <?php
                                
                                    if (isset($_POST['addAut'])) {
                                        $author    = $_POST['author'];

    
                                        $addAut = "INSERT INTO `authors`(`author_name`) VALUES ('$author')";
                                        $sqlAut = mysqli_query($connect, $addAut);

                                        echo '<meta http-equiv="refresh" content="0; url=authors.php">';
                                    }
                                    
                                ?>




                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Add Publishers-->
                    <div class="col-md-6">
                        <div class="Add-Book">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Add New Publisher
                                </div>
                                <div class="panel-body">
                                    <form action="" method="post">
                                        <label>Publisher : </label>
                                        <input type="text" class="form-control1 control3" name="pub" value="">
                    
                                        <hr>
                                        <input type="submit" name="addPub" class="btn-success btn" value="Add Publisher" />
                                        <input type="cancel" name="cancle" class="btn-info btn" value="Cancel" />
                                        <input type="reset" name="reset" class="btn-danger btn" value="Reset" />
                                        <!--<button class="btn-success btn">Submit</button>
                                        <button class="btn-info btn">Cancel</button>
                                        <button class="btn-danger btn">Reset</button>-->
                                    </form>


                                    <?php
                                
                                        if (isset($_POST['addPub'])) {
                                            $pub    = $_POST['pub'];

    
                                            $addPub = "INSERT INTO `publishers`(`publisher`) VALUES ('$pub')";
                                            $sqlPub = mysqli_query($connect, $addPub);

                                            echo '<meta http-equiv="refresh" content="0; url=publishers.php">';
                                        }
                                    
                                    ?>




                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Add Language-->
                    <div class="col-md-6">
                        <div class="Add-Book">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Add Language
                                </div>
                                <div class="panel-body">
                                    <form action="" method="post">
                                        <label>Language : </label>
                                        <input type="text" class="form-control1 control3" name="lang" value="">
                    
                                        <hr>
                                        <input type="submit" name="addLang" class="btn-success btn" value="Add Language" />
                                        <input type="cancel" name="cancle" class="btn-info btn" value="Cancel" />
                                        <input type="reset" name="reset" class="btn-danger btn" value="Reset" />
                                        <!--<button class="btn-success btn">Submit</button>
                                        <button class="btn-info btn">Cancel</button>
                                        <button class="btn-danger btn">Reset</button>-->
                                    </form>


                                    <?php
                                
                                        if (isset($_POST['addLang'])) {
                                            $lang    = $_POST['lang'];

    
                                            $addLang = "INSERT INTO `languages`(`language`) VALUES ('$lang')";
                                            $sqlLang = mysqli_query($connect, $addLang);

                                            echo '<meta http-equiv="refresh" content="0; url=languages.php">';
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