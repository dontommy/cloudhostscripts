<?php
include('connec.php');



$sql = "SELECT * FROM db_users WHERE isadded = 0";
$result = $objconn->query($sql);
while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $user = $row['username'];
    $pass = $row['password'];
    

    $ok = shell_exec("/root/jobs/adduser $user $pass");
    print_r($ok);



$up = "UPDATE db_users SET isadded = 1 WHERE id = '$id'";
$res = $objconn->query($up);
}
?>