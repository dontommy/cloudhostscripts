<?php
function adddomain($domain,$userid) {
    include('connec.php');
    $sql = "SELECT id FROM db_domains WHERE domain = '$domain'";
    $result = $objconn->query($sql);
    if($result->num_rows  == 0) {
    $sql = "INSERT INTO db_domains (domain,parent,userid,isadded) VALUES ('$domain','0','$userid','0')";
    $result = $objconn->query($sql);
    if($result == true) {
        return "Done!";
    }} else {
        return "Error!";
    }
    
    
}
function addsubdomain($domain,$sub,$userid) {
    include('connec.php');
    $sql = "SELECT id FROM db_domains WHERE domain = '$sub' AND parent = '$domain'";
    $result = $objconn->query($sql);
    if($result->num_rows  == 0) {
    $sql = "INSERT INTO db_domains (domain,parent,userid,isadded) VALUES ('$sub','$domain','$userid','0')";
    $result = $objconn->query($sql);
    if($result == true) {
        return "Done!";
    }} else {
        return "Error!";
    }
    
    
}
function listdomains($parent,$userid) {
    include('connec.php');
    $sql = "SELECT id,domain FROM db_domains WHERE userid = '$userid' AND parent = '$parent'";
    $result = $objconn->query($sql);
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}
function getdomain($id,$userid) {
    include('connec.php');
    $sql = "SELECT domain FROM db_domains WHERE id = '$id' AND userid = '$userid'";
    $result = $objconn->query($sql);
    $row = $result->fetch_assoc();
    return $row['domain'];
}
function deletedomain($id,$userid) {
    include('connec.php');
    $sql = "UPDATE db_domains SET isadded = 2 WHERE id = '$id' AND userid = '$userid'";
    $result = $objconn->query($sql);
    if($result == true) {
        return "Done";
    } else {
        return "Error";
    }
}
function listdomain2pma($userid) {
    include('connec.php');
    $sql = "SELECT id,domain FROM db_domains WHERE userid = '$userid' and parent = '0' ORDER BY id DESC LIMIT 1";
    $result = $objconn->query($sql);
    while($row = $result->fetch_assoc()) {
        $rows = $row;
    }
    return $rows;
}
?>