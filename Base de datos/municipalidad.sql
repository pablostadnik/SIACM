-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 20-08-2023 a las 17:05:23
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `municipalidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calculo`
--

DROP TABLE IF EXISTS `calculo`;
CREATE TABLE IF NOT EXISTS `calculo` (
  `cod_parcela` int NOT NULL,
  `ini_obra` varchar(11) NOT NULL,
  `final_obra` varchar(11) NOT NULL,
  `fecha_pre` varchar(11) NOT NULL,
  `plazo` int NOT NULL,
  `valor` int NOT NULL,
  `reg` float NOT NULL,
  `antireg` varchar(3) NOT NULL,
  `interes` int NOT NULL,
  `tdc` float NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `calculo`
--

INSERT INTO `calculo` (`cod_parcela`, `ini_obra`, `final_obra`, `fecha_pre`, `plazo`, `valor`, `reg`, `antireg`, `interes`, `tdc`, `id`) VALUES
(4, '', '', '', 0, 18, 0, '', 0, 14, 1),
(4, '20230302', '20210201', '20220201', 12, 17, 14, '', 0, 0, 2),
(4, '', '20211015', '20221213', 14, 35, 65, '89', 0, 0, 5),
(4, '', '20211014', '20221615', 18, 30, 0, 'no', 16, 0, 6),
(6, '', '', '', 0, 32, 25, '', 0, 800, 85),
(6, '20220201', '20220901', '20220601', 3, 52, 30, '', 0, 1560, 86),
(6, '', '20220301', '20220801', 5, 40, 26, '', 15, 1040, 87),
(6, '', '20220401', '20220601', 2, 30, 0, '25', 12, 750, 88);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contribuyente`
--

DROP TABLE IF EXISTS `contribuyente`;
CREATE TABLE IF NOT EXISTS `contribuyente` (
  `nombre` varchar(25) NOT NULL,
  `calle` varchar(30) NOT NULL,
  `barrio` varchar(25) NOT NULL,
  `numero` int NOT NULL,
  `piso` int NOT NULL,
  `departamento` varchar(2) NOT NULL,
  `cod_postal` varchar(9) NOT NULL,
  `num_doc` int NOT NULL,
  `cod_titular` int NOT NULL,
  `correo` varchar(25) NOT NULL,
  `fax` varchar(25) NOT NULL,
  `cuit` varchar(15) NOT NULL,
  PRIMARY KEY (`num_doc`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `contribuyente`
--

INSERT INTO `contribuyente` (`nombre`, `calle`, `barrio`, `numero`, `piso`, `departamento`, `cod_postal`, `num_doc`, `cod_titular`, `correo`, `fax`, `cuit`) VALUES
('pablo', 'laruso', 'las nazarena', 42, 6, '3', '6530', 34659874, 3, 'pablostadnik@hotmail.com', 'pablostadnik@hotmail.com', ''),
('carlos', 'jujuy', 'del carmen', 89, 4, 'f', '6530', 33658974, 55, 'fede@tomas.com', 'fede2@tomas.com', ''),
('Gaston', 'lavalle', 'carretas', 25, 4, 'j', '6530', 2569874, 13, 'gaston@tomas.com', 'gaston@tomas.com', ''),
('DIEGO', 'Asuncion', 'judios', 65, 4, 'b', '6530', 326562, 25, 'pedro@tomas.com', 'pedrito@tomas.com', '25-45698879-3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

DROP TABLE IF EXISTS `expediente`;
CREATE TABLE IF NOT EXISTS `expediente` (
  `num_exp` varchar(20) NOT NULL,
  `letra` varchar(3) NOT NULL,
  `anio` int NOT NULL,
  `tipo_obra` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `existente` float NOT NULL,
  `demoler` float NOT NULL,
  `construir` float NOT NULL,
  `empadronar` float NOT NULL,
  `cod_par` int NOT NULL,
  `nom_archivo` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `expediente`
--

INSERT INTO `expediente` (`num_exp`, `letra`, `anio`, `tipo_obra`, `existente`, `demoler`, `construir`, `empadronar`, `cod_par`, `nom_archivo`) VALUES
('2', 'a', 2022, 'sa', 1, 1, 1, 1, 4, ''),
('3', 'b', 2023, 'parcela', 5, 15, 16, 13, 4, ''),
('32', 'L', 2023, 'A DEMOLER', 25, 17, 25, 36, 6, ''),
('23', 't', 2022, 'A CONSTRUIR', 20, 35, 24, 12, 6, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `importacion`
--

DROP TABLE IF EXISTS `importacion`;
CREATE TABLE IF NOT EXISTS `importacion` (
  `cod_parcela` int NOT NULL,
  `frente1` int NOT NULL,
  `frente2` int NOT NULL,
  `frente3` int NOT NULL,
  `frente4` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incrementar`
--

DROP TABLE IF EXISTS `incrementar`;
CREATE TABLE IF NOT EXISTS `incrementar` (
  `i` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `incrementar`
--

INSERT INTO `incrementar` (`i`) VALUES
(3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas_cat`
--

DROP TABLE IF EXISTS `medidas_cat`;
CREATE TABLE IF NOT EXISTS `medidas_cat` (
  `ubicacion` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rumbo` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `longitud` double DEFAULT NULL,
  `lindero` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `vertice` int NOT NULL,
  `latitud` varchar(15) DEFAULT NULL,
  `longitud2` varchar(15) DEFAULT NULL,
  `cod_parcela` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `medidas_cat`
--

INSERT INTO `medidas_cat` (`ubicacion`, `rumbo`, `longitud`, `lindero`, `vertice`, `latitud`, `longitud2`, `cod_parcela`) VALUES
('FRENTE 1', 'es', 12.1, 'es', 0, '12º15\'33\'\'', '12º15\'33\'\'', 4),
('FRENTE 2', 'no', 12.2, 'es', 0, '12º15\'33\'\'', '12º15\'33\'\'', 4),
('FRENTE 3', 'es', 12.3, 'es', 0, '12º15\'33\'\'', '12º15\'33\'\'', 4),
('no', 'es', 3, 'sa', 1, '25º10\'', '25º10\'', NULL),
('no', 'es', 25, 'sa', 1, '25º10\'', '25º10\'', 7),
('no', 'es', 2.6, 'sa', 1, '25º10\'', '25º10\'', 8),
('FRENTE 1', 'SUR', 19.2, 'SUR', 1, '35º30\'15\'\'', '58º33\'15\'\'', 6),
('FRENTE 2', 'NOR', 18.2, 'NOR', 2, '62º30\'15\'\'', '42º33\'15\'\'', 6),
('FRENTE 3', 'OE', 17.2, 'OE', 3, '63º30\'15\'\'', '43º33\'15\'\'', 6),
('FRENTE 4', 'ES', 16.2, 'ES', 4, '64º30\'15\'\'', '44º33\'15\'\'', 6),
('FRENTE 4', 'es', 0, 'es', 0, '12º15\'33\'\'', '12º15\'33\'\'', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas_dom`
--

DROP TABLE IF EXISTS `medidas_dom`;
CREATE TABLE IF NOT EXISTS `medidas_dom` (
  `cod_par` int NOT NULL,
  `ubicacion` varchar(10) NOT NULL,
  `rumbo` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `longitud` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `medidas_dom`
--

INSERT INTO `medidas_dom` (`cod_par`, `ubicacion`, `rumbo`, `longitud`) VALUES
(4, '0', 'te', 5),
(4, '0', 'er', 4),
(4, '0', 'sd', 3),
(4, '0', 'sd', 2),
(4, '0', 'ssd', 1),
(6, 'FRENTE 1', 'NO', 22.5),
(6, 'FRENTE 2', 'ES', 30),
(6, 'FRENTE 3', 'SUR', 32.2),
(6, '', '', 0),
(6, '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parcela`
--

DROP TABLE IF EXISTS `parcela`;
CREATE TABLE IF NOT EXISTS `parcela` (
  `codigo` int NOT NULL,
  `plano` int NOT NULL,
  `partida` int NOT NULL,
  `propietario` varchar(15) NOT NULL,
  `contribuyente` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `poseedor` varchar(15) NOT NULL,
  `circunscripcion` varchar(15) NOT NULL,
  `seccion` varchar(2) NOT NULL,
  `chacra_num` int NOT NULL,
  `quinta_let` varchar(3) NOT NULL,
  `fraccion_let` varchar(2) NOT NULL,
  `manzana_let` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `parcela_let` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `subparcela` int NOT NULL,
  `partido` int NOT NULL,
  `superficie` int NOT NULL,
  `sup_edif` int NOT NULL,
  `antecedentes` varchar(10) NOT NULL,
  `expediente` varchar(10) NOT NULL,
  `calle` varchar(20) NOT NULL,
  `entre1` varchar(20) NOT NULL,
  `entre2` varchar(20) NOT NULL,
  `localidad` varchar(20) NOT NULL,
  `num` int NOT NULL,
  `piso` int NOT NULL,
  `dto` int NOT NULL,
  `cod_postal` varchar(10) NOT NULL,
  `fraccion` varchar(5) NOT NULL,
  `chacra` int DEFAULT NULL,
  `quinta` int DEFAULT NULL,
  `manzana` int DEFAULT NULL,
  `lote` int DEFAULT NULL,
  `med_sup` int DEFAULT NULL,
  `escribano` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tipo` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `num_i` int DEFAULT NULL,
  `serie` varchar(3) DEFAULT NULL,
  `año` int DEFAULT NULL,
  `apellido` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dni` int DEFAULT NULL,
  `cuit` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `zona` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `parcela`
--

INSERT INTO `parcela` (`codigo`, `plano`, `partida`, `propietario`, `contribuyente`, `poseedor`, `circunscripcion`, `seccion`, `chacra_num`, `quinta_let`, `fraccion_let`, `manzana_let`, `parcela_let`, `subparcela`, `partido`, `superficie`, `sup_edif`, `antecedentes`, `expediente`, `calle`, `entre1`, `entre2`, `localidad`, `num`, `piso`, `dto`, `cod_postal`, `fraccion`, `chacra`, `quinta`, `manzana`, `lote`, `med_sup`, `escribano`, `tipo`, `num_i`, `serie`, `año`, `apellido`, `dni`, `cuit`, `zona`) VALUES
(2, 25, 3, 'Jorge', 'renzo', 'pepe', 'a', 'b', 5, 'b', 'h', 'c', 'd', 0, 0, 0, 0, '', '', 'la amdrid', 'balcarce', 'la rioja', 'carlos casares', 5, 3, 4, 'b6530', '', NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, '', NULL),
(4, 1622351966, 56, 'jesus', 'Diego', '', 'a', 'b', 9, 'c', 'k', 't', 'p', 0, 0, 3, 4, '', '', 'la rioja', 'balcarce', 'junin', '', 5, 2, 0, '6530', 'iv', 1, 2, 3, 4, 3, 'fd', 'ds', 1, '2', 3, 'jesus', 4, '3213', ''),
(5, 2147483647, 16, 'Diego', 'Diego', '', 'a', 'b', 15, 'p', 'j', 'h', 'o', 0, 0, 0, 0, '', '', 'Almte. brown 215', 'La Madrid', 'Balcarce', 'carlos casares', 18, 4, 0, '6530', '', NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, '', NULL),
(6, 2147483647, 16, 'PABLO', 'DIEGO', '', 'b', 'c', 7, 'm', 'iv', 'c', 'a', 10, 55, 25, 30, '', '', 'La madrid', 'Hirigoyen', 'Balcarce', 'Carlos Casares', 45, 0, 6, '6530', 'iv', 8, 0, 0, 4, 45, 'Javier Algarra', 'Fº', 20, 'A', 2023, 'pablo', 33746627, '20-33746627-4', 'URBANA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planos_men`
--

DROP TABLE IF EXISTS `planos_men`;
CREATE TABLE IF NOT EXISTS `planos_men` (
  `numero` varchar(20) NOT NULL,
  `cod_parcela` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `planos_men`
--

INSERT INTO `planos_men` (`numero`, `cod_parcela`) VALUES
('457', 4),
('452', 4),
('451', 4),
('451', 4),
('452', 4),
('016/20/2023', 6),
('017/20/2023', 6),
('018/20/2023', 6),
('', 6),
('', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

DROP TABLE IF EXISTS `propietario`;
CREATE TABLE IF NOT EXISTS `propietario` (
  `nombre` varchar(25) NOT NULL,
  `calle` varchar(30) NOT NULL,
  `barrio` varchar(25) NOT NULL,
  `numero` int NOT NULL,
  `piso` int NOT NULL,
  `departamento` varchar(2) NOT NULL,
  `cod_postal` varchar(8) NOT NULL,
  `num_doc` int NOT NULL,
  `cod_titular` int NOT NULL,
  `correo` varchar(25) NOT NULL,
  `fax` varchar(25) NOT NULL,
  `cuit` varchar(15) NOT NULL,
  PRIMARY KEY (`num_doc`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`nombre`, `calle`, `barrio`, `numero`, `piso`, `departamento`, `cod_postal`, `num_doc`, `cod_titular`, `correo`, `fax`, `cuit`) VALUES
('JESUS', 'la rioja', 'lanuse', 331, 4, 'a', '6530', 33746627, 4, 'pablostadnik@hotmail.com', 'pablostadnik@hotmail.com', ''),
('JORGE', 'salta', 'las heras', 56, 5, 'b', '6530', 33486987, 25, 'jorge@salta.com', '25-6986987-2', ''),
('PABLO', 'larioja', 'peta', 55, 4, 'b', '6530', 45897654, 55, 'pablostadnik@hotmail.com', 'pablostadnik@hotmail.com', '20-30156984-4'),
('DIEGO', 'Asuncion', 'judios', 65, 4, 'b', '6530', 326562, 25, 'pablostadnik@hotmail.com', 'pedrito@tomas.com', '20-35408104-1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restricciones`
--

DROP TABLE IF EXISTS `restricciones`;
CREATE TABLE IF NOT EXISTS `restricciones` (
  `num_exp` varchar(20) NOT NULL,
  `comentario` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cod_parcela` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `restricciones`
--

INSERT INTO `restricciones` (`num_exp`, `comentario`, `cod_parcela`) VALUES
('123', 'sdsds', 4),
('345', 'sdsd', 4),
('123', 'sdsd', 4),
('016/20/2023', 'Plano de ordenanza 1', 6),
('017/20/2023', 'Plano de ordenanza 2', 6),
('018/20/2023', 'Plano de ordenanza 3', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(6, 'tomas@hnos.com', '$2y$10$ivYhRsmlymGfKcHbZ8lx7uwzE02TESycTxjg7qW1FzI3JqisSB4yy'),
(4, 'admin', '1'),
(8, 'tomas@hnos.com', '12345'),
(5, 'pepe', 'pepa'),
(7, 'tete@papa', 'sdsdds');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

DROP TABLE IF EXISTS `zona`;
CREATE TABLE IF NOT EXISTS `zona` (
  `area` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fos` int NOT NULL,
  `fot` int NOT NULL,
  `densidad` int NOT NULL,
  `frente_min` int NOT NULL,
  `sup_min` int NOT NULL,
  `ret_frente` int NOT NULL,
  `ret_lat` int NOT NULL,
  `alt_max` int NOT NULL,
  `e_electrica` varchar(2) NOT NULL,
  `alumbrado` varchar(2) NOT NULL,
  `agua_pot` varchar(2) NOT NULL,
  `desague_c` varchar(2) NOT NULL,
  `desague_p` varchar(2) NOT NULL,
  `gas_nat` varchar(2) NOT NULL,
  `pavimento` varchar(2) NOT NULL,
  `cordon_cun` varchar(2) NOT NULL,
  `estab` varchar(2) NOT NULL,
  `zona` int NOT NULL,
  `coef` int NOT NULL,
  `servicio` varchar(10) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `tipo_cons` varchar(10) NOT NULL,
  PRIMARY KEY (`area`),
  UNIQUE KEY `area` (`area`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`area`, `fos`, `fot`, `densidad`, `frente_min`, `sup_min`, `ret_frente`, `ret_lat`, `alt_max`, `e_electrica`, `alumbrado`, `agua_pot`, `desague_c`, `desague_p`, `gas_nat`, `pavimento`, `cordon_cun`, `estab`, `zona`, `coef`, `servicio`, `estado`, `tipo_cons`) VALUES
('NORTE', 0, 0, 0, 0, 0, 0, 0, 0, '', 'on', '', 'on', '', '', 'on', '', '', 12, 2, 'cloacas', 'normal', 'edificada'),
('OESTE', 0, 0, 0, 0, 0, 0, 0, 0, '', 'on', '', '', '', '', '', '', 'on', 1, 1, 'n', 'n', 'n'),
('URBANA', 25, 32, 45, 24, 36, 4, 6, 25, 'on', '', '', 'on', '', '', '', '', '', 24, 32, 'si', 'si', 'rural'),
('SUBURBANA', 3, 3, 3, 3, 3, 3, 3, 3, '', '', '', 'on', 'on', '', '', '', '', 3, 3, 'g', 'g', 'g'),
('SUDESTE', 52, 33, 22, 15, 10, 12, 13, 12, '', '', '', 'on', 'on', '', '', '', '', 15, 17, 'pet', 'de', 'URB');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
