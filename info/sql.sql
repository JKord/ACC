-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.27 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              7.0.0.4321
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for таблица acc.area
CREATE TABLE IF NOT EXISTS `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_building_departments` int(11) DEFAULT NULL,
  `id_group` int(11) DEFAULT NULL,
  `id_worker` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_area_building_department` (`id_building_departments`),
  KEY `FK_area_groups` (`id_group`),
  KEY `FK_area_workers` (`id_worker`),
  CONSTRAINT `FK_area_workers` FOREIGN KEY (`id_worker`) REFERENCES `workers` (`id`),
  CONSTRAINT `FK_area_building_department` FOREIGN KEY (`id_building_departments`) REFERENCES `building_department` (`id`) ON DELETE SET NULL,
  CONSTRAINT `FK_area_groups` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы acc.area: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` (`id`, `id_building_departments`, `id_group`, `id_worker`) VALUES
	(1, 1, 1, 6),
	(2, 2, 4, 6);
/*!40000 ALTER TABLE `area` ENABLE KEYS */;


-- Dumping structure for таблица acc.building_department
CREATE TABLE IF NOT EXISTS `building_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы acc.building_department: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `building_department` DISABLE KEYS */;
INSERT INTO `building_department` (`id`, `name`) VALUES
	(1, 'АГРО БУТ'),
	(2, 'Бут СТРОЙ'),
	(3, 'Мрія');
/*!40000 ALTER TABLE `building_department` ENABLE KEYS */;


-- Dumping structure for таблица acc.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы acc.categories: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`) VALUES
	(1, 'Житловий будинок'),
	(2, 'Лікарня'),
	(3, 'Школа'),
	(4, 'Дитячий садок');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Dumping structure for таблица acc.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы acc.groups: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`) VALUES
	(1, 'Дельта'),
	(2, 'Форс'),
	(3, 'Грет 1'),
	(4, 'Нібелунги'),
	(5, 'Рчновиди');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


-- Dumping structure for таблица acc.objects
CREATE TABLE IF NOT EXISTS `objects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) DEFAULT NULL,
  `id_area` int(11) DEFAULT NULL,
  `floors` int(11) DEFAULT NULL,
  `building_material` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addresses` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `entrances` int(11) DEFAULT NULL,
  `size` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_apartments` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `FK_objects_categories` (`id_category`),
  KEY `FK_objects_area` (`id_area`),
  CONSTRAINT `FK_objects_area` FOREIGN KEY (`id_area`) REFERENCES `area` (`id`) ON DELETE SET NULL,
  CONSTRAINT `FK_objects_categories` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы acc.objects: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `objects` DISABLE KEYS */;
INSERT INTO `objects` (`id`, `id_category`, `id_area`, `floors`, `building_material`, `addresses`, `entrances`, `size`, `type_apartments`, `description`) VALUES
	(1, 1, 1, 10, 'Цегла', 'вул. Героїв Днапра 234', 3, NULL, 'Квартири 4-ох, 3-ох, 2-ох кімнатні', 'Чудовий дім'),
	(2, 2, 2, 5, 'Цегла', 'б. Шевченка 455', 4, 'Здорова', NULL, 'Вилікуємо всіх');
/*!40000 ALTER TABLE `objects` ENABLE KEYS */;


-- Dumping structure for таблица acc.workers
CREATE TABLE IF NOT EXISTS `workers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы acc.workers: ~9 rows (приблизительно)
/*!40000 ALTER TABLE `workers` DISABLE KEYS */;
INSERT INTO `workers` (`id`, `name`, `post`) VALUES
	(2, 'Свидригайло Свирид', 'Мастер'),
	(3, 'Ляпко Гнат', 'Технік'),
	(4, 'Плеченко Андрій', 'Технік'),
	(5, 'Шубкн Остап', 'Технік'),
	(6, 'Петрівна Надія', 'Мастер'),
	(7, 'Швидко Сулій', 'Технік'),
	(8, 'Охриман Сихізмундович', 'Мастер'),
	(9, 'Бутько Надія', 'Мастер'),
	(10, 'Арнапенко Олег', 'Технік');
/*!40000 ALTER TABLE `workers` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
