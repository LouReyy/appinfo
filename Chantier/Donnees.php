<?php
$connexion=new mysqli('localhost','root','','appinfo');
if ($connexion->connect_error){
    die("probleme");
}
$requete='SELECT Valeur FROM `capteur_values` WHERE id_utilisateur=1 AND type="temp";'

?>