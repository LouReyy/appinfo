
<?php

include ("model/setup.php");
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="icon" type="image/png" href="../homepage/img/InfiniteMeasures.png" />

    <link rel="stylesheet" href="css/contact_essai.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body>
    <div class="container">
    <?php

include ("views/header.php");
include("views/menu_deroulant_tel.php");
?>
      
        <form method="POST" action="model/contact.php">
            <div class="content">
                <h1>Contactez-nous</h1>
                <div class="trait"></div>
                <div class="formulaire">
                    <div class="gauche">
                        <div class="case">
                            <label>Nom</label>
                            <input required = "required" type="text" name="nom" value="<?php //if(isset($_COOKIE['nom'])){ echo $_COOKIE['nom'];}?>">
                            <i class="fa-solid fa-user"></i>
                            <div class="erreur">
                                <?php if(isset($err_nom)){echo $err_nom;}
                                ?>
                            </div>
                        </div>
        
                        <div class="case">
                            <label>Prénom</label>
                            <input required = "required" type="text" name="prenom" value="<?php //if(isset($_COOKIE['prenom'])){ echo $_COOKIE['prenom'];}?>">
                            <i class="fa-solid fa-user"></i>
                            <div class="erreur">
                                <?php if(isset($err_prenom)){echo $err_prenom;}
                                ?>
                            </div>
                            
                        </div>
        
                        <div class="case">
                            <label>Mail</label>
                            <input type="text" required = "required" name="mail" value="<?php //if(isset($_COOKIE['mail'])){ echo $_COOKIE['mail'];}?>">
                            <i class="fa-solid fa-envelope"></i>
                            <div class="erreur">
                                <?php if(isset($err_mail)){echo $err_mail;}
                                ?>
                            </div>
                            
                        </div>
        
                        <div class="case">
                            <label>Téléphone</label>
                            <input type="tel" required = "required" name="num" value="<?php //if(isset($_COOKIE['num'])){ echo $_COOKIE['num'];}?>">
                            <i class="fa-solid fa-mobile"></i>
                            <div class="erreur">
                                <?php if(isset($err_num)){echo $err_num;}
                                ?>
                            </div>
                            
                        </div>
                        
                    </div>
        
                    <div class="droite"> <!--Zone de texte pour la question-->
                        <div class="case">
                            <label >Message</label>
                            <textarea required = "required" type= "zoneText" name="question"  value="<?php //if(isset($_COOKIE['question'])){ echo $_COOKIE['question'];}?>"id="" cols="30" rows="5"></textarea>
                            <i class="fa-solid fa-circle-question"></i>
                            <div class="erreur">
                                <?php if(isset($err_msg)){echo $err_msg;}
                                ?>
                            </div>
                            
                        
                        </div>
                    </div>
                </div>
                <div class="envoyer">
                    <button type="submit">Envoyer <!--Le boutton ne fait pas parti du div<formulaire> -->
                    <div class="msg">
                        <?php
                        if (isset($msg)){echo $msg;} 
                        ?>
                    </div>
                </div>

                <div class="msg-form">
                <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> Message envoyé !
                            </div>
                        <?php
                        break;

                        case 'notconnected':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Vous devez être connecté pour poster un message
                            </div>
                            <?php 
                            break;
                            case 'supp':
                                ?>
                                    <div class="alert alert-error">
                                        <strong>Erreur</strong> Le message n'a pas été envoyé
                                    </div>
                                <?php

                    }
                }
                ?>
            </div>

            </div>

            
            
        </form>

        

    </div>
    <?php include("views/footer.php") ?>

    <script src = js/contact.js></script>
    
</body>
</html>