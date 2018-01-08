<?php

require_once 'dataGestion.php';
$dbh = Database::connect();
if (isset($_POST['desc']) && isset($_POST['barID'])) {
    $desc = $_POST['desc'];
    $barID = $_POST['barID'];
    $query = "UPDATE Bars SET description=? WHERE id=?";
    $sth = $dbh->prepare($query);
    $request_succeeded = $sth->execute(array($desc, $barID));
    if ($request_succeeded) {
        echo "Success";
    } else {
        echo "Error";
    }
}

