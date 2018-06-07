-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2018 at 04:56 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `narpavicsc`
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `name`, `email`, `password`, `mobile`, `aadhaar_no`, `pan_no`, `address`, `status`, `user_location`) VALUES
(1, 'ADMIN', 'Ramu Ramasamy', 'rram.ramasamy@gmail.com', '$2y$12$eKyduenWfZjQQLBTgJU/9u0V9XGDQot54zWrhtehhnaRCpkT0NssC', '9894130821', '123456789010', 'BDKPR6053E', 'No. 11, Annai Velankanni Nagar, Thondamuthur Road', 'Approved', NULL);
