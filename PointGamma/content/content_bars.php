<?php
function display() {
    global $dbh;
    
    initConnexion(); //on regarde si un utilisateur se connecte
    initDeconnexion(); //ou se deconnecte
    
    if (isConnected()) {
        $login = $_SESSION['login'];
        $user = User::getUser($dbh, $login); //on stocke les donnees de l'utilisateur actif
    }
    
    $isPresident = false;
    if (isConnected()) {
        $isPresident = president($user); //on stocke dans la variable si l'utilisateur est president de son bar
    }
       
    inscrireDansUnBar(); //on approuve l'utilisateur à approuver s'il existe
    leaveBar(); //on fait quitter le bar à l'utilisateur s'il a cliqué sur cliquer
    $bar = null;
    if (isConnected()) {
        $bar = $user->getBar($dbh); //on stocke dans le tableau bar le bar éventuel de l'utilisateur
        if ($bar != null) {
            displayVotreBar($bar, $isPresident); //on affiche les infos relatives au bar de l'utilisateur connecté
        }
    }
    displayBars($isPresident, $bar); //on affiche la liste des bars
}
//FONCTIONS UTILISEES DANS DISPLAY
function initConnexion() {
    global $dbh;
    //gestion de la connexion
    if (isset($_GET['todo']) && $_GET['todo'] == 'login' && isset($_POST['login']) && isset($_POST['mdp']) && User::isValidUser($dbh, $_POST['login'], $_POST['mdp'])) {
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['loggedIn'] = true;
    }
}
function initDeconnexion() {
    //gestion de la deconnexion
    if (isset($_GET['todo']) && $_GET['todo'] == 'logout') {
        logOut();
    }
}
function president($user) {
    global $dbh;
//on stocke si l'utilisateur est president ou non
    $isPresident = false;
    if ($user->isPresident($dbh)) {
        $isPresident = true;
    }
    return $isPresident;
}
function inscrireDansUnBar() {
    global $dbh;
    //gestion de l'inscription dans un bar
    if (isset($_GET['inscription_id']) && isConnected()) {
        $id = $_GET['inscription_id'];
        $login = $_SESSION['login'];
        $query = "DELETE FROM ToBeApproved WHERE login=?;";
        $sth = $dbh->prepare($query);
        $sth->execute(array($login));
        $query = "INSERT INTO ToBeApproved VALUES (?, ?);";
        $sth = $dbh->prepare($query);
        $sth->execute(array($login, $id));
    }
}
function idCandidatureBar() {
    global $dbh;
    //on regarde si l'utilisateur est deja en attente d'une validation
    $idCandidatureBar = -1;
    if (isConnected()) {
        $login = $_SESSION['login'];
        $query = "SELECT * FROM ToBeApproved WHERE login=?;";
        $sth = $dbh->prepare($query);
        $sth->execute(array($login));
        while ($courant = $sth->fetch()) {
            $idCandidatureBar = $courant['id_bar'];
        }
        $sth->closeCursor();
    }
    return $idCandidatureBar;
}
function displayBars($isPresident, $bar) {
    global $dbh;
    $idCandidatureBar = idCandidatureBar(); //utile à stocker pour savoir quand afficher "candidature envoyée"
    //Affichage de la liste des bars
    $query = "SELECT * FROM Bars;";
    $sth = $dbh->prepare($query);
    $sth->execute();
    while ($courant = $sth->fetch(PDO::FETCH_ASSOC)) {
        if ($bar == null || $courant['nom'] != $bar['nom']) {
            echo "<div class='row' style='position:relative'>";
            echo "<div class='contentBars'>";
            echo "<img src='" . $courant['image'] . "' width='400' height='200' >";
            echo "<h2>" . $courant['nom'] . "</h2>";
            echo "<p>" . $courant['description'] . "</p>";
            if (isConnected() && !$isPresident) {
                if ($courant['id'] != $idCandidatureBar) {
                    echo "<a class='btn btn-info' href='index.php?page=bars&inscription_id=" . $courant['id'] . "' role='button' style='text-align: center'>S'inscrire";
                    if($bar!=null) {echo " et quitter votre bar";}
                    echo"</a>\n";
                } else {
                    echo "<p><b>Candidature envoyée.</b></p>";
                }
            }
            echo "</div>\n";
            echo "</div>\n<br><br><br>\n";
        }
    }
    $sth->closeCursor();
}
function displayCandidates() {
    global $dbh;
    
    //Affiche les candidats a un bar, et permet au president de les approuver ou non
    echo "<br>";
    echo "<h3>Candidats en attente de validation</h3>";
    $login = $_SESSION['login'];
    $user = User::getUser($dbh, $login);
    $bar = $user->bar;
    $isThereCandidate = false;
    $query = "SELECT * FROM ToBeApproved WHERE id_bar='$bar'";
    $sth = $dbh->prepare($query);
    $sth->execute();
    while ($courant = $sth->fetch()) {
        $isThereCandidate = true;
        echo "<p><a class='btn btn-success' href='index.php?page=bars&approved_login=" . $courant['login'] . "' role='button' style='text-align: center'>Approuver</a>  ";
        echo "<a class='btn btn-danger' href='index.php?page=bars&disapproved_login=" . $courant['login'] . "' role='button' style='text-align: center'>Refuser</a>  ";
        echo $courant['login'] . "</p>";
    }
    if (!$isThereCandidate) {
        echo "<p><b>Pas de candidats pour l'instant</b></p>";
    }
}
//approbation par le president d'un membre
function approveCandidate() {
    global $dbh;
    if (isset($_GET['approved_login'])) {
        $approved_login = $_GET['approved_login'];
        $president = User::getUser($dbh, $_SESSION['login']);
        $query = "UPDATE Users SET bar=? WHERE login=?;"
                . "DELETE FROM ToBeApproved WHERE login=?;";
        $sth = $dbh->prepare($query);
        $sth->execute(array($president->bar, $approved_login, $approved_login));
    }
}
//desapprobation par le president d'un membre
function disapproveCandidate() {
    global $dbh;
    if (isset($_GET['disapproved_login'])) {
        $disapproved_login = $_GET['disapproved_login'];
        $president = User::getUser($dbh, $_SESSION['login']);
        $query = "DELETE FROM ToBeApproved WHERE login=?;";
        $sth = $dbh->prepare($query);
        $sth->execute(array($disapproved_login));
    }
}
//renvoi d'un membre par le president
function removeSomeone() {
    global $dbh;
    if (isset($_GET['remove_login'])) {
        $removed_login = $_GET['remove_login'];
        $query = "UPDATE Users SET bar=NULL WHERE login=?";
        $sth = $dbh->prepare($query);
        $sth->execute(array($removed_login));
    }
}
//si l'utilisateur veut quitter son bar
function leaveBar() {
    global $dbh;
    if (isset($_GET['leaving']) && $_GET['leaving']) {
        $login = $_SESSION['login'];
        $query = "UPDATE Users SET bar=NULL WHERE login=?";
        $sth = $dbh->prepare($query);
        $sth->execute(array($login));
    }
}
//affiche les infos du bar de l'utilisateur connecté, plus son interface de président s'il l'est
function displayVotreBar($bar, $isPresident) {
    if ($bar == null) {
        return; //on s'assure que l'utilisateur est dans un bar
    }
    global $dbh;
    //resolution des requetes d'approbation/desapprobation ou d'un renvoi du bar
    if ($isPresident) {
        approveCandidate();
        disapproveCandidate();
        removeSomeone();
    }
    echo "<h2 style='text-align:center'><u>Votre Bar</u></h2>";
    echo "<div class='row' style='position:relative'>";
    echo "<div class='contentBars'>";
    echo "<img src='" . $bar['image'] . "' width='400' height='200' >";
    echo "<h2>" . $bar['nom'] . "</h2>";
    
    //le president peut changer la description
    if ($isPresident) { 
        echo "<script type='text/javascript' src='js/editinplace.js'></script>"; //script AJAX pour pouvoir editer la description
        //triche pour avoir $bar dans le js
        echo "<p id='barID' style='display:none'>" . $bar['id'] . "</p>";
        echo
        "<div id=divDescBar>" .
        "<p id=descBar>" . $bar['description'] . "</p>" .
        "<input type='submit' id='descBarModifier' value='Modifier' />" .
        "</div>" .
        "<div id=divDescBarMod style='display:none'>" .
        "<p><textarea placeholder='Description du bar à compléter' id='descBarMod' rows='4' cols='80' maxlength='500'>" . $bar['description'] . "</textarea></p>" .
        "<input type='submit' id='descBarEnregistrer' value='Enregistrer' />" .
        "</div>";
    } else {
        echo "<p>" . $bar['description'] . "</p>"; //si l'on est pas president, on peut juste voir la description actuelle
    }
    echo "</div>\n";
    echo "</div>";
    
    //Affichages des membres du bar, que le president peut renvoyer
    echo "<h3>Membres du bar</h3>";
    $query = "SELECT * FROM Users WHERE bar='" . $bar['id'] . "';";
    $sth = $dbh->prepare($query);
    $sth->execute();
    while ($courant = $sth->fetch()) {
        if ($bar['president'] == $courant['login']) {
            echo "<p>" . $courant['login'] . " (Président)</p>";
        } else {
            if ($isPresident) { // renvoi possible des membres
                echo "<p><a class='btn btn-info' style='padding-left:14px; padding-right:14px' href='index.php?page=bars&remove_login=" . $courant['login'] . "' role='button' style='text-align: center'>Renvoyer</a>";
                echo " " . $courant['login'] . "</p>";
            } else { 
                echo "<p>" . $courant['login'] . "</p>";
            }
        }
    }
    $sth->closeCursor();
    
    //gestion des candidats au bar
    if ($isPresident) {
        displayCandidates();
    }
    
    //possibilité pour les membres de quitter le bar
    if (!$isPresident) {
        echo "<a class='btn btn-danger' href='index.php?page=bars&leaving=true' role='button' style='text-align:center'>Quitter le bar</a>";
    }
    echo "<br><hr><br>";
    echo "<h2 style='text-align:center'><u>Autres bars</u></h2>";
}
