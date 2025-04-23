<?php

// Récupère tous les noms et IDs des thèmes disponibles
function getThemeName($pdo)
{
    $sql = "SELECT themeName, themeId FROM theme;";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        $_SESSION['msg'] = ['level' => 'warning', 'content' => ($e->getMessage())];
        return null;
    }

    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retourne sous forme de tableau associatif
}

// Récupère l'ID d'un thème à partir de son nom
function getThemeIdByName($pdo, $themeName)
{
    $sql = "SELECT themeId FROM theme WHERE themeName = :themeName;";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'themeName' => $themeName
        ]);
    } catch (PDOException $e) {
        $_SESSION['msg'] = ['level' => 'warning', 'content' => ($e->getMessage())];
        return null;
    }

    return $stmt->fetchColumn(); // Retourne uniquement l'ID (colonne simple)
}

// Récupère tous les thèmes (toutes les colonnes)
function getAllTheme($pdo)
{
    $sql = "SELECT * FROM theme";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        $_SESSION['msg'] = ['level' => 'warning', 'content' => ($e->getMessage())];
        return null;
    }

    return $stmt->fetchAll(); // Pas en mode associatif ici (tu peux le mettre si besoin)
}

// Ajoute un nouveau thème en base de données
function addTheme($pdo, $themeName)
{
    $sql = "INSERT INTO theme (
                themeName
            ) VALUE (
                :themeName
            );";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'themeName' => $themeName
        ]);
        $_SESSION['msg'] = ['level' => 'success', 'content' => 'Thème ajouté avec succès'];

    } catch (PDOException $e) {
        $_SESSION['msg'] = ['level' => 'warning', 'content' => ($e->getMessage())];
        return null;
    }
}

// Supprime un thème selon son ID
function deleteTheme($pdo, $themeId)
{
    $sql = "DELETE FROM theme WHERE themeId = :themeId";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'themeId' => $themeId
        ]);

        $_SESSION['msg'] = ['level' => 'success', 'content' => 'Le theme ' . $_POST['themeName'] . ' a bien été supprimé'];
    } catch (PDOException $e) {
        $_SESSION['msg'] = ['level' => 'warning', 'content' => ($e->getMessage())];
        return null;
    }
}
