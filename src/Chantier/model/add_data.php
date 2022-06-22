<?php

require_once 'config.php'; 

$sql = "DELETE FROM capteur_table WHERE type = 'cardiaque' OR  type = 'temp' OR  type = 'hum' OR  type = 'sonore' ";
$sth = $bdd->prepare($sql);
$sth->execute();

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
for ($i=$j-20;$i<$j;$i++){
    $line=substr($data,33*$i,33);
    $Lines[$i]=$line;
}
//print_r($Lines);Ok ça marche




for ($i=$j-20;$i<$j;$i++){
    $val[$i]=substr($Lines[$i],9,4);
    $time[$i]=substr($Lines[$i],19,14);
    $type[$i] =substr($Lines[$i],6,1);

    


    if($type[$i] ==1){
        $type2 = "sonore";
    }
    
    elseif($type[$i] ==2){
        $type2 = "temp";

        $a =substr($val[$i], 0, 2);
        $b = substr($val[$i], 2, 4);
    
        $val[$i] = $a ."." . $b;
    }
    elseif($type[$i] ==3){
        $type2 = "hum";

    $a =substr($val[$i], 0, 2);
    $b = substr($val[$i], 2, 4);

    $val[$i] = $a ."." . $b;

    }
    elseif($type[$i] ==4){
        $type2 = "cardiaque";
    }
    else{
        $type2 ="nada";
    }

    $val2 =$val[$i];




    $date = $time[$i];  
    $sec = strtotime($date);  
    $newdate = date ("Y-m-d H:i", $sec);  
    $newdate = $newdate . ":00"; 


        //On insère dans la base de donnée

        $req= $bdd->prepare('INSERT INTO `capteur_table`(`time`, `valeur`, `type`, `id_utilisateur`) VALUES (:time, :valeur, :type, :id_utilisateur)');
        $req->execute(array(
            'time' => $newdate,
            'valeur' => $val2,
            'type'=> $type2,
            'id_utilisateur' => 80
        
        ));//Ici mettre la bonne requête 
        //La connexion fonctionne
}


header('Location: ../PageChantier.php');die();

?>