<?php


class MdlUtilisateur{
    // constructeur vide

    function connexion($loginU, $mdpU,$dVueErreurs){
        global $vues, $dsn, $login, $mdp;

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
}

?>
