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
    <body style='margin-top:80px'>
END;
}

function generateHTMLFooter() { //ATTENTION : MODEIFIé POUR LE JUMBOTRON
    echo "<br><br><br><br><br><br>";
    if (!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn']) {
        echo <<<END
    <div class="jumbotron" style="background-color:black; color:white ">
    <a href='connexion.php' style="font-size:100%; text-align: left">Connexion pour élèves polytechniciens</a>
    </div>
END;
    } else {
        echo <<<END
    <div class="jumbotron" style="background-color:black; color:white ">
    <a href='index.php?todo=logout' style="font-size:100%; text-align: left">Déconnexion</a>
    </div>
END;
    }
    echo <<<END
    <script src="js/bootstrap.js"></script>
    </body>
    </html>
END;
}


function isConnected() {
    return(array_key_exists('loggedIn', $_SESSION) && $_SESSION['loggedIn'] == true);
}

function logOut() {
    unset($_SESSION['loggedIn']);
    session_destroy();
}

$page_list = array(
    array(
        "name" => "home",
        "title" => "Point Gamma 2018",
        "menutitle" => ""),
    array(
        "name" => "lasoiree",
        "title" => "La Soirée",
        "menutitle" => "La Soirée"),
    array(
        "name" => "lineup",
        "title" => "La Line-Up",
        "menutitle" => "Line-Up"),
    array(
        "name" => "bars",
        "title" => "Les Bars",
        "menutitle" => "Les Bars"),
    array(
        "name" => "billeterie",
        "title" => "Billeterie",
        "menutitle" => "Billeterie"));

function checkPage($askedPage) {
    global $page_list;
    foreach ($page_list as $page) {
        if ($page["name"] == $askedPage) {
            return true;
        }
    }
    return false;
}

function getPageTitle($askedPage) {
    global $page_list;
    foreach ($page_list as $page) {
        if ($page["name"] == $askedPage) {
            return $page["title"];
        }
    }
    return "erreur";
}

function generateNavbar() {
    global $page_list;
    echo <<<END
    <div class="menu">
    <div id="logo" class="menuItem" style="height:80px">
        <a href="index.php"><img alt="logo" src="images/logo.png" style="height:100%"/></a>
    </div>
END;
    foreach ($page_list as $page) {
        if ($page['name'] != 'home') {
            echo "<div id=" . $page['name'] . " class='menuItem'>" . $page['menutitle'] . "</div>";
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