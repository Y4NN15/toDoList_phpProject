<!DOCTYPE>
	
<html>
	<head>
		<!-- Basic informations -->
		<title>To Do List</title>
		<meta charset="utf-8" >
		<meta name="author" content="Yannis Perrot & Mathias Puravet" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
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
		<?php
			include('Scripts/PHP/script.php');
		?>
	</header>
	
	<body>
		<form id="form_tache">
			<h2>Saisir une tache</h2>
			<label>Nom de la tache</label><br>
			<input type="text" id="tache_nom">
			<br><br>
			
			<label>Description de la tache</label><br>
			<input type="text" id="tache_desc">
			<br><br>
			
			<label>Date de la tache</label><br>
			<input type="date" id="tache_date">
			<br><br>
			
			<label>Durée de la tache</label><br>
			<input type="time" id="tache_time">
			<br><br>
			
			<label>Lieu de la tache</label><br>
			<input type="text" id="tache_lieu">
			<br><br>
			
			<input type="submit" id="tache_submit" value="Créer">
		</form>
	</body>
	
	<script>
		
	</script>
</html>