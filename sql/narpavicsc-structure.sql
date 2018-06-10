-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2018 at 12:00 PM
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
  `receipt_file_name` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pan_application`
--

INSERT INTO `pan_application` (`application_no`, `status`, `application_date`, `application_type`, `pan_number`, `applicant_category`, `applicant_title`, `applicant_fname`, `applicant_mname`, `applicant_lname`, `father_fname`, `father_mname`, `father_lname`, `name_on_card`, `dob`, `contact_details`, `email`, `name_as_per_aadhaar`, `proof_of_id`, `proof_of_address`, `proof_of_dob`, `gender`, `aadhaar_no`, `flat_door_block_no`, `premises_building_village`, `road_street_lane_postoffice`, `area_taluk_subdivision`, `town_district`, `state_ut`, `pin_code`, `photo_file_name`, `signature_file_name`, `document_file_name`, `receipt_file_name`, `user_id`) VALUES
(1, 'Approved', '09/06/2018', 'New Application', '', 'Individual', 'Shri', 'Sanjith', 'Shan', '22', 'Daddy', 'Daddy', 'Daddy', 'Sanjith Shan', '02/02/1950', '9876543210', 'sanjithshan22@gmail.com', 'Sanjith Shan', 'Aadhar', 'Aadhar', 'Aadhaar', 'Male', '987654321010', '12', 'qqwwe', 'qqww', 'qwww', 'qqqqq', '2', '643217', '2_photo_20180609151611.jpg', '2_sign_20180609151611.jpeg', '2_doc_20180609151611.pdf', '1_receipt.pdf', 2),
(2, 'Denied', '09/06/2018', 'New Application', '', 'Individual', 'Shri', 'Sanjith', 'Shan', '22', 'Daddy', 'Daddy', 'Daddy', 'Sanjith Shan', '02/02/1950', '9876543210', 'sanjithshan22@gmail.com', 'Sanjith Shan', 'Aadhar', 'Aadhar', 'Aadhaar', 'Male', '987654321010', '12', 'qqwwe', 'qqww', 'qwww', 'qqqqq', '2', '643217', '2_photo_20180609151618.jpg', '2_sign_20180609151618.jpeg', '2_doc_20180609151618.pdf', '', 2),
(3, 'Approved', '09/06/2018', 'New Application', '', 'Individual', 'Shri', 'Sanjith', 'Shan', '22', 'Daddy', 'Daddy', 'Daddy', 'Sanjith Shan', '02/02/1950', '9876543210', 'sanjithshan22@gmail.com', 'Sanjith Shan', 'Aadhar', 'Aadhar', 'Aadhaar', 'Male', '987654321010', '12', 'qqwwe', 'qqww', 'qwww', 'qqqqq', '2', '643217', '2_photo_20180609152748.jpg', '2_sign_20180609152748.jpeg', '2_doc_20180609152748.pdf', '', 2),
(4, 'Approved', '09/06/2018', 'New Application', '', 'Individual', 'Shri', 'Sanjith', 'Shan', '', 'Daddy', 'Daddy', '', 'Sanjith Shan', '02/02/2000', '9876543210', 'sanjithshan22@gmail.com', 'Sanjith Shan', 'Aadhar', 'Aadhar', 'Aadhaar', 'Male', '983993933456', '12', '113', '1233', '1233', 'Kotagiri', '1', '643217', '2_photo_20180609162130.jpg', '2_sign_20180609162130.jpeg', '2_doc_20180609162130.pdf', '4_receipt.pdf', 2),
(5, 'Pending', '09/06/2018', 'New Application', '', 'Individual', 'Shri', 'Sanjith', 'Shan', '', 'Daddy', 'Daddy', '', 'Sanjith Shan', '02/02/2000', '9876543210', 'sanjithshan22@gmail.com', 'Sanjith Shan', 'Aadhar', 'Aadhar', 'Aadhaar', 'Male', '983993933456', '12', '113', '1233', '1233', 'Kotagiri', '1', '643217', '2_photo_20180609162147.jpg', '2_sign_20180609162147.jpeg', '2_doc_20180609162147.pdf', '', 2),
(6, 'Pending', '10/06/2018', 'New Application', '', 'Individual', 'Shri', 'dummy', 'd', 'dd', 'dummy', 'd', 'dd', 'dummy', '12/06/1994', '8190912853', 'rakshanakr@gmail.com', 'Deivaraja Ramasamy', 'Aadhar', 'Aadhar', 'Driving License', 'Male', '123455555555', 'qw1212', '#6/160, Riffle Range, Donnington', '#6/160, Riffle Range, Donnington', 'asasas', 'Kotagiri', '2', '643217', '2_photo_20180609183148.jpg', '2_sign_20180609183148.jpg', '2_doc_20180609183148.pdf', '', 2),
(7, 'Pending', '02/02/2020', 'New Application', '', 'Individual', 'Shri', 'dum', 'dum', 'dum', 'dum', 'dum', 'dum', 'nam', '02/02/2020', '9992020', 'sanjithshan22@gmail.com', 'dummy', 'Aadhar', 'Aadhar', 'Birth Certificate', 'Female', '987654321011', '11', '11', '11', '11', '11', '2', '111111', '2_photo_20180609183834.jpeg', '2_sign_20180609183834.jpeg', '2_doc_20180609183834.pdf', '', 2),
(8, 'Pending', '20/02/2020', 'New Application', '', 'Individual', 'Shri', 'test', 'test', '', 'test', '', 'Ramasamy', 'test', '03/03/2030', '777499', 'rram.ramasamy@gmail.com', 'ram', 'Aadhar', 'Aadhar', 'Aadhaar', 'Male', '778899992001', '223', 'Vadavalli', 'Vadavalli', '33', 'Coimbatore', '2', '641046', '2_photo_20180610121158.jpg', '2_sign_20180610121158.jpg', '2_doc_20180610121158.pdf', '', 2);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pan_application`
--
ALTER TABLE `pan_application`
  MODIFY `application_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pan_application`
--
ALTER TABLE `pan_application`
  ADD CONSTRAINT `pan_application_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
