<?php
include('connec.php');



$sql = "SELECT dbname,dbuser,dbpass,id FROM db_databases WHERE isadded = 2";
$result = $objconn->query($sql);
while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $name = $row['dbname'];
    $user = $row['dbuser'];
    $pass = $row['dbpass'];
    
    

    $ok = shell_exec("/root/jobs/deldatabase $name $user");
    print_r($ok);



$up = "DELETE FROM db_databases WHERE id = '$id'";
$res = $objconn->query($up);
}
?>