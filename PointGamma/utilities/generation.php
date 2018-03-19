<?php

function generateHTMLHeader() {
    echo <<<END
    <!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
        <link rel="icon" href="images/logo.png">
        <title>Point Gamma 2018</title>
        <!-- CSS Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- CSS Perso -->
        <link href="css/perso.css" rel="stylesheet">
    
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/code.js"></script> 
    </head>
    <body>
END;
}

function generateHTMLFooter() {
    echo <<<END
    <script src="js/bootstrap.js"></script>
    </body>
    </html>
END;
}

function generateNavbar() {

    echo "<div class='menu animated fadeInUp'>" .
    "<div id='logo' class='menuItem' style='height:100px;padding-top:0;padding-bottom:0;margin-right:50px'>" .
    "<a href='index.php'><img alt='logo' src='images/logo2018clean.png' style='height:100%'/></a>" .
    "</div>" .
    "<div id='lasoiree' class='menuItem'>"
            . "<img id='lasoireeinactif' class='imgInActif' src='images/Soirée.png'>"
            . "<img id='lasoireeactif' class='imgActif' src='images/SoiréeActif.png'>"
            . "</div>\n" .
    "<div id='lineup' class='menuItem'>"
            . "<img id='lineupinactif' class='imgInActif' src='images/LU.png'>"
            . "<img id='lineupactif' class='imgActif' src='images/LUActif.png'>"
            . "</div>\n" .
    "<div id='bars' class='menuItem'>"
            . "<img id='barsinactif' class='imgInActif' src='images/Bars.png'>"
            . "<img id='barsactif' class='imgActif' src='images/BarsActif.png'>"
            . "</div>\n" .
    "<div id='billetterie' class='menuItem'>"
            . "<a href='https://www.digitick.com/index-css5-pointgamma-pg1.html'>"
            . "<img id='billetterieinactif' class='imgInActif' src='images/Billetterie.png'>"
            . "</a>"
            . "</div>\n" .
    "<img id='toggler' src='images/toggler.png' class='toggler'>" .
    "</div>";
}

?>