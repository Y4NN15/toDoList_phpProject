<?php

namespace controller;

class Control {
	
	function __construct(){
        global $rep, $vues;

        session_start();

        $dVueErreurs = array();

        try {
            $action = $_REQUEST['action'];

            switch($action){
                case NULL:
                    require('C:\wamp64\www\toDoList\vues\vueDefaut.php');
                    break;

                case "filtrage":
                    $this->FiltrageTache($dVueErreurs);
                    break;

                default:
                    $dVueErreurs[] = "Erreur appel PHP (switch)";
                    require('C:\wamp64\www\toDoList\vues\vueDefaut.php');
                    break;
            }
        } catch (PDOException $e){
            $dVueErreurs[] = "Erreur inattendue (Exception PDO)";
            require($rep.$vues['erreurs']);
        } catch (Exception $e2){
            $dVueErreurs[] = "Erreur inattendue (Exception classique)";
            require ($rep.$vues['erreurs']);
        }
        exit(0);
    }

    function FiltrageTache(array $dVueErreurs){
	    global $rep, $vues;

	    $nom = $_REQUEST['tache_nom'];
	    $description = $_REQUEST['tache_desc'];
	    $date = $_REQUEST['tache_date'];
	    $duree = $_REQUEST['tache_time'];
	    $lieu = $_REQUEST['tache_lieu'];
        \config\Filtrage::filtrageTache($nom, $description, $date, $duree, $lieu, $id, $dVueErreurs);

        // $modele = new \modeles\Modele();

        $dVue = array(
            "nom" => $nom,
            "description" => $description,
            "date" => $date,
            "duree" => $duree,
            "lieu" => $lieu,
        );

        require('C:\wamp64\www\toDoList\vues\vueDefaut.php');
    }
	

}


?>