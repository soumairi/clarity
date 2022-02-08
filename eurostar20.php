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
$valeur = "EIL - RESARAIL - HOSTING";
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
						
		$sql1 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE   ';
		$sql3 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE    ';
		
		$sql4 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE    ';
		$sql5 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE    ';
		
		$sql6 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE   ';
		$sql7 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE    ';
		
		$sql8 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE    ';
		$sql9 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE    ';
		
							
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
				$sql1 .=' urgency = "Low"    AND responsabilite = "NO"  AND (category = "EIL-HOSTING" or category = "EIL-RESARAIL") AND impacted_account = "Production" AND type="incident" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31 23:59:00"' ;
				$sql2 = 'SELECT nom as name from mois where id = "'.$j.'" ';
				$sql3 .=' urgency = "Low"    AND responsabilite = "YES"  AND (category = "EIL-HOSTING" or category = "EIL-RESARAIL") AND impacted_account = "Production" AND type="incident" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31 23:59:00"' ;
				
				$sql4 .=' urgency = "Medium"    AND responsabilite = "NO" AND (category = "EIL-HOSTING" or category = "EIL-RESARAIL") AND impacted_account = "Production" AND type="incident"  AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31 23:59:00"' ;
				$sql5 .=' urgency = "Medium"    AND responsabilite = "YES" AND (category = "EIL-HOSTING" or category = "EIL-RESARAIL") AND impacted_account = "Production" AND type="incident" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31 23:59:00"' ;
				
				$sql6 .=' urgency = "High"    AND responsabilite = "NO" AND (category = "EIL-HOSTING" or category = "EIL-RESARAIL") AND impacted_account = "Production" AND type="incident" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31 23:59:00"' ;
				$sql7 .=' urgency = "High"    AND responsabilite = "YES" AND (category = "EIL-HOSTING" or category = "EIL-RESARAIL") AND impacted_account = "Production" AND type="incident" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31 23:59:00"' ;
				
				$sql8 .=' urgency = "Critical"    AND responsabilite = "NO" AND (category = "EIL-HOSTING" or category = "EIL-RESARAIL") AND impacted_account = "Production" AND type="incident" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31 23:59:00"' ;
				$sql9 .=' urgency = "Critical"    AND responsabilite = "YES" AND (category = "EIL-HOSTING" or category = "EIL-RESARAIL") AND impacted_account = "Production" AND type="incident" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31 23:59:00"' ;
				
				$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
				$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql5.'<br>'.mysql_error()); 
				$req6 = mysql_query($sql6) or die('Erreur SQL !<br>'.$sql6.'<br>'.mysql_error()); 
				$req7 = mysql_query($sql7) or die('Erreur SQL !<br>'.$sql7.'<br>'.mysql_error()); 
				$req8 = mysql_query($sql8) or die('Erreur SQL !<br>'.$sql8.'<br>'.mysql_error()); 
				$req9 = mysql_query($sql9) or die('Erreur SQL !<br>'.$sql9.'<br>'.mysql_error());
				
				//Echo $sql1 .'<br>';
				while(($data1=mysql_fetch_assoc($req1))!== false){
				$data2=mysql_fetch_assoc($req2);
				$data3=mysql_fetch_assoc($req3);
				$data4=mysql_fetch_assoc($req4);
				$data5=mysql_fetch_assoc($req5);
				$data6=mysql_fetch_assoc($req6);
				$data7=mysql_fetch_assoc($req7);
				$data8=mysql_fetch_assoc($req8);
				$data9=mysql_fetch_assoc($req9);
			
				
				$xdata[] = " L   M   H   C\n     ".$data2['name'].' 1'.$i;
				if($data1['numb'] == '') {    $data1['numb'] = '0';     } 
				if($data3['numb'] == '') {    $data3['numb'] = '0';     } 
				if($data4['numb'] == '') {    $data4['numb'] = '0';     } 
				if($data5['numb'] == '') {    $data5['numb'] = '0';     } 
				if($data6['numb'] == '') {    $data6['numb'] = '0';     } 
				if($data7['numb'] == '') {    $data7['numb'] = '0';     } 
				if($data8['numb'] == '') {    $data8['numb'] = '0';     } 
				if($data9['numb'] == '') {    $data9['numb'] = '0';     } 
				
				$adata[] = $data1['numb'];
				$bdata[] = $data3['numb'];
				$cdata[] = $data4['numb'];
				$ddata[] = $data5['numb'];
				$edata[] = $data6['numb'];
				$fdata[] = $data7['numb'];
				$gdata[] = $data8['numb'];
				$hdata[] = $data9['numb'];
				
									}
		$sql1 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE   ';
		$sql3 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE   ';
		$sql4 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE   ';
		$sql5 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE   ';
		$sql6 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE   ';
		$sql7 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE   ';
		$sql8 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE   ';
		$sql9 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE   ';
		
										
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
			$graph->SetScale("textint");
			$graph->img->SetMargin(60,40,0,70);
			$graph->xaxis->SetFont(FF_FONT1);
			//$graph->xaxis->SetLabelAngle(90);
			$graph->xaxis->SetTickLabels($xdata);
			$graph->yaxis->title->Set(" IN NUMBER OF INCS");
			$graph->title->SetMargin(3);
$graph->title->SetFont(FF_ARIAL,FS_NORMAL,10);
			$graph->title->Set('INCIDENTS RESPONSABILITY IN PRODUCTION BETWEEN 201'.$annee.'-'.$mois.'-01 AND 201'.$i.'-'.$k  .'-31');
			$graph->legend->Pos(0.05,0.95,"right","center"); 

			
$b1plot = new BarPlot($adata);
$b2plot = new BarPlot($bdata);
$b3plot = new BarPlot($cdata);
$b4plot = new BarPlot($ddata);
$b5plot = new BarPlot($edata);
$b6plot = new BarPlot($fdata);
$b7plot = new BarPlot($gdata);
$b8plot = new BarPlot($hdata);



$b2plot->SetLegend('SI.OS Side');
$b1plot->SetLegend('EIL Side');
//$b3plot->SetLegend('Sky Channel API');
//$b4plot->SetLegend('Sky Pay');
//$b5plot->SetLegend('Sky Sales');
//$b6plot->SetLegend('Sky Speed');
//$b7plot->SetLegend('Sky report');
//$b8plot->SetLegend('Other');
//$b9plot->SetLegend('Yield');
//$graph->legend->SetColumns(6);

$ab1plot = new AccBarPlot(array($b1plot,$b2plot));
$ab2plot = new AccBarPlot(array($b3plot,$b4plot));
$ab3plot = new AccBarPlot(array($b5plot,$b6plot));
$ab4plot = new AccBarPlot(array($b7plot,$b8plot));
 //$p1->SetSliceColors(array('red','orange','yellow','green','purple','blue','brown','black')); 
 

$gbarplot = new GroupBarPlot(array($ab1plot,$ab2plot,$ab3plot, $ab4plot));

 
$gbarplot->SetWidth(0.5);
$graph->Add($gbarplot); 

$b1plot->SetFillColor("#990000");
$b2plot->SetFillColor("#000099");
$b3plot->SetFillColor("#990000");
$b4plot->SetFillColor("#000099");
$b5plot->SetFillColor("#990000");
$b6plot->SetFillColor("#000099");
$b7plot->SetFillColor("#990000");
$b8plot->SetFillColor("#000099");

$b1plot->SetColor("#323434");
$b2plot->SetColor("#323434");
$b3plot->SetColor("#323434");
$b4plot->SetColor("#323434");
$b5plot->SetColor("#323434");
$b6plot->SetColor("#323434");
$b7plot->SetColor("#323434");
$b8plot->SetColor("#323434");

$b1plot->value->SetColor('white');
$b2plot->value->SetColor('white');
$b3plot->value->SetColor('white');
$b4plot->value->SetColor('white');
$b5plot->value->SetColor('white');
$b6plot->value->SetColor('white');
$b7plot->value->SetColor('white');
$b8plot->value->SetColor('white');


$b1plot->value->Show();
$b2plot->value->Show();
$b3plot->value->Show();
$b4plot->value->Show();
$b5plot->value->Show();
$b6plot->value->Show();
$b7plot->value->Show();
$b8plot->value->Show();

$b1plot->value->SetFormat("%u");
$b2plot->value->SetFormat("%u");
$b3plot->value->SetFormat("%u");
$b4plot->value->SetFormat("%u");
$b5plot->value->SetFormat("%u");
$b6plot->value->SetFormat("%u");
$b7plot->value->SetFormat("%u");
$b8plot->value->SetFormat("%u");

$b1plot->SetValuePos('center');
$b2plot->SetValuePos('center');
$b3plot->SetValuePos('center');
$b4plot->SetValuePos('center');
$b5plot->SetValuePos('center');
$b6plot->SetValuePos('center');
$b7plot->SetValuePos('center');
$b8plot->SetValuePos('center');


			$graph->Stroke();
?>