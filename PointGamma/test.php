<?php
require('utilities/utils.php');
require('utilities/generation.php');
generateHTMLHeader("bars");
?>

<div class="menu">
    <div id="logo" class="menuItem" style="height:80px">
        <a href="index.php"><img alt="logo" src="images/logo.png" style="height:100%"/></a>
    </div>

    <div id="lasoiree" class='menuItem'><a href="index.php?page=lasoiree">La Soiree</a></div>

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

<?php
generateHTMLFooter();
?>