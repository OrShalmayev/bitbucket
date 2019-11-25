-- If Database already exists drop it
DROP DATABASE IF EXISTS sbcert_pop;
-- Create the database
CREATE DATABASE IF NOT EXISTS sbcert_pop CHARACTER SET utf8 COLLATE utf8_general_ci;
-- Use the database
USE sbcert_pop;
-- Create admin table
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(8) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);
-- insert to admin table
insert into admin(email, password, ip) VALUES ('admin@gmail.com', 'admin1234', '127.0.0.1');

--Create user Table
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(8) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` VARCHAR(255) NULL DEFAULT NULL,
  `last_name` VARCHAR(255) NULL DEFAULT NULL,
  `password` VARCHAR(255) NULL DEFAULT NULL
  `status` tinyint(4) NOT NULL,
  `token` varchar(255) NOT NULL,
  `patient_type` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
);