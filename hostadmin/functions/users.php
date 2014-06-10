<?php
function adduser($user,$pass,$email) {
    include('connec.php');
    $sql = "SELECT id FROM db_users WHERE email = '$email' OR username = '$user'";
    $result = $objconn->query($sql);
    if($result->num_rows  == 0) {
    $sql = "INSERT INTO db_users (email,username,password,isadded) VALUES ('$email','$user','$pass','0')";
    $result = $objconn->query($sql);
    if($result == true) {
        return "Done!";
    }} else {
        return "Error!";
    }
    
    
}
?>