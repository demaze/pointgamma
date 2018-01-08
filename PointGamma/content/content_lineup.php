<?php

function display() {
    global $artist_list;


    echo "<div id='myCarousel' class='carousel slide' data-ride='carousel'>";
    echo "   <ol class='carousel-indicators'>";


    //INDICATORS
    //il faut que un item et un seul soit "active"
    $first = true;
    $i = 0;
    foreach ($artist_list as $artist) {
        echo "       <li data-target='#myCarousel' data-slide-to='" . $i . "'";
        if ($first) {
            echo " class='active'";
            $first = false;
        }
        echo "></li>";
    }
    echo "   </ol>";
    echo "   <div class='carousel-inner' role='listbox'>";


    //SLIDES
    //il faut que un item et un seul soit "active"
    $first = true;

    foreach ($artist_list as $artist) {
        echo "<div class='item";
        if ($first) {
            echo " active";
            $first = false;
        }
        echo "'>";
        echo "   <img class='carousel-image' src='images/" . $artist['image'] . "' alt='error'>";
        echo "   <div class='container'>";
        echo "       <div class='carousel-caption'>";
        echo "           <h1>" . $artist['nom'] . "</h1>       ";
        echo "       </div>";
        echo "   </div>";
        echo "</div>";
    }

    //CONTROLEURS
    echo "</div>";
    echo "<a class='left carousel-control' href='#myCarousel' role='button' data-slide='prev'>";
    echo "   <span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span>";
    echo "   <span class='sr-only'>Previous</span>";
    echo "</a>";
    echo "<a class='right carousel-control' href='#myCarousel' role='button' data-slide='next'>";
    echo "   <span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span>";
    echo "   <span class='sr-only'>Next</span>";
    echo "</a>";
    echo "</div>";

    echo "<br>";
    echo "<br>";


    //PORTRAITS
    echo "<div class='row' style='text-align: center'>";
    foreach ($artist_list as $artist) {
        echo "   <div class='artist_portrait'>";
        echo "      <img class='img-circle' src='images/".$artist['portrait']."' alt='".$artist['nom']."' width='140' height='140'>";
        echo "      <h2>".$artist['nom']."</h2>";
        echo "      <p><a class='btn btn-default' href='".$artist['lien']."' role='button'>Youtube &raquo;</a></p>";
        echo "   </div>";
    }
    echo "</div>";
}

?>