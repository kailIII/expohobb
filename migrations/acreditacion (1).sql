CREATE TABLE IF NOT EXISTS `acreditacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `codigo` varchar(250) NOT NULL,
  `codigoC` varchar(250) NOT NULL,
  `nomExp` varchar(250) NOT NULL,
  `fechaExp` varchar(50) NOT NULL,
  `idExp` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2;
--

