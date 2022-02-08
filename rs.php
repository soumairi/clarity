<html>
	  <head>
		<title>RS OS Utilities - DASHBOARD CLARITY</title>
		<link rel="stylesheet" type="text/css" href="../style.css" />
		<script type="text/javascript" src="jQuery 1.7.2.js" ></script>
		<script type="text/javascript" src="html2CSV.js" ></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  </head>
<?php 
include('connect.php'); 
$mois = $_GET['mois'];
$annee = $_GET['annee'];
$nbre = 1;
$resp = $_GET['site'];
$valeur = "RS OS";


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
$date1 = '20'.$i.'-'.$j.'-01' ;

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
					
					
$date2 = '20'.$h.'-'.$k.'-31' ;	

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


//Environnement CFF

$sql1 = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "low" AND created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "CFF - WDI" OR category = "CFF - WDI - INT" OR category = "CFF - PAO" OR category = "CFF - PAO -INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql2 = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "medium" AND created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "CFF - WDI" OR category = "CFF - WDI - INT"  OR category = "CFF - PAO" OR category = "CFF - PAO -INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql3 = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "high" AND created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "CFF - WDI" OR category = "CFF - WDI - INT"  OR category = "CFF - PAO" OR category = "CFF - PAO -INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;

$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 


while ( ($data1 = mysql_fetch_assoc($req1))!== false) {
$id1 = $data1["id"];
}
while ( ($data2 = mysql_fetch_assoc($req2))!== false) {
$id2 = $data2["id"];
}
while ( ($data3 = mysql_fetch_assoc($req3))!== false) {
$id3 = $data3["id"];
}
//total CFF
$id4 = $id1 + $id2 + $id3;

//Environnement BENE

$sql31 = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "low" AND created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "BENERAIL - WDI" OR category = "BENERAIL - WDI - INT" OR category = "BENERAIL - PAO" OR category = "BENERAIL - PAO -INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql32 = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "medium" AND created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "BENERAIL - WDI" OR category = "BENERAIL - WDI - INT" OR category = "BENERAIL - PAO" OR category = "BENERAIL - PAO -INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql33 = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "high" AND created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "BENERAIL - WDI" OR category = "BENERAIL - WDI - INT" OR category = "BENERAIL - PAO" OR category = "BENERAIL - PAO -INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;

$req31 = mysql_query($sql31) or die('Erreur SQL !<br>'.$sql31.'<br>'.mysql_error()); 
$req32 = mysql_query($sql32) or die('Erreur SQL !<br>'.$sql32.'<br>'.mysql_error()); 
$req33 = mysql_query($sql33) or die('Erreur SQL !<br>'.$sql33.'<br>'.mysql_error()); 


while ( ($data31 = mysql_fetch_assoc($req31))!== false) {
$id31 = $data31["id"];
}
while ( ($data32 = mysql_fetch_assoc($req32))!== false) {
$id32 = $data32["id"];
}
while ( ($data33 = mysql_fetch_assoc($req33))!== false) {
$id33 = $data33["id"];
}
//total BENE
$id34 = $id31 + $id32 + $id33;

//Environnement DB

$sql5 = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "low" AND created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "DB - PAO"  OR category = "DB - PAO - INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql6 = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "medium" AND created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "DB - PAO"  OR category = "DB - PAO - INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql7 = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "high" AND created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "DB - PAO"  OR category = "DB - PAO - INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;

$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql5.'<br>'.mysql_error()); 
$req6 = mysql_query($sql6) or die('Erreur SQL !<br>'.$sql6.'<br>'.mysql_error()); 
$req7 = mysql_query($sql7) or die('Erreur SQL !<br>'.$sql7.'<br>'.mysql_error()); 


while ( ($data5 = mysql_fetch_assoc($req5))!== false) {
$id5 = $data5["id"];
}
while ( ($data6 = mysql_fetch_assoc($req6))!== false) {
$id6 = $data6["id"];
}
while ( ($data7 = mysql_fetch_assoc($req7))!== false) {
$id7 = $data7["id"];
}
$id8 = $id5 + $id6 + $id7;

//Environnement ELIPSOS

$sql5e = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "low" AND created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "ELIPSOS - NSK"  OR category = "ELIPSOS - YMS" OR category ="ELIPSOS - NSK - INT" OR category = "ELIPSOS - YMS - INT" OR category = "ELIPSOS - RMF" OR category = "CORM - YMS") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql6e = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "medium" AND created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "ELIPSOS - NSK"  OR category = "ELIPSOS - YMS" OR category ="ELIPSOS - NSK - INT" OR category = "ELIPSOS - YMS - INT" OR category = "ELIPSOS - RMF" OR category = "CORM - YMS") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql7e = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "high" AND created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "ELIPSOS - NSK"  OR category = "ELIPSOS - YMS" OR category ="ELIPSOS - NSK - INT" OR category = "ELIPSOS - YMS - INT" OR category = "ELIPSOS - RMF" OR category = "CORM - YMS") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;

$req5e = mysql_query($sql5e) or die('Erreur SQL !<br>'.$sql5e.'<br>'.mysql_error()); 
$req6e = mysql_query($sql6e) or die('Erreur SQL !<br>'.$sql6e.'<br>'.mysql_error()); 
$req7e = mysql_query($sql7e) or die('Erreur SQL !<br>'.$sql7e.'<br>'.mysql_error()); 


while ( ($data5e = mysql_fetch_assoc($req5e))!== false) {
$id5e = $data5e["id"];
}
while ( ($data6e = mysql_fetch_assoc($req6e))!== false) {
$id6e = $data6e["id"];
}
while ( ($data7e = mysql_fetch_assoc($req7e))!== false) {
$id7e = $data7e["id"];
}
$id8e = $id5e + $id6e + $id7e;


//Environnement RS

$sql9 = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "low" AND created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "RS - ClarityPPM"  ) AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql10 = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "medium" AND created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "RS - ClarityPPM" ) AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql11 = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "high" AND created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "RS - ClarityPPM" ) AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;

$req9 = mysql_query($sql9) or die('Erreur SQL !<br>'.$sql9.'<br>'.mysql_error()); 
$req10 = mysql_query($sql10) or die('Erreur SQL !<br>'.$sql10.'<br>'.mysql_error()); 
$req11 = mysql_query($sql11) or die('Erreur SQL !<br>'.$sql11.'<br>'.mysql_error()); 


while ( ($data9 = mysql_fetch_assoc($req9))!== false) {
$id9 = $data9["id"];
}
while ( ($data10 = mysql_fetch_assoc($req10))!== false) {
$id10 = $data10["id"];
}
while ( ($data11 = mysql_fetch_assoc($req11))!== false) {
$id11 = $data11["id"];
}
$id12 = $id9 + $id10 + $id11;

//Environnement SCOTRAIL/ Eurostar PAO SIDH

$sql17 = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "low" AND created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR - PAO - INT" OR category = "EUROSTAR-SIDH" OR category = "EUROSTAR-S3") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql18 = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "medium" AND created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR - PAO - INT" OR category = "EUROSTAR-SIDH" OR category = "EUROSTAR-S3") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql19 = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "high" AND created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR - PAO - INT" OR category = "EUROSTAR-SIDH" OR category = "EUROSTAR-S3") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;

$req17 = mysql_query($sql17) or die('Erreur SQL !<br>'.$sql17.'<br>'.mysql_error()); 
$req18 = mysql_query($sql18) or die('Erreur SQL !<br>'.$sql18.'<br>'.mysql_error()); 
$req19 = mysql_query($sql19) or die('Erreur SQL !<br>'.$sql19.'<br>'.mysql_error()); 


while ( ($data17 = mysql_fetch_assoc($req17))!== false) {
$id17 = $data17["id"];
}
while ( ($data18 = mysql_fetch_assoc($req18))!== false) {
$id18 = $data18["id"];
}
while ( ($data19 = mysql_fetch_assoc($req19))!== false) {
$id19 = $data19["id"];
}
//total Eurostar
$id20 = $id17 + $id18 + $id19;


//Environnement THALYS

$sql21 = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "low" AND created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "THALYS - YMS" OR category = "THALYS - YMS - INT" OR category = "THALYS-RR" OR category = "THALYS-PAO" OR category = "THALYS-PAO-INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql22 = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "medium" AND created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "THALYS - YMS" OR category = "THALYS - YMS - INT" OR category = "THALYS-RR" OR category = "THALYS-PAO" OR category = "THALYS-PAO-INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql23 = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "high" AND created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "THALYS - YMS" OR category = "THALYS - YMS - INT" OR category = "THALYS-RR" OR category = "THALYS-PAO" OR category = "THALYS-PAO-INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;

$req21 = mysql_query($sql21) or die('Erreur SQL !<br>'.$sql21.'<br>'.mysql_error()); 
$req22 = mysql_query($sql22) or die('Erreur SQL !<br>'.$sql22.'<br>'.mysql_error()); 
$req23 = mysql_query($sql23) or die('Erreur SQL !<br>'.$sql23.'<br>'.mysql_error()); 


while ( ($data21 = mysql_fetch_assoc($req21))!== false) {
$id21 = $data21["id"];
}
while ( ($data22 = mysql_fetch_assoc($req22))!== false) {
$id22 = $data22["id"];
}
while ( ($data23 = mysql_fetch_assoc($req23))!== false) {
$id23 = $data23["id"];
}
//total Thalys
$id24 = $id21 + $id22 + $id23;


//totaux
$id13 = $id1 + $id5 + $id5e + $id9 + $id21 + $id31 +  $id17;
$id14 = $id2 + $id6 + $id6e + $id10 + $id22 + $id32 + $id18;
$id15 = $id3 + $id7 + $id7e + $id11 + $id23 + $id33 + $id19;
$id16 = $id4 + $id8 + $id8e + $id12 + $id24 + $id34 + $id20;

//Environnement CFF ferm꦳

$sql1f = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "low"  AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "CFF - WDI" OR category = "CFF - WDI - INT" OR category = "CFF - PAO" OR category = "CFF - PAO - INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql2f = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "medium"  AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "CFF - WDI" OR category = "CFF - WDI - INT" OR category = "CFF - PAO" OR category = "CFF - PAO - INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql3f = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "high"  AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "CFF - WDI" OR category = "CFF - WDI - INT" OR category = "CFF - PAO" OR category = "CFF - PAO - INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;

$req1f = mysql_query($sql1f) or die('Erreur SQL !<br>'.$sql1f.'<br>'.mysql_error()); 
$req2f = mysql_query($sql2f) or die('Erreur SQL !<br>'.$sql2f.'<br>'.mysql_error()); 
$req3f = mysql_query($sql3f) or die('Erreur SQL !<br>'.$sql3f.'<br>'.mysql_error()); 


while ( ($data1f = mysql_fetch_assoc($req1f))!== false) {
$id1f = $data1f["id"];
}
while ( ($data2f = mysql_fetch_assoc($req2f))!== false) {
$id2f = $data2f["id"];
}
while ( ($data3f = mysql_fetch_assoc($req3f))!== false) {
$id3f = $data3f["id"];
}
//total CFF
$id4f = $id1f + $id2f + $id3f;

//Environnement BENE ferm꦳

$sql31f = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "low"  AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "BENERAIL - WDI" OR category = "BENERAIL - WDI - INT" OR category = "BENERAIL - PAO" OR category = "BENERAIL - PAO - INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql32f = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "medium"  AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "BENERAIL - WDI" OR category = "BENERAIL - WDI - INT" OR category = "BENERAIL - PAO" OR category = "BENERAIL - PAO - INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql33f = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "high"  AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "BENERAIL - WDI" OR category = "BENERAIL - WDI - INT" OR category = "BENERAIL - PAO" OR category = "BENERAIL - PAO - INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;

$req31f = mysql_query($sql31f) or die('Erreur SQL !<br>'.$sql31f.'<br>'.mysql_error()); 
$req32f = mysql_query($sql32f) or die('Erreur SQL !<br>'.$sql32f.'<br>'.mysql_error()); 
$req33f = mysql_query($sql33f) or die('Erreur SQL !<br>'.$sql33f.'<br>'.mysql_error()); 


while ( ($data31f = mysql_fetch_assoc($req31f))!== false) {
$id31f = $data31f["id"];
}
while ( ($data32f = mysql_fetch_assoc($req32f))!== false) {
$id32f = $data32f["id"];
}
while ( ($data33f = mysql_fetch_assoc($req33f))!== false) {
$id33f = $data33f["id"];
}
//total BENE
$id34f = $id31f + $id32f + $id33f;

//Environnement SCOTRAIL EUROSTAR-SIDH ferm꦳

$sql17f = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "low"  AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR - PAO - INT" OR category = "EUROSTAR-SIDH" OR category = "EUROSTAR-S3")  AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql18f = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "medium"  AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR - PAO - INT" OR category = "EUROSTAR-SIDH"  OR category = "EUROSTAR-S3") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql19f = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "high"  AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR - PAO - INT" OR category = "EUROSTAR-SIDH" OR category = "EUROSTAR-S3") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;

$req17f = mysql_query($sql17f) or die('Erreur SQL !<br>'.$sql17f.'<br>'.mysql_error()); 
$req18f = mysql_query($sql18f) or die('Erreur SQL !<br>'.$sql18f.'<br>'.mysql_error()); 
$req19f = mysql_query($sql19f) or die('Erreur SQL !<br>'.$sql19f.'<br>'.mysql_error()); 


while ( ($data17f = mysql_fetch_assoc($req17f))!== false) {
$id17f = $data17f["id"];
}
while ( ($data18f = mysql_fetch_assoc($req18f))!== false) {
$id18f = $data18f["id"];
}
while ( ($data19f = mysql_fetch_assoc($req19f))!== false) {
$id19f = $data19f["id"];
}
//total SCOTRAIL Eurostar PAO - SIDH
$id20f = $id17f + $id18f + $id19f;

//Environnement THALYS ferm꦳

$sql21f = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "low"  AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "THALYS - YMS" or category = "THALYS - YMS - INT" OR category = "THALYS-RR" OR category = "THALYS-PAO" OR category = "THALYS-PAO-INT")  AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql22f = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "medium"  AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "THALYS - YMS" or category = "THALYS - YMS - INT" OR category = "THALYS-RR" OR category = "THALYS-PAO" OR category = "THALYS-PAO-INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql23f = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "high"  AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "THALYS - YMS" or category = "THALYS - YMS - INT" OR category = "THALYS-RR" OR category = "THALYS-PAO" OR category = "THALYS-PAO-INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;

$req21f = mysql_query($sql21f) or die('Erreur SQL !<br>'.$sql21f.'<br>'.mysql_error()); 
$req22f = mysql_query($sql22f) or die('Erreur SQL !<br>'.$sql22f.'<br>'.mysql_error()); 
$req23f = mysql_query($sql23f) or die('Erreur SQL !<br>'.$sql23f.'<br>'.mysql_error()); 


while ( ($data21f = mysql_fetch_assoc($req21f))!== false) {
$id21f = $data21f["id"];
}
while ( ($data22f = mysql_fetch_assoc($req22f))!== false) {
$id22f = $data22f["id"];
}
while ( ($data23f = mysql_fetch_assoc($req23f))!== false) {
$id23f = $data23f["id"];
}
//total Thalys
$id24f = $id21f + $id22f + $id23f;

//Environnement DB fermee

$sql5f = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "low"  AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "DB - PAO"  OR category = "DB - PAO - INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql6f = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "medium"  AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "DB - PAO"  OR category = "DB - PAO - INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql7f = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "high"  AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "DB - PAO"  OR category = "DB - PAO - INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;

$req5f = mysql_query($sql5f) or die('Erreur SQL !<br>'.$sql5f.'<br>'.mysql_error()); 
$req6f = mysql_query($sql6f) or die('Erreur SQL !<br>'.$sql6f.'<br>'.mysql_error()); 
$req7f = mysql_query($sql7f) or die('Erreur SQL !<br>'.$sql7f.'<br>'.mysql_error()); 


while ( ($data5f = mysql_fetch_assoc($req5f))!== false) {
$id5f = $data5f["id"];
}
while ( ($data6f = mysql_fetch_assoc($req6f))!== false) {
$id6f = $data6f["id"];
}
while ( ($data7f = mysql_fetch_assoc($req7f))!== false) {
$id7f = $data7f["id"];
}
$id8f = $id5f + $id6f + $id7f;

//Environnement ELIPSOS fermee

$sql5fe = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "low"  AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "ELIPSOS - NSK"  OR category = "ELIPSOS - YMS" OR category ="ELIPSOS - NSK - INT" OR category = "ELIPSOS - YMS - INT" OR category = "ELIPSOS - RMF" OR category = "CORM - YMS") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql6fe = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "medium"  AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "ELIPSOS - NSK"  OR category = "ELIPSOS - YMS" OR category ="ELIPSOS - NSK - INT" OR category = "ELIPSOS - YMS - INT" OR category = "ELIPSOS - RMF" OR category = "CORM - YMS") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql7fe = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "high"  AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "ELIPSOS - NSK"  OR category = "ELIPSOS - YMS" OR category ="ELIPSOS - NSK - INT" OR category = "ELIPSOS - YMS - INT" OR category = "ELIPSOS - RMF" OR category = "CORM - YMS") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;

$req5fe = mysql_query($sql5fe) or die('Erreur SQL !<br>'.$sql5fe.'<br>'.mysql_error()); 
$req6fe = mysql_query($sql6fe) or die('Erreur SQL !<br>'.$sql6fe.'<br>'.mysql_error()); 
$req7fe = mysql_query($sql7fe) or die('Erreur SQL !<br>'.$sql7fe.'<br>'.mysql_error()); 


while ( ($data5fe = mysql_fetch_assoc($req5fe))!== false) {
$id5fe = $data5fe["id"];
}
while ( ($data6fe = mysql_fetch_assoc($req6fe))!== false) {
$id6fe = $data6fe["id"];
}
while ( ($data7fe = mysql_fetch_assoc($req7fe))!== false) {
$id7fe = $data7fe["id"];
}
$id8fe = $id5fe + $id6fe + $id7fe;


//Environnement RS fermee

$sql9f = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "low"  AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "RS - ClarityPPM"  ) AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql10f = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "medium"  AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "RS - ClarityPPM" ) AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql11f = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "RS - ClarityPPM" ) AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;

$req9f = mysql_query($sql9f) or die('Erreur SQL !<br>'.$sql9f.'<br>'.mysql_error()); 
$req10f = mysql_query($sql10f) or die('Erreur SQL !<br>'.$sql10f.'<br>'.mysql_error()); 
$req11f = mysql_query($sql11f) or die('Erreur SQL !<br>'.$sql11f.'<br>'.mysql_error()); 


while ( ($data9f = mysql_fetch_assoc($req9f))!== false) {
$id9f = $data9f["id"];
}
while ( ($data10f = mysql_fetch_assoc($req10f))!== false) {
$id10f = $data10f["id"];
}
while ( ($data11f = mysql_fetch_assoc($req11f))!== false) {
$id11f = $data11f["id"];
}
$id12f = $id9f + $id10f + $id11f;

//totaux
$id13f = $id1f + $id5f + $id5fe + $id9f + $id21f + $id31f + $id17f;
$id14f = $id2f + $id6f + $id6fe + $id10f + $id22f + $id32f + $id18f;
$id15f = $id3f + $id7f + $id7fe + $id11f + $id23f + $id33f + $id19f;
$id16f = $id4f + $id8f + $id8fe + $id12f + $id24f + $id34f + $id20f;


//Environnement CFF ouvertes

$sql1o = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "low"   AND created_date <"'.$date2.' 23:59:00" AND (resolution_date >"'.$date2.' 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"  AND (category = "CFF - WDI" OR category = "CFF - WDI - INT" OR category = "CFF - PAO" OR category = "CFF - PAO - INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql2o = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "medium"  AND created_date <"'.$date2.' 23:59:00" AND (resolution_date >"'.$date2.' 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"  AND (category = "CFF - WDI" OR category = "CFF - WDI - INT" OR category = "CFF - PAO" OR category = "CFF - PAO - INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql3o = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "high"  AND created_date <"'.$date2.' 23:59:00" AND (resolution_date >"'.$date2.' 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"  AND (category = "CFF - WDI" OR category = "CFF - WDI - INT" OR category = "CFF - PAO" OR category = "CFF - PAO - INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;

$req1o = mysql_query($sql1o) or die('Erreur SQL !<br>'.$sql1o.'<br>'.mysql_error()); 
$req2o = mysql_query($sql2o) or die('Erreur SQL !<br>'.$sql2o.'<br>'.mysql_error()); 
$req3o = mysql_query($sql3o) or die('Erreur SQL !<br>'.$sql3o.'<br>'.mysql_error()); 


while ( ($data1o = mysql_fetch_assoc($req1o))!== false) {
$id1o = $data1o["id"];
}
while ( ($data2o = mysql_fetch_assoc($req2o))!== false) {
$id2o = $data2o["id"];
}
while ( ($data3o = mysql_fetch_assoc($req3o))!== false) {
$id3o = $data3o["id"];
}
//total CFF
$id4o = $id1o + $id2o + $id3o;

//Environnement BENE ouvertes

$sql31o = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "low"   AND created_date <"'.$date2.' 23:59:00" AND (resolution_date >"'.$date2.' 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"  AND (category = "BENERAIL - WDI" OR category = "BENERAIL - WDI - INT" OR category = "BENERAIL - PAO" OR category = "BENERAIL - PAO - INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql32o = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "medium"  AND created_date <"'.$date2.' 23:59:00" AND (resolution_date >"'.$date2.' 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"  AND (category = "BENERAIL - WDI" OR category = "BENERAIL - WDI - INT" OR category = "BENERAIL - PAO" OR category = "BENERAIL - PAO - INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql33o = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "high"  AND created_date <"'.$date2.' 23:59:00" AND (resolution_date >"'.$date2.' 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"  AND (category = "BENERAIL - WDI" OR category = "BENERAIL - WDI - INT" OR category = "BENERAIL - PAO" OR category = "BENERAIL - PAO - INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;

$req31o = mysql_query($sql31o) or die('Erreur SQL !<br>'.$sql31o.'<br>'.mysql_error()); 
$req32o = mysql_query($sql32o) or die('Erreur SQL !<br>'.$sql32o.'<br>'.mysql_error()); 
$req33o = mysql_query($sql33o) or die('Erreur SQL !<br>'.$sql33o.'<br>'.mysql_error()); 


while ( ($data31o = mysql_fetch_assoc($req31o))!== false) {
$id31o = $data31o["id"];
}
while ( ($data32o = mysql_fetch_assoc($req32o))!== false) {
$id32o = $data32o["id"];
}
while ( ($data33o = mysql_fetch_assoc($req33o))!== false) {
$id33o = $data33o["id"];
}
//total BENE
$id34o = $id31o + $id32o + $id33o;

//Environnement SCOTRAIL EUROSTAR-SIDH ouvertes

$sql17o = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "low"   AND created_date <"'.$date2.' 23:59:00" AND (resolution_date >"'.$date2.' 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"  AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR - PAO - INT" OR category = "EUROSTAR-SIDH" OR category = "EUROSTAR-S3") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql18o = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "medium"  AND created_date <"'.$date2.' 23:59:00" AND (resolution_date >"'.$date2.' 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"  AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR - PAO - INT" OR category = "EUROSTAR-SIDH" OR category = "EUROSTAR-S3") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql19o = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "high"  AND created_date <"'.$date2.' 23:59:00" AND (resolution_date >"'.$date2.' 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"  AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR - PAO - INT" OR category = "EUROSTAR-SIDH" OR category = "EUROSTAR-S3") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;

$req17o = mysql_query($sql17o) or die('Erreur SQL !<br>'.$sql17o.'<br>'.mysql_error()); 
$req18o = mysql_query($sql18o) or die('Erreur SQL !<br>'.$sql18o.'<br>'.mysql_error()); 
$req19o = mysql_query($sql19o) or die('Erreur SQL !<br>'.$sql19o.'<br>'.mysql_error()); 


while ( ($data17o = mysql_fetch_assoc($req17o))!== false) {
$id17o = $data17o["id"];
}
while ( ($data18o = mysql_fetch_assoc($req18o))!== false) {
$id18o = $data18o["id"];
}
while ( ($data19o = mysql_fetch_assoc($req19o))!== false) {
$id19o = $data19o["id"];
}
//total SCOTRAIL PAO - SIDH
$id20o = $id17o + $id18o + $id19o;

//Environnement THALYS ouvertes

$sql21o = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "low"   AND created_date <"'.$date2.' 23:59:00" AND (resolution_date >"'.$date2.' 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"  AND (category = "THALYS - YMS" OR category ="THALYS - YMS -INT" OR category = "THALYS-RR" OR category = "THALYS-PAO" OR category = "THALYS-PAO-INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql22o = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "medium"  AND created_date <"'.$date2.' 23:59:00" AND (resolution_date >"'.$date2.' 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"  AND (category = "THALYS - YMS" OR category ="THALYS - YMS -INT" OR category = "THALYS-RR" OR category = "THALYS-PAO" OR category = "THALYS-PAO-INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql23o = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "high"  AND created_date <"'.$date2.' 23:59:00" AND (resolution_date >"'.$date2.' 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"  AND (category = "THALYS - YMS" OR category ="THALYS - YMS -INT" OR category = "THALYS-RR" OR category = "THALYS-PAO" OR category = "THALYS-PAO-INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;

$req21o = mysql_query($sql21o) or die('Erreur SQL !<br>'.$sql21o.'<br>'.mysql_error()); 
$req22o = mysql_query($sql22o) or die('Erreur SQL !<br>'.$sql22o.'<br>'.mysql_error()); 
$req23o = mysql_query($sql23o) or die('Erreur SQL !<br>'.$sql23o.'<br>'.mysql_error()); 


while ( ($data21o = mysql_fetch_assoc($req21o))!== false) {
$id21o = $data21o["id"];
}
while ( ($data22o = mysql_fetch_assoc($req22o))!== false) {
$id22o = $data22o["id"];
}
while ( ($data23o = mysql_fetch_assoc($req23o))!== false) {
$id23o = $data23o["id"];
}
//total THALYS
$id24o = $id21o + $id22o + $id23o;


//Environnement DB ouvertes

$sql5o = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "low"  AND created_date <"'.$date2.' 23:59:00" AND (resolution_date >"'.$date2.' 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"  AND (category = "DB - PAO"  OR category = "DB - PAO - INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql6o = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "medium"  AND created_date <"'.$date2.' 23:59:00" AND (resolution_date >"'.$date2.' 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"  AND (category = "DB - PAO"  OR category = "DB - PAO - INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql7o = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "high"  AND created_date <"'.$date2.' 23:59:00" AND (resolution_date >"'.$date2.' 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"  AND (category = "DB - PAO"  OR category = "DB - PAO - INT") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;

$req5o = mysql_query($sql5o) or die('Erreur SQL !<br>'.$sql5o.'<br>'.mysql_error()); 
$req6o = mysql_query($sql6o) or die('Erreur SQL !<br>'.$sql6o.'<br>'.mysql_error()); 
$req7o = mysql_query($sql7o) or die('Erreur SQL !<br>'.$sql7o.'<br>'.mysql_error()); 


while ( ($data5o = mysql_fetch_assoc($req5o))!== false) {
$id5o = $data5o["id"];
}
while ( ($data6o = mysql_fetch_assoc($req6o))!== false) {
$id6o = $data6o["id"];
}
while ( ($data7o = mysql_fetch_assoc($req7o))!== false) {
$id7o = $data7o["id"];
}
$id8o = $id5o + $id6o + $id7o;


//Environnement ELIPSOS ouvertes

$sql5oe = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "low"  AND created_date <"'.$date2.' 23:59:00" AND (resolution_date >"'.$date2.' 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"  AND (category = "ELIPSOS - NSK"  OR category = "ELIPSOS - YMS" OR category ="ELIPSOS - NSK - INT" OR category = "ELIPSOS - YMS - INT" OR category = "ELIPSOS - RMF" OR category = "CORM - YMS") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql6oe = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "medium"  AND created_date <"'.$date2.' 23:59:00" AND (resolution_date >"'.$date2.' 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"  AND (category = "ELIPSOS - NSK"  OR category = "ELIPSOS - YMS" OR category ="ELIPSOS - NSK - INT" OR category = "ELIPSOS - YMS - INT" OR category = "ELIPSOS - RMF" OR category = "CORM - YMS") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql7oe = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "high"  AND created_date <"'.$date2.' 23:59:00" AND (resolution_date >"'.$date2.' 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"  AND (category = "ELIPSOS - NSK"  OR category = "ELIPSOS - YMS" OR category ="ELIPSOS - NSK - INT" OR category = "ELIPSOS - YMS - INT" OR category = "ELIPSOS - RMF" OR category = "CORM - YMS") AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;

$req5oe = mysql_query($sql5oe) or die('Erreur SQL !<br>'.$sql5oe.'<br>'.mysql_error()); 
$req6oe = mysql_query($sql6oe) or die('Erreur SQL !<br>'.$sql6oe.'<br>'.mysql_error()); 
$req7oe = mysql_query($sql7oe) or die('Erreur SQL !<br>'.$sql7oe.'<br>'.mysql_error()); 


while ( ($data5oe = mysql_fetch_assoc($req5oe))!== false) {
$id5oe = $data5oe["id"];
}
while ( ($data6oe = mysql_fetch_assoc($req6oe))!== false) {
$id6oe = $data6oe["id"];
}
while ( ($data7oe = mysql_fetch_assoc($req7oe))!== false) {
$id7oe = $data7oe["id"];
}
$id8oe = $id5oe + $id6oe + $id7oe;

//Environnement RS ouvertes

$sql9o = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "low"  AND created_date <"'.$date2.' 23:59:00" AND (resolution_date >"'.$date2.' 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected" AND (category = "RS - ClarityPPM"  ) AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql10o = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "medium"  AND created_date <"'.$date2.' 23:59:00" AND (resolution_date >"'.$date2.' 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected" AND (category = "RS - ClarityPPM" ) AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;
$sql11o = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  urgency = "high" AND created_date <"'.$date2.' 23:59:00" AND (resolution_date >"'.$date2.' 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"  AND (category = "RS - ClarityPPM" ) AND impacted_account = "Production" AND (type = "Service Request" OR type = "Information Request")   ' ;

$req9o = mysql_query($sql9o) or die('Erreur SQL !<br>'.$sql9f.'<br>'.mysql_error()); 
$req10o = mysql_query($sql10o) or die('Erreur SQL !<br>'.$sql10f.'<br>'.mysql_error()); 
$req11o = mysql_query($sql11o) or die('Erreur SQL !<br>'.$sql11f.'<br>'.mysql_error()); 


while ( ($data9o = mysql_fetch_assoc($req9o))!== false) {
$id9o = $data9o["id"];
}
while ( ($data10o = mysql_fetch_assoc($req10o))!== false) {
$id10o = $data10o["id"];
}
while ( ($data11o = mysql_fetch_assoc($req11o))!== false) {
$id11o = $data11o["id"];
}
$id12o = $id9o + $id10o + $id11o;

//totaux
$id13o = $id1o + $id5o + $id5oe + $id9o  + $id21o + $id31o + $id17o;
$id14o = $id2o + $id6o + $id6oe + $id10o + $id22o + $id32o + $id18o;
$id15o = $id3o + $id7o + $id7oe + $id11o + $id23o + $id33o + $id19o;
$id16o = $id4o + $id8o + $id8oe + $id12o +$id24o + $id34o + $id20o;


//Environnement CFF global

$sql1g = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "CFF - WDI" OR category = "CFF - WDI - INT" OR category = "CFF - PAO" OR category = "CFF - PAO - INT") ' ;
$sql2fg = 'SELECT count(*) as id from data  WHERE  '.$resp2.' (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "CFF - WDI" OR category = "CFF - WDI - INT" OR category = "CFF - PAO" OR category = "CFF - PAO - INT")' ;
$sql3i = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "CFF - WDI" OR category = "CFF - WDI - INT" OR category = "CFF - PAO" OR category = "CFF - PAO - INT") AND interne = "Yes" ' ;

$req1g = mysql_query($sql1g) or die('Erreur SQL !<br>'.$sql1g.'<br>'.mysql_error()); 
$req2fg = mysql_query($sql2fg) or die('Erreur SQL !<br>'.$sql2fg.'<br>'.mysql_error()); 
$req3i = mysql_query($sql3i) or die('Erreur SQL !<br>'.$sql3i.'<br>'.mysql_error()); 


while ( ($data1g = mysql_fetch_assoc($req1g))!== false) {
$id1g = $data1g["id"];
}
while ( ($data2fg = mysql_fetch_assoc($req2fg))!== false) {
$id2fg = $data2fg["id"];
}
while ( ($data3i = mysql_fetch_assoc($req3i))!== false) {
$id3i = $data3i["id"];
}
//total CFF
$id4p = number_format($id3i *100 / $id2fg, 2) ;

//Environnement BENE global

$sql25g = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "BENERAIL - WDI" OR category = "BENERAIL - WDI - INT" OR category = "BENERAIL - PAO" OR category = "BENERAIL - PAO - INT") ' ;
$sql26fg = 'SELECT count(*) as id from data  WHERE  '.$resp2.' (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "BENERAIL - WDI" OR category = "BENERAIL - WDI - INT" OR category = "BENERAIL - PAO" OR category = "BENERAIL - PAO - INT")' ;
$sql27i = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "BENERAIL - WDI" OR category = "BENERAIL - WDI - INT" OR category = "BENERAIL - PAO" OR category = "BENERAIL - PAO - INT") AND interne = "Yes" ' ;

$req25g = mysql_query($sql25g) or die('Erreur SQL !<br>'.$sql25g.'<br>'.mysql_error()); 
$req26fg = mysql_query($sql26fg) or die('Erreur SQL !<br>'.$sql26fg.'<br>'.mysql_error()); 
$req27i = mysql_query($sql27i) or die('Erreur SQL !<br>'.$sql27i.'<br>'.mysql_error()); 


while ( ($data25g = mysql_fetch_assoc($req25g))!== false) {
$id25g = $data25g["id"];
}
while ( ($data26fg = mysql_fetch_assoc($req26fg))!== false) {
$id26fg = $data26fg["id"];
}
while ( ($data27i = mysql_fetch_assoc($req27i))!== false) {
$id27i = $data27i["id"];
}
//total BENE
$id28p = number_format($id27i *100 / $id26fg, 2) ;


//Environnement SCOTRAIL EUROSTAR-SIDH global

$sql17g = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR - PAO - INT" OR category = "EUROSTAR-SIDH"  OR category = "EUROSTAR-S3")  ' ;
$sql18fg = 'SELECT count(*) as id from data  WHERE  '.$resp2.' (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR - PAO - INT" OR category = "EUROSTAR-SIDH"  OR category = "EUROSTAR-S3")' ;
$sql19i = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR - PAO - INT" OR category = "EUROSTAR-SIDH"  OR category = "EUROSTAR-S3") AND interne = "Yes" ' ;

$req17g = mysql_query($sql17g) or die('Erreur SQL !<br>'.$sql17g.'<br>'.mysql_error()); 
$req18fg = mysql_query($sql18fg) or die('Erreur SQL !<br>'.$sql18fg.'<br>'.mysql_error()); 
$req19i = mysql_query($sql19i) or die('Erreur SQL !<br>'.$sql19i.'<br>'.mysql_error()); 


while ( ($data17g = mysql_fetch_assoc($req17g))!== false) {
$id17g = $data17g["id"];
}
while ( ($data18fg = mysql_fetch_assoc($req18fg))!== false) {
$id18fg = $data18fg["id"];
}
while ( ($data19i = mysql_fetch_assoc($req19i))!== false) {
$id19i = $data19i["id"];
}
//total SCOTRAIL Eurostar PAO SIDH
$id20p = number_format($id19i *100 / $id18fg, 2) ;

//Environnement THALYS global

$sql21g = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "THALYS - YMS" OR category = "THALYS - YMS - INT" OR category = "THALYS-RR" OR category = "THALYS-PAO" OR category = "THALYS-PAO-INT")  ' ;
$sql22fg = 'SELECT count(*) as id from data  WHERE  '.$resp2.' (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "THALYS - YMS" OR category = "THALYS - YMS - INT" OR category = "THALYS-RR" OR category = "THALYS-PAO" OR category = "THALYS-PAO-INT")' ;
$sql23i = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "THALYS - YMS" OR category = "THALYS - YMS - INT" OR category = "THALYS-RR" OR category = "THALYS-PAO" OR category = "THALYS-PAO-INT") AND interne = "Yes" ' ;

$req21g = mysql_query($sql21g) or die('Erreur SQL !<br>'.$sql21g.'<br>'.mysql_error()); 
$req22fg = mysql_query($sql22fg) or die('Erreur SQL !<br>'.$sql22fg.'<br>'.mysql_error()); 
$req23i = mysql_query($sql23i) or die('Erreur SQL !<br>'.$sql23i.'<br>'.mysql_error()); 


while ( ($data21g = mysql_fetch_assoc($req21g))!== false) {
$id21g = $data21g["id"];
}
while ( ($data22fg = mysql_fetch_assoc($req22fg))!== false) {
$id22fg = $data22fg["id"];
}
while ( ($data23i = mysql_fetch_assoc($req23i))!== false) {
$id23i = $data23i["id"];
}
//total THALYS
$id24p = number_format($id23i *100 / $id22fg, 2) ;

//Environnement DB global

$sql5g = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "DB - PAO " OR category = "DB - PAO - INT")' ;
$sql6fg = 'SELECT count(*) as id from data  WHERE  '.$resp2.' (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "DB - PAO " OR category = "DB - PAO - INT")' ;
$sql7i = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "DB - PAO " OR category = "DB - PAO - INT") AND interne = "Yes" ' ;

$req5g = mysql_query($sql5g) or die('Erreur SQL !<br>'.$sql5g.'<br>'.mysql_error()); 
$req6fg = mysql_query($sql6fg) or die('Erreur SQL !<br>'.$sql6fg.'<br>'.mysql_error()); 
$req7i = mysql_query($sql7i) or die('Erreur SQL !<br>'.$sql7i.'<br>'.mysql_error()); 


while ( ($data5g = mysql_fetch_assoc($req5g))!== false) {
$id5g = $data5g["id"];
}
while ( ($data6fg = mysql_fetch_assoc($req6fg))!== false) {
$id6fg = $data6fg["id"];
}
while ( ($data7i = mysql_fetch_assoc($req7i))!== false) {
$id7i = $data7i["id"];
}
//total DB

$id8p = number_format($id7i *100 / $id6fg, 2) ;

//Environnement RS global

$sql9g = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "RS - ClarityPPM" )' ;
$sql10fg = 'SELECT count(*) as id from data  WHERE  '.$resp2.' (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "RS - ClarityPPM" )' ;
$sql11i = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "RS - ClarityPPM" ) ' ;

$req9g = mysql_query($sql9g) or die('Erreur SQL !<br>'.$sql9g.'<br>'.mysql_error()); 
$req10fg = mysql_query($sql10fg) or die('Erreur SQL !<br>'.$sql10fg.'<br>'.mysql_error()); 
$req11i = mysql_query($sql11i) or die('Erreur SQL !<br>'.$sql11i.'<br>'.mysql_error()); 


while ( ($data9g = mysql_fetch_assoc($req9g))!== false) {
$id9g = $data9g["id"];
}
while ( ($data10fg = mysql_fetch_assoc($req10fg))!== false) {
$id10fg = $data10fg["id"];
}
while ( ($data11i = mysql_fetch_assoc($req11i))!== false) {
$id11i = $data11i["id"];
}
//total RS

$id12p = number_format($id11i *100 / $id10fg, 2) ;

//Environnement ELIPSOS global

$sql13g = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  created_date >="'.$date1.'" AND created_date <="'.$date2.' 23:59:00" AND (category = "ELIPSOS - NSK"  OR category = "ELIPSOS - YMS" OR category ="ELIPSOS - NSK - INT" OR category = "ELIPSOS - YMS - INT" OR category = "ELIPSOS - RMF" OR category = "CORM - YMS")' ;
$sql14fg = 'SELECT count(*) as id from data  WHERE  '.$resp2.' (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "ELIPSOS - NSK"  OR category = "ELIPSOS - YMS" OR category ="ELIPSOS - NSK - INT" OR category = "ELIPSOS - YMS - INT" OR category = "ELIPSOS - RMF" OR category = "CORM - YMS")' ;
$sql15i = 'SELECT count(*) as id from data  WHERE  '.$resp2.'  (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.' 23:59:00" AND (category = "ELIPSOS - NSK"  OR category = "ELIPSOS - YMS" OR category ="ELIPSOS - NSK - INT" OR category = "ELIPSOS - YMS - INT" OR category = "ELIPSOS - RMF" OR category = "CORM - YMS") AND interne = "Yes" ' ;

$req13g = mysql_query($sql13g) or die('Erreur SQL !<br>'.$sql13g.'<br>'.mysql_error()); 
$req14fg = mysql_query($sql14fg) or die('Erreur SQL !<br>'.$sql14fg.'<br>'.mysql_error()); 
$req15i = mysql_query($sql15i) or die('Erreur SQL !<br>'.$sql15i.'<br>'.mysql_error()); 


while ( ($data13g = mysql_fetch_assoc($req13g))!== false) {
$id13g = $data13g["id"];
}
while ( ($data14fg = mysql_fetch_assoc($req14fg))!== false) {
$id14fg = $data14fg["id"];
}
while ( ($data15i = mysql_fetch_assoc($req15i))!== false) {
$id15i = $data15i["id"];
}
//total ELIPSOS

$id16p = number_format($id15i *100 / $id14fg, 2) ;

//totaux
$id17t = $id1g + $id5g + $id9g + $id13g + $id17g + $id21g + $id25g;
$id18t = $id2fg + $id6fg + $id10fg + $id14fg + $id18fg + $id22fg + $id26fg;
$id19t = $id3i + $id7i + $id11i + $id15i + $id19i + $id23i + $id27i;
$id20t = number_format($id19t * 100 / $id18t, 2) ;

//Durꥠ de vie des tickets
//DB
$sql5dvn = 'SELECT  avg(datediff( resolution_date, created_date)  - IFNULL(datediff(end_bounced_time, start_bounced_time),0))  as numb from data WHERE urgency = "low" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND (category = "DB - PAO" OR category = "DB - PAO - INT")  AND (type = "Service Request" OR type = "Information Request") AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND impacted_account = "Production"';
$sql6dvn = 'SELECT  avg(datediff( resolution_date, created_date)  - IFNULL(datediff(end_bounced_time, start_bounced_time),0))  as numb from data WHERE urgency = "medium" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND (category = "DB - PAO" OR category = "DB - PAO - INT")  AND (type = "Service Request" OR type = "Information Request") AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND impacted_account = "Production"';
$sql7dvn = 'SELECT  avg(datediff( resolution_date, created_date)  - IFNULL(datediff(end_bounced_time, start_bounced_time),0))  as numb from data WHERE urgency = "high" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND (category = "DB - PAO" OR category = "DB - PAO - INT")   AND (type = "Service Request" OR type = "Information Request") AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND impacted_account = "Production"';
//CFF
$sql5dvc = 'SELECT  avg(datediff( resolution_date, created_date)  - IFNULL(datediff(end_bounced_time, start_bounced_time),0))  as numb from data WHERE urgency = "low" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND (category = "CFF - WDI" OR category = "CFF - WDI - INT" OR category = "CFF - PAO" OR category = "CFF - PAO - INT")  AND (type = "Service Request" OR type = "Information Request") AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND impacted_account = "Production" ';
$sql6dvc = 'SELECT  avg(datediff( resolution_date, created_date)  - IFNULL(datediff(end_bounced_time, start_bounced_time),0))  as numb from data WHERE urgency = "medium" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND (category = "CFF - WDI" OR category = "CFF - WDI - INT" OR category = "CFF - PAO" OR category = "CFF - PAO - INT")  AND (type = "Service Request" OR type = "Information Request") AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND impacted_account = "Production" ';
$sql7dvc = 'SELECT  avg(datediff( resolution_date, created_date)  - IFNULL(datediff(end_bounced_time, start_bounced_time),0))  as numb from data WHERE urgency = "high" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND (category = "CFF - WDI" OR category = "CFF - WDI - INT" OR category = "CFF - PAO" OR category = "CFF - PAO - INT") AND (type = "Service Request" OR type = "Information Request") AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND impacted_account = "Production" ';


//SCOTRAIL EUROSTAR-SIDH
$sql5dvs = 'SELECT  avg(datediff( resolution_date, created_date)  - IFNULL(datediff(end_bounced_time, start_bounced_time),0))  as numb from data WHERE urgency = "low" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR - PAO - INT" OR category = "EUROSTAR-SIDH" OR category = "EUROSTAR-S3")  AND (type = "Service Request" OR type = "Information Request") AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND impacted_account = "Production" ';
$sql6dvs = 'SELECT  avg(datediff( resolution_date, created_date)  - IFNULL(datediff(end_bounced_time, start_bounced_time),0)) as numb from data WHERE urgency = "medium" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR - PAO - INT" OR category = "EUROSTAR-SIDH"  OR category = "EUROSTAR-S3")   AND (type = "Service Request" OR type = "Information Request") AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND impacted_account = "Production" ';
$sql7dvs = 'SELECT  avg(datediff( resolution_date, created_date)  - IFNULL(datediff(end_bounced_time, start_bounced_time),0))  as numb from data WHERE urgency = "high" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR - PAO - INT" OR category = "EUROSTAR-SIDH" OR category = "EUROSTAR-S3")   AND (type = "Service Request" OR type = "Information Request") AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND impacted_account = "Production" ';

//THALYS
$sql5dvth = 'SELECT  avg(datediff( resolution_date, created_date)  - IFNULL(datediff(end_bounced_time, start_bounced_time),0))  as numb from data WHERE urgency = "low" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND (category = "THALYS - YMS" OR category = "THALYS - YMS - INT" OR category = "THALYS-RR" OR category = "THALYS-PAO" OR category = "THALYS-PAO-INT")  AND (type = "Service Request" OR type = "Information Request") AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND impacted_account = "Production" ';
$sql6dvth = 'SELECT  avg(datediff( resolution_date, created_date)  - IFNULL(datediff(end_bounced_time, start_bounced_time),0))  as numb from data WHERE urgency = "medium" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND (category = "THALYS - YMS" OR category = "THALYS - YMS - INT" OR category = "THALYS-RR" OR category = "THALYS-PAO" OR category = "THALYS-PAO-INT")   AND (type = "Service Request" OR type = "Information Request") AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND impacted_account = "Production" ';
$sql7dvth = 'SELECT  avg(datediff( resolution_date, created_date)  - IFNULL(datediff(end_bounced_time, start_bounced_time),0))  as numb from data WHERE urgency = "high" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND (category = "THALYS - YMS" OR category = "THALYS - YMS - INT" OR category = "THALYS-RR" OR category = "THALYS-PAO" OR category = "THALYS-PAO-INT")  AND (type = "Service Request" OR type = "Information Request") AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND impacted_account = "Production" ';

//BENE
$sql5dvb = 'SELECT  avg(datediff( resolution_date, created_date)  - IFNULL(datediff(end_bounced_time, start_bounced_time),0))  as numb from data WHERE urgency = "low" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND (category = "BENERAIL - WDI" OR category = "BENERAIL - WDI - INT" OR category = "BENERAIL - PAO" OR category = "BENERAIL - PAO - INT")  AND (type = "Service Request" OR type = "Information Request") AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND impacted_account = "Production" ';
$sql6dvb = 'SELECT  avg(datediff( resolution_date, created_date)  - IFNULL(datediff(end_bounced_time, start_bounced_time),0))  as numb from data WHERE urgency = "medium" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND (category = "BENERAIL - WDI" OR category = "BENERAIL - WDI - INT" OR category = "BENERAIL - PAO" OR category = "BENERAIL - PAO - INT")   AND (type = "Service Request" OR type = "Information Request") AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND impacted_account = "Production" ';
$sql7dvb = 'SELECT  avg(datediff( resolution_date, created_date)  - IFNULL(datediff(end_bounced_time, start_bounced_time),0))  as numb from data WHERE urgency = "high" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND (category = "BENERAIL - WDI" OR category = "BENERAIL - WDI - INT" OR category = "BENERAIL - PAO" OR category = "BENERAIL - PAO - INT")  AND (type = "Service Request" OR type = "Information Request") AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND impacted_account = "Production" ';


//ELIPSOS
$sql5dve = 'SELECT  avg(datediff( resolution_date, created_date)  - IFNULL(datediff(end_bounced_time, start_bounced_time),0))  as numb from data WHERE urgency = "low" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" OR category = "ELIPSOS - RMF" OR category = "ELIPSOS - YMS - INT" OR category = "ELIPSOS - NSK - INT")  AND (type = "Service Request" OR type = "Information Request") AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND impacted_account = "Production"';
$sql6dve = 'SELECT  avg(datediff( resolution_date, created_date)  - IFNULL(datediff(end_bounced_time, start_bounced_time),0))  as numb from data WHERE urgency = "medium" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" OR category = "ELIPSOS - RMF" OR category = "ELIPSOS - YMS - INT" OR category = "ELIPSOS - NSK - INT")  AND (type = "Service Request" OR type = "Information Request") AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND impacted_account = "Production"';
$sql7dve = 'SELECT  avg(datediff( resolution_date, created_date)  - IFNULL(datediff(end_bounced_time, start_bounced_time),0))  as numb from data WHERE urgency = "high" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" OR category = "ELIPSOS - RMF" OR category = "ELIPSOS - YMS - INT" OR category = "ELIPSOS - NSK - INT")  AND (type = "Service Request" OR type = "Information Request") AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed") AND impacted_account = "Production"';

//RS
$sql5dvr = 'SELECT  avg(datediff( resolution_date, created_date)  - IFNULL(datediff(end_bounced_time, start_bounced_time),0))  as numb from data WHERE urgency = "low" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND "RS - ClarityPPM"  AND (type = "Service Request" OR type = "Information Request") AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND impacted_account = "Production"';
$sql6dvr = 'SELECT  avg(datediff( resolution_date, created_date)  - IFNULL(datediff(end_bounced_time, start_bounced_time),0))  as numb from data WHERE urgency = "medium" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND "RS - ClarityPPM"  AND (type = "Service Request" OR type = "Information Request") AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND impacted_account = "Production"';
$sql7dvr = 'SELECT  avg(datediff( resolution_date, created_date)  - IFNULL(datediff(end_bounced_time, start_bounced_time),0))  as numb from data WHERE urgency = "high" AND resolution_date >="'.$date1.'" AND resolution_date <="'.$date2.'" AND "RS - ClarityPPM"  AND (type = "Service Request" OR type = "Information Request") AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND impacted_account = "Production"' ;

$req5dvn = mysql_query($sql5dvn) or die('Erreur SQL !<br>'.$sql5dvn.'<br>'.mysql_error()); 
$req6dvn = mysql_query($sql6dvn) or die('Erreur SQL !<br>'.$sql6dvn.'<br>'.mysql_error()); 
$req7dvn = mysql_query($sql7dvn) or die('Erreur SQL !<br>'.$sql7dvn.'<br>'.mysql_error()); 

$req5dvc = mysql_query($sql5dvc) or die('Erreur SQL !<br>'.$sql5dvc.'<br>'.mysql_error()); 
$req6dvc = mysql_query($sql6dvc) or die('Erreur SQL !<br>'.$sql6dvc.'<br>'.mysql_error()); 
$req7dvc = mysql_query($sql7dvc) or die('Erreur SQL !<br>'.$sql7dvc.'<br>'.mysql_error()); 

$req5dvs = mysql_query($sql5dvs) or die('Erreur SQL !<br>'.$sql5dvs.'<br>'.mysql_error()); 
$req6dvs = mysql_query($sql6dvs) or die('Erreur SQL !<br>'.$sql6dvs.'<br>'.mysql_error()); 
$req7dvs = mysql_query($sql7dvs) or die('Erreur SQL !<br>'.$sql7dvs.'<br>'.mysql_error()); 

$req5dvth = mysql_query($sql5dvth) or die('Erreur SQL !<br>'.$sql5dvth.'<br>'.mysql_error()); 
$req6dvth = mysql_query($sql6dvth) or die('Erreur SQL !<br>'.$sql6dvth.'<br>'.mysql_error()); 
$req7dvth = mysql_query($sql7dvth) or die('Erreur SQL !<br>'.$sql7dvth.'<br>'.mysql_error()); 

$req5dve = mysql_query($sql5dve) or die('Erreur SQL !<br>'.$sql5dve.'<br>'.mysql_error()); 
$req6dve = mysql_query($sql6dve) or die('Erreur SQL !<br>'.$sql6dve.'<br>'.mysql_error()); 
$req7dve = mysql_query($sql7dve) or die('Erreur SQL !<br>'.$sql7dve.'<br>'.mysql_error()); 

$req5dvr = mysql_query($sql5dvr) or die('Erreur SQL !<br>'.$sql5dvr.'<br>'.mysql_error()); 
$req6dvr = mysql_query($sql6dvr) or die('Erreur SQL !<br>'.$sql6dvr.'<br>'.mysql_error()); 
$req7dvr = mysql_query($sql7dvr) or die('Erreur SQL !<br>'.$sql7dvr.'<br>'.mysql_error()); 

$req5dvb = mysql_query($sql5dvb) or die('Erreur SQL !<br>'.$sql5dvb.'<br>'.mysql_error()); 
$req6dvb = mysql_query($sql6dvb) or die('Erreur SQL !<br>'.$sql6dvb.'<br>'.mysql_error()); 
$req7dvb = mysql_query($sql7dvb) or die('Erreur SQL !<br>'.$sql7dvb.'<br>'.mysql_error()); 

while ( ($data5dvn = mysql_fetch_assoc($req5dvn))!== false) {
$id5dvn = $data5dvn["numb"];
}
while ( ($data6dvn = mysql_fetch_assoc($req6dvn))!== false) {
$id6dvn = $data6dvn["numb"];
}
while ( ($data7dvn = mysql_fetch_assoc($req7dvn))!== false) {
$id7dvn = $data7dvn["numb"];
}


while ( ($data5dvc = mysql_fetch_assoc($req5dvc))!== false) {
$id5dvc = $data5dvc["numb"];
}
while ( ($data6dvc = mysql_fetch_assoc($req6dvc))!== false) {
$id6dvc = $data6dvc["numb"];
}
while ( ($data7dvc = mysql_fetch_assoc($req7dvc))!== false) {
$id7dvc = $data7dvc["numb"];
}
while ( ($data5dvs = mysql_fetch_assoc($req5dvs))!== false) {
$id5dvs = $data5dvs["numb"];
}
while ( ($data6dvs = mysql_fetch_assoc($req6dvs))!== false) {
$id6dvs = $data6dvs["numb"];
}
while ( ($data7dvs = mysql_fetch_assoc($req7dvs))!== false) {
$id7dvs = $data7dvs["numb"];
}

while ( ($data5dvth = mysql_fetch_assoc($req5dvth))!== false) {
$id5dvth = $data5dvth["numb"];
}
while ( ($data6dvth = mysql_fetch_assoc($req6dvth))!== false) {
$id6dvth = $data6dvth["numb"];
}
while ( ($data7dvth = mysql_fetch_assoc($req7dvth))!== false) {
$id7dvth = $data7dvth["numb"];
}


while ( ($data5dve = mysql_fetch_assoc($req5dve))!== false) {
$id5dve = $data5dve["numb"];
}
while ( ($data6dve = mysql_fetch_assoc($req6dve))!== false) {
$id6dve = $data6dve["numb"];
}
while ( ($data7dve = mysql_fetch_assoc($req7dve))!== false) {
$id7dve = $data7dve["numb"];
}

while ( ($data5dvr = mysql_fetch_assoc($req5dvr))!== false) {
$id5dvr = $data5dvr["numb"];
}
while ( ($data6dvr = mysql_fetch_assoc($req6dvr))!== false) {
$id6dvr = $data6dvr["numb"];
}
while ( ($data7dvr = mysql_fetch_assoc($req7dvr))!== false) {
$id7dvr = $data7dvr["numb"];
}

while ( ($data5dvb = mysql_fetch_assoc($req5dvb))!== false) {
$id5dvb = $data5dvb["numb"];
}
while ( ($data6dvb = mysql_fetch_assoc($req6dvb))!== false) {
$id6dvb = $data6dvb["numb"];
}
while ( ($data7dvb = mysql_fetch_assoc($req7dvb))!== false) {
$id7dvb = $data7dvb["numb"];
}


//fonction qui calcule la moyenne des nombres non nuls d'un tableau
function moyenne($liste_nombres) {
    $nb = 0; $somme = 0;
    if (is_array($liste_nombres)) foreach($liste_nombres as $nombre){
          $nb += empty($nombre)||!is_numeric($nombre) ? 0 : 1;
          $somme += floatval ($nombre);
    }
    return $nb!=0 ? ($somme/$nb) : 0;
}

//utilisation de la fonction pour calculer la moyenne
$id5dvt = number_format(moyenne( array($id5dvn , $id5dvc , $id5dve , $id5dvr, $id5dvs, $id5dvth, $id5dvb )),2 );
$id6dvt = number_format(moyenne( array($id6dvn , $id6dvc , $id6dve , $id6dvr, $id6dvs, $id6dvth, $id6dvb)),2 );
$id7dvt = number_format(moyenne( array($id7dvn , $id7dvc , $id7dve , $id7dvr, $id7dvs, $id7dvth, $id7dvb)),2 );


?>
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
		<h1>Dashboard  de <?php echo $valeur;?> </h1>
		
		
		
		<h2>CHARGES REQUETES&nbsp;&nbsp;<img src="img/picto1.jpg" align=bottom border=0></h2><br>
		
		<center>
			<table class='sample' id='example1' width=500px>
				<tr>
					<td class=sample3 colspan=5><center><b>Nbre de requetes ouvertes dans le mois</td>
				</tr>
				<tr>
					<td class='sample3'><center><b>Criticite/ Clients</td>
					<td class='sample3'><center><b>Low</td>
					<td class='sample3'><center><b>Medium</td>
					<td class='sample3'><center><b>High</td>
					<td class='sample3'><center><b>TOTAL</td>
				</tr>
				<tr>
					<td class='sample3'><center><b>CFF</td>
					<td class='sample2'><center><b><?php echo $id1;?></td>
					<td class='sample2'><center><b><?php echo $id2;?></td>
					<td class='sample2'><center><b><?php echo $id3;?></td>
					<td class='sample2'><center><b><?php echo $id4;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>ELIPSOS</td>
					<td class='sample2'><center><b><?php echo $id5e;?></td>
					<td class='sample2'><center><b><?php echo $id6e;?></td>
					<td class='sample2'><center><b><?php echo $id7e;?></td>
					<td class='sample2'><center><b><?php echo $id8e;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>THALYS</td>
					<td class='sample2'><center><b><?php echo $id21;?></td>
					<td class='sample2'><center><b><?php echo $id22;?></td>
					<td class='sample2'><center><b><?php echo $id23;?></td>
					<td class='sample2'><center><b><?php echo $id24;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>BENE</td>
					<td class='sample2'><center><b><?php echo $id31;?></td>
					<td class='sample2'><center><b><?php echo $id32;?></td>
					<td class='sample2'><center><b><?php echo $id33;?></td>
					<td class='sample2'><center><b><?php echo $id34;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>RS</td>
					<td class='sample2'><center><b><?php echo $id9;?></td>
					<td class='sample2'><center><b><?php echo $id10;?></td>
					<td class='sample2'><center><b><?php echo $id11;?></td>
					<td class='sample2'><center><b><?php echo $id12;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>DB</td>
					<td class='sample2'><center><b><?php echo $id5;?></td>
					<td class='sample2'><center><b><?php echo $id6;?></td>
					<td class='sample2'><center><b><?php echo $id7;?></td>
					<td class='sample2'><center><b><?php echo $id8;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>EUROSTAR</td>
					<td class='sample2'><center><b><?php echo $id17;?></td>
					<td class='sample2'><center><b><?php echo $id18;?></td>
					<td class='sample2'><center><b><?php echo $id19;?></td>
					<td class='sample2'><center><b><?php echo $id20;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>TOTAL</td>
					<td class='sample3'><center><b><?php echo $id13;?></td>
					<td class='sample3'><center><b><?php echo $id14;?></td>
					<td class='sample3'><center><b><?php echo $id15;?></td>
					<td class='sample3'><center><b><?php echo $id16;?></td>
				</tr>
			</table>
		<br><br>
		<a href="rs17db.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0>D&eacutetail des requetes cr&eacutees</a></br></br>
		<img src="rs17dba.php?cff=<?php echo $id4;?>&ntv=<?php echo $id8;?>&elipsos=<?php echo $id8e;?>&rs=<?php echo $id12;?>&eurostar=<?php echo $id20;?>&thalys=<?php echo $id24;?>&bene=<?php echo $id34;?>&db=<?php echo $id8;?>" border=0 alt="rs17dba.php" align="center"><img src="rs17dbb.php?low=<?php echo $id13;?>&medium=<?php echo $id14;?>&high=<?php echo $id15;?>" border=0 alt="rs17dbb.php" align="center"><br><br>
		
					<table class='sample' id='example1' width=500px>
				<tr>
					<td class=sample3 colspan=5><center><b>Nbre de requetes ferm&eacutees dans le mois</td>
				</tr>
				<tr>
					<td class='sample3'><center><b>Criticite/ Clients</td>
					<td class='sample3'><center><b>Low</td>
					<td class='sample3'><center><b>Medium</td>
					<td class='sample3'><center><b>High</td>
					<td class='sample3'><center><b>TOTAL</td>
				</tr>
				<tr>
					<td class='sample3'><center><b>CFF</td>
					<td class='sample2'><center><b><?php echo $id1f;?></td>
					<td class='sample2'><center><b><?php echo $id2f;?></td>
					<td class='sample2'><center><b><?php echo $id3f;?></td>
					<td class='sample2'><center><b><?php echo $id4f;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>ELIPSOS</td>
					<td class='sample2'><center><b><?php echo $id5fe;?></td>
					<td class='sample2'><center><b><?php echo $id6fe;?></td>
					<td class='sample2'><center><b><?php echo $id7fe;?></td>
					<td class='sample2'><center><b><?php echo $id8fe;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>THALYS</td>
					<td class='sample2'><center><b><?php echo $id21f;?></td>
					<td class='sample2'><center><b><?php echo $id22f;?></td>
					<td class='sample2'><center><b><?php echo $id23f;?></td>
					<td class='sample2'><center><b><?php echo $id24f;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>BENE</td>
					<td class='sample2'><center><b><?php echo $id31f;?></td>
					<td class='sample2'><center><b><?php echo $id32f;?></td>
					<td class='sample2'><center><b><?php echo $id33f;?></td>
					<td class='sample2'><center><b><?php echo $id34f;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>RS</td>
					<td class='sample2'><center><b><?php echo $id9f;?></td>
					<td class='sample2'><center><b><?php echo $id10f;?></td>
					<td class='sample2'><center><b><?php echo $id11f;?></td>
					<td class='sample2'><center><b><?php echo $id12f;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>DB</td>
					<td class='sample2'><center><b><?php echo $id5f;?></td>
					<td class='sample2'><center><b><?php echo $id6f;?></td>
					<td class='sample2'><center><b><?php echo $id7f;?></td>
					<td class='sample2'><center><b><?php echo $id8f;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>EUROSTAR</td>
					<td class='sample2'><center><b><?php echo $id17f;?></td>
					<td class='sample2'><center><b><?php echo $id18f;?></td>
					<td class='sample2'><center><b><?php echo $id19f;?></td>
					<td class='sample2'><center><b><?php echo $id20f;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>TOTAL</td>
					<td class='sample3'><center><b><?php echo $id13f;?></td>
					<td class='sample3'><center><b><?php echo $id14f;?></td>
					<td class='sample3'><center><b><?php echo $id15f;?></td>
					<td class='sample3'><center><b><?php echo $id16f;?></td>
				</tr>
			</table><br>
			<a href="rs17dd.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0>Detail des requetes ferm&eacutees</a></br></br>
			
								<table class='sample' id='example1' width=500px>
				<tr>
					<td class=sample3 colspan=5><center><b>Nbre de requetes encore ouvertes au dernier jour du mois</td>
				</tr>
				<tr>
					<td class='sample3'><center><b>Criticite/ Clients</td>
					<td class='sample3'><center><b>Low</td>
					<td class='sample3'><center><b>Medium</td>
					<td class='sample3'><center><b>High</td>
					<td class='sample3'><center><b>TOTAL</td>
				</tr>
				<tr>
					<td class='sample3'><center><b>CFF</td>
					<td class='sample2'><center><b><?php echo $id1o;?></td>
					<td class='sample2'><center><b><?php echo $id2o;?></td>
					<td class='sample2'><center><b><?php echo $id3o;?></td>
					<td class='sample2'><center><b><?php echo $id4o;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>ELIPSOS</td>
					<td class='sample2'><center><b><?php echo $id5oe;?></td>
					<td class='sample2'><center><b><?php echo $id6oe;?></td>
					<td class='sample2'><center><b><?php echo $id7oe;?></td>
					<td class='sample2'><center><b><?php echo $id8oe;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>THALYS</td>
					<td class='sample2'><center><b><?php echo $id21o;?></td>
					<td class='sample2'><center><b><?php echo $id22o;?></td>
					<td class='sample2'><center><b><?php echo $id23o;?></td>
					<td class='sample2'><center><b><?php echo $id24o;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>BENE</td>
					<td class='sample2'><center><b><?php echo $id31o;?></td>
					<td class='sample2'><center><b><?php echo $id32o;?></td>
					<td class='sample2'><center><b><?php echo $id33o;?></td>
					<td class='sample2'><center><b><?php echo $id34o;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>RS</td>
					<td class='sample2'><center><b><?php echo $id9o;?></td>
					<td class='sample2'><center><b><?php echo $id10o;?></td>
					<td class='sample2'><center><b><?php echo $id11o;?></td>
					<td class='sample2'><center><b><?php echo $id12o;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>DB</td>
					<td class='sample2'><center><b><?php echo $id5o;?></td>
					<td class='sample2'><center><b><?php echo $id6o;?></td>
					<td class='sample2'><center><b><?php echo $id7o;?></td>
					<td class='sample2'><center><b><?php echo $id8o;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>EUROSTAR</td>
					<td class='sample2'><center><b><?php echo $id17o;?></td>
					<td class='sample2'><center><b><?php echo $id18o;?></td>
					<td class='sample2'><center><b><?php echo $id19o;?></td>
					<td class='sample2'><center><b><?php echo $id20o;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>TOTAL</td>
					<td class='sample3'><center><b><?php echo $id13o;?></td>
					<td class='sample3'><center><b><?php echo $id14o;?></td>
					<td class='sample3'><center><b><?php echo $id15o;?></td>
					<td class='sample3'><center><b><?php echo $id16o;?></td>
				</tr>
			</table><br>
			<a href="rs17eb.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0>D&eacutetail des requetes encore ouvertes</a></br></br>
			<img src="rs17dbo1.php?cff=<?php echo $id4o;?>&elipsos=<?php echo $id8oe;?>&rs=<?php echo $id12o;?>&eurostar=<?php echo $id20o;?>&thalys=<?php echo $id24o;?>&bene=<?php echo $id34o;?>&db=<?php echo $id8o;?>" border=0 alt="rs17dbo1.php" align="center"><img src="rs17dbo2.php?low=<?php echo $id13o;?>&medium=<?php echo $id14o;?>&high=<?php echo $id15o;?>" border=0 alt="rs17dbo2.php" align="center"><br><br>
<table class='sample' id='example1' width=500px>
				<tr>
					<td class=sample3 colspan=5><center><b>Charge globale des tickets dans le mois</td>
				</tr>
				<tr>
					<td class='sample3'><center><b>Clients</td>
					<td class='sample3'><center><b>Ouverts</td>
					<td class='sample3'><center><b>Fermees</td>
					<td class='sample3'><center><b>Resolus interne</td>
					<td class='sample3'><center><b>TOTAL %</td>
				</tr>
				<tr>
					<td class='sample3'><center><b>CFF</td>
					<td class='sample2'><center><b><?php echo $id1g;?></td>
					<td class='sample2'><center><b><?php echo $id2fg;?></td>
					<td class='sample2'><center><b><?php echo $id3i;?></td>
					<td class='sample2'><center><b><?php echo $id4p;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>ELIPSOS</td>
					<td class='sample2'><center><b><?php echo $id13g;?></td>
					<td class='sample2'><center><b><?php echo $id14fg;?></td>
					<td class='sample2'><center><b><?php echo $id15i;?></td>
					<td class='sample2'><center><b><?php echo $id16p;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>THALYS</td>
					<td class='sample2'><center><b><?php echo $id21g;?></td>
					<td class='sample2'><center><b><?php echo $id22fg;?></td>
					<td class='sample2'><center><b><?php echo $id23i;?></td>
					<td class='sample2'><center><b><?php echo $id24p;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>BENE</td>
					<td class='sample2'><center><b><?php echo $id25g;?></td>
					<td class='sample2'><center><b><?php echo $id26fg;?></td>
					<td class='sample2'><center><b><?php echo $id27i;?></td>
					<td class='sample2'><center><b><?php echo $id28p;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>RS</td>
					<td class='sample2'><center><b><?php echo $id9g;?></td>
					<td class='sample2'><center><b><?php echo $id10fg;?></td>
					<td class='sample2'><center><b><?php echo $id11i;?></td>
					<td class='sample2'><center><b><?php echo $id12p;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>DB</td>
					<td class='sample2'><center><b><?php echo $id5g;?></td>
					<td class='sample2'><center><b><?php echo $id6fg;?></td>
					<td class='sample2'><center><b><?php echo $id7i;?></td>
					<td class='sample2'><center><b><?php echo $id8p;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>EUROSTAR</td>
					<td class='sample2'><center><b><?php echo $id17g;?></td>
					<td class='sample2'><center><b><?php echo $id18fg;?></td>
					<td class='sample2'><center><b><?php echo $id19i;?></td>
					<td class='sample2'><center><b><?php echo $id20p;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>TOTAL</td>
					<td class='sample3'><center><b><?php echo $id17t;?></td>
					<td class='sample3'><center><b><?php echo $id18t;?></td>
					<td class='sample3'><center><b><?php echo $id19t;?></td>
					<td class='sample3'><center><b><?php echo $id20t;?></td>
				</tr>
			</table><br>
			
			
											<table class='sample' id='example1' width=500px>
				<tr>
					<td class=sample3 colspan=5><center><b>Dur&eacutee de vie des requetes</td>
				</tr>
				<tr>
					<td class='sample3'><center><b>Criticite/ Clients</td>
					<td class='sample3'><center><b>Low</td>
					<td class='sample3'><center><b>Medium</td>
					<td class='sample3'><center><b>High</td>
					
				</tr>
				<tr>
					<td class='sample3'><center><b>CFF</td>
					<td class='sample2'><center><b><?php echo $id5dvc;?></td>
					<td class='sample2'><center><b><?php echo $id6dvc;?></td>
					<td class='sample2'><center><b><?php echo $id7dvc;?></td>
					
				</tr>
				<tr>
					<td class='sample3'><center><b>ELIPSOS</td>
					<td class='sample2'><center><b><?php echo $id5dve;?></td>
					<td class='sample2'><center><b><?php echo $id6dve;?></td>
					<td class='sample2'><center><b><?php echo $id7dve;?></td>
					
				</tr>
				<tr>
					<td class='sample3'><center><b>THALYS</td>
					<td class='sample2'><center><b><?php echo $id5dvth;?></td>
					<td class='sample2'><center><b><?php echo $id6dvth;?></td>
					<td class='sample2'><center><b><?php echo $id7dvth;?></td>
					
				</tr>
				<tr>
					<td class='sample3'><center><b>BENE</td>
					<td class='sample2'><center><b><?php echo $id5dvb;?></td>
					<td class='sample2'><center><b><?php echo $id6dvb;?></td>
					<td class='sample2'><center><b><?php echo $id7dvb;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>RS</td>
					<td class='sample2'><center><b><?php echo $id5dvr;?></td>
					<td class='sample2'><center><b><?php echo $id6dvr;?></td>
					<td class='sample2'><center><b><?php echo $id7dvr;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>DB</td>
					<td class='sample2'><center><b><?php echo $id5dvn;?></td>
					<td class='sample2'><center><b><?php echo $id6dvn;?></td>
					<td class='sample2'><center><b><?php echo $id7dvn;?></td>
				</tr>
				<tr>
					<td class='sample3'><center><b>EUROSTAR</td>
					<td class='sample2'><center><b><?php echo $id5dvs;?></td>
					<td class='sample2'><center><b><?php echo $id6dvs;?></td>
					<td class='sample2'><center><b><?php echo $id7dvs;?></td>
					
				</tr>
				<tr>
					<td class='sample3'><center><b>TOTAL</td>
					<td class='sample3'><center><b><?php echo $id5dvt;?></td>
					<td class='sample3'><center><b><?php echo $id6dvt;?></td>
					<td class='sample3'><center><b><?php echo $id7dvt;?></td>
					
				</tr>
			</table><br><br>
			<img src="rsduree.php?low=<?php echo $id5dvt;?>&medium=<?php echo $id6dvt;?>&high=<?php echo $id7dvt;?>" border=0 alt="rsduree.php" align="center"><br>
			<a href="rs12ball.php?mois=<?php echo $mois;?>&annee=<?php echo $annee;?>&site=<?php echo $resp;?>&valeur=<?php echo $valeur;?>&nbre=<?php echo $nbre;?>" border=0>D&eacutetail des dur&eacutee de vie des requetes</a></br></br>
			
			
			<a href="#" onclick="window.history.back();return false;">Retour au choix des valeurs</a></br></br>
		</center>
		<br><br>
		<div id="content"></div>
			</div>
				<div id="footer">Rail Solutions &copy; 2012</div>
	  </body>
</html>
