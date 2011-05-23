SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `ride_with_us` ;
CREATE SCHEMA IF NOT EXISTS `ride_with_us` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `ride_with_us` ;

-- -----------------------------------------------------
-- Table `ride_with_us`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ride_with_us`.`user` ;

CREATE  TABLE IF NOT EXISTS `ride_with_us`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(100) NOT NULL ,
  `password` VARCHAR(100) NOT NULL ,
  `fname` VARCHAR(100) NULL ,
  `lname` VARCHAR(100) NULL ,
  `is_admin` TINYINT(1)  NULL DEFAULT 0 ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `user_name_UNIQUE` (`username` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ride_with_us`.`route`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ride_with_us`.`route` ;

CREATE  TABLE IF NOT EXISTS `ride_with_us`.`route` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `displacement` FLOAT NULL DEFAULT NULL ,
  `distance` FLOAT NULL DEFAULT NULL ,
  `start` VARCHAR(255) NOT NULL ,
  `end` VARCHAR(255) NOT NULL ,
  `additional_info` VARCHAR(255) NULL DEFAULT NULL ,
  `route_url` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ride_with_us`.`ride_event`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ride_with_us`.`ride_event` ;

CREATE  TABLE IF NOT EXISTS `ride_with_us`.`ride_event` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `when_datetime` DATETIME NULL ,
  `additional_info` VARCHAR(45) NULL ,
  `owner` INT NOT NULL ,
  `route` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_ride_event_user` (`owner` ASC) ,
  INDEX `fk_ride_event_route1` (`route` ASC) ,
  CONSTRAINT `fk_ride_event_user`
    FOREIGN KEY (`owner` )
    REFERENCES `ride_with_us`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ride_event_route1`
    FOREIGN KEY (`route` )
    REFERENCES `ride_with_us`.`route` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ride_with_us`.`user_has_ride_event`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ride_with_us`.`user_has_ride_event` ;

CREATE  TABLE IF NOT EXISTS `ride_with_us`.`user_has_ride_event` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `ride_event_id` INT NOT NULL ,
  INDEX `fk_user_has_ride_event_ride_event1` (`ride_event_id` ASC) ,
  INDEX `fk_user_has_ride_event_user1` (`user_id` ASC) ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_user_has_ride_event_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `ride_with_us`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_ride_event_ride_event1`
    FOREIGN KEY (`ride_event_id` )
    REFERENCES `ride_with_us`.`ride_event` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ride_with_us`.`image`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ride_with_us`.`image` ;

CREATE  TABLE IF NOT EXISTS `ride_with_us`.`image` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `path` VARCHAR(255) NOT NULL ,
  `route_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_image_route1` (`route_id` ASC) ,
  CONSTRAINT `fk_image_route1`
    FOREIGN KEY (`route_id` )
    REFERENCES `ride_with_us`.`route` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ride_with_us`.`comment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ride_with_us`.`comment` ;

CREATE  TABLE IF NOT EXISTS `ride_with_us`.`comment` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `created_at` TIMESTAMP NULL DEFAULT NOW() ,
  `body` MEDIUMTEXT  NOT NULL ,
  `author` INT NOT NULL ,
  `about` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_comment_user1` (`author` ASC) ,
  INDEX `fk_comment_ride_event1` (`about` ASC) ,
  CONSTRAINT `fk_comment_user1`
    FOREIGN KEY (`author` )
    REFERENCES `ride_with_us`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comment_ride_event1`
    FOREIGN KEY (`about` )
    REFERENCES `ride_with_us`.`ride_event` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
