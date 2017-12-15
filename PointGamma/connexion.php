<?php
session_start();
require_once 'utilities/utils.php';
generateHTMLHeader("Connexion");
?>
<h1>Connexion pour les eleves de Polytechnique</h1>
<form action='index.php?todo=login&page=bars' method='post'>
    <p>Identifiant frankiz : <input type='text' name='login' required /></p>
    <p>Mot de passe : <input type='password' name ='mdp' required /></p>
    <p><input type='submit' value='Connexion' /></p>
</form>

