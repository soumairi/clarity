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

//echo $_POST['valeur'];
//echo '<br><br>';
//echo $_POST['date'];
//echo '<br><br>';
$mois = $_GET['mois'];
$annee = $_GET['annee'];
$nbre = $_GET['nbre'];
$resp = $_GET['site'];
$valeur = "EIL - RESARAIL - HOSTING";
$plat = $_GET['pla'];
$type = $_GET['type'];
if ($plat==1)
	{
		$plat1 = "AND impacted_account = 'TEST'"; 
	}
elseif ($plat==2)
	{
		$plat1 = "AND impacted_account = 'TRAIN'"; 
	}
elseif ($plat==3)
	{
		$plat1 = "AND impacted_account = 'UAT'"; 
	}
elseif ($plat==4)
	{
		$plat1 = "AND impacted_account = 'PRODUCTION'"; 
	}
elseif ($plat==5)
	{
		$plat1 = " "; 
	};
if ($type==1)
	{
		$type1 = "AND (type = 'Information Request' OR type = 'Service Request')"; 
	}
elseif ($type==2)
	{
		$type1 = "AND type = 'INCIDENT'"; 
	}
elseif ($type==3)
	{
		$type1 = " "; 
	};

$i = $annee ;
$j = $mois ;



if ($j <= 9 )
									{ $j = '0'.$j;
									//echo $j;
									}
									else {
									$j = $j;
									//echo $j;
									}
$date1 = '201'.$i.'-'.$j.'-01' ;

$nbre2 = $nbre - 1 ;
$k = $j + $nbre2 ;
$h = $i;
If ($k > '12')
					{
						$h = $i +1 ;
						$k = $k - 12  ;
						
					}
				else
					{
						$k = $k  ;
					}
if ($k <= 9 )
									{ $k = '0'.$k;
									//echo $j;
									}
									else {
									$k = $k;
									//echo $j;
									}
					
					
$date2 = '201'.$h.'-'.$k.'-31' ;	

//echo $date1;
//echo $date2;				

if ($resp==0)
	{
		$resp2 = "(responsabilite = 'YES' OR responsabilite = 'NO') AND "; 
	}
else
	{
		$resp2 = "responsabilite = 'YES' AND "; 
	};






//Environnement PRODUCTION

$sql1 = 'SELECT tracking_id, short_description, urgency, Provider_id, status, category, impacted_account, created_date, type, AppVersion  from data WHERE  '.$resp2.'  urgency = "low" AND created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "EIL-HOSTING" OR category = "EIL-RESARAIL")  '.$plat1.' '.$type1.' order by month(created_date)' ;
$sql2 = 'SELECT tracking_id, short_description, urgency, Provider_id, status, category, impacted_account, created_date, type, AppVersion  from data WHERE  '.$resp2.'  urgency = "MEDIUM" AND created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "EIL-HOSTING" OR category = "EIL-RESARAIL")  '.$plat1.' '.$type1.' order by month(created_date)' ;
$sql3 = 'SELECT tracking_id, short_description, urgency, Provider_id, status, category, impacted_account, created_date, type, AppVersion  from data WHERE  '.$resp2.'  urgency = "HIGH" AND created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "EIL-HOSTING" OR category = "EIL-RESARAIL")  '.$plat1.' '.$type1.' order by month(created_date)' ;
$sql4 = 'SELECT tracking_id, short_description, urgency, Provider_id, status, category, impacted_account, created_date, type, AppVersion  from data WHERE  '.$resp2.'  urgency = "CRITICAL" AND created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "EIL-HOSTING" OR category = "EIL-RESARAIL")  '.$plat1.' '.$type1.' order by month(created_date)' ;


// on envoie la requ?te env TEST
$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 





echo "<center><table class='sample' id='example1'><tr><td><b>Tracking ID</td><td><b>Provider ID</td><td><b>Status</td><td><b>Type</td><td><b>Plateform</td><td><b>Description</td><td><b>Category</td><td><b>Criticity</td><td>App Version</td><td><b>Creation Date</td></tr>";
while ( ($data1 = mysql_fetch_assoc($req1))!== false) {
    echo "<tr><td class='sample'><a href='modifinc.php?id=".$data1["tracking_id"]."' border=0 class='modif'>".$data1["tracking_id"]."</a></td><td class='sample'>".$data1["Provider_id"]."</td><td class='sample'>".$data1["status"]."</td><td class='sample'>".$data1["type"]."</td><td class='sample'>".$data1["impacted_account"]."</td><td class='sample'>".$data1["short_description"]."</td><td class='sample'>".$data1["category"]."</td><td class='sample'>".$data1["urgency"]."</td><td class='sample'>".$data1["AppVersion"]."</td><td class='sample'>".$data1["created_date"]."</td></tr>";
}


while ( ($data2 = mysql_fetch_assoc($req2))!== false) {
    echo "<tr><td class='sample'><a href='modifinc.php?id=".$data2["tracking_id"]."' border=0 class='modif'>".$data2["tracking_id"]."</a></td><td class='sample'>".$data2["Provider_id"]."</td><td class='sample'>".$data2["status"]."</td><td class='sample'>".$data2["type"]."</td><td class='sample'>".$data2["impacted_account"]."</td><td class='sample'>".$data2["short_description"]."</td><td class='sample'>".$data2["category"]."</td><td class='sample'>".$data2["urgency"]."</td><td class='sample'>".$data2["AppVersion"]."</td><td class='sample'>".$data2["created_date"]."</td></tr>";
}
while ( ($data3 = mysql_fetch_assoc($req3))!== false) {
    echo "<tr><td class='sample'><a href='modifinc.php?id=".$data3["tracking_id"]."' border=0 class='modif'>".$data3["tracking_id"]."</a></td><td class='sample'>".$data3["Provider_id"]."</td><td class='sample'>".$data3["status"]."</td><td class='sample'>".$data3["type"]."</td><td class='sample'>".$data3["impacted_account"]."</td><td class='sample'>".$data3["short_description"]."</td><td class='sample'>".$data3["category"]."</td><td class='sample'>".$data3["urgency"]."</td><td class='sample'>".$data3["AppVersion"]."</td><td class='sample'>".$data3["created_date"]."</td></tr>";
}
while ( ($data4 = mysql_fetch_assoc($req4))!== false) {
    echo "<tr><td class='sample'><a href='modifinc.php?id=".$data4["tracking_id"]."' border=0 class='modif'>".$data4["tracking_id"]."</a></td><td class='sample'>".$data4["Provider_id"]."</td><td class='sample'>".$data4["status"]."</td><td class='sample'>".$data4["type"]."</td><td class='sample'>".$data4["impacted_account"]."</td><td class='sample'>".$data4["short_description"]."</td><td class='sample'>".$data4["category"]."</td><td class='sample'>".$data4["urgency"]."</td><td class='sample'>".$data4["AppVersion"]."</td><td class='sample'>".$data4["created_date"]."</td></tr>";
}
echo "</table>";
// on ferme la connexion ? mysql 
mysql_close(); 	


?>
<center>
<br><a href="#" onclick="$('#example1').table2CSV({header:['ID', 'Provider ID', 'Status', 'Type', 'Titre','Category', 'Criticit?', 'App Version', 'Creation Date']})">Exporter en CSV </a><br><br>
<a href="#" onclick="window.history.back();return false;">Retour au choix des valeurs</a></br></br>
		</center>
		<br><br>
		<div id="content"></div>
			</div>
				<div id="footer">SI oS &copy; 2019</div>
	  </body>
</html>