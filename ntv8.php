<?php
include('connect.php'); 

//echo $_POST['valeur'];
//echo '<br><br>';
//echo $_POST['date'];
//echo '<br><br>';
$date1 = $_GET['date1'];
$date2 = $_GET['date2'];
$resp = $_GET['site'];
$valeur = $_GET['valeur'];
if ($resp==0)
	{
		$resp2 = "(responsabilite = 'YES' OR responsabilite = 'NO') AND "; 
	}
else
	{
		$resp2 = "responsabilite = 'YES' AND "; 
	};



$date_explosee = explode("-", $date1);
$date_explosee2 = explode("-",  $date2);
$date_explosee3 = explode("-", "2013-08-21");

$mois = $date_explosee2[1];
$annee = substr($date_explosee2[0],-1);

$mois2 = $date_explosee2[1];
$annee2 = substr($date_explosee2[0],-1);
//echo $annee;

//pour 2012
for($i=1; $i< 2; $i++)
				{
		$sql1 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.'  ';
		$sql3 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.'  ';
		$sql4 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.'  ';
			for ($j=8; $j <= 9 ; $j++ )
				{
				$sql1 .=' MONTH(created_date) = "'.$j.'" AND urgency = "low" AND created_date >= "2011-0'.$j.'-01" AND created_date <="2011-0'.$j.'-31" AND category = "'.$valeur.'" AND impacted_account = "Production" AND type="incident"' ;
				$sql2 = 'SELECT nom as name from mois where id = "'.$j.'" ';
				$sql3 .= ' urgency = "low" AND created_date <="2011-0'.$j.'-01" AND (resolution_date >="201'.$i.'-0'.$j.'-31" OR resolution_date =" ") AND category = "'.$valeur.'" AND impacted_account = "Production" AND type="incident"' ;
				$sql4 .=' urgency = "low" AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31" AND category = "'.$valeur.'" AND impacted_account = "Production" AND type="incident"' ;
				$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
				$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				//echo $sql3. '<br>'; 
				while(($data1=mysql_fetch_assoc($req1))!== false){
				$data2=mysql_fetch_assoc($req2);
				$data3=mysql_fetch_assoc($req3);
				$data4=mysql_fetch_assoc($req4);
				$xdata[] = $data2['name'].' 1'.$i;
				$ydata[] = $data1['numb'];
				$zdata[] = $data3['numb'];
				$adata[] = $data4['numb'];
				$bdata[]= $data1['numb'] + $data3['numb'];
				}
				$sql1 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.' ';
				$sql3 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.'  ';
				$sql4 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.'  ';
				}
			for ($j=10; $j <= 12 ; $j++ )
			{
			$sql1 .=' MONTH(created_date) = "'.$j.'" AND urgency = "low" AND created_date >= "2011-'.$j.'-01" AND created_date <="2011-'.$j.'-31" AND category = "'.$valeur.'" AND impacted_account = "Production" AND type="incident"' ;
			$sql2 = 'SELECT nom as name from mois where id = "'.$j.'"';
			$sql3 .= ' urgency = "low" AND created_date <="2011-'.$j.'-01" AND (resolution_date >"201'.$i.'-'.$j.'-31" OR resolution_date =" ") AND category = "'.$valeur.'" AND impacted_account = "Production" AND type="incident"' ;
			$sql4 .=' urgency = "low" AND resolution_date >="201'.$i.'-'.$j.'-01" AND resolution_date <="201'.$i.'-'.$j.'-31" AND category = "'.$valeur.'" AND impacted_account = "Production" AND type="incident"' ;
			$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
				$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				//echo $sql3. '<br>'; 
				while(($data1=mysql_fetch_assoc($req1))!== false){
				$data2=mysql_fetch_assoc($req2);
				$data3=mysql_fetch_assoc($req3);
				$data4=mysql_fetch_assoc($req4);
				$xdata[] = $data2['name'].' 1'.$i;
				$ydata[] = $data1['numb'];
				$zdata[] = $data3['numb'];
				$adata[] = $data4['numb'];
				$bdata[]= $data1['numb'] + $data3['numb'];
			}
			$sql1 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.' ';
			$sql3 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.'  ';
			$sql4 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.'  ';
			}
		}	
	
// pour ann?e entre 2011 et +
		for($i=2; $i< $annee; $i++)
				{
				$sql1 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.'  ';
				$sql3 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.'  ';
				$sql4 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.'  ';
						for ($j=1; $j <= 9 ; $j++ ){
						$sql1 .=' MONTH(created_date) = "'.$j.'" AND urgency = "low" AND created_date >= "201'.$i.'-0'.$j.'-01" AND created_date <="201'.$i.'-0'.$j.'-31" AND category = "'.$valeur.'" AND impacted_account = "Production" AND type="incident"' ;
						$sql2 = 'SELECT nom as name from mois where id = "'.$j.'"';
						$sql3 .= ' urgency = "low" AND created_date <="201'.$i.'-0'.$j.'-01" AND (resolution_date >="201'.$i.'-0'.$j.'-31" OR resolution_date =" ") AND category = "'.$valeur.'" AND impacted_account = "Production" AND type="incident"' ;
						$sql4 .=' urgency = "low" AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31" AND category = "'.$valeur.'" AND impacted_account = "Production" AND type="incident"' ;
					$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
				$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				//echo $sql3. '<br>'; 
				while(($data1=mysql_fetch_assoc($req1))!== false){
				$data2=mysql_fetch_assoc($req2);
				$data3=mysql_fetch_assoc($req3);
				$data4=mysql_fetch_assoc($req4);
				$xdata[] = $data2['name'].' 1'.$i;
				$ydata[] = $data1['numb'];
				$zdata[] = $data3['numb'];
				$adata[] = $data4['numb'];
				$bdata[]= $data1['numb'] + $data3['numb'];
						}
						$sql1 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.' ';
						$sql3 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.'  ';
						$sql4 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.'  ';
						}		
					

						for ($j=10; $j <= 12 ; $j++ )
						{
						$sql1 .=' MONTH(created_date) = "'.$j.'" AND urgency = "low" AND created_date >= "201'.$i.'-'.$j.'-01" AND created_date <="201'.$i.'-'.$j.'-31" AND category = "'.$valeur.'" AND impacted_account = "Production" AND type="incident"' ;
						$sql3 .= ' urgency = "low" AND created_date <="201'.$i.'-'.$j.'-01" AND (resolution_date >="201'.$i.'-'.$j.'-31" OR resolution_date =" ") AND category = "'.$valeur.'" AND impacted_account = "Production" AND type="incident"' ;
						$sql4 .=' urgency = "low" AND resolution_date >="201'.$i.'-'.$j.'-01" AND resolution_date <="201'.$i.'-'.$j.'-31" AND category = "'.$valeur.'" AND impacted_account = "Production" AND type="incident"' ;
						$sql2 = 'SELECT nom as name from mois where id = "'.$j.'"';
						$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
				$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				//echo $sql3. '<br>'; 
				while(($data1=mysql_fetch_assoc($req1))!== false){
				$data2=mysql_fetch_assoc($req2);
				$data3=mysql_fetch_assoc($req3);
				$data4=mysql_fetch_assoc($req4);
				$xdata[] = $data2['name'].' 1'.$i;
				$ydata[] = $data1['numb'];
				$zdata[] = $data3['numb'];
				$adata[] = $data4['numb'];
				$bdata[]= $data1['numb'] + $data3['numb'];
						}
						$sql1 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.' ';
						$sql3 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.'  ';
						$sql4 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.'  ';
						}	
					
			}
			
// boucle ann?e en cours			

						
						$sql1 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.'  ';
						$sql3 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.'  ';
						$sql4 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.'  ';
							if ($mois <= 9 )
							{
								for ($j=1; $j <= $mois ; $j++ )
									{
									$sql1 .=' MONTH(created_date) = "'.$j.'" AND urgency = "low" AND created_date >= "201'.$i.'-0'.$j.'-01" AND created_date <="201'.$i.'-0'.$j.'-31" AND category = "'.$valeur.'" AND impacted_account = "Production" AND type="incident"' ;
									$sql2 = 'SELECT nom as name from mois where id = "'.$j.'"';
									$sql3 .= ' urgency = "low" AND created_date <="201'.$i.'-0'.$j.'-01" AND (resolution_date >="201'.$i.'-0'.$j.'-31" OR resolution_date =" ") AND category = "'.$valeur.'" AND impacted_account = "Production" AND type="incident"' ;
									$sql4 .=' urgency = "low" AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31" AND category = "'.$valeur.'" AND impacted_account = "Production" AND type="incident"' ;
									$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
				$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				//echo $sql3. '<br>'; 
				while(($data1=mysql_fetch_assoc($req1))!== false){
				$data2=mysql_fetch_assoc($req2);
				$data3=mysql_fetch_assoc($req3);
				$data4=mysql_fetch_assoc($req4);
				$xdata[] = $data2['name'].' 1'.$i;
				$ydata[] = $data1['numb'];
				$zdata[] = $data3['numb'];
				$adata[] = $data4['numb'];
				$bdata[]= $data1['numb'] + $data3['numb'];
									}
									$sql1 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.' ';
									$sql3 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.'  ';
									$sql4 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.'  ';
									}		
							}
							else 
							{			
								for ($j=1; $j <= 9 ; $j++ )
									{
									$sql1 .=' MONTH(created_date) = "'.$j.'" AND urgency = "low" AND created_date >= "201'.$i.'-0'.$j.'-01" AND created_date <="201'.$i.'-0'.$j.'-31" AND category = "'.$valeur.'" AND impacted_account = "Production" AND type="incident"' ;
									$sql2 = 'SELECT nom as name from mois where id = "'.$j.'"';
									$sql3 .= ' urgency = "low" AND created_date <="201'.$i.'-0'.$j.'-01" AND (resolution_date >="201'.$i.'-0'.$j.'-31" OR resolution_date =" ") AND category = "'.$valeur.'" AND impacted_account = "Production" AND type="incident"' ;
									$sql4 .=' urgency = "low" AND resolution_date >="201'.$i.'-0'.$j.'-01" AND resolution_date <="201'.$i.'-0'.$j.'-31" AND category = "'.$valeur.'" AND impacted_account = "Production" AND type="incident"' ;
									$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
				$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				echo $sql3. '<br>'; 
				while(($data1=mysql_fetch_assoc($req1))!== false){
				$data2=mysql_fetch_assoc($req2);
				$data3=mysql_fetch_assoc($req3);
				$data4=mysql_fetch_assoc($req4);
				$xdata[] = $data2['name'].' 1'.$i;
				$ydata[] = $data1['numb'];
				$zdata[] = $data3['numb'];
				$adata[] = $data4['numb'];
				$bdata[]= $data1['numb'] + $data3['numb'];
									}
									$sql1 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.' ';
									$sql3 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.'  ';
									$sql4 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.'  ';
									}	
								for ($j=10; $j <= $mois; $j++ )
									{
									$sql1 .=' MONTH(created_date) = "'.$j.'" AND urgency = "low" AND created_date >= "201'.$i.'-'.$j.'-01" AND created_date <="201'.$i.'-'.$j.'-31" AND category = "'.$valeur.'" AND impacted_account = "Production" AND type="incident"' ;
									$sql2 = 'SELECT nom as name from mois where id = "'.$j.'"';
									$sql3 .= ' urgency = "low" AND created_date <="201'.$i.'-'.$j.'-01" AND (resolution_date >="201'.$i.'-'.$j.'-31" OR resolution_date =" ") AND category = "'.$valeur.'" AND impacted_account = "Production" AND type="incident"' ;
									$sql4 .=' urgency = "low" AND resolution_date >="201'.$i.'-'.$j.'-01" AND resolution_date <="201'.$i.'-'.$j.'-31" AND category = "'.$valeur.'" AND impacted_account = "Production" AND type="incident"' ;
									$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
				$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
				//echo $sql3. '<br>'; 
				while(($data1=mysql_fetch_assoc($req1))!== false){
				$data2=mysql_fetch_assoc($req2);
				$data3=mysql_fetch_assoc($req3);
				$data4=mysql_fetch_assoc($req4);
				$xdata[] = $data2['name'].' 1'.$i;
				$ydata[] = $data1['numb'];
				$zdata[] = $data3['numb'];
				$adata[] = $data4['numb'];
				$bdata[]= $data1['numb'] + $data3['numb'];
									}
									$sql1 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.' ';
									$sql3 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.'  ';
									$sql4 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE  '.$resp2.'  ';
									}	
							}
						

//echo $data1["numb"];
//echo $data2["numb"];
//echo $data3["numb"];
// on ferme la connexion ? mysql 
mysql_close(); 	


// content="text/plain; charset=utf-8" 
			require_once ('jpgraph/src/jpgraph.php'); 
			require_once ('jpgraph/src/jpgraph_line.php'); 

			$graph = new Graph(700,400,"auto");
			$graph->SetScale("textlin");
			$graph->img->SetMargin(60,40,0,70);
			$graph->xaxis->SetFont(FF_FONT1);
			$graph->xaxis->SetLabelAngle(90);
			$graph->xaxis->SetTickLabels($xdata);
			$graph->title->SetMargin(3);
			$graph->title->SetFont(FF_ARIAL,FS_NORMAL,13);
			$graph->title->Set($valeur." LOW INCS EVOLUTION IN PRODUCTION");
			$graph->legend->Pos(0.05,0.95,"right","center"); 


						// Create the first line
			$p1 = new LinePlot($zdata);
			$p1->SetColor("black");
			$p1->SetCenter();
			$p1->SetLegend("Open");
			$graph->Add($p1);

			// ... and the second
			$p2 = new LinePlot($ydata);
			//$p2->mark->SetType(MARK_STAR);
			$p2->mark->SetFillColor("red");
			$p2->mark->SetColor("red");
			$p2->mark->SetType(MARK_UTRIANGLE);
			$p2->mark->SetWidth(4);
			$p2->SetColor("red");
			//$p2->SetStyle('dashed');
			$p2->SetCenter();
			$p2->SetWeight(3);
			$p2->SetLegend("New");
			$graph->Add($p2);

			// ... and the third
			$p3 = new LinePlot($adata);
			$p3->mark->SetType(MARK_FILLEDCIRCLE);
			$p3->mark->SetFillColor("green");
			$p3->mark->SetColor("green");
			$p3->mark->SetWidth(3);
			
			$p3->SetCenter();
			$p3->SetLegend("Resolved");
			$graph->Add($p3);			

			
			$p1->SetWeight(10);
			$p1->SetColor("#0000CC");
			$p2->SetWeight(10);
			$p2->SetColor("red");
			$p3->SetWeight(10);
			$p3->SetColor("green");
			$graph->Stroke();
?>