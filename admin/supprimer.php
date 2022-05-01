<?php

require_once("../auth/model/config.php");
session_start(); 


$id = $_GET['id'];


$check = $bdd->prepare('DELETE FROM utilisateurs WHERE id = ? ');
        $check->execute(array($id));
        $data = $check->fetch();


header('Location: /appinfo/admin/admin.php?reg_err=supp');die();

?>