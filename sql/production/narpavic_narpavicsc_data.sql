-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 19, 2018 at 08:03 AM
-- Server version: 10.1.31-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `narpavic_narpavicsc`
--

--
-- Dumping data for table `pan_application`
--

INSERT INTO `pan_application` (`application_no`, `wallet_transaction_id`, `status`, `application_date`, `application_type`, `pan_number`, `applicant_category`, `applicant_title`, `applicant_fname`, `applicant_mname`, `applicant_lname`, `father_fname`, `father_mname`, `father_lname`, `name_on_card`, `dob`, `contact_details`, `email`, `name_as_per_aadhaar`, `proof_of_id`, `proof_of_address`, `proof_of_dob`, `gender`, `aadhaar_no`, `flat_door_block_no`, `premises_building_village`, `road_street_lane_postoffice`, `area_taluk_subdivision`, `town_district`, `state_ut`, `pin_code`, `photo_file_name`, `signature_file_name`, `document_file_name`, `receipt_file_name`, `user_id`) VALUES
(1, NULL, 'Approved', '02/07/2018', 'Correction/Change', 'AAFPE6582N', 'Individual', 'Shri', 'ELANGOVAN', '', '', 'SWAMINATHAN', '', '', 'ELANGOVAN SWAMINATHAN', '15/03/1963', '9442767659', 'bnstechmannai@gmail.com', 'ELANGOVAN SWAMINATHAN', 'Aadhar', 'Aadhar', 'Aadhaar', 'Male', '205928294697', '33', 'EB NAGAR', 'MANNARGUDI', 'MANNARGUDI', 'THIRUVARUR', '29', '614001', '7_photo_20180702194144.JPG', '7_sign_20180702194144.Jpg', '7_doc_20180702194144.Pdf', '', 7),
(3, NULL, 'Approved', '03/07/2018', 'Correction/Change', 'AKVPD3899D', 'Individual', 'Shri', 'DHARMARAJAN', '', '', 'RAJENDRAN', '', '', 'DHARMARAJAN RAJENDRAN', '07/02/1983', '9940283447', 'bnstechmannai@gmail.com', 'DHARMARAJAN RAJENDRAN', 'Aadhar', 'Aadhar', 'Aadhaar', 'Male', '294883105000', '41/1', 'MIDDLE STREET', 'SOLAPANDI', 'TALAYAMANGALAM', 'THIRUVARUR', '29', '614016', '7_photo_20180703184411.JPG', '7_sign_20180703184411.Jpg', '7_doc_20180703184411.pdf', '', 7),
(4, 7, 'Pending', '09/07/2018', 'New Application', '', 'Individual', 'Kumari/Ms', 'GAYATHRI M', '', '', 'MURUGAN', '', '', 'GAYATHRI M', '26/05/1992', '9585739570', 'srimmsmobiles@gmail.com', 'GAYATHRI M', 'Aadhar', 'Aadhar', 'Aadhaar', 'Female', '451374711143', '323', 'RAMAR KOVIL STREET NEWMINNUR', 'MINNUR', 'AMBUR', 'VELLORE', '29', '635807', '23_photo_20180709184350.Jpg', '23_sign_20180709184350.Jpg', '23_doc_20180709184350.pdf', '', 23),
(5, 10, 'Approved', '17/07/2018', 'New Application', '', 'Individual', 'Shri', 'YOGANATHAN', '', '', 'RAKKAIYAN', '', '', 'YOGANATHAN RAKKIYAN', '10/05/1967', '9488202993', 'bnstechmannai@gmail.com', 'YOGANATHAN RAKKIYAN', 'Aadhar', 'Aadhar', 'Aadhaar', 'Male', '452050440199', '2/132', 'NADU THERU', 'SERANKULAM', 'MANNARGUDI', 'THIRUVARUR', '29', '614016', '7_photo_20180717185133.Jpg', '7_sign_20180717185133.Jpg', '7_doc_20180717185133.pdf', '', 7),
(6, 10, 'Approved', '17/07/2018', 'Correction/Change', 'AGPPR1231F', 'Individual', 'Shri', 'RAVICHANDRAN', '', '', 'SACHIDANADHAM', '', '', 'RAVICHANDRAN SACHIDANADHAM', '04/06/1966', '9488202993', 'bnstechmannai@gmail.com', 'RAVICHANDRAN SACHIDANADHAM', 'Aadhar', 'Aadhar', 'Aadhaar', 'Male', '725431882089', '7/1188', 'MIDDLE STREET', 'PERUMAL KOVIL NATHAM', 'THIRUMAKKOTTAI-1', 'THIRUVARUR', '29', '614017', '7_photo_20180717191153.Jpg', '7_sign_20180717191153.Jpg', '7_doc_20180717191153.pdf', '', 7),
(7, 10, 'Approved', '17/07/2018', 'Correction/Change', 'BCQPA9176G', 'Individual', 'Smt/Mrs', 'ARULMOZHI', '', '', 'GURUNATHAN', '', '', 'ARULMOZHI PAZHANIVEL', '12/04/1961', '9488202993', 'bnstechmannai@gmail.com', 'ARULMOZHI PAZHANIVEL', 'Aadhar', 'Aadhar', 'Aadhaar', 'Female', '410509469709', '4/105', 'SOUTH STREET', 'MELATHIRUPPALAKUDI', 'THIRUPALAKUDI-1', 'THIRUVARUR', '29', '614018', '7_photo_20180717192344.Jpg', '7_sign_20180717192344.Jpg', '7_doc_20180717192344.pdf', '', 7);

--
-- Dumping data for table `price_config`
--

INSERT INTO `price_config` (`price_config_id`, `service_id`, `amount`) VALUES
(1, 1, '130'),
(2, 2, '1500'),
(3, 3, '2000'),
(4, 4, '1000'),
(5, 5, '2000');

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`) VALUES
(1, 'PAN Application'),
(2, 'Passport Application - Fresh/Reissue - 36 Pages'),
(3, 'Passport Application - Fresh/Reissue - 60 Pages'),
(4, 'Passport Application - Minors - Fresh/Reissue - 36'),
(5, 'Passport Application - Tatkal');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `name`, `email`, `password`, `mobile`, `aadhaar_no`, `pan_no`, `address`, `status`, `user_location`) VALUES
(1, 'ADMIN', 'Radhakrishnan Rajendran', 'arulmiguratha@gmail.com', '$2y$12$bhxZa3rdrKIRgOtwYaTAQ.abKDQwFNYFJPLdThbu/A7up8Hzo5OsO', '9894621511', '111111111111', 'ABCDEFG123', 'Madurai Melur', 'Approved', NULL),
(2, 'AGENT', 'Sanjith', 'sanjithshan22@gmail.com', '$2y$12$voVbV0UkCvzzr4OEvKtz4Ozb/uQD4gtzTzOFljsFWV9lJsiBImADW', '9495354887', '111111111111', '1111111111', '28/118 A,KHILS, THONDAYAD,\r\nCHEVARAMBALAM(P.O)', 'Approved', 'Chennai, Tamil Nadu, India.'),
(3, 'AGENT', 'bhuvanesh', 'bhuvanesh1122@gmail.com', '$2y$12$q7i1lLzxgHD/WwjSFSReZOeZBBk28.CXODL93QWeAw9GlrSK1e0KS', '7708442465', '123654789012', '1234567890', 'kh', 'Approved', 'Coimbatore, Tamil Nadu, India.'),
(4, 'AGENT', 'VENKATESHWARI', 'venkat090797@gmail.com', '$2y$12$UN8P3fa4H9/BWRaucCewQuOnYXinScGFAzIB6I37bSoAKOucGVsom', '7094348911', '239794302877', 'AIXPN8172H', '1/58 uranganptti, melur. madurai', 'Approved', 'Coimbatore, Tamil Nadu, India.'),
(5, 'AGENT', 'tharanitharan', 'narpavi666@gmail.com', '$2y$12$cMBr1cBrwEmZI97wdaYYZOkE3SK0Gbnx6Hv4XKCjvcImGAhWxZB72', '8940149900', '123456987032', '4561237890', 'j', 'Approved', 'Tiruchi, Tamil Nadu, India.'),
(6, 'AGENT', 'M S VASUDEVAN', '1svrxerox@gmail.com', '$2y$12$Ek.1c4.WStq9t83EuLcF0OHA4BBlqdRO8F0Uu6EBD.aAYnEdAEdam', '8190839903', '226515938470', 'AJMPV1876G', '238 KANGHIVANAM COMPLEX MELUR MADURAI 625106', 'Approved', 'Kochi, Kerala, India.'),
(7, 'AGENT', 'BALASUBRAMANIAN L', 'sribalupriya@gmail.com', '$2y$12$/.2U3iLWAlAG3UjVX4.uyOtbrvx26Y0kOsjArb56FQFbG9M3jnrPi', '9500509980', '821294644383', 'BDRPB2067H', 'B.N.S Tech\r\n45D,NORTH STREET,GOPALASAMUTHIRAM\r\nMANNARGUDI   614001', 'Approved', 'Bengaluru, Karnataka, India.'),
(8, 'AGENT', 'PAZHANIYANDI A', 'pazhanijob1039@gmail.com', '$2y$12$Z63m4cJQBNJOEmpLvf9HLOAXB5odfZaUdAQ6nHPZ6C02H87gji3Nu', '9843281039', '656437909203', 'DGSPP2612A', '1/1 chettiyar street S.Aduthurai Post Kunnam Taluka Perambalur Dit', 'Approved', 'Chennai, Tamil Nadu, India.'),
(9, 'AGENT', 'VETRIVEL PG', 'ganesacomputerkmd@gmail.com', '$2y$12$AUbgB2YkevqDXKMreugWWOANyFj3NX8kHZdqPA3c9ZBxN2EIvepWm', '9750049020', '825316990563', 'AHMPV5964H', 'NEW BUSSTAND KODUMUDI', 'Approved', 'null, null, India.'),
(10, 'AGENT', 'VETRIVEL P G', 'ganesapankmd@gmail.com', '$2y$12$6KGTlQfXRB.Dkz/0TlINMOE3qnNba1aTtM8xymxvCU.3k2VfoYFIu', '9750049020', '825316990563', 'AHMPV5964H', 'New Busstand kodumudi', 'Denied', 'null, null, India.'),
(11, 'AGENT', 'vetrivel pg', 'vetrigp@gmail.com', '$2y$12$UhL9h/RGSyxZn7eNswiEYuCbNtfZGVyo9qmCQQMdh92nEqTA9RuuK', '8667277072', '825316990563', 'AHMPV5964H', 'GANESA COMPUTER\r\n25 NEW BUSSTAND KODUMUDI\r\nERODE DT 638151', 'Denied', 'null, null, India.'),
(12, 'AGENT', 'YOUSUF GANI', 'yousugani0@gmail.com', '$2y$12$mVnNjCWlwDciwvOdTQG8IeplP9omlHTcif8zg4eA5y5FUeS6pg4YW', '9003400581', '385386074713', 'BWRPG6127L', 'KCC E SERVICE\r\n318, MAIN BAZAAR, KADAYANALLUR \r\nTIRUNELVELI DIST \r\nTAMILNADU\r\nPIN : 627751', 'Approved', 'Ernakulam, Kerala, India.'),
(13, 'AGENT', 'Sivaranjani', 'kumarthangam86@gmail.com', '$2y$12$ME.CrquD1aXPCnUJM1mrs.ikWVnl/hLHXBqCxdNAG5SdZOHS4fr/q', '9159832887', '670298257750', 'CJXPS9498G', 'East tambaram', 'Approved', 'Ernakulam, Kerala, India.'),
(14, 'AGENT', 'ELAVARASAN', 'omsakthi321@gmail.com', '$2y$12$csfx9H2S9Hl9Ts6l1RK8qeJfvbWhFtlFxvFm74ir8ZQQ9AZxBEDPG', '8870928348', '433832577572', 'ABAPE9220H', 'Attur', 'Approved', 'Chennai, Tamil Nadu, India.'),
(15, 'AGENT', 'Elavarasan', 'omsakthi3210@gmail.com', '$2y$12$a/swW5yRTNK30r9AzP1pgOgLt6wRLFT58qMUE99f8hIW.cQIlSn8e', '8870928348', '433832577572', 'ABAPE9220H', 'Attur,Salem\r\n', 'Denied', 'Chennai, Tamil Nadu, India.'),
(16, 'AGENT', 'Mohammed Aabidheen', 'bismicsc268@gmail.com', '$2y$12$d.BhVSxxy2bAo3SCRJHUoOADaw.BS34rk6iq/hz.onwzwQtbIGhxm', '9840495050', '646810072853', 'DENPM9727Q', '11/25, NETHAJI NAGAR MAIN STREET TONDIARPET CHENNAI-81', 'Approved', 'Chennai, Tamil Nadu, India.'),
(17, 'AGENT', 'SATHEESHKUMAR', 'satheesh755755@gmail.com', '$2y$12$GEYxXDfnEhGlk/ycjBBRqOFJOCE4FpluB7Z8ToWn3Yq9jHnOnj91.', '7373775775', '322117763330', 'EFZPS3075H', '2, kadumangkottai, Umareddiyur,bhavani,erode', 'Approved', 'Ahmedabad, Gujarat, India.'),
(18, 'AGENT', 'Mohamed Ismail', 'excellentcsc786@gmail.com', '$2y$12$76mcmWeZVD5o5ubArysI3O4Nj/7RkEH1p4o7R.Az9HyZcp6jWUcle', '9884767688', '661648032715', 'ASOPM7017M', 'DOOR NO:7, SHOP NO:18, TWENTY STAR COMPLEX, 2 ND LINE BEACH, PARRYS, CHENNAI-1', 'Approved', 'Chennai, Tamil Nadu, India.'),
(19, 'AGENT', 'Ramamoorthy', 'moorthy1958@gmail.com', '$2y$12$cY7G0PsKDzGWYXZnaSqJzuzvSe5xgfOChvb9/Vyw8xZPbTtBUv/B2', '8098843251', '927623307037', 'BDFPR6522R', '71mestriyar st.,  thirupputhur,  sivaganga dist,.630211', 'Approved', 'Puducherry, Union Territory of Puducherry, India.'),
(20, 'AGENT', 'Sevvannan', 'dtpsriram@gmail.com', '$2y$12$Bt3XR3AFVvGbFZal5Oh9oe0MHJ7C9u1zVjozut4C7I50TF5t7RVLy', '9942022658', '360176809674', 'DSXPS9516P', 'SRIRAM DTP CENTRE\r\nRAILWAY ROAD\r\nKOLLIAM POST\r\nSIRKALI TALUK', 'Approved', 'Chennai, Tamil Nadu, India.'),
(21, 'AGENT', 'Balakrishnan T', 'universalbaalu@gmail.com', '$2y$12$KFDISj7XB9tMRETRRL8eN.lD/1MIaYKZkBYt92hXvdtlJvJTzZr9a', '9443436115', '614884572804', 'ANYPB4794R', 'Universal Studios Videos\r\n77/24,Nethaji Street,Chidambaram-608001,Cuddalore  District,Tamil Nadu', 'Approved', 'Vriddhachalam, Tamil Nadu, India.'),
(22, 'AGENT', 'PREMKUMAR R', 'k.prem7@gmail.com', '$2y$12$g6BlKhJDgK0D8/Ke1QB06.PShM6whLHNlqHbLw4JGPwSQEUr7PmNa', '9629880029', '668428159779', 'BTWPP7304L', 'Abi Computers, No.63 , High School Road, Sethiyathope & Post, Bhuvanagiri TK, Cuddalore Dist. 608702', 'Approved', 'Gingee, Tamil Nadu, India.'),
(23, 'AGENT', 'MANIKANDAN N', 'srimmsmobiles@gmail.com', '$2y$12$jqBu5tV4C36OnTA6NevZAuiZV3a3u8buXdoLBiW3lIBAr5rj1Kc.O', '9787211212', '615656271323', 'BXBPM2086B', 'MMS MOBILES #21 NEW BUS STAND TIRUPATTUR VELLORE DISTRICT \r\nPIN CODE:635601', 'Approved', 'Chennai, Tamil Nadu, India.'),
(24, 'AGENT', 'K.GANESAN', 'kkdevi999@gmail.com', '$2y$12$0/Zt36.zaekTJeVbxnn1F.KQw9BQ0vqKvkp.EYEdb9chlzOYYAVei', '9843096484', '994836626209', 'APHPG3021K', 'PARVEEN TRAVELS ,DIAMOND JUBILEE COMPLEX,MELUR', 'Approved', 'Chennai, Tamil Nadu, India.'),
(25, 'AGENT', 'SATHESHKUMAR M', 'gnmanikavasantham@gmail.com', '$2y$12$SMc5ssza/g3a60i79dd15.JuZoaNtOOw7IOF3f1TSByNtB8fDnoXi', '9786552121', '614277228845', 'BTYPSG8000', '257 ALAGAR KOIL ROAD MELUR 625106 MADURAI DT', 'Pending', 'Madurai, Tamil Nadu, India.'),
(26, 'AGENT', 'NARENDRA BABU', 'mithragroups@gmail.com', '$2y$12$NGN0Jz0XzAqAWpFFETi39.scsQXM.Ag70P6T6.45bdFjKun7v1Nki', '9382880673', '982317223305', 'AESPN2463G', 'No 47 MUTHURAJAN STREET TKM ROAD CHENGALPATTU KANCHIPURAM TAMILNADU 603001', 'Approved', 'Vellore, Tamil Nadu, India.'),
(27, 'AGENT', 'Ramamoorthy', 'moorthy1958@xn--jlc0bdm6dc1c5c.com', '$2y$12$Lvgpu0HLepYr7dnAYGEvHOU7DYjhzppQBBQ2vF.mx3awFg1rmaouq', '8098843251', '927623307037', 'BDFPR6522R', 'MESTHIRIYAR ST.,  THIRUPPUTHUR Po  Sivaganga Dist630211.,', 'Pending', 'Coimbatore, Tamil Nadu, India.'),
(28, 'AGENT', 'Vikram', 'vikram23031986@gmail.com', '$2y$12$eZ8w4cGoJ7h/LCVH2GNboOEFZMaxGyajDN3.ras9bWcRfQX6N3pYy', '9715417397', '682543608257', 'AKRPV1444L', 'main road,padiyanthal village,tirukoilur taluk, villupuram dt. pin-605751.', 'Approved', 'null, null, India.'),
(29, 'AGENT', 'SATHISH THAMARAISELVAN', 'sathish141284@gmail.com', '$2y$12$g9BtKLhvIy3o/8swBShpx.tUhtMUYR2oVP7uP5A/xiqVCgooKFOHy', '9025362030', '316582021980', 'DBMPS3999L', 'MOLAYANUR PO\r\nPAPPIREDDIPATTI TK\r\nDHARMAPURI DT\r\nPIN 636904', 'Approved', 'Chennai, Tamil Nadu, India.'),
(30, 'AGENT', 'Ramachandran', 'am.ramchandran@gmail.com', '$2y$12$XCd0ZwvQuYFaXC.AWoN86OJryXiRtqv.9iwgHDkZ89LALUcL83j26', '9788233523', '441129545243', 'ATKPR9916P', '15-1-380 B Periyakulam main road\r\nBatlagundu\r\nDindigul', 'Approved', 'null, null, India.'),
(31, 'AGENT', 'BOOPATHIRAJA A', 'cscthingalur@gmail.com', '$2y$12$Y4rxRMuhvjAnSG2bOxe9Gey19Nb.ZNrM0ir.vQU2213WFmDRQuoiS', '8012752102', '365552885178', 'BPEPB9214F', '1/9 THORANAVAVI POST', 'Approved', 'Erode, Tamil Nadu, India.'),
(32, 'AGENT', 'Ramasamy', 'kanixeroxsvk@gmail.com', '$2y$12$Cfgr/YZJkOU4y3GHbCXD5uwbyUJPz.TH.phNWn3ENc6PuogL532K.', '8056763881', '437389671023', 'AXNPR8245G', '3/82,NH7,Viruthunagar main Road Sivarakottai Thirumangalam Madurai DT...625706', 'Pending', 'null, null, India.'),
(33, 'AGENT', 'Mathivanan', 'mathivanan31@gmail.com', '$2y$12$NplAUrkCJeqyEKkw3K6LXecOJUqiIUuCB1cI0QJauIWcF6n53.RYa', '7667667282', '536634210486', 'APJPM8468C', '3-4 Dunlop Nagar Extn veppampattu', 'Approved', 'Dindigul, Tamil Nadu, India.'),
(34, 'AGENT', 'RAMACHANDRAN', 'ramshreemobiles@gmail.com', '$2y$12$2ybzCL6QnVhZYjcMzf/hT.UAuEtZlRIuG.rjAN509jzNq0WfXlj8C', '9789010191', '933036300850', 'AOAPR0064F', 'Shree Mobiles,2/18, Easwaran Koil Street,Near Shivan Temple  Thirusoolam, Chennai,Tamil Nadu 600043 ', 'Approved', 'null, null, India.'),
(35, 'AGENT', 'RAMACHANDRAN', 'ramshreemobiles@gmail.com', '$2y$12$7gGcqME2BPkbPXJxGhIr7.cOjcfYouuQEvHa66y1kWh6RYxyWc4jG', '9789010191', '933036300850', 'AOAPR0064F', 'Shree Mobiles,2/18, Easwaran Koil Street,Near Shivan Temple  Thirusoolam, Chennai,Tamil Nadu 600043 ', 'Pending', 'null, null, India.'),
(36, 'AGENT', 'SURESHKUMAR G', 'universecscgkr@gmail.com', '$2y$12$NHjhReR2g5RMkapWAtunrexXB336pzCqGqAtOIIL3Zj6pmlKwnk9O', '9488814440', '590208506100', 'FYWPS2066H', 'G K ROAD\r\nPARAYAPATTI  PUDUR PO P R PATTY TK DPI DT', 'Approved', 'Karur, Tamil Nadu, India.'),
(37, 'AGENT', 'THIRUGNANASAMBANDAMOORTHY D', 'omshanthiads@gmail.com', '$2y$12$Xpa4BOOD./rOHoQGwllSZujZKTCTTicqkTEoGyL0BYnSZb2bSov3S', '9894191285', '366995038196', 'AHOPT4829K', 'C/o. Shanthi Browsing Center, S/o. K.Durai, 1/80, Mainroad, Perugamai, Trichy-639115.', 'Approved', 'Puducherry, Union Territory of Puducherry, India.'),
(38, 'AGENT', 'SURESH RAVI', 'sureshrm1995@gmail.com', '$2y$12$X3YXpUbvWMRO3iDoK/d.quyXzNa4gbwZggIRdSj0DFCWd.PdoIgDu', '9629993087', '618998285633', 'DBCPR3986L', 'Sri Sakthi Enterprises,Thellar To Mazhiyur Raoad,Desur,Vandavasi Tk, Thiruvannamalai Dirst-604501.', 'Approved', 'Hyderabad, Telangana, India.'),
(39, 'AGENT', 'sakthivel s', 'valarumsakthi@gmail.com', '$2y$12$Q1NX5QNFAJdP22IzvBASOeOmZIKlun6Z8SgdlKffq8UysPt8feyDS', '9994396096', '123456789081', 'ABCD33330L', '2/185 Pattimaniyakaranpalayama', 'Approved', 'null, null, India.'),
(40, 'AGENT', 'SATHIYAPRABHU', 'gsprabhu.sbi@gmail.com', '$2y$12$9GwijfSG7FN9Wv2LLK66K.GiHU1CE4IEVneQmKc.z92EK9HrHFQQ6', '9659040448', '727691650400', 'ERCPS4304A', '453,NORTH STREET AANDIPATTI,KARUKKADIPATTI ,ORATHANADU', 'Approved', 'null, null, India.'),
(41, 'AGENT', 'Santhosh', 'santos.san6@gmail.con', '$2y$12$8Uxc1DdaYlnWt3T.lq42U.Z3KlMeEZqQR9UTVU3F.VZVaxOGWHbJW', '9524164835', '538099316302', 'FSPPS2755L', '14/5, gandhi nagar,  vettukattu valasu, nasianoor road, erode. ', 'Approved', 'Chennai, Tamil Nadu, India.'),
(42, 'AGENT', 'K. Ramesh', 'suhram007@gmail.com', '$2y$12$Ygop5N4bHP8bsuN8wKu34.rPEf84tEUwkUDcWC8ofJlUBzfeVTtCC', '9443856390', '315429997561', 'ALRPR0393R', 'JKR Xerox, 38, Ettines Road, Near Old Milk Dairy, Udhagamandalam, The Nilgiris- 643 003', 'Approved', 'New Delhi, National Capital Territory of Delhi, India.'),
(43, 'AGENT', 'SS GROUP', 'newssgroup@gmail.com', '$2y$12$eFjLqd03NiY0eCAHQFYEd.mbezHwkf9CKndkHRfJmm7cIdVYUyjhq', '9944621807', '555967064677', 'AMXPA4164C', 'No.86, S.P.Kovil Street, Arani, Poneri Taluk, Thiruvallur District', 'Approved', 'Chennai, Tamil Nadu, India.'),
(44, 'AGENT', 'ANTONYRAJ I', 'ANTONYRAJPCM123@GMAIL.COM', '$2y$12$H7p62nSRfjI0BdF4tDDH1.Xxx77zsDcQQnke3l3BRQl51XMAYdQBq', '9843128259', '961046504036', 'APXPA0122M', '6/65-1 UNION ROAD,SBI NEAR,PAVOORCHATRAM,TENKASI TALUK-627808,TIRUNELVELI', 'Approved', 'Pollachi, Tamil Nadu, India.'),
(45, 'AGENT', 'Kavitha', 'aruna_3in@yahoo.com', '$2y$12$cBThc02ON/TpFU3M4aZvvOJoA1YSgE9w4fIgbpZAoLs786rHzU/q6', '9444552779', '207349617504', 'AMXPP5989Q', 'Narmatha Enclave, Chennai', 'Approved', 'Chennai, Tamil Nadu, India.'),
(46, 'AGENT', 'Elumalai G', 'gs7malai@gmail.com', '$2y$12$YhH0bF3lRvSGs37YkVG8LelNhfr.vgPJegWWrWtu1o5P/Ee21dr0C', '9788888330', '476359867749', 'AASPE2520K', '11, KOLLAI HOUSE,\r\nMOTHAKKAL VILLAGE & POST', 'Pending', 'Chennai, Tamil Nadu, India.');

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`wallet_id`, `user_id`, `amount`) VALUES
(1, 2, '2000'),
(2, 3, '0'),
(3, 4, '0'),
(4, 5, '2000'),
(5, 6, '0'),
(6, 7, '350'),
(7, 8, '0'),
(8, 12, '0'),
(9, 9, '0'),
(10, 13, '0'),
(11, 14, '0'),
(12, 16, '0'),
(13, 17, '0'),
(14, 18, '0'),
(15, 19, '0'),
(16, 20, '0'),
(17, 23, '870'),
(18, 21, '0'),
(19, 22, '0'),
(20, 24, '0'),
(21, 26, '0'),
(22, 28, '0'),
(23, 29, '0'),
(24, 31, '0'),
(25, 30, '0'),
(26, 33, '0'),
(27, 34, '0'),
(28, 36, '0'),
(29, 38, '0'),
(30, 37, '0'),
(31, 41, '0'),
(32, 40, '0'),
(33, 39, '0'),
(34, 42, '1000'),
(35, 43, '0'),
(36, 44, '0'),
(37, 45, '0');

--
-- Dumping data for table `wallet_requests`
--

INSERT INTO `wallet_requests` (`request_id`, `to_bank_name`, `transaction_type`, `request_amount`, `request_date`, `bank_name`, `reference_no`, `status`, `wallet_id`) VALUES
(1, '1', '1', '2000', '29/06/2018', '1', '123', 'Approved', 1),
(2, '2', '2', '2000', '30/06/2018', '15', '1234569870', 'Approved', 4),
(3, '1', '2', '1000', '01/07/2018', '1', ' 37775039498', 'Approved', 6),
(4, '2', '2', '1000', '09/07/2018', '53', '819018484826', 'Approved', 17),
(5, '2', '2', '1000', '18/07/2018', '14', '819915791963', 'Approved', 34);

--
-- Dumping data for table `wallet_transactions`
--

INSERT INTO `wallet_transactions` (`transaction_id`, `date_time`, `description`, `previous_balance`, `transaction_type`, `amount`, `balance`, `wallet_id`) VALUES
(1, '29-06-2018 18:44:49', 'Added money to wallet.', '0', 'Credit', '2000', '2000', 1),
(2, '30-06-2018 14:35:10', 'Added money to wallet.', '0', 'Credit', '2000', '2000', 4),
(3, '01-07-2018 11:28:06', 'Added money to wallet.', '0', 'Credit', '1000', '1000', 6),
(4, '02-07-2018 19:41:47', 'Amount deduced for PAN application. Application No.: 1', '1000', 'Debit', '130', '870', 6),
(5, '03-07-2018 18:44:13', 'Amount deduced for PAN application. Application No.: 2', '870', 'Debit', '130', '740', 6),
(6, '09-07-2018 18:21:05', 'Added money to wallet.', '0', 'Credit', '1000', '1000', 17),
(7, '09-07-2018 18:43:51', 'Amount deduced for PAN application. Application No.: 3', '1000', 'Debit', '130', '870', 17),
(8, '17-07-2018 18:51:34', 'Amount deduced for PAN application. Application No.: 5', '740', 'Debit', '130', '610', 6),
(9, '17-07-2018 19:11:53', 'Amount deduced for PAN application. Application No.: 6', '610', 'Debit', '130', '480', 6),
(10, '17-07-2018 19:23:44', 'Amount deduced for PAN application. Application No.: 7', '480', 'Debit', '130', '350', 6),
(11, '18-07-2018 15:16:11', 'Added money to wallet.', '0', 'Credit', '1000', '1000', 34);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
