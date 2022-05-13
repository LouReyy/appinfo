<?php 
    require_once 'config.php'; 

    
    if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype']))
    {
        
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);
        $type = htmlspecialchars($_POST['type']);

        if($_POST['type'] == "Administrateur"){

            $link = 'http://localhost/appinfo/auth/views/admin_verif.php?email='.$email;
            $headers = 'Content-type: text/html; charset=utf-8'."\r\n";
            $to_email = "tech4healthg9c@gmail.com";
            $subject = "Demande Administrateur";
            $body = '<a href="'.$link.'">Un utilisateur souhaite s inscrire en tant qu administrateur !</a>' .
            '<br> son email a renseigner :"'.$email.'" ';
 

            if (mail($to_email, $subject, $body, $headers)) {
                echo "l'email a bien été envoyé à $to_email...";
            } else {
                echo "Email sending failed...";
            }

            $admin ="true";

            }




            header('Location: ../views/inscription.php?reg_err=admin');

        

        $type= "Utilisateur";

        $check0 = $bdd->prepare('SELECT pseudo, email, password FROM users_banned');
        $check0->execute();
        $data0 = $check0->fetchAll();

        $pattern = '/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/';
        if (!(preg_match($pattern, $password))) {
            header('Location: ../views/inscription.php?reg_err=robust'); die();}



        foreach($data0 as $row0){

            echo $row0['pseudo'];

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
                            
                            

                            
                            $insert = $bdd->prepare('INSERT INTO utilisateurs(pseudo, email, password, token,type) VALUES(:pseudo, :email, :password, :token,:type)');
                            $insert->execute(array(
                                'pseudo' => $pseudo,
                                'email' => $email,
                                'password' => $password,
                                'token' => bin2hex(openssl_random_pseudo_bytes(64)),
                                'type' => $type
                            ));
                            // On redirige avec le message de succès

                            if($admin == true){
                                header('Location:../views/inscription.php?reg_err=admin');

                            }else{
                                header('Location:../views/inscription.php?reg_err=success');
                            }
                            die();
                        }else{ header('Location: ../views/inscription.php?reg_err=password'); die();}
                    }else{ header('Location: ../views/inscription.php?reg_err=email'); die();}
                }else{ header('Location: ../views/inscription.php?reg_err=email_length'); die();}
            }else{ header('Location: ../views/inscription.php?reg_err=pseudo_length'); die();}
        }else{ header('Location: ../views/inscription.php?reg_err=select_type'); die();}
        }else{ header('Location: ../views/inscription.php?reg_err=already'); die();}


    
    
    }