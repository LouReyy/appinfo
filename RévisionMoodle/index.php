<!DOCTYPE html>
<html>
<head>
<title>Formulaire admission</title>
<link rel="stylesheet" type="text/css" href="style1.css">
<script src="traitement.js"></script>
</head>
<body>
	<form method="POST" action="traitement.php">
		<label>Nom</label>
		<input type="text" name="nom" value="<?php if(isset($_COOKIE['nom'])){ echo $_COOKIE['nom'];}?>">
		<div class="erreur">
			<?php 
			if (isset($erreur_nom)){
				echo $erreur_nom;
				echo ("<br><br>");
			}
			?>
		</div>

		<label>Prénom</label>
		<input type="text" name="prenom" value="<?php if(isset($_COOKIE['prenom'])){ echo $_COOKIE['prenom'];}?>">
		<div class="erreur">
			<?php 
			if (isset($erreur_prenom)){
				echo $erreur_prenom;
				echo ("<br><br>");
			}
			?>
		</div>
		
		<label>Date de naissance</label>
		<input type="date" id="date" name="dateNaissance" value="<?php if(isset($_COOKIE['date'])){ echo $_COOKIE['date'];}?>">
		<div class="erreur">
			<?php 
			if (isset($erreur_date)){
				echo $erreur_date;
				echo ("<br><br>");
			}
			?>
		</div>
		

		<label>e-mail</label>
		<input id="email1" type="text" name="email" value="<?php if(isset($_COOKIE['email'])){ echo $_COOKIE['email'];}?>">
		<div class="erreur">
			<?php 
			if (isset($erreur_mail)){
				echo $erreur_mail;
				echo ("<br><br>");
			}
			?>
		</div>
		

		<label>Confirmez email</label>
		<input id="email2" type="text" name="emailConfirmation" value="<?php if(isset($_COOKIE['emailConfirmation'])){ echo $_COOKIE['emailConfirmation'];}?>">
		<div class="erreur">
			<?php 
			if (isset($erreur_mail2)){
				echo $erreur_mail2;
				echo ("<br><br>");
			}
			?>
		</div>

		<input id="btn" type="submit" value="Soumettez votre candidature">
	</form>
</body>
<script src="script.js"></script>
</html>
