<?php
//$connexion=new mysqli('localhost','root','','appinfo');
//if ($connexion->connect_error){
    //die("probleme");
//}
//echo ("connexion reussie");
$conn=mysqli_connect('localhost','root','','appinfo');
if (!$conn){
    echo 'Connection error: ' . mysqli_connect_error();

}
//La connexion fonctionne
$result=mysqli_query($conn,'SELECT `Valeur` FROM `capteur_values` WHERE `id_utilisateur`=1 AND `type`="temp"');
$values=mysqli_fetch_all($result, MYSQLI_ASSOC);
print_r($values);







?>