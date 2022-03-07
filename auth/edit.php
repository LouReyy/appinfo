<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/appinfo/auth/index.css" media="screen" type="text/css" />
    <title>Document</title>
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

    <div id ="container">
        <img id = "forme1"src="forme1.png"></img>
        <h1>Mot de passe oublié</h1>
        <p> Pas de panique ! Renseignez votre email ci-dessous et nous vous enverons par email les informations pour vous creer un nouveau mot de passe.</p>

        <div class="form-group">
            <form action="/appinfo/auth/forgot.php" method="POST">
                <input type="email" name="email" class="form-control" placeholder="Adresse Email" required="required" autocomplete="off">
        
                <button type="submit" href="edit2.php" class="btn btn-primary btn-block">Reinitialiser mon mot de passe </button>
            </form>
        </div>

    </div>
    
    <style>
        #container{
            text-align: center;
            position: absolute;
            display: flex;
            align-items: flex-start;
            margin-top: 1%;
            width: 50%;
            height: 100%;
            margin-left: 35%;
            flex-direction: column;
        }

        h1{
            text-align: center;
            margin-top: -8%;
            font-size: 45px;
        }

        #forme1{
            margin-top: 5%;
            width: 52%; 
            height: 3%;
        }

        p{
            position: relative;
            font-size: 30px;
            text-align: center;
            margin-left: -40%;
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
            font-size: 20px;
            width: 100%;
            height: 100%;
            border-radius: 60px;
        }

        button[type=submit] {
            width: 40%; 
            height : 8%;
            margin-top: 2%;
            border-radius: 60px ;
            font-size: 18px;
        }


    </style>
</body>
</html>