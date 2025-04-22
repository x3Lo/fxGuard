<?php

$listConfigId = $_SESSION['listConfigId'];

addVehiculeToConfig(
    $pdo, 
    $_POST['name'], $_POST['brande'], $_POST['type'], $_POST['image'], $_POST['acceleration'], $_POST['topSpeed'], $_POST['handling'], $_POST['seat'], 
    $listConfigId);

unset($_SESSION['listConfigId']);

header ("Location: ?action=configView&configListId=".$listConfigId."");