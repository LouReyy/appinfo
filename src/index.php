<?php

$request = $_SERVER["REQUEST_URI"];
echo($request);

if($request == '/home'){
    header('Location:homepage/homepage.php');
}

if($request == '/forum/Bienvenue'){
    header('Location:/forum/forum.php?topic=Bienvenue');
}




// header('Location:homepage/homepage.php');



?>