<?php
function display() {
echo <<< END
<h1 style='text-align:center'>La Line-Up</h1>
    
<div id="myCarousel" class="carousel slide" data-ride="carousel" style='width:700; margin:0 auto'>
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="images/germanSuplex.jpg" alt="Los Angeles" style='width: 700; height:400'>
        </div>

        <div class="item">
            <img src="images/Deficio.jpg" alt="Chicago" style='width: 700; height:400'>
        </div>

        <div class="item">
            <img src="images/logo.png" alt="New York" style='width: 700; height:400'>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
END;
}
?>