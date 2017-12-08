<?php


class MdlUtilisateur{
    // constructeur vide

    function connexion($loginU, $mdpU,$dVueErreurs){
        global $vues, $dsn, $login, $mdp;

        $connect = new Connexion($dsn, $login, $mdp);
		$g = new UtilisateurGateway($connect);
		$bool = $g->isExist($loginU,$mdpU);
		if(!$bool){
			$dVueErreurs[] = "Login ou mot de passe incorrect";
			require($vues['defaut']);
			exit(0);
		}

		$_SESSION['login']= $loginU;
    }

    function déconnexion() {
		session_unset();
		session_destroy();
		$_SESSION = array();
    }
}

?>
