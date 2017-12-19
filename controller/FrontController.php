<?php

class FrontController
{
    function __construct(){
        global $vues;

        $dVueErreurs = array();
        $listeAction_visiteur = array('appelVuePublic', 'filtrageConnexion', 'filtrage', 'appelVueCreation', 'appelVueInscription', 'inscription', 'appelVueConnexion', 'supprTache');
        $listeAction_utilisateur = array('deconnexion', 'appelVuePrive');

        try {
            $action = ((isset($_REQUEST['action'])) ? $_REQUEST['action'] : NULL);

            if (in_array($action, $listeAction_visiteur) || ($action == NULL) || ($action == 'login')){
                new VisiteurController($action);
            } elseif (in_array($action, $listeAction_utilisateur)){
                new UtilisateurController($action);
            } else {
                $dVueErreurs[] = "Erreur d'action !! (FC)";
                require($vues['defaut']);
            }
        } catch (Exception $exceptione) {
            $dVueErreurs[] = "Erreur dans le front controller";
            require($vues['defaut']);
        }
        exit(0);


    }
}