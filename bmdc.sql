-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2020 at 02:24 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmdc`
--

-- --------------------------------------------------------

--
-- Table structure for table `authorize_doctors`
--

CREATE TABLE `authorize_doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nid` bigint(20) NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speciality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `basic_degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advance_degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authorize_doctors`
--

INSERT INTO `authorize_doctors` (`id`, `nid`, `full_name`, `email`, `phone`, `work_place`, `speciality`, `basic_degree`, `advance_degree`, `img_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 54164120, 'Magu Ghosh', 'magu@gmail.com', '01687759777', 'Dhaka Medical College', 'Dentist', 'MBBS', 'Mphil', '/uploads/1584796015135295306.jpg', 1, '2020-03-21 07:06:55', '2020-03-24 04:13:47'),
(2, 54164131, 'Md Akash', 'akash@gmail.com', '01687759111', 'Square Hospital', 'Radiology & Imaging', 'MBBS', 'Mphil (Uk)', '/uploads/1585127286421418973.jpg', 1, '2020-03-25 03:08:07', '2020-03-25 04:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `authorize_medicines`
--

CREATE TABLE `authorize_medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosage_form` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `generic_id` bigint(20) NOT NULL,
  `strength` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `applicant_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authorize_medicines`
--

INSERT INTO `authorize_medicines` (`id`, `brand_name`, `dosage_form`, `generic_id`, `strength`, `company`, `price`, `applicant_name`, `applicant_email`, `applicant_phone`, `img_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Paracetamol', 'Tablet', 1, '500 mg', 'Bengal drugs Ltd.', 0.60, 'Md.Antonin Islam', 'md.antonin686@gmail.com', '01687759686', '/uploads/15851325521004694626.jpg', 1, '2020-03-25 04:35:52', '2020-03-25 04:48:16'),
(2, 'Cefozil', 'Capsule', 1, '500 mg', 'Popular Pharmaceuticals Ltd', 30.00, 'Md.Antonin Islam', 'md.antonin686@gmail.com', '01687759686', '/uploads/1585243362741532292.jpg', 1, '2020-03-26 11:22:42', '2020-03-26 11:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `citizens`
--

CREATE TABLE `citizens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nid` bigint(20) DEFAULT NULL,
  `birthCer_id` bigint(20) NOT NULL,
  `deathCer_id` bigint(20) DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_nid` bigint(20) NOT NULL,
  `mother_nid` bigint(20) NOT NULL,
  `current_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `premanent_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `citizens`
--

INSERT INTO `citizens` (`id`, `nid`, `birthCer_id`, `deathCer_id`, `first_name`, `last_name`, `dob`, `gender`, `contact`, `father_nid`, `mother_nid`, `current_address`, `premanent_address`, `created_at`, `updated_at`) VALUES
(1, NULL, 54143545421, NULL, 'Antonin', 'Islam', '1998-04-11', 'male', '01687759686', 5414354540, 5414354541, '38 & 39 Topkhana Road,Dhaka', '38 & 39 Topkhana Road,Dhaka', '2020-02-23 12:27:23', NULL),
(2, 9517530258, 19976834521745781, NULL, 'NH', 'Azam', '1997-08-27', 'Male', '01787759686', 9517530255, 9517530256, 'Shitakund,Chittagong,Bangladesh', 'Shitakund,Chittagong,Bangladesh', '2020-03-30 15:45:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `complain_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain_body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `citizen_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`id`, `complain_type`, `complain_body`, `citizen_id`, `created_at`, `updated_at`) VALUES
(1, 'dsad', 'dsad', 'dsad', '2020-03-27 10:32:50', '2020-03-27 10:32:50'),
(2, 'dasdadasd', 'dasdada', '1', '2020-03-27 10:33:55', '2020-03-27 10:33:55'),
(3, 'dasdadasd', 'dasdada', '1', '2020-03-30 09:31:17', '2020-03-30 09:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registration_id` bigint(20) NOT NULL,
  `nid` bigint(20) NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speciality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `basic_degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advance_degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `registration_id`, `nid`, `full_name`, `email`, `phone`, `work_place`, `speciality`, `basic_degree`, `advance_degree`, `img_path`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 200324000001, 54164120, 'Magu Ghosh', 'magu@gmail.com', '01687759777', 'Square Hospital', 'Child & Women', 'MBBS', 'Mphil', '/uploads/1584796015135295306.jpg', 6, 0, '2020-03-24 04:13:47', '2020-03-24 11:43:02'),
(2, 200324000002, 54164134, 'Md.Aniruddha Islam', 'ani@gmail.com', '01687759683', 'Dhaka Medical College', 'Radiology & Imaging', 'MBBS', 'Mphil', '/uploads/1585053172715746241.png', 7, 0, '2020-03-24 05:49:17', '2020-03-24 10:22:39'),
(3, 200324000003, 54164156, 'Robert Carlos', 'robert@gmail.com', '01687759232', 'Dhaka Medical College', 'Child & Women', 'MBBS', 'Mphil', '/uploads/1585053172715746241.png', 8, 0, '2020-03-24 06:32:52', '2020-03-24 10:47:54'),
(4, 200325000004, 54164131, 'Md Akash', 'akash@gmail.com', '01687759111', 'Square Hospital', 'Radiology & Imaging', 'MBBS', 'Mphil (Uk)', '/uploads/1585127286421418973.jpg', 9, 0, '2020-03-25 04:49:10', '2020-03-25 04:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `generics`
--

CREATE TABLE `generics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `generic_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indications` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `therapeutic_class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pharmacology` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosage_administration` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interaction` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contraindications` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `side_effects` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pregnancy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precautions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overdose_effects` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storage_conditions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generics`
--

INSERT INTO `generics` (`id`, `generic_name`, `indications`, `therapeutic_class`, `pharmacology`, `dosage_administration`, `interaction`, `contraindications`, `side_effects`, `pregnancy`, `precautions`, `overdose_effects`, `storage_conditions`, `created_at`, `updated_at`) VALUES
(1, 'Paracetamol', 'Flamyd 250 ? 250 mg [Tablet] ....1-0-0....2 days...Before Eating...\n\nNapa ? 500 mg [Tablet] ....1-0-0....2 days...After Eating...\n\nMaxpro ? 20 mg [Tablet] ....1-0-0....2 days...Empty Stomach...', 'Non opioid analgesics', 'Paracetamol exhibits analgesic action by peripheral blockage of pain impulse generation. It produces antipyresis by inhibiting the hypothalamic heat-regulating centre. Its weak anti-inflammatory activity is related to inhibition of prostaglandin synthesis in the CNS.\r\n\r\nParacetamol (Acetaminophen) is thought to act primarily in the CNS, increasing the pain threshold by inhibiting both isoforms of cyclooxygenase, COX-1, COX-2, and COX-3 enzymes involved in prostaglandin (PG) synthesis. Unlike NSAIDs, acetaminophen does not inhibit cyclooxygenase in peripheral tissues and, thus, has no peripheral anti-inflammatory affects. While aspirin acts as an irreversible inhibitor of COX and directly blocks the enzyme\'s active site, studies have found that acetaminophen indirectly blocks COX, and that this blockade is ineffective in the presence of peroxides. This might explain why acetaminophen is effective in the central nervous system and in endothelial cells but not in platelets and immune cells which have high levels of peroxides. Studies also report data suggesting that acetaminophen selectively blocks a variant of the COX enzyme that is different from the known variants COX-1 and COX-2. This enzyme is now referred to as COX-3. Its exact mechanism of action is still poorly understood, but future research may provide further insight into how it works. The antipyretic properties of acetaminophen are likely due to direct effects on the heat-regulating centres of the hypothalamus resulting in peripheral vasodilation, sweating and hence heat dissipation.', NULL, 'May reduce serum levels with anticonvulsants (e.g. phenytoin, barbiturates, carbamazepine). May enhance the anticoagulant effect of warfarin and other coumarins with prolonged use. Accelerated absorption with metoclopramide and domperidone. May increase serum levels with probenecid. May increase serum levels of chloramphenicol. May reduce absorption with colestyramine within 1 hr of admin. May cause severe hypothermia with phenothiazine.', 'Paracetamol is contraindicated in patients with severe renal function impairment and hepatic disease (Viral Hepatitis). Contraindicated in known sensitivity to Paracetamol', 'Side effects of paracetamol are usually mild, though haematological reactions including thrombocytopenia, leucopenia, pancytopenia, neutropenia, and agranulocytosis have been reported. Pancreatitis, skin rashes, and other allergic reactions occur occasionally.', 'Paracetamol is safe in all stage of pregnancy and lactation.', 'Paracetamol should be given with caution to patients with impaired kidney or liver function. Paracetamol should be given with care to patients taking other drugs that affect the liver.', NULL, 'Tablet, Syrup & Suspension: Keep in a cool & dry place, protected from light and moisture.\r\n\r\nSuppository: Store below 25° C. Keep all medicines out of the reach of children.', '2020-02-11 06:41:02', '2020-03-26 03:49:12'),
(2, 'Cefprozil', 'Lower respiratory tract infections: acute bronchitis, acute exacerbations of chronic bronchitis, community acquired pneumonia.', 'Second generation Cephalosporins', 'Cefprozil inhibits bacterial cell wall synthesis by binding to 1 or more of the penicillin binding proteins (PBPs) which in turn inhibit the final transpeptidation step of peptidoglycan synthesis in bacterial cell walls, thus inhibiting cell wall biosynthesis and arresting cell wall assembly resulting in bacterial cell death.', 'Adult: 500 mg daily as a single or in 2 divided doses, increased to 500 mg bid if necessary. Duration: 10 days.', 'May enhance the nephrotoxic effect of aminoglycosides. May enhance the anticoagulant effect of vit K antagonists. May diminish the therapeutic effect of BCG, typhoid vaccine and Na picosulfate. May increase serum concentrations w/ probenecid.', NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-11 11:02:24', '2020-02-11 13:47:50'),
(3, 'Famotidine', 'Short term treatment of active duodenal ulcer and benign gastric ulcer', 'H2 receptor antagonist', 'Famotidine is a histamine H2-receptor antagonist. Famotidine completely inhibits the action of histamine on H2-receptors of parietal cell. It inhibits basal, overnight and pentagastrin stimulated gastric acid secretion. The H2-receptor antagonist activity of Famotidine is slowly reversible, since the drug dissociates slowly from H2-receptor.', 'Duodenal ulcer: 40 mg at night for 4 to 8 weeks\r\n\r\nBenign gastric ulcer: 40 mg at night for 4 to 8 weeks; Maintenance therapy: 20 mg at night for preventing the recurrences of duodenal ulceration\r\n\r\nGastro-oesophageal reflux disease: 20 mg twice daily for 6 to 12 weeks\r\n\r\nZollinger Ellison syndrome: The recommended starting dose is 20 mg every six hours. Dosage should then be adjusted to individual response. Doses up to 160 mg every six hours have been administered to some patients without the development of significant adverse effects\r\n\r\nDosage can be administered irrespective of meals. Antacids may be given concomitantly if needed.', 'Famotidine does not interact with the cytochrome P450 linked drug metabolising enzyme system. So, no interactions have been found in man with Warfarin, Theophylline, Phenytoin, Diazepam, Propranolol, Aminopyrine or antipyrine.', 'There are no known contraindication to Famotidine. If any evidence of hypersensitivity appear, the therapy should be discontinued and consultation with physician is required.', 'Famotidine is generally well tolerated and side effects are uncommon. Dizziness, headache, constipation and diarrhoea have been reported rarely. Other side effects reported less frequently include dry mouth, nausea and/or vomiting, rash, abdominal discomfort, anorexia and fatigue.', 'Pregnancy: There are no adequate, well controlled studies on Famotidine in pregnancy, but it is known to cross the placenta and should be prescribed only if clearly needed.\r\n\r\nLactation: It is not known whether Famotidine is secreted into human milk, nursing mothers should either stop nursing or stop taking the drug.', 'Dosage reduction should be considered or interval between doses should be prolonged if creatinine clearance falls to or below 30 ml/min.', NULL, 'Tablet: Store between 15-30° C. Concentrate for injection: Store between 2-8° C.', '2020-02-11 13:01:01', '2020-02-11 13:01:01');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosage_form` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `generic_id` bigint(20) NOT NULL,
  `strength` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `brand_name`, `dosage_form`, `generic_id`, `strength`, `company`, `price`, `img_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ace', 'Syrup', 1, '500 mg', 'Square Pharmaceuticals Ltd.', '0.80', '/uploads/15850715232010141462.jpg', 0, '2020-03-24 11:38:43', '2020-03-24 12:18:58'),
(2, 'Paracetamol', 'Tablet', 1, '500 mg', 'Bengal drugs Ltd.', '0.6', '/uploads/15851325521004694626.jpg', 0, '2020-03-25 04:48:16', '2020-03-25 04:48:16'),
(3, 'Cefozil', 'Capsule', 2, '500 mg', 'Popular Pharmaceuticals Ltd', '30', '/uploads/1585243362741532292.jpg', 0, '2020-03-26 11:22:56', '2020-03-30 02:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2020_02_10_202224_create_generics_table', 5),
(26, '2014_10_12_000000_create_users_table', 9),
(41, '2016_06_01_000001_create_oauth_auth_codes_table', 18),
(42, '2016_06_01_000002_create_oauth_access_tokens_table', 18),
(43, '2016_06_01_000003_create_oauth_refresh_tokens_table', 18),
(44, '2016_06_01_000004_create_oauth_clients_table', 18),
(45, '2016_06_01_000005_create_oauth_personal_access_clients_table', 18),
(52, '2020_02_07_185550_create_authorize_doctors_table', 19),
(53, '2020_02_07_105504_create_doctors_table', 20),
(61, '2020_02_10_190827_create_medicines_table', 22),
(63, '2020_03_07_085333_create_authorize_medicines_table', 23),
(66, '2020_03_27_163025_create_complains_table', 24),
(67, '2020_02_19_091854_create_prescriptions_table', 25),
(69, '2020_02_23_093851_create_citizens_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) NOT NULL,
  `citizen_id` bigint(20) NOT NULL,
  `hospital_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mainbody` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `med_list` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disease` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lx` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revisit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `doctor_id`, `citizen_id`, `hospital_name`, `mainbody`, `med_list`, `disease`, `cc`, `oe`, `lx`, `revisit`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 54143545421, 'Dgadada', 'dadadad', '432141241', 'fever', 'adada', 'dada', 'dada', NULL, '2020-03-30', '2020-03-30 15:31:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Antonin Islam', 'antonin', '$2y$10$Leay3oxPeUu/6o1PwmUmXeqyug9LrCaKtgoVeALGh9HI0AjkETp5C', '1', NULL, NULL, NULL),
(3, 'Magu Ghosh', 'Magu', '$2y$10$CxQZ12X2pJlLFviG.ln1Z.bgGqZwzMqBndgOX7KwKUb.3yd/0tQaK', '2', NULL, '2020-02-12 11:27:33', '2020-02-12 11:27:33'),
(4, 'Johnson Carlos', 'john', '$2y$10$UInGY34tg2Is79ltuvFN2eEf0k92QDWQJQllrqPfTMEAXFNoK3Hq.', '2', NULL, '2020-02-26 11:09:13', '2020-02-26 11:09:13'),
(5, 'Rambo Red', 'Rambo', '$2y$10$g.5DroLOcrDYEhZSg8IxI.gXrU5fMtiML1Unn0BzY/faSz4jA/8Py', '2', NULL, '2020-03-19 03:11:17', '2020-03-19 03:11:17'),
(6, ' ndada', 'magu686', '$2y$10$8.Lq5HOu16bZcuUWYuqt9eEXiL8xepRaduQ0RD7HYVVC.Tk4F96im', '2', NULL, '2020-03-24 04:13:47', '2020-03-24 04:13:47'),
(7, ' dadad', 'anirr', '$2y$10$CaHoSGRrQJGKMw.n/zhCT.yNLOYKZTzrxzx.1uOao63YPRA.5PNUm', '2', NULL, '2020-03-24 05:49:17', '2020-03-24 05:49:17'),
(8, 'dada', 'robert', '$2y$10$Na8YYZIWnnNVWqXRXvVyRucv.7KVjIJ3k619Dsywc3ls7HkpyQzdS', '2', NULL, '2020-03-24 06:32:52', '2020-03-24 06:32:52'),
(9, 'dadafa', 'akash', '$2y$10$t0ixIhp2DNTbcQj9DSamLuR1wrjnqnYE7pJdIGzzRxDByJozbcP5C', '2', NULL, '2020-03-25 04:49:10', '2020-03-25 04:49:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authorize_doctors`
--
ALTER TABLE `authorize_doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `authorize_doctors_email_unique` (`email`),
  ADD UNIQUE KEY `authorize_doctors_phone_unique` (`phone`);

--
-- Indexes for table `authorize_medicines`
--
ALTER TABLE `authorize_medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `citizens`
--
ALTER TABLE `citizens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `citizens_birthcer_id_unique` (`birthCer_id`),
  ADD UNIQUE KEY `citizens_contact_unique` (`contact`),
  ADD UNIQUE KEY `citizens_nid_unique` (`nid`),
  ADD UNIQUE KEY `citizens_deathcer_id_unique` (`deathCer_id`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_registration_id_unique` (`registration_id`),
  ADD UNIQUE KEY `doctors_email_unique` (`email`),
  ADD UNIQUE KEY `doctors_phone_unique` (`phone`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generics`
--
ALTER TABLE `generics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authorize_doctors`
--
ALTER TABLE `authorize_doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `authorize_medicines`
--
ALTER TABLE `authorize_medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `citizens`
--
ALTER TABLE `citizens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generics`
--
ALTER TABLE `generics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
