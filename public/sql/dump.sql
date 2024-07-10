--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
                                          `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
                                          `number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `group_id` bigint UNSIGNED NOT NULL,
    `parent_id` bigint UNSIGNED DEFAULT NULL,
    `enabled` tinyint NOT NULL DEFAULT '1',
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    `deleted_at` timestamp NULL DEFAULT NULL,
    `company_id` bigint UNSIGNED DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `accounts_group_id_foreign` (`group_id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `number`, `name`, `group_id`, `parent_id`, `enabled`, `created_at`, `updated_at`, `deleted_at`, `company_id`) VALUES
                                                                                                                                                (1, '1001001', 'Land', 1, NULL, 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL, NULL),
                                                                                                                                                (2, '1001002', 'Building', 1, NULL, 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL, NULL),
                                                                                                                                                (3, '1001003', 'Plant & Machinery', 1, NULL, 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL, NULL),
                                                                                                                                                (4, '1001004', 'Furniture & Fixtures', 1, NULL, 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL, NULL),
                                                                                                                                                (5, '1001005', 'Office Equipment', 1, NULL, 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL, NULL),
                                                                                                                                                (6, '1001006', 'Vehicles', 1, NULL, 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL, NULL),
                                                                                                                                                (7, '1001007', 'Allowance for Depreciation - Building', 1, NULL, 1, '2022-11-03 02:38:30', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (8, '1001008', 'Allowance for Depreciation - Plant & Machinery', 1, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (9, '1001009', 'Allowance for Depreciation - Furniture & Fixtures', 1, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (10, '1001010', 'Allowance for Depreciation - Office Equipment', 1, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (11, '1001011', 'Allowance for Depreciation - Vehicles', 1, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (12, '1002001', 'Stock 1', 2, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (13, '1006001', 'Cash at Bank', 6, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (14, '1006002', 'Cash in Hand', 6, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (15, '3001001', 'Share Capital', 7, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (16, '3002001', 'Accumulated Profit', 8, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (17, '4001001', 'Sale - Local', 13, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (18, '5001001', 'Stock 1 Consumed', 15, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (19, '5001002', 'Salaries & Wages', 15, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (20, '5001003', 'Repair & Maintenance', 15, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (21, '5001004', 'Rent, Rates & Taxes', 15, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (22, '5001005', 'Utilities', 15, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (23, '5001006', 'Depreciation Expense', 15, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (24, '5002001', 'Salaries & Wages', 16, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (25, '5002002', 'Repair & Maintenance', 16, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (26, '5002003', 'Travelling & Conveyance', 16, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (27, '5002004', 'Rent, Rates & Taxes', 16, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (28, '5002005', 'Utilities', 16, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (29, '5002006', 'Printing & Stationery', 16, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (30, '5002007', 'Advertisement', 16, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (31, '5002008', 'Legal & Professional', 16, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (32, '5002009', 'Depreciation Expense', 16, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (33, '5003001', 'Income Tax', 17, NULL, 1, '2022-11-03 02:38:31', '2022-11-03 02:38:31', NULL, NULL),
                                                                                                                                                (34, '3001002', 'Owner Investment', 7, NULL, 1, '2023-01-22 14:01:47', '2023-01-22 14:01:47', NULL, NULL),
                                                                                                                                                (35, '1001012', 'Society equipment', 1, NULL, 1, '2023-02-12 06:36:04', '2023-02-12 06:36:04', NULL, NULL),
                                                                                                                                                (36, '1001001-001', '3 Marla', 1, 1, 1, '2023-03-19 15:37:02', '2023-03-19 15:37:02', NULL, NULL),
                                                                                                                                                (37, '1001001-002', '4 Marla', 1, 1, 1, '2023-03-20 01:51:29', '2023-03-20 01:51:29', NULL, NULL),
                                                                                                                                                (38, '1001001-003', '5 Marla', 1, 1, 1, '2023-03-20 02:17:29', '2023-03-20 02:17:29', NULL, NULL),
                                                                                                                                                (39, '1001001-004', '6 Marla', 1, 1, 1, '2023-03-20 02:20:27', '2023-03-20 02:20:27', NULL, NULL),
                                                                                                                                                (40, '1001001-005', '10 Marla', 1, 1, 1, '2023-03-20 02:20:49', '2023-03-20 02:20:49', NULL, NULL),
                                                                                                                                                (41, '1001001-006', 'Kanal', 1, 1, 1, '2023-03-21 17:52:08', '2023-03-21 17:52:08', NULL, NULL),
                                                                                                                                                (42, '1003001', 'Trade Receivables', 3, NULL, 1, '2023-04-17 02:29:49', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `account_groups`
--

DROP TABLE IF EXISTS `account_groups`;
CREATE TABLE IF NOT EXISTS `account_groups` (
                                                `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
                                                `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `type_id` bigint UNSIGNED NOT NULL,
    `enabled` tinyint NOT NULL DEFAULT '1',
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    `deleted_at` timestamp NULL DEFAULT NULL,
    `company_id` bigint UNSIGNED DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `account_groups_type_id_foreign` (`type_id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_groups`
--

INSERT INTO `account_groups` (`id`, `name`, `type_id`, `enabled`, `created_at`, `updated_at`, `deleted_at`, `company_id`) VALUES
                                                                                                                              (1, 'Fixed Assets', 1, 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL, NULL),
                                                                                                                              (2, 'Stock-in-Trade', 1, 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL, NULL),
                                                                                                                              (3, 'Accounts Receivables', 1, 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL, NULL),
                                                                                                                              (4, 'Loans & Advances', 1, 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL, NULL),
                                                                                                                              (5, 'Deposits, Prepayments & Other Receivables', 1, 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL, NULL),
                                                                                                                              (6, 'Cash & Bank', 1, 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL, NULL),
                                                                                                                              (7, 'Equity', 3, 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL, NULL),
                                                                                                                              (8, 'Reserves', 3, 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL, NULL),
                                                                                                                              (9, 'Long Term Liabilities', 2, 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL, NULL),
                                                                                                                              (10, 'Short Term Loans', 2, 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL, NULL),
                                                                                                                              (11, 'Advances, Deposits & Other Liabilities', 2, 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL, NULL),
                                                                                                                              (12, 'Accounts Payables', 2, 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL, NULL),
                                                                                                                              (13, 'Sale & Service', 4, 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL, NULL),
                                                                                                                              (14, 'Other Income', 4, 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL, NULL),
                                                                                                                              (15, 'Operating Expenses', 5, 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL, NULL),
                                                                                                                              (16, 'Administrative Expenses', 5, 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL, NULL),
                                                                                                                              (17, 'Taxes', 5, 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `account_subgroups`
--

DROP TABLE IF EXISTS `account_subgroups`;
CREATE TABLE IF NOT EXISTS `account_subgroups` (
                                                   `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
                                                   `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `group_id` bigint UNSIGNED NOT NULL,
    `enabled` tinyint NOT NULL DEFAULT '1',
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `account_subgroups_group_id_foreign` (`group_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

DROP TABLE IF EXISTS `account_types`;
CREATE TABLE IF NOT EXISTS `account_types` (
                                               `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
                                               `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `enabled` tinyint NOT NULL DEFAULT '1',
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    `deleted_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_types`
--

INSERT INTO `account_types` (`id`, `name`, `enabled`, `created_at`, `updated_at`, `deleted_at`) VALUES
                                                                                                    (1, 'Assets', 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL),
                                                                                                    (2, 'Liabilities', 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL),
                                                                                                    (3, 'Capital', 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL),
                                                                                                    (4, 'Revenue', 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL),
                                                                                                    (5, 'Expenses', 1, '2022-11-03 02:38:30', '2022-11-03 02:38:30', NULL);