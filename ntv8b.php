<?php
include('connect.php'); 

//echo $_POST['valeur'];
//echo '<br><br>';
//echo $_POST['date'];
//echo '<br><br>';
$date1 = $_GET['date1'];
$valeur = $_GET['valeur'];
$date_explosee = explode("-", $date1);
$date_explosee2 = explode("-", date("y-m-d"));


$mois = $date_explosee[1];
$annee = substr($date_explosee[0],-1);

$mois2 = $date_explosee2[1];
$annee2 = substr($date_explosee2[0],-1);
//echo $annee;

//pour 2012
for($i=1; $i< 2; $i++)
				{
		$sql1 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE ';
			for ($j=8; $j <= 9 ; $j++ )
				{
				$sql1 .=' MONTH(created_date) = "'.$j.'" AND urgency = "low" AND created_date >= "2011-0'.$j.'-01" AND created_date <="2011-0'.$j.'-31" ' ;
				$sql2 = 'SELECT nom as name from mois where id = "'.$j.'"';
				$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
				//echo $sql2. '<br>'; 
				while(($data1=mysql_fetch_assoc($req1))!== false){
				$data2=mysql_fetch_assoc($req2);
				$xdata[] = $data2['name'].' 1'.$i;
				$ydata[] = $data1['numb'];
				}
				$sql1 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE';
				}
			for ($j=10; $j <= 12 ; $j++ )
			{
			$sql1 .=' MONTH(created_date) = "'.$j.'" AND urgency = "low" AND created_date >= "2011-'.$j.'-01" AND created_date <="2011-'.$j.'-31" ' ;
			$sql2 = 'SELECT nom as name from mois where id = "'.$j.'"';
			$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
			$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
			//echo $sql2. '<br>'; 
			while(($data1=mysql_fetch_assoc($req1))!== false){
			$data2=mysql_fetch_assoc($req2);
			$xdata[] = $data2['name'].' 1'.$i;
			$ydata[] = $data1['numb'];
			}
			$sql1 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE';
			}
		}	
	
// pour année entre 2011 et +
		for($i=2; $i< $annee; $i++)
				{
				$sql1 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE ';
						for ($j=1; $j <= 9 ; $j++ ){
						$sql1 .=' MONTH(created_date) = "'.$j.'" AND urgency = "low" AND created_date >= "201'.$i.'-0'.$j.'-01" AND created_date <="201'.$i.'-0'.$j.'-31" ' ;
						$sql2 = 'SELECT nom as name from mois where id = "'.$j.'"';
						$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
						$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
						//echo $sql2. '<br>'; 
						while(($data1=mysql_fetch_assoc($req1))!== false){
						$data2=mysql_fetch_assoc($req2);
						$xdata[] = $data2['name'].' 1'.$i;
						$ydata[] = $data1['numb'];
						}
						$sql1 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE';
						}		
					

						for ($j=10; $j <= 12 ; $j++ )
						{
						$sql1 .=' MONTH(created_date) = "'.$j.'" AND urgency = "low" AND created_date >= "201'.$i.'-'.$j.'-01" AND created_date <="201'.$i.'-'.$j.'-31" ' ;
						$sql2 = 'SELECT nom as name from mois where id = "'.$j.'"';
						$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
						$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
						//echo $sql2. '<br>'; 
						while(($data1=mysql_fetch_assoc($req1))!== false){
						$data2=mysql_fetch_assoc($req2);
						$xdata[] = $data2['name'].' 1'.$i;
						$ydata[] = $data1['numb'];
						}
						$sql1 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE';
						}	
					
			}
			
// boucle année en cours			

						
						$sql1 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE ';
							if ($mois <= 9 )
							{
								for ($j=1; $j <= $mois ; $j++ )
									{
									$sql1 .=' MONTH(created_date) = "'.$j.'" AND urgency = "low" AND created_date >= "201'.$i.'-0'.$j.'-01" AND created_date <="201'.$i.'-0'.$j.'-31" ' ;
									$sql2 = 'SELECT nom as name from mois where id = "'.$j.'"';
									$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
									$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
									//echo $sql2. '<br>'; 
									while(($data1=mysql_fetch_assoc($req1))!== false){
									$data2=mysql_fetch_assoc($req2);
									$xdata[] = $data2['name'].' 1'.$i;
									$ydata[] = $data1['numb'];
									}
									$sql1 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE';
									}		
							}
							else 
							{			
								for ($j=1; $j <= 9 ; $j++ )
									{
									$sql1 .=' MONTH(created_date) = "'.$j.'" AND urgency = "low" AND created_date >= "201'.$i.'-0'.$j.'-01" AND created_date <="201'.$i.'-0'.$j.'-31" ' ;
									$sql2 = 'SELECT nom as name from mois where id = "'.$j.'"';
									$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
									$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
									//echo $sql2. '<br>'; 
									while(($data1=mysql_fetch_assoc($req1))!== false){
									$data2=mysql_fetch_assoc($req2);
									$xdata[] = $data2['name'].' 1'.$i;
									$ydata[] = $data1['numb'];
									}
									$sql1 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE';
									}	
								for ($j=10; $j <= $mois; $j++ )
									{
									$sql1 .=' MONTH(created_date) = "'.$j.'" AND urgency = "low" AND created_date >= "201'.$i.'-'.$j.'-01" AND created_date <="201'.$i.'-'.$j.'-31" ' ;
									$sql2 = 'SELECT nom as name from mois where id = "'.$j.'"';
									$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 
									$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
									//echo $sql2. '<br>'; 
									while(($data1=mysql_fetch_assoc($req1))!== false){
									$data2=mysql_fetch_assoc($req2);
									$xdata[] = $data2['name'].' 1'.$i;
									$ydata[] = $data1['numb'];
									}
									$sql1 = 'SELECT  month(created_date) as periode, count(tracking_id) as numb from data WHERE';
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

			$graph = new Graph(800,300,"auto");
			$graph->SetScale("textlin");
			$graph->img->SetMargin(60,40,0,70);
			$graph->xaxis->SetFont(FF_FONT1);
			$graph->xaxis->SetLabelAngle(90);
			$graph->xaxis->SetTickLabels($xdata);
			$graph->title->Set("HUHU");

			$lineplot=new LinePlot($ydata);
			$lineplot->SetColor("red");

			//$lineplot->SetLegend($valeur);
			$graph->Add($lineplot);

			$graph->Stroke();
?>