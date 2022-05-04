<?php
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "test@hostinger-tutorials.fr";
    $to = "louis.rey@eleve.isep.fr";
    $subject = "Essai de PHP Mail";
    $message = "PHP Mail fonctionne parfaitement";
    $headers = 'MIME-Version: 1.0'."\n";
    $headers ='Content-Type: text/html; charset="UTF-8"'."\n";
    $headers ='Content-Transfer-Encoding: 8bit';

    mail($to,$subject,$message, $headers);
    echo "L'email a été envoyé.";
?>