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
                    <h3>Issue Book</h3>

                    <div class="col-md-12">
                        <div class="issue-book">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Fetch Detail
                                </div>
                                <div class="panel-body">
                                    <?php 
                                            if (isset($_GET['r_id'])) {
                                                $r_id  = $_GET["r_id"];
    
                                                $sqlres = mysqli_query($connect, "SELECT * FROM `reservation` WHERE r_id = '$r_id'");
                                                $rrec = mysqli_fetch_assoc($sqlres);
    
                                                if (empty($r_id)) {
                                                    echo '<meta http-equiv="refresh" content="0; url=issue-book.php">';
                                                }
                                            
                                    ?>
                                    <form action="" method="post">
                                        
                                        <fieldset class="col-md-4">
                                            <label>Member : </label>
                                            <input type="text" name="member_id" id="member_id"
                                                class="form-control1 control3" value="<?php echo $rrec['member_id'];?>" readonly>
                                        </fieldset>


                                        <fieldset class="col-md-4">
                                            <label>Book : </label>
                                            <input type="text" name="acc_id" id="acc_id" 
                                                class="form-control1 control3" value="<?php echo $rrec['acc_id'];?>" readonly>
                                        </fieldset>


                                        <fieldset class="col-md-4">
                                            <label>Date of Issue : </label>
                                            <input type="date" name="i_date" value="<?php echo date('Y-m-d');?>"
                                                class="form-control1 control3">
                                        </fieldset>


                                        <hr>
                                        <input type="submit" name="fetch" class="btn-info btn" value="Fetch" />
                                        <input type="reset" name="reset" class="btn-danger btn" />

                                    </form>


                                    <?php
                                    }
                                    if (isset($_POST['fetch'])) {
                                        $acc_id    = $_POST['acc_id'];
                                        $member_id = $_POST['member_id'];
                                        $i_date     = $_POST['i_date'];


                                        $check= mysqli_query($connect, "SELECT book_nos,program,staff_type,designation FROM `members` WHERE member_id = '$member_id'");
                                        $chrow = mysqli_fetch_assoc($check);
                                        $bnr = 0;
                                        if ($chrow['program']=='UG') {
                                            $bnr = 3;
                                        } else if ($chrow['program']=='PG') {
                                            $bnr = 5;
                                        } else if ($chrow['program']=='Research Scholar') {
                                            $bnr = 5;
                                        } else if ($chrow['staff_type']=='Non Teaching Staff') {
                                            $bnr = 5;
                                        } else if ($chrow['staff_type']=='Teaching Staff') {
                                            if ($chrow['designation']!='Guest Lecturer'){
                                                $bnr = 5;
                                            } else if ($chrow['designation']=='Guest Lecturer'){
                                                $bnr = 10;
                                            }
                                        }
                                        //echo $bookr;
                                        
                                        if ($chrow['book_nos'] >= $bnr) {
                                            echo '<script>alert("Member allocated full")</script>';
                                        } else {
                                            echo '<meta http-equiv="refresh" content="0; url=?r_id='.$r_id.'&a_id='.$acc_id.'&m_id='.$member_id.'&idate='.$i_date.'">';
                                        }
                                        
                                        
                                    }
                                ?>




                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- if -->
                    <div class="row">
                        <?php
                                        if (isset($_GET['m_id'],$_GET['a_id'],$_GET['idate'])) {
                                            $m_id  = $_GET["m_id"];
                                            $a_id  = $_GET["a_id"];
                                            $idate = $_GET["idate"];
                                            $rdate = date('Y-m-d', strtotime("$idate +45 days"));

                                            $sqlmember = mysqli_query($connect, "SELECT * FROM `members` WHERE member_id = '$m_id'");
                                            $rowm = mysqli_fetch_assoc($sqlmember);

                                            $sqlbook = mysqli_query($connect, "SELECT * FROM `copies` WHERE acc_id = '$a_id'");
                                            $rowb = mysqli_fetch_assoc($sqlbook);
                                            if (empty($m_id&$a_id)) {
                                                echo '<meta http-equiv="refresh" content="0; url=issue-book.php">';
                                            }

                                            if($rowm['member_type']=="Student"){
                                                $m_type = "Student";
                                                
                                            } else if($rowm['member_type']=="Staff"){
                                                $m_type = 'Staff';
                                            }
                                            

                                        
                        ?>

                        <form action="" method="post">

                            <div class="col-md-6">
                                <div class="issue-book">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <?php echo $m_type;?>
                                        </div>
                                        <div class="panel-body">

                                            <label>Member ID : </label>
                                            <input type="text" name="mid" id="mid" class="form-control1 control3"
                                                value="<?php echo $rowm['member_id']?>">

                                            <label>Name : </label>
                                            <input type="text" name="name" id="name" class="form-control1 control3"
                                                value="<?php echo $rowm['name']?>">


                                            <label>Department : </label>
                                            <input type="text" name="dept" id="ddept" class="form-control1 control3" 
                                                value="<?php echo $rowm['dept']?>">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="issue-book">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Book Detail
                                        </div>
                                        <div class="panel-body">

                                            <label>ACC ID : </label>
                                            <input type="text" name="acc_id" id="acc_id" class="form-control1 control3"
                                                value="<?php echo $rowb['acc_id']?>">

                                            <label>Book ID : </label>
                                            <input type="text" name="book_id" id="book_id"
                                                class="form-control1 control3" value="<?php echo $rowb['book_id']?>">

                                            <label>Title : </label>
                                            <input type="text" name="title" id="title" class="form-control1 control3"
                                                value="<?php echo $rowb['title']?>">


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="issue-book">
                                    <div class="panel panel-default">

                                        <div class="panel-body">

                                            <fieldset class="col-md-6">
                                                <label>Date of Issue : </label>
                                                <input type="date" name="i_date" value="<?php echo $idate?>"
                                                    class="form-control1 control3">
                                            </fieldset>
                                            <fieldset class="col-md-6">
                                                <label>Date of Return : </label>
                                                <input type="date" name="r_date" value="<?php echo $rdate;?>"
                                                    class="form-control1 control3">
                                            </fieldset>

                                            <hr>
                                            <input type="submit" name="issue" class="btn-success btn"
                                                value="Issue Book" />
                                            <input type="cancel" name="cancle" class="btn-info btn" value="Cancel" />
                                            <input type="reset" name="reset" class="btn-danger btn" />

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                                <?php
                                
                                    if (isset($_POST['issue'])) {
                                        
                                        $m_id    = $_POST['mid'];
                                        $name    = $_POST['name'];

                                        $acc_id    = $_POST['acc_id'];
                                        $book_id    = $_POST['book_id'];
                                        $title      = $_POST['title'];
                                        
                                        $i_date     = $_POST['i_date'];
                                        $r_date     = $_POST['r_date'];
                                        
    
                                        $issue1 = "INSERT INTO `circulation`(`acc_id`, `book_id`, `title`, `member_id`, `name`, `i_date`, `r_date`, `status`) VALUES ('$acc_id', '$book_id', '$title', '$m_id', '$name', '$i_date', '$r_date', 'Issued')";
                                        $sql = mysqli_query($connect, $issue1);

                                        $issue2 = "UPDATE `copies` SET `avail`='Issued' WHERE `acc_id`='$acc_id'";
                                        $sql = mysqli_query($connect, $issue2);

                                        $issue3 = "UPDATE `reservation` SET `isd_date`='$idate', `status`='Issued' WHERE `r_id`='$r_id'";
                                        $sql = mysqli_query($connect, $issue3);
                                    
                                        echo '<meta http-equiv="refresh" content="0; url=circulation.php">';
                                    }
                                ?>
                        <?php   }   ?>


                    </div>


                    <!--//if-->




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