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

public function affichageTache(Tache $tache){
	echo "Tache : $tache->nom <br>";
	echo "Description : $tache->description <br>";
	echo "Date : $tache->date <br>";
	echo "Duree : $tache->duree <br>";
	echo "Lieu : $tache->lieu <br>";
	echo "ID : $tache->id_tache <br>";
}
}

class TacheGateway {
	
}

	




/* POUR SE CONNECTER A LA BASE */
$dsn='mysql:host=localhost;dbname=todolist';
$login="yannis";
$mdp="phpMyAdmin0602";

class Connection extends PDO{
	private $stmt;
	
	public function __construct($dsn, $username, $password){
		parent::__construct($dsn, $username, $password);
		$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	
	public function executeQuery($query, array$parameters=[]){
		$this->stmt = parent::prepare($query);
		foreach($parameters as $name=>$value){
			$this->stmt->bindValue($name, $value[0], $value[1]);
		}
		return $this->stmt->execute();
	}
	
	public function getResults(){
		return $this->stmt->fetchall();
	}
}

$connect = new Connection($dsn, $login, $mdp);
$query = "DELETE FROM tache WHERE nom='anniversaire'";
$connect->executeQuery($query);
// $connect->getResults();
// INUTILE POUR UN INSERT INTO






?>