-- -----------------------------------------------------
-- Table `capacitacaosql`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `capacitacaosql`.`users` ;

CREATE TABLE IF NOT EXISTS `capacitacaosql`.`users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `age` INT UNSIGNED NOT NULL,
  `insurance` BOOLEAN NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idusers_UNIQUE` (`id` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `capacitacaosql`.`active_principle`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `capacitacaosql`.`active_principle` ;

CREATE TABLE IF NOT EXISTS `capacitacaosql`.`active_principle` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `capacitacaosql`.`medicines`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `capacitacaosql`.`medicines` ;

CREATE TABLE IF NOT EXISTS `capacitacaosql`.`medicines` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `generic` BOOLEAN NULL,
  `active_principle_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC),
  INDEX `fk_medicines_active_principle_idx` (`active_principle_id` ASC),
  CONSTRAINT `fk_medicines_active_principle`
    FOREIGN KEY (`active_principle_id`)
    REFERENCES `capacitacaosql`.`active_principle` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `capacitacaosql`.`user_needs_medicine`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `capacitacaosql`.`user_needs_medicine` ;

CREATE TABLE IF NOT EXISTS `capacitacaosql`.`user_needs_medicine` (
  `users_id` INT UNSIGNED NOT NULL,
  `medicines_id` INT UNSIGNED NOT NULL,
  INDEX `fk_user_needs_medicine_users1_idx` (`users_id` ASC),
  INDEX `fk_user_needs_medicine_medicines1_idx` (`medicines_id` ASC),
  CONSTRAINT `fk_user_needs_medicine_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `capacitacaosql`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_needs_medicine_medicines1`
    FOREIGN KEY (`medicines_id`)
    REFERENCES `capacitacaosql`.`medicines` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
