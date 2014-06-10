<?php
include('connec.php');



$sql = "SELECT db_domains.id,domain,username FROM db_domains LEFT JOIN db_users ON (db_users.id = db_domains.userid) WHERE db_domains.isadded = 2 AND parent = 0";
$result = $objconn->query($sql);
while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $username = $row['username'];
    $domain = $row['domain'];
    

    $ok = shell_exec("/root/jobs/deldomain $domain $username");
    $ok = shell_exec("/root/rs-scripts/dns2del $domain");
    

$up = "DELETE FROM db_domains WHERE id = '$id'";
$res = $objconn->query($up);

$up = "DELETE FROM db_domains WHERE parent = '$id'";
$res = $objconn->query($up);
}
?>