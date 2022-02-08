<?php
include('connect.php'); 

//echo $_POST['valeur'];
//echo '<br><br>';
//echo $_POST['date'];
//echo '<br><br>';
$date1 = $_GET['date1'];



//Environnement de TEST
$sql1 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Test" AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2)  <=15) AND created_date >= "'.$date1.'"';
$sql2 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Test" AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2)  >=15) AND created_date >= "'.$date1.'"';
$sql3 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Test" AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2)  <=10) AND created_date >= "'.$date1.'"';
$sql4 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Test" AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2)  >=10) AND created_date >= "'.$date1.'"';
$sql5 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Test" AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2)  <=5) AND created_date >= "'.$date1.'"';
$sql6 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Test" AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2)  >=5) AND created_date >= "'.$date1.'"';

//Environnement TRAIN
$sql7 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Training" AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2)  <=15) AND created_date >= "'.$date1.'"';
$sql8 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Training" AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2)  >=15) AND created_date >= "'.$date1.'"';
$sql9 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Training" AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2) <=10) AND created_date >= "'.$date1.'"';
$sql10 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Training" AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2) >=10) AND created_date >= "'.$date1.'"';
$sql11 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Training" AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2) <=5) AND created_date >= "'.$date1.'"';
$sql12 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Training" AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2) >=5) AND created_date >= "'.$date1.'"';

//Environnement PROD
$sql13 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Production" AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2) <=15) AND created_date >= "'.$date1.'"';
$sql14 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Production" AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2) >=15) AND created_date >= "'.$date1.'"';
$sql15 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Production" AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2) <=10) AND created_date >= "'.$date1.'"';
$sql16 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Production" AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2) >=10) AND created_date >= "'.$date1.'"';
$sql17 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Production" AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2) <=5) AND created_date >= "'.$date1.'"';
$sql18 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE   impacted_account = "Production" AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2) >=5) AND created_date >= "'.$date1.'"';



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

//on envoie la requête env TRAIN
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

//on envoie la requête env PROD
$req13 = mysql_query($sql13) or die('Erreur SQL !<br>'.$sql13.'<br>'.mysql_error()); 
$data13=mysql_fetch_array($req13) ;
$req14 = mysql_query($sql14) or die('Erreur SQL !<br>'.$sql14.'<br>'.mysql_error()); 
$data14=mysql_fetch_array($req14) ;
$req15 = mysql_query($sql15) or die('Erreur SQL !<br>'.$sql15.'<br>'.mysql_error()); 
$data15=mysql_fetch_array($req15) ;
$req16 = mysql_query($sql16) or die('Erreur SQL !<br>'.$sql16.'<br>'.mysql_error()); 
$data16=mysql_fetch_array($req16) ;
$req17 = mysql_query($sql17) or die('Erreur SQL !<br>'.$sql17.'<br>'.mysql_error()); 
$data17=mysql_fetch_array($req17) ;
$req18 = mysql_query($sql18) or die('Erreur SQL !<br>'.$sql18.'<br>'.mysql_error()); 
$data18=mysql_fetch_array($req18) ;





//echo $data1["numb"];
//echo $data2["numb"];
//echo $data3["numb"];
// on ferme la connexion à mysql 
mysql_close(); 	


require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_bar.php'); 

$datay30=array('L   M   H', 'L   M   H', 'L   M   H');

// Create the basic graph
$graph = new Graph(700,300,'auto');    
$graph->SetScale("textlin");
$graph->img->SetMargin(60,40,0,70); 


// Adjust the position of the legend box
$graph->legend->Pos(.02,0.90);

// Adjust the color for theshadow of the legend
$graph->legend->SetShadow('darkgray@0.5');
$graph->legend->SetFillColor('lightblue@0.3');

// Get localised version of the month names
$graph->xaxis->SetTickLabels($datay30);

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
$graph->title->Set('OTR pour  RS_OS depuis le '.$date1);

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
$d13 = $data13["numb"];
$d14 = $data14["numb"];
$d15 = $data15["numb"];
$d16 = $data16["numb"];
$d17 = $data17["numb"];
$d18 = $data18["numb"];

//echo $d10;
//echo $d11;
//echo $d17;
//echo $d18;

$da = $d1+$d2 ;
if ($da == 0){ $d1b = 0 ; $d2b = 0 ; }
else { 
$d1b = $d1/$da * 100 ;
$d2b = $d2/$da * 100 ;
}

$db = $d3+$d4 ;
if ($db == 0){ $d3b = 0; $d4b = 0 ; }
else { 
$d3b = $d3/$db * 100 ;
$d4b = $d4/$db * 100 ;
}

$dc = $d5+$d6 ;
if ($dc == 0){ $d5b = 0 ;$d6b = 0 ; }
else { 
$d5b = $d5/$dc * 100 ;
$d6b = $d6/$dc * 100 ;
}

$dd = $d7+$d8 ;
if ($dd == 0){ $d7b = 0 ; $d8b = 0 ; }
else { 
$d7b = $d7/$dd * 100 ;
$d8b = $d8/$dd * 100 ;
}

$de = $d9+$d10 ;
if ($de == 0){ $d9b = 0 ; $d10b = 0 ; }
else { 
$d9b = $d9/$de * 100 ;
$d10b = $d10/$de * 100 ;
}

$df = $d11+$d12 ;
if ($df == 0){ $d11b = 0; $d12b = 0 ; }
else { 
$d11b = $d11/$df * 100 ;
$d12b = $d12/$df * 100 ;
}

$dg = $d13+$d14 ;
if ($dg == 0){ $d13b = 0; $d14b = 0 ; }
else { 
$d13b = $d13/$dg * 100 ;
$d14b = $d14/$dg * 100 ;
}

$dh = $d15+$d16;
if ($dh == 0){ $d15b = 0; $d16b = 0 ; }
else { 
$d15b = $d15/$dh * 100 ;
$d16b = $d16/$dh * 100 ;
}

$di = $d17+$d18 ;
if ($di == 0){ $d17b = 0; $d18b = 0 ; }
else { 
$d17b = $d17/$di * 100 ;
$d18b = $d18/$di * 100 ;
}

$data1y=array($d1b,$d7b,$d13b);
$data2y=array($d2b,$d8b,$d14b);
$data3y=array($d3b,$d9b,$d15b);
$data4y=array($d4b,$d10b,$d16b);
$data5y=array($d5b,$d11b,$d17b);
$data6y=array($d6b,$d12b,$d18b);


$b1plot = new BarPlot($data1y);
$b2plot = new BarPlot($data2y);
$b3plot = new BarPlot($data3y);
$b4plot = new BarPlot($data4y);
$b5plot = new BarPlot($data5y);
$b6plot = new BarPlot($data6y);



// Create the accumulated bar plots
$ab1plot = new AccBarPlot(array($b1plot,$b2plot));
$ab2plot = new AccBarPlot(array($b3plot,$b4plot));
$ab3plot = new AccBarPlot(array($b5plot,$b6plot));

//$ab4plot = new AccBarPlot(array($b10plot,$b11plot,$b12plot));
//$ab5plot = new AccBarPlot(array($b13plot,$b14plot,$b15plot));
//$ab6plot = new AccBarPlot(array($b16plot,$b17plot,$b18plot));

//$ab7plot = new AccBarPlot(array($b19plot,$b20plot,$b21plot));
//$ab8plot = new AccBarPlot(array($b22plot,$b23plot,$b24plot));
//$ab9plot = new AccBarPlot(array($b25plot,$b26plot,$b27plot));


// Setup legends
$b1plot->SetLegend('OTR : OK');
$b2plot->SetLegend('OTR : KO   L > 15j     M > 10j     H > 5j');

$da = $d1 + $d2 + $d3 + $d4 + $d5 + $d6 ;
$db = $d7 + $d8 + $d9 + $d10 + $d11 + $d12;
$dc = $d13 + $d14 + $d15 + $d16 + $d17 + $d18;
$graph->xaxis->title->Set("TEST                        TRAIN                        PROD            ");

// Create the grouped bar plot
$gbplot = new GroupBarPlot(array($ab1plot,$ab2plot, $ab3plot)); 
$gbplot->SetWidth(0.4);
$graph->Add($gbplot);


$b1plot->SetFillColor("green");
$b2plot->SetFillColor("red");
$b3plot->SetFillColor("green");
$b4plot->SetFillColor("red");
$b5plot->SetFillColor("green");
$b6plot->SetFillColor("red");
$b1plot->SetColor("#323434");
$b2plot->SetColor("#323434");
$b3plot->SetColor("#323434");
$b4plot->SetColor("#323434");
$b5plot->SetColor("#323434");
$b6plot->SetColor("#323434");
$graph->Stroke(); 


?>