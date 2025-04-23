<?php

require RACINE . "/src/views/header.php";

// if the user applying is already logged in
if (isset($_SESSION['userName'])) {
    $_SESSION['msg'] = ['level' => 'info', 'content' => 'Vous êtes déjà connecté en tant que "' . $_SESSION['userName'] . '". Déconnectez-vous avant.'];
    header("Location: ?action=configList");
    exit;                           // end of script  
}

// if not already is logged in

/* read the POST parameters */
/* if there are no POST parameters, it means that it is the first page loading */
if (!isset($_POST['login']) || !isset($_POST['login'])) {
    require RACINE . "/src/views/login.php";    // stay on the same page
    require RACINE . "/src/views/footer.php";
    exit;                               // end of script
}

/* at that time, it is login form submission */
/* is one of the input fields empty ? */
if (empty($_POST['login']) || empty($_POST['password'])) {
    $_SESSION['msg'] = ['level' => 'warning', 'content' => 'Les identifiants et le mot de passe doivent être définis.'];
    header("Location: ?action=login");
    exit;
}

/* everthing seems fine to evaluate authentication */

require_once RACINE . "/src/models/request.php";

$user = getUserByUserName($pdo, htmlspecialchars($_POST['login']));
if (!$user || !password_verify(htmlspecialchars($_POST['password']), $user['password'])) {
    $_SESSION['msg'] = ['level' => 'warning', 'content' => 'Login ou mot de passe est incorrect.'];
    header("Location: ?action=login");
    exit;
}

/* successfull login */
$_SESSION['userId'] = $user['userId'];
$_SESSION['userName'] = $user['userName'];
$_SESSION['email'] = $user['email'];
$_SESSION['role'] = $user['role'];
$_SESSION['date'] = $user['createAt'];
$_SESSION['msg'] = ['level' => 'success', 'content' => 'Bonjour ' . $user['userName'] . ' ! Vous êtes connecté.'];


header("Location: ?action=configList");     // login is achieved. Go to the landing page (home)