-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2024 at 08:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bannaprue_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `activity_type` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `email`, `password`, `role`) VALUES
(1, 'daow', 'kammin', 'thanadon.hcyp@gmail.com', '$2y$10$SX51sajZH6ISa0BfxoExP.3CzsSreXM0RHSWL1Yiruq/AT7aTSq0u', 'admin'),
(2, 'qweee', 'rqwr', 'daow@asd.com', '$2y$10$E16pDUJeYylNP3KOYO5Bgufosi8CM9ctimW1HgyeuPcDulkRvLimG', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `images` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `images`, `created_at`) VALUES
(18, 'เทศบาลตำบลบ้านนาปรือเข้าร่วมโครงการจิตอาสา', 'วันอังคาร ที่ 2 เมษายน 2567 เทศบาลตำบลบ้านนาปรือเข้าร่วมโครงการจิตอาสา เราทำความดีด้วย หัวใจ ณ วนพุทธอุทยานโลกเขาอีโต้\r\n', '../../uploads/434294289_730895429197422_4591216307294243580_n.jpg', '2024-04-09 05:47:37'),
(19, ' สิ้นสุดการแข่งขันกีฬาต้านภัยยาเสพติดบ้านนาปรือ (ฟุตบอล) ครั้งที่ 24 ประจำปี พ.ศ.2567', 'วันอาทิตย์ที่ 31 มีนาคม พ.ศ.2567 สิ้นสุดการแข่งขันกีฬาต้านภัยยาเสพติดบ้านนาปรือ (ฟุตบอล) ครั้งที่ 24 ประจำปี พ.ศ.2567 ทางเทศบาลตำบลบ้านนาปรือขอแสดงความยินดีกับผู้ชนะและเป็นกำลังใจให้กับผู้แพ้ แล้วพบกันใหม่ในปี พ.ศ.2568\r\n', '../../uploads/434161482_730378772582421_7327551667168431411_n.jpg', '2024-04-09 05:49:38'),
(20, ' ขอแสดงความยินดีกับคุณพงษ์ยศ บัวศรี หัวหน้าฝ่ายแบบแผนและก่อสร้าง', 'เทศบาลตำบลบ้านนาปรือ ขอแสดงความยินดีกับคุณพงษ์ยศ บัวศรี หัวหน้าฝ่ายแบบแผนและก่อสร้าง โอนย้ายไปประจำตำแหน่ง ณ สำนักงานเทศบาลตำบลหัวกุญแจ ตำบลคลองกิ่ว อำเภอบ้านบึง จังหวัดชลบุรี\r\n', '../../uploads/429809732_712266607726971_4896128063900504208_n.jpg', '2024-04-09 05:50:47'),
(21, 'จัดกิจกรรมวันเด็กแห่งชาติ ปะจำปี ๒๕๖๗', 'ด้วยเทศบาลตำบลบ้านนาปรือ จัดกิจกรรมวันเด็กแห่งชาติ ปะจำปี ๒๕๖๗ ในวันเสาร์ที่ ๑๓ มกราคม พ.ศ.๒๕๖๗ เพื่อเป็นการฉลองวันเด็กแห่งชาติ และเพื่อเสริมสร้างความรู้ ความเข้าใจและสร้างความตระหนักในเรื่องคุณธรรม จริยธรรม ความรักความสามัคคี รวมทั้งปลูกฝังให้เด็กรู้จักการมีส่วนร่วมในสังคม อีกทั้งยังมีการจับฉลากของขวัญ มีเล่นฐานกิจกรรม อาหารเครื่องดื่มฟรีตลอดทั้งงาน ในการนี้ เทศบาลตำบลบ้านนาปรือ นำโดย นายบัณฑิต แดงศิริ นายกเทศมนตรีตำบลบ้านนาปรือ คณะผู้บริหาร สมาชิกสภา ข้าราชการและพนักงานจ้าง ขอเชิญชวนร่วมงานวันเด็กแห่งชาติ ประจำปี ๒๕๖๗ ณ โรงเรียนบ้านเนินหอม ', '../../uploads/419666659_685406707079628_3707997274318141554_n.jpg', '2024-04-09 05:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `otp_table`
--

CREATE TABLE `otp_table` (
  `id` int(11) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `expire_time` datetime NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `otp_table`
--

INSERT INTO `otp_table` (`id`, `tel`, `otp`, `expire_time`, `used`) VALUES
(1, '+66971597192', '727224', '2024-04-08 10:49:23', 0),
(2, '+66971597192', '840037', '2024-04-08 10:56:53', 0),
(3, '+66971597192', '416495', '2024-04-08 11:08:39', 0),
(4, '+66971597192', '105899', '2024-04-08 10:05:37', 0),
(5, '+66971597192', '554691', '2024-04-08 16:03:23', 0),
(6, '66971597192', '234157', '2024-04-08 16:22:17', 0),
(7, '66971597192', '573079', '2024-04-08 16:46:28', 0),
(8, '+66971597192', '927613', '2024-04-08 16:50:11', 0),
(9, '+66971597192', '614999', '2024-04-08 16:54:46', 0),
(10, '1231231233', '796753', '2024-04-08 16:55:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reset_passwords`
--

CREATE TABLE `reset_passwords` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expire_time` datetime NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `reset_passwords`
--

INSERT INTO `reset_passwords` (`id`, `user_id`, `token`, `expire_time`, `used`) VALUES
(1, 25, 'ee0eacabc6fd2921b464796f0ce14d46', '2024-04-08 09:47:31', 0),
(2, 25, 'f1c40141e8c8fc74bffb61f00ae50fae', '2024-04-08 09:49:23', 0),
(3, 25, '6cd19363d48a0a5cf926c25a30ac8752', '2024-04-08 09:49:29', 0),
(4, 25, 'f3e82366628f5a1dd81c60f90f56ca4a', '2024-04-08 09:51:52', 0),
(5, 25, 'b4a22034c8bdcb9f2a5e5c2348dea323', '2024-04-08 09:52:16', 0),
(6, 25, '8a19ee64674912463b6b392b8c3251e5', '2024-04-08 10:08:40', 0),
(7, 27, 'e997f65b9986abb092feb7787784c571', '2024-04-08 10:11:26', 0),
(8, 25, '684c39fcca80ac3d8034d883640a4ff6', '2024-04-08 10:34:23', 0),
(9, 25, 'ee2c47ad449833f0aebe90e2c1953e31', '2024-04-08 10:38:56', 0),
(10, 25, '728290386270670ffb1d4d20495c4a71', '2024-04-08 10:39:00', 0),
(11, 25, '153a539bdf722fb84602bf15c849554f', '2024-04-08 10:55:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `skilled`
--

CREATE TABLE `skilled` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `images` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `skilled`
--

INSERT INTO `skilled` (`id`, `name`, `description`, `images`, `created_at`) VALUES
(4, 'ทองมา เกตุแก้ว', 'ทองมา เกตุแก้ว ผู้มีความสามารถด้านศิลปะการตีมีด\r\n\r\nวิชาการตีมีดลุงทองมา เกตุแก้ว ได้รับการถ่ายทอดมาจากคุณปู่ตกทอดเรื่อยมาจนตัวเองมีความเชี่ยวชาญทางด้านนี้จึงคิดนำมาเป็นอาชีพหาเลี้ยงตัวเองและครอบครัว\r\n\r\nลุงทองมา เล่าว่า จริงๆ เริ่มทำอาชีพตีมีดอย่างจริงจังมาตั้งแต่ปี พ.ศ. 2534 โดยแต่ก่อนรับทำทุกอย่างทั้งเคียว มีดพร้า มีดเหน็บและมีดที่ใช้ในการเกษตรทุกชนิด แต่ปัจจุบันลูกค้าส่วนใหญ่มักจะสั่งทำมีดพร้ากับมีเหน็บก็ทำให้เรามีความชำนาญสำหรับมีด 2 ชนิดนี้มากเป็นพิเศษ\r\n\r\nว่ากันว่า มีดที่ลุงทองมานั้นขึ้นมากในเรื่องความทนทาน ซึ่งลุงทองมาให้เหตุผลว่า เหล็กที่นำมาตีนี้ ส่วนใหญ่จะคัดพิเศษเอาเฉพาะเหล็กกล้าจริงๆ\r\n\r\nปัจจุบันนอกจากลุงทองมาจะมีฝีมือในการตีมีดแล้ว ลุงทองมายังเป็นประธานกลุ่มจักสานของบ้านเนินหอมอีกด้วย\r\n\r\nนายทองมา เกตุแก้ว เสียชีวิตด้วยอุบัติเหตุขณะเดินทางกลับบ้านด้วยรถตุ๊ก ๆ คู่ชีพหลังจากการไปทำสวนระแวกบ้านแถวเนินหอม เมื่อวันที่ 4 สิงหาคม 2565', '../../uploads/hero-1.jpg', '2024-04-09 05:55:34'),
(5, 'สุภางค์ บุญชู', 'กลุ่มแม่บ้านเกษตรสมุนไพรบ้านเนินหอม ซึ่งปัจจุบันมีคุณสุภางค์ บุญชู เป็นหัวหน้ากลุ่มได้เริ่มต้นดำเนินการมาตั้งแต่ปี พ.ศ. 2544 โดยในช่วงแรกมีเจ้าหน้าที่จากโรงพยาบาลเจ้าพระยาอภัยภูเบศร มาให้คำแนะนำแต่ผลิตภัณฑ์ชนิดแรกที่กลุ่มทำเป็นขนม “กล้วยกรอบ” ไม่ใช้ผลิตภัณฑ์จากสมุนไพร เช่นปัจจุบัน เพราะขณะนั้นเห็นว่า กล้วยเป็นวัตถุดิบที่ชุมชนที่อยู่แล้ว และต้นทุนในการผลิตก็ไม่สูงนัก\r\n\r\nเมื่อเริ่มดำเนินการไปซักระยะก็เริ่มมีสมาชิกในกลุ่มเพิ่มขึ้นจาก 2 คนก็เพิ่มเป็ฯ 20 คน ทางกลุ่มจึงทดลองทำผลิตภัณฑ์แปรรูปสมุนไพร เช่น ชุดอบลูกประคบ ธูปสมุนไพร ฯลฯ เป็นผลิตภัณฑ์เสริม เพราะสมาชิกในกลุ่มหลายคนมีความรู้พื้นฐานด้านนี้อยู่แล้ว แต่เมื่อเริ่มดำเนินการซักระยะ ภาครัฐเริ่มให้การสนับสนุนบวกกับความต้องการของผู้ที่ชื่นชอบในด้านสมุนไพรมีเพิ่มมากขึ้นมีธุรกิจประเภทสปาเกิดขึ้นอย่างแพร่หลายทำให่ “สมุนไพรนวดตัวเพื่อสุขภาพ” ของกลุ่มได้รับความนิยมเพิ่มขึ้นเรื่อยๆ จนปัจจุบัน “ชุดสมุนไพรนวดตัว” กลายเป็นผลิตภัณฑ์ตัวหลักที่สร้างรายได้ให้กลุ่ม\r\n\r\n“ชุดสมุนไพรนวดตัวของเรา จะประกอบไปด้วยตะไคร่หอม ใบเปล้า ใบหนาด ใบมะขาม ใบส้มโอ มะกรูด ขมิ้น ไพล และการบูร ซึ่งชุดสมุนไพรรอบตัวนี้ถือว่าเป็นความสำเร็จของกลุ่มอย่างมาก เพราะจากจุดเริ่มที่เรานำภูมิปัญญา ชาวบ้าน มาเริ่มทำเป็นสินค้า เราคาดเดาไม่ได้ว่าจะได้รับการยอมรับหรือไม่ แต่ปัจจุบันได้กลายเป็นผลิตภัณฑ์ที่ผู้ประกอบการทำสปาให้การ ยอมรับมียอดสั่งเข้าจนบางช่วงเราทำไม่ทัน” สุภางค์ ผู้ริเริ่มกลุ่มสมุนไพรกล่าว\r\n\r\nปัจจุบันชุดสมุนไพรรอบตัวของกลุ่มแม่บ้านเกษตรสมุนไพรบ้านเนินหอมเป็นผลิตภัณฑ์ OTOP ระดับ 3 ดาว ซึ่งส่งขายไปทั่วประเทศ', '../../uploads/hero-3.jpg', '2024-04-09 05:56:33'),
(6, 'อุบล  ทิพย์โอสถ', 'อังกะลุง เป็นเครื่องดนตรไทยชนิดหนึ่งที่มีความเก่าแก่คู่กับคนไทยมาอย่างยาวนาน ประดิษฐ์จากวัสดุธรรมชาติที่ประเทศของเรามีอยู่มากมาย สะท้อนให้เห็นถึงภูมิปัญญาของผู้ที่นำเอาไม้ไฝ่ท่อนหนึ่งมาประกอบกันจนเป็นเสียงที่ น่าอัศจรรย์ได้\r\nเนื่องจากในวัยเด็ก ของลุง อุบล ทิพย์โอสถ มีความสนใจในการเล่นดนตรีไทยหลายปรัเภททั้ง ระนาด กลอง อังกะลุง เป็นต้น ประกอบกับมีคุณลุงที่เป็นนักดนตรีไทยและยังสามารถประดิษฐ์อังกะลุงขาย จึงทำให้ลุง อุบลเกิดความผูกพันธ์กับอังกะลุงและยังสามารถเล่นอังกะลุงอย่างคล่องแคล่วไม่แพ้ดนตรประเภทอื่น\r\nพอเริ่มเป็นผู้ใหญ่จึงมีความคิดที่จะประกอบอาชีพทำอังกะลุง จำหน่าย แต่ในระยะแรกๆ เริ่มต้นต้องพบกับอุปสรรคทั้งในด้านการผลิตต้องลองผิดลองถูก ปัญหาทางด้านการตลาด แต่ลุงอุบลก็ไม่ย่อท้อ กระทั้งฟันฝ่ามาได้ จนตัวเองมีความชำนาญจนได้รับจากสถาบันการศึกษาและร้านค้าที่นำไปจำหน่ายมากขึ้น\r\nปัจจุบัน ลุงอุบลสามารถยืนหยัดในอาชีพทำอังกะลุงจำหน่าย โดยมีลูกค้าประจำทำให้การตอบรับอย่างดี และยังเป็นการอนุรักษ์ง่นช่างฝีมือของคนไทยที่ น่าภาคภูมิใจอีกด้วย ได้ยินและได้รู้จักกันแบบนี้แล้ว ทุกท่านคิดเหมือนแอดมินไหมครับ ผมภูมิใจจัง ที่ได้อยู่ บ้านเนินหอม สุดท้ายนี้ อย่าให้ ของดีเรื่องราวดีๆมันจางหายไป ทุกคนช่วยกันนะครับ ', '../../uploads/hero-2.jpeg', '2024-04-09 05:57:58'),
(7, 'นิพนธ์ ยอดคําปัน', '\"เครื่องทองโบราณ\" สิ่งบ่งชี้ความเป็นอารยะที่สืบทอดกันมาแต่ครั้งโบราณกาล ครูนิพนธ์ ยอดคำปัน ครูช่างทองหลวง จังหวัดนนทบุรี ผู้นำเอาเทคนิคการทำเครื่องของโบราณจากสมัยอยุธยา มาสร้างสรรค์ผลงานอันแสนวิจิตรในรูปแบบของเครื่องประดับ และเครื่องใช้ต่าง ๆ ด้วยการนำเอาต้นแบบจากงานลายผ้า งานสถาปัตยกรรม งานแกะสลัก งานปูนปั้น และต้นแบบเครื่องทองโบราณจากวัดราชบูรณะ มาเป็นแรงบันดาลใจในการออกแบบเครื่องทองในรูปทรงโบราณ งานทุกชิ้นล้วนเป็นงานประณีตศิลป์ คงรูปแบบการทำทองแบบราชสำนักโบราณที่สืบทอดต่อกันมา\r\n\r\nติดตามชมในรายการศิษย์มีครู วันเสาร์ที่ 15 กันยายน 2561 เวลา 17.05 – 18.00 น. ทางไทยพีบีเอส รับชมออนไลน์ทาง www.thaipbs.or.th/Live\r\n\r\nแท็กที่เกี่ยวข้อง:\r\nเครื่องทองโบราณ\r\nนิพนธ์ ยอดคำปัน\r\nช่างเครื่องทองโบราณ\r\nสมัยอยุธยา\r\nสถาปัตยกรรม\r\nงานแกะสลัก\r\nวัดราชบูรณะ\r\n', '../../uploads/creator-V4E5gasR45.jpeg', '2024-04-09 06:43:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `lineid` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `address`, `tel`, `password`, `lineid`, `created_at`) VALUES
(20, 'wrwe', 'kammin', 'qwrqw@fsfa.com', '2 bangkok fasfsa', '8888888888', '$2y$10$UCaOrTFlXqVW3YtqmhqKuOo2B570o4Y/nk//MNTuYMnT7oFffuYQy', 'asffasf1', '2024-04-05 11:56:06'),
(23, 'daow', 'twtwetwe', 'thanadon.hcyp@gmail.com', '2 bangkok', '1231235554', '$2y$10$k832j.cisGCayqdbDDb5jeq9kq/xSsvfXBMndZEJZ.WcO9aCsCmV2', 'asffasf1', '2024-04-05 12:50:52'),
(24, 'daow', 'kammin', 's6506021411051@email.kmutnb.ac.th', '2 bangkok fasfsa', '1231235554', '$2y$10$Wg2YVLrZC0Wx6VS1g4T5WerfDEmWUwmilR48OAFl2kytB9TvGIwSW', 'baw221', '2024-04-05 14:31:53'),
(25, 'Thanadon', 'hanchaiyaphum', 'bomkehe512@gmail.com', '32/6 M.2 Ratniyom Sainoi Nonthaburi 11150', '+66971597192', '$2y$10$4bJjrmk4yAOEQkAWdTXwNuSqeLHANuERP/R0utMi7jNnYCQ4rpP.e', 'sosadogs', '2024-04-07 19:20:30'),
(26, 'tgatat', 'taqtqgyq', 'daow@asd.com', '2 bangkok', '1231231233', '$2y$10$1V4GPfLpOeAU4Jpp5uB5A.dtxr74V9VH9sbd7az0RepU8YbTMVI9G', 'rqrww123', '2024-04-07 19:20:46'),
(27, 'wrwe', 'twtwetwe', 'thanadon152@gmail.com', '2 bangkok fasfsat', '0863249571', '$2y$10$38bTHYz/2WzIDBjxiAF93uwiFoupzqzEFi4TGHodjGFsvqz9S.eXe', 'baw221', '2024-04-08 07:41:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp_table`
--
ALTER TABLE `otp_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_passwords`
--
ALTER TABLE `reset_passwords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `skilled`
--
ALTER TABLE `skilled`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `otp_table`
--
ALTER TABLE `otp_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reset_passwords`
--
ALTER TABLE `reset_passwords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `skilled`
--
ALTER TABLE `skilled`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reset_passwords`
--
ALTER TABLE `reset_passwords`
  ADD CONSTRAINT `reset_passwords_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
