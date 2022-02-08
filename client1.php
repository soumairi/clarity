<html>
	  <head>
		<title>Dashboard Clarity</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	  </head>

	  <body>
		<center>
		<img src="img/logo.jpg" width=150>
		<h1>Dashboard Client</h1><br><br>
		Choississez le client à visualiser: 
		<FORM Method="GET" Action="client.php">
			<select name=valeur>
				<option>NTV - YMS</option>
				<option>NTV - NSK</option>
				<option>CFF - WDI</option>
				<option>EEIG - NSK</option>
			</select>
				
			<?php $date2 = strftime("%Y-%m-%d", mktime(0, 0, 0, date('m'), date('d')-1, date('y'))); ?>
		<br><br>
		A partir de quelle date (AAAA-MM-JJ): <input type=texte value="<?php echo $date2; ?>" name=date1 size=9> <br><br>
		<INPUT type=submit value=Envoyer>
		<INPUT type=hidden name=afficher value=ok>
		</FORM>
		<a href="index.php">Retour Accueil</a></br></br>
		</center>
		
	  </body>
</html>
