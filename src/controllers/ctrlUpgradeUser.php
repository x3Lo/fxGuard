<?php

upgradeUser($pdo, htmlspecialchars($_POST['userId']));

$_SESSION['msg'] = ['level' => 'success', 'content' => 'L\'utilisateur a bien été promu'];
header("Location: ?action=admin");