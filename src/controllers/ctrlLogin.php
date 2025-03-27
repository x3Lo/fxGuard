<?php

include_once RACINE.'/src/views/header.php';

if (empty($_POST['login']) || empty($_POST['password']))
{
    // $_SESSION['msg']=['level'=> 'warning', 'content' => 'Both login and password must be set.'];
    require "./src/views/login.php";
    exit;
}

require_once (RACINE.'/src/models/request.php');

$user = getUserByUserId ($pdo, $_POST['login']);
if (($user == null) || ($_POST['password'] != $user['password'])) {
    require RACINE."/src/views/login.php";
    exit;
}
/* successfull login */
$_SESSION['login'] = $_POST['login'];

header ("Location: ?action=configList");     // login is achieved. Go to the landing page (home)