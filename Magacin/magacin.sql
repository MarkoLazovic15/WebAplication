create database skladiste character set utf8;
grant all on skladiste.* to root@localhost identified by '';
DROP TABLE IF EXISTS `Magacin`;
CREATE TABLE `Magacin`  (
  `magacin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `magacin_naziv` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `magacin_lokacija` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	PRIMARY KEY (`magacin_id`)
  )ENGINE=InnoDB;
	
  DROP TABLE IF EXISTS `Roba`;
  CREATE TABLE `Roba`  (
  `roba_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `roba_naziv` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `roba_kolicina` double(10, 2) UNSIGNED NOT NULL,
  `magacin_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`roba_id`),
  INDEX `fk_roba_magacin_id`(`magacin_id`),
  FOREIGN KEY (`magacin_id`) 
  REFERENCES `Magacin` (`magacin_id`) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE
)ENGINE=InnoDB;