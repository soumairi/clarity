<html>
	  <head>
		<title>RS OS Utilities - DASHBOARD CLARITY</title>
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
$tracking_id = $_POST['tracking_id'];
$responsabilite = $_POST['responsabilite'];
$Responsibility = $_POST['Responsibility'];
$interne = $_POST['interne'];
$category = $_POST['category'];
$appversion = $_POST['appversion'];
$urgency = $_POST['urgency'];
$created_date = $_POST['created_date'];
$resolution_date = $_POST['resolution_date'];
$start_bounced_time = $_POST['start_bounced_time'];
$end_bounced_time = $_POST['end_bounced_time'];


//Update

$query="UPDATE data SET responsabilite='$responsabilite', Responsibility='$Responsibility', interne='$interne', category='$category', appversion='$appversion', urgency='$urgency', created_date='$created_date', resolution_date='$resolution_date', start_bounced_time='$start_bounced_time', end_bounced_time='$end_bounced_time' WHERE tracking_id='$tracking_id'";
$result = mysql_query($query);
if (!$result) {
    $message  = 'Requête invalide : ' . mysql_error() . "\n";
    $message .= 'Requête complète : ' . $query;
    die($message);
}
//echo $query;


?>
<center>
<br>
<center><h2>Votre INC a correctement été modifié</h2>
<a href="#" onclick="window.history.go(-2);return false;">Retour liste INCs</a></br></br>
		</center>
		<br><br>
		<div id="content"></div>
			</div>
				<div id="footer">Rail Solutions &copy; 2012</div>
	  </body>
</html>