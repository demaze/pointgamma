<?php
require_once '../utilities/dataGestion.php';
$dbh = Database::connect();
if (isset($_GET['todo']) && $_GET['todo'] == "changeDesc") {
    $desc = $_POST['contentDesc'];
    $query = "UPDATE Bars SET description='$desc' WHERE id=?;";
    $sth = $dbh->prepare($query);
    $sth->execute(array($bar['id']));
}