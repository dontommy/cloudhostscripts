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
            
            <strong>Name Servers</strong><br />
            ns1.dabagroup.com<br />
            ns2.dabagroup.com<br />
            <br />
            <strong>FTP Server</strong><br />
            FTP Adress: ftp.dabagroup.com<br />
            <?php 
            $userinfo = listuserpass($_SESSION['daba_userid']);
            echo "FTP User: ".$userinfo['username']."<br />";
            echo "FTP Password: ".$userinfo['password']."<br />";
            ?>
            <br />
            <strong>Domains</strong><br />
            <?php
                    $dms = listdomains(0, $_SESSION['daba_userid']);
                    foreach($dms as $dm) {
                        $dmid = $dm['id'];
                        $dmname = $dm['domain'];
                        echo "$dmname<br />";
                        $dms = listdomains($dmid, $_SESSION['daba_userid']);
                        foreach($dms as $dm) {
                            $sdmid = $dm['id'];
                            $sdmname = $dm['domain'];
                            echo "$sdmname.$dmname<br />";
                        }
                    }
                    ?>
           <br />
           <strong>Dabases</strong><br />
           PhpMyAdmin is at: <?php $pmadomain = listdomain2pma($_SESSION['daba_userid']); $pma = $pmadomain['domain']; echo "<a href='http://$pma/phpmyadmin' target=_blank>$pma/phpmyadmin</a><br /><br />"; ?>
           <?php
                    $dms = listdatabases($_SESSION['daba_userid']);
                    foreach($dms as $dm) {
                        $dmid = $dm['id'];
                        $dmname = $dm['dbname'];
                        $dmuser = $dm['dbuser'];
                        $dmpass = $dm['dbpass'];
                        echo "DB Adress: 10.188.32.155<br />DB Name: $dmname<br />DB User: $dmuser<br />DB Pass: $dmpass<br />";
                    }
                    echo "<br />";
                    ?>
            
            
        </main>
        <?php include('footer.php'); ?>
        
        
    </div>


</body>
</html>
<?php } else { echo "get out bitch!"; } ?>