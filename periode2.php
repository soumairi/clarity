<?php
include('connect.php'); 

//echo $_POST['valeur'];
//echo '<br><br>';
//echo $_POST['date'];
//echo '<br><br>';
$valeur = $_GET['valeur'];
$dated = $_GET['dated'];
$datef = $_GET['datef'];
if ($valeur == 'Confirmed_segment_count') {
	$sql = $sql = 'SELECT max('.$valeur.') as moyenne, date_navitaire FROM data  WHERE date_navitaire >= "'.$dated.'" AND date_navitaire <= "'.$datef.'" GROUP BY date_navitaire';
	}
	else
$sql = 'SELECT avg('.$valeur.') as moyenne, date_navitaire FROM data  WHERE date_navitaire >= "'.$dated.'" AND date_navitaire <= "'.$datef.'" GROUP BY date_navitaire';

// on envoie la requête 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

// on fait une boucle qui va faire un tour pour chaque enregistrement 
while ( ($data = mysql_fetch_assoc($req))!== false) {
    $xdata[] = $data['date_navitaire'];
	//		if($data[$valeur] == '') {    
	//$data[$valeur] = '0';     } 
    $ydata[] = $data['moyenne'];

}

// on ferme la connexion à mysql 
mysql_close(); 	
// content="text/plain; charset=utf-8" 
			require_once ('jpgraph/src/jpgraph.php'); 
			require_once ('jpgraph/src/jpgraph_line.php'); 

			$graph = new Graph(800,300,"auto");
			$graph->SetScale("textlin");
			$graph->img->SetMargin(60,40,0,70);
			$graph->xaxis->SetFont(FF_FONT1);
			$graph->xaxis->SetLabelAngle(90);
			$graph->xaxis->SetTickLabels($xdata);
			$graph->title->Set($valeur);

			$lineplot=new LinePlot($ydata);
			$lineplot->SetColor("red");

			//$lineplot->SetLegend($valeur);
			$graph->Add($lineplot);

			$graph->Stroke();
		
?>