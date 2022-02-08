<?php
	// On définit les 4 variables nécessaires à la connexion MySQL :
	$hostname = "localhost";
	$user     = "root";
	$password = "password";
	$nom_base_donnees = "clarity";

	// Connexion au serveur MySQL
	$conn = mysql_connect($hostname, $user, $password) or die(mysql_error());

	// Choix de la base sur laquelle travailler
	mysql_select_db($nom_base_donnees, $conn);
?>
