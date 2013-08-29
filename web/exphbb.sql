-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-08-2013 a las 23:53:29
-- Versión del servidor: 5.1.53
-- Versión de PHP: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `exphbb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expo`
--

CREATE TABLE IF NOT EXISTS `expo` (
  `id` smallint(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `body` mediumtext,
  `fecha_inicio` date DEFAULT NULL,
  `dias_vigente` varchar(150) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `empresas` (
  `id` smallint(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `description` mediumtext,
  `image`  varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `expositores` (
  `id` smallint(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `description` mediumtext,
  `image`  varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Volcar la base de datos para la tabla `expo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marquee`
--

CREATE TABLE IF NOT EXISTS `marquee` (
  `id` smallint(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL,
  `small_image` varchar(150) DEFAULT NULL,
  `big_image` varchar(150) DEFAULT NULL,
  `queue` smallint(3) unsigned zerofill DEFAULT NULL,
  `description` mediumtext,
  `status` varchar(15) DEFAULT NULL,
  `type_marquee` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcar la base de datos para la tabla `marquee`
--

INSERT INTO `marquee` (`id`, `title`, `small_image`, `big_image`, `queue`, `description`, `status`, `type_marquee`) VALUES
(011, 'EXPO SEPTIEMBRE 2013 ', 'upload_images/770afb596ab659fcf27bf5ca22251d0d.jpg', 'upload_images/e682d7cff7a2fc89e160712c53c2dd73.jpg', 002, '', 'Publicado', 'imagen'),
(012, 'REVISTA 01 / FOTO 01', 'upload_images/ae37a89d88ccb08ddea331f093410566.jpg', 'upload_images/c245c80d55ad771067d8519d8c967fbe.jpg', 003, '<h2 style="font-style:italic"><em><strong>Ya lleg&oacute;...</strong></em></h2>\r\n\r\n<ul>\r\n	<li>&quot;EXPOHOBBY DECO DIGITAL&quot; la primer revista digital gratuita de la web...&nbsp;</li>\r\n	<li>Los m&aacute;s destacados profesores del Arte y la Decoraci&oacute;n reunidos para compartir todo su talento&nbsp;y originalidad.</li>\r\n</ul>\r\n\r\n<p style="margin-left:40px"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &iexcl;&iexcl;&iexcl;&nbsp;No te la pierdas !!!!&nbsp;</strong></p>\r\n\r\n<p><a href="http://www.expohobby.net/prueba/revistas.php">(Clik aqu&iacute; para ira a la revista)</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Publicado', 'imagen'),
(016, 'REVISTA 01 / FOTO 02', 'upload_images/1955651e8529365560f45da99124d651.jpg', 'upload_images/9b22192e03ceaab30657748126c60fb4.jpg', 005, '', 'Publicado', 'imagen'),
(017, 'REVISTA 01 / FOTO 03', 'upload_images/d196e949d4518c842bddb4f7f5631532.jpg', 'upload_images/2348d4c0ffc112ed987d7541bd37293e.jpg', 004, '', 'Publicado', 'imagen'),
(019, 'REVISTA 01 / FOTO 05', 'upload_images/475b21dc4541b0ee532ebe42c9d8fe6b.jpg', 'upload_images/a77f336b26e351664950f348fdb92c20.jpg', 006, '', 'Publicado', 'imagen'),
(022, 'REVISTA 01 / FOTO 04', 'upload_images/1aa37139c4d47d6833807e6213e98162.jpg', 'upload_images/c942513b00d1eda54043d83bc012938b.jpg', 005, '<h2 style="font-style:italic"><em><strong>Ya lleg&oacute;...</strong></em></h2>\r\n\r\n<ul>\r\n	<li>&quot;EXPOHOBBY DECO DIGITAL&quot; la primer revista digital gratuita de la web...&nbsp;</li>\r\n	<li>Los m&aacute;s destacados profesores del Arte y la Decoraci&oacute;n reunidos para compartir todo su talento&nbsp;y originalidad.</li>\r\n</ul>\r\n\r\n<p style="margin-left:40px"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &iexcl;&iexcl;&iexcl;&nbsp;No te la pierdas !!!!&nbsp;</strong></p>\r\n\r\n<p><a href="http://www.expohobby.net/prueba/revistas.php">(Clik aqu&iacute; para ira a la revista)</a></p>\r\n', 'Publicado', 'imagen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicidad`
--

CREATE TABLE IF NOT EXISTS `publicidad` (
  `id` smallint(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `url` varchar(250) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `position` smallint(3) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `tipo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `publicidad`
--

INSERT INTO `publicidad` (`id`, `url`, `image`, `position`, `status`, `tipo`) VALUES
(002, 'http://www.alejandragutierrez.com.ar', 'upload_images/68a002de319d136f9635cea4f5043447.jpg', 2, 'Publicado', 'chica'),
(003, 'http://www.artisticaartcraft.com.ar', 'upload_images/55eadfd958b258b7fe85166994ccd4b5.jpg', 1, 'Publicado', 'chica'),
(004, 'http://www.elnuevoemporio.com.ar/', 'upload_images/30d4e65c383d4e697fb79ec749913e81.jpg', 3, 'Publicado', 'chica'),
(005, 'http://www.eviaediciones.com/', 'upload_images/eea4e4502cbd23b40f843ec7fd9fd843.jpg', 4, 'Publicado', 'chica'),
(006, 'https://www.facebook.com/pages/El-Taller-de-Mariela-L%C3%B6pez/112183968810240', 'upload_images/6679ef590a7f9734db982efd8dafaa9f.jpg', 5, 'Publicado', 'chica'),
(007, 'http://www.parpen.com.ar', 'upload_images/d48eb868c00b51c41e2ecb4b8ae66bee.jpg', 6, 'Publicado', 'chica'),
(008, 'http://www.expohobby.net/expoleticia/', 'upload_images/61572d7d087227bfd5d08d95b573b51c.jpg', 1, 'Publicado', 'grande');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `id` smallint(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `mail` varchar(60) DEFAULT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(15) NOT NULL,
  `codigo` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15562 ;

--
-- Volcar la base de datos para la tabla `registro`
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revistas`
--

CREATE TABLE IF NOT EXISTS `revistas` (
  `id` smallint(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `description` mediumtext,
  `edition` date DEFAULT NULL,
  `pdf` varchar(150) DEFAULT NULL,
  `swf` varchar(250) DEFAULT NULL,
  `status` varchar(15) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcar la base de datos para la tabla `revistas`
--

INSERT INTO `revistas` (`id`, `title`, `image`, `description`, `edition`, `pdf`, `swf`, `status`) VALUES
(012, 'Estilo RomÃ¡ntica y Vintage', 'upload_images/f091be555466305da2282dc8feb05a0d.jpg', '<p>Compartamos todo el arte de la decoraci&oacute;n con estilo Romantico y Vintage, los&nbsp;mejores proyectos para regalar y regalarte.&nbsp;</p>\r\n', '2013-07-01', '', 'http://www.joomag.com/magazine/expohobby-test-1-1/0895520001375518971', 'Publicado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `mail` varchar(30) DEFAULT NULL,
  `pass` varchar(140) DEFAULT NULL,
  `token` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `mail`, `pass`, `token`) VALUES
(00003, 'admin@expohobby.net', 'd11671fce53ad678cc51d70f27983c99', 'bacca93b8f5323e00ac3800f6fd3e389');
