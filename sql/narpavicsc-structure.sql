-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2018 at 07:21 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `narpavicsc`
--

-- --------------------------------------------------------

--
-- Table structure for table `pan_application`
--

CREATE TABLE `pan_application` (
  `application_no` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `application_date` varchar(10) NOT NULL,
  `application_type` varchar(20) NOT NULL,
  `pan_number` varchar(10) DEFAULT NULL,
  `applicant_category` varchar(20) NOT NULL,
  `applicant_title` varchar(15) NOT NULL,
  `applicant_fname` varchar(30) NOT NULL,
  `applicant_mname` varchar(30) NOT NULL,
  `applicant_lname` varchar(30) NOT NULL,
  `father_fname` varchar(30) NOT NULL,
  `father_mname` varchar(30) NOT NULL,
  `father_lname` varchar(30) NOT NULL,
  `name_on_card` varchar(50) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `contact_details` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name_as_per_aadhaar` varchar(50) NOT NULL,
  `proof_of_id` varchar(30) NOT NULL,
  `proof_of_address` varchar(30) NOT NULL,
  `proof_of_dob` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `aadhaar_no` varchar(12) NOT NULL,
  `flat_door_block_no` varchar(100) NOT NULL,
  `premises_building_village` varchar(100) NOT NULL,
  `road_street_lane_postoffice` varchar(100) NOT NULL,
  `area_taluk_subdivision` varchar(100) NOT NULL,
  `town_district` varchar(50) NOT NULL,
  `state_ut` varchar(50) NOT NULL,
  `pin_code` varchar(7) NOT NULL,
  `photo_file_name` varchar(500) NOT NULL,
  `signature_file_name` varchar(500) NOT NULL,
  `document_file_name` varchar(500) NOT NULL,
  `receipt_path` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `price_config`
--

CREATE TABLE `price_config` (
  `price_config_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `amount` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_type` varchar(10) NOT NULL DEFAULT 'AGENT',
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `aadhaar_no` varchar(12) NOT NULL,
  `pan_no` varchar(10) NOT NULL,
  `address` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `user_location` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `wallet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_requests`
--

CREATE TABLE `wallet_requests` (
  `request_id` int(11) NOT NULL,
  `to_bank_name` varchar(50) NOT NULL,
  `transaction_type` varchar(20) NOT NULL,
  `request_amount` varchar(15) NOT NULL,
  `request_date` varchar(10) NOT NULL,
  `bank_name` varchar(30) NOT NULL,
  `reference_no` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `wallet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_transactions`
--

CREATE TABLE `wallet_transactions` (
  `transaction_id` int(11) NOT NULL,
  `date_time` varchar(20) NOT NULL,
  `description` varchar(150) NOT NULL,
  `previous_balance` varchar(15) NOT NULL,
  `transaction_type` varchar(6) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `balance` varchar(15) NOT NULL,
  `wallet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pan_application`
--
ALTER TABLE `pan_application`
  ADD PRIMARY KEY (`application_no`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `price_config`
--
ALTER TABLE `price_config`
  ADD PRIMARY KEY (`price_config_id`),
  ADD UNIQUE KEY `service_id` (`service_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`wallet_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `wallet_requests`
--
ALTER TABLE `wallet_requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `wallet_id` (`wallet_id`);

--
-- Indexes for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `wallet_id` (`wallet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pan_application`
--
ALTER TABLE `pan_application`
  MODIFY `application_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `price_config`
--
ALTER TABLE `price_config`
  MODIFY `price_config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wallet_requests`
--
ALTER TABLE `wallet_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pan_application`
--
ALTER TABLE `pan_application`
  ADD CONSTRAINT `pan_application_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `price_config`
--
ALTER TABLE `price_config`
  ADD CONSTRAINT `price_config_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`);

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `wallet_requests`
--
ALTER TABLE `wallet_requests`
  ADD CONSTRAINT `wallet_requests_ibfk_1` FOREIGN KEY (`wallet_id`) REFERENCES `wallet` (`wallet_id`);

--
-- Constraints for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  ADD CONSTRAINT `wallet_transactions_ibfk_1` FOREIGN KEY (`wallet_id`) REFERENCES `wallet` (`wallet_id`);
