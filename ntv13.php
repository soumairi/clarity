<?php
include('connect.php'); 

//echo $_POST['valeur'];
//echo '<br><br>';
//echo $_POST['date'];
//echo '<br><br>';
$date1 = $_GET['date1'];
$date2 = $_GET['date2'];
$valeur = $_GET['valeur'];


//Environnement de PROD
$sql1 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE   type = "Incident"  AND (AppVersion = "Notification-EAI" OR AppVersion= "EAI notification") AND category = "'.$valeur.'" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.'"';
$sql2 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE   type = "Incident"  AND AppVersion= "Standard notification" AND category = "'.$valeur.'" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.'"';
$sql3 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE   type = "Incident"  AND AppVersion= "SKy Channel API 3.3.2.8" AND category = "'.$valeur.'" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.'"';
$sql4 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE   type = "Incident"  AND AppVersion= "Sky Pay 4.3" AND category = "'.$valeur.'" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.'"';
$sql5 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE   type = "Incident"  AND AppVersion= "Sky Sales 3.3.2.8" AND category = "'.$valeur.'" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.'"';
$sql6 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE   type = "Incident"  AND AppVersion= "Sky Speed 3.3.2.8" AND category = "'.$valeur.'" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.'"';
$sql7 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE   type = "Incident"  AND AppVersion= "SkyPort 4.0.0.2" AND category = "'.$valeur.'" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.'"';
$sql8 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE   type = "Incident"  AND (AppVersion= "EPIC Services" OR AppVersion= "Data Bases (ODS, OLTP)" OR AppVersion="Au Utilities (sky Schedule and Sky Fare) 3.3.2.8" OR AppVersion="Au Update daemon" OR AppVersion="ARO daemon" )AND category = "'.$valeur.'" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.'"';

// on envoie la requête env TEST
$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
$data1=mysql_fetch_array($req1) ;
$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
$data2=mysql_fetch_array($req2) ;
$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
$data3=mysql_fetch_array($req3) ;
$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
$data4=mysql_fetch_array($req4) ;
$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql5.'<br>'.mysql_error()); 
$data5=mysql_fetch_array($req5) ;
$req6 = mysql_query($sql6) or die('Erreur SQL !<br>'.$sql6.'<br>'.mysql_error()); 
$data6=mysql_fetch_array($req6) ;
$req7 = mysql_query($sql7) or die('Erreur SQL !<br>'.$sql7.'<br>'.mysql_error()); 
$data7=mysql_fetch_array($req7) ;
$req8 = mysql_query($sql8) or die('Erreur SQL !<br>'.$sql7.'<br>'.mysql_error()); 
$data8=mysql_fetch_array($req8) ;



//echo $data1["numb"];
//echo $data2["numb"];
//echo $data3["numb"];
// on ferme la connexion à mysql 

$d1 = $data1["numb"];
$d2 = $data2["numb"];
$d3 = $data3["numb"];
$d4 = $data4["numb"];
$d5 = $data5["numb"];
$d6 = $data6["numb"];
$d7 = $data7["numb"];
$d8 = $data8["numb"];


$a1 = "EAI NOTIFICATION";
$a2 = "STANDARD NOTIFICATION";
$a3 = "SKY CHANNEL API";
$a4 = "SKY PAY";
$a5 = "SKY SALES";
$a6 = "SKY SPEED";
$a7 = "SKY PORT";
$a8 = "OTHERS";

mysql_close(); 	


require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_pie.php');
require_once ('jpgraph/src/jpgraph_pie3d.php'); 


// Create the basic graph
$graph = new Graph(700,350,'auto');    
$graph->SetScale("textlin");
$graph->img->SetMargin(80,50,0,120); 


// Adjust the position of the legend box
$graph->legend->Pos(.02,0.88);

// Adjust the color for theshadow of the legend
$graph->legend->SetShadow('darkgray@0.5');
$graph->legend->SetFillColor('lightblue@0.3');

$data = array($d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8); 

// Setup graph title


// Some extra margin (from the top)



$graph = new PieGraph(700,400);
$graph->SetShadow();

$legend = array($a1. " : ".$d1,$a2. " : ".$d2,$a3. " : ".$d3,$a4. " : ".$d4,$a5. " : ".$d5,$a6. " : ".$d6,$a7. " : ".$d7,$a8. " : ".$d8);


$graph->title->SetMargin(5);
$graph->title->SetFont(FF_ARIAL,FS_NORMAL,13);
$graph->title->Set($valeur.'  APP REPARTITION IN RESOLVED INC BETWEEN '.$date1.' AND '.$date2);
$p1 = new PiePlot($data);
//$p1->ExplodeSlice(1);
 
$p1->SetCenter(0.45);
$p1->SetLegends($legend);

$graph->Add($p1);
$p1->SetSliceColors(array('red','orange','yellow','green','purple','blue','brown','black')); 
$graph->Stroke();

?>
