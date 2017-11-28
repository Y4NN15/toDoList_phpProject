<?php

/*
 * Classe TACHE (nom, description, date, duree, lieu)
 * 		La date est déterminée au moment de la création de la tache
 */

class Tache{

private $nom;
private $description;
private $date;
private $duree;
private $lieu;
private $id_tache;

function __construct($nom, $description, $duree, $lieu, $id_tache){
	$this->nom=$nom;
	$this->description=$description;
	$this->date=date('d/m/y');
	$this->duree=$duree;
	$this->lieu=$lieu;
	$this->id_tache=$id_tache;
}
}

class TacheGateway {

private $con;

	public function __construct(Connexion $con){
		$this->con=$con;
	}
	
	public function insert($nom, $description, $date, $duree, $lieu, $id){
		$query = 'INSERT INTO tache VALUES (:nom, :description, :date, :duree, :lieu, :id)';
		
		$this->con->executeQuery($query, array(
			':nom' => array($nom, PDO::PARAM_STR),
			':description' => array($description, PDO::PARAM_STR),
			':date' => array($date, PDO::PARAM_STR),
			':duree' => array($duree, PDO::PARAM_STR),
			':lieu' => array($lieu, PDO::PARAM_STR),
			':id' => array($id, PDO::PARAM_INT)
		));
		
		return $this->con->lastInsertId();
	}
}


?>