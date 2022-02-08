<html>
	  <head>
		<title>Dashboard Clarity</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	  </head>
<?php 
$valeur = $_GET['valeur'];
$date1 = $_GET['date1'];
?>
	  <body>
		<center>
		<img src="img/logo.jpg" width=150>
		<h1>Dashboard  de " <?php echo $valeur; ?> " à partir du <?php echo $date1;?></h1><br>
		<img src="client2.php?valeur=<?php echo $valeur; ?>&date1=<?php echo $date1;?>" border=0 alt="client2.php" align="center"><br><br>
		<img src="client6.php?valeur=<?php echo $valeur; ?>&date1=<?php echo $date1;?>" border=0 alt="client6.php" align="center"><br>
		<a href="client6b.php?valeur=<?php echo $valeur; ?>&date1=<?php echo $date1;?>" border=0 alt="client6b.php">Liste des INCS avec l'OTR KO</a></br></br>
		<img src="client7.php?valeur=<?php echo $valeur; ?>&date1=<?php echo $date1;?>" border=0 alt="client7.php" align="center"><br><br>
		<img src="client3.php?valeur=<?php echo $valeur; ?>&date1=<?php echo $date1;?>" border=0 alt="client3.php" align="center"><br><br>
		<img src="client4.php?valeur=<?php echo $valeur; ?>&date1=<?php echo $date1;?>" border=0 alt="client4.php" align="center"><br><br>
		<img src="client5.php?valeur=<?php echo $valeur; ?>&date1=<?php echo $date1;?>" border=0 alt="client5.php" align="center"><br><br>
		<a href="#" onclick="window.history.back();return false;">Retour au choix des valeurs</a></br></br>
		</center>
		
	  </body>
</html>
