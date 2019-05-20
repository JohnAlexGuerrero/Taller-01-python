-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2019 a las 05:50:00
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ferreteria`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_new_product` (IN `codigo` VARCHAR(8), IN `producto` VARCHAR(60), IN `und` VARCHAR(5), IN `imagen` VARCHAR(50))  BEGIN
INSERT INTO productos(codigo_prod,nombre_prod,unidad_prod,imagen_prod)
    VALUES(codigo,producto,und,imagen);
    
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_prod_inventary` (IN `new_product` VARCHAR(60))  INSERT INTO inventario(producto)
SELECT
nombre_prod FROM productos p
WHERE
p.nombre_prod =new_product$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `query_inventary` ()  SELECT producto,codigo_prod,stock_prod,precio_venta_prod,imagen_prod,nomunidad
FROM productos p JOIN inventario i JOIN unidades u
WHERE (p.unidad_prod=u.codund)AND(p.nombre_prod=i.producto)
ORDER BY 1 ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_product` (IN `id` VARCHAR(8))  SELECT producto,codigo_prod,stock_prod,precio_venta_prod,imagen_prod,nomunidad
FROM productos p JOIN inventario i JOIN unidades u
WHERE (p.unidad_prod=u.codund)AND(p.nombre_prod=i.producto)
AND p.codigo_prod=id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `producto` varchar(60) COLLATE utf8_bin NOT NULL,
  `stock_prod` smallint(6) DEFAULT '0',
  `costo_prod` double DEFAULT '0',
  `iva_prod` smallint(6) DEFAULT NULL,
  `utilidad` smallint(6) DEFAULT NULL,
  `costo_iva_prod` double DEFAULT '0',
  `precio_venta_prod` double DEFAULT '0',
  `total_cst_prod` double DEFAULT NULL,
  `bodega` char(3) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`producto`, `stock_prod`, `costo_prod`, `iva_prod`, `utilidad`, `costo_iva_prod`, `precio_venta_prod`, `total_cst_prod`, `bodega`) VALUES
('PALA COLIMA N 2 SIN CABO', 0, 0, NULL, NULL, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_prod` bigint(20) UNSIGNED NOT NULL,
  `codigo_prod` varchar(8) COLLATE utf8_bin NOT NULL,
  `nombre_prod` varchar(60) COLLATE utf8_bin NOT NULL,
  `unidad_prod` char(3) COLLATE utf8_bin NOT NULL,
  `imagen_prod` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_prod`, `codigo_prod`, `nombre_prod`, `unidad_prod`, `imagen_prod`) VALUES
(1, '10334256', 'PALA COLIMA N 2 SIN CABO', '201', 'images/products/photo_1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE `unidades` (
  `codund` char(3) COLLATE utf8_bin NOT NULL,
  `nomunidad` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`codund`, `nomunidad`) VALUES
('202', 'BULTO'),
('204', 'KILO'),
('205', 'LIBRA'),
('206', 'MTR'),
('203', 'ROLLO'),
('201', 'UND');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_prod`),
  ADD UNIQUE KEY `codigo_prod` (`codigo_prod`),
  ADD UNIQUE KEY `nombre_prod` (`nombre_prod`);

--
-- Indices de la tabla `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`codund`),
  ADD UNIQUE KEY `nomunidad` (`nomunidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_prod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
