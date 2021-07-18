<?php //include "config.php"; ?>
<?php
    
    //Due Date
    date_default_timezone_set("Asia/Kolkata");
    $currentdate    = date('Y-m-d');
    $sqldd = "UPDATE circulation SET overdue='Yes' WHERE r_date<'$currentdate' AND `status`='Issued' "; 
    $result = $connect->query($sqldd); 
    
    //$sqls = "SELECT * FROM circulation WHERE overdue='Yes'";
    //$result = $connect->query($sqls);
    //while($rows=$result->fetch_assoc()){
    //    echo $rows['id'];
    //    echo '<br>';

     //   $sqldd2 = "INSERT INTO `dues` (`c_id`) VALUES ('$rows[id]')";
     //   $res = $connect->query($sqldd2);
    //}

    //echo $currentdate;

    $sqldd2 = "INSERT IGNORE INTO dues (c_id, member_id, acc_id, due_date, rec_date) SELECT id, member_id, acc_id, r_date, rd_date FROM circulation WHERE overdue='Yes'";
    $res = $connect->query($sqldd2);

    $rdsql = "SELECT rd_date,id FROM circulation WHERE overdue='Yes' AND status='Returned'";
    $result = $connect->query($rdsql);
    while ($rdrow=$result->fetch_assoc()) {
        $recdate = $rdrow['rd_date'];
        
        //echo $rdrow['id'];
        //echo ' - ';
        //echo $recdate;
        //echo '<br>';

        $urdsql = "UPDATE `dues` SET `rec_date`='$recdate' WHERE c_id=$rdrow[id]";
        $urdres = $connect->query($urdsql);
    }
    
    

    //Due Amount
    //$sqldue = "SELECT r_date,id FROM circulation WHERE overdue='YES'";
    $sqldue = "SELECT due_date,rec_date,c_id FROM dues";

    $result = $connect->query($sqldue);
    while($rows=$result->fetch_assoc()) {
        $datedue = $rows['due_date'];
        $r_date=date_create("$datedue");
        if ($rows['rec_date']!=NULL) {
            $daterec = $rows['rec_date'];
            $c_date=date_create("$daterec");

        } else if ($rows['rec_date']==NULL){
            $c_date=date_create("now");
        }
        $diff=date_diff($r_date,$c_date);
        $due_day = $diff->format("%a");  
        $fine_amount = 2;
        $total_due = $fine_amount * $due_day;

        //echo $datedue . ' - ';
        //echo $daterec . ' - ';
        //echo $due_day . ' - ';
        //echo $total_due . '<br>';
        

        //$sqlda = "UPDATE `circulation` SET `due_amount`='$total_due' WHERE `overdue`='YES' AND `status`='Issued' AND id=$rows[id]";
        $sqlda = "UPDATE `dues` SET `due_amount`='$total_due',`due_days`='$due_day' WHERE c_id=$rows[c_id]";
        $sqlres = $connect->query($sqlda);
        
        //$sqlda1 = "INSERT INTO `dues` (`due_amount`,`status`) VALUES ('$total_due','Pending')";
        //$sqlres1 = $connect->query($sqlda1);
        //$sql = mysqli_query($connect, $sqlda);

    }

    //book copies update
    //$bsql = "SELECT book_id FROM copies GROUP BY book_id";
    $bsql = "SELECT DISTINCT book_id FROM copies";
    $bresult = $connect->query($bsql);
    while($brows=$bresult->fetch_assoc()) {
        
        $bookid = $brows['book_id'];
    
        $csql = "SELECT book_id FROM copies WHERE book_id= $bookid";
        $cresult = $connect->query($csql);
        $copies = mysqli_num_rows($cresult);
        
        //echo "<br>";
        //echo $bookid;
        //echo "=";
        //echo $copies;

        $ucopy = "UPDATE books SET copies='$copies' WHERE book_id='$bookid'";
        $ucres = $connect->query($ucopy);
    
    }

    //Borrowed Book Numbers
    $msql = "SELECT DISTINCT member_id FROM circulation";
    $mresult = $connect->query($msql);
    while ($mrows=$mresult->fetch_assoc()) {
        
        $memberid = $mrows['member_id'];
        
        $nsql = "SELECT member_id FROM circulation WHERE member_id='$memberid' AND status ='Issued'";
        $nresult = $connect->query($nsql);
        $nbooks = mysqli_num_rows($nresult);
        
        //echo '<br>';
        //echo $memberid;
        //echo "=";
        //echo $nbooks;

        $ubook = "UPDATE members SET book_nos='$nbooks' WHERE member_id='$memberid'";
        $ubres = $connect->query($ubook);
    }

   
        


    //$connect->close();

    

?>