<?php
include('connect.php'); 

//echo $_POST['valeur'];
//echo '<br><br>';
//echo $_POST['date'];
//echo '<br><br>';
$low = $_GET['low'];
$medium = $_GET['medium'];
$high = $_GET['high'];
$title = array('LOW', 'MEDIUM', 'HIGH'); 


require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_pie.php');
require_once ('jpgraph/src/jpgraph_pie3d.php');
 
$data = array($low,$medium,$high);
 
$graph = new PieGraph(300,250);
$graph->SetShadow();
 
$graph->title->Set("Criticit� des tickets ouverts \n dans le mois");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
 
$p1 = new PiePlot3D($data);
$p1->SetSize(0.5);
$p1->SetCenter(0.45);
$p1->SetLegends ($title);
$graph->legend->SetPos(0.5,0.98,'center','bottom');
$p1->SetLabelPos(0.6);
 
$graph->Add($p1);
 $p1 ->SetSliceColors(array('#FFFF00','#6C4E91','#3BB8D9','#333333','orange'));
$graph->Stroke();
?>