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
$pla = $_GET['plateforme'];
$type = $_GET['type'];
$valeur = "EIL - RESARAIL - HOSTING";
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
		<img src="eurostar17d.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&nbre=<?php echo $nbre;?>&pla=<?php echo $pla;?>&type=<?php echo $type;?>" border=0 alt="eurostar17d.php" align="center"><br><br>
		<a href="eurostar17db.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&nbre=<?php echo $nbre;?>&pla=<?php echo $pla;?>&type=<?php echo $type;?>" border=0 alt="eurostar12list.php">D&eacutetail des Incidents cr&eacute&eacutes</a></br></br>
		<img src="eurostar17c.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&nbre=<?php echo $nbre;?>&pla=<?php echo $pla;?>&type=<?php echo $type;?>" border=0 alt="eurostar17c.php" align="center"><br><br>
		<a href="eurostar17cb.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&nbre=<?php echo $nbre;?>&pla=<?php echo $pla;?>&type=<?php echo $type;?>" border=0 alt="eurostar12list.php">D&eacutetail des Incidents r&eacutesolus</a></br></br>
		<img src="eurostar17e.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&nbre=<?php echo $nbre;?>&pla=<?php echo $pla;?>&type=<?php echo $type;?>" border=0 alt="eurostar17e.php" align="center"><br><br>
		<a href="eurostar17eb2.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&nbre=<?php echo $nbre;?>&pla=<?php echo $pla;?>&type=<?php echo $type;?>" border=0 alt="eurostar12list.php">D&eacutetail des Incidents encore ouverts</a></br></br>
		<img src="eurostar20.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&nbre=<?php echo $nbre;?>&pla=<?php echo $pla;?>&type=<?php echo $type;?>" border=0 alt="eurostar20.php" align="center"><br><br>
		<a href="eurostar20b.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&nbre=<?php echo $nbre;?>&pla=<?php echo $pla;?>&type=<?php echo $type;?>" border=0 alt="eurostar12list.php">D&eacutetail de la r&eacutepartition de la responsabilit&eacute</a></br></br>
		<img src="eurostar12.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&nbre=<?php echo $nbre;?>&pla=<?php echo $pla;?>&type=<?php echo $type;?>" border=0 alt="eurostar12.php" align="center"><br><br>
		<a href="eurostar12b.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&nbre=<?php echo $nbre;?>&pla=<?php echo $pla;?>&type=<?php echo $type;?>" border=0 alt="eurostar12list.php">D&eacutetail dur&eacutee de vie des Incidents</a></br></br>
		

		<a href="#" onclick="window.history.back();return false;">Retour au choix des valeurs</a></br></br>
		</center>
		<br><br>
		<div id="content"></div>
			</div>
				<div id="footer">Rail Solutions &copy; 2012</div>
	  </body>
</html>
