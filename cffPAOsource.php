<html>
	  <head>
		<title>SI.OS Utilities - DASHBOARD CLARITY</title>
		<link rel="stylesheet" type="text/css" href="../style.css" />
	  </head>
<?php 
$mois = $_GET['mois'];
$annee = $_GET['annee'];
$nbre = $_GET['nbre'];
$resp = $_GET['site'];
$valeur = "CFF - PAO";
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
		<h1>Dashboard  de <?php echo $valeur;?> </h1>
		
		<h2>CHARGES INCIDENTS &nbsp;&nbsp;<img src="img/picto1.jpg" align=bottom border=0></h2><br>
		<img src="cff17dPAO.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="cff17dPAO.php" align="center"><br><br>
		<a href="cff17dbPAO.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="cff12list.php">D&eacutetail des Incidents cr&eacute&eacutes</a></br></br>
		<img src="cff17cPAO.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="cff17cPAO.php" align="center"><br><br>
		<a href="cff17cbPAO.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="cff12list.php">D&eacutetail des Incidents r&eacutesolus</a></br></br>
		<img src="cff17ePAO.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="cff17ePAO.php" align="center"><br><br>
		<a href="cff17eb2PAO.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="cff12list.php">D&eacutetail des Incidents encore ouverts</a></br></br>
		<img src="cff20PAO.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="cff20PAO.php" align="center"><br><br>
		<a href="cff20bPAO.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="cff12list.php">D&eacutetail de la r&eacutepartition de la responsabilit&eacute</a></br></br>
		<img src="cff12PAO.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="cff12PAO.php" align="center"><br><br>
		<a href="cff12bPAO.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0 alt="cff12list.php">D&eacutetail dur&eacutee de vie des Incidents</a></br></br>
		
		
		
		<a href="#" onclick="window.history.back();return false;">Retour au choix des valeurs</a></br></br>
		</center>
		<br><br>
		<div id="content"></div>
			</div>
				<div id="footer">DDSIV &copy; 2018</div>
	  </body>
</html>
