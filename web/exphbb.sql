-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-06-2013 a las 18:52:16
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
  `publish` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `marquee`
--

INSERT INTO `marquee` (`id`, `title`, `small_image`, `big_image`, `queue`, `description`, `status`, `type_marquee`) VALUES
(001, 'Test 2', 'upload_images/ddfd1bfecbe5a0ddb59480b68283d05e.jpg', 'http://www.youtube.com/embed/xjm80oTTfoA', 003, '<h2 style="font-style:italic">Titulo</h2>\r\n\r\n<p>bla bla bla</p>\r\n\r\n<ul>\r\n	<li>bulet</li>\r\n	<li>bulet</li>\r\n	<li>bulet</li>\r\n</ul>\r\n', 'Publicado', 'video'),
(006, 'Test', 'upload_images/4c29ebeac862b8fd4c3c7fd889270a1a.jpg', 'upload_images/57a41ae504af2029d667d1502489bfe6.jpg', 001, '<h1><strong>Test</strong></h1>\r\n\r\n<h3>esto es un test</h3>\r\n\r\n<ul>\r\n	<li>test 1</li>\r\n	<li>test 2</li>\r\n	<li>test 3</li>\r\n</ul>\r\n', 'Publicado', 'imagen'),
(007, 'Otro Test', 'upload_images/85815592615ffc3cb5f40ebbc4886781.jpg', 'upload_images/ccc3b7cc62f25b5ba47a491eacfa97ea.jpg', 004, '<h2 style="font-style:italic">Titulo</h2>\r\n\r\n<p>bla bla bla</p>\r\n\r\n<ul>\r\n	<li>bulet</li>\r\n	<li>bulet</li>\r\n	<li>bulet</li>\r\n</ul>\r\n', 'Publicado', 'imagen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `id` smallint(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `mail` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `registro`
--


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
  `swf` varchar(150) DEFAULT NULL,
  `status` varchar(15) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `revistas`
--

INSERT INTO `revistas` (`id`, `title`, `image`, `description`, `edition`, `pdf`, `swf`, `status`) VALUES
(007, 'Test 1', 'upload_images/0b01bbd4acb7e550cf8848fc070d4409.jpg', '<p>asdsad</p>\r\n', '2013-06-08', 'upload_revistas_pdf/a8732939cd62674b7c5f5a865c21123f.pdf', 'upload_revistas_swf/a8732939cd62674b7c5f5a865c21123f.swf', 'Publicado'),
(008, 'Test 2', 'upload_images/0b01bbd4acb7e550cf8848fc070d4409.jpg', '<p>asdsad 2</p>\r\n', '2013-05-08', 'upload_revistas_pdf/a8732939cd62674b7c5f5a865c21123f.pdf', 'upload_revistas_swf/a8732939cd62674b7c5f5a865c21123f.swf', 'Publicado');

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
(00003, 'admin@expohobby.com.ar', '704b037a97fa9b25522b7c014c300f8a', 'bacca93b8f5323e00ac3800f6fd3e389');
