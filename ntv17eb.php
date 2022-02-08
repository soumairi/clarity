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
$now = date ("y-m-d");
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



//Environnement de TEST

$sql1 = 'SELECT tracking_id, short_description, status, DATEDIFF( "'.$now.'", created_date) as diff, start_bounced_time, urgency, impacted_account FROM data  WHERE  '.$resp2.'  type = "Incident" AND (category = "NTV - NSK" OR category = "NTV - YMS") AND impacted_account = "Production" AND urgency = "high" AND (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated" ) AND created_date >= "'.$date1.'"  AND created_date<= "'.$date2.'"';



// on envoie la requête env PROD
$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 






echo "<center><table class='sample' id='example1'><tr><td><b>Tracking ID</td><td><b>Description</td><td><b>Environment</td><td><b>Criticity</td><td><b>Status</td><td><b>Open Since</td><td><b>Bounced since</td></tr>";
while ( ($data1 = mysql_fetch_assoc($req1))!== false) {
    echo "<tr><td class='sample'>".$data1["tracking_id"]."</td><td class='sample'>".$data1["short_description"]."</td><td class='sample'>".$data1["impacted_account"]."</td><td class='sample'>".$data1["urgency"]."</td><td class='sample'>".$data1["status"]."</td><td class='sample'>".$data1["diff"]." J</td><td>".$data1["start_bounced_time"]."<td></tr>";
}

echo "</table>";
// on ferme la connexion à mysql 
mysql_close(); 	


?>
<center><br>
<b>OTR  KO :  LOW > 15 J -  MEDIUM > 10 J  -     HIGH > 5 J -   Critical > 4H</b><br><br>
<br><a href="#" onclick="$('#example1').table2CSV()">Exporter en CSV </a><br>
<a href="#" onclick="window.history.back();return false;">Retour au choix des valeurs</a></br></br>
		</center>
		
	  </body>
</html>