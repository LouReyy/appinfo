
<div id = "container1">

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
                    <li><a href="/appinfo/contact/PageContact.php">Contactez-nous</a></li>
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

          
            <div id = test>
                
            </div>

            <div id = ecran>

                <div id="container">

                
                   
                <div id = container-title>
                

                    <img id = "forme1"src="/appinfo/auth/img/forme1.png"></img>

                    <h1 class="text-center">Bienvenue</h1>

                </div>

                <div id = form-group>

    
            
                <form action="/appinfo/auth/model/connexion.php" method="post">
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

                <a id = "button1" href="/appinfo/auth/views/inscription.php">Inscription</a>

                <a  id = "button2" href="/appinfo/auth/views/edit_password.php">Mot de passe oublié</a>


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

                </div>

                </div>

                

            
               
             
        
            </div>
        
        
            </div>
            </div>