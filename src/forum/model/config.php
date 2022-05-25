<?php 
        
    try 
    {
        
        $bdd = new PDO("mysql:host=herogu.garageisep.com;dbname=P2i6H04k07_appinfofin;charset=utf8", "haXoGjsQhU_appinfofin", "mJMzoauEGw0U53S0");
    }
    catch(PDOException $e)
    {
        die('Erreur : zebi '.$e->getMessage());
    }
