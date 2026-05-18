<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?php
        
        if(isset($pageTitle)){

            echo $pageTitle . ' | NoLeak';

        } else {

            echo 'NoLeak';

        }

        ?>
    </title>

    <!-- GOOGLE FONT -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS -->

    <link rel="stylesheet" href="/NoLeak/assets/style.css">

</head>

<body>

<header class="navbar">

    <div class="navbar-inner">

        <!-- LOGO -->

        <a href="/NoLeak/index.php?page=home" class="logo">

            <span class="logo-blue">No</span>Leak

        </a>

        <!-- NAVIGATION -->

        <nav class="nav-links">

            <a href="/NoLeak/index.php?page=home">
                Accueil
            </a>

            <a href="/NoLeak/index.php?page=qcm">
                QCM
            </a>

            <a href="/NoLeak/index.php?page=resultat">
                Résultats
            </a>

            <a href="/NoLeak/index.php?page=about">
                À propos
            </a>

        </nav>

        <!-- BUTTONS -->

   <div class="nav-buttons">

        <?php if(isset($_SESSION['user'])): ?>

             <a href="/NoLeak/index.php?page=dashboard" class="btn-outline">
             Mon espace
            </a>

         <a href="/NoLeak/controllers/LogoutController.php" class="btn-primary">
                 Déconnexion
         </a>

     <?php else: ?>

            <?php if(!isset($_GET['page']) || $_GET['page'] != 'login'): ?>

             <a href="/NoLeak/index.php?page=login" class="btn-outline">
                Connexion
             </a>

             <?php endif; ?>



         <?php if(!isset($_GET['page']) || $_GET['page'] != 'register'): ?>

            <a href="/NoLeak/index.php?page=register" class="btn-primary">
                Inscription
            </a>

          <?php endif; ?>

     <?php endif; ?>

    </div>
 </div>

</header>

<!-- ========================= -->
<!-- PAGE CONTENT -->
<!-- ========================= -->

<main class="page-content">