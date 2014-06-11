<?php
include('connec.php');



$sql = "SELECT id FROM db_domains WHERE db_domains.isadded = 1 AND isslave = 0";
$result = $objconn->query($sql);
while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    
    $ok = shell_exec("/root/updateslave");

$up = "UPDATE db_domains SET isslave = 1";
$res = $objconn->query($up);
}

?>
