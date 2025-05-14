<?php

rmComment($pdo, htmlspecialchars($_POST['commentId']));

header("Location: ?action=profile"); 