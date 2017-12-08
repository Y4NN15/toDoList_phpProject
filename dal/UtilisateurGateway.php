<?php

class UtilisateurGateway {

	//constructeur vide

    public function isExist($loginU,$mdpU){
        $query = 'SELECT * FROM utilisateur WHERE login = :loginU AND mdp = :mdpU';
	//connexion ici
        $this->con->executeQuery($query, array(
            ':loginU' => array($loginU, PDO::PARAM_STR),
            ':mdpU' => array($mdpU, PDO::PARAM_STR),
        ));
	$data = $this->con->getResults();

        foreach($data as $value){
            $tab[] = 1;
        }
        if($tab[0]= 1){
		return TRUE;
	}
	return FALSE;
    }
	
}
