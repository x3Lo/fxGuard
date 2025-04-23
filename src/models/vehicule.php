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
    try {
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
        $_SESSION['msg'] = ['level' => 'success', 'content' => 'Véhicule ajouté'];
    } catch (PDOException $e) {
        $_SESSION['msg'] = ['level' => 'warning', 'content' => ($e->getMessage())];
        return null;
    }
}

function getVehiculeByName($pdo, $vehiculeName)
{
    $sql = "SELECT * FROM vehicule WHERE vehiculeName = :vehiculeName";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'vehiculeName' => $vehiculeName
        ]);
    } catch (PDOException $e) {
        $_SESSION['msg'] = ['level' => 'warning', 'content' => ($e->getMessage())];
        return null;
    }

    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Résultat complet avec tous les détails
}
