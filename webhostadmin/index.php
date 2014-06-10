<?php include('functions/init.php'); ?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>DaBaSys - Web Hosting Admin</title>
</head>
<body>

    <div id="container">
        
        <?php include('header.php'); ?>
       
        <main>
            
           
            <form action="" method="POST">
                <label for="email">Email:</label><input type="text" name="email" id="email"><br /><br />
                <label for="pass">Password:</label><input type="password" name="pass" id="pass"><br /><br />
                <input type="submit" name="submit" class="submit">
            </form>
            
            <br /><br />
            <?php
            if(isset($_POST['submit'])) {
            $email = $objconn->real_escape_string($_POST['email']);
            $pass = $objconn->real_escape_string($_POST['pass']);
            
            $sql = "SELECT id FROM db_users WHERE password = '$pass' AND email = '$email'";
            $result = $objconn->query($sql);
            $row = $result->fetch_assoc();
            if($result->num_rows == 1) {
                $_SESSION['daba_login'] = 1;
                $_SESSION['daba_userid'] = $row['id'];
                header("Location: index2.php");
            } else {
                header("Location: index.php");
            }}
            ?>
        </main>
        <?php include('footer.php'); ?>
        
        
    </div>


</body>
</html>
