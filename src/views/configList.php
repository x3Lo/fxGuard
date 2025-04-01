<h1>Configuration List</h1>
<div>
    <ul>
        <li><a href="./?action=configCreator">Créer sa configuration</a></li>
        <li><a href="./?action=configShare">Configurations partagées</a></li>
    </ul>
</div>
<h2>Configurations :</h2>
<?php
foreach($configs as $config) {
    echo $config['vehiculeName'];
    echo $config['vehiculeBrand'];
    echo $config['vehiculeType'];
    ?><br><?php
}


require_once RACINE.'/src/models/request.php';
