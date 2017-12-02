<?php

$rep=__DIR__.'/../';

/* Connexion à la base */
$dsn='mysql:host=localhost;dbname=todolist';
$login="yannis";
$mdp="phpMyAdmin0602";

/* Vues */
$vues['defaut']=$rep.'vues\vueDefaut.php';
$vues['liste']=$rep.'vues\vueListe.php';
// $vues['erreurs']='vues\vueErreurs.php';

?>