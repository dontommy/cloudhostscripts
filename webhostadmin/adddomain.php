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
            
           
            <h2>Add Domain</h2>
            
            <form action="" method="POST">
                <label for="domain">Domain:</label><input type="text" name="domain" id="domain"><br /><br />
                <input type="submit" name="submit" value="Submit" class="submit">
                
                
                <br /><br />
                <?php
                if(isset($_POST['submit'])) {
                    $domain = $objconn->real_escape_string($_POST['domain']);
                    if(empty($domain)) {
                        echo "All fields required!";
                    }
                    else {
                        echo adddomain($domain,$_SESSION['daba_userid']);
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