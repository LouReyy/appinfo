<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>

            <link rel="stylesheet" href="index.css" media="screen" type="text/css" />

    
            <title>Inscription</title>
        </head>
        <body>
        
        <div id = "container1">


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


     <div id = test></div>

    <div id = ecran>

         <div id="container">
             <div class="login-form">
            <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> inscription réussie !
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

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email non valide
                            </div>
                        <?php
                        break;

                        case 'email_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email trop long
                            </div>
                        <?php 
                        break;

                        case 'pseudo_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> pseudo trop long
                            </div>
                        <?php 
                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte deja existant
                            </div>
                        <?php 

                    }
                }
                ?>
            </div>

            <img class = "forme1"src="forme1.png"></img>

                <h1 class="text-center">Inscription</h1>


            <form action="inscription_traitement.php" method="post">
                <h2 class="text-center">Inscription</h2>       
                <div class="form-group">
                    <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                </div>   

                <a id = "button1" href="connexion.php">Connexion</a>

                <style>

#container{
    margin-top: 30%;
}

    
    .forme1{
        width: 60%;
        height: 6%;
        display: block;
        margin-top: 5%;
        margin-left: 8%;
        
    }


    h1{
    color : black;
    position: relative;
    font-size: 4em;
    padding-bottom: 10%;
    }

#button1{
    font-size: 18px;
    position: absolute;
    margin-left: 30%;
    background-color: #00ccff;
    color: white;
    padding: 14px 20px;
    border: none;
    cursor: pointer;
    width: 40%;
    border-radius: 15px;
    font-family: "Quicksand";  
    text-align: center;
    
}

#button1:hover {
    background-color: white;
    color: black;
    border: 1px solid black;
}




                </style>

            </form>
        </div>

    </div>
      
        </body>
</html>