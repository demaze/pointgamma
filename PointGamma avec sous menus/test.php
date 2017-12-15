<?php
require('utilities/utils.php');
generateHTMLHeader();
?>

<div class="menu">
    <div id="logo" class="menuItem" style="height:80px">
        <a href="index.php"><img alt="logo" src="images/logo.png" style="height:100%"/></a>
    </div>
    <div class="menuItem">
        <div class="intituleItem">La Soiree</div>
    </div>
    <div class="menuItem">
        <div class="intituleItem">Line Up</div>
    </div>
    <div class="menuItem">
        <div class="intituleItem">Billeterie</div>
    </div>
    <div id="menubars" class="menuItem">
        <div id="bars" class="intituleItem" style="margin-left:5px;margin-right:5px">Les Bars</div>
        <div class="sousMenu">
            <div class='sousMenuItem'>Le JSBARBAR</div>
            <div class='sousMenuItem'>Le nab'bar</div>
            <div class='sousMenuItem'>Le allahu akbar</div>
        </div>
    </div>


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
