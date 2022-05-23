
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
    <link rel="stylesheet" href="PageGestionnaire.css" media="screen" type="text/css" />
</head>
<body>
    <div class="container">
        <header>
            <div id ="logoimg">
                <a  href="/appinfo/homepage/homepage.php"><img src="/appinfo/auth/img/logo_infinite.png" alt="logo"></a>
            </div>  
            <nav>
                <ul class="nav__links">
                    <li><a href="/appinfo/homepage/homepage.php">Accueil</a></li>
                    <li><a href="/appinfo/<?php echo $chantier ?>" >Votre chantier</a></li>
                    <li><a href="/appinfo/forum/forum.php">Forum</a></li>
                    <li><a href="/appinfo/faq/faq.php">FAQ</a></li>
                    <li><a href="/appinfo/contact/contact_essai.php">Contactez-nous</a></li>
                    <li><a href="/appinfo/notre_solution/notre_solution.php">Notre solution</a></li>

                </ul>
            </nav>
            <div id="logomemo">
                <a href="/appinfo/memory/memory.php"><img src="../memory/memoryim.png" alt="memory"></a>
            </div>
            <a class="cta" href= "/appinfo/auth/<?php  echo $editprofil?> "> <?php echo $title ?></a>
            <?php
            if(isset($_SESSION['type']) && ($_SESSION['type']) == "Administrateur"){      
            ?>
                <a class="cta" href= "/appinfo/admin/admin.php">Admin</a>
            <?php }?>
        </header>
        <div class="title">
            <h3>Bienvenue dans la page du gestionnaire</h3>
            <div class="barre"></div>
        </div>
        <div class="links">
            <div class="allLinks">
                <?php
                for ($i=0;$i<count($allPesudo);$i++){
                    $id=$allId[$i];
                    $pseudo=$allPesudo[$i];
                    if ($i==0){
                        echo "<div class='local'><a href='http://localhost/appinfo/Chantier/GestionGestionnaire.php?id=$id&pseudo=$pseudo'>Pseudo : $pseudo</a></div>";  
                    }
                    else{
                        echo "<div class='local other'><a href='http://localhost/appinfo/Chantier/GestionGestionnaire.php?id=$id&pseudo=$pseudo'>Pseudo : $pseudo</a></div>";
                    }
                }
                ?>
            </div>
            
        </div>
    </div>
</body>
</html>