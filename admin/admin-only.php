<?php
    $checkadmin = "SELECT role FROM admin WHERE userid='$uid'";
    $result = $connect->query($checkadmin);
    $row=$result->fetch_assoc();
    $role = $row['role'];
    
    if($role!='Admin') {
        echo '<meta http-equiv="refresh" content="0; url=index.php" />';
        exit;
    }
?>