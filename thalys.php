<html>
	  <head>
		<title>RS OS Utilities - DASHBOARD CLARITY</title>
		<link rel="stylesheet" type="text/css" href="../style.css" />
	  </head>
<?php 
$mois = $_GET['mois'];
$annee = $_GET['annee'];
$nbre = $_GET['nbre'];
$resp = $_GET['site'];
$valeur = "THALYS - YMS & RR";
?>
 <body>
	  <div id="container">
		<center>
		<br>
		
		<table width=1000 class=sample2>
		<tr>
			<td class=tdmeny2 colspan=5><img src="img/logo.jpg" width=1000></td>
		</tr>
		<tr>
			<td class=tdmenu2><a href="../index.php" class="menu2"> ACCUEIL</a></td>
			<td class=tdmenu2><a href="../monitoring/index.php"class="menu2">MONITORING OSMOS </a></td>
			<td class=tdmenu2><a href="../clarity/index.php" class="menu2"> DASHBOARD</a></td>
			<td class=tdmenu2><a href="../support.php" class="menu2">SUPPORT</a></td>
			<td class=tdmenu2><a href="../admin.php"class="menu2">ADMIN</a></td>
			
		</tr>
	</table>
		<h1>Dashboard  de  <?php echo $valeur;?> </h1>
		
		<h2>CHARGES INCIDENTS &nbsp;&nbsp;<img src="img/picto1.jpg" align=bottom border=0></h2><br>
		<img src="thalys17d.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="thalys17d.php" align="center"><br><br>
		<a href="thalys17db.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="thalys12list.php">D?tail des Incidents cr??s</a></br></br>
		<img src="thalys17c.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="thalys17c.php" align="center"><br><br>
		<a href="thalys17cb.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="thalys12list.php">D?tail des Incidents r?solus</a></br></br>
		<img src="thalys17e.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="thalys17e.php" align="center"><br><br>
		<a href="thalys17eb2.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="thalys12list.php">D?tail des Incidents encore ouverts</a></br></br>
		<img src="thalys20.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="thalys20.php" align="center"><br><br>
		<a href="thalys20b.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="thalys12list.php">D?tail de la r?partition de la responsabilit?</a></br></br>
		<img src="thalys12.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="thalys12.php" align="center"><br><br>
		<a href="thalys12b.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="thalys12list.php">D?tail dur?e de vie des Incidents</a></br></br>
		
		
		
		<a href="#" onclick="window.history.back();return false;">Retour au choix des valeurs</a></br></br>
		</center>
		<br><br>
		<div id="content"></div>
			</div>
				<div id="footer">Rail Solutions &copy; 2012</div>
	  </body>
</html>
