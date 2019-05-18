-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2019 a las 19:25:55
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `list_proveedor` ()  SELECT * FROM proveedor$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proveedor_get_name` (`p_id` SMALLINT)  SELECT nameproveedor FROM proveedor WHERE idproveedor = p_id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `codcatg` smallint(6) NOT NULL,
  `nomcatg` varchar(30) COLLATE utf8_bin NOT NULL,
  `imagen` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`codcatg`, `nomcatg`, `imagen`) VALUES
(100, 'No Definido', NULL),
(101, 'TUBERIA SANITARIA', NULL),
(102, 'GRIFERIA', NULL),
(103, 'MANGUERAS', NULL),
(104, 'ACCESORIOS PVC Y SANITARIOS', NULL),
(105, 'CEMENTOS', NULL),
(106, 'MORTEROS', NULL),
(107, 'ESTUCOS', NULL),
(108, 'PINTURAS', NULL),
(109, 'ELECTRICOS', NULL),
(110, 'HIERRO', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada_productos`
--

CREATE TABLE `entrada_productos` (
  `codigoentrada` varchar(15) COLLATE utf8_bin NOT NULL,
  `date_ing_prod` date DEFAULT NULL,
  `proveedor` smallint(6) NOT NULL,
  `producto` varchar(8) COLLATE utf8_bin NOT NULL,
  `cantidad` smallint(6) DEFAULT NULL,
  `vlr_und_prod` double DEFAULT NULL,
  `iva` varchar(15) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `item` bigint(20) UNSIGNED NOT NULL,
  `codprod` varchar(8) COLLATE utf8_bin NOT NULL,
  `nomprod` varchar(60) COLLATE utf8_bin NOT NULL,
  `undprod` char(3) COLLATE utf8_bin NOT NULL,
  `stock` smallint(6) DEFAULT '0',
  `costoprod` double DEFAULT '0',
  `precioprod` double DEFAULT '0',
  `categoria` varchar(30) COLLATE utf8_bin NOT NULL,
  `imagen` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`item`, `codprod`, `nomprod`, `undprod`, `stock`, `costoprod`, `precioprod`, `categoria`, `imagen`) VALUES
(2, '10319896', 'TUBO SOCIAL 1 /2 X 6M ECONOMICO', '201', 0, 10300, 13500, '101', NULL),
(5, '10310128', 'ALAMBRE DE COBRE CENTELSA N. 14 VERDE', '206', 0, 735, 900, '100', NULL),
(6, '10311394', 'VARILLA COOPERWELL 1/2 X 1,50 ENCHAQUETADA', '201', 0, 18000, 26000, '100', NULL),
(7, '10310989', 'MANGUERA CONDUFLEX 1/2 X 50 M ECONOMICA', '203', 0, 36000, 42000, '100', NULL),
(8, '10318898', 'ALAMBRE  DE COBRE CENTELSA N.10 BLANCO', '206', 0, 1700, 2000, '100', NULL),
(9, '10310800', 'MANGUERA BICOLOR 1/2 X 80 M', '203', 0, 37000, 46000, '100', NULL),
(10, '10310801', 'MANGUERA BICOLOR 3/4 X 80 M', '203', 0, 49500, 62000, '103', NULL),
(11, '10359500', 'MANGUERA BICOLOR 1 X 80 M', '203', 0, 59500, 75000, '103', NULL),
(12, '10300825', 'PLASTICO INVERNADERO CALIBRE 6 X 5', '206', 0, 8600, 11000, '100', NULL),
(13, '10310407', 'TUBO CONDUIT SEMIPESADO 1/2', '201', 0, 1900, 3000, '100', NULL),
(14, '10310101', 'CODO SANITARIO CXC DE 2', '201', 0, 890, 1500, '100', NULL),
(15, '10310012', 'CODO SANITARIO CXC DE 3', '201', 0, 2300, 3000, '104', NULL),
(16, '10310103', 'CODO SANITARIO CXC DE 4', '201', 0, 3700, 4500, '104', NULL),
(17, '10310147', 'BUJE SANITARIO DE 2 X 1 1/2', '201', 0, 600, 1500, '104', NULL),
(18, '10310149', 'BUJE SANITARIO DE 3X2', '201', 0, 1300, 2000, '104', NULL),
(19, '10310150', 'BUJE SANITARIO DE 3 X 2', '201', 0, 2500, 3800, '104', NULL),
(20, '1030111', 'SEMICODO SANITARIO DE 2 CXC', '201', 0, 1200, 1800, '104', NULL),
(21, '10310878', 'MANGUERA PARA AISLAR NEGRA X 50 M', '203', 0, 12300, 20000, '103', NULL),
(22, '10329889', 'TEJA AJOVER AJOZIN N 8 (2,44) M ', '201', 0, 26000, 31000, '100', NULL),
(23, '10300112', 'SEMICODO SANITARIO DE 3 CXC', '201', 0, 2000, 3400, '104', NULL),
(24, '10300113', 'SEMICODO SANITARIO DE 4 CXC', '201', 0, 3900, 5500, '104', NULL),
(25, '10300158', 'SIFON SANITARIO DE 2', '201', 0, 1800, 2600, '104', NULL),
(26, '10300127', 'SIFON SANITARIO DE 3', '201', 0, 2500, 3600, '104', NULL),
(27, '10300159', 'TEE SANITARIA DE 3', '201', 0, 2500, 3600, '104', NULL),
(28, '10310032', 'MALLA ELECTROSOLDADA 15 X 15 X 5 MM (2,40 X 6) M', '203', 0, 98500, 110000, '100', NULL),
(29, '10310787', 'GEOTEXTIL NO TEJIDO 1800 (ROLLO X 100 M)', '206', 0, 9800, 12500, '100', NULL),
(30, '10300128', 'TEE SANITARIA DE 4', '201', 0, 5000, 6250, '104', NULL),
(31, '10300121', 'YEE SANITARIA DE 3', '201', 0, 3700, 4700, '104', NULL),
(32, '10301095', 'MANGUERA BICOLOR FENIX CALIBRE 40 X 100 M', '206', 0, 870, 1300, '103', NULL),
(33, '10301098', 'MANGUERA SWAN CALIBRE 40 X 100 M', '206', 0, 550, 800, '103', NULL),
(34, '10301120', 'MANGUERA CRISTAL NIVEL DE 1 CALIBRE 30 X 100 M', '206', 0, 2100, 3800, '103', NULL),
(35, '10310708', 'GRIFERIA SANITARIA VALVULA GRECO MPLAST', '201', 0, 9000, 13500, '102', NULL),
(36, '10300513', 'VARILLA CORRUGADA DIACO 9 MM X 6 M', '201', 0, 8304, 9600, '100', NULL),
(37, '10311405', 'CARRETILLA COLIMA ECONOMICA TOLVA METALICA 5 PIES', '201', 0, 110000, 125000, '100', NULL),
(38, '10303105', 'LLANTA COLIMA ANTIPINCHAZO ROJA', '201', 0, 49200, 58000, '100', NULL),
(39, '10355862', 'PALA DRAGA BELLOTA', '201', 0, 31000, 35000, '100', NULL),
(40, '10327099', 'MALLA ZARANDA IMPORTADA TEJIDA 2 X 2 X 0.90 X 30', '206', 0, 8129, 9600, '100', NULL),
(41, '10314131', 'ALAMBRE GALVANIZADO CAL. 18 BRILLANTE', '204', 0, 5300, 6000, '100', NULL),
(42, '10314127', 'ALAMBRE GALVANIZADO CAL 18 BRILLANTE', '204', 0, 5300, 6000, '100', NULL),
(43, '10326401', 'MALLA SOLDADA 25 X 13 30/76 1X 1/2', '206', 0, 10500, 14000, '100', NULL),
(44, '10326451', 'MALLA SOLDADA 25 X 13 30/101 1 X 1/2', '206', 0, 14000, 17000, '100', NULL),
(45, '10311834', 'POLISOMBRA NEGRA 65% 4X 100 M', '206', 0, 3927, 5000, '100', NULL),
(46, '10300223', 'ETERNIT N. 10 MANILIT', '201', 0, 36000, 38000, '100', NULL),
(47, '10301445', 'ESTUCOBRAS BLANCO X 40 KL IMPADOC', '202', 0, 28500, 35000, '107', NULL),
(48, '10312127', 'POLISOMBRA NEGRA 80% X 4 (ROLLO 100 M)', '206', 0, 4010, 5500, '100', NULL),
(49, '10320034', 'TUBO PRESION DE 4 RDE 21 GERFOR', '201', 0, 128000, 142000, '100', NULL),
(50, '10310010', 'MANGUERA FUMIG. ALTA PRES. KORACHI 8.5 MM X 100 580 PSI (FUN', '203', 0, 145000, 184000, '103', NULL),
(52, '10368965', 'PALA COLIMA ANTICHISPA', '201', 0, 45100, 58000, '100', NULL),
(53, '10323231', 'METALDEK ACCESCO 0,9 (4,60; 3,10) ', '206', 0, 32500, 35000, '110', NULL),
(54, '10310102', 'MANGUERA AGRICOLA 1/2 X 100 M CAL. 40', '203', 0, 37000, 45000, '100', NULL),
(55, '10355051', 'MANGUERA AGRICOLA 3/4 X 100 M CAL 40', '203', 0, 49500, 58000, '100', NULL),
(56, '10355501', 'MANGUERA AGRICOLA 1 X 100 M CAL. 40', '203', 0, 59500, 68000, '100', NULL),
(57, '10311208', 'BREKER LUMINEX 30 AMP LEGRAND', '201', 0, 9200, 12000, '109', NULL),
(58, '10311209', 'BREKER LUMINEX 40 AMP LEGRAND', '201', 0, 9200, 12000, '109', NULL),
(60, '10310900', 'CABLE DUPLEX 2 X 14 CENTELSA', '201', 0, 1550, 2000, '109', NULL),
(61, '1031091', 'CABLE DUPLEX 2 X 16 CENTELSA', '206', 0, 1085, 1600, '109', NULL),
(62, '10315456', 'PLAFON PORCELANA CORONA', '201', 0, 1650, 2000, '109', NULL),
(63, '10314490', 'TABLERO MONOFASICO 2 CIRCUITOS TERCOL', '201', 0, 16500, 20500, '109', NULL),
(64, '10314491', 'TABLERO MONOFASICO 3 CIRCUITOS TERCOL', '201', 0, 20000, 25000, '109', NULL),
(65, '10314492', 'TABLERO MONOFASICO 4 CIRCUITOS TERCOL', '201', 0, 22500, 28000, '109', NULL),
(66, '10327025', 'MALLA GALLINERO STANDARD EL CORRAL 1,80 X 1 1/4 X 36 M', '203', 0, 61750, 68000, '100', NULL),
(67, '10312123', 'MALLA CAFETERA 11 X 11 X 30 M', '206', 0, 9000, 12000, '100', NULL),
(68, '10314151', 'ALAMBRE DE AMARRE', '204', 0, 3600, 4500, '110', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idproveedor` bigint(20) UNSIGNED NOT NULL,
  `nameproveedor` varchar(30) COLLATE utf8_bin NOT NULL,
  `nitprov` varchar(20) COLLATE utf8_bin NOT NULL,
  `ciudadprov` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `addressprov` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `telefonoprov` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `emailprov` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `sellman` varchar(40) COLLATE utf8_bin NOT NULL,
  `telefono` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idproveedor`, `nameproveedor`, `nitprov`, `ciudadprov`, `addressprov`, `telefonoprov`, `emailprov`, `sellman`, `telefono`) VALUES
(3, 'AGROANDINA DE NARIÃ±O LTDA', '900.243.893-8', 'PASTO', 'CRA 7MA E 17A- 90', '7304553', 'AGROANDINADENARINO@HOTMAIL.COM', 'ALEXANDER ROSERO', '315761628'),
(5, 'CORBETA', '890.900.943-1', 'PASTO', 'CALLE 19 N. 28-89', '7228042', 'COLDECOM@COLCOMERCIO.COM.CO', 'JACKELIN MORA', '3158995543');

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
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`codcatg`),
  ADD UNIQUE KEY `nomcatg` (`nomcatg`);

--
-- Indices de la tabla `entrada_productos`
--
ALTER TABLE `entrada_productos`
  ADD PRIMARY KEY (`codigoentrada`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`item`),
  ADD UNIQUE KEY `codprod` (`codprod`),
  ADD UNIQUE KEY `nomprod` (`nomprod`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idproveedor`),
  ADD UNIQUE KEY `nameproveedor` (`nameproveedor`),
  ADD UNIQUE KEY `nitprov` (`nitprov`);

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
  MODIFY `item` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idproveedor` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
