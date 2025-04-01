<?php

require RACINE."/src/views/header.php";

// if the user applying is already logged in
if (isset($_SESSION['userId'])) {
    $_SESSION['msg']=['level'=> 'info', 'content' => 'You are already logged in as "'.$_SESSION['userId'].'". Log out before.'];
    require RACINE."/src/views/configList.php";    
    exit;                           // end of script  
}

// if not already is logged in

/* read the POST parameters */
/* if there are no POST parameters, it means that it is the first page loading */
if (!isset($_POST['login']) || !isset($_POST['login'])) {
    require RACINE."/src/views/login.php";    // stay on the same page
    exit;                               // end of script
}

/* at that time, it is login form submission */
/* is one of the input fields empty ? */
if (empty($_POST['login']) || empty($_POST['password']))
{
    $_SESSION['msg']=['level'=> 'warning', 'content' => 'Both login and password must be set.'];
    require RACINE."/src/views/login.php";
    exit;
}

/* everthing seems fine to evaluate authentication */

require_once (RACINE."/src/models/request.php");

$user = getUserByUserId ($pdo, $_POST['login']);
if (($user == null) || ($_POST['password'] != $user['password'])) {
    $_SESSION['msg']=['level'=> 'warning', 'content' => 'Login or password is wrong.'];
    require RACINE."/src/views/login.php";
    exit;
}

/* successfull login */
$_SESSION['userId'] = $user['userId'];
$_SESSION['role'] = $user['role'];
$_SESSION['msg']=['level'=> 'success', 'content' => 'Hi '.$user['userId'].'! You are logged in.'];


header ("Location: ?action=configList");     // login is achieved. Go to the landing page (home)