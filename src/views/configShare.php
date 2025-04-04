<h1>Configuration Share</h1>
<a href="./?action=configList">Retourner en arrière</a>
<br><br>

<?php

require_once RACINE . '/src/models/request.php';

// var_dump($configsList);
// exit;

foreach ($configsList as $configList) {
    if ($configList['userId'] == $_SESSION['userId']) {
        echo "Id : " . $configList['listConfigId'] . " " . "<br>";
        echo "Nom : " . $configList['listName'] . " " . "<br>";
        echo "Theme : " . $configList['themeName'] . " " . "<br>";
        echo "Auteur : " . $configList['userId'] . " " . "<br>";
        echo '<a href="?action=configView&configListId=' . $configList['listConfigId'] . '">Modifier</a>';
?>
        <br><br>
    <?php } else {
        echo "Id : " . $configList['listConfigId'] . " " . "<br>";
        echo "Nom : " . $configList['listName'] . " " . "<br>";
        echo "Theme : " . $configList['themeName'] . " " . "<br>";
        echo "Auteur : " . $configList['userId'] . " " . "<br>";
        echo '<a href="?action=configView&configListId=' . $configList['listConfigId'] . '">Voir</a>';
    ?>
        <br><br>
<?php
    }
}
