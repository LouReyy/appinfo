<?php

require_once("config.php");
session_start(); 


$id = $_GET['id'];


$check = $bdd->prepare('DELETE FROM message WHERE id_message = ? ');
        $check->execute(array($id));
        $data = $check->fetch();


header('Location: /appinfo/forum/forum.php?reg_err=supp');die();

?>