-- Create Database
CREATE DATABASE IF NOT EXISTS `arbyhairdesign`;
USE `arbyhairdesign`;

-- Create Bookings Table
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `service_requested` varchar(255) NOT NULL,
  `preferred_date` date NOT NULL,
  `special_requests` text,
  `status` enum('pending','confirmed','rejected') NOT NULL DEFAULT 'pending',
  `assigned_date` date DEFAULT NULL,
  `assigned_time` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create Education Subscribers Table
CREATE TABLE IF NOT EXISTS `education_subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `subscribed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
