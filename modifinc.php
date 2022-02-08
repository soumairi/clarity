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
$tracking = $_GET['id'];


//Environnement PRODUCTION

$sql1 = 'SELECT tracking_id, short_description, status, interne, responsabilite, Responsibility, category, appversion, urgency, created_date, resolution_date, start_bounced_time, end_bounced_time  from data WHERE  tracking_id = "'.$tracking.'"' ;



// on envoie la requête env TEST
$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 




echo "<center><h2>MODIFICATION INC</h2><table class='sample3' width=600px >";
while ( ($data1 = mysql_fetch_assoc($req1))!== false) {
    echo "<FORM Method='POST' Action='modifinc1.php'>
	<tr><td class='sample'>Tracking ID : </td><td class='sample'>".$data1["tracking_id"]."<input type='hidden' name='tracking_id' value='".$data1["tracking_id"]."'</td></tr>
	<tr><td class='sample'>Description : </td><td class='sample'>".$data1["short_description"]."</a></td></tr>
	<tr><td class='sample'>Status : </td><td class='sample'>".$data1["status"]."</a></td></tr>
	<tr><td class='sample'>Responsabilité : </td><td class='sample'><SELECT name='responsabilite'>
					<OPTION value='".$data1["responsabilite"]."'>".$data1["responsabilite"]."</option>
					<OPTION value='Yes'>Yes</option>
					<OPTION value='No'>No</option>
				</SELECT></td></tr>
	<tr><td class='sample'>Responsibility : </td><td class='sample'><SELECT name='Responsibility'>
					<OPTION value='".$data1["Responsibility"]."'>".$data1["Responsibility"]."</option>
					<OPTION value='DSIV-I'>DSIV-I</option>
					<OPTION value='CLIENT'>CLIENT</option>
					<OPTION value='EXTERNAL'>EXTERNAL</option>
				</SELECT></td></tr>
	<tr><td class='sample'>Interne : </td><td class='sample'><SELECT name='interne'>
					<OPTION value='".$data1["interne"]."'>".$data1["interne"]."</option>
					<OPTION value='Yes'>Yes</option>
					<OPTION value='No'>No</option>
				</SELECT></td></tr>
	<tr><td class='sample'>Catégorie : </td><td class='sample'><SELECT name='category'>
					<OPTION value='".$data1["category"]."'>".$data1["category"]."</option>
					<OPTION value='NTV - NSK'>NTV - NSK</option>
					<OPTION value='NTV - NSK - INT'>NTV - NSK - INT</option>
					<OPTION value='NTV - YMS'>NTV - YMS</option>
					<OPTION value='NTV - YMS - INT'>NTV - YMS - INT</option>
					<OPTION value='ELIPSOS - NSK'>ELIPSOS - NSK</option>
					<OPTION value='ELIPSOS - NSK - INT'>ELIPSOS - NSK - INT</option>
					<OPTION value='ELIPSOS - YMS'>ELIPSOS - YMS</option>
					<OPTION value='ELIPSOS - YMS - INT'>ELIPSOS - YMS - INT</option>
					<OPTION value='ELIPSOS - RMF'>ELIPSOS - RMF</option>
					<OPTION value='CORM - YMS'>CORM - YMS</option>
					<OPTION value='CFF - WDI'>CFF - WDI</option>
					<OPTION value='CFF - WDI - INT'>CFF - WDI - INT</option>
					<OPTION value='RS - ClarityPPM'>RS - ClarityPPM</option>
				</SELECT></td></tr>
	<tr><td class='sample'>App Version : </td><td class='sample'><SELECT name='appversion'>
					<OPTION value='".$data1["appversion"]."'>".$data1["appversion"]."</option>
					<OPTION value='API'>API</option>
					<OPTION value='APPIA Database'>APPIA Database</option>
					<OPTION value='APPIA GUI'>APPIA GUI</option>
					<OPTION value='APPIA IHM'>APPIA IHM</option>
					<OPTION value='APPIA optimization'>APPIA optimization</option>
					<OPTION value='AU Update Files'>AU Update Files</option>
					<OPTION value='Clarity PPM'>Clarity PPM</option>
					<OPTION value='Data Bases (ODS, OLTP)'>Data Bases (ODS, OLTP)</option>
					<OPTION value='EAI notification'>EAI notification</option>
					<OPTION value='EPIC'>EPIC</option>
					<OPTION value='Network'>Network</option>
					<OPTION value='Resa Rail'>Resa Rail</option>
					<OPTION value='RFFE Files'>RFFE Files</option>
					<OPTION value='RMF NSK'>RMF NSK</option>
					<OPTION value='RMF RENFE'>RMF RENFE</option>
					<OPTION value='RMF SVSI'>RMF SVSI</option>
					<OPTION value='RMF UIC'>RMF UIC</option>
					<OPTION value='Sky Pay'>Sky Pay</option>
					<OPTION value='Sky Report'>Sky Report</option>
					<OPTION value='Sky Sales'>Sky Sales</option>
					<OPTION value='Sky Schedule'>Sky Schedule</option>
					<OPTION value='Sky Speed'>Sky Speed</option>
					<OPTION value='Sky Utilities'>Sky Utilities</option>
					<OPTION value='SkyPort'>SkyPort</option>
					<OPTION value='WDI'>WDI</option>
				</SELECT></td></tr>
	<tr><td class='sample'>Criticité : </td><td class='sample'><SELECT name='urgency'>
					<OPTION value='".$data1["urgency"]."'>".$data1["urgency"]."</option>
					<OPTION value='Low'>Low</option>
					<OPTION value='Medium'>Medium</option>
					<OPTION value='High'>High</option>
				</SELECT></td></tr>
	<tr><td class='sample'>Date Création : </td><td class='sample'><input type='text' name='created_date' value='".$data1["created_date"]."'></input> (aaaa-mm-jj hh:mm:ss)</td></tr>
	<tr><td class='sample'>Date Résolution : </td><td class='sample'><input type='text' name='resolution_date' value='".$data1["resolution_date"]."'></input> (aaaa-mm-jj hh:mm:ss)</td></tr>
	<tr><td class='sample'>Début Bounced : </td><td class='sample'><input type='text' name='start_bounced_time' value='".$data1["start_bounced_time"]."'></input> (aaaa-mm-jj hh:mm:ss)</td></tr>
	<tr><td class='sample'>Fin Bounced : </td><td class='sample'><input type='text' name='end_bounced_time' value='".$data1["end_bounced_time"]."'></input> (aaaa-mm-jj hh:mm:ss)</td></tr>";
}

echo "</table><br><br><INPUT type=submit value=Valider>";
// on ferme la connexion à mysql 
mysql_close(); 	


?>
<center>
<br>
<a href="#" onclick="window.history.back();return false;">Page précédente</a></br></br>
		</center>
		<br><br>
		<div id="content"></div>
			</div>
				<div id="footer">Rail Solutions &copy; 2012</div>
	  </body>
</html>