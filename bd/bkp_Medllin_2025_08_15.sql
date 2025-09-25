-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bd loja_medllin
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bd loja_medllin
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bd loja_medllin` DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ;
USE `bd loja_medllin` ;

-- -----------------------------------------------------
-- Table `bd loja_medllin`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd loja_medllin`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NULL,
  `senha` VARCHAR(45) NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd loja_medllin`.`tipo_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd loja_medllin`.`tipo_produto` (
  `id_tipo_produto` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  PRIMARY KEY (`id_tipo_produto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd loja_medllin`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd loja_medllin`.`produto` (
  `id_produto` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  `valor_unitario` VARCHAR(45) NULL,
  `id_tipo_produto` INT NOT NULL,
  PRIMARY KEY (`id_produto`),
  INDEX `fk_produto_tipo_produto1_idx` (`id_tipo_produto` ASC) VISIBLE,
  CONSTRAINT `fk_produto_tipo_produto1`
    FOREIGN KEY (`id_tipo_produto`)
    REFERENCES `bd loja_medllin`.`tipo_produto` (`id_tipo_produto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd loja_medllin`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd loja_medllin`.`cliente` (
  `id_cliente` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `cpf` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `telefone` VARCHAR(45) NULL,
  PRIMARY KEY (`id_cliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd loja_medllin`.`venda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd loja_medllin`.`venda` (
  `id-venda` INT NOT NULL AUTO_INCREMENT,
  `data` TIMESTAMP NULL,
  `id_usuario` INT NOT NULL,
  `id_cliente` INT NOT NULL,
  PRIMARY KEY (`id-venda`),
  INDEX `fk_venda_usuario_idx` (`id_usuario` ASC) VISIBLE,
  INDEX `fk_venda_cliente1_idx` (`id_cliente` ASC) VISIBLE,
  CONSTRAINT `fk_venda_usuario`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `bd loja_medllin`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_venda_cliente1`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `bd loja_medllin`.`cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd loja_medllin`.`produto_has_venda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd loja_medllin`.`produto_has_venda` (
  `id_produto` INT NOT NULL,
  `id-venda` INT NOT NULL,
  `quantidade` INT NULL,
  `valor_unitario_venda` DECIMAL NULL,
  PRIMARY KEY (`id_produto`, `id-venda`),
  INDEX `fk_produto_has_venda_venda1_idx` (`id-venda` ASC) VISIBLE,
  INDEX `fk_produto_has_venda_produto1_idx` (`id_produto` ASC) VISIBLE,
  CONSTRAINT `fk_produto_has_venda_produto1`
    FOREIGN KEY (`id_produto`)
    REFERENCES `bd loja_medllin`.`produto` (`id_produto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto_has_venda_venda1`
    FOREIGN KEY (`id-venda`)
    REFERENCES `bd loja_medllin`.`venda` (`id-venda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
