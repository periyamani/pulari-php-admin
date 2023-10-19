-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 19, 2023 at 04:02 PM
-- Server version: 5.7.38
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `primeparkco_pulari`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `is_superadmin` varchar(10) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `status`, `is_superadmin`, `created_date`) VALUES
(1, 'superadmin', '80cd5cc779172893112080cf068e63e0', 1, 'yes', '2023-07-12 22:32:17'),
(2, 'pulari-admin', '41c248822e03f4a789e9e6a1dbb387f2', 1, 'no', '2023-07-12 22:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `green_text_heading` varchar(255) NOT NULL,
  `sub_heading` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `button_text1` varchar(255) NOT NULL,
  `button_link1` varchar(255) NOT NULL,
  `button_text2` varchar(255) NOT NULL,
  `button_link2` varchar(255) NOT NULL,
  `is_published` int(5) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `heading`, `green_text_heading`, `sub_heading`, `image`, `button_text1`, `button_link1`, `button_text2`, `button_link2`, `is_published`, `created_date`) VALUES
(1, 'Reduce', 'Reuse', 'Recycle', '64b18fd731b9feco-banner-img02.jpg', 'Events', 'https://primepark.co.in/pulari_eco_foundation/events.php', 'Join Us', 'https://primepark.co.in/pulari_eco_foundation/contact_us.php', 1, '2023-07-14 23:33:04'),
(2, 'Pulari Eco Foundation', 'To a New Dawn of  Hope', '.', '64c0d756a2c77Blue Modern Good Morning Banner Landscape.png', 'Our Projects', 'https://primepark.co.in/pulari_eco_foundation/projects.php', 'Contact Us', 'https://primepark.co.in/pulari_eco_foundation/contact_us.php', 1, '2023-07-14 23:34:50'),
(4, 'Green Corridors', 'Afforestation and Reforestation', 'Increase Green Cover', '64c0d394ac878Green Minimalist Save The Forest Medium Banner.png', 'Gallery', 'https://primepark.co.in/pulari_eco_foundation/gallery.php', 'About Us', 'https://primepark.co.in/pulari_eco_foundation/about_us.php', 1, '2023-07-26 13:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int(11) NOT NULL,
  `job_reference_number` varchar(100) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_published` int(10) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `job_reference_number`, `job_title`, `description`, `is_published`, `created_date`) VALUES
(1, 'PEFJOB_001', 'Test Job Title', '<p>Test job description..&nbsp;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', 1, '2023-07-31 09:53:35'),
(2, 'PEFJOB_002', 'Sample Job Title', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 1, '2023-08-01 10:04:31'),
(5, 'PEFJOB_003', 'Test Job Title', '<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 1, '2023-08-01 13:17:51');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `donor_id` varchar(100) NOT NULL,
  `receipt_no` varchar(100) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `pan_number` varchar(100) NOT NULL,
  `aadhaar_number` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `mode_of_payment` varchar(255) NOT NULL,
  `transaction_number` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `donation_date` date NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `donor_id`, `receipt_no`, `amount`, `name`, `email_address`, `phone_number`, `pan_number`, `aadhaar_number`, `address`, `mode_of_payment`, `transaction_number`, `message`, `donation_date`, `created_date`) VALUES
(1, 'PEF-20230001', '20230001', '10000', 'Test name', 'dhayalan1127@gmail.com', '10000', 'ABCD12456ED', '1234 6546 9894 3456', 'Test address', '', '', 'Test Message to DOC Team', '2023-07-15', '2023-07-15 19:53:22'),
(2, 'PEF-20230002', '20230002', '5000', 'Hello Test', 'talktodhaya@gmail.com', '5000', '9865132132', '1326 5678 9012 4653', 'Test address', '', '', 'Test message', '2023-07-27', '2023-07-15 19:54:11'),
(3, 'PEF-20230003', '20230003', '5000', 'Dhayalan', 'dhayalan1127@gmail.com', '5000', '13265479798', '1234 5678 9012 3456', 'Test address', '', '', 'test', '2023-07-14', '2023-07-15 21:59:55'),
(7, 'PEF-20230007', '2023000-7', '5000', 'Shravantest', 'shravansrikumar95@gmail.com', '5000', 'ABCD465956ED', '0000 0000 0000 0000', '25/8, Coonoor, The Nilgiris', '', '', 'test', '2023-07-23', '2023-07-23 19:43:52'),
(8, 'PEF-20230008', '2023000-8', '2500', 'Test name', 'hellotest1@gmail.com', '2500', 'ABCD12456ED', '1234 5678 9012 3456', 'Test address', 'Cash', '1213123123', 'Test', '2023-07-24', '2023-07-24 21:07:20'),
(9, 'PEF-20230009', '2023000-9', '7000', 'Shravan', 'shravansrikumar95@gmail.com', '7000', 'ADBCHT1234E', '1234 2345 3456 4566', '25/8, Coonoor, The Nilgiris', 'Cheque', '1213123123', 'Test', '2023-07-28', '2023-07-28 09:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_published` int(10) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_title`, `image`, `event_date`, `event_location`, `description`, `is_published`, `created_date`) VALUES
(1, 'DONEC FACILISIS JUSTO A MAGNA MATTIS', '64b54c671a3b1lastest_blog_img_01.jpg', '2023-07-29', '', '<p>Sed at ultricies sapien, ut congue enim. In hac habitasse platea dictumst. Maecenas luctus metus viverra orci imperdiet faucibus.</p>\r\n', 1, '2023-07-15 15:13:05'),
(2, 'ALIQUAM AT JUSTO FINIBUS, PLACERAT LECTUS', '64b54c56cc8d2lastest_blog_img_02.jpg', '2023-08-18', '', '<p>Sed at ultricies sapien, ut congue enim. In hac habitasse platea dictumst. Maecenas luctus metus viverra orci imperdiet faucibus.</p>\r\n', 1, '2023-07-15 15:13:45'),
(4, 'Dummy Title Dummy Title', '64b5520c64a75lastest_blog_img_03.jpg', '2023-07-12', '', '<p>Sed at ultricies sapien, ut congue enim. In hac habitasse platea dictumst. Maecenas luctus metus viverra orci imperdiet faucibus.</p>\r\n', 1, '2023-07-17 19:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_published` int(10) NOT NULL,
  `created_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`, `is_published`, `created_date`) VALUES
(1, '64b25996268aamasonory-img01.jpg', 1, 2147483647),
(2, '64b259bde6c5dmasonory-img02.jpg', 1, 2147483647),
(6, '64b259f05b827masonory-img09.jpg', 1, 2147483647),
(7, '64c0d8383caa4Green Environment Reusable Bag Quote Instagram Post.png', 1, 2147483647),
(8, '64c0da51ae2a9Untitled design.jpg', 1, 2147483647),
(9, '64c0db3b0b22cUntitled design (1).jpg', 1, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `other_details` text NOT NULL,
  `is_published` int(10) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `email_address`, `phone_number`, `other_details`, `is_published`, `created_date`) VALUES
(1, 'Dhayalan', 'dhayalan1127@gmail.com', '9876543210', 'Test', 1, '2023-07-17 22:11:28'),
(2, 'Test name', 'test@gmail.com', '9879846541', '', 1, '2023-07-17 22:16:58'),
(3, 'Dhaya', 'talktodhaya@gmail.com', '9879846541', 'Test Details', 1, '2023-07-17 22:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `subscriber_id` text NOT NULL,
  `mail_subject` varchar(255) NOT NULL,
  `attachment` varchar(100) NOT NULL,
  `mail_content` text NOT NULL,
  `is_published` int(5) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `subscriber_id`, `mail_subject`, `attachment`, `mail_content`, `is_published`, `created_date`) VALUES
(1, '2~1', 'Test Mail Subject - Pulari Eco Foundation', '64c7e3463f4b423.jpg', '<p>Dear Subscriber,</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Thanks,<br />\r\n<strong>Pulari Eco Foundation</strong></p>\r\n', 1, '2023-07-18 22:11:32'),
(2, '4~2', 'Test Mail Subject - Pulari Eco Foundation', '64c7e33f10a37pdf-sample.pdf', '<p>Dear Subscriber,</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Thanks,<br />\r\n<strong>Pulari Eco Foundation</strong></p>\r\n', 1, '2023-07-18 22:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscription`
--

CREATE TABLE `newsletter_subscription` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `is_new` int(10) NOT NULL,
  `is_approved` int(10) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter_subscription`
--

INSERT INTO `newsletter_subscription` (`id`, `name`, `email_address`, `is_new`, `is_approved`, `created_date`) VALUES
(1, 'Test name', 'dhayalan1127@gmail.com', 1, 1, '2023-07-18 20:10:15'),
(2, 'Dhaya', 'talktodhaya@gmail.com', 1, 1, '2023-07-18 20:11:16'),
(3, 'Dhaya', 'hellotest@gmail.com', 1, 0, '2023-07-18 20:16:28'),
(4, 'Dhaya', 'hellotest@gmail.com', 1, 1, '2023-07-18 20:16:28');

-- --------------------------------------------------------

--
-- Table structure for table `process_counter`
--

CREATE TABLE `process_counter` (
  `id` int(11) NOT NULL,
  `total_campaign` int(50) NOT NULL,
  `funds_collection` int(50) NOT NULL,
  `volunteers` int(50) NOT NULL,
  `saplings` int(50) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `process_counter`
--

INSERT INTO `process_counter` (`id`, `total_campaign`, `funds_collection`, `volunteers`, `saplings`, `created_date`) VALUES
(1, 0, 1000, 0, 0, '2023-07-24 21:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_detail` varchar(255) NOT NULL,
  `is_published` int(10) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `sub_title`, `description`, `image`, `image_detail`, `is_published`, `created_date`) VALUES
(1, 'Green Coimbatore', '', '<p>An initiative to reduce littering in the city, to streamline Solid Waste Management in the city and to create Green Corridors along the National Highways. This is a pilot project carried out in collaborative partnership with the Coimbatore City Municipal Corporation.</p>\r\n', '64b2590da9a56project_listing_img_04.jpg', '64b2590da9d5ah2-banner-img01.jpg', 1, '2023-07-15 13:31:50'),
(2, 'Green Campus', '', '<p>An initiative that focuses on waste handling in educational institutions. It is of great importance to impart awareness amongst the upcoming generation with regard to proper waste management. A model consisting of five types of segregation of waste will be implemented in educational institutions, thus enabling students to adopt a disciplined waste management habit.</p>\r\n', '64b258c9d1350project_listing_img_02.jpg', '64b258c9d1589project_images_01.jpg', 1, '2023-07-15 13:32:44');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_published` int(10) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`id`, `company_name`, `image`, `is_published`, `created_date`) VALUES
(1, 'Eco Life', '64b295e1038dbsponsors_img03.jpg', 1, '2023-07-15 18:19:37'),
(2, 'Green', '64b295f458ac2sponsors_img02.jpg', 1, '2023-07-15 18:19:56'),
(3, 'Green Fit', '64b295fd3d4basponsors_img01.jpg', 1, '2023-07-15 18:20:05'),
(4, 'Wellness', '64b2961a0cee5sponsors_img05.jpg', 1, '2023-07-15 18:20:34'),
(5, 'Eco World', '64b2962a9eccasponsors_img06.jpg', 1, '2023-07-15 18:20:50'),
(6, 'Eco1', '64b2968405accsponsors_img03.jpg', 1, '2023-07-15 18:21:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_subscription`
--
ALTER TABLE `newsletter_subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `process_counter`
--
ALTER TABLE `process_counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `newsletter_subscription`
--
ALTER TABLE `newsletter_subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `process_counter`
--
ALTER TABLE `process_counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
