<?php 
    if (isset($_SESSION['msg'])) { 
        $classname = $_SESSION['msg']['level'];
        $content = $_SESSION['msg']['content'];
        echo "<div class='$classname'>$content</div>";
        // erase the message from SESSION
        unset($_SESSION['msg']);
    }
?>