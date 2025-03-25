CREATE DATABASE db_fxguard_test;
USE db_fxguard_test;

CREATE TABLE user_(
   userId VARCHAR(50) ,
   email VARCHAR(50)  NOT NULL,
   password VARCHAR(100)  NOT NULL,
   createAt DATETIME NOT NULL,
   role VARCHAR(50) ,
   PRIMARY KEY(userId),
   UNIQUE(email)
);

CREATE TABLE configuration(
   vehiculeId INT AUTO_INCREMENT,
   vehiculeName VARCHAR(50)  NOT NULL,
   vehiculeBrand VARCHAR(50)  NOT NULL,
   vehiculeType VARCHAR(50)  NOT NULL,
   vehiculeImage VARCHAR(300) ,
   vehiculeAcceleration DECIMAL(5,2)  ,
   vehiculeTopSpeed DECIMAL(5,2)  ,
   vehiculeHandling DECIMAL(5,2)  ,
   vehiculeSeat INT,
   userId VARCHAR(50)  NOT NULL,
   PRIMARY KEY(vehiculeId),
   FOREIGN KEY(userId) REFERENCES user_(userId)
);

CREATE TABLE comment(
   commentId INT AUTO_INCREMENT,
   commentNote DECIMAL(2,1)  ,
   commentContent VARCHAR(450) ,
   createAt DATETIME,
   userId VARCHAR(50)  NOT NULL,
   vehiculeId INT NOT NULL,
   PRIMARY KEY(commentId),
   FOREIGN KEY(userId) REFERENCES user_(userId),
   FOREIGN KEY(vehiculeId) REFERENCES configuration(vehiculeId)
);

CREATE TABLE log(
   logId INT AUTO_INCREMENT,
   action VARCHAR(50)  NOT NULL,
   entityId VARCHAR(50)  NOT NULL,
   createAt DATETIME NOT NULL,
   PRIMARY KEY(logId)
);
