CREATE TABLE `sys`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(45) NULL,
  `email` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  `company_type` INT NULL,
  `phone` VARCHAR(45) NULL,
  `county_id` INT NULL,
  `first_name` VARCHAR(255) NULL,
  `last_name` VARCHAR(255) NULL,
  `paypal_email` VARCHAR(255) NULL,
  `company_name` VARCHAR(255) NULL,
  `tax_id` VARCHAR(255) NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `sys`.`county` (
  `county_id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  PRIMARY KEY (`county_id`));

CREATE TABLE `sys`.`lead` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NULL,
  `status` VARCHAR(45) NULL,
  `name` VARCHAR(255) NULL,
  `phone` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `company_type` INT NULL,
  `county_id` INT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `sys`.`lead_status_assoc` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `lead_id` INT NULL,
  `company_id` INT NULL,
  `status` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `sys`.`company_type` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  PRIMARY KEY (`id`));
