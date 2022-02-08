<html>
	  <head>
		<title>RS OS Utilities - DUREE DE VIE</title>
		<link rel="stylesheet" type="text/css" href="../style.css" />
	  </head>
<?php 
$date1 = $_GET['date1'];
$date2 = $_GET['date2'];

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
		<h1>Durée de vie des tickets fermés entre entre le  <?php echo $date1;?> et le <?php echo $date2;?></h1>

		<img src="dureentv.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>" border=0 alt="dureentv.php" align="center"><br><br>
		<a href="dureentv2.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>" border=0 alt="dureentv2.php">Détail Durée de vie des Tickets NTV </a></br></br>
		
		<img src="dureecff.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>" border=0 alt="dureecff.php" align="center"><br><br>
		<a href="dureecff2.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>" border=0 alt="dureecff2.php">Détail Durée de vie des Tickets CFF </a></br></br>
		
		<img src="dureeelipsos.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>" border=0 alt="dureeelipsos.php" align="center"><br><br>
		<a href="dureeelipsos2.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>" border=0 alt="dureeelipsos2.php">Détail Durée de vie des Tickets ELIPSOS </a></br></br>
		
		<img src="dureers.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>" border=0 alt="dureers.php" align="center"><br><br>
		<a href="dureers2.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>" border=0 alt="dureers2.php">Détail Durée de vie des Tickets RS </a></br></br>
		
		<a href="#" onclick="window.history.back();return false;">Retour au choix des valeurs</a></br></br>
		</center>
		<br><br>
		<div id="content"></div>
			</div>
				<div id="footer">Rail Solutions &copy; 2012</div>
	  </body>
</html>