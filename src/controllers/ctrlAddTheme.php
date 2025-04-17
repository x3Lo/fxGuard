<?php

addTheme($pdo, $_POST['themeName']);

$_SESSION['msg'] = ['level' => 'success', 'content' => 'Le theme '.$_POST['themeName'].' a bien été ajouté'];
header("Location: ?action=admin");