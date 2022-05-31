
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

      
    if(file_exists( "../img_chant/" . hash('sha256',  $_SESSION['id_chantier']). ".jpg")){

        $file_name = "../img_chant/" . hash('sha256',  $_SESSION['id_chantier'] );

    }

    else{
        $file_name = "../img/pp";

    }

    if(isset($_SESSION['email'])){

        if(file_exists( "/auth/profil_picture/" . hash('sha256',  $_SESSION['email']). ".jpg")){
        
            $file_name2 = "/auth/profil_picture/" . hash('sha256',  $_SESSION['email'] );
            }
        
            else{
            $file_name2 = "/auth/img/pp";
            
    
        }
    }
    else{
        $file_name2 = "/auth/img/pp";
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

$req_util='SELECT pseudo,id FROM `utilisateurs` WHERE id_chantier='. $id_chantier;
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
    <link rel="icon" type="image/png" href="/auth/img/logo_infinite.png" />
</head>
<body>
    <div class="container">
      <?php include("../views/header.php");
      include("../views/menu_deroulant_tel2.php") ?>
        <div class="title">
            <h3>Bienvenue dans la page du gestionnaire</h3>
            <hr/>
        </div>
        <div class="links">

            <div id = content>
                <div class = chantier>
                    <h3>Information sur votre chantier</h3>

                    <?php

                    if(isset($_SESSION['id_chantier'] )){

                    $req = $bdd->prepare('SELECT * FROM chantier WHERE id_chantier = ?');
                    $req->execute(array( $_SESSION['id_chantier'] ));
                    $data = $req->fetch();

                    }

                    if(isset($data['nom']) && isset($data['localisation']) ){

                    $id_chantier = $_SESSION['id_chantier'];
                    $nom = $data['nom'];
                    $localisation = $data['localisation'];
                    $date_debut = $data['date_debut'];
                    $date_fin = $data['date_fin'];

                    }
                    else{
                        $id_chantier = $_SESSION['id_chantier'];
                        $nom = "";
                        $localisation = "";
                        $date_debut = "2018-06-12T19:30";
                        $date_fin = "2018-06-12T19:30";
                    }


            
                    ?>

                    <form action="ajout_chantier.php"   method="post">      
                        <div class="form-group">
                            <t>Numéro de Chantier </t><input type="id_chantier" name="id_chantier" class="form-control" placeholder="Numero de chantier" required="required" value = "<?php echo $id_chantier ?>"autocomplete="off">
                        </div>
                        <div class="form-group">
                            <t>Nom : </t><input type="nom" name="nom" class="form-control" placeholder="nom" value= "<?php echo $nom ?>"  required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <t> Localisation : </t><input type="localisation" name="localisation" value= "<?php echo $localisation?>" class="form-control" placeholder="Localisation" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <t>Date de debut</t><input type="date" id="start"
                            name="date_debut" value= "<?php echo $date_debut ?>" 
                            min="2000-06-07" max="2022-06-14">
                        </div>
                        <div class="form-group">
                            <t>Date de fin</t><input type="date" id="start"
                            name="date_fin" value= "<?php echo $date_fin ?>"
                            min="2000-06-07" max="2022-06-14">
                        </div>


                        <div class="button1">
                            <button type="submit" class="btn_gauche">Modifier</button>

                         </div>   

                    </form>


                </div>

                <div id = pp>

                    <img class = "avatar"src="<?php echo $file_name; ?>.jpg"></img>

                    <form class = "form-img" method="POST" action = "img_chantier.php" enctype="multipart/form-data" >

                        <label class="file">
                            <input type="file" name = "picture" id="avatar"   accept="image/jpg">
                            <span class="file-custom"></span>
                        </label>    

                        <button type="submit" class="btn btn-primary btn-block">Modifier la photo</button>

                    </form>


                </div>

                <div class="msg-form">
                <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> Profil modifié !
                            </div>
                        <?php
                        break;

                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe différent
                            </div>
                            <?php 
                         break;

                         case 'picture':
                         ?>
                             <div class="alert alert-danger">
                                 <strong>Erreur</strong> Vous n'avez pas importer de fichier
                             </div>
                             <?php 
                             break;

                             case 'file':
                             ?>
                                 <div class="alert alert-danger">
                                     <strong>Erreur</strong> Vous pouvez charger que des fichier .jpg
                                 </div>
                                 <?php 
                                  break;

                                  case 'robust':
                                    ?>
                                        <div class="alert alert-danger">
                                            <strong>Erreur</strong> Votre mot de passe doit contenir au moins une majuscule, un chiffre, et un caractère spécial
                                        </div>
                                    <?php 
                                    break;
                                    case 'admin':
                                    
                                    ?>
                                        <div class="alert alert-danger">
                                            <strong>Important</strong>Vous avez été inscrit pour le moment en tant qu'utilisateur.
                                             Nous envoyons une demande au staff pour votre inscription en mode Administrateur
                                        </div>
                                    <?php
                                    break;
                                    case 'chantier':
                                    
                                    ?>
                                        <div class="alert alert-danger">
                                            <strong>Succès</strong>Votre chantier a bien été ajouté
                                        </div>
                                    <?php 


                    }
                }
                ?>
            </div> 

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
<script src = "../js/Gest.js"></script>
</html>