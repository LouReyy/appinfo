<?php 
        
    try 
    {
        
        $bdd = new PDO("mysql:host=herogu.garageisep.com;dbname=s24iyG1gNr_appinfo2;charset=utf8", "9F6O2KbNz9_appinfo2", "buGQrB3QQ7mFCCSq");
    }
    catch(PDOException $e)
    {
        die('Erreur : zebi '.$e->getMessage());
    }
