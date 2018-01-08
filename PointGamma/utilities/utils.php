<?php

$page_list = array(
    array(
        "name" => "home",
        "title" => "Point Gamma 2017",
        "menutitle" => "",
        "adresse" => "index.php"
    ),
    array(
        "name" => "lasoiree",
        "title" => "La Soirée",
        "menutitle" => "La Soirée",
        "adresse" => "index.php?page=lasoiree"
        ),
    array(
        "name" => "lineup",
        "title" => "La Line-Up",
        "menutitle" => "Line-Up",
        "adresse" => "index.php?page=lineup"
    ),
    array(
        "name" => "bars",
        "title" => "Les Bars",
        "menutitle" => "Les Bars",
        "adresse" => "index.php?page=bars"
    ),
    array(
        "name" => "billeterie",
        "title" => "Billeterie",
        "menutitle" => "Billeterie",
        "adresse" => "http://www.billeterieexample.com"
    )
);

$artist_list = array(
    array(
        "id" => "panteros666",
        "name" => "Panteros666",
        "image" => "panteros666.jpg"
    ),
    array(
        "id" => "salutcestcool",
        "name" => "Salut c'est cool",
        "image" => "salutcestcool.jpg"
    ),
    array(
        "id" => "benklock",
        "name" => "Ben Klock",
        "image" => "benklock.jpg"
    )
);

function isConnected() {
    return(array_key_exists('loggedIn', $_SESSION) && $_SESSION['loggedIn'] == true);
}

function logOut() {
    unset($_SESSION['loggedIn']);
    session_destroy();
}

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