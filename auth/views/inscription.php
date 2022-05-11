<?php

session_start(); 



if(isset($_SESSION['user'])){

        $editprofil ="landing.php";
        $title = "Profil";

}


else{
    $editprofil ="index.php";
    $title = "Connexion";
}
?>


<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>

            <link rel="stylesheet" href="../index.css" media="screen" type="text/css" />

    
            <title>Inscription</title>
        </head>
        <body>
        
        <div id = "container1">


        <header>
            <div id ="logoimg">
            <a  href="/appinfo/homepage/homepage.php"><img src="/appinfo/auth/logo_infinite.png" alt="logo"></a>
            </div>  
            <nav>
                <ul class="nav__links">
                    <li><a href="/appinfo/homepage/homepage.php">Accueil</a></li>
                    <li><a href="/appinfo/<?php echo $chantier ?>" >Votre chantier</a></li>
                    <li><a href="/appinfo/forum/forum.php">Forum</a></li>
                    <li><a href="/appinfo/faq/faq.php">FAQ</a></li>
                    <li><a href="/appinfo/contact/contact_essai.php">Contactez-nous</a></li>
                    <li><a href="/appinfo/notre_solution/notre_solution.php">Notre solution</a></li>

                </ul>
            </nav>
            <div id="logomemo">
                <a href="/appinfo/memory/memory.php"><img src="/appinfo/memory/memoryim.png" alt="memory"></a>
            </div>
            <a class="cta" href= "/appinfo/auth/<?php  echo $editprofil?> "> <?php echo $title ?></a>

            <?php
           

           if(isset($_SESSION['type']) && ($_SESSION['type']) == "Administrateur"){
            
            ?>
            <a class="cta" href= "/appinfo/admin/admin.php">Admin</a>

            <?php }?>
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
                        break;
                        case 'select_type':
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Erreur</strong> Vous n'avez pas choisi de type
                                </div>
                            <?php 
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte deja existant
                            </div>
                        <?php 
                        break;

                        case 'banned':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Vous avez été banni, vous n'avez plus accès a ce site
                            </div>
                        <?php 
                         case 'robust':
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Erreur</strong> Votre mot de passe doit contenir au moins une majuscule, un chiffre, et un caractère spécial
                                </div>
                            <?php 
                        case 'admin':
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Important</strong> Nous envoyons une demande au staff pour votre inscription en mode Administrateur
                                </div>
                            <?php 

                    }
                }
                ?>
            </div>




            <form action="../model/inscription_traitement.php" method="post">
                <h2 class="text-center">Inscription</h2>   
                <img class = "forme1"src="../forme1.png"></img>
    
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

               

                    <label for="pet-select">Choix du role:</label>

                    <select name="type" id="type-select">
                    <option value="">Choisissez une option</option>
                    <option value="Utilisateur">Utilisateur</option>
                    <option value="Gestionnaire">Gestionnaire</option>
                    <option value="Administrateur">Administrateur</option>
    
                    </select>
                




                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                </div>   

                <a id = "button1" href="../index.php">Connexion</a>

            </div> 


         </div> 

         </div>

            



    <style>

               



    #container{
        margin-top: 15%;
        width: 70%;
        height: 55%;
    }


    
    .forme1{
        width: 45%;
        height: 4%;
        display: block;
        margin-left: 4%;
        
    }


    .login-form{
        font-size : 10px;
        margin-left:0;
        margin-top:5%;
    }

    .form-group{
        font-size: 15px;
        padding: 5px;
        
        
    }

    form{
        width: 90%;
        height: 80%;
        margin-top:4%;
    }

    #button1{
        width: 100%;
    }
    </style>

        </body>

        <script src = "alert.js"></script>

</html>