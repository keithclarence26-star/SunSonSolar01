USE `sun_son_solar`;

-- Run once on an existing Sun Son Solar database. New installations can use
-- database.sql, which already contains these columns.
ALTER TABLE `users`
  ADD COLUMN `birth_date` DATE NULL AFTER `last_name`,
  ADD COLUMN `gender` ENUM('female','male','prefer_not_to_say') NULL AFTER `birth_date`,
  ADD COLUMN `phone_number` VARCHAR(25) NULL AFTER `email`;

-- The supplied profiles are imported as employees. Password hashes are
-- deliberately not supplied here: assign secure credentials through an
-- authorized account-management process before enabling either account.
INSERT INTO `users`
  (`first_name`, `middle_name`, `last_name`, `birth_date`, `gender`, `email`, `phone_number`, `password`, `role`, `department`)
VALUES
  ('Katherine', 'Olap', 'Sinagaraw', '1990-07-01', 'female', 'katherine.sinagaraw@sunsolar.com', '09291230983', '!', 'employee', NULL),
  ('Sol', 'Sun', 'Solis', '1967-01-08', 'male', 'solis.solis@sunsolar.com', '09291230983', '!', 'employee', NULL)
ON DUPLICATE KEY UPDATE
  `first_name` = VALUES(`first_name`),
  `middle_name` = VALUES(`middle_name`),
  `last_name` = VALUES(`last_name`),
  `birth_date` = VALUES(`birth_date`),
  `gender` = VALUES(`gender`),
  `phone_number` = VALUES(`phone_number`),
  `role` = VALUES(`role`);
