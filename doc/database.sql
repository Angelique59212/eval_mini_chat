-- MySQL Script generated by MySQL Workbench
-- Sun Mar 27 13:11:13 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema chat
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema chat
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `chat` DEFAULT CHARACTER SET utf8 ;
USE `chat` ;

-- -----------------------------------------------------
-- Table `chat`.`mdf58_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chat`.`mdf58_user` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(150) NOT NULL,
  `mdf58_email` VARCHAR(150) NOT NULL,
  `mdf58_password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chat`.`mdf58_message`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chat`.`mdf58_message` (
  `id` INT UNSIGNED NOT NULL,
  `content` TEXT NOT NULL,
  `mdf58_user_fk` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_message_mdf58_user_idx` (`mdf58_user_fk` ASC),
  CONSTRAINT `fk_message_mdf58_user`
    FOREIGN KEY (`mdf58_user_fk`)
    REFERENCES `chat`.`mdf58_user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
