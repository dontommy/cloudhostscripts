<?php
include('connec.php');



$sql = "SELECT db_domains.id,domain,username,email FROM db_domains LEFT JOIN db_users ON (db_users.id = db_domains.userid) WHERE db_domains.isadded = 0 AND parent = 0";
$result = $objconn->query($sql);
while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $username = $row['username'];
    $domain = $row['domain'];
    $email = $row['email'];

    $ok = shell_exec("/root/jobs/adddomain $domain $username");
    $ok = shell_exec("/root/rs-scripts/domain2dns $domain $email");


$up = "UPDATE db_domains SET isadded = 1 WHERE id = '$id'";
$res = $objconn->query($up);
}

$sql = "SELECT db_domains.id,domain,username,email,parent FROM db_domains LEFT JOIN db_users ON (db_users.id = db_domains.userid) WHERE db_domains.isadded = 0 AND parent != 0";
$result = $objconn->query($sql);
while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $username = $row['username'];
    $domain = $row['domain'];
    $parent = $row['parent'];
    $email = $row['email'];
    
    $sq = "SELECT domain FROM db_domains WHERE id = '$parent'";
    $res1 = $objconn->query($sq);
    while($ro = $res1->fetch_assoc()) {
        $maindomain = $ro['domain'];
    }
$thesub = $domain.".".$maindomain;
$ok = shell_exec("/root/rs-scripts/subdomain2dns $thesub $email");


    $ok = shell_exec("/root/jobs/addsubdomain $domain $maindomain $username");

$up = "UPDATE db_domains SET isadded = 1 WHERE id = '$id'";
$res = $objconn->query($up);
}
?>