DROP TABLE IF EXISTS Users;
CREATE TABLE Users (
  ID INT NOT NULL AUTO_INCREMENT,
  Login VARCHAR(30) NOT NULL,
  Email VARCHAR(255) NOT NULL,
  Password VARCHAR(100) NOT NULL,
  UserType VARCHAR (20) NOT NULL,
  IsValidated BIT NOT NULL DEFAULT 0,
  PRIMARY KEY (ID)
) DEFAULT CHARSET=utf8;
