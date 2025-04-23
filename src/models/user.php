<?php

// Fonction pour récupérer un utilisateur à partir de son nom d'utilisateur
function getUserByUserName($pdo, $userName)
{
    // Requête pour chercher l'utilisateur par son nom
    $sql = "SELECT * FROM user_ WHERE userName = :userName";
    $stmt = $pdo->prepare($sql);

    // Exécution avec liaison du paramètre
    $stmt->execute(['userName' => $userName]);

    // Récupération du résultat
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Retourne les données ou NULL si non trouvé
    return $user ? $user : NULL;
}

// Fonction pour ajouter un nouvel utilisateur (inscription)
function addUserByEmail($pdo, $userName, $email, $password)
{
    // Requête d'insertion (mot de passe hashé)
    $sql = "INSERT INTO user_ (userName, email, password, role) VALUES (:userName, :email, :password, :role)";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'userName' => $userName,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT), // Hashage sécurisé
            'role' => 'user' // Role par défaut
        ]);
        $_SESSION['msg'] = ['level' => 'success', 'content' => 'Vous avez créé votre compte'];
    } catch (PDOException $e) {
        $_SESSION['msg'] = ['level' => 'warning', 'content' => ($e->getMessage())];
        return null;
    }
}

// Fonction pour modifier les infos de profil (nom + email)
function editProfile($pdo, $userId, $userName, $email)
{
    $sql = "UPDATE user_ SET userName = :userName, email = :email WHERE userId = :userId";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'userId' => $userId,
            'userName' => $userName,
            'email' => $email
        ]);
    } catch (PDOException $e) {
        $_SESSION['msg'] = ['level' => 'warning', 'content' => ($e->getMessage())];
        return null;
    }
}

// Fonction pour supprimer un utilisateur par son ID
function deleteProfile($pdo, $userId)
{
    $sql = "DELETE FROM user_ WHERE userId = :userId";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'userId' => $userId
        ]);
    } catch (PDOException $e) {
        $_SESSION['msg'] = ['level' => 'warning', 'content' => ($e->getMessage())];
        return null;
    }
}

// Fonction pour récupérer tous les utilisateurs (admin uniquement en général)
function getAllUser($pdo)
{
    $sql = "SELECT * FROM user_";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        $_SESSION['msg'] = ['level' => 'warning', 'content' => ($e->getMessage())];
        return null;
    }

    return $stmt->fetchAll(); // Retourne un tableau complet
}

// Fonction pour passer un utilisateur en administrateur
function upgradeUser($pdo, $userId)
{
    $sql = "UPDATE user_ SET role = 'admin' WHERE userId = :userId";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'userId' => $userId
        ]);
        $_SESSION['msg'] = ['level' => 'success', 'content' => 'Vous avez promu avec succès'];
    } catch (PDOException $e) {
        $_SESSION['msg'] = ['level' => 'warning', 'content' => ($e->getMessage())];
        return null;
    }
}

// Fonction pour rétrograder un administrateur en utilisateur normal
function downgradeUser($pdo, $userId)
{
    $sql = "UPDATE user_ SET role = 'user' WHERE userId = :userId";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'userId' => $userId
        ]);
        $_SESSION['msg'] = ['level' => 'success', 'content' => 'Vous avez rétrogradé avec succès'];
    } catch (PDOException $e) {
        $_SESSION['msg'] = ['level' => 'warning', 'content' => ($e->getMessage())];
        return null;
    }
}
