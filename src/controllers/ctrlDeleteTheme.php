<?php

deleteTheme($pdo, $_POST['themeId']);

$_SESSION['msg'] = ['level' => 'success', 'content' => 'Le theme '.$_POST['themeName'].' a bien été supprimé'];
header("Location: ?action=admin");