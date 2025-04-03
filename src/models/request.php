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
                c.vehiculeSeat 
            FROM configuration c JOIN list_configuration lc ON c.listConfigId = lc.listConfigId JOIN theme t ON lc.themeId = t.themeId JOIN user_ u ON lc.userId = u.userId 
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