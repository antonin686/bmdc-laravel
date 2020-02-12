-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2020 at 06:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

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
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speciality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authorize_doctors`
--

INSERT INTO `authorize_doctors` (`id`, `nid`, `first_name`, `last_name`, `email`, `degree`, `institute`, `speciality`, `img_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 54164156, 'Magu', 'Ghosh', 'g@gmail.com', 'MBBS', 'Dhaka Medical College', 'Child & Women', '/uploads/1581528432859237024.jpg', 1, '2020-02-12 11:27:12', '2020-02-12 11:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nid` bigint(20) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speciality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `nid`, `first_name`, `last_name`, `email`, `speciality`, `degree`, `institute`, `img_path`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 54164156, 'Md.Antonin', 'Islam', 'md.antonin686@gmail.com', 'Child & Women', 'MBBS', 'Dhaka Medical College', '/uploads/1581528282396677802.jpg', 2, '2020-02-12 11:25:19', '2020-02-12 11:25:19'),
(2, 54164156, 'Magu', 'Ghosh', 'g@gmail.com', 'Child & Women', 'MBBS', 'Dhaka Medical College', '/uploads/1581528432859237024.jpg', 3, '2020-02-12 11:27:33', '2020-02-12 11:27:33');

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
(1, 'Paracetamol', 'Fever,common cold and influenza.', 'Non opioid analgesics', 'Paracetamol exhibits analgesic action by peripheral blockage of pain impulse generation. It produces antipyresis by inhibiting the hypothalamic heat-regulating centre. Its weak anti-inflammatory activity is related to inhibition of prostaglandin synthesis in the CNS.\r\n\r\nParacetamol (Acetaminophen) is thought to act primarily in the CNS, increasing the pain threshold by inhibiting both isoforms of cyclooxygenase, COX-1, COX-2, and COX-3 enzymes involved in prostaglandin (PG) synthesis. Unlike NSAIDs, acetaminophen does not inhibit cyclooxygenase in peripheral tissues and, thus, has no peripheral anti-inflammatory affects. While aspirin acts as an irreversible inhibitor of COX and directly blocks the enzyme\'s active site, studies have found that acetaminophen indirectly blocks COX, and that this blockade is ineffective in the presence of peroxides. This might explain why acetaminophen is effective in the central nervous system and in endothelial cells but not in platelets and immune cells which have high levels of peroxides. Studies also report data suggesting that acetaminophen selectively blocks a variant of the COX enzyme that is different from the known variants COX-1 and COX-2. This enzyme is now referred to as COX-3. Its exact mechanism of action is still poorly understood, but future research may provide further insight into how it works. The antipyretic properties of acetaminophen are likely due to direct effects on the heat-regulating centres of the hypothalamus resulting in peripheral vasodilation, sweating and hence heat dissipation.', NULL, 'May reduce serum levels with anticonvulsants (e.g. phenytoin, barbiturates, carbamazepine). May enhance the anticoagulant effect of warfarin and other coumarins with prolonged use. Accelerated absorption with metoclopramide and domperidone. May increase serum levels with probenecid. May increase serum levels of chloramphenicol. May reduce absorption with colestyramine within 1 hr of admin. May cause severe hypothermia with phenothiazine.', 'Paracetamol is contraindicated in patients with severe renal function impairment and hepatic disease (Viral Hepatitis). Contraindicated in known sensitivity to Paracetamol', 'Side effects of paracetamol are usually mild, though haematological reactions including thrombocytopenia, leucopenia, pancytopenia, neutropenia, and agranulocytosis have been reported. Pancreatitis, skin rashes, and other allergic reactions occur occasionally.', 'Paracetamol is safe in all stage of pregnancy and lactation.', 'Paracetamol should be given with caution to patients with impaired kidney or liver function. Paracetamol should be given with care to patients taking other drugs that affect the liver.', NULL, 'Tablet, Syrup & Suspension: Keep in a cool & dry place, protected from light and moisture.\r\n\r\nSuppository: Store below 25° C. Keep all medicines out of the reach of children.', '2020-02-11 06:41:02', NULL),
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
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `brand_name`, `dosage_form`, `generic_id`, `strength`, `company`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Paracetamol', 'Tablet', 1, '500 mg', 'Bengal drugs Ltd.', 0.70, '2020-02-11 01:25:46', '2020-02-11 04:55:39'),
(7, 'Anca', 'Tablet', 2, '250 mg', 'Square Pharmaceuticals Ltd.', 29.98, '2020-02-12 09:02:54', '2020-02-12 09:02:54');

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
(12, '2020_02_10_190827_create_medicines_table', 4),
(15, '2020_02_10_202224_create_generics_table', 5),
(18, '2020_02_11_115506_create_removed_medicines_table', 7),
(20, '2020_02_07_105504_create_doctors_table', 8),
(26, '2014_10_12_000000_create_users_table', 9),
(27, '2020_02_07_185550_create_authorize_doctors_table', 9);

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
-- Table structure for table `removed_medicines`
--

CREATE TABLE `removed_medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosage_form` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `generic_id` bigint(20) NOT NULL,
  `strength` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, 'Magu Ghosh', 'Magu', '$2y$10$CxQZ12X2pJlLFviG.ln1Z.bgGqZwzMqBndgOX7KwKUb.3yd/0tQaK', '2', NULL, '2020-02-12 11:27:33', '2020-02-12 11:27:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authorize_doctors`
--
ALTER TABLE `authorize_doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_email_unique` (`email`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `removed_medicines`
--
ALTER TABLE `removed_medicines`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `removed_medicines`
--
ALTER TABLE `removed_medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
