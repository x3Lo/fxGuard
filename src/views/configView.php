<h1>Configuration View</h1>
<a href="./?action=configList">Retourner en arrière</a>
<br><br><br>

<?php

var_dump($configs);
exit;

echo '<h2>Nom de la configuration : '.$configs[0]['listName'].'</h2>';
echo '<h3>Catégorie : '.$configs[0]['themeName'].'</h3>';
echo '<h4>Confidentialité : '.$share.'</h4>';
echo '<h4>Auteur : '.$configs[0]['userId'].'</h4>';

// foreach($configs as $config) {
//     echo '<p>Nom : '.$config['vehiculeName'].'</p>';
    // echo '<p>Marque :'.$config['vehiculeBrand'].'</p>';
    // echo '<p>Type : '.$config['vehiculeType'].'</p>';
    // echo '<p>Accélération : '.$config['vehiculeAcceleration'].'</p>';
    // echo '<p>Vittesse max : '.$config['vehiculeTopSpeed'].' km/h</p>';
    // echo '<p>Maniabilité : '.$config['vehiculeHandling'].'</p>';
    // echo '<p>Place(s) : '.$config['vehiculeSeat'].'</p>';
//     ?><br><br><?php
// }