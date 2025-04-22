<?php

downgradeUser($pdo, htmlspecialchars($_POST['userId']));

$_SESSION['msg'] = ['level' => 'success', 'content' => 'L\'utilisateur a bien été rétrogradé'];
header("Location: ?action=admin");