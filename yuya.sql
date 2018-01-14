use yuya;

-- DROP TABLE `group`;
CREATE TABLE `party`
(
    `id` INT(32) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `info` VARCHAR(256),
    `date` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB, CHARSET=utf8;

INSERT INTO `party`(info) VALUES('Test Group');


//-----------------------------------------------------------------

-- DROP TABLE `user`;
CREATE TABLE `user`
(
    `id` INT(32) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `party` INT(32) NOT NULL,
    `nickName` CHAR(32) NOT NULL,
    `avatarUrl` VARCHAR(256) NOT NULL,
    `date` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB, CHARSET=utf8;

INSERT INTO `user`(party, nickName, avatarUrl) VALUES(1, 'Alex', 'alex.url');
