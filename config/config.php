<?php

$rep=__DIR__.'/../';

/* Connexion à la base */
$dsn='mysql:host=localhost;dbname=todolist';
$login="yannis";
$mdp="phpMyAdmin0602";

/* Vues */
$vues['defaut']=$rep.'vues\vuePublic.php';
$vues['creation']=$rep.'vues\vueCreation.php';
$vues['connexion']=$rep.'vues\vueConnexion.php';
$vues['prive']=$rep.'vues\vuePrive.php';
$vues['inscription']=$rep.'vues\vueInscription.php';

?>