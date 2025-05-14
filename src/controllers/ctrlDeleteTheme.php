<?php

rmTheme($pdo, htmlspecialchars($_POST['themeId']));

header("Location: ?action=admin");