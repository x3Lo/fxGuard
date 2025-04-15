<?php

deleteComment($pdo, $_POST['commentId']);

header("Location: ?action=profile"); 