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

$tempTable=getTable($values_temp,'temperature');//table température
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.anychart.com/releases/8.10.0/js/anychart-base.min.js"></script>
</head>
<body>
    <div class="graph">
    <script src="data2.js"></script>
    </div>
    
</body>
</html>