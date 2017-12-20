<?php

class Tache{

    private $nom;
    private $description;
    private $date;
    private $lieu;
    private $id_tache;
      private $id_liste;

    function __construct($nom, $description, $date, $lieu, $id_tache, $id_liste){
	    $this->nom=$nom;
	    $this->description=$description;
    	$this->date=$date; //date('d/m/y')
    	$this->lieu=$lieu;
    	$this->id_tache=$id_tache;
        $this->id_liste=$id_liste;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getDescription() {
        return $this->description;
    }
    
    public function getIdListe() {
        return $this->id_liste;
    }


    public function getDate()
    {
        return $this->date;
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