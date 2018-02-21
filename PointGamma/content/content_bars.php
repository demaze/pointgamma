<?php

function display() {
    global $dbh;
    $query = "SELECT * FROM Bars;";
    $sth = $dbh->prepare($query);
    $sth->execute();

    echo "<div class='containerTitleBars'>";
    while ($courant = $sth->fetch(PDO::FETCH_ASSOC)) {
        echo "<div id='".$courant['nom']."' class='titleBar'>" .
        "<h2>" . $courant['nom'] . "</h2>" .
        "</div>\n";
    }
    echo "</div>\n\n";
    $sth->closeCursor();

    $sth = $dbh->prepare($query);
    $sth->execute();
    echo "<div class='containerDescriptionBars'>";
    while ($courant = $sth->fetch(PDO::FETCH_ASSOC)) {
        echo "<div id='".$courant['nom']."desc' class='descriptionBar'>" .
        "<h1>" . $courant['nom'] . "</h1>" .
        "<br>" .
        "<img src='" . $courant['image'] . "' style='height:200px;width:400px'>" .
        "<br><br><br>" .
        "<p>" . $courant['description'] . "</p>" .
        "</div>\n";
    }
    echo "</div>\n\n";
    $sth->closeCursor();
}
