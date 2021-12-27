/*
SQLyog Trial v13.1.8 (64 bit)
MySQL - 10.4.22-MariaDB : Database - dsm51
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dsm51` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `dsm51`;

/*Table structure for table `asignaturas` */

DROP TABLE IF EXISTS `asignaturas`;

CREATE TABLE `asignaturas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la tabla asignaturas',
  `carrera_id` int(10) unsigned NOT NULL COMMENT 'Identificador relacionado con la tabla carreras',
  `asignatura` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nombre de la asignatura',
  `abreviatura` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Abreviatura del nombre de la asignatura',
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'La asignatura esta disponible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `asignaturas_api_token_unique` (`api_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `asignaturas` */

insert  into `asignaturas`(`id`,`carrera_id`,`asignatura`,`abreviatura`,`api_token`,`estatus`,`created_at`,`updated_at`) values 
(1,1,'Desarrollo de Aplicaciones Móviles','DAM','b53ea24a1d83a9bae73b2432e9b4e7c7ec8e0ce80a81906783eb4863f5475765','activo','2021-12-26 21:56:23','2021-12-26 21:56:23');

/*Table structure for table `carreras` */

DROP TABLE IF EXISTS `carreras`;

CREATE TABLE `carreras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la tabla carreras',
  `direccion_id` int(10) unsigned NOT NULL COMMENT 'Identificador relacionado con la tabla direcciones',
  `carrera` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nombre de la carrera',
  `abreviatura` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Abreviatura del nombre de la carrera',
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'La carrera esta disponible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `carreras_api_token_unique` (`api_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `carreras` */

insert  into `carreras`(`id`,`direccion_id`,`carrera`,`abreviatura`,`api_token`,`estatus`,`created_at`,`updated_at`) values 
(1,1,'Desarrollo de Software Multiplataforma','DSM','b53ea24a1d83a9bae73b2432e9b4e7c7ec8e0ce80a81906783eb4863f5475765','activo','2021-12-26 21:56:23','2021-12-26 21:56:23');

/*Table structure for table `cuatrimestres` */

DROP TABLE IF EXISTS `cuatrimestres`;

CREATE TABLE `cuatrimestres` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la tabla cuatrimestres',
  `cuatrimestre` int(11) NOT NULL COMMENT 'Numero del cuatrimestre',
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_inicio` date NOT NULL COMMENT 'Fecha de Inicio',
  `fecha_termino` date NOT NULL COMMENT 'Fecha de termino',
  `estatus` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'El cuatrimestre esta disponible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cuatrimestres_api_token_unique` (`api_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cuatrimestres` */

insert  into `cuatrimestres`(`id`,`cuatrimestre`,`api_token`,`fecha_inicio`,`fecha_termino`,`estatus`,`created_at`,`updated_at`) values 
(1,1,'b53ea24a1d83a9bae73b2432e9b4e7c7ec8e0ce80a81906783eb4863f5475765','2020-09-03','2020-12-22','activo','2021-12-26 21:56:24','2021-12-26 21:56:24');

/*Table structure for table `dias_feriados` */

DROP TABLE IF EXISTS `dias_feriados`;

CREATE TABLE `dias_feriados` (
  `dia_feriado` date NOT NULL COMMENT 'dias Feriados',
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `dias_feriados_api_token_unique` (`api_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dias_feriados` */

insert  into `dias_feriados`(`dia_feriado`,`api_token`,`created_at`,`updated_at`) values 
('2020-09-03','b53ea24a1d83a9bae73b2432e9b4e7c7ec8e0ce80a81906783eb4863f5475765','2021-12-26 21:56:24','2021-12-26 21:56:24');

/*Table structure for table `direcciones` */

DROP TABLE IF EXISTS `direcciones`;

CREATE TABLE `direcciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la tabla direcciones',
  `direccion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nombre de la direccion',
  `abreviatura` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Abreviatura del nombre de la direccion',
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'La direccion esta disponible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `direcciones_api_token_unique` (`api_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `direcciones` */

insert  into `direcciones`(`id`,`direccion`,`abreviatura`,`api_token`,`estatus`,`created_at`,`updated_at`) values 
(1,'Tecnologías de la Información y la Comunicación','TIC','b53ea24a1d83a9bae73b2432e9b4e7c7ec8e0ce80a81906783eb4863f5475765','activo','2021-12-26 21:56:23','2021-12-26 21:56:23');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `laboratorios` */

DROP TABLE IF EXISTS `laboratorios`;

CREATE TABLE `laboratorios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la tabla laboratorios',
  `laboratorio` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nombre de la laboratorio',
  `abreviatura` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Abreviatura del nombre de la laboratorio',
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'La laboratorio esta disponible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `laboratorios_api_token_unique` (`api_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `laboratorios` */

insert  into `laboratorios`(`id`,`laboratorio`,`abreviatura`,`api_token`,`estatus`,`created_at`,`updated_at`) values 
(1,'Laboratorio 3','Lab 3','b53ea24a1d83a9bae73b2432e9b4e7c7ec8e0ce80a81906783eb4863f5475765','activo','2021-12-26 21:56:23','2021-12-26 21:56:23');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2020_02_22_015905_update_users_table_01',1),
(5,'2020_02_22_023146_create__direcciones_table',1),
(6,'2020_02_22_023246_update__direcciones_table',1),
(7,'2020_02_22_030528_create__carreras_table',1),
(8,'2020_02_22_030634_update_carreras_table',1),
(9,'2020_02_24_172807_create__asignaturas_table',1),
(10,'2020_02_24_172859_update__asignaturas_table',1),
(11,'2020_02_28_011126_create_laboratorios_table',1),
(12,'2020_02_28_011927_update_laboratorios_table',1),
(13,'2020_02_28_020337_create_cuatrimestres_table',1),
(14,'2020_02_28_020634_update_cuatrimestres_table',1),
(15,'2020_02_28_223222_create_dias_feriados_table',1),
(16,'2020_02_28_232119_update_dias_feriados_table',1),
(17,'2020_02_28_232430_create_unidades_de_medida_table',1),
(18,'2020_02_28_232625_update_unidades_de_medida_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `unidades_medidas` */

DROP TABLE IF EXISTS `unidades_medidas`;

CREATE TABLE `unidades_medidas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'identificador de unidades de medidas',
  `unidad_medida` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nombre de la unidad de medida',
  `abreviatura` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Abreviatura del nombre de la carrera',
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'La carrera esta disponible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unidades_medidas_api_token_unique` (`api_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `unidades_medidas` */

insert  into `unidades_medidas`(`id`,`unidad_medida`,`abreviatura`,`api_token`,`estatus`,`created_at`,`updated_at`) values 
(1,'Desarrollo de Software Multiplataforma','DSM','b53ea24a1d83a9bae73b2432e9b4e7c7ec8e0ce80a81906783eb4863f5475765','activo','2021-12-26 21:56:24','2021-12-26 21:56:24');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_api_token_unique` (`api_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`api_token`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Alexis','alexis@gmail.com',NULL,'$2y$10$J77mQHDuoe93PBdVy4XSlumAAD6d5LBc33fcEu5DdiX6D7FrRNtNe','b53ea24a1d83a9bae73b2432e9b4e7c7ec8e0ce80a81906783eb4863f5475765',NULL,'2021-12-26 21:56:23','2021-12-26 21:56:23');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
