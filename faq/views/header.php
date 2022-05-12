<header>
            <div id ="logoimg">
            <a  href="/appinfo/homepage/homepage.php"><img src="/appinfo/auth/img/logo_infinite.png" alt="logo"></a>
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
                <a href="/appinfo/memory/memory.php"><img src="/appinfo/memory/memoryim.png" alt="memory"></a>
            </div>
            <a class="cta" href= "/appinfo/auth/<?php  echo $editprofil?> "> <?php echo $title ?></a>

            <?php
           

           if(isset($_SESSION['type']) && ($_SESSION['type']) == "Administrateur"){
            
            ?>
            <a class="cta" href= "/appinfo/admin/admin.php">Admin</a>

            <?php }?>
        </header>