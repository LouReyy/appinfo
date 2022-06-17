<?php

require_once 'config.php'; 



//connexion à la base de donée
$conn=mysqli_connect('herogu.garageisep.com','Pfr8GD5QBt_appg9c','zOp7YYeC5X9UUWwd','63gzSZSkw3_appg9c');
if (!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}


$data = file_get_contents("http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=G9-C");//Ceci donne un string


$n=strlen($data);
$j=intdiv($n,33);

$val=array();
$time=array();


//$fLine=substr($data,0,33);
//echo($fLine);fonctionne 
//essayons de récupérer la première ligne par exemple
//Maintenant récupérons toutes les lignes de la variable data
$Lines=array();
for ($i=2000;$i<10000;$i++){
    $line=substr($data,33*$i,33);
    $Lines[$i]=$line;
}
//print_r($Lines);Ok ça marche


echo(count($Lines));


for ($i=2000;$i<10000;$i++){
    $val[$i]=substr($Lines[$i],9,4);
    $time[$i]=substr($Lines[$i],19,14);
    $type[$i] =substr($Lines[$i],6,1);

    $val2 =$val[$i];
    if($type[$i] ==1){
        $type2 = "sonore";
    }
    
    elseif($type[$i] ==2){
        $type2 = "temp";
    }
    elseif($type[$i] ==3){
        $type2 = "hum";
    }
    elseif($type[$i] ==4){
        $type2 = "cardiaque";
    }

    $date = $time[$i];  
    $sec = strtotime($date);  
    $newdate = date ("Y-m-d H:i", $sec);  
    $newdate = $newdate . ":00"; 

        //On insère dans la base de donnée

        $req= $bdd->prepare('INSERT INTO `capteur_table`(`time`, `valeur`, `type`, `id_utilisateur`, `id_chantier`) VALUES (:time, :valeur, :type, :id_utilisateur, :id_chantier)');
        $req->execute(array(
            'time' => $newdate,
            'valeur' => $val2,
            'type'=> $type2,
            'id_utilisateur' => 80,
            'id_chantier' => 199
        
        ));//Ici mettre la bonne requête 
        //La connexion fonctionne
}

header('location : ../PageChantier.php');







?>