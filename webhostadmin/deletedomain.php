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
            
           
            <h2>Delete Domain</h2>
            <form action="delchecker.php" method="POST">
                <label for="domain">Domain:</label><select name="domain" id="domain">
                    <?php
                    $dms = listdomains(0, $_SESSION['daba_userid']);
                    foreach($dms as $dm) {
                        $dmid = $dm['id'];
                        $dmname = $dm['domain'];
                        echo "<option value='$dmid'>$dmname</option>";
                    }
                    ?>
                </select><br /><br />
                <input type="hidden" name="type" value="domaindel">
                <input type="submit" name="submit" value="Submit" class="submit">
                
                
                
                
            </form>
            
            
        </main>
        <?php include('footer.php'); ?>
        
        
    </div>


</body>
</html>
<?php } else { echo "get out bitch!"; } ?>