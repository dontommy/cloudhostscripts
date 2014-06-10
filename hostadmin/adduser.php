<?php include('functions/init.php'); 
if($_SESSION['daba_login'] == 1) { ?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>DaBaSys - Hosting Admin</title>
</head>
<body>

    <div id="container">
        
        <?php include('header.php'); ?>
        <?php include('sidebar.php'); ?>
        <main>
            
           
            <h2>Add User</h2>
            
            <form action="" method="POST">
                <label for="username">Username:</label><input type="text" name="username" id="username"><br /><br />
                <label for="pass">Password:</label><input type="text" name="pass" id="pass"><br /><br />
                <label for="pass2">Repeat Password:</label><input type="text" name="pass2" id="pass2"><br /><br />
                <label for="email">Email:</label><input type="text" name="email" id="email"><br /><br />
                <input type="submit" name="submit" value="Submit" class="submit">
                
                
                <br /><br />
                <?php
                if(isset($_POST['submit'])) {
                    $username = $objconn->real_escape_string($_POST['username']);
                    $pass = $objconn->real_escape_string($_POST['pass']);
                    $pass2 = $objconn->real_escape_string($_POST['pass2']);
                    $email = $objconn->real_escape_string($_POST['email']);
                    if(empty($username) || empty($pass) || empty($pass2) || empty($email)) {
                        echo "All fields required!";
                    }
                    if($pass != $pass2) {
                        echo "Passwords dosnt match!";
                    }
                    else {
                        echo adduser($username,$pass,$email);
                    }
                }
                
                ?>
                
            </form>
            
            
        </main>
        <?php include('footer.php'); ?>
        
        
    </div>


</body>
</html>
<?php } else { echo "get out bitch!"; } ?>