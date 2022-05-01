


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

    include("views/container.php")
?>


        
        </body>

        <script src= index.js></script>
</html>



