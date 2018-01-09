<?php
require 'utilities/generation.php';
require 'utilities/utils.php';
generateHTMLHeader('lel');
generateNavbar('lel');
?>



<div id='myCarousel' class='carousel slide' data-ride='carousel'>
    <ol class='carousel-indicators'>
        <li data-target='#myCarousel' data-slide-to='0' class='active'></li>
        <li data-target='#myCarousel' data-slide-to='1'></li>
        <li data-target='#myCarousel' data-slide-to='2'></li>
    </ol>
    <div class='carousel-inner' role='listbox'>
        <div class='item active'>
            <img class='carousel-image' src='images/Deficio.jpg' alt='First slide'>
            <div class='container'>
                <div class='carousel-caption'>
                    <h1>Deficio</h1>       
                </div>
            </div>
        </div>
        <div class='item'>
            <img class='carousel-image' src='images/germanSuplex.jpg' alt='Second slide'>
            <div class='container'>
                <div class='carousel-caption'>
                    <h1>Valendieu goume Maddaube</h1>
                </div>
            </div>
        </div>
        <div class='item'>
            <img class='carousel-image' src='images/jeanSebastienBar.jpg' alt='Third slide'>
            <div class='container'>
                <div class='carousel-caption'>
                    <h1>Les Clazicos</h1>
                </div>
            </div>
        </div>
    </div>
    <a class='left carousel-control' href='#myCarousel' role='button' data-slide='prev'>
        <span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span>
        <span class='sr-only'>Previous</span>
    </a>
    <a class='right carousel-control' href='#myCarousel' role='button' data-slide='next'>
        <span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span>
        <span class='sr-only'>Next</span>
    </a>
</div>

<br>
<br>

<div class='row' style='text-align: center'>
    <div class='artist_heading'>
        <img class='img-circle' src='images/Deficio.jpg' alt='Generic placeholder image' width='140' height='140'>
        <h2>Déficio</h2>
        <p><a class='btn btn-default' href='#' role='button'>View details &raquo;</a></p>
    </div>
    <div class='artist_heading'>
        <img class='img-circle' src='images/germanSuplex.jpg' alt='Generic placeholder image' width='140' height='140'>
        <h2>Valendieu goume Maddaube</h2>
        <p><a class='btn btn-default' href='#' role='button'>View details &raquo;</a></p>
    </div>
    <div class='artist_heading'>
        <img class='img-circle' src='images/jeanSebastienBar.jpg' alt='Generic placeholder image' width='140' height='140'>
        <h2>Clazicos</h2>
        <p><a class='btn btn-default' href='#' role='button'>View details &raquo;</a></p>
    </div>
</div>





<?php
generateHTMLFooter()
?>