<?php 
    require_once __DIR__.'/config.php';
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/appinfo/auth/index.css" media="screen" type="text/css" />
  </head>
  <body>
  <header>
        <img src="/appinfo/auth/logo_infinite.png" alt="logo">
        <nav>
            <ul class="nav__links">
                <li><a href="/appinfo/homepage/homepage.html">Accueil</a></li>
                <li><a href="#">Votre chantier</a></li>
                <li><a href="#">Forum</a></li>
                <li><a href="/appinfo/contact/Page_onglets.html">Contactez-nous</a></li>
            </ul>
        </nav>
     <a class="cta" href="/appinfo/auth/index.php">Connexion</a>
    </header>




        <div class="container">

                <img id = "forme1"src="forme1.png"></img>
                  <h1>Réinitialiser mon mot de passe</h1>
                  <p> Renseignez vos nouvelles informations</p>
                    <div class="form-group">
                        <form action="password_change_post.php" method="POST">
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
  </body>

  <style>

    .container{
      text-align: center;
      position: absolute;
      display: flex;
      align-items: flex-start;
      margin-top: 1%;
      width: 60%;
      height: 100%;
      margin-left: 20%;
      margin-right: 20%;
      flex-direction: column;
      font-family: Quicksand;
    }
     h1{
        text-align: center;
        display: block;
        margin-top: -6.5%;
        font-size: 45px;
        padding-left: 20%;
        }

        
        #forme1{
          text-align: center;
          margin-top: 5%;
          width: 70%; 
          height: 3%;
          margin-left: 18%;
        }

        p{
            font-size: 30px;
            text-align: center;
            padding-left: 25%;
            padding-top: 5%;
            padding-bottom: 5%;

        }

        #form-group {

            position: absolute;
            width:70%;
            border: 1px solid #f1f1f1;
            background: #fff;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        input[type=text], input[type=password] {
            font-size: 20px;
            width: 140%;
            height: 100%;
            border-radius: 60px;
            text-align: center;
            margin-left: 60%;
        }

        button[type=submit] {
            width: 80%; 
            height : 8%;
            margin-top: 5%;
            border-radius: 60px ;
            font-size: 18px;
            margin-left: 60%;


        }
    
  </style>
</html>
