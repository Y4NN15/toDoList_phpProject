<?php

class TacheGateway {

    private $con;

    public function __construct(Connexion $con){
        $this->con=$con;
    }

    public function insert($nom, $description, $date, $lieu, $id){
        $query = 'INSERT INTO tache VALUES (:nom, :description, :date, :lieu, :id)';

        $this->con->executeQuery($query, array(
            ':nom' => array($nom, PDO::PARAM_STR),
            ':description' => array($description, PDO::PARAM_STR),
            ':date' => array($date, PDO::PARAM_STR),
            ':lieu' => array($lieu, PDO::PARAM_STR),
            ':id' => array($id, PDO::PARAM_INT)
        ));

        return $this->con->lastInsertId();
    }

    public function getListePublic(){
        $query = 'SELECT * FROM tache ORDER BY id_tache ASC';

        $this->con->executeQuery($query, array());
        $data = $this->con->getResults();

        foreach($data as $value){
            $tab[] = new Tache($value['nom'], $value['description'], $value['date'], $value['lieu'], $value['id_tache']);
        }

        return $tab;
    }
}