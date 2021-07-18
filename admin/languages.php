<?php 
    include 'config.php';
    include 'session.php'; 
?>


<?php
    // SQL query to select data from database 
    $sql = "SELECT * FROM languages ORDER BY id ASC "; 
    $result = $connect->query($sql); 
    $connect->close();  
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
                    <h3>Languages</h3>

                
                    
                    <div class="col-md-12">
                        <div class="book-details">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Languages
                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addLanguage">
                                        <i class="fa fa-plus"></i> Add Language
                                    </button>
                                </div>
                                <div class="panel-body">
                                

                            
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Language</th>
                                                
                                            </tr>
                                        </thead>

                                        
                                        <tbody>
                                            <!-- PHP CODE TO FETCH DATA FROM ROWS--> 
                                            <?php   // LOOP TILL END OF DATA  
                                                while($rows=$result->fetch_assoc()) 
                                                { 
                                            ?> 
                                            <tr>
                                                <th scope="row"><?php echo $rows['id'];?></th>
                                                <td><?php echo $rows['language'];?></td>
                            
                                                
                                            </tr>
                                            <?php 
                                                } 
                                            ?>
                                            
                                        
                                        </tbody>
                                        
                                    </table>
                                </div>


                                


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

<?php include 'modal.php'; ?>

</html>