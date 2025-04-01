<?php

require RACINE . "/src/views/header.php";


if ((isset($_SESSION['userId']))) {
    $_SESSION['msg'] = ['level' => 'warning', 'content' => 'Vous devez être déconnecter pour vous inscrir.'];
    header("Location: ?action=default");   // access forbidden; immediatly redirected to home page.
    exit;
}





if (!isset($_post['userId']) || !isset($_POST['password'])) {
    require RACINE . "/src/views/register.php";
    exit;
}



if (empty($_POST['userId']) || empty($_POST['email']) || empty($_POST['password'])) {
    $_SESSION['msg'] = ['level' => 'warning', 'content' => 'Tous les champs doivent être définis.'];
    header("Location: ?action=register");
    // require RACINE . "/src/views/register.php";
    exit;
}



require_once RACINE . "/src/models/request.php";

addUserByEmail($pdo, $_POST['userId'], $_POST['email'], $_POST['password']);
// $user = getUserByUserId($pdo, $_POST['login']);


// $_SESSION['msg'] = ['level' => 'success', 'content' => 'Votre compte a bien été créé.'];

// header("Location: ?action=login");

include RACINE . "/src/views/footer.php";