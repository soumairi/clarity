<html>
	  <head>
		<title>Osmos monitoring</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	  </head>
<?php 
$valeur = $_GET['valeur'];
$dated = $_GET['dated'];
$datef = $_GET['datef'];
?>
	  <body>
		<center>
		<img src="img/logo.jpg" width=150>
		<h1>Monitoring de " <?php echo $valeur; ?> "   <br> du <?php echo $dated;?> au <?php echo $datef;?> </h1><br>
		<img src="periode2.php?valeur=<?php echo $valeur; ?>&dated=<?php echo $dated;?>&datef=<?php echo $datef;?>" border=0 alt="periode2.php" align="center"><br><br>
		<a href="#" onclick="window.history.back();return false;">Retour au choix des valeurs</a></br></br>
		</center>
		
	  </body>
</html>
