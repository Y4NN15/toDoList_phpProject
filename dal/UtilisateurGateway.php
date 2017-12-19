<?php

class UtilisateurGateway {

	private $con;

	public function __construct(Connexion $con){
	    $this->con=$con;
    }

    public function isExist($loginU,$mdpU): value{
        global $dsn, $login, $mdp;
        $query = 'SELECT * FROM utilisateur WHERE login = :loginU';
        $connect = new Connexion($dsn, $login, $mdp);
        $connect->executeQuery($query, array(
            ':loginU' => array($loginU, PDO::PARAM_STR)
        ));
        $data = $connect->getResults();
        foreach($data as $value){
            if(password_verify($mdpU, $value['mdp'])){
                return TRUE;
            }
        }

        return FALSE;
    }
    public function inscription($login, $mdp): value{
        global $dsn, $login, $mdp;
        $mdpU = password_hash($mdp);
        if(!$mdpU){
            //exeption
        }
        $query = 'INSERT INTO Utilisateur VALUES (:nom, :mdpU)';
        $connect = new Connexion($dsn, $login, $mdp);
        $connect->executeQuery($query, array(
            ':nom' => array($login, PDO::PARAM_STR),
            ':mdpU' => array($mdpU, PDO::PARAM_STR)
        ));

        return $connect->lastInsertId();
    }
    public function isloginSet($loginU): value{
        global $dsn, $login, $mdp;
        $query = 'SELECT * FROM utilisateur WHERE login = :loginU';
        $connect = new Connexion($dsn, $login, $mdp);
        $connect->executeQuery($query, array(
            ':loginU' => array($loginU, PDO::PARAM_STR)
        ));
        $data = $connect->getResults();
        if(isset($data)){
                return TRUE;
        }

        return FALSE;
    }
}
