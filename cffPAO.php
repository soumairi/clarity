<html>
	  <head>
		<title>IS.OS Utilities - DASHBOARD CLARITY</title>
		<link rel="stylesheet" type="text/css" href="../style.css" />
	  </head>

	  <body>
	  <div id="container">
		<center>
		<br>
		
		<table width=1000 class=sample2>
		<tr>
			<td class=tdmeny2 colspan=5><img src="img/logo.jpg" width=1000></td>
		</tr>
		<tr>
			<td class=tdmenu2><a href="../index.php" class="menu2"> ACCUEIL</a></td>
			<td class=tdmenu2><a href="../monitoring/index.php"class="menu2">MONITORING OSMOS </a></td>
			<td class=tdmenu2><a href="../clarity/index.php" class="menu2"> DASHBOARD</a></td>
			<td class=tdmenu2><a href="../support.php" class="menu2">SUPPORT</a></td>
			<td class=tdmenu2><a href="../admin.php"class="menu2">ADMIN</a></td>
			
		</tr>
	</table>
		<h1>DASHBOARD CFF PAO&nbsp;&nbsp; <img src="img/picto1.jpg" align=bottom border=0></h1><br><br>
		
		<FORM Method="GET" Action="cffPAOsource.php">

				
			
			<?php $date3 = strftime("%Y-%m-%d", mktime(0, 0, 0, date('m'), date('d')-1, date('y'))); ?>
			
				A partir de quelle date : <SELECT name="mois" size="1">
										<OPTION value="01">Janvier</option>
										<OPTION value="02">F&eacutevrier</option>
										<OPTION value="03">Mars</option>
										<OPTION value="04">Avril</option>
										<OPTION value="05">Mai</option>
										<OPTION value="06">Juin</option>
										<OPTION value="07">Juillet</option>
										<OPTION value="08">Aout</option>
										<OPTION value="09">Septembre</option>
										<OPTION value="10">Octobre</option>
										<OPTION value="11">Novembre</option>
										<OPTION value="12">D&eacutecembre</option>
									</SELECT>
									<SELECT name="annee" size="1">
										<OPTION value="19">2019</option>
										<OPTION value="20">2020</option>
										<OPTION value="21">2021</option>
										<OPTION value="22">2022</option>
										<OPTION value="23">2023</option>
										<OPTION value="24">2024</option>
										<OPTION value="25">2025</option>
										<OPTION value="26">2026</option>
										<OPTION value="27">2027</option>
										<OPTION value="28">2028</option>
										<OPTION value="29">2029</option>
										<OPTION value="30">2030</option>
									</SELECT>
									<br><br>
		Nombre de mois à visualiser: <SELECT name="nbre" size="1">
										
										<OPTION value="3">3</option>
										<OPTION value="4">4</option>
										<OPTION value="5">5</option>
										<OPTION value="6">6</option>
										<OPTION value="7">7</option>
										<OPTION value="8">8</option>
										<OPTION value="9">9</option>
										<OPTION value="10">10</option>
										<OPTION value="11">11</option>
										<OPTION value="12">12</option>
									</SELECT><br><br>
		Responsabilit&eacute côt&eacute RS: OUI<input type="radio" name="site" value="1"> NON <input type="radio" name="site" value="0"> <br><br>
		<INPUT type=submit value=Envoyer>
		<INPUT type=hidden name=afficher value=ok>
		</FORM>
		<a href="index.php">Retour Accueil</a></br></br>
		</center>
		<br><br>
		<div id="content"></div>
			</div>
				<div id="footer">DDSIV &copy; 2019</div>
	  </body>
</html>
