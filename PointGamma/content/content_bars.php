<?php

function display() {
    global $dbh;
    //gestion de la connexion
    if (isset($_GET['todo']) && $_GET['todo'] == 'login' && isset($_POST['login']) && isset($_POST['mdp']) && User::isValidUser($dbh, $_POST['login'], $_POST['mdp'])) {
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['loggedIn'] = true;
    }
    //gestion de la deconnexion
    if (isset($_GET['todo']) && $_GET['todo'] == 'logout') {
        logOut();
    }
    //on stocke si l'utilisateur est president ou non
    $isPresident = false;
    if (isConnected()) {
        $login = $_SESSION['login'];
        $user = User::getUser($dbh, $login);
        if ($user->isPresident($dbh)) {
            $isPresident = true;
        }
    }
    
    
    $query = "SELECT * FROM Bars;";
    $sth = $dbh->prepare($query);
    $sth->execute();
    while ($courant = $sth->fetch(PDO::FETCH_ASSOC)) {
        echo "<br>\n";
        echo "<div class='row rowBar'>\n";
        echo "  <div class='col-md-4 titreBar'>\n";
        echo "      <h1>" . $courant['nom'] . "</h1>\n";
        echo "      <img src='" . $courant['image'] . "' style='max-width:100%;max-height: 100%'/>\n";
        echo "  </div>\n";
        echo "  <div class='col-md-8 descriptionBar'>\n";
        echo "      <p>" . $courant['description'] . "</p>\n";
        if (isConnected() && !$isPresident) {
            echo "<a class='btn btn-info' href='index.php?page=bars&inscription_id=" . $courant['id'] . "' role='button' style='text-align: center'>S'inscrire</a>\n";
        }
        echo "  </div>\n";
        echo "</div>\n";
        echo "<br>\n";
        echo "<br>\n";
    }
//gestion de l'inscription dans un bar
    if (isset($_GET['inscription_id']) && isConnected()) {
        $id = $_GET['inscription_id'];
        $login = $_SESSION['login'];
        $query = "INSERT INTO ToBeApproved VALUES (?, ?)";
        $sth = $dbh->prepare($query);
        $sth->execute(array($login, $id));
    }
//page du president
    $noCandidate = true;
    if (isConnected()) {
        $login = $_SESSION['login'];
        $user = User::getUser($dbh, $login);
        if ($isPresident) {
            echo "<h2>Membres en attente de validation</h2>";
            $query = "SELECT * FROM ToBeApproved WHERE id_bar='$user->bar'";
            $sth = $dbh->prepare($query);
            $sth->execute();
            while ($courant = $sth->fetch()) {
                $noCandidate = false; //ATTENTION : A REGLER, IL FAUT QUE NOCANDIDATE SOIT TRUE QUAND IL N'Y A QU'UN SEUL CANDIDAT, CELUI QU'ON VIENT D'ACCEPTER
                if (!isset($_GET['approved_login']) || '' . $_GET['approved_login'] != $courant['login']) {
                    echo $courant['login'];
                    echo "<a class='btn btn-info' href='index.php?page=bars&approved_login=" . $courant['login'] . "' role='button' style='text-align: center'>Approuver</a>";
                }
            }
        }
    }
//approbation par le president d'un membre
    if ($isPresident && isset($_GET['approved_login'])) {
        $approved_login = $_GET['approved_login'];
        $president = User::getUser($dbh, $_SESSION['login']);
        $query = "UPDATE Users SET bar=? WHERE login=?;"
                . "DELETE FROM ToBeApproved WHERE login=?;";
        $sth = $dbh->prepare($query);
        $sth->execute(array($president->bar, $approved_login, $approved_login));
    }
    if ($noCandidate && $isPresident) {
        echo "Aucune candidature pour l'instant.";
    }
}


?>




