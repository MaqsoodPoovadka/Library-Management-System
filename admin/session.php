<?php
    include 'config.php';
    session_start();

if (isset($_SESSION['sec-user'])) {
    $uid = $_SESSION['sec-user'];
    $usql = mysqli_query($connect, "SELECT * FROM `admin` WHERE userid='$uid'");
    $user=$usql->fetch_assoc();
    $count = mysqli_num_rows($usql);
    if ($count < 0) {
        echo '<meta http-equiv="refresh" content="0; url=login.php" />';
        exit;
    }
}   else {
        echo '<meta http-equiv="refresh" content="0; url=login.php" />';
        exit;
}

    include 'systemc.php';
?>