
<?php

if(isset($_SESSION['user'])){
    $editprofil ="views/landing.php";
    $title = "Profil";
    }
    else{
        $editprofil ="index.php";
        $title = "Connexion";

    }

    if(isset($_SESSION['type'])){
        $chantier = "Chantier/PageChantier.php";
    }
    else{
        $chantier = "VotreChantier/votrechantier.php";
    }


$conn=mysqli_connect('localhost','root','','appinfo');
if (!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}
//La connexion fonctionne

//Maintenant essayons d'avoir accès à tous les membres du chantier du gestionnaire grâce à une requête
//Pour ça il faut récupérer l'id Chantier de la table utilisateurs2 fixons le à 1 car on y arrive pas


$id_chantier=1;   //VARIABLE A MODIFIER APRES POUR S ADAPTER AUX DIFFERENTS GESTIONNAIRES

$req_util='SELECT pseudo,id FROM `utilisateurs2` WHERE id_chantier=1;';
$result=mysqli_query($conn,$req_util);
$utilId=mysqli_fetch_all($result, MYSQLI_ASSOC);
function getArray($base,$attribute){
    $table=array();
    for($i=0;$i<count($base);$i++){
        $table[$i]=$base[$i][$attribute];
    }
    return $table;
}
$allPesudo=getArray($utilId,'pseudo');
$allId=getArray($utilId,'id');
$size=count($allId);
//On a maintenant nos deux listes contenant les pseudos et les id.
//Il faut ensuite les afficher de manière à ce que quand on clique dessus on accède au données de celui-ci

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a>Bienvenue dans la page du gestionnaire</a><br>
    <script>
        var pseudo = <?php echo json_encode($allPesudo);?>;
        var id = <?php echo json_encode($allId);?>;
        for (i=0;i<id.length;i++){
            console.log(id[i]);
            document.write(id[i]+"<br>");
        }
    </script>


    
</body>
</html>