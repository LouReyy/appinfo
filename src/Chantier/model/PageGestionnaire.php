
<?php

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

    
        $chantier = "Chantier/PageChantier.php";



    $conn=mysqli_connect('herogu.garageisep.com','haXoGjsQhU_appinfofin','mJMzoauEGw0U53S0','P2i6H04k07_appinfofin');
    if (!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}
//La connexion fonctionne

//Maintenant essayons d'avoir accès à tous les membres du chantier du gestionnaire grâce à une requête
//Pour ça il faut récupérer l'id Chantier de la table utilisateurs2 fixons le à 1 car on y arrive pas


$id_chantier=$_SESSION['id_chantier'];   //VARIABLE A MODIFIER APRES POUR S ADAPTER AUX DIFFERENTS GESTIONNAIRES

$req_util='SELECT pseudo,id FROM `utilisateurs` WHERE id_chantier=1;';
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
    <title>Chantier Gestionnaire</title>
    <link rel="stylesheet" href="../css/PageGestionnaire.css" media="screen" type="text/css" />
    <link rel="icon" type="image/png" href="/src/auth/img/logo_infinite.png" />
</head>
<body>
    <div class="container">
      <?php include("../views/header.php");
      include("../views/menu_deroulant_tel.php") ?>
        <div class="title">
            <h3>Bienvenue dans la page du gestionnaire</h3>
            <hr/>
        </div>
        <div class="links">
            <div class = chantier>
            <h3>Information sur votre chantier</h3>

            <?php

            if(isset($_SESSION['id_chantier'] )){

            $req = $bdd->prepare('SELECT * FROM chantier WHERE id_chantier = ?');
            $req->execute(array( $_SESSION['id_chantier'] ));
            $data = $req->fetch();

            $id_chantier = $_SESSION['id_chantier'];
            $nom = $data['nom'];
            $localisation = $data['localisation'];
            $date_debut = $data['date_debut'];
            $date_fin = $data['date_fin'];

            echo($date_debut);





            }
            else{
                $id_chantier = "";
                $nom = "";
                $localisation = "";
                $date_debut = "2018-06-12T19:30";
                $date_fin = "2018-06-12T19:30";
            }


            
            ?>

            <form action="ajout_chantier.php" method="post">      
            <div class="form-group">
                <t>Numéro Chantier </t><input type="id_chantier" name="id_chantier" class="form-control" placeholder="Numero de chantier" required="required" value = "<?php echo $id_chantier ?>"autocomplete="off">
            </div>
            <div class="form-group">
                <t>Nom : </t><input type="nom" name="nom" class="form-control" placeholder="nom" value= "<?php echo $nom ?>"  required="required" autocomplete="off">
            </div>
            <div class="form-group">
            <t> Localisation : </t><input type="localisation" name="localisation" value= "<?php echo $localisation?>" class="form-control" placeholder="Localisation" required="required" autocomplete="off">
            </div>
            <div class="form-group">
            <t>date de debut</t><input type="date" id="start"
            name="date_debut" value= "<?php echo $date_debut ?>" 
            min="2000-06-07" max="2022-06-14">
            </div>
            <div class="form-group">
            <t>date de fin</t><input type="date" id="start"
            name="date_fin" value= "<?php echo $date_fin ?>"
            min="2000-06-07" max="2022-06-14">
            </div>

          
           

            <div class="button1">
                <button type="submit" class="btn_gauche">Ajouter</button>

            </div>   

            
    

        </form>


            </div>
            <div class="boite">
                <p>Dans cette rubrique vous pouvez consulter les différentes statistiques des membres de votre chantier en cliquant sur leur pseudo.</p>
                <div class="gauche">
                    <?php
                    for ($i=0;$i<count($allPesudo);$i++){
                        $id=$allId[$i];
                        $pseudo=$allPesudo[$i];
                        if ($i==0){
                            echo "<a class =test href='GestionGestionnaire.php?id=$id&pseudo=$pseudo'><div class='local' >$pseudo</div></a>";  
                        }
                        else{
                            echo "<a class =test href='GestionGestionnaire.php?id=$id&pseudo=$pseudo'><div class='local other'>$pseudo</div></a>";
                        }
                    }
                    ?>
                </div>
            </div>
            
        </div>
    </div>

    <footer class="footer">
        <div class="footerContent">
            <div class="row">
                <div class=" footer-col">
                    <img src="/auth/img/logo_infinite.png" class="logo">
                    </div>
                <div class=" footer-col">
                    <h4>NAVIGATION</h4>
                    <ul>
                        <li><a href= "/appinfo/homepage/homepage.php">Accueil</a></li>
                        <li><a href= "/appinfo/<?php echo $chantier ?>">Votre chantier</a></li>
                        <li><a href= "/appinfo/forum/forum.php">Forum</a></li>
                        <li><a href= "/appinfo/faq/faq.php">FAQ</a></li>
                        <li><a href= "/appinfo/contact/contact_essai.php">Contactez-nous</a></li>
                        <li><a href= "/appinfo/notre_solution/notre_solution.php">Notre solution</a></li>
                    </ul>
                </div>
                <div class=" footer-col">
                    <h4>PLUS D'INFOS</h4>
                    <ul>
                        <li><a href= "/appinfo/auth/views/inscription.php">Inscription</a></li>
                        <li><a href= "/appinfo/auth/model/connexion.php">Connexion</a></li>
                        <li><a href= "/appinfo/cgu/cgu.php">Mentions Légales</a></li>
                    </ul>
                </div>
                <div class=" footer-col">
                    <h4>SUIVEZ-NOUS</h4>
                    <div class="social-links">
                        <a href= "#"><i class="fab fa-facebook-f"></i></a>
                        <a href= "#"><i class="fab fa-twitter"></i></a>
                        <a href= "#"><i class="fab fa-instagram"></i></a>
                        <a href= "#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    
                </div>
            </div>
        </div> 
    </footer>
</body>
</html>