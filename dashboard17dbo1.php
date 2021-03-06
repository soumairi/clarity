<?php
include('connect.php'); 

//echo $_POST['valeur'];
//echo '<br><br>';
//echo $_POST['date'];
//echo '<br><br>';
$cff = $_GET['cff'];
$rs = $_GET['rs'];
$elipsos = $_GET['elipsos'];
$thalys = $_GET['thalys'];
$bene = $_GET['bene'];
$db = $_GET['db'];
$eurostar = $_GET['eurostar'];
$title = array('CFF', 'SI.OS', 'ELIPSOS', 'THALYS', 'BENE', 'DB', 'EUROSTAR'); 

require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_pie.php');
require_once ('jpgraph/src/jpgraph_pie3d.php');
 
$data = array($cff,$rs,$elipsos, $thalys, $bene, $db, $eurostar);
 
$graph = new PieGraph(300,250);
$graph->SetShadow();
 
$graph->title->Set("Répartition par client des tickets en \n statut ouvert au dernier jour du mois");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
 
$p1 = new PiePlot3D($data);

$p1->SetSize(0.5);
$p1->SetCenter(0.45);
$p1->SetLegends ($title);
$graph->legend->SetPos(0.5,0.98,'center','bottom');
$p1->SetLabelPos(0.6);

$graph->Add($p1);
 $p1 ->SetSliceColors(array('#FFFF00','#3BB8D9','#34C924','orange', '#D21DBD', '#ED7F10', '#FF0000'));
$graph->Stroke();
?>