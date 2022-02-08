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
$valeur = "SCOTRAIL - YMS";
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
						$sql1 = 'SELECT  avg(datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0))  as numb from data WHERE  '.$resp2.' ';
				$sql3 = 'SELECT  avg(datediff( resolution_date, created_date)  - IFNULL((datediff(end_bounced_time, start_bounced_time) ),0))as numb from data WHERE  '.$resp2.'  ';
				$sql4 = 'SELECT  avg(datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0))  as numb from data WHERE  '.$resp2.'  ';
							
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
									$sql1 .=' urgency = "low" AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31" AND (category = "SCOTRAIL - YMS" OR category = "SCOTRAIL - YMS") AND impacted_account = "Production" AND type="incident" ' ;
									$sql2 = 'SELECT nom as name from mois where id = "'.$j.'"';
									$sql3 .=' urgency = "medium" AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31" AND (category = "SCOTRAIL - YMS" OR category = "SCOTRAIL - YMS") AND impacted_account = "Production" AND type="incident"' ;
									$sql4 .=' urgency = "high" AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31" AND (category = "SCOTRAIL - YMS" OR category = "SCOTRAIL - YMS") AND impacted_account = "Production" AND type="incident"' ;
									$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
				$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				//echo $sql3. '<br>'; 
				while(($data1=mysql_fetch_assoc($req1))!== false){
				$data2=mysql_fetch_assoc($req2);
				$data3=mysql_fetch_assoc($req3);
				$data4=mysql_fetch_assoc($req4);
				if($data1['numb'] == '') {    $data1['numb'] = '0';     } 
				if($data3['numb'] == '') {    $data3['numb'] = '0';     } 
				if($data4['numb'] == '') {    $data4['numb'] = '0';     } 
				$xdata[] = $data2['name'].' 1'.$i;
				$ydata[] = $data1['numb'];
				$zdata[] = $data3['numb'];
				//echo $data3['numb'].'<br>';
				$adata[] = $data4['numb'];
				$bdata[]= $data1['numb'] + $data3['numb'];
				$dataref15[] = 15;
				$dataref10[] = 10;
				$dataref5[] = 5;
									}
									$sql1 = 'SELECT  avg(datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0)) as numb from data WHERE  '.$resp2.' ';
				$sql3 = 'SELECT  avg(datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0)) as numb from data WHERE  '.$resp2.'  ';
				$sql4 = 'SELECT  avg(datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0))  as numb from data WHERE  '.$resp2.'  ';
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
			require_once ('jpgraph/src/jpgraph_line.php'); 
			require_once ('jpgraph/src/jpgraph_plotline.php'); 

			$graph = new Graph(700,400,"auto");
			$graph->SetScale("textint");
			$graph->img->SetMargin(60,40,0,70);
			$graph->xaxis->SetFont(FF_FONT1);
			$graph->xaxis->SetLabelAngle(90);
			$graph->xaxis->SetTickLabels($xdata);
			$graph->title->SetMargin(3);
			$graph->yaxis->title->Set(" IN NUMBER OF DAYS");
			$graph->title->SetFont(FF_ARIAL,FS_NORMAL,13);
			$graph->title->Set("SCOTRAIL INCIDENTS AVERAGE LIFE TIME EVOLUTION IN PRODUCTION");
			$graph->legend->Pos(0.05,0.95,"right","center"); 

			
			// ... and the second
			$p2 = new LinePlot($ydata);
			//$p2->mark->SetType(MARK_STAR);
			$p2->mark->SetFillColor("green");
			$p2->mark->SetColor("green");
			$p2->mark->SetType(MARK_FILLEDCIRCLE);
			$p2->mark->SetWidth(3);
			$p2->SetColor("red");
			//$p2->SetStyle('dashed');
			$p2->SetCenter();
			$p2->SetWeight(3);
			$p2->SetLegend("LOW");
			$graph->Add($p2);
$graph->legend->SetColumns(6);
						// Create the first line
			$p1 = new LinePlot($zdata);
			$p1->SetColor("black");
			$p1->SetCenter();
			$p1->SetLegend("MEDIUM");
			$graph->Add($p1);

			

			// ... and the third
			$p3 = new LinePlot($adata);
			$p3->mark->SetType(MARK_UTRIANGLE);
			$p3->mark->SetFillColor("#0000CC");
			$p3->mark->SetColor("#0000CC");
			$p3->mark->SetWidth(4);
			
			$p3->SetCenter();
			$p3->SetLegend("HIGH");
			$graph->Add($p3);	


	
			//$p4 =new PlotLine(HORIZONTAL,0.1,'green',2);
			//$graph->Add($p4);
			//$p4->SetLegend("CRITICAL");
			//$p5 =new PlotLine(HORIZONTAL,10,"#0000CC",2);
			//$graph->Add($p5);
			//$p6 =new PlotLine(HORIZONTAL,5,'red',2);
			//$graph->Add($p6);

			
			$p1->SetWeight(10);
			$p1->SetColor("orange");
			$p2->SetWeight(10);
			$p2->SetColor("green");
			$p3->SetWeight(10);
			$p3->SetColor("#0000CC");
			//$p5->SetWeight(10);
			//$p5->SetColor("#0000CC");
			//$p4->SetWeight(10);
			//$p4->SetColor("red");
			//$p6->SetWeight(50);
			//$p6->SetColor("red");
			$graph->Stroke();
?>