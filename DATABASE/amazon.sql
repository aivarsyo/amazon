-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 24, 2022 at 04:12 AM
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
(87, '91prWuFNY4L._AC_SX679_.jpg', 56),
(88, '71jtWKsM60S._AC_SX679_.jpg', 57),
(89, '71nyLyHlJ5L._AC_SX679_.jpg', 57),
(90, '81OFhTK5fpS._AC_SX679_.jpg', 57),
(91, '712vmldoOfL._AC_SX679_.jpg', 57),
(92, '819XAa4DFuS._AC_SX679_.jpg', 57),
(93, '71G-GR8Qg1L._AC_SX679_.jpg', 58),
(94, '81HveHeaJHL._AC_SX679_.jpg', 58),
(95, '81Qv-YG6h1L._AC_SX679_.jpg', 58),
(96, '61XqGraaM7S._AC_SX679_.jpg', 59),
(97, '61Yv9rL9d1L._AC_SX679_.jpg', 59),
(98, '71Nx732PVIL._AC_SX679_.jpg', 59),
(99, '81h6GsLgXEL._AC_UX679_.jpg', 60),
(100, '81Hbqe7BAEL._AC_UX679_.jpg', 60),
(101, '619uk+KXLYL._AC_UX679_.jpg', 60),
(102, '71bkzbUGnhL._AC_SX679_.jpg', 61),
(103, '71GLWbrnUUL._AC_SX679_.jpg', 61),
(104, '71kMWg9zfnL._AC_SX679_.jpg', 61),
(105, '71OcB0c5N4L._AC_SX679_.jpg', 61),
(106, '71CKb7eZBQL._AC_UY879_.jpg', 62),
(107, '71Qx9uMP-qL._AC_UY879_.jpg', 62),
(108, '71t4C-2101L._AC_UY879_.jpg', 62),
(109, '61-ZVKrdKLS._AC_SX679_.jpg', 63),
(110, '71E2-O0Xc+L._AC_SX679_.jpg', 63),
(111, '71rtsvFy--L._AC_SX679_.jpg', 63);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `item_id` int(20) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `item_price` decimal(10,0) NOT NULL,
  `item_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`item_id`, `item_name`, `item_price`, `item_description`) VALUES
(51, 'PlayStation 5 Console', '7999', 'Stunning Games - Marvel at incredible graphics and experience new PS5 features.\r\nBreathtaking Immersion - Discover a deeper gaming experience with support for haptic feedback, adaptive triggers, and 3D Audio technology.\r\nLightning Speed - Harness the power of a custom CPU, GPU, and SSD with Integrated I/O that rewrite the rules of what a PlayStation console can do.\r\nModel Number CFI-1102A'),
(52, 'Apple MacBook Air 13.3\" with Retina Display, M1 Chip with 8-Core CPU and 7-Core GPU, 16GB Memory, 512GB SSD, Space Gray, Late 2020', '7999', 'Apple CTO (Configure To Order) - Upgraded from Stock\r\nApple M1 chip with 8-core CPU, 7-core GPU\r\n16GB unified memory\r\n512GB SSD storage\r\nRetina display with True Tone'),
(53, 'Sony WH-1000XM4 Wireless Industry Leading Noise Canceling Overhead Headphones with Mic for Phone-Call and Alexa Voice Control, Black', '5600', 'Industry-leading noise canceling with Dual Noise Sensor technology\r\nNext-level music with Edge-AI, co-developed with Sony Music Studios Tokyo\r\nUp to 30-hour battery life with quick charging (10 min charge for 5 hours of playback)\r\nTouch Sensor controls to pause play skip tracks, control volume, activate your voice assistant, and answer phone calls\r\nSpeak-to-chat technology automatically reduces volume during conversations\r\nSuperior call quality with precise voice pickup\r\nWearing detection pauses playback when headphones are removed\r\nSeamless multiple-device pairing\r\nAdaptive Sound Control provides a personalized listening experience\r\nUpdated design relieves pressure for long-lasting comfort'),
(54, 'U.S. Art Supply 84-Piece Deluxe Artist Studio Creativity Set Wood Box Case - Art Painting, Drawing, 2 Sketch Pads, 24 Watercolor Paint Colors, 24 Oil Pastels, 24 Colored Pencils, 2 Brush, Starter Kit', '470', 'A complete premium quality professional 84-piece deluxe art creativity artist painting, sketching, and drawing set that contains everything an artist needs to create their masterpieces! Aspiring artists, art students, and professional artists love using this fun, safe, and easy-to-use art painting and drawing set! This set makes an excellent gift for birthdays and holidays.\r\nThis set includes an incredible 84-piece wooden case art set containing 24 premium professional-grade watercolor paint color cakes, 3 mixing trays, 2 paintbrushes, 24 premium oil pastel colors, 24 premium colored pencils, 2 - 2B graphite pencils, pencil sharpener, eraser, and a ruler. Set also includes 2 artist-grade 9\" x 12\" sketch paper pads with 30 sheets in each spiral-bound pad (heavy-weight, 90 lb, 160 gsm).\r\nBeginning artists will appreciate this supply-packed, comprehensive set. Whether working in colored pencil, oil pastel, watercolor, or with a traditional drawing pencil, everything you need is included. All the sets components are fully organized within the compartments of a beautiful wooden storage and carrying case.\r\nThe 24 superior performing artist\'s watercolor vivid paint colors will bring your artwork to life. Our watercolor paints are kid-safe as they are non-toxic, water-based, acid-free, and conform to ASTM D4236 and EN71.\r\nU.S. Art Supply is a national industry leader in Art Supplies, so purchase our products with the confidence that we\'ll provide a refund or replacement if you\'re not satisfied with this item at any time.'),
(55, 'Coceca Mouse Detail Sander Sandpaper Sanding Paper Assorted 40 80 120 180 240 Grits (50pcs Mouse Sandpaper)', '130', 'This premium package includes: 50 sheets of sandpaper in 5 different grades: 40/80/120/180/240 grit, 10 pieces each.\r\nThe sandpaper size is 140mm*90mm, suitable for the 140mm sander.\r\nBacking: hook and loop, easy and quick to stick, sturdy, durable and practical\r\nMade of high quality alumina abrasive, the sandpaper is durable and antistatic, ideal for sanding and polishing.\r\nCome with coarse, medium, fine grades,widely used in the grinding and polishing of metal and non-metal, wood, rubber, leather, plastic, stone, glass and other materials.'),
(56, 'THISWORX Car Vacuum Cleaner - Portable, High Power, Handheld Vacuums w/ 3 Attachments, 16 Ft Cord & Bag - 12v, Auto Accessories Kit for Interior Detailing - Black', '230', 'Practical: A mini vacuum for car or truck that is compact, lightweight (2.4 lbs), and easy to use. The large dust bin capacity is ready for ash, dust, or drive-thru food spills. A fully loaded interior car detailing kit housed in an ergonomic design.\r\nEffective: Made for on-the-go use and to solve out-of-reach problems. A very sandy day at the beach? A coat of dog hair? The portable vacuum cleaner for car is designed to solve problems.\r\nPowerful: The cyclonic force and strong suction of the 106w motor will terminate any dirt or debris; say goodbye to hard-to-reach crumbs stuck under the driver’s seat. Our mini car vacuum even has a top of the line washable HEPA filter.\r\nInterior Car Cleaning Kit Includes: 3 attachments (flathead, extendable, or brush nozzle) for detailing, carry bag, filter brush, and spare HEPA filter. Must have car accessories for men or women; these gadgets will keep the interior cute and tidy.\r\nConvenient: Is the battery always dying when you need a car vac? These truck accessories for men & women use the 12v aux outlet for power. The 16 foot cord gives you the slack you need to clean the backseats or trunk without a snag.'),
(57, 'ONOAYO 5G WiFi Projector 9800L Full HD Native 1920×1080P Bluetooth Projector, ±50° 4P/4D Keystone Support 4K&Zoom, Full Sealed Optical/LCD/LED/Home/Outdoor Wireless Portable Projector for Phone,PC,PS4', '3000', '🚀【5.1 Bidirectional Bluetooth &5G WiFi Projector】 With the latest Bidirectional Bluetooth tech, ONO1 video projector can not only connect to speakers, but also connect to mobile devices and work as a speaker. Built-in dual 10W Hi-Fi stereo sound speaker and Super BT Sensor, ONO1 1080P projector receives signal from devices over 50ft away and creates extraordinary sound. With the last 5G WiFi, more smoothly and faster than 2.4G WiFi.\r\n🔥【9800L & Native 1080P & 12000:1 Contrast Ratio】Our ONO1 movie projector equips 9800L brightness, 1920x1080P high-definition, contrast ratio of 12000: 1 and outstanding color reproduction, depicts crystal clear and vivid picture. Tiny hair of a bird and a man’s subtle expression can be clearly visible. 300’’ big projection screen brings stunning, immersive viewing experience, not only suitable for watching movies, but also perfect for playing games and watching sports competitions.\r\n✨【User-friendly 4-Point Keystone Correction & ZOOM Function & Backpack Included】The advanced 4D/4P Keystone can adjust Vertical and Horizontal angle ±50° much easier than others, just one click on the remote to go to the adjusting page. With ZOOM function, ONO1 HD 4K projector can reduce the image size to 50%. It also has 360°flip function, support front, rear and ceiling installation. Cumbersome setting by moving the home projector manually would be a thing of the past.\r\n🥇【Dust-Proof Sealed Optical Engine & Multimedia Connection】The Sealed Optical Engine of our dust-proof projector prevents dust entering the machine or falling on the lens, ensures no black spots on clarity image. Lamp life reaches 100000 hours. If you are looking for a long-life LED projector in the same price range, we recommend ONO1 home theater projector. Our portable projector offers wide compatibility to devices like TV Stick, PC, Laptop, USB sticks, Android and iOS devices.'),
(58, 'NEWCOSPLAY Super Soft Faux Fur Throw Blanket Premium Sherpa Backing Warm and Cozy Throw Decorative for Bedroom Sofa Floor (Cyan, Throw(50\"x60\"))', '130', 'ULTRA SOFT FABRIC: Faux fur fabric + super soft sherpa fabric. This beautiful sherpa blanket utilizes advanced tie-dye technology, carefully constructed of high grade luxurious faux fur and extremely soft Sherpa. You will fall in love with this softness and elegance.\r\nLUXURY & WARM: Reversible design offers extreme softness, could keep you warm and cozy day or night. Also can be regarded as a decoration to dress up your home while protecting your luxury bed and couch from dirt and stain.\r\nOPTIMUM GIFT: All people can use this sherpa blanket in Coach、Office、Bed、Study, etc. Reversible softness offers all seasons warmth. Perfect for gifts on friend\'s birthday, Mother\'s Day, Father\'s Day, Christmas, etc.\r\nEASY TO CARE: Wash separately in cold water; Machine washable and tumble dry low. This sherpa throw blanket is wrinkle and shrink resistant, durable, and not fade even after long time use and multiple washes.\r\nWIDE VERSATILITY: Available in multiple colors, can be regarded as couch throw, bed blanket, gift idea, also provide the perfect accent for your home décor.'),
(59, 'Waterfall Bathroom Faucet Single Handle - WaterSong Bathroom Basin Faucet Single Handle One Hole, Brushed Nickel Faucet for Bathroom Sink, Modern Vessel Faucet Deck Mount Vanity Faucet, 100% Lead-free', '500', 'Wide Waterfall Spout - The wide waterfall spout is suitable for all kinds of bathroom styles, the upper opening gives you a clear view of the flow of water in a stylish way. The Single-handle design makes it easy to control the flow & water temperature. Watersong bathroom basin faucet makes a balance between the shape and beauty of the water flow, which meets the demand of daily use perfectly while adorning the basin without dispersing the water.\r\n360° Rotation & Tailored Design - Single hole mount creates a cleaner look against custom countertops. 360° rotatable spout enables users to twist the bathroom faucet freely. Users are allowed to rotate the head of this bathroom faucet to flush the corners and upper parts of the basin. Compared with the extraction ones, the size and style of this basic faucet are more suitable for bathrooms. (*Note: this model is suitable for 1 hole, and the deck plate is NOT included)\r\nBrushed Nickel Treatment Coating - Brushed nickel treatment supports to resist scratches, corrosions, or rust from daily use efficiently, which makes the bathroom faucet maintain a new appearance permanently. Metal surfaces will obtain mirror-like metallic luster via brushed treatment, which ensures the style and beauty of different bathroom décor.\r\nEasy Installation - The brief design makes it super easy to install and clean this bathroom waterfall faucet all by yourself, and don\'t hesitate to contact us if you encounter any problems. ***Please confirm if your sink fits: Mounting Hole Diameter: 1.30\'\'-1.38\'\'(33 to 35mm). Max Deck Thickness: 1.77\'\' (45mm).'),
(60, 'COOLIFE Luggage 3 Piece Set Suitcase Spinner Hardshell Lightweight TSA Lock 4 Piece Set', '1170', 'Warranty：Two Years Warranty. Please note that ONLY FAMILY SET has 4 pcs, please ignore the product’s title and select the set you want.\r\n3 piece luggage set 20 inch,24 inch,28 inch upright, can be stored one into another.100% ABS, Lightweight yet extremely durable abs material.\r\nSpinner wheels, multidirectional smooth and silent 360°wheels. Upgrade With TSA-Accepted Lock for security and peace of mind.\r\nSturdy ergonomic aluminum telescoping handle\r\nInterior mesh zip pocket and elasticated,Squared full-capacity design'),
(61, 'SKYRHYME Digital Photo Frame 10.1 Inch WiFi Digital Picture Frame with IPS Touch Screen, 16GB Storage, Easy to Share Photos or Videos via APP, Auto-Rotate', '723', '[IPS Touch Screen ]Digital picture frame with 10.1 Inch high definition 1280 x 800 IPS touch screen is visible clearly via any viewing angle. Built-in 16GB internal memory(12GB available) offers your a big storage capacity to keep you precious memories.\r\n[Simple Operation&Instant Sharing ]Digital photo frame only need to connect wireless network, download the \"frameo\" app which is available for both Android and iOS mobile phones, then you can enjoy the pleasure of using the wifi digital picture frame to share photos and videos privately and safely.\r\n[Intersting Functions]This wifi digital picture frame 10.1 inch using free app \"frameo\" to send pictures from anywhere and add funny captions/messages you want to write down with the picture, all your cherished moments can be displayed on the digital photo frame instantly. Brightness and sleep mode can be adjusted to suit your needs and preferences.\r\n[As a Perfect Decoration]SKYRHYME digital picture frame has simply and elegantly designed. It is the best choice for living room, bedroom, office decoration. Auto-rotation and Wall mountable feature allows you to put the frame on the wall as you wish and view the photos in either portrait or landscape mode.\r\n[Best Gift for Your Loved One]This digital pohoto frame is best suitable for different scenarios, Thanksgiving Day, Mother\'s Day, Father\'s Day, birthday, wedding day, graduation ceremony and Christmas. The wifi digital photo frame as a brilliant gift for family and friends especially the elders which make them feel stay close with you.'),
(62, 'Womens Casual Flannel Wool Blend Plaid Lapel Button Down Long Sleeve Shacket Jacket Coat Winter Loose Oversize Shirts', '230', 'Polyester & Flannel\r\nButton closure\r\nMachine Wash\r\nYou can refer to the model’s picture on the left.（Modle:Height 5\'5\"; Bust 36.6\"; Weight 119lb Size:M.)\r\nLined shacket, 2 buttoned chest pockets and 2 hand pockets, turn down collar, single button cuffs, round hem, checked pattern womens flannel jacket.\r\nRelaxed fit shakets women, mid-weight flannel overshirt outerwear shirt jacket women.Vintage classical fashion timeless long sleeve button-down boyfriend style tartan flannel jackets tops.\r\nThis boyfriend plaid shacket goes well with long sleeve shirt underneath, jeans, shorts, skinny leggings, scarf, and boots in fall and winter, belt is not included.\r\nWomens shacket perfect for autumn spring winter daily work outdoor indoor hiking shopping walking dating travel Christmas holiday vacation home street wear.'),
(63, 'Bedsure Large Orthopedic Foam Dog Bed for Small, Medium, Large and Extra Large Dogs/Cats Up to 50/75/100lbs - Orthopedic Egg-Crate Foam with Removable Washable Cover - Water-Resistant Pet Mat', '217', 'Egg Crate Foam: 3\" high mattress-like foam dog bed evenly distributes pet’s weight, which provides maximum support and comfort for dogs and cats of all ages, especially puppies or older dogs.\r\nUltimate Sleep Surface: Plush Sherpa top pet bed creates extra coziness for your four-legged friends to sleep like a log every night.\r\nReversible Design: Built with Oxford fabric on the bottom and sides, the dog bed can hold up to daily wear and tear.\r\nSmart Design: Rectangle shaped mattress is perfect for your pets to sleep and roomy enough to stretch out. It also can be placed on any elevated dog bed & dog bed trampoline or in a crate & pet house.\r\nEasy Care: Zippered, removable cover that’s machine washable for quick cleaning up. The inner egg crate foam is not washable.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(20) NOT NULL,
  `user_last_name` varchar(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(8) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `user_ver_key` varchar(32) NOT NULL,
  `user_is_verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `user_email`, `user_phone`, `user_password`, `user_ver_key`, `user_is_verified`) VALUES
(43, 'Aivars', 'Lejnieks', 'amazondevelopment1@gmail.com', '12345678', '$2y$10$9Ic7iov4norA1kdnZh1FoeJqyImf19dEolZ9OcAyFLXSttlZaGzBi', 'a169856c1c3d44c1bd2000477af733f1', 1),
(58, 'Aivars', 'Jonathan', 'birejop130@icesilo.com', '50207776', '$2y$10$BWSD227C1qmL6xNXPBMoMeKEeJtrCdeYErmdVGH19qLSoXW/FtvRa', '', 1),
(59, 'Aivars', 'Lejnieks', 'sdjaghsdas@ghsgdhj.com', '50207776', '$2y$10$7Rp1BJPj37FTPwpePMMCo.8mUq2jxNWlKGxAUp1drQKr5zBlfWQk6', '26821f8995cf8a78551719f5c9754c11', 0),
(60, 'Aivars', 'Lejnieks', 'saxsaxsc@skxsakcj.com', '50207776', '$2y$10$.9hPDZVEmTh2B16jyFTrRes0OvDyvNAODLqEd10zTgbtGK8CGsb1G', 'b774c80936e08bdeea89250217888dad', 0),
(61, 'Chempis', 'Chempis', 'tarora9910@roxoas.com', '50207776', '$2y$10$hxoGu65EedcQKHuepdQ56.o.Dni9tfy6tGF1dLlFiJg.HtRBgoxOy', '52a731cf2be6a7cd6b226d9e2db6ca1c', 0);

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
  MODIFY `image_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `item_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;