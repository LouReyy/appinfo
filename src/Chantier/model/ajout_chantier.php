<?php

require_once 'config.php'; 

    


    $id_chantier = htmlspecialchars($_POST['id_chantier']);
    $nom = htmlspecialchars($_POST['nom']);
    $localisation = htmlspecialchars($_POST['localisation']);
    $date_debut = htmlspecialchars($_POST['date_debut']);
    $date_fin = htmlspecialchars($_POST['date_fin']);

    echo($id_chantier . $nom . $localisation . $date_debut . $date_fin);

                            $update = $bdd->prepare('UPDATE chantier SET nom = ?,localisation = ?, date_debut = ?,date_fin = ? WHERE id_chantier = ?');
                            $update->execute(array($nom,$localisation,$date_debut,$date_fin,$id_chantier));

                            echo("ajout de chantier");
                            header('Location: PageGestionnaire.php?reg_err=chantier');die();






?>