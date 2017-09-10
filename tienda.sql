-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-09-2014 a las 16:17:58
-- Versión del servidor: 5.5.34
-- Versión de PHP: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cantidad`
--

CREATE TABLE IF NOT EXISTS `cantidad` (
  `idCant` int(2) NOT NULL AUTO_INCREMENT,
  `cantExistente` int(100) NOT NULL,
  `cantPedida` int(90) NOT NULL,
  `cantTotal` int(225) NOT NULL,
  PRIMARY KEY (`idCant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoría`
--

CREATE TABLE IF NOT EXISTS `categoría` (
  `idCategoría` int(2) NOT NULL AUTO_INCREMENT,
  `categoría` varchar(30) NOT NULL,
  PRIMARY KEY (`idCategoría`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `idCliente` int(2) NOT NULL AUTO_INCREMENT,
  `nombreC` varchar(50) NOT NULL,
  `edadC` int(2) NOT NULL,
  `direcciónC` varchar(50) DEFAULT NULL,
  `teléfonoC` int(8) DEFAULT NULL,
  `categoríaC` int(2) NOT NULL,
  `estadoC` int(2) NOT NULL,
  PRIMARY KEY (`idCliente`),
  KEY `categoríaC` (`categoríaC`,`estadoC`),
  KEY `estadoC` (`estadoC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `idEstado` int(2) NOT NULL AUTO_INCREMENT,
  `estado` varchar(30) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechas`
--

CREATE TABLE IF NOT EXISTS `fechas` (
  `idFecha` int(2) NOT NULL AUTO_INCREMENT,
  `fechaCaducidad` date NOT NULL,
  `fechaIngreso` date NOT NULL,
  `fechaVenta` date NOT NULL,
  PRIMARY KEY (`idFecha`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
  `idEmpleado` int(2) NOT NULL AUTO_INCREMENT,
  `nombreE` varchar(50) NOT NULL,
  `apellidoE` varchar(50) NOT NULL,
  `direcciónE` varchar(50) DEFAULT NULL,
  `edadE` int(2) NOT NULL,
  `teléfonoE` int(8) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `cargo` varchar(50) NOT NULL,
  `sueldo` int(2) NOT NULL,
  PRIMARY KEY (`idEmpleado`),
  KEY `sueldo` (`sueldo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE IF NOT EXISTS `precios` (
  `idPrecio` int(2) NOT NULL AUTO_INCREMENT,
  `preProveedor` decimal(3,2) NOT NULL,
  `preVenta` decimal(3,2) NOT NULL,
  `preGanancia` decimal(3,2) NOT NULL,
  PRIMARY KEY (`idPrecio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `idProducto` int(2) NOT NULL AUTO_INCREMENT,
  `nombreP` varchar(50) NOT NULL,
  `fechasP` int(2) NOT NULL,
  `cantidadP` int(2) NOT NULL,
  `precioP` int(2) NOT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `fechasP` (`fechasP`,`cantidadP`,`precioP`),
  KEY `cantidadP` (`cantidadP`),
  KEY `precioP` (`precioP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sueldo`
--

CREATE TABLE IF NOT EXISTS `sueldo` (
  `idSueldo` int(2) NOT NULL AUTO_INCREMENT,
  `cantidadS` decimal(3,2) NOT NULL,
  `bonificaciónS` decimal(3,2) DEFAULT NULL,
  `aguinaldoS` decimal(3,2) DEFAULT NULL,
  `totalS` decimal(3,2) NOT NULL,
  PRIMARY KEY (`idSueldo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cantidad`
--
ALTER TABLE `cantidad`
  ADD CONSTRAINT `cantidad_ibfk_1` FOREIGN KEY (`idCant`) REFERENCES `productos` (`cantidadP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `categoría`
--
ALTER TABLE `categoría`
  ADD CONSTRAINT `categoría_ibfk_1` FOREIGN KEY (`idCategoría`) REFERENCES `clientes` (`categoríaC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `estado_ibfk_1` FOREIGN KEY (`idEstado`) REFERENCES `clientes` (`estadoC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `precios`
--
ALTER TABLE `precios`
  ADD CONSTRAINT `precios_ibfk_1` FOREIGN KEY (`idPrecio`) REFERENCES `productos` (`precioP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sueldo`
--
ALTER TABLE `sueldo`
  ADD CONSTRAINT `sueldo_ibfk_1` FOREIGN KEY (`idSueldo`) REFERENCES `personal` (`sueldo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
