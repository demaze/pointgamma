<?php

function generateHTMLHeader() {
    echo <<<END
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
    global $page_list;
    echo <<<END
    <div class="menu">
    <div id="logo" class="menuItem" style="height:80px">
        <a href="index.php"><img alt="logo" src="images/logo.png" style="height:100%"/></a>
    </div>
END;

    foreach ($page_list as $page) {
        echo "<div id=" . $page['name'] . " class='menuItem'>" . $page['menutitle'] . "</div><br>";
    }
    
    echo <<<END
    <button id="toggler" style="
        position:absolute;
        right:0;
        top:0;
        height:60px;
        margin:10px;
        font-size: 200%;
        display:none;">
        Menu
    </button>
</div>


END;
}
?>