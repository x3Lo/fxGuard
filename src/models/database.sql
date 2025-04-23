-- CREATE DATABASE db_fxguard_test;
-- USE db_fxguard_test;

CREATE TABLE user_ (
   userId INT AUTO_INCREMENT,
   userName VARCHAR(50) NOT NULL,
   email VARCHAR(50) NOT NULL UNIQUE,
   password VARCHAR(100) NOT NULL,
   createAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   role VARCHAR(50) NOT NULL,
   PRIMARY KEY(userId)
);

CREATE TABLE theme (
   themeId INT AUTO_INCREMENT,
   themeName VARCHAR(50) NOT NULL UNIQUE,
   createAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(themeId)
);

CREATE TABLE configuration (
   listConfigId INT AUTO_INCREMENT,
   listName VARCHAR(50) NOT NULL,
   userId INT NOT NULL,
   themeId INT NOT NULL,
   share BOOLEAN NOT NULL,
   PRIMARY KEY(listConfigId),
   FOREIGN KEY(userId) REFERENCES user_(userId) ON DELETE CASCADE,
   FOREIGN KEY(themeId) REFERENCES theme(themeId) ON DELETE CASCADE
);

CREATE TABLE vehicule (
   vehiculeId INT AUTO_INCREMENT,
   vehiculeName VARCHAR(50) NOT NULL,
   vehiculeBrand VARCHAR(50) NOT NULL,
   vehiculeType VARCHAR(50) NOT NULL,
   vehiculeImage VARCHAR(300),
   vehiculeAcceleration DECIMAL(5,2),
   vehiculeTopSpeed DECIMAL(5,2),
   vehiculeHandling DECIMAL(5,2),
   vehiculeSeat INT NOT NULL,
   createAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(vehiculeId)
);

CREATE TABLE comment (
   commentId INT AUTO_INCREMENT,
   commentNote DECIMAL(2,0) NOT NULL CHECK (commentNote BETWEEN 0 AND 10),
   commentContent VARCHAR(450),
   createAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   userId INT NOT NULL,
   listConfigId INT NOT NULL,
   PRIMARY KEY(commentId),
   FOREIGN KEY(userId) REFERENCES user_(userId) ON DELETE CASCADE,
   FOREIGN KEY(listConfigId) REFERENCES configuration(listConfigId) ON DELETE CASCADE
);

CREATE TABLE composition(
   vehiculeId INT,
   listConfigId INT,
   createAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(vehiculeId, listConfigId),
   FOREIGN KEY(vehiculeId) REFERENCES vehicule(vehiculeId),
   FOREIGN KEY(listConfigId) REFERENCES configuration(listConfigId)
);

INSERT INTO user_ (userName, email, password, role)
VALUES ('admin', 'admin@example.com', '$2y$10$cypJjXGzKCgGW5VmmdySuuHM0MQ5ezcGPIXJWgHwGq8XIk81zjItS', 'admin');