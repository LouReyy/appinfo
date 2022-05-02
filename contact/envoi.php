<?php


require_once __DIR__.'/config.php';

$headers = 'Content-type: text/html; charset=utf-8'."\r\n";



$to_email = "rohan.kumar@eleve.isep.fr";
            $subject = "Test envoi mail";
            $body = 'tas recu chacal ?';
 
            if (mail($to_email, $subject, $body, $headers)) {
                echo "l'email a bien été envoyé à $to_email...";
            } else {
                echo "Email sending failed...";
            }

            $test = 3;
            echo "$test"





?>