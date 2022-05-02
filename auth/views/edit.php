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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/appinfo/auth/edit.css" media="screen" type="text/css" />
    <title>Document</title>
</head>
<body>
    



<header>
            <div id ="logoimg">
            <a  href="/appinfo/homepage/homepage.php"><img src="../auth/logo_infinite.png" alt="logo"></a>
        </div>  
            <nav>
                <ul class="nav__links">
                    <li><a href="/appinfo/homepage/homepage.php">Accueil</a></li>
                    <li><a href="/appinfo/Chantier/Chantier.php">Votre chantier</a></li>
                    <li><a href="/appinfo/forum/forum.php">Forum</a></li>
                    <li><a href="/appinfo/faq/faq.php">FAQ</a></li>
                    <li><a href="/appinfo/contact/contact_essai.html">Contactez-nous</a></li>
                </ul>
            </nav>
            <a class="cta" href= "/appinfo/auth/<?php  echo $editprofil?> "> <?php echo $title ?></a>

            <?php
           

           if(isset($_SESSION['type']) && ($_SESSION['type']) == "Administrateur"){
            
            ?>
            <a class="cta" href= "/appinfo/admin/admin.php">Admin</a>

            <?php }?>
        </header>

        <div id ="container">

            <div class="login-form">
                <img id = "forme1"src="../forme1.png"></img>
                <h1>Mot de passe oublié</h1>
            </div>

            <p> Pas de panique ! Renseignez votre email ci-dessous et nous vous enverons par email les informations pour vous creer un nouveau mot de passe.</p>

            <div class="form-group">
                <form action="../model/forgot.php" method="POST">
                    <input type="email" name="email" class="form-control" placeholder="Adresse Email" required="required" autocomplete="off">
                    <button type="submit" class="btn btn-primary btn-block">Reinitialiser mon mot de passe </button>
                 </form>
            </div>

        </div>

    </div>
    
    <style>
        #container{
            justify-content: center;
            align-items: center;
            position: absolute;
            display: flex;
            margin-top: 6%;
            width: 80%;
            height: 60%;
            margin-left: 10%;
            flex-direction: column;
        }

        .login-form {
            position: relative;
            width: 500px;
            margin:auto;
            font-family: "Quicksand";
        }

        h1{

        position: relative;
        font-size: 3em;
        margin-top:-65px;

    }

        #forme1{
            position: relative;
            width: 450px;
            height: 20px;
            margin-top: -500px;
            margin-left: 7%;
        }

        p{

            font-size: 40px;
            text-align: center;
            padding: 8%;

        }

        #form-group {
            position: absolute;
            margin-top: -20%;
            width:60%;
            border: 1px solid #f1f1f1;
            background: #fff;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        input[type=text], input[type=email] {
            font-size: 40px;
            width: 100%;
            height: 100%;
            border-radius: 60px;
        }

        button[type=submit] {
            width: 50%; 
            height : 8%;
            margin-top: 2%;
            border-radius: 60px ;
            font-size: 25px;
        }
    


    </style>
</body>
</html>