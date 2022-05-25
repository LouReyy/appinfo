<?php 
        
    try 
    {
        
        $bdd = new PDO("mysql:host=herogu.garageisep.com;dbname=a7ukKicyOk_apponline;charset=utf8", "DDBYRnZlTj_apponline", "rhVPNtiT7H2qvUmy");
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }
