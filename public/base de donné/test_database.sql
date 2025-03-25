

-- Insérer des utilisateurs
INSERT INTO user_ (userId, email, password, createAt, role) VALUES
('U001', 'user1@example.com', 'password1', NOW(), 'admin'),
('U002', 'user2@example.com', 'password2', NOW(), 'user'),
('U003', 'user3@example.com', 'password3', NOW(), 'user');

-- Insérer des configurations de véhicules
INSERT INTO configuration (vehiculeId, vehiculeName, vehiculeBrand, vehiculeType, vehiculeImage, vehiculeAcceleration, vehiculeTopSpeed, vehiculeHandling, vehiculeSeat, userId) VALUES
(1, 'Model S', 'Tesla', 'Electric', 'image1.jpg', 3.2, 250, 90.5, 5, 'U001'),
(2, 'Mustang', 'Ford', 'Sport', 'image2.jpg', 4.5, 300, 85.2, 4, 'U002'),
(3, 'Civic', 'Honda', 'Sedan', 'image3.jpg', 5.0, 220, 80.0, 5, 'U003');

-- Insérer des commentaires
INSERT INTO comment (commentId, commentNote, commentContent, createAt, userId, vehiculeId) VALUES
(1, 4.5, 'Super voiture !', NOW(), 'U001', 1),
(2, 3.8, 'Bonne accélération, mais un peu chère.', NOW(), 'U002', 2),
(3, 5.0, 'Parfaite pour la famille.', NOW(), 'U003', 3);

-- Insérer des logs d’activité
INSERT INTO log (logId, action, entityId, createAt) VALUES
(1, 'USER_CREATED', 'U001', NOW()),
(2, 'USER_CREATED', 'U002', NOW()),
(3, 'USER_CREATED', 'U003', NOW()),
(4, 'CONFIG_CREATED', '1', NOW()),
(5, 'CONFIG_CREATED', '2', NOW()),
(6, 'CONFIG_CREATED', '3', NOW()),
(7, 'COMMENT_ADDED', '1', NOW()),
(8, 'COMMENT_ADDED', '2', NOW()),
(9, 'COMMENT_ADDED', '3', NOW());

-- Tester les requêtes SQL

-- Nombre d'utilisateurs créés
SELECT COUNT(*) AS total_users FROM user_;

-- Lister toutes les configurations de véhicules
SELECT * FROM configuration;

-- Voir tous les commentaires avec les véhicules associés
SELECT c.commentId, c.commentNote, c.commentContent, c.createAt, u.email, v.vehiculeName
FROM comment c
JOIN user_ u ON c.userId = u.userId
JOIN configuration v ON c.vehiculeId = v.vehiculeId;

-- Voir les logs d’activité
SELECT * FROM log ORDER BY createAt DESC;

