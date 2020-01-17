-- Adminer 4.7.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `process`;
CREATE DATABASE `process` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `process`;

DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `mail` (`email`),
  CONSTRAINT `mail` FOREIGN KEY (`email`) REFERENCES `users` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

TRUNCATE `contact`;

DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `qid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `quest` varchar(300) NOT NULL,
  `class` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

TRUNCATE `questions`;
INSERT INTO `questions` (`qid`, `quest`, `class`, `date`) VALUES
(1,	'Je me sens émotionnellement vidé(e) par mon travail',	'sep',	'2021-10-19 10:57:00'),
(2,	'Je me sens à bout à la fin de ma journée de travail',	'sep',	'2021-10-19 10:57:00'),
(3,	'Je me sens fatigué(e) lorsque je me lève le matin et que j’ai à affronter une autre journée de travail',	'sep',	'2021-10-19 10:57:00'),
(4,	'Je peux comprendre facilement ce que mes patients/clients/élèves ressentent',	'sap',	'2021-10-19 10:57:00'),
(5,	'Je sens que je m’occupe de certains patients/clients/élèves de façon impersonnelle, comme s’ils étaient des objets',	'sd',	'2021-10-19 10:57:00'),
(6,	'Travailler avec des gens tout au long de la journée me demande beaucoup d’effort',	'sep',	'2021-10-19 10:57:00'),
(7,	'Je m’occupe très efficacement des problèmes de mes patients/clients/élèves',	'sap',	'2021-10-19 10:57:00'),
(8,	'Je sens que je craque à cause de mon travail',	'sep',	'2021-10-19 10:57:00'),
(9,	'J’ai l’impression, à travers mon travail, d’avoir une influence positive sur les gens',	'sap',	'2021-10-19 10:57:00'),
(10,	'Je suis devenu(e) plus insensible aux gens depuis que j’ai ce travail',	'sd',	'2021-10-19 10:57:00'),
(11,	'Je crains que ce travail ne m’endurcisse émotionnellement',	'sd',	'2021-10-19 10:57:00'),
(12,	'Je me sens plein(e) d’énergie',	'sap',	'2021-10-19 10:57:00'),
(13,	'Je me sens frustré(e) par mon travail',	'sep',	'2021-10-19 10:57:00'),
(14,	'Je sens que je travaille « trop dur » dans mon travail',	'sep',	'2021-10-19 10:57:00'),
(15,	'Je ne me soucie pas vraiment de ce qui arrive à certains de mes patients/clients/élèves',	'sd',	'2021-10-19 10:57:00'),
(16,	'Travailler en contact direct avec les gens me stresse trop',	'sep',	'2021-10-19 10:57:00'),
(17,	'J’arrive facilement à créer une atmosphère détendue avec mes patients/clients/élèves',	'sap',	'2021-10-19 10:57:00'),
(18,	'Je me sens ragaillardi(e) lorsque dans mon travail j’ai été proche de patients/clients/élèves',	'sap',	'2021-10-19 10:57:00'),
(19,	'J’ai accompli beaucoup de choses qui en valent la peine dans ce travail',	'sap',	'2021-10-19 10:57:00'),
(20,	'Je me sens au bout du rouleau',	'sap',	'2021-10-19 10:57:00'),
(21,	'Dans mon travail, je traite les problèmes émotionnels très calmement',	'sep',	'2021-10-19 10:57:00'),
(22,	'J’ai l’impression que mes patients/clients/élèves me rendent responsable de certains de leurs problèmes',	'sap',	'2021-10-19 10:57:00');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(255) NOT NULL,
  `société` varchar(50) DEFAULT NULL,
  `département` varchar(50) DEFAULT NULL,
  `approuvé` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

TRUNCATE `users`;
INSERT INTO `users` (`id`, `identifiant`, `password`, `email`, `société`, `département`, `approuvé`) VALUES
(14,	'process',	'',	'process@process.db',	NULL,	NULL,	NULL),
(15,	'cc',	'$2y$10$g3lah821RQJV2FHNyKEjGeCr4nQ7sgJYXvuxllReGrcMNFZSWuXya',	'cc@gmail.com',	NULL,	NULL,	'2019-11-12 14:48:28'),
(19,	'',	'',	'mickey@gmail.com',	'sncf',	'ter',	NULL),
(20,	'',	'',	'donald@gmail.com',	'sncf',	'tgv',	NULL),
(28,	'',	'',	'pluto@gmail.com',	'sncf',	'ter',	NULL),
(29,	'',	'',	'daisy@gmail.com',	'sncf',	'tgv',	NULL);

-- 2019-11-12 15:20:59
