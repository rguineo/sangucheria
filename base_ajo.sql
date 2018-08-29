-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-04-2018 a las 01:40:52
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `base_ajo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aderezo`
--

CREATE TABLE IF NOT EXISTS `aderezo` (
  `id_aderezo` int(11) NOT NULL AUTO_INCREMENT,
  `cod_aderezo` int(11) DEFAULT NULL,
  `nom_aderezo` varchar(50) DEFAULT NULL,
  `precio_aderezo` int(15) DEFAULT NULL,
  `disp_aderezo` int(1) NOT NULL,
  `public_aderezo` int(1) NOT NULL,
  PRIMARY KEY (`id_aderezo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `aderezo`
--

INSERT INTO `aderezo` (`id_aderezo`, `cod_aderezo`, `nom_aderezo`, `precio_aderezo`, `disp_aderezo`, `public_aderezo`) VALUES
(1, 5002, 'Aderezo Crema Champiñon', 500, 1, 1),
(2, 2033, 'Aderezo de berros', 500, 1, 1),
(3, 2034, 'Aderezo francés', 500, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_venta`
--

CREATE TABLE IF NOT EXISTS `det_venta` (
  `id_detventa` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detventa`),
  KEY `id_venta` (`id_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `rut_empresa` varchar(15) DEFAULT NULL,
  `nom_empresa` varchar(50) DEFAULT NULL,
  `giro_empresa` varchar(50) DEFAULT NULL,
  `dire_empresa` varchar(50) DEFAULT NULL,
  `eml_empresa` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `rut_empresa`, `nom_empresa`, `giro_empresa`, `dire_empresa`, `eml_empresa`) VALUES
(1, '13593532-8', 'El Ajo Sandwicheria', 'Alimentacion', 'Pudeto 410', 'elajo@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE IF NOT EXISTS `ingredientes` (
  `id_ingr` int(11) NOT NULL AUTO_INCREMENT,
  `cod_ingr` int(11) DEFAULT NULL,
  `nom_ingr` varchar(50) DEFAULT NULL,
  `precio_ingr` int(11) DEFAULT NULL,
  `disp_ingr` int(1) NOT NULL,
  `public_ingr` int(1) NOT NULL,
  PRIMARY KEY (`id_ingr`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`id_ingr`, `cod_ingr`, `nom_ingr`, `precio_ingr`, `disp_ingr`, `public_ingr`) VALUES
(1, 3002, 'Lechuga morada', 300, 1, 1),
(2, 3002, 'tomate', 800, 1, 1),
(3, 2044, 'palta hass', 2000, 1, 1),
(4, 3055, 'pepinillos', 800, 1, 1),
(5, 1234, 'queso', 500, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `url_log` varchar(80) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `cod_prod` int(11) DEFAULT NULL,
  `nom_prod` varchar(50) DEFAULT NULL,
  `desc_prod` text NOT NULL,
  `precio_prod` int(10) DEFAULT NULL,
  `dcto_prod` int(3) NOT NULL,
  `disp_prod` int(1) NOT NULL,
  `public_prod` int(1) NOT NULL,
  PRIMARY KEY (`id_prod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_prod`, `cod_prod`, `nom_prod`, `desc_prod`, `precio_prod`, `dcto_prod`, `disp_prod`, `public_prod`) VALUES
(5, 1001, 'sandwich dinamico', 'tomate queso', 5500, 0, 1, 1),
(6, 1002, 'sandwich italiano', 'palta tomate mayo', 4500, 0, 1, 1),
(7, 1003, 'sandwich mechada', 'carne vacuno', 5600, 0, 1, 1),
(8, 1004, 'sandwich lomito italiano', 'carne cerdo', 5000, 0, 1, 1),
(9, 1005, 'sandwich ave pimiento', 'pollo pimiento morron', 3500, 0, 1, 1),
(10, 1006, 'sandwich ave palta', 'carne de pollo', 3600, 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refresco`
--

CREATE TABLE IF NOT EXISTS `refresco` (
  `id_ref` int(11) NOT NULL AUTO_INCREMENT,
  `cod_ref` int(11) DEFAULT NULL,
  `nom_ref` varchar(50) DEFAULT NULL,
  `precio_ref` int(11) DEFAULT NULL,
  `disp_ref` int(1) NOT NULL,
  `public_ref` int(1) NOT NULL,
  PRIMARY KEY (`id_ref`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `refresco`
--

INSERT INTO `refresco` (`id_ref`, `cod_ref`, `nom_ref`, `precio_ref`, `disp_ref`, `public_ref`) VALUES
(1, 5002, 'cafe espreso', 2300, 1, 1),
(2, 5003, 'jugo natural', 2400, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
  `id_temp` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `obs_prod` varchar(100) NOT NULL,
  `uni_prod` int(11) NOT NULL,
  `val_ing_prod` int(11) NOT NULL,
  `ing_ext_prod` varchar(100) NOT NULL,
  `cant_prod` int(11) NOT NULL,
  `tot_prod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `temp`
--

INSERT INTO `temp` (`id_temp`, `id_prod`, `obs_prod`, `uni_prod`, `val_ing_prod`, `ing_ext_prod`, `cant_prod`, `tot_prod`) VALUES
(0, 6, '', 4500, 0, '', 1, 4500),
(0, 7, '1', 5600, 0, '', 1, 5000),
(0, 6, '', 4500, 0, '', 1, 4500),
(0, 6, '', 4500, 0, '', 11, 49500),
(0, 6, '', 4500, 0, '', 11, 49500),
(0, 6, '', 4500, 0, '', 1, 4500),
(0, 6, '', 4500, 0, '', 1, 4500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp_cotizacion`
--

CREATE TABLE IF NOT EXISTS `tmp_cotizacion` (
  `id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `cod_prod` int(11) DEFAULT NULL,
  `nom_prod` varchar(50) DEFAULT NULL,
  `desc_prod` text,
  `precio_prod` int(10) DEFAULT NULL,
  `disp_prod` int(1) DEFAULT NULL,
  `public_prod` int(1) DEFAULT NULL,
  `session_id` int(11) NOT NULL,
  `can_prod` int(11) NOT NULL,
  PRIMARY KEY (`id_prod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tmp_cotizacion`
--

INSERT INTO `tmp_cotizacion` (`id_prod`, `cod_prod`, `nom_prod`, `desc_prod`, `precio_prod`, `disp_prod`, `public_prod`, `session_id`, `can_prod`) VALUES
(1, 3002, 'SANDWICH PALTA LECHUGA MORADA', NULL, 3500, NULL, NULL, 0, 0),
(2, 3002, 'SANDWICH TOMATE MAYO', NULL, 800, NULL, NULL, 0, 0),
(3, 1110, 'SANDWICH DINAMICO', NULL, 5000, NULL, NULL, 0, 0),
(4, 2223, 'SANDWICH MECHADA DINAMICO', NULL, 5500, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usr_usuario` varchar(50) DEFAULT NULL,
  `pass_usuario` varchar(50) DEFAULT NULL,
  `nom_usuario` varchar(50) DEFAULT NULL,
  `ape_usuario` varchar(50) DEFAULT NULL,
  `lvl_usuario` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usr_usuario`, `pass_usuario`, `nom_usuario`, `ape_usuario`, `lvl_usuario`) VALUES
(3, 'rguineoa@gmail.com', '5e0719e565ce9ae65fb3b5431d1e3409', 'Roberto', 'Guineo', 0),
(4, 'roberto@duotek.cl', '5e0719e565ce9ae65fb3b5431d1e3409', 'andres', 'avendaño', 0),
(5, 'diego@extendcode.cl', 'b0ac23d94dcef21e36e457b4abf6e0cb', 'Diego ', 'quilahuilque', 0),
(6, 'cata@gmail.com', 'cbee8a4e86e2833292ea13c0106fff1e', 'catalina', 'guineo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_venta` date DEFAULT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `det_venta`
--
ALTER TABLE `det_venta`
  ADD CONSTRAINT `det_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
