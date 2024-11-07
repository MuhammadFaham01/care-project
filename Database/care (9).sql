-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2024 at 11:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `care`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoints`
--

CREATE TABLE `appoints` (
  `dappoints_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `appoint_date` varchar(255) NOT NULL,
  `appoint_time` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `category_n` varchar(255) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appoints`
--

INSERT INTO `appoints` (`dappoints_id`, `name`, `email`, `phone`, `age`, `appoint_date`, `appoint_time`, `message`, `category_n`, `doctor_id`, `user_id`, `status`) VALUES
(59, 'faham siddqui', 'faham@gmail.com', '03142380276', '22', '2024-09-10', '21:59', 'dafsfs', '10', 11, 7, 'Approve'),
(61, 'zubair', 'zubair@gmail.com', '354464644', '8', '2024-09-11', '17:32', 'dfete', '7', 10, 7, ''),
(62, 'zubair', 'zubair@gmail.com', '23244265757', '25', '2024-09-11', '14:21', 'new ', '7', 10, 7, '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_desc` varchar(255) NOT NULL,
  `c_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_desc`, `c_image`) VALUES
(5, 'skin specilaziation', 'Skin specialization focuses on diagnosing and treating various skin conditions, from common issues like acne to more complex dermatological disorders.  ', 'skin_image.png'),
(7, 'heart seargon', 'Heart surgery involves complex procedures to repair or replace parts of the heart, ensuring the restoration of healthy cardiac function.  ', 'hert_images-removebg-preview.png'),
(8, 'saikology sergon', 'Psychology services involve therapeutic interventions and assessments to address and improve mental health and emotional well-being.  ', 'brains.png'),
(9, 'Bons sergon', 'Orthopedic care focuses on diagnosing and treating bone, joint, and muscle disorders to restore function and relieve pain.   ', 'bons.png'),
(10, 'langs Sergon', 'Pulmonary care involves the diagnosis and treatment of lung and respiratory conditions to improve breathing and overall lung health.   ', 'langs image.png'),
(13, 'Heirs specilaziation', 'The brain is the central organ of the nervous system, responsible for processing sensory information, regulating bodily functions, and enabling cognition and emotion.    ', 'hairs.png');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`) VALUES
(7, 'karachi'),
(8, 'lahore');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `email`, `subject`, `message`) VALUES
(3, 'faham siddqui', 'faham@gmail.com', 'mbjhhmnghyj', 'grswrtw'),
(4, 'faham siddqui', 'faham@gmail.com', 'mbjhhmnghyj', 'grswrtw'),
(5, 'Dr.khurshid khan', 'doctor@doctor.com', 'mbjhhmnghyj', 'hjvj');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `hire_date` varchar(255) NOT NULL,
  `availability_tstart` varchar(255) NOT NULL,
  `availability_tend` varchar(255) NOT NULL,
  `availability_week` varchar(255) NOT NULL,
  `exprience` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `date_of_birth`, `hire_date`, `availability_tstart`, `availability_tend`, `availability_week`, `exprience`, `education`, `details`, `profile_picture`, `category_id`, `city_id`, `role_id`, `user_id`) VALUES
(9, 'Dr.syed', 'hira', 'hira@gmail.com', '12345678955', 'House no 1684 , street no 29 , orangi town karachi\r\n', '2005-09-30', '2024-08-31', '10:00', '00:00', 'Monday , wednesday ', '15 years experience', 'M.B.B.S, F.C.P.S (saikologyy), M.R.C.P. (UK)', 'Saikologi is a specialized field focused on understanding and addressing psychological issues, offering therapeutic solutions to enhance mental well-being. It integrates modern psychological practices with a deep understanding of human behavior and emotio', 'team-1 (1).jpg', 8, 7, 2, 12),
(10, 'Dr.khurshid', 'khan', 'khurshid@gmail.com', '12345678901', 'House no 1684 , street no 29 , karachi\r\n', '2002-01-31', '2024-08-31', '12:30', '15:30', 'Monday , wednesday , sataday', '12 years exprience', 'M.B.B.S, F.C.P.S (Heart), M.R.C.P. (UK)n', 'Hearts is a medical specialty dedicated to diagnosing and treating cardiovascular conditions, focusing on the health and function of the heart and blood vessels. It encompasses a range of services, from preventative care to advanced cardiac interventions.', 'team-2.jpg', 7, 7, 2, 8),
(11, 'Dr.sumbul', 'Iqbal', 'sumbul@gmail.com', '031423812333', ' House no 13 , flate 8 , block-A karachi\r\n', '2005-12-31', '2024-08-31', '18:00', '19:30', 'Monday , wednesday , sataday', '8 years exprience', 'M.B.B.S, F.C.P.S (langs), M.R.C.P. (UK)', 'Langs is a medical specialty focused on the diagnosis, treatment, and care of lung-related conditions, including respiratory diseases and pulmonary disorders. It combines advanced techniques with personalized care to ensure optimal lung health and functio', 'team-3.jpg', 10, 7, 2, 3),
(12, 'Dr.Arshad', 'Khan', 'arshad@gmail.com', '03142380276', 'House no 1684 , block d street no 29 , \r\n', '1998-07-31', '2024-08-31', '20:00', '22:30', 'Monday , wednesday ', '12 years exprience', 'M.B.B.S, F.C.P.S (Bons), M.R.C.P. (UK)', 'Bons is a medical specialty that focuses on the diagnosis, treatment, and management of bone-related conditions and disorders. It includes the care of fractures, osteoporosis, and other skeletal issues, promoting strong and healthy bones.', 'team-4.jpg', 9, 7, 2, 4),
(14, 'Dr.farzana', 'Ahmad', 'farzana@gmail.com', '03142380276', ' DHA face 1 House no 1683 , block-d', '2024-09-05', '2024-09-05', '09:00', '11:00', 'Monday , wednesday , sataday', '15 years experience', 'M.B.B.S, F.C (hairs), M.R.C.P. (USA)', 'The heir is the central organ of the nervous system, responsible for processing sensory information, regulating bodily functions, and enabling cognition and emotion.', 'team-3 (1).jpg', 13, 7, 2, 21),
(15, 'Dr.Muhammad', 'Hussan', 'hussan@gmail.com', '034252565657', 'House no 1684 , street no 29 , orangi town karachi\r\n', '2024-06-02', '2024-09-05', '23:00', '13:00', 'Monday , wednesday ', '12 years exprience', 'M.B.B.S, F.C.P.S (skin specilaiziation), M.R.C.P. (UK)', '\"With extensive expertise in dermatology, Dr. Muhammad Hussan provides personalized treatment for various skin conditions. Specializing in both cosmetic and medical dermatology, he aims to enhance skin health and appearance.\"', 'team-1 (2).jpg', 5, 7, 2, 11),
(16, 'Dr.Rashid', 'Menaz', 'menaz@gmail.com', '03142380872', 'House no 1684 , street no 29 , bahriya town\r\n', '2024-09-06', '2024-09-06', '18:30', '08:30', 'sunday', '15 years experience', 'M.B.B.S, F.C.P.S (saikology sergon), M.R.C.P. (UK)', 'Saikologi is a specialized field focused on understanding and addressing psychological issues, offering therapeutic solutions to enhance mental well-being. It integrates modern psychological practices with a deep understanding of human behavior and emotio', 'team-2 (1).jpg', 8, 7, 2, 20),
(17, 'Dr.Aliyan', 'Raza', 'aliya@gmail.com', '03148347464', 'House no 1684 , street no 29 , orangi town karachi\r\n', '2024-03-06', '2024-09-06', '00:30', '14:30', 'Monday , wednesday ', '8 years exprience', 'M.B.B.S, F.C.P.S (Heart sergon), M.R.C.P. (UK)', 'Hearts is a medical specialty dedicated to diagnosing and treating cardiovascular conditions, focusing on the health and function of the heart and blood vessels. It encompasses a range of services, from preventative care to advanced cardiac interventions.', 'team-4 (1).jpg', 7, 7, 2, 22);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_type`) VALUES
(1, 'admin'),
(2, 'doctor'),
(3, 'pation');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `profile_picture`, `role_id`) VALUES
(2, 'rashid', 'rashid@gmail.com', '$2y$10$yaZTXKMC8tJO4o/LZyZZ8OU2fXLJDsaKnbjIVbtkO5KaiBST6Q0Bu', '1 image.jpg', 3),
(3, 'doctor', 'sumbul@gmail.com', '$2y$10$vZk6SRIJYZpAVqvwv3KKxe18MVBXItS5Svpnj.yeVIOysdGtcwaLS', 'doctorss.avif', 2),
(4, 'Doctor', 'Arshad@gmail.com', '$2y$10$zyn1blIfODUFUV4rxVvj2.n2y7bK9Ih/0kaWghV6/AXH.oteQbCVG', 'doctorss.avif', 2),
(6, 'test', 'test@gmail.com', '$2y$10$rbDa.Xdn3btG0smUBWYo2OksJkGSMnmS6PMd.cw5LzdTtm2JAH/ZS', '2 image.jfif', 3),
(7, 'zubair', 'zubair@gmail.com', '$2y$10$srDElUm8NUxDo3BUkApjreDtma1tvFrxVlzs2bJFLeZFMkbNGqenW', '4 image.jfif', 3),
(8, 'doctor', 'doctor@doctor.com', '$2y$10$dsQWfO182tRGBu6ba8Wslulw/qNGczs6Y9CRuikQRTdcteRNS6oeq', 'doctorss.avif', 2),
(11, 'zakkis', 'zakkis@gmail.com', '$2y$10$hMDkCXSsUcv0E8fdVJPIA.kqiv.oSqJpJT9FMhf1ep6kqUU5684D2', 'team-1 (2).jpg', 2),
(12, 'hira', 'hira@gmail.com', '$2y$10$oEAFfhhIGHH56oPiHgkRFe3oElGCMbHI/ISlh4rO2RVpSk.UkgCIO', 'new 1.webp', 2),
(13, 'hamza', 'hamza@gmail.com', '$2y$10$F0MzFpDaUj927brz7Dl7Z.aIyPbxRb0/wXaTISkkhi/HaZ6Zdf0MC', '2 image.jfif', 3),
(14, 'hamza', 'hamza@gmail.com', '$2y$10$mfHOZt5fF06cyyuS8wu64.q6s8yWHhytgvt8BRXEMYB.jMQY6QBK.', '2 image.jfif', 3),
(15, 'arfeen', 'arfeen@gmail.com', '$2y$10$07BUjh56gcHzXma2iyAyq.szPSz.K8hYH8mQmkN4m7EEPzxm/fUC6', '8 image.jfif', 3),
(16, 'fahad', 'fahad@gmail.com', '$2y$10$m17TVVomHu7CyztfTsP4ruzFmpErGOWgOAh.3xirx9/INZ5WUFlZK', 'fahad image.jfif', 3),
(18, 'azan ', 'azan@azan.com', '$2y$10$BT60Zmj9CB.kqWGqVZcBTOcQ94pvN5bASYNt9VIJ/2Tu092zua01a', 'team-1.jpg', 3),
(19, 'umair', 'umair@gmail.com', '$2y$10$TPMIqLs3gGCGx8CXB56wT.f0Pm92jti.ggMO3mx4lKg6DByE/akye', '1 image.jpg', 3),
(20, 'misba ', 'misba@misba.com', '$2y$10$SeJqiujEuaoELcnsRFgFJ.tmPRokZkb5sQd..f6PbB2kD5xYtT.dq', 'team-2 (1).jpg', 2),
(21, 'farzana', 'farzana@gmail.com', '$2y$10$15ExtLOk0lYiOQdG7BREx.m4hAIoQ1VouZJdidrfzw.ZfqOuUgMCe', 'team-3 (1).jpg', 2),
(22, 'Aliyan', 'aliyan@gmail.com', '$2y$10$MrhdVVee2R468fry3/UHQ.J50rJ7Y50XJTXEWnNEd6yf9itEXGXS6', 'team-4 (1).jpg', 2),
(23, 'shahmeer', 'admin@admin.com', '$2y$10$rlFsQo3KQ/fS1ouK4j.PR.BUbMr3ut/onoUbd7vf/QDejq0ONQRvK', 'admins2.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appoints`
--
ALTER TABLE `appoints`
  ADD PRIMARY KEY (`dappoints_id`),
  ADD KEY `doctors_id_fk` (`doctor_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`),
  ADD KEY `categories_id_fk` (`category_id`),
  ADD KEY `cities_id_fk` (`city_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `roles_id_fk` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appoints`
--
ALTER TABLE `appoints`
  MODIFY `dappoints_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appoints`
--
ALTER TABLE `appoints`
  ADD CONSTRAINT `doctors_id_fk` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `categories_id_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `cities_id_fk` FOREIGN KEY (`city_id`) REFERENCES `cities` (`city_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `roles_id_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
