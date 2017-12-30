<?php

function generateHTMLHeader($title) {
    echo <<<END
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
        <link rel="icon" href="images/logo.png">
        <title>$title</title>
        <!-- CSS Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- CSS Perso -->
        <link href="css/perso.css" rel="stylesheet">
    
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/code.js"></script> 
    </head>
    <img src='images/fond_bleu_25.png' style='
        position: fixed;
        left: 0px;
        top: 0px;
        height: 100%;
        width: 100%;
        display: block;
        z-index:-10'>";
    <body>
END;
}

function generateHTMLFooter() { //ATTENTION : MODEIFIé POUR LE JUMBOTRON
    echo "<br><br><br><br><br><br>";
    echo "<div class='jumbotron footer'>";
    if (!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn']) {
        echo "<a href='signin.php' style='font-size:100%; text-align: left'>Connexion pour élèves polytechniciens</a>";
    }
    else {
        echo "<a href='index.php?todo=logout' style='font-size:100%; text-align: left'>Déconnexion</a>";
    }
    echo <<<END
    </div>
    <script src="js/bootstrap.js"></script>
    </body>
    </html>
END;
}

function generateNavbar($askedPage) {
    global $page_list;

    echo <<<END
    <div class='menu'>
    <img src="images/bandeau_bleu.png" style="height:80px;width:100%;position:fixed;left:0;z-index:-1">
    <div id="logo" class="menuItem" style="height:80px">
        <a href="index.php"><img alt="logo" src="images/logo.png" style="height:100%"/></a>
    </div>
END;
    foreach ($page_list as $page) {
        if ($page['name'] != 'home') {
            echo "<div id='" . $page['name'] . "' class='menuItem'><a href='index.php?page=" . $page['name'] . "'";
            if ($askedPage == $page['name']) {
                echo " style='color:black'";
            }
            echo ">" . $page['menutitle'] . "</a></div>\n";
        }
    }

    echo <<<END
    <button id="toggler" style="
        position:absolute;
        right:0;
        top:0;
        height:60px;
        margin:10px;
        font-size: 200%;
        display:none;">
        Menu
    </button>
</div>
END;
}

?>