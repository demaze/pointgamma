<?php
//Page php qui ne sera jamais affichée, mais qui est appelée par AJAX lors d'un changement de description d'un bar (->content_bars.php)
require_once 'dataGestion.php';
$dbh = Database::connect();

if (isset($_POST['desc']) && isset($_POST['barID'])) {
    $desc = htmlspecialchars($_POST['desc']);
    $barID = $_POST['barID'];
    $query = "UPDATE Bars SET description=? WHERE id=?"; //change la base SQL avec la nouvelle description
    $sth = $dbh->prepare($query);
    $request_succeeded = $sth->execute(array($desc, $barID));
    if ($request_succeeded) {
        echo "Success";
    } else {
        echo "Error";
    }
}

