CREATE DATABASE IF NOT EXISTS `esxstable`;

USE esxstable;

DROP TABLE IF EXISTS `panel_tickets`;

CREATE TABLE `panel_tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff` text NOT NULL,
  `usuario` text NOT NULL,
  `steamid` text NOT NULL,
  `licencia` text NOT NULL,
  `razon` longtext NOT NULL,
  `tiempo` text NOT NULL,
  `tipo` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

