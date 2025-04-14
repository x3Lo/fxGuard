<?php

function getUserByUserId($pdo, $userId)
{
    // Préparer la requête SQL pour récupérer l'utilisateur par userId
    $sql = "SELECT * FROM user_ WHERE userId = :userId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userId' => $userId]);

    // Récupérer l'utilisateur
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Retourner l'utilisateur si trouvé, sinon NULL
    return $user ? $user : NULL;
}

function addUserByEmail($pdo, $userId, $email, $password)
{
    $sql = "INSERT INTO user_ (userId, email, password, role) VALUES (:userId, :email, :password, :role)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'userId' => $userId,
        'email' => $email,
        'password' => $password,
        'role' => 'user'
    ]);
}

function getConfigListByUserId($pdo, $userId)
{
    $sql = "SELECT 
                lc.listConfigId, 
                lc.listName, 
                t.themeName, 
                u.userId
            FROM list_configuration lc JOIN user_ u ON lc.userId = u.userId JOIN theme t ON lc.themeId = t.themeId WHERE u.userId = :userId ORDER BY lc.listConfigId;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'userId' => $userId
    ]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// function getConfigForEdit($pdo, $listConfigId)
// {
//     $sql = "SELECT
//                 lc.listName, 
//                 lc.listConfigId, 
//                 t.themeName, 
//                 c.vehiculeId, 
//                 c.vehiculeName,
//                 c.vehiculeAcceleration,
//                 c.vehiculeBrand 
//             FROM list_configuration lc JOIN theme t ON lc.themeId = t.themeId JOIN configuration c ON lc.listConfigId = c.listConfigId WHERE lc.listConfigId = :listConfigId";
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute([
//         'listConfigId' => $listConfigId
//     ]);

//     return $stmt->fetchAll(PDO::FETCH_ASSOC);
// }

function getLastConfigListId($pdo)
{
    $sql = "SELECT listConfigId FROM list_configuration ORDER BY listConfigId DESC LIMIT 1;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchColumn();
}

function getConfig($pdo, $listConfigId)
{
    $sql = "SELECT 
                lc.listConfigId, 
                lc.listName, 
                lc.share, 
                t.themeName, 
                u.userId, 
                c.vehiculeId, 
                c.vehiculeName, 
                c.vehiculeBrand, 
                c.vehiculeType, 
                c.vehiculeTopSpeed, 
                c.vehiculeAcceleration, 
                c.vehiculeHandling, 
                c.vehiculeSeat, 
                c.vehiculeImage 
            FROM list_configuration lc LEFT JOIN configuration c ON c.listConfigId = lc.listConfigId JOIN theme t ON lc.themeId = t.themeId JOIN user_ u ON lc.userId = u.userId 
            WHERE lc.listConfigId = :listConfigId;";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'listConfigId' => $listConfigId
    ]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getConfigShareList($pdo)
{
    $sql = "SELECT 
                lc.listConfigId, 
                lc.listName, 
                t.themeName, 
                u.userId
            FROM list_configuration lc JOIN user_ u ON lc.userId = u.userId JOIN theme t ON lc.themeId = t.themeId WHERE lc.share = :share ORDER BY lc.listConfigId;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'share' => 1
    ]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getThemeName($pdo)
{
    $sql = "SELECT themeName, themeId FROM theme;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getThemeIdByName($pdo, $themeName)
{
    $sql = "SELECT themeId FROM theme WHERE themeName = :themeName;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'themeName' => $themeName
    ]);

    return $stmt->fetchColumn();
}

function createConfigList($pdo, $userId, $themeId, $share, $listName)
{
    $sql = "INSERT INTO list_configuration (userId, themeId, share, listName) VALUES (:userId, :themeId, :share, :listName)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'userId' => $userId,
        'themeId' => $themeId,
        'share' => $share,
        'listName' => $listName,
    ]);
}

function getAllConfigs($pdo)
{
    $sql = "SELECT DISTINCT vehiculeName, vehiculeBrand, vehiculeType, vehiculeImage, vehiculeAcceleration, vehiculeTopSpeed, vehiculeHandling, vehiculeSeat FROM configuration;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addConfigToConfigList($pdo, $vehiculeName, $vehiculeBrand, $vehiculeType, $vehiculeImage, $vehiculeAcceleration, $vehiculeTopSpeed, $vehiculeHandling, $vehiculeSeat, $listConfigId)
{
    $sql = "INSERT INTO configuration (
                vehiculeName, 
                vehiculeBrand, 
                vehiculeType, 
                vehiculeImage, 
                vehiculeAcceleration, 
                vehiculeTopSpeed, 
                vehiculeHandling, 
                vehiculeSeat, 
                listConfigId
            ) VALUES (
                :vehiculeName, 
                :vehiculeBrand, 
                :vehiculeType, 
                :vehiculeImage,
                :vehiculeAcceleration,
                :vehiculeTopSpeed,
                :vehiculeHandling,
                :vehiculeSeat,
                :listConfigId
            );";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'vehiculeName' => $vehiculeName,
        'vehiculeBrand' => $vehiculeBrand,
        'vehiculeType' => $vehiculeType,
        'vehiculeImage' => $vehiculeImage,
        'vehiculeAcceleration' => $vehiculeAcceleration,
        'vehiculeTopSpeed' => $vehiculeTopSpeed,
        'vehiculeHandling' => $vehiculeHandling,
        'vehiculeSeat' => $vehiculeSeat,
        'listConfigId' => $listConfigId,
    ]);
}

function rmConfig($pdo, $vehiculeId)
{
    $sql = "DELETE FROM configuration WHERE vehiculeId = :vehiculeId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'vehiculeId' => $vehiculeId
    ]);
}

function rmConfigList($pdo, $listConfigId)
{
    $sql = "DELETE FROM list_configuration WHERE listConfigId = :listConfigId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'listConfigId' => $listConfigId
    ]);
}

function getCommentById($pdo, $listConfigId)
{
    $sql = "SELECT * FROM comment WHERE listConfigId = :listConfigId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'listConfigId' => $listConfigId
    ]);

    return $stmt->fetchAll();
}

function getNoteMoyenneById($pdo, $listConfigId)
{
    $sql = "SELECT AVG(commentNote) FROM comment WHERE listConfigId = :listConfigId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'listConfigId' => $listConfigId
    ]);

    return $stmt->fetchAll();
}