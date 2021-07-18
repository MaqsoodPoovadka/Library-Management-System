<?php
    include 'config.php';
    include 'session.php';

    $h_title = 'Circulation';
?>

<?php
    // SQL query to select data from database 
    $sql1 = "SELECT * FROM dues"; 
    $result1 = $connect->query($sql1); 
    $sql2 = "SELECT * FROM dues WHERE `remark`='' AND rec_date!='NULL' ";
    $result2 = $connect->query($sql2);
    $sql3 = "SELECT * FROM dues WHERE `remark`='' AND rec_date is NULL";
    $result3 = $connect->query($sql3);
    $sql4 = "SELECT * FROM dues WHERE `remark`='Paid'";
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
                    <h3>Fine / Due</h3>
                    <div class="col-md-12">
                        <div class="book-details">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Fine
                                </div>
                                <div class="panel-body">


                                    <div class="but_list-mt0">
                                        <div class="bs-example bs-example-tabs" role="tabpanel"
                                            data-example-id="togglable-tabs">
                                            <ul id="myTab" class="nav nav-tabs" role="tablist">
                                                <li role="presentation"><a href="#issue" id="issue-tab"
                                                        role="tab" data-toggle="tab" aria-controls="issue" aria-expanded="true">All</a></li>
                                                <li role="presentation"  class="active"><a href="#return" role="tab" id="return-tab"
                                                    data-toggle="tab" aria-controls="return">Due Pending</a></li>
                                                <li role="presentation"><a href="#all" role="tab" id="all-tab"
                                                    data-toggle="tab" aria-controls="all">Overdue</a></li>
                                                <li role="presentation"><a href="#overdue" role="tab" id="overdue-tab"
                                                    data-toggle="tab" aria-controls="overdue">Paid</a></li>
                                                
                                            </ul>
                                            <div id="myTabContent" class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade" id="issue"
                                                    aria-labelledby="issue-tab">
                                                    <table class="table table-striped" id="issueTable">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>C ID</th>
                                                                <th>Member ID</th>
                                                                <th>ACC ID</th>
                                                                <th>Due Date</th>
                                                                <th>Return Date</th>
                                                                <th>Due Days</th>
                                                                <th>Due Amount</th>
                                                                <th>Remark</th>
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
                                                                    <?php echo $rows['c_id'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['member_id'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['acc_id'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['due_date'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['rec_date'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['due_days'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['due_amount'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['remark'];?>
                                                                </td>

                                                                <td>
                                                                    <?php 
                                                                        if ($rows['remark']!='Paid') {
                                                                            if ($rows['rec_date']!=NULL) {
                                                                            echo' <a href="pay-due.php?id='.$rows['id'].'" title="Pay"
                                                                                class="btn btn-primary"><i
                                                                                    class="fa fa-search"></i> Pay Due</a>';
                                                                            } else {
                                                                                echo' <a href="return-book.php?id='.$rows['c_id'].'" title="Pay"
                                                                                class="btn btn-info"><i
                                                                                    class="fa fa-search"></i> Return</a>';
                                                                            }
                                                                        }
                                                                    ?>
                                                                </td>



                                                            </tr>
                                                            <?php 
                                                                } 
                                                            ?>

                                                        </tbody>

                                                    </table>
                                                </div>

                                                <div role="tabpanel" class="tab-pane fade in active" id="return"
                                                    aria-labelledby="return-tab">
                                                    <table class="table table-striped" id="returnTable">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>C ID</th>
                                                                <th>Member ID</th>
                                                                <th>ACC ID</th>
                                                                <th>Due Date</th>
                                                                <th>Return Date</th>
                                                                <th>Due Days</th>
                                                                <th>Due Amount</th>
                                                                <th>Action</th>
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
                                                                    <?php echo $rows['c_id'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['member_id'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['acc_id'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['due_date'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['rec_date'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['due_days'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['due_amount'];?>
                                                                </td>

                                                                <td>
                                                                    <?php 
                                                                        if ($rows['remark']!='Paid') {
                                                                            if ($rows['rec_date']!=NULL) {
                                                                            echo' <a href="pay-due.php?id='.$rows['id'].'" title="Pay"
                                                                                class="btn btn-primary"><i
                                                                                    class="fa fa-search"></i> Pay Due</a>';
                                                                            } else {
                                                                                echo' <a href="return-book.php?id='.$rows['c_id'].'" title="Pay"
                                                                                class="btn btn-info"><i
                                                                                    class="fa fa-search"></i> Return</a>';
                                                                            }
                                                                        }
                                                                    ?>
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
                                                                <th>C ID</th>
                                                                <th>Member ID</th>
                                                                <th>ACC ID</th>
                                                                <th>Due Date</th>
                                                                <th>Return Date</th>
                                                                <th>Due Days</th>
                                                                <th>Due Amount</th>
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
                                                                    <?php echo $rows['c_id'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['member_id'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['acc_id'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['due_date'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['rec_date'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['due_days'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['due_amount'];?>
                                                                </td>

                                                                <td>
                                                                    <?php 
                                                                        if ($rows['remark']!='Paid') {
                                                                            if ($rows['rec_date']!=NULL) {
                                                                            echo' <a href="pay-due.php?id='.$rows['id'].'" title="Pay"
                                                                                class="btn btn-primary"><i
                                                                                    class="fa fa-search"></i> Pay Due</a>';
                                                                            } else {
                                                                                echo' <a href="return-book.php?id='.$rows['c_id'].'" title="Pay"
                                                                                class="btn btn-info"><i
                                                                                    class="fa fa-search"></i> Return</a>';
                                                                            }
                                                                        }
                                                                    ?>
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
                                                                <th>C ID</th>
                                                                <th>Member ID</th>
                                                                <th>ACC ID</th>
                                                                <th>Due Date</th>
                                                                <th>Return Date</th>
                                                                <th>Due Days</th>
                                                                <th>Due Amount</th>
                                                                <th>Paid On</th>
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
                                                                    <?php echo $rows['c_id'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['member_id'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['acc_id'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['due_date'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['rec_date'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['due_days'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['due_amount'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['pay_date'];?>
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