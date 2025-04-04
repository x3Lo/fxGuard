<h1>Configuration List</h1>
<div>
    <ul>
        <li><a href="./?action=configCreator">Crée une configuration</a></li>
        <li><a href="./?action=configShare">Configurations partagées</a></li>
    </ul>
</div>
<h2>Configurations :</h2>
<?php

require_once RACINE.'/src/models/request.php';


foreach($configsList as $configList) {
    echo "Id : " . $configList['listConfigId'] . " " . "<br>";
    echo "Nom : " . $configList['listName'] . " " . "<br>";
    echo "Theme : " . $configList['themeName'] . " " . "<br>";
    echo "Auteur : " . $configList['userId'] . " " . "<br>";
    echo '<a href="?action=configView&configListId=' . $configList['listConfigId'] . '">Modifier</a>';
    echo '<form action="?action=configListRemove" method="post">';
        echo '<input id="listConfigId" name="listConfigId" value="' . $configList['listConfigId'] . '" hidden>';
        echo '<button>Supprimer</button>';
    echo '</form>';
    ?>
    <br><br>
<?php }