<?php

class Tache{

    private $nom;
    private $description;
    private $date;
    private $duree;
    private $lieu;
    private $id_tache;

    function __construct($nom, $description, $date, $duree, $lieu, $id_tache){
	    $this->nom=$nom;
	    $this->description=$description;
    	$this->date=$date; //date('d/m/y')
    	$this->duree=$duree;
    	$this->lieu=$lieu;
    	$this->id_tache=$id_tache;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getDuree()
    {
        return $this->duree;
    }

    public function getLieu()
    {
        return $this->lieu;
    }

    public function getIdTache()
    {
        return $this->id_tache;
    }
}


?>