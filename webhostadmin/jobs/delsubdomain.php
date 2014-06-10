<?php
include('connec.php');



$sql = "SELECT db_domains.id,domain,username,parent FROM db_domains LEFT JOIN db_users ON (db_users.id = db_domains.userid) WHERE db_domains.isadded = 2 AND parent != 0";
$result = $objconn->query($sql);
while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $username = $row['username'];
    $domain = $row['domain'];
    $parent = $row['parent'];
    
    $sq = "SELECT domain FROM db_domains WHERE id = '$parent'";
    $res1 = $objconn->query($sq);
    while($ro = $res1->fetch_assoc()) {
        $maindomain = $ro['domain'];
    }
echo $fixedsub = $domain.".".$maindomain;
    shell_exec("/root/jobs/delsubdomain $domain $maindomain $username");
    shell_exec("/root/rs-scripts/dns2subdel $fixedsub");
    



$up = "DELETE FROM db_domains WHERE id = '$id'";
$res = $objconn->query($up);

}
?>