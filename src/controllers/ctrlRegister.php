<?php

require RACINE . "/src/views/header.php";


if (isset($_SESSION['userName'])) {
    $_SESSION['msg'] = ['level' => 'info', 'content' => 'Vous êtes déjà connecté en tant que "' . $_SESSION['userName'] . '". Déconnectez-vous avant.'];    header("Location: ?action=default");
    exit;
}





if (!isset($_POST['userName']) || !isset($_POST['password'])) {
    require RACINE . "/src/views/register.php";
    exit;
}



if (empty($_POST['userName']) || empty($_POST['email']) || empty($_POST['password'])) {
    $_SESSION['msg'] = ['level' => 'warning', 'content' => 'Tous les champs doivent être définis.'];
    header("Location: ?action=register");
    // require RACINE . "/src/views/register.php";
    exit;
}


require_once RACINE . "/src/models/request.php";

addUserByEmail($pdo, htmlspecialchars($_POST['userName']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']));
// $user = getUserByUserId($pdo, $_POST['login']);


$_SESSION['msg'] = ['level' => 'success', 'content' => 'Votre compte a bien été créé.'];

header("Location: ?action=login");

include RACINE . "/src/views/footer.php";
