<?php

$listConfigId = $_SESSION['listConfigId'];

$vehiculeId = $_POST['vehiculeId'];
rmConfig($pdo, $vehiculeId);

unset($_SESSION['listConfigId']);


header ("Location: ?action=configView&configListId=".$listConfigId."");