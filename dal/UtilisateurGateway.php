<?php

class UtilisateurGateway {

	private $con;

	public function __construct(Connexion $con){
	    $this->con=$con;
    }

    public function isExist($loginU,$mdpU){
        $query = 'SELECT * FROM utilisateur WHERE login = :loginU AND mdp = :mdpU';
	//connexion ici
        $this->con->executeQuery($query, array(
            ':loginU' => array($loginU, PDO::PARAM_STR),
            ':mdpU' => array($mdpU, PDO::PARAM_STR),
        ));
	$data = $this->con->getResults();

    if ($data == NULL){
        return FALSE;
	}
	else {
        return TRUE;
    }

    }
}
