<?php
include('connect.php'); 

//echo $_POST['valeur'];
//echo '<br><br>';
//echo $_POST['date'];
//echo '<br><br>';
$date1 = $_GET['date1'];



//Environnement de TEST
$sql1 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Test" AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND created_date >= "'.$date1.'"';
$sql2 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Test" AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND created_date >= "'.$date1.'"';
$sql3 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Test" AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed") AND created_date >= "'.$date1.'"';

$sql4 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Training" AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed") AND created_date >= "'.$date1.'"';
$sql5 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Training" AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed") AND created_date >= "'.$date1.'"';
$sql6 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Training" AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed") AND created_date >= "'.$date1.'"';

$sql7 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Production" AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed") AND created_date >= "'.$date1.'"';
$sql8 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Production" AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed") AND created_date >= "'.$date1.'"';
$sql9 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Production" AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed") AND created_date >= "'.$date1.'"';


// on envoie la requ�te env TEST
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






//echo $data1["numb"];
//echo $data2["numb"];
//echo $data3["numb"];
// on ferme la connexion � mysql 
mysql_close(); 	


require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_bar.php'); 


// Create the basic graph
$graph = new Graph(700,300,'auto');    
$graph->SetScale("textlin");
$graph->img->SetMargin(60,40,0,70); 


// Adjust the position of the legend box
$graph->legend->Pos(.02,0.90);

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
$graph->title->Set('R�partition des INCS r�solus RS_OS depuis le '.$date1);

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


$data1y=array($d1,$d4,$d7);
$data2y=array($d2,$d5,$d8);
$data3y=array($d3,$d6,$d9);


$b1plot = new BarPlot($data1y);
$b2plot = new BarPlot($data2y);
$b3plot = new BarPlot($data3y);


// Setup legends
$b1plot->SetLegend('Low');
$b2plot->SetLegend('Medium');
$b3plot->SetLegend('High');


$datay30=array($d1.'   '.$d2.'   '.$d3, $d4.'   '.$d5.'   '.$d6, $d7.'   '.$d8.'   '.$d9);
// Get localised version of the month names
$graph->xaxis->SetTickLabels($datay30);
$da = $d1 + $d2 + $d3 ;
$db = $d4 + $d5 + $d6 ;
$dc = $d7 + $d8 + $d9 ;
$graph->xaxis->title->Set("TEST (".$da.")                   TRAIN (".$db.")                   PROD (".$dc.")         ");
// Create the grouped bar plot
$gbarplot = new GroupBarPlot(array($b1plot,$b2plot,$b3plot));
$gbarplot->SetWidth(0.5);
$graph->Add($gbarplot); 


$b1plot->SetFillColor("green");
$b2plot->SetFillColor("orange");
$b3plot->SetFillColor("red");
$b1plot->SetColor("#323434");
$b2plot->SetColor("#323434");
$b3plot->SetColor("#323434");

$graph->Stroke(); 


?>