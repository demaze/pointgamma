<?php

$page_list = array(
    array(
        "name" => "home",
        "title" => "Point Gamma 2018",
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
        "name" => "billetterie",
        "title" => "Billetterie",
        "menutitle" => "Billetterie",
        "adresse" => "http://www.billetterieexample.com"
    )
);

$artist_list = array(
    array(
        "id" => "panteros666",
        "nom" => "Panteros666",
        "image" => "panteros666scene.jpg",
        "portrait" =>"panteros666.jpg",
        "lien" => "https://www.youtube.com/watch?v=ArlBfWwyFdk"
    ),
    array(
        "id" => "salutcestcool",
        "nom" => "Salut c'est cool",
        "image" => "salutcestcoolscene.png",
        "portrait" =>"salutcestcool.jpg",
        "lien" => "https://www.youtube.com/watch?v=x537Cqg5nEI"
    ),
    array(
        "id" => "benklock",
        "nom" => "Ben Klock",
        "image" => "benklockscene.jpg",
        "portrait" =>"benklock.jpg",
        "lien" => "https://www.youtube.com/watch?v=5IrHzrg4qdQ"
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