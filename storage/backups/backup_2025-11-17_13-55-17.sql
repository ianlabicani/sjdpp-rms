-- Database Backup
-- Generated at 2025-11-17 13:55:17
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data for table `burials`
INSERT INTO `burials` (`id`, `name`, `date_of_death`, `date_of_burial`, `age`, `status`, `informant`, `place`, `presider`, `created_at`, `updated_at`) VALUES ('1', 'MacKensie Dunn', '2016-07-06', '2025-11-04', '81', 'Separated', 'Exercitationem modi', 'Saepe animi anim do', 'Sint rerum expedita', '2025-11-04 22:41:59', '2025-11-04 22:41:59');


-- Table structure for table `cache`
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data for table `cache`
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('sjdpp-cache-boost:mcp:database-schema:mysql:', 'a:3:{s:6:\"engine\";s:5:\"mysql\";s:6:\"tables\";a:72:{s:9:\"buildings\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:5:\"cache\";a:5:{s:7:\"columns\";a:3:{s:3:\"key\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:5:\"value\";a:1:{s:4:\"type\";s:10:\"mediumtext\";}s:10:\"expiration\";a:1:{s:4:\"type\";s:3:\"int\";}}s:7:\"indexes\";a:1:{s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:3:\"key\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:11:\"cache_locks\";a:5:{s:7:\"columns\";a:3:{s:3:\"key\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:5:\"owner\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:10:\"expiration\";a:1:{s:4:\"type\";s:3:\"int\";}}s:7:\"indexes\";a:1:{s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:3:\"key\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:8:\"campuses\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:11:\"failed_jobs\";a:5:{s:7:\"columns\";a:7:{s:2:\"id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:4:\"uuid\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:10:\"connection\";a:1:{s:4:\"type\";s:4:\"text\";}s:5:\"queue\";a:1:{s:4:\"type\";s:4:\"text\";}s:7:\"payload\";a:1:{s:4:\"type\";s:8:\"longtext\";}s:9:\"exception\";a:1:{s:4:\"type\";s:8:\"longtext\";}s:9:\"failed_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}}s:7:\"indexes\";a:2:{s:23:\"failed_jobs_uuid_unique\";a:4:{s:7:\"columns\";a:1:{i:0;s:4:\"uuid\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:0;}s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:2:\"id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:5:\"items\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:4:\"jobs\";a:5:{s:7:\"columns\";a:7:{s:2:\"id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:5:\"queue\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:7:\"payload\";a:1:{s:4:\"type\";s:8:\"longtext\";}s:8:\"attempts\";a:1:{s:4:\"type\";s:7:\"tinyint\";}s:11:\"reserved_at\";a:1:{s:4:\"type\";s:3:\"int\";}s:12:\"available_at\";a:1:{s:4:\"type\";s:3:\"int\";}s:10:\"created_at\";a:1:{s:4:\"type\";s:3:\"int\";}}s:7:\"indexes\";a:2:{s:16:\"jobs_queue_index\";a:4:{s:7:\"columns\";a:1:{i:0;s:5:\"queue\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:0;s:10:\"is_primary\";b:0;}s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:2:\"id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:11:\"job_batches\";a:5:{s:7:\"columns\";a:10:{s:2:\"id\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:4:\"name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:10:\"total_jobs\";a:1:{s:4:\"type\";s:3:\"int\";}s:12:\"pending_jobs\";a:1:{s:4:\"type\";s:3:\"int\";}s:11:\"failed_jobs\";a:1:{s:4:\"type\";s:3:\"int\";}s:14:\"failed_job_ids\";a:1:{s:4:\"type\";s:8:\"longtext\";}s:7:\"options\";a:1:{s:4:\"type\";s:10:\"mediumtext\";}s:12:\"cancelled_at\";a:1:{s:4:\"type\";s:3:\"int\";}s:10:\"created_at\";a:1:{s:4:\"type\";s:3:\"int\";}s:11:\"finished_at\";a:1:{s:4:\"type\";s:3:\"int\";}}s:7:\"indexes\";a:1:{s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:2:\"id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:10:\"migrations\";a:5:{s:7:\"columns\";a:3:{s:2:\"id\";a:1:{s:4:\"type\";s:3:\"int\";}s:9:\"migration\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:5:\"batch\";a:1:{s:4:\"type\";s:3:\"int\";}}s:7:\"indexes\";a:1:{s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:2:\"id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:21:\"password_reset_tokens\";a:5:{s:7:\"columns\";a:3:{s:5:\"email\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:5:\"token\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:10:\"created_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}}s:7:\"indexes\";a:1:{s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:5:\"email\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:5:\"roles\";a:5:{s:7:\"columns\";a:4:{s:2:\"id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:4:\"name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:10:\"created_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}s:10:\"updated_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}}s:7:\"indexes\";a:2:{s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:2:\"id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}s:17:\"roles_name_unique\";a:4:{s:7:\"columns\";a:1:{i:0;s:4:\"name\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:0;}}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:9:\"role_user\";a:5:{s:7:\"columns\";a:5:{s:2:\"id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:7:\"user_id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:7:\"role_id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:10:\"created_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}s:10:\"updated_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}}s:7:\"indexes\";a:3:{s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:2:\"id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}s:25:\"role_user_role_id_foreign\";a:4:{s:7:\"columns\";a:1:{i:0;s:7:\"role_id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:0;s:10:\"is_primary\";b:0;}s:32:\"role_user_user_id_role_id_unique\";a:4:{s:7:\"columns\";a:2:{i:0;s:7:\"user_id\";i:1;s:7:\"role_id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:0;}}s:12:\"foreign_keys\";a:2:{i:0;a:7:{s:4:\"name\";s:25:\"role_user_role_id_foreign\";s:7:\"columns\";a:1:{i:0;s:7:\"role_id\";}s:14:\"foreign_schema\";s:12:\"sjdpp_rms_db\";s:13:\"foreign_table\";s:5:\"roles\";s:15:\"foreign_columns\";a:1:{i:0;s:2:\"id\";}s:9:\"on_update\";s:8:\"restrict\";s:9:\"on_delete\";s:7:\"cascade\";}i:1;a:7:{s:4:\"name\";s:25:\"role_user_user_id_foreign\";s:7:\"columns\";a:1:{i:0;s:7:\"user_id\";}s:14:\"foreign_schema\";s:12:\"sjdpp_rms_db\";s:13:\"foreign_table\";s:5:\"users\";s:15:\"foreign_columns\";a:1:{i:0;s:2:\"id\";}s:9:\"on_update\";s:8:\"restrict\";s:9:\"on_delete\";s:7:\"cascade\";}}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:5:\"rooms\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:8:\"sessions\";a:5:{s:7:\"columns\";a:6:{s:2:\"id\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:7:\"user_id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:10:\"ip_address\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:10:\"user_agent\";a:1:{s:4:\"type\";s:4:\"text\";}s:7:\"payload\";a:1:{s:4:\"type\";s:8:\"longtext\";}s:13:\"last_activity\";a:1:{s:4:\"type\";s:3:\"int\";}}s:7:\"indexes\";a:3:{s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:2:\"id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}s:28:\"sessions_last_activity_index\";a:4:{s:7:\"columns\";a:1:{i:0;s:13:\"last_activity\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:0;s:10:\"is_primary\";b:0;}s:22:\"sessions_user_id_index\";a:4:{s:7:\"columns\";a:1:{i:0;s:7:\"user_id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:0;s:10:\"is_primary\";b:0;}}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:5:\"users\";a:5:{s:7:\"columns\";a:8:{s:2:\"id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:4:\"name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:5:\"email\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:17:\"email_verified_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}s:8:\"password\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:14:\"remember_token\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:10:\"created_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}s:10:\"updated_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}}s:7:\"indexes\";a:2:{s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:2:\"id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}s:18:\"users_email_unique\";a:4:{s:7:\"columns\";a:1:{i:0;s:5:\"email\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:0;}}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:17:\"baptismal_records\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:14:\"burial_records\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:20:\"confirmation_records\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:6:\"events\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:9:\"feedbacks\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:22:\"personal_access_tokens\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:9:\"schedules\";a:5:{s:7:\"columns\";a:49:{s:2:\"id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:14:\"sacrament_type\";a:1:{s:4:\"type\";s:4:\"enum\";}s:11:\"client_name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:14:\"contact_number\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:5:\"email\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:13:\"presider_name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:13:\"location_text\";a:1:{s:4:\"type\";s:4:\"text\";}s:9:\"starts_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}s:7:\"ends_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}s:18:\"expected_attendees\";a:1:{s:4:\"type\";s:3:\"int\";}s:16:\"coordinator_name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:17:\"coordinator_phone\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:16:\"requires_vehicle\";a:1:{s:4:\"type\";s:7:\"tinyint\";}s:19:\"sound_system_needed\";a:1:{s:4:\"type\";s:7:\"tinyint\";}s:14:\"stipend_amount\";a:1:{s:4:\"type\";s:7:\"decimal\";}s:7:\"remarks\";a:1:{s:4:\"type\";s:4:\"text\";}s:13:\"schedule_date\";a:1:{s:4:\"type\";s:4:\"date\";}s:13:\"schedule_time\";a:1:{s:4:\"type\";s:4:\"time\";}s:5:\"notes\";a:1:{s:4:\"type\";s:4:\"text\";}s:6:\"status\";a:1:{s:4:\"type\";s:4:\"enum\";}s:12:\"priest_notes\";a:1:{s:4:\"type\";s:4:\"text\";}s:18:\"priest_reviewed_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}s:7:\"user_id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:10:\"created_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}s:10:\"updated_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}s:13:\"blessing_type\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:10:\"owner_name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:7:\"address\";a:1:{s:4:\"type\";s:4:\"text\";}s:13:\"barangay_name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:15:\"occupants_count\";a:1:{s:4:\"type\";s:3:\"int\";}s:14:\"items_prepared\";a:1:{s:4:\"type\";s:4:\"text\";}s:12:\"access_notes\";a:1:{s:4:\"type\";s:4:\"text\";}s:13:\"mass_category\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:11:\"chapel_name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:17:\"intention_summary\";a:1:{s:4:\"type\";s:4:\"text\";}s:16:\"ministers_needed\";a:1:{s:4:\"type\";s:7:\"tinyint\";}s:10:\"choir_team\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:10:\"recurrence\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:10:\"sitio_name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:18:\"barrio_coordinator\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:24:\"barrio_coordinator_phone\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:16:\"generator_needed\";a:1:{s:4:\"type\";s:7:\"tinyint\";}s:16:\"transport_needed\";a:1:{s:4:\"type\";s:7:\"tinyint\";}s:11:\"school_name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:15:\"campus_or_venue\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:12:\"grade_levels\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:17:\"expected_students\";a:1:{s:4:\"type\";s:3:\"int\";}s:16:\"expected_faculty\";a:1:{s:4:\"type\";s:3:\"int\";}s:13:\"assembly_time\";a:1:{s:4:\"type\";s:4:\"time\";}}s:7:\"indexes\";a:2:{s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:2:\"id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}s:25:\"schedules_user_id_foreign\";a:4:{s:7:\"columns\";a:1:{i:0;s:7:\"user_id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:0;s:10:\"is_primary\";b:0;}}s:12:\"foreign_keys\";a:1:{i:0;a:7:{s:4:\"name\";s:25:\"schedules_user_id_foreign\";s:7:\"columns\";a:1:{i:0;s:7:\"user_id\";}s:14:\"foreign_schema\";s:12:\"sjdpp_rms_db\";s:13:\"foreign_table\";s:5:\"users\";s:15:\"foreign_columns\";a:1:{i:0;s:2:\"id\";}s:9:\"on_update\";s:8:\"restrict\";s:9:\"on_delete\";s:8:\"set null\";}}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:15:\"wedding_records\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:5:\"exams\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:18:\"exam_activity_logs\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:10:\"exam_items\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:12:\"exam_teacher\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:11:\"taken_exams\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:18:\"taken_exam_answers\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:13:\"pma__bookmark\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:20:\"pma__central_columns\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:16:\"pma__column_info\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:22:\"pma__designer_settings\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:21:\"pma__export_templates\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:13:\"pma__favorite\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:12:\"pma__history\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:21:\"pma__navigationhiding\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:14:\"pma__pdf_pages\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:11:\"pma__recent\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:13:\"pma__relation\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:18:\"pma__savedsearches\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:17:\"pma__table_coords\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:15:\"pma__table_info\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:18:\"pma__table_uiprefs\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:13:\"pma__tracking\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:15:\"pma__userconfig\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:15:\"pma__usergroups\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:10:\"pma__users\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:15:\"archived_youths\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:6:\"youths\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:10:\"baptismals\";a:5:{s:7:\"columns\";a:15:{s:2:\"id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:4:\"name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:10:\"birth_date\";a:1:{s:4:\"type\";s:4:\"date\";}s:12:\"baptism_date\";a:1:{s:4:\"type\";s:4:\"date\";}s:12:\"fathers_name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:12:\"mothers_name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:11:\"church_name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:7:\"sponsor\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:17:\"secondary_sponsor\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:11:\"priest_name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:11:\"book_number\";a:1:{s:4:\"type\";s:3:\"int\";}s:11:\"page_number\";a:1:{s:4:\"type\";s:3:\"int\";}s:11:\"line_number\";a:1:{s:4:\"type\";s:3:\"int\";}s:10:\"created_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}s:10:\"updated_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}}s:7:\"indexes\";a:1:{s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:2:\"id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:9:\"barangays\";a:5:{s:7:\"columns\";a:6:{s:2:\"id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:4:\"name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:12:\"municipality\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:8:\"zip_code\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:10:\"created_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}s:10:\"updated_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}}s:7:\"indexes\";a:1:{s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:2:\"id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:7:\"burials\";a:5:{s:7:\"columns\";a:11:{s:2:\"id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:4:\"name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:13:\"date_of_death\";a:1:{s:4:\"type\";s:4:\"date\";}s:14:\"date_of_burial\";a:1:{s:4:\"type\";s:4:\"date\";}s:3:\"age\";a:1:{s:4:\"type\";s:3:\"int\";}s:6:\"status\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:9:\"informant\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:5:\"place\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:8:\"presider\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:10:\"created_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}s:10:\"updated_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}}s:7:\"indexes\";a:1:{s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:2:\"id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:7:\"chapels\";a:5:{s:7:\"columns\";a:9:{s:2:\"id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:4:\"name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:11:\"barangay_id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:7:\"address\";a:1:{s:4:\"type\";s:4:\"text\";}s:14:\"contact_person\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:13:\"contact_phone\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:16:\"seating_capacity\";a:1:{s:4:\"type\";s:3:\"int\";}s:10:\"created_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}s:10:\"updated_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}}s:7:\"indexes\";a:2:{s:27:\"chapels_barangay_id_foreign\";a:4:{s:7:\"columns\";a:1:{i:0;s:11:\"barangay_id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:0;s:10:\"is_primary\";b:0;}s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:2:\"id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}}s:12:\"foreign_keys\";a:1:{i:0;a:7:{s:4:\"name\";s:27:\"chapels_barangay_id_foreign\";s:7:\"columns\";a:1:{i:0;s:11:\"barangay_id\";}s:14:\"foreign_schema\";s:12:\"sjdpp_rms_db\";s:13:\"foreign_table\";s:9:\"barangays\";s:15:\"foreign_columns\";a:1:{i:0;s:2:\"id\";}s:9:\"on_update\";s:8:\"restrict\";s:9:\"on_delete\";s:7:\"cascade\";}}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:13:\"confirmations\";a:5:{s:7:\"columns\";a:12:{s:2:\"id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:4:\"year\";a:1:{s:4:\"type\";s:4:\"year\";}s:20:\"date_of_confirmation\";a:1:{s:4:\"type\";s:4:\"date\";}s:4:\"name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:17:\"parish_of_baptism\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:19:\"province_of_baptism\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:16:\"place_of_baptism\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:7:\"parents\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:7:\"sponsor\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:16:\"name_of_minister\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:10:\"created_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}s:10:\"updated_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}}s:7:\"indexes\";a:1:{s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:2:\"id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:16:\"first_communions\";a:5:{s:7:\"columns\";a:13:{s:2:\"id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:4:\"year\";a:1:{s:4:\"type\";s:3:\"int\";}s:5:\"month\";a:1:{s:4:\"type\";s:7:\"tinyint\";}s:3:\"day\";a:1:{s:4:\"type\";s:7:\"tinyint\";}s:5:\"names\";a:1:{s:4:\"type\";s:8:\"longtext\";}s:7:\"parents\";a:1:{s:4:\"type\";s:8:\"longtext\";}s:7:\"address\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:8:\"minister\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:14:\"baptismal_date\";a:1:{s:4:\"type\";s:4:\"date\";}s:15:\"baptismal_place\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:11:\"church_name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:10:\"created_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}s:10:\"updated_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}}s:7:\"indexes\";a:1:{s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:2:\"id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:2:{i:0;O:8:\"stdClass\":2:{s:15:\"CONSTRAINT_NAME\";s:5:\"names\";s:12:\"CHECK_CLAUSE\";s:19:\"json_valid(`names`)\";}i:1;O:8:\"stdClass\":2:{s:15:\"CONSTRAINT_NAME\";s:7:\"parents\";s:12:\"CHECK_CLAUSE\";s:21:\"json_valid(`parents`)\";}}}s:22:\"schedule_barrio_masses\";a:5:{s:7:\"columns\";a:16:{s:2:\"id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:11:\"schedule_id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:13:\"mass_category\";a:1:{s:4:\"type\";s:4:\"enum\";}s:11:\"barangay_id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:10:\"sitio_name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:9:\"chapel_id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:17:\"intention_summary\";a:1:{s:4:\"type\";s:4:\"text\";}s:16:\"ministers_needed\";a:1:{s:4:\"type\";s:3:\"int\";}s:10:\"choir_team\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:18:\"barrio_coordinator\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:16:\"generator_needed\";a:1:{s:4:\"type\";s:7:\"tinyint\";}s:16:\"transport_needed\";a:1:{s:4:\"type\";s:7:\"tinyint\";}s:14:\"readings_cycle\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:16:\"liturgical_color\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:10:\"created_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}s:10:\"updated_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}}s:7:\"indexes\";a:4:{s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:2:\"id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}s:42:\"schedule_barrio_masses_barangay_id_foreign\";a:4:{s:7:\"columns\";a:1:{i:0;s:11:\"barangay_id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:0;s:10:\"is_primary\";b:0;}s:40:\"schedule_barrio_masses_chapel_id_foreign\";a:4:{s:7:\"columns\";a:1:{i:0;s:9:\"chapel_id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:0;s:10:\"is_primary\";b:0;}s:42:\"schedule_barrio_masses_schedule_id_foreign\";a:4:{s:7:\"columns\";a:1:{i:0;s:11:\"schedule_id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:0;s:10:\"is_primary\";b:0;}}s:12:\"foreign_keys\";a:3:{i:0;a:7:{s:4:\"name\";s:42:\"schedule_barrio_masses_barangay_id_foreign\";s:7:\"columns\";a:1:{i:0;s:11:\"barangay_id\";}s:14:\"foreign_schema\";s:12:\"sjdpp_rms_db\";s:13:\"foreign_table\";s:9:\"barangays\";s:15:\"foreign_columns\";a:1:{i:0;s:2:\"id\";}s:9:\"on_update\";s:8:\"restrict\";s:9:\"on_delete\";s:8:\"restrict\";}i:1;a:7:{s:4:\"name\";s:40:\"schedule_barrio_masses_chapel_id_foreign\";s:7:\"columns\";a:1:{i:0;s:9:\"chapel_id\";}s:14:\"foreign_schema\";s:12:\"sjdpp_rms_db\";s:13:\"foreign_table\";s:7:\"chapels\";s:15:\"foreign_columns\";a:1:{i:0;s:2:\"id\";}s:9:\"on_update\";s:8:\"restrict\";s:9:\"on_delete\";s:8:\"restrict\";}i:2;a:7:{s:4:\"name\";s:42:\"schedule_barrio_masses_schedule_id_foreign\";s:7:\"columns\";a:1:{i:0;s:11:\"schedule_id\";}s:14:\"foreign_schema\";s:12:\"sjdpp_rms_db\";s:13:\"foreign_table\";s:9:\"schedules\";s:15:\"foreign_columns\";a:1:{i:0;s:2:\"id\";}s:9:\"on_update\";s:8:\"restrict\";s:9:\"on_delete\";s:7:\"cascade\";}}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:18:\"schedule_blessings\";a:5:{s:7:\"columns\";a:14:{s:2:\"id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:11:\"schedule_id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:13:\"blessing_type\";a:1:{s:4:\"type\";s:4:\"enum\";}s:10:\"owner_name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:7:\"address\";a:1:{s:4:\"type\";s:4:\"text\";}s:11:\"barangay_id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:4:\"city\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:8:\"province\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:8:\"zip_code\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:15:\"occupants_count\";a:1:{s:4:\"type\";s:3:\"int\";}s:14:\"items_prepared\";a:1:{s:4:\"type\";s:4:\"text\";}s:12:\"access_notes\";a:1:{s:4:\"type\";s:4:\"text\";}s:10:\"created_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}s:10:\"updated_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}}s:7:\"indexes\";a:3:{s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:2:\"id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}s:38:\"schedule_blessings_barangay_id_foreign\";a:4:{s:7:\"columns\";a:1:{i:0;s:11:\"barangay_id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:0;s:10:\"is_primary\";b:0;}s:38:\"schedule_blessings_schedule_id_foreign\";a:4:{s:7:\"columns\";a:1:{i:0;s:11:\"schedule_id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:0;s:10:\"is_primary\";b:0;}}s:12:\"foreign_keys\";a:2:{i:0;a:7:{s:4:\"name\";s:38:\"schedule_blessings_barangay_id_foreign\";s:7:\"columns\";a:1:{i:0;s:11:\"barangay_id\";}s:14:\"foreign_schema\";s:12:\"sjdpp_rms_db\";s:13:\"foreign_table\";s:9:\"barangays\";s:15:\"foreign_columns\";a:1:{i:0;s:2:\"id\";}s:9:\"on_update\";s:8:\"restrict\";s:9:\"on_delete\";s:8:\"restrict\";}i:1;a:7:{s:4:\"name\";s:38:\"schedule_blessings_schedule_id_foreign\";s:7:\"columns\";a:1:{i:0;s:11:\"schedule_id\";}s:14:\"foreign_schema\";s:12:\"sjdpp_rms_db\";s:13:\"foreign_table\";s:9:\"schedules\";s:15:\"foreign_columns\";a:1:{i:0;s:2:\"id\";}s:9:\"on_update\";s:8:\"restrict\";s:9:\"on_delete\";s:7:\"cascade\";}}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:15:\"schedule_masses\";a:5:{s:7:\"columns\";a:12:{s:2:\"id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:11:\"schedule_id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:13:\"mass_category\";a:1:{s:4:\"type\";s:4:\"enum\";}s:9:\"chapel_id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:17:\"intention_summary\";a:1:{s:4:\"type\";s:4:\"text\";}s:16:\"ministers_needed\";a:1:{s:4:\"type\";s:3:\"int\";}s:10:\"choir_team\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:10:\"recurrence\";a:1:{s:4:\"type\";s:4:\"enum\";}s:14:\"readings_cycle\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:16:\"liturgical_color\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:10:\"created_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}s:10:\"updated_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}}s:7:\"indexes\";a:3:{s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:2:\"id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}s:33:\"schedule_masses_chapel_id_foreign\";a:4:{s:7:\"columns\";a:1:{i:0;s:9:\"chapel_id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:0;s:10:\"is_primary\";b:0;}s:35:\"schedule_masses_schedule_id_foreign\";a:4:{s:7:\"columns\";a:1:{i:0;s:11:\"schedule_id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:0;s:10:\"is_primary\";b:0;}}s:12:\"foreign_keys\";a:2:{i:0;a:7:{s:4:\"name\";s:33:\"schedule_masses_chapel_id_foreign\";s:7:\"columns\";a:1:{i:0;s:9:\"chapel_id\";}s:14:\"foreign_schema\";s:12:\"sjdpp_rms_db\";s:13:\"foreign_table\";s:7:\"chapels\";s:15:\"foreign_columns\";a:1:{i:0;s:2:\"id\";}s:9:\"on_update\";s:8:\"restrict\";s:9:\"on_delete\";s:8:\"restrict\";}i:1;a:7:{s:4:\"name\";s:35:\"schedule_masses_schedule_id_foreign\";s:7:\"columns\";a:1:{i:0;s:11:\"schedule_id\";}s:14:\"foreign_schema\";s:12:\"sjdpp_rms_db\";s:13:\"foreign_table\";s:9:\"schedules\";s:15:\"foreign_columns\";a:1:{i:0;s:2:\"id\";}s:9:\"on_update\";s:8:\"restrict\";s:9:\"on_delete\";s:7:\"cascade\";}}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:22:\"schedule_school_masses\";a:5:{s:7:\"columns\";a:16:{s:2:\"id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:11:\"schedule_id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:9:\"school_id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:15:\"campus_or_venue\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:12:\"grade_levels\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:17:\"expected_students\";a:1:{s:4:\"type\";s:3:\"int\";}s:16:\"expected_faculty\";a:1:{s:4:\"type\";s:3:\"int\";}s:13:\"assembly_time\";a:1:{s:4:\"type\";s:4:\"time\";}s:22:\"security_clearance_ref\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:16:\"communion_policy\";a:1:{s:4:\"type\";s:4:\"enum\";}s:17:\"intention_summary\";a:1:{s:4:\"type\";s:4:\"text\";}s:16:\"ministers_needed\";a:1:{s:4:\"type\";s:3:\"int\";}s:14:\"readings_cycle\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:16:\"liturgical_color\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:10:\"created_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}s:10:\"updated_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}}s:7:\"indexes\";a:3:{s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:2:\"id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}s:42:\"schedule_school_masses_schedule_id_foreign\";a:4:{s:7:\"columns\";a:1:{i:0;s:11:\"schedule_id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:0;s:10:\"is_primary\";b:0;}s:40:\"schedule_school_masses_school_id_foreign\";a:4:{s:7:\"columns\";a:1:{i:0;s:9:\"school_id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:0;s:10:\"is_primary\";b:0;}}s:12:\"foreign_keys\";a:2:{i:0;a:7:{s:4:\"name\";s:42:\"schedule_school_masses_schedule_id_foreign\";s:7:\"columns\";a:1:{i:0;s:11:\"schedule_id\";}s:14:\"foreign_schema\";s:12:\"sjdpp_rms_db\";s:13:\"foreign_table\";s:9:\"schedules\";s:15:\"foreign_columns\";a:1:{i:0;s:2:\"id\";}s:9:\"on_update\";s:8:\"restrict\";s:9:\"on_delete\";s:7:\"cascade\";}i:1;a:7:{s:4:\"name\";s:40:\"schedule_school_masses_school_id_foreign\";s:7:\"columns\";a:1:{i:0;s:9:\"school_id\";}s:14:\"foreign_schema\";s:12:\"sjdpp_rms_db\";s:13:\"foreign_table\";s:7:\"schools\";s:15:\"foreign_columns\";a:1:{i:0;s:2:\"id\";}s:9:\"on_update\";s:8:\"restrict\";s:9:\"on_delete\";s:8:\"restrict\";}}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:7:\"schools\";a:5:{s:7:\"columns\";a:10:{s:2:\"id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:4:\"name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:11:\"barangay_id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:7:\"address\";a:1:{s:4:\"type\";s:4:\"text\";}s:11:\"school_type\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:14:\"contact_person\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:13:\"contact_phone\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:5:\"email\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:10:\"created_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}s:10:\"updated_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}}s:7:\"indexes\";a:2:{s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:2:\"id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}s:27:\"schools_barangay_id_foreign\";a:4:{s:7:\"columns\";a:1:{i:0;s:11:\"barangay_id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:0;s:10:\"is_primary\";b:0;}}s:12:\"foreign_keys\";a:1:{i:0;a:7:{s:4:\"name\";s:27:\"schools_barangay_id_foreign\";s:7:\"columns\";a:1:{i:0;s:11:\"barangay_id\";}s:14:\"foreign_schema\";s:12:\"sjdpp_rms_db\";s:13:\"foreign_table\";s:9:\"barangays\";s:15:\"foreign_columns\";a:1:{i:0;s:2:\"id\";}s:9:\"on_update\";s:8:\"restrict\";s:9:\"on_delete\";s:7:\"cascade\";}}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:8:\"weddings\";a:5:{s:7:\"columns\";a:19:{s:2:\"id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:4:\"year\";a:1:{s:4:\"type\";s:4:\"year\";}s:16:\"date_of_marriage\";a:1:{s:4:\"type\";s:4:\"date\";}s:12:\"husband_name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:9:\"wife_name\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:14:\"husband_status\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:11:\"wife_status\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:11:\"husband_age\";a:1:{s:4:\"type\";s:3:\"int\";}s:8:\"wife_age\";a:1:{s:4:\"type\";s:3:\"int\";}s:12:\"municipality\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:8:\"barangay\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:15:\"husband_parents\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:12:\"wife_parents\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:8:\"sponsor1\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:8:\"sponsor2\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:16:\"place_of_sponsor\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:8:\"presider\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:10:\"created_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}s:10:\"updated_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}}s:7:\"indexes\";a:1:{s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:2:\"id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:12:\"applications\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:21:\"application_documents\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:11:\"inspections\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:13:\"notifications\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:8:\"payments\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:8:\"profiles\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:15:\"barangay_events\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:13:\"barangay_user\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:13:\"organizations\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}s:11:\"sk_councils\";a:5:{s:7:\"columns\";a:0:{}s:7:\"indexes\";a:0:{}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}}s:6:\"global\";a:4:{s:5:\"views\";a:0:{}s:17:\"stored_procedures\";a:0:{}s:9:\"functions\";a:0:{}s:9:\"sequences\";a:0:{}}}', '1763358117');


-- Table structure for table `cache_locks`
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



-- Table structure for table `migrations`
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data for table `sessions`
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('XPm1J7Vi6LTm8NRqtoxsQCLpx1ZZoirMgpsyhS9E', '2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOVNLS3R3bkRMVmEwVGpyMEFaMVRGREF5UVVFWnkzd21ZeVM1V0lTYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODA4Mi9zZWNyZXRhcnkvYmFja3VwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', '1763358844');


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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data for table `weddings`
INSERT INTO `weddings` (`id`, `year`, `date_of_marriage`, `husband_name`, `wife_name`, `husband_status`, `wife_status`, `husband_age`, `wife_age`, `municipality`, `barangay`, `husband_parents`, `wife_parents`, `sponsor1`, `sponsor2`, `place_of_sponsor`, `presider`, `created_at`, `updated_at`) VALUES ('1', '1972', '1976-06-22', 'Ivan Snow', 'Wade Holt', 'Et est ex voluptate', 'Alias veniam et qui', '137', '107', 'Numquam qui blanditi', 'Deserunt itaque dolo', 'Molestiae sunt in en', 'Quibusdam iure minim', 'Et voluptatem quaera', 'Cum corrupti id max', 'Anim aliquam sit ad', 'Exercitation culpa s', '2025-11-04 22:42:27', '2025-11-04 22:42:27');
