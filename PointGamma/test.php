<?php
require 'utilities/generation.php';
require 'utilities/utils.php';
generateHTMLHeader('lel');
generateNavbar('lel');
?>

<!--<div class='container'>
        <div class='row titleBar'>
            <h1>JSBAR</h1>
        </div>
        <div class='row contentBar'>
            <img src='images/jeanSebastienBar.jpg'>
            <div class='descriptionBar'>
                <p>Venez au Jean-Sebastien Bar, bar le plus chic du Point Gamma !</p>
            </div>
        </div>

        <div class='row titleBar'>
            <h1>Le Madbar</h1>
        </div>
        <div class='row contentBar'>
            <img src='images/madBar.jpg'>
            <div class='descriptionBar'>
                <p>Ils sont fous</p>
            </div>
        </div>

        <div class='row titleBar'>
            <h1>Bar Modal Web</h1>
        </div>
        <div class='row contentBar'>
            <img src='images/modalWebBar.jpg'>
            <div class='descriptionBar'>
                <p>Très très AJAX</p>
            </div>
        </div>
</div>-->




<div class='' style='width:25%;left:5%;position:absolute;top:50%;transform:translateY(-50%);text-align:center'>
    <div class='' style='border: solid 1px grey;margin:10px'>
        <h2 style='color:grey'>JSBAR1</h2>
    </div>
    <div class='' style='border: solid 1px black;margin:10px'>
        <h2 style='color:black'>JSBAR2</h2>
    </div>
    <div class='' style='border: solid 1px grey;margin:10px'>
        <h2 style='color:grey'>JSBAR3</h2>
    </div>
</div>
<div class='' style='min-height:60%;width:60%;right:5%;position:absolute;top:50%;transform:translateY(-50%);text-align:center;border-left: solid 1px grey'>
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