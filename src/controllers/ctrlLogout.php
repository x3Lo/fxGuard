<?php
if (!(isset($_SESSION['userId']))) {
    $_SESSION['msg']=['level'=> 'warning', 'content' => 'Vous devez être connecté pour vous déconnecter'];
}


if (isset($_SESSION['userId'])) {
    /* only if already logd in */
    /* keep the session alive to report messages */
    /* but remove all things that identify the user */
    $_SESSION['msg']=['level'=> 'info', 'content' => 'Bye '.$_SESSION['userId'].'! You are logged out.'];

    // unset($_SESSION['pseudo']);
    // unset($_SESSION['admin']);
    unset($_SESSION['userId']);
    // unset($_SESSION['admin']);

}

header ("Location: ?action=default");     // logout is achieved. Go to the landing page (home)
exit;