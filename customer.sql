-- MySQL dump 10.13  Distrib 5.6.19, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: homestead
-- ------------------------------------------------------
-- Server version	5.6.19-0ubuntu0.14.04.1

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
-- Table structure for table `article_categories`
--

DROP TABLE IF EXISTS `article_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` int(10) unsigned NOT NULL,
  `position` int(11) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `article_categories_language_id_foreign` (`language_id`),
  KEY `article_categories_user_id_foreign` (`user_id`),
  KEY `article_categories_user_id_edited_foreign` (`user_id_edited`),
  CONSTRAINT `article_categories_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  CONSTRAINT `article_categories_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `article_categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_categories`
--

LOCK TABLES `article_categories` WRITE;
/*!40000 ALTER TABLE `article_categories` DISABLE KEYS */;
INSERT INTO `article_categories` VALUES (1,3,NULL,1,NULL,'Iste eius quaerat esse est.','iusto-est-eius-et-at-ea','2015-09-14 05:09:53','2015-09-14 05:09:53',NULL),(2,3,NULL,1,NULL,'Id laboriosam eveniet odit.','repudiandae-quam-in-et-porro-et','2015-09-14 05:09:53','2015-09-14 05:09:53',NULL);
/*!40000 ALTER TABLE `article_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` int(10) unsigned NOT NULL,
  `position` int(11) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `article_category_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `introduction` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_language_id_foreign` (`language_id`),
  KEY `articles_user_id_foreign` (`user_id`),
  KEY `articles_user_id_edited_foreign` (`user_id_edited`),
  KEY `articles_article_category_id_foreign` (`article_category_id`),
  CONSTRAINT `articles_article_category_id_foreign` FOREIGN KEY (`article_category_id`) REFERENCES `article_categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `articles_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  CONSTRAINT `articles_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,1,NULL,1,NULL,1,'Tempora odit tempora neque expedita laboriosam.','odio-magnam-corrupti-neque-in-a-laboriosam-ut','Sed molestiae vitae quis rerum ducimus exercitationem. Et exercitationem est sed earum aliquam ipsa. Laborum dolorem dolorem asperiores amet vitae aperiam.','Et dolores ullam dolor eum voluptatem commodi. Sed sapiente inventore molestiae provident et tenetur hic. Et autem libero vero qui ut consectetur.','http://Schaden.com/vitae-autem-ut-ut-vel',NULL,'2015-09-14 05:09:53','2015-09-14 05:09:53',NULL),(2,1,NULL,1,NULL,2,'Magnam laboriosam laborum quasi ut.','delectus-animi-eum-sunt-at-deserunt','Eos vitae nemo magni dolorum rerum laborum ab nam. Magnam sit beatae ipsum non non ut. Consequuntur fugiat saepe odio officiis unde accusamus. Est quos sed modi rerum.','Commodi quos quia quaerat molestiae delectus. Quod exercitationem et in quia voluptas fugit.','http://Ortiz.biz/iure-ducimus-neque-mollitia-maiores.html',NULL,'2015-09-14 05:09:53','2015-09-14 05:09:53',NULL);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `customers_segment` int(10) unsigned DEFAULT NULL,
  `customer_sales` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `customer_cp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_customer_name_unique` (`customer_name`),
  KEY `customers_customers_segment_foreign` (`customers_segment`),
  KEY `customers_user_id_foreign` (`user_id`),
  KEY `customers_user_id_edited_foreign` (`user_id_edited`),
  CONSTRAINT `customers_customers_segment_foreign` FOREIGN KEY (`customers_segment`) REFERENCES `customers_segment` (`id`),
  CONSTRAINT `customers_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'Bank QNB Kesawaan',1,'Audindra Firmansyah','null',1,NULL,'2015-09-14 05:28:11','2015-09-14 05:28:11',NULL),(2,'Citilink Indonesia',9,'Ahmad Nurwakhid','null',1,1,'2015-09-14 05:29:34','2015-09-14 05:31:38',NULL),(3,'Permodalan Nasional Madani (PNM)',1,'Cynthia Eka Putri','null',1,1,'2015-09-14 05:37:56','2015-09-14 05:40:48',NULL),(4,'G4S Euronet Indonesia',7,'Reza Nugraha','null',1,1,'2015-09-14 05:38:50','2015-09-14 05:41:06',NULL),(5,'Adira Dinamika Multi Finance',1,'Dwi Fatmarani Utari','null',1,NULL,'2015-09-14 05:40:24','2015-09-14 05:40:24',NULL),(6,'Tunjung Mas Raya',6,'Asma Hilda','null',1,NULL,'2015-09-14 05:41:49','2015-09-14 05:41:49',NULL),(7,'Jati Piranti Solusindo (Jatis)',7,'Budi Setiawan','null',1,NULL,'2015-09-14 05:42:40','2015-09-14 05:42:40',NULL),(8,'Tigaraksa Satria TBk.',3,'Ahmad Lukman Jumadi','null',1,NULL,'2015-09-14 05:43:29','2015-09-14 05:43:29',NULL),(9,'PT. Bumitama Gunajaya Agro',6,'Yuyun Nurmayanti','null',1,NULL,'2015-09-14 05:44:12','2015-09-14 05:44:12',NULL),(10,'PT. Artajasa Pembayaran Elketronis',7,'Edward Simond','null',1,NULL,'2015-09-14 05:44:58','2015-09-14 05:44:58',NULL),(11,'PT. Pandu Siwi Sentosa',9,'Pungki Wulandari','null',1,1,'2015-09-14 05:45:53','2015-09-14 06:00:56',NULL),(12,'PT. Datindo Infonet Prima',7,'Sabilah Kurnia Putri','null',1,1,'2015-09-14 05:47:13','2015-09-14 06:01:46',NULL),(13,'Malindo FeedMill Tbk',3,'Fidiya Mardiyani','null',1,NULL,'2015-09-14 05:58:36','2015-09-14 05:58:36',NULL),(14,'Asuransi Bangun Askrida',1,'Wahyu Wibowo','null',1,NULL,'2015-09-14 06:02:47','2015-09-14 06:02:47',NULL),(15,'Ashir',7,'Budi Setiawan','null',1,NULL,'2015-09-14 06:03:24','2015-09-14 06:03:24',NULL),(16,'Ace Hardware Indonesia',3,'Ahmad Lukman Jumadi','null',1,NULL,'2015-09-14 06:05:34','2015-09-14 06:05:34',NULL),(17,'Master System Infotama',7,'Amanda Chitra Mayami','null',1,NULL,'2015-09-14 06:06:53','2015-09-14 06:06:53',NULL),(18,'Adfin Bureau Indonesia',7,'Budi Setiawan','null',1,NULL,'2015-09-14 06:07:49','2015-09-14 06:07:49',NULL),(19,'Adhi Karya ',3,'Cynthia Eka Putri','null',1,NULL,'2015-09-14 06:08:54','2015-09-14 06:08:54',NULL),(20,'Axes Network Indonesia',7,'Asma Hilda','null',1,NULL,'2015-09-14 06:09:46','2015-09-14 06:09:46',NULL),(21,'Bank Resona Perdania',1,'Audindra Firmansyah','null',1,NULL,'2015-09-14 06:10:18','2015-09-14 06:10:18',NULL),(22,'Citra Niaga Teknologi (Rumah Zakat)/Validata Tekno',1,'Slamet Hidayat','null',1,NULL,'2015-09-14 06:11:15','2015-09-14 06:11:15',NULL),(23,'Balai Besar Pelaksanaan Jalan Nasional IV / Rasa P',2,'-','null',1,NULL,'2015-09-14 06:11:48','2015-09-14 06:11:48',NULL),(24,'Diners Jaya Indonesia International',7,'Arie Lesmana','null',1,NULL,'2015-09-14 06:12:41','2015-09-14 06:12:41',NULL),(25,'Iklab Indonesia/Danawa Indonesia',7,'-','null',1,NULL,'2015-09-14 06:13:40','2015-09-14 06:13:40',NULL),(26,'Indo Pratama Network',7,'Budi Setiawan','null',1,NULL,'2015-09-14 06:14:20','2015-09-14 06:14:20',NULL),(27,'Indonesia Smart Card',7,'Budi Setiawan','null',1,NULL,'2015-09-14 06:15:12','2015-09-14 06:15:12',NULL),(28,'Indosat Tbk',8,'R. Dovvy H.Kartiko','null',1,NULL,'2015-09-14 06:16:13','2015-09-14 06:16:13',NULL),(29,'Indosat (Singtel)',8,'R. Dovvy H.Kartiko','null',1,1,'2015-09-14 06:17:11','2015-09-14 06:17:43',NULL),(30,'Indosat (British Telecom)',8,'R. Dovvy H.Kartiko','null',1,NULL,'2015-09-14 06:22:20','2015-09-14 06:22:20',NULL),(31,'Jatelindo Perkasa Abadi',7,'Budi Setiawan','null',1,1,'2015-09-14 06:23:23','2015-09-14 06:23:50',NULL),(32,'Maximus Solusindo',7,'-','null',1,NULL,'2015-09-14 06:24:26','2015-09-14 06:24:26',NULL),(33,'Monica Hijau Lestari (Body Shop)',3,'Marliana Tifani Safitri','null',1,NULL,'2015-09-14 06:25:17','2015-09-14 06:25:17',NULL),(34,'Multi Citra Abadi',7,'Titi Yuniarti','null',1,NULL,'2015-09-14 06:26:23','2015-09-14 06:26:23',NULL),(35,'Onasis Indonesia',6,'Kurnia Rahman Yasril','null',1,NULL,'2015-09-14 06:27:04','2015-09-14 06:27:04',NULL),(36,'Pacomnet/Infinetwork Global',7,'Amanda Chitra Maryami','null',1,NULL,'2015-09-14 06:27:47','2015-09-14 06:27:47',NULL),(37,'Parazelsus Indonesia',3,'Yudi Satriyanto','null',1,NULL,'2015-09-14 06:28:25','2015-09-14 06:28:25',NULL),(38,'Repex Perdana International',9,'Mulyana','null',1,NULL,'2015-09-14 06:28:54','2015-09-14 06:28:54',NULL),(39,'Sapta Indra Sejati',7,'Yuyun Nurmayanti','null',1,NULL,'2015-09-14 06:29:24','2015-09-14 06:29:24',NULL),(40,'Sarinah (PERSERO)',3,'Muhammad Mustofa','null',1,NULL,'2015-09-14 06:32:31','2015-09-14 06:32:31',NULL),(41,'Singapore Telecomunications Limited',8,'R. Dovvy H. Kartiko','null',1,NULL,'2015-09-14 06:33:52','2015-09-14 06:33:52',NULL),(42,'BUT. Sofrecom',7,'Mohammad Sembodo','null',1,NULL,'2015-09-14 06:34:51','2015-09-14 06:34:51',NULL),(43,'Teknologi Cipta Raya',7,'-','null',1,NULL,'2015-09-14 06:35:51','2015-09-14 06:35:51',NULL),(44,'Bank ANZ Indonesia',1,'Yuhyi Sodiq','null',1,NULL,'2015-09-14 06:38:52','2015-09-14 06:38:52',NULL),(45,'Hensel Devest Indonesia (HDI)',7,'Dewi Asri Latifa','null',1,NULL,'2015-09-14 06:39:44','2015-09-14 06:39:44',NULL),(46,'PT. Grahamas Citra Koneksindo',7,'Budi Setiawan','null',1,NULL,'2015-09-14 06:40:26','2015-09-14 06:40:26',NULL),(47,'Chaosmatic',7,'Sumarna','null',1,NULL,'2015-09-14 06:41:02','2015-09-14 06:41:02',NULL),(48,'Bio Inti Agrindo',6,'-','null',1,NULL,'2015-09-14 06:41:44','2015-09-14 06:41:44',NULL),(49,'Titipan Mas',1,'Arie Lesmana','null',1,NULL,'2015-09-14 06:42:42','2015-09-14 06:42:42',NULL),(50,'Yay. Bandung International School',5,'Santi Dewi Anggraeni','null',1,NULL,'2015-09-14 06:43:33','2015-09-14 06:43:33',NULL),(52,'PT. Fast Food Indonesia (KFC)',3,'-','null',1,NULL,'2015-09-14 06:44:03','2015-09-14 06:44:03',NULL),(54,'Karta Metadata',7,'-','null',1,NULL,'2015-09-14 06:44:53','2015-09-14 06:44:53',NULL),(55,'Prima Layanan Nasional Enjiniring',7,'Yuyun Nurmayanti','null',1,NULL,'2015-09-14 06:45:41','2015-09-14 06:45:41',NULL),(56,'PT. Pelangi Indodata',7,'Meyly Hamzah','null',1,NULL,'2015-09-14 06:46:52','2015-09-14 06:46:52',NULL),(57,'Buana Sejahtera Teknologi',7,'-','null',1,NULL,'2015-09-14 06:47:36','2015-09-14 06:47:36',NULL),(58,'Simtech Indonesia',7,'Budi Setiawan','null',1,NULL,'2015-09-14 06:48:26','2015-09-14 06:48:26',NULL),(59,'Dinas Internal (NavLink)',7,'Abdullah Trimulyawan','null',1,NULL,'2015-09-14 06:49:36','2015-09-14 06:49:36',NULL),(60,'PT. Aviana Sinar Abadi',7,'Andy Wibowo','null',1,NULL,'2015-09-14 06:50:09','2015-09-14 06:50:09',NULL),(61,'Aero Systems Indonesia',7,'Mulyana','null',1,NULL,'2015-09-14 06:51:24','2015-09-14 06:51:24',NULL),(62,'AJ Sequis Life',1,'Novi Mayasari','null',1,NULL,'2015-09-14 06:52:01','2015-09-14 06:52:01',NULL),(63,'Arutala Indonesia',7,'Ardian Chandra Lesmana','null',1,NULL,'2015-09-14 06:52:43','2015-09-14 06:52:43',NULL),(64,'Bank Bukopin',1,'Tsales Reza Nur Irfan','null',1,NULL,'2015-09-14 06:53:46','2015-09-14 06:53:46',NULL),(65,'Borneo Alam Semesta',6,'Eka Wisnu Wardhana','null',1,NULL,'2015-09-14 06:54:56','2015-09-14 06:54:56',NULL),(66,'CIMB Principal Asset Management',1,'Irvan Najmudin Ahmad','null',1,NULL,'2015-09-14 06:55:25','2015-09-14 06:55:25',NULL),(67,'Exertainment Indonesia',7,'Tri Nyoman Adhy Irawan','null',1,NULL,'2015-09-14 06:56:12','2015-09-14 06:56:12',NULL),(68,'Livingsocial',7,'Titi Yuniarti','null',1,NULL,'2015-09-14 06:57:03','2015-09-14 06:57:03',NULL),(69,'Gerbang Teknologi Nusantara',7,'Ahmad Lukman Jumadi','null',1,NULL,'2015-09-14 06:57:39','2015-09-14 06:57:39',NULL),(70,'Gunung Sewu Kencana',1,'Marliana Tifani Safitri','null',1,NULL,'2015-09-14 06:58:24','2015-09-14 06:58:24',NULL),(71,'I Like Gym Indonesia',3,'Cynthia Eka Putri','null',1,NULL,'2015-09-14 06:59:02','2015-09-14 06:59:02',NULL),(72,'Imani Prima',7,'Asma Hilda','null',1,NULL,'2015-09-14 06:59:46','2015-09-14 06:59:46',NULL),(73,'Infinitium Solutions',7,'Mohammad Sembodo','null',1,NULL,'2015-09-14 07:00:48','2015-09-14 07:00:48',NULL),(74,'Interact Solution Asia',7,'Cynthia Eka Putri','null',1,NULL,'2015-09-14 07:01:30','2015-09-14 07:01:30',NULL),(75,'Koperasi Awak Pesawat Garuda Indonesia',9,'Asma Hilda','null',1,1,'2015-09-14 07:02:06','2015-09-14 07:07:53',NULL),(76,'Lembaga Ilmu Pengetahuan Indonesia (LIPI)',2,'Wawan Hendra Usuma Dinata','null',1,NULL,'2015-09-14 07:03:06','2015-09-14 07:03:06',NULL),(77,'Lintas Media Danawa',7,'Sabillah Kurnia Putri','null',1,NULL,'2015-09-14 07:03:42','2015-09-14 07:03:42',NULL),(78,'Multi Adi Prakarsa Manunggal (KARTUKU)',7,'Irvan Najmudin Ahmad','null',1,NULL,'2015-09-14 07:11:06','2015-09-14 07:11:06',NULL),(79,'My Rasch Indonesia',3,'Kurnia Rahman Yasril','null',1,NULL,'2015-09-14 07:11:41','2015-09-14 07:11:41',NULL),(80,'Otsuka Indonesia',3,'Ahmad Lukman Jumadi','null',1,NULL,'2015-09-14 07:12:12','2015-09-14 07:12:12',NULL),(81,'Starlink Solusi',7,'Asep Kurnia Iranto','null',1,NULL,'2015-09-14 07:12:58','2015-09-14 07:12:58',NULL),(82,'Teradata Megah',7,'Slamet Hidayat','null',1,NULL,'2015-09-14 07:14:14','2015-09-14 07:14:14',NULL),(83,'Trikomsel Oke Tbk',3,'Muhammad Mustofa','null',1,NULL,'2015-09-14 07:15:11','2015-09-14 07:15:11',NULL),(84,'Unilever Indonesia Tbk',3,'Ina Risnawati','null',1,NULL,'2015-09-14 07:16:02','2015-09-14 07:16:02',NULL),(85,'USO (Aplikanusa Lintasarta)',7,'Basuki Kuswidodo','null',1,NULL,'2015-09-14 07:16:34','2015-09-14 07:16:34',NULL),(86,'Venus Integra',7,'Nurhafni','null',1,NULL,'2015-09-14 07:17:24','2015-09-14 07:17:24',NULL),(87,'Visionet International',7,'Hendra Pisca Wahyudi','null',1,NULL,'2015-09-14 07:18:04','2015-09-14 07:18:04',NULL),(88,'Global Integrasi Prima / Global Sentra Perdana',7,'Mohammad Sembodo','null',1,NULL,'2015-09-14 07:18:51','2015-09-14 07:18:51',NULL),(89,'PT. Asuransi Adira Dinamika',1,'Dwi Fatmarani Utari','null',1,NULL,'2015-09-14 07:19:54','2015-09-14 07:19:54',NULL),(90,'Synergi Engineering',7,'Pungki Wulandari','null',1,NULL,'2015-09-14 07:20:40','2015-09-14 07:20:40',NULL),(91,'Lion Mentari',9,'Mulyana','null',1,NULL,'2015-09-14 07:21:16','2015-09-14 07:21:16',NULL),(92,'Ezeelink Indonesia',7,'Sumarna','null',1,NULL,'2015-09-14 07:22:14','2015-09-14 07:22:14',NULL),(93,'MOL Access Portal',7,'Budi Setiawan','null',1,NULL,'2015-09-14 07:22:58','2015-09-14 07:22:58',NULL),(94,'Courts Retail Indonesia',3,'Titi Yuniarti','null',1,NULL,'2015-09-14 07:25:07','2015-09-14 07:25:07',NULL),(95,'BPD Jambi',1,'Feri Martua Lubis','null',1,NULL,'2015-09-14 07:25:55','2015-09-14 07:25:55',NULL),(96,'Rima News Indonesia',4,'Nova Fardiany','null',1,NULL,'2015-09-14 07:26:57','2015-09-14 07:26:57',NULL),(97,'Asuransi Central Asia',1,'Novi Mayasari','null',1,NULL,'2015-09-14 07:27:38','2015-09-14 07:27:38',NULL),(98,'Intra Buana Info Dinamika (IBID - BPJS)',2,'Tsales Reza Nur Irfan','null',1,NULL,'2015-09-14 07:28:29','2015-09-14 07:28:29',NULL),(99,'Pilar Bina Cakrawala',7,'Amanda Chitra Maryami','null',1,1,'2015-09-14 07:29:44','2015-09-14 08:01:50',NULL),(100,'Tigaraksa Satria Tbk',3,'-','null',1,NULL,'2015-09-14 08:02:26','2015-09-14 08:02:26',NULL),(101,'Kementerian Riset Teknologi dan Perguruan Tinggi',2,'-','null',1,1,'2015-09-14 08:02:50','2015-09-14 08:03:54',NULL),(102,'HD Capital',1,'-','null',1,NULL,'2015-09-14 08:03:14','2015-09-14 08:03:14',NULL),(103,'Dinamika Mitra Sukses Makmur',7,'Budi Setiawan','null',1,NULL,'2015-09-14 08:04:37','2015-09-14 08:04:37',NULL),(104,'Mitra Valasindo',7,'Dwi Fatmarani Utari','null',1,NULL,'2015-09-14 08:05:50','2015-09-14 08:05:50',NULL),(106,'PT. Moor Sukses Internasional',3,'Ahmad Nurwakhid','null',1,NULL,'2015-09-14 08:06:55','2015-09-14 08:06:55',NULL),(138,'PT. Leighton Contractors Indonesia',6,'Reza Nugraha','null',1,1,'2015-09-14 08:17:59','2015-09-14 08:32:15',NULL),(139,'MCP Indo Utama',7,'Deddy Samantha','null',1,NULL,'2015-09-14 08:33:06','2015-09-14 08:33:06',NULL),(140,'Teknovatus Solusi Sejahtera',7,'Muhammad Mustofa','null',1,NULL,'2015-09-14 08:33:33','2015-09-14 08:33:33',NULL),(141,'Tech Mahindra Limited',7,'Sutajaya','null',1,NULL,'2015-09-14 08:34:12','2015-09-14 08:34:12',NULL),(142,'Square Gate One',1,'Nova Fardiany','null',1,NULL,'2015-09-14 08:34:50','2015-09-14 08:34:50',NULL),(143,'Mandiri Utama Finance',1,'Dwi Fatmarani Utari','null',1,NULL,'2015-09-14 08:35:41','2015-09-14 08:35:41',NULL),(144,'Korea Telcom',8,'Dovvy H. Kartiko','null',1,NULL,'2015-09-14 08:38:22','2015-09-14 08:38:22',NULL),(145,'Astra Graphia',7,'-','null',1,NULL,'2015-09-14 08:40:10','2015-09-14 08:40:10',NULL),(146,'BlueBird',9,'-','null',1,NULL,'2015-09-14 08:41:03','2015-09-14 08:41:03',NULL),(147,'Pelabuhan Indonesia II (PERSERO)',3,'-','null',1,NULL,'2015-09-14 08:42:15','2015-09-14 08:42:15',NULL),(148,'Toyota Astra Financial Service',1,'-','null',1,NULL,'2015-09-14 08:43:09','2015-09-14 08:43:09',NULL),(149,'BUT. Salamander Energy (BANGKANAI) LTD',6,'Wahyu Scorvians','null',1,NULL,'2015-09-14 08:43:39','2015-09-14 08:43:39',NULL),(150,'Bahana Sysfo Utama',7,'-','null',1,NULL,'2015-09-14 08:44:01','2015-09-14 08:44:01',NULL),(151,'Surya Artha Nusantara (SAN)',1,'-','null',1,NULL,'2015-09-14 08:44:17','2015-09-14 08:44:17',NULL),(152,'Dept Kelautan',2,'-','null',1,NULL,'2015-09-14 08:47:03','2015-09-14 08:47:03',NULL),(153,'Agansa Primatama',3,'-','null',1,NULL,'2015-09-14 08:47:16','2015-09-14 08:47:16',NULL),(154,'BPD Maluku',1,'-','null',1,1,'2015-09-14 08:47:30','2015-09-14 08:48:35',NULL),(155,'Hengki Mahendra / InfoSystem',7,'-','null',1,1,'2015-09-14 08:47:54','2015-09-14 08:49:26',NULL),(156,'USO / PLIK-MPLIK',8,'-','null',1,NULL,'2015-09-14 08:49:44','2015-09-14 08:49:44',NULL),(157,'Mandiri Tunas Finance',1,'-','null',1,NULL,'2015-09-14 08:49:59','2015-09-14 08:49:59',NULL),(158,'Bendahara Pengeluaran DPKD Kota Serang',2,'-','null',1,NULL,'2015-09-14 08:50:15','2015-09-14 08:50:15',NULL),(159,'Pilar Wahana Arta',7,'-','null',1,NULL,'2015-09-14 08:50:30','2015-09-14 08:50:30',NULL),(160,'Cloud LA',7,'-','null',1,NULL,'2015-09-14 08:51:53','2015-09-14 08:51:53',NULL),(161,'Artajasa',7,'-','null',1,NULL,'2015-09-14 08:52:07','2015-09-14 08:52:07',NULL),(162,'Layanan Imedia',4,'-','null',1,NULL,'2015-09-14 08:52:38','2015-09-14 08:52:38',NULL),(163,'Winansis Amenangi Iharta',7,'-','null',1,NULL,'2015-09-14 08:57:54','2015-09-14 08:57:54',NULL),(164,'Handaru Pratama Mandiri',7,'-','null',1,NULL,'2015-09-14 08:58:44','2015-09-14 08:58:44',NULL),(165,'Internal TI',7,'-','null',1,NULL,'2015-09-14 08:59:01','2015-09-14 08:59:01',NULL),(166,'Mitranet Software Online',7,'-','null',1,NULL,'2015-09-14 08:59:35','2015-09-14 08:59:35',NULL),(168,'Intra Buana Info Dinamika  (SIKM Bukopin)',1,'-','null',1,1,'2015-09-14 09:00:40','2015-09-14 09:01:54',NULL),(169,'G4S',7,'-','null',1,NULL,'2015-09-14 09:01:58','2015-09-14 03:42:12','2015-09-14 03:42:12'),(170,'Mandamalaya Mitra Sejahtera',7,'-','null',1,NULL,'2015-09-14 09:02:23','2015-09-14 09:02:23',NULL),(171,'Data Aksara Sangkuriang',7,'-','null',1,NULL,'2015-09-14 09:02:33','2015-09-14 09:02:33',NULL),(172,'Perusahaan pengelola aset (Persero)/PPA',2,'-','null',1,NULL,'2015-09-14 09:02:49','2015-09-14 09:02:49',NULL),(173,'Rumah Zakat (Citra Niaga Abadi)',1,'-','null',1,NULL,'2015-09-14 09:03:12','2015-09-14 09:03:12',NULL),(175,'Koperasi Wahana Mitra Kencana',1,'-','null',1,NULL,'2015-09-14 09:04:00','2015-09-14 09:04:00',NULL),(176,'Kartuku',7,'-','null',1,NULL,'2015-09-14 09:04:21','2015-09-14 09:04:21',NULL),(177,'Sangkuriang',7,'-','null',1,NULL,'2015-09-14 09:04:33','2015-09-14 09:04:33',NULL),(178,'BPR Cicurug',1,'-','null',1,NULL,'2015-09-14 09:04:54','2015-09-14 09:04:54',NULL),(179,'Pratesis',7,'-','null',1,NULL,'2015-09-14 09:05:15','2015-09-14 09:05:15',NULL),(180,'Exacon Guna Bangsa',7,'-','null',1,NULL,'2015-09-14 09:06:01','2015-09-14 09:06:01',NULL),(181,'Penanaman Modal Madani (PNM)',1,'-','null',1,NULL,'2015-09-14 09:06:29','2015-09-14 03:43:14','2015-09-14 03:43:14'),(182,'Handy Indah Solusi',7,'-','null',1,NULL,'2015-09-14 09:06:56','2015-09-14 09:06:56',NULL),(183,'PT. Disa Pratama Mandiri',7,'-','null',1,NULL,'2015-09-14 09:07:10','2015-09-14 09:07:10',NULL),(184,'Aneka Tambang (Antam)',6,'-','null',1,NULL,'2015-09-14 09:08:18','2015-09-14 09:08:18',NULL),(185,'Indonesia Chemical Alumina',3,'Nuritha Yurianthi','null',1,NULL,'2015-09-14 09:09:08','2015-09-14 09:09:08',NULL),(186,'Hughes Global Services',7,'Raden Hana Permana','null',1,NULL,'2015-09-14 09:09:37','2015-09-14 09:09:37',NULL),(187,'I Cont Plus (Indonesia Comnets Plus)',8,'-','null',1,NULL,'2015-09-14 09:11:37','2015-09-14 09:11:37',NULL),(188,'Indosat',8,'R. Dovvy H. Kartiko','null',1,1,'2015-09-14 09:13:36','2015-09-14 09:21:01','2015-09-14 09:21:01'),(189,'Telkom',8,'-','null',1,NULL,'2015-09-14 09:14:14','2015-09-14 09:14:14',NULL),(190,'Biznet/ PT. Supra Prima Nusantara',8,'-','null',1,NULL,'2015-09-14 09:14:47','2015-09-14 09:14:47',NULL),(191,'Mora Telematika Indonesia',8,'-','null',1,NULL,'2015-09-14 09:15:16','2015-09-14 09:15:16',NULL),(192,'Firstmedia/Link Net Tbk',8,'-','null',1,NULL,'2015-09-14 09:15:27','2015-09-14 09:15:27',NULL),(193,'Indointernet (Indonet)',8,'-','null',1,NULL,'2015-09-14 09:15:38','2015-09-14 09:15:38',NULL),(194,'Iforte Global Internet',8,'-','null',1,NULL,'2015-09-14 09:15:47','2015-09-14 09:15:47',NULL),(195,'Fiber Networks Indonesia',8,'-','null',1,NULL,'2015-09-14 09:16:35','2015-09-14 09:16:35',NULL);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers_segment`
--

DROP TABLE IF EXISTS `customers_segment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers_segment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `segment_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_segment_segment_name_unique` (`segment_name`),
  KEY `customers_segment_user_id_foreign` (`user_id`),
  KEY `customers_segment_user_id_edited_foreign` (`user_id_edited`),
  CONSTRAINT `customers_segment_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `customers_segment_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers_segment`
--

LOCK TABLES `customers_segment` WRITE;
/*!40000 ALTER TABLE `customers_segment` DISABLE KEYS */;
INSERT INTO `customers_segment` VALUES (1,'Finance',NULL,NULL,'2015-09-14 05:09:53','2015-09-14 05:09:53',NULL),(2,'Government',NULL,NULL,'2015-09-14 05:09:53','2015-09-14 05:09:53',NULL),(3,'Manufacture & Trading',NULL,NULL,'2015-09-14 05:09:53','2015-09-14 05:09:53',NULL),(4,'Media',NULL,NULL,'2015-09-14 05:09:53','2015-09-14 05:09:53',NULL),(5,'Partnership',NULL,NULL,'2015-09-14 05:09:53','2015-09-14 05:09:53',NULL),(6,'Resources',NULL,NULL,'2015-09-14 05:09:53','2015-09-14 05:09:53',NULL),(7,'Service',NULL,NULL,'2015-09-14 05:09:53','2015-09-14 05:09:53',NULL),(8,'Telecommunication',NULL,NULL,'2015-09-14 05:09:53','2015-09-14 05:09:53',NULL),(9,'Transportation',NULL,NULL,'2015-09-14 05:09:53','2015-09-14 05:09:53',NULL);
/*!40000 ALTER TABLE `customers_segment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_customers`
--

DROP TABLE IF EXISTS `dc_customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  `dc_location` int(10) unsigned NOT NULL,
  `service_type` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `ip_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `netmask` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gateway` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rack_location` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `u_location` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `port` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fpb_date` date DEFAULT NULL,
  `of_date` date DEFAULT NULL,
  `ob_date` date DEFAULT NULL,
  `power` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `supporting_cid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dc_customers_cid_unique` (`cid`),
  KEY `dc_customers_customer_id_foreign` (`customer_id`),
  KEY `dc_customers_dc_location_foreign` (`dc_location`),
  KEY `dc_customers_service_type_foreign` (`service_type`),
  KEY `dc_customers_user_id_foreign` (`user_id`),
  KEY `dc_customers_user_id_edited_foreign` (`user_id_edited`),
  CONSTRAINT `dc_customers_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `dc_customers_dc_location_foreign` FOREIGN KEY (`dc_location`) REFERENCES `dc_location` (`id`),
  CONSTRAINT `dc_customers_service_type_foreign` FOREIGN KEY (`service_type`) REFERENCES `service_type` (`id`),
  CONSTRAINT `dc_customers_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `dc_customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_customers`
--

LOCK TABLES `dc_customers` WRITE;
/*!40000 ALTER TABLE `dc_customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `dc_customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_location`
--

DROP TABLE IF EXISTS `dc_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_location` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dc_location_location_name_unique` (`location_name`),
  KEY `dc_location_user_id_foreign` (`user_id`),
  KEY `dc_location_user_id_edited_foreign` (`user_id_edited`),
  CONSTRAINT `dc_location_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `dc_location_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_location`
--

LOCK TABLES `dc_location` WRITE;
/*!40000 ALTER TABLE `dc_location` DISABLE KEYS */;
INSERT INTO `dc_location` VALUES (1,'TBS Lt.1',NULL,NULL,'2015-09-14 05:09:53','2015-09-14 05:09:53',NULL),(2,'TBS Lt.2',NULL,NULL,'2015-09-14 05:09:53','2015-09-14 05:09:53',NULL),(3,'TBS Lt.3',NULL,NULL,'2015-09-14 05:09:53','2015-09-14 05:09:53',NULL),(4,'BDG Lt.1',NULL,NULL,'2015-09-14 05:09:53','2015-09-14 05:09:53',NULL),(5,'BDG Lt.2',NULL,NULL,'2015-09-14 05:09:53','2015-09-14 05:09:53',NULL);
/*!40000 ALTER TABLE `dc_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lang_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `languages_name_unique` (`name`),
  UNIQUE KEY `languages_lang_code_unique` (`lang_code`),
  KEY `languages_user_id_foreign` (`user_id`),
  KEY `languages_user_id_edited_foreign` (`user_id_edited`),
  CONSTRAINT `languages_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `languages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,NULL,'English','en','flag-gb',NULL,NULL,'2015-09-14 05:09:53','2015-09-14 05:09:53',NULL),(2,NULL,'Српски','sr','flag-sr',NULL,NULL,'2015-09-14 05:09:53','2015-09-14 05:09:53',NULL),(3,NULL,'Bosanski','bs','flag-bs',NULL,NULL,'2015-09-14 05:09:53','2015-09-14 05:09:53',NULL);
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2014_10_18_195027_create_languages_table',1),('2014_10_18_225005_create_article_categories_table',1),('2014_10_18_225505_create_articles_table',1),('2014_10_18_225928_create_photo_albums_table',1),('2014_10_18_230227_create_video_albums_table',1),('2014_10_18_231619_create_photos_table',1),('2014_10_18_232019_create_videos_table',1),('2015_07_27_035032_entrust_setup_tables',1),('2015_07_28_023344_create_customers_segment_table',1),('2015_07_28_050446_create_customers_table',1),('2015_08_01_033551_dc_location_table',1),('2015_08_01_224457_create_servicetype_table',1),('2015_08_18_062958_create_dc_customers_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo_albums`
--

DROP TABLE IF EXISTS `photo_albums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photo_albums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` int(10) unsigned NOT NULL,
  `position` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `folder_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `photo_albums_language_id_foreign` (`language_id`),
  KEY `photo_albums_user_id_foreign` (`user_id`),
  KEY `photo_albums_user_id_edited_foreign` (`user_id_edited`),
  CONSTRAINT `photo_albums_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  CONSTRAINT `photo_albums_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `photo_albums_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo_albums`
--

LOCK TABLES `photo_albums` WRITE;
/*!40000 ALTER TABLE `photo_albums` DISABLE KEYS */;
/*!40000 ALTER TABLE `photo_albums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` int(10) unsigned NOT NULL,
  `position` int(11) DEFAULT NULL,
  `slider` tinyint(1) DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `photo_album_id` int(10) unsigned DEFAULT NULL,
  `album_cover` tinyint(1) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `photos_language_id_foreign` (`language_id`),
  KEY `photos_photo_album_id_foreign` (`photo_album_id`),
  KEY `photos_user_id_foreign` (`user_id`),
  KEY `photos_user_id_edited_foreign` (`user_id_edited`),
  CONSTRAINT `photos_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  CONSTRAINT `photos_photo_album_id_foreign` FOREIGN KEY (`photo_album_id`) REFERENCES `photo_albums` (`id`) ON DELETE SET NULL,
  CONSTRAINT `photos_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `photos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_type`
--

DROP TABLE IF EXISTS `service_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `service_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `it_services` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `service_type_service_name_unique` (`service_name`),
  KEY `service_type_user_id_foreign` (`user_id`),
  KEY `service_type_user_id_edited_foreign` (`user_id_edited`),
  CONSTRAINT `service_type_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `service_type_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_type`
--

LOCK TABLES `service_type` WRITE;
/*!40000 ALTER TABLE `service_type` DISABLE KEYS */;
INSERT INTO `service_type` VALUES (1,'Colocation',1,NULL,NULL,'2015-09-14 05:09:53','2015-09-14 05:09:53',NULL),(2,'Facility Management',1,NULL,NULL,'2015-09-14 05:09:53','2015-09-14 05:09:53',NULL),(3,'DRC',1,NULL,NULL,'2015-09-14 05:09:53','2015-09-14 05:09:53',NULL),(4,'Hosting',1,NULL,NULL,'2015-09-14 05:09:53','2015-09-14 05:09:53',NULL);
/*!40000 ALTER TABLE `service_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin User','admin_user','admin@admin.com','$2y$10$o6ACi15LJNlrytUaTsT9WOcPecuCD7o5XT1BClAPOoJvlvuHh419u','f5dfd5d7c56253169d7a6cc62cb75255',1,1,'1Nr751uuY5OSBMtfD1V1XRs79hcLxNULW7NW7gN0I36KlBAmnsM2WU5sY9O5','2015-09-14 05:09:53','2015-09-14 04:24:24',NULL),(2,'Test User','test_user','user@user.com','$2y$10$HIad286OI2h5uH3jYEdUIumTAFWpUQZKue5uGz97Pk79QTHicf2c.','5cec56d614f41dc26182a0d3daf274e6',1,0,'mvUAw6dO4NwLbdsPQhjDFjmhSqjefZptKRYBmyGq4Q073rmKXfuPVKMKkyZe','2015-09-14 05:09:53','2015-09-14 04:24:59',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video_albums`
--

DROP TABLE IF EXISTS `video_albums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video_albums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` int(10) unsigned NOT NULL,
  `position` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `folder_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `video_albums_language_id_foreign` (`language_id`),
  KEY `video_albums_user_id_foreign` (`user_id`),
  KEY `video_albums_user_id_edited_foreign` (`user_id_edited`),
  CONSTRAINT `video_albums_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  CONSTRAINT `video_albums_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `video_albums_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video_albums`
--

LOCK TABLES `video_albums` WRITE;
/*!40000 ALTER TABLE `video_albums` DISABLE KEYS */;
/*!40000 ALTER TABLE `video_albums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` int(10) unsigned NOT NULL,
  `position` int(11) DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `youtube` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_album_id` int(10) unsigned DEFAULT NULL,
  `album_cover` tinyint(1) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `videos_language_id_foreign` (`language_id`),
  KEY `videos_video_album_id_foreign` (`video_album_id`),
  KEY `videos_user_id_foreign` (`user_id`),
  KEY `videos_user_id_edited_foreign` (`user_id_edited`),
  CONSTRAINT `videos_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  CONSTRAINT `videos_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `videos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `videos_video_album_id_foreign` FOREIGN KEY (`video_album_id`) REFERENCES `video_albums` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-15  7:58:44
