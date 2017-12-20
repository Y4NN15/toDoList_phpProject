<?php

class UtilisateurGateway {

	private $con;

	public function __construct(Connexion $con){
	    $this->con=$con;
    }

    public function isExist($loginU,$mdpU){
        global $dsn, $login, $mdp;
        $query = 'SELECT * FROM utilisateur WHERE login = :loginU';
        $connect = new Connexion($dsn, $login, $mdp);
        $connect->executeQuery($query, array(
            ':loginU' => array($loginU, PDO::PARAM_STR)
        ));
        $data = $connect->getResults();
        foreach($data as $value){
            /* echo "Mot de passe entré : ".$mdpU."<br>";
            echo password_hash($mdpU, PASSWORD_DEFAULT)."<br>";
            echo "MOT DE PASSE EN BD HASHE :".$value['mdp']."<br>"; */
            if(password_verify($mdpU, $value['mdp'])){
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    public function inscription($loginU, $mdpU){
        global $dsn, $login, $mdp;
        $mdp_hash = password_hash($mdpU, PASSWORD_DEFAULT);
        if(!$mdp_hash){
            throw new Exception("erreur hashage !");
        }
        $query = 'INSERT INTO utilisateur VALUES (:nom, :mdpUser)';
        $connect = new Connexion($dsn, $login, $mdp);
        $connect->executeQuery($query, array(
            ':nom' => array($loginU, PDO::PARAM_STR),
            ':mdpUser' => array($mdp_hash, PDO::PARAM_STR)
        ));
        return $connect->lastInsertId();
    }

    public function isloginSet($loginU){
        global $dsn, $login, $mdp;
        $query = 'SELECT * FROM utilisateur WHERE login = :loginU';
        $connect = new Connexion($dsn, $login, $mdp);
        $connect->executeQuery($query, array(
            ':loginU' => array($loginU, PDO::PARAM_STR)
        ));
        $data = $connect->getResults();
        if($data == NULL){
                return TRUE;
        }

        return FALSE;
    }
}
