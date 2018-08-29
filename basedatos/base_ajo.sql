-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-08-2018 a las 02:59:20
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `aderezo`
--

INSERT INTO `aderezo` (`id_aderezo`, `cod_aderezo`, `nom_aderezo`, `precio_aderezo`, `disp_aderezo`, `public_aderezo`) VALUES
(1, 5002, 'Aderezo Crema Champiñon', 500, 1, 1),
(2, 2033, 'Aderezo de berros', 500, 1, 1),
(3, 2034, 'Aderezo francés', 500, 1, 1),
(4, 2035, 'mayonesa casera', 1000, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aderezo_pedido`
--

CREATE TABLE IF NOT EXISTS `aderezo_pedido` (
  `id_ader_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `cant_aderezo` int(11) DEFAULT NULL,
  `id_aderezo` int(11) DEFAULT NULL,
  `id_detventa` int(11) DEFAULT NULL,
  `cost_aderezo` int(11) NOT NULL,
  PRIMARY KEY (`id_ader_pedido`),
  KEY `id_aderezo` (`id_aderezo`),
  KEY `id_detventa` (`id_detventa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `aderezo_pedido`
--

INSERT INTO `aderezo_pedido` (`id_ader_pedido`, `cant_aderezo`, `id_aderezo`, `id_detventa`, `cost_aderezo`) VALUES
(1, 1, 1, 1, 500),
(2, 1, 1, 2, 500),
(3, 1, 3, 3, 500),
(4, 1, 2, 4, 500),
(5, 1, 3, 4, 500),
(6, 1, 3, 5, 500),
(7, 1, 4, 5, 1000),
(8, 1, 2, 6, 500),
(9, 1, 3, 6, 500),
(10, 1, 4, 6, 1000),
(11, 1, 1, 8, 500),
(12, 1, 1, 8, 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aderezo_tmp`
--

CREATE TABLE IF NOT EXISTS `aderezo_tmp` (
  `id_ade` int(11) NOT NULL,
  `nom_ade` varchar(60) NOT NULL,
  `cos_ade` int(11) NOT NULL,
  `can_ade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_venta`
--

CREATE TABLE IF NOT EXISTS `det_venta` (
  `id_detventa` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) DEFAULT NULL,
  `id_producto` int(111) NOT NULL,
  `uni_producto` int(11) NOT NULL,
  `obs_producto` text NOT NULL,
  `val_ing` int(11) NOT NULL,
  `ing_extprod` varchar(50) NOT NULL,
  `cant_producto` int(11) NOT NULL,
  `total_prod` int(11) NOT NULL,
  PRIMARY KEY (`id_detventa`),
  KEY `id_venta` (`id_venta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `det_venta`
--

INSERT INTO `det_venta` (`id_detventa`, `id_venta`, `id_producto`, `uni_producto`, `obs_producto`, `val_ing`, `ing_extprod`, `cant_producto`, `total_prod`) VALUES
(1, 1, 5, 5500, 'sin sal', 2000, 'PALTA HASS, ', 1, 7500),
(2, 2, 7, 5600, 'sin mayonesa', 2000, 'PALTA HASS, ', 1, 7600),
(3, 3, 5, 5500, 'sin mayonesa', 800, 'TOMATE, ', 1, 6300),
(4, 4, 6, 4500, 'sin sal', 1100, 'LECHUGA MORADA, TOMATE, ', 1, 5600),
(5, 5, 6, 4500, '', 2800, 'PALTA HASS, PEPINILLOS, ', 1, 7300),
(6, 6, 6, 4500, 'sin mayo', 1300, 'PEPINILLOS, QUESO, ', 1, 5800),
(7, 7, 5, 5500, 'sin sal', 1100, 'TOMATE, LECHUGA MORADA, ', 1, 6600),
(8, 7, 6, 4500, '', 1450, 'PEPINILLOS, CEBOLAS EN AROS, TOMATE, LECHUGA MORAD', 1, 5950);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`id_ingr`, `cod_ingr`, `nom_ingr`, `precio_ingr`, `disp_ingr`, `public_ingr`) VALUES
(1, 3002, 'Lechuga morada', 300, 1, 1),
(2, 3002, 'tomate', 800, 1, 1),
(3, 2044, 'palta hass', 2000, 1, 1),
(4, 3055, 'pepinillos', 800, 1, 1),
(5, 1234, 'queso', 500, 1, 1),
(6, 2450, 'cebolas en aros', 650, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_prod`, `cod_prod`, `nom_prod`, `desc_prod`, `precio_prod`, `dcto_prod`, `disp_prod`, `public_prod`) VALUES
(5, 1001, 'sandwich dinamico', 'tomate queso', 5500, 0, 1, 1),
(6, 1002, 'sandwich italiano', 'palta tomate mayo', 4500, 0, 1, 1),
(7, 1003, 'sandwich mechada', 'carne vacuno', 5600, 0, 1, 1),
(8, 1004, 'sandwich lomito italiano', 'carne cerdo', 5000, 0, 1, 1),
(9, 1005, 'sandwich ave pimiento', 'pollo pimiento morron', 3500, 0, 1, 1),
(10, 1006, 'sandwich ave palta', 'carne de pollo', 3600, 0, 1, 1),
(11, 1515, 'sandwich de chacarecho', 'porotos verdes y aji', 4500, 0, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `refresco`
--

INSERT INTO `refresco` (`id_ref`, `cod_ref`, `nom_ref`, `precio_ref`, `disp_ref`, `public_ref`) VALUES
(1, 5002, 'cafe espreso', 2300, 1, 1),
(2, 5003, 'jugo natural', 2400, 1, 1),
(3, 2004, 'Mokachino', 2500, 1, 1),
(4, 2002, 'piscola', 3500, 1, 1),
(5, 2003, 'cafe de grano', 2500, 1, 1),
(6, 2005, 'capuccino', 2500, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refresco_pedido`
--

CREATE TABLE IF NOT EXISTS `refresco_pedido` (
  `id_ref_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `cant_ref` int(11) DEFAULT NULL,
  `id_ref` int(11) DEFAULT NULL,
  `id_detventa` int(11) DEFAULT NULL,
  `cost_ref` int(11) NOT NULL,
  PRIMARY KEY (`id_ref_pedido`),
  KEY `id_ref` (`id_ref`),
  KEY `id_detventa` (`id_detventa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `refresco_pedido`
--

INSERT INTO `refresco_pedido` (`id_ref_pedido`, `cant_ref`, `id_ref`, `id_detventa`, `cost_ref`) VALUES
(1, 1, 3, 1, 2500),
(2, 1, 3, 2, 2500),
(3, 1, 4, 2, 3500),
(4, 1, 4, 3, 3500),
(5, 1, 2, 4, 2400),
(6, 1, 3, 4, 2500),
(7, 1, 2, 5, 2400),
(8, 1, 4, 5, 3500),
(9, 1, 1, 6, 2300),
(10, 1, 2, 6, 2400),
(11, 1, 3, 6, 2500),
(12, 1, 2, 8, 2400),
(13, 1, 4, 8, 3500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refresco_tmp`
--

CREATE TABLE IF NOT EXISTS `refresco_tmp` (
  `id_ref` int(11) NOT NULL,
  `nom_ref` varchar(60) NOT NULL,
  `cos_ref` int(11) NOT NULL,
  `can_ref` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(0, 6, 'wqw', 4500, 300, 'LECHUGA MORADA, ', 1, 4800),
(0, 7, '1', 5600, 300, 'LECHUGA MORADA, ', 1, 5900),
(0, 6, 'w', 4500, 800, 'TOMATE, ', 1, 5300);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usr_usuario`, `pass_usuario`, `nom_usuario`, `ape_usuario`, `lvl_usuario`) VALUES
(3, 'rguineoa@gmail.com', '5e0719e565ce9ae65fb3b5431d1e3409', 'Roberto', 'Guineo', 0),
(7, 'usuario@usuario.cl', 'e10adc3949ba59abbe56e057f20f883e', 'usuario', 'estandar', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_venta` datetime DEFAULT NULL,
  `nom_venta` varchar(50) NOT NULL,
  `obs_venta` text NOT NULL,
  `mpago_venta` varchar(60) NOT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `fecha_venta`, `nom_venta`, `obs_venta`, `mpago_venta`) VALUES
(1, '2018-08-19 20:27:23', 'roberto', 'consumo en el local', '1'),
(2, '2018-08-19 20:46:59', 'catalina guineo', 'domicilio', '1'),
(3, '2018-08-19 21:25:43', 'katherine knopke', 'domicilio', '1'),
(4, '2018-08-19 21:28:27', 'catalina guineo', 'consumo en el local', '2'),
(5, '2018-08-19 23:53:53', 'carlos madrid', 'consumo en el local', '1'),
(6, '2018-08-20 00:17:40', 'pepito tv', 'consumo en el local', '2'),
(7, '2018-08-26 15:50:55', '', 'consumo en el local', '2'),
(8, '2018-08-26 17:12:40', '', '', '1'),
(9, '2018-08-26 17:12:40', '', '', '1'),
(10, '2018-08-26 17:12:41', '', '', '1'),
(11, '2018-08-26 17:12:41', '', '', '1'),
(12, '2018-08-26 17:13:06', '', '', '3'),
(13, '2018-08-26 17:15:21', '', '', '1');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aderezo_pedido`
--
ALTER TABLE `aderezo_pedido`
  ADD CONSTRAINT `aderezo_pedido_ibfk_1` FOREIGN KEY (`id_aderezo`) REFERENCES `aderezo` (`id_aderezo`),
  ADD CONSTRAINT `aderezo_pedido_ibfk_2` FOREIGN KEY (`id_detventa`) REFERENCES `det_venta` (`id_detventa`);

--
-- Filtros para la tabla `det_venta`
--
ALTER TABLE `det_venta`
  ADD CONSTRAINT `det_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`);

--
-- Filtros para la tabla `refresco_pedido`
--
ALTER TABLE `refresco_pedido`
  ADD CONSTRAINT `refresco_pedido_ibfk_1` FOREIGN KEY (`id_ref`) REFERENCES `refresco` (`id_ref`),
  ADD CONSTRAINT `refresco_pedido_ibfk_2` FOREIGN KEY (`id_detventa`) REFERENCES `det_venta` (`id_detventa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
