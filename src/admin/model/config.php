<?php 
        
    try 
    {
        
        $bdd = new PDO("mysql:host=herogu.garageisep.com;dbname=63gzSZSkw3_appg9c;charset=utf8", "Pfr8GD5QBt_appg9c", "zOp7YYeC5X9UUWwd");
    }
    catch(PDOException $e)
    {
        die('Erreur : zebi '.$e->getMessage());
    }
