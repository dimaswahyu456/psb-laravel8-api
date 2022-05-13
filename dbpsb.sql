/*
SQLyog Ultimate v10.42 
MySQL - 5.5.5-10.4.21-MariaDB : Database - db_psb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
USE `db_psb`;

/*Table structure for table `kecamatan` */

DROP TABLE IF EXISTS `kecamatan`;

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kecamatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kecamatan` */

/*Table structure for table `prestasi` */

DROP TABLE IF EXISTS `prestasi`;

CREATE TABLE `prestasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prestasi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `prestasi` */

/*Table structure for table `sekolah` */

DROP TABLE IF EXISTS `sekolah`;

CREATE TABLE `sekolah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sekolah` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `id_kec` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kec` (`id_kec`),
  CONSTRAINT `sekolah_ibfk_1` FOREIGN KEY (`id_kec`) REFERENCES `kecamatan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `sekolah` */

/*Table structure for table `siswas` */

DROP TABLE IF EXISTS `siswas`;

CREATE TABLE `siswas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nisn` varchar(18) DEFAULT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `alamat_siswa` text DEFAULT NULL,
  `jenis_kelamin` varchar(9) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `tempat_lahir` varchar(25) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `id_sekolah` int(11) DEFAULT NULL,
  `id_prestasi` int(11) DEFAULT NULL,
  `id_wali` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id_sekolah` (`id_sekolah`),
  KEY `id_prestasi` (`id_prestasi`),
  KEY `id_wali` (`id_wali`),
  CONSTRAINT `siswas_ibfk_1` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id`),
  CONSTRAINT `siswas_ibfk_2` FOREIGN KEY (`id_prestasi`) REFERENCES `prestasi` (`id`),
  CONSTRAINT `siswas_ibfk_3` FOREIGN KEY (`id_wali`) REFERENCES `walis` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

/*Data for the table `siswas` */

insert  into `siswas`(`id`,`nisn`,`nama_siswa`,`alamat_siswa`,`jenis_kelamin`,`agama`,`tempat_lahir`,`tanggal_lahir`,`id_sekolah`,`id_prestasi`,`id_wali`,`updated_at`,`created_at`) values (2,'123','randy','sby','L','islam',NULL,NULL,NULL,NULL,1,NULL,NULL),(3,'456','fitroh','gresik','L','islam',NULL,NULL,NULL,NULL,1,NULL,NULL),(4,'789','vicky','gresik','L','islam',NULL,NULL,NULL,NULL,2,NULL,NULL),(5,'011','yanto','sby','L','islam','null',NULL,NULL,NULL,NULL,'2022-05-12 07:46:24','2022-05-12 07:46:24');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(8) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `users_role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

/*Table structure for table `users_role` */

DROP TABLE IF EXISTS `users_role`;

CREATE TABLE `users_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `users_role` */

/*Table structure for table `walis` */

DROP TABLE IF EXISTS `walis`;

CREATE TABLE `walis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wali_guru` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `walis` */

insert  into `walis`(`id`,`wali_guru`,`updated_at`,`created_at`) values (1,'Suryo Atmojo',NULL,NULL),(2,'Suzanna',NULL,NULL),(3,'dimas','2022-05-12 07:20:08','2022-05-12 07:20:08');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
