<?php

session_start(); 
    require_once 'config.php'; 


echo $_GET['param'];

$topic = $_GET['param'];

header('Location: ./forum.php?param=' .$topic );die();


?>