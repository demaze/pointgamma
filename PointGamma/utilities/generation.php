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
    "<div id='logo' class='menuItem' style='height:80px'>" .
    "<a href='index.php'><img alt='logo' src='images/logo2018.png' style='height:100%'/></a>" .
    "</div>" .
    "<div id='lasoiree' class='menuItem'>La Soirée</div>\n" .
    "<div id='lineup' class='menuItem'>Line-Up</div>\n" .
    "<div id='bars' class='menuItem'>Les Bars</div>\n" .
    "<div id='billeterie' class='menuItem'><a href='https://www.digitick.com/index-css5-pointgamma-pg1.html'>Billeterie</a></div>\n" .
    "<img id='toggler' src='images/toggler.png' class='toggler'>" .
    "</div>";
}

?>