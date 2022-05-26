<?php 

session_start();
require_once("../model/config.php");

        $editprofil ="../admin/admin.php";
        $title = "Admin";
    
    if(isset($_SESSION['type'])){
        $chantier = "Chantier/PageChantier.php";    }
    else{
        $chantier = "VotreChantier/votrechantier.php";
    }
    if(!empty($_GET['u'])){
        $token = htmlspecialchars(base64_decode($_GET['u']));
        $check = $bdd->prepare('SELECT * FROM mdp_recover WHERE token_user = ?');
        $check->execute(array($token));
        $row = $check->rowCount();

        if($row == 0){
            echo "Lien non valide";
            die();
        }
    }

    if(isset($_GET['email'])){
        $email = $_GET['email'];
        }
    else{
         $email ="";
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_verif.css" media="screen" type="text/css" />
    <link rel="icon" type="image/png" href="../homepage/img/InfiniteMeasures.png" />

    <title>Ajout d'un Administrateur</title>
</head>
<body>

    <header>
            <div id ="logoimg">
            <a  href="/homepage/homepage.php"><img src="/auth/img/logo_infinite.png" alt="logo"></a>
            </div>  
            <nav>
                <ul class="nav__links">
                    <li><a href="/homepage/homepage.php">Accueil</a></li>
                    <li><a href="/<?php echo $chantier ?>" >Votre chantier</a></li>
                    <li><a href="/forum/forum.php">Forum</a></li>
                    <li><a href="/faq/faq.php">FAQ</a></li>
                    <li><a href="/contact/contact_essai.php">Contactez-nous</a></li>
                    <li><a href="/notre_solution/notre_solution.php">Notre solution</a></li>

                </ul>
            </nav>
            <div id="logomemo">
                <a href="/memory/memory.php"><img src="/memory/img/memoryim.png" alt="memory"></a>
            </div>
            <a class="cta" href= "/auth/<?php echo $editprofil?> "> <?php echo $title ?></a>

         
        </header>


<div id="container">

    <div class="login-form">
        <h1>Ajouter un Administrateur</h1>
        <img id = "forme1"src="../img/forme1.png"></img>
    </div>
      <p> Renseignez son adresse email : </p>
        <div class="form-group">
            <form action="../model/add_admin.php" method="POST">
                <input type="email" name="email" class="form-control" placeholder="Email" value = "<?php echo $email ?>"/>
                <br />
                <button type="submit" class="btn btn-primary btn-lg m-3">Modifier</button>
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
                                <strong>Succès</strong> L'administrateur a bien été ajouté !
                              
                            </div>
                        <?php
                        break;
                        case 'user':
                            ?>
                                <div class="alert alert-success">
                                    <strong>Erreur</strong> L'utilisateur n'existe pas !
                                  
                                </div>
                            <?php
                            break;
                    }
                }
                        ?>
                   
                
    </div>
  </div>
</div>
</div>

</div>
</body>

</html>
