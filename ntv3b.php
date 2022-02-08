<html>
	  <head>
		<title>Dashboard Clarity</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="jQuery 1.7.2.js" ></script>
		<script type="text/javascript" src="html2CSV.js" ></script>

	  </head>
	  <body>
	  		<center><img src="img/logo.jpg" width=150></center>
		
<?php
include('connect.php'); 

//echo $_POST['valeur'];
//echo '<br><br>';
//echo $_POST['date'];
//echo '<br><br>';
$date1 = $_GET['date1'];
$date2 = $_GET['date2'];
$resp = $_GET['site'];
$valeur = $_GET['valeur'];
if ($resp==0)
	{
		$resp2 = "(responsabilite = '1' OR responsabilite = '0') AND "; 
	}
else
	{
		$resp2 = "responsabilite = '1' AND "; 
	};




//Environnement de PROD

$sql1 = 'SELECT tracking_id, short_description, urgency, impacted_account,created_date, resolution_date, (datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0))as numb, IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0) as bounced from data WHERE '.$resp2.' urgency = "low" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND category = "'.$valeur.'" AND impacted_account = "Production" AND type="incident" ';
$sql2 = 'SELECT tracking_id, short_description, urgency, impacted_account, created_date, resolution_date, (datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0)) as numb, IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0) as bounced from data WHERE '.$resp2.' urgency = "medium" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND category = "'.$valeur.'" AND impacted_account = "Production" AND type="incident" ' ;
$sql3 = 'SELECT tracking_id, short_description, urgency, impacted_account, created_date, resolution_date, (datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0)) as numb, IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0) as bounced from data WHERE '.$resp2.' urgency = "high" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND category = "'.$valeur.'" AND impacted_account = "Production" AND type="incident" ' ;
$sql10 = 'SELECT tracking_id, short_description, urgency, impacted_account, created_date, resolution_date, (datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0)) as numb, IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0) as bounced from data WHERE '.$resp2.'  urgency = "critical" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND category = "'.$valeur.'" AND impacted_account = "Production" AND type="incident" ' ;
//Environnement de TRAIN

$sql4 = 'SELECT tracking_id, short_description, urgency, impacted_account,created_date, resolution_date, (datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0))as numb, IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0) as bounced from data WHERE '.$resp2.'  urgency = "low" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND category = "'.$valeur.'" AND impacted_account = "Training" AND type="incident" ' ;
$sql5 = 'SELECT tracking_id, short_description, urgency, impacted_account, created_date, resolution_date, (datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0)) as numb, IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0) as bounced from data WHERE '.$resp2.'  urgency = "medium" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND category = "'.$valeur.'" AND impacted_account = "Training" AND type="incident" ' ;
$sql6 = 'SELECT tracking_id, short_description, urgency, impacted_account, created_date, resolution_date, (datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0)) as numb, IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0) as bounced from data WHERE '.$resp2.'  urgency = "high" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND category = "'.$valeur.'" AND impacted_account = "Training" AND type="incident" ' ;

//Environnement de TEST

$sql7 = 'SELECT tracking_id, short_description, urgency, impacted_account,created_date, resolution_date, (datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0))as numb, IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0) as bounced from data WHERE '.$resp2.'  urgency = "low" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND category = "'.$valeur.'" AND impacted_account = "Test" AND type="incident" ' ;
$sql8 = 'SELECT tracking_id, short_description, urgency, impacted_account, created_date, resolution_date, (datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0)) as numb, IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0) as bounced from data WHERE '.$resp2.'  urgency = "medium" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND category = "'.$valeur.'" AND impacted_account = "Test" AND type="incident" ' ;
$sql9 = 'SELECT tracking_id, short_description, urgency, impacted_account, created_date, resolution_date, (datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0)) as numb, IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0) as bounced from data WHERE '.$resp2.'  urgency = "high" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND category = "'.$valeur.'" AND impacted_account = "Test" AND type="incident" ' ;



// on envoie la requête env PROD
$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
$req10 = mysql_query($sql10) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
// on envoie la requête env TRAIN
$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql5.'<br>'.mysql_error()); 
$req6 = mysql_query($sql6) or die('Erreur SQL !<br>'.$sql6.'<br>'.mysql_error()); 
// on envoie la requête env TEST
$req7 = mysql_query($sql7) or die('Erreur SQL !<br>'.$sql7.'<br>'.mysql_error()); 
$req8 = mysql_query($sql8) or die('Erreur SQL !<br>'.$sql8.'<br>'.mysql_error()); 
$req9 = mysql_query($sql9) or die('Erreur SQL !<br>'.$sql9.'<br>'.mysql_error()); 





echo "<center><table class='sample' id='example1'><tr><td><b>Tracking ID</td><td><b>Description</td><td><b>Environment</td><td><b>Criticity</td><td><b>Creation Date</td><td><b>Life Time</td><td><b>Bounced Time</td></tr>";
while ( ($data1 = mysql_fetch_assoc($req1))!== false) {
    echo "<tr><td class='sample'>".$data1["tracking_id"]."</td><td class='sample'>".$data1["short_description"]."</td><td class='sample'>".$data1["impacted_account"]."</td><td class='sample'>".$data1["urgency"]."</td><td class='sample'>".$data1["created_date"]."</td><td class='sample'>".$data1["numb"]." J</td><td class='sample'>".$data1["bounced"]." J</td></tr>";
}


while ( ($data2 = mysql_fetch_assoc($req2))!== false) {
    echo "<tr><td class='sample'>".$data2["tracking_id"]."</td><td class='sample'>".$data2["short_description"]."</td><td class='sample'>".$data2["impacted_account"]."</td><td class='sample'>".$data2["urgency"]."</td><td class='sample'>".$data2["created_date"]."</td><td class='sample'>".$data2["numb"]." J</td><td class='sample'>".$data2["bounced"]." J</td></tr>";
}
while ( ($data3 = mysql_fetch_assoc($req3))!== false) {
    echo "<tr><td class='sample'>".$data3["tracking_id"]."</td><td class='sample'>".$data3["short_description"]."</td><td class='sample'>".$data3["impacted_account"]."</td><td class='sample'>".$data3["urgency"]."</td><td class='sample'>".$data3["created_date"]."</td><td class='sample'>".$data3["numb"]." J</td><td class='sample'>".$data3["bounced"]." J</td></tr>";
}
while ( ($data10 = mysql_fetch_assoc($req10))!== false) {
    echo "<tr><td class='sample'>".$data10["tracking_id"]."</td><td class='sample'>".$data10["short_description"]."</td><td class='sample'>".$data10["impacted_account"]."</td><td class='sample'>".$data10["urgency"]."</td><td class='sample'>".$data10["created_date"]."</td><td class='sample'>".$data10["numb"]." J</td><td class='sample'>".$data10["bounced"]." J</td></tr>";
}	
while ( ($data4 = mysql_fetch_assoc($req4))!== false) {
    echo "<tr><td class='sample'>".$data4["tracking_id"]."</td><td class='sample'>".$data4["short_description"]."</td><td class='sample'>".$data4["impacted_account"]."</td><td class='sample'>".$data4["urgency"]."</td><td class='sample'>".$data4["created_date"]."</td><td class='sample'>".$data4["numb"]." J</td><td class='sample'>".$data4["bounced"]." J</td></tr>";
}
while ( ($data5 = mysql_fetch_assoc($req5))!== false) {
    echo "<tr><td class='sample'>".$data5["tracking_id"]."</td><td class='sample'>".$data5["short_description"]."</td><td class='sample'>".$data5["impacted_account"]."</td><td class='sample'>".$data5["urgency"]."</td><td class='sample'>".$data5["created_date"]."</td><td class='sample'>".$data5["numb"]." J</td><td class='sample'>".$data5["bounced"]." J</td></tr>";
}
while ( ($data6 = mysql_fetch_assoc($req6))!== false) {
    echo "<tr><td class='sample'>".$data6["tracking_id"]."</td><td class='sample'>".$data6["short_description"]."</td><td class='sample'>".$data6["impacted_account"]."</td><td class='sample'>".$data6["urgency"]."</td><td class='sample'>".$data6["created_date"]."</td><td class='sample'>".$data6["numb"]." J</td><td class='sample'>".$data6["bounced"]." J</td></tr>";
}
while ( ($data7 = mysql_fetch_assoc($req7))!== false) {
    echo "<tr><td class='sample'>".$data7["tracking_id"]."</td><td class='sample'>".$data7["short_description"]."</td><td class='sample'>".$data7["impacted_account"]."</td><td class='sample'>".$data7["urgency"]."</td><td class='sample'>".$data7["created_date"]."</td><td class='sample'>".$data7["numb"]." J</td><td class='sample'>".$data7["bounced"]." J</td></tr>";
}
while ( ($data8 = mysql_fetch_assoc($req8))!== false) {
    echo "<tr><td class='sample'>".$data8["tracking_id"]."</td><td class='sample'>".$data8["short_description"]."</td><td class='sample'>".$data8["impacted_account"]."</td><td class='sample'>".$data8["urgency"]."</td><td class='sample'>".$data8["created_date"]."</td><td class='sample'>".$data8["numb"]." J</td><td class='sample'>".$data8["bounced"]." J</td></tr>";
}
while ( ($data9 = mysql_fetch_assoc($req9))!== false) {
    echo "<tr><td class='sample'>".$data9["tracking_id"]."</td><td class='sample'>".$data9["short_description"]."</td><td class='sample'>".$data9["impacted_account"]."</td><td class='sample'>".$data9["urgency"]."</td><td class='sample'>".$data9["created_date"]."</td><td class='sample'>".$data9["numb"]." J</td><td class='sample'>".$data9["bounced"]." J</td></tr>";
}

echo "</table>";
// on ferme la connexion à mysql 
mysql_close(); 	


?>
<center>
<br><a href="#" onclick="$('#example1').table2CSV()">Exporter en CSV </a><br><br>
<a href="#" onclick="window.history.back();return false;">Retour au choix des valeurs</a></br></br>
		</center>
		
	  </body>
</html>