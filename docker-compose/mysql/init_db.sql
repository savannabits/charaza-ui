-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: loan
-- ------------------------------------------------------
-- Server version	5.7.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bills` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bill_date` date DEFAULT NULL,
  `loan_id` bigint(20) unsigned NOT NULL,
  `amount_bf` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `interest` double NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bills_bill_date_loan_id_unique` (`bill_date`,`loan_id`),
  KEY `bills_loan_id_foreign` (`loan_id`),
  CONSTRAINT `bills_loan_id_foreign` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bills`
--

LOCK TABLES `bills` WRITE;
/*!40000 ALTER TABLE `bills` DISABLE KEYS */;
/*!40000 ALTER TABLE `bills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_income` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clients_user_id_foreign` (`user_id`),
  CONSTRAINT `clients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compounding_periods`
--

DROP TABLE IF EXISTS `compounding_periods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compounding_periods` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_unit_id` bigint(20) unsigned NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `compounding_periods_slug_unique` (`slug`),
  UNIQUE KEY `compounding_periods_name_unique` (`name`),
  KEY `compounding_periods_time_unit_id_foreign` (`time_unit_id`),
  CONSTRAINT `compounding_periods_time_unit_id_foreign` FOREIGN KEY (`time_unit_id`) REFERENCES `time_units` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compounding_periods`
--

LOCK TABLES `compounding_periods` WRITE;
/*!40000 ALTER TABLE `compounding_periods` DISABLE KEYS */;
INSERT INTO `compounding_periods` VALUES (1,'per-annum','Per Annum',1,1,'2020-08-19 11:55:27','2020-08-19 11:55:27'),(2,'per-month','Per Month',2,1,'2020-08-19 11:55:39','2020-08-19 11:55:39'),(3,'per-week','Per Week',3,1,'2020-08-19 11:55:50','2020-08-19 11:55:50'),(4,'per-day','Per Day',4,1,'2020-08-19 11:56:13','2020-08-19 11:56:13');
/*!40000 ALTER TABLE `compounding_periods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_types`
--

DROP TABLE IF EXISTS `data_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_slug_unique` (`slug`),
  UNIQUE KEY `data_types_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_types`
--

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interest_frequencies`
--

DROP TABLE IF EXISTS `interest_frequencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interest_frequencies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `time_unit_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `interest_frequencies_slug_unique` (`slug`),
  UNIQUE KEY `interest_frequencies_name_unique` (`name`),
  KEY `interest_frequencies_time_unit_id_foreign` (`time_unit_id`),
  CONSTRAINT `interest_frequencies_time_unit_id_foreign` FOREIGN KEY (`time_unit_id`) REFERENCES `time_units` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interest_frequencies`
--

LOCK TABLES `interest_frequencies` WRITE;
/*!40000 ALTER TABLE `interest_frequencies` DISABLE KEYS */;
INSERT INTO `interest_frequencies` VALUES (1,'monthy','Monthy',NULL,1,'2020-08-19 11:54:26','2020-08-19 11:54:26',2),(2,'daily','Daily',NULL,1,'2020-08-19 11:54:38','2020-08-19 11:54:38',4),(3,'weekly','Weekly',NULL,1,'2020-08-19 11:54:49','2020-08-19 11:54:49',3),(4,'annually','Annually',NULL,1,'2020-08-19 11:55:03','2020-08-19 11:55:03',1);
/*!40000 ALTER TABLE `interest_frequencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loan_statuses`
--

DROP TABLE IF EXISTS `loan_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loan_statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `loan_statuses_slug_unique` (`slug`),
  UNIQUE KEY `loan_statuses_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loan_statuses`
--

LOCK TABLES `loan_statuses` WRITE;
/*!40000 ALTER TABLE `loan_statuses` DISABLE KEYS */;
INSERT INTO `loan_statuses` VALUES (1,'pending-review','Pending Review',NULL,1,'2020-08-19 11:56:29','2020-08-19 11:56:29'),(2,'approved','Approved',NULL,1,'2020-08-19 11:56:40','2020-08-19 11:56:40'),(3,'declined','Declined',NULL,1,'2020-08-19 11:57:09','2020-08-19 11:57:09'),(4,'disbursed','Disbursed',NULL,1,'2020-08-19 11:57:19','2020-08-19 11:57:19'),(5,'in-service','In Service',NULL,1,'2020-08-19 11:57:29','2020-08-19 11:57:29'),(6,'fully-serviced','Fully Serviced',NULL,1,'2020-08-19 11:57:48','2020-08-19 11:57:48');
/*!40000 ALTER TABLE `loan_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loan_types`
--

DROP TABLE IF EXISTS `loan_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loan_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `loan_types_slug_unique` (`slug`),
  UNIQUE KEY `loan_types_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loan_types`
--

LOCK TABLES `loan_types` WRITE;
/*!40000 ALTER TABLE `loan_types` DISABLE KEYS */;
INSERT INTO `loan_types` VALUES (1,'fixed-rate','Fixed Rate',NULL,'2020-08-19 11:53:01','2020-08-19 11:53:01'),(2,'reducing-balance','Reducing Balance',NULL,'2020-08-19 11:53:09','2020-08-19 11:53:09');
/*!40000 ALTER TABLE `loan_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loans`
--

DROP TABLE IF EXISTS `loans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `amount` double NOT NULL,
  `reviewed_at` datetime DEFAULT NULL,
  `disbursed_at` datetime DEFAULT NULL,
  `tenure` double(8,2) NOT NULL DEFAULT '1.00',
  `compounding_period_id` bigint(20) unsigned NOT NULL,
  `repayment_frequency_id` bigint(20) unsigned NOT NULL,
  `loan_type_id` bigint(20) unsigned NOT NULL,
  `loan_status_id` bigint(20) unsigned NOT NULL,
  `first_installment_date` date DEFAULT NULL,
  `reviewer_id` bigint(20) unsigned DEFAULT NULL,
  `disbursor_id` bigint(20) unsigned DEFAULT NULL,
  `terms_and_conditions` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `percentage_interest_rate` double(8,4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `loans_client_id_foreign` (`client_id`),
  KEY `loans_product_id_foreign` (`product_id`),
  KEY `loans_compounding_period_id_foreign` (`compounding_period_id`),
  KEY `loans_repayment_frequency_id_foreign` (`repayment_frequency_id`),
  KEY `loans_loan_type_id_foreign` (`loan_type_id`),
  KEY `loans_loan_status_id_foreign` (`loan_status_id`),
  KEY `loans_reviewer_id_foreign` (`reviewer_id`),
  KEY `loans_disbursor_id_foreign` (`disbursor_id`),
  CONSTRAINT `loans_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `loans_compounding_period_id_foreign` FOREIGN KEY (`compounding_period_id`) REFERENCES `compounding_periods` (`id`),
  CONSTRAINT `loans_disbursor_id_foreign` FOREIGN KEY (`disbursor_id`) REFERENCES `users` (`id`),
  CONSTRAINT `loans_loan_status_id_foreign` FOREIGN KEY (`loan_status_id`) REFERENCES `loan_statuses` (`id`),
  CONSTRAINT `loans_loan_type_id_foreign` FOREIGN KEY (`loan_type_id`) REFERENCES `loan_types` (`id`),
  CONSTRAINT `loans_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `loans_repayment_frequency_id_foreign` FOREIGN KEY (`repayment_frequency_id`) REFERENCES `interest_frequencies` (`id`),
  CONSTRAINT `loans_reviewer_id_foreign` FOREIGN KEY (`reviewer_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loans`
--

LOCK TABLES `loans` WRITE;
/*!40000 ALTER TABLE `loans` DISABLE KEYS */;
/*!40000 ALTER TABLE `loans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2020_07_05_094241_create_sessions_table',1),(6,'2020_07_05_094246_create_jobs_table',1),(7,'2020_07_24_114250_create_permission_tables',2),(8,'2020_08_01_094733_seed_administrator_role_and_user',2),(9,'2020_08_01_100652_fill_permissions_for_roles',2),(10,'2020_08_01_101643_fill_permissions_for_users',2),(11,'2020_08_12_154013_create_data_types_table',2),(12,'2020_08_12_162850_create_settings_table',2),(13,'2020_08_12_163146_fill_permissions_for_settings',2),(14,'2020_08_12_164410_fill_permissions_for_data_types',2),(15,'2020_08_15_162918_create_loan_types_table',2),(16,'2020_08_15_163027_create_time_units_table',2),(17,'2020_08_15_163041_create_interest_frequencies_table',2),(18,'2020_08_15_163108_create_compounding_periods_table',2),(19,'2020_08_15_163137_create_clients_table',2),(20,'2020_08_15_163143_create_loan_statuses_table',2),(21,'2020_08_15_163247_create_products_table',2),(22,'2020_08_15_163255_create_loans_table',2),(23,'2020_08_15_170016_fill_permissions_for_loan_types',2),(24,'2020_08_15_170030_fill_permissions_for_time_units',2),(25,'2020_08_15_170043_fill_permissions_for_interest_frequencies',2),(26,'2020_08_15_170100_fill_permissions_for_compounding_periods',2),(27,'2020_08_15_170119_fill_permissions_for_clients',2),(28,'2020_08_15_170131_fill_permissions_for_loan_statuses',2),(29,'2020_08_15_170146_fill_permissions_for_products',2),(30,'2020_08_15_173006_add_time_unit_to_interest_frequencies_table',2),(31,'2020_08_15_174015_change_max_amount_in_products_table',2),(32,'2020_08_15_174305_fill_permissions_for_loans',2),(33,'2020_08_16_111543_make_reviewer_id_null_in_loans_table',2),(34,'2020_08_16_121338_fill_additional_loan_permissions',2),(35,'2020_08_16_163027_create_notifications_table',2),(36,'2020_08_17_081557_create_bills_table',2),(37,'2020_08_17_081610_create_payments_table',2),(38,'2020_08_17_082757_fill_permissions_for_bills',2),(39,'2020_08_17_082808_fill_permissions_for_payments',2),(40,'2020_08_17_083537_add_percentage_interest_rate_to_loans_table',2),(41,'2020_08_17_115505_change_unique_date_key_in_bills_table',2),(42,'2020_08_17_143216_add_interest_field_to_bills_table',2),(43,'2020_08_18_201221_rename_principal_in_bills_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bill_id` bigint(20) unsigned NOT NULL,
  `payment_date` datetime DEFAULT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_bill_id_foreign` (`bill_id`),
  CONSTRAINT `payments_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'roles','web','2020-08-19 11:45:26','2020-08-19 11:45:26'),(2,'roles.index','web','2020-08-19 11:45:26','2020-08-19 11:45:26'),(3,'roles.create','web','2020-08-19 11:45:26','2020-08-19 11:45:26'),(4,'roles.show','web','2020-08-19 11:45:26','2020-08-19 11:45:26'),(5,'roles.edit','web','2020-08-19 11:45:26','2020-08-19 11:45:26'),(6,'roles.delete','web','2020-08-19 11:45:26','2020-08-19 11:45:26'),(7,'users','web','2020-08-19 11:45:26','2020-08-19 11:45:26'),(8,'users.index','web','2020-08-19 11:45:26','2020-08-19 11:45:26'),(9,'users.create','web','2020-08-19 11:45:26','2020-08-19 11:45:26'),(10,'users.show','web','2020-08-19 11:45:26','2020-08-19 11:45:26'),(11,'users.edit','web','2020-08-19 11:45:26','2020-08-19 11:45:26'),(12,'users.delete','web','2020-08-19 11:45:26','2020-08-19 11:45:26'),(13,'settings','web','2020-08-19 11:45:30','2020-08-19 11:45:30'),(14,'settings.index','web','2020-08-19 11:45:30','2020-08-19 11:45:30'),(15,'settings.create','web','2020-08-19 11:45:30','2020-08-19 11:45:30'),(16,'settings.show','web','2020-08-19 11:45:30','2020-08-19 11:45:30'),(17,'settings.edit','web','2020-08-19 11:45:30','2020-08-19 11:45:30'),(18,'settings.delete','web','2020-08-19 11:45:30','2020-08-19 11:45:30'),(19,'data-types','web','2020-08-19 11:45:30','2020-08-19 11:45:30'),(20,'data-types.index','web','2020-08-19 11:45:30','2020-08-19 11:45:30'),(21,'data-types.create','web','2020-08-19 11:45:30','2020-08-19 11:45:30'),(22,'data-types.show','web','2020-08-19 11:45:30','2020-08-19 11:45:30'),(23,'data-types.edit','web','2020-08-19 11:45:30','2020-08-19 11:45:30'),(24,'data-types.delete','web','2020-08-19 11:45:30','2020-08-19 11:45:30'),(25,'loan-types','web','2020-08-19 11:45:52','2020-08-19 11:45:52'),(26,'loan-types.index','web','2020-08-19 11:45:52','2020-08-19 11:45:52'),(27,'loan-types.create','web','2020-08-19 11:45:52','2020-08-19 11:45:52'),(28,'loan-types.show','web','2020-08-19 11:45:52','2020-08-19 11:45:52'),(29,'loan-types.edit','web','2020-08-19 11:45:52','2020-08-19 11:45:52'),(30,'loan-types.delete','web','2020-08-19 11:45:52','2020-08-19 11:45:52'),(31,'time-units','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(32,'time-units.index','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(33,'time-units.create','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(34,'time-units.show','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(35,'time-units.edit','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(36,'time-units.delete','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(37,'interest-frequencies','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(38,'interest-frequencies.index','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(39,'interest-frequencies.create','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(40,'interest-frequencies.show','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(41,'interest-frequencies.edit','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(42,'interest-frequencies.delete','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(43,'compounding-periods','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(44,'compounding-periods.index','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(45,'compounding-periods.create','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(46,'compounding-periods.show','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(47,'compounding-periods.edit','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(48,'compounding-periods.delete','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(49,'clients','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(50,'clients.index','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(51,'clients.create','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(52,'clients.show','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(53,'clients.edit','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(54,'clients.delete','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(55,'loan-statuses','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(56,'loan-statuses.index','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(57,'loan-statuses.create','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(58,'loan-statuses.show','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(59,'loan-statuses.edit','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(60,'loan-statuses.delete','web','2020-08-19 11:45:53','2020-08-19 11:45:53'),(61,'products','web','2020-08-19 11:45:54','2020-08-19 11:45:54'),(62,'products.index','web','2020-08-19 11:45:54','2020-08-19 11:45:54'),(63,'products.create','web','2020-08-19 11:45:54','2020-08-19 11:45:54'),(64,'products.show','web','2020-08-19 11:45:54','2020-08-19 11:45:54'),(65,'products.edit','web','2020-08-19 11:45:54','2020-08-19 11:45:54'),(66,'products.delete','web','2020-08-19 11:45:54','2020-08-19 11:45:54'),(67,'loans','web','2020-08-19 11:45:56','2020-08-19 11:45:56'),(68,'loans.index','web','2020-08-19 11:45:56','2020-08-19 11:45:56'),(69,'loans.create','web','2020-08-19 11:45:56','2020-08-19 11:45:56'),(70,'loans.show','web','2020-08-19 11:45:56','2020-08-19 11:45:56'),(71,'loans.edit','web','2020-08-19 11:45:56','2020-08-19 11:45:56'),(72,'loans.delete','web','2020-08-19 11:45:56','2020-08-19 11:45:56'),(73,'loans.review','web','2020-08-19 11:45:57','2020-08-19 11:45:57'),(74,'loans.disburse','web','2020-08-19 11:45:57','2020-08-19 11:45:57'),(75,'bills','web','2020-08-19 11:46:03','2020-08-19 11:46:03'),(76,'bills.index','web','2020-08-19 11:46:03','2020-08-19 11:46:03'),(77,'bills.create','web','2020-08-19 11:46:03','2020-08-19 11:46:03'),(78,'bills.show','web','2020-08-19 11:46:03','2020-08-19 11:46:03'),(79,'bills.edit','web','2020-08-19 11:46:03','2020-08-19 11:46:03'),(80,'bills.delete','web','2020-08-19 11:46:03','2020-08-19 11:46:03'),(81,'payments','web','2020-08-19 11:46:03','2020-08-19 11:46:03'),(82,'payments.index','web','2020-08-19 11:46:03','2020-08-19 11:46:03'),(83,'payments.create','web','2020-08-19 11:46:03','2020-08-19 11:46:03'),(84,'payments.show','web','2020-08-19 11:46:03','2020-08-19 11:46:03'),(85,'payments.edit','web','2020-08-19 11:46:03','2020-08-19 11:46:03'),(86,'payments.delete','web','2020-08-19 11:46:03','2020-08-19 11:46:03');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `max_amount` double NOT NULL,
  `loan_type_id` bigint(20) unsigned NOT NULL,
  `compounding_period_id` bigint(20) unsigned NOT NULL,
  `interest_frequency_id` bigint(20) unsigned NOT NULL,
  `percentage_interest_rate` double(8,2) NOT NULL,
  `terms_and_conditions` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  UNIQUE KEY `products_name_unique` (`name`),
  KEY `products_loan_type_id_foreign` (`loan_type_id`),
  KEY `products_compounding_period_id_foreign` (`compounding_period_id`),
  KEY `products_interest_frequency_id_foreign` (`interest_frequency_id`),
  CONSTRAINT `products_compounding_period_id_foreign` FOREIGN KEY (`compounding_period_id`) REFERENCES `compounding_periods` (`id`),
  CONSTRAINT `products_interest_frequency_id_foreign` FOREIGN KEY (`interest_frequency_id`) REFERENCES `interest_frequencies` (`id`),
  CONSTRAINT `products_loan_type_id_foreign` FOREIGN KEY (`loan_type_id`) REFERENCES `loan_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(25,1),(26,1),(28,1),(31,1),(32,1),(34,1),(37,1),(38,1),(40,1),(43,1),(44,1),(46,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1),(58,1),(61,1),(62,1),(63,1),(64,1),(65,1),(66,1),(67,1),(68,1),(69,1),(70,1),(71,1),(72,1),(73,1),(74,1),(75,1),(76,1),(77,1),(78,1),(79,1),(80,1),(81,1),(82,1),(83,1),(84,1);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'administrator','Administrator','web',1,'2020-08-19 11:45:26','2020-08-19 11:45:26');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('VAU4RhuBBDPiLKpCQX0PiFleONaQhKoJiWymvoOr',1,'172.19.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:79.0) Gecko/20100101 Firefox/79.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUkVNR2c4N2VlZmh1dnBZZjRjVlhoeEtyMzFycGRGSVVnWmFrclBsOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAyMy9hZG1pbi90aW1lLXVuaXRzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1597827677);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_type_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_slug_unique` (`slug`),
  UNIQUE KEY `settings_name_unique` (`name`),
  KEY `settings_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `settings_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `time_units`
--

DROP TABLE IF EXISTS `time_units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `time_units` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `days` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `time_units_slug_unique` (`slug`),
  UNIQUE KEY `time_units_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `time_units`
--

LOCK TABLES `time_units` WRITE;
/*!40000 ALTER TABLE `time_units` DISABLE KEYS */;
INSERT INTO `time_units` VALUES (1,'year','Year',365.00,'2020-08-19 11:53:23','2020-08-19 11:53:23'),(2,'month','Month',30.00,'2020-08-19 11:53:32','2020-08-19 11:53:32'),(3,'week','Week',7.00,'2020-08-19 11:53:42','2020-08-19 11:53:42'),(4,'day','Day',1.00,'2020-08-19 11:53:49','2020-08-19 11:53:49');
/*!40000 ALTER TABLE `time_units` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'administrator','admin@savannabits.com','System Admin','System',NULL,'Admin',NULL,'$2y$10$UfnxmPQgl3jLFCSTFWM0oOD6zkmdi0jReeE0ojrwACJ.jiCymsq6.',NULL,'2020-08-19 11:45:26','2020-08-19 11:45:26');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-19  9:02:31
