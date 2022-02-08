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

//	echo $resp2;
//Environnement de TEST
$sql1 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE  '.$resp2.' type = "Incident" AND category = "'.$valeur.'" AND impacted_account = "Test" AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.'"';
$sql2 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE  '.$resp2.' type = "Incident" AND category = "'.$valeur.'" AND impacted_account = "Test" AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.'"';
$sql3 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE  '.$resp2.' type = "Incident" AND category = "'.$valeur.'" AND impacted_account = "Test" AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed") AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.'"';
$sql10 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE  '.$resp2.' type = "Incident" AND category = "'.$valeur.'" AND impacted_account = "Test" AND urgency = "critical" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed") AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.'"';

$sql4 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE  '.$resp2.' type = "Incident" AND category = "'.$valeur.'" AND impacted_account = "Training" AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed") AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.'"';
$sql5 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE '.$resp2.'  type = "Incident" AND category = "'.$valeur.'" AND impacted_account = "Training" AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed") AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.'"';
$sql6 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE  '.$resp2.' type = "Incident" AND category = "'.$valeur.'" AND impacted_account = "Training" AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed") AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.'"';
$sql11 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE  '.$resp2.' type = "Incident" AND category = "'.$valeur.'" AND impacted_account = "Training" AND urgency = "critical" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed") AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.'"';

$sql7 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE '.$resp2.'  type = "Incident" AND category = "'.$valeur.'" AND impacted_account = "Production" AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed") AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.'"';
$sql8 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE  '.$resp2.' type = "Incident" AND category = "'.$valeur.'" AND impacted_account = "Production" AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed") AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.'"';
$sql9 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE  '.$resp2.' type = "Incident" AND category = "'.$valeur.'" AND impacted_account = "Production" AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed") AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.'"';
$sql12 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE '.$resp2.' type = "Incident" AND category = "'.$valeur.'" AND impacted_account = "Production" AND urgency = "critical" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed") AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.'"';

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
$req8 = mysql_query($sql8) or die('Erreur SQL !<br>'.$sql8.'<br>'.mysql_error()); 
$data8=mysql_fetch_array($req8) ;
$req9 = mysql_query($sql9) or die('Erreur SQL !<br>'.$sql9.'<br>'.mysql_error()); 
$data9=mysql_fetch_array($req9) ;
$req10 = mysql_query($sql10) or die('Erreur SQL !<br>'.$sql10.'<br>'.mysql_error()); 
$data10=mysql_fetch_array($req10) ;
$req11 = mysql_query($sql11) or die('Erreur SQL !<br>'.$sql11.'<br>'.mysql_error()); 
$data11=mysql_fetch_array($req11) ;
$req12 = mysql_query($sql12) or die('Erreur SQL !<br>'.$sql12.'<br>'.mysql_error()); 
$data12=mysql_fetch_array($req12) ;






//echo $data1["numb"];
//echo $data2["numb"];
//echo $data3["numb"];
// on ferme la connexion à mysql 
mysql_close(); 	


require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_bar.php'); 


// Create the basic graph
$graph = new Graph(700,350,'auto');    
$graph->SetScale("textlin");
$graph->img->SetMargin(80,50,0,120); 


// Adjust the position of the legend box
$graph->legend->Pos(.02,0.88);

// Adjust the color for theshadow of the legend
$graph->legend->SetShadow('darkgray@0.5');
$graph->legend->SetFillColor('lightblue@0.3');



// Set axis titles and fonts
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetColor('black');

$graph->xaxis->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->SetColor('black');

$graph->yaxis->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->SetColor('black');

//$graph->ygrid->Show(false);
$graph->ygrid->SetColor('white@0.5');

// Setup graph title
$graph->title->Set($valeur.' RESOLVED INCS BETWEEN '.$date1.' AND '.$date2);

// Some extra margin (from the top)
$graph->title->SetMargin(3);
$graph->title->SetFont(FF_ARIAL,FS_NORMAL,12);

$d1 = $data1["numb"];
$d2 = $data2["numb"];
$d3 = $data3["numb"];
$d4 = $data4["numb"];
$d5 = $data5["numb"];
$d6 = $data6["numb"];
$d7 = $data7["numb"];
$d8 = $data8["numb"];
$d9 = $data9["numb"];
$d10 = $data10["numb"];
$d11 = $data11["numb"];
$d12 = $data12["numb"];


$data1y=array($d1,$d4,$d7);
$data2y=array($d2,$d5,$d8);
$data3y=array($d3,$d6,$d9);
$data4y=array($d10,$d11,$d12);


$b1plot = new BarPlot($data1y);
$b2plot = new BarPlot($data2y);
$b3plot = new BarPlot($data3y);
$b4plot = new BarPlot($data4y);


// Setup legends
$b1plot->SetLegend('Low');
$b2plot->SetLegend('Medium');
$b3plot->SetLegend('High');
$b4plot->SetLegend('Critical');


$datay30=array($d1.'   '.$d2.'   '.$d3.'   '.$d10,  $d4.'  '.$d5.'  '.$d6.'  '.$d11, $d7.'  '.$d8.'  '.$d9.'  '.$d12);
// Get localised version of the month names
$graph->xaxis->SetTickLabels($datay30);
$da = $d1 + $d2 + $d3 + $d10;
$db = $d4 + $d5 + $d6 + $d11;
$dc = $d7 + $d8 + $d9+ $d12;
$graph->xaxis->title->Set("TEST (".$da.")                   TRAIN (".$db.")                   PROD (".$dc.")         ");
// Create the grouped bar plot
$gbarplot = new GroupBarPlot(array($b1plot,$b2plot,$b3plot, $b4plot));
$gbarplot->SetWidth(0.5);
$graph->Add($gbarplot); 
$graph->legend->SetColumns(6);

$b1plot->SetFillColor("green");
$b2plot->SetFillColor("orange");
$b3plot->SetFillColor("red");
$b4plot->SetFillColor("blue");
$b1plot->SetColor("#323434");
$b2plot->SetColor("#323434");
$b3plot->SetColor("#323434");
$b4plot->SetColor("#323434");



$graph->Stroke(); 


?>