<div id = "container1">

            <header>
                <div id ="logoimg">
                    <a  href="/appinfo/homepage/homepage.php"><img src="/appinfo/auth/logo_infinite.png" alt="logo"></a>
                </div>
                <nav>
                <ul class="nav__links">
                    <li><a href="/appinfo/homepage/homepage.php">Accueil</a></li>
                    <li><a href="/appinfo/Chantier/Chantier.php">Votre chantier</a></li>
                    <li><a href="/appinfo/forum/forum.php">Forum</a></li>
                    <li><a href="/appinfo/contact/contact_essai.html">Contactez-nous</a></li>
                </ul>
            </nav>
            <a class="cta" href= "/appinfo/auth/<?php  echo $editprofil?> "> <?php echo $title ?></a>
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

                           case 'notconnected':
                            ?>
                                <div class="alert">
                                    <strong>Erreur</strong> Vous devez être connecté pour poster un message
                                </div>
                                <?php 
                                break;
                       }
                   }
                   ?> 
                

                <img id = "forme1"src="forme1.png"></img>

                <h1 class="text-center">Bienvenue</h1>

                </div>

    
            
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

                

            
                <a id = "button1" href="views/inscription.php">Inscription</a>

                <a  id = "button2" href="views/edit.php">Mot de passe oublié</a>
             
        
            </div>
        
        
            </div>
            </div>