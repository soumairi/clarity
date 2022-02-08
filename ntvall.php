<html>
	  <head>
		<title>Dashboard NTV-NSK</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	  </head>
<?php 
$date1 = $_GET['date1'];
$date2 = $_GET['date2'];
$resp = $_GET['site'];
$valeur = $_GET['valeur'];
?>
	  <body>
		<center>
		<img src="img/logo.jpg" width=150>
		<h1>Dashboard  de <?php echo $valeur;?> entre le  <?php echo $date1;?> et le <?php echo $date2;?></h1>
		<h2>SNAPSHOT DE CLARITY DU 30 MAI 2012 A 15h00</h2><br>
		<img src="ntv2.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>" border=0 alt="ntv2.php" align="center"><br><br>
		<img src="ntv6.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>" border=0 alt="ntv6.php" align="center"><br>
		<a href="ntv6b.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>" border=0 alt="ntv6.php">Liste des INCS avec l'TTR KO</a></br></br>
		<img src="ntv7.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>" border=0 alt="ntv7.php" align="center"><br><br>
		<img src="ntv3.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>" border=0 alt="ntv3.php" align="center"><br>
		<a href="ntv3b.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>" border=0 alt="ntv3b.php">Resolved INCs</a></br></br>
		<img src="ntv17c.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>" border=0 alt="ntv17c.php" align="center"><br><br>
		<img src="ntv17d.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>" border=0 alt="ntv17d.php" align="center"><br><br>
		<img src="ntv17e.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>" border=0 alt="ntv17e.php" align="center"><br><br>
		<img src="ntv20.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>" border=0 alt="ntv20.php" align="center"><br><br>
		<img src="ntv4.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>" border=0 alt="ntv4.php" align="center"><br>
		<a href="ntv4b.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>" border=0 alt="ntv4b.php">Liste des INCS avec l'TTR KO</a></br></br>
		<img src="ntv5.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>" border=0 alt="ntv5.php" align="center"><br>
		<a href="ntv5b.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>" border=0 alt="ntv5b.php">Liste des INCS avec l'TTI KO</a></br></br>
		<img src="ntv15.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>" border=0 alt="ntv15.php" align="center"><br><br>
		<img src="ntv16.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>" border=0 alt="ntv16.php" align="center"><br><br>
		<img src="ntv17.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>" border=0 alt="ntv17.php" align="center"><br><br>
		<img src="ntv18.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>" border=0 alt="ntv18.php" align="center"><br><br>
		<img src="ntv8.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>" border=0 alt="ntv8.php" align="center"><br><br>
		<img src="ntv9.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>" border=0 alt="ntv9.php" align="center"><br><br>
		<img src="ntv10.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>" border=0 alt="ntv10.php" align="center"><br><br>
		<img src="ntv11.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>" border=0 alt="ntv11.php" align="center"><br><br>
		<img src="ntv12.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>" border=0 alt="ntv12.php" align="center"><br><br>
		<img src="ntv14.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>" border=0 alt="ntv14.php" align="center"><br>
		<a href="ntv12b.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>" border=0 alt="ntv12b.php">Liste des INCS avec l'TTR KO</a></br></br>
		<a href="#" onclick="window.history.back();return false;">Retour au choix des valeurs</a></br></br>
		</center>
		
	  </body>
</html>
