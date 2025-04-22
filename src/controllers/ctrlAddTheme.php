<?php

addTheme($pdo, htmlspecialchars($_POST['themeName']));

$_SESSION['msg'] = ['level' => 'success', 'content' => 'Le theme '.htmlspecialchars($_POST['themeName']).' a bien été ajouté'];
header("Location: ?action=admin");