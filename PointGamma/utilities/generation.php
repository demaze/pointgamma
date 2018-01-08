<?php

function generateHTMLHeader($title) {
    echo <<<END
    <!DOCTYPE html>
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
    <body>
END;
}

function generateHTMLFooter() { //ATTENTION : MODEIFIé POUR LE JUMBOTRON
    echo "<br><br><br><br><br><br>";
    echo "<div class='jumbotron footer'>";
    if (!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn']) {
        echo "<a href='signin.php' style='font-size:100%; text-align: left'>Connexion pour élèves polytechniciens</a>";
    } else {
        echo "Connecté en tant que " . $_SESSION['login'] . "<br>";
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


    if ($askedPage == 'home') {
        echo "<div class='menu animated fadeInUp' style='background:none'>";
    } else {
        echo "<div class='menu'>";
        echo "<img alt='fond' src='images/fond_bleu_25.png' class='bandeau'>";
    }
    echo <<<END
    <div id="logo" class="menuItem" style="height:80px">
        <a href="index.php"><img alt="logo" src="images/logo.png" style="height:100%"/></a>
    </div>
END;
    foreach ($page_list as $page) {
        if ($page['name'] != 'home') {
            echo "<div id='" . $page['name'] . "' class='menuItem'><a href='" . $page['adresse'] . "'";
            if ($askedPage == $page['name']) {
                echo " style='color:black'";
            }
            echo ">" . $page['menutitle'] . "</a></div>\n";
        }
    }

    echo <<<END
<img id='toggler' src='images/toggler.png' class='toggler'>
</div>
END;
}

?>