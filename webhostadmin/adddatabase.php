<?php include('functions/init.php'); 
if($_SESSION['daba_login'] == 1) { ?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>DaBaSys - Web Hosting Admin</title>
</head>
<body>

    <div id="container">
        
        <?php include('header.php'); ?>
        <?php include('sidebar.php'); ?>
        <main>
            
           
            <h2>Add Database</h2>
            <?php
            $username = getusername($_SESSION['daba_userid']);
            $dbcount = getdbcount($_SESSION['daba_userid']);
            $forsla = $username.$dbcount;
            ?>
            
            <form action="" method="POST">
                
                <label for="dbname">DB Name:</label><input type="text" name="dbname" id="dbname" value="<?php echo $forsla; ?>"><br /><br />
                <label for="dbuser">DB User:</label><input type="text" name="dbuser" id="dbuser" value="<?php echo $forsla; ?>"><br /><br />
                <label for="dbpass">DB Pass:</label><input type="password" name="dbpass" id="dbpass"><br /><br />
                <label for="dbpass2">Repeat DB Pass:</label><input type="password" name="dbpass2" id="dbpass2"><br /><br />
                
                <input type="submit" name="submit" value="Submit" class="submit">
                
                
                <br /><br />
                <?php
                 if(isset($_POST['submit'])) {
                    $dbname = $objconn->real_escape_string($_POST['dbname']);
                    $dbuser = $objconn->real_escape_string($_POST['dbuser']);
                    $pass = $objconn->real_escape_string($_POST['dbpass']);
                    $pass2 = $objconn->real_escape_string($_POST['dbpass2']);
                    $error = 0;
                    if(empty($dbname) || empty($pass) || empty($pass2) || empty($dbuser)) {
                        echo "All fields required!";
                        $error++;
                    }
                    if($pass != $pass2) {
                        echo "Passwords dosnt match!";
                        $error++;
                    }
                    if($error == 0) {
                        echo adddatabase($dbname,$dbuser,$pass,$_SESSION['daba_userid']);
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