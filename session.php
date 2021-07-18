<?php
    include 'admin/config.php';
    session_start();

if (isset($_SESSION['sec-userid'])) {
    $userid = $_SESSION['sec-userid'];
    $ses_sql = mysqli_query($connect, "SELECT * FROM `members` WHERE member_id='$userid'");
    $mbr = $ses_sql->fetch_assoc();
    $count = mysqli_num_rows($ses_sql);
    if ($count < 0) {
        echo '<meta http-equiv="refresh" content="0; url=login.php" />';
        exit;
    }
}   else {
        echo '<meta http-equiv="refresh" content="0; url=login.php" />';
        exit;
}

?>