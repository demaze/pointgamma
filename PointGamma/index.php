<?php

session_start();
require 'utilities/utils.php';
require 'utilities/generation.php';
require 'utilities/dataGestion.php';
require 'classes/User.php';
$dbh = Database::connect();

//gestion de la connexion
if (isset($_GET['todo']) && $_GET['todo'] == 'login' && isset($_POST['login']) && isset($_POST['mdp']) && User::isValidUser($dbh, $_POST['login'], $_POST['mdp'])) {
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['loggedIn'] = true;
}

//gestion de la deconnexion
if (isset($_GET['todo']) && $_GET['todo'] == 'logout') {
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
generateNavbar($askedPage);

//affichage du contenu
echo "<div class='container'>";

if ($authorized) {
    require("content/content_" . $askedPage . ".php");
    display();
} else {
    echo "<p>Désolé, la page demandée n'existe pas</p>";
}

echo "</div>";

echo "<img id='fond' src='images/fond_bleu_25.png' style='position: absolute; left: 0px; top: 0px; height: 100%; width: 100%; opacity: 0.8; display: block;z-index:-10'>";

generateHTMLFooter();
?>