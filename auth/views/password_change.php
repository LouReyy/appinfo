<?php 
    require_once("../model/config.php");
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
      <div id = container1>
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




        <div id="container">

            <div class="login-form">
                <img id = "forme1"src="../forme1.png"></img>
                  <h1>Réinitialiser mon mot de passe</h1>
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
      <style>

        #container{
            align-items: center;
            position: absolute;
            display: flex;
            margin-top:10%;
            width: 80%;
            height: 75%;
            margin-left: 10%;
            flex-direction: column;
        }

        .login-form {
            padding-bottom: 4%;
            position: relative;
            margin-top:0;
            width: 800px;
            font-family: "Quicksand";
        }

        h1{

        position: relative;
        font-size: 3em;
        margin-top:-75px;

    }   

        #forme1{
            position: relative;
            width: 700px;
            height: 30px;
            margin-top: -6  00px;
            margin-left: 7%;
        }

        p{
            position: relative;
            font-size: 40px;
            text-align: center;
            margin: 0;

        }

        .form-group {
            display: flex;
            margin-top:5%;
            width:60%;
            margin-left: 10%;

        }

        input[type=text], input[type=password] {
            flex-wrap: nowrap;
            font-size: 30px;
            width: 150%;
            height:40%;
            border-radius: 60px;
        }

        button[type=submit] {
            width: 80%; 
            height : 40%;
            margin-top: 2%;
            border-radius: 60px ;
            font-size: 25px;
        }


    </style>

</div>
  </body>

</html>
