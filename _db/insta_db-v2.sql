-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `couriers`;
CREATE TABLE `couriers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `couriers` (`id`, `full_name`) VALUES
(1,	'Jill Smith'),
(2,	'Eve Jackson'),
(3,	'John Doe'),
(4,	'Лев Мышкин'),
(5,	'Кристалл Денёв'),
(6,	'Килиан Мбаппе'),
(7,	'Джон Смит'),
(8,	'Кир Прадо'),
(9,	'Клод Макелеле'),
(10,	'Крис Смит');

DROP TABLE IF EXISTS `regions`;
CREATE TABLE `regions` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `region` varchar(50) NOT NULL,
  `spent_days` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `regions` (`id`, `region`, `spent_days`) VALUES
(1,	'Санкт-Петербург',	6),
(2,	'Уфа',	12),
(3,	'Нижний Новгород',	6),
(4,	'Владимир',	4),
(5,	'Кострома',	6),
(6,	'Екатеринбург',	18),
(7,	'Ковров',	8),
(8,	'Воронеж',	8),
(9,	'Самара',	10),
(10,	'Астрахань',	14);

DROP TABLE IF EXISTS `travels`;
CREATE TABLE `travels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_courier` int(11) NOT NULL,
  `id_region` int(4) NOT NULL,
  `date_begin` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `date_begin_unix` int(11) NOT NULL,
  `date_end_unix` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_courier` (`id_courier`),
  KEY `id_region` (`id_region`),
  CONSTRAINT `travels_ibfk_1` FOREIGN KEY (`id_courier`) REFERENCES `couriers` (`id`),
  CONSTRAINT `travels_ibfk_2` FOREIGN KEY (`id_region`) REFERENCES `regions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `travels` (`id`, `id_courier`, `id_region`, `date_begin`, `date_end`, `date_begin_unix`, `date_end_unix`) VALUES
(1,	7,	1,	'2021-02-20',	'2021-02-26',	1613768400,	1614286800),
(2,	1,	9,	'2021-02-15',	'2021-02-25',	1613336400,	1614200400),
(3,	8,	5,	NULL,	NULL,	1613595600,	1614114000),
(4,	10,	7,	NULL,	NULL,	1612904400,	1613595600),
(5,	4,	3,	NULL,	NULL,	1612990800,	1613509200),
(6,	8,	8,	NULL,	NULL,	1612386000,	1613077200),
(7,	4,	5,	NULL,	NULL,	1613509200,	1614027600),
(8,	4,	1,	NULL,	NULL,	1613682000,	1614200400),
(21,	4,	4,	NULL,	NULL,	1612904400,	1613250000),
(22,	4,	6,	NULL,	NULL,	1612213200,	1613768400);

-- 2021-02-25 10:12:07
