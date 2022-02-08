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
$valeur = "THALYS-PAO";
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
		<img src="thalyspao17d.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="thalyspao17d.php" align="center"><br><br>
		<a href="thalyspao17db.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="thalyspao12list.php">D&eacutetail des Incidents cr&eacute&eacutes</a></br></br>
		<img src="thalyspao17c.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="thalyspao17c.php" align="center"><br><br>
		<a href="thalyspao17cb.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="thalyspao12list.php">D&eacutetail des Incidents r&eacutesolus</a></br></br>
		<img src="thalyspao17e.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="thalyspao17e.php" align="center"><br><br>
		<a href="thalyspao17eb2.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="thalyspao12list.php">D&eacutetail des Incidents encore ouverts</a></br></br>
		<img src="thalyspao20.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="thalyspao20.php" align="center"><br><br>
		<a href="thalyspao20b.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="thalyspao12list.php">D&eacutetail de la r&eacutepartition de la responsabilit&eacute</a></br></br>
		<img src="thalyspao12.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="thalyspao12.php" align="center"><br><br>
		<a href="thalyspao12b.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="thalyspao12list.php">D&eacutetail dur&eacutee de vie des Incidents</a></br></br>
		
		
		
		<a href="#" onclick="window.history.back();return false;">Retour au choix des valeurs</a></br></br>
		</center>
		<br><br>
		<div id="content"></div>
			</div>
				<div id="footer">SI.OS &copy; 2020</div>
	  </body>
</html>
