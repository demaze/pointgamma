<?php

function generateHTMLReader($title, $cssPath) {
    echo <<<GOUMAGE
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset ="UTF-8">
                <meta name="author" content="Matthieu Plaszczynski">
                <title>$title</title>
                <link href="$cssPath" rel="stylesheet">
            </head>
            <body>
GOUMAGE;
}

function generateHTMLFooter() {
    echo <<<GOUMAGE
            </body>
        </html>
GOUMAGE;
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
