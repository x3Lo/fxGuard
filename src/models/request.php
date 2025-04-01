<?php

function getUserByUserId($pdo, $userId) {
    // Préparer la requête SQL pour récupérer l'utilisateur par userId
    $sql = "SELECT * FROM user_ WHERE userId = :userId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userId' => $userId]);

    // Récupérer l'utilisateur
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Retourner l'utilisateur si trouvé, sinon NULL
    return $user ? $user : NULL;
}

function addUserByEmail($pdo, $userId, $email, $password) {
    $sql = "INSERT INTO user_ (userId, email, password, role) VALUES (:userId, :email, :password, :role)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'userId' => $userId,
        'email' => $email,
        'password' => $password,
        'role' => 'user'
    ]);
}