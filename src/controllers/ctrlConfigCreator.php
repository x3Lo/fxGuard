<?php
include(RACINE . "/src/views/header.php");

// is the user already logged ?
if (!(isset($_SESSION['userId']))) {
    $_SESSION['msg'] = ['level' => 'warning', 'content' => 'Vous devez être connecté pour accéder à cette page'];

    /* 
       It should not happen if all restricted accesses are corectly hidden or disable.
       If it does, it means that routes are being violated.
       Thus, forbidden routes must be closed as soon as possible : the router is probably the best place 
       to do this. So, redirecting to the home page is appropriate.
    */

    header("Location: ?action=default");   // access forbidden; immediatly redirected to home page.
    exit;                               // exit is mandatory to abort the current script and update the $_SESSION; Especially 
    // useful if the current script has not been completed.
}

$themes = getThemeName($pdo);

if (empty($_POST['themeName']) || empty($_POST['listName'])) {
    $_SESSION['msg'] = ['level' => 'warning', 'content' => 'Tous les champs doivent être définis.'];
    require RACINE . "/src/views/configCreator.php";
    exit;
}


$themeId = getThemeIdByName($pdo, $_POST['themeName']);
$share = isset($_POST['share']) ? 1 : 0; // Si non coché, valeur = 0


addConfig($pdo, $_SESSION['userId'], $themeId, $share, $_POST['listName']);


// include(RACINE . "/src/views/footer.php");



$lastConfigList = getLastConfigListId($pdo);

$_SESSION['msg']=['level'=> 'success', 'content' => 'Vous avez bien créé une nouvelle configuration.'];
header ('Location: ?action=configView&configListId='.$lastConfigList.'');