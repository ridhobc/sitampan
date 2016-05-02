SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `prakom` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `prakom`;

-- -----------------------------------------------------
-- Table `prakom`.`customer`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `prakom`.`customer` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `first_name` VARCHAR(45) NULL ,
  `last_name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `prakom`.`address`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `prakom`.`address` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `customer_id` INT NULL ,
  `full_name` VARCHAR(45) NULL ,
  `address_line1` VARCHAR(200) NULL ,
  `address_line2` VARCHAR(200) NULL ,
  `city` VARCHAR(45) NULL ,
  `state` VARCHAR(45) NULL ,
  `postal_code` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_address_customer` (`customer_id` ASC) ,
  CONSTRAINT `fk_address_customer`
    FOREIGN KEY (`customer_id` )
    REFERENCES `prakom`.`customer` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
