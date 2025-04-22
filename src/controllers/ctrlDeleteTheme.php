<?php

deleteTheme($pdo, htmlspecialchars($_POST['themeId']));

header("Location: ?action=admin");