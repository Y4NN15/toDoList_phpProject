<?php


class MdlUtilisateur{
    // constructeur vide

    function connexion($loginU, $mdpU,$dVueErreurs){
        global $vues, $dsn, $login, $mdp, $_SESSION;

		$g = new UtilisateurGateway(new Connexion($dsn, $login, $mdp));
		$bool = $g->isExist($loginU,$mdpU);
		if(!$bool){
			$dVueErreurs[] = "Login ou mot de passe incorrect<br>";
			require($vues['connexion']);
			exit(0);
		}

		$_SESSION['login']= $loginU;
    }

    function deconnexion() {
		session_unset();
		session_destroy();
		$_SESSION = array();
    }

    function get_ListePrive($id): array{
        global $rep, $dsn, $login, $mdp;

        $connect = new Connexion($dsn, $login, $mdp);

        $g = new TacheGateway($connect);
        return $g->getListePrive($id);
    }

    function addTachePrive($tache, $id) {
        global $dsn, $login, $mdp;

        $g = new TacheGateway(new Connexion($dsn, $login, $mdp));
        $trash = $g->insertPrive($tache['nom'], $tache['description'], $tache['date'], $tache['lieu'], NULL, $id);
    }
    function addUser($login, $mdp){
        global $vues, $dsn, $login, $mdp, $_SESSION;

        $g = new UtilisateurGateway(new Connexion($dsn, $login, $mdp));
        $bool = $g->isloginSet($loginU);
        if($bool){
            $dVueErreurs[] = "Login déja existant <br>";
            require($vues['inscription']);
            exit(0);
        }

        $g->inscription($login, $mdp);
    }
}

?>
