<?php

// Récupère les commentaires liés à un listConfigId, avec les infos de l'utilisateur associé
function getCommentById($pdo, $listConfigId)
{
    $sql = "SELECT 
                c.commentId, 
                c.commentNote, 
                c.commentContent, 
                c.createAt, 
                c.listConfigId, 
                u.userId, 
                u.userName 
            FROM comment c 
            JOIN user_ u ON c.userId = u.userId 
            WHERE listConfigId = :listConfigId"; // Filtre sur l'ID de la configuration
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'listConfigId' => $listConfigId
    ]);

    return $stmt->fetchAll(); // Retourne tous les résultats
}

// Calcule la moyenne des notes pour un listConfigId donné
function getNoteMoyenneById($pdo, $listConfigId)
{
    $sql = "SELECT AVG(commentNote) FROM comment WHERE listConfigId = :listConfigId"; // Utilise AVG pour la moyenne
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'listConfigId' => $listConfigId
    ]);

    return $stmt->fetchAll(); // Retourne la moyenne (dans un tableau)
}

// Ajoute un nouveau commentaire à la base de données
function postComment($pdo, $note, $content, $userId, $listConfigId)
{
    $sql = "INSERT INTO comment (
                commentNote,
                commentContent,
                userId,
                listConfigId
            ) VALUES (  -- ⚠️ Correction : VALUE → VALUES
                :note,
                :content,
                :userId,
                :listConfigId
            );";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'note' => $note,
        'content' => $content,
        'userId' => $userId,
        'listConfigId' => $listConfigId,
    ]);
}

// Récupère tous les commentaires faits par un utilisateur donné
function getCommentByUserId($pdo, $userId)
{
    $sql = "SELECT * FROM comment WHERE userId = :userId"; // Filtre sur l'ID utilisateur
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'userId' => $userId
    ]);

    return $stmt->fetchAll(); // Retourne tous les commentaires de cet utilisateur
}

// Supprime un commentaire selon son ID
function deleteComment($pdo, $commentId)
{
    $sql = "DELETE FROM comment WHERE commentId = :commentId"; // Suppression ciblée
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'commentId' => $commentId
    ]);
}