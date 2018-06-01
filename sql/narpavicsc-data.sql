-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2018 at 04:03 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `narpavicsc`
--

--
-- Dumping data for table `pan_application`
--

INSERT INTO `pan_application` (`application_no`, `status`, `application_date`, `application_type`, `pan_number`, `applicant_category`, `applicant_title`, `applicant_fname`, `applicant_mname`, `applicant_lname`, `father_fname`, `father_mname`, `father_lname`, `name_on_card`, `dob`, `contact_details`, `email`, `name_as_per_aadhaar`, `proof_of_id`, `proof_of_address`, `proof_of_dob`, `gender`, `aadhaar_no`, `flat_door_block_no`, `premises_building_village`, `road_street_lane_postoffice`, `area_taluk_subdivision`, `town_district`, `state_ut`, `pin_code`, `photo_path`, `signature_path`, `document_path`, `receipt_path`, `user_id`) VALUES
(1, 'PENDING', '02/02/2020', 'New Application', '', 'Individual', 'Shri', 'a', 'a', 'a', 'a', 'a', 'a', 'dummy', '03/03/2030', '99899', 'r@r.com', 'ram', 'Aadhar', 'Aadhar', 'Aadhaar', 'Male', '989928989898', '11', '111', '111', '111', '111', '1', '641044', 'store/photos/2_989928989898_photo.jpg', 'store/signatures/2_989928989898_sign.jpg', 'store/documents/2_989928989898_doc.pdf', '', 2);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `name`, `email`, `password`, `mobile`, `aadhaar_no`, `pan_number`, `address`, `status`, `user_location`) VALUES
(1, 'ADMIN', 'Ramu Ramasamy', 'rram.ramasamy@gmail.com', '$2y$12$eKyduenWfZjQQLBTgJU/9u0V9XGDQot54zWrhtehhnaRCpkT0NssC', '9894130821', '123456789010', 'BDKPR6053E', 'No. 11, Annai Velankanni Nagar, Thondamuthur Road', 'APPROVED', NULL),
(2, 'AGENT', 'Ramas', 'ramuramasamy93@gmail.com', '$2y$12$K75t/fX7iFa2U1gr5LgPF.td68u7RObSmiWN3jbRSbZZA.tHMX59S', '9894130821', '989413082121', 'BDKPR6053E', 'No. 11, Annai Velankanni Nagar, Thondamuthur Road', 'APPROVED', NULL);

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`wallet_id`, `user_id`, `amount`) VALUES
(1, 1, '0'),
(2, 2, '500');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
