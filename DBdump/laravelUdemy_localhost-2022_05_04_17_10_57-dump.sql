-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: laravelUdemy
-- ------------------------------------------------------
-- Server version	8.0.29-0ubuntu0.20.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `abouts`
--

DROP TABLE IF EXISTS `abouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `abouts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abouts`
--

LOCK TABLES `abouts` WRITE;
/*!40000 ALTER TABLE `abouts` DISABLE KEYS */;
INSERT INTO `abouts` VALUES (1,'Title for About content','Short Description for About content','Long Description for About content. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','2022-04-25 07:18:38','2022-04-25 10:03:40');
/*!40000 ALTER TABLE `abouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brands` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (13,'Samsung','img/brand/1730799552010906.jpg','2022-04-22 09:17:59',NULL),(14,'Apple','img/brand/1730799563207707.png','2022-04-22 09:18:10',NULL),(15,'Huawei','img/brand/1730799584233892.jpg','2022-04-22 09:18:30',NULL),(16,'Lenovo','img/brand/1730799597200562.jpg','2022-04-22 09:18:42',NULL),(17,'Nokia','img/brand/1730799606800136.jpg','2022-04-22 09:18:51',NULL),(18,'Oppo','img/brand/1730799619722178.jpg','2022-04-22 09:19:04',NULL),(19,'Xiaomi','img/brand/1730799639641342.jpg','2022-04-22 09:19:23',NULL);
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,1,'Sea Fish','2022-04-18 05:58:24',NULL,NULL),(2,1,'Travel','2022-04-18 08:59:46',NULL,NULL),(3,2,'Woman','2022-04-18 09:01:01',NULL,NULL),(4,2,'Man','2022-04-18 09:03:12','2022-04-18 14:29:35',NULL),(5,2,'Children','2022-04-18 09:09:33',NULL,NULL),(6,2,'Animals','2022-04-18 09:10:17','2022-04-18 14:29:34',NULL),(7,2,'Heros','2022-04-18 09:16:51',NULL,NULL),(9,1,'Trees Fun','2022-04-18 09:22:16','2022-04-18 14:29:31',NULL),(10,2,'Trees',NULL,NULL,NULL),(11,1,'Planet Earth','2022-04-18 09:46:52','2022-04-18 14:29:28',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_forms`
--

DROP TABLE IF EXISTS `contact_forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_forms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_forms`
--

LOCK TABLES `contact_forms` WRITE;
/*!40000 ALTER TABLE `contact_forms` DISABLE KEYS */;
INSERT INTO `contact_forms` VALUES (1,'Yuriy','test@test.com','Test Subject','Test Message','2022-04-27 09:17:17',NULL),(2,'Yuriy','test@test.com','Test Subject','Test Message','2022-04-27 09:18:37',NULL),(3,'Yuriy','test@test.com','Test Subject','Test Message','2022-04-27 09:20:59',NULL),(4,'Yuriy','test@test.com','Test Subject','1213','2022-04-27 09:22:18',NULL),(5,'Yuriy','test@test.com','Test Subject','123','2022-04-27 09:24:51',NULL),(6,'Yuriy','test@test.com','Test Subject','123','2022-04-27 09:27:45',NULL),(7,'Yuriy','test@test.com','Test Subject','123','2022-04-27 09:27:51',NULL),(8,'Yuriy','test@test.com','Test Subject','555','2022-04-27 09:28:52',NULL),(9,'Yuriy','test@test.com','Test Subject','444','2022-04-27 09:31:41',NULL),(10,'Yuriy','test@test.com','Test Subject','444','2022-04-27 09:32:40',NULL),(11,'Yuriy','test@test.com','Test Subject','444','2022-04-27 09:33:16',NULL),(12,'Yuriy','test@test.com','Test Subject','444','2022-04-27 09:33:34',NULL),(13,'Yuriy','test@test.com','Test Subject','444','2022-04-27 09:36:48',NULL),(14,'Yuriy','test@test.com','Test Subject','444','2022-04-27 09:40:37',NULL),(15,'Yuriy','test@test.com','Test Subject','ip\'po','2022-04-27 09:41:46',NULL),(16,'Yuriy','test@test.com','Test Subject','ip\'po','2022-04-27 09:42:10',NULL),(17,'Yuriy','test@test.com','Test Subject','123456','2022-04-27 09:43:49',NULL),(18,'Test Register','test@test.com','Test Subject','o\\]p\\]]','2022-04-27 09:46:49',NULL),(19,'Yuriy','zhizhnevskiydev@gmail.com','Test Subject','[p\\p[\\','2022-04-27 09:47:23',NULL),(20,'Yuriy','test@test.com','Test Subject','aXSADCWSCF','2022-04-27 09:52:15',NULL),(21,'Yuriy','test@test.com','Test Subject','aXSADCWSCF','2022-04-27 09:52:21',NULL),(22,'Yuriy','test@test.com','Test Subject','aXSADCWSCF','2022-04-27 09:55:20',NULL),(23,'Yuriy','test@test.com','Test Subject','aXSADCWSCF','2022-04-27 09:57:07',NULL),(24,'Yuriy','test@test.com','Test Subject','aXSADCWSCF','2022-04-27 09:57:25',NULL),(25,'Yuriy','test@test.com','Test Subject','aXSADCWSCF','2022-04-27 09:58:24',NULL),(26,'Yuriy','test@test.com','Test Subject','aXSADCWSCF','2022-04-27 09:58:25',NULL),(27,'Yuriy','test@test.com','Test Subject','ojpojp','2022-04-27 10:05:45',NULL);
/*!40000 ALTER TABLE `contact_forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (2,'Belarus, Vitebsk','test@test.com','0123456789','2022-04-27 08:32:36','2022-04-27 08:32:45');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2022_04_15_084904_create_sessions_table',1),(7,'2022_04_15_132837_create_categories_table',2),(8,'2022_04_19_142743_create_brands_table',3),(9,'2022_04_20_114825_create_multi_pictures_table',4),(10,'2022_04_22_124352_create_sliders_table',5),(11,'2022_04_25_092505_create_abouts_table',6),(12,'2022_04_27_101605_create_contacts_table',7),(13,'2022_04_27_115634_create_contact_forms_table',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multi_pictures`
--

DROP TABLE IF EXISTS `multi_pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `multi_pictures` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multi_pictures`
--

LOCK TABLES `multi_pictures` WRITE;
/*!40000 ALTER TABLE `multi_pictures` DISABLE KEYS */;
INSERT INTO `multi_pictures` VALUES (4,'img/multi/1730618485995724.png','2022-04-20 09:20:01',NULL),(5,'img/multi/1730618486020535.png','2022-04-20 09:20:01',NULL),(6,'img/multi/1730618486048523.png','2022-04-20 09:20:01',NULL),(7,'img/multi/1730618486088692.png','2022-04-20 09:20:01',NULL),(8,'img/multi/1730618486121087.png','2022-04-20 09:20:01',NULL),(9,'img/multi/1730619059744004.png','2022-04-20 09:29:08',NULL),(10,'img/multi/1730619059761421.png','2022-04-20 09:29:08',NULL),(11,'img/multi/1730619059795397.png','2022-04-20 09:29:08',NULL),(12,'img/multi/1730619059823539.png','2022-04-20 09:29:08',NULL),(13,'img/multi/1730619059847405.png','2022-04-20 09:29:08',NULL),(14,'img/multi/1730619059872943.png','2022-04-20 09:29:08',NULL),(15,'img/multi/1730619059899587.png','2022-04-20 09:29:08',NULL),(16,'img/multi/1730619059924792.png','2022-04-20 09:29:08',NULL),(17,'img/multi/1730619059943688.png','2022-04-20 09:29:09',NULL);
/*!40000 ALTER TABLE `multi_pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
INSERT INTO `password_resets` VALUES ('zhizhnevskiydev@gmail.com','$2y$10$CTx5lGFTu.N0AP4xpz88bOnRBQw6WZl5TImzQx2rFEgCHnQQf6DYe','2022-04-21 08:25:54');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
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
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('hP4qZTvxyFroSyhpVWAm2mRdqlQLFelFXyfclLMs',NULL,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.41 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiT3NEMFRhcDM3UjIzUHJNb1RHR2FVZDNsR3pUaXlzVUNjY3hUem8wbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1651673298);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sliders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` VALUES (1,'First Banner','Description for First Banner','img/slider/1730813857844867.jpg','2022-04-22 13:05:23',NULL),(4,'Second Banner','Description for Second Banner','img/slider/1730815632222981.jpg','2022-04-22 13:33:35',NULL),(6,'Third Banner','Description for Third Banner','img/slider/1730817152384477.jpg','2022-04-22 13:57:45',NULL);
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Yuriy','zhizhnevskiydev@gmail.com',NULL,'$2y$10$0wZn8BF1CLTGYbUg2m.nhuztH4UmG1MzD/L2Hww0op51GTRbUy6fC',NULL,NULL,NULL,'jmbW3cbLd7U8Y7vWjFANZY3IkwGaxBXV4kMPPZhZoYqYNcGVSh8F3QPsfyAd',NULL,NULL,'2022-04-15 06:16:22','2022-04-15 06:16:22'),(2,'Test','test@test.com',NULL,'$2y$10$1.8LV4Llz8TTUOPfVPj./.xT4zoI.QqX6mEiBbY8u7n7rH0MYzgcS',NULL,NULL,NULL,'ymaNQyfgcg1K80zkW6b6MiIMPIOrXDir4vrtDyLVL6iOredSo1sUGDdUzT3x',NULL,'profile-photos/MsC5TWQQbAfyBQ0yXewKVUS52A0r7QtYvaBv7GtP.jpg','2022-04-15 09:38:37','2022-04-27 14:05:13'),(3,'Yuriy','test2@test.com',NULL,'$2y$10$gq.5G8f9XZfGxxjqWsZLTOzP6DJDk3zNuXuVDvaUNee5jRnF59p36',NULL,NULL,NULL,NULL,NULL,NULL,'2022-04-22 06:33:10','2022-04-22 06:33:10'),(4,'Test Register','testReg@test.com',NULL,'$2y$10$QPkh4.yrcTzfSvqDzYpZNe9r9GpM2PzUo.eUdfk4FFIowVWl/aCwG',NULL,NULL,NULL,NULL,NULL,NULL,'2022-04-22 06:39:40','2022-04-22 06:39:40');
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

-- Dump completed on 2022-05-04 17:10:57
