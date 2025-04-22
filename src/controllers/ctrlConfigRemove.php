<?php

$listConfigId = $_SESSION['listConfigId'];

$vehiculeId = $_POST['vehiculeId'];
rmVehiculeToConfig($pdo, $vehiculeId, $listConfigId);

unset($_SESSION['listConfigId']);


header ("Location: ?action=configView&configListId=".$listConfigId."");