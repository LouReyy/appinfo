<?php

require_once 'config.php'; 
session_start(); 


$id = $_GET['id'];


$check = $bdd->prepare('DELETE FROM utilisateurs WHERE id = ? ');
        $check->execute(array($id));
        $data = $check->fetch();


header('Location: ../admin.php?reg_err=supp');die();

?>