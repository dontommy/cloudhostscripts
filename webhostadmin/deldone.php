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
            if(isset($_POST['submit3'])) {
                $theid = $_POST['theid'];
                $type = $_POST['type'];
                if($type == "domaindel" || $type == "subdomaindel") {
                    echo deletedomain($theid,$_SESSION['daba_userid']);
                }
                if($type == "dbdel") {
                    echo deletedb($theid,$_SESSION['daba_userid']);
                }
            }
            
            ?>
           
            
        </main>
        <?php include('footer.php'); ?>
        
        
    </div>


</body>
</html>
<?php } else { echo "get out bitch!"; } ?>