<?php include("../model/setup.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ajouter_user.css" media="screen" type="text/css" />
    <title>Document</title>
</head>
<body>

<?php include("header.php");
include("menu_deroulant_tel.php"); ?>


        <div id ="container">


        <div id = container-title>
                
            <h1 class="text-center">Ajouter un Utilisateur</h1>

            <img id = "forme1"src="../img/forme1.png"></img>


        </div>



        <div id = gauche>

            

            <form action="../model/inscription_traitement.php" method="post">      
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
                    <button type="submit" class="btn btn-primary btn-block">Ajouter un utilisateur</button>
                        
                        
                </div>   
                    

            </form>


               

        </div>

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
                        break;
                         case 'robust':
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Erreur</strong> Votre mot de passe doit contenir au moins une majuscule, un chiffre, et un caractère spécial
                                </div>
                            <?php 
                            break;
                        case 'admin':
                            
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Important</strong>Vous avez été inscrit pour le moment en tant qu'utilisateur.
                                     Nous envoyons une demande au staff pour votre inscription en mode Administrateur
                                </div>
                            <?php 


                    }
                }
                ?>
            </div>

        <img class = line src = ../img/Line4.png>

        <div id = pp>

            <img class = "avatar"src="<?php echo $file_name; ?>.jpg"></img>

            <form class = "form-img" method="POST" action = "../auth/model/modify_profilpic.php" enctype="multipart/form-data" >

                <label class="file">
                    <input type="file" name = "picture" id="avatar"   accept="image/jpg">
                    <span class="file-custom"></span>
                </label>    

                <button type="submit" class="btn btn-primary btn-block">Modifier la photo</button>

            </form>


        </div>




           

           



        


    
</body>
<script src = ../js/admin.js></script>

</html>