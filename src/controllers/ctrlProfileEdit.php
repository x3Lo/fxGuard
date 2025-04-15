<?php
include RACINE . "/src/views/header.php";

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
} else {

    if (!isset($_POST['userName'])) {
        require RACINE . "/src/views/profileEdit.php";
        exit;
    }

    editProfile($pdo, $_SESSION['userId'], $_POST['userName'], $_POST['emaile']);

    $_SESSION['userName'] = $_POST['userName'];
    $_SESSION['msg'] = ['level' => 'success', 'content' => 'Vous avez bien modifié votre profil'];
    header("Location: ?action=profile");
    
}

include RACINE . "/src/views/footer.php";
