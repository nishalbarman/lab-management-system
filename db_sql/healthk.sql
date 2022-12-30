-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2022 at 05:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthk`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `name`, `email`, `phone`, `password`, `role`, `image`) VALUES
(1, 'Nishal Barman', 'nishalbarman@gmail.com', '9101114906', 'password', 1, '1672334759_20210402165355581_1051035_p.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(255) NOT NULL,
  `cardname` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `color_f` varchar(255) NOT NULL,
  `color_s` varchar(255) NOT NULL,
  `btn_name` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `new` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `cardname`, `price`, `url`, `color_f`, `color_s`, `btn_name`, `keywords`, `new`) VALUES
(1, 'CBC', 25, 'cbc_temp_gen', '#45B3C1', '#318A96', 'Use This', 'Complete Blood Count Report, TLC', 0),
(2, 'Blood Sugar', 25, 'cbc_temp_gen', '#E14460', '#C33650', 'Use This', 'Blood Sugar', 0),
(3, 'IGE', 25, 'ige_temp_gen', '#F5783F', '#E25110', 'Use This', 'IGE Report, Allergy Blood Test, immunoglobulin', 0),
(4, 'Blood Report', 25, 'bloodre_temp_gen', '#F6ED09', '#DED61A', 'Use This', 'Blood Report, TLC', 0),
(5, 'Thyroid', 25, 'thyroid_temp_gen', '#B2F067', '#A7D174', 'Use This', 'Thyroid, Thyroid Profile, TSH', 0),
(6, 'Urine', 25, 'urine_temp_gen', '#AAB898', '#929988', 'Use This', 'Urine Report', 0),
(7, 'HbA1c', 25, 'hba1c_temp_gen', '#2aaac1', '#279eb2', 'Use This', 'HbA1c, hemoglobin A1c', 0),
(8, 'LFT', 25, 'lft_temp_gen', '#fa7f67', '#ff40a1', 'Use This', 'LFT, Liver Function Test', 0),
(9, 'Haemoglobin', 25, 'Haemoglobin_temp_gen', '#648141', '#485A32', 'Use This', 'Haemoglobin', 0),
(10, 'CRP', 25, 'CRP_temp_gen', '#41DB92', '#3CB57C', 'Use This', 'CRP, C Reactive Protein', 0),
(11, 'Stool', 25, 'stool_temp_gen', '#94CBB1', '#79A38F', 'Use This', 'Stool Report', 0),
(12, 'ABS', 25, 'abs_temp_gen', '#46E3C2', '#44BEA4', 'Use This', 'ABS, ABS Blood Test', 0),
(13, 'ABO and Rh', 25, 'abo-rh_temp_gen', '#9ED2D3', '#86B1B2', 'Use This', 'ABO, RH, ABO and RH Grouping, Blood Group, Blood Grouping', 0),
(14, 'HCV', 25, 'hcv_temp_gen', '#24DCE3', '#18ACB1', 'Use This', 'HCV, HIV, HCV Antibody Test, hepatitis C virus', 0),
(15, 'Serum Electrolyte', 25, 'serumelectro_temp_gen', '#488DE3', '#3670B8', 'Use This', 'Serum, Electrolyte, Serum Electrolyte', 0),
(16, 'Lipid', 25, 'lipid_temp_gen', '#C3BBBE', '#989093', 'Use This', 'Lipid, Lipid Profile', 0),
(17, 'VDRL', 25, 'vdrl_temp_gen', '#69818D', '#4C5D65', 'Use This', 'VDRL', 0),
(18, 'Custom Template', 30, 'custom_temp_gen', '#E64E87', '#C34172', 'Use This', 'Custom, Generate, Make, Generate Template, Make Template, Custom Template', 0);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `maintenance` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`maintenance`) VALUES
('false');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `patient_age` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `downloads` int(11) NOT NULL,
  `report_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `patient_name`, `patient_age`, `file_name`, `size`, `downloads`, `report_name`) VALUES
(2004570, '', '0', 'MUMU DEKA.pdf', 428031, 1, ''),
(2004571, '', '0', 'RUBI KAKITA CBC.pdf', 427232, 13, ''),
(2004572, '', '0', 'CHANDAN_DUTTA.pdf', 425589, 8, ''),
(2004573, 'Minati Barman', '40', 'MINATI_BARMAN.pdf', 424440, 2, ''),
(2004574, 'Anima Barman', '38', '1662963643_Anima_Barman.pdf', 832590, 4, ''),
(2004575, 'Parul Barman', '46', '1663060066_Parul_Barman.pdf', 421446, 7, ''),
(2004576, 'Nayan Barman', '24', '1663061403_Nayan_Barman.pdf', 378941, 6, ''),
(2004577, 'Sweyashi Dutta', '27', '1663257284_SWEYASHI.pdf', 417129, 1, ''),
(2004578, 'Bhabesh Rajbonshi', '46', '1663257705_BHABESH_.pdf', 426649, 3, ''),
(2004579, 'KISHAK RAJBONSHI', '35', '1663648207_KISHAK.pdf', 377192, 3, ''),
(2004580, 'Dudul Kalita', '25', '1663677852_dudul.pdf', 361793, 4, ''),
(2004581, 'Bhaben Dutta', '22', '1663947700_bhaben.pdf', 424548, 3, ''),
(2004582, 'Narayan Rajbonshi', '82', '1663993286_narayan_rajbonshi.pdf', 426683, 2, ''),
(2004583, 'Champak Barman', '31', '1664119767_Champak_Barman.pdf', 467572, 6, ''),
(2004584, 'Minati Barman', '45', '1664120683_Minati_Barman.pdf', 482537, 3, ''),
(2004585, 'Minati Barman', '45', '1664373882_Minati_Barman.pdf', 458971, 8, ''),
(2004586, 'Gita Barman', '40', '1664864404_Healthkind THS.pdf', 425109, 7, ''),
(2004587, 'Jonali Mahanta', '32', '1664865301_Jonali_Mahanta.pdf', 428707, 3, ''),
(2004588, 'Akan Barman', '42', '1665024537_AKAN_BARMAN.pdf', 408152, 1, ''),
(2004589, 'Babita Haloi', '44', '1665058079_BabitaHaloi.pdf', 466457, 7, ''),
(2004590, 'Parashuram Barman', '76', '1665214955_Parashuram.pdf', 485133, 2, ''),
(2004591, 'Jamini Barman', '55', '1665219187_Jamini.pdf', 425487, 7, ''),
(2004592, 'Selema Begum', '32', '1665583228_Selema.pdf', 501411, 7, ''),
(2004593, 'Ranjit Barman', '51', '1666033716_1665585491_Ranjit.pdf', 461164, 1, ''),
(2004594, 'KASHYAP RAJBONGSHI', '15', '1666198812_KASHYAP RAJBONGSHI.pdf', 0, 5, ''),
(2004595, 'Anurag Dutta', '2', '1666425247_1666424855_ANURAG_DUTTA.pdf', 262473, 1, ''),
(2004596, 'Dipanjali Baishya', '25', '1666425599_1666425424_DIPANJALI_BAISHYA.pdf', 264347, 0, ''),
(2004597, 'Trisna Baishya', '23', '1666425888_1666425749_TRISNA_BAISHYA.pdf', 264308, 0, ''),
(2004598, 'Anurag Dutta', '2', '1666433553_1666433383_ANURAG_DUTTA.pdf', 258064, 1, ''),
(2004599, 'DIPANJALI_BAISHYA', '25', '1666436231_DIPANJALI_BAISHYA.pdf', 0, 1, ''),
(2004600, 'TRISNA_BAISHYA', '23', '1666436346_TRISNA_BAISHYA.pdf', 0, 4, ''),
(2004601, 'TRISNA_BAISHYA', '23', '1666453602_TRISNA_BAISHYA.pdf', 0, 1, ''),
(2004602, 'DIPANJALI_BAISHYA', '25', '1666454018_DIPANJALI_BAISHYA.pdf', 0, 1, ''),
(2004603, 'DIPAK DAS', '41', '1666603084_DIPAK DAS.pdf', 0, 1, ''),
(2004604, 'Parvez Hussain', '10', '1666690100_1666629427_Change.pdf', 257607, 0, ''),
(2004605, 'DIPAK DAS', '41', '1666765820_DIPAK DAS.pdf', 0, 0, ''),
(2004606, 'ANU BEGUM', '21', '1666769491_Change.pdf', 0, 0, ''),
(2004607, 'Selema Begum', '34', '1666954828_Change.pdf', 0, 0, ''),
(2004608, 'SELIMA BEGUM', '34', '1666976335_SELIMA BEGUM.pdf', 0, 1, ''),
(2004609, 'Amina Begum', '66', '1666955839_Change.pdf', 0, 0, ''),
(2004610, 'AMINA BEGUM', '66', '1666956147_AMINA BEGUM.pdf', 0, 0, ''),
(2004611, 'SELIMA BEGUM', '34', '1666956299_SELIMA BEGUM.pdf', 0, 0, ''),
(2004612, 'AMINA BEGUM', '66', '1666956597_AMINA BEGUM.pdf', 0, 0, ''),
(2004613, 'Ayodhya Devi', '84', '1666967733_1666967623_Change.pdf', 277262, 1, ''),
(2004614, 'Change', '21', '1666968704_Change.pdf', 0, 0, ''),
(2004615, 'AYODHYA DEVI', '84', '1666969235_AYODHYA DEVI.pdf', 0, 1, ''),
(2004616, 'AYODHYA DEVI', '84', '1666969403_AYODHYA DEVI.pdf', 0, 4, ''),
(2004617, 'Munindra Barman', '30', '1667652828_Munidra_Barman.pdf', 148968, 0, ''),
(2004618, 'Munindra Barman', '30', '1667652981_Munidra_Barman.pdf', 148968, 0, ''),
(2004619, 'PALLAVI SARMA', '27 Year', '1667736101_PALLAVI SARMA.pdf', 0, 2, ''),
(2004620, 'HEMCHANDRA BARMAN', '50 Year', '1667822842_HEMCHANDRA BARMAN.pdf', 0, 0, ''),
(2004621, 'HEMCHANDRA BARMAN', '50 Year', '1667824383_HEMCHANDRA BARMAN.pdf', 0, 0, ''),
(2004622, 'MADHUSMITA BAISHYA', '27 Year', '1667838047_MADHUSMITA BAISHYA.pdf', 0, 0, ''),
(2004623, 'NIRENDRA SEN', '55 Years', '1667975710_NIRENDRA SEN.pdf', 0, 0, ''),
(2004624, 'NIRENDRA SEN', '55 Years', '1667987696_NIRENDRA SEN.pdf', 0, 0, ''),
(2004625, 'NIRENDRA SEN', '55 Years', '1667990709_NIRENDRA SEN.pdf', 0, 0, ''),
(2004626, 'NIRENDRA SEN', '55 Years', '1667991070_NIRENDRA SEN.pdf', 0, 0, ''),
(2004627, 'NIRENDRA SEN', '55 Years', '1667991105_NIRENDRA SEN.pdf', 0, 0, ''),
(2004628, 'SUMITRA KALITA', '40 Years', '1667993589_SUMITRA KALITA.pdf', 0, 1, ''),
(2004629, 'Default', '0', '1667998347_Default.pdf', 0, 0, ''),
(2004630, 'Niren Sen', '45', '1668000069_Niren.pdf', 412040, 0, ''),
(2004631, 'NIRENDRA SEN', '55 Years', '1668001153_NIRENDRA SEN.pdf', 0, 0, ''),
(2004632, 'NIRENDRA SEN', '55 Years', '1668059127_NIRENDRA SEN.pdf', 0, 0, ''),
(2004633, 'NIRMALI TALUKDAR', '30 Years', '1668080517_NIRMALI TALUKDAR.pdf', 0, 0, ''),
(2004634, 'KHARGESWAR KALITA', '52 Years', '1668080694_KHARGESWAR KALITA.pdf', 0, 0, ''),
(2004635, 'KANGKAN KR. DEKA', '26 Years', '1668080841_KANGKAN KR. DEKA.pdf', 0, 0, ''),
(2004636, 'BENU BARMAN', '42 Years', '1668080993_BENU BARMAN.pdf', 0, 0, ''),
(2004637, 'SAKIMA BEGUM', '48 Years', '1668081210_SAKIMA BEGUM.pdf', 0, 0, ''),
(2004638, 'BULU TALUKDAR', '40 Years', '1668167283_BULU TALUKDAR.pdf', 0, 0, ''),
(2004639, 'KANKANA BARMAN', '22 Years', '1668171870_KANKANA BARMAN.pdf', 0, 0, ''),
(2004640, 'KANKANA BARMAN', '22 Years', '1668172175_KANKANA BARMAN.pdf', 0, 0, ''),
(2004641, 'KANKANA BARMAN', '22 Years', '1668172371_KANKANA BARMAN.pdf', 0, 0, ''),
(2004645, 'KANKANA BARMAN', '22 Years', '1668174271_KANKANA BARMAN.pdf', 0, 0, ''),
(2004646, 'KANKANA BARMAN', '22 Years', '1668174409_KANKANA BARMAN.pdf', 0, 0, ''),
(2004648, 'NAJIMA BEGUM', '42 Years', '1668488349_NAJIMA BEGUM.pdf', 0, 0, ''),
(2004649, 'NAJIMA BEGUM', '42 Years', '1668488552_NAJIMA BEGUM.pdf', 0, 0, ''),
(2004650, 'NAJIMA BEGUM', '42 Years', '1668488757_NAJIMA BEGUM.pdf', 0, 0, ''),
(2004651, 'ARCHANA SALOI', '35 Years', '1668489365_ARCHANA SALOI.pdf', 0, 0, ''),
(2004652, 'LAKHIMI BORA', '37 Years', '1668489622_LAKHIMI BORA.pdf', 0, 0, ''),
(2004653, 'HASINA BEGUM', '50 Years', '1668489792_HASINA BEGUM.pdf', 0, 0, ''),
(2004654, 'KHAIRUN NESSA', '60 Years', '1668489991_KHAIRUN NESSA.pdf', 0, 0, ''),
(2004655, 'Default', '0', '1668490425_Default.pdf', 0, 0, ''),
(2004656, 'KHAIRUN NESSA', '60 Years', '1668491439_KHAIRUN NESSA.pdf', 0, 0, ''),
(2004657, 'KALPANA HALOI', '25 Years', '1668516189_KALPANA HALOI.pdf', 0, 0, ''),
(2004658, 'RUBUL HUSSAIN', '38 Years', '1668516425_RUBUL HUSSAIN.pdf', 0, 0, ''),
(2004659, 'ABINASH DAS', '21 Years', '1668597525_ABINASH DAS.pdf', 0, 0, ''),
(2004660, 'NAMITA RAJBONGSHI', '28 Years', '1668597957_NAMITA RAJBONGSHI.pdf', 0, 0, ''),
(2004661, 'NAMITA RAJBONGSHI', '28 Years', '1668597959_NAMITA RAJBONGSHI.pdf', 0, 0, ''),
(2004662, 'DIPALI BORO', '32 Years', '1668621051_DIPALI BORO.pdf', 0, 0, ''),
(2004663, 'JAHANARA BEGUM', '40 Years', '1668685144_JAHANARA BEGUM.pdf', 0, 0, ''),
(2004664, 'RINA KALITA', '44 Years', '1668761466_RINA KALITA.pdf', 0, 0, ''),
(2004665, 'ANOWARA BIBI', '45 Years', '1668761647_ANOWARA BIBI.pdf', 0, 0, ''),
(2004668, 'KANAN KALITA', '55 Years', '1668788956_KANAN KALITA.pdf', 0, 0, ''),
(2004669, 'PARBIN SULTANA', '30 Years', '1668793549_PARBIN SULTANA.pdf', 0, 0, ''),
(2004670, 'MADHUSMITA BARMAN', '16 Years', '1668854714_MADHUSMITA BARMAN.pdf', 0, 0, ''),
(2004671, 'MADHUSMITA BARMAN', '16 Years', '1668855463_MADHUSMITA BARMAN.pdf', 0, 0, ''),
(2004672, 'MADHUSMITA BARMAN', '16 Years', '1668855765_MADHUSMITA BARMAN.pdf', 0, 0, ''),
(2004673, 'SARGINA BEGUM', '24 Years', '1669127940_SARGINA BEGUM.pdf', 0, 0, ''),
(2004674, 'BINA SAHARIA', '23 Years', '1669203427_BINA SAHARIA.pdf', 0, 0, ''),
(2004675, 'BINA SAHARIA', '23 Years', '1669203629_BINA SAHARIA.pdf', 0, 0, ''),
(2004676, 'BINA SAHARIA', '23 Years', '1669203630_BINA SAHARIA.pdf', 0, 0, ''),
(2004677, 'BINA SAHARIA', '23 Years', '1669203809_BINA SAHARIA.pdf', 0, 0, ''),
(2004678, 'BINA SAHARIA', '23 Years', '1669203835_BINA SAHARIA.pdf', 0, 0, ''),
(2004679, 'Kanika', '50 Years', '1669399656_Default.pdf', 0, 0, ''),
(2004680, 'KANIKA TALUKDAR', '50 Years', '1669436102_KANIKA TALUKDAR.pdf', 0, 0, ''),
(2004681, 'KANIKA TALUKDAR', '50 Years', '1669436345_KANIKA TALUKDAR.pdf', 0, 0, ''),
(2004683, 'SUNANDA BAISHYA', '50 Years', '1669463827_SUNANDA BAISHYA.pdf', 0, 0, ''),
(2004684, 'DEBAJANI HAZARIKA', '50 Years', '1669464099_DEBAJANI HAZARIKA.pdf', 0, 0, ''),
(2004685, 'GUNAJIT BARMAN', '32 Years', '1669464837_GUNAJIT BARMAN.pdf', 0, 0, ''),
(2004686, 'BARNALI KALITA', '25 Years', '1669538798_BARNALI KALITA.pdf', 0, 0, ''),
(2004687, 'PAPARI BARMAN CHOUDHURY', '30 Years', '1669808477_PAPARI BARMAN CHOUDHURY.pdf', 0, 0, ''),
(2004688, 'ANOWARA BEGUM', '48 Years', '1669823729_ANOWARA BEGUM.pdf', 0, 1, ''),
(2004689, 'ANOWARA BEGUM', '48 Years\r\n', '1669874435_Default.pdf', 0, 4, ''),
(2004691, 'MABIA BEGUM', '42 Years', '1670078911_Default.pdf', 0, 2, ''),
(2004692, 'PANKAJ CHOUDHURY', '47 Years', '1670154667_PANKAJ CHOUDHURY.pdf', 0, 0, ''),
(2004694, 'SALEMAN ALI', '60 Years', '1670174947_SALEMAN ALI.pdf', 0, 0, ''),
(2004696, 'NIKUMONI PATHAK', '30 Years', '1670424028_Nikumoni_Pathak.pdf', 296577, 0, ''),
(2004697, 'JIBAN CHOUDHURY', '40 Years', '1670506318_JIBAN CHOUDHURY.pdf', 0, 0, 'LFT Report'),
(2004698, 'SHAIMANTI HALOI', '65 Years', '1670682991_SHAIMANTI HALOI.pdf', 0, 1, 'Thyroid Profile'),
(2004699, 'MONOMOTI KALITA', '35 Years', '1670683478_MONOMOTI KALITA.pdf', 0, 1, 'Thyroid Profile'),
(2004700, 'PUJASHREE DAS', '16 Years', '1670683702_PUJASHREE DAS.pdf', 0, 1, 'Thyroid Profile'),
(2004701, 'NULL', 'NULL Years', '1671468240_NULL.pdf', 0, 0, ''),
(2004702, 'SARAT DEKA', '', '1671468402_SARAT DEKA.pdf', 0, 0, ''),
(2004703, 'BARNALI DAS', '', '1671468420_BARNALI DAS.pdf', 0, 0, ''),
(2004704, 'NIRU PATHAK', '', '1671468440_NIRU PATHAK.pdf', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `serial` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `encoded_value` varchar(1000) NOT NULL,
  `pdf_created` tinyint(1) NOT NULL,
  `pdf_onserver` varchar(255) NOT NULL,
  `report_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`serial`, `name`, `status`, `amount`, `transaction_id`, `encoded_value`, `pdf_created`, `pdf_onserver`, `report_name`) VALUES
('', '', '', '', '', 'aHR0cDovL2hlYWx0aGtpbmQuaXMtZ3JlYXQubmV0L2NyZWF0ZS8=', 0, 'Not Available (19/12/2022 10:30:14 pm)', ''),
('2004698', 'SHAIMANTI HALOI', 'failure', '22.00', 'd27891a5ad3796253389', 'aHR0cDovL2hlYWx0aGtpbmQuaXMtZ3JlYXQubmV0L2NyZWF0ZS90aHlyb2lkLnBocD9zZXJpYWw9MjAwNDY5OCZwYXRpZW50X3NhbXBsZT0yMDIxMDUmcmVwb3J0X2RhdGU9MjAyMi0xMi0xMCZkcl9uYW1lPURyLiBNRyBNT0RFTCBIT1NQSVRBTCZwYXRpZW50X25hbWU9U0hBSU1BTlRJIEhBTE9JJnBhdGllbnRfYWdlPTY1IFllYXJzJnBhdGllbnRfZ2VuZGVyPUZlbWFsZSZ0aHM9NS4zMiZ0Mz0mdDQ9JmNoa1Rocz15ZXMmY2hrVDM9JmNoa1Q0PQ==', 1, 'Available (15/12/2022 05:02:46 pm)', 'Thyroid Profile'),
('2004697', 'JIBAN CHOUDHURY', 'failure', '22.00', '0c994db7020708beb8b0', 'aHR0cDovL2hlYWx0aGtpbmQuaXMtZ3JlYXQubmV0L2NyZWF0ZS9sZnQucGhwP3NlcmlhbD0yMDA0Njk3JnBhdGllbnRfc2FtcGxlPTIwMjEwNCZyZXBvcnRfZGF0ZT0yMDIyLTEyLTA4JmRyX25hbWU9U2VsZiZwYXRpZW50X25hbWU9SklCQU4gQ0hPVURIVVJZJnBhdGllbnRfYWdlPTQwIFllYXJzJnBhdGllbnRfZ2VuZGVyPU1hbGUmc2J0PTEuMSZzYmQ9MC40JnNiaT0wLjcmc2dvdD02NiZzZ3B0PTk1JmFrbHA9MjE0JnB0PTcuOCZzYWxiPTQuOCZnbG89My4wJmdndHA9MTA2JmNyZWF0ZT1TdWJtaXQ=', 1, 'Updated (10/12/2022 08:12:51 pm)', 'LFT Report'),
('2004696', 'NIKUMONI PATHAK', 'failure', '22.00', '4701246e22d850dc2ff4', 'aHR0cDovL2hlYWx0aGtpbmQuaXMtZ3JlYXQubmV0L2NyZWF0ZS91cmluZXJlLnBocD9zZXJpYWw9MjAwNDY5NiZwYXRpZW50X3NhbXBsZT0yNTIxMDMmcmVwb3J0X2RhdGU9MjAyMi0xMi0wNSZkcl9uYW1lPURyLiBCIFJBSkJPTkdTSEkmcGF0aWVudF9uYW1lPU5JS1VNT05JIFBBVEhBSyZwYXRpZW50X2FnZT0zMCBZZWFycyZwYXRpZW50X2dlbmRlcj1GZW1hbGUmdGxjPVBhbGUgWWVsbG93Jm5ldT1DbGVhciZseW09QWJzZW50Jm1vbm89MS4wMjAmZW9zPUFjaWRpYyZoYj1OaWwmcGxhdGVsZXQ9TmlsJnJiYz1OaWwmcGNiPTMgLSA0Jm1jdj1OT1QgU0VFTiZtY2g9QEAmbWNoYz1OaWwmcmR3PUFic2VudCZjcmVhdGU9U3VibWl0', 1, 'Updated (10/12/2022 08:12:51 pm)', 'Urine Report'),
('2004697', 'JIBAN CHOUDHURY', 'failure', '22.00', 'b55a7f09b499834e3a85', 'aHR0cDovL2hlYWx0aGtpbmQuaXMtZ3JlYXQubmV0L2NyZWF0ZS9sZnQucGhwP3NlcmlhbD0yMDA0Njk3JnBhdGllbnRfc2FtcGxlPTIwMjEwNCZyZXBvcnRfZGF0ZT0yMDIyLTEyLTA4JmRyX25hbWU9U2VsZiZwYXRpZW50X25hbWU9SklCQU4gQ0hPVURIVVJZJnBhdGllbnRfYWdlPTQwIFllYXJzJnBhdGllbnRfZ2VuZGVyPU1hbGUmc2J0PTEuMSZzYmQ9MC40JnNiaT0wLjcmc2dvdD02NiZzZ3B0PTk1JmFrbHA9MjE0JnB0PTcuOCZzYWxiPTQuOCZnbG89My40JmdndHA9MTA2JmNyZWF0ZT1TdWJtaXQ=', 1, 'Updated (10/12/2022 08:12:51 pm)', 'LFT Report'),
('2004699', 'MONOMOTI KALITA', 'failure', '22.00', '1cb8971cba139266e86a', 'aHR0cDovL2hlYWx0aGtpbmQuaXMtZ3JlYXQubmV0L2NyZWF0ZS90aHlyb2lkLnBocD9zZXJpYWw9MjAwNDY5OSZwYXRpZW50X3NhbXBsZT0yMDIxMDYmcmVwb3J0X2RhdGU9MjAyMi0xMi0xMCZkcl9uYW1lPU1HIE1PREVMIEhPU1BJVEFMJnBhdGllbnRfbmFtZT1NT05PTU9USSBLQUxJVEEmcGF0aWVudF9hZ2U9MzUgWWVhcnMmcGF0aWVudF9nZW5kZXI9RmVtYWxlJnRocz02LjAyJnQzPSZ0ND0mY2hrVGhzPXllcyZjaGtUMz0mY2hrVDQ9', 1, 'Available (10/12/2022 08:14:43 pm)', 'Thyroid Profile'),
('2004700', 'PUJASHREE DAS', 'failure', '22.00', 'e70b691a988a61eb4524', 'aHR0cDovL2hlYWx0aGtpbmQuaXMtZ3JlYXQubmV0L2NyZWF0ZS90aHlyb2lkLnBocD9zZXJpYWw9MjAwNDcwMCZwYXRpZW50X3NhbXBsZT0yMDIxMDcmcmVwb3J0X2RhdGU9MjAyMi0xMi0xMCZkcl9uYW1lPU1HIE1PREVMIEhPU1BJVEFMJnBhdGllbnRfbmFtZT1QVUpBU0hSRUUgREFTJnBhdGllbnRfYWdlPTE2IFllYXJzJnBhdGllbnRfZ2VuZGVyPUZlbWFsZSZ0aHM9NS44NSZ0Mz0mdDQ9JmNoa1Rocz15ZXMmY2hrVDM9JmNoa1Q0PQ==', 1, 'Available (10/12/2022 08:18:28 pm)', 'Thyroid Profile'),
('2004697', 'JIBAN CHOUDHURY', 'success', '22.00', '59db691b22bb87b66cc0', 'aHR0cDovL2hlYWx0aGtpbmQuaXMtZ3JlYXQubmV0L2NyZWF0ZS90aHlyb2lkLnBocD9zZXJpYWw9MjAwNDY5NyZwYXRpZW50X3NhbXBsZT0yMDIxMDQmcmVwb3J0X2RhdGU9MjAyMi0xMi0wOCZkcl9uYW1lPVNlbGYmcGF0aWVudF9uYW1lPUpJQkFOIENIT1VESFVSWSZwYXRpZW50X2FnZT00MCBZZWFycyZwYXRpZW50X2dlbmRlcj1NYWxlJnRocz0yMi43MyZ0Mz0mdDQ9JmNoa1Rocz15ZXMmY2hrVDM9JmNoa1Q0PQ==', 0, 'Not Available (08/12/2022 07:10:00 pm)', 'Thyroid Profile'),
('2004697', 'JIBAN CHOUDHURY', 'success', '22.00', '894b4e84748ba04bdbfe', 'aHR0cDovL2hlYWx0aGtpbmQuaXMtZ3JlYXQubmV0L2NyZWF0ZS90aHlyb2lkLnBocD9zZXJpYWw9MjAwNDY5NyZwYXRpZW50X3NhbXBsZT0yNTIxMDMmcmVwb3J0X2RhdGU9MjAyMi0xMi0wOCZkcl9uYW1lPVNlbGYmcGF0aWVudF9uYW1lPUpJQkFOIENIT1VESFVSWSZwYXRpZW50X2FnZT00MCBZZWFycyZwYXRpZW50X2dlbmRlcj1NYWxlJnRocz0yMC43MyZ0Mz0mdDQ9JmNoa1Rocz15ZXMmY2hrVDM9JmNoa1Q0PQ==', 0, 'Not Available (08/12/2022 07:21:03 pm)', 'Thyroid Profile'),
('2004701', 'SONESWAR DAS', 'success', '22.00', '4e6a94c68fb0f0bf58b2', 'aHR0cDovL2hlYWx0aGtpbmQuaXMtZ3JlYXQubmV0L2NyZWF0ZS90aHlyb2lkLnBocD9zZXJpYWw9MjAwNDY5OCZwYXRpZW50X3NhbXBsZT0yNTIxMDcmcmVwb3J0X2RhdGU9MjAyMi0xMi0xNSZkcl9uYW1lPVNlbGYmcGF0aWVudF9uYW1lPVNPTkVTV0FSIERBUyZwYXRpZW50X2FnZT01MiBZZWFycyZwYXRpZW50X2dlbmRlcj1NYWxlJnRocz0wLjYxJnQzPSZ0ND0mY2hrVGhzPXllcyZjaGtUMz0mY2hrVDQ9', 1, 'Available (19/12/2022 10:14:05 pm)', 'Thyroid Profile'),
('2004701', 'SONESWAR DAS', 'success', '22.00', 'cc2d2cbd99edc882c038', 'aHR0cDovL2hlYWx0aGtpbmQuaXMtZ3JlYXQubmV0L2NyZWF0ZS90aHlyb2lkLnBocD9zZXJpYWw9MjAwNDY5OCZwYXRpZW50X3NhbXBsZT0yNTIxMDcmcmVwb3J0X2RhdGU9MjAyMi0xMi0xNSZkcl9uYW1lPVNlbGYmcGF0aWVudF9uYW1lPVNPTkVTV0FSIERBUyZwYXRpZW50X2FnZT01MiBZZWFycyZwYXRpZW50X2dlbmRlcj1NYWxlJnRocz0wLjYxJnQzPSZ0ND0mY2hrVGhzPXllcyZjaGtUMz0mY2hrVDQ9', 1, 'Available (19/12/2022 10:14:05 pm)', 'Thyroid Profile'),
('2004704', 'NIRU PATHAK', 'success', '22.00', '459998c4c64640b7e65a', 'aHR0cDovL2hlYWx0aGtpbmQuaXMtZ3JlYXQubmV0L2NyZWF0ZS90aHlyb2lkLnBocD9zZXJpYWw9MjAwNDY5OSZwYXRpZW50X3NhbXBsZT0yNTIxMDgmcmVwb3J0X2RhdGU9MjAyMi0xMi0xNCZkcl9uYW1lPVNlbGYmcGF0aWVudF9uYW1lPU5JUlUgUEFUSEFLJnBhdGllbnRfYWdlPTQzIFllYXJzJnBhdGllbnRfZ2VuZGVyPUZlbWFsZSZ0aHM9PjYwJnQzPSZ0ND0mY2hrVGhzPXllcyZjaGtUMz0mY2hrVDQ9', 1, 'Available (19/12/2022 10:21:20 pm)', 'Thyroid Profile'),
('2004704', 'NIRU PATHAK', 'success', '22.00', '121605ccc1497c012fd4', 'aHR0cDovL2hlYWx0aGtpbmQuaXMtZ3JlYXQubmV0L2NyZWF0ZS9jYmMucGhwP3NlcmlhbD0yMDA0Njk5JnBhdGllbnRfc2FtcGxlPTI1MjEwOCZyZXBvcnRfZGF0ZT0yMDIyLTEyLTE0JmRyX25hbWU9U2VsZiZwYXRpZW50X25hbWU9TklSVSBQQVRIQUsmcGF0aWVudF9hZ2U9NDMgWWVhcnMmcGF0aWVudF9nZW5kZXI9RmVtYWxlJnRsYz0yMiw4MzAmbmV1PTcwJmx5bT0yMCZtb25vPTA3JmVvcz0wMyZiYXM9MDAmaGI9OC4yJnBsYz0xMjAmcmJjPTQuMTgmcGN2PTI0LjAmbWN2PTU4Jm1jaD0xOS41Jm1jaGM9MzMuOSZyZHc9MTkuNSZjcmVhdGU9U3VibWl0', 1, 'Available (19/12/2022 10:21:20 pm)', 'CBC Report'),
('2004704', 'NIRU PATHAK', 'success', '22.00', '13366413649ff58187ad', 'aHR0cDovL2hlYWx0aGtpbmQuaXMtZ3JlYXQubmV0L2NyZWF0ZS9oYmExYy5waHA/c2VyaWFsPTIwMDQ2OTkmcGF0aWVudF9zYW1wbGU9MjUyMTA4JnJlcG9ydF9kYXRlPTIwMjItMTItMTQmZHJfbmFtZT1TZWxmJnBhdGllbnRfbmFtZT1OSVJVIFBBVEhBSyZwYXRpZW50X2FnZT00MyBZZWFycyZwYXRpZW50X2dlbmRlcj1GZW1hbGUmcmVzPTEzLjYmY3JlYXRlPVN1Ym1pdA==', 1, 'Available (19/12/2022 10:21:20 pm)', 'HbA1C Report'),
('2004704', 'NIRU PATHAK', 'success', '22.00', '2a673d67274d3aa0ae66', 'aHR0cDovL2hlYWx0aGtpbmQuaXMtZ3JlYXQubmV0L2NyZWF0ZS9yZnQucGhwP3NlcmlhbD0yMDA0Njk5JnBhdGllbnRfc2FtcGxlPTI1MjEwOCZyZXBvcnRfZGF0ZT0yMDIyLTEyLTE0JmRyX25hbWU9U2VsZiZwYXRpZW50X25hbWU9TklSVSBQQVRIQUsmcGF0aWVudF9hZ2U9NDMgWWVhcnMmcGF0aWVudF9nZW5kZXI9RmVtYWxlJnVyZWE9NDMmdXJpYz05LjMmY3JlYT0xLjImYW15bGU9MTI4JmxpcGE9My43JmNyZWF0ZT1TdWJtaXQ=', 1, 'Available (19/12/2022 10:21:20 pm)', 'RFT Report'),
('2004704', 'NIRU PATHAK', 'success', '22.00', 'b873ca8dc72973e08a64', 'aHR0cDovL2hlYWx0aGtpbmQuaXMtZ3JlYXQubmV0L2NyZWF0ZS9yZnQucGhwP3NlcmlhbD0yMDA0Njk5JnBhdGllbnRfc2FtcGxlPTI1MjEwOCZyZXBvcnRfZGF0ZT0yMDIyLTEyLTE0JmRyX25hbWU9U2VsZiZwYXRpZW50X25hbWU9TklSVSBQQVRIQUsmcGF0aWVudF9hZ2U9NDMgWWVhcnMmcGF0aWVudF9nZW5kZXI9RmVtYWxlJnVyZWE9NDMmdXJpYz05LjMmY3JlYT0xLjImYW15bGU9MTI4JmxpcGE9My43JmNyZWF0ZT1TdWJtaXQ=', 1, 'Available (19/12/2022 10:21:20 pm)', 'RFT Report'),
('2004704', 'NIRU PATHAK', 'success', '22.00', '847c65a2c6820b902c0b', 'aHR0cDovL2hlYWx0aGtpbmQuaXMtZ3JlYXQubmV0L2NyZWF0ZS9vdGhlcnMucGhwP3NlcmlhbD0yMDA0Njk5JnBhdGllbnRfc2FtcGxlPTI1MjEwOCZyZXBvcnRfZGF0ZT0yMDIyLTEyLTE0JmRyX25hbWU9U2VsZiZwYXRpZW50X25hbWU9TklSVSBQQVRIQUsmcGF0aWVudF9hZ2U9NDMgWWVhcnMmcGF0aWVudF9nZW5kZXI9RmVtYWxlJmZzPTIyOCZyYW49JnBwPTQzNSZ1cmVhPSZyYW5kPSZ1cmljPSZjcmVhPSZhbXlsZT0mbGlwYT0mZmFzdD15ZXMmcGFwPXllcyZzZ290PSZzZ3B0PSZjaGtVcmVhPSZjaGtVcmljPSZjaGtDcmVhPSZjaGtBbXlsPSZjaGtMaXBhPSZjaGtTZ290PSZjaGtTZ3B0PSZjcmVhdGU9U3VibWl0', 1, 'Available (19/12/2022 10:21:20 pm)', 'Others Report'),
('2004704', 'NIRU PATHAK', 'success', '22.00', '7c26d2f50dc59e3a4e91', 'aHR0cDovL2hlYWx0aGtpbmQuaXMtZ3JlYXQubmV0L2NyZWF0ZS9jcnAucGhwP3NlcmlhbD0yMDA0Njk5JnBhdGllbnRfc2FtcGxlPTI1MjEwOCZyZXBvcnRfZGF0ZT0yMDIyLTEyLTE0JmRyX25hbWU9U2VsZiZwYXRpZW50X25hbWU9TklSVSBQQVRIQUsmcGF0aWVudF9hZ2U9NDMgWWVhcnMmcGF0aWVudF9nZW5kZXI9RmVtYWxlJmZzPTEyMC44NyZjcmVhdGU9U3VibWl0', 1, 'Available (19/12/2022 10:21:20 pm)', 'CRP Report'),
('2004702', 'SARAT DEKA', 'success', '22.00', 'b56f78aa22058dfc3572', 'aHR0cDovL2hlYWx0aGtpbmQuaXMtZ3JlYXQubmV0L2NyZWF0ZS90aHlyb2lkLnBocD9zZXJpYWw9MjAwNDcwMCZwYXRpZW50X3NhbXBsZT0yNTIxMTA5JnJlcG9ydF9kYXRlPTIwMjItMTItMTYmZHJfbmFtZT1Eci4gUyBTQVJNQSwgTUQmcGF0aWVudF9uYW1lPVNBUkFUIERFS0EmcGF0aWVudF9hZ2U9NDUgWWVhcnMmcGF0aWVudF9nZW5kZXI9TWFsZSZ0aHM9MS45MCZ0Mz0mdDQ9JmNoa1Rocz15ZXMmY2hrVDM9JmNoa1Q0PQ==', 1, 'Available (19/12/2022 10:16:47 pm)', 'Thyroid Profile'),
('2004703', 'BARNALI DAS', 'success', '22.00', '2f16eb413fc9bce9a602', 'aHR0cDovL2hlYWx0aGtpbmQuaXMtZ3JlYXQubmV0L2NyZWF0ZS90aHlyb2lkLnBocD9zZXJpYWw9MjAwNDcwMSZwYXRpZW50X3NhbXBsZT0yNTIxMjAwJnJlcG9ydF9kYXRlPTIwMjItMTItMTYmZHJfbmFtZT1HUEhDJnBhdGllbnRfbmFtZT1CQVJOQUxJIERBUyZwYXRpZW50X2FnZT00MCBZZWFycyZwYXRpZW50X2dlbmRlcj1GZW1hbGUmdGhzPTQuODAmdDM9JnQ0PSZjaGtUaHM9eWVzJmNoa1QzPSZjaGtUND0=', 1, 'Available (19/12/2022 10:17:05 pm)', 'Thyroid Profile'),
('2004705', 'JAYABALA DEVI', 'failure', '22.00', '2b963a714ad3dfd7e749', 'aHR0cDovL2hlYWx0aGtpbmQuaXMtZ3JlYXQubmV0L2NyZWF0ZS90aHlyb2lkLnBocD9zZXJpYWw9MjAwNDcwNSZwYXRpZW50X3NhbXBsZT0mcmVwb3J0X2RhdGU9MjAyMi0xMi0xOSZkcl9uYW1lPVNlbGYmcGF0aWVudF9uYW1lPUpBWUFCQUxBIERFVkkmcGF0aWVudF9hZ2U9NTAgWWVhcnMmcGF0aWVudF9nZW5kZXI9RmVtYWxlJnRocz00LjM1JnQzPSZ0ND0mY2hrVGhzPXllcyZjaGtUMz0mY2hrVDQ9', 1, 'Deleted (20/12/2022 08:33:36 am)', 'Thyroid Profile');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `image` (`image`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cardname` (`cardname`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD UNIQUE KEY `transaction_id` (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2004705;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
