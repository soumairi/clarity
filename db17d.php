<?php
include('connect.php'); 

//echo $_POST['valeur'];
//echo '<br><br>';
//echo $_POST['date'];
//echo '<br><br>';
$mois = $_GET['mois'];
$annee = $_GET['annee'];
$nbre = $_GET['nbre'];
$resp = $_GET['site'];
$valeur = "DB - PAO";
if ($resp==0)
	{
		$resp2 = "(responsabilite = 'YES' OR responsabilite = 'NO' OR responsabilite = ' ') AND "; 
	}
else
	{
		$resp2 = "responsabilite = 'YES' AND "; 
	};


//$date_explosee = explode("-", $date1);
//$date_explosee2 = explode("-", $date2);
//$date_explosee3 = explode("-", "2013-08-21");



//echo $annee;

$j = $mois;
$i = $annee;
$b = $nbre;
// boucle 			
for($b=1; $b<= $nbre; $b++)
				{
						
		$sql1 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql21 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';	
		$sql31 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
			
								//for ($j=$mois; $j <= $mois2 ; $j++ )
									//{
									
									if ($j <= 9 )
									{ $j = '0'.$j;
									//echo $j;
									}
									else {
									$j = $j;
									//echo $j;
									}
									
				$sql1 .=' urgency = "Low" AND type = "Incident"  AND category = "DB - PAO" AND impacted_account = "Production"   AND created_date >="20'.$i.'-'.$j.'-01" AND created_date <="20'.$i.'-'.$j.'-31 23:59:00"' ;
				$sql2 = 'SELECT nom as name from mois where id = "'.$j.'" ';
				
				
				$sql21 .=' urgency = "Medium" AND type = "Incident"  AND category = "DB - PAO" AND impacted_account = "Production"   AND created_date >="20'.$i.'-'.$j.'-01" AND created_date <="20'.$i.'-'.$j.'-31 23:59:00"' ;
				
				
				$sql31 .=' urgency = "High" AND type = "Incident"  AND category = "DB - PAO" AND impacted_account = "Production"   AND created_date >="20'.$i.'-'.$j.'-01" AND created_date <="20'.$i.'-'.$j.'-31 23:59:00"' ;
				
				
				
				
				$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
				$req21 = mysql_query($sql21) or die('Erreur SQL !<br>'.$sql21.'<br>'.mysql_error()); 
				$req31 = mysql_query($sql31) or die('Erreur SQL !<br>'.$sql31.'<br>'.mysql_error()); 
				
				
				
				//Echo $sql1 .'<br>';
				while(($data1=mysql_fetch_assoc($req1))!== false){
				$data2=mysql_fetch_assoc($req2);
				$data21=mysql_fetch_assoc($req21);
				$data31=mysql_fetch_assoc($req31);
				
				$xdata[] = "L   M   H\n  ".$data2['name'].' '.$i;
				if($data1['numb'] == '') {    $data1['numb'] = '0';     } 
				if($data21['numb'] == '') {    $data21['numb'] = '0';     } 
				if($data31['numb'] == '') {    $data31['numb'] = '0';     } 
				$adata[] = $data1['numb'];
				$adata2[] = $data21['numb'];
				$adata3[] = $data31['numb'];		
									}
		$sql1 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql21 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql31 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
								
				If ($j == '12')
					{
						$i = $i +1 ;
						$j = '01' ;
					}
				else
					{
						$j = $j +1 ;
					}
			$k = $j-1 ;	
			if ($k <= 9 )
									{ $k = '0'.$k;
									//echo $j;
									}
									else {
									$k = $k;
									//echo $j;
									}			
		}				
//echo $data1["numb"];
//echo $data2["numb"];
//echo $data3["numb"];
// on ferme la connexion à mysql 
mysql_close(); 	

// content="text/plain; charset=utf-8" 
			require_once ('jpgraph/src/jpgraph.php'); 
			require_once ('jpgraph/src/jpgraph_bar.php'); 

			$graph = new Graph(700,400,"auto");
			//$graph->SetScale("textlin");
			$graph->SetScale("textint");
			$graph->img->SetMargin(60,40,0,70);
			$graph->xaxis->SetFont(FF_FONT1);
			$graph->yaxis->title->Set(" IN NUMBER OF INCS");
			//$graph->xaxis->SetLabelAngle(90);
			$graph->xaxis->SetTickLabels($xdata);
			$graph->title->SetMargin(3);
$graph->title->SetFont(FF_ARIAL,FS_NORMAL,10);
			$graph->title->Set('DEUTSCHE BAHN  INCIDENTS REPARTITION IN PRODUCTION CREATED BETWEEN 20'.$annee.'-'.$mois.'-01 AND 20'.$i.'-'.$k  .'-31');
			$graph->legend->Pos(0.05,0.95,"right","center"); 

			
$b1plot = new BarPlot($adata);
$b1plot2 = new BarPlot($adata2);
$b1plot3 = new BarPlot($adata3);

$b1plot->SetLegend('LOW');
$b1plot2->SetLegend('MEDIUM');
$b1plot3->SetLegend('HIGH');

$graph->legend->SetColumns(6);

$ab1plot = new AccBarPlot(array($b1plot));
$ab2plot = new AccBarPlot(array($b1plot2));
$ab3plot = new AccBarPlot(array($b1plot3));

 //$p1->SetSliceColors(array('red','orange','yellow','green','purple','blue','brown','black')); 
 
$gbarplot = new GroupBarPlot(array($ab1plot,$ab2plot,$ab3plot));

 
$gbarplot->SetWidth(0.3);
$graph->Add($gbarplot); 

$b1plot->SetFillColor("yellow");
$b1plot->SetColor("#323434");
$b1plot->value->SetColor('white');

$b1plot2->SetFillColor("orange");
$b1plot2->SetColor("#323434");
$b1plot2->value->SetColor('white');

$b1plot3->SetFillColor("blue");
$b1plot3->SetColor("#323434");
$b1plot3->value->SetColor('white');


$b1plot->value->Show();
$b1plot->value->SetFormat("%u");
$b1plot->SetValuePos('center');

$b1plot2->value->Show();
$b1plot2->value->SetFormat("%u");
$b1plot2->SetValuePos('center');

$b1plot3->value->Show();
$b1plot3->value->SetFormat("%u");
$b1plot3->SetValuePos('center');

			$graph->Stroke();
?>