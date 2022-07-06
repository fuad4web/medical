-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2022 at 08:54 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

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
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `c_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullcomplain` text NOT NULL,
  `doctor_reply` text NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `replied` int(11) NOT NULL,
  `datecomplained` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`c_id`, `user_id`, `fullcomplain`, `doctor_reply`, `doctor_id`, `replied`, `datecomplained`) VALUES
(1, 3, 'I do have headache morning and night and have used the drug prescribed to me here but all to no avail', 'You are going to use just 5 paracetamol day and night', 2, 1, '2022-04-07 02:05:51'),
(2, 3, 'I am very happy to see this but wetin man go do', 'Yeah, just continue using blood tonic and you are free to go', 2, 1, '2022-04-07 05:25:19'),
(3, 3, 'I do ahve headcahe morning and night', 'Use 100 Tramadol', 2, 1, '2022-04-09 19:50:19'),
(4, 3, 'dugiasegu ywe asdyqweb iashioqwe', 'fjhkdfnkdfbnkcnkldf', 2, 1, '2022-04-11 18:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `illnesses`
--

CREATE TABLE `illnesses` (
  `id` int(11) NOT NULL,
  `illness_name` varchar(255) NOT NULL,
  `treatment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `illnesses`
--

INSERT INTO `illnesses` (`id`, `illness_name`, `treatment`) VALUES
(2, 'stomach pain', 'Use 10 Aspirin'),
(3, 'HIV', 'Use 10 Paracetamol everyday'),
(4, 'Malaria', 'GO and Buy Artemeter and use Morning and  NIght. Use 10 Aspirin'),
(6, 'Menstruation Pain', 'seplefw wefokweo owe drwe yes just to see whether itb  is working jhor                                                                                     '),
(8, 'Chest Pain', 'Go and Buy Chest Pain Drug and Chester'),
(10, 'Aids', '');

-- --------------------------------------------------------

--
-- Table structure for table `membership_payments`
--

CREATE TABLE `membership_payments` (
  `p_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `reference` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `payment_status` varchar(20) NOT NULL,
  `trans_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `fromuser` int(11) DEFAULT NULL,
  `touser` int(11) DEFAULT NULL,
  `message` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `fromuser`, `touser`, `message`) VALUES
(1, 3, 10, 'Just join and be Prosperous'),
(2, 3, 2, 'Hi'),
(3, 2, 3, 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `id` int(11) NOT NULL,
  `specialty` varchar(25) NOT NULL,
  `usefullness` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`id`, `specialty`, `usefullness`) VALUES
(10, 'Dentist', 'They do take care of Teeth here and There and it must be neat'),
(11, 'Cardiology', 'Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka\r\n\r\nEt nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero'),
(12, 'Neurology', 'Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka\r\n\r\nEa ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna desera vafle de nideran pal'),
(13, 'Hepatology', 'Eos voluptatibus quo. Odio similique illum id quidem non enim fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis aut\r\n\r\nIure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae sed laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam. Soluta et harum voluptatem optio quae'),
(14, 'Pediatrics', 'Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus\r\n\r\nEaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a laborum inventore'),
(15, 'Optist', 'Omnis blanditiis saepe eos autem qui sunt debitis porro quia.\r\n\r\nExercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel'),
(16, 'Opeartionalist', 'Tyhe do remove Kidney');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `id` int(11) NOT NULL,
  `illness_name` varchar(50) NOT NULL,
  `treatment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `othername` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `paid` int(11) DEFAULT NULL,
  `specialty` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) NOT NULL DEFAULT 'deafultpics.jpg',
  `active` int(11) NOT NULL DEFAULT 1,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `othername`, `account_type`, `paid`, `specialty`, `profile_pic`, `active`, `email`, `password`, `dob`, `gender`, `contact`, `marital_status`, `address`, `date_created`) VALUES
(1, 'sdftftfhtfh', 'sderr', 'admin', 1, NULL, 'deafultpics.jpg', 1, 'fuskydon@gmail.com', '15317ede3526ea08664db7c5737ba843', '02/04/2000', 'Female', '09089898980', 'married', 'axSadfgdsaSDFBF', '2022-03-27 08:34:33'),
(2, 'Abdulhammed', 'Fuad', 'doctor', 1, 'Dentist', '39428093.png', 1, 'zfuad6454@gmail.com', '15317ede3526ea08664db7c5737ba843', '2022-03-08', 'Male', '07067752068', 'Single', '19, Onajirin Street Igbolomu, Ikorodu, Lagos State', '2022-03-27 09:14:50'),
(3, 'Tajudeen', 'Aish', 'patient', 1, NULL, 'deafultpics.jpg', 1, 'aish@gmail.com', 'cbe314af36a0e26bdd9e3c0faec9be5e', '2022-03-16', 'Female', '07016360410', 'Single', '19, Onajirin Street Igbolomu, Ikorodu', '2022-03-27 09:19:48'),
(10, 'Subair Sofiyat', '', 'doctor', NULL, 'Operationalist', '88936907.png', 1, 'sofee@gmail.com', '17247e4767b5092b1164e7f8106bd3bf', '', 'Female', '0908765767', '', '', '2022-04-07 20:15:45'),
(16, 'dghjklgdsffgh', 'awderhjsd', 'patient', NULL, 'awfergthyjh', 'deafultpics.jpg', 1, 'assdjkgg@gmail.com', 'asdfghjmew', '12/12/2009', 'male', '2345768453', 'single', '19, Onajiirugs Street', '2022-04-07 20:30:56'),
(18, 'Sofiyat Ridwan', 'Oluomo', 'patient', NULL, NULL, 'deafultpics.jpg', 1, 'Ola@gmail.com', 'a89f23e0cd79eeffe9ccaf6ce2386bbd', '2022-04-21', 'Male', '4567432', 'Single', 'jdsgyseu ediwe kleue dklyse ser.', '2022-04-07 20:42:25'),
(19, 'Ashgd Yhfsvs', 'FGusigks', 'patient', 1, NULL, 'deafultpics.jpg', 1, 'grog@gmail.com', '15317ede3526ea08664db7c5737ba843', '2022-04-09', 'Male', '67843234567', 'Single', 'dfsjkgsdjksnskdjhixdnklsd', '2022-04-07 20:52:44'),
(20, 'Ayodel Elizabeth', '', 'doctor', NULL, 'Hepatology', '39529463.png', 1, 'elibabe@gmail.com', '15317ede3526ea08664db7c5737ba843', '', 'Male', '456786545', '', '', '2022-04-08 10:22:40'),
(21, 'Tajudeen Sola', 'Modasola', 'doctor', NULL, NULL, 'deafultpics.jpg', 1, 'fuadindodo@gmail.com', '16e4c5ccffb99e1f99dd834efc5185bd', '2022-04-15', 'Female', '9098565234', 'Married', '19, Onajirin Street Igbolomu, Ikorodu', '2022-04-11 08:58:28'),
(22, 'Gyuvjhshiws', 'gukjsdjhksdn', 'patient', NULL, NULL, 'deafultpics.jpg', 1, 'lazyboy@gmail.com', '0ffe34b4e04c2b282c5a388b1ad8aa7a', '2022-03-30', 'Male', '097895421', 'Single', 'eqfyuwy euiye bweioyebioehw', '2022-04-11 09:07:28'),
(23, 'Eden Hazard', 'Michael', 'patient', NULL, NULL, 'deafultpics.jpg', 1, 'hazard@gmail.com', 'afbe5099e0f5bb8cd70f7e8563759d33', '2022-04-21', 'Male', '090875336', 'Single', '19, Onajirin Street Igbolomu, Ikorodu', '2022-04-11 17:52:27'),
(24, 'Abdulhammed', 'sdtrerer', 'patient', NULL, NULL, 'deafultpics.jpg', 1, 'vicky@gmail.com', '8af433519d6e385e89bb280f8002f2b2', '2022-04-26', 'Female', '5467652334', 'Single', '19, Onajirin Street Igbolomu, Ikorodu', '2022-04-11 18:38:50'),
(25, 'Abdulhammed', 'Abdulhammed', 'patient', NULL, NULL, 'deafultpics.jpg', 1, 'fuad2fuskydeeeon@gmail.com', '10503c6845d570f3a9126ae5559f01a7', '2022-04-21', 'Female', '4534343434', 'Single', '19, Onajirin Street Igbolomu, Ikorodu', '2022-04-11 18:40:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `illnesses`
--
ALTER TABLE `illnesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_payments`
--
ALTER TABLE `membership_payments`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `illnesses`
--
ALTER TABLE `illnesses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `membership_payments`
--
ALTER TABLE `membership_payments`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
