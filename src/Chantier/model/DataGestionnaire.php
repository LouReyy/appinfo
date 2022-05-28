

<?php

if(isset($_GET['id'])){
    $id=$_GET['id'];
}
if(isset($_GET['pseudo'])){
    $pseudo=$_GET['pseudo'];
}
$type="Autre";





if ($type=="Gestionnaire"){
    header('Location: ./model/PageGestionnaire.php');die;
 }



 session_start(); 
 require_once 'config.php'; 
 
 if(isset($_SESSION['user'])){
     $editprofil ="/auth/views/landing.php";
     $title = "Profil";
     }
     else{
         $editprofil ="/auth/index.php";
         $title = "Connexion";
 
     }

    if(isset($_SESSION['type'])){
        $chantier = "Chantier/PageChantier.php";
    }
    else{
        $chantier = "VotreChantier/votrechantier.php";
    }


    $conn=mysqli_connect('herogu.garageisep.com','haXoGjsQhU_appinfofin','mJMzoauEGw0U53S0','P2i6H04k07_appinfofin');
    if (!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}
//La connexion fonctionne
$req_temp='SELECT DISTINCT Time,Valeur FROM `capteur_table` WHERE id_utilisateur="'.$id.'" AND type="temp"ORDER BY Time DESC LIMIT 20;';
$result=mysqli_query($conn,$req_temp);
$values_temp=mysqli_fetch_all($result, MYSQLI_ASSOC);

$req_card='SELECT DISTINCT Time,Valeur FROM capteur_table WHERE id_utilisateur="'.$id.'" AND type="cardiaque" ORDER BY Time DESC LIMIT 20;';
$resultCard=mysqli_query($conn,$req_card);
$values_card=mysqli_fetch_all($resultCard, MYSQLI_ASSOC);

$req_son='SELECT DISTINCT Time,Valeur FROM `capteur_table`WHERE type="sonore" AND id_utilisateur="'.$id.'" ORDER BY Time DESC LIMIT 20;';
$resultSon=mysqli_query($conn,$req_son);
$values_son=mysqli_fetch_all($resultSon, MYSQLI_ASSOC);

$req_CO2='SELECT DISTINCT Time,Valeur FROM `capteur_table`WHERE type="CO2" AND id_utilisateur="'.$id.'" ORDER BY Time DESC LIMIT 20;';
$resultCO2=mysqli_query($conn,$req_CO2);
$values_CO2=mysqli_fetch_all($resultCO2, MYSQLI_ASSOC);

function tableX($table){
    $newTable= array();
    for ($i=0;$i<count($table);$i++){
        $newTable[$i]=$table[$i]['Time'];
    }
    return $newTable;
}
function tableY($table){
    $newTable= array();
    for ($i=0;$i<count($table);$i++){
        $newTable[$i]=floatval($table[$i]['Valeur']);
    }
    return $newTable;
}

$Xtemp=tableX($values_temp); $Ytemp=tableY($values_temp);
$Xtemp=array_reverse($Xtemp); $Ytemp=array_reverse($Ytemp);

$Xcard=tableX($values_card); $Ycard=tableY($values_card);
$Xcard=array_reverse($Xcard); $Ycard=array_reverse($Ycard);


$Xson=tableX($values_son); $Yson=tableY($values_son);
$Xson=array_reverse($Xson); $Yson=array_reverse($Yson); 

$XCO2=tableX($values_CO2); $YCO2=tableY($values_CO2);
$XCO2=array_reverse($XCO2); $YCO2=array_reverse($YCO2);


//Récupère la dernière valeur :
$req_lastCard='SELECT Valeur FROM `capteur_table` WHERE type="cardiaque" AND Time=(SELECT MAX(Time) FROM `capteur_table` WHERE type="cardiaque" AND id_utilisateur="'.$id.'");';
$resultLastCard=mysqli_query($conn,$req_lastCard);
$values_lastCard=mysqli_fetch_all($resultLastCard, MYSQLI_ASSOC);

$req_lastSon='SELECT Valeur FROM `capteur_table` WHERE type="sonore" AND Time=(SELECT MAX(Time) FROM `capteur_table` WHERE type="sonore" AND id_utilisateur="'.$id.'");';
$resultLastSon=mysqli_query($conn,$req_lastSon);
$values_lastSon=mysqli_fetch_all($resultLastSon, MYSQLI_ASSOC);

$req_lastTemp='SELECT Valeur FROM `capteur_table` WHERE type="temp" AND Time=(SELECT MAX(Time) FROM `capteur_table` WHERE type="temp" AND id_utilisateur="'.$id.'");';
$resultLastTemp=mysqli_query($conn,$req_lastTemp);
$values_lastTemp=mysqli_fetch_all($resultLastTemp, MYSQLI_ASSOC);

$req_lastCO2='SELECT Valeur FROM `capteur_table` WHERE type="CO2" AND Time=(SELECT MAX(Time) FROM `capteur_table` WHERE type="CO2" AND id_utilisateur="'.$id.'");';
$resultLastCO2=mysqli_query($conn,$req_lastCO2);
$values_lastCO2=mysqli_fetch_all($resultLastCO2, MYSQLI_ASSOC);

function getLast($table){
    return $table[0]['Valeur'];
}
$lastCard=getLast($values_lastCard);
$lastSon=getLast($values_lastSon);
$lastTemp=getLast($values_lastTemp);
$lastCO2=getLast($values_lastCO2);

?>
