-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-08-2013 a las 17:25:47
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
-- Estructura de tabla para la tabla `publicidad`
--

CREATE TABLE IF NOT EXISTS `publicidad` (
  `id` smallint(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `url` varchar(250) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `position` smallint(3) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `publicidad`
--

INSERT INTO `publicidad` (`id`, `url`, `image`, `position`, `status`) VALUES
(002, 'http://www.expohobby.net', 'upload_images/9a57c68652950c73cc27fccbaf33fb02.jpg', 2, 'Publicado'),
(003, 'http://www.expohobby.net', 'upload_images/6a94ac3aa157c2b1c4f3012367e8a057.jpg', 1, 'Publicado'),
(004, 'http://www.expohobby.net', 'upload_images/901f55d83d3e72e78a156f3b13d8d070.jpg', 3, 'Publicado'),
(005, 'http://www.google.com.ar', 'upload_images/532e4beb74202177f29fc8e6e928ecfd.jpg', 4, 'Publicado'),
(006, 'http://www.google.com.ar', 'upload_images/821a19188eb031a73303bf5c3d58c06f.jpg', 5, 'Publicado'),
(007, 'http://www.expohobby.net', 'upload_images/2bb775629cf567c6bb07d7167fb117e1.jpg', 6, 'Publicado');
