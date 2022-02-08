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
		$resp2 = "(responsabilite = 'YES' OR responsabilite = 'NO') AND "; 
	}
else
	{
		$resp2 = "responsabilite = 'YES' AND "; 
	};


$date_explosee = explode("-", $date1);
$date_explosee2 = explode("-", date("y-m-d"));
$date_explosee3 = explode("-", "2013-08-21");

$mois = $date_explosee2[1];
$annee = substr($date_explosee2[0],-1);

$mois2 = $date_explosee2[1];
$annee2 = substr($date_explosee2[0],-1);
//echo $annee;

//pour 2012
for($i=1; $i< 2; $i++)
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
			for ($j=8; $j <= 9 ; $j++ )
				{
				$sql1 .=' urgency = "Medium" AND type = "Incident"  AND (AppVersion = "Notification-EAI" OR AppVersion= "EAI notification") AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="2011-0'.$j.'-01" AND resolution_date <="2011-0'.$j.'-31"' ;
				$sql2 = 'SELECT nom as name from mois where id = "'.$j.'" ';
				$sql3 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Standard notification"  AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="2011-0'.$j.'-01" AND resolution_date <="2011-0'.$j.'-31"' ;
				$sql4 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "SKy Channel API 3.3.2.8" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="2011-0'.$j.'-01" AND resolution_date <="2011-0'.$j.'-31"' ;
				$sql5 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Sky Pay 4.3" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="2011-0'.$j.'-01" AND resolution_date <="2011-0'.$j.'-31"' ;
				$sql6 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Sky Sales 3.3.2.8" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="2011-0'.$j.'-01" AND resolution_date <="2011-0'.$j.'-31"' ;
				$sql7 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Sky Speed 3.3.2.8" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="2011-0'.$j.'-01" AND resolution_date <="2011-0'.$j.'-31"' ;
				$sql8 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "SKy Report 2.0.5.6" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="2011-0'.$j.'-01" AND resolution_date <="2011-0'.$j.'-31"' ;
				$sql9 .=' urgency = "Medium" AND type = "Incident"  AND (AppVersion= "EPIC Services" OR AppVersion= "Data Bases (ODS, OLTP)" OR AppVersion="Au Utilities (sky Schedule and Sky Fare) 3.3.2.8" OR AppVersion="Au Update daemon" OR AppVersion="ARO daemon" ) AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="2011-0'.$j.'-01" AND resolution_date <="2011-0'.$j.'-31"' ;
				$sql10 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "YMS GUI" AND category = "NTV - YMS" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="2011-0'.$j.'-01" AND resolution_date <="2011-0'.$j.'-31"' ;
				$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
				$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req6 = mysql_query($sql6) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req7 = mysql_query($sql7) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req8 = mysql_query($sql8) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req9 = mysql_query($sql9) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error());
				$req10 = mysql_query($sql10) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error());
				//echo $sql1. '<br>'; 
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
				$xdata[] = $data2['name'].' 1'.$i;
				if($data1['numb'] == '') {    $data1['numb'] = '0';     } 
				if($data3['numb'] == '') {    $data3['numb'] = '0';     } 
				if($data4['numb'] == '') {    $data4['numb'] = '0';     } 
				if($data5['numb'] == '') {    $data5['numb'] = '0';     } 
				if($data6['numb'] == '') {    $data6['numb'] = '0';     } 
				if($data7['numb'] == '') {    $data7['numb'] = '0';     } 
				if($data8['numb'] == '') {    $data8['numb'] = '0';     } 
				if($data9['numb'] == '') {    $data9['numb'] = '0';     } 
				if($data10['numb'] == '') {    $data10['numb'] = '0';     } 
				$adata[] = $data1['numb'];
				$bdata[] = $data3['numb'];
				$cdata[] = $data4['numb'];
				$ddata[] = $data5['numb'];
				$edata[] = $data6['numb'];
				$fdata[] = $data7['numb'];
				$gdata[] = $data8['numb'];
				$hdata[] = $data9['numb'];
				$idata[] = $data10['numb'];
				
				
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
				}
			for ($j=10; $j <= 12 ; $j++ )
			{
			$sql1 .=' urgency = "Medium" AND type = "Incident"  AND (AppVersion = "Notification-EAI" OR AppVersion= "EAI notification") AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="2011-'.$j.'-01" AND resolution_date <="2011-'.$j.'-31"' ;
				$sql2 = 'SELECT nom as name from mois where id = "'.$j.'" ';
				$sql3 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Standard notification"  AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="2011-'.$j.'-01" AND resolution_date <="2011-'.$j.'-31"' ;
				$sql4 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "SKy Channel API 3.3.2.8" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="2011-'.$j.'-01" AND resolution_date <="2011-'.$j.'-31"' ;
				$sql5 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Sky Pay 4.3" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="2011-'.$j.'-01" AND resolution_date <="2011-'.$j.'-31"' ;
				$sql6 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Sky Sales 3.3.2.8" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="2011-'.$j.'-01" AND resolution_date <="2011-'.$j.'-31"' ;
				$sql7 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Sky Speed 3.3.2.8" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="2011-'.$j.'-01" AND resolution_date <="2011-'.$j.'-31"' ;
				$sql8 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "SKy Report 2.0.5.6" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="2011-'.$j.'-01" AND resolution_date <="2011-'.$j.'-31"' ;
				$sql9 .=' urgency = "Medium" AND type = "Incident"  AND (AppVersion= "EPIC Services" OR AppVersion= "Data Bases (ODS, OLTP)" OR AppVersion="Au Utilities (sky Schedule and Sky Fare) 3.3.2.8" OR AppVersion="Au Update daemon" OR AppVersion="ARO daemon" ) AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="2011-'.$j.'-01" AND resolution_date <="2011-0'.$j.'-31"' ;
				$sql10 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "YMS GUI" AND category = "NTV - YMS" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="2011-0'.$j.'-01" AND resolution_date <="2011-'.$j.'-31"' ;
			$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
				$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req6 = mysql_query($sql6) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req7 = mysql_query($sql7) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req8 = mysql_query($sql8) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req9 = mysql_query($sql9) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error());
				$req10 = mysql_query($sql10) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error());
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
				$xdata[] = $data2['name'].' 1'.$i;
				if($data1['numb'] == '') {    $data1['numb'] = '0';     } 
				if($data3['numb'] == '') {    $data3['numb'] = '0';     } 
				if($data4['numb'] == '') {    $data4['numb'] = '0';     } 
				if($data5['numb'] == '') {    $data5['numb'] = '0';     } 
				if($data6['numb'] == '') {    $data6['numb'] = '0';     } 
				if($data7['numb'] == '') {    $data7['numb'] = '0';     } 
				if($data8['numb'] == '') {    $data8['numb'] = '0';     } 
				if($data9['numb'] == '') {    $data9['numb'] = '0';     } 
				if($data10['numb'] == '') {    $data10['numb'] = '0';     } 
				$adata[] = $data1['numb'];
				$bdata[] = $data3['numb'];
				$cdata[] = $data4['numb'];
				$ddata[] = $data5['numb'];
				$edata[] = $data6['numb'];
				$fdata[] = $data7['numb'];
				$gdata[] = $data8['numb'];
				$hdata[] = $data9['numb'];
				$idata[] = $data10['numb'];
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
			}
		}	
	
// pour année entre 2011 et +
		for($i=2; $i< $annee; $i++)
				{
				$sql1 = 'SELECT  count(tracking_id)  as numb from data WHERE  '.$resp2.' ';
				$sql3 = 'SELECT  count(tracking_id) as numb from data WHERE  '.$resp2.'  ';
				$sql4 = 'SELECT  count(tracking_id)  as numb from data WHERE  '.$resp2.'  ';
						for ($j=1; $j <= 9 ; $j++ ){
						$sql1 .=' urgency = "Medium" AND type = "Incident"  AND (AppVersion = "Notification-EAI" OR AppVersion= "EAI notification") AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
				$sql2 = 'SELECT nom as name from mois where id = "'.$j.'" ';
				$sql3 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Standard notification"  AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
				$sql4 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "SKy Channel API 3.3.2.8" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
				$sql5 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Sky Pay 4.3" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
				$sql6 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Sky Sales 3.3.2.8" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
				$sql7 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Sky Speed 3.3.2.8" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
				$sql8 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "SKy Report 2.0.5.6" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
				$sql9 .=' urgency = "Medium" AND type = "Incident"  AND (AppVersion= "EPIC Services" OR AppVersion= "Data Bases (ODS, OLTP)" OR AppVersion="Au Utilities (sky Schedule and Sky Fare) 3.3.2.8" OR AppVersion="Au Update daemon" OR AppVersion="ARO daemon" ) AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
				$sql10 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "YMS GUI" AND category = "NTV - YMS" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
					$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
				$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req6 = mysql_query($sql6) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req7 = mysql_query($sql7) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req8 = mysql_query($sql8) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req9 = mysql_query($sql9) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error());
				$req10 = mysql_query($sql10) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error());
				//echo $sql1. '<br>'; 
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
				$xdata[] = $data2['name'].' 1'.$i;
				if($data1['numb'] == '') {    $data1['numb'] = '0';     } 
				if($data3['numb'] == '') {    $data3['numb'] = '0';     } 
				if($data4['numb'] == '') {    $data4['numb'] = '0';     } 
				if($data5['numb'] == '') {    $data5['numb'] = '0';     } 
				if($data6['numb'] == '') {    $data6['numb'] = '0';     } 
				if($data7['numb'] == '') {    $data7['numb'] = '0';     } 
				if($data8['numb'] == '') {    $data8['numb'] = '0';     } 
				if($data9['numb'] == '') {    $data9['numb'] = '0';     } 
				if($data10['numb'] == '') {    $data10['numb'] = '0';     } 
				$adata[] = $data1['numb'];
				$bdata[] = $data3['numb'];
				$cdata[] = $data4['numb'];
				$ddata[] = $data5['numb'];
				$edata[] = $data6['numb'];
				$fdata[] = $data7['numb'];
				$gdata[] = $data8['numb'];
				$hdata[] = $data9['numb'];
				$idata[] = $data10['numb'];
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
						}		
					

						for ($j=10; $j <= 12 ; $j++ )
						{
						$sql1 .=' urgency = "Medium" AND type = "Incident"  AND (AppVersion = "Notification-EAI" OR AppVersion= "EAI notification") AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-'.$j.'-01" AND resolution_date <="201'.$i.'-'.$j.'-31"' ;
				$sql2 = 'SELECT nom as name from mois where id = "'.$j.'" ';
				$sql3 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Standard notification"  AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-'.$j.'-01" AND resolution_date <="201'.$i.'-'.$j.'-31"' ;
				$sql4 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "SKy Channel API 3.3.2.8" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-'.$j.'-01" AND resolution_date <="201'.$i.'-'.$j.'-31"' ;
				$sql5 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Sky Pay 4.3" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-'.$j.'-01" AND resolution_date <="201'.$i.'-'.$j.'-31"' ;
				$sql6 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Sky Sales 3.3.2.8" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-'.$j.'-01" AND resolution_date <="201'.$i.'-'.$j.'-31"' ;
				$sql7 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Sky Speed 3.3.2.8" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-'.$j.'-01" AND resolution_date <="201'.$i.'-'.$j.'-31"' ;
				$sql8 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "SKy Report 2.0.5.6" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-'.$j.'-01" AND resolution_date <="201'.$i.'-'.$j.'-31"' ;
				$sql9 .=' urgency = "Medium" AND type = "Incident"  AND (AppVersion= "EPIC Services" OR AppVersion= "Data Bases (ODS, OLTP)" OR AppVersion="Au Utilities (sky Schedule and Sky Fare) 3.3.2.8" OR AppVersion="Au Update daemon" OR AppVersion="ARO daemon" ) AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-'.$j.'-01" AND resolution_date <="201'.$i.'-'.$j.'-31"' ;
				$sql10 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "YMS GUI" AND category = "NTV - YMS" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-'.$j.'-01" AND resolution_date <="201'.$i.'-'.$j.'-31"' ;
						$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
				$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req6 = mysql_query($sql6) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req7 = mysql_query($sql7) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req8 = mysql_query($sql8) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req9 = mysql_query($sql9) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error());
				$req10 = mysql_query($sql10) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error());
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
				$xdata[] = $data2['name'].' 1'.$i;
				if($data1['numb'] == '') {    $data1['numb'] = '0';     } 
				if($data3['numb'] == '') {    $data3['numb'] = '0';     } 
				if($data4['numb'] == '') {    $data4['numb'] = '0';     } 
				if($data5['numb'] == '') {    $data5['numb'] = '0';     } 
				if($data6['numb'] == '') {    $data6['numb'] = '0';     } 
				if($data7['numb'] == '') {    $data7['numb'] = '0';     } 
				if($data8['numb'] == '') {    $data8['numb'] = '0';     } 
				if($data9['numb'] == '') {    $data9['numb'] = '0';     } 
				if($data10['numb'] == '') {    $data10['numb'] = '0';     } 
				$adata[] = $data1['numb'];
				$bdata[] = $data3['numb'];
				$cdata[] = $data4['numb'];
				$ddata[] = $data5['numb'];
				$edata[] = $data6['numb'];
				$fdata[] = $data7['numb'];
				$gdata[] = $data8['numb'];
				$hdata[] = $data9['numb'];
				$idata[] = $data10['numb'];
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
						}	
					
			}
			
// boucle année en cours			

						
						$sql1 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql3 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql4 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql5 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql6 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql7 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql8 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql9 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql10 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
							if ($mois <= 9 )
							{
								for ($j=1; $j <= $mois ; $j++ )
									{
									$sql1 .=' urgency = "Medium" AND type = "Incident"  AND (AppVersion = "Notification-EAI" OR AppVersion= "EAI notification") AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
				$sql2 = 'SELECT nom as name from mois where id = "'.$j.'" ';
				$sql3 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Standard notification"  AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
				$sql4 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "SKy Channel API 3.3.2.8" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
				$sql5 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Sky Pay 4.3" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
				$sql6 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Sky Sales 3.3.2.8" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
				$sql7 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Sky Speed 3.3.2.8" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
				$sql8 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "SKy Report 2.0.5.6" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
				$sql9 .=' urgency = "Medium" AND type = "Incident"  AND (AppVersion= "EPIC Services" OR AppVersion= "Data Bases (ODS, OLTP)" OR AppVersion="Au Utilities (sky Schedule and Sky Fare) 3.3.2.8" OR AppVersion="Au Update daemon" OR AppVersion="ARO daemon" ) AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
				$sql10 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "YMS GUI" AND category = "NTV - YMS" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
									$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
				$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req6 = mysql_query($sql6) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req7 = mysql_query($sql7) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req8 = mysql_query($sql8) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req9 = mysql_query($sql9) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error());
				$req10 = mysql_query($sql10) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error());
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
				$xdata[] = $data2['name'].' 1'.$i;
				if($data1['numb'] == '') {    $data1['numb'] = '0';     } 
				if($data3['numb'] == '') {    $data3['numb'] = '0';     } 
				if($data4['numb'] == '') {    $data4['numb'] = '0';     } 
				if($data5['numb'] == '') {    $data5['numb'] = '0';     } 
				if($data6['numb'] == '') {    $data6['numb'] = '0';     } 
				if($data7['numb'] == '') {    $data7['numb'] = '0';     } 
				if($data8['numb'] == '') {    $data8['numb'] = '0';     } 
				if($data9['numb'] == '') {    $data9['numb'] = '0';     } 
				if($data10['numb'] == '') {    $data10['numb'] = '0';     } 
				$adata[] = $data1['numb'];
				$bdata[] = $data3['numb'];
				$cdata[] = $data4['numb'];
				$ddata[] = $data5['numb'];
				$edata[] = $data6['numb'];
				$fdata[] = $data7['numb'];
				$gdata[] = $data8['numb'];
				$hdata[] = $data9['numb'];
				$idata[] = $data10['numb'];
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
									}		
							}
							else 
							{			
								for ($j=1; $j <= 9 ; $j++ )
									{
									$sql1 .=' urgency = "Medium" AND type = "Incident"  AND (AppVersion = "Notification-EAI" OR AppVersion= "EAI notification") AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
				$sql2 = 'SELECT nom as name from mois where id = "'.$j.'" ';
				$sql3 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Standard notification"  AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
				$sql4 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "SKy Channel API 3.3.2.8" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
				$sql5 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Sky Pay 4.3" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
				$sql6 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Sky Sales 3.3.2.8" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
				$sql7 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Sky Speed 3.3.2.8" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
				$sql8 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "SKy Report 2.0.5.6" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
				$sql9 .=' urgency = "Medium" AND type = "Incident"  AND (AppVersion= "EPIC Services" OR AppVersion= "Data Bases (ODS, OLTP)" OR AppVersion="Au Utilities (sky Schedule and Sky Fare) 3.3.2.8" OR AppVersion="Au Update daemon" OR AppVersion="ARO daemon" ) AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
				$sql10 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "YMS GUI" AND category = "NTV - YMS" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31"' ;
									$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
				$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req6 = mysql_query($sql6) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req7 = mysql_query($sql7) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req8 = mysql_query($sql8) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req9 = mysql_query($sql9) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error());
				$req10 = mysql_query($sql10) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error());
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
				$xdata[] = $data2['name'].' 1'.$i;
				if($data1['numb'] == '') {    $data1['numb'] = '0';     } 
				if($data3['numb'] == '') {    $data3['numb'] = '0';     } 
				if($data4['numb'] == '') {    $data4['numb'] = '0';     } 
				if($data5['numb'] == '') {    $data5['numb'] = '0';     } 
				if($data6['numb'] == '') {    $data6['numb'] = '0';     } 
				if($data7['numb'] == '') {    $data7['numb'] = '0';     } 
				if($data8['numb'] == '') {    $data8['numb'] = '0';     } 
				if($data9['numb'] == '') {    $data9['numb'] = '0';     } 
				if($data10['numb'] == '') {    $data10['numb'] = '0';     } 
				$adata[] = $data1['numb'];
				$bdata[] = $data3['numb'];
				$cdata[] = $data4['numb'];
				$ddata[] = $data5['numb'];
				$edata[] = $data6['numb'];
				$fdata[] = $data7['numb'];
				$gdata[] = $data8['numb'];
				$hdata[] = $data9['numb'];
				$idata[] = $data10['numb'];
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
									}	
								for ($j=10; $j <= $mois; $j++ )
									{
									$sql1 .=' urgency = "Medium" AND type = "Incident"  AND (AppVersion = "Notification-EAI" OR AppVersion= "EAI notification") AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-'.$j.'-01" AND resolution_date <="201'.$i.'-'.$j.'-31"' ;
				$sql2 = 'SELECT nom as name from mois where id = "'.$j.'" ';
				$sql3 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Standard notification"  AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-'.$j.'-01" AND resolution_date <="201'.$i.'-'.$j.'-31"' ;
				$sql4 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "SKy Channel API 3.3.2.8" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-'.$j.'-01" AND resolution_date <="201'.$i.'-'.$j.'-31"' ;
				$sql5 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Sky Pay 4.3" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-'.$j.'-01" AND resolution_date <="201'.$i.'-'.$j.'-31"' ;
				$sql6 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Sky Sales 3.3.2.8" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-'.$j.'-01" AND resolution_date <="201'.$i.'-'.$j.'-31"' ;
				$sql7 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "Sky Speed 3.3.2.8" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-'.$j.'-01" AND resolution_date <="201'.$i.'-'.$j.'-31"' ;
				$sql8 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "SKy Report 2.0.5.6" AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-'.$j.'-01" AND resolution_date <="201'.$i.'-'.$j.'-31"' ;
				$sql9 .=' urgency = "Medium" AND type = "Incident"  AND (AppVersion= "EPIC Services" OR AppVersion= "Data Bases (ODS, OLTP)" OR AppVersion="Au Utilities (sky Schedule and Sky Fare) 3.3.2.8" OR AppVersion="Au Update daemon" OR AppVersion="ARO daemon" ) AND category = "NTV - NSK" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-'.$j.'-01" AND resolution_date <="201'.$i.'-'.$j.'-31"' ;
				$sql10 .=' urgency = "Medium" AND type = "Incident"  AND AppVersion= "YMS GUI" AND category = "NTV - YMS" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-'.$j.'-01" AND resolution_date <="201'.$i.'-'.$j.'-31"' ;
									$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
				$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req6 = mysql_query($sql6) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req7 = mysql_query($sql7) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req8 = mysql_query($sql8) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req9 = mysql_query($sql9) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error());
				$req10 = mysql_query($sql10) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
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
				$xdata[] = $data2['name'].' 1'.$i;
				if($data1['numb'] == '') {    $data1['numb'] = '0';     } 
				if($data3['numb'] == '') {    $data3['numb'] = '0';     } 
				if($data4['numb'] == '') {    $data4['numb'] = '0';     } 
				if($data5['numb'] == '') {    $data5['numb'] = '0';     } 
				if($data6['numb'] == '') {    $data6['numb'] = '0';     } 
				if($data7['numb'] == '') {    $data7['numb'] = '0';     } 
				if($data8['numb'] == '') {    $data8['numb'] = '0';     } 
				if($data9['numb'] == '') {    $data9['numb'] = '0';     } 
				if($data10['numb'] == '') {    $data10['numb'] = '0';     } 
				$adata[] = $data1['numb'];
				$bdata[] = $data3['numb'];
				$cdata[] = $data4['numb'];
				$ddata[] = $data5['numb'];
				$edata[] = $data6['numb'];
				$fdata[] = $data7['numb'];
				$gdata[] = $data8['numb'];
				$hdata[] = $data9['numb'];
				$idata[] = $data10['numb'];
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
			$graph->SetScale("textlin");
			$graph->img->SetMargin(60,40,0,70);
			$graph->xaxis->SetFont(FF_FONT1);
			$graph->xaxis->SetLabelAngle(90);
			$graph->xaxis->SetTickLabels($xdata);
			$graph->title->SetMargin(3);
$graph->title->SetFont(FF_ARIAL,FS_NORMAL,10);
			$graph->title->Set('NTV - NSK  APP REPARTITION IN MEDIUM RESOLVED INC BETWEEN '.$date1.' AND '.$date2);
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
 
$ab1plot->SetWidth(0.4);
$graph->Add($ab1plot);
$b1plot->SetFillColor("#FFFF00");
$b2plot->SetFillColor("#FF6600");
$b3plot->SetFillColor("#0000FF ");
$b4plot->SetFillColor("#8E236B");
$b5plot->SetFillColor("#38B0DE");
$b6plot->SetFillColor("#33FF33");
$b7plot->SetFillColor("#CCCCFF");
$b8plot->SetFillColor("#333333");
$b9plot->SetFillColor("#009900");
$b3plot->value->SetColor('white');
$b4plot->value->SetColor('white');
$b8plot->value->SetColor('white');
$b1plot->SetColor("#323434");
$b2plot->SetColor("#323434");
$b3plot->SetColor("#323434");
$b4plot->SetColor("#323434");
$b5plot->SetColor("#323434");
$b6plot->SetColor("#323434");
$b7plot->SetColor("#323434");
$b8plot->SetColor("#323434");
$b9plot->SetColor("#323434");

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
			$graph->Stroke();
?>