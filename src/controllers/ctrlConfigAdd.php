<?php

$listConfigId = $_SESSION['listConfigId'];

addVehiculeToConfig(
    $pdo, 
    htmlspecialchars($_POST['name']), htmlspecialchars($_POST['brande']), htmlspecialchars($_POST['type']), htmlspecialchars($_POST['image']), htmlspecialchars($_POST['acceleration']), htmlspecialchars($_POST['topSpeed']), htmlspecialchars($_POST['handling']), htmlspecialchars($_POST['seat']), 
    $listConfigId);

unset($_SESSION['listConfigId']);

header ("Location: ?action=configView&configListId=".$listConfigId."");