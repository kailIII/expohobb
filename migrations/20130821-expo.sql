DROP TABLE IF EXISTS actividades_expositores;
DROP TABLE IF EXISTS fotos_expositores;
DROP TABLE IF EXISTS expo_empresa;
DROP TABLE IF EXISTS empresas;
DROP TABLE IF EXISTS expo;

CREATE TABLE IF NOT EXISTS `expo` (
  `id` smallint(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL,
  `maps` mediumtext,
  `image` varchar(150) DEFAULT NULL,
  `dias_horarios` varchar(150) DEFAULT NULL,
  `plano` varchar(150) DEFAULT NULL,
  `reglamento` mediumtext,
  `como_participar` mediumtext,
  `alojamiento` mediumtext,
  `prensa` mediumtext,
  `body` mediumtext,
  `teaser` mediumtext,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `empresas` (
  `id` smallint(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `email`  varchar(150) DEFAULT NULL,
  `description` mediumtext,
  `image`  varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE expo_empresa(
id INT NOT NULL AUTO_INCREMENT,
id_expo smallint(3) unsigned zerofill NOT NULL,
id_empresa smallint(3) unsigned zerofill NOT NULL,
es_expocitor varchar(2),
PRIMARY KEY (`id`),
FOREIGN KEY (id_expo) REFERENCES expo(id),
FOREIGN KEY (id_empresa) REFERENCES empresas(id)
) TYPE = INNODB;

CREATE TABLE fotos_expositores(
id INT NOT NULL AUTO_INCREMENT,
id_expo smallint(3) unsigned zerofill NOT NULL,
id_expositor smallint(3) unsigned zerofill NOT NULL,
foto varchar(150) DEFAULT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (id_expo) REFERENCES expo(id),
FOREIGN KEY (id_expositor) REFERENCES empresas(id)
) TYPE = INNODB;

CREATE TABLE actividades_expositores(
id INT NOT NULL AUTO_INCREMENT,
id_expo smallint(3) unsigned zerofill NOT NULL,
id_expositor smallint(3) unsigned zerofill NOT NULL,
actividad mediumtext,
PRIMARY KEY (`id`),
FOREIGN KEY (id_expo) REFERENCES expo(id),
FOREIGN KEY (id_expositor) REFERENCES empresas(id)
) TYPE = INNODB;