<?php
include('connec.php');



$sql = "SELECT dbname,dbuser,dbpass,id FROM db_databases WHERE isadded = 0";
$result = $objconn->query($sql);
while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $name = $row['dbname'];
    $user = $row['dbuser'];
    $pass = $row['dbpass'];
    
    

    $ok = shell_exec("/root/rs-scripts/dbadd $name $user $pass");
    print_r($ok);



$up = "UPDATE db_databases SET isadded = 1 WHERE id = '$id'";
$res = $objconn->query($up);
}
?>