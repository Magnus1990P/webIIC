
DROP DATABASE IF EXISTS webIIC;
CREATE DATABASE webIIC;

use webIIC;

CREATE TABLE image(
	AID			INTEGER(11) 	NOT NULL PRIMARY KEY AUTO_INCREMENT,
	ORG			VARCHAR(255)	NOT NULL UNIQUE,
	PATH		VARCHAR(255)	NOT NULL UNIQUE,
	COORD		VARCHAR(255)	NULL,
	CLASS		INTEGER(3)		DEFAULT -1,
	STATUS	INTEGER(3)		DEFAULT 0
);

