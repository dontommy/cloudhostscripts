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
            
           
            <h2>Delete</h2>
            <?php
            $type = $_POST['type'];
            $id = $_POST['domain'];
            if($type == "domaindel") {
            $thed = getdomain($id, $_SESSION['daba_userid']);
            echo "Are you sure you want to delete <strong>$thed</strong> - And all its subdomains?!?";
            }
            if($type == "subdomaindel") {
                $thed = getdomain($id, $_SESSION['daba_userid']);
                echo "Are you sure you want to delete the subdomain <strong>$thed</strong>";
            }
            if($type == "dbdel") {
                $thed = getdbname($id, $_SESSION['daba_userid']);
                echo "Are you sure you want to delete the database <strong>$thed</strong> with user?";
            }
            
            ?>
            
            <br /><br />
            <form action="deldone.php" method="POST">
                <input type="hidden" name="theid" value="<?php echo $id; ?>">
                <input type="hidden" name="type" value="<?php echo $type; ?>">
                <input type="submit" name="submit3" class="submit" value="YES DELETE">
            </form>
            <form action="index2.php" method="POST">
                <input type="submit" name="submit2" class="submit" value="NO">
            </form>
            
            
            
            <br /><br />
           
            
        </main>
        <?php include('footer.php'); ?>
        
        
    </div>


</body>
</html>
<?php } else { echo "get out bitch!"; } ?>