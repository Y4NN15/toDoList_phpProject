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

class TacheGateway {

private $con;

	public function __construct(Connection $con){
		$this->con=$con;
	}
	
	public function filtrage($nom, $description, $date, $duree, $lieu, $id){
		// filtrage du nom
		$nom = filter_var($nom, FILTER_SANITIZE_STRING);
		
		// filtrage de la description
		$description = filter_var($description, FILTER_SANITIZE_STRING);
		
		// filtrage de la date
		$date_parsed = date_parse($date);
		if (!checkdate($date['month'], $date['day'], $date['year'])){
			$date = FALSE;
		}
		
		// filtrage de la durée
		// filter_var($duree, ?????????)
		$duree = '00:30:00';
		
		// filtrage du lieu
		$lieu = filter_var($lieu, FILTER_SANITIZE_STRING);
		
		// filtrage de l'id
		$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
		if (strlen($id) > 10){
			$id = FALSE;
		}
		
		if ($id == FALSE || $nom == FALSE || $description == FALSE || $date == FALSE || $duree == FALSE || $lieu == FALSE){
			// erreur car un des attributs n'est pas valable
		}
	}
	
	public function insert($nom, $description, $date, $duree, $lieu, $id){
		//
		//
		// TRAITEMENT VIA TRY CATCH
		//
		//
		try {
		$query = 'INSERT INTO tache VALUES (:nom, :description, :date, :duree, :lieu, :id)'
		
		$this->con->executeQuery($query, array(
			':nom' => array($nom, PDO::PARAM_STR),
			':description' => array($description, PDO::PARAM_STR),
			':date' => array($date, PDO::PARAM_STR),
			':duree' => array($duree, PDO::PARAM_STR),
			':lieu' => array($lieu, PDO::PARAM_STR),
			':id' => array($id, PDO::PARAM_INT)
		));
		
		return $this->con->lastInsertId();
	
		} catch (PDOException e) {
			// traiter erreur...
		}
	}

	public function update($nom, $description, $date, $duree, $lieu, $id){
		
	}
	
	public function delete($nom, $description, $date, $duree, $lieu, $id){
		// try catch
		// OU
		// filtrage + traitement erreurs
		
		
	}
	
	public function recherche(){
		
	}
}

$connect = new Connection($dsn, $login, $mdp);
$query = "SELECT * FROM tache";
$connect->executeQuery($query);
// pour que le select fonctionne et s'affiche, il faut insérer les résultats dans une nouvelle variable
// CE QUI SUIT EST INUTILE POUR UN INSERT INTO OU UN UPDATE
$results = $connect->getResults(); 
/* foreach($results as $ligne){
	echo $ligne["duree"];
	echo "<br>";
}
*/









?>