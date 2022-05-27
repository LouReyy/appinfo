<?php

$request = $_SERVER["REQUEST_URI"];
echo($request);

if($request == '/home'){
    header('Location:homepage/homepage.php');
}

if($request == '/connexion'){
    header('Location:auth/index.php');
}

if($request == '/chantier'){
    header('Location:Chantier/PageChantier.php');
}

if($request == '/for'){
    header('Location:forum/forum.php');
}

if($request == '/fa'){
    header('Location:/faq/faq.php');
}

if($request == '/cont'){
    header('Location:/contact/contact_essai.php');
}

if($request == '/solution'){
    header('Location:notre_solution/notre_solution.php');
}

if($request == '/memo'){
    header('Location:/memory/memory.php');
}



if($request == '/forum/'. $topic){
    header('Location:/forum/forum.php?topic='.$topic);
}

if($request == '/'){


header('Location:homepage/homepage.php');

}


?>