<html>
	  <head>
		<title>RS OS Utilities - DUREE DE VIE</title>
		<link rel="stylesheet" type="text/css" href="../style.css" />
		<script type="text/javascript" src="jQuery 1.7.2.js" ></script>
		<script type="text/javascript" src="html2CSV.js" ></script>
	  </head>

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
<?php
include('connect.php'); 

//echo $_POST['valeur'];
//echo '<br><br>';
//echo $_POST['date'];
//echo '<br><br>';
$date1 = $_GET['date1'];
$date2 = $_GET['date2'];




//Environnement PRODUCTION

$sql1 = 'SELECT tracking_id, short_description, urgency, category, impacted_account,created_date, resolution_date, start_bounced_time, end_bounced_time, (datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0))as numb, IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0) as bounced from data WHERE    urgency = "low" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "NTV - NSK" OR category = "NTV - YMS") and impacted_account="PRODUCTION" AND (type="Information Request" OR type="Service Request")    ' ;
$sql2 = 'SELECT tracking_id, short_description, category, urgency, impacted_account, created_date, resolution_date, start_bounced_time, end_bounced_time, (datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0)) as numb, IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0) as bounced from data WHERE   urgency = "medium" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "NTV - NSK" OR category = "NTV - YMS")  and impacted_account="PRODUCTION" AND (type="Information Request" OR type="Service Request")    ' ;
$sql3 = 'SELECT tracking_id, short_description, category, urgency, impacted_account, created_date, resolution_date, start_bounced_time, end_bounced_time, (datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0)) as numb, IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0) as bounced from data WHERE    urgency = "high" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "NTV - NSK" OR category = "NTV - YMS")  and impacted_account="PRODUCTION" AND (type="Information Request" OR type="Service Request")   ' ;



// on envoie la requ�te env TEST
$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 





echo "<center><table class='sample' id='example1'><tr><td><b>Tracking ID</td><td><b>Description</td><td><b>Category</td><td><b>Criticity</td><td><b>Creation Date</td><td><b>Resolution Date</td><td><b>Life Time</td><td><b>Start Bouced</td><td><b>End Bounced</td><td><b>Bounced Time</td></tr>";
while ( ($data1 = mysql_fetch_assoc($req1))!== false) {
    echo "<tr><td class='sample'>".$data1["tracking_id"]."</td><td class='sample'>".$data1["short_description"]."</td><td class='sample'>".$data1["category"]."</td><td class='sample'>".$data1["urgency"]."</td><td class='sample'>".$data1["created_date"]."</td><td class='sample'>".$data1["resolution_date"]."</td><td class='sample'>".$data1["numb"]." J</td><td class='sample'>".$data1["start_bounced_time"]."</td><td class='sample'>".$data1["end_bounced_time"]."</td><td class='sample'>".$data1["bounced"]." J</td></tr>";
}


while ( ($data2 = mysql_fetch_assoc($req2))!== false) {
    echo "<tr><td class='sample'>".$data2["tracking_id"]."</td><td class='sample'>".$data2["short_description"]."</td><td class='sample'>".$data2["category"]."</td><td class='sample'>".$data2["urgency"]."</td><td class='sample'>".$data2["created_date"]."</td><td class='sample'>".$data2["resolution_date"]."</td><td class='sample'>".$data2["numb"]." J</td><td class='sample'>".$data2["start_bounced_time"]."</td><td class='sample'>".$data2["end_bounced_time"]."</td><td class='sample'>".$data2["bounced"]." J</td></tr>";
}
while ( ($data3 = mysql_fetch_assoc($req3))!== false) {
    echo "<tr><td class='sample'>".$data3["tracking_id"]."</td><td class='sample'>".$data3["short_description"]."</td><td class='sample'>".$data3["category"]."</td><td class='sample'>".$data3["urgency"]."</td><td class='sample'>".$data3["created_date"]."</td><td class='sample'>".$data3["resolution_date"]."</td><td class='sample'>".$data3["numb"]." J</td><td class='sample'>".$data3["start_bounced_time"]."</td><td class='sample'>".$data3["end_bounced_time"]."</td><td class='sample'>".$data3["bounced"]." J</td></tr>";
}

echo "</table>";
// on ferme la connexion � mysql 
mysql_close(); 	


?>
<center>
<br><a href="#" onclick="$('#example1').table2CSV({header:['ID','Titre','Environnement', 'Criticit�']})">Exporter en CSV </a><br><br>
<a href="#" onclick="window.history.back();return false;">Retour au choix des valeurs</a></br></br>
		</center>
		<br><br>
		<div id="content"></div>
			</div>
				<div id="footer">Rail Solutions &copy; 2012</div>
	  </body>
</html>