-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-09-2017 a las 19:39:54
-- Versión del servidor: 5.6.13
-- Versión de PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tiendaonline`
--
CREATE DATABASE IF NOT EXISTS `tiendaonline` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tiendaonline`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `idcliente` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(25) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `telefono` int(8) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `pais` varchar(50) NOT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idcliente`, `nombre`, `apellidos`, `email`, `usuario`, `clave`, `telefono`, `direccion`, `pais`) VALUES
(4, 'mad', 'ruiz', 'sdasd@zcbznm', 'mad', 'mad', 1111111, 'sdfghnfdbsvacsxcvfbghjuyih', 'asdhsaj');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenesproducto`
--

CREATE TABLE IF NOT EXISTS `imagenesproducto` (
  `idimagen` int(10) NOT NULL AUTO_INCREMENT,
  `idproducto` int(10) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`idimagen`),
  KEY `idproducto` (`idproducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `imagenesproducto`
--

INSERT INTO `imagenesproducto` (`idimagen`, `idproducto`, `imagen`, `titulo`, `descripcion`) VALUES
(1, 1, 'paraguas.jpg', 'Paraguas', 'Paraguas amarillo'),
(2, 1, 'paraguas2.jpg', 'Paraguas en azul', 'es kúl (?)'),
(3, 1, 'paraguas3.jpg', 'Paraguas en multicolor', 'Enceguece'),
(6, 2, 'zapato1.jpg', 'Zapato kúl', 'vista lateral'),
(7, 3, 'reloj1.jpg', 'Reloj azul de pared', 'Vista frontal'),
(8, 4, 'balon1.jpg', 'Balón de vóley', 'dadfsf'),
(9, 4, 'balon2.jpg', 'Balón de vóley', 'sdfsdf'),
(10, 4, 'balon3.jpg', 'Balon', ' de voley?'),
(11, 5, 'lapicero1.jpg', 'lapicero', 'para escribir'),
(12, 5, 'lapicero2.jpg', 'lapicero', 'para escribir?'),
(13, 5, 'lapicero3.jpg', 'lapicero', 'para escribir?'),
(14, 5, 'lapicero4.jpg', 'lapicero', 'para escrbir?'),
(15, 5, 'lapicero5.jpg', 'lapicero', 'para escribir?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineaspedido`
--

CREATE TABLE IF NOT EXISTS `lineaspedido` (
  `idlineas` int(10) NOT NULL AUTO_INCREMENT,
  `idpedido` int(10) NOT NULL,
  `idproducto` int(10) NOT NULL,
  `unidades` int(10) NOT NULL,
  PRIMARY KEY (`idlineas`),
  UNIQUE KEY `idpedido` (`idpedido`),
  KEY `idproducto` (`idproducto`,`unidades`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `idpedido` int(10) NOT NULL AUTO_INCREMENT,
  `idcliente` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(100) NOT NULL,
  PRIMARY KEY (`idpedido`),
  KEY `idcliente` (`idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idpedido`, `idcliente`, `fecha`, `estado`) VALUES
(1, 4, '0000-00-00', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `idproducto` int(10) NOT NULL AUTO_INCREMENT,
  `nombreproducto` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `peso` double NOT NULL,
  `existencias` int(10) NOT NULL,
  PRIMARY KEY (`idproducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `nombreproducto`, `descripcion`, `precio`, `peso`, `existencias`) VALUES
(1, 'Paraguas', 'Paraguas amarillo', '11', 2.13, 45),
(2, 'Zapatos', 'Zapato de tacón', '35', 1, 46),
(3, 'Reloj', 'Reloj de pared', '15', 5.4, 47),
(4, 'Balon ', 'Pelota?', '40', 4.3, 4),
(5, 'Boligrafo', 'Lapicero?', '5', 1, 15);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagenesproducto`
--
ALTER TABLE `imagenesproducto`
  ADD CONSTRAINT `imagenesproducto_ibfk_1` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lineaspedido`
--
ALTER TABLE `lineaspedido`
  ADD CONSTRAINT `lineaspedido_ibfk_1` FOREIGN KEY (`idpedido`) REFERENCES `pedidos` (`idpedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lineaspedido_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
