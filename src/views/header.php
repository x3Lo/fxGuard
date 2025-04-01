<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fxGuard</title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="./?action=default">Accueil</a></li>
                <li><a href="./?action=configList">Configuations</a></li>
                <li><a href="./?action=contact">Contact</a></li>
                <li><a href="./?action=profile">Profil</a></li>
                <li><a href="./?action=login">Se Connecter</a></li>
                <li><a href="?action=logout">Se déconnecter</a></li>
                <li><a href="./?action=register">S'Inscrir</a></li>
            </ul>
        </nav>
    </header>

    <?php
    require RACINE . "/src/views/message.php";
    ?>