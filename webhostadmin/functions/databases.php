<?php
function getdbcount($id) {
    include('connec.php');
    $sql = "SELECT COUNT(id) FROM db_databases WHERE userid = '$id'";
    $result = $objconn->query($sql);
    $row = $result->fetch_assoc();
    $count = $row['COUNT(id)'];
    $count++;
    return $count;
}
function adddatabase($dbname,$dbuser,$pass,$id) {
    include('connec.php');
    $sql = "SELECT id FROM db_databases WHERE dbname = '$dbname' OR dbuser = '$dbuser'";
    $result = $objconn->query($sql);
    if($result->num_rows  == 0) {
    $sql = "INSERT INTO db_databases (dbname,dbuser,dbpass,userid,isadded) VALUES ('$dbname','$dbuser','$pass','$id','0')";
    $result = $objconn->query($sql);
    if($result == true) {
        return "Done!";
    }} else {
        return "Error!";
    }
    
    
}
function listdatabases($userid) {
    include('connec.php');
    $sql = "SELECT id,dbname,dbuser,dbpass FROM db_databases WHERE userid = '$userid'";
    $result = $objconn->query($sql);
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}
function getdbname($id,$userid) {
    include('connec.php');
    $sql = "SELECT dbname FROM db_databases WHERE id = '$id' AND userid = '$userid'";
    $result = $objconn->query($sql);
    $row = $result->fetch_assoc();
    return $row['dbname'];
}
function deletedb($id,$userid) {
    include('connec.php');
    $sql = "UPDATE db_databases SET isadded = 2 WHERE id = '$id' AND userid = '$userid'";
    $result = $objconn->query($sql);
    if($result == true) {
        return "Done";
    } else {
        return "Error";
    }
}
   
?>