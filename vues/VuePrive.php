<!DOCTYPE>
	
<html>
	<head>
		<!-- Basic informations -->
		<title>To Do List</title>
		<meta charset="utf-8" >
		<meta name="author" content="Yannis Perrot & Mathias Puravet" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
            header('Content-type: text/html; charset=UTF-8');
        ?>
		
		<meta name="keywords" content="taches listes utilisateurs projet php" />
		<meta name="description" content="Ceci est un projet universitaire de PHP. Plus d'informations en nous contactant via email." />
		<!-- icones
		<link rel="icon" type="image/png" href="img/"/>
		<link rel="shortcut icon" type="image/png" href="img/"/>
		
		     CSS links -->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		
	</head>
	
	<header>
		<h1>To Do List</h1>
		
	</header>
	
	<body>

        <?php
            if (isset($dVueErreurs) && count($dVueErreurs)>0) {
                echo "<h2>Erreur :</h2>";
                foreach ($dVueErreurs as $value){
                    echo $value."<br>";
                }
            }
        ?>

        <div id="tachePrive">
            <?php
            if (isset($tabListePrive)){
                foreach($tabListePrive as $value){
                    echo "Tâche N°".$value->getIdTache()."<br>";
                    echo "NOM : ".$value->getNom()."<br>";
                    echo "DESCRIPTION : ".$value->getDescription()."<br>";
                    echo "DATE : ".$value->getDate()."<br>";
                    echo "LIEU : ".$value->getLieu()."<br>";
                    echo "<br>";
                }
            }
            ?>
        </div>

    <form id="appelCreation">
        <input type="submit" name="creer_tache" value="Ajouter une tache">

        <input type="hidden" name="action" value="appelVueCreation">
    </form>

        <?php
        if (!isset($log)) {
            echo "<form id=\"seconnecter\">
            <input type=\"submit\" name=\"se_connecter\" value=\"Se connecter...\">

            <input type=\"hidden\" name=\"action\" value=\"appelVueConnexion\">
        </form>";
        } else {
            echo "<form id=\"sedeconnecter\">
            <input type=\"submit\" name=\"se_deconnecter\" value=\"Se déconnecter...\">

            <input type=\"hidden\" name=\"action\" value=\"deconnexion\">
        </form>";
        }
     ?>
	</body>
	
	<script>
		
	</script>
</html>
