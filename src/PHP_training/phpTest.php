<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="phpTest.php" method="post" >
        <a>Bienvenue dans le formulaire</a> <br>

        Votre nom :<input type="text" name="name"><br>
        <input type="submit">
       
    </form>

    <?php
    echo $_POST["name"];
    ?>
</body>
</html>