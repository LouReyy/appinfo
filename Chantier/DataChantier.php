<?php
$conn=mysqli_connect('localhost','root','','appinfo');
if (!$conn){
    echo 'Connection error: ' . mysqli_connect_error();

}
//La connexion fonctionne
$req_temp='SELECT Time,Valeur FROM `capteur_table` WHERE id_utilisateur=1 AND type="temp";';
$result=mysqli_query($conn,$req_temp);
$values_temp=mysqli_fetch_all($result, MYSQLI_ASSOC);

function getTable($table,$type){  //fonction pour créer un tableau qu'on va utiliser pour afficher la courbe
    $newTable= array(array('Time',$type));
    for ($i=1;$i<count($table);$i++){
        $newTable[$i]=array($table[$i]['Time'], floatval($table[$i]['Valeur']));
    }
    return $newTable;
}
function tableX($table){
    $newTable= array();
    for ($i=1;$i<count($table);$i++){
        $newTable[$i-1]=$table[$i]['Time'];
    }
    return $newTable;
}
function tableY($table){
    $newTable= array();
    for ($i=1;$i<count($table);$i++){
        $newTable[$i-1]=floatval($table[$i]['Valeur']);
    }
    return $newTable;
}

$tempTable=getTable($values_temp,'temperature');$Xtemp=tableX($values_temp); $Ytemp=tableY($values_temp);
?>