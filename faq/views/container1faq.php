<div id = containercentre>
        <h1>Foire Aux Questions (FAQ) </h1>
        <hr>
    </div>


        <div id = "<?php echo $div ?>">
        

             <form action="/appinfo/faq/model/envoi_question.php" method="post">

                <input type="topic" name="topic" class="topic_question" placeholder="Ecrivez votre Question" required="required" autocomplete="off"> </input>

                <textarea type="content" name="content" class="content_question" placeholder="Content" required="required" autocomplete="off"> </textarea>

                <button type = submit >Envoyer</button>

            </form>

        </div>

        <div class="msg-form">
                <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> Question postée !
                            </div>
                        <?php
                        break;

                        case 'notconnected':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Vous devez être connecté en mode Admin pour poster une question
                            </div>
                            <?php 
                            break;
                            case 'supp':
                                ?>
                                    <div class="alert alert-supp">
                                        <strong>Succès</strong> La question a bien été supprimée
                                    </div>
                                <?php

                    }
                }
                ?>
            </div>

   

        <div id = "droite">


        <form method ="GET">
        <input id="searchbar"  type="text" name="search" placeholder="Recherche...">
        
        </form>