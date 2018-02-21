<?php
require 'utilities/generation.php';
require 'utilities/utils.php';
generateHTMLHeader('lel');
generateNavbar('lel');
?>

<div class='containerTitleBars'>
    <div class='titleBar'>
        <h2 style='color:grey'>JSBAR1</h2>
    </div>
    <div class='titleBar'>
        <h2 style='color:black'>JSBAR2</h2>
    </div>
    <div class='titleBar'>
        <h2 style='color:grey'>JSBAR3</h2>
    </div>
</div>
<div class='containerDescriptionBars'>
    <div class=''>
        <h1>Le Jean-Sébastien Bar</h1>
        <br>
        <img src='images/jeanSebastienBar.jpg' style='height:200px;width:400px'>
        <br><br><br>
        <p>Un bar très bar, très bien, et tout et tout.</p>
    </div>
</div>

<?php
generateHTMLFooter()
?>