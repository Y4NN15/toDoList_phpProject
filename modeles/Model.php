<?php

class Model{
    // constructeur vide

    function get_ListePublic() : array {
        global $dsn, $login, $mdp;

        $connect = new Connexion($dsn, $login, $mdp);

        $g = new TacheGateway($connect);
        return $g->getListePublic();
    }

    function addTache($tache, $id) {
        global $dsn, $login, $mdp;

        $connect = new Connexion($dsn, $login, $mdp);

        $g = new TacheGateway($connect);
        $trash = $g->insert($tache['nom'], $tache['description'], $tache['date'], $tache['lieu'], NULL, $id);
    }

    function supprTache($id, $idU){
        global $dsn, $login, $mdp;

        $g = new TacheGateway(new Connexion($dsn, $login, $mdp));
        $g->delete($id, $idU);
    }
    function addListePublic($nom) {
        global $dsn, $login, $mdp;

        $g = new TacheGateway(new Connexion($dsn, $login, $mdp));
        $trash = $g->insertListePublic($nom, NULL);
    }
}

?>