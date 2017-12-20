<?php

class TacheGateway {

    private $con;

    public function __construct(Connexion $con){
        $this->con=$con;
    }

    public function insert($nom, $description, $date, $lieu, $id, $idU){
        $query = 'INSERT INTO tache VALUES (:nom, :description, :date, :lieu, :id, :idU)';

        $this->con->executeQuery($query, array(
            ':nom' => array($nom, PDO::PARAM_STR),
            ':description' => array($description, PDO::PARAM_STR),
            ':date' => array($date, PDO::PARAM_STR),
            ':lieu' => array($lieu, PDO::PARAM_STR),
            ':id' => array($id, PDO::PARAM_INT),
            ':idU' => array($idU, PDO::PARAM_INT)
        ));

        return $this->con->lastInsertId();
    }

    public function delete($id, $idU){
        $query = 'DELETE FROM tache WHERE id_tache = :id AND id_liste = :idU';

        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT),
            ':idU' => array($id, PDO::PARAM_INT)
        ));
    }

    public function deleteP($id, $idU){
        $query = 'DELETE FROM tachePrive WHERE id_tache = :id AND id_liste = :idU';

        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT),
            ':idU' => array($id, PDO::PARAM_INT)
        ));
    }
    
    /*
    public function getListePublic(){
        $query = 'SELECT * FROM tache ORDER BY id_tache ASC';

        $this->con->executeQuery($query, array());
        $data = $this->con->getResults();

        foreach($data as $value){
            $tab[] = new Tache($value['nom'], $value['description'], $value['date'], $value['lieu'], $value['id_tache']);
        }

        return $tab;
    }
    */
    public function getListePublic(): array{
        $query = 'SELECT * FROM listeTachePublic ORDER BY id ASC';

        $this->con->executeQuery($query);
        $da = $this->con->getResults();
        
        foreach($da as $val){
            $query2 = 'SELECT * FROM tachePublic WHERE ID = :idU ORDER BY id_tache ASC';
            $this->con->executeQuery($query2, array(':idU' => array($val['id'], PDO::PARAM_STR)));
            $data = $this->con->getResults();
            $Liste = new ListeTache();
            foreach($data as $value){
                $Liste->addItem(new Tache($value['nom'], $value['description'], $value['date'], $value['lieu'], $value['id_tache'], $value['id_liste']));
            }
            $tab[] = $liste;
        }

        return $tab;
    }
   /*public function getListePrive($id): ListeTache{
        $query = 'SELECT * FROM tachePrive WHERE ID = :idU ORDER BY id_tache ASC';

        $this->con->executeQuery($query, array(':idU' => array($id, PDO::PARAM_STR)));
        $data = $this->con->getResults();
        $Liste = new ListeTache();
        foreach($data as $value){
            $Liste->addItem(new Tache($value['nom'], $value['description'], $value['date'], $value['lieu'], $value['id_tache']));
        }

        return $Liste;
    }

*/

    public function getListePrive($id): array{
        $query = 'SELECT * FROM listeTachePrive WHERE login = :idT ORDER BY id ASC';

        $this->con->executeQuery($query, array(':idT' => array($id, PDO::PARAM_STR)));
        $da = $this->con->getResults();
        
        foreach($da as $val){
            $query2 = 'SELECT * FROM tachePrive WHERE id_liste = :idU ORDER BY id_tache ASC';
            $this->con->executeQuery($query2, array(':idU' => array($val['id'], PDO::PARAM_STR)));
            $data = $this->con->getResults();
            $Liste = new ListeTache();
            foreach($data as $value){
                $Liste->addItem(new Tache($value['nom'], $value['description'], $value['date'], $value['lieu'], $value['id_tache'],$value['id_liste']) );
            }
            $tab[] = $liste;
        }

        return $tab;
    }


    public function insertPrive($nom, $description, $date, $lieu, $id, $idU){
        $query = 'INSERT INTO tachePrive VALUES (:nom, :description, :date, :lieu, :id, :idU)';

        $this->con->executeQuery($query, array(
            ':nom' => array($nom, PDO::PARAM_STR),
            ':description' => array($description, PDO::PARAM_STR),
            ':date' => array($date, PDO::PARAM_STR),
            ':lieu' => array($lieu, PDO::PARAM_STR),
            ':id' => array($id, PDO::PARAM_INT),
            ':idU' => array($idU, PDO::PARAM_INT)
        ));

    }

    public function insertListePrive($nom,$id, $idU){
        $query = 'INSERT INTO listeTachePrive VALUES (:nom, :id, :idU)';

        $this->con->executeQuery($query, array(
            ':nom' => array($nom, PDO::PARAM_STR),
            ':id' => array($id, PDO::PARAM_STR),
            ':idU' => array($idU, PDO::PARAM_INT)
        ));

        return $this->con->lastInsertId();
    }
    public function insertListePublic($nom,$id){
        $query = 'INSERT INTO listeTachePrive VALUES (:nom, :id)';

        $this->con->executeQuery($query, array(
            ':nom' => array($nom, PDO::PARAM_STR),
            ':id' => array($id, PDO::PARAM_STR)
        ));

    }
}