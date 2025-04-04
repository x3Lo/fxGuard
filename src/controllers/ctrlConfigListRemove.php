<?php

rmConfigList($pdo, $_POST['listConfigId']);
header ("Location: ?action=configList");