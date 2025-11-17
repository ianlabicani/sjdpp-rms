-- Database Backup
-- Generated at 2025-11-17 13:09:39
-- Database: sjdpp_rms_db



-- Table structure for table `baptismals`
DROP TABLE IF EXISTS `baptismals`;
CREATE TABLE `baptismals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `baptism_date` date NOT NULL,
  `fathers_name` varchar(255) NOT NULL,
  `mothers_name` varchar(255) NOT NULL,
  `church_name` varchar(255) NOT NULL,
  `sponsor` varchar(255) NOT NULL,
  `secondary_sponsor` varchar(255) DEFAULT NULL,
  `priest_name` varchar(255) NOT NULL,
  `book_number` int(11) NOT NULL,
  `page_number` int(11) NOT NULL,
  `line_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'

-- Data for table `baptismals`
INSERT INTO `baptismals` (`id`, `name`, `birth_date`, `baptism_date`, `fathers_name`, `mothers_name`, `church_name`, `sponsor`, `secondary_sponsor`, `priest_name`, `book_number`, `page_number`, `line_number`, `created_at`, `updated_at`) VALUES ('1', 'Inga Fuller', '1986-11-04', '2020-06-26', 'Nyssa Burch', 'Chancellor Baxter', 'Vladimir Coffey', 'Occaecat esse paria', 'Occaecat esse paria', 'Pascale Sexton', '386', '53', '986', '2025-11-04 22:41:30', '2025-11-04 22:41:30');


-- Table structure for table `barangays`
DROP TABLE IF EXISTS `barangays`;
CREATE TABLE `barangays` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL DEFAULT 'San Jose del Prado',
  `zip_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'



-- Table structure for table `burials`
DROP TABLE IF EXISTS `burials`;
CREATE TABLE `burials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date_of_death` date NOT NULL,
  `date_of_burial` date NOT NULL,
  `age` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `informant` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `presider` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'

-- Data for table `burials`
INSERT INTO `burials` (`id`, `name`, `date_of_death`, `date_of_burial`, `age`, `status`, `informant`, `place`, `presider`, `created_at`, `updated_at`) VALUES ('1', 'MacKensie Dunn', '2016-07-06', '2025-11-04', '81', 'Separated', 'Exercitationem modi', 'Saepe animi anim do', 'Sint rerum expedita', '2025-11-04 22:41:59', '2025-11-04 22:41:59');


-- Table structure for table `cache`
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'

-- Data for table `cache`
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('sjdpp-cache-boost.roster.scan', 'a:2:{s:6:\"roster\";O:21:\"Laravel\\Roster\\Roster\":3:{s:13:\"\0*\0approaches\";O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:11:\"\0*\0packages\";O:32:\"Laravel\\Roster\\PackageCollection\":2:{s:8:\"\0*\0items\";a:10:{i:0;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:5:\"^12.0\";s:10:\"\0*\0package\";E:37:\"Laravel\\Roster\\Enums\\Packages:LARAVEL\";s:14:\"\0*\0packageName\";s:17:\"laravel/framework\";s:10:\"\0*\0version\";s:7:\"12.32.5\";s:6:\"\0*\0dev\";b:0;}i:1;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:6:\"v0.3.7\";s:10:\"\0*\0package\";E:37:\"Laravel\\Roster\\Enums\\Packages:PROMPTS\";s:14:\"\0*\0packageName\";s:15:\"laravel/prompts\";s:10:\"\0*\0version\";s:5:\"0.3.7\";s:6:\"\0*\0dev\";b:0;}i:2;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:4:\"^2.3\";s:10:\"\0*\0package\";E:36:\"Laravel\\Roster\\Enums\\Packages:BREEZE\";s:14:\"\0*\0packageName\";s:14:\"laravel/breeze\";s:10:\"\0*\0version\";s:5:\"2.3.8\";s:6:\"\0*\0dev\";b:1;}i:3;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:6:\"v0.3.3\";s:10:\"\0*\0package\";E:33:\"Laravel\\Roster\\Enums\\Packages:MCP\";s:14:\"\0*\0packageName\";s:11:\"laravel/mcp\";s:10:\"\0*\0version\";s:5:\"0.3.3\";s:6:\"\0*\0dev\";b:1;}i:4;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:5:\"^1.24\";s:10:\"\0*\0package\";E:34:\"Laravel\\Roster\\Enums\\Packages:PINT\";s:14:\"\0*\0packageName\";s:12:\"laravel/pint\";s:10:\"\0*\0version\";s:6:\"1.25.1\";s:6:\"\0*\0dev\";b:1;}i:5;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:5:\"^1.41\";s:10:\"\0*\0package\";E:34:\"Laravel\\Roster\\Enums\\Packages:SAIL\";s:14:\"\0*\0packageName\";s:12:\"laravel/sail\";s:10:\"\0*\0version\";s:6:\"1.46.0\";s:6:\"\0*\0dev\";b:1;}i:6;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:4:\"^3.8\";s:10:\"\0*\0package\";E:34:\"Laravel\\Roster\\Enums\\Packages:PEST\";s:14:\"\0*\0packageName\";s:12:\"pestphp/pest\";s:10:\"\0*\0version\";s:5:\"3.8.4\";s:6:\"\0*\0dev\";b:1;}i:7;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:7:\"11.5.33\";s:10:\"\0*\0package\";E:37:\"Laravel\\Roster\\Enums\\Packages:PHPUNIT\";s:14:\"\0*\0packageName\";s:15:\"phpunit/phpunit\";s:10:\"\0*\0version\";s:7:\"11.5.33\";s:6:\"\0*\0dev\";b:1;}i:8;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:10:\"\0*\0package\";E:38:\"Laravel\\Roster\\Enums\\Packages:ALPINEJS\";s:14:\"\0*\0packageName\";s:8:\"alpinejs\";s:10:\"\0*\0version\";s:6:\"3.15.0\";s:6:\"\0*\0dev\";b:1;}i:9;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:10:\"\0*\0package\";E:41:\"Laravel\\Roster\\Enums\\Packages:TAILWINDCSS\";s:14:\"\0*\0packageName\";s:11:\"tailwindcss\";s:10:\"\0*\0version\";s:6:\"3.4.18\";s:6:\"\0*\0dev\";b:1;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:21:\"\0*\0nodePackageManager\";E:43:\"Laravel\\Roster\\Enums\\NodePackageManager:NPM\";}s:9:\"timestamp\";i:1763355043;}', '1763441443');


-- Table structure for table `cache_locks`
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'



-- Table structure for table `chapels`
DROP TABLE IF EXISTS `chapels`;
CREATE TABLE `chapels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `barangay_id` bigint(20) unsigned NOT NULL,
  `address` text NOT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `seating_capacity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chapels_barangay_id_foreign` (`barangay_id`),
  CONSTRAINT `chapels_barangay_id_foreign` FOREIGN KEY (`barangay_id`) REFERENCES `barangays` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'



-- Table structure for table `confirmations`
DROP TABLE IF EXISTS `confirmations`;
CREATE TABLE `confirmations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` year(4) NOT NULL,
  `date_of_confirmation` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `parish_of_baptism` varchar(255) NOT NULL,
  `province_of_baptism` varchar(255) NOT NULL,
  `place_of_baptism` varchar(255) NOT NULL,
  `parents` varchar(255) NOT NULL,
  `sponsor` varchar(255) NOT NULL,
  `name_of_minister` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'

-- Data for table `confirmations`
INSERT INTO `confirmations` (`id`, `year`, `date_of_confirmation`, `name`, `parish_of_baptism`, `province_of_baptism`, `place_of_baptism`, `parents`, `sponsor`, `name_of_minister`, `created_at`, `updated_at`) VALUES ('1', '1990', '2010-03-20', 'Sigourney Michael', 'Dicta vitae aliquip', 'Facere laboris asper', 'Laborum Et est eum', 'Similique facere id', 'Dolor nesciunt null', 'Bernard Nieves', '2025-11-04 22:42:13', '2025-11-04 22:42:13');


-- Table structure for table `failed_jobs`
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'



-- Table structure for table `first_communions`
DROP TABLE IF EXISTS `first_communions`;
CREATE TABLE `first_communions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `month` tinyint(3) unsigned NOT NULL,
  `day` tinyint(3) unsigned NOT NULL,
  `names` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`names`)),
  `parents` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`parents`)),
  `address` varchar(255) DEFAULT NULL,
  `minister` varchar(255) DEFAULT NULL,
  `baptismal_date` date DEFAULT NULL,
  `baptismal_place` varchar(255) DEFAULT NULL,
  `church_name` varchar(255) NOT NULL DEFAULT 'SJDPP Church',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'

-- Data for table `first_communions`
INSERT INTO `first_communions` (`id`, `year`, `month`, `day`, `names`, `parents`, `address`, `minister`, `baptismal_date`, `baptismal_place`, `church_name`, `created_at`, `updated_at`) VALUES ('1', '1995', '8', '6', '[\"Dacey Cooley\",\"Todd Velazquez\",\"Ulric Pugh\"]', '[\"Molestias dignissimo\",\"Officia libero Nam a\",\"Consequatur ad hic\"]', 'Veniam eum minima c', 'Dicta labore dolorib', '1975-10-20', 'Dolore fugit nihil', 'SJDPP Church', '2025-11-04 22:11:00', '2025-11-04 22:11:00');
INSERT INTO `first_communions` (`id`, `year`, `month`, `day`, `names`, `parents`, `address`, `minister`, `baptismal_date`, `baptismal_place`, `church_name`, `created_at`, `updated_at`) VALUES ('2', '1980', '5', '1', '[\"Ira Park\",\"Tatiana Sykes\"]', '[\"Dolor natus est labo\",\"Voluptas iusto dolor\",\"Mollitia culpa rati\"]', 'Enim qui et in nisi', 'Id labore et volupta', '2021-04-11', 'Voluptate proident', 'SJDPP Church', '2025-11-04 22:42:53', '2025-11-04 22:42:53');
INSERT INTO `first_communions` (`id`, `year`, `month`, `day`, `names`, `parents`, `address`, `minister`, `baptismal_date`, `baptismal_place`, `church_name`, `created_at`, `updated_at`) VALUES ('3', '2000', '1', '6', '[\"Hedwig Noble\",\"Illana Webster\",\"Leo Fuller\",\"Ferris Sloan\",\"Alice Salazar\",\"Kylynn Snow\",\"Roth Wyatt\",\"Melvin Haney\",\"Mohammad Warner\",\"Brandon Carney\",\"Hadley Turner\",\"Jolie Baxter\"]', '[\"Consequatur exercita\"]', 'In aut et quia quia', 'Veritatis ipsum in', '2009-09-02', 'Eveniet hic dolore', 'SJDPP Church', '2025-11-04 22:43:25', '2025-11-04 22:43:25');


-- Table structure for table `job_batches`
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'



-- Table structure for table `jobs`
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'



-- Table structure for table `migrations`
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'

-- Data for table `migrations`
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('1', '0001_01_01_000000_create_users_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('2', '0001_01_01_000001_create_cache_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('3', '0001_01_01_000002_create_jobs_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('4', '2025_10_04_033857_create_roles_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('5', '2025_10_04_034117_create_role_user', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('6', '2025_10_04_122311_create_baptismals_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('7', '2025_10_04_125252_create_burials_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('8', '2025_10_04_130241_create_confirmations_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('9', '2025_10_04_132323_create_weddings_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('10', '2025_10_04_133246_create_schedules_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('11', '2025_10_09_091059_create_barangays_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('12', '2025_10_09_091101_create_chapels_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('13', '2025_10_09_091105_create_schools_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('14', '2025_10_09_091342_add_new_schedule_types_to_schedules_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('15', '2025_10_09_091414_create_schedule_blessings_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('16', '2025_10_09_091418_create_schedule_masses_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('17', '2025_10_09_091430_create_schedule_barrio_masses_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('18', '2025_10_09_091431_create_schedule_school_masses_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('19', '2025_10_09_091607_add_new_schedule_fields_to_schedules_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('20', '2025_11_04_204258_create_first_communions_table', '1');


-- Table structure for table `password_reset_tokens`
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'



-- Table structure for table `role_user`
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_user_user_id_role_id_unique` (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'

-- Data for table `role_user`
INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES ('1', '1', '1', '2025-11-04 22:05:39', '2025-11-04 22:05:39');
INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES ('2', '2', '2', '2025-11-04 22:05:39', '2025-11-04 22:05:39');


-- Table structure for table `roles`
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'

-- Data for table `roles`
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES ('1', 'priest', '2025-11-04 22:05:38', '2025-11-04 22:05:38');
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES ('2', 'secretary', '2025-11-04 22:05:38', '2025-11-04 22:05:38');


-- Table structure for table `schedule_barrio_masses`
DROP TABLE IF EXISTS `schedule_barrio_masses`;
CREATE TABLE `schedule_barrio_masses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `schedule_id` bigint(20) unsigned NOT NULL,
  `mass_category` enum('sunday','weekday','holy_day','special_occasion','memorial','other') NOT NULL,
  `barangay_id` bigint(20) unsigned NOT NULL,
  `sitio_name` varchar(255) DEFAULT NULL,
  `chapel_id` bigint(20) unsigned DEFAULT NULL,
  `intention_summary` text DEFAULT NULL,
  `ministers_needed` int(11) NOT NULL DEFAULT 0,
  `choir_team` varchar(255) DEFAULT NULL,
  `barrio_coordinator` varchar(255) DEFAULT NULL,
  `generator_needed` tinyint(1) NOT NULL DEFAULT 0,
  `transport_needed` tinyint(1) NOT NULL DEFAULT 0,
  `readings_cycle` varchar(255) DEFAULT NULL,
  `liturgical_color` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `schedule_barrio_masses_schedule_id_foreign` (`schedule_id`),
  KEY `schedule_barrio_masses_barangay_id_foreign` (`barangay_id`),
  KEY `schedule_barrio_masses_chapel_id_foreign` (`chapel_id`),
  CONSTRAINT `schedule_barrio_masses_barangay_id_foreign` FOREIGN KEY (`barangay_id`) REFERENCES `barangays` (`id`),
  CONSTRAINT `schedule_barrio_masses_chapel_id_foreign` FOREIGN KEY (`chapel_id`) REFERENCES `chapels` (`id`),
  CONSTRAINT `schedule_barrio_masses_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'



-- Table structure for table `schedule_blessings`
DROP TABLE IF EXISTS `schedule_blessings`;
CREATE TABLE `schedule_blessings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `schedule_id` bigint(20) unsigned NOT NULL,
  `blessing_type` enum('house','store','office','vehicle','image','other') NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `barangay_id` bigint(20) unsigned DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `occupants_count` int(11) DEFAULT NULL,
  `items_prepared` text DEFAULT NULL,
  `access_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `schedule_blessings_schedule_id_foreign` (`schedule_id`),
  KEY `schedule_blessings_barangay_id_foreign` (`barangay_id`),
  CONSTRAINT `schedule_blessings_barangay_id_foreign` FOREIGN KEY (`barangay_id`) REFERENCES `barangays` (`id`),
  CONSTRAINT `schedule_blessings_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'



-- Table structure for table `schedule_masses`
DROP TABLE IF EXISTS `schedule_masses`;
CREATE TABLE `schedule_masses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `schedule_id` bigint(20) unsigned NOT NULL,
  `mass_category` enum('sunday','weekday','holy_day','special_occasion','memorial','other') NOT NULL,
  `chapel_id` bigint(20) unsigned DEFAULT NULL,
  `intention_summary` text DEFAULT NULL,
  `ministers_needed` int(11) NOT NULL DEFAULT 0,
  `choir_team` varchar(255) DEFAULT NULL,
  `recurrence` enum('none','weekly','monthly') NOT NULL DEFAULT 'none',
  `readings_cycle` varchar(255) DEFAULT NULL,
  `liturgical_color` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `schedule_masses_schedule_id_foreign` (`schedule_id`),
  KEY `schedule_masses_chapel_id_foreign` (`chapel_id`),
  CONSTRAINT `schedule_masses_chapel_id_foreign` FOREIGN KEY (`chapel_id`) REFERENCES `chapels` (`id`),
  CONSTRAINT `schedule_masses_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'



-- Table structure for table `schedule_school_masses`
DROP TABLE IF EXISTS `schedule_school_masses`;
CREATE TABLE `schedule_school_masses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `schedule_id` bigint(20) unsigned NOT NULL,
  `school_id` bigint(20) unsigned NOT NULL,
  `campus_or_venue` varchar(255) DEFAULT NULL,
  `grade_levels` varchar(255) DEFAULT NULL,
  `expected_students` int(11) DEFAULT NULL,
  `expected_faculty` int(11) DEFAULT NULL,
  `assembly_time` time DEFAULT NULL,
  `security_clearance_ref` varchar(255) DEFAULT NULL,
  `communion_policy` enum('allow','restrict','none') NOT NULL DEFAULT 'allow',
  `intention_summary` text DEFAULT NULL,
  `ministers_needed` int(11) NOT NULL DEFAULT 0,
  `readings_cycle` varchar(255) DEFAULT NULL,
  `liturgical_color` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `schedule_school_masses_schedule_id_foreign` (`schedule_id`),
  KEY `schedule_school_masses_school_id_foreign` (`school_id`),
  CONSTRAINT `schedule_school_masses_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE,
  CONSTRAINT `schedule_school_masses_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'



-- Table structure for table `schedules`
DROP TABLE IF EXISTS `schedules`;
CREATE TABLE `schedules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sacrament_type` enum('baptismal','burial','confirmation','wedding','blessing','parish_mass','barrio_mass','school_mass') NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `presider_name` varchar(255) DEFAULT NULL,
  `location_text` text DEFAULT NULL,
  `starts_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `expected_attendees` int(11) DEFAULT NULL,
  `coordinator_name` varchar(255) DEFAULT NULL,
  `coordinator_phone` varchar(255) DEFAULT NULL,
  `requires_vehicle` tinyint(1) NOT NULL DEFAULT 0,
  `sound_system_needed` tinyint(1) NOT NULL DEFAULT 0,
  `stipend_amount` decimal(10,2) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `schedule_date` date NOT NULL,
  `schedule_time` time NOT NULL,
  `notes` text DEFAULT NULL,
  `status` enum('pending','approved','declined','completed','cancelled') NOT NULL DEFAULT 'pending',
  `priest_notes` text DEFAULT NULL,
  `priest_reviewed_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `blessing_type` varchar(255) DEFAULT NULL,
  `owner_name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `barangay_name` varchar(255) DEFAULT NULL,
  `occupants_count` int(11) DEFAULT NULL,
  `items_prepared` text DEFAULT NULL,
  `access_notes` text DEFAULT NULL,
  `mass_category` varchar(255) DEFAULT NULL,
  `chapel_name` varchar(255) DEFAULT NULL,
  `intention_summary` text DEFAULT NULL,
  `ministers_needed` tinyint(1) NOT NULL DEFAULT 0,
  `choir_team` varchar(255) DEFAULT NULL,
  `recurrence` varchar(255) DEFAULT NULL,
  `sitio_name` varchar(255) DEFAULT NULL,
  `barrio_coordinator` varchar(255) DEFAULT NULL,
  `barrio_coordinator_phone` varchar(255) DEFAULT NULL,
  `generator_needed` tinyint(1) NOT NULL DEFAULT 0,
  `transport_needed` tinyint(1) NOT NULL DEFAULT 0,
  `school_name` varchar(255) DEFAULT NULL,
  `campus_or_venue` varchar(255) DEFAULT NULL,
  `grade_levels` varchar(255) DEFAULT NULL,
  `expected_students` int(11) DEFAULT NULL,
  `expected_faculty` int(11) DEFAULT NULL,
  `assembly_time` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `schedules_user_id_foreign` (`user_id`),
  CONSTRAINT `schedules_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'

-- Data for table `schedules`
INSERT INTO `schedules` (`id`, `sacrament_type`, `client_name`, `contact_number`, `email`, `presider_name`, `location_text`, `starts_at`, `ends_at`, `expected_attendees`, `coordinator_name`, `coordinator_phone`, `requires_vehicle`, `sound_system_needed`, `stipend_amount`, `remarks`, `schedule_date`, `schedule_time`, `notes`, `status`, `priest_notes`, `priest_reviewed_at`, `user_id`, `created_at`, `updated_at`, `blessing_type`, `owner_name`, `address`, `barangay_name`, `occupants_count`, `items_prepared`, `access_notes`, `mass_category`, `chapel_name`, `intention_summary`, `ministers_needed`, `choir_team`, `recurrence`, `sitio_name`, `barrio_coordinator`, `barrio_coordinator_phone`, `generator_needed`, `transport_needed`, `school_name`, `campus_or_venue`, `grade_levels`, `expected_students`, `expected_faculty`, `assembly_time`) VALUES ('1', 'parish_mass', 'Germane Roberson', '+1 (311) 931-2621', 'hufuzejaqu@mailinator.com', 'Georgia Wall', 'Dignissimos id sint', NULL, NULL, '24', NULL, NULL, '0', '0', '10.00', NULL, '2025-11-05', '04:08:00', 'Accusantium reiciend', 'approved', NULL, NULL, '2', '2025-11-04 22:41:13', '2025-11-04 22:41:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sunday', 'Hall Caldwell', NULL, '0', 'Eaque maxime asperna', 'monthly', NULL, NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL);


-- Table structure for table `schools`
DROP TABLE IF EXISTS `schools`;
CREATE TABLE `schools` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `barangay_id` bigint(20) unsigned NOT NULL,
  `address` text NOT NULL,
  `school_type` varchar(255) NOT NULL DEFAULT 'public',
  `contact_person` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `schools_barangay_id_foreign` (`barangay_id`),
  CONSTRAINT `schools_barangay_id_foreign` FOREIGN KEY (`barangay_id`) REFERENCES `barangays` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'



-- Table structure for table `sessions`
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'

-- Data for table `sessions`
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('XPm1J7Vi6LTm8NRqtoxsQCLpx1ZZoirMgpsyhS9E', '2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOVNLS3R3bkRMVmEwVGpyMEFaMVRGREF5UVVFWnkzd21ZeVM1V0lTYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODA4Mi9zZWNyZXRhcnkvYmFwdGlzbWFsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', '1763356025');


-- Table structure for table `users`
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'

-- Data for table `users`
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES ('1', 'Priest', 'priest@mail.com', NULL, '$2y$12$8TCEs8xMIXTc9r.bpkjAeuEQJehmdEk8bEDor2fXQxlh1QVlt0prC', NULL, '2025-11-04 22:05:39', '2025-11-04 22:05:39');
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES ('2', 'Secretary', 'secretary@mail.com', NULL, '$2y$12$XDEi92vKGWmq/TzqcwA5m.eA7VYDrKd5Sa1ceacEo8v.AGHFW/H..', NULL, '2025-11-04 22:05:39', '2025-11-04 22:05:39');


-- Table structure for table `weddings`
DROP TABLE IF EXISTS `weddings`;
CREATE TABLE `weddings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` year(4) NOT NULL,
  `date_of_marriage` date NOT NULL,
  `husband_name` varchar(255) NOT NULL,
  `wife_name` varchar(255) NOT NULL,
  `husband_status` varchar(255) NOT NULL,
  `wife_status` varchar(255) NOT NULL,
  `husband_age` int(11) NOT NULL,
  `wife_age` int(11) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `husband_parents` varchar(255) NOT NULL,
  `wife_parents` varchar(255) NOT NULL,
  `sponsor1` varchar(255) NOT NULL,
  `sponsor2` varchar(255) NOT NULL,
  `place_of_sponsor` varchar(255) NOT NULL,
  `presider` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'

-- Data for table `weddings`
INSERT INTO `weddings` (`id`, `year`, `date_of_marriage`, `husband_name`, `wife_name`, `husband_status`, `wife_status`, `husband_age`, `wife_age`, `municipality`, `barangay`, `husband_parents`, `wife_parents`, `sponsor1`, `sponsor2`, `place_of_sponsor`, `presider`, `created_at`, `updated_at`) VALUES ('1', '1972', '1976-06-22', 'Ivan Snow', 'Wade Holt', 'Et est ex voluptate', 'Alias veniam et qui', '137', '107', 'Numquam qui blanditi', 'Deserunt itaque dolo', 'Molestiae sunt in en', 'Quibusdam iure minim', 'Et voluptatem quaera', 'Cum corrupti id max', 'Anim aliquam sit ad', 'Exercitation culpa s', '2025-11-04 22:42:27', '2025-11-04 22:42:27');
