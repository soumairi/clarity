<?php 
include('connect.php'); 
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_bar.php');
$low = $_GET['low'];
$medium = $_GET['medium'];
$high = $_GET['high'];;


$datay=array($low,$medium,$high);

// Create the graph. These two calls are always required
$graph = new Graph(500,320,'auto');
$graph->SetScale("textlin");

//$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// set major and minor tick positions manually
//$graph->yaxis->SetTickPositions(array(0,30,60,90,120,150), array(15,45,75,105,135));
$graph->SetBox(true);

//$graph->ygrid->SetColor('gray');
$graph->ygrid->SetFill(true);
$graph->xaxis->SetTickLabels(array('LOW','MEDIUM','HIGH'));
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($datay);

// ...and add it to the graPH
$graph->Add($b1plot);


$b1plot->SetColor("blue");
$b1plot->SetWidth(50);
$graph->title->Set("Durée moyenne de résolution des tickets fermés dans le mois (en jours)");
$b1plot->value->Show();
//$b1plot->value->SetFormat("%u");
$b1plot->SetValuePos('center');


// Display the graph
$graph->Stroke();
?>

