<?php

class Filtrage
{

    static function filtrageAction($action){
        if (!isset($action)) {
            throw new Exception("Il n'y a aucune action !");
        }
    }

    static function filtrageTache(String &$nom, String &$description, String &$date, String &$lieu, &$dVueErreurs){
        // filtrage du nom
        if (!isset($nom) || $nom == ""){
            $dVueErreurs[] = "Il n'y a pas de nom !";
            $nom = "";
        }
        if ($nom != filter_var($nom, FILTER_SANITIZE_STRING)){
            $dVueErreurs[] = "Le nom n'est pas valide !";
            $nom = "";
        };

        // filtrage de la description
        if (!isset($description) || $description == ""){
            $dVueErreurs[] = "Il n'y a pas de description !";
            $description = "";
        }
        if ($description != filter_var($description, FILTER_SANITIZE_STRING)){
            $dVueErreurs[] = "La description n'est pas valide !";
            $description = "";
        };

        // filtrage de la date
        if (!isset($date) || $date==""){
            $dVueErreurs[] = "Il n'y a pas de date !";
            $date = "";
        }
        $date_parsed = date_parse($date);
        if (!checkdate($date_parsed['month'], $date_parsed['day'], $date_parsed['year'])){
            $dVueErreurs[] = "La date n'est pas valide !";
            $date = "";
        }

        // filtrage du lieu
        if (!isset($lieu) || $lieu == ""){
            $dVueErreurs[] = "Il n'y a pas de lieu !";
            $lieu = "";
        }
        if ($lieu != filter_var($lieu, FILTER_SANITIZE_STRING)){
            $dVueErreurs[] = "Le lieu n'est pas valide !";
            $lieu = "";
        };
    }


     static function filtrageUser(String &$login, String &$mdp){
        // filtrage du login
        if (!isset($login) || $login == ""){
            $dVueErreurs[] = "Il n'y a pas de login !";
            $login = "";
        }
        if ($login != filter_var($login, FILTER_SANITIZE_STRING)){
            $dVueErreurs[] = "Le login n'est pas valide !";
            $login = "";
        };

        // filtrage de la mdp
        if (!isset($mdp) || $mdp == ""){
            $dVueErreurs[] = "Il n'y a pas de mdp !";
            $mdp = "";
        }
        if ($mdp != filter_var($mdp, FILTER_SANITIZE_STRING)){
            $dVueErreurs[] = "La mdp n'est pas valide !";
            $mdp = "";
        };
    }
}