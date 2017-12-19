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
            echo "mot de pass: ".$mdpU."<br>";
            echo password_hash($mdpU, PASSWORD_BCRYPT)."<br>";
            echo "MOT DE PASS :".$value['mdp']."<br>";
            if(password_verify($mdpU, $value['mdp'])){
                echo "lol";
                return TRUE;
            } else { echo "sad";}
        }
        return FALSE;
    }

    public function inscription($loginU, $mdpU){
        global $dsn, $login, $mdp;
        $mdp_hash = password_hash($mdpU, PASSWORD_BCRYPT);
        //if(!$mdp_hash){
            //exeption
        //}
        $query = 'INSERT INTO Utilisateur VALUES (:nom, :mdpU)';
        $connect = new Connexion($dsn, $login, $mdp);
        $connect->executeQuery($query, array(
            ':nom' => array($loginU, PDO::PARAM_STR),
            ':mdpU' => array($mdp_hash, PDO::PARAM_STR)
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
