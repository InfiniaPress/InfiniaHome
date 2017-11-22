
-- This is a fix for InnoDB in MySQL >= 4.1.x
-- It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- infiniausers
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `infiniausers`;

CREATE TABLE `infiniausers`
(
    `user_id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_name` VARCHAR(255) NOT NULL,
    `user_realname` VARCHAR(255) NOT NULL,
    `user_code` VARCHAR(255) NOT NULL,
    `user_email` VARCHAR(255) NOT NULL,
    `user_password` VARCHAR(255) NOT NULL,
    `user_isverified` TINYINT(1) DEFAULT 0 NOT NULL,
    `user_rank` TINYINT NOT NULL,
    PRIMARY KEY (`user_id`),
    CONSTRAINT `infiniausers_fk_2986c1`
        FOREIGN KEY (`user_id`)
        REFERENCES `infiniauser_status` (`userid`),
    CONSTRAINT `infiniausers_fk_67845d`
        FOREIGN KEY (`user_id`)
        REFERENCES `infiniasessions` (`userid`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- infiniaapplications
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `infiniaapplications`;

CREATE TABLE `infiniaapplications`
(
    `app_id` INTEGER NOT NULL AUTO_INCREMENT,
    `app_name` VARCHAR(255) NOT NULL,
    `app_url` TEXT NOT NULL,
    `app_publickey` TEXT NOT NULL,
    `app_privatekey` TEXT NOT NULL,
    `app_registerer` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`app_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- infiniauser_status
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `infiniauser_status`;

CREATE TABLE `infiniauser_status`
(
    `userid` INTEGER NOT NULL AUTO_INCREMENT,
    `status` TINYINT NOT NULL,
    `bannedtime` DATETIME,
    `banned_forever` TINYINT(1) DEFAULT 0,
    PRIMARY KEY (`userid`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- infiniasessions
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `infiniasessions`;

CREATE TABLE `infiniasessions`
(
    `userid` INTEGER NOT NULL AUTO_INCREMENT,
    `session_token` TEXT,
    PRIMARY KEY (`userid`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- infiniaconfiguration
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `infiniaconfiguration`;

CREATE TABLE `infiniaconfiguration`
(
    `key` VARCHAR(255) NOT NULL,
    `value` TEXT,
    PRIMARY KEY (`key`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- infiniaadmins
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `infiniaadmins`;

CREATE TABLE `infiniaadmins`
(
    `adminid` INTEGER NOT NULL AUTO_INCREMENT,
    `realname` VARCHAR(255) NOT NULL,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`adminid`)
) ENGINE=InnoDB;

-- This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
