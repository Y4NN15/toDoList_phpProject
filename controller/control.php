<?php

namespace controle;

class Controller {
	
	function __construct(){
        global $rep, $vues;

        session_start();


        $dVueErreurs = array();

        try {
            $action = $_REQUEST['action'];

            switch($action){
                case NULL:
                    break;

                case "filtrage":
                    $this->FiltrageTache($dVueErreurs);
                    break;

                default:
                    $dVueErreurs[] = "Erreur appel PHP (switch)";
                    require($rep.$vues['defaut']);
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

	    $nom = $_REQUEST['nom'];
	    // etc etc etc
        \config\Filtrage::filtrageTache($nom, $description, $date, $duree, $lieu, $id);

        $modele = new \modeles\Modele();

        $dVue = array(
            "nom" => $nom,
        );
        require($rep.$vues['defaut']);
    }
	

}


?>