/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.5.5-10.1.37-MariaDB : Database - buletin
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`buletin` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `buletin`;

/*Table structure for table `t_artikel` */

DROP TABLE IF EXISTS `t_artikel`;

CREATE TABLE `t_artikel` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `tittle_artikel` varchar(255) DEFAULT NULL,
  `descript_artikel` longtext,
  `edisi` varchar(255) DEFAULT NULL,
  `pict_artikel` varchar(255) DEFAULT NULL,
  `viwers` bigint(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

/*Data for the table `t_artikel` */

insert  into `t_artikel`(`id`,`tittle_artikel`,`descript_artikel`,`edisi`,`pict_artikel`,`viwers`,`file`,`created_at`,`updated_at`) values (29,'Buletin Pusat Fasilitasi Infrastruktur Daerah ','Pusat Fasilitasi Infrastruktur Daerah bertugas untuk  meningkatkan kemantapan infrastruktur PUPR daerah  dalam mewujudkan ketahanan pangan, kemandirian  pangan dan ketahanan air; konektivitas dan aksesibilitas  bagi penguatan daya saing; dan layanan infrastruktur dasar  sehingga dapat memenuhi kesejahteraan masyarakat. Pusat  Fasilitasi Infrastruktur Daerah berusaha untuk terus menerus  melaksanakan kegiatan mulai dari tahap perencanaan;  pemrograman; pembinaan dan pengawasan; pemantauan,  evaluasi dan pelaporan Infrastruktur daerah demi tercapainya  tugas diatas agar dapat memenuhi kesejahteraan masyarakat di  Indonesia. Selamat membaca.  ','1','1661151170_cover.png',10,'1661151170_buletin.pdf','2022-08-22 03:10:27','2022-08-22 08:52:50'),(30,'Penyederhanaan Birokrasi Di Kementerian PUPR Melaluai Penyetaraan  Jabatan Struktural Menjadi Jabatan Fungsionnal','Pusat Fasilitasi Infrastruktur Daerah (PFID) bertugas untuk meningkatkan kemantapan infrastruktur PUPR daerah  dalam mewujudkan ketahanan pangan, kemandirian pangan dan ketahanan air; konektivitas dan aksesibilitas bagi  penguatan daya saing; dan layanan infrastruktur dasar sehingga dapat memenuhi kesejahteraan masyarakat.  PFID berusaha untuk terus menerus melaksanakan kegiatan mulai dari tahap perencanaan; pemrograman;  pembinaan dan pengawasan; pemantauan, evaluasi dan pelaporan Infrastruktur daerah demi tercapainya tugas diatas  agar dapat memenuhi kesejahteraan masyarakat di Indonesia.','2','1661151328_cover.jpg',3,'1661151328_buletin.pdf','2022-08-22 03:38:26','2022-08-22 08:55:28'),(31,'Rapat Kerja DAK Fisik Infrastruktur PUPR 2020','Pusat Fasilitasi Infrastruktur Daerah (PFID) bertugas untuk meningkatkan kemantapan infrastruktur PUPR  daerah dalam mewujudkan ketahanan pangan menuju kemandirian pangan dan ketahanan air; konektivitas  dan aksesibilitas bagi penguatan daya saing; dan layanan infrastruktur dasar sehingga dapat memenuhi  kesejahteraan masyarakat. PFID berusaha untuk terus menerus melaksanakan kegiatan mulai dari tahap  perencanaan; pemrograman; pembinaan dan pengawasan; pemantauan, evaluasi dan pelaporan Infrastruktur daerah  demi tercapainya tugas diatas agar dapat meningkatkan kualitas penyelenggaraan Infrastruktur PUPR di daerah.','3','1661151454_cover.jpg',2,'1661151454_buletin.pdf','2022-08-22 03:42:13','2022-08-22 08:57:34'),(32,'Monitoring dan Evaluasi Pelaksanaan DAK Bidang Irigasi, Jalan, Perumahan dan Permukiman TA 2020','Psat Fasilitasi Infrastruktur Daerah (PFID) bertugas untuk meningkatkan kemantapan infrastruktur PUPR daerah dalam mewujudkan ketahanan pangan, kemandirian pangan dan ketahanan air;  konektivitas dan aksesibilitas bagi penguatan daya saing; dan layanan infrastruktur dasar sehingga  dapat memenuhi kesejahteraan masyarakat. PFID berusaha untuk terus menerus melaksanakan  kegiatan mulai dari tahap perencanaan; pemrograman; pembinaan dan pengawasan; pemantauan, evaluasi  dan pelaporan Infrastruktur daerah demi tercapainya tugas diatas agar dapat memenuhi kesejahteraan  masyarakat di Indonesia.','4','1661151620_cover.jpg',2,'1661151620_buletin.pdf','2022-08-22 03:47:42','2022-08-22 09:00:20'),(33,'Pengelolaan DAK Infrastruktur Dari Sudut Pandang Sekretaris Jendral Kementerian PUPR','Pusat Fasilitasi Infrastruktur Daerah (PFID) bertugas untuk meningkatkan kemantapan infrastruktur  PUPR daerah dalam mewujudkan ketahanan pangan, kemandirian pangan dan ketahanan air;  konektivitas dan aksesibilitas bagi penguatan daya saing; dan layanan infrastruktur dasar sehingga  dapat memenuhi kesejahteraan masyarakat. PFID berusaha untuk terus menerus melaksanakan  kegiatan mulai dari tahap perencanaan; pemrograman; pembinaan dan pengawasan; pemantauan, evaluasi  dan pelaporan Infrastruktur daerah demi tercapainya tugas diatas agar dapat memenuhi kesejahteraan  masyarakat di Indonesia.','5','1661151968_cover.jpg',1,'1661151968_buletin.pdf','2022-08-22 03:55:37','2022-08-22 09:06:08'),(34,'Strategi Penetapan Alokasi DAK Fisik Infratruktur PUPR Untuk Pencapaian Outcome dan Impact yang signifikan','Pusat Fasilitasi Infrastruktur Daerah (PFID) bertugas untuk meningkatkan kemantapan infrastruktur  PUPR daerah dalam mewujudkan ketahanan pangan, kemandirian pangan dan ketahanan air;  konektivitas dan aksesibilitas bagi penguatan daya saing; dan layanan infrastruktur dasar sehingga  dapat memenuhi kesejahteraan masyarakat. PFID berusaha untuk terus menerus melaksanakan  kegiatan mulai dari tahap perencanaan; pemrograman; pembinaan dan pengawasan; pemantauan, evaluasi  dan pelaporan Infrastruktur daerah demi tercapainya tugas diatas agar dapat memenuhi kesejahteraan  masyarakat di Indonesia.','6','1661151811_cover.jpg',4,'1661151811_buletin.pdf','2022-08-22 03:57:27','2022-08-22 09:03:31'),(35,'Membangun Infrastruktur PUPR Ke Pelosok Negeri','Pusat Fasilitasi Infrastruktur Daerah (PFID) bertugas untuk meningkatkan kemantapan infrastruktur  PUPR daerah dalam mewujudkan ketahanan pangan, kemandirian pangan dan ketahanan air;  konektivitas dan aksesibilitas bagi penguatan daya saing; dan layanan infrastruktur dasar sehingga  dapat memenuhi kesejahteraan masyarakat. PFID berusaha untuk terus menerus melaksanakan  kegiatan mulai dari tahap perencanaan; pemrograman; pembinaan dan pengawasan; pemantauan, evaluasi  dan pelaporan Infrastruktur daerah demi tercapainya tugas diatas agar dapat memenuhi kesejahteraan  masyarakat di Indonesia.','7','1661151990_cover.jpg',1,'1661151990_buletin.pdf','2022-08-22 03:59:42','2022-08-22 09:06:30'),(36,'Konsultasi Program DAK Fisik Infrastruktur PUPR Tahun Anggaran 2022','Pusat Fasilitasi Infrastruktur Daerah (PFID) bertugas untuk meningkatkan kemantapan infrastruktur  PUPR daerah dalam mewujudkan ketahanan pangan, kemandirian pangan dan ketahanan air;  konektivitas dan aksesibilitas bagi penguatan daya saing; dan layanan infrastruktur dasar sehingga  dapat memenuhi kesejahteraan masyarakat. PFID berusaha untuk terus menerus melaksanakan  kegiatan mulai dari tahap perencanaan; pemrograman; pembinaan dan pengawasan; pemantauan, evaluasi  dan pelaporan Infrastruktur daerah demi tercapainya tugas diatas agar dapat memenuhi kesejahteraan  masyarakat di Indonesia.','8','1661152104_cover.jpg',2,'1661152104_buletin.pdf','2022-08-22 04:01:45','2022-08-22 09:08:24'),(37,'Rapat Koordinasi Teknis Perencanaan Pembangunan (Rakortekrenbang) TA 2022','Pusat Fasilitasi Infrastruktur Daerah (PFID) bertugas untuk meningkatkan kemantapan infrastruktur PUPR  daerah dalam mewujudkan ketahanan pangan, kemandirian pangan dan ketahanan air; konektivitas  dan aksesibilitas bagi penguatan daya saing; dan layanan infrastruktur dasar sehingga dapat memenuhi  kesejahteraan masyarakat. PFID berusaha untuk terus menerus melaksanakan kegiatan mulai dari tahap  perencanaan; pemrograman; pembinaan dan pengawasan; pemantauan, evaluasi dan pelaporan Infrastruktur daerah  demi tercapainya tugas diatas agar dapat memenuhi kesejahteraan masyarakat di Indonesia.','9','1661152148_cover.jpg',4,'1661152148_buletin.pdf','2022-08-22 04:04:09','2022-08-22 09:09:08'),(38,'Pendampingan  Pemda Terhadap Pelaporan Progres DAK Fisik PUPR TA. 2022 ','Pusat Fasilitasi Infrastruktur Daerah (PFID) berkomitmen mendukung peningkatan kemantapan infrastruktur PUPR daerah dalam mewujudkan ketahanan pangan; konektivitas dan aksesibilitas bagi penguatan daya saing; dan layanan infrastruktur dasar sehingga dapat memenuhi kesejahteraan masyarakat. PFID berusaha untuk terus menerus melaksanakan pembinaan mulai dari tahap perencanaan; pemrograman; pembinaan dan pengawasan; pemantauan, evaluasi dan pelaporan Infrastruktur daerah demi tercapainya layanan infrastruktur yang handal dan mendukung  pemenuhan kebutuhan masyarakat.','Volume 3, Nomor 2, Juli 2022','1661150706_cover.jpg',7,'1661150706_buletin.pdf','2022-08-22 08:45:06','2022-08-22 08:49:34');

/*Table structure for table `t_home` */

DROP TABLE IF EXISTS `t_home`;

CREATE TABLE `t_home` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `header_tittle` varchar(255) DEFAULT NULL,
  `header_descript` varchar(255) DEFAULT NULL,
  `address` text,
  `email` varchar(100) DEFAULT NULL,
  `tlp` varchar(15) DEFAULT NULL,
  `jml_pengunjung` bigint(255) DEFAULT NULL,
  `tittle_content` varchar(255) DEFAULT NULL,
  `decript_content` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `t_home` */

insert  into `t_home`(`id`,`header_tittle`,`header_descript`,`address`,`email`,`tlp`,`jml_pengunjung`,`tittle_content`,`decript_content`,`created_at`,`updated_at`) values (1,'.','.','Gedung Heritage PUPR Lt.4 \nJl. Pattimura No.20,\nKebayoran Baru Jakarta Selatan, 12110,','pfid.setjen@pu.go.id','089530518554',265,'BULETIN','PUSAT FASILITASI INFRASTRUKTUR DAERAH','2022-08-06 16:39:33','2022-08-22 12:11:22'),(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `t_imgbody` */

DROP TABLE IF EXISTS `t_imgbody`;

CREATE TABLE `t_imgbody` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `t_imgbody` */

/*Table structure for table `t_kritik` */

DROP TABLE IF EXISTS `t_kritik`;

CREATE TABLE `t_kritik` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `message` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `t_kritik` */

insert  into `t_kritik`(`id`,`name`,`email`,`hp`,`message`,`created_at`,`updated_at`) values (1,'test','arie@gmail.com','089530518554','tessssst gass','2022-08-22 02:30:35',NULL);

/*Table structure for table `t_picttittle` */

DROP TABLE IF EXISTS `t_picttittle`;

CREATE TABLE `t_picttittle` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `name_pict` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `t_picttittle` */

insert  into `t_picttittle`(`id`,`name_pict`,`created_at`,`updated_at`) values (12,'1661162439_picture.jpg','2022-08-22 12:00:39',NULL);

/*Table structure for table `t_role` */

DROP TABLE IF EXISTS `t_role`;

CREATE TABLE `t_role` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `t_role` */

insert  into `t_role`(`id`,`name`,`created_at`,`updated_at`) values (1,'Admin','2022-08-07 06:42:10',NULL),(2,'Pengunjung','2022-08-07 06:59:21','2022-08-07 04:30:12');

/*Table structure for table `t_users` */

DROP TABLE IF EXISTS `t_users`;

CREATE TABLE `t_users` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `tlp` varchar(15) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_roll` bigint(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `t_users` */

insert  into `t_users`(`id`,`name`,`tlp`,`username`,`password`,`user_roll`,`created_at`,`updated_at`) values (1,'pfid','089530518554','pfid','$2y$10$18iy/Xy6k4kDZpcpAJkZJeFxOmiCfn9w50yPDTL9.QiCql83kmlK6',1,'2022-08-07 05:17:58','2022-08-07 06:32:41'),(2,NULL,NULL,NULL,'$2y$10$gIMFz6HuVTVeX3Ic8ZGCCuR1VI6pZB/oAN/BuByxp2OkzsouxLt1C',NULL,'2022-08-08 09:31:28',NULL),(3,NULL,NULL,NULL,'$2y$10$HG2UuHwsKTsN17v9Rq8tieMGuUlBJg5nxssS5a1oBVmRKh6C1OUbO',NULL,'2022-08-08 09:31:52',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
