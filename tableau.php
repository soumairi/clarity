<html>
	  <head>
		<title>Dashboard Clarity</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	  </head>

	  <body>
		<center>
		<img src="img/logo.jpg" width=150>
		<h1>Tableau des INCS Hebdomadaire</h1><br><br>
		
		<FORM Method="GET" Action="tableau1.php">

				
			
			<?php $date3 = strftime("%Y-%m-%d", mktime(0, 0, 0, date('m'), date('d')-1, date('y'))); ?>
			
		A partir de quelle date (AAAA-MM-JJ): <input type=texte value="2012-04-15" name=date1 size=9> <br><br>
		Jusqu'à quelle date (AAAA-MM-JJ): <input type=texte value="<?php echo $date3; ?>" name=date2 size=9> <br><br>
		
		<INPUT type=submit value=Envoyer>
		<INPUT type=hidden name=afficher value=ok>
		</FORM>
		<a href="index.php">Retour Accueil</a></br></br>
		</center>
		
	  </body>
</html>
