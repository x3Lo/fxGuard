<?php

// Récupère toutes les configurations (listes) créées par un utilisateur spécifique
function getConfigListByUserId($pdo, $userId)
{
    $sql = "SELECT 
                lc.listConfigId, 
                lc.listName, 
                t.themeName, 
                u.userId,
                u.userName
            FROM configuration lc 
            JOIN user_ u ON lc.userId = u.userId 
            JOIN theme t ON lc.themeId = t.themeId 
            WHERE u.userId = :userId 
            ORDER BY lc.listConfigId;"; // Tri par ID de config pour garder un ordre
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'userId' => $userId
    ]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retourne un tableau associatif
}

// Récupère l'ID de la dernière configuration créée
function getLastConfigListId($pdo)
{
    $sql = "SELECT listConfigId FROM configuration ORDER BY listConfigId DESC LIMIT 1;"; // Dernier ID par ordre décroissant
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchColumn(); // Retourne une seule colonne : l'ID
}

// Récupère une configuration complète (avec détails véhicules, thème et utilisateur)
function getConfig($pdo, $listConfigId)
{

    $sql = "SELECT 
                c.listConfigId, 
                c.listName, 
                c.share, 
                t.themeName, 
                u.userId, 
                u.userName, 
                v.vehiculeId, 
                v.vehiculeName, 
                v.vehiculeBrand, 
                v.vehiculeType, 
                v.vehiculeTopSpeed, 
                v.vehiculeAcceleration, 
                v.vehiculeHandling, 
                v.vehiculeSeat, 
                v.vehiculeImage 
            FROM configuration c
            LEFT JOIN composition compo ON c.listConfigId = compo.listConfigId
            LEFT JOIN vehicule v ON v.vehiculeId = compo.vehiculeId 
            LEFT JOIN theme t ON c.themeId = t.themeId 
            LEFT JOIN user_ u ON c.userId = u.userId 
            WHERE c.listConfigId = :listConfigId;"; // Récupère toutes les infos d'une configuration

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'listConfigId' => $listConfigId
        ]);
    }
    catch (PDOException $e) {
        $_SESSION['msg'] = ['level' => 'warning', 'content' => ($e->getMessage())];
        return null;
    }

    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Résultat complet avec tous les détails
}

// Récupère les configurations partagées (où share = 1)
function getConfigShareList($pdo)
{
    $sql = "SELECT 
                lc.listConfigId, 
                lc.listName, 
                t.themeName, 
                u.userId, 
                u.userName
            FROM configuration lc 
            JOIN user_ u ON lc.userId = u.userId 
            JOIN theme t ON lc.themeId = t.themeId 
            WHERE lc.share = :share 
            ORDER BY lc.listConfigId;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'share' => 1 // Partagées uniquement
    ]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Crée une nouvelle configuration (liste) dans la base
function addConfig($pdo, $userId, $themeId, $share, $listName)
{
    $sql = "INSERT INTO configuration (userId, themeId, share, listName) 
            VALUES (:userId, :themeId, :share, :listName)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'userId' => $userId,
        'themeId' => $themeId,
        'share' => $share,
        'listName' => $listName,
    ]);
}

// Récupère toutes les configurations de véhicules (distincts)
function getAllConfigs($pdo)
{
    $sql = "SELECT DISTINCT vehiculeName, vehiculeBrand, vehiculeType, vehiculeImage, vehiculeAcceleration, vehiculeTopSpeed, vehiculeHandling, vehiculeSeat FROM vehicule;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Résultats sans doublons
}

// Ajoute un véhicule à une liste de configuration
function addVehiculeToConfig(
    $pdo, 
    $vehiculeName, $vehiculeBrand, $vehiculeType, $vehiculeImage, $vehiculeAcceleration, $vehiculeTopSpeed, $vehiculeHandling, $vehiculeSeat, 
    $listConfigId)
{
    $vehicule = getVehiculeByName($pdo, $vehiculeName);
    if (empty($vehicule)) {
        addVehicule(
            $pdo, 
            $vehiculeName, $vehiculeBrand, $vehiculeType, $vehiculeImage, $vehiculeAcceleration, $vehiculeTopSpeed, $vehiculeHandling, $vehiculeSeat);
        $vehicule = getVehiculeByName($pdo, $vehiculeName);
    }

    $sql = "INSERT INTO composition (vehiculeid, listConfigId)
            VALUES (
                :vehiculeId, 
                :listConfigId
            );";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'vehiculeId' => $vehicule[0]['vehiculeId'],
        'listConfigId' => $listConfigId
    ]);
}

// Supprime un véhicule d'une configuration selon son ID
function rmVehiculeToConfig($pdo, $vehiculeId, $listConfigId)
{
    $sql = "DELETE FROM composition WHERE vehiculeId = :vehiculeId AND listConfigId = :listConfigId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'vehiculeId' => $vehiculeId,
        'listConfigId' => $listConfigId
    ]);
}

// Supprime une configuration complète (liste) par son ID
function rmConfigList($pdo, $listConfigId)
{
    $sql = "DELETE FROM configuration WHERE listConfigId = :listConfigId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'listConfigId' => $listConfigId
    ]);
}