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



//Environnement de TEST

$sql1 = 'SELECT tracking_id, short_description, urgency, impacted_account FROM data  WHERE   impacted_account = "Test" AND urgency = "low" AND (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated" ) and ((datediff( current_date, created_date) - (WEEK(current_date) - WEEK(created_date))* 2)  >=15) AND created_date >= "'.$date1.'"';
$sql2 = 'SELECT tracking_id, short_description, urgency, impacted_account FROM data  WHERE   impacted_account = "Test" AND urgency = "medium" AND (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated" ) and ((datediff( current_date, created_date) - (WEEK(current_date) - WEEK(created_date))* 2)  >=10) AND created_date >= "'.$date1.'"';
$sql3 = 'SELECT tracking_id, short_description, urgency, impacted_account FROM data  WHERE   impacted_account = "Test" AND urgency = "high" AND (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated" ) and ((datediff( current_date, created_date) - (WEEK(current_date) - WEEK(created_date))* 2)  >=5) AND created_date >= "'.$date1.'"';

//Environnement TRAIN

$sql4 = 'SELECT tracking_id, short_description, urgency, impacted_account FROM data  WHERE   impacted_account = "Training" AND urgency = "low" AND (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated" ) and ((datediff( current_date, created_date) - (WEEK(current_date) - WEEK(created_date))* 2)  >=15) AND created_date >= "'.$date1.'"';
$sql5 = 'SELECT tracking_id, short_description, urgency, impacted_account FROM data  WHERE   impacted_account = "Training" AND urgency = "medium" AND (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated" ) and ((datediff( current_date, created_date) - (WEEK(current_date) - WEEK(created_date))* 2) >=10) AND created_date >= "'.$date1.'"';
$sql6 = 'SELECT tracking_id, short_description, urgency, impacted_account FROM data  WHERE   impacted_account = "Training" AND urgency = "high" AND (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated" ) and ((datediff( current_date, created_date) - (WEEK(current_date) - WEEK(created_date))* 2) >=5) AND created_date >= "'.$date1.'"';

//Environnement PROD

$sql7 = 'SELECT tracking_id, short_description, urgency, impacted_account  FROM data  WHERE   impacted_account = "Production" AND urgency = "low" AND (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated" ) and ((datediff( current_date, created_date) - (WEEK(current_date) - WEEK(created_date))* 2) >=15) AND created_date >= "'.$date1.'"';
$sql8 = 'SELECT tracking_id, short_description, urgency, impacted_account  FROM data  WHERE   impacted_account = "Production" AND urgency = "medium" AND (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated" ) and ((datediff( current_date, created_date) - (WEEK(current_date) - WEEK(created_date))* 2) >=10) AND created_date >= "'.$date1.'"';
$sql9 = 'SELECT tracking_id, short_description, urgency, impacted_account  FROM data  WHERE   impacted_account = "Production" AND urgency = "high" AND (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated" ) and ((datediff( current_date, created_date) - (WEEK(current_date) - WEEK(created_date))* 2) >=5) AND created_date >= "'.$date1.'"';



// on envoie la requête env TEST
$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 


//on envoie la requête env TRAIN
$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql5.'<br>'.mysql_error()); 
$req6 = mysql_query($sql6) or die('Erreur SQL !<br>'.$sql6.'<br>'.mysql_error()); 


//on envoie la requête env PROD
$req7 = mysql_query($sql7) or die('Erreur SQL !<br>'.$sql7.'<br>'.mysql_error()); 
$req8 = mysql_query($sql8) or die('Erreur SQL !<br>'.$sql8.'<br>'.mysql_error()); 
$req9 = mysql_query($sql9) or die('Erreur SQL !<br>'.$sql9.'<br>'.mysql_error()); 





echo "<center><table class='sample' id='example1'>";
while ( ($data1 = mysql_fetch_assoc($req1))!== false) {
    echo "<tr><td class='sample'>".$data1["tracking_id"]."</td><td class='sample'>".$data1["short_description"]."</td><td class='sample'>".$data1["impacted_account"]."</td><td class='sample'>".$data1["urgency"]."</td></tr>";
}


while ( ($data2 = mysql_fetch_assoc($req2))!== false) {
    echo "<tr><td class='sample'>".$data2["tracking_id"]."</td><td class='sample'>".$data2["short_description"]."</td><td class='sample'>".$data2["impacted_account"]."</td><td class='sample'>".$data2["urgency"]."</td></tr>";
}
while ( ($data3 = mysql_fetch_assoc($req3))!== false) {
    echo "<tr><td class='sample'>".$data3["tracking_id"]."</td><td class='sample'>".$data3["short_description"]."</td><td class='sample'>".$data3["impacted_account"]."</td><td class='sample'>".$data3["urgency"]."</td></tr>";
}
while ( ($data4 = mysql_fetch_assoc($req4))!== false) {
    echo "<tr><td class='sample'>".$data4["tracking_id"]."</td><td class='sample'>".$data4["short_description"]."</td><td class='sample'>".$data4["impacted_account"]."</td><td class='sample'>".$data4["urgency"]."</td></tr>";
}
while ( ($data5 = mysql_fetch_assoc($req5))!== false) {
    echo "<tr><td class='sample'>".$data5["tracking_id"]."</td><td class='sample'>".$data5["short_description"]."</td><td class='sample'>".$data5["impacted_account"]."</td><td class='sample'>".$data5["urgency"]."</td></tr>";
}
while ( ($data6 = mysql_fetch_assoc($req6))!== false) {
    echo "<tr><td class='sample'>".$data6["tracking_id"]."</td><td class='sample'>".$data6["short_description"]."</td><td class='sample'>".$data6["impacted_account"]."</td><td class='sample'>".$data6["urgency"]."</td></tr>";
}
while ( ($data7 = mysql_fetch_assoc($req7))!== false) {
    echo "<tr><td class='sample'>".$data7["tracking_id"]."</td><td class='sample'>".$data7["short_description"]."</td><td class='sample'>".$data7["impacted_account"]."</td><td class='sample'>".$data7["urgency"]."</td></tr>";
}
while ( ($data8 = mysql_fetch_assoc($req8))!== false) {
    echo "<tr><td class='sample'>".$data8["tracking_id"]."</td><td class='sample'>".$data8["short_description"]."</td><td class='sample'>".$data8["impacted_account"]."</td><td class='sample'>".$data8["urgency"]."</td></tr>";
}
while ( ($data9 = mysql_fetch_assoc($req9))!== false) {
    echo "<tr><td class='sample'>".$data9["tracking_id"]."</td><td class='sample'>".$data9["short_description"]."</td><td class='sample'>".$data9["impacted_account"]."</td><td class='sample'>".$data9["urgency"]."</td></tr>";
}
echo "</table>";
// on ferme la connexion à mysql 
mysql_close(); 	


?>
<center>
<br><a href="#" onclick="$('#example1').table2CSV({header:['ID','Titre','Environnement', 'Criticité']})">Exporter en CSV </a><br><br>
<a href="#" onclick="window.history.back();return false;">Retour au choix des valeurs</a></br></br>
		</center>
		
	  </body>
</html>