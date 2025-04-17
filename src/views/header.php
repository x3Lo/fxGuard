<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fxGuard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <?php if (isset(($_GET['action']))) {
        if ($_GET['action'] == 'configView') { ?>
            <script src="public/scripts/scripts.js" defer></script>
    <?php }
    } ?>
    <script src="public/scripts/menuBurger.js" defer></script>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <header>
        <nav id="bandeau">
            <h2><a id="logo" href="./?action=default">fxGuard</a></h2>
            <a href="#"><i class="fa-solid fa-bars"></i></a>
            <div id="menuburger">
                <ul>
                    <li id="xmark1"><a href="#"><i class="fa-solid fa-xmark"></i></a></li>
                    <li><a href="./?action=default">Accueil<i class="fa-solid fa-chevron-right"></i></a></li>
                    <li><a href="./?action=contact">Contact<i class="fa-solid fa-chevron-right"></i></a></li>
                    <?php
                    if (isset($_SESSION['userId'])) {
                    ?>
                        <li><a href="./?action=configList">Configuations<i class="fa-solid fa-chevron-right"></i></a></li>
                        <li><a href="./?action=profile">Profil<i class="fa-solid fa-chevron-right"></i></a></li>
                        <li><a href="?action=logout">Se déconnecter<i class="fa-solid fa-chevron-right"></i></a></li>

                        <?php if ($_SESSION['role'] == 'admin') { ?>
                            <li><a href="./?action=admin">Administration<i class="fa-solid fa-chevron-right"></i></a></li>
                        <?php } ?>
                    <?php
                    } else {
                    ?>
                        <li><a href="./?action=login">Se connecter<i class="fa-solid fa-chevron-right"></i></a></li>
                        <li><a href="./?action=register">S'Inscrire<i class="fa-solid fa-chevron-right"></i></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <div id="menu">
                <ul>
                    <li><a class="active" href="./?action=default">Accueil</a></li>
                    <li><a href="./?action=contact">Contact</a></li>
                    <?php
                    if (isset($_SESSION['userId'])) {
                    ?>
                        <li><a href="./?action=configList">Configurations</a></li>
                        <li><a href="./?action=profile">Profil</a></li>
                        <li><a href="?action=logout">Se déconnecter</a></li>

                        <?php if ($_SESSION['role'] == 'admin') { ?>
                            <li><a href="./?action=admin">Administration</a></li>
                        <?php } ?>
                    <?php
                    } else {
                    ?>
                        <li><a href="./?action=login">Se Connecter</a></li>
                        <li><a href="./?action=register">S'Inscrire</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <div id="menu-overlay"></div>
        </nav>
    </header>

    <?php
    require RACINE . "/src/views/message.php";
    ?>