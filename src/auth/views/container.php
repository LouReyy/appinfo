
<div id = "container1">

<?php include("header.php");
include("menu_deroulant_tel.php"); ?>

          
            <div id = test>
                
            </div>

            <div id = ecran>

                <div id="container">

                
                   
                <div id = container-title>
                

                    <img id = "forme1"src="/auth/img/forme1.png"></img>

                    <h1 class="text-center">Bienvenue</h1>

                </div>

                <div id = form-group>

    
            
                <form action="/auth/model/connexion.php" method="post">
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


                <div id ="button_flex">

                    <a id = "button1" href="/auth/views/inscription.php">Inscription</a>

                    <a  id = "button2" href="/auth/views/edit_password.php">Mot de passe oublié</a>

                </div>


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