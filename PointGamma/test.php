<?php
require('utilities/utils.php');
generateHTMLHeader();
?>



<div class="menu">
    <div id="logo" class="menuItem" style="height:80px">
        <a href="index.php"><img alt="logo" src="images/logo.png" style="height:100%"/></a>
    </div>
    
    
    <div class="menuItem">La Soiree</div>
    <div class="menuItem">Line Up</div>
    <div class="menuItem">Billeterie</div>
    <div class="menuItem">Les Bars</div>


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
generateHTMLFooter()
?>
