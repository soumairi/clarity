<?php
	// On d�finit les 4 variables n�cessaires � la connexion MySQL :
	$hostname = "localhost";
	$user     = "root";
	$password = "password";
	$nom_base_donnees = "clarity";

	// Connexion au serveur MySQL
	$conn = mysql_connect($hostname, $user, $password) or die(mysql_error());

	// Choix de la base sur laquelle travailler
	mysql_select_db($nom_base_donnees, $conn);
?>
