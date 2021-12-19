-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u8
-- http://www.phpmyadmin.net
--
-- Darbinė stotis: localhost
-- Atlikimo laikas: 2019 m. Bal 29 d. 17:02
-- Serverio versija: 1.0.35
-- PHP versija: 5.6.37-1~dotdeb+zts+7.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Duomenų bazė: `restoranai1`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `alergenai`
--

CREATE TABLE IF NOT EXISTS `alergenai` (
  `id_alergenai` int(11) NOT NULL DEFAULT '0',
  `name` char(14) NOT NULL,
  PRIMARY KEY (`id_alergenai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `alergenai`
--

INSERT INTO `alergenai` (`id_alergenai`, `name`) VALUES
(1, 'glitimas'),
(2, 'kiausiniai'),
(3, 'zemes_riesutai'),
(4, 'soju_pupeles'),
(5, 'laktoze'),
(6, 'zuvis'),
(7, 'sokoladas');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `asmuo`
--

CREATE TABLE IF NOT EXISTS `asmuo` (
  `vardas` varchar(255) DEFAULT NULL,
  `pavarde` varchar(255) DEFAULT NULL,
  `el_pastas` varchar(255) DEFAULT NULL,
  `telefonas` varchar(255) DEFAULT NULL,
  `gimimo_data` date DEFAULT NULL,
  `asmens_kodas` varchar(255) DEFAULT NULL,
  `id_ASMUO` int(11) NOT NULL AUTO_INCREMENT,
  `fk_STALIUKASid_STALIUKAS` int(11) NOT NULL,
  PRIMARY KEY (`id_ASMUO`),
  KEY `pasodinamas` (`fk_STALIUKASid_STALIUKAS`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=103 ;

--
-- Sukurta duomenų kopija lentelei `asmuo`
--

INSERT INTO `asmuo` (`vardas`, `pavarde`, `el_pastas`, `telefonas`, `gimimo_data`, `asmens_kodas`, `id_ASMUO`, `fk_STALIUKASid_STALIUKAS`) VALUES
('Audrey', 'Benbow', 'abenbow5@360.cn', '+3513213', '1962-02-08', '35949370274', 6, 122),
('Pattie', 'McLardie', 'pmclardie6@g.co', '+52 310 747 6413', '1985-04-12', '36812730749', 7, 87),
('Fairfax', 'Battrick', 'fbattrick7@infoseek.co.jp', '+86 582 666 4637', '1956-01-25', '39711629521', 8, 92),
('Humberto', 'Southam', 'hsoutham8@bing.com', '+51 599 424 6672', '1998-06-04', '41447386187', 9, 70),
('Vernon', 'Fass', 'vfass9@ed.gov', '+92 267 657 0691', '1977-10-24', '43855457587', 10, 19),
('Briant', 'Owbridge', 'bowbridgea@statcounter.com', '+7 228 956 0041', '1988-08-24', '38467241013', 11, 43),
('Aubrette', 'Radden', 'araddenb@is.gd', '+62 843 550 8635', '1957-11-12', '36459534760', 12, 123),
('Cheryl', 'Robertet', 'crobertetc@discovery.com', '+967 912 901 5811', '1992-11-09', '47574621615', 13, 89),
('Hesther', 'Ivankov', 'hivankovd@wikispaces.com', '+63 251 400 1367', '1986-05-02', '41770542575', 14, 95),
('Eward', 'McDuff', 'emcduffe@smugmug.com', '+86 933 804 6342', '1977-08-26', '43069557649', 15, 121),
('Roseanne', 'Buchett', 'rbuchettf@toplist.cz', '+996 590 315 6850', '1973-11-16', '39126921111', 16, 132),
('Billy', 'Forson', 'bforsong@prweb.com', '+63 987 662 6001', '1987-08-09', '40581643328', 17, 46),
('Lawrence', 'Yegorev', 'lyegorevh@ow.ly', '+46 468 470 6760', '1978-03-27', '46121195797', 18, 91),
('Felipe', 'Hassett', 'fhassetti@miibeian.gov.cn', '+62 523 175 4574', '1976-10-30', '36381576363', 19, 12),
('Olly', 'Trodler', 'otrodlerj@mit.edu', '+55 658 738 9658', '2002-02-19', '44523886906', 20, 18),
('Skelly', 'Gartsyde', 'sgartsydek@nba.com', '+86 941 599 9568', '1950-07-24', '41016037785', 21, 45),
('Winnie', 'Vankin', 'wvankinl@nsw.gov.au', '+63 368 969 3832', '1979-04-27', '47099555100', 22, 44),
('Jermaine', 'Ullett', 'jullettm@deliciousdays.com', '+86 892 459 7555', '1987-12-29', '44140748450', 23, 25),
('Celia', 'Hutchinges', 'chutchingesn@nature.com', '+63 563 170 7179', '2003-01-24', '39152880631', 24, 85),
('Yoshi', 'Lettson', 'ylettsono@paypal.com', '+380 176 244 7487', '1957-05-13', '35097207208', 25, 48),
('Alexandre', 'Lorraway', 'alorrawayp@themeforest.net', '+7 295 721 3852', '1993-08-05', '40563179308', 26, 29),
('Clementia', 'Mawtus', 'cmawtusq@netlog.com', '+63 409 705 3920', '1979-03-16', '45015013537', 27, 97),
('Osbourn', 'Catenot', 'ocatenotr@ucoz.com', '+51 574 933 1340', '1972-10-01', '46376192738', 28, 65),
('Kenn', 'Ligoe', 'kligoes@issuu.com', '+968 337 695 1975', '1980-05-13', '41541276733', 29, 67),
('Bertina', 'Dahlbom', 'bdahlbomt@patch.com', '+86 847 442 2956', '1995-12-27', '41522805784', 30, 32),
('Wilona', 'Wehnerr', 'wwehnerru@narod.ru', '+48 840 733 1940', '1976-01-11', '37647221543', 31, 60),
('Barrie', 'Gallant', 'bgallantv@newyorker.com', '+1 606 705 9260', '1998-11-14', '43147336927', 32, 40),
('Gelya', 'Milne', 'gmilnew@who.int', '+86 333 692 4469', '1991-06-21', '35448271589', 33, 18),
('Demetri', 'MacCulloch', 'dmaccullochx@hp.com', '+58 657 534 5509', '1988-10-22', '46386800373', 34, 38),
('Budd', 'Maingot', 'bmaingoty@washingtonpost.com', '+33 589 245 4309', '2001-09-14', '43330436180', 35, 83),
('Pierce', 'Gery', 'pgeryz@pagesperso-orange.fr', '+57 644 585 2732', '1965-06-09', '46779925393', 36, 15),
('Debbie', 'Laite', 'dlaite10@reuters.com', '+961 103 437 6998', '1985-01-13', '45068790297', 37, 74),
('Siouxie', 'Bolles', 'sbolles11@biglobe.ne.jp', '+62 217 178 4805', '1984-08-06', '40730524886', 38, 75),
('Silvie', 'Livings', 'slivings12@reddit.com', '+356 998 187 5190', '2007-12-16', '49478292573', 39, 85),
('Bendick', 'Oldred', 'boldred13@edublogs.org', '+55 149 108 3623', '1977-08-17', '37984803775', 40, 6),
('Erna', 'Shrubsall', 'eshrubsall14@tuttocitta.it', '+46 755 549 0551', '1992-04-20', '40240309065', 41, 74),
('Holden', 'Wrightham', 'hwrightham15@shareasale.com', '+351 299 612 7824', '1972-08-09', '36250125026', 42, 87),
('Charmion', 'Bish', 'cbish16@netscape.com', '+7 418 749 4186', '1993-07-13', '48562959208', 43, 76),
('Yelena', 'Flory', 'yflory17@huffingtonpost.com', '+20 122 784 1017', '2004-12-17', '39348729625', 44, 72),
('Amberly', 'Ollerton', 'aollerton18@princeton.edu', '+62 645 739 6582', '1961-04-12', '36493326920', 45, 90),
('Aveline', 'McKeefry', 'amckeefry19@miitbeian.gov.cn', '+7 558 791 0397', '1961-03-21', '36961420275', 46, 31),
('Toma', 'Stubbley', 'tstubbley1a@blogtalkradio.com', '+33 481 574 8275', '1991-12-29', '37945562729', 47, 59),
('Ash', 'Ahrenius', 'aahrenius1b@meetup.com', '+53 707 206 2368', '1985-12-28', '37890720994', 48, 27),
('Mikel', 'Kegg', 'mkegg1c@hud.gov', '+86 744 148 4232', '1992-04-27', '37818656651', 49, 61),
('Margret', 'Mabbott', 'mmabbott1d@unc.edu', '+1 907 168 6599', '1958-04-09', '35083355822', 50, 93),
('Bryanty', 'Giveen', 'bgiveen1e@admin.ch', '+7 634 397 4360', '1969-06-28', '43351726262', 51, 18),
('Mauricio', 'Satterfitt', 'msatterfitt1f@economist.com', '+62 359 821 8125', '1999-05-11', '35521011881', 52, 95),
('Meaghan', 'Akram', 'makram1g@about.com', '+351 175 846 8652', '1969-06-29', '35622768807', 53, 63),
('Rachel', 'Kubes', 'rkubes1h@barnesandnoble.com', '+225 709 683 0272', '2003-05-09', '39336014918', 54, 22),
('Allene', 'Welham', 'awelham1i@cnet.com', '956658784', '1982-08-10', '43183169015', 55, 58),
('Percy', 'Shenley', 'pshenley1j@stanford.edu', '+351 924 495 7335', '1991-12-09', '39529406883', 56, 2),
('Sylvan', 'Tiley', 'stiley1k@woothemes.com', '+55 211 712 0913', '2000-06-16', '45552190418', 57, 37),
('Bambie', 'Bonome', 'bbonome1l@google.ru', '+1 562 602 0677', '1957-03-24', '45723105451', 58, 75),
('Brittne', 'Ortas', 'bortas1m@mozilla.com', '+57 674 428 8010', '1988-07-25', '42407972793', 59, 19),
('Valery', 'Christoforou', 'vchristoforou1n@reverbnation.com', '+62 405 329 2344', '1966-10-06', '42132695619', 60, 54),
('Gray', 'Vennard', 'gvennard1o@shutterfly.com', '+66 866 428 5773', '1997-08-09', '45757396683', 61, 75),
('Amalle', 'Sudlow', 'asudlow1p@shop-pro.jp', '+352 809 943 2398', '1996-11-04', '37822372276', 62, 38),
('Alasteir', 'Boissieux', 'aboissieux1q@simplemachines.org', '+976 787 883 3041', '1970-06-12', '43798718374', 63, 122),
('Eryn', 'Edsell', 'eedsell1r@mlb.com', '+267 922 677 3902', '1983-02-06', '49446836089', 64, 48),
('Kalie', 'Paynes', 'kpaynes1s@spotify.com', '+1 812 244 1419', '2002-10-27', '40118994044', 65, 83),
('Chastity', 'Hartrick', 'chartrick1t@army.mil', '+63 509 720 7016', '1977-11-24', '48382427394', 66, 21),
('Magdaia', 'Beevers', 'mbeevers1u@dailymail.co.uk', '+27 930 126 1978', '1955-10-17', '49572737889', 67, 95),
('Cortney', 'Leworthy', 'cleworthy1v@answers.com', '+86 789 424 9090', '1956-04-25', '42731619909', 68, 24),
('Ronica', 'Sheer', 'rsheer1w@edublogs.org', '+51 338 831 3700', '1997-02-12', '41414808231', 69, 42),
('Cecily', 'Heppenspall', 'cheppenspall1x@squarespace.com', '+420 473 469 5450', '1952-11-17', '45823425576', 70, 38),
('Dominick', 'Gowanson', 'dgowanson1y@diigo.com', '+81 408 704 1849', '1981-08-08', '41992183758', 71, 39),
('Schuyler', 'Zienkiewicz', 'szienkiewicz1z@bloglines.com', '+244 164 323 7905', '1954-11-18', '45015076090', 72, 33),
('Ortensia', 'Naisey', 'onaisey20@blinklist.com', '+63 322 350 3050', '1952-02-29', '48289218470', 73, 8),
('Vinita', 'Palatino', 'vpalatino21@privacy.gov.au', '+30 867 690 3647', '1997-01-03', '44389740928', 74, 75),
('Audra', 'Murrock', 'amurrock22@friendfeed.com', '+7 646 359 0912', '2006-03-14', '48754010293', 75, 65),
('Humfrey', 'Going', 'hgoing23@tripadvisor.com', '+93 513 303 6265', '1995-10-30', '41940390770', 76, 83),
('Maryellen', 'Fallon', 'mfallon24@t.co', '+420 621 295 0504', '1995-12-11', '49233368327', 77, 17),
('My', 'Road', 'mroad25@ow.ly', '+976 812 520 0241', '2001-09-12', '40318973349', 78, 122),
('Layton', 'Brehaut', 'lbrehaut26@deviantart.com', '+86 603 866 2985', '1961-12-02', '38497598046', 79, 31),
('Agnella', 'Velte', 'avelte27@arizona.edu', '+33 667 100 7686', '1970-08-25', '42447485625', 80, 27),
('Kora', 'Gerbl', 'kgerbl28@ycombinator.com', '+351 708 172 3709', '1996-02-19', '48812672017', 81, 67),
('Reed', 'Colliford', 'rcolliford29@vk.com', '+7 494 491 9194', '1974-04-04', '48754567924', 82, 12),
('Berna', 'Litton', 'blitton2a@moonfruit.com', '+86 982 214 7952', '1977-07-23', '42343354904', 83, 90),
('Devon', 'Raynham', 'draynham2b@skype.com', '+86 592 446 2443', '1959-07-29', '43394632963', 84, 91),
('Carree', 'Mardee', 'cmardee2c@illinois.edu', '+351 203 844 8908', '1972-08-12', '36743935366', 85, 77),
('Merline', 'Cann', 'mcann2d@so-net.ne.jp', '+375 871 820 3778', '1993-01-19', '46256795322', 86, 82),
('Philbert', 'Olland', 'polland2e@youku.com', '+420 141 821 5195', '1952-11-24', '44393475077', 87, 55),
('Adham', 'Ivamy', 'aivamy2f@jimdo.com', '+7 432 770 9758', '1995-08-23', '36994300138', 88, 67),
('Tiertza', 'Jobson', 'tjobson2g@ow.ly', '+86 218 415 1956', '1952-02-12', '44139411224', 89, 15),
('Sharleen', 'Domelaw', 'sdomelaw2h@freewebs.com', '+421 619 308 0254', '1987-06-17', '47347698930', 90, 95),
('Wat', 'Lennox', 'wlennox2i@jimdo.com', '+51 487 929 5963', '1957-10-30', '48972279022', 91, 73),
('Scarlet', 'Buckby', 'sbuckby2j@webnode.com', '+46 187 865 7639', '2000-11-11', '46686319457', 92, 77),
('Kelsi', 'Sorrie', 'ksorrie2k@goo.gl', '+225 432 624 8775', '1972-08-12', '48142746394', 93, 78),
('Danya', 'Denerley', 'ddenerley2l@smugmug.com', '+62 714 870 9484', '1990-10-26', '37594403217', 94, 3),
('Harp', 'Atlee', 'hatlee2m@bluehost.com', '+86 275 173 1944', '2001-09-05', '39192265867', 95, 90),
('Petey', 'Pladen', 'ppladen2n@google.ca', '+386 519 450 2367', '1969-10-02', '48331000270', 96, 67),
('Ingunna', 'Guyers', 'iguyers2o@about.me', '+48 677 140 5343', '1993-01-17', '48793026590', 97, 93),
('Winni', 'Sanchis', 'wsanchis2p@latimes.com', '+7 846 173 7512', '1999-01-09', '44616964000', 98, 15),
('Cherrita', 'Dillow', 'cdillow2q@hp.com', '+86 316 967 3094', '1972-08-23', '49181927137', 99, 15),
('Michell', 'Bolf', 'mbolf2r@arizona.edu', '+98 823 622 3143', '1966-12-20', '44931708080', 100, 79),
('sdfvzdvgz', 'dvgfzsdfvzs', 'gasd@gmiaasd.com', '46842644826', '2015-12-30', '1664564864', 101, 9),
('Jonas', 'Jonas', 'as@sdsdf.com', '846846464', '2016-01-07', '35454544', 102, 78);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `gaminiu_tipai`
--

CREATE TABLE IF NOT EXISTS `gaminiu_tipai` (
  `id_gaminiu_tipai` int(11) NOT NULL DEFAULT '0',
  `name` char(17) NOT NULL,
  PRIMARY KEY (`id_gaminiu_tipai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `gaminiu_tipai`
--

INSERT INTO `gaminiu_tipai` (`id_gaminiu_tipai`, `name`) VALUES
(1, 'desertai'),
(2, 'gerimai'),
(3, 'karsti_patiekalai'),
(4, 'picos'),
(5, 'pyragai'),
(6, 'tortai'),
(7, 'sausainiai'),
(8, 'salotos'),
(9, 'sriubos'),
(10, 'sumustiniai'),
(11, 'troskiniai'),
(12, 'uzkandziai');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `gaminys`
--

CREATE TABLE IF NOT EXISTS `gaminys` (
  `pavadinimas` varchar(255) DEFAULT NULL,
  `galiojimo_data` date DEFAULT NULL,
  `pagaminimo_data` date DEFAULT NULL,
  `kaina` double DEFAULT NULL,
  `tipas` int(11) DEFAULT NULL,
  `id_GAMINYS` int(11) NOT NULL AUTO_INCREMENT,
  `fk_RESTORANASid_RESTORANAS` int(11) NOT NULL,
  PRIMARY KEY (`id_GAMINYS`),
  KEY `tipas` (`tipas`),
  KEY `ruosia` (`fk_RESTORANASid_RESTORANAS`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=114 ;

--
-- Sukurta duomenų kopija lentelei `gaminys`
--

INSERT INTO `gaminys` (`pavadinimas`, `galiojimo_data`, `pagaminimo_data`, `kaina`, `tipas`, `id_GAMINYS`, `fk_RESTORANASid_RESTORANAS`) VALUES
('Chinese Holly', '2019-09-09', '2018-10-24', 165.27, 6, 1, 11),
('Bright Green Dudleya', '2019-11-12', '2018-05-12', 150.86, 2, 2, 2),
('Philippine Tung', '2019-07-06', '2019-02-17', 39.72, 10, 3, 3),
('Fourpetal Cliffbush', '2019-05-09', '2018-07-31', 25.51, 12, 4, 4),
('Broadleaf Wild Leek', '2019-08-20', '2018-07-10', 316.9, 5, 5, 5),
('Yam', '2019-08-05', '2019-02-26', 194.98, 6, 6, 6),
('Polyblastia Lichen', '2019-04-20', '2018-06-11', 37.72, 7, 7, 7),
('Big Deervetch', '2019-10-16', '2017-11-19', 219.85, 7, 8, 8),
('Waxberry', '2019-09-05', '2018-02-27', 206.56, 10, 9, 9),
('Xylopia', '2019-11-04', '2017-12-26', 44.38, 10, 10, 10),
('Licorice Weed', '2019-04-08', '2018-09-30', 161.48, 8, 11, 11),
('Curtis'' Threeawn', '2019-06-28', '2017-11-28', 337.09, 8, 12, 12),
('Hess'' Fleabane', '2019-02-10', '2018-12-13', 317.03, 8, 13, 13),
('California Bentgrass', '2019-09-19', '2017-12-10', 124.69, 9, 14, 14),
('Oldfield Blackberry', '2019-10-20', '2019-05-13', 380.63, 3, 15, 15),
('Boquillas Sandmat', '2019-07-26', '2018-07-05', 192.82, 4, 16, 16),
('Scribble Lichen', '2019-04-21', '2019-04-29', 189.35, 2, 17, 17),
('Yellow Anisetree', '2019-10-29', '2019-05-14', 208.02, 9, 18, 18),
('Sand Lovegrass', '2019-08-15', '2019-02-22', 69.34, 10, 19, 19),
('Cucumberleaf Sunflower', '2019-11-16', '2018-12-03', 389.86, 2, 20, 20),
('Parry''s Sedge', '2019-06-23', '2019-05-16', 248.81, 11, 21, 21),
('Velvetleaf Huckleberry', '2019-09-15', '2018-01-13', 43.1, 7, 22, 22),
('Spurry Buckwheat', '2019-07-18', '2018-02-08', 312.69, 5, 23, 23),
('Chia', '2019-06-03', '2018-08-25', 399.34, 3, 24, 24),
('Knotweed', '2019-03-28', '2018-08-04', 312.65, 5, 25, 25),
('Flor De San Jose', '2019-05-14', '2017-11-21', 232.31, 6, 26, 26),
('Soot Lichen', '2019-10-18', '2018-08-13', 18.47, 9, 27, 27),
('Rapp''s Shell Lichen', '2019-04-05', '2018-07-25', 307.28, 3, 28, 28),
('Tiny Mousetail', '2019-10-25', '2018-11-26', 165.17, 10, 29, 29),
('Hybrid Willow', '2019-04-05', '2018-05-20', 303.68, 12, 30, 30),
('Brassia', '2019-03-15', '2018-10-07', 283.16, 4, 31, 31),
('Shortray Fleabane', '2019-02-12', '2019-03-19', 226.43, 4, 32, 32),
('Strict Primrose', '2019-03-27', '2018-11-04', 76.3, 4, 33, 33),
('Broussaisia', '2019-04-12', '2018-11-08', 88.43, 10, 34, 34),
('Na Pali-kona Woodfern', '2019-11-01', '2019-05-26', 20.5, 8, 35, 35),
('Elephant Tree', '2019-10-01', '2018-01-05', 239.42, 7, 36, 36),
('Creeping Willow', '2019-10-06', '2018-12-31', 169.57, 10, 37, 37),
('Weber''s Century Plant', '2019-09-29', '2019-02-10', 206.94, 8, 38, 38),
('Cyrtandra', '2019-06-09', '2019-02-27', 379.69, 7, 39, 39),
('Dianella', '2019-07-18', '2018-12-01', 324.2, 3, 40, 40),
('Longbeak Buttercup', '2019-03-19', '2018-05-29', 46.23, 7, 41, 41),
('Hasse''s Psorotichia Lichen', '2019-07-30', '2019-05-29', 199.26, 5, 42, 42),
('Hicaquillo', '2019-07-16', '2019-02-13', 137.31, 9, 43, 43),
('Sedge', '2019-08-12', '2018-05-14', 320.18, 4, 44, 44),
('Curcuma', '2019-08-18', '2019-04-18', 144.63, 1, 45, 45),
('Willamette Valley Bittercress', '2019-03-04', '2018-01-02', 156.67, 7, 46, 46),
('Bryoerythrophyllum Moss', '2019-06-16', '2018-01-22', 54.92, 4, 47, 47),
('Prickly Hornwort', '2019-03-03', '2019-01-25', 50.14, 5, 48, 48),
('Fritz''s Zeuxine', '2019-03-16', '2019-01-22', 288.51, 12, 49, 49),
('Shieldplant', '2019-08-15', '2018-01-01', 181.87, 2, 50, 50),
('Elephant''s Ear', '2019-08-17', '2018-05-20', 265.21, 2, 51, 51),
('Sheep Fleabane', '2019-03-22', '2019-01-02', 300.08, 10, 52, 52),
('Plagiomnium Moss', '2019-05-08', '2018-01-01', 151.34, 3, 53, 53),
('Limestoneglade Bladderpod', '2019-07-28', '2018-10-07', 374.89, 11, 54, 54),
('Northern Groundsel', '2019-03-17', '2019-04-23', 152.98, 1, 55, 55),
('Organ Mountain Rockdaisy', '2019-11-07', '2019-05-04', 18.25, 1, 56, 56),
('Leadtree', '2019-04-27', '2019-04-15', 271.74, 1, 57, 57),
('Chaplin''s Golden Columbine', '2019-05-12', '2018-02-03', 347.88, 9, 58, 58),
('Cottontree', '2019-05-17', '2018-01-08', 389.37, 8, 59, 59),
('Grimmia Dry Rock Moss', '2019-06-24', '2019-04-12', 77.66, 1, 60, 60),
('Clammy Locust', '2019-04-02', '2018-01-30', 20.77, 4, 61, 61),
('Northern Wildrice', '2019-06-18', '2018-04-25', 334.95, 3, 62, 62),
('Winged Bog Orchid', '2019-11-17', '2018-09-27', 140.2, 2, 63, 63),
('Selfing Willowherb', '2019-11-01', '2018-08-22', 215.09, 6, 64, 64),
('Adobe Snakeroot', '2019-10-01', '2018-08-28', 309.88, 9, 65, 65),
('Beardtongue', '2019-08-07', '2017-11-22', 64.61, 8, 66, 66),
('Lemmon''s Poppy', '2019-02-12', '2018-02-06', 205.57, 7, 67, 67),
('Rhodobryum Moss', '2019-06-28', '2018-11-19', 201.23, 2, 68, 68),
('Clapperton''s Parkia', '2019-10-24', '2018-08-06', 183.16, 3, 69, 69),
('Lung Lichen', '2019-07-10', '2019-01-19', 177.36, 9, 70, 70),
('Black Salsify', '2019-10-07', '2018-02-26', 136.7, 7, 71, 71),
('Slenderflower Saltbush', '2019-06-13', '2018-03-04', 193.4, 7, 72, 72),
('Rio Grande Nailwort', '2019-11-03', '2017-11-22', 149.33, 9, 73, 73),
('Mediterranean Cabbage', '2019-07-17', '2017-12-25', 164.33, 3, 74, 74),
('Oniongrass', '2019-03-18', '2018-08-24', 36.95, 2, 75, 75),
('Lace Hedgehog Cactus', '2019-03-10', '2017-12-06', 331.28, 9, 76, 76),
('Mendocino Gentian', '2019-08-30', '2018-10-08', 222.27, 12, 77, 77),
('Greater Brown Sedge', '2019-06-14', '2019-04-22', 174.39, 1, 78, 78),
('Storm Sedge', '2019-03-21', '2019-03-05', 348.96, 3, 79, 79),
('Nineleaf Biscuitroot', '2019-07-14', '2017-11-29', 126.78, 4, 80, 80),
('Howell''s Bluegrass', '2019-10-04', '2018-09-21', 137.15, 4, 81, 81),
('Yellow Columbine', '2019-08-15', '2018-07-12', 231.65, 5, 82, 82),
('Newberry''s Velvetmallow', '2019-09-17', '2018-09-26', 305.63, 10, 83, 83),
('Clarkton Hawthorn', '2019-03-07', '2018-02-11', 84.53, 8, 84, 84),
('Fourangle Melicope', '2019-05-25', '2019-04-11', 169.71, 3, 85, 85),
('Oakleaf Mountain Ash', '2019-06-04', '2018-10-03', 225.55, 12, 86, 86),
('Orange Lichen', '2019-07-05', '2019-01-22', 107.61, 9, 87, 87),
('Sawtooth Goldenbush', '2019-06-27', '2018-04-19', 252.88, 5, 88, 88),
('Hatiora', '2019-08-07', '2017-11-12', 369.95, 9, 89, 89),
('Hybrid Oak', '2019-04-09', '2018-08-11', 11.47, 8, 90, 90),
('Small Woodland Sunflower', '2019-02-12', '2017-12-05', 51.03, 7, 91, 91),
('Averrhoa', '2019-09-22', '2018-03-14', 66.58, 8, 92, 92),
('Ironweed', '2019-07-03', '2018-03-18', 310.43, 7, 93, 93),
('Smallflower False Foxglove', '2019-05-06', '2018-11-14', 305.15, 4, 94, 94),
('Ragged Rockflower', '2019-05-31', '2018-07-07', 228.46, 11, 95, 95),
('Palmer''s Rabbitbrush', '2019-03-13', '2018-02-16', 11.27, 4, 96, 96),
('Great Basin Popcornflower', '2019-03-22', '2019-04-24', 238.55, 1, 97, 97),
('Muskeg Lousewort', '2019-06-11', '2018-05-05', 118.62, 4, 98, 98),
('Wedgeleaf Violet', '2019-09-24', '2018-05-07', 307.89, 1, 99, 99),
('Serpentine Sedge', '2019-02-11', '2018-09-24', 386.76, 4, 100, 100),
('fsdfdg', '2016-01-19', '2016-01-11', 5, 4, 102, 16),
('Trololo', '2016-01-13', '2016-01-06', 15, 4, 103, 10),
('Trololo', '2016-01-13', '2016-01-06', 15, 4, 104, 10),
('Trololo', '2016-01-13', '2016-01-06', 15, 4, 105, 10),
('Trololo', '2016-01-13', '2016-01-06', 15, 4, 106, 10),
('Trololo', '2016-01-13', '2016-01-06', 15, 4, 107, 10),
('Trololo', '2016-01-13', '2016-01-06', 15, 4, 108, 10),
('sfsdf', '2016-01-18', '2016-01-12', 12, 1, 109, 2),
('1', '2016-01-18', '2016-01-03', 2, 1, 110, 1),
('sdfsdfsdf', '2016-01-06', '2015-12-28', 10, 1, 111, 2),
('sdfsdfs', '2016-01-04', '2016-01-11', 12, 1, 112, 1);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `ivertinimas`
--

CREATE TABLE IF NOT EXISTS `ivertinimas` (
  `komentaras` varchar(255) DEFAULT NULL,
  `ivertinimas` int(11) DEFAULT NULL,
  `id_IVERTINIMAS` int(11) NOT NULL AUTO_INCREMENT,
  `fk_ASMUOid_ASMUO` int(11) NOT NULL,
  `fk_GAMINYSid_GAMINYS` int(11) NOT NULL,
  PRIMARY KEY (`id_IVERTINIMAS`),
  KEY `ivertinimas` (`ivertinimas`),
  KEY `palieka` (`fk_ASMUOid_ASMUO`),
  KEY `turi` (`fk_GAMINYSid_GAMINYS`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=102 ;

--
-- Sukurta duomenų kopija lentelei `ivertinimas`
--

INSERT INTO `ivertinimas` (`komentaras`, `ivertinimas`, `id_IVERTINIMAS`, `fk_ASMUOid_ASMUO`, `fk_GAMINYSid_GAMINYS`) VALUES
('Corrosion of unsp degree of right forearm, init encntr', 3, 6, 6, 6),
('Inj cutan sensory nerve at lower leg level, right leg, subs', 3, 7, 7, 7),
('Erb''s paralysis due to birth injury', 2, 8, 8, 8),
('Oth disrd of bone density and structure, left upper arm', 5, 9, 9, 9),
('Chronic gout due to renal impairment, unsp site, with tophus', 4, 10, 10, 10),
('Tarsal tunnel syndrome, unspecified lower limb', 1, 11, 11, 11),
('Poisoning by unsp psychodyslept, accidental, init', 3, 12, 12, 12),
('Nondisp fx of olecran pro w intartic extn right ulna, init', 4, 13, 13, 13),
('Body mass index [BMI]', 2, 14, 14, 14),
('War op involving explosion of unsp marine weapon, civilian', 2, 15, 15, 15),
('Unsp fx shaft of unsp tibia, 7thH', 1, 16, 16, 16),
('Bent bone of unsp rad, subs for opn fx type I/2 w nonunion', 1, 17, 17, 17),
('Poisoning by diagnostic agents, intentional self-harm, init', 3, 18, 18, 18),
('Unspecified fracture of the lower end of radius', 2, 19, 19, 19),
('NIHSS score 6', 1, 20, 20, 20),
('Disp fx of med wall of r acetab, subs for fx w delay heal', 1, 21, 21, 21),
('Oth injury of plantar artery of left foot, sequela', 3, 22, 22, 22),
('Lacrimal fistula right lacrimal passage', 5, 23, 23, 23),
('Laceration with foreign body, left foot, initial encounter', 3, 24, 24, 24),
('Injury of portal or splenic vein and branches', 1, 25, 25, 25),
('Milt op w direct blast effect of nuclear weapon, milt', 1, 26, 26, 26),
('Scombroid fish poisoning, assault, subsequent encounter', 3, 27, 27, 27),
('Other chorioretinal inflammations', 1, 28, 28, 28),
('Pnctr of abd wl w/o fb,periumb rgn w/o penet perit cav, sqla', 3, 29, 29, 29),
('I/I react d/t implanted urinary sphincter, initial encounter', 2, 30, 30, 30),
('Age-related osteopor w current path fracture, l humerus', 4, 31, 31, 31),
('Unsp injury of blood vessel of right little finger, init', 2, 32, 32, 32),
('Abscess of tendon sheath, ankle and foot', 3, 33, 33, 33),
('Prsn brd/alit a 3-whl mv injured in collision w hv veh, init', 3, 34, 34, 34),
('Ankylosing spondylitis of lumbosacral region', 2, 35, 35, 35),
('Congenital complete absence of lower limb, bilateral', 5, 36, 36, 36),
('Pneumoconiosis due to other dust containing silica', 1, 37, 37, 37),
('Inj msl/tnd lng extensor muscle of toe at ank/ft level', 4, 38, 38, 38),
('Burn of second degree of right upper arm, subs encntr', 2, 39, 39, 39),
('Unspecified nonpowered-aircraft accident injuring occupant', 4, 40, 40, 40),
('Benign neoplasm of short bones of lower limb', 5, 41, 41, 41),
('Cataract (lens) fragmt in eye fol cataract surgery, left eye', 2, 42, 42, 42),
('Unilateral inguinal hernia, w obst, w/o gangrene, recurrent', 3, 43, 43, 43),
('Open bite of other finger with damage to nail, sequela', 3, 44, 44, 44),
('Complete traumatic transmetcrpl amp of right hand, init', 1, 45, 45, 45),
('Oth physl fx upper end of r femur, subs for fx w delay heal', 5, 46, 46, 46),
('Paravaccinia, unspecified', 5, 47, 47, 47),
('Disp fx of distal phalanx of right great toe, init', 4, 48, 48, 48),
('Nondisp fx of greater trochanter of unsp femr, 7thP', 2, 49, 49, 49),
('Unsp injury of right pulmonary blood vessels, subs encntr', 2, 50, 50, 50),
('Oth injury of blood vessel of right middle finger', 5, 51, 51, 51),
('Assault by hot household appliances, initial encounter', 3, 52, 52, 52),
('Sprain of interphalangeal joint of right ring finger', 1, 53, 53, 53),
('Sleep apnea', 4, 54, 54, 54),
('Nondisp fx of r radial styloid pro, 7thK', 1, 55, 55, 55),
('Toxic effect of venom of arthropod, accidental', 3, 56, 56, 56),
('Unsp fx low end r tibia, 7thF', 5, 57, 57, 57),
('Lacerat unsp blood vessel at wrs/hnd lv of unsp arm, subs', 4, 58, 58, 58),
('Stiff-man syndrome', 3, 59, 59, 59),
('Partial traumatic amputation of left midfoot', 5, 60, 60, 60),
('Inj flexor musc/fasc/tend thmb at forearm level, init', 1, 61, 61, 61),
('Nondisp oth fx tuberosity of r calcaneus, 7thK', 3, 62, 62, 62),
('Unsp retained (old) intraocular fb, magnetic, bilateral', 2, 63, 63, 63),
('Nondisp oblique fx shaft of r tibia, 7thC', 1, 64, 64, 64),
('Toxic effect of carbon tetrachloride, accidental', 4, 65, 65, 65),
('Torus fx lower end of right tibia, subs for fx w malunion', 4, 66, 66, 66),
('Pnctr w foreign body of left great toe w/o damage to nail', 4, 67, 67, 67),
('Pnctr w foreign body of left thumb w damage to nail, sequela', 5, 68, 68, 68),
('Other specified diabetes mellitus with hyperglycemia', 3, 69, 69, 69),
('Late newborn, not heavy for gestational age', 2, 70, 70, 70),
('Corrosion of unsp degree of unsp shoulder, init encntr', 1, 71, 71, 71),
('Car passenger injured in clsn w 2/3-whl mv in traf, init', 3, 72, 72, 72),
('Displ transverse fx shaft of unsp fibula, 7thN', 2, 73, 73, 73),
('Unsp physl fx upr end rad, left arm, subs for fx w malunion', 2, 74, 74, 74),
('Explosion on board other powered watercraft, sequela', 5, 75, 75, 75),
('War operations involving other firearms discharge', 2, 76, 76, 76),
('Digestants', 4, 77, 77, 77),
('Nondisp fx of olecran pro w intartic extn l ulna, 7thR', 3, 78, 78, 78),
('Pasngr in hv veh inj in clsn w nonmtr vehicle in traf, init', 5, 79, 79, 79),
('Inj radial artery at forearm level, right arm, subs encntr', 4, 80, 80, 80),
('Unsp fx shaft of unsp ulna, subs for clos fx w delay heal', 5, 81, 81, 81),
('Retinopathy of prematurity, unspecified', 5, 82, 82, 82),
('Maternal care for anti-D antibodies, unspecified trimester', 5, 83, 83, 83),
('Maxillary fracture, right side', 1, 84, 84, 84),
('Spastic ectropion of left eye, unspecified eyelid', 5, 85, 85, 85),
('Corros second degree of unsp single finger except thumb', 1, 86, 86, 86),
('Rupture of synovium, unspecified wrist', 3, 87, 87, 87),
('Heat exhaustion due to salt depletion, sequela', 4, 88, 88, 88),
('Unsp injury of musc/fasc/tend long hd bicep, unsp arm, init', 1, 89, 89, 89),
('Other specified diseases of inner ear', 5, 90, 90, 90),
('Partial traumatic transmetacarpal amputation of left hand', 1, 91, 91, 91),
('Other juvenile arthritis, left elbow', 4, 92, 92, 92),
('Nondisp seg fx shaft of rad, r arm, 7thK', 3, 94, 94, 94),
('Burn first degree of unsp mult fngr (nail), inc thumb, init', 1, 95, 95, 95),
('Toxic effect of unsp substance, accidental, subs', 3, 96, 96, 96),
('Displ osteochon fx left patella, subs for clos fx w nonunion', 3, 97, 97, 97),
('Flatback syndrome, site unspecified', 1, 98, 98, 98),
('Juvenile osteochondrosis, hand', 3, 99, 99, 99);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `ivertinimu_tipai`
--

CREATE TABLE IF NOT EXISTS `ivertinimu_tipai` (
  `id_ivertinimu_tipai` int(11) NOT NULL DEFAULT '0',
  `name` char(12) NOT NULL,
  PRIMARY KEY (`id_ivertinimu_tipai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `ivertinimu_tipai`
--

INSERT INTO `ivertinimu_tipai` (`id_ivertinimu_tipai`, `name`) VALUES
(1, 'blogai'),
(2, 'vidutiniskai'),
(3, 'gerai'),
(4, 'labai_gerai'),
(5, 'puikiai');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `matavimo_vienetai`
--

CREATE TABLE IF NOT EXISTS `matavimo_vienetai` (
  `id_matavimo_vienetai` int(11) NOT NULL DEFAULT '0',
  `name` char(19) NOT NULL,
  PRIMARY KEY (`id_matavimo_vienetai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `matavimo_vienetai`
--

INSERT INTO `matavimo_vienetai` (`id_matavimo_vienetai`, `name`) VALUES
(1, 'gramas'),
(2, 'kilogramas'),
(3, 'vienetas'),
(4, 'valgomasis_saukstas'),
(5, 'arbatinis_saukstas'),
(6, 'ziupsnelis'),
(7, 'litras'),
(8, 'mililitras');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `padavejas`
--

CREATE TABLE IF NOT EXISTS `padavejas` (
  `vardas` varchar(255) DEFAULT NULL,
  `pavarde` varchar(255) DEFAULT NULL,
  `id_PADAVEJAS` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_PADAVEJAS`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- Sukurta duomenų kopija lentelei `padavejas`
--

INSERT INTO `padavejas` (`vardas`, `pavarde`, `id_PADAVEJAS`) VALUES
('Consalve4', 'Yewenw', 1),
('Chancey', 'Etty', 2),
('Tybi', 'Gallego', 3),
('Edithe', 'Heselwood', 4),
('Sanderson', 'Sharville', 5),
('Bradford', 'Ewestace', 6),
('Lainey', 'Coytes', 7),
('Morris', 'Sneath', 8),
('Inga', 'Elden', 9),
('Amargo', 'Dimsdale', 10),
('Eben', 'Kenzie', 11),
('Cassaundra', 'Frushard', 12),
('Cynthea', 'Berecloth', 13),
('Darya', 'Shakshaft', 14),
('Jessika', 'Hatzar', 15),
('Parke', 'Mintrim', 16),
('Dasha', 'Lodin', 17),
('Lyman', 'Eaglen', 18),
('Dore', 'Anthiftle', 19),
('Inger', 'Oats', 20),
('Enoch', 'Assiratti', 21),
('Hedi', 'Rude', 22),
('Hale', 'Simmance', 23),
('Rollo', 'Garrod', 24),
('Gertie', 'Tilburn', 25),
('Franciskus', 'Steart', 26),
('Vinnie', 'Goodfield', 27),
('Ellis', 'Syphus', 28),
('Dulcia', 'Dursley', 29),
('Pauly', 'Silliman', 30),
('Stepha', 'Rucklidge', 31),
('Ranice', 'Bosanko', 32),
('Estell', 'Gealle', 33),
('Salmon', 'Norster', 34),
('Carley', 'Orbine', 35),
('Syman', 'Manshaw', 36),
('Shay', 'Zarb', 37),
('Beret', 'Terren', 38),
('Roshelle', 'Elsip', 39),
('Obidiah', 'Grishukhin', 40),
('Henry', 'Whitecross', 41),
('Field', 'Hickeringill', 42),
('Iorgos', 'Pfiffer', 43),
('Minni', 'Gosdin', 44),
('Eleanore', 'Hopewell', 45),
('Cal', 'Grief', 46),
('Grant', 'McAreavey', 47),
('Tucky', 'Winchurst', 48),
('Justinn', 'Leek', 49),
('Ignatius', 'Roose', 50),
('sdfsdf', 'sdfsdf', 52),
('Ignas', 'Ignaitis', 53),
('Jonas', 'Petras', 56);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `produktas`
--

CREATE TABLE IF NOT EXISTS `produktas` (
  `pavadinimas` varchar(255) DEFAULT NULL,
  `kiekis` int(11) DEFAULT NULL,
  `alergenas` int(11) DEFAULT NULL,
  `matavimo_vienetas` int(11) DEFAULT NULL,
  `id_PRODUKTAS` int(11) NOT NULL AUTO_INCREMENT,
  `fk_SANDELYSid_SANDELYS` int(11) NOT NULL,
  PRIMARY KEY (`id_PRODUKTAS`),
  KEY `alergenas` (`alergenas`),
  KEY `matavimo_vienetas` (`matavimo_vienetas`),
  KEY `laikomas` (`fk_SANDELYSid_SANDELYS`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=106 ;

--
-- Sukurta duomenų kopija lentelei `produktas`
--

INSERT INTO `produktas` (`pavadinimas`, `kiekis`, `alergenas`, `matavimo_vienetas`, `id_PRODUKTAS`, `fk_SANDELYSid_SANDELYS`) VALUES
('Kellogs All Bran Bars', 65, 5, 4, 1, 1),
('Coffee Caramel Biscotti', 81, 7, 4, 2, 2),
('Calypso - Strawberry Lemonade', 48, 7, 8, 3, 3),
('Chinese Foods - Cantonese', 51, 6, 4, 4, 4),
('Appetizer - Mango Chevre', 88, 1, 3, 5, 5),
('Anchovy Fillets', 60, 6, 1, 6, 6),
('Gelatine Powder', 81, 2, 4, 7, 7),
('Lettuce - Boston Bib', 68, 1, 6, 8, 8),
('Leeks - Baby, White', 40, 2, 3, 9, 9),
('Tomatoes - Vine Ripe, Red', 1, 6, 1, 10, 10),
('Puree - Kiwi', 91, 5, 6, 11, 11),
('Asparagus - Frozen', 58, 5, 8, 12, 12),
('Sobe - Tropical Energy', 64, 7, 6, 13, 13),
('Garbag Bags - Black', 73, 3, 6, 14, 14),
('Pork - Backs - Boneless', 45, 5, 4, 15, 15),
('Mince Meat - Filling', 62, 6, 6, 16, 16),
('Wine - Ruffino Chianti', 79, 7, 8, 17, 17),
('Sprouts Dikon', 17, 5, 7, 18, 18),
('Cookies - Amaretto', 35, 6, 6, 19, 19),
('Melon - Honey Dew', 90, 1, 4, 20, 20),
('Iced Tea - Lemon, 460 Ml', 18, 5, 2, 21, 21),
('Carrots - Jumbo', 9, 4, 6, 22, 22),
('Veal - Kidney', 13, 4, 1, 23, 23),
('Lettuce - Lolla Rosa', 51, 4, 8, 24, 24),
('Scallops 60/80 Iqf', 60, 1, 1, 25, 25),
('Soup - Campbellschix Stew', 55, 4, 8, 26, 26),
('Soup Knorr Chili With Beans', 18, 6, 3, 27, 27),
('Brownies - Two Bite, Chocolate', 15, 5, 6, 28, 28),
('Smoked Tongue', 47, 3, 8, 29, 29),
('Artichokes - Jerusalem', 11, 3, 7, 30, 30),
('Lamb Rack Frenched Australian', 27, 7, 3, 31, 31),
('Plasticspoonblack', 61, 4, 5, 32, 32),
('Clams - Littleneck, Whole', 42, 7, 7, 33, 33),
('Muffin - Bran Ind Wrpd', 46, 5, 6, 34, 34),
('Coffee - 10oz Cup 92961', 99, 4, 1, 35, 35),
('Red Currants', 78, 6, 7, 36, 36),
('Initation Crab Meat', 29, 3, 2, 37, 37),
('Mushroom - Porcini, Dry', 95, 1, 5, 38, 38),
('Crab - Imitation Flakes', 42, 2, 3, 39, 39),
('Rosemary - Fresh', 88, 4, 4, 40, 40),
('Tomato - Peeled Italian Canned', 14, 3, 2, 41, 41),
('Compound - Pear', 62, 1, 3, 42, 42),
('Beer - Muskoka Cream Ale', 60, 7, 3, 43, 43),
('Ice Cream Bar - Hageen Daz To', 55, 1, 8, 44, 44),
('Beef - Striploin', 47, 7, 4, 45, 45),
('Yoplait - Strawbrasp Peac', 34, 1, 4, 46, 46),
('Whmis Spray Bottle Graduated', 32, 3, 2, 47, 47),
('Napkin - Beverage 1 Ply', 31, 6, 6, 48, 48),
('Cheese - Camembert', 70, 6, 2, 49, 49),
('Squid - U - 10 Thailand', 3, 2, 2, 50, 50),
('Tart Shells - Savory, 2', 92, 4, 3, 51, 51),
('Papadam', 90, 1, 5, 52, 52),
('Shark - Loin', 94, 1, 5, 53, 53),
('The Pop Shoppe - Root Beer', 13, 6, 1, 54, 54),
('Cream - 10%', 7, 1, 7, 55, 55),
('Butter - Pod', 79, 5, 3, 56, 56),
('Otomegusa Dashi Konbu', 27, 7, 7, 57, 57),
('Otomegusa Dashi Konbu', 56, 7, 3, 58, 58),
('Crackers - Graham', 37, 2, 1, 59, 59),
('Apple - Macintosh', 94, 4, 7, 60, 60),
('Soupfoamcont12oz 112con', 13, 5, 8, 61, 61),
('Cheese - Ermite Bleu', 35, 2, 1, 62, 62),
('Nougat - Paste / Cream', 99, 1, 2, 63, 63),
('Wine - Vineland Estate Semi - Dry', 79, 2, 1, 64, 64),
('Soup - Clam Chowder, Dry Mix', 22, 1, 4, 65, 65),
('Dikon', 75, 4, 6, 66, 66),
('Fenngreek Seed', 98, 5, 3, 67, 67),
('Water - Spring Water 500ml', 68, 7, 1, 68, 68),
('Split Peas - Yellow, Dry', 41, 5, 6, 69, 69),
('Pastry - Baked Cinnamon Stick', 99, 2, 2, 70, 70),
('Table Cloth - 53x69 Colour', 85, 2, 3, 71, 71),
('Wine - Red, Marechal Foch', 43, 6, 5, 72, 72),
('Apple - Delicious, Red', 23, 1, 2, 73, 73),
('Olives - Nicoise', 56, 1, 4, 74, 74),
('Cheese - Gouda Smoked', 34, 5, 8, 75, 75),
('Cumin - Whole', 72, 3, 8, 76, 76),
('Pastry - Baked Cinnamon Stick', 45, 7, 6, 77, 77),
('Sansho Powder', 38, 1, 1, 78, 78),
('Veal - Osso Bucco', 88, 3, 2, 79, 79),
('Island Oasis - Magarita Mix', 5, 1, 4, 80, 80),
('Bread - Pain Au Liat X12', 14, 6, 1, 81, 81),
('Apricots - Halves', 60, 6, 6, 82, 82),
('Squeeze Bottle', 26, 4, 8, 83, 83),
('Wine - Semi Dry Riesling Vineland', 73, 2, 2, 84, 84),
('Spring Roll Wrappers', 7, 3, 2, 85, 85),
('Oats Large Flake', 50, 3, 1, 86, 86),
('Nut - Pecan, Halves', 11, 3, 1, 87, 87),
('Extract Vanilla Pure', 25, 1, 3, 88, 88),
('Vinegar - White Wine', 54, 4, 8, 89, 89),
('Wine - Red, Pelee Island Merlot', 28, 7, 8, 90, 90),
('Seedlings - Mix, Organic', 21, 3, 1, 91, 91),
('Chicken - Breast, 5 - 7 Oz', 35, 5, 2, 92, 92),
('Beans - Turtle, Black, Dry', 15, 7, 8, 93, 93),
('Sauce - Caesar Dressing', 60, 1, 1, 94, 94),
('Creme De Cacao White', 62, 5, 5, 95, 95),
('Chips - Potato Jalapeno', 49, 5, 1, 96, 96),
('Pastry - Cheese Baked Scones', 68, 3, 4, 97, 97),
('Red Currants', 46, 3, 5, 98, 98),
('Champagne - Brights, Dry', 75, 7, 7, 99, 99),
('Bread - Corn Muffaleta Onion', 13, 1, 5, 100, 100),
('tututu', 2, 3, 2, 101, 2),
('Rutu', 1, 6, 3, 104, 4),
('3213', 54, 4, 4, 105, 6);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `restoranas`
--

CREATE TABLE IF NOT EXISTS `restoranas` (
  `pavadinimas` varchar(255) DEFAULT NULL,
  `adresas` varchar(255) DEFAULT NULL,
  `el_pastas` varchar(255) DEFAULT NULL,
  `telefonas` varchar(255) DEFAULT NULL,
  `imones_kodas` varchar(255) DEFAULT NULL,
  `banko_saskaita` varchar(255) DEFAULT NULL,
  `id_RESTORANAS` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_RESTORANAS`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=104 ;

--
-- Sukurta duomenų kopija lentelei `restoranas`
--

INSERT INTO `restoranas` (`pavadinimas`, `adresas`, `el_pastas`, `telefonas`, `imones_kodas`, `banko_saskaita`, `id_RESTORANAS`) VALUES
('1', '2', '3@3.3', '4', '5', '6', 1),
('Bergnaum, McGlynn and Abbott', '24 Pierstorff Center', 'ckitney1@japanpost.jp', '522-761-5264', '286846239', '378867877381026', 2),
('Johns-Simonis', '11 Farragut Circle', 'lpitway2@people.com.cn', '666-428-2744', '766116018', '3532969434044456', 3),
('Dooley, Eichmann and Johnston', '6801 Starling Road', 'tcottier3@elpais.com', '105-484-7856', '242896117', '3552530825257506', 4),
('Hagenes LLC', '52 Burning Wood Circle', 'wmaass4@go.com', '659-970-8089', '612921823', '4905050327703032', 5),
('Oberbrunner, Bins and Moen', '4 Comanche Street', 'aspalton5@elegantthemes.com', '841-282-8119', '737401244', '50383590678524002', 6),
('Wilderman-Berge', '0 Fallview Trail', 'vreagan6@bluehost.com', '755-455-3608', '843455950', '3562855591848727', 7),
('Konopelski-Smith', '22730 Grasskamp Crossing', 'jbonnaire7@freewebs.com', '634-101-9620', '231824905', '3572478279539076', 8),
('Monahan-Mayer', '85 2nd Hill', 'bgillibrand8@dagondesign.com', '272-698-7359', '557817164', '4917838300841928', 9),
('Becker-Kreiger', '03985 Glendale Avenue', 'aomohun9@blogs.com', '779-654-5156', '378490805', '201482041130649', 10),
('Kuvalis Group', '4 Arrowood Parkway', 'whowsdena@stumbleupon.com', '965-295-9921', '427180185', '3556069130425124', 11),
('Gerhold, Kertzmann and Daugherty', '65701 Crescent Oaks Alley', 'lbiceb@linkedin.com', '548-347-8046', '778456118', '5893324244125343', 12),
('Jacobs LLC', '46981 Glendale Trail', 'lkorneichikc@addthis.com', '411-456-7135', '725127954', '5428720113257329', 13),
('Farrell-Auer', '8 Sherman Terrace', 'bverryand@google.nl', '428-384-3414', '923332609', '3574422342787393', 14),
('Emmerich LLC', '3 Towne Parkway', 'dbleesinge@zimbio.com', '583-772-5711', '848722532', '676148799036168927', 15),
('Waters, Hilll and Spencer', '4102 Fuller Plaza', 'mcogginf@google.es', '280-117-4954', '498456253', '30013835681526', 16),
('Hermiston-McGlynn', '484 Annamark Avenue', 'mhallattg@weather.com', '313-468-4759', '618391379', '6759348014385838', 17),
('Oberbrunner-Nienow', '22104 Randy Crossing', 'lpinnockh@yahoo.com', '336-612-4475', '893352498', '490561650261357723', 18),
('Frami, Brakus and Wilkinson', '2 3rd Drive', 'mkilgalleni@nyu.edu', '560-455-3473', '784740411', '5100131355870545', 19),
('Tremblay, Gibson and Hills', '5 Grover Pass', 'erobathonj@spotify.com', '825-279-4549', '593600179', '30403438691701', 20),
('Lindgren-Glover', '02784 Marcy Street', 'gduminik@harvard.edu', '538-427-8304', '579527830', '3569555270599681', 21),
('Blanda, Beier and Kirlin', '81 Maryland Lane', 'fwoolhousel@amazonaws.com', '834-631-7208', '846508107', '3546802257401624', 22),
('Murphy Group', '22399 Corscot Street', 'ccapronm@meetup.com', '471-454-7888', '896126131', '3582956857292729', 23),
('Mayer, Dibbert and Weber', '4179 Barnett Terrace', 'iheffyn@hubpages.com', '412-770-2868', '688875587', '3540591447009498', 24),
('Turner, Carroll and Turcotte', '46254 Gateway Point', 'mgelemano@usda.gov', '111-522-6485', '456542662', '370051932732774', 25),
('Pfannerstill Group', '37 Village Green Junction', 'bmerietp@washingtonpost.com', '978-306-1706', '894195779', '6395964660345114', 26),
('Wiegand Group', '3 Pond Road', 'jcroomq@addthis.com', '495-276-2042', '250269918', '374283600320675', 27),
('Kerluke-Zemlak', '54 Montana Alley', 'hpappinr@google.de', '784-862-7378', '414402448', '3573896143737965', 28),
('Yost LLC', '8 Declaration Junction', 'sloxleys@irs.gov', '962-915-8390', '271834113', '3542765034413242', 29),
('Collier, Bradtke and Sanford', '8469 Glacier Hill Avenue', 'hklampkt@woothemes.com', '704-805-8238', '520702585', '3575866826134630', 30),
('Schulist and Sons', '5 Commercial Point', 'dmckaileu@comsenz.com', '629-111-9083', '697659222', '6333086694020594509', 31),
('Kassulke-Langosh', '90 Northridge Crossing', 'ajuryv@aol.com', '118-290-7583', '317669446', '3565738744868015', 32),
('Okuneva-Nikolaus', '263 Susan Road', 'rdrewittw@pbs.org', '216-319-9857', '759924721', '6771085301722026', 33),
('Simonis, Fahey and Crooks', '438 Valley Edge Junction', 'vchansonnex@arstechnica.com', '804-266-7435', '386386747', '3543299994879027', 34),
('Treutel, Jerde and Pfannerstill', '88 Vera Terrace', 'mkaveneyy@tuttocitta.it', '850-230-9821', '589289774', '3547750617411446', 35),
('Hessel, O''Kon and Wolf', '5749 Lakewood Plaza', 'dyaninz@jigsy.com', '865-518-3225', '545691686', '3538785487190937', 36),
('Schaden, Kshlerin and Bode', '78234 Warner Hill', 'egalego10@tripadvisor.com', '854-971-7983', '691450717', '4844865778714293', 37),
('Baumbach, Keebler and Marvin', '5 Eagle Crest Parkway', 'gfilkin11@skype.com', '218-939-2959', '842845465', '373957110145638', 38),
('Sporer, Beier and Satterfield', '212 Fordem Hill', 'ssnoxill12@unblog.fr', '337-726-3690', '390956780', '4911010974610477356', 39),
('Moore, Jakubowski and Bechtelar', '14392 Clyde Gallagher Place', 'rorr13@delicious.com', '882-530-9415', '757417655', '3549291591549800', 40),
('Watsica-Kunde', '03305 Eastlawn Street', 'arohan14@exblog.jp', '260-847-6640', '307220888', '3529309696581447', 41),
('Flatley, Reynolds and Roberts', '51 Amoth Place', 'ecudbertson15@hatena.ne.jp', '458-419-0521', '617801710', '201872914098578', 42),
('Blick LLC', '09223 Waxwing Avenue', 'ggaskamp16@dagondesign.com', '159-488-5182', '575494388', '67596766864966093', 43),
('Daugherty, Cremin and Kuhn', '648 Sheridan Center', 'amccallion17@foxnews.com', '298-161-8677', '431501665', '36356440279416', 44),
('Jenkins Group', '401 Green Point', 'sguyet18@goo.ne.jp', '511-719-9885', '337640220', '3555100734387716', 45),
('Bruen-Mitchell', '48163 Fairfield Park', 'ndizlie19@mozilla.org', '440-504-4685', '899784881', '348404308604136', 46),
('Langworth LLC', '1055 Laurel Hill', 'atremlett1a@vinaora.com', '942-976-5289', '614393401', '3533991855170874', 47),
('O''Hara, Schuppe and Goldner', '086 Green Trail', 'echancelier1b@state.tx.us', '782-177-6487', '891718847', '3529944530851265', 48),
('Gleason LLC', '6684 Weeping Birch Alley', 'molver1c@newyorker.com', '797-940-0654', '582678702', '5568269171009644', 49),
('Boehm LLC', '76 Bonner Junction', 'cpevreal1d@hexun.com', '391-760-2999', '889995927', '3549061508289406', 50),
('Wyman-Lowe', '8131 Everett Drive', 'oandri1e@foxnews.com', '540-289-7594', '820924030', '5198269952189712', 51),
('Bogisich Inc', '96815 Fair Oaks Terrace', 'yminer1f@yellowbook.com', '159-826-7873', '680618376', '372301624882587', 52),
('Stamm-Borer', '198 Carberry Street', 'korchart1g@stumbleupon.com', '701-606-9407', '348500646', '6771312965945325', 53),
('McDermott, O''Connell and Yundt', '8 Clemons Hill', 'tminto1h@naver.com', '280-181-1644', '904799538', '3539233777055972', 54),
('Windler-Murazik', '960 Dennis Lane', 'ldahler1i@sun.com', '172-758-1416', '780866725', '3573440613907962', 55),
('Pfeffer and Sons', '27226 Annamark Road', 'hshaves1j@usatoday.com', '261-720-0922', '658105141', '30158957799596', 56),
('Osinski Group', '33920 Upham Terrace', 'jmccafferky1k@springer.com', '223-302-1754', '914993492', '30437902462595', 57),
('Davis-Dach', '93142 Oakridge Drive', 'rdaintry1l@elegantthemes.com', '291-873-9192', '553780264', '377577327445534', 58),
('Hartmann LLC', '94 Shelley Way', 'dkiljan1m@mlb.com', '215-954-3211', '881018370', '201633820261779', 59),
('Reilly, Durgan and Welch', '22 Hayes Hill', 'dchopy1n@mozilla.org', '493-171-6253', '443020539', '3539494920948477', 60),
('Turner, Thiel and Rohan', '34756 Doe Crossing Terrace', 'mugolini1o@drupal.org', '103-130-1681', '731111213', '3558240688491358', 61),
('Feeney, Lowe and Skiles', '98016 Westend Court', 'efendlen1p@cbslocal.com', '389-799-0915', '911244223', '3566743844631676', 62),
('Krajcik Group', '13001 Farmco Pass', 'ppitkaithly1q@nationalgeographic.com', '981-892-1219', '541838157', '3562699639287104', 63),
('Schumm and Sons', '7988 Declaration Point', 'dkamena1r@theguardian.com', '975-572-5551', '690346843', '3558632292470374', 64),
('Nolan, Wilkinson and Boyle', '492 Bunting Avenue', 'pcarbine1s@tuttocitta.it', '266-302-8361', '531613578', '5602248254104397', 65),
('Schneider-Schamberger', '65 Havey Avenue', 'mhamner1t@amazon.de', '771-759-9197', '455011955', '630461881646455120', 66),
('VonRueden-Turner', '63649 Loomis Pass', 'kcorkel1u@elegantthemes.com', '551-607-8575', '366689640', '3541964712290938', 67),
('Runte and Sons', '9299 High Crossing Way', 'kdeesly1v@acquirethisname.com', '889-295-0047', '684759361', '3588775305610363', 68),
('Bruen Group', '79251 Lakewood Gardens Crossing', 'pbiasio1w@squidoo.com', '618-628-6489', '232453079', '5172560525418673', 69),
('Nitzsche Group', '530 High Crossing Point', 'bpanyer1x@java.com', '524-595-2462', '265045019', '3562035337149496', 70),
('Heidenreich-Davis', '746 Sachtjen Crossing', 'tgleader1y@example.com', '188-817-8676', '319528000', '5610228450542673', 71),
('VonRueden, Hahn and Quitzon', '6 Roth Plaza', 'cpanichelli1z@wired.com', '413-522-0451', '817202582', '5038431320133491', 72),
('Dare, Murray and Zieme', '776 Prentice Alley', 'thonacker20@ucoz.com', '808-602-9255', '453477101', '201960994318535', 73),
('Maggio Group', '03185 Lake View Avenue', 'jdowzell21@tinyurl.com', '910-229-5289', '651239825', '5602258823185272', 74),
('Dibbert, Hammes and Herzog', '972 Kings Junction', 'mcushelly22@utexas.edu', '759-496-9011', '900215744', '5602218122778466', 75),
('Weimann and Sons', '693 Elka Street', 'bspoward23@thetimes.co.uk', '522-943-8042', '401121867', '5002355314621561', 76),
('Keeling and Sons', '122 Dovetail Crossing', 'cspindler24@census.gov', '502-512-0414', '437295668', '201432666759487', 77),
('Morissette, Gerlach and Langosh', '3 Sunfield Drive', 'dlievesley25@nifty.com', '715-920-0418', '779520767', '67610259297554480', 78),
('Reichert-Shanahan', '87977 Holy Cross Pass', 'seplett26@businessinsider.com', '635-264-7917', '742952293', '3543910473676912', 79),
('Heaney-Mann', '62 Anzinger Hill', 'nralls27@barnesandnoble.com', '372-187-3276', '656625476', '36778943280338', 80),
('Stehr-Braun', '9 Carpenter Parkway', 'ttunkin28@istockphoto.com', '907-464-1883', '302153456', '3583613264126136', 81),
('Lockman, Olson and McKenzie', '6824 Tony Hill', 'mtyer29@archive.org', '178-545-3604', '594305168', '6333897490652082', 82),
('Watsica, Wisozk and Mueller', '88 Esch Avenue', 'stremmil2a@cnbc.com', '668-480-5173', '448624067', '3563030633967153', 83),
('Gislason-Goyette', '997 Northport Park', 'lsafell2b@e-recht24.de', '153-700-2639', '617876455', '6761085810898988', 84),
('Leannon, Turcotte and Christiansen', '4 Continental Park', 'jdrohane2c@google.com', '504-210-8194', '880670891', '676295446447330032', 85),
('Fisher Inc', '9072 Canary Point', 'grockcliffe2d@dot.gov', '273-472-4199', '359887350', '337941749340716', 86),
('Heathcote Inc', '0 Bowman Court', 'bbellamy2e@npr.org', '487-749-6247', '281448854', '3556941029973176', 87),
('Brakus, Thompson and Bashirian', '5 Barby Center', 'ajerred2f@squidoo.com', '261-743-4688', '871716269', '4313516774604', 88),
('Kozey and Sons', '1214 Meadow Ridge Drive', 'lblundell2g@domainmarket.com', '151-712-9252', '520395083', '3561323167479881', 89),
('Streich, Gulgowski and Marvin', '08 Gateway Trail', 'kmacalinden2h@ning.com', '326-937-0293', '775186013', '30211564656400', 90),
('Upton-Halvorson', '8 Dakota Court', 'bthurstan2i@quantcast.com', '149-664-6590', '313440999', '3532449887704229', 91),
('Jerde-Toy', '33546 Lakeland Trail', 'czelner2j@zdnet.com', '369-885-0062', '596703864', '6334879231366110324', 92),
('Zieme-Mann', '8943 Loftsgordon Hill', 'gwatters2k@state.tx.us', '982-944-8941', '775197548', '560224083556430873', 93),
('Swaniawski LLC', '41322 Hayes Court', 'sshuttleworth2l@sitemeter.com', '219-576-4874', '536193372', '4903908336447010', 94),
('Boyer, Zboncak and Oberbrunner', '0 Waxwing Pass', 'vowens2m@typepad.com', '732-557-3957', '225382941', '3576130786281264', 95),
('Farrell, Balistreri and Langosh', '314 Heath Road', 'ksorrell2n@imgur.com', '771-868-6170', '319043453', '560221622018358256', 96),
('Altenwerth Group', '6 8th Lane', 'msquire2o@google.co.uk', '344-964-3533', '626503191', '6759051899022514', 97),
('Fahey-Hackett', '9423 Ronald Regan Park', 'jmurrison2p@ft.com', '296-254-9700', '477106277', '3566009787094698', 98),
('Hansen-Breitenberg', '28064 Ruskin Alley', 'gpinare2q@netscape.com', '993-133-5499', '667887565', '337941076913614', 99),
('Donnelly Group', '9307 Londonderry Trail', 'pcowperthwaite2r@feedburner.com', '235-490-9071', '454441074', '5602237433629119', 100),
('new restaurant ', 'sdasdsd ', 'jnjgnj@jhnjhj.com', '8492846842', '842684684df', 'lt68426842642684', 102),
('Pas Igną', 'Igno g. 5', 'ignascool@gmail.com', '868456846', '6468842684', 'LT-************', 103);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `ruosiamas_produktu`
--

CREATE TABLE IF NOT EXISTS `ruosiamas_produktu` (
  `fk_PRODUKTASid_PRODUKTAS` int(11) NOT NULL DEFAULT '0',
  `fk_GAMINYSid_GAMINYS` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fk_PRODUKTASid_PRODUKTAS`,`fk_GAMINYSid_GAMINYS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `ruosiamas_produktu`
--

INSERT INTO `ruosiamas_produktu` (`fk_PRODUKTASid_PRODUKTAS`, `fk_GAMINYSid_GAMINYS`) VALUES
(1, 1),
(1, 109),
(1, 110),
(1, 111),
(2, 110),
(3, 3),
(3, 107),
(3, 108),
(4, 4),
(4, 107),
(5, 1),
(5, 5),
(5, 106),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(10, 106),
(10, 111),
(11, 11),
(12, 1),
(12, 12),
(12, 108),
(13, 1),
(13, 13),
(14, 14),
(14, 109),
(15, 1),
(15, 15),
(15, 106),
(16, 16),
(17, 17),
(17, 111),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31),
(32, 32),
(33, 33),
(34, 34),
(35, 35),
(36, 36),
(37, 37),
(38, 38),
(39, 39),
(40, 40),
(41, 41),
(42, 42),
(43, 43),
(44, 44),
(45, 45),
(46, 46),
(47, 47),
(48, 48),
(49, 49),
(50, 50),
(51, 51),
(52, 52),
(53, 53),
(54, 54),
(55, 55),
(56, 56),
(57, 57),
(58, 58),
(59, 59),
(60, 60),
(61, 61),
(62, 62),
(63, 63),
(64, 64),
(65, 65),
(66, 66),
(67, 67),
(68, 68),
(69, 69),
(70, 70),
(71, 71),
(72, 72),
(73, 73),
(74, 74),
(75, 75),
(76, 76),
(77, 77),
(78, 78),
(79, 79),
(80, 80),
(81, 81),
(82, 82),
(83, 83),
(84, 84),
(85, 85),
(86, 86),
(87, 87),
(88, 88),
(89, 89),
(90, 90),
(91, 91),
(92, 92),
(93, 93),
(94, 94),
(95, 95),
(96, 96),
(97, 97),
(98, 1),
(98, 98),
(99, 99),
(100, 100);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `sandelys`
--

CREATE TABLE IF NOT EXISTS `sandelys` (
  `temperatura` double DEFAULT NULL,
  `talpa` int(11) DEFAULT NULL,
  `paskutine_revizija` date DEFAULT NULL,
  `id_SANDELYS` int(11) NOT NULL AUTO_INCREMENT,
  `fk_RESTORANASid_RESTORANAS` int(11) NOT NULL,
  PRIMARY KEY (`id_SANDELYS`),
  UNIQUE KEY `fk_RESTORANASid_RESTORANAS` (`fk_RESTORANASid_RESTORANAS`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

--
-- Sukurta duomenų kopija lentelei `sandelys`
--

INSERT INTO `sandelys` (`temperatura`, `talpa`, `paskutine_revizija`, `id_SANDELYS`, `fk_RESTORANASid_RESTORANAS`) VALUES
(19.3, 5841067, '2019-12-22', 1, 1),
(26.12, 9087116, '2010-10-04', 2, 2),
(-39.27, 9893480, '2013-09-12', 3, 3),
(-3.89, 6441920, '2016-11-26', 4, 4),
(35.93, 5350762, '2016-03-23', 5, 5),
(37.42, 9267331, '2013-03-14', 6, 6),
(-23, 3823958, '2018-05-26', 7, 7),
(-36.46, 8887182, '2017-02-08', 8, 8),
(-32.23, 8197081, '2017-01-25', 9, 9),
(-11.7, 6087483, '2012-09-20', 10, 10),
(-0.63, 7856824, '2013-05-23', 11, 11),
(2.08, 5450298, '2018-10-20', 12, 12),
(27.47, 1818133, '2012-08-02', 13, 13),
(7.81, 1967535, '2018-05-06', 14, 14),
(-8.32, 7177552, '2016-04-19', 15, 15),
(28.15, 377276, '2013-06-05', 16, 16),
(-11.45, 1324159, '2015-08-25', 17, 17),
(4.63, 9718678, '2016-02-16', 18, 18),
(-25.22, 9220665, '2015-01-28', 19, 19),
(23.02, 2344915, '2011-06-08', 20, 20),
(4.45, 4478175, '2020-02-11', 21, 21),
(31.95, 1457536, '2012-02-14', 22, 22),
(4.34, 6444616, '2012-05-10', 23, 23),
(2.79, 6905017, '2018-12-31', 24, 24),
(-35.35, 4852375, '2013-03-12', 25, 25),
(26.43, 3126564, '2017-07-24', 26, 26),
(-11.63, 8905565, '2011-03-24', 27, 27),
(-0.02, 6749274, '2010-11-03', 28, 28),
(22.55, 3893352, '2016-04-21', 29, 29),
(7.82, 2280847, '2011-12-08', 30, 30),
(19.13, 8135796, '2012-04-29', 31, 31),
(-9.83, 2618585, '2014-11-21', 32, 32),
(-30.86, 5333211, '2016-07-27', 33, 33),
(34.89, 5465584, '2018-10-25', 34, 34),
(17.74, 8197387, '2019-09-18', 35, 35),
(19.64, 9675040, '2012-06-17', 36, 36),
(5.33, 255356, '2014-10-31', 37, 37),
(5.79, 559341, '2013-10-06', 38, 38),
(29, 4751622, '2016-09-15', 39, 39),
(11.26, 3252674, '2015-05-27', 40, 40),
(-14.99, 3485029, '2019-11-28', 41, 41),
(-11.86, 5415059, '2019-05-28', 42, 42),
(-20.83, 4714327, '2013-04-13', 43, 43),
(26.55, 8456550, '2014-04-21', 44, 44),
(-20.17, 4648241, '2014-03-23', 45, 45),
(5.51, 6095789, '2018-06-18', 46, 46),
(-13.69, 6541416, '2015-01-28', 47, 47),
(19.4, 5020073, '2012-10-24', 48, 48),
(1.56, 6782425, '2011-03-01', 49, 49),
(-19.81, 1283167, '2016-05-22', 50, 50),
(-26.91, 9546396, '2017-09-15', 51, 51),
(3.54, 4922083, '2015-02-08', 52, 52),
(24.27, 2999682, '2015-08-31', 53, 53),
(-9.75, 7942901, '2017-02-06', 54, 54),
(-31.32, 2257803, '2017-09-16', 55, 55),
(-23.75, 5420743, '2017-11-23', 56, 56),
(37.68, 1019013, '2011-10-20', 57, 57),
(-27.69, 4923418, '2013-02-19', 58, 58),
(38.68, 4463450, '2010-12-20', 59, 59),
(26.14, 3510713, '2014-08-08', 60, 60),
(-5.59, 7670972, '2016-02-17', 61, 61),
(21.32, 1221840, '2010-04-29', 62, 62),
(38.2, 4507289, '2014-06-13', 63, 63),
(-37.13, 2528611, '2017-12-01', 64, 64),
(-22.18, 3717919, '2012-12-19', 65, 65),
(-39.71, 1995961, '2016-02-04', 66, 66),
(12.21, 1398100, '2017-05-14', 67, 67),
(38.91, 3144078, '2016-03-16', 68, 68),
(15.09, 1482915, '2019-02-21', 69, 69),
(-6.55, 7258211, '2019-10-13', 70, 70),
(38.92, 9529685, '2014-09-08', 71, 71),
(16.02, 2487865, '2019-04-23', 72, 72),
(-27.58, 9303826, '2011-10-16', 73, 73),
(29.45, 8521861, '2016-09-27', 74, 74),
(0.46, 9148672, '2016-08-31', 75, 75),
(-32.25, 8050446, '2017-07-26', 76, 76),
(7.75, 8464250, '2014-09-01', 77, 77),
(-39.42, 7973543, '2015-09-26', 78, 78),
(27.9, 6773974, '2011-03-29', 79, 79),
(-10.4, 9278930, '2016-03-13', 80, 80),
(21.15, 8698950, '2012-04-03', 81, 81),
(-8.88, 4220231, '2012-03-15', 82, 82),
(-37.79, 2882841, '2015-09-13', 83, 83),
(24.08, 443913, '2012-12-12', 84, 84),
(-8.08, 1920897, '2018-10-22', 85, 85),
(-35.63, 3134844, '2015-12-28', 86, 86),
(24.57, 6135291, '2012-06-21', 87, 87),
(-31.26, 7888816, '2017-03-21', 88, 88),
(-29.67, 1679460, '2018-02-18', 89, 89),
(-4.7, 21293, '2010-04-02', 90, 90),
(22.57, 8281287, '2014-06-12', 91, 91),
(-4.83, 7329316, '2012-12-31', 92, 92),
(13.42, 3766119, '2010-06-08', 93, 93),
(3.53, 5760963, '2016-07-20', 94, 94),
(-32.29, 5726547, '2011-05-04', 95, 95),
(4.91, 9380086, '2013-03-24', 96, 96),
(0.23, 6969452, '2017-10-09', 97, 97),
(30.43, 7794200, '2018-04-05', 98, 98),
(-2.29, 6797383, '2017-03-23', 99, 99),
(-21.26, 7654251, '2018-12-24', 100, 100);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `saskaita`
--

CREATE TABLE IF NOT EXISTS `saskaita` (
  `data` date DEFAULT NULL,
  `numeris` int(11) DEFAULT NULL,
  `bendra_suma` double DEFAULT NULL,
  `apmoketa` tinyint(1) DEFAULT NULL,
  `id_SASKAITA` int(11) NOT NULL AUTO_INCREMENT,
  `fk_STALIUKASid_STALIUKAS` int(11) NOT NULL,
  `fk_UZSAKYMASid_UZSAKYMAS` int(11) NOT NULL,
  `fk_RESTORANASid_RESTORANAS` int(11) NOT NULL,
  PRIMARY KEY (`id_SASKAITA`),
  UNIQUE KEY `fk_UZSAKYMASid_UZSAKYMAS` (`fk_UZSAKYMASid_UZSAKYMAS`),
  KEY `israso` (`fk_RESTORANASid_RESTORANAS`),
  KEY `apmoka` (`fk_STALIUKASid_STALIUKAS`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1534 ;

--
-- Sukurta duomenų kopija lentelei `saskaita`
--

INSERT INTO `saskaita` (`data`, `numeris`, `bendra_suma`, `apmoketa`, `id_SASKAITA`, `fk_STALIUKASid_STALIUKAS`, `fk_UZSAKYMASid_UZSAKYMAS`, `fk_RESTORANASid_RESTORANAS`) VALUES
('2018-03-19', 398890, 204.72, 1, 535, 76, 2, 52),
('2018-08-29', 437190, 588.27, 1, 536, 77, 3, 56),
('2018-06-15', 374906, 292.22, 1, 537, 57, 4, 20),
('2018-03-05', 59339, 255.99, 1, 538, 21, 5, 33),
('2018-06-14', 148019, 147.66, 0, 539, 3, 6, 76),
('2018-03-15', 440977, 573.68, 0, 540, 84, 7, 29),
('2018-12-21', 114120, 434.41, 0, 541, 4, 8, 15),
('2018-10-25', 228319, 21.42, 0, 542, 10, 9, 39),
('2019-02-11', 287625, 97.81, 0, 543, 15, 10, 52),
('2018-07-05', 219657, 398.45, 0, 544, 68, 11, 17),
('2018-04-18', 318250, 101.56, 1, 545, 91, 12, 17),
('2018-08-05', 35770, 385.18, 1, 546, 84, 13, 18),
('2018-10-24', 66596, 445.07, 1, 547, 9, 14, 34),
('2018-11-20', 51430, 473.41, 1, 548, 88, 15, 100),
('2019-01-08', 347259, 591.2, 1, 549, 51, 16, 12),
('2018-08-28', 421229, 231.06, 0, 550, 75, 17, 79),
('2018-05-13', 16175, 65.36, 1, 551, 8, 18, 40),
('2018-05-02', 253537, 229.44, 0, 552, 8, 19, 42),
('2018-09-06', 332361, 46.86, 0, 553, 67, 20, 75),
('2018-07-19', 165153, 164.89, 0, 554, 15, 21, 93),
('2018-04-03', 430617, 228.6, 1, 555, 26, 22, 91),
('2018-10-25', 60623, 152.15, 1, 556, 28, 23, 69),
('2018-08-18', 138600, 125.89, 0, 557, 25, 24, 26),
('2018-09-11', 332363, 11.45, 1, 558, 10, 25, 96),
('2018-03-03', 385927, 490.75, 0, 559, 2, 26, 33),
('2018-08-21', 435123, 473.4, 1, 560, 15, 27, 83),
('2018-06-04', 261203, 41.03, 1, 561, 15, 28, 87),
('2018-10-07', 52397, 527.24, 0, 562, 95, 29, 91),
('2018-06-28', 114045, 257.14, 0, 563, 30, 30, 74),
('2018-12-07', 326887, 586.38, 0, 564, 86, 31, 67),
('2018-08-29', 234031, 546.91, 0, 565, 96, 32, 86),
('2019-02-24', 293075, 487.3, 0, 566, 9, 33, 100),
('2019-02-17', 311853, 338.21, 1, 567, 6, 34, 58),
('2018-07-25', 403874, 620.65, 0, 568, 69, 35, 28),
('2018-11-16', 182423, 456.46, 1, 569, 54, 36, 31),
('2019-01-21', 301862, 252.32, 0, 570, 76, 37, 40),
('2018-08-06', 285636, 272.41, 1, 571, 75, 38, 30),
('2018-04-28', 299030, 206.21, 0, 572, 27, 39, 7),
('2018-03-28', 420561, 117.24, 0, 573, 67, 40, 80),
('2018-10-09', 312757, 308.01, 0, 574, 75, 41, 71),
('2018-07-20', 266539, 182.11, 1, 575, 34, 42, 49),
('2018-05-13', 37437, 313.31, 0, 576, 54, 43, 54),
('2018-06-14', 119877, 206.94, 0, 577, 77, 44, 26),
('2018-04-29', 372901, 457.51, 0, 578, 54, 45, 58),
('2018-06-27', 240995, 61.9, 0, 579, 49, 46, 48),
('2018-03-04', 123008, 268.05, 0, 580, 31, 47, 25),
('2018-04-12', 284316, 528.69, 1, 581, 34, 48, 68),
('2018-12-12', 389496, 556.52, 0, 582, 51, 49, 27),
('2018-05-05', 43395, 334.97, 1, 583, 21, 50, 34),
('2019-01-05', 351969, 21.6, 0, 584, 37, 51, 68),
('2018-03-24', 187889, 554.23, 0, 585, 87, 52, 94),
('2019-02-17', 166100, 88.38, 0, 586, 40, 53, 92),
('2018-11-21', 182456, 421.86, 1, 587, 54, 54, 90),
('2018-11-02', 97072, 287.74, 0, 588, 91, 55, 24),
('2018-05-10', 411608, 297.23, 1, 589, 59, 56, 74),
('2018-09-15', 120521, 120.9, 1, 590, 48, 57, 57),
('2018-05-14', 59896, 450.95, 0, 591, 32, 58, 53),
('2018-05-25', 268469, 39.05, 1, 592, 3, 59, 2),
('2018-10-17', 299674, 122.08, 1, 593, 77, 60, 20),
('2018-04-21', 381967, 534.53, 0, 594, 25, 61, 29),
('2018-11-03', 166209, 38.46, 0, 595, 6, 62, 45),
('2018-10-06', 2226, 582.86, 0, 596, 45, 63, 3),
('2019-01-21', 69139, 341.47, 0, 597, 72, 64, 78),
('2018-05-31', 430108, 507.61, 1, 598, 67, 65, 43),
('2018-03-03', 380624, 616, 1, 599, 91, 66, 48),
('2018-03-20', 14612, 18.62, 1, 600, 93, 67, 58),
('2018-09-14', 321980, 263.95, 0, 601, 15, 68, 82),
('2018-09-03', 268597, 226.56, 1, 602, 8, 69, 92),
('2019-01-13', 90953, 78.53, 1, 603, 33, 70, 25),
('2019-01-22', 444764, 606.93, 0, 604, 32, 71, 57),
('2019-01-05', 399219, 239.82, 1, 605, 60, 72, 39),
('2018-05-29', 68615, 52.53, 0, 606, 99, 73, 3),
('2018-10-14', 233623, 554.63, 1, 607, 35, 74, 35),
('2018-03-25', 33585, 358.21, 0, 608, 8, 75, 70),
('2018-04-06', 27210, 539.66, 1, 609, 5, 76, 52),
('2018-07-11', 232195, 419.8, 0, 610, 58, 77, 73),
('2018-08-19', 62067, 472.76, 0, 611, 56, 78, 54),
('2018-04-06', 281832, 408.85, 1, 612, 71, 79, 86),
('2018-11-02', 171850, 230.94, 0, 613, 42, 80, 24),
('2018-03-21', 90482, 330.63, 1, 614, 70, 81, 55),
('2018-06-15', 228898, 361.13, 1, 615, 9, 82, 6),
('2018-03-23', 109651, 169.57, 1, 616, 74, 83, 65),
('2018-12-27', 293442, 107.91, 1, 617, 11, 84, 12),
('2018-03-04', 56146, 138.47, 0, 618, 100, 85, 69),
('2018-03-19', 418529, 77.6, 0, 619, 41, 86, 77),
('2018-12-25', 13464, 221.48, 0, 620, 90, 87, 35),
('2019-02-19', 118171, 78.69, 0, 621, 36, 88, 21),
('2018-06-15', 140743, 486.12, 1, 622, 84, 89, 23),
('2018-09-02', 1392, 196.41, 1, 623, 80, 90, 91),
('2018-07-23', 192430, 113, 0, 624, 6, 91, 49),
('2018-10-25', 232793, 136.74, 1, 625, 19, 92, 13),
('2018-06-05', 261857, 593.21, 0, 626, 77, 93, 58),
('2018-06-03', 447854, 38.23, 0, 627, 63, 94, 24),
('2019-01-17', 293756, 461.69, 1, 628, 39, 95, 63),
('2018-05-11', 192531, 406.48, 0, 629, 19, 96, 79),
('2018-08-16', 178172, 74.17, 1, 630, 26, 97, 90),
('2018-10-02', 334939, 478.12, 0, 631, 93, 98, 57),
('2018-11-29', 162471, 163.74, 1, 632, 51, 99, 84),
('2018-06-30', 114142, 29.36, 0, 633, 64, 100, 86),
('2018-12-21', 398274, 113.56, 0, 634, 72, 101, 2),
('2018-03-07', 176016, 231.48, 1, 635, 74, 102, 21),
('2018-05-26', 4188, 213.94, 0, 636, 6, 103, 100),
('2018-09-16', 381235, 61.8, 0, 637, 15, 104, 33),
('2018-04-04', 421516, 67.99, 1, 638, 12, 105, 82),
('2018-10-21', 119908, 29.93, 1, 639, 46, 106, 46),
('2018-03-29', 434858, 157.32, 0, 640, 77, 107, 56),
('2018-04-09', 437722, 54.11, 1, 641, 94, 108, 34),
('2018-05-07', 81114, 600.99, 1, 642, 75, 109, 21),
('2019-01-30', 210743, 521.37, 0, 643, 68, 110, 47),
('2019-01-16', 253557, 194.55, 1, 644, 69, 111, 63),
('2018-04-21', 162655, 210.04, 1, 645, 68, 112, 60),
('2018-03-04', 389064, 295.69, 1, 646, 5, 113, 56),
('2018-08-07', 351287, 144.84, 1, 647, 35, 114, 48),
('2018-09-08', 376182, 48.91, 0, 648, 25, 115, 76),
('2019-01-01', 260665, 3.11, 1, 649, 36, 116, 57),
('2019-01-10', 351141, 156.44, 0, 650, 7, 117, 93),
('2019-02-25', 133309, 610.58, 1, 651, 83, 118, 21),
('2018-05-12', 266288, 620.7, 1, 652, 77, 119, 28),
('2018-07-11', 270028, 572.29, 1, 653, 1, 120, 52),
('2018-07-11', 161507, 38.86, 1, 654, 32, 121, 80),
('2018-11-04', 159438, 297.31, 0, 655, 36, 122, 71),
('2018-11-17', 248442, 183.4, 1, 656, 17, 123, 1),
('2018-09-24', 112500, 490.49, 1, 657, 28, 124, 56),
('2018-12-23', 278403, 20.16, 0, 658, 42, 125, 99),
('2018-08-02', 169555, 266.07, 0, 659, 67, 126, 9),
('2018-12-16', 260501, 607.36, 0, 660, 75, 127, 61),
('2018-12-30', 401756, 376.3, 0, 661, 6, 128, 28),
('2018-10-24', 251009, 589.91, 0, 662, 97, 129, 74),
('2018-04-19', 441167, 268.57, 0, 663, 72, 130, 100),
('2018-08-10', 371082, 172.67, 0, 664, 81, 131, 100),
('2018-04-29', 301090, 600.1, 0, 665, 34, 132, 99);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `staliukas`
--

CREATE TABLE IF NOT EXISTS `staliukas` (
  `numeris` int(11) DEFAULT NULL,
  `vietu_skaicius` int(11) DEFAULT NULL,
  `id_STALIUKAS` int(11) NOT NULL AUTO_INCREMENT,
  `fk_PADAVEJASid_PADAVEJAS` int(11) NOT NULL,
  PRIMARY KEY (`id_STALIUKAS`),
  KEY `aptarnauja` (`fk_PADAVEJASid_PADAVEJAS`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=145 ;

--
-- Sukurta duomenų kopija lentelei `staliukas`
--

INSERT INTO `staliukas` (`numeris`, `vietu_skaicius`, `id_STALIUKAS`, `fk_PADAVEJASid_PADAVEJAS`) VALUES
(2, 3, 1, 3),
(2, 1, 2, 14),
(3, 14, 3, 8),
(4, 11, 4, 15),
(5, 13, 5, 10),
(6, 5, 6, 8),
(7, 12, 7, 2),
(8, 15, 8, 20),
(9, 1, 9, 50),
(10, 1, 10, 17),
(11, 14, 11, 25),
(12, 19, 12, 31),
(13, 9, 13, 34),
(14, 8, 14, 15),
(15, 20, 15, 6),
(16, 9, 16, 48),
(17, 1, 17, 30),
(18, 15, 18, 18),
(19, 13, 19, 8),
(20, 7, 20, 42),
(21, 7, 21, 17),
(22, 16, 22, 39),
(23, 19, 23, 38),
(24, 10, 24, 34),
(25, 9, 25, 15),
(26, 7, 26, 39),
(27, 5, 27, 17),
(28, 10, 28, 14),
(29, 18, 29, 28),
(30, 3, 30, 18),
(31, 7, 31, 44),
(32, 3, 32, 32),
(33, 9, 33, 31),
(34, 6, 34, 42),
(35, 13, 35, 14),
(36, 19, 36, 25),
(37, 12, 37, 14),
(38, 4, 38, 42),
(39, 6, 39, 27),
(40, 17, 40, 39),
(41, 6, 41, 40),
(42, 5, 42, 42),
(43, 2, 43, 45),
(44, 15, 44, 25),
(45, 12, 45, 49),
(46, 8, 46, 2),
(47, 13, 47, 46),
(48, 18, 48, 30),
(49, 16, 49, 8),
(50, 13, 50, 24),
(51, 14, 51, 43),
(52, 14, 52, 48),
(53, 5, 53, 8),
(54, 5, 54, 49),
(55, 10, 55, 29),
(56, 1, 56, 6),
(57, 15, 57, 30),
(58, 5, 58, 7),
(59, 19, 59, 40),
(60, 19, 60, 17),
(61, 19, 61, 13),
(62, 4, 62, 25),
(63, 11, 63, 34),
(64, 15, 64, 17),
(65, 11, 65, 2),
(66, 3, 66, 4),
(67, 12, 67, 23),
(68, 14, 68, 48),
(69, 9, 69, 40),
(70, 5, 70, 11),
(71, 3, 71, 6),
(72, 4, 72, 9),
(73, 8, 73, 44),
(74, 20, 74, 47),
(75, 13, 75, 43),
(76, 4, 76, 41),
(77, 15, 77, 47),
(78, 15, 78, 48),
(79, 4, 79, 42),
(80, 2, 80, 44),
(81, 16, 81, 9),
(82, 19, 82, 45),
(83, 3, 83, 3),
(84, 11, 84, 29),
(85, 8, 85, 10),
(86, 8, 86, 8),
(87, 7, 87, 22),
(88, 7, 88, 7),
(89, 12, 89, 47),
(90, 3, 90, 33),
(91, 3, 91, 23),
(92, 11, 92, 32),
(93, 15, 93, 26),
(94, 10, 94, 36),
(95, 1, 95, 47),
(96, 17, 96, 15),
(97, 15, 97, 34),
(98, 10, 98, 49),
(99, 2, 99, 33),
(100, 18, 100, 21),
(14, 15, 101, 2),
(14, 15, 102, 2),
(14, 15, 103, 2),
(14, 15, 104, 2),
(14, 15, 105, 2),
(14, 15, 106, 2),
(14, 15, 107, 2),
(14, 15, 108, 2),
(14, 15, 109, 2),
(14, 15, 110, 2),
(12315, 534, 111, 4),
(12315, 534, 112, 4),
(12315, 534, 113, 4),
(12315, 534, 114, 4),
(12315, 534, 115, 4),
(12315, 534, 116, 4),
(12315, 534, 117, 4),
(12315, 534, 118, 4),
(12315, 534, 119, 4),
(12315, 534, 120, 4),
(12315, 534, 121, 4),
(88868, 86, 122, 14),
(888, 12, 123, 31),
(1, 1, 124, 1),
(1, 1, 125, 1),
(1, 1, 126, 1),
(1, 1, 127, 1),
(1, 1, 128, 1),
(1, 1, 129, 1),
(1, 1, 130, 1),
(1, 1, 131, 1),
(1, 1, 132, 1),
(1, 2, 133, 2),
(12, 123, 134, 1),
(99, 99, 135, 3),
(12, 23, 136, 10),
(1, 2, 137, 2),
(888888, 1201, 138, 45),
(888888, 1201, 139, 45),
(888888, 1201, 140, 45),
(888888, 1201, 141, 45),
(888888, 1201, 142, 45),
(888888, 1201, 143, 45),
(888888, 1201, 144, 45);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `uzsakomi_patiekalai`
--

CREATE TABLE IF NOT EXISTS `uzsakomi_patiekalai` (
  `fk_GAMINYSid_GAMINYS` int(11) NOT NULL DEFAULT '0',
  `fk_UZSAKYMASid_UZSAKYMAS` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fk_GAMINYSid_GAMINYS`,`fk_UZSAKYMASid_UZSAKYMAS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `uzsakomi_patiekalai`
--

INSERT INTO `uzsakomi_patiekalai` (`fk_GAMINYSid_GAMINYS`, `fk_UZSAKYMASid_UZSAKYMAS`) VALUES
(1, 1),
(1, 4219),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(10, 4219),
(11, 11),
(11, 4219),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(17, 4219),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31),
(32, 32),
(33, 33),
(34, 34),
(35, 35),
(36, 36),
(37, 37),
(38, 38),
(39, 39),
(40, 40),
(41, 41),
(42, 42),
(43, 43),
(44, 44),
(45, 45),
(46, 46),
(47, 47),
(48, 48),
(49, 49),
(50, 50),
(51, 51),
(52, 52),
(53, 53),
(54, 54),
(55, 55),
(56, 56),
(57, 57),
(58, 58),
(59, 59),
(60, 60),
(61, 61),
(62, 62),
(63, 63),
(64, 64),
(65, 65),
(66, 66),
(67, 67),
(68, 68),
(69, 69),
(70, 70),
(71, 71),
(72, 72),
(73, 73),
(74, 74),
(75, 75),
(76, 76),
(77, 77),
(78, 78),
(79, 79),
(80, 80),
(81, 81),
(82, 82),
(83, 83),
(84, 84),
(85, 85),
(86, 86),
(87, 87),
(88, 88),
(89, 89),
(90, 90),
(90, 4219),
(91, 91),
(92, 92),
(93, 93),
(94, 94),
(95, 95),
(96, 96),
(97, 97),
(98, 98),
(99, 99),
(100, 100);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `uzsakymas`
--

CREATE TABLE IF NOT EXISTS `uzsakymas` (
  `uzsakymo_numeris` int(11) DEFAULT NULL,
  `suma` double DEFAULT NULL,
  `data` date DEFAULT NULL,
  `busena` int(11) DEFAULT NULL,
  `id_UZSAKYMAS` int(11) NOT NULL AUTO_INCREMENT,
  `fk_PADAVEJASid_PADAVEJAS` int(11) NOT NULL,
  `fk_RESTORANASid_RESTORANAS` int(11) NOT NULL,
  `fk_STALIUKASid_STALIUKAS` int(11) NOT NULL,
  PRIMARY KEY (`id_UZSAKYMAS`),
  KEY `busena` (`busena`),
  KEY `uzpildo` (`fk_PADAVEJASid_PADAVEJAS`),
  KEY `pateikiamas` (`fk_RESTORANASid_RESTORANAS`),
  KEY `pateikia` (`fk_STALIUKASid_STALIUKAS`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4230 ;

--
-- Sukurta duomenų kopija lentelei `uzsakymas`
--

INSERT INTO `uzsakymas` (`uzsakymo_numeris`, `suma`, `data`, `busena`, `id_UZSAKYMAS`, `fk_PADAVEJASid_PADAVEJAS`, `fk_RESTORANASid_RESTORANAS`, `fk_STALIUKASid_STALIUKAS`) VALUES
(6152, 122.87, '2019-05-05', 5, 2, 39, 91, 67),
(9917, 29.98, '2020-03-19', 2, 3, 25, 36, 86),
(9342, 151.56, '2019-10-16', 3, 4, 10, 12, 19),
(7748, 399.96, '2019-03-03', 5, 5, 34, 63, 2),
(7312, 389.61, '2019-02-26', 3, 6, 4, 36, 6),
(8108, 328.82, '2019-04-17', 3, 7, 41, 43, 96),
(6869, 386.92, '2019-11-19', 4, 8, 23, 16, 13),
(9490, 394.43, '2019-02-16', 1, 9, 9, 46, 37),
(5799, 416.33, '2019-02-24', 1, 10, 21, 66, 52),
(8170, 311.92, '2019-12-25', 4, 11, 19, 24, 70),
(6944, 39.47, '2019-08-01', 2, 12, 49, 50, 73),
(7199, 279.97, '2020-03-18', 5, 13, 16, 88, 56),
(7316, 441.43, '2019-06-14', 4, 14, 39, 4, 11),
(9383, 345.54, '2019-10-19', 4, 15, 44, 19, 41),
(7807, 395.3, '2019-04-08', 4, 16, 24, 77, 25),
(7201, 174.54, '2019-07-16', 1, 17, 46, 45, 95),
(6856, 428.05, '2020-02-17', 2, 18, 32, 27, 72),
(6459, 78.18, '2019-03-06', 1, 19, 42, 57, 66),
(8282, 303.15, '2019-12-29', 1, 20, 17, 65, 98),
(9640, 353.26, '2019-02-01', 5, 21, 7, 80, 75),
(7557, 373.89, '2019-06-09', 2, 22, 47, 59, 73),
(9113, 6.21, '2019-10-24', 4, 23, 33, 59, 50),
(8071, 264.08, '2020-03-31', 3, 24, 18, 29, 72),
(7573, 337.53, '2019-03-01', 3, 25, 13, 29, 58),
(8645, 300.75, '2019-07-01', 3, 26, 2, 56, 67),
(7408, 305.26, '2019-03-26', 4, 27, 32, 2, 87),
(9422, 200.97, '2019-03-12', 3, 28, 35, 27, 17),
(8567, 324.83, '2019-08-15', 5, 29, 33, 37, 76),
(8307, 139.97, '2020-03-01', 4, 30, 10, 26, 82),
(7236, 408.98, '2019-06-02', 2, 31, 18, 36, 54),
(9979, 274.63, '2019-03-17', 4, 32, 48, 58, 88),
(7615, 328.54, '2019-08-03', 5, 33, 50, 96, 78),
(8290, 135.5, '2019-12-02', 2, 34, 36, 43, 73),
(7285, 349.89, '2020-02-18', 2, 35, 6, 67, 24),
(9140, 149.83, '2020-01-01', 1, 36, 29, 92, 4),
(8246, 385.94, '2020-02-04', 5, 37, 7, 71, 74),
(6241, 132.54, '2019-06-10', 2, 38, 29, 44, 61),
(8159, 194.3, '2020-04-13', 3, 39, 35, 42, 17),
(7525, 288.18, '2019-08-22', 1, 40, 21, 28, 25),
(8566, 443.44, '2019-03-02', 3, 41, 18, 8, 24),
(9152, 392.59, '2019-08-29', 1, 42, 37, 83, 39),
(6248, 21.09, '2020-02-14', 4, 43, 29, 15, 63),
(8200, 328.48, '2019-08-13', 3, 44, 14, 62, 91),
(8061, 90.71, '2019-11-18', 4, 45, 22, 1, 38),
(5850, 176.89, '2019-11-05', 3, 46, 31, 85, 22),
(9134, 448.91, '2019-12-20', 3, 47, 48, 88, 45),
(6079, 374, '2019-09-13', 2, 48, 47, 58, 31),
(7612, 207.08, '2020-03-03', 5, 49, 19, 21, 62),
(9793, 119.66, '2019-08-23', 2, 50, 6, 94, 63),
(9482, 117.58, '2020-02-29', 1, 51, 21, 41, 4),
(6540, 224.59, '2019-09-20', 4, 52, 13, 76, 69),
(6175, 238.58, '2019-04-15', 2, 53, 5, 93, 18),
(5938, 440.34, '2019-02-01', 3, 54, 22, 78, 20),
(9406, 282.17, '2019-07-09', 3, 55, 34, 47, 52),
(9471, 2.65, '2020-02-29', 2, 56, 11, 78, 55),
(6345, 366.5, '2019-04-08', 2, 57, 18, 67, 84),
(9105, 266.82, '2019-08-08', 2, 58, 16, 28, 45),
(9668, 54.51, '2019-12-22', 2, 59, 25, 6, 25),
(9321, 211.02, '2019-11-07', 4, 60, 49, 32, 38),
(7845, 86.29, '2019-02-14', 5, 61, 5, 22, 24),
(5843, 248.72, '2019-11-07', 4, 62, 39, 16, 26),
(9685, 19.26, '2019-08-17', 1, 63, 36, 47, 4),
(5694, 242.58, '2019-08-05', 5, 64, 47, 81, 30),
(7718, 47.88, '2019-05-08', 1, 65, 45, 44, 21),
(6946, 220.19, '2019-05-29', 2, 66, 37, 64, 96),
(6629, 69.78, '2019-08-21', 2, 67, 31, 98, 23),
(8516, 209.34, '2020-03-30', 5, 68, 25, 80, 11),
(7584, 290.91, '2019-06-19', 4, 69, 48, 94, 96),
(7252, 98.65, '2019-12-12', 4, 70, 14, 26, 47),
(9690, 106, '2020-02-20', 4, 71, 28, 12, 78),
(7607, 227.84, '2019-09-29', 3, 72, 16, 45, 72),
(9029, 217.52, '2019-11-27', 2, 73, 11, 57, 61),
(8294, 351.15, '2020-03-24', 4, 74, 29, 46, 92),
(7162, 408.41, '2019-04-01', 2, 75, 24, 37, 11),
(6210, 185.1, '2019-08-27', 1, 76, 12, 26, 60),
(8419, 68.29, '2019-06-17', 1, 77, 4, 28, 39),
(6818, 204.88, '2020-01-09', 1, 78, 15, 79, 14),
(9085, 419.67, '2020-02-18', 5, 79, 20, 1, 89),
(9454, 439.9, '2019-12-06', 1, 80, 40, 33, 17),
(7765, 331.86, '2019-10-14', 5, 81, 30, 69, 11),
(9870, 92.14, '2020-01-04', 3, 82, 15, 34, 60),
(6392, 146.15, '2019-06-09', 3, 83, 2, 67, 12),
(8909, 119.58, '2019-06-09', 3, 84, 15, 78, 50),
(6824, 30.42, '2019-04-24', 5, 85, 40, 41, 78),
(6589, 128.34, '2019-11-26', 4, 86, 30, 30, 35),
(8226, 390.97, '2019-05-14', 1, 87, 11, 39, 96),
(7939, 430.26, '2019-04-24', 5, 88, 3, 73, 55),
(9053, 352.65, '2019-03-26', 5, 89, 9, 54, 31),
(9270, 33.23, '2020-01-18', 5, 90, 50, 40, 28),
(8642, 372.95, '2019-07-02', 4, 91, 13, 83, 85),
(9157, 313.66, '2019-04-30', 3, 92, 2, 2, 71),
(9385, 158.85, '2020-03-25', 3, 93, 6, 100, 28),
(8409, 217.21, '2019-11-22', 1, 94, 26, 80, 88),
(9181, 65.96, '2020-02-04', 2, 95, 6, 78, 53),
(6195, 2.59, '2019-04-29', 4, 96, 2, 2, 48),
(9461, 192.93, '2020-03-01', 2, 97, 47, 15, 58),
(8483, 333.4, '2019-03-31', 3, 98, 45, 43, 57),
(8471, 141.84, '2019-11-06', 2, 99, 16, 53, 68),
(8194, 252.23, '2020-01-28', 1, 100, 36, 97, 16),
(6123, 195.78, '2019-07-22', 5, 101, 38, 57, 2),
(7645, 227.36, '2020-03-19', 2, 102, 19, 59, 81),
(7456, 37.2, '2019-12-14', 3, 103, 26, 3, 68),
(6991, 223.46, '2019-07-06', 1, 104, 42, 77, 52),
(7513, 229.95, '2019-12-28', 2, 105, 48, 61, 71),
(6742, 233.94, '2019-08-11', 1, 106, 6, 53, 44),
(8329, 158.47, '2019-02-27', 5, 107, 42, 64, 91),
(6887, 102.31, '2019-05-05', 2, 108, 5, 64, 42),
(6156, 83.67, '2019-12-17', 1, 109, 40, 72, 14),
(8604, 37.04, '2019-09-24', 4, 110, 24, 67, 36),
(8223, 393.03, '2019-07-12', 2, 111, 24, 65, 43),
(6190, 175.91, '2019-12-16', 4, 112, 21, 25, 86),
(6691, 385.87, '2019-07-05', 4, 113, 46, 73, 73),
(8123, 296.28, '2019-10-19', 4, 114, 12, 71, 42),
(5941, 6.36, '2019-02-07', 3, 115, 40, 58, 36),
(8583, 251.61, '2019-11-13', 3, 116, 27, 5, 56),
(8297, 403.26, '2019-05-18', 2, 117, 23, 87, 69),
(8491, 153.54, '2020-01-08', 4, 118, 17, 8, 76),
(7681, 3.29, '2019-05-16', 1, 119, 39, 80, 86),
(9933, 58.18, '2020-02-02', 3, 120, 16, 60, 87),
(8041, 437.67, '2019-04-03', 3, 121, 3, 49, 15),
(5869, 180.28, '2019-12-26', 2, 122, 42, 14, 41),
(6418, 73.81, '2019-02-05', 2, 123, 43, 32, 18),
(6719, 159.47, '2019-10-09', 3, 124, 28, 13, 71),
(5959, 154.98, '2019-09-18', 3, 125, 4, 44, 80),
(9171, 434.53, '2019-04-09', 1, 126, 5, 88, 39),
(6958, 157.9, '2019-03-14', 5, 127, 40, 10, 38),
(6679, 383.21, '2020-02-21', 1, 128, 44, 75, 59),
(7166, 172.93, '2019-06-06', 2, 129, 16, 14, 14),
(8791, 210.08, '2019-10-21', 1, 130, 40, 85, 58),
(9839, 304.82, '2019-09-12', 5, 131, 2, 70, 58),
(6344, 226.66, '2020-04-03', 5, 132, 49, 46, 82),
(7232, 109.6, '2019-12-22', 3, 133, 19, 37, 2),
(9221, 119.43, '2020-02-11', 5, 134, 50, 28, 45),
(9465, 348.34, '2019-12-03', 1, 135, 23, 1, 33),
(7100, 408.48, '2019-11-22', 5, 136, 38, 60, 64),
(6847, 331.72, '2019-04-05', 3, 137, 6, 58, 65),
(9459, 401.4, '2019-07-15', 5, 138, 29, 1, 25),
(9184, 393.42, '2020-02-06', 1, 139, 14, 93, 17),
(8445, 399.69, '2020-04-12', 5, 140, 42, 83, 4);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `uzsakymo_busenos`
--

CREATE TABLE IF NOT EXISTS `uzsakymo_busenos` (
  `id_uzsakymo_busenos` int(11) NOT NULL DEFAULT '0',
  `name` char(11) NOT NULL,
  PRIMARY KEY (`id_uzsakymo_busenos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `uzsakymo_busenos`
--

INSERT INTO `uzsakymo_busenos` (`id_uzsakymo_busenos`, `name`) VALUES
(1, 'vykdomas'),
(2, 'ivykdytas'),
(3, 'atsauktas'),
(4, 'sustabdytas'),
(5, 'pateiktas');

--
-- Apribojimai eksportuotom lentelėm
--

--
-- Apribojimai lentelei `asmuo`
--
ALTER TABLE `asmuo`
  ADD CONSTRAINT `pasodinamas` FOREIGN KEY (`fk_STALIUKASid_STALIUKAS`) REFERENCES `staliukas` (`id_STALIUKAS`);

--
-- Apribojimai lentelei `gaminys`
--
ALTER TABLE `gaminys`
  ADD CONSTRAINT `GAMINYS_ibfk_1` FOREIGN KEY (`tipas`) REFERENCES `gaminiu_tipai` (`id_gaminiu_tipai`),
  ADD CONSTRAINT `ruosia` FOREIGN KEY (`fk_RESTORANASid_RESTORANAS`) REFERENCES `restoranas` (`id_RESTORANAS`);

--
-- Apribojimai lentelei `ivertinimas`
--
ALTER TABLE `ivertinimas`
  ADD CONSTRAINT `IVERTINIMAS_ibfk_1` FOREIGN KEY (`ivertinimas`) REFERENCES `ivertinimu_tipai` (`id_ivertinimu_tipai`),
  ADD CONSTRAINT `palieka` FOREIGN KEY (`fk_ASMUOid_ASMUO`) REFERENCES `asmuo` (`id_ASMUO`),
  ADD CONSTRAINT `turi` FOREIGN KEY (`fk_GAMINYSid_GAMINYS`) REFERENCES `gaminys` (`id_GAMINYS`);

--
-- Apribojimai lentelei `produktas`
--
ALTER TABLE `produktas`
  ADD CONSTRAINT `PRODUKTAS_ibfk_1` FOREIGN KEY (`alergenas`) REFERENCES `alergenai` (`id_alergenai`),
  ADD CONSTRAINT `PRODUKTAS_ibfk_2` FOREIGN KEY (`matavimo_vienetas`) REFERENCES `matavimo_vienetai` (`id_matavimo_vienetai`),
  ADD CONSTRAINT `laikomas` FOREIGN KEY (`fk_SANDELYSid_SANDELYS`) REFERENCES `sandelys` (`id_SANDELYS`);

--
-- Apribojimai lentelei `ruosiamas_produktu`
--
ALTER TABLE `ruosiamas_produktu`
  ADD CONSTRAINT `ruosiamas_produktu` FOREIGN KEY (`fk_PRODUKTASid_PRODUKTAS`) REFERENCES `produktas` (`id_PRODUKTAS`);

--
-- Apribojimai lentelei `sandelys`
--
ALTER TABLE `sandelys`
  ADD CONSTRAINT `priziuri` FOREIGN KEY (`fk_RESTORANASid_RESTORANAS`) REFERENCES `restoranas` (`id_RESTORANAS`);

--
-- Apribojimai lentelei `saskaita`
--
ALTER TABLE `saskaita`
  ADD CONSTRAINT `apmoka` FOREIGN KEY (`fk_STALIUKASid_STALIUKAS`) REFERENCES `staliukas` (`id_STALIUKAS`),
  ADD CONSTRAINT `israso` FOREIGN KEY (`fk_RESTORANASid_RESTORANAS`) REFERENCES `restoranas` (`id_RESTORANAS`),
  ADD CONSTRAINT `paskaiciuojamas` FOREIGN KEY (`fk_UZSAKYMASid_UZSAKYMAS`) REFERENCES `uzsakymas` (`id_UZSAKYMAS`);

--
-- Apribojimai lentelei `staliukas`
--
ALTER TABLE `staliukas`
  ADD CONSTRAINT `aptarnauja` FOREIGN KEY (`fk_PADAVEJASid_PADAVEJAS`) REFERENCES `padavejas` (`id_PADAVEJAS`);

--
-- Apribojimai lentelei `uzsakomi_patiekalai`
--
ALTER TABLE `uzsakomi_patiekalai`
  ADD CONSTRAINT `uzsakomi_patiekalai` FOREIGN KEY (`fk_GAMINYSid_GAMINYS`) REFERENCES `gaminys` (`id_GAMINYS`);

--
-- Apribojimai lentelei `uzsakymas`
--
ALTER TABLE `uzsakymas`
  ADD CONSTRAINT `UZSAKYMAS_ibfk_1` FOREIGN KEY (`busena`) REFERENCES `uzsakymo_busenos` (`id_uzsakymo_busenos`),
  ADD CONSTRAINT `pateikia` FOREIGN KEY (`fk_STALIUKASid_STALIUKAS`) REFERENCES `staliukas` (`id_STALIUKAS`),
  ADD CONSTRAINT `pateikiamas` FOREIGN KEY (`fk_RESTORANASid_RESTORANAS`) REFERENCES `restoranas` (`id_RESTORANAS`),
  ADD CONSTRAINT `uzpildo` FOREIGN KEY (`fk_PADAVEJASid_PADAVEJAS`) REFERENCES `padavejas` (`id_PADAVEJAS`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
