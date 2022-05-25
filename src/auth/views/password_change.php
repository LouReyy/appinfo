<?php 

session_start();
require_once("../model/config.php");

        $editprofil ="index.php";
        $title = "Connexion";
    
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
?>
<!doctype html>
<html lang="fr">
  <head>
    <title>Réinitialiser mon mot de passe</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../css/password_change.css" media="screen" type="text/css" />
  </head>
  <body>
      <div id = container1>
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

            <?php
           

           if(isset($_SESSION['type']) && ($_SESSION['type']) == "Administrateur"){
            
            ?>
            <a class="cta" href= "/admin/admin.php">Admin</a>

            <?php }?>
        </header>




        <div id="container">

            <div class="login-form">
            <h1>Réinitialiser mon mot de passe</h1>

                <img id = "forme1"src="../img/forme1.png"></img>
            </div>
                  <p> Renseignez vos nouvelles informations</p>
                    <div class="form-group">
                        <form action="../model/password_change_post.php" method="POST">
                            <input type="hidden" name="token" value="<?php echo base64_decode(htmlspecialchars($_GET['u'])); ?>"  />
                            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required />
                            <br />
                            <input type="password" name="password_repeat" class="form-control" placeholder="Re-tapez le mot de passe" required />
                            <button type="submit" class="btn btn-primary btn-lg m-3">Modifier</button>
                        </form>
                    </div>
                </div>
              </div>
          </div>
      </div>



        

</div>
  </body>

</html>
