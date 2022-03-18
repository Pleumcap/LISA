-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2022 at 10:02 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doc`
--

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `documentId` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `sendAddress` text DEFAULT NULL,
  `receiver` text DEFAULT NULL,
  `dateWrite` date DEFAULT NULL,
  `type` int(11) DEFAULT 0,
  `p_title` text DEFAULT NULL,
  `p_sendAddress` text DEFAULT NULL,
  `p_receiver` text DEFAULT NULL,
  `template` int(11) DEFAULT 0,
  `pageSequence` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`documentId`, `title`, `sendAddress`, `receiver`, `dateWrite`, `type`, `p_title`, `p_sendAddress`, `p_receiver`, `template`, `pageSequence`) VALUES
(1, 'การสอบสวน นายวรพงษ์ ทับรัตน์ ซึ่งถูกกล่าวหาว่ากระท่าผิดวินัยอย่างร้ายแรง', 'สอบสวนที่ ห้องประชุม 2 ชั้น 2 (a0-211) สำนักงานอุตสาหกรรมเกษตร', NULL, '2020-11-10', 0, 'การสอบสวน...... .นายวรพงษ์ ทับรัตน์.....ฮึ่งถูกกล่าวหาว่ากระท่าผิดวินัยอย่างร้ายแรง', 'สอบสวนที่ ห้องประชุม 2 ชั้น 2 (a0-211) สานักงานอุตสาทกรรมเกษตร', NULL, 0, '[0, 1]'),
(2, 'การสอบสวน นายลือ ตกบ้าน พนักงานมหาวิทยาลัยประจำ ซึ่งถูกกล่าวหาว่ากระทำผิดวินัย อย่างไม่ร้ายแรง', 'สอบสวนที่ ห้องประชุม ๒ ชั่น ๒ (E5-๒๒๕) สำนักงานวิศกรรมศาสตร์', NULL, '2020-02-06', 0, 'การสอบสวน นายลือ ตกบ้าน พนักงานมหาวิทยาลัยประจำ ซึ่งถูกกล่าวหาว่ากระทำผิดวินัย อย่างไม่ร้ายแรง', 'สอบสวนที่ ห้องประชุม ๒ ชั่น ๒ (=5-๒๒๕) สำนักงานวิศกรรมศาสตร์', NULL, 0, '[0]'),
(3, 'การสอบสวน......นายวรพงษ์ ทับรัตน์........ซึ่งถูกกล่าวหาว่ากระทำผิดวินัยอย่างร้ายแรง', 'สอบสวนที่ ห้องประชุม 2 ชั้น 2 (a0-211) สำนักงานอุตสาหกรรมเกษตร', '', '2020-11-10', 0, 'การสอบสวน......นายวรพงษ์ ทับรัตน์........ซึ่งถูกกล่าวหาว่ากระทำผิดวินัยอย่างร้ายแรง', 'สอบสวนที่ ท้องประชุม 2 ชั้น 2 (a0-211) สำนักงานอุตสาหกรรมเกษตร', NULL, 0, '[0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25]');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` text DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `date_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id_history`, `doc_id`, `user_id`, `action`, `user_agent`, `date_update`) VALUES
(1, 1, 3, 'Insert document', 'PostmanRuntime/7.28.0', '2021-06-09 11:50:39'),
(2, 1, 3, 'View document detail', 'PostmanRuntime/7.28.0', '2021-06-09 11:50:56'),
(3, 1, 3, 'Edit document', 'PostmanRuntime/7.28.0', '2021-06-09 11:53:43'),
(4, 2, 3, 'Insert document', 'PostmanRuntime/7.28.0', '2021-06-09 11:56:52'),
(5, 2, 3, 'View document detail', 'PostmanRuntime/7.28.0', '2021-06-09 11:57:23'),
(6, 2, 3, 'Delete document', 'PostmanRuntime/7.28.0', '2021-06-09 11:57:29'),
(7, 2, 3, 'Insert document', 'PostmanRuntime/7.28.0', '2021-06-09 11:59:25'),
(8, 2, 3, 'View document detail', 'PostmanRuntime/7.28.0', '2021-06-09 11:59:44'),
(9, 2, 1, 'View document detail', 'PostmanRuntime/7.28.0', '2021-06-11 09:53:05'),
(10, 1, 1, 'View document detail', 'PostmanRuntime/7.28.0', '2021-06-11 11:44:12'),
(11, 1, 1, 'View document detail', 'PostmanRuntime/7.28.0', '2021-06-11 11:48:51'),
(12, 1, 1, 'View document detail', 'PostmanRuntime/7.28.0', '2021-06-11 14:01:44'),
(13, 1, 1, 'View document detail', 'PostmanRuntime/7.28.0', '2021-06-16 17:22:37'),
(14, 1, 1, 'View document detail', 'PostmanRuntime/7.28.0', '2021-06-16 17:38:55'),
(15, 1, 1, 'Edit document', 'PostmanRuntime/7.28.0', '2021-06-16 17:43:32'),
(16, 1, 1, 'View document detail', 'PostmanRuntime/7.28.0', '2021-06-17 09:39:32'),
(17, 1, 1, 'View document detail', 'PostmanRuntime/7.28.0', '2021-06-21 10:06:40'),
(18, 3, 1, 'Insert document', 'PostmanRuntime/7.28.0', '2021-06-22 16:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `keyword_setting`
--

CREATE TABLE `keyword_setting` (
  `id_setting` int(11) NOT NULL,
  `keyword_id` int(11) DEFAULT NULL,
  `keyword` text DEFAULT NULL,
  `keyword_type` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keyword_setting`
--

INSERT INTO `keyword_setting` (`id_setting`, `keyword_id`, `keyword`, `keyword_type`) VALUES
(1, 1, 'เรื่อง', 'title'),
(2, 2, 'สอบสวนที่', 'sendAddress'),
(3, 2, 'บันทึกที่', 'sendAddress'),
(4, 2, 'ณ', 'sendAddress'),
(5, 3, 'เรียน', 'receiver'),
(6, 4, 'วันที่', 'dateWrite'),
(7, 5, 'ลงชื่อ', 'signature'),
(8, 5, 'ลงชือ', 'signature'),
(9, 6, 'ประธานกรรมการ', 'endpoint'),
(10, 5, 'ลงซือ', 'signature'),
(11, 1, 'เรือง', 'title'),
(12, 6, 'กรรมการ', 'personRole'),
(13, 6, 'เลขานุการ', 'personRole'),
(14, 4, 'วันที', 'dateWrite'),
(15, 2, 'สอบสวนที', 'sendAddress'),
(16, 5, 'ลงซ็อ', 'signature'),
(18, 4, 'พ.ศ.', 'dateWrite'),
(19, 4, 'ค.ศ.', 'dateWrite'),
(21, 6, 'พยาน', 'personRole'),
(22, 6, 'ผู้ถูกกล่าวหา', 'personRole'),
(23, 6, 'กรรมการและเลขานการ', 'personRole');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id_pages` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `num_page` int(11) NOT NULL,
  `url_page` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id_pages`, `doc_id`, `num_page`, `url_page`) VALUES
(1, 1, 0, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F1%2F0.png?alt=media&token=16c1f06a-2ed6-4fa1-8994-c21b2739048d'),
(2, 1, 1, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F1%2F1.png?alt=media&token=9e789fd8-01fb-4922-8dc5-6de143269dc4'),
(3, 2, 0, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F2%2F0.png?alt=media&token=46bc9924-d47b-4a3f-95b8-2b3b8096d36e'),
(4, 2, 1, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F2%2F1.png?alt=media&token=adf1c905-b3ee-42dc-b962-e52bb65d55e1'),
(5, 3, 0, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F0.png?alt=media&token=a1c853d4-4469-4e8b-89a4-4d5f4ccf65cc'),
(6, 3, 1, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F1.png?alt=media&token=44f43564-af3b-4dde-a520-3ae860941e80'),
(7, 3, 2, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F2.png?alt=media&token=447ca389-e026-448c-a459-1644f3176ebc'),
(8, 3, 3, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F3.png?alt=media&token=662475bf-2359-4144-a801-c1dc2be86891'),
(9, 3, 4, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F4.png?alt=media&token=59d04961-73ed-4cd2-9a7b-82cf6e9d51ba'),
(10, 3, 5, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F5.png?alt=media&token=e65f8679-e682-4316-90dc-f3eb898351d0'),
(11, 3, 6, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F6.png?alt=media&token=47eabadd-601e-4f92-beee-525f40a96630'),
(12, 3, 7, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F7.png?alt=media&token=648dd35c-47c1-4f0c-9e22-3b99dd192d50'),
(13, 3, 8, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F8.png?alt=media&token=a2d7b756-653d-4596-b970-d7024e00d700'),
(14, 3, 9, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F9.png?alt=media&token=9cb8a7cf-c922-45e9-8b4f-7e71f43e94e1'),
(15, 3, 10, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F10.png?alt=media&token=cf05bd1f-3a65-46b5-8fb8-6a69f4e941b7'),
(16, 3, 11, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F11.png?alt=media&token=ca61c77d-f7f9-4c0b-b80d-502acd578b7a'),
(17, 3, 12, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F12.png?alt=media&token=f204d050-40e0-4846-a34e-f100b2086821'),
(18, 3, 13, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F13.png?alt=media&token=a29136e5-48af-4992-82ab-fa475b72275e'),
(19, 3, 14, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F14.png?alt=media&token=64820df7-2287-4428-acd2-7879f1107e87'),
(20, 3, 15, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F15.png?alt=media&token=9743ba7e-b224-4238-9321-1813c17b8246'),
(21, 3, 16, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F16.png?alt=media&token=8ed42a1e-f995-476b-acbe-e65f8ddc68a8'),
(22, 3, 17, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F17.png?alt=media&token=e6b60ddf-a86e-4a02-bac9-417811c6eaff'),
(23, 3, 18, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F18.png?alt=media&token=a1c3e0ef-31e0-433c-ab5d-27a923957258'),
(24, 3, 19, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F19.png?alt=media&token=31bfd127-230e-4626-a4bb-f51824bae878'),
(25, 3, 20, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F20.png?alt=media&token=4956134e-5ea2-4241-b488-f2a373fb115c'),
(26, 3, 21, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F21.png?alt=media&token=1315f4ef-e3be-49bb-be9f-8609912b3402'),
(27, 3, 22, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F22.png?alt=media&token=c53249b8-880c-4c54-b5e1-69f22bfc4f7d'),
(28, 3, 23, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F23.png?alt=media&token=86b517d3-ac4e-4564-9986-fb672f5a21c4'),
(29, 3, 24, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F24.png?alt=media&token=7b797bc1-28a6-413c-91c3-74a0bb226865'),
(30, 3, 25, 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2F25.png?alt=media&token=083396b9-c168-4f1f-9a44-ef1c740a647d');

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `id_person` int(11) NOT NULL,
  `person_tname` text NOT NULL,
  `person_fname` text NOT NULL,
  `person_lname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id_person`, `person_tname`, `person_fname`, `person_lname`) VALUES
(1, 'ผู้ช่วยศาสตราจารย์ ดร.', 'สุทัศน์', 'สุระวัง'),
(2, 'ผู้ช่วยศาสตราจารย์ ดร.', 'ทนงศักดิ์', 'ไชยาโส'),
(3, 'นาย', 'ปฐมพร', 'พัฑฒโภคิณ'),
(4, 'นางสาว', 'ปียะนุช', 'สวัสดี'),
(5, 'ผู้ช่วยศาสตราจารย์ ดร.', 'โอม', 'ตาลือตกบ้าน'),
(6, 'ผู้ช่วยศาสตราจารย์ ดร.', 'เฉาก๊วย', 'ฺชากังราว'),
(7, 'นาย', 'บุญ', 'มากมี');

-- --------------------------------------------------------

--
-- Table structure for table `signature`
--

CREATE TABLE `signature` (
  `id_signature` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `signature_role` text DEFAULT NULL,
  `signature_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `signature`
--

INSERT INTO `signature` (`id_signature`, `doc_id`, `person_id`, `signature_role`, `signature_img`) VALUES
(1, 1, 1, 'ประธานกรรมการ', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F1%2Fsign_0.png?alt=media&token=24ec7707-314b-4feb-9804-5d44f497a058'),
(2, 1, 2, 'กรรมการ', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F1%2Fsign_1.png?alt=media&token=915c23b0-e190-46e3-ba71-4cf22d564435'),
(3, 1, 3, 'กรรมการ', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F1%2Fsign_2.png?alt=media&token=df93a88d-5b8d-4c25-9fcd-7ef7082cdb43'),
(4, 1, 4, 'กรรมการและเลขานุการ', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F1%2Fsign_3.png?alt=media&token=b446081c-2d90-436e-8c46-f0f38efb7db7'),
(8, 2, 5, 'ประธานกรรมการ', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F2%2Fsign_0.png?alt=media&token=d8827c2f-5664-4ee3-a27c-2728ffb085d0'),
(9, 2, 6, 'กรรมการ', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F2%2Fsign_1.png?alt=media&token=62c46693-c104-47bd-b5f2-4407738ec7a7'),
(10, 2, 7, ',กรรมการและเลขานุการ', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F2%2Fsign_2.png?alt=media&token=689a993d-84f9-4c75-a36f-2989779c355c'),
(11, 3, 1, 'ประธานกรรมการ', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2Fsign_0.png?alt=media&token=9d3456f6-9f12-4b32-be93-25cb7f3f37b4'),
(12, 3, 2, 'กรรมการ', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2Fsign_1.png?alt=media&token=3a72cdf3-d638-4363-9209-7ff43e07135b'),
(13, 3, 3, 'กรรมการ', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2Fsign_2.png?alt=media&token=bf70a122-f1ad-4e78-8dc0-6cf4b46aff7d'),
(14, 3, 4, 'กรรมการและเลขานุการ', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/document%2F3%2Fsign_3.png?alt=media&token=c0055fa8-5284-4b57-b474-761c3250a897');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `tname` text DEFAULT NULL,
  `fname` text DEFAULT NULL,
  `lname` text DEFAULT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `permiss` text NOT NULL,
  `picture` text DEFAULT NULL,
  `status` text NOT NULL,
  `last_connect` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `username`, `tname`, `fname`, `lname`, `email`, `password`, `permiss`, `picture`, `status`, `last_connect`) VALUES
(1, 'ake', 'Mr.', 'Weerachai', 'sarakun', 'kingake555@gmail.com', 'sha256$7yZLJOxAf2SELVtC$67b4341ef50f3fcb1038e4fad5627f4f49b6099b858ff8cc82e242318c82eca5', 'admin', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/profile%2F1?alt=media&token=fe268e5a-a2cf-48d1-bb9d-2965b4ad6752', 'online', '2021-11-17 00:00:30'),
(2, 'pleum', NULL, NULL, NULL, 'pleumpleum@hotmail.com', 'sha256$9bf3xmXsuPzpVbzm$27ed291fcba9f81ca418e8bf42bce258ed06d5a47885bd75c0f0eec58288c162', 'admin', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/template%2FArtboard%201.png?alt=media&token=b74d1752-21ae-4255-8d37-1440d1c967d5', 'suspended', NULL),
(3, 'admin', 'fc', 'pokela', 'Haha', 'admin@elearnning.cmu.ac.th', 'sha256$CZFw51TWogbjbbbY$1a8a2c0cd9136f1a9610c928046cb24d82aab271018fc81673a5ba01f1b678ad', 'admin', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/profile%2F3?alt=media&token=2ba8b49a-1203-433a-aea6-bd2b9e1ef845', 'online', '2021-06-10 08:59:51'),
(4, 'testlisaadmin', '', '', '', 'pleum-2013@hotmail.com', 'sha256$NbMnEQM4xGcoCybj$ee97e963ced71436f43042ce155fdccfb8289031d7ba303ce169ba5e58c3f008', 'admin', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/profile%2F4?alt=media&token=17a5cc1c-cd59-44c6-882e-5db67af2f271', 'invisible', '2021-10-18 14:22:29'),
(5, 'test5', NULL, NULL, NULL, 'test5@hotmail.com', 'sha256$F8vCxH7byfgd3x4w$d8276f600d6e89e47793f21c3ef6182a1703f63b710b9d1c1dbbd18656ed6599', 'admin', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/template%2FArtboard%201.png?alt=media&token=b74d1752-21ae-4255-8d37-1440d1c967d5', 'suspended', '2021-10-12 10:21:43'),
(6, 'test', NULL, NULL, NULL, 'test123@hotmail.com', 'sha256$cSudqpCudGQF2ZkC$71991ce278ad01a64f4ae88d9b93e0940600cb5ffe9b6569a29322f0cbc10f32', 'user', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/template%2FArtboard%201.png?alt=media&token=b74d1752-21ae-4255-8d37-1440d1c967d5', 'suspended', NULL),
(7, 'testadmin', NULL, NULL, NULL, 'testuser@hotmail.com', 'sha256$qzPyfZmVkbqqWG1e$ac769dc25c717c45f54adf0cbaffe63b9b53dedfecfabe6e4a159ca4bf609f6f', 'user', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/template%2FArtboard%201.png?alt=media&token=b74d1752-21ae-4255-8d37-1440d1c967d5', 'invisible', '2021-07-11 17:09:41'),
(8, 'ake2', NULL, NULL, NULL, 'weerachai_sarakun@cmu.ac.th', 'sha256$ahHkuNXwlMwR8vqP$aee49ac474b5c1182641f6654c6aae103b1e57ecdc298dc84cc52ddb171ce199', 'admin', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/template%2FArtboard%201.png?alt=media&token=b74d1752-21ae-4255-8d37-1440d1c967d5', 'suspended', '2021-10-02 15:24:56'),
(9, 'ake3', NULL, NULL, NULL, 'weerachai_sarakun@cmu.ac.th', 'sha256$f9hw9ckPwJZBfQBu$78af911f1a49f502dcf877cc276c296c49cc9a1ae657bbdd1e45ec1c1c34afb0', 'user', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/template%2FArtboard%201.png?alt=media&token=b74d1752-21ae-4255-8d37-1440d1c967d5', 'suspended', NULL),
(10, 'testsignup', NULL, NULL, NULL, 'testsignup1@gmail.com', 'sha256$h7vSqXC9uw3JVchi$0bd8d8858be54aed74513b62725282d9d2672870c14e8580a1859b746a5cbcca', 'admin', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/template%2FArtboard%201.png?alt=media&token=b74d1752-21ae-4255-8d37-1440d1c967d5', 'suspended', '2021-10-19 00:18:28'),
(11, 'ake4', NULL, NULL, NULL, 'weerachai_sarakun@cmu.ac.th', 'sha256$FIL5YDuk3Cnx1JXk$261726f0fa6b41ed551d0ff545a641a62bb29c941a19c0e7888a73f2745f5d74', 'admin', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/template%2FArtboard%201.png?alt=media&token=b74d1752-21ae-4255-8d37-1440d1c967d5', 'suspended', NULL),
(12, 'testlisauser', NULL, NULL, NULL, 'testlisauser@gmail.com', 'sha256$BnnPmBq7pqnMIrpk$3456877319c2b353743e205a2c3532fffc96ecd62c3ad7e3894f2a0b55bd3e65', 'user', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/template%2FArtboard%201.png?alt=media&token=b74d1752-21ae-4255-8d37-1440d1c967d5', 'invisible', '2021-10-14 22:11:55'),
(13, 'testuser', NULL, NULL, NULL, 'testuser@hotmail.com', 'sha256$sF5ol2zyUsnUMnS2$ec5a93d8b2e6a84175f12063fa3963265f73dca823a9c1c1411bcd11fde475b2', 'user', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/template%2FArtboard%201.png?alt=media&token=b74d1752-21ae-4255-8d37-1440d1c967d5', 'online', '2021-10-13 16:57:16'),
(14, 'testuser2', NULL, NULL, NULL, 'test@cmu.ac.th', 'sha256$vTUA768qbUSz2zNL$84b211a43cd814acd24495589b10b24da1756663fab9a27fb083a4f9d404c6e6', 'user', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/template%2FArtboard%201.png?alt=media&token=b74d1752-21ae-4255-8d37-1440d1c967d5', 'online', '2021-10-13 17:04:32'),
(15, 'example', NULL, NULL, NULL, 'example@gmail.com', 'sha256$GmBz8aazU30bBkyY$01d1a6fa8926df9a85ec7c81a0e26b3a0d811e64d36916992c887950e4bc47ee', 'user', 'https://firebasestorage.googleapis.com/v0/b/projectdoc-5af7b.appspot.com/o/template%2FArtboard%201.png?alt=media&token=b74d1752-21ae-4255-8d37-1440d1c967d5', 'invisible', '2021-10-18 00:23:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`documentId`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `keyword_setting`
--
ALTER TABLE `keyword_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id_pages`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id_person`);

--
-- Indexes for table `signature`
--
ALTER TABLE `signature`
  ADD PRIMARY KEY (`id_signature`),
  ADD KEY `person_sign_idx` (`person_id`),
  ADD KEY `doc_sign_idx` (`doc_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `documentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `keyword_setting`
--
ALTER TABLE `keyword_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id_pages` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `id_person` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `signature`
--
ALTER TABLE `signature`
  MODIFY `id_signature` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `signature`
--
ALTER TABLE `signature`
  ADD CONSTRAINT `doc_sign` FOREIGN KEY (`doc_id`) REFERENCES `document` (`documentId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `person_sign` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id_person`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
