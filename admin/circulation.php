<?php
    include 'config.php';
    include 'session.php';

    $h_title = 'Circulation';
?>

<?php
    // SQL query to select data from database 
    $sql1 = "SELECT * FROM circulation WHERE `status`='Issued' "; 
    $result1 = $connect->query($sql1); 
    $sql2 = "SELECT * FROM circulation WHERE `status`='Returned' ";
    $result2 = $connect->query($sql2);
    $sql3 = "SELECT * FROM circulation ORDER BY id DESC";
    $result3 = $connect->query($sql3);
    $sql4 = "SELECT * FROM circulation WHERE `overdue`='Yes' AND `status`='Issued' ";
    $result4 = $connect->query($sql4);
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
                    <h3>Book Circulation</h3>
                    <div class="col-md-12">
                        <div class="book-details">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Circulations
                                </div>
                                <div class="panel-body">


                                    <div class="but_list-mt0">
                                        <div class="bs-example bs-example-tabs" role="tabpanel"
                                            data-example-id="togglable-tabs">
                                            <ul id="myTab" class="nav nav-tabs" role="tablist">
                                                <li role="presentation"><a href="#all" role="tab" id="all-tab"
                                                    data-toggle="tab" aria-controls="all">All</a></li>
                                                <li role="presentation" class="active"><a href="#issue" id="issue-tab"
                                                        role="tab" data-toggle="tab" aria-controls="issue" aria-expanded="true">Issued</a></li>
                                                <li role="presentation"><a href="#overdue" role="tab" id="overdue-tab"
                                                        data-toggle="tab" aria-controls="overdue">Overdue</a></li>
                                                <li role="presentation"><a href="#return" role="tab" id="return-tab"
                                                        data-toggle="tab" aria-controls="return">Returned</a></li>
                                                
                                            </ul>
                                            <div id="myTabContent" class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade in active" id="issue"
                                                    aria-labelledby="issue-tab">
                                                    <table class="table table-striped" id="issueTable">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>ACC ID</th>
                                                                <th>Title</th>
                                                                <th>Member ID</th>
                                                                <th>Name</th>
                                                                <th>Issue Date</th>
                                                                <th>Return Date</th>
                                                                
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>


                                                        <tbody>
                                                            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
                                                            <?php   // LOOP TILL END OF DATA  
                                                                while($rows=$result1->fetch_assoc()) 
                                                                { 
                                                            ?>
                                                            <tr>
                                                                <th scope="row">
                                                                    <?php echo $rows['id'];?>
                                                                </th>
                                                                <td>
                                                                    <?php echo $rows['acc_id'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['title'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['member_id'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['name'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['i_date'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['r_date'];?>
                                                                </td>
                                                                
                                                                <td>
                                                                    <?php echo $rows['status'];?>
                                                                </td>

                                                                <td><a href="return-book.php?id=<?php echo $rows['id'];?>" title="Check In"
                                                                        class="btn btn-primary"><i class="fa fa-search"></i> </a>
                                                                    
                                                                </td>



                                                            </tr>
                                                            <?php 
                                                                } 
                                                            ?>

                                                        </tbody>

                                                    </table>
                                                </div>

                                                <div role="tabpanel" class="tab-pane fade" id="return"
                                                    aria-labelledby="return-tab">
                                                    <table class="table table-striped" id="returnTable">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>ACC ID</th>
                                                                <th>Title</th>
                                                                <th>Member ID</th>
                                                                <th>Name</th>
                                                                <th>Issue Date</th>
                                                                <th>Return Date</th>
                                                                <th>Recieved Date</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>


                                                        <tbody>
                                                            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
                                                            <?php   // LOOP TILL END OF DATA  
                                                                while($rows=$result2->fetch_assoc()) 
                                                                { 
                                                            ?>
                                                            <tr>
                                                                <th scope="row">
                                                                    <?php echo $rows['id'];?>
                                                                </th>
                                                                <td>
                                                                    <?php echo $rows['acc_id'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['title'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['member_id'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['name'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['i_date'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['r_date'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['rd_date'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['status'];?>
                                                                </td>

                                                                



                                                            </tr>
                                                            <?php 
                                                                } 
                                                            ?>

                                                        </tbody>

                                                    </table>
                                                </div>

                                                <div role="tabpanel" class="tab-pane fade" id="all"
                                                    aria-labelledby="all">
                                                    <table class="table table-striped" id="allTable">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>ACC ID</th>
                                                                <th>Title</th>
                                                                <th>Member ID</th>
                                                                <th>Name</th>
                                                                <th>Issue Date</th>
                                                                <th>Return Date</th>
                                                                <th>Recieved Date</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>


                                                        <tbody>
                                                            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
                                                            <?php   // LOOP TILL END OF DATA  
                                                                while($rows=$result3->fetch_assoc()) 
                                                                { 
                                                            ?>
                                                            <tr>
                                                                <th scope="row">
                                                                    <?php echo $rows['id'];?>
                                                                </th>
                                                                <td>
                                                                    <?php echo $rows['acc_id'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['title'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['member_id'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['name'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['i_date'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['r_date'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['rd_date'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['status'];?>
                                                                </td>

                                                                <td>
                                                                <?php if ($rows['status']!='Returned') { ?>
                                                                    
                                                                    <a href="return-book.php?id=<?php echo $rows['id'];?>" title="View"
                                                                        class="btn btn-primary"><i
                                                                            class="fa fa-search"></i> </a> ';

                                                
                                                                <?php }?>
                                                                </td>



                                                            </tr>
                                                            <?php 
                                                                } 
                                                            ?>

                                                        </tbody>

                                                    </table>
                                                </div>

                                                <div role="tabpanel" class="tab-pane fade" id="overdue"
                                                    aria-labelledby="overdue-tab">
                                                    <table class="table table-striped" id="dueTable">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>ACC ID</th>
                                                                <th>Title</th>
                                                                <th>Member ID</th>
                                                                <th>Name</th>
                                                                <th>Issue Date</th>
                                                                <th>Return Date</th>
                                                                
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>


                                                        <tbody>
                                                            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
                                                            <?php   // LOOP TILL END OF DATA  
                                                                while($rows=$result4->fetch_assoc()) 
                                                                { 
                                                            ?>
                                                            <tr>
                                                                <th scope="row">
                                                                    <?php echo $rows['id'];?>
                                                                </th>
                                                                <td>
                                                                    <?php echo $rows['acc_id'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['title'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['member_id'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['name'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['i_date'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['r_date'];?>
                                                                </td>
                                                                
                                                                <td>
                                                                    <?php echo $rows['status'];?>
                                                                </td>

                                                                <td><a href="return-book.php?id=<?php echo $rows['id'];?>" title="Check In"
                                                                        class="btn btn-primary"><i
                                                                            class="fa fa-search"></i> </a>
                                                                    
                                                                </td>



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
    <script>
        $(document).ready(function () {
            $('#issueTable').DataTable( {
                "order": [[ 0, "desc" ]]
            });
            $('#returnTable').DataTable( {
                "order": [[ 0, "desc" ]]
            });
            $('#allTable').DataTable( {
                "order": [[ 0, "desc" ]]
            });
            $('#dueTable').DataTable( {
                "order": [[ 0, "desc" ]]
            });
            
        });
    </script>
</body>

</html> 