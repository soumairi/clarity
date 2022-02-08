<html>
	  <head>
		<title>Dashboard NTV-NSK</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	  </head>
<?php 
$date1 = $_GET['date1'];
$date2 = $_GET['date2'];
?>
	  <body>
		<center>
		<img src="img/logo.jpg" width=150>
		<h1>Dashboard  de NTV-NSK entre le  <?php echo $date1;?> et le <?php echo $date2;?></h1><br>
		<img src="ntv2.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>" border=0 alt="ntv2.php" align="center"><br><br>
		<img src="ntv6.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>" border=0 alt="ntv6.php" align="center"><br>
		<a href="ntv6b.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>" border=0 alt="ntv6.php">Liste des INCS avec l'OTR KO</a></br></br>
		<img src="ntv7.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>" border=0 alt="ntv7.php" align="center"><br><br>
		<img src="ntv3.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>" border=0 alt="ntv3.php" align="center"><br><br>
		<img src="ntv4.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>" border=0 alt="ntv4.php" align="center"><br><br>
		<img src="ntv5.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>" border=0 alt="ntv5.php" align="center"><br><br>
		<img src="ntv13.php?date1=<?php echo $date1;?>&date2=<?php echo $date2;?>" border=0 alt="ntv13.php" align="center"><br><br>
		<img src="ntv8.php?date1=<?php echo $date1;?>" border=0 alt="ntv8.php" align="center">  <img src="ntv9.php?date1=<?php echo $date1;?>" border=0 alt="ntv9.php" align="center"><br><br>
		<img src="ntv10.php?date1=<?php echo $date1;?>" border=0 alt="ntv10.php" align="center">  <img src="ntv11.php?date1=<?php echo $date1;?>" border=0 alt="ntv11.php" align="center"><br><br>
		<img src="ntv12.php?date1=<?php echo $date1;?>" border=0 alt="ntv12.php" align="center"><br><br>
		<a href="#" onclick="window.history.back();return false;">Retour au choix des valeurs</a></br></br>
		</center>
		
	  </body>
</html>
