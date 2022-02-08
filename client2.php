<?php
include('connect.php'); 

//echo $_POST['valeur'];
//echo '<br><br>';
//echo $_POST['date'];
//echo '<br><br>';
$valeur = $_GET['valeur'];
$date1 = $_GET['date1'];



//Environnement de TEST
$sql1 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Test" AND urgency = "low" AND status = "New" AND created_date >= "'.$date1.'"';
$sql2 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Test" AND urgency = "low" AND status = "Owned" AND created_date >= "'.$date1.'"';
$sql3 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Test" AND urgency = "low" AND (status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated" ) AND created_date >= "'.$date1.'"';

$sql4 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Test" AND urgency = "medium" AND status = "New" AND created_date >= "'.$date1.'"';
$sql5 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Test" AND urgency = "medium" AND status = "Owned" AND created_date >= "'.$date1.'"';
$sql6 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Test" AND urgency = "medium" AND (status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated" ) AND created_date >= "'.$date1.'"';

$sql7 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Test" AND urgency = "high" AND status = "New" AND created_date >= "'.$date1.'"';
$sql8 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Test" AND urgency = "high" AND status = "Owned" AND created_date >= "'.$date1.'"';
$sql9 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Test" AND urgency = "high" AND (status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated" ) AND created_date >= "'.$date1.'"';

//Environnement TRAIN
$sql10 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Training" AND urgency = "low" AND status = "New" AND created_date >= "'.$date1.'"';
$sql11 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Training" AND urgency = "low" AND status = "Owned" AND created_date >= "'.$date1.'"';
$sql12 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Training" AND urgency = "low" AND (status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated" ) AND created_date >= "'.$date1.'"';

$sql13 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Training" AND urgency = "medium" AND status = "New" AND created_date >= "'.$date1.'"';
$sql14 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Training" AND urgency = "medium" AND status = "Owned" AND created_date >= "'.$date1.'"';
$sql15 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Training" AND urgency = "medium" AND (status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated" ) AND created_date >= "'.$date1.'"';

$sql16 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Training" AND urgency = "high" AND status = "New" AND created_date >= "'.$date1.'"';
$sql17 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Training" AND urgency = "high" AND status = "Owned" AND created_date >= "'.$date1.'"';
$sql18 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Training" AND urgency = "high" AND (status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated" ) AND created_date >= "'.$date1.'"';

//Environnement PROD
$sql19 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Production" AND urgency = "low" AND status = "New" AND created_date >= "'.$date1.'"';
$sql20 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Production" AND urgency = "low" AND status = "Owned" AND created_date >= "'.$date1.'"';
$sql21 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Production" AND urgency = "low" AND (status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated" ) AND created_date >= "'.$date1.'"';

$sql22 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Production" AND urgency = "medium" AND status = "New" AND created_date >= "'.$date1.'"';
$sql23 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Production" AND urgency = "medium" AND status = "Owned" AND created_date >= "'.$date1.'"';
$sql24 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Production" AND urgency = "medium" AND (status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated" ) AND created_date >= "'.$date1.'"';

$sql25 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Production" AND urgency = "high" AND status = "New" AND created_date >= "'.$date1.'"';
$sql26 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Production" AND urgency = "high" AND status = "Owned" AND created_date >= "'.$date1.'"';
$sql27 = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE category = "'.$valeur.'" AND impacted_account = "Production" AND urgency = "high" AND (status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated" ) AND created_date >= "'.$date1.'"';

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

// on envoie la requête env TRAIN
$req10 = mysql_query($sql10) or die('Erreur SQL !<br>'.$sql10.'<br>'.mysql_error()); 
$data10=mysql_fetch_array($req10) ;
$req11 = mysql_query($sql11) or die('Erreur SQL !<br>'.$sql11.'<br>'.mysql_error()); 
$data11=mysql_fetch_array($req11) ;
$req12 = mysql_query($sql12) or die('Erreur SQL !<br>'.$sql12.'<br>'.mysql_error()); 
$data12=mysql_fetch_array($req12) ;
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

// on envoie la requête env PROD
$req19 = mysql_query($sql19) or die('Erreur SQL !<br>'.$sql19.'<br>'.mysql_error()); 
$data19=mysql_fetch_array($req19) ;
$req20 = mysql_query($sql20) or die('Erreur SQL !<br>'.$sql20.'<br>'.mysql_error()); 
$data20=mysql_fetch_array($req20) ;
$req21 = mysql_query($sql21) or die('Erreur SQL !<br>'.$sql21.'<br>'.mysql_error()); 
$data21=mysql_fetch_array($req21) ;
$req22 = mysql_query($sql22) or die('Erreur SQL !<br>'.$sql22.'<br>'.mysql_error()); 
$data22=mysql_fetch_array($req22) ;
$req23 = mysql_query($sql23) or die('Erreur SQL !<br>'.$sql23.'<br>'.mysql_error()); 
$data23=mysql_fetch_array($req23) ;
$req24 = mysql_query($sql24) or die('Erreur SQL !<br>'.$sql24.'<br>'.mysql_error()); 
$data24=mysql_fetch_array($req24) ;
$req25 = mysql_query($sql25) or die('Erreur SQL !<br>'.$sql25.'<br>'.mysql_error()); 
$data25=mysql_fetch_array($req25) ;
$req26 = mysql_query($sql26) or die('Erreur SQL !<br>'.$sql26.'<br>'.mysql_error()); 
$data26=mysql_fetch_array($req26) ;
$req27 = mysql_query($sql27) or die('Erreur SQL !<br>'.$sql27.'<br>'.mysql_error()); 
$data27=mysql_fetch_array($req27) ;



//echo $data1["numb"];
//echo $data2["numb"];
//echo $data3["numb"];
// on ferme la connexion à mysql 
mysql_close(); 	


require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_bar.php'); 

// Some data

//$datay2=array($data10["numb"],$data11["numb"],$data12["numb"]);
//$datay3=array($data19["numb"],$data20["numb"],$data21["numb"],); 

//$datay4=array($data4["numb"],$data5["numb"],$data6["numb"]);
//$datay5=array($data13["numb"],$data14["numb"],$data15["numb"]);
//$datay6=array($data22["numb"],$data23["numb"],$data24["numb"],); 

//$datay7=array($data7["numb"],$data8["numb"],$data9["numb"]);
//$datay8=array($data16["numb"],$data17["numb"],$data18["numb"]);
//$datay9=array($data25["numb"],$data26["numb"],$data27["numb"],); 

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
$graph->title->Set('Répartition des INCS ouverts '.$valeur. ' depuis le '.$date1);

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
$d19 = $data19["numb"];
$d20 = $data20["numb"];
$d21 = $data21["numb"];
$d22 = $data22["numb"];
$d23 = $data23["numb"];
$d24 = $data24["numb"];
$d25 = $data25["numb"];
$d26 = $data26["numb"];
$d27 = $data27["numb"];



$data1y=array($d1,$d10,$d19);
$data2y=array($d2,$d11,$d20);
$data3y=array($d3,$d12,$d21);
$data4y=array($d4,$d13,$d22);
$data5y=array($d5,$d14,$d23);
$data6y=array($d6,$d15,$d24);
$data7y=array($d7,$d16,$d25);
$data8y=array($d8,$d17,$d26);
$data9y=array($d9,$d18,$d27);

$b1plot = new BarPlot($data1y);
$b2plot = new BarPlot($data2y);
$b3plot = new BarPlot($data3y);
$b4plot = new BarPlot($data4y);
$b5plot = new BarPlot($data5y);
$b6plot = new BarPlot($data6y);
$b7plot = new BarPlot($data7y);
$b8plot = new BarPlot($data8y);
$b9plot = new BarPlot($data9y);


// Create the accumulated bar plots
$ab1plot = new AccBarPlot(array($b1plot,$b2plot,$b3plot));
$ab2plot = new AccBarPlot(array($b4plot,$b5plot,$b6plot));
$ab3plot = new AccBarPlot(array($b7plot,$b8plot,$b9plot));

//$ab4plot = new AccBarPlot(array($b10plot,$b11plot,$b12plot));
//$ab5plot = new AccBarPlot(array($b13plot,$b14plot,$b15plot));
//$ab6plot = new AccBarPlot(array($b16plot,$b17plot,$b18plot));

//$ab7plot = new AccBarPlot(array($b19plot,$b20plot,$b21plot));
//$ab8plot = new AccBarPlot(array($b22plot,$b23plot,$b24plot));
//$ab9plot = new AccBarPlot(array($b25plot,$b26plot,$b27plot));


// Setup legends
$b1plot->SetLegend('Not take in charge');
$b2plot->SetLegend('Work in progress');
$b3plot->SetLegend('Bounced for clarification');
$da = $d1 + $d2 + $d3 + $d4 + $d5 + $d6 + $d7 + $d8 + $d9 ;
$db = $d10 + $d11 + $d12 + $d13 + $d14 + $d15 + $d16 + $d17 + $d18 ;
$dc = $d19 + $d20 + $d21 + $d22 + $d23 + $d24 + $d25 + $d26 + $d27 ;
$graph->xaxis->title->Set("TEST (".$da.")                    TRAIN (".$db.")                    PROD (".$dc.")         ");


// Create the grouped bar plot
$gbplot = new GroupBarPlot(array($ab1plot,$ab2plot,$ab3plot)); 
$gbplot->SetWidth(0.4);
$graph->Add($gbplot);


$b1plot->SetFillColor("red");
$b2plot->SetFillColor("orange");
$b3plot->SetFillColor("green");
$b4plot->SetFillColor("red");
$b5plot->SetFillColor("orange");
$b6plot->SetFillColor("green");
$b7plot->SetFillColor("red");
$b8plot->SetFillColor("orange");
$b9plot->SetFillColor("green");
$b1plot->SetColor("#323434");
$b2plot->SetColor("#323434");
$b3plot->SetColor("#323434");
$b4plot->SetColor("#323434");
$b5plot->SetColor("#323434");
$b6plot->SetColor("#323434");
$b7plot->SetColor("#323434");
$b8plot->SetColor("#323434");
$b9plot->SetColor("#323434");
$graph->Stroke(); 


?>