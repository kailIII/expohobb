-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-06-2013 a las 11:30:33
-- Versión del servidor: 5.5.31
-- Versión de PHP: 5.4.6-1ubuntu1.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `marquee`
--

INSERT INTO `marquee` (`id`, `title`, `small_image`, `big_image`, `queue`, `description`, `status`) VALUES
(001, 'Test 2', 'upload_images/afb5b84858004ebc39ff9c078c30f0a3.jpg', 'upload_images/5a3aff6a9dbccb6889a6ebea6f06ddd1.jpg', 003, '<h2 style="font-style:italic">Titulo</h2>\r\n\r\n<p>bla bla bla</p>\r\n\r\n<ul>\r\n	<li>bulet</li>\r\n	<li>bulet</li>\r\n	<li>bulet</li>\r\n</ul>\r\n', 'Publicado'),
(006, 'Test', 'upload_images/9a3ff23d40da8f68dd996625d2eb6d21.jpg', 'upload_images/d4d12022c1aa0411bc58420cad6468bb.jpg', 001, '<h1><strong>Test</strong></h1>\r\n\r\n<h3>esto es un test</h3>\r\n\r\n<ul>\r\n	<li>test 1</li>\r\n	<li>test 2</li>\r\n	<li>test 3</li>\r\n</ul>\r\n', 'Publicado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `id` smallint(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `mail` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `revistas`
--

INSERT INTO `revistas` (`id`, `title`, `image`, `description`, `edition`, `pdf`, `swf`) VALUES
(002, 'Test2', 'upload_images/c4f6017c39091ed6345d80c91d3a0dc7.jpg', '<h2 style="font-style:italic">Titulo</h2>\r\n\r\n<p>bla bla bla</p>\r\n\r\n<ul>\r\n	<li>bulet</li>\r\n	<li>bulet</li>\r\n	<li>bulet</li>\r\n</ul>\r\n', '2013-05-16', 'upload_revistas_pdf/d2130dc855eeb29f5fe302ed20c6fc49.pdf', 'qweqweqw'),
(003, 'Test Revista', 'upload_images/0d8000c52bb15cdd34c499f9117f83a5.jpg', '<p>asddsa</p>\r\n', '2013-05-15', 'upload_revistas_pdf/0d8000c52bb15cdd34c499f9117f83a5.pdf', 'asddsaasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` smallint(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `user` varchar(60) DEFAULT NULL,
  `pass` varchar(150) DEFAULT NULL,
  `mail` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
