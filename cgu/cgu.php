<?php
session_start(); 

if(isset($_SESSION['user'])){
        $editprofil ="landing.php";
        $title = "Profil";
    }
    else{
        $editprofil ="index.php";
        $title = "Connexion";

    }

    if(isset($_SESSION['type'])){
        $chantier = "Chantier/Chantier.php";
    }
    else{
        $chantier = "VotreChantier/votrechantier.php";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cgu.css" media="screen" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <title>Document</title>
</head>
<body>

<header>
            <div id ="logoimg">
            <a  href="/appinfo/homepage/homepage.php"><img src="../auth/logo_infinite.png" alt="logo"></a>
            </div>  
            <nav>
                <ul class="nav__links">
                    <li><a href="/appinfo/homepage/homepage.php">Accueil</a></li>
                    <li><a href="/appinfo/<?php echo $chantier ?>" >Votre chantier</a></li>
                    <li><a href="/appinfo/forum/forum.php">Forum</a></li>
                    <li><a href="/appinfo/faq/faq.php">FAQ</a></li>
                    <li><a href="/appinfo/contact/contact_essai.php">Contactez-nous</a></li>
                    <li><a href="/appinfo/notre_solution/notre_solution.php">Notre solution</a></li>

                </ul>
            </nav>
            <div id="logomemo">
                <a href="/appinfo/memory/memory.php"><img src="../memory/memoryim.png" alt="memory"></a>
            </div>
            <a class="cta" href= "/appinfo/auth/<?php  echo $editprofil?> "> <?php echo $title ?></a>

            <?php
           

           if(isset($_SESSION['type']) && ($_SESSION['type']) == "Administrateur"){
            
            ?>
            <a class="cta" href= "/appinfo/admin/admin.php">Admin</a>

            <?php }?>
        </header>

       


        <h1>
            Conditions Générales d'Utilisation 
            <hr/>
            
        </h1>

        <div id = container>
    
            
    
            <div class="boxdetextedroite">

            <h2>
                Qui sommes-nous ?
            </h2>
                
                <br>
                <p>
                    Fondé en 2022, Tech4Health, accompagné de son site, est un outil permettant de mesurer et d’analyser la qualité environnementale de n’importe quel chantier, les chantiers sont sources de pollutions et de stress notamment pour les ouvriers qui y travaillent. Notre objectif est donc de vérifier si un chantier respecte les normes environnementales du gouvernement et les conditions de travail des employés qui s’y trouvent.
                </p>
                <br>
                <p>
                    ActiveTech est une startup isépienne créée lors de l’initiative de la création de ce projet en collaboration avec Infinite Measure. ActiveTech est constituée de 6 entrepreneurs et ingénieurs provenant de l’ISEP. L’entreprise se consacre principalement dans les domaines de l’informatique et électronique.

                </p>
                <br>
                <p>
                Leurs principaux objectifs sont de proposer à tous leur clients une solution technologique simple d’utilisation en fonction de leur besoin. Leurs réponses sont sous la forme de boitier électronique accompagné d’une plateforme internet pour la gestion des données ou des fonctionnalités du boitier.
                </p>
                <br>
            </div>
            
       
    
        <div class="boxdetextegauche">
            <h2>
                Article 1 : Objet
            </h2>
            <br>
            <p>
                Les présentes CGU ou Conditions Générales d’Utilisation encadrent juridiquement l’utilisation des services du site.
            </p>
            <br>
            <p>
                Constituant le contrat entre la société Infinite Measure, ActiveTech et l’utilisateur, l’accès au site doit être précédé de l’acceptation de ces CGU. L’accès à cette plateforme signifie l’acceptation des présentes CGU.
            </p>
            <br>
            </div>
                <div class="boxdetextedroite">
                    <h2>
                        Article 2 : Mentions légales
                    </h2>
                    <br>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed quam ut metus faucibus convallis nec sed tellus. Ut dolor ex, luctus quis erat sit amet, tincidunt pellentesque ipsum. Nunc faucibus purus nec sem commodo, in varius neque ultricies. Pellentesque bibendum ligula ac ornare consequat. Phasellus laoreet ut justo ornare viverra. Nam facilisis, est a sollicitudin aliquam, ex ex tincidunt est, non pretium tortor erat sodales leo. Pellentesque vehicula convallis lectus tincidunt gravida. Proin odio neque, gravida ac ipsum semper, euismod bibendum arcu. Fusce volutpat, turpis et facilisis tempus, metus erat scelerisque arcu, et suscipit mauris ex at augue. Duis a suscipit enim, eu placerat magna.
                    </p>
                    <br>
                </div>
    
                <div class="boxdetextegauche">
                    <h2>
                        Article 3 : Accès au site
                    </h2>
                    <br>
                    <p>
                        Le site est accessible gratuitement depuis n’importe où par tout utilisateur disposant d’un accès à Internet. Tous les frais nécessaires pour l’accès aux services (matériel informatique, connexion Internet…) sont à la charge de l’utilisateur.
                    </p>
                    <br>
                    <p>
                        L’accès aux services dédiés aux membres est lui payant et s’effectue à l’aide d’un identifiant et d’un mot de passe.
                    </p>
                    <br>
                    <p>
                        Pour des raisons de maintenance ou autres, l’accès au site peut être interrompu ou suspendu par l’éditeur sans préavis ni justification.
                    </p>
                    <br>
                </div>

                <div class="boxdetextegauche">
                    <h2>
                        Article 4 : Gestion des données personnelles
                    </h2>
                    <br>
                    <p>
                        Pour la création du compte de l’utilisateur, la collecte des informations au moment de l’inscription sur le site est nécessaire et obligatoire. Conformément à la loi n°78-17 du 6 janvier relative à l’informatique, aux fichiers et aux libertés, la collecte et le traitement d’informations personnelles s’effectuent dans le respect de la vie privée.
                    </p>
                    <br>
                    <p>
                        Suivant la loi Informatique et Libertés en date du 6 janvier 1978, articles 39 et 40, l’utilisateur dispose du droit d’accéder, de rectifier, de supprimer et d’opposer ses données personnelles. L’exercice de ce droit s’effectue par le formulaire de contact et son espace client.
                    </p>
                    <br>
                </div>

                <div class="boxdetextegauche">
                    <h2>
                        Article 5 : Propriété intellectuelle
                    </h2>
                    <br>
                    <p>
                        Les marques, logos ainsi que les contenus du site (illustrations graphiques, textes…) sont protégés par le Code de la propriété intellectuelle et par le droit d’auteur.
                    </p>
                    <br>
                    <p>
                        La reproduction et la copie des contenus par l’utilisateur requièrent une autorisation préalable du site. Dans ce cas, toute utilisation à des usages commerciaux ou à des fins publicitaires est proscrite.
                    </p>
                    <br>
                </div>

                <div class="boxdetextegauche">
                    <h2>
                        Article 6 : Responsabilité
                    </h2>
                    <br>
                    <p>
                        Bien que les informations publiées sur le site soient réputées fiables, le site se réserve la faculté d’une non-garantie de la fiabilité des sources.
                    </p>
                    <br>
                    <p>
                        Les informations diffusées sur le site sont présentées à titre purement informatif et sont sans valeur contractuelle. En dépit des mises à jour régulières, la responsabilité du site ne peut être engagée en cas de modification des dispositions administratives et juridiques apparaissant après la publication. Il en est de même pour l’utilisation et l’interprétation des informations communiquées sur la plateforme.
                    </p>
                    <br>
                    <p>
                        Le site décline toute responsabilité concernant les éventuels virus pouvant infecter le matériel informatique de l’utilisateur après l’utilisation ou l’accès à ce site.
                    </p>
                    <br>
                    <p>
                        Le site ne peut être tenu pour responsable en cas de force majeure ou du fait imprévisible et insurmontable d’un tiers.
                    </p>
                    <br>
                    <p>
                        La garantie totale de la sécurité et la confidentialité des données n’est pas assurée par le site. Cependant, le site s’engage à mettre en œuvre toutes les méthodes requises pour le faire au mieux.
                    </p>
                    <br>
                </div>

                <div class="boxdetextegauche">
                    <h2>
                        Article 7 : Liens hypertextes
                    </h2>
                    <br>
                    <p>
                        Le site peut être constitué de liens hypertextes. En cliquant sur ces derniers, l’Utilisateur sortira de la plateforme. Cette dernière n’a pas de contrôle et ne peut pas être tenue responsable du contenu des pages web relatives à ces liens.
                    </p>
                    <br>
                </div>

                <div class="boxdetextegauche">
                    <h2>
                        Article 8 : Publication par l’utilisateur 
                    </h2>
                    <br>
                    <p>
                        Le site Infinite Measure permet aux membres de publier des postes dans le cadre du forum.
                    </p>
                    <br>
                    <p>
                        Dans ses publications, l’utilisateur est tenu de respecter les règles de droit en vigueur.
                    </p>
                    <br>
                    <p>
                        Le site dispose du droit d’exercer une modération à priori sur les publications et peut refuser leur mise en ligne sans avoir à fournir de justification.
                    </p>
                    <br>
                    <p>
                        L’utilisateur garde l’intégralité de ses droits de propriété intellectuelle. Toutefois, toute publication sur le site implique la délégation du droit non exclusif et gratuit à la société éditrice de représenter, reproduire, modifier, adapter, distribuer et diffuser la publication n’importe où et sur n’importe quel support pour la durée de la propriété intellectuelle. Cela peut se faire directement ou par l’intermédiaire d’un tiers autorisé. Cela concerne notamment le droit d’utilisation de la publication sur le web et sur les réseaux de téléphonie mobile.
                    </p>
                    <br>
                    <p>
                        À chaque utilisation, l’éditeur s’engage à mentionner le nom de l’utilisateur à proximité de la publication.
                    </p>
                    <br>
                    <p>
                        L’utilisateur est tenu responsable de tout contenu qu’il met en ligne. L’utilisateur s’engage à ne pas publier de contenus susceptibles de porter atteinte aux intérêts de tierces personnes.
                    </p>
                    <br>
                </div>

                <div class="boxdetextegauche">
                    <h2>
                        Article 9 : Durée du contrat
                    </h2>
                    <br>
                    <p>
                        Le présent contrat est valable pour une durée indéterminée. Le début de l’utilisation des services du site marque l’application du contrat à l’égard de l’utilisateur.
                    </p>
                </div>
        </div>
        </div>
</body>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class=" footer-col">
                <img src="infinite.png" class="logo">
                </div>
            <div class=" footer-col">
                <h4>NAVIGATION</h4>
                <ul>
                    <li><a href= "#">Accueil</a></li>
                    <li><a href= "#">Votre chantier</a></li>
                    <li><a href= "#">Forum</a></li>
                    <li><a href= "#">Contactez-nous</a></li>
                </ul>
            </div>
            <div class=" footer-col">
                <h4>PLUS D'INFOS</h4>
                <ul>
                    <li><a href= "#">Inscription</a></li>
                    <li><a href= "#">Connexion</a></li>
                    <li><a href= "#">Mentions Légales</a></li>
                    <li><a href= "#">CGU</a></li>
                </ul>
            </div>
            <div class=" footer-col">
                <h4>SUIVEZ-NOUS</h4>
                <div class="social-links">
                    <a href= "#"><i class="fab fa-facebook-f"></i></a>
                    <a href= "#"><i class="fab fa-twitter"></i></a>
                    <a href= "#"><i class="fab fa-instagram"></i></a>
                    <a href= "#"><i class="fab fa-linkedin-in"></i></a>
                </div>
                
            </div>
        </div>
    </div>
    
</footer>
</html>
    
    
</body>
</html>