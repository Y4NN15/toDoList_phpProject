<?php
class UtilisateurController
{
    function __construct($action){
        global $vues;

        $dVueErreurs = array();

        try {

        switch($action){
            case NULL:
                $this->AfficherTachesPrive($dVueErreurs);
                break;

            case "deconnexion":
                $this->SeDeconnecter($dVueErreurs);
                break;

            case "appelVuePrive":
                $this->AfficherTachesPrive($dVueErreurs);
                break;

            default:
                $dVueErreurs[] = "Erreur appel PHP (UC)";
                require($vues['defaut']);
                break;

        }
        } catch (Exception $e) {
            $dVueErreurs[] = "Erreur inattendue (Exception UC)";
            require($vues['defaut']);
        } catch (PDOException $pdoE) {
            $dVueErreurs[] = "Erreur inattendue (PDOException UC)";
        }
    }

    function AfficherTachesPrive($dVueErreurs){
        global $vues;
         $log = $_SESSION['login'];
        if(!isset($log)){
            $dVueErreurs[] = "Vous n'êtes pas connecté !<br>";
            require($vues['defaut']);
            return;
        }
        $mp = new MdlUtilisateur();
        $Liste = $mp->get_ListePrive($log);
        $tabListePrive = $Liste->getArrTache();
        require($vues['prive']);
    }

    function SeDeconnecter(){
        $d = new MdlUtilisateur();
        $d->deconnexion();
        $this->AfficherTaches();
    }
}