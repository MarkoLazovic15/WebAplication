CREATE database organizacija CHARACTER SET utf8;
grant all on organizacija.* to root@localhost identified by '';
DROP TABLE IF EXISTS `Korisinik`;
CREATE TABLE `Korisinik`  (
  `korisnik_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `korisnik_ime` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `korisnik_prezime` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `korisnik_odeljenje` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	PRIMARY KEY (`korisnik_id`)
  )ENGINE=InnoDB;

 DROP TABLE IF EXISTS `Racunar`;
  CREATE TABLE `Racunar`  (
  `racunar_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `racunar_proizvodjac` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `racunar_model` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `korisnik_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`racunar_id`),
  INDEX `fk_Racunar_korisnik_id`(`korisnik_id`),
  FOREIGN KEY (`korisnik_id`) 
  REFERENCES `Korisinik` (`korisnik_id`) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE
)ENGINE=InnoDB;