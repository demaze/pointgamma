<?php

session_start();
require_once 'utilities/utils.php';
require_once 'utilities/dataGestion.php';
require_once 'classes/User.php';

$dbh = Database::connect();

//gestion de la connexion
if (isset($_GET['todo']) && $_GET['todo']=='login' && User::isValidUser($dbh, $_POST['login'], $_POST['mdp'])) {
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['loggedIn'] = true;
}

//gestion de la deconnexion
if(isset($_GET['todo']) && $_GET['todo']=='logout') {
    logOut();
}

//selection des pages
if (isset($_GET["page"])) {
    $askedPage = $_GET["page"];
} else {
    $askedPage = "home";
}
$authorized = checkPage($askedPage);
if ($authorized) {
    $pageTitle = getPageTitle($askedPage);
} else {
    $pageTitle = "erreur";
}


generateHTMLHeader($pageTitle);

//navBar
generateNavbar();
echo "<br><br><br><br><br><br><br>";

//affichage du contenu
echo "<div class='container'>";
if ($authorized) {
    require_once("content/content_" . $askedPage . ".php");
    display();
} else {
    echo "<p>Désolé, la page demandée n'existe pas</p>";
}
echo "</div>";

generateHTMLFooter();

