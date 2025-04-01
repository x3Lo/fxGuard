<?php
require RACINE."/src/views/message.php";
?>
<h1>Configuration List</h1>
<div>
    <ul>
        <li><a href="./?action=configCreator">Créer sa configuration</a></li>
        <li><a href="./?action=configShare">Configurations partagées</a></li>
    </ul>
</div>
<?php

require_once RACINE.'/src/models/request.php';
