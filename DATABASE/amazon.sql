-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 16, 2021 at 06:41 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `amazon`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(20) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `item_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image_name`, `item_id`) VALUES
(72, '61d4loPJB9L._SX522_.jpg', 51),
(73, '616MzNFe+8L._SX522_.jpg', 51),
(74, '619BkvKW35L._SX522_.jpg', 51),
(75, '51KhexN7YkL._AC_SX679_.jpg', 52),
(76, '51YReEVNatL._AC_SX679_.jpg', 52),
(77, '61Qw4GvCWLL._AC_SX679_.jpg', 52),
(78, '516LKoqpZGL._AC_SX679_.jpg', 52),
(79, '71o8Q5XJS5L._AC_SX679_.jpg', 53),
(80, '81hmYqQytUL._AC_SX679_.jpg', 53),
(81, '91A0cl5qo3L._AC_SX679_.jpg', 54),
(82, '91Qm7+J7ZNL._AC_SX679_.jpg', 54),
(83, '91YQHjXQeuL._AC_SX679_.jpg', 54),
(84, '61l0waK05oL._SX522_.jpg', 55),
(85, '71sAovWXrWL._SX522_.jpg', 55),
(86, '81ibHPBxFcL._AC_SX679_.jpg', 56),
(87, '91prWuFNY4L._AC_SX679_.jpg', 56);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `item_id` int(20) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `item_price` decimal(10,0) NOT NULL,
  `item_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`item_id`, `item_name`, `item_price`, `item_description`) VALUES
(51, 'PlayStation 5 Console', '7999', 'Stunning Games - Marvel at incredible graphics and experience new PS5 features.\r\nBreathtaking Immersion - Discover a deeper gaming experience with support for haptic feedback, adaptive triggers, and 3D Audio technology.\r\nLightning Speed - Harness the power of a custom CPU, GPU, and SSD with Integrated I/O that rewrite the rules of what a PlayStation console can do.\r\nModel Number CFI-1102A'),
(52, 'Apple MacBook Air 13.3\" with Retina Display, M1 Chip with 8-Core CPU and 7-Core GPU, 16GB Memory, 512GB SSD, Space Gray, Late 2020', '7999', 'Apple CTO (Configure To Order) - Upgraded from Stock\r\nApple M1 chip with 8-core CPU, 7-core GPU\r\n16GB unified memory\r\n512GB SSD storage\r\nRetina display with True Tone'),
(53, 'Sony WH-1000XM4 Wireless Industry Leading Noise Canceling Overhead Headphones with Mic for Phone-Call and Alexa Voice Control, Black', '3500', 'Industry-leading noise canceling with Dual Noise Sensor technology\r\nNext-level music with Edge-AI, co-developed with Sony Music Studios Tokyo\r\nUp to 30-hour battery life with quick charging (10 min charge for 5 hours of playback)\r\nTouch Sensor controls to pause play skip tracks, control volume, activate your voice assistant, and answer phone calls\r\nSpeak-to-chat technology automatically reduces volume during conversations\r\nSuperior call quality with precise voice pickup\r\nWearing detection pauses playback when headphones are removed\r\nSeamless multiple-device pairing\r\nAdaptive Sound Control provides a personalized listening experience\r\nUpdated design relieves pressure for long-lasting comfort'),
(54, 'U.S. Art Supply 84-Piece Deluxe Artist Studio Creativity Set Wood Box Case - Art Painting, Drawing, 2 Sketch Pads, 24 Watercolor Paint Colors, 24 Oil Pastels, 24 Colored Pencils, 2 Brush, Starter Kit', '450', 'A complete premium quality professional 84-piece deluxe art creativity artist painting, sketching, and drawing set that contains everything an artist needs to create their masterpieces! Aspiring artists, art students, and professional artists love using this fun, safe, and easy-to-use art painting and drawing set! This set makes an excellent gift for birthdays and holidays.\r\nThis set includes an incredible 84-piece wooden case art set containing 24 premium professional-grade watercolor paint color cakes, 3 mixing trays, 2 paintbrushes, 24 premium oil pastel colors, 24 premium colored pencils, 2 - 2B graphite pencils, pencil sharpener, eraser, and a ruler. Set also includes 2 artist-grade 9\" x 12\" sketch paper pads with 30 sheets in each spiral-bound pad (heavy-weight, 90 lb, 160 gsm).\r\nBeginning artists will appreciate this supply-packed, comprehensive set. Whether working in colored pencil, oil pastel, watercolor, or with a traditional drawing pencil, everything you need is included. All the sets components are fully organized within the compartments of a beautiful wooden storage and carrying case.\r\nThe 24 superior performing artist\'s watercolor vivid paint colors will bring your artwork to life. Our watercolor paints are kid-safe as they are non-toxic, water-based, acid-free, and conform to ASTM D4236 and EN71.\r\nU.S. Art Supply is a national industry leader in Art Supplies, so purchase our products with the confidence that we\'ll provide a refund or replacement if you\'re not satisfied with this item at any time.'),
(55, 'Coceca Mouse Detail Sander Sandpaper Sanding Paper Assorted 40 80 120 180 240 Grits (50pcs Mouse Sandpaper)', '130', 'This premium package includes: 50 sheets of sandpaper in 5 different grades: 40/80/120/180/240 grit, 10 pieces each.\r\nThe sandpaper size is 140mm*90mm, suitable for the 140mm sander.\r\nBacking: hook and loop, easy and quick to stick, sturdy, durable and practical\r\nMade of high quality alumina abrasive, the sandpaper is durable and antistatic, ideal for sanding and polishing.\r\nCome with coarse, medium, fine grades,widely used in the grinding and polishing of metal and non-metal, wood, rubber, leather, plastic, stone, glass and other materials.'),
(56, 'THISWORX Car Vacuum Cleaner - Portable, High Power, Handheld Vacuums w/ 3 Attachments, 16 Ft Cord & Bag - 12v, Auto Accessories Kit for Interior Detailing - Black', '230', 'Practical: A mini vacuum for car or truck that is compact, lightweight (2.4 lbs), and easy to use. The large dust bin capacity is ready for ash, dust, or drive-thru food spills. A fully loaded interior car detailing kit housed in an ergonomic design.\r\nEffective: Made for on-the-go use and to solve out-of-reach problems. A very sandy day at the beach? A coat of dog hair? The portable vacuum cleaner for car is designed to solve problems.\r\nPowerful: The cyclonic force and strong suction of the 106w motor will terminate any dirt or debris; say goodbye to hard-to-reach crumbs stuck under the driver’s seat. Our mini car vacuum even has a top of the line washable HEPA filter.\r\nInterior Car Cleaning Kit Includes: 3 attachments (flathead, extendable, or brush nozzle) for detailing, carry bag, filter brush, and spare HEPA filter. Must have car accessories for men or women; these gadgets will keep the interior cute and tidy.\r\nConvenient: Is the battery always dying when you need a car vac? These truck accessories for men & women use the 12v aux outlet for power. The 16 foot cord gives you the slack you need to clean the backseats or trunk without a snag.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(20) NOT NULL,
  `user_last_name` varchar(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `user_ver_key` varchar(32) NOT NULL,
  `user_is_verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `user_email`, `user_password`, `user_ver_key`, `user_is_verified`) VALUES
(43, 'Aivars', 'Lejnieks', 'amazondevelopment1@gmail.com', '$2y$10$9Ic7iov4norA1kdnZh1FoeJqyImf19dEolZ9OcAyFLXSttlZaGzBi', 'ac4b9e3f0f0ed93fd49e2795faf6ebed', 1),
(44, 'Aivars', 'Lejnieks', 'aivars.lejnieks@gmail.com', '$2y$10$1v2klFLjrIAUDAgr8VFiL.rlmZ2e77sTOVK1iNFzTEq7T52BN87Ca', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `item_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
