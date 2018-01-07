<?php

function display() {
    global $dbh;
    initConnexion();
    initDeconnexion();
    if (isConnected()) {
        $login = $_SESSION['login'];
        $user = User::getUser($dbh, $login);
    }
    $isPresident = false;
    if (isConnected()) {
        $isPresident = president($user);
    }
    inscrireDansUnBar();
    $idCandidatureBar = idCandidatureBar();

    $bar = null;
    if (isConnected()) {
        $bar = $user->getBar($dbh);
        displayVotreBar($bar, $isPresident);
    }


    displayBars($isPresident, $idCandidatureBar, $bar);
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

function displayBars($isPresident, $idCandidatureBar, $bar) {
    global $dbh;


    //Affichage de la liste des bars
    $query = "SELECT * FROM Bars;";
    $sth = $dbh->prepare($query);
    $sth->execute();
    while ($courant = $sth->fetch(PDO::FETCH_ASSOC)) {
        if ($bar == null || $courant['nom'] != $bar['nom']) {
            echo "<div class='row' style='position:relative'>";
            echo "<div class='contentBars'>";
            echo "<img src='" . $courant['image'] . " width='600' height='200' >";
            echo "<h2>" . $courant['nom'] . "</h2>";
            echo "<p>" . $courant['description'] . "</p>";
            if (isConnected() && !$isPresident) {
                if ($courant['id'] != $idCandidatureBar) {
                    echo "<a class='btn btn-info' href='index.php?page=bars&inscription_id=" . $courant['id'] . "' role='button' style='text-align: center'>S'inscrire</a>\n";
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
        echo $courant['login'];
        echo "<a class='btn btn-info' href='index.php?page=bars&approved_login=" . $courant['login'] . "' role='button' style='text-align: center'>Approuver</a>";
    }
    if (!$isThereCandidate) {
        echo "<p><b>Pas de candidats pour l'instant</b></p>";
    }
}

function approveCandidate() {
    global $dbh;
    //approbation par le president d'un membre
    if (isset($_GET['approved_login'])) {
        $approved_login = $_GET['approved_login'];
        $president = User::getUser($dbh, $_SESSION['login']);
        $query = "UPDATE Users SET bar=? WHERE login=?;"
                . "DELETE FROM ToBeApproved WHERE login=?;";
        $sth = $dbh->prepare($query);
        $sth->execute(array($president->bar, $approved_login, $approved_login));
    }
}

function displayVotreBar($bar, $isPresident) {
    global $dbh;
    if ($isPresident) {
        approveCandidate();
    }
    echo "<h2 style='text-align:center'>Votre Bar : " . $bar['nom'] . "</h2>";
    echo "<div class='row' style='position:relative'>";
    echo "<div class='contentBars'>";
    echo "<img src='" . $bar['image'] . " width='600' height='200' >";
    echo "<h2>" . $bar['nom'] . "</h2>";
    if ($isPresident) {
        echo "<script type='text/javascript' src='js/editinplace.js'></script>";
        //triche pour avoir $bar dans le js
        echo "<p id='barID' style='display:none'>".$bar['id']."</p>";

        
        echo "<p><textarea placeholder='Description du bar à compléter' id='desc' rows='4' cols='100'>" . $bar['description'] . "</textarea></p>"
        . "<input type='submit' id='submit' value='Enregistrer' />"."<p id='success'/>";
    } else {
        echo "<p>".$bar['description']."</p>";
    }
    echo "</div>\n";
    echo "</div>";
    echo "<h3>Membres du bar :</h3>";
    $query = "SELECT * FROM Users WHERE bar='" . $bar['id'] . "';";
    $sth = $dbh->prepare($query);
    $sth->execute();
    echo "<ul>";
    while ($courant = $sth->fetch()) {
        echo "<li>" . $courant['login'] . "</li>";
    }
    echo "</ul>";
    $sth->closeCursor();
    if ($isPresident) {
        displayCandidates();
    }
    echo "<br><hr><br>";
    echo "<h3>Autres bars :</h3>";
}
