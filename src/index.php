<?php

$request = $_SERVER["REQUEST_URI"];
echo($request);

if($request == '/home'){
    header('Location:homepage/homepage.php');
}


// header('Location:homepage/homepage.php');



?>