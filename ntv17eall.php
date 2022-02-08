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
$valeur = "NTV - NSK";
if ($resp==0)
	{
		$resp2 = "(responsabilite = 'YES' OR responsabilite = 'NO' OR responsabilite = ' ') AND "; 
	}
else
	{
		$resp2 = "responsabilite = 'YES' AND "; 
	};


//$date_explosee = explode("-", $date1);
//$date_explosee2 = explode("-", $date2);
//$date_explosee3 = explode("-", "2013-08-21");



//echo $annee;

$j = $mois;
$i = $annee;
$b = $nbre;
// boucle 			
for($b=1; $b<= $nbre; $b++)
				{
		$sql1 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql3 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql4 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql5 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql6 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql7 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql8 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql9 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql10 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		
		$sql21 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql23 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql24 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql25 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql26 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql27 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql28 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql29 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql30 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		
		$sql31 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql33 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql34 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql35 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql36 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql37 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql38 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql39 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql40 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		
		$sql41 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql43 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql44 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql45 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql46 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql47 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql48 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql49 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql50 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
							
								//for ($j=$mois; $j <= $mois2 ; $j++ )
									//{
									if ($j <= 9 )
									{ $j = '0'.$j;
									//echo $j;
									}
									else {
									$j = $j;
									//echo $j;
									}
				$sql1 .=' urgency = "Low"    AND (AppVersion = "Notification-EAI" OR AppVersion= "EAI notification") AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql2 = 'SELECT nom as name from mois where id = "'.$j.'" ';
				$sql3 .=' urgency = "Low"    AND AppVersion= "Standard notification"  AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql4 .=' urgency = "Low"    AND AppVersion= "API" AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql5 .=' urgency = "Low"    AND AppVersion= "Sky Pay" AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql6 .=' urgency = "Low"    AND AppVersion= "Sky Sales" AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql7 .=' urgency = "Low"    AND AppVersion= "Sky Speed" AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql8 .=' urgency = "Low"    AND AppVersion= "Sky Report" AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql9 .=' urgency = "Low"    AND (AppVersion= "Epic" OR AppVersion= "Data Bases (ODS, OLTP)" OR AppVersion="Sky Utilities" OR AppVersion="Au Update files" OR AppVersion="RFFE files" OR AppVersion=" " ) AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql10 .=' urgency = "Low"   AND category = "NTV - YMS" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				
				$sql21 .=' urgency = "Medium"    AND (AppVersion = "Notification-EAI" OR AppVersion= "EAI notification") AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql23 .=' urgency = "Medium"    AND AppVersion= "Standard notification"  AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql24 .=' urgency = "Medium"    AND AppVersion= "API" AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql25 .=' urgency = "Medium"    AND AppVersion= "Sky Pay" AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql26 .=' urgency = "Medium"    AND AppVersion= "Sky Sales" AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql27 .=' urgency = "Medium"    AND AppVersion= "Sky Speed" AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql28 .=' urgency = "Medium"    AND AppVersion= "Sky Report" AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql29 .=' urgency = "Medium"    AND (AppVersion= "Epic" OR AppVersion= "Data Bases (ODS, OLTP)" OR AppVersion="Sky Utilities" OR AppVersion="Au Update files" OR AppVersion="RFFE files" OR AppVersion=" " ) AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql30 .=' urgency = "Medium"   AND category = "NTV - YMS" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				
				$sql31 .=' urgency = "High"    AND (AppVersion = "Notification-EAI" OR AppVersion= "EAI notification") AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql33 .=' urgency = "High"    AND AppVersion= "Standard notification"  AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql34 .=' urgency = "High"    AND AppVersion= "API" AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql35 .=' urgency = "High"    AND AppVersion= "Sky Pay" AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql36 .=' urgency = "High"    AND AppVersion= "Sky Sales" AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql37 .=' urgency = "High"    AND AppVersion= "Sky Speed" AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql38 .=' urgency = "High"    AND AppVersion= "Sky Report" AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql39 .=' urgency = "High"    AND (AppVersion= "Epic" OR AppVersion= "Data Bases (ODS, OLTP)" OR AppVersion="Sky Utilities" OR AppVersion="Au Update files" OR AppVersion="RFFE files" OR AppVersion=" ") AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql40 .=' urgency = "High"   AND category = "NTV - YMS" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				
				$sql41 .=' urgency = "Critical"    AND (AppVersion = "Notification-EAI" OR AppVersion= "EAI notification") AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql43 .=' urgency = "Critical"    AND AppVersion= "Standard notification"  AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql44 .=' urgency = "Critical"    AND AppVersion= "API" AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql45 .=' urgency = "Critical"    AND AppVersion= "Sky Pay" AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql46 .=' urgency = "Critical"    AND AppVersion= "Sky Sales" AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql47 .=' urgency = "Critical"    AND AppVersion= "Sky Speed" AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql48 .=' urgency = "Critical"    AND AppVersion= "Sky Report" AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql49 .=' urgency = "Critical"    AND (AppVersion= "Epic" OR AppVersion= "Data Bases (ODS, OLTP)" OR AppVersion="Sky Utilities" OR AppVersion="Au Update files" OR AppVersion="RFFE files" OR AppVersion=" ") AND category = "NTV - NSK" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				$sql50 .=' urgency = "Critical"   AND category = "NTV - YMS" AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")    AND created_date <"201'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"201'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"' ;
				
				$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
				$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql5.'<br>'.mysql_error()); 
				$req6 = mysql_query($sql6) or die('Erreur SQL !<br>'.$sql6.'<br>'.mysql_error()); 
				$req7 = mysql_query($sql7) or die('Erreur SQL !<br>'.$sql7.'<br>'.mysql_error()); 
				$req8 = mysql_query($sql8) or die('Erreur SQL !<br>'.$sql8.'<br>'.mysql_error()); 
				$req9 = mysql_query($sql9) or die('Erreur SQL !<br>'.$sql9.'<br>'.mysql_error());
				$req10 = mysql_query($sql10) or die('Erreur SQL !<br>'.$sql10.'<br>'.mysql_error());
				
				$req21 = mysql_query($sql21) or die('Erreur SQL !<br>'.$sql21.'<br>'.mysql_error()); 
				$req23 = mysql_query($sql23) or die('Erreur SQL !<br>'.$sql23.'<br>'.mysql_error()); 
				$req24 = mysql_query($sql24) or die('Erreur SQL !<br>'.$sql24.'<br>'.mysql_error()); 
				$req25 = mysql_query($sql25) or die('Erreur SQL !<br>'.$sql25.'<br>'.mysql_error()); 
				$req26 = mysql_query($sql26) or die('Erreur SQL !<br>'.$sql26.'<br>'.mysql_error()); 
				$req27 = mysql_query($sql27) or die('Erreur SQL !<br>'.$sql27.'<br>'.mysql_error()); 
				$req28 = mysql_query($sql28) or die('Erreur SQL !<br>'.$sql28.'<br>'.mysql_error()); 
				$req29 = mysql_query($sql29) or die('Erreur SQL !<br>'.$sql29.'<br>'.mysql_error());
				$req30 = mysql_query($sql30) or die('Erreur SQL !<br>'.$sql30.'<br>'.mysql_error());
				
				$req31 = mysql_query($sql31) or die('Erreur SQL !<br>'.$sql31.'<br>'.mysql_error()); 
				$req33 = mysql_query($sql33) or die('Erreur SQL !<br>'.$sql33.'<br>'.mysql_error()); 
				$req34 = mysql_query($sql34) or die('Erreur SQL !<br>'.$sql34.'<br>'.mysql_error()); 
				$req35 = mysql_query($sql35) or die('Erreur SQL !<br>'.$sql35.'<br>'.mysql_error()); 
				$req36 = mysql_query($sql36) or die('Erreur SQL !<br>'.$sql36.'<br>'.mysql_error()); 
				$req37 = mysql_query($sql37) or die('Erreur SQL !<br>'.$sql37.'<br>'.mysql_error()); 
				$req38 = mysql_query($sql38) or die('Erreur SQL !<br>'.$sql38.'<br>'.mysql_error()); 
				$req39 = mysql_query($sql39) or die('Erreur SQL !<br>'.$sql39.'<br>'.mysql_error());
				$req40 = mysql_query($sql40) or die('Erreur SQL !<br>'.$sql40.'<br>'.mysql_error());
				
				$req41 = mysql_query($sql41) or die('Erreur SQL !<br>'.$sql41.'<br>'.mysql_error()); 
				$req43 = mysql_query($sql43) or die('Erreur SQL !<br>'.$sql43.'<br>'.mysql_error()); 
				$req44 = mysql_query($sql44) or die('Erreur SQL !<br>'.$sql44.'<br>'.mysql_error()); 
				$req45 = mysql_query($sql45) or die('Erreur SQL !<br>'.$sql45.'<br>'.mysql_error()); 
				$req46 = mysql_query($sql46) or die('Erreur SQL !<br>'.$sql46.'<br>'.mysql_error()); 
				$req47 = mysql_query($sql47) or die('Erreur SQL !<br>'.$sql47.'<br>'.mysql_error()); 
				$req48 = mysql_query($sql48) or die('Erreur SQL !<br>'.$sql48.'<br>'.mysql_error()); 
				$req49 = mysql_query($sql49) or die('Erreur SQL !<br>'.$sql49.'<br>'.mysql_error());
				$req50 = mysql_query($sql50) or die('Erreur SQL !<br>'.$sql50.'<br>'.mysql_error());
				//Echo $sql40				.'<br>';
				while(($data1=mysql_fetch_assoc($req1))!== false){
				$data2=mysql_fetch_assoc($req2);
				$data3=mysql_fetch_assoc($req3);
				$data4=mysql_fetch_assoc($req4);
				$data5=mysql_fetch_assoc($req5);
				$data6=mysql_fetch_assoc($req6);
				$data7=mysql_fetch_assoc($req7);
				$data8=mysql_fetch_assoc($req8);
				$data9=mysql_fetch_assoc($req9);
				$data10=mysql_fetch_assoc($req10);
				
				$data21=mysql_fetch_assoc($req21);
				$data23=mysql_fetch_assoc($req23);
				$data24=mysql_fetch_assoc($req24);
				$data25=mysql_fetch_assoc($req25);
				$data26=mysql_fetch_assoc($req26);
				$data27=mysql_fetch_assoc($req27);
				$data28=mysql_fetch_assoc($req28);
				$data29=mysql_fetch_assoc($req29);
				$data30=mysql_fetch_assoc($req30);
				
				$data31=mysql_fetch_assoc($req31);
				$data33=mysql_fetch_assoc($req33);
				$data34=mysql_fetch_assoc($req34);
				$data35=mysql_fetch_assoc($req35);
				$data36=mysql_fetch_assoc($req36);
				$data37=mysql_fetch_assoc($req37);
				$data38=mysql_fetch_assoc($req38);
				$data39=mysql_fetch_assoc($req39);
				$data40=mysql_fetch_assoc($req40);
				
				$data41=mysql_fetch_assoc($req41);
				$data43=mysql_fetch_assoc($req43);
				$data44=mysql_fetch_assoc($req44);
				$data45=mysql_fetch_assoc($req45);
				$data46=mysql_fetch_assoc($req46);
				$data47=mysql_fetch_assoc($req47);
				$data48=mysql_fetch_assoc($req48);
				$data49=mysql_fetch_assoc($req49);
				$data50=mysql_fetch_assoc($req50);
				
				$xdata[] = "L   M    H    C\n     ".$data2['name'].' 1'.$i;
				if($data1['numb'] == '') {    $data1['numb'] = '0';     } 
				if($data3['numb'] == '') {    $data3['numb'] = '0';     } 
				if($data4['numb'] == '') {    $data4['numb'] = '0';     } 
				if($data5['numb'] == '') {    $data5['numb'] = '0';     } 
				if($data6['numb'] == '') {    $data6['numb'] = '0';     } 
				if($data7['numb'] == '') {    $data7['numb'] = '0';     } 
				if($data8['numb'] == '') {    $data8['numb'] = '0';     } 
				if($data9['numb'] == '') {    $data9['numb'] = '0';     } 
				if($data10['numb'] == '') {    $data10['numb'] = '0';     } 
				
				if($data21['numb'] == '') {    $data21['numb'] = '0';     } 
				if($data23['numb'] == '') {    $data23['numb'] = '0';     } 
				if($data24['numb'] == '') {    $data24['numb'] = '0';     } 
				if($data25['numb'] == '') {    $data25['numb'] = '0';     } 
				if($data26['numb'] == '') {    $data26['numb'] = '0';     } 
				if($data27['numb'] == '') {    $data27['numb'] = '0';     } 
				if($data28['numb'] == '') {    $data28['numb'] = '0';     } 
				if($data29['numb'] == '') {    $data29['numb'] = '0';     } 
				if($data30['numb'] == '') {    $data30['numb'] = '0';     } 
				
				if($data31['numb'] == '') {    $data31['numb'] = '0';     } 
				if($data33['numb'] == '') {    $data33['numb'] = '0';     } 
				if($data34['numb'] == '') {    $data34['numb'] = '0';     } 
				if($data35['numb'] == '') {    $data35['numb'] = '0';     } 
				if($data36['numb'] == '') {    $data36['numb'] = '0';     } 
				if($data37['numb'] == '') {    $data37['numb'] = '0';     } 
				if($data38['numb'] == '') {    $data38['numb'] = '0';     } 
				if($data39['numb'] == '') {    $data39['numb'] = '0';     } 
				if($data40['numb'] == '') {    $data40['numb'] = '0';     } 
				
				if($data41['numb'] == '') {    $data41['numb'] = '0';     } 
				if($data43['numb'] == '') {    $data43['numb'] = '0';     } 
				if($data44['numb'] == '') {    $data44['numb'] = '0';     } 
				if($data45['numb'] == '') {    $data45['numb'] = '0';     } 
				if($data46['numb'] == '') {    $data46['numb'] = '0';     } 
				if($data47['numb'] == '') {    $data47['numb'] = '0';     } 
				if($data48['numb'] == '') {    $data48['numb'] = '0';     } 
				if($data49['numb'] == '') {    $data49['numb'] = '0';     } 
				if($data50['numb'] == '') {    $data50['numb'] = '0';     }
				$adata[] = $data1['numb'];
				$bdata[] = $data3['numb'];
				$cdata[] = $data4['numb'];
				$ddata[] = $data5['numb'];
				$edata[] = $data6['numb'];
				$fdata[] = $data7['numb'];
				$gdata[] = $data8['numb'];
				$hdata[] = $data9['numb'];
				$idata[] = $data10['numb'];
				
				$adata2[] = $data21['numb'];
				$bdata2[] = $data23['numb'];
				$cdata2[] = $data24['numb'];
				$ddata2[] = $data25['numb'];
				$edata2[] = $data26['numb'];
				$fdata2[] = $data27['numb'];
				$gdata2[] = $data28['numb'];
				$hdata2[] = $data29['numb'];
				$idata2[] = $data30['numb'];
				
				$adata3[] = $data31['numb'];
				$bdata3[] = $data33['numb'];
				$cdata3[] = $data34['numb'];
				$ddata3[] = $data35['numb'];
				$edata3[] = $data36['numb'];
				$fdata3[] = $data37['numb'];
				$gdata3[] = $data38['numb'];
				$hdata3[] = $data39['numb'];
				$idata3[] = $data40['numb'];
				
				$adata4[] = $data41['numb'];
				$bdata4[] = $data43['numb'];
				$cdata4[] = $data44['numb'];
				$ddata4[] = $data45['numb'];
				$edata4[] = $data46['numb'];
				$fdata4[] = $data47['numb'];
				$gdata4[] = $data48['numb'];
				$hdata4[] = $data49['numb'];
				$idata4[] = $data50['numb'];
									}
		$sql1 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql3 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql4 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql5 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql6 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql7 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql8 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql9 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql10 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		
		$sql21 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql23 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql24 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql25 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql26 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql27 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql28 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql29 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql30 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		
		$sql31 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql33 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql34 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql35 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql36 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql37 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql38 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql39 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql40 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		
		$sql41 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql43 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql44 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql45 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql46 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql47 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql48 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql49 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql50 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
							
				If ($j == '12')
					{
						$i = $i +1 ;
						$j = '01' ;
					}
				else
					{
						$j = $j +1 ;
					}
			$k = $j-1 ;	
			if ($k <= 9 )
									{ $k = '0'.$k;
									//echo $j;
									}
									else {
									$k = $k;
									//echo $j;
									}			
		}				
//echo $data1["numb"];
//echo $data2["numb"];
//echo $data3["numb"];
// on ferme la connexion à mysql 
mysql_close(); 	


// content="text/plain; charset=utf-8" 
			require_once ('jpgraph/src/jpgraph.php'); 
			require_once ('jpgraph/src/jpgraph_bar.php'); 

			$graph = new Graph(700,400,"auto");
			$graph->SetScale("textint");
			$graph->img->SetMargin(60,40,0,70);
			$graph->xaxis->SetFont(FF_FONT1);
			$graph->yaxis->title->Set(" IN NUMBER OF INCS");
			//$graph->xaxis->SetLabelAngle(90);
			$graph->xaxis->SetTickLabels($xdata);
			$graph->title->SetMargin(3);
$graph->title->SetFont(FF_ARIAL,FS_NORMAL,10);
			$graph->title->Set('NTV - NSK  APP REPARTITION PRODUCTION REQUESTS STILL OPENED BETWEEN 201'.$annee.'-'.$mois.'-01 AND 201'.$i.'-'.$k  .'-31');
			$graph->legend->Pos(0.05,0.95,"right","center"); 

			
$b1plot = new BarPlot($adata);
$b2plot = new BarPlot($bdata);
$b3plot = new BarPlot($cdata);
$b4plot = new BarPlot($ddata);
$b5plot = new BarPlot($edata);
$b6plot = new BarPlot($fdata);
$b7plot = new BarPlot($gdata);
$b8plot = new BarPlot($hdata);
$b9plot = new BarPlot($idata);

$b1plot2 = new BarPlot($adata2);
$b2plot2 = new BarPlot($bdata2);
$b3plot2 = new BarPlot($cdata2);
$b4plot2 = new BarPlot($ddata2);
$b5plot2 = new BarPlot($edata2);
$b6plot2 = new BarPlot($fdata2);
$b7plot2 = new BarPlot($gdata2);
$b8plot2 = new BarPlot($hdata2);
$b9plot2 = new BarPlot($idata2);

$b1plot3 = new BarPlot($adata3);
$b2plot3 = new BarPlot($bdata3);
$b3plot3 = new BarPlot($cdata3);
$b4plot3 = new BarPlot($ddata3);
$b5plot3 = new BarPlot($edata3);
$b6plot3 = new BarPlot($fdata3);
$b7plot3 = new BarPlot($gdata3);
$b8plot3 = new BarPlot($hdata3);
$b9plot3 = new BarPlot($idata3);

$b1plot4 = new BarPlot($adata4);
$b2plot4 = new BarPlot($bdata4);
$b3plot4 = new BarPlot($cdata4);
$b4plot4 = new BarPlot($ddata4);
$b5plot4 = new BarPlot($edata4);
$b6plot4 = new BarPlot($fdata4);
$b7plot4 = new BarPlot($gdata4);
$b8plot4 = new BarPlot($hdata4);
$b9plot4 = new BarPlot($idata4);

$b1plot->SetLegend('EAI Notifications');
$b2plot->SetLegend('Standard Notifications');
$b3plot->SetLegend('Sky Channel API');
$b4plot->SetLegend('Sky Pay');
$b5plot->SetLegend('Sky Sales');
$b6plot->SetLegend('Sky Speed');
$b7plot->SetLegend('Sky report');
$b8plot->SetLegend('Other');
$b9plot->SetLegend('Yield');
$graph->legend->SetColumns(6);

$ab1plot = new AccBarPlot(array($b1plot,$b2plot, $b3plot,$b4plot,$b5plot,$b6plot,$b7plot,$b8plot,$b9plot));
$ab2plot = new AccBarPlot(array($b1plot2,$b2plot2, $b3plot2,$b4plot2,$b5plot2,$b6plot2,$b7plot2,$b8plot2,$b9plot2));
$ab3plot = new AccBarPlot(array($b1plot3,$b2plot3, $b3plot3,$b4plot3,$b5plot3,$b6plot3,$b7plot3,$b8plot3,$b9plot3));
$ab4plot = new AccBarPlot(array($b1plot4,$b2plot4, $b3plot4,$b4plot4,$b5plot4,$b6plot4,$b7plot4,$b8plot4,$b9plot4));
 //$p1->SetSliceColors(array('red','orange','yellow','green','purple','blue','brown','black')); 
 

$gbarplot = new GroupBarPlot(array($ab1plot,$ab2plot,$ab3plot, $ab4plot));
$gbarplot->SetWidth(0.5);
$graph->Add($gbarplot); 
 
$b1plot->SetFillColor("#FFFF00");
$b6plot->SetFillColor("blue");
$b3plot->SetFillColor("#AC3633");
$b4plot->SetFillColor("#89AC41");
$b5plot->SetFillColor("#6C4E91");
$b2plot->SetFillColor("#DDA2A1");
$b7plot->SetFillColor("#D17122");
$b8plot->SetFillColor("#333333");
$b9plot->SetFillColor("#3BB8D9");
$b8plot->value->SetColor('white');
$b6plot->value->SetColor('white');
$b3plot->value->SetColor('white');
$b5plot->value->SetColor('white');
$b1plot->SetColor("#323434");
$b2plot->SetColor("#323434");
$b3plot->SetColor("#323434");
$b4plot->SetColor("#323434");
$b5plot->SetColor("#323434");
$b6plot->SetColor("#323434");
$b7plot->SetColor("#323434");
$b8plot->SetColor("#323434");
$b9plot->SetColor("#323434");

$b1plot2->SetFillColor("#FFFF00");
$b6plot2->SetFillColor("blue");
$b3plot2->SetFillColor("#AC3633");
$b4plot2->SetFillColor("#89AC41");
$b5plot2->SetFillColor("#6C4E91");
$b2plot2->SetFillColor("#DDA2A1");
$b7plot2->SetFillColor("#D17122");
$b8plot2->SetFillColor("#333333");
$b9plot2->SetFillColor("#3BB8D9");
$b8plot2->value->SetColor('white');
$b6plot2->value->SetColor('white');
$b3plot2->value->SetColor('white');
$b5plot2->value->SetColor('white');
$b1plot2->SetColor("#323434");
$b2plot2->SetColor("#323434");
$b3plot2->SetColor("#323434");
$b4plot2->SetColor("#323434");
$b5plot2->SetColor("#323434");
$b6plot2->SetColor("#323434");
$b7plot2->SetColor("#323434");
$b8plot2->SetColor("#323434");
$b9plot2->SetColor("#323434");

$b1plot3->SetFillColor("#FFFF00");
$b6plot3->SetFillColor("blue");
$b3plot3->SetFillColor("#AC3633");
$b4plot3->SetFillColor("#89AC41");
$b5plot3->SetFillColor("#6C4E91");
$b2plot3->SetFillColor("#DDA2A1");
$b7plot3->SetFillColor("#D17122");
$b8plot3->SetFillColor("#333333");
$b9plot3->SetFillColor("#3BB8D9");
$b8plot3->value->SetColor('white');
$b6plot3->value->SetColor('white');
$b3plot3->value->SetColor('white');
$b5plot3->value->SetColor('white');
$b1plot3->SetColor("#323434");
$b2plot3->SetColor("#323434");
$b3plot3->SetColor("#323434");
$b4plot3->SetColor("#323434");
$b5plot3->SetColor("#323434");
$b6plot3->SetColor("#323434");
$b7plot3->SetColor("#323434");
$b8plot3->SetColor("#323434");
$b9plot3->SetColor("#323434");

$b1plot4->SetFillColor("#FFFF00");
$b6plot4->SetFillColor("blue");
$b3plot4->SetFillColor("#AC3633");
$b4plot4->SetFillColor("#89AC41");
$b5plot4->SetFillColor("#6C4E91");
$b2plot4->SetFillColor("#DDA2A1");
$b7plot4->SetFillColor("#D17122");
$b8plot4->SetFillColor("#333333");
$b9plot4->SetFillColor("#3BB8D9");
$b8plot4->value->SetColor('white');
$b6plot4->value->SetColor('white');
$b3plot4->value->SetColor('white');
$b5plot4->value->SetColor('white');
$b1plot4->SetColor("#323434");
$b2plot4->SetColor("#323434");
$b3plot4->SetColor("#323434");
$b4plot4->SetColor("#323434");
$b5plot4->SetColor("#323434");
$b6plot4->SetColor("#323434");
$b7plot4->SetColor("#323434");
$b8plot4->SetColor("#323434");
$b9plot4->SetColor("#323434");

$b1plot->value->Show();
$b2plot->value->Show();
$b3plot->value->Show();
$b4plot->value->Show();
$b5plot->value->Show();
$b6plot->value->Show();
$b7plot->value->Show();
$b8plot->value->Show();
$b9plot->value->Show();
$b1plot->value->SetFormat("%u");
$b2plot->value->SetFormat("%u");
$b3plot->value->SetFormat("%u");
$b4plot->value->SetFormat("%u");
$b5plot->value->SetFormat("%u");
$b6plot->value->SetFormat("%u");
$b7plot->value->SetFormat("%u");
$b8plot->value->SetFormat("%u");
$b9plot->value->SetFormat("%u");
$b1plot->SetValuePos('center');
$b2plot->SetValuePos('center');
$b3plot->SetValuePos('center');
$b4plot->SetValuePos('center');
$b5plot->SetValuePos('center');
$b6plot->SetValuePos('center');
$b7plot->SetValuePos('center');
$b8plot->SetValuePos('center');
$b9plot->SetValuePos('center');

$b1plot2->value->Show();
$b2plot2->value->Show();
$b3plot2->value->Show();
$b4plot2->value->Show();
$b5plot2->value->Show();
$b6plot2->value->Show();
$b7plot2->value->Show();
$b8plot2->value->Show();
$b9plot2->value->Show();
$b1plot2->value->SetFormat("%u");
$b2plot2->value->SetFormat("%u");
$b3plot2->value->SetFormat("%u");
$b4plot2->value->SetFormat("%u");
$b5plot2->value->SetFormat("%u");
$b6plot2->value->SetFormat("%u");
$b7plot2->value->SetFormat("%u");
$b8plot2->value->SetFormat("%u");
$b9plot2->value->SetFormat("%u");
$b1plot2->SetValuePos('center');
$b2plot2->SetValuePos('center');
$b3plot2->SetValuePos('center');
$b4plot2->SetValuePos('center');
$b5plot2->SetValuePos('center');
$b6plot2->SetValuePos('center');
$b7plot2->SetValuePos('center');
$b8plot2->SetValuePos('center');
$b9plot2->SetValuePos('center');

$b1plot3->value->Show();
$b2plot3->value->Show();
$b3plot3->value->Show();
$b4plot3->value->Show();
$b5plot3->value->Show();
$b6plot3->value->Show();
$b7plot3->value->Show();
$b8plot3->value->Show();
$b9plot3->value->Show();
$b1plot3->value->SetFormat("%u");
$b2plot3->value->SetFormat("%u");
$b3plot3->value->SetFormat("%u");
$b4plot3->value->SetFormat("%u");
$b5plot3->value->SetFormat("%u");
$b6plot3->value->SetFormat("%u");
$b7plot3->value->SetFormat("%u");
$b8plot3->value->SetFormat("%u");
$b9plot3->value->SetFormat("%u");
$b1plot3->SetValuePos('center');
$b2plot3->SetValuePos('center');
$b3plot3->SetValuePos('center');
$b4plot3->SetValuePos('center');
$b5plot3->SetValuePos('center');
$b6plot3->SetValuePos('center');
$b7plot3->SetValuePos('center');
$b8plot3->SetValuePos('center');
$b9plot3->SetValuePos('center');

$b1plot4->value->Show();
$b2plot4->value->Show();
$b3plot4->value->Show();
$b4plot4->value->Show();
$b5plot4->value->Show();
$b6plot4->value->Show();
$b7plot4->value->Show();
$b8plot4->value->Show();
$b9plot4->value->Show();
$b1plot4->value->SetFormat("%u");
$b2plot4->value->SetFormat("%u");
$b3plot4->value->SetFormat("%u");
$b4plot4->value->SetFormat("%u");
$b5plot4->value->SetFormat("%u");
$b6plot4->value->SetFormat("%u");
$b7plot4->value->SetFormat("%u");
$b8plot4->value->SetFormat("%u");
$b9plot4->value->SetFormat("%u");
$b1plot4->SetValuePos('center');
$b2plot4->SetValuePos('center');
$b3plot4->SetValuePos('center');
$b4plot4->SetValuePos('center');
$b5plot4->SetValuePos('center');
$b6plot4->SetValuePos('center');
$b7plot4->SetValuePos('center');
$b8plot4->SetValuePos('center');
$b9plot4->SetValuePos('center');
			$graph->Stroke();
?>