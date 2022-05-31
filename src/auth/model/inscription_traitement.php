<?php 
    require_once 'config.php'; 

    if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype']))
    {
        
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);
        $type = htmlspecialchars($_POST['type']);
        $id_chantier = htmlspecialchars($_POST['id_chantier']);

        echo $id_chantier;


        if($type == "Administrateur"){

            include("mail.php");


            $link = 'https://appinfofinal.herogu.garageisep.com/auth/views/admin_verif.php?email='.$email;
            $to_email = "tech4healthg9c@gmail.com";
            $from_email = "tech4healthg9c@gmail.com";
            $subject = "Demande Administrateur";
            $body = '<a href="'.$link.'">Un utilisateur souhaite s inscrire en tant qu administrateur !</a>' .
            '<br> son email a renseigner :"'.$email.'" ';
            $name = $pseudo;
           

            $admin ="true";

        }
        else{
            $admin ="false";
        }
        if($type == "Gestionnaire"){

            include("mail.php");


            $link = 'https://appinfofinal.herogu.garageisep.com/auth/views/gest_verif.php?email='.$email;
            $to_email = "tech4healthg9c@gmail.com";
            $from_email = "tech4healthg9c@gmail.com";
            $subject = "Demande de Gestionnaire";
            $body = '<a href="'.$link.'">Un utilisateur souhaite s inscrire en tant que gestionnaire !</a>' .
            '<br> son email a renseigner :"'.$email.'" ';
            $name = $pseudo;
           

            $gest ="true";

        }
        else{
            $gest ="false";
        }



        

        $type = "Utilisateur";

        $check0 = $bdd->prepare('SELECT pseudo, email, password FROM users_banned');
        $check0->execute();
        $data0 = $check0->fetchAll();

        $pattern = '/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/';
        if (!(preg_match($pattern, $password))) {
            header('Location: ../views/inscription.php?reg_err=robust'); die();}



        foreach($data0 as $row0){

        if ($row0['pseudo'] == $pseudo || $row0['email'] == $email ){

            header('Location: ../views/inscription.php?reg_err=banned'); die();}

        }


        $check = $bdd->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        $email = strtolower($email); 
        
        
        if($row == 0){ 
            if(strlen($type) > 0){
            if(strlen($pseudo) <= 100){ 
                if(strlen($email) <= 100){ 
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ 
                        if($password === $password_retype){ 
                            
                            
                            $cost = ['cost' => 12];
                            $password = password_hash($password, PASSWORD_BCRYPT, $cost);
                            
                            
                            echo $id_chantier;

                            $insert = $bdd->prepare('INSERT INTO `chantier`(`id_chantier`, `nom`, `localisation`, `date_debut`, `date_fin`) VALUES (:id_chantier, :nom, :localisation, :date_debut, :date_fin)');
                            $insert->execute(array(
                                'id_chantier' => $id_chantier,
                                'nom' => "",
                                'localisation' => "",
                                'date_debut' => "2022-06-14",
                                'date_fin' => "2022-08-14"
                            ));

                                                        
                            $insert = $bdd->prepare('INSERT INTO `utilisateurs`(`pseudo`, `email`, `password`, `token`, `type`,`id_chantier`) VALUES (:pseudo, :email, :password, :token, :type, :id_chantier)');
                            $insert->execute(array(
                                'pseudo' => $pseudo,
                                'email' => $email,
                                'password' => $password,
                                'token' => bin2hex(openssl_random_pseudo_bytes(32)),
                                'type' => $type,
                                'id_chantier' => $id_chantier
                            ));

                      
                            echo("ajout de chantier");
                            header('Location: PageGestionnaire.php?reg_err=chantier');die();
                            // On redirige avec le message de succès



                            if($admin == "true"){
                                if (smtpmailer($to_email,$from_email,$name, $subject, $body, )) {
                                    echo "l'email a bien été envoyé à $to_email...";
                                    header('Location: ../views/inscription.php?reg_err=admin');
                                    die();
                    
                                } else {
                                    echo "Email sending failed...";
                                    die();
                                
                                }
                            }
                            if($gest == "true"){
                                if (smtpmailer($to_email,$from_email,$name, $subject, $body, )) {
                                    echo "l'email a bien été envoyé à $to_email...";
                                    header('Location: ../views/inscription.php?reg_err=gest');
                                    die();
                    
                                } else {
                                    echo "Email sending failed...";
                                    die();
                                
                                }
                            }

                        }else{ header('Location: ../views/inscription.php?reg_err=password'); die();}
                    }else{ header('Location: ../views/inscription.php?reg_err=email'); die();}
                }else{ header('Location: ../views/inscription.php?reg_err=email_length'); die();}
            }else{ header('Location: ../views/inscription.php?reg_err=pseudo_length'); die();}
        }else{ header('Location: ../views/inscription.php?reg_err=select_type'); die();}
        }else{ header('Location: ../views/inscription.php?reg_err=already'); die();}
        header('Location:../views/inscription.php?reg_err=success');


    
    
    }