<h1>Configuration View</h1>
<a href="./?action=configList">Retourner en arrière</a>
<br><br><br>

<?php

echo '<h2>Nom de la configuration : ' . $configs[0]['listName'] . '</h2>';
echo '<h3>Catégorie : ' . $configs[0]['themeName'] . '</h3>';
echo '<h4>Confidentialité : ' . $share . '</h4>';
echo '<h4>Auteur : ' . $configs[0]['userId'] . '</h4>';

if (isset($configs[0]['vehiculeName'])) {
    foreach ($configs as $config) {
        if ($config['userId'] == $_SESSION['userId']) {
            echo '<img src="' . $config['vehiculeImage'] . '" alt="Un(e) ' . $config['vehiculeName'] . ', vehicule GTA 5.">';
            echo '<p>Nom : ' . $config['vehiculeName'] . '</p>';
            echo '<p>Marque :' . $config['vehiculeBrand'] . '</p>';
            echo '<p>Type : ' . $config['vehiculeType'] . '</p>';
            echo '<p>Accélération : ' . $config['vehiculeAcceleration'] . '</p>';
            echo '<p>Vittesse max : ' . $config['vehiculeTopSpeed'] . ' km/h</p>';
            echo '<p>Maniabilité : ' . $config['vehiculeHandling'] . '</p>';
            echo '<p>Place(s) : ' . $config['vehiculeSeat'] . '</p>';
            echo '<form action="?action=configRemove" method="post">';
            echo '<input id="vehiculeId" name="vehiculeId" value="' . $config['vehiculeId'] . '" hidden>';
            echo '<button>Supprimer</button>';
            echo '</form>';
        } else {
            echo '<img src="' . $config['vehiculeImage'] . '" alt="Un(e) ' . $config['vehiculeName'] . ', vehicule GTA 5.">';
            echo '<p>Nom : ' . $config['vehiculeName'] . '</p>';
            echo '<p>Marque :' . $config['vehiculeBrand'] . '</p>';
            echo '<p>Type : ' . $config['vehiculeType'] . '</p>';
            echo '<p>Accélération : ' . $config['vehiculeAcceleration'] . '</p>';
            echo '<p>Vittesse max : ' . $config['vehiculeTopSpeed'] . ' km/h</p>';
            echo '<p>Maniabilité : ' . $config['vehiculeHandling'] . '</p>';
            echo '<p>Place(s) : ' . $config['vehiculeSeat'] . '</p>';
        }
?>
        <br><br>
    <?php
    }
} else {
    echo '<p>Aucun vehicule ajouté.</p>';
}

if ($configs[0]['userId'] == $_SESSION['userId']) { ?>
    <h2><button id="loadScriptButton">Ajouter des vehicules</button></h2>
    <input type="text" id="search" placeholder="Rechercher un véhicule...">
    <ul id="vehicle-list"></ul>
<?php }
