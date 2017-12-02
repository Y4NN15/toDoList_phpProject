<?php

class Model{
    // constructeur vide

    function get_ListePublic() : array {
        global $rep, $dsn, $login, $mdp;

        $connect = new Connexion($dsn, $login, $mdp);

        $g = new TacheGateway($connect);
        return $g->getListePublic();
    }
}

?>