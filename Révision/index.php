<?php
session_start();


?>
<!DOCTYPE html>
<html>
 <head>
	<title>Formulaire admission</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<script src="traitement.js"></script>
 </head>
 <body>
  <form method="POST" action="traitement.php"><!--traitement.php s'occupe de la balise form -->
	<label>Nom</label> 
	<input id = "nom" type="text" name="nom" value="<?php if(isset($_COOKIE['nom'])){ echo $_COOKIE['nom'];}?>"> 
	<div class="error">
		<?php
		if(isset($_SESSION['nom'])){
		echo $_SESSION['nom'];}
		?>
	
    </div>

	<label>Prénom</label>
	<input id ="prenom" type="text" name="prenom"value="<?php if(isset($_COOKIE['prenom'])){ echo $_COOKIE['prenom'];}?>"> 
	<div class="error">
		<?php
		if(isset($_SESSION['prenom'])){
		echo $_SESSION['prenom'];}
		?>
	</div>
	<label>Date de naissance</label>
	<input type="date"  id="date" name="dateNaissance" value="<?php if(isset($_COOKIE['dateNaissance'])){ echo $_COOKIE['dateNaissance'];}?>"> 
	<div class="error">
		<?php
		if(isset($_SESSION['dateNaissance'])){
		echo $_SESSION['dateNaissance'];}
		?>
	</div>
	</div>
	<label>e-mail</label>
	<input id="email1" type="text" name="email" value="<?php if(isset($_COOKIE['email'])){ echo $_COOKIE['email'];}?>"> 
	<div class="error">
		<?php
		if(isset($_SESSION['email'])){
		echo $_SESSION['email'];}
		?>
	</div>
	<label>Confirmez email</label>
	<input id="email2" type="text" name="emailConfirmation" value="<?php if(isset($_COOKIE['emailConfirmation'])){ echo $_COOKIE['emailConfirmation'];}?>"> 
	<div class="error">
		<?php
		if(isset($_SESSION['emailConfirmation'])){
		echo $_SESSION['emailConfirmation'];}
		?>
	</div>
	<input id="soumettre" type="submit" value="Soumettez votre candidature">
	<?php session_destroy();?>
  </form>
 </body>
 <script src="script.js"></script>
</html>