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

if($request == '/forum'){
    header('Location:homepage/homepage.php');
}

if($request == '/faq'){
    header('Location:/faq/faq.php');
}

if($request == '/contact'){
    header('Location:/contact/contact_essai.php');
}

if($request == '/solution'){
    header('Location:notre_solution/notre_solution.php');
}

if($request == '/memory'){
    header('Location:/memory/memory.php');
}



//if($request == '/forum/Bienvenue'){
    //header('Location:/forum/forum.php?topic=Bienvenue');
//}




// header('Location:homepage/homepage.php');



?>