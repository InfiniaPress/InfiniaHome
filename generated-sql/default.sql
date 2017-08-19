
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
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
    PRIMARY KEY (`user_id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
