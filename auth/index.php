<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>

            <link rel="stylesheet" href="/appinfo/auth/index.css" media="screen" type="text/css" />
            
            <title>Connexion</title>
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

          
            <div id = test>
                
            </div>

            <div id = ecran>

                <div id="container">

                <div class="login-form">
                <?php 
                   if(isset($_GET['login_err']))
                   {
                       $err = htmlspecialchars($_GET['login_err']);
   
                       switch($err)
                       {
                           case 'password':
                           ?>
                               <div class="alert">
                                   <strong>Erreur</strong> mot de passe incorrect
                               </div>
                           <?php
                           break;
                           
                           case 'email':
                           ?>
                               <div class="alert">
                                   <strong>Erreur</strong> email incorrect
                               </div>
                           <?php
                           break;
   
                           case 'already':
                           ?>
                               <div class="alert">
                                   <strong>Erreur</strong> compte non existant
                               </div>
                           <?php
                           break;
                       }
                   }
                   ?> 
   
                </div>
                

                <img class = "forme1"src="forme1.png"></img>

                <h1 class="text-center">Bienvenue</h1>

    
            
                <form action="connexion.php" method="post">
                     <h2 class="text-center">Connexion</h2>       
                        <div class="form-group">
                         <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                         </div>

                    <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                    </div>
                     <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                    </div>   
                </form>

                

            
                <p class="text-center"><a href="inscription.php">Inscription</a></p>

                <p2 class="text-center"><a href="edit.php">Mot de passe oublié</a></p2>
             
        
            </div>
        
        
            </div>
        </body>
</html>