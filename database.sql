CREATE DATABASE IF NOT EXISTS `sun_son_solar` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `sun_son_solar`;

CREATE TABLE IF NOT EXISTS `users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(80) NOT NULL,
  `middle_name` VARCHAR(80) NULL,
  `last_name` VARCHAR(80) NOT NULL,
  `birthdate` DATE NULL,
  `gender` VARCHAR(30) NULL,
  `phone` VARCHAR(32) NULL,
  `address` VARCHAR(255) NULL,
  `username` VARCHAR(80) NULL,
  `email` VARCHAR(190) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `role` ENUM('customer','employee') NOT NULL DEFAULT 'customer',
  `department` VARCHAR(100) NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
