-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 08, 2018 at 08:38 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `narpavicsc`
--

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`) VALUES
(1, 'PAN Application'),
(2, 'Passport Application');

--
-- Dumping data for table `price_config`
--

INSERT INTO `price_config` (`price_config_id`, `service_id`, `amount`) VALUES
(1, 1, '130'),
(2, 2, '500');
