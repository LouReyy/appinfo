<?php
$conn=mysqli_connect('localhost','root','','appinfo');
if (!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}
//La connexion fonctionne
$req_temp='SELECT DISTINCT Time,Valeur FROM `capteur_table` WHERE id_utilisateur=1 AND type="temp"ORDER BY Time DESC LIMIT 20;';
$result=mysqli_query($conn,$req_temp);
$values_temp=mysqli_fetch_all($result, MYSQLI_ASSOC);

$req_card='SELECT DISTINCT Time,Valeur FROM capteur_table WHERE id_utilisateur=1 AND type="cardiaque" ORDER BY Time DESC LIMIT 20;';
$resultCard=mysqli_query($conn,$req_card);
$values_card=mysqli_fetch_all($resultCard, MYSQLI_ASSOC);

$req_son='SELECT DISTINCT Time,Valeur FROM `capteur_table`WHERE type="sonore" AND id_utilisateur=1 ORDER BY Time DESC LIMIT 20;';
$resultSon=mysqli_query($conn,$req_son);
$values_son=mysqli_fetch_all($resultSon, MYSQLI_ASSOC);

$req_CO2='SELECT DISTINCT Time,Valeur FROM `capteur_table`WHERE type="CO2" AND id_utilisateur=1 ORDER BY Time DESC LIMIT 20;';
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





?>