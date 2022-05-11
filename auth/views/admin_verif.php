<?php 

session_start();
require_once("../model/config.php");

        $editprofil ="index.php";
        $title = "Connexion";
    
    if(isset($_SESSION['type'])){
        $chantier = "Chantier/PageChantier.php";    }
    else{
        $chantier = "VotreChantier/votrechantier.php";
    }
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/appinfo/admin/css/ajouter_user.css" media="screen" type="text/css" />
    <title>Ajout d'un Administrateur</title>
</head>
<body>

    <header>
        <div id ="logoimg">
            <a  href="/appinfo/homepage/homepage.php"><img src="/appinfo/auth/logo_infinite.png" alt="logo"></a>
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


            if(isset($_GET['email'])){
                $email = $_GET['email'];
                }
            else{
                 $email ="";
                }
           

           if(isset($_SESSION['type']) && ($_SESSION['type']) == "Administrateur"){
            
      
            
            ?>
            <a class="cta" href= "/appinfo/admin/admin.php">Admin</a>

        

            <?php }
            
            ?>
    </header>


    <div id="container">

<div class="login-form">
<h1>Ajouter un Administrateur</h1>
    <img id = "forme1"src="../forme1.png"></img>
</div>
      <p> Renseignez son adresse email : </p>
        <div class="form-group">
            <form action="../model/add_admin.php" method="POST">
                <input type="email" name="email" class="form-control" placeholder="Email" value = "<?php echo $email ?>"/>
                <br />
                <button type="submit" class="btn btn-primary btn-lg m-3">Modifier</button>
            </form>
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
                                <strong>Succès</strong> L'administrateur a bien été ajouté !
                              
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
<style>

#container{
align-items: center;
position: absolute;
display: flex;
margin-top:5%;
width: 80%;
height: 75%;
margin-left: 10%;
flex-direction: column;
text-align: center;
}

.login-form {
padding-bottom: 4%;
position: relative;
margin-top:0;
width: 100%;
font-family: "Quicksand";
}

h1{
position: relative;
font-size: 3em;
margin-top:0;

}   

#forme1{
position: relative;
width: 45%;
height: 20%;
}

p{
position: relative;
font-size: 40px;
text-align: center;
margin: 0;

}

.form-group {
margin-top:5%;
width:100%;
margin-left: 0;
text-align: center;
justify-content: center;

}

.msg-form{
  position: relative;
  height: auto;;
  font-family: "Quicksand";
  margin-top: 0;
  
}

.alert{
  position: relative;
  width: 800px;
  height: 30px;
  color : red;
  font-family: "Quicksand";
  font-size: 1.5em;

}


input[type=text], input[type=email] {
flex-wrap: nowrap;
font-size: 30px;
width: 50%;
height:40%;
border-radius: 60px;
justify-self: center;
}

button[type=submit] {
width: 40%; 
height : 40%;
margin-top: 2%;
border-radius: 60px ;
font-size: 25px;
}


</style>

</div>
</body>

</html>
