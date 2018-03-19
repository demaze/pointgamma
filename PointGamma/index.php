<?php

require 'utilities/utils.php';
require 'utilities/generation.php';


generateHTMLHeader();

//navBar
generateNavbar();

//affichage du contenu
foreach ($page_list as $page) {
    echo "<div id='container" . $page['name'] . "' class='container pageContainer'>";
    require 'content/content_' . $page['name'] . '.php';
    echo "</div>";
}

generateHTMLFooter();
?>