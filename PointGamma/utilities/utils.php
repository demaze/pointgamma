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
    <body>
END;
}

function generateHTMLFooter() {
    echo <<<END
    <script src="js/bootstrap.js"></script>
    </body>
    </html>
END;
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
        echo "<div id=" . $page['name'] . " class='menuItem'>" . $page['menutitle'] . "</div><br>";
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
        "title" => "Point Gamma 2017",
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

?>
