-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 08:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votify`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `candidate_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`candidate_id`, `name`, `image`) VALUES
(1, 'Sharad Pawar', 'candidate_images/candidate1.jpg'),
(2, 'Nikhilkumar Thakor', 'candidate_images/candidate2.jpg'),
(3, 'Mukesh Singh', 'candidate_images/candidate3.jpg'),
(4, 'Shekhar Nikam', 'candidate_images/candidate4.jpg'),
(5, 'Arvind Kejriwal', 'candidate_images/candidate5.jpg'),
(6, 'Jagdish Chander', 'candidate_images/candidate6.jpg'),
(7, 'Sushma Kharkwal', 'candidate_images/candidate7.jpg'),
(8, 'Bijoy Malakar', 'candidate_images/candidate8.jpg'),
(9, 'Ashok Bendalam', 'candidate_images/candidate9.jpg'),
(10, 'Narendra Modi', 'candidate_images/candidate10.jpg'),
(11, 'Rahul Gandhi', 'candidate_images/candidate11.jpg'),
(12, 'Mamata Banerjee', 'candidate_images/candidate12.jpg'),
(13, 'Ganesh Choudhari', 'candidate_images/candidate13.jpg'),
(14, 'Jayanti Naik', 'candidate_images/candidate14.jpg'),
(15, 'Gnani Sankaran', 'candidate_images/candidate15.jpg'),
(16, 'Jyoti Kalamkar', 'candidate_images/candidate16.jpg'),
(17, 'Rekha Gupta', 'candidate_images/candidate17.jpg'),
(18, 'Atmaram Tripathi', 'candidate_images/candidate18.jpg'),
(19, 'Vivek Thakur', 'candidate_images/candidate19.jpg'),
(20, 'Sanjay Singh', 'candidate_images/candidate20.jpg'),
(21, 'Sharad Pawar', 'candidate_images/candidate1.jpg'),
(22, 'Abhijit Tambile', 'candidate_images/candidate21.jpg'),
(23, 'Amit Chavhan', 'candidate_images/candidate22.jpg'),
(24, 'Anant Sawant', 'ccandidate_images/candidate23.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `state_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`) VALUES
(1, 'Port Blair', 1),
(2, 'Car Nicobar', 1),
(3, 'Hut Bay', 1),
(4, 'Rangat', 1),
(5, 'Mayabunder', 1),
(6, 'Diglipur', 1),
(7, 'Little Andaman', 1),
(8, 'Long Island', 1),
(9, 'Neil Island', 1),
(10, 'Wandoor', 1),
(11, 'Bamboo Flat', 1),
(12, 'Ferrargunj', 1),
(13, 'Hyderabad', 2),
(14, 'Visakhapatnam', 2),
(15, 'Vijayawada', 2),
(16, 'Guntur', 2),
(17, 'Nellore', 2),
(18, 'Kurnool', 2),
(19, 'Rajahmundry', 2),
(20, 'Tirupati', 2),
(21, 'Eluru', 2),
(22, 'Kakinada', 2),
(23, 'Anantapur', 2),
(24, 'Chittoor', 2),
(25, 'Kadapa', 2),
(26, 'Vizianagaram', 2),
(27, 'Tenali', 2),
(28, 'Proddatur', 2),
(29, 'Machilipatnam', 2),
(30, 'Adoni', 2),
(31, 'Srikakulam', 2),
(32, 'Guntakal', 2),
(33, 'Hindupur', 2),
(34, 'Nandyal', 2),
(35, 'Madanapalle', 2),
(36, 'Chilakaluripet', 2),
(37, 'Itanagar', 3),
(38, 'Naharlagun', 3),
(39, 'Tawang', 3),
(40, 'Bomdila', 3),
(41, 'Along', 3),
(42, 'Pasighat', 3),
(43, 'Roing', 3),
(44, 'Ziro', 3),
(45, 'Tezu', 3),
(46, 'Daporijo', 3),
(47, 'Aalo', 3),
(48, 'Namsai', 3),
(49, 'Hayuliang', 3),
(50, 'Changlang', 3),
(51, 'Khonsa', 3),
(52, 'Mechuka', 3),
(53, 'Tuting', 3),
(54, 'Bhalukpong', 3),
(55, 'Dibang', 3),
(56, 'Hawai', 3),
(57, 'Miao', 3),
(58, 'Nacho', 3),
(59, 'Guwahati', 4),
(60, 'Silchar', 4),
(61, 'Dibrugarh', 4),
(62, 'Jorhat', 4),
(63, 'Nagaon', 4),
(64, 'Tezpur', 4),
(65, 'Tinsukia', 4),
(66, 'Barpeta', 4),
(67, 'Sivasagar', 4),
(68, 'Goalpara', 4),
(69, 'Karimganj', 4),
(70, 'Hailakandi', 4),
(71, 'Bongaigaon', 4),
(72, 'Nalbari', 4),
(73, 'Dhubri', 4),
(74, 'Kokrajhar', 4),
(75, 'Lakhimpur', 4),
(76, 'Dhemaji', 4),
(77, 'Dima Hasao', 4),
(78, 'Morigaon', 4),
(79, 'Darrang', 4),
(80, 'Baksa', 4),
(81, 'Chirang', 4),
(82, 'Kamrup', 4),
(83, 'Kamrup Metropolitan', 4),
(84, 'Nagaon', 4),
(85, 'Nalbari', 4),
(86, 'Kokrajhar', 4),
(87, 'Baksa', 4),
(88, 'Sonitpur', 4),
(89, 'Patna', 5),
(90, 'Gaya', 5),
(91, 'Bhagalpur', 5),
(92, 'Muzaffarpur', 5),
(93, 'Purnia', 5),
(94, 'Darbhanga', 5),
(95, 'Bihar Sharif', 5),
(96, 'Arrah', 5),
(97, 'Sasaram', 5),
(98, 'Hajipur', 5),
(99, 'Siwan', 5),
(100, 'Motihari', 5),
(101, 'Nawada', 5),
(102, 'Bagaha', 5),
(103, 'Buxar', 5),
(104, 'Kishanganj', 5),
(105, 'Sitamarhi', 5),
(106, 'Jamalpur', 5),
(107, 'Chhapra', 5),
(108, 'Danapur', 5),
(109, 'Saharsa', 5),
(110, 'Dumraon', 5),
(111, 'Madhubani', 5),
(112, 'Gopalganj', 5),
(113, 'Katihar', 5),
(114, 'Masaurhi', 5),
(115, 'Munger', 5),
(116, 'Chandigarh', 6),
(117, 'Raipur', 7),
(118, 'Bhilai', 7),
(119, 'Bilaspur', 7),
(120, 'Korba', 7),
(121, 'Durg', 7),
(122, 'Raigarh', 7),
(123, 'Jagdalpur', 7),
(124, 'Ambikapur', 7),
(125, 'Chirmiri', 7),
(126, 'Dhamtari', 7),
(127, 'Mahasamund', 7),
(128, 'Rajnandgaon', 7),
(129, 'Kanker', 7),
(130, 'Surajpur', 7),
(131, 'Baloda Bazar', 7),
(132, 'Gariaband', 7),
(133, 'Janjgir', 7),
(134, 'Koriya', 7),
(135, 'Sukma', 7),
(136, 'Dantewada', 7),
(137, 'Narayanpur', 7),
(138, 'Kondagaon', 7),
(139, 'Bijapur', 7),
(140, 'Bemetara', 7),
(141, 'Balod', 7),
(142, 'Mungeli', 7),
(143, 'Kawardha', 7),
(144, 'Durg-Bhilai Nagar', 7),
(145, 'Silvassa', 8),
(146, 'Daman', 9),
(147, 'Diu', 9),
(148, 'New Delhi', 10),
(149, 'Old Delhi', 10),
(150, 'Noida', 10),
(151, 'Gurgaon', 10),
(152, 'Faridabad', 10),
(153, 'Dwarka', 10),
(154, 'Lajpat Nagar', 10),
(155, 'Connaught Place', 10),
(156, 'Karol Bagh', 10),
(157, 'Saket', 10),
(158, 'Rohini', 10),
(159, 'Pitampura', 10),
(160, 'Mayur Vihar', 10),
(161, 'Vasant Kunj', 10),
(162, 'Greater Kailash', 10),
(163, 'Chanakyapuri', 10),
(164, 'Paharganj', 10),
(165, 'Vikaspuri', 10),
(166, 'Panaji', 11),
(167, 'Margao', 11),
(168, 'Vasco da Gama', 11),
(169, 'Mapusa', 11),
(170, 'Ponda', 11),
(171, 'Bicholim', 11),
(172, 'Curchorem', 11),
(173, 'Canacona', 11),
(174, 'Quepem', 11),
(175, 'Sanguem', 11),
(176, 'Valpoi', 11),
(177, 'Dharbandora', 11),
(178, 'Cortalim', 11),
(179, 'Sanquelim', 11),
(180, 'Pernem', 11),
(181, 'Cuncolim', 11),
(182, 'Mormugao', 11),
(183, 'Salcete', 11),
(184, 'Ahmedabad', 12),
(185, 'Surat', 12),
(186, 'Vadodara', 12),
(187, 'Rajkot', 12),
(188, 'Bhavnagar', 12),
(189, 'Jamnagar', 12),
(190, 'Junagadh', 12),
(191, 'Gandhinagar', 12),
(192, 'Anand', 12),
(193, 'Nadiad', 12),
(194, 'Bharuch', 12),
(195, 'Mehsana', 12),
(196, 'Patan', 12),
(197, 'Gandhidham', 12),
(198, 'Bhuj', 12),
(199, 'Porbandar', 12),
(200, 'Surendranagar', 12),
(201, 'Godhra', 12),
(202, 'Navsari', 12),
(203, 'Ankleshwar', 12),
(204, 'Dahod', 12),
(205, 'Valsad', 12),
(206, 'Botad', 12),
(207, 'Veraval', 12),
(208, 'Mangrol', 12),
(209, 'Dholka', 12),
(210, 'Kadi', 12),
(211, 'Modasa', 12),
(212, 'Palanpur', 12),
(213, 'Sidhpur', 12),
(214, 'Unjha', 12),
(215, 'Dhoraji', 12),
(216, 'Jetpur', 12),
(217, 'Chandigarh', 13),
(218, 'Faridabad', 13),
(219, 'Gurugram', 13),
(220, 'Panipat', 13),
(221, 'Ambala', 13),
(222, 'Yamunanagar', 13),
(223, 'Karnal', 13),
(224, 'Hisar', 13),
(225, 'Rohtak', 13),
(226, 'Sonipat', 13),
(227, 'Panchkula', 13),
(228, 'Bhiwani', 13),
(229, 'Sirsa', 13),
(230, 'Kaithal', 13),
(231, 'Jind', 13),
(232, 'Fatehabad', 13),
(233, 'Mahendragarh', 13),
(234, 'Palwal', 13),
(235, 'Rewari', 13),
(236, 'Narnaul', 13),
(237, 'Kurukshetra', 13),
(238, 'Jhajjar', 13),
(239, 'Charkhi Dadri', 13),
(240, 'Shimla', 14),
(241, 'Mandi', 14),
(242, 'Solan', 14),
(243, 'Dharamshala', 14),
(244, 'Kullu', 14),
(245, 'Chamba', 14),
(246, 'Una', 14),
(247, 'Bilaspur', 14),
(248, 'Hamirpur', 14),
(249, 'Nahan', 14),
(250, 'Sirmaur', 14),
(251, 'Kangra', 14),
(252, 'Palampur', 14),
(253, 'Mehatpur', 14),
(254, 'Kasauli', 14),
(255, 'Nurpur', 14),
(256, 'Sundarnagar', 14),
(257, 'Kumarhatti', 14),
(258, 'Rampur', 14),
(259, 'Baddi', 14),
(260, 'Nalagarh', 14),
(261, 'Rohru', 14),
(262, 'Bhuntar', 14),
(263, 'Joginder Nagar', 14),
(264, 'Chail', 14),
(265, 'Baijnath', 14),
(266, 'Mashobra', 14),
(267, 'Kalpa', 14),
(268, 'Rakkar', 14),
(269, 'Sarkaghat', 14),
(270, 'Tatapani', 14),
(271, 'Jubbal', 14),
(272, 'Srinagar', 15),
(273, 'Jammu', 15),
(274, 'Anantnag', 15),
(275, 'Baramulla', 15),
(276, 'Udhampur', 15),
(277, 'Kathua', 15),
(278, 'Samba', 15),
(279, 'Rajouri', 15),
(280, 'Pulwama', 15),
(281, 'Kupwara', 15),
(282, 'Doda', 15),
(283, 'Kishtwar', 15),
(284, 'Ramban', 15),
(285, 'Leh', 15),
(286, 'Kargil', 15),
(287, 'Pahalgam', 15),
(288, 'Gulmarg', 15),
(289, 'Bandipora', 15),
(290, 'Shopian', 15),
(291, 'Reasi', 15),
(292, 'Katra', 15),
(293, 'Poonch', 15),
(294, 'Bhaderwah', 15),
(295, 'Sopore', 15),
(296, 'Budgam', 15),
(297, 'Ganderbal', 15),
(298, 'Ranchi', 16),
(299, 'Jamshedpur', 16),
(300, 'Dhanbad', 16),
(301, 'Bokaro Steel City', 16),
(302, 'Hazaribagh', 16),
(303, 'Deoghar', 16),
(304, 'Giridih', 16),
(305, 'Ramgarh', 16),
(306, 'Chatra', 16),
(307, 'Godda', 16),
(308, 'Sahebganj', 16),
(309, 'Pakur', 16),
(310, 'Dumka', 16),
(311, 'Jamtara', 16),
(312, 'Koderma', 16),
(313, 'Lohardaga', 16),
(314, 'Gumla', 16),
(315, 'Simdega', 16),
(316, 'Latehar', 16),
(317, 'Seraikela', 16),
(318, 'Khunti', 16),
(319, 'Hazaribagh', 16),
(320, 'Palamu', 16),
(321, 'Hazaribagh', 16),
(322, 'Ranchi', 16),
(323, 'Dhanbad', 16),
(324, 'Jamshedpur', 16),
(325, 'Bokaro Steel City', 16),
(326, 'Hazaribagh', 16),
(327, 'Deoghar', 16),
(328, 'Giridih', 16),
(329, 'Ramgarh', 16),
(330, 'Chatra', 16),
(331, 'Godda', 16),
(332, 'Sahebganj', 16),
(333, 'Pakur', 16),
(334, 'Dumka', 16),
(335, 'Jamtara', 16),
(336, 'Koderma', 16),
(337, 'Lohardaga', 16),
(338, 'Gumla', 16),
(339, 'Simdega', 16),
(340, 'Latehar', 16),
(341, 'Seraikela', 16),
(342, 'Khunti', 16),
(343, 'Hazaribagh', 16),
(344, 'Palamu', 16),
(345, 'Bangalore', 17),
(346, 'Mysore', 17),
(347, 'Hubli', 17),
(348, 'Mangalore', 17),
(349, 'Belgaum', 17),
(350, 'Gulbarga', 17),
(351, 'Davanagere', 17),
(352, 'Bellary', 17),
(353, 'Tumkur', 17),
(354, 'Shimoga', 17),
(355, 'Udupi', 17),
(356, 'Bijapur', 17),
(357, 'Bagalkot', 17),
(358, 'Raichur', 17),
(359, 'Bidar', 17),
(360, 'Hassan', 17),
(361, 'Dharwad', 17),
(362, 'Kolar', 17),
(363, 'Karwar', 17),
(364, 'Chitradurga', 17),
(365, 'Haveri', 17),
(366, 'Gadag', 17),
(367, 'Chikkamagaluru', 17),
(368, 'Ramanagara', 17),
(369, 'Mandya', 17),
(370, 'Chamarajanagar', 17),
(371, 'Koppal', 17),
(372, 'Bengaluru Rural', 17),
(373, 'Yadgir', 17),
(374, 'Vijayapura', 17),
(375, 'Kodagu', 17),
(376, 'Dakshina Kannada', 17),
(377, 'Uttara Kannada', 17),
(378, 'Tumakuru', 17),
(379, 'Chikballapur', 17),
(380, 'Ramanagara', 17),
(381, 'Thiruvananthapuram', 18),
(382, 'Kochi', 18),
(383, 'Kozhikode', 18),
(384, 'Kollam', 18),
(385, 'Thrissur', 18),
(386, 'Kannur', 18),
(387, 'Kottayam', 18),
(388, 'Alappuzha', 18),
(389, 'Palakkad', 18),
(390, 'Malappuram', 18),
(391, 'Pathanamthitta', 18),
(392, 'Idukki', 18),
(393, 'Wayanad', 18),
(394, 'Kasaragod', 18),
(395, 'Trivandrum', 18),
(396, 'Ernakulam', 18),
(397, 'Calicut', 18),
(398, 'Kozhikode', 18),
(399, 'Alleppey', 18),
(400, 'Kollam', 18),
(401, 'Kottayam', 18),
(402, 'Kannur', 18),
(403, 'Kasaragod', 18),
(404, 'Thodupuzha', 18),
(405, 'Pala', 18),
(406, 'Attingal', 18),
(407, 'Changanassery', 18),
(408, 'Palakkad', 18),
(409, 'Malappuram', 18),
(410, 'Manjeri', 18),
(411, 'Perinthalmanna', 18),
(412, 'Kottakkal', 18),
(413, 'Kavaratti', 19),
(414, 'Agatti Island', 19),
(415, 'Amini', 19),
(416, 'Andrott', 19),
(417, 'Bitra', 19),
(418, 'Chetlat', 19),
(419, 'Kadmat', 19),
(420, 'Kalapeni', 19),
(421, 'Kilthan', 19),
(422, 'Lakshadweep', 19),
(423, 'Minicoy', 19),
(424, 'Pitti', 19),
(425, 'Suheli Par', 19),
(426, 'Bangaram', 19),
(427, 'Thinnakara', 19),
(428, 'Kiltan', 19),
(429, 'Agatti', 19),
(430, 'Chetlat', 19),
(431, 'Amini', 19),
(432, 'Andrott', 19),
(433, 'Bitra', 19),
(434, 'Kadmat', 19),
(435, 'Kalapeni', 19),
(436, 'Kilthan', 19),
(437, 'Suheli Par', 19),
(438, 'Bangaram', 19),
(439, 'Thinnakara', 19),
(440, 'Kiltan', 19),
(441, 'Agatti', 19),
(442, 'Bhopal', 20),
(443, 'Indore', 20),
(444, 'Jabalpur', 20),
(445, 'Gwalior', 20),
(446, 'Ujjain', 20),
(447, 'Sagar', 20),
(448, 'Dewas', 20),
(449, 'Satna', 20),
(450, 'Ratlam', 20),
(451, 'Rewa', 20),
(452, 'Murwara (Katni)', 20),
(453, 'Singrauli', 20),
(454, 'Burhanpur', 20),
(455, 'Khandwa', 20),
(456, 'Morena', 20),
(457, 'Bhind', 20),
(458, 'Shivpuri', 20),
(459, 'Vidisha', 20),
(460, 'Chhindwara', 20),
(461, 'Guna', 20),
(462, 'Damoh', 20),
(463, 'Mandsaur', 20),
(464, 'Khargone', 20),
(465, 'Neemuch', 20),
(466, 'Pithampur', 20),
(467, 'Itarsi', 20),
(468, 'Hoshangabad', 20),
(469, 'Ashoknagar', 20),
(470, 'Shajapur', 20),
(471, 'Sehore', 20),
(472, 'Raisen', 20),
(473, 'Harda', 20),
(474, 'Betul', 20),
(475, 'Imphal', 21),
(476, 'Thoubal', 21),
(477, 'Bishnupur', 21),
(478, 'Churachandpur', 21),
(479, 'Senapati', 21),
(480, 'Ukhrul', 21),
(481, 'Chandel', 21),
(482, 'Tamenglong', 21),
(483, 'Kakching', 21),
(484, 'Jiribam', 21),
(485, 'Noney', 21),
(486, 'Pherzawl', 21),
(487, 'Kangpokpi', 21),
(488, 'Tengnoupal', 21),
(489, 'Kamjong', 21),
(490, 'Kangpokpi', 21),
(491, 'Tengnoupal', 21),
(492, 'Kamjong', 21),
(493, 'Pherzawl', 21),
(494, 'Tamei', 21),
(495, 'Thinghat', 21),
(496, 'Kasom Khullen', 21),
(497, 'Mao', 21),
(498, 'Maram', 21),
(499, 'Moirang', 21),
(500, 'Moreh', 21),
(501, 'Nambol', 21),
(502, 'Shillong', 22),
(503, 'Tura', 22),
(504, 'Jowai', 22),
(505, 'Nongstoin', 22),
(506, 'Baghmara', 22),
(507, 'Williamnagar', 22),
(508, 'Resubelpara', 22),
(509, 'Nongpoh', 22),
(510, 'Mawkyrwat', 22),
(511, 'Khliehriat', 22),
(512, 'Amlarem', 22),
(513, 'Mairang', 22),
(514, 'Cherrapunjee', 22),
(515, 'Nongpoh', 22),
(516, 'Shillong', 22),
(517, 'Tura', 22),
(518, 'Jowai', 22),
(519, 'Nongstoin', 22),
(520, 'Baghmara', 22),
(521, 'Williamnagar', 22),
(522, 'Resubelpara', 22),
(523, 'Nongpoh', 22),
(524, 'Mawkyrwat', 22),
(525, 'Khliehriat', 22),
(526, 'Amlarem', 22),
(527, 'Mairang', 22),
(528, 'Cherrapunjee', 22),
(529, 'Nongpoh', 22),
(530, 'Shillong', 22),
(531, 'Aizawl', 23),
(532, 'Lunglei', 23),
(533, 'Saiha', 23),
(534, 'Champhai', 23),
(535, 'Kolasib', 23),
(536, 'Serchhip', 23),
(537, 'Lawngtlai', 23),
(538, 'Mamit', 23),
(539, 'Khawzawl', 23),
(540, 'Hnahthial', 23),
(541, 'Saitual', 23),
(542, 'Thawngtlang', 23),
(543, 'Biate', 23),
(544, 'Sairang', 23),
(545, 'Darlawn', 23),
(546, 'Phullen', 23),
(547, 'Thehlep', 23),
(548, 'Kawnpui', 23),
(549, 'Tlabung', 23),
(550, 'East Lungdar', 23),
(551, 'Mumbai', 24),
(552, 'Pune', 24),
(553, 'Nagpur', 24),
(554, 'Thane', 24),
(555, 'Nashik', 24),
(556, 'Aurangabad', 24),
(557, 'Solapur', 24),
(558, 'Amravati', 24),
(559, 'Kolhapur', 24),
(560, 'Latur', 24),
(561, 'Akola', 24),
(562, 'Ahmednagar', 24),
(563, 'Jalgaon', 24),
(564, 'Dhule', 24),
(565, 'Nanded', 24),
(566, 'Satara', 24),
(567, 'Sangli', 24),
(568, 'Chandrapur', 24),
(569, 'Parbhani', 24),
(570, 'Yavatmal', 24),
(571, 'Osmanabad', 24),
(572, 'Jalna', 24),
(573, 'Raigad', 24),
(574, 'Ratnagiri', 24),
(575, 'Sindhudurg', 24),
(576, 'Palghar', 24),
(577, 'Wardha', 24),
(578, 'Hingoli', 24),
(579, 'Gondia', 24),
(580, 'Washim', 24),
(581, 'Buldhana', 24),
(582, 'Chiplun', 24),
(583, 'Ichalkaranji', 24),
(584, 'Karad', 24),
(585, 'Sangamner', 24),
(586, 'Talegaon Dabhade', 24),
(587, 'Kohima', 25),
(588, 'Dimapur', 25),
(589, 'Mokokchung', 25),
(590, 'Tuensang', 25),
(591, 'Wokha', 25),
(592, 'Zunheboto', 25),
(593, 'Phek', 25),
(594, 'Mon', 25),
(595, 'Kiphire', 25),
(596, 'Longleng', 25),
(597, 'Peren', 25),
(598, 'Dzukou Valley', 25),
(599, 'Chumukedima', 25),
(600, 'Kuda', 25),
(601, 'Pfutsero', 25),
(602, 'Tizit', 25),
(603, 'Alichen', 25),
(604, 'Wozhuro', 25),
(605, 'Pughoboto', 25),
(606, 'Shamator', 25),
(607, 'Tseminyu', 25),
(608, 'Meluri', 25),
(609, 'Bhubaneswar', 26),
(610, 'Cuttack', 26),
(611, 'Rourkela', 26),
(612, 'Puri', 26),
(613, 'Sambalpur', 26),
(614, 'Balasore', 26),
(615, 'Jharsuguda', 26),
(616, 'Brahmapur', 26),
(617, 'Baripada', 26),
(618, 'Bhadrak', 26),
(619, 'Angul', 26),
(620, 'Bargarh', 26),
(621, 'Balangir', 26),
(622, 'Kendujhar', 26),
(623, 'Jeypore', 26),
(624, 'Bolangir', 26),
(625, 'Rayagada', 26),
(626, 'Boudh', 26),
(627, 'Debagarh', 26),
(628, 'Koraput', 26),
(629, 'Nabarangpur', 26),
(630, 'Nayagarh', 26),
(631, 'Phulbani', 26),
(632, 'Paradip', 26),
(633, 'Dhenkanal', 26),
(634, 'Jagatsinghpur', 26),
(635, 'Kendrapara', 26),
(636, 'Jajpur', 26),
(637, 'Mayurbhanj', 26),
(638, 'Khordha', 26),
(639, 'Nuapada', 26),
(640, 'Puducherry', 27),
(641, 'Karaikal', 27),
(642, 'Mahe', 27),
(643, 'Yanam', 27),
(644, 'Bahour', 27),
(645, 'Nedungadu', 27),
(646, 'Manavely', 27),
(647, 'Thirunallar', 27),
(648, 'Ozhukarai', 27),
(649, 'Villianur', 27),
(650, 'Ariankuppam', 27),
(651, 'Amritsar', 28),
(652, 'Ludhiana', 28),
(653, 'Jalandhar', 28),
(654, 'Patiala', 28),
(655, 'Bathinda', 28),
(656, 'Hoshiarpur', 28),
(657, 'Pathankot', 28),
(658, 'Moga', 28),
(659, 'Firozpur', 28),
(660, 'Muktsar', 28),
(661, 'Kapurthala', 28),
(662, 'Sangrur', 28),
(663, 'Faridkot', 28),
(664, 'Gurdaspur', 28),
(665, 'Sahibzada Ajit Singh Nagar', 28),
(666, 'Rupnagar', 28),
(667, 'Barnala', 28),
(668, 'Khanna', 28),
(669, 'Mansa', 28),
(670, 'Sirhind', 28),
(671, 'Abohar', 28),
(672, 'Malout', 28),
(673, 'Nawanshahr', 28),
(674, 'Moga', 28),
(675, 'Rajpura', 28),
(676, 'Tarn Taran', 28),
(677, 'Fazilka', 28),
(678, 'Kharar', 28),
(679, 'Jaipur', 29),
(680, 'Jodhpur', 29),
(681, 'Udaipur', 29),
(682, 'Kota', 29),
(683, 'Ajmer', 29),
(684, 'Bikaner', 29),
(685, 'Alwar', 29),
(686, 'Sikar', 29),
(687, 'Barmer', 29),
(688, 'Bhilwara', 29),
(689, 'Chittorgarh', 29),
(690, 'Sawai Madhopur', 29),
(691, 'Bharatpur', 29),
(692, 'Dungarpur', 29),
(693, 'Jhunjhunu', 29),
(694, 'Pali', 29),
(695, 'Nagaur', 29),
(696, 'Tonk', 29),
(697, 'Rajsamand', 29),
(698, 'Sirohi', 29),
(699, 'Hanumangarh', 29),
(700, 'Dholpur', 29),
(701, 'Karauli', 29),
(702, 'Baran', 29),
(703, 'Jalore', 29),
(704, 'Sri Ganganagar', 29),
(705, 'Banswara', 29),
(706, 'Jaisalmer', 29),
(707, 'Gangtok', 30),
(708, 'Namchi', 30),
(709, 'Mangan', 30),
(710, 'Singtam', 30),
(711, 'Rangpo', 30),
(712, 'Naya Bazar', 30),
(713, 'Rabongla', 30),
(714, 'Gyalshing', 30),
(715, 'Soreng', 30),
(716, 'Jorethang', 30),
(717, 'Majhitar', 30),
(718, 'Rhenock', 30),
(719, 'Yuksom', 30),
(720, 'Sombari', 30),
(721, 'Rinchenpong', 30),
(722, 'Legship', 30),
(723, 'Chungthang', 30),
(724, 'Melli', 30),
(725, 'Rorathang', 30),
(726, 'Temi', 30),
(727, 'Ravangla', 30),
(728, 'Rhenock', 30),
(729, 'Gyalshing', 30),
(730, 'Namthang', 30),
(731, 'Rorathang', 30),
(732, 'Dentam', 30),
(733, 'Rongli', 30),
(734, 'Kabi', 30),
(735, 'Chakhung', 30),
(736, 'Chennai', 31),
(737, 'Coimbatore', 31),
(738, 'Madurai', 31),
(739, 'Tiruchirappalli', 31),
(740, 'Salem', 31),
(741, 'Tirunelveli', 31),
(742, 'Tiruppur', 31),
(743, 'Vellore', 31),
(744, 'Thoothukudi', 31),
(745, 'Nagercoil', 31),
(746, 'Thanjavur', 31),
(747, 'Dindigul', 31),
(748, 'Cuddalore', 31),
(749, 'Kanchipuram', 31),
(750, 'Tiruvannamalai', 31),
(751, 'Karur', 31),
(752, 'Ranipet', 31),
(753, 'Erode', 31),
(754, 'Namakkal', 31),
(755, 'Sivakasi', 31),
(756, 'Hosur', 31),
(757, 'Ambur', 31),
(758, 'Mayiladuthurai', 31),
(759, 'Rajapalayam', 31),
(760, 'Karaikudi', 31),
(761, 'Neyveli', 31),
(762, 'Nagapattinam', 31),
(763, 'Vaniyambadi', 31),
(764, 'Aruppukkottai', 31),
(765, 'Pollachi', 31),
(766, 'Pudukkottai', 31),
(767, 'Kumbakonam', 31),
(768, 'Thiruvarur', 31),
(769, 'Sankarankovil', 31),
(770, 'Tenkasi', 31),
(771, 'Ramanathapuram', 31),
(772, 'Udhagamandalam (Ooty)', 31),
(773, 'Dharmapuri', 31),
(774, 'Kovilpatti', 31),
(775, 'Namakkal', 31),
(776, 'Perambalur', 31),
(777, 'Virudhachalam', 31),
(778, 'Poonamallee', 31),
(779, 'Ambasamudram', 31),
(780, 'Gudalur', 31),
(781, 'Vikramasingapuram', 31),
(782, 'Hyderabad', 32),
(783, 'Warangal', 32),
(784, 'Nizamabad', 32),
(785, 'Karimnagar', 32),
(786, 'Ramagundam', 32),
(787, 'Khammam', 32),
(788, 'Mahbubnagar', 32),
(789, 'Nalgonda', 32),
(790, 'Adilabad', 32),
(791, 'Suryapet', 32),
(792, 'Miryalaguda', 32),
(793, 'Jagtial', 32),
(794, 'Peddapalli', 32),
(795, 'Bodhan', 32),
(796, 'Kothagudem', 32),
(797, 'Siddipet', 32),
(798, 'Sircilla', 32),
(799, 'Mancherial', 32),
(800, 'Wanaparthy', 32),
(801, 'Kamareddy', 32),
(802, 'Mettur', 32),
(803, 'Bhongir', 32),
(804, 'Vikarabad', 32),
(805, 'Jangaon', 32),
(806, 'Armoor', 32),
(807, 'Bellampalle', 32),
(808, 'Narayanpet', 32),
(809, 'Sadasivpet', 32),
(810, 'Yadagirigutta', 32),
(811, 'Kodad', 32),
(812, 'Sangareddy', 32),
(813, 'Koratla', 32),
(814, 'Bhupalpally', 32),
(815, 'Kagaznagar', 32),
(816, 'Tandur', 32),
(817, 'Kollapur', 32),
(818, 'Nakrekal', 32),
(819, 'Kamareddy', 32),
(820, 'Agartala', 33),
(821, 'Udaipur', 33),
(822, 'Dharmanagar', 33),
(823, 'Ambassa', 33),
(824, 'Kailasahar', 33),
(825, 'Khowai', 33),
(826, 'Belonia', 33),
(827, 'Sabroom', 33),
(828, 'Amarpur', 33),
(829, 'Kamalpur', 33),
(830, 'Sonamura', 33),
(831, 'Bishalgarh', 33),
(832, 'Melaghar', 33),
(833, 'Mankachar', 33),
(834, 'Jirania', 33),
(835, 'Kanchanpur', 33),
(836, 'Kumarghat', 33),
(837, 'Kurubashini', 33),
(838, 'Ranirbazar', 33),
(839, 'Chawmanu', 33),
(840, 'Tlabung', 33),
(841, 'Manu', 33),
(842, 'Rupaichari', 33),
(843, 'Kamalasagar', 33),
(844, 'Longtharai Valley', 33),
(845, 'Mohanpur', 33),
(846, 'Kamalpur', 33),
(847, 'Sabroom', 33),
(848, 'Lucknow', 34),
(849, 'Kanpur', 34),
(850, 'Agra', 34),
(851, 'Varanasi', 34),
(852, 'Allahabad', 34),
(853, 'Ghaziabad', 34),
(854, 'Meerut', 34),
(855, 'Noida', 34),
(856, 'Bareilly', 34),
(857, 'Aligarh', 34),
(858, 'Moradabad', 34),
(859, 'Saharanpur', 34),
(860, 'Gorakhpur', 34),
(861, 'Jhansi', 34),
(862, 'Muzaffarnagar', 34),
(863, 'Mathura', 34),
(864, 'Rampur', 34),
(865, 'Faizabad', 34),
(866, 'Hapur', 34),
(867, 'Sultanpur', 34),
(868, 'Firozabad', 34),
(869, 'Bulandshahr', 34),
(870, 'Etawah', 34),
(871, 'Jaunpur', 34),
(872, 'Mirzapur', 34),
(873, 'Banda', 34),
(874, 'Amroha', 34),
(875, 'Hardoi', 34),
(876, 'Fatehpur', 34),
(877, 'Raebareli', 34),
(878, 'Orai', 34),
(879, 'Lalitpur', 34),
(880, 'Shahjahanpur', 34),
(881, 'Bahraich', 34),
(882, 'Sambhal', 34),
(883, 'Unnao', 34),
(884, 'Dehradun', 35),
(885, 'Haridwar', 35),
(886, 'Roorkee', 35),
(887, 'Haldwani', 35),
(888, 'Kashipur', 35),
(889, 'Rudrapur', 35),
(890, 'Rishikesh', 35),
(891, 'Kotdwar', 35),
(892, 'Pithoragarh', 35),
(893, 'Rudraprayag', 35),
(894, 'Champawat', 35),
(895, 'Tehri', 35),
(896, 'Almora', 35),
(897, 'Bageshwar', 35),
(898, 'Chamoli', 35),
(899, 'Udham Singh Nagar', 35),
(900, 'Nainital', 35),
(901, 'Pauri', 35),
(902, 'Uttarkashi', 35),
(903, 'Mussoorie', 35),
(904, 'Joshimath', 35),
(905, 'Lansdowne', 35),
(906, 'Munsiari', 35),
(907, 'Didihat', 35),
(908, 'Chakrata', 35),
(909, 'Bhowali', 35),
(910, 'Kichha', 35),
(911, 'Ramnagar', 35),
(912, 'Pantnagar', 35),
(913, 'Bajpur', 35),
(914, 'Sitarganj', 35),
(915, 'Kolkata', 36),
(916, 'Howrah', 36),
(917, 'Durgapur', 36),
(918, 'Asansol', 36),
(919, 'Siliguri', 36),
(920, 'Bardhaman', 36),
(921, 'Malda', 36),
(922, 'Baharampur', 36),
(923, 'Kharagpur', 36),
(924, 'Haldia', 36),
(925, 'Raniganj', 36),
(926, 'Raiganj', 36),
(927, 'Krishnanagar', 36),
(928, 'Balurghat', 36),
(929, 'Bankura', 36),
(930, 'Cooch Behar', 36),
(931, 'Purulia', 36),
(932, 'Jalpaiguri', 36),
(933, 'Alipurduar', 36),
(934, 'Santipur', 36),
(935, 'Midnapore', 36),
(936, 'Serampore', 36),
(937, 'Rampurhat', 36),
(938, 'Bangaon', 36),
(939, 'Basirhat', 36),
(940, 'Diamond Harbour', 36),
(941, 'Kalyani', 36),
(942, 'Chinsurah', 36),
(943, 'Arambagh', 36),
(944, 'Tamluk', 36),
(945, 'Contai', 36),
(946, 'Habra', 36),
(947, 'Bally', 36),
(948, 'North Dumdum', 36),
(949, 'South Dumdum', 36),
(950, 'Howrah', 36),
(951, 'Bhatpara', 36),
(952, 'Panihati', 36),
(953, 'Barasat', 36),
(954, 'Barrackpore', 36),
(955, 'Krishnanagar', 36),
(956, 'Siliguri', 36);

-- --------------------------------------------------------

--
-- Table structure for table `electioncandidates`
--

CREATE TABLE `electioncandidates` (
  `election_id` int(11) DEFAULT NULL,
  `candidate_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `electioncandidates`
--

INSERT INTO `electioncandidates` (`election_id`, `candidate_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(2, 6),
(3, 7),
(3, 8),
(3, 9),
(4, 10),
(4, 11),
(4, 12),
(5, 13),
(5, 14),
(5, 15),
(6, 16),
(6, 17),
(6, 18),
(7, 19),
(7, 20),
(7, 1),
(8, 21),
(8, 22),
(8, 23);

-- --------------------------------------------------------

--
-- Table structure for table `electionlocations`
--

CREATE TABLE `electionlocations` (
  `election_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `electionlocations`
--

INSERT INTO `electionlocations` (`election_id`, `location_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 2),
(2, 5),
(3, 6),
(3, 7),
(3, 8),
(4, 2),
(4, 9),
(4, 4),
(5, 1),
(5, 10),
(5, 11),
(6, 1),
(6, 3),
(6, 12);

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE `elections` (
  `election_id` int(11) NOT NULL,
  `election_name` varchar(255) DEFAULT NULL,
  `election_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`election_id`, `election_name`, `election_date`) VALUES
(1, 'Local Election 2023', '2023-11-15'),
(2, 'State Assembly Election 2023', '2023-05-10'),
(3, 'Municipal Election 2024', '2024-08-20'),
(4, 'Lok Sabha Election 2024', '2024-04-05'),
(5, 'Panchayat Election 2025', '2025-09-15'),
(6, 'Municipal Corporation Election 2026', '2026-06-30'),
(7, 'Rajya Sabha Election 2027', '2027-03-25'),
(8, 'Zila Parishad Election 2028', '2028-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `otp_recovery`
--

CREATE TABLE `otp_recovery` (
  `id` int(11) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `otp` varchar(6) NOT NULL,
  `is_expired` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otp_recovery`
--

INSERT INTO `otp_recovery` (`id`, `email`, `otp`, `is_expired`, `created_at`) VALUES
(1, 'gsgbmcc@gmail.com', '483854', 0, '2023-10-09 14:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `pollinglocations`
--

CREATE TABLE `pollinglocations` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pollinglocations`
--

INSERT INTO `pollinglocations` (`location_id`, `location_name`) VALUES
(1, 'Pune'),
(2, 'Gujarat'),
(3, 'Delhi'),
(4, 'Maharashtra'),
(5, 'Rajasthan'),
(6, 'Lucknow'),
(7, 'Assam'),
(8, 'Andhra Pradesh'),
(9, 'Madhya Pradesh'),
(10, 'Bihar'),
(11, 'Ahmednagar'),
(12, 'Ratnagiri');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Andaman and Nicobar Islands'),
(2, 'Andhra Pradesh'),
(3, 'Arunachal Pradesh'),
(4, 'Assam'),
(5, 'Bihar'),
(6, 'Chandigarh'),
(7, 'Chhattisgarh'),
(8, 'Dadra and Nagar Haveli'),
(9, 'Daman and Diu'),
(10, 'Delhi'),
(11, 'Goa'),
(12, 'Gujarat'),
(13, 'Haryana'),
(14, 'Himachal Pradesh'),
(15, 'Jammu and Kashmir'),
(16, 'Jharkhand'),
(17, 'Karnataka'),
(18, 'Kerala'),
(19, 'Lakshadweep'),
(20, 'Madhya Pradesh'),
(21, 'Manipur'),
(22, 'Meghalaya'),
(23, 'Mizoram'),
(24, 'Maharashtra'),
(25, 'Nagaland'),
(26, 'Odisha'),
(27, 'Puducherry'),
(28, 'Punjab'),
(29, 'Rajasthan'),
(30, 'Sikkim'),
(31, 'Tamil Nadu'),
(32, 'Telangana'),
(33, 'Tripura'),
(34, 'Uttar Pradesh'),
(35, 'Uttarakhand'),
(36, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT 0,
  `Name` varchar(100) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `RegistrationStatus` varchar(20) DEFAULT 'Pending',
  `City` varchar(100) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `Gender1` varchar(10) DEFAULT NULL,
  `Gender2` varchar(10) DEFAULT NULL,
  `Gender3` varchar(10) DEFAULT NULL,
  `AadharCard` varchar(100) DEFAULT NULL,
  `adhardoc` varchar(400) DEFAULT NULL,
  `photodoc` varchar(400) DEFAULT NULL,
  `profile_progress` decimal(5,2) DEFAULT 0.00,
  `photo_progress` decimal(5,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `profile_pic`, `is_admin`, `Name`, `DateOfBirth`, `Age`, `Address`, `PhoneNumber`, `RegistrationStatus`, `City`, `State`, `Country`, `Gender1`, `Gender2`, `Gender3`, `AadharCard`, `adhardoc`, `photodoc`, `profile_progress`, `photo_progress`) VALUES
(0, 'admin', '$2y$10$TBZHWGyGfVGsT6.s4TZZze2q2mK/4LpDCGmSTvvVsBogVqpQNW2rK', 'gurjasgandhi76@gmail.com', NULL, 1, 'Admin', '2002-12-22', 20, 'Pune', '9922233168', 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00),
(47, 'surya', '$2y$10$j3aEBz9.M6EUKnzAbJY0tO7IkkECFOx7jfgjdS3umv3qao.uEWsQq', 'gsgbmcc@gmail.com', NULL, 0, 'GURJAS SINGH GANDHI', '2002-12-21', 20, 'Flat no: 123, Bld no: 456, Elm Street, Downtown, Example City, 123456', '+919922233168', 'registered', '552', '24', 'Indian', 'Male', NULL, NULL, '215939510279', 'uploads/aadhar_card/aadhar_6537b10377109.jpg', 'uploads/photo/photo_6537b1037b6d8.jpg', 0.00, 0.00),
(50, 'gg_knight_', '$2y$10$rpfDq33/pVCBWWJfW/dBU.4IX5PCaFaNOWh2xmpLoGoM3TOlB.LwO', 'gsgandhi21@gmail.com', NULL, 0, 'GURJAS SINGH GAREWAL', '2002-12-21', 20, 'Flat no: 123, Bld no: 456, Elm Street, Downtown, Example City, 123456', '+919922233169', 'registered', '253', '14', 'Indian', 'Male', '', '', '215939510279', 'uploads/aadhar_card/aadhar_653935316c1a0.jpg', 'uploads/photo/photo_653935316c41b.jpg', 100.00, 100.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `electioncandidates`
--
ALTER TABLE `electioncandidates`
  ADD KEY `election_id` (`election_id`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- Indexes for table `electionlocations`
--
ALTER TABLE `electionlocations`
  ADD KEY `election_id` (`election_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `elections`
--
ALTER TABLE `elections`
  ADD PRIMARY KEY (`election_id`);

--
-- Indexes for table `otp_recovery`
--
ALTER TABLE `otp_recovery`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `otp` (`otp`);

--
-- Indexes for table `pollinglocations`
--
ALTER TABLE `pollinglocations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `PhoneNumber` (`PhoneNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=957;

--
-- AUTO_INCREMENT for table `elections`
--
ALTER TABLE `elections`
  MODIFY `election_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `otp_recovery`
--
ALTER TABLE `otp_recovery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pollinglocations`
--
ALTER TABLE `pollinglocations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `electioncandidates`
--
ALTER TABLE `electioncandidates`
  ADD CONSTRAINT `electioncandidates_ibfk_1` FOREIGN KEY (`election_id`) REFERENCES `elections` (`election_id`),
  ADD CONSTRAINT `electioncandidates_ibfk_2` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`candidate_id`);

--
-- Constraints for table `electionlocations`
--
ALTER TABLE `electionlocations`
  ADD CONSTRAINT `electionlocations_ibfk_1` FOREIGN KEY (`election_id`) REFERENCES `elections` (`election_id`),
  ADD CONSTRAINT `electionlocations_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `pollinglocations` (`location_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
