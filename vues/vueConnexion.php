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

		<form id="form_tache" method="POST">
			<h2>Saisir votre identifiant et votre mot de passe </h2>
			<label>Identifiant</label><br>
			<input title="nom" type="text" name="login">
			<br><br>
			
			<label>mot de passe</label><br>
			<input type="password" name="mdp">
			<br><br>
			
			<input type="submit" name="connecter" value="Se connecter">

            <input type="hidden" name="action" value="filtrageConnexion">
		</form>

        <p>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</p>

        <form>
            <input type="submit" name="voir_liste" value="Voir la liste de tâches">
            <br>
            <input type="hidden" name="action" value="appelVueDefaut">
        </form>

	</body>
	
	<script>
		
	</script>
</html>
