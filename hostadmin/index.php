<?php include('functions/init.php'); ?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>DaBaSys - Hosting Admin</title>
</head>
<body>

    <div id="container">
        
        <?php include('header.php'); ?>
       
        <main>
            
           
            <form action="" method="POST">
                <label for="logind">Login:</label><input type="password" name="logind" id="logind"><br /><br />
                <input type="submit" name="submit" class="submit">
            </form>
            
            <br /><br />
            <?php
            if(isset($_POST['submit'])) {
            $logind = $_POST['logind'];
            if($logind == "PASS") {
                $_SESSION['daba_login'] = 1;
                header("Location: index2.php");
            } else {
                header("Location: index.php");
            }
            }
            ?>
        </main>
        <?php include('footer.php'); ?>
        
        
    </div>


</body>
</html>
