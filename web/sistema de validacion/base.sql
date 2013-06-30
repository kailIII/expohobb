-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-06-2013 a las 21:40:06
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `expo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioe`
--

CREATE TABLE IF NOT EXISTS `usuarioe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `info` tinyint(1) NOT NULL,
  `codigo` varchar(250) NOT NULL,
  `codigoC` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `usuarioe`
--

INSERT INTO `usuarioe` (`id`, `nombre`, `apellido`, `dni`, `email`, `info`, `codigo`, `codigoC`) VALUES
(1, 'emanuel', 'berotia', '31822783', 'sendfiel@hotmail.com', 1, '33a35e7b30c92b2412aa78cb2bcf545a', '14b261a466718a55c3a444443d34b01a');
