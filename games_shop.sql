-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.36-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for games_shop
CREATE DATABASE IF NOT EXISTS `games_shop` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `games_shop`;

-- Dumping structure for table games_shop.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  `commentBody` mediumtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gameId` int(11) NOT NULL DEFAULT '0',
  `userId` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_comments_games` (`gameId`),
  KEY `FK_comments_users` (`userId`),
  CONSTRAINT `FK_comments_games` FOREIGN KEY (`gameId`) REFERENCES `games` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_comments_users` FOREIGN KEY (`userId`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table games_shop.comments: ~6 rows (approximately)
DELETE FROM `comments`;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `username`, `email`, `commentBody`, `date`, `gameId`, `userId`) VALUES
	(1, 'emicha', 'emicha@mail.bg', 'very cool game!!!', '2018-09-03 22:30:27', 15, 1),
	(2, 'emicha', 'emicha@mail.bg', 'lets play guys!!', '2018-09-03 22:30:41', 15, 1),
	(3, 'nikito', 'niki@abv.bg', 'kill them all !!!', '2018-09-03 22:35:56', 15, 2),
	(4, 'nikito', 'niki@abv.bg', 'very cool game!!!', '2018-09-03 22:36:25', 4, 2),
	(5, 'nikito', 'niki@abv.bg', 'very cool game', '2018-09-03 22:41:17', 6, 2),
	(6, 'emicha', 'emicha@mail.bg', 'yep!!!!', '2018-09-03 22:41:45', 6, 1);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table games_shop.consoles
CREATE TABLE IF NOT EXISTS `consoles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `consoleName` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table games_shop.consoles: ~5 rows (approximately)
DELETE FROM `consoles`;
/*!40000 ALTER TABLE `consoles` DISABLE KEYS */;
INSERT INTO `consoles` (`id`, `consoleName`) VALUES
	(1, 'PC'),
	(2, 'PS'),
	(3, 'XBOX'),
	(4, 'PSP'),
	(5, 'Wii');
/*!40000 ALTER TABLE `consoles` ENABLE KEYS */;

-- Dumping structure for table games_shop.favourites
CREATE TABLE IF NOT EXISTS `favourites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL DEFAULT '0',
  `gameId` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_favourites_users` (`userId`),
  KEY `FK_favourites_games` (`gameId`),
  CONSTRAINT `FK_favourites_games` FOREIGN KEY (`gameId`) REFERENCES `games` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_favourites_users` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table games_shop.favourites: ~8 rows (approximately)
DELETE FROM `favourites`;
/*!40000 ALTER TABLE `favourites` DISABLE KEYS */;
INSERT INTO `favourites` (`id`, `userId`, `gameId`) VALUES
	(1, 1, 6),
	(2, 1, 25),
	(3, 1, 13),
	(4, 1, 7),
	(5, 2, 6),
	(6, 2, 9),
	(7, 2, 19),
	(8, 1, 28);
/*!40000 ALTER TABLE `favourites` ENABLE KEYS */;

-- Dumping structure for table games_shop.gallery
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gameName` varchar(50) NOT NULL DEFAULT '0',
  `gameGalleryFirstPic` varchar(300) NOT NULL DEFAULT '0',
  `gameGallerySecondPic` varchar(300) NOT NULL DEFAULT '0',
  `gameGalleryThirdPic` varchar(300) NOT NULL DEFAULT '0',
  `gameGalleryForthPic` varchar(300) NOT NULL DEFAULT '0',
  `gameGalleryFifthPic` varchar(300) NOT NULL DEFAULT '0',
  `gameGallerySixthPic` varchar(300) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Dumping data for table games_shop.gallery: ~20 rows (approximately)
DELETE FROM `gallery`;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` (`id`, `gameName`, `gameGalleryFirstPic`, `gameGallerySecondPic`, `gameGalleryThirdPic`, `gameGalleryForthPic`, `gameGalleryFifthPic`, `gameGallerySixthPic`) VALUES
	(1, 'Spider-man', '/GamesShop/games/PS/spider-man/gallery/first pic.jpg', '/GamesShop/games/PS/spider-man/gallery/second pic.jpg', '/GamesShop/games/PS/spider-man/gallery/third pic.jpg', '/GamesShop/games/PS/spider-man/gallery/forth pic.jpg', '/GamesShop/games/PS/spider-man/gallery/fifth pic.jpg', '/GamesShop/games/PS/spider-man/gallery/sixth pic.jpg'),
	(2, 'WOW Battle of Azeroth', '/GamesShop/games/PC/wow/gallery/first pic.jpg', '/GamesShop/games/PC/wow/gallery/second pic.jpg', '/GamesShop/games/PC/wow/gallery/third pic.jpg', '/GamesShop/games/PC/wow/gallery/forth pic.jpg', '/GamesShop/games/PC/wow/gallery/fifth pic.jpg', '/GamesShop/games/PC/wow/gallery/sixth pic.jpg'),
	(3, 'Tomb Raider', '/GamesShop/games/PC/tomb raider/gallery/first pic.jpg', '/GamesShop/games/PC/tomb raider/gallery/second pic.jpg', '/GamesShop/games/PC/tomb raider/gallery/third pic.jpg', '/GamesShop/games/PC/tomb raider/gallery/forth pic.jpg', '/GamesShop/games/PC/tomb raider/gallery/fifth pic.jpg', '/GamesShop/games/PC/tomb raider/gallery/sixth pic.jpg'),
	(4, 'Assasin\'s Creed Origins', '/GamesShop/games/PC/assasin/assassin_origins_gallery/first pic.jpg', '/GamesShop/games/PC/assasin/assassin_origins_gallery/second pic.jpg', '/GamesShop/games/PC/assasin/assassin_origins_gallery/third pic.jpg', '/GamesShop/games/PC/assasin/assassin_origins_gallery/forth pic.jpg', '/GamesShop/games/PC/assasin/assassin_origins_gallery/fifth pic.jpg', '/GamesShop/games/PC/assasin/assassin_origins_gallery/sixth pic.jpg'),
	(5, 'Assasin\'s Creed Odyssey', '/GamesShop/games/PC/assasin/assassin_odyssey_gallery/first pic.jpg', '/GamesShop/games/PC/assasin/assassin_odyssey_gallery/second pic.jpg', '/GamesShop/games/PC/assasin/assassin_odyssey_gallery/third pic.jpg', '/GamesShop/games/PC/assasin/assassin_odyssey_gallery/forth pic.jpg', '/GamesShop/games/PC/assasin/assassin_odyssey_gallery/fifth pic.jpg', '/GamesShop/games/PC/assasin/assassin_odyssey_gallery/sixth pic.jpg'),
	(6, 'Uncharted', '/GamesShop/games/PS/uncharted/gallery/first pic.jpeg', '/GamesShop/games/PS/uncharted/gallery/second pic.jpg', '/GamesShop/games/PS/uncharted/gallery/third pic.jpg', '/GamesShop/games/PS/uncharted/gallery/forth pic.jpg', '/GamesShop/games/PS/uncharted/gallery/fifth pic.jpg', '/GamesShop/games/PS/uncharted/gallery/sixth pic.jpg'),
	(7, 'WWE 2019', '/GamesShop/games/PS/wwe 2019/gallery/first pic.jpg', '/GamesShop/games/PS/wwe 2019/gallery/second pic.jpg', '/GamesShop/games/PS/wwe 2019/gallery/third pic.jpg', '/GamesShop/games/PS/wwe 2019/gallery/forth pic.jpg', '/GamesShop/games/PS/wwe 2019/gallery/fifth pic.jpg', '/GamesShop/games/PS/wwe 2019/gallery/sixth pic.jpg'),
	(8, 'The Crew 2', '/GamesShop/games/PS/the crew 2/gallery/first pic.jpg', '/GamesShop/games/PS/the crew 2/gallery/second pic.jpg', '/GamesShop/games/PS/the crew 2/gallery/third pic.jpg', '/GamesShop/games/PS/the crew 2/gallery/forth pic.jpg', '/GamesShop/games/PS/the crew 2/gallery/fifth pic.jpg', '/GamesShop/games/PS/the crew 2/gallery/sixth pic.jpg'),
	(9, 'FIFA 19', '/GamesShop/games/PS/fifa 19/gallery/first pic.jpg', '/GamesShop/games/PS/fifa 19/gallery/second pic.jpg', '/GamesShop/games/PS/fifa 19/gallery/third pic.jpg', '/GamesShop/games/PS/fifa 19/gallery/forth pic.jpg', '/GamesShop/games/PS/fifa 19/gallery/fifth pic.jpg', '/GamesShop/games/PS/fifa 19/gallery/sixth pic.jpg'),
	(10, 'Diablo 3', '/GamesShop/games/XBOX/diablo 3/gallery/first pic.jpg', '/GamesShop/games/XBOX/diablo 3/gallery/second pic.jpg', '/GamesShop/games/XBOX/diablo 3/gallery/third pic.jpg', '/GamesShop/games/XBOX/diablo 3/gallery/forth pic.jpg', '/GamesShop/games/XBOX/diablo 3/gallery/fifth pic.jpg', '/GamesShop/games/XBOX/diablo 3/gallery/sixth pic.jpg'),
	(11, 'Overwatch', '/GamesShop/games/XBOX/overwatch/gallery/first pic.jpg', '/GamesShop/games/XBOX/overwatch/gallery/second pic.jpg', '/GamesShop/games/XBOX/overwatch/gallery/third pic.jpg', '/GamesShop/games/XBOX/overwatch/gallery/forth pic.jpg', '/GamesShop/games/XBOX/overwatch/gallery/fifth pic.jpg', '/GamesShop/games/XBOX/overwatch/gallery/sixth pic.jpg'),
	(12, 'Divinity Original Sin 2', '/GamesShop/games/XBOX/divinity 2/gallery/first pic.jpg', '/GamesShop/games/XBOX/divinity 2/gallery/second pic.jpg', '/GamesShop/games/XBOX/divinity 2/gallery/third pic.jpg', '/GamesShop/games/XBOX/divinity 2/gallery/forth pic.jpg', '/GamesShop/games/XBOX/divinity 2/gallery/fifth pic.jpg', '/GamesShop/games/XBOX/divinity 2/gallery/sixth pic.jpg'),
	(13, 'Battlefield V', '/GamesShop/games/XBOX/battlefield/gallery/first pic.jpg', '/GamesShop/games/XBOX/battlefield/gallery/second pic.jpg', '/GamesShop/games/XBOX/battlefield/gallery/third pic.jpg', '/GamesShop/games/XBOX/battlefield/gallery/forth pic.jpg', '/GamesShop/games/XBOX/battlefield/gallery/fifth pic.jpg', '/GamesShop/games/XBOX/battlefield/gallery/sixth pic.jpg'),
	(14, 'Dishonored', '/GamesShop/games/XBOX/dishonored/gallery/first pic.jpg', '/GamesShop/games/XBOX/dishonored/gallery/second pic.jpg', '/GamesShop/games/XBOX/dishonored/gallery/third pic.jpg', '/GamesShop/games/XBOX/dishonored/gallery/forth pic.jpg', '/GamesShop/games/XBOX/dishonored/gallery/fifth pic.jpg', '/GamesShop/games/XBOX/dishonored/gallery/sixth pic.jpg'),
	(15, 'Call of Duty', '/GamesShop/games/PC/call of duty/gallery/first pic.jpg', '/GamesShop/games/PC/call of duty/gallery/second pic.jpg', '/GamesShop/games/PC/call of duty/gallery/third pic.jpg', '/GamesShop/games/PC/call of duty/gallery/forth pic.jpg', '/GamesShop/games/PC/call of duty/gallery/fifth pic.jpg', '/GamesShop/games/PC/call of duty/gallery/sixth pic.jpg'),
	(16, 'Titanfall 2', '/GamesShop/games/PS/titanfall 2/gallery/first pic.jpg', '/GamesShop/games/PS/titanfall 2/gallery/second pic.jpg', '/GamesShop/games/PS/titanfall 2/gallery/third pic.jpg', '/GamesShop/games/PS/titanfall 2/gallery/forth pic.jpg', '/GamesShop/games/PS/titanfall 2/gallery/fifth pic.jpg', '/GamesShop/games/PS/titanfall 2/gallery/sixth pic.jpg'),
	(17, 'Destiny 2', '/GamesShop/games/PS/destiny 2/gallery/first pic.jpg', '/GamesShop/games/PS/destiny 2/gallery/second pic.jpg', '/GamesShop/games/PS/destiny 2/gallery/third pic.jpg', '/GamesShop/games/PS/destiny 2/gallery/forth pic.jpg', '/GamesShop/games/PS/destiny 2/gallery/fifth pic.jpg', '/GamesShop/games/PS/destiny 2/gallery/sixth pic.jpg'),
	(18, 'Dragon Age Inquisition', '/GamesShop/games/PC/dragon age/gallery/first pic.jpg', '/GamesShop/games/PC/dragon age/gallery/second pic.jpg', '/GamesShop/games/PC/dragon age/gallery/third pic.jpg', '/GamesShop/games/PC/dragon age/gallery/forth pic.jpg', '/GamesShop/games/PC/dragon age/gallery/fifth pic.jpg', '/GamesShop/games/PC/dragon age/gallery/sixth pic.jpg'),
	(19, 'Rocket League', '/GamesShop/games/PC/rocket league/gallery/first pic.jpg', '/GamesShop/games/PC/rocket league/gallery/second pic.jpg', '/GamesShop/games/PC/rocket league/gallery/third pic.jpg', '/GamesShop/games/PC/rocket league/gallery/forth pic.jpg', '/GamesShop/games/PC/rocket league/gallery/fifth pic.jpg', '/GamesShop/games/PC/rocket league/gallery/sixth pic.jpg'),
	(20, 'NBA 2K 18', '/GamesShop/games/XBOX/nba2k18/gallery/first pic.jpg', '/GamesShop/games/XBOX/nba2k18/gallery/second pic.jpg', '/GamesShop/games/XBOX/nba2k18/gallery/third pic.jpg', '/GamesShop/games/XBOX/nba2k18/gallery/forth pic.jpg', '/GamesShop/games/XBOX/nba2k18/gallery/fifth pic.jpg', '/GamesShop/games/XBOX/nba2k18/gallery/sixth pic.jpg');
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;

-- Dumping structure for table games_shop.games
CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gamePic` varchar(50) NOT NULL,
  `gameName` varchar(50) NOT NULL,
  `gameConsole` int(11) NOT NULL DEFAULT '0',
  `gamePrice` decimal(4,2) NOT NULL,
  `gameDate` date NOT NULL,
  `gameCopiesSold` int(11) NOT NULL,
  `gamePromotion` bit(1) NOT NULL DEFAULT b'0',
  `gameGenre` int(11) DEFAULT NULL,
  `gameDescriptionHeader` mediumtext NOT NULL,
  `gameDescriptionBody` mediumtext NOT NULL,
  `gameNeededCPU` varchar(50) DEFAULT NULL,
  `gameNeededRAM` varchar(50) DEFAULT NULL,
  `gameNeededOS` varchar(50) DEFAULT NULL,
  `gameNeededVideoCard` varchar(50) DEFAULT NULL,
  `gameNeededFreeSpace` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_games_consoles` (`gameConsole`),
  KEY `FK_games_genre` (`gameGenre`),
  CONSTRAINT `FK_games_consoles` FOREIGN KEY (`gameConsole`) REFERENCES `consoles` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_games_genre` FOREIGN KEY (`gameGenre`) REFERENCES `genres` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- Dumping data for table games_shop.games: ~30 rows (approximately)
DELETE FROM `games`;
/*!40000 ALTER TABLE `games` DISABLE KEYS */;
INSERT INTO `games` (`id`, `gamePic`, `gameName`, `gameConsole`, `gamePrice`, `gameDate`, `gameCopiesSold`, `gamePromotion`, `gameGenre`, `gameDescriptionHeader`, `gameDescriptionBody`, `gameNeededCPU`, `gameNeededRAM`, `gameNeededOS`, `gameNeededVideoCard`, `gameNeededFreeSpace`) VALUES
	(1, '/GamesShop/games/PS/uncharted/uncharted 4.jpg', 'Uncharted', 2, 56.78, '2018-09-20', 20, b'1', 1, 'Uncharted 4: A Thief\'s End', 'Три години след Uncharted 3: Drake’s Deception, Nathan Drake привидно е оставил зад гърба си преследването на съкровища. Но не може да откаже помощ на брат си, Sam, който се опитва да спаси\r\nсобствения си живот и му предлага приключение, което не е за изпускане. Спокойният живот вече е минало, настоящето ще постави на изпитание принципите и решителността на Nathan в името на \r\nтези, които обича. \r\n\r\nСледващата цел е дълбоко в горите на Мадагаскар - пиратската утопия Libertalia и отдавна изгубеното съкровище на капитан Henry Avery. Който, между другото, е историческа личност, плавал в \r\nИндийския и Атлантичекия океан. Sam и Drake предприемат необикновено пътуване през необятни джунгли, забравени градове и вражднебни планини. ', 'Intel Core i5-6200U 2.3GHz', '4 GB', 'Windows 10', 'Radeon R5 M330 2GB', '80 GB'),
	(2, '/GamesShop/games/PS/wwe 2019/wwe.jpg', 'WWE 2019', 2, 26.12, '2018-09-20', 5, b'1', 1, 'WWE 2K19 ', 'WWE 2K19 – най-новата част в престижната поредица видео игри по WWE се завръща със суперзвездата Ей Джей Стайлс на корицата.WWE 2K19 съдържа огромен набор от популярни WWE \r\nсуперзвезди, легенди, членове на Залата на славата и любимци от NXT. Изживей автентичен WWE геймплей, разширени възможности за персонализация, привлекателни мачове и любими режими на \r\nигра.\r\n\r\nWWE 2K19 се завръща по уникален начин. Очакват те брутална визия, разнообразни режими и величествен състав от спортисти. Потопи се в света на кеча заедно с най-новата част на епичната\r\nпоредица.', 'Intel Core i3-3550 3.3 GHz', '4 GB', 'Windows 10', 'Nvidia GeForce GTX 670', '50 GB'),
	(3, '/GamesShop/games/PS/the crew 2/the crew 2.jpg', 'The Crew 2', 2, 26.00, '2018-09-20', 8, b'0', 3, 'The Crew 2', 'Изследвай Америка и стани част от Щатските моторни спортове по суша, въздух и вода, само в The Crew 2.\r\n\r\nВИЖ АМЕРИКА. СТАНИ ЧАСТ ОТ АМЕРИКА.\r\n\r\nДобре дошъл в новото американско пътешествие.\r\n\r\nОт океан до бляскав океан, изследвай градовете, пътищата, реките и небето на една Америка в отворен свят, направена за моторни спортове. В тази земя те чакат почти безкрайни нови места и състезания.\r\n\r\nЗАПОЗНАЙ СЕ С МОТОРНИТЕ ДИСЦИПЛИНИ.\r\n\r\nИзправи се срещу конкуренцията.\r\n\r\nКак изследваш и покоряваш тази Америка зависи от теб. Така че по-добре се подготви. Защо не започнеш като избереш моторна дисциплина?\r\n\r\nПИЛОТИРАЙ МЕЧТАНАТА МАШИНА.\r\n\r\nПревърни се в легенда по въздух, вода и суша.', 'Intel Core i3-8350K 4.00GHz', '4 GB', 'Windows 7', 'GeForce GTX 1080 Zotac AMP 8GB ', '60 GB'),
	(4, '/GamesShop/games/XBOX/diablo 3/diablo 3.jpg', 'Diablo 3', 3, 50.00, '2018-09-20', 30, b'0', 4, 'Diablo III: Reaper of Souls - Ultimate Evil Edition', 'Ultimate Evil Edition събира игрите Diablo III и допълнението Reaper of Souls в едно единствено издание. Пригoтвете се, нещо зло се задава! Изминали са двадесет години от победата над първичните \r\nдемони и тяхното прогонване от Санкчуъри (Sanctuary). \r\nСега трябва да се върнете там, където е започнало всичко – в град Тристрам – и да проучите слуховете за паднала звезда, защото това е предзнаменование за започването на Свършека на света.\r\nПризовете съюзниците си - Играйте самостоятелно или в група с до четирима герои — или локално на разделен екран или онлайн с мрежови играчи.\r\nЗапочнете играта веднага - Заемете позиция в ролята на един от последните защитници на човечеството — barbarian, witch doctor, monk, demon hunter или wizard.', 'Intel® Core™ 2 Duo 2.4 GHz', '4 GB ', 'Windows® 10 64-bit', 'NVIDIA® GeForce® 8800GT', '25 GB	'),
	(5, '/GamesShop/games/XBOX/overwatch/overwatch.jpg', 'Overwatch', 3, 80.00, '2018-09-20', 40, b'1', 5, 'Overwatch Origins Edition ', 'Светът има нужда от герои!\r\n\r\nБори се за бъдещето!\r\nВойници, учени, приключенци, странници - представяме ти причудлив отряд, познат под името Overwatch. Във времената на глобална криза, неговата задача е да възстанови мира в един футуристичен,\r\nразкъсан от войни свят. Те слагат край на опустошението и спомагат за запазване на мира. Следват години на подем, иновации и открития. Влиянието на Оverwatch постепенно отслабва и накрая са \r\nразпуснати. Въпреки това, светът все още се нуждае от своите герои.\r\n\r\nИзбери един герой, бъди един герой!\r\nOverwatch ти предлага различни персонажи, уникални със своите умения. От пътуващ във времето приключенец, през тежкоброниран войн, въоръжен с ракетен чук, та до чудат робот монах - твоя е \r\nчестта да избереш с кого ще спасиш света.', 'Intel® Core™ 2 Duo 2.4 GHz', '4 GV', 'Windows 10', 'Nvidia GeForce GTX 660', '30 GB'),
	(6, '/GamesShop/games/PC/wow/battle of azeroth.jpg', 'WOW Battle of Azeroth', 1, 50.00, '2018-09-20', 90, b'1', 5, 'Феноменът World of Warcraft се завръща към корените си!', 'Битката срещу Огнения легион e оставила света на Азерот потънал в руини, а разрушеното доверие между Алианса и Ордата ще се окаже нещото, което най-трудно би могло да бъде съградено отново.\r\n\r\nВ Battle for Azeroth, падането на Легиона е положило началото на серия от катастрофални инциденти, които разпалват с нова сила изконното яростно съперничество между благородния Алианс и могъщата Орда. Започва епоха на война, в която героите на Азерот трябва да открият нови съюзи в една надпревара за заграбването на най-могъщите ресурси по света. Всяка страна иска да обърне хода на битката в своя полза, докато паралелно с това и Алиансът, и Ордата се сражават на няколко фронта.\r\n\r\n', 'Intel Core™ i5-760 3.5 GHz', '4 GB ', 'Windows 7 ', 'NVIDIA® GeForce GTX 560 2GB ', '70 GB '),
	(7, '/GamesShop/games/PS/fifa 19/fifa 19.jpg', 'FIFA 19', 2, 89.00, '2018-09-20', 100, b'0', 3, 'PRE-ORDER: FIFA 19 + Bonus', 'Шампионите се възраждат във FIFA 19\r\n\r\nСъздадена с енджина Frostbite, EA SPORTS FIFA 19 предлага едно преживяване от шампионски калибър – както на терена, така и извън него. \r\n\r\nНачело с престижната Шампионска лига на УЕФА, FIFA 19 предлага подобрен начин на игра, който ти позволява да манипулираш терена във всеки един момент, давайки ти нови, ненадминати начини \r\nна игра, включително драматичния завършек на историята на Алекс Хънтър в The Journey: Champions, нов режим на игра във все така популярния FIFA Ultimate Team и не само.\r\n\r\nСистема за пъргав допир\r\n\r\nНовата система фундаментално променя начина, по който овладяваш и шутираш топката, давайки ти по-прецизен контрол, по-гладко движение, идейност и по-изявени индивидуални особености. ', 'Intel i5-3550 3.5 GHz', '8 GB', 'Windows 7', 'NVIDIA GeForce GTX 670 2GB', '40 GB'),
	(8, '/GamesShop/games/PC/tomb raider/tomb raider.jpg', 'Tomb Raider', 1, 70.00, '2018-09-20', 60, b'0', 1, 'PRE-ORDER: Shadow of the Tomb Raider', 'Изживей определящия момент за Лара Крофт; този, в който се превръща в Похитителя на гробници. В Shadow of the Tomb Raider, Лара трябва да надделее над смъртоносна джунгла, \r\nда преодолее ужасяващи гробници и да преживее най-мрачния си час. В стремежа си да спаси света от майски апокалипсис, \r\nЛара ще се превърне в похитителя на гробници, който ѝ е писано да бъде.\r\n\r\nОцелей и преуспей в най-смъртоносното място на Земята\r\n\r\nПодчини безпощадната джунгла на волята си, за да оцелееш. Изследвай подводни светове, изпълнени с пукнатини и дълбоки системи от тунели.\r\n\r\nСлей се с джунглата\r\n\r\nПревъзхождана числено и по оръжие, Лара трябва да използва джунглата, за да спечели надмощие. Атакувай внезапно и се изпари като ягуар, дегизирай се с кал и сей хаос.', 'Intel Core i5-7600 3.5GHz', '6 GB', 'Windows 10', 'NVIDIA GeForce GTX 1050 Ti 4GB', '50 GB'),
	(9, '/GamesShop/games/PC/assasin/assasin origin.jpg', 'Assasin\'s Creed Origins', 1, 65.00, '2018-09-20', 20, b'1', 1, 'Назад, назад във времето, добре дошъл в древен Египет.', 'Назад, назад във времето, добре дошъл в древен Египет.\r\nПотопи си в новата вълнуваща асасинска история, която ще те отведе до самото начало на създаването на Братството. Предстои ти да разкриеш тайните на пирамидите, да се сблъскаш с отдавна забравени легенди в един мистериозен свят, част от един от най - важните исторически периоди.\r\n\r\nПрез последните 4 години, хората, които сътвориха култовия Assassin\'s Creed IV Black Flag са се съсредоточили в поставянето на ново начало за епичната поредица. \r\n\r\nРазличен геймплей - брилянтна смесица от класическите похвати, типични за франчайза и много нововъдения, включващи и нов начин, по който ще се биеш .\r\nУникални оръжия за близък и далечен бой.', 'Intel Core i5-2400s @ 2.5 GHz ', '4 GB', 'Windows 8', 'NVIDIA GeForce GTX 660 2GB', '45 GB'),
	(11, '/GamesShop/games/Wii/pokepark/pokepark.png', 'PokePark Pikachu\'s Adventure', 5, 45.00, '2018-09-20', 10, b'0', 1, 'PokePark: Pikachu\'s Adventure ', 'В ролята на Пикачу вие трябва да се справите с кризата, създала се на необичайно ново място – Покепарк.', '	729 MHz IBM PowerPC "Broadway"', '64 MB', 'Nintendo', '243 MHz ATI "Hollywood"', '20 GB'),
	(12, '/GamesShop/games/PC/assasin/assasin odyssey.jpg', 'Assasin\'s Creed Odyssey', 1, 78.00, '2018-08-17', 12, b'0', 1, 'LIVE THE EPIC ODYSSEY OF A LEGENDARY SPARTAN HERO', 'Assassin\'s Creed Odyssey places more emphasis on role-playing elements than previous games in the series. \r\nThe game will contain dialogue options, branching quests, and multiple endings.\r\nThe player will be able to choose the gender of the main character, adopting the role of Alexios or Kassandra.\r\nThe player will also have the ability to develop romantic relationships with non-playable characters of both genders, regardless whether they choose to play as Alexios or Kassandra.\r\nThe game features a notoriety system in which mercenaries will chase after the player if they commit crimes like killing or stealing from non-playable characters.\r\n\r\nBoth Alexios and Kassandra start the game as a mercenary and a descendant of the Spartan king Leonidas I. ', 'Intel Core i7-6700 4-Core 3.4GHz', '4 GB', 'Windows 10', 'GeForce GTX 1060 Asus Dual OC 3GB', '60 GB'),
	(13, '/GamesShop/games/PS/spider-man/spider-man.jpg', 'Spider-man', 2, 96.00, '2018-08-17', 5, b'0', 4, 'Чисто ново,автентично приключение със Спайдър-Мен', 'Когато нов злодей застрашава Ню Йорк,световете на Питър Паrкър и Спайдър-Мен се сблъскват. За да спаси градът и тези,които обича,той ще трябва да се възвиси.\r\n\r\nТова не е Човекът паяк,който познаваш отпреди. Това е един опитен Питър Паркър,който е по-изкусен в борбата срещу организираната престъпност в Ню Йорк.Междувременно,той се бори и с \r\nравновесието между личния си живот и кариерата си, докато съдбата на милиони нюйоркчани виси на плещите му.\r\n\r\nСлед осем години зад маската,Питър Паркър е експерт в борбата с престъпността.Усетила пълната сила на един по-опитен Спайдър-Мен посредством импровизирани битки,динамична акробатика,\r\nграциозно придвижване из града и взаимодействия с околната среда.', 'Intel Core 2 Duo 2.6 GHz ', '4 GB', 'Windows 7 ', 'NVidia GeForce 8800 GT', '60 GB'),
	(14, '/GamesShop/games/PSP/every extend extra/every.jpg', 'Every extend extra', 4, 15.00, '2018-08-10', 10, b'0', 2, 'Every Extend Extra', 'Представете си екшън игра, в която няма стрелба! \r\n\r\n\r\n', '333 MHz MIPS R4000', '32 MB eDRAM @ 2.6 GB/s', 'PSP', '	480 × 272 pixels with 16,777,216  colors', '15 GB'),
	(15, '/GamesShop/games/XBOX/divinity 2/divinity 2.jpg', 'Divinity Original Sin 2', 3, 55.00, '2018-08-17', 15, b'0', 4, 'Бездната е на път да погълне света на Ривелон', 'Вина за това има пасмината на заклинателите, разбира се, а магистрите от Божествения Орден са впрегнали всичките си усилия в мисията да прочистят света от заплахата, която представляват \r\nмагьосниците. Магьосниците... като теб. Ти си заловен и хвърлен в мрачните килии на Форт Джой, където скоро ти предстои да бъдеш "излекуван" от магическите си дарби. Единствената уловка е,\r\n че лечението може да се окаже смъртоносно...\r\n\r\nЕдна от най-добрите ролеви игри на всички времена и второто най-добре оценено заглавие за 2017-та година, задминало в крайната си сборна оценка от 94% в Metacritic тежкотоварни хитове от\r\nранга на Persona 5 (93%), Mario Kart 8 Deluxe (92%) идва в своето най-добро издание до момента!', 'Intel Core i5  3.5GHz', '4 GB', 'Windows 10', ' NVIDIA GeForce GTX 770 4GB', '30 GB'),
	(16, '/GamesShop/games/XBOX/battlefield/battlefield.jpg', 'Battlefield V', 3, 78.00, '2018-08-17', 5, b'0', 2, 'Втората световна война, както никога досега.', 'Бъди част от най-големия конфликт на човечеството с Battlefield V; поредицата се завръща към корените си с тази невиждана досега репрезентация на Втората световна война. Бори се с всички сили \r\nс взвода си в различните мултиплейър режими, като обширния Grand Operations и кооперативния Combined Arms, или стани свидетел на човешката драма на фона на глобалния конфликт в \r\nсингълплейър режима War Stories. Наслади се на най-богатия и увлекателен Battlefield правен някога, водейки епични битки в неочаквани места по целия свят.\r\n\r\nВтората световна война, както никога досега\r\n\r\nПренеси се в неочаквани, но ключови моменти за войната в голямото завръщане на Battlefield към корените си.', 'Intel Core i5-6600K 3.5GHz', '4 GB', 'Windwos 10', 'GeForce GTX 950 2GB', '40 GB'),
	(17, '/GamesShop/games/XBOX/dishonored/dishonored.jpg', 'Dishonored', 3, 50.00, '2018-09-20', 6, b'0', 1, 'Dishonored: Death of the Outsider', 'Два месеца след случващото се в Dishonored 2, Billie Lurk се завръща, за да се срещне отново с ментора си - легендарния асасин Daud. Предстои им да извършат удара на века-убийството на \r\nThe Outsider - мистична фигура, отговорна за хаоса и най-лошите дни на Империята. \r\n\r\nКоя е Billie Lurk?\r\nДъщеря на чужденци, дошли от един от многобройните малки острови в океана, Bulli Lurk е родена на втория ден от Месеца на Сърцата през 1813. Израства в Dunwall, прекарвайки детството си в \r\nкъщата на алкохолизираната си майка.Напускайки рано дома, Billie се научава да краде, да се промъква и дори да убива, за да оцелее. Мечтата й е един ден да стане капитан на кораб и да не се \r\nналага повече да живее в сенките.1829 - Billi се присъединява към Whalers - групировка от свръхестествени наемни убийци, която нейният ментор - Daud - сформира през 1811. ', 'Intel Corei3 2.4 GHz ', '4 GB', 'Windows 10', 'NVIDIA GeForce GTX 460 2GB', '30 GB'),
	(18, '/GamesShop/games/PSP/god of war/god of war.jpg', 'God of War', 4, 60.00, '2018-09-20', 2, b'0', 1, 'God of War: Chains of Olympus', 'God of War: Chains of Olympus is a third-person action-adventure video game developed by Ready at Dawn and Santa Monica Studio, and published by Sony Computer Entertainment (SCE). It was first released\r\nfor the PlayStation Portable (PSP) handheld console on March 4, 2008. The game is the fourth installment in the God of War series, the second chronologically, and a prequel to the original God of War.\r\n It is loosely based on Greek mythology and set in ancient Greece.', '333 MHz MIPS R4000', '32 MB eDRAM @ 2.6 GB/s', 'PSP', '	480 × 272 pixels with 16,777,216  colors', '10 GB'),
	(19, '/GamesShop/games/PC/call of duty/call of duty.jpg', 'Call of Duty', 1, 50.00, '2018-09-20', 3, b'0', 2, 'Call of Duty: Infinite Warfare', 'Всепризнатото студио Infinity Ward връща играта Call of Duty към своите корени - а именно - биткaтa между две армии. И тъй като Земята е тясна, за да побере враждуващите фракции, \r\nвойната се пренася отвъд орбита.\r\n\r\nТри уникални режима на игра, всеки от които е разтърсващ и динамичен. Готов ли си за решаващата битка на живот и смърт?\r\n\r\nКампанията!\r\n\r\nПрезареди оръжието, запаси се с муниции, защото те чака едно незабравимо пътешествие. Епичните битки напускат Земята и се пренасят в космоса. Границата е Слънчевата система и решителността \r\nна главните герои да победят. Човешката воля е в основата на всеки подвиг, а човешките чувства са тези, които придават вълнуващ и драматичен блясък към всяка история. На твое разположение са \r\nвоенни космически кораби, страшни врагове, заплашващи човечеството, нова разтърсваща история, която едновременно ще те смрази и ще те изпълни с възторг. ', 'Intel Corei3 2.4 GHz ', '4 GB', 'Windows 10', 'NVIDIA GeForce GTX 460 2GB', '50 GB'),
	(20, '/GamesShop/games/PS/titanfall 2/titanfall 2.jpg', 'Titanfall 2', 2, 30.00, '2018-09-20', 3, b'0', 2, 'Titanfall 2', 'Titan-и и техните Пилоти се обединяват в едно цяло, както никога досега в дългочакваната игра на Respawn Entertainment - Titanfall 2. Стани част от уникалната история, която ще ти разкаже за \r\nспециалната връзка между управляващия и неговия Titan, след което се потопи в динамичем и агресивен мултиплеър с много нововъведения!\r\n\r\nИсторията - ти си стрелец от Militia, чиято мечта е един ден да стане Пилот. Изпратен в тила на врага и лишен от каквито и да е преимущества, ще трябва да се сработиш с Титан от класа Vanguard и \r\nзаедно да завършите мисията, която, по принцип, не би трябвало да изпълняваш. \r\n\r\nНови карти, нови тактики, нов набор от умения и 6 напълно нови Titan-и, които да управляваш, са само част от изненадите, които те очакват в режима multiplayer.\r\n\r\nНезависимо дали си в ролята на Пилот или Titan - обещаваме много екшън и преживявания, които ще те разтърсят. ', 'Intel Corei3 2.4 GHz ', '4 GB', 'Windows 10', 'NVIDIA GeForce GTX 460 2GB', '50 GB'),
	(21, '/GamesShop/games/WII/metroid/metroid.jpg', 'Metroid Prime', 5, 30.00, '2018-09-20', 1, b'0', 2, 'Metroid Prime', 'Metroid Prime is a first-person action-adventure game developed by Retro Studios and Nintendo for the GameCube video game console. It was released in North America on November 17, 2002, and in Japan \r\nand Europe the following year. Metroid Prime is the fifth main installment in the Metroid series. ', '	729 MHz IBM PowerPC "Broadway"', '64 MB', 'Nintendo', '243 MHz ATI "Hollywood"', '15 GB'),
	(22, '/GamesShop/games/PS/destiny 2/destiny 2.jpg', 'Destiny 2', 2, 30.00, '2018-09-20', 1, b'0', 5, 'Destiny 2 ', 'От създателите на безспорния хит Destiny, се задава култовото му продължение. Зареди оръжието си, защото ти предстои ново епично приключение из слънчевата система.\r\n\r\nПоследният човешки град е паднал под натиска на неспираемо зло, водено от Ghaul, командир на бруталния Червен Легион. Той е лишил Пазителите от техните сили, а всички оцелели са избягали.\r\nКакто вече се досещаш, твоята задача е да спомогнеш за оправянето на космическата каша, забъркана с много екшън, убийства, мистерия и динамика. Ще трябва да обходиш непознати планети, да \r\nсе добереш до скритите им оръжия и да се сдобиеш с нови умения. Защото ситуацията изисква съобразителност, търпение, голям брой убити, усъвършвенстване на броня, оръжие и самия теб. \r\nЗа да победиш Червения Легион и да се изправиш срещу Ghaul, първо трябва да обединиш героите на човечеството.', 'Intel Corei3 2.4 GHz ', '4 GB', 'Windows 10', 'NVIDIA GeForce GTX 460 2GB', '30 GB'),
	(23, '/GamesShop/games/PSP/monster hunter/monster.jpg', 'Monster Hunter', 4, 20.00, '2018-09-20', 1, b'0', 5, 'Monster Hunter', 'Monster Hunter Freedom Unite has more missions, equipment, and monsters than Monster Hunter Freedom 2, and a new feature is a Felyne fighter to help the player on their quests. Rarity 9 and 10 armor and \r\nweapons were added, the player can now hold up to 99 of each item type in his/her item box, store up to 20 equipment sets, and get ten equipment pages instead of six. \r\nA new type of quest, the "Epic Hunting Quest", was introduced, which will enable the player to take on, one by one, up to 4 different monsters in one quest.', '333 MHz MIPS R4000', '32 MB eDRAM @ 2.6 GB/s', 'PSP', '	480 × 272 pixels with 16,777,216  colors', '10 GB'),
	(24, '/GamesShop/games/WII/pokemon/pokemon.png', 'Pokemon', 5, 20.00, '2018-09-20', 1, b'0', 5, 'Pokemon', 'Imagine a Pokemon MMORPG...on Wii U, called Pokemon World.\r\n', '	729 MHz IBM PowerPC "Broadway"', '64 MB', 'Nintendo', '243 MHz ATI "Hollywood"', '10 GB'),
	(25, '/GamesShop/games/PC/dragon age/dragon age.jpg', 'Dragon Age Inquisition', 1, 60.00, '2018-09-20', 5, b'0', 4, 'Dragon Age Inquisition', 'Епичната поредица ролеви игри Dragon Age на BioWare прави интригуваща нова крачка напред, подкрепена от мощта на енджина Frostbite 3. Очакват те красиви гледки и невероятни нови възможности.\r\nПриготви се за Dragon Age: Inquisition. Бедствие с катастрофални размери хвърля земите на Тедас (Thedas) в смут. Небето е превзето от могъщите криле на драконите, които хвърлят сянка над \r\nстраната, намираща се на ръба на безредието. Магьосниците започват повсеместна война срещу тираничните рицари. Народите се надигат един срещу друг. От теб и твоите съюзници зависи да \r\nвъзстановите реда като оглавите Инквизицията и преследвате агентите на хаоса.Най-новият екшън-адвенчър на BioWare ти предлага неподражаема история, развиваща се в обширен, \r\nпостоянно променящ се свят. ', 'Intel Corei3 2.4 GHz ', '4 GB', 'Windows 10', 'NVIDIA GeForce GTX 460 2GB', '40 GB'),
	(26, '/GamesShop/games/WII/final fanatsy/fantasy.jpg', 'Final Fantasy', 5, 20.00, '2018-09-20', 5, b'0', 4, 'Final Fantasy', 'The franchise centers on a series of fantasy and science fantasy role-playing video games (RPGs). The first game in the series, published in 1987, was conceived by Sakaguchi as his last-ditch effort in the game industry; it was a success and spawned sequels. The series has since branched into other genres such as tactical role-playing, action role-playing, massively multiplayer online role-playing, racing, third-person shooter, fighting, and rhythm. The franchise has also branched out into other media, including CGI films, anime, manga, and novels.', '	729 MHz IBM PowerPC "Broadway"', '64 MB', 'Nintendo', '243 MHz ATI "Hollywood"', '10 GB'),
	(27, '/GamesShop/games/PSP/valkyrie/valkyrie.jpg', 'Valkyrie', 4, 20.00, '2018-09-20', 5, b'0', 4, 'Valkyrie', 'Valkyrie Profile is a role-playing video game developed by tri-Ace and published by Enix for the PlayStation. ', '333 MHz MIPS R4000', '32 MB eDRAM @ 2.6 GB/s', 'PSP', '	480 × 272 pixels with 16,777,216  colors', '10 GB'),
	(28, '/GamesShop/games/PC/rocket league/rocket.jpg', 'Rocket League', 1, 30.00, '2018-09-20', 5, b'0', 3, 'Rocket League', 'Седни зад волана на летящата, блъскаща се здраво, заредена с ядрено гориво, футуристична, супер-дупер кола в Rocket League: Collector\'s Edition.\r\n\r\nRocket League те екипира с откачен автомобил за откачен мач, в който да блъскаш, разбиваш и съсипваш в името на победата. Геймплеят е плавен, следвайки естествения ход на събитията, \r\nконтролите са напълно интуитивни, а реалистичната система за физично взаимодействие ще те потопи в истинско адреналиново, високо октаново преживяване.\r\n\r\nАбсолютна костюмизация - хиляди начини, по които да разнообразиш автомобила си, предоставящи ти над 100 милярда комбинации.\r\nНевероятни арени - DFH Stadium, Beckwith Park, Mannfield, Urban Station, Utopia Coliseum и Westland.\r\n\r\nФантастичен multiplayer режим:\r\nЗа 4-ма играчи на разделен екран.\r\n8 играчи онлайн.\r\nСъстезания за рангове или без.\r\nВъзможност за създаване на частни мачове, изискващи пароли за достъп.\r\nКросплатформена система.', 'Intel Core 2 Duo 2.6 GHz ', '4 GB', 'Windows 10', 'NVIDIA GeForce GTX 460 2GB', '20 GB'),
	(29, '/GamesShop/games/XBOX/nba2k18/NBA2K18.jpg', 'NBA 2K 18', 3, 30.00, '2018-09-20', 5, b'0', 3, 'NBA 2K 18', 'Допълнителни бонуси включени в пакета: \r\n\r\n10-седмични MyTeam пакета.\r\n5 000 виртуална валута.\r\nДопълнителни костюми за MyPlayer. \r\nФранчайзът NBA 2K се завръща с най - реалистичното баскетболно преживяване, а именно NBA 2K18. Впусни в приключението, поемайки контрол над целия NBA франчайз или докажи уменията си \r\nонлайн срещу геймъри от цял свят. \r\n\r\nС красива графика, реалистични движения и адекватно поведение, това е играта, която ще надмине и най - високите очаквания.\r\n\r\nПотопи се в играта с подобрения геймплей и интуитивно управление.\r\nАдекватен изкуствен интелект, който ще те изненада с решенията си.\r\nРеалистична графика.\r\nНови отбори, с които да играеш.', 'Intel Core i5-6600K 3.5GHz', '4 GB', 'Windows 10', 'NVIDIA GeForce GTX 460 2GB', '20 GB'),
	(30, '/GamesShop/games/PSP/pes2013/pes2013.jpg', 'PES 2013', 4, 30.00, '2018-09-20', 5, b'0', 3, 'PES 2013', 'This year a change is happening. PES 2013 is placing Cristiano Ronaldo as the face of the franchise, accompanied by a series of features.', '333 MHz MIPS R4000', '32 MB eDRAM @ 2.6 GB/s', 'PSP', '	480 × 272 pixels with 16,777,216  colors', '10 GB'),
	(31, '/GamesShop/games/WII/inazuma/inazuma.jpg', 'Inazuma Eleven Strikes', 5, 30.00, '2018-09-20', 5, b'0', 3, 'Inazuma Eleven Strikes', 'Inazuma Eleven Strikers (イナズマイレブン ストライカーズ Inazuma Irebun Strikers) is a role-playing and sports video game for the Wii developed and published by Level-5. It was released on July 16, 2011 in Japan, and was released on September 28, 2012 in Europe.', '	729 MHz IBM PowerPC "Broadway"', '64 MB', 'Nintendo', '243 MHz ATI "Hollywood"', '10 GB');
/*!40000 ALTER TABLE `games` ENABLE KEYS */;

-- Dumping structure for table games_shop.genres
CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gameType` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table games_shop.genres: ~5 rows (approximately)
DELETE FROM `genres`;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
INSERT INTO `genres` (`id`, `gameType`) VALUES
	(1, 'Action/Adventure'),
	(2, 'SHOOTER'),
	(3, 'SPORTS'),
	(4, 'RPG'),
	(5, 'MMORPG');
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;

-- Dumping structure for table games_shop.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` bigint(20) NOT NULL,
  `userId` int(11) NOT NULL,
  `totalSum` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `address` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_orders_users` (`userId`),
  CONSTRAINT `FK_orders_users` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table games_shop.orders: ~4 rows (approximately)
DELETE FROM `orders`;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `orderId`, `userId`, `totalSum`, `date`, `address`) VALUES
	(7, 1797375112, 1, 355, '2018-09-03 21:02:11', 'ul pop hariton 105'),
	(8, 710299051, 1, 178, '2018-09-03 21:12:29', 'ul pop ahriton 105'),
	(9, 727452241, 2, 456, '2018-09-03 22:39:14', 'ul hadji dimityr 54'),
	(10, 341917551, 2, 265, '2018-09-03 22:40:44', 'ul penko todorov 25');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table games_shop.orders_products
CREATE TABLE IF NOT EXISTS `orders_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` int(11) NOT NULL DEFAULT '0',
  `userId` int(11) NOT NULL DEFAULT '0',
  `gameId` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `price` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_orders_products_games` (`gameId`),
  CONSTRAINT `FK_orders_products_games` FOREIGN KEY (`gameId`) REFERENCES `games` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- Dumping data for table games_shop.orders_products: ~9 rows (approximately)
DELETE FROM `orders_products`;
/*!40000 ALTER TABLE `orders_products` DISABLE KEYS */;
INSERT INTO `orders_products` (`id`, `orderId`, `userId`, `gameId`, `quantity`, `price`) VALUES
	(14, 1797375112, 1, 8, 2, 140),
	(15, 1797375112, 1, 6, 3, 150),
	(16, 1797375112, 1, 9, 1, 65),
	(17, 710299051, 1, 12, 1, 78),
	(18, 710299051, 1, 19, 2, 100),
	(19, 727452241, 2, 6, 2, 100),
	(20, 727452241, 2, 7, 4, 356),
	(21, 341917551, 2, 17, 2, 100),
	(22, 341917551, 2, 15, 3, 165);
/*!40000 ALTER TABLE `orders_products` ENABLE KEYS */;

-- Dumping structure for table games_shop.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL DEFAULT '0',
  `lastName` varchar(50) NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '0',
  `picture` varchar(255) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table games_shop.users: ~2 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `firstName`, `lastName`, `username`, `email`, `picture`, `password`) VALUES
	(1, 'Emil', 'Yordanov', 'emicha', 'emicha@mail.bg', '/GamesShop\\avatars\\5b8d5eb087f6e_pic1.jpg', '$2y$10$7eB9/NAiWo57qNBVm/JKQeB.R.FcHwMp6vm2w62fkz2ltmlzick/.'),
	(2, 'Nikolai', 'Nikolaev', 'nikito', 'niki@abv.bg', '/GamesShop\\avatars\\5b8d9b0330c42_pic2.jpg', '$2y$10$WHMqb5AeH5gWwOfTE5oq9Oi9nps0uXUV3eoqMedCeBu3pcvKuj1Wq');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
