-- MySQL Workbench Synchronization
-- Generated: 2020-01-20 10:29
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Willian

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `unidb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

CREATE TABLE IF NOT EXISTS `unidb`.`cliente` (
  `idcliente` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `nomecliente` VARCHAR(150) NULL DEFAULT NULL COMMENT '',
  `cpf` CHAR(11) NULL DEFAULT NULL COMMENT '',
  `email` VARCHAR(150) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`idcliente`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `unidb`.`produto` (
  `idproduto` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `nomeproduto` VARCHAR(250) NULL DEFAULT NULL COMMENT '',
  `valorunitario` DECIMAL(10,2) NULL DEFAULT NULL COMMENT '',
  `quantidade` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `codbarra` VARCHAR(20) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`idproduto`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `unidb`.`pedido` (
  `idpedido` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `numerodopedido` INT(11) NULL DEFAULT NULL COMMENT '',
  `dtpedido` VARCHAR(48) NULL DEFAULT NULL COMMENT '',
  `status` VARCHAR(48) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`idpedido`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `unidb`.`pedidoxprodutoxcliente` (
  `idpedidoxprodutoxcliente` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `idpedidofk` INT(11) NOT NULL COMMENT '',
  `idprodutofk` INT(11) NOT NULL COMMENT '',
  `idclientefk` INT(11) NOT NULL COMMENT '',
  `quantidadesolicitada` INT(11) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`idpedidoxprodutoxcliente`, `idpedidofk`, `idprodutofk`, `idclientefk`)  COMMENT '',
  INDEX `idpedido_idx` (`idpedidofk` ASC)  COMMENT '',
  INDEX `idproduto_idx` (`idprodutofk` ASC)  COMMENT '',
  INDEX `idcliente_idx` (`idclientefk` ASC)  COMMENT '',
  CONSTRAINT `idpedido`
    FOREIGN KEY (`idpedidofk`)
    REFERENCES `unidb`.`pedido` (`idpedido`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idproduto`
    FOREIGN KEY (`idprodutofk`)
    REFERENCES `unidb`.`produto` (`idproduto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idcliente`
    FOREIGN KEY (`idclientefk`)
    REFERENCES `unidb`.`cliente` (`idcliente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
