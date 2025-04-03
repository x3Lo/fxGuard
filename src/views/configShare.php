<h1>Configuration Share</h1>
<a href="./?action=configList">Retourner en arrière</a>
<br><br>

<?php

require_once RACINE.'/src/models/request.php';


foreach($configsList as $configList) {
    echo "Id : ".$configList['listConfigId']." "."<br>";
    echo "Nom : ".$configList['listName']." "."<br>";
    echo "Theme : ".$configList['themeName']." "."<br>";
    echo "Auteur : ".$configList['userId']." "."<br>";
    echo '<a href="?action=configView&configListId='.$configList['listConfigId'].'">Modifier</a>';
    ?>
    <br><br>
<?php }