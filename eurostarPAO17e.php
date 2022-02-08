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
$plat = $_GET['pla'];
$type = $_GET['type'];
$valeur = "EUROSTAR - PAO";
if ($resp==0)
	{
		$resp2 = "(responsabilite = 'YES' OR responsabilite = 'NO' OR responsabilite = ' ') AND "; 
	}
else
	{
		$resp2 = "responsabilite = 'YES' AND "; 
	};
if ($plat==1)
	{
		$plat1 = "AND impacted_account = 'TEST'"; 
	}
elseif ($plat==2)
	{
		$plat1 = "AND impacted_account = 'TRAIN'"; 
	}
elseif ($plat==3)
	{
		$plat1 = "AND impacted_account = 'UAT'"; 
	}
elseif ($plat==4)
	{
		$plat1 = "AND impacted_account = 'PRODUCTION'"; 
	}
elseif ($plat==5)
	{
		$plat1 = " "; 
	};
if ($type==1)
	{
		$type1 = "AND (type = 'Information Request' OR type = 'Service Request')"; 
	}
elseif ($type==2)
	{
		$type1 = "AND type = 'INCIDENT'"; 
	}
elseif ($type==3)
	{
		$type1 = " "; 
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
		
		
		
		$sql21 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql23 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql24 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql25 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		
		
		
		$sql31 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql33 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql34 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql35 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		
		
		
		$sql41 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql43 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql44 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql45 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		
		
							
								//for ($j=$mois; $j <= 12 ; $j++ )
								//	{
									
									if ($j <= 9 )
									{ $j = '0'.$j;
									//echo $j;
									}
									else {
									$j = $j;
									//echo $j;
									}
									
				$sql1 .=' urgency = "Low" '.$type1.'  AND AppVersion= "NETWORK"  AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR-SIDH") '.$plat1.'   AND created_date <"20'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"20'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"';
				$sql2 = 'SELECT nom as name from mois where id = "'.$j.'" ';
				$sql3 .=' urgency = "Low" '.$type1.'  AND AppVersion= "PAO"  AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR-SIDH") '.$plat1.'   AND created_date <"20'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"20'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"';
				$sql4 .=' urgency = "Low" '.$type1.'  AND AppVersion= "SIDH" AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR-SIDH") '.$plat1.'   AND created_date <"20'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"20'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"';
				$sql5 .=' urgency = "Low" '.$type1.'  AND AppVersion= "SQILLS" AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR-SIDH") '.$plat1.'   AND created_date <"20'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"20'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"';

				
				
				$sql21 .=' urgency = "Medium" '.$type1.'  AND AppVersion= "NETWORK"  AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR-SIDH") '.$plat1.'   AND created_date <"20'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"20'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"';
				$sql23 .=' urgency = "Medium" '.$type1.'  AND AppVersion= "PAO"  AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR-SIDH") '.$plat1.'   AND created_date <"20'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"20'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"';
				$sql24 .=' urgency = "Medium" '.$type1.'  AND AppVersion= "SIDH" AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR-SIDH") '.$plat1.'   AND created_date <"20'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"20'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"';
				$sql25 .=' urgency = "Medium" '.$type1.'  AND AppVersion= "SQILLS" AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR-SIDH") '.$plat1.'   AND created_date <"20'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"20'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"';

				
				
				$sql31 .=' urgency = "High" '.$type1.'  AND AppVersion= "NETWORK"  AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR-SIDH") '.$plat1.'   AND created_date <"20'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"20'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"';
				$sql33 .=' urgency = "High" '.$type1.'  AND AppVersion= "PAO"  AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR-SIDH") '.$plat1.'   AND created_date <"20'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"20'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"';
				$sql34 .=' urgency = "High" '.$type1.'  AND AppVersion= "SIDH" AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR-SIDH") '.$plat1.'   AND created_date <"20'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"20'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"';
				$sql35 .=' urgency = "High" '.$type1.'  AND AppVersion= "SQILLS" AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR-SIDH") '.$plat1.'   AND created_date <"20'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"20'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"';

				
				
				$sql41 .=' urgency = "Critical" '.$type1.'  AND AppVersion= "NETWORK"  AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR-SIDH") '.$plat1.'   AND created_date <"20'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"20'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"';
				$sql43 .=' urgency = "Critical" '.$type1.'  AND AppVersion= "PAO"  AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR-SIDH") '.$plat1.'   AND created_date <"20'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"20'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"';
				$sql44 .=' urgency = "Critical" '.$type1.'  AND AppVersion= "SIDH" AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR-SIDH") '.$plat1.'   AND created_date <"20'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"20'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"';
				$sql45 .=' urgency = "Critical" '.$type1.'  AND AppVersion= "SQILLS" AND (category = "EUROSTAR - PAO" OR category = "EUROSTAR-SIDH") '.$plat1.'   AND created_date <"20'.$i.'-0'.$j.'-31 23:59:00" AND (resolution_date >"20'.$i.'-0'.$j.'-31 23:59:00" OR resolution_date ="0000-00-00 00:00:00 ") AND status <> "Rejected"';

				
				
				$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
				$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql5.'<br>'.mysql_error()); 

				
				
				$req21 = mysql_query($sql21) or die('Erreur SQL !<br>'.$sql21.'<br>'.mysql_error()); 
				$req23 = mysql_query($sql23) or die('Erreur SQL !<br>'.$sql23.'<br>'.mysql_error()); 
				$req24 = mysql_query($sql24) or die('Erreur SQL !<br>'.$sql24.'<br>'.mysql_error()); 
				$req25 = mysql_query($sql25) or die('Erreur SQL !<br>'.$sql25.'<br>'.mysql_error()); 

				
				
				$req31 = mysql_query($sql31) or die('Erreur SQL !<br>'.$sql31.'<br>'.mysql_error()); 
				$req33 = mysql_query($sql33) or die('Erreur SQL !<br>'.$sql33.'<br>'.mysql_error()); 
				$req34 = mysql_query($sql34) or die('Erreur SQL !<br>'.$sql34.'<br>'.mysql_error()); 
				$req35 = mysql_query($sql35) or die('Erreur SQL !<br>'.$sql35.'<br>'.mysql_error()); 

				
				
				$req41 = mysql_query($sql41) or die('Erreur SQL !<br>'.$sql41.'<br>'.mysql_error()); 
				$req43 = mysql_query($sql43) or die('Erreur SQL !<br>'.$sql43.'<br>'.mysql_error()); 
				$req44 = mysql_query($sql44) or die('Erreur SQL !<br>'.$sql44.'<br>'.mysql_error()); 
				$req45 = mysql_query($sql45) or die('Erreur SQL !<br>'.$sql45.'<br>'.mysql_error()); 

				
				//Echo $sql29 .'<br>';
				while(($data1=mysql_fetch_assoc($req1))!== false){
				$data2=mysql_fetch_assoc($req2);
				$data3=mysql_fetch_assoc($req3);
				$data4=mysql_fetch_assoc($req4);
				$data5=mysql_fetch_assoc($req5);

				
				
				$data21=mysql_fetch_assoc($req21);
				$data23=mysql_fetch_assoc($req23);
				$data24=mysql_fetch_assoc($req24);
				$data25=mysql_fetch_assoc($req25);
				
				$data31=mysql_fetch_assoc($req31);
				$data33=mysql_fetch_assoc($req33);
				$data34=mysql_fetch_assoc($req34);
				$data35=mysql_fetch_assoc($req35);
				
				
				$data41=mysql_fetch_assoc($req41);
				$data43=mysql_fetch_assoc($req43);
				$data44=mysql_fetch_assoc($req44);
				$data45=mysql_fetch_assoc($req45);
				
				
				$xdata[] = " L   M   H   C\n     ".$data2['name'].' '.$i;
				if($data1['numb'] == '') {    $data1['numb'] = '0';     } 
				if($data3['numb'] == '') {    $data3['numb'] = '0';     } 
				if($data4['numb'] == '') {    $data4['numb'] = '0';     } 
				if($data5['numb'] == '') {    $data5['numb'] = '0';     } 
				
				
				if($data21['numb'] == '') {    $data21['numb'] = '0';     } 
				if($data23['numb'] == '') {    $data23['numb'] = '0';     } 
				if($data24['numb'] == '') {    $data24['numb'] = '0';     } 
				if($data25['numb'] == '') {    $data25['numb'] = '0';     } 
				
				
				if($data31['numb'] == '') {    $data31['numb'] = '0';     } 
				if($data33['numb'] == '') {    $data33['numb'] = '0';     } 
				if($data34['numb'] == '') {    $data34['numb'] = '0';     } 
				if($data35['numb'] == '') {    $data35['numb'] = '0';     } 
				
				
				if($data41['numb'] == '') {    $data41['numb'] = '0';     } 
				if($data43['numb'] == '') {    $data43['numb'] = '0';     } 
				if($data44['numb'] == '') {    $data44['numb'] = '0';     } 
				if($data45['numb'] == '') {    $data45['numb'] = '0';     } 
				
				$adata[] = $data1['numb'];
				$bdata[] = $data3['numb'];
				$cdata[] = $data4['numb'];
				$ddata[] = $data5['numb'];
				
				
				$adata2[] = $data21['numb'];
				$bdata2[] = $data23['numb'];
				$cdata2[] = $data24['numb'];
				$ddata2[] = $data25['numb'];

				
				
				$adata3[] = $data31['numb'];
				$bdata3[] = $data33['numb'];
				$cdata3[] = $data34['numb'];
				$ddata3[] = $data35['numb'];

				
				
				$adata4[] = $data41['numb'];
				$bdata4[] = $data43['numb'];
				$cdata4[] = $data44['numb'];
				$ddata4[] = $data45['numb'];
				
									}
		$sql1 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql3 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql4 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql5 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		
		
		$sql21 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql23 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql24 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql25 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		
		
		$sql31 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql33 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql34 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql35 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		
		
		$sql41 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql43 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql44 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		$sql45 = 'SELECT COUNT(*) as numb, AppVersion as app FROM data  WHERE  '.$resp2.'  ';
		
		
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
			$graph->title->Set('EIL   APP REPARTITION IN PRODUCTION INCIDENTS STILL OPENED SINCE 20'.$annee.'-'.$mois.'-01 AND 20'.$i.'-'.$k  .'-31');
			$graph->legend->Pos(0.05,0.95,"right","center"); 

			
$b1plot = new BarPlot($adata);
$b2plot = new BarPlot($bdata);
$b3plot = new BarPlot($cdata);
$b4plot = new BarPlot($ddata);


$b1plot2 = new BarPlot($adata2);
$b2plot2 = new BarPlot($bdata2);
$b3plot2 = new BarPlot($cdata2);
$b4plot2 = new BarPlot($ddata2);



$b1plot3 = new BarPlot($adata3);
$b2plot3 = new BarPlot($bdata3);
$b3plot3 = new BarPlot($cdata3);
$b4plot3 = new BarPlot($ddata3);



$b1plot4 = new BarPlot($adata4);
$b2plot4 = new BarPlot($bdata4);
$b3plot4 = new BarPlot($cdata4);
$b4plot4 = new BarPlot($ddata4);



$b1plot->SetLegend('NETWORK');
$b2plot->SetLegend('PAO');
$b3plot->SetLegend('SIDH');
$b4plot->SetLegend('SQILLS');


$graph->legend->SetColumns(5);

$ab1plot = new AccBarPlot(array($b1plot,$b2plot, $b3plot,$b4plot));
$ab2plot = new AccBarPlot(array($b1plot2,$b2plot2, $b3plot2,$b4plot2));
$ab3plot = new AccBarPlot(array($b1plot3,$b2plot3, $b3plot3,$b4plot3));
$ab4plot = new AccBarPlot(array($b1plot4,$b2plot4, $b3plot4,$b4plot4));
 //$p1->SetSliceColors(array('red','orange','yellow','green','purple','blue','brown','black')); 
 

$gbarplot = new GroupBarPlot(array($ab1plot,$ab2plot,$ab3plot, $ab4plot));

 
$gbarplot->SetWidth(0.5);
$graph->Add($gbarplot); 


$b1plot->SetFillColor("blue");
$b3plot->SetFillColor("#AC3633");
$b4plot->SetFillColor("#89AC41");
$b2plot->SetFillColor("#FFFF00");



$b3plot->value->SetColor('white');
$b1plot->SetColor("#323434");
$b2plot->SetColor("#323434");
$b3plot->SetColor("#323434");
$b4plot->SetColor("#323434");



$b1plot2->SetFillColor("blue");
$b3plot2->SetFillColor("#AC3633");
$b4plot2->SetFillColor("#89AC41");
$b2plot2->SetFillColor("#FFFF00");



$b3plot2->value->SetColor('white');
$b1plot2->SetColor("#323434");
$b2plot2->SetColor("#323434");
$b3plot2->SetColor("#323434");
$b4plot2->SetColor("#323434");


$b1plot3->SetFillColor("blue");
$b3plot3->SetFillColor("#AC3633");
$b4plot3->SetFillColor("#89AC41");
$b2plot3->SetFillColor("#FFFF00");




$b3plot3->value->SetColor('white');
$b1plot3->SetColor("#323434");
$b2plot3->SetColor("#323434");
$b3plot3->SetColor("#323434");
$b4plot3->SetColor("#323434");



$b1plot4->SetFillColor("blue");
$b3plot4->SetFillColor("#AC3633");
$b4plot4->SetFillColor("#89AC41");
$b2plot4->SetFillColor("#FFFF00");



$b3plot4->value->SetColor('white');
$b1plot4->SetColor("#323434");
$b2plot4->SetColor("#323434");
$b3plot4->SetColor("#323434");
$b4plot4->SetColor("#323434");



$b1plot->value->Show();
$b2plot->value->Show();
$b3plot->value->Show();
$b4plot->value->Show();


$b1plot->value->SetFormat("%u");
$b2plot->value->SetFormat("%u");
$b3plot->value->SetFormat("%u");
$b4plot->value->SetFormat("%u");


$b1plot->SetValuePos('center');
$b2plot->SetValuePos('center');
$b3plot->SetValuePos('center');
$b4plot->SetValuePos('center');



$b1plot2->value->Show();
$b2plot2->value->Show();
$b3plot2->value->Show();
$b4plot2->value->Show();

$b1plot2->value->SetFormat("%u");
$b2plot2->value->SetFormat("%u");
$b3plot2->value->SetFormat("%u");
$b4plot2->value->SetFormat("%u");


$b1plot2->SetValuePos('center');
$b2plot2->SetValuePos('center');
$b3plot2->SetValuePos('center');
$b4plot2->SetValuePos('center');


$b1plot3->value->Show();
$b2plot3->value->Show();
$b3plot3->value->Show();
$b4plot3->value->Show();


$b1plot3->value->SetFormat("%u");
$b2plot3->value->SetFormat("%u");
$b3plot3->value->SetFormat("%u");
$b4plot3->value->SetFormat("%u");


$b1plot3->SetValuePos('center');
$b2plot3->SetValuePos('center');
$b3plot3->SetValuePos('center');
$b4plot3->SetValuePos('center');


$b1plot4->value->Show();
$b2plot4->value->Show();
$b3plot4->value->Show();
$b4plot4->value->Show();


$b1plot4->value->SetFormat("%u");
$b2plot4->value->SetFormat("%u");
$b3plot4->value->SetFormat("%u");
$b4plot4->value->SetFormat("%u");


$b1plot4->SetValuePos('center');
$b2plot4->SetValuePos('center');
$b3plot4->SetValuePos('center');
$b4plot4->SetValuePos('center');


			$graph->Stroke();
?>