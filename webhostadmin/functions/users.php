<?php
function getusername($id) {
    include('connec.php');
    $sql = "SELECT username FROM db_users WHERE id = '$id'";
    $result = $objconn->query($sql);
    $row = $result->fetch_assoc();
    return $row['username'];
}
function listuserpass($id) {
    include('connec.php');
    $sql = "SELECT username,password FROM db_users WHERE id = '$id'";
    $result = $objconn->query($sql);
    while($row = $result->fetch_assoc()) {
        $rows = $row;
    }
    return $rows;
}
?>