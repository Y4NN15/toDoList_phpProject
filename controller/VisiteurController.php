<?php

class VisiteurController {
	
	function __construct(){
        global $rep, $vues;

        $dVueErreurs = array();

        try {
            // laVariablePrend = (condition) ? (ça si vrai) : (ça si faux);
            $action = (isset($_REQUEST['action']) ? $_REQUEST['action'] : NULL);

            switch($action){
                case NULL:
                    $this->AfficherTaches();
                    break;

                case "appelVueDefaut":
                    $this->AfficherTaches();
                    break;

                case "filtrage":
                    $this->FiltrageTache($dVueErreurs);
                    break;

                case "appelVueCreation":
                    require($vues['creation']);
                    break;

                case "filtrageConnexion":
                    $this->SeConnecter($dVueErreurs);
                    break;

                case "appelVueConnexion":
                    require($vues['connexion']);
                    break;

                default:
                    $dVueErreurs[] = "Erreur appel PHP (switch)";
                    require($vues['defaut']);
                    break;
            }
        } catch (PDOException $e){
            $dVueErreurs[] = "Erreur inattendue (Exception PDO)";
            require($vues['defaut']);
        } catch (Exception $e2){
            $dVueErreurs[] = "Erreur inattendue (Exception classique)";
            require ($vues['defaut']);
        }
        exit(0);
    }

    function FiltrageTache(array $dVueErreurs){
	    global $rep, $vues;

	    $nom = $_REQUEST['tache_nom'];
	    $description = $_REQUEST['tache_desc'];
	    $date = $_REQUEST['tache_date'];
	    $lieu = $_REQUEST['tache_lieu'];
        Filtrage::filtrageTache($nom, $description, $date, $lieu, $dVueErreurs);

        $dTache = array(
            "nom" => $nom,
            "description" => $description,
            "date" => $date,
            "lieu" => $lieu,
        );

        $this->AjouterTache($dTache, $dVueErreurs);
    }

    function AjouterTache($tache, $dVueErreurs){
        global $vues;

        if (isset($dVueErreurs) && count($dVueErreurs)>0){
            require($vues['creation']);
            return;
        }

        $model = new Model();
        $model->addTache($tache);
        $this->AfficherTaches();
    }

    function AfficherTaches(){
        global $vues, $rep;

        $m = new Model();
        $tabListe = $m->get_ListePublic();
        require($vues['defaut']);
    }

    function SeConnecter($dVueErreurs){
	    global $vus, $rep;

	    $login = $_REQUEST['login'];
	    $mdp = $_REQUEST['mdp'];

	    $c = new MdlUtilisateur();
	    $c->connexion($login, $mdp, $dVueErreurs);
    }
}


?>