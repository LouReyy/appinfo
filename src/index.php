<?php

$request = $_SERVER["REQUEST_URI"];
echo($request);

if($request == 'home'){
    header('Location:homepage/homepage.php');
}


echo "test";
// header('Location:homepage/homepage.php');



?>