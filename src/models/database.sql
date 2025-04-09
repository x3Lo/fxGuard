CREATE DATABASE db_fxguard_test;
USE db_fxguard_test;

CREATE TABLE user_ (
   userId VARCHAR(50),
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

CREATE TABLE list_configuration (
   listConfigId INT AUTO_INCREMENT,
   listName VARCHAR(50) NOT NULL,
   userId VARCHAR(50) NOT NULL,
   themeId INT NOT NULL,
   share BOOLEAN NOT NULL,
   createAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(listConfigId),
   FOREIGN KEY(userId) REFERENCES user_(userId) ON DELETE CASCADE,
   FOREIGN KEY(themeId) REFERENCES theme(themeId) ON DELETE CASCADE
);

CREATE TABLE configuration (
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
   listConfigId INT NOT NULL,
   PRIMARY KEY(vehiculeId),
   FOREIGN KEY(listConfigId) REFERENCES list_configuration(listConfigId) ON DELETE CASCADE
);

CREATE TABLE comment (
   commentId INT AUTO_INCREMENT,
   commentNote DECIMAL(2,1) NOT NULL CHECK (commentNote BETWEEN 0 AND 10),
   commentContent VARCHAR(450),
   createAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   userId VARCHAR(50) NOT NULL,
   vehiculeId INT NOT NULL,
   PRIMARY KEY(commentId),
   FOREIGN KEY(userId) REFERENCES user_(userId) ON DELETE CASCADE,
   FOREIGN KEY(vehiculeId) REFERENCES configuration(vehiculeId) ON DELETE CASCADE
);