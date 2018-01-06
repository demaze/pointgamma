<?php

function display() {
    global $artist_list;

    echo <<<END
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
END;

    //il faut que un item et un seul soit "active"
    $first = true;

    foreach ($artist_list as $artist) {
        echo "<div class='item";
        if($first){
            echo " active";
            $first = false;
        }
        echo "'>";
        echo "  <img src='images/" . $artist['image'] . "' class='carousel-image' alt='" . $artist['name'] . "'>";
        echo "  <div class='carousel-caption'>";
        echo "      <h3>" . $artist['name'] . "</h3>";
        echo "  </div>";
        echo "</div>";
    }


    echo <<<END
    </div>
    <!--Left and right controls -->
    <a class = "left carousel-control" href = "#myCarousel" data-slide = "prev">
    <span class = "glyphicon glyphicon-chevron-left"></span>
    <span class = "sr-only">Previous</span>
    </a>
    <a class = "right carousel-control" href = "#myCarousel" data-slide = "next">
    <span class = "glyphicon glyphicon-chevron-right"></span>
    <span class = "sr-only">Next</span>
    </a>
    </div >
END;
}

?>