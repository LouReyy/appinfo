<?php

require_once("config.php");
session_start(); 


$id = $_GET['id'];


$check = $bdd->prepare('DELETE FROM question WHERE id_question = ? ');
        $check->execute(array($id));
        $data = $check->fetch();


header('Location: /appinfo/faq/faq.php?reg_err=supp');die();

?>