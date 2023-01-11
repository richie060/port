-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2022 at 09:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneno` int(11) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `businessname` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `messages` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `name`, `email`, `phoneno`, `companyname`, `businessname`, `link`, `messages`) VALUES
(13, 'RICHARD GACHUHI', 'richuhi060@gmail.com', 718606698, 'RichTect Production', 'RichTect Production Liimited', 'https://www.richtect.co.ke', 'Interested with Search engine optimization.');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `messages` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `email`, `messages`) VALUES
(9, 'richtech@gmail.com', 'interested in digital marketing sercvices'),
(10, 'richuhi2060@gmail.com', 'i need search optimization services'),
(11, 'richtech@gmail.com', 'QW;],LJNGVCFXDZAESXDBHJNMK,L'),
(12, 'hal@gmail.com', 'qwsedrtfgyuhjikopl;[');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `name`, `mail`) VALUES
(1, 'RICHARD GACHUHI', 'captain@gmail.com'),
(4, 'Captain America', 'captain060@gmail.com'),
(5, 'Richie', 'captain@gmail.com'),
(6, 'Fiction', 'Captain@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `topic_id`, `title`, `image`, `body`, `published`, `created_at`) VALUES
(3, 0, 1, 'Custom Fit Web Design vs. Website Templates: What’s Right for Your Business?', '1659179161_1655001409263.jpg', 'Your website is a powerful communication platform that allows you to market your brand 24/7 and connect with\r\nclients from across locations. However, not all sites guarantee your desired return on investment (ROI). The\r\nprimary consideration is choosing between a website template and a custom design website.\r\nA website template is a pre-made web design that allows developers to plug in content into a sophisticated\r\nframework built through HTML or CSS. You can edit limited features, such as colors, font styles and images. But\r\naside from these, what you see is what you get. Although ready-made templates help you save time and money,\r\nthey lack flexibility and uniqueness.\r\nA custom design website, on the other hand, allows you to establish and express your brand through tailored\r\npage elements that align with your objectives. Custom website design cost is relatively higher than website\r\ntemplates, but they offer numerous benefits that give you a competitive edge. A custom WordPress website\r\ndesign is more search engine-friendly, customer-centric, unique and scalable than built-in templates.\r\nBy choosing custom website design packages, you build a website around your specific customer journey and\r\nbrand messaging.', 1, '2022-07-28 08:00:58'),
(4, 0, 1, 'You have to believe that things will get better', '1658994321_FVbQcEVXEAQMLi8.jpg', 'One day you will die and you will be burried', 1, '2022-07-28 08:04:55'),
(5, 0, 3, 'One who quit early will never win', '1658986834_IMG_20220131_094745_596.jpg', 'One who quit early will never win', 1, '2022-07-28 08:40:34'),
(6, 0, 7, 'The spectacle before us was indeed sublime', '1659161428_20220115_004629.jpg', 'The day you will never forget.', 1, '2022-07-28 08:43:49'),
(8, 0, 6, 'Digitalised orphanaged home management system', '1658988143_IMG_20211213_163234_242.jpg', 'Computerized management system is a generic term used to describe \r\napplication of computer hardware and software used to manage orphanage. \r\nOrphanage is the name to describe a residential institution devoted to the care \r\nof orphans- children whose parents are deceased or otherwise unable to care \r\nfor them. Parents and sometimes grandparents, are legally responsible for \r\nsupporting children , but in the absence of these or other relatives willing to \r\ncare for the children they become a ward of the state, and orphanages are a \r\nway of providing for their care and housing. Children are educated within or \r\noutside of the orphanage. There are people who have come with the \r\nestablishment of orphanage home to care for orphans but after sometime you \r\nwill find them back to the street after they have been disappointed , due to \r\nlack of provision of the basic needs. The paper based file system which is \r\nused to store the information of orphans is not good enough to handle the \r\ninformation. The reason of pursuing in this study is because the issue of \r\nstoring information of orphans has not yet been solved.\r\n 1.2 Background Information\r\n2\r\nSaint martin center is located in Laikipia county. It does the following to care \r\nfor the orphans, in counseling and health, there is provision of counseling to \r\nchildren from first contact through rehabilitation, counseling for general \r\nhealth and HIV/AIDS which provide medical care for children and staff. In \r\neducation, arts and culture Saint martin center reintegrate of primary dropouts \r\nback to classes enroll the new street children to government school in laikipia, \r\nprovision of basic school requirement including uniforms, books bus fares \r\netc. Music training as culture and therapy, drama, theatre, sports, video and \r\ncultural programs as edit-entertainment. Provision of food, clothing and \r\nshelter facilities for children, supervision of cleanness, hygiene and general \r\nsanitation. This orphanage home is currently using the paper based system \r\nwith existing methods that slow down the system. This is tiresome and time \r\nconsuming.', 1, '2022-07-28 09:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`) VALUES
(1, 'Content marketing', 'Content marketing'),
(3, 'Search engine optimization', 'Search engine optimization'),
(4, 'Inspiration', 'One who quit early will never win'),
(5, 'Web Design', 'Web Design'),
(6, 'Social media marketing', 'One who quit early will never win'),
(7, 'Quotes', 'Quotes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(0, 'rashid', 'rashid@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(91, 'ouko', 'ouko@gmail.com', '25d55ad283aa400af464c76d713c07ad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
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
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
