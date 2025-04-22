<?php

function addVehicule($pdo, $vehiculeName, $vehiculeBrand, $vehiculeType, $vehiculeImage, $vehiculeAcceleration, $vehiculeTopSpeed, $vehiculeHandling, $vehiculeSeat)
{
    $sql = "INSERT INTO vehicule (
        vehiculeName, 
        vehiculeBrand, 
        vehiculeType, 
        vehiculeImage, 
        vehiculeAcceleration, 
        vehiculeTopSpeed, 
        vehiculeHandling, 
        vehiculeSeat
    ) VALUES (
        :vehiculeName, 
        :vehiculeBrand, 
        :vehiculeType, 
        :vehiculeImage,
        :vehiculeAcceleration,
        :vehiculeTopSpeed,
        :vehiculeHandling,
        :vehiculeSeat
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
        'vehiculeSeat' => $vehiculeSeat
    ]);
}

function getVehiculeByName($pdo, $vehiculeName)
{
    $sql = "SELECT * FROM vehicule WHERE vehiculeName = :vehiculeName";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'vehiculeName' => $vehiculeName
    ]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Résultat complet avec tous les détails
}