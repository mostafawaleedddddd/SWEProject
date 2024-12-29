-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2024 at 09:22 PM
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
-- Database: `medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`, `email`, `birthdate`, `gender`, `phone`) VALUES
(1, 'mostafa', 'Mostafa@2004', 'mostafa@gmail.com', '0000-00-00', 'Male', '01200588939');

-- --------------------------------------------------------

--
-- Table structure for table `banned`
--

CREATE TABLE `banned` (
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banned`
--

INSERT INTO `banned` (`name`, `email`) VALUES
('KSNVS', 'mostafa22@gmail.com'),
('wefw', 'mostafa@gmail.com'),
('wefw', 'mostafa741@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `username`, `message`, `created_at`) VALUES
(1, 'omar', 'omar@gmail.com', 'hi love this website very muchh!!!', '2024-12-20 18:02:40'),
(3, 'Omar', 'omar@gmail.com', 'Hi i dont love this website at all !!', '2024-12-20 18:07:31'),
(4, 'Mazen', 'mazen@gmail.com', 'hi i learned alot from your website and i am happy to be with you all <3', '2024-12-20 18:08:33'),
(9, 'Omar', 'omar@gmail.com', 'hi i got alot of useful information from your website i am very thankful for this', '2024-12-29 19:22:03');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `parent_comment` int(11) DEFAULT NULL,
  `student` varchar(100) NOT NULL,
  `post` text NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(11) NOT NULL,
  `patient` varchar(255) NOT NULL,
  `post` text NOT NULL,
  `parent_comment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `patient`, `post`, `parent_comment`) VALUES
(14, 'Ramez', 'I have back pain and the doctor prescribed me viodican but i don\'t know what it does can anyone tell what it do?', NULL),
(17, 'HealthCare Provider', 'Try taking pandol joint', 14),
(18, 'Mostafa', 'I am taking cortosol for my nerve pain is it good for nerve pain', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `healthcare`
--

CREATE TABLE `healthcare` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `healthcare`
--

INSERT INTO `healthcare` (`id`, `name`, `password`, `email`, `birthdate`, `gender`, `phone`) VALUES
(1, 'Akram', 'Akram@2004', 'akram@gmail.com', '0000-00-00', 'Male', '01200588939'),
(2, 'Mostafa', '123', 'mostafas90@gmail.com', '1963-11-20', 'Male', '01200588939');

-- --------------------------------------------------------

--
-- Table structure for table `medical_conditions`
--

CREATE TABLE `medical_conditions` (
  `id` int(11) NOT NULL,
  `condition_name` varchar(255) NOT NULL,
  `symptoms` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`symptoms`)),
  `organ` varchar(100) NOT NULL,
  `advice` text NOT NULL,
  `urgency` varchar(50) NOT NULL,
  `specialist` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_conditions`
--

INSERT INTO `medical_conditions` (`id`, `condition_name`, `symptoms`, `organ`, `advice`, `urgency`, `specialist`, `created_at`, `updated_at`) VALUES
(1, 'Flu', '[\"fever\", \"chills\", \"headache\", \"fatigue\", \"muscle aches\"]', '', 'Rest, drink fluids, and take over-the-counter pain relievers.', 'Moderate', 'General Practitioner', '2024-12-23 10:08:00', '2024-12-23 10:08:00'),
(2, 'Cold', '[\"cough\", \"sore throat\", \"runny nose\", \"sneezing\"]', '', 'Rest, drink warm fluids, and take cough syrup if necessary.', 'Low', 'General Practitioner', '2024-12-23 10:08:00', '2024-12-23 10:08:00'),
(3, 'Migraine', '[\"headache\", \"nausea\", \"sensitivity to light\", \"vomiting\"]', '', 'Avoid bright lights, stay in a quiet room, and use pain relievers.', 'High', 'Neurologist', '2024-12-23 10:08:00', '2024-12-23 10:08:00'),
(4, 'Pneumonia', '[\"cough\", \"chest pain\", \"shortness of breath\", \"fever\"]', '', 'Seek immediate medical care, antibiotics may be needed.', 'Very High', 'Pulmonologist', '2024-12-23 10:08:00', '2024-12-23 10:08:00'),
(5, 'Stomach Ulcer', '[\"stomach pain\", \"nausea\", \"vomiting\", \"indigestion\"]', '', 'Avoid spicy foods, eat smaller meals, and consult a doctor.', 'Moderate', 'Gastroenterologist', '2024-12-23 10:08:00', '2024-12-23 10:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `birthdate`, `gender`, `phone`) VALUES
(10, 'Omar', 'Omar@2004', 'omar@gmail.com', '0000-00-00', 'Female', '01200588939'),
(11, 'Mazen Amir', 'Mazen@2004', 'mazen@gmail.com', '0000-00-00', 'Male', '01200588939');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_comment` (`parent_comment`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_comment` (`parent_comment`);

--
-- Indexes for table `healthcare`
--
ALTER TABLE `healthcare`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `healthcare`
--
ALTER TABLE `healthcare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`parent_comment`) REFERENCES `forum` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forums`
--
ALTER TABLE `forums`
  ADD CONSTRAINT `forums_ibfk_1` FOREIGN KEY (`parent_comment`) REFERENCES `forums` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
