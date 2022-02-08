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
$valeur = "THALYS - YMS & RR";
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
		$sql3 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql4 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql5 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql6 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql7 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql8 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql9 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql10 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		
							
								//for ($j=$mois; $j <= $mois2 ; $j++ )
								//	{
									if ($j <= 9 )
									{ $j = '0'.$j;
									//echo $j;
									}
									else {
									$j = $j;
									//echo $j;
									}
				$sql1 .=' urgency = "Low" AND type = "Incident" AND AppVersion = "COUCHE MEDIATION" AND category = "THALYS - YMS" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="20'.$i.'-0'.$j.'-01" AND resolution_date <="20'.$i.'-0'.$j.'-31 23:59:00"' ;
				$sql2 = 'SELECT nom as name from mois where id = "'.$j.'" ';
				$sql3 .=' urgency = "Low" AND type = "Incident"  AND (AppVersion= "APPIA GUI" OR AppVersion= "APPIA DATABASE"  OR AppVersion= "APPIA OPTIMIZATION" OR AppVersion="AU UPDATE FILE" OR AppVersion="RFFE FILE" OR AppVersion="NETWORK" OR AppVersion="APPIA IHM")  AND category = "THALYS - YMS" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="20'.$i.'-0'.$j.'-01" AND resolution_date <="20'.$i.'-0'.$j.'-31 23:59:00"' ;
				$sql4 .=' urgency = "Low" AND type = "Incident"  AND (AppVersion = "COUCHE MEDIATION" OR AppVersion= "RESA RAIL" OR AppVersion= "RR-INTERMED"  OR AppVersion= "BCTH" OR AppVersion="NETWORK" OR AppVersion="OCRE")  AND category = "THALYS-RR" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="20'.$i.'-0'.$j.'-01" AND resolution_date <="20'.$i.'-0'.$j.'-31 23:59:00"' ;
				
				$sql5 .=' urgency = "Medium" AND type = "Incident" AND  AppVersion = "COUCHE MEDIATION" AND category = "THALYS - YMS" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="20'.$i.'-0'.$j.'-01" AND resolution_date <="20'.$i.'-0'.$j.'-31 23:59:00"' ;
				$sql6 .=' urgency = "Medium" AND type = "Incident"  AND (AppVersion= "APPIA GUI" OR AppVersion= "APPIA DATABASE"  OR AppVersion= "APPIA OPTIMIZATION" OR AppVersion="AU UPDATE FILE" OR AppVersion="RFFE FILE" OR AppVersion="NETWORK" OR AppVersion="APPIA IHM") AND category = "THALYS - YMS" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="20'.$i.'-0'.$j.'-01" AND resolution_date <="20'.$i.'-0'.$j.'-31 23:59:00"' ;
				$sql7 .=' urgency = "Medium" AND type = "Incident"  AND (AppVersion = "COUCHE MEDIATION" OR AppVersion= "RESA RAIL" OR AppVersion= "RR-INTERMED"  OR AppVersion= "BCTH" OR AppVersion="NETWORK" OR AppVersion="OCRE")  AND category = "THALYS-RR" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="20'.$i.'-0'.$j.'-01" AND resolution_date <="20'.$i.'-0'.$j.'-31 23:59:00"' ;
				
				$sql8 .=' urgency = "High" AND type = "Incident" AND AppVersion = "COUCHE MEDIATION" AND category = "THALYS - YMS" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="20'.$i.'-0'.$j.'-01" AND resolution_date <="20'.$i.'-0'.$j.'-31 23:59:00"' ;
				$sql9 .=' urgency = "HIgh" AND type = "Incident"  AND (AppVersion= "APPIA GUI" OR AppVersion= "APPIA DATABASE"  OR AppVersion= "APPIA OPTIMIZATION" OR AppVersion="AU UPDATE FILE" OR AppVersion="RFFE FILE" OR AppVersion="NETWORK" OR AppVersion="APPIA IHM") AND category = "THALYS - YMS" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="20'.$i.'-0'.$j.'-01" AND resolution_date <="20'.$i.'-0'.$j.'-31 23:59:00"' ;
				$sql10 .=' urgency = "HIgh" AND type = "Incident"  AND (AppVersion = "COUCHE MEDIATION" OR AppVersion= "RESA RAIL" OR AppVersion= "RR-INTERMED"  OR AppVersion= "BCTH" OR AppVersion="NETWORK" OR AppVersion="OCRE")  AND category = "THALYS-RR" AND impacted_account = "Production" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >="20'.$i.'-0'.$j.'-01" AND resolution_date <="20'.$i.'-0'.$j.'-31 23:59:00"' ;
				
				//echo $sql41.'<br>';
			$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
				$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql5.'<br>'.mysql_error()); 
				$req6 = mysql_query($sql6) or die('Erreur SQL !<br>'.$sql6.'<br>'.mysql_error()); 
				$req7 = mysql_query($sql7) or die('Erreur SQL !<br>'.$sql7.'<br>'.mysql_error()); 
				$req8 = mysql_query($sql8) or die('Erreur SQL !<br>'.$sql8.'<br>'.mysql_error()); 
				$req9 = mysql_query($sql9) or die('Erreur SQL !<br>'.$sql9.'<br>'.mysql_error()); 
				$req10 = mysql_query($sql10) or die('Erreur SQL !<br>'.$sql10.'<br>'.mysql_error()); 
				
				
				
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
				$data10=mysql_fetch_assoc($req10);
				
				$xdata[] = " L   M   H  \n  ".$data2['name'].' '.$i;
				if($data1['numb'] == '') {    $data1['numb'] = '0';     } 
				if($data3['numb'] == '') {    $data3['numb'] = '0';     } 
				if($data4['numb'] == '') {    $data4['numb'] = '0';     } 
				if($data5['numb'] == '') {    $data5['numb'] = '0';     } 
				if($data6['numb'] == '') {    $data6['numb'] = '0';     } 
				if($data7['numb'] == '') {    $data7['numb'] ='0';     } 
				if($data8['numb'] == '') {    $data8['numb'] = '0';     } 
				if($data9['numb'] == '') {    $data9['numb'] = '0';     } 
				if($data10['numb'] == '') {    $data10['numb'] = '0';     } 
				
				
				
				$adata[] = $data1['numb'];
				$bdata[] = $data3['numb'];
				$cdata[] = $data4['numb'];
				
				$adata2[] = $data5['numb'];
				$bdata2[] = $data6['numb'];
				$cdata2[] = $data7['numb'];
				
				$adata3[] = $data8['numb'];
				$bdata3[] = $data9['numb'];
				$cdata3[] = $data10['numb'];
				

									}
		$sql1 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql3 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql4 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql5 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql6 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql7 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql8 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql9 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql10 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		
		
		
		//echo 'j='. $j ;
		//echo 'i='. $i .'<br>';
										
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
			$graph->SetScale("textlin");
			$graph->img->SetMargin(60,40,0,70);
			$graph->xaxis->SetFont(FF_FONT1);
			$graph->yaxis->title->Set(" IN NUMBER OF INCS");
			//$graph->xaxis->SetLabelAngle(90);
			$graph->xaxis->SetTickLabels($xdata);
			$graph->title->SetMargin(3);
$graph->title->SetFont(FF_ARIAL,FS_NORMAL,10);
			$graph->title->Set('THALYS - YMS RR APP REPARTITION IN PRODUCTION INCIDENTS RESOLVED SINCE 20'.$annee.'-'.$mois.'-01 AND 20'.$i.'-'.$k  .'-31');
			$graph->legend->Pos(0.05,0.95,"right","center"); 

			
$b1plot = new BarPlot($adata);
$b2plot = new BarPlot($bdata);
$b3plot = new BarPlot($cdata);


$b1plot2 = new BarPlot($adata2);
$b2plot2 = new BarPlot($bdata2);
$b3plot2 = new BarPlot($cdata2);


$b1plot3 = new BarPlot($adata3);
$b2plot3 = new BarPlot($bdata3);
$b3plot3 = new BarPlot($cdata3);


$b1plot->SetLegend('COUCHE MEDIATION');
$b2plot->SetLegend('YMS');
$b3plot->SetLegend('RESARAIL');

$graph->legend->SetColumns(3);

$ab1plot = new AccBarPlot(array($b1plot,$b2plot,$b3plot));//
$ab2plot = new AccBarPlot(array($b1plot2,$b2plot2,$b3plot2));//
$ab3plot = new AccBarPlot(array($b1plot3,$b2plot3,$b3plot3));//

 //$p1->SetSliceColors(array('red','orange','yellow','green','purple','blue','brown','black')); 
 

$gbarplot = new GroupBarPlot(array($ab1plot,$ab2plot,$ab3plot));

 
$gbarplot->SetWidth(0.3);
$graph->Add($gbarplot); 


$b1plot->SetFillColor("#FFFF00");
$b2plot->SetFillColor("#3BB8D9");
$b3plot->SetFillColor("#AC3633");
$b1plot->SetColor("#323434");
$b2plot->SetColor("#323434");
$b3plot->SetColor("#323434");
$b1plot2->SetFillColor("#FFFF00");
$b2plot2->SetFillColor("#3BB8D9");
$b3plot2->SetFillColor("#AC3633");
$b1plot2->SetColor("#323434");
$b2plot2->SetColor("#323434");
$b3plot2->SetColor("#323434");
$b1plot3->SetFillColor("#FFFF00");
$b2plot3->SetFillColor("#3BB8D9");
$b3plot3->SetFillColor("#AC3633");
$b1plot3->SetColor("#323434");
$b2plot3->SetColor("#323434");
$b3plot3->SetColor("#323434");


$b1plot->value->Show();
$b2plot->value->Show();
$b3plot->value->Show();

$b1plot->value->SetFormat("%u");
$b2plot->value->SetFormat("%u");
$b3plot->value->SetFormat("%u");

$b1plot->SetValuePos('center');
$b2plot->SetValuePos('center');
$b3plot->SetValuePos('center');


$b1plot2->value->Show();
$b2plot2->value->Show();
$b3plot2->value->Show();

$b1plot2->value->SetFormat("%u");
$b2plot2->value->SetFormat("%u");
$b3plot2->value->SetFormat("%u");

$b1plot2->SetValuePos('center');
$b2plot2->SetValuePos('center');
$b3plot2->SetValuePos('center');


$b1plot3->value->Show();
$b2plot3->value->Show();
$b3plot3->value->Show();

$b1plot3->value->SetFormat("%u");
$b2plot3->value->SetFormat("%u");
$b3plot3->value->SetFormat("%u");

$b1plot3->SetValuePos('center');
$b2plot3->SetValuePos('center');
$b3plot3->SetValuePos('center');



			$graph->Stroke();
?>