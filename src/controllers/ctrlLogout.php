<?php
if (isset($_SESSION['login'])) {
    /* only if already logd in */
    /* keep the session alive to report messages */
    /* but remove all things that identify the user */
    // $_SESSION['msg']=['level'=> 'info', 'content' => 'Bye '.$_SESSION['pseudo'].'! You are logged out.'];

    // unset($_SESSION['pseudo']);
    // unset($_SESSION['admin']);
    unset($_SESSION['login']);
}

header ("Location: ?action=default");     // logout is achieved. Go to the landing page (home)
exit;