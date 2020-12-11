-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2020 a las 16:47:32
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `oswa_inv`
--
CREATE DATABASE IF NOT EXISTS `oswa_inv` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `oswa_inv`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asociacion`
--

CREATE TABLE `asociacion` (
  `cod_asociacion` int(11) NOT NULL,
  `nom_asociacion` varchar(60) NOT NULL,
  `abr_asociacion` varchar(10) NOT NULL,
  `nit_asociacion` varchar(14) NOT NULL,
  `tel_asociacion` varchar(8) NOT NULL,
  `dir_asociacion` varchar(100) NOT NULL,
  `cod_departamento` int(11) NOT NULL,
  `cod_municipio` int(11) NOT NULL,
  `cel_asociacion` varchar(10) NOT NULL,
  `rep_asociacion` varchar(40) NOT NULL,
  `dui_rep_asoc` varchar(12) NOT NULL,
  `nit_rep_asoc` varchar(18) NOT NULL,
  `prof_rep_asoc` varchar(20) NOT NULL,
  `fech_nac_rep_asoc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asociacion`
--

INSERT INTO `asociacion` (`cod_asociacion`, `nom_asociacion`, `abr_asociacion`, `nit_asociacion`, `tel_asociacion`, `dir_asociacion`, `cod_departamento`, `cod_municipio`, `cel_asociacion`, `rep_asociacion`, `dui_rep_asoc`, `nit_rep_asoc`, `prof_rep_asoc`, `fech_nac_rep_asoc`) VALUES
(18, 'Asocacion Uno', 'AS1', '1111-111111-11', '1111-111', 'direccion 1', 3, 167, '1111-1111', 'representante 1', '11111111-1', '1111-111111-111-1', 'profesion 1', '2020-07-08'),
(20, 'asociacion tres', 'asoc3', '3333-333333-33', '3333-333', 'direccion3', 10, 128, '3333-3333', 'representante 3', '44444444-4', '4444-444444-444-4', 'Licenciado', '2006-01-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'Clientes'),
(1, 'Repuestos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_linestring`
--

CREATE TABLE `data_linestring` (
  `gid` int(3) NOT NULL,
  `notes` char(50) COLLATE utf8_spanish_ci NOT NULL,
  `geom` linestring NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `data_linestring`
--

INSERT INTO `data_linestring` (`gid`, `notes`, `geom`) VALUES
(10, 'TUBERIALOLO1', 0xe61000000102000000060000006e4e2503401656c0c16f438cd71c2b4052d158fb3b1656c0cdafe600c11c2b404e7cb5a3381656c03f575bb1bf1c2b403fc7478b331656c0cdafe600c11c2b40be840a0e2f1656c089f02f82c61c2b402ba391cf2b1656c09fe40e9bc81c2b40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_point`
--

CREATE TABLE `data_point` (
  `gid` int(3) NOT NULL,
  `notes` char(50) COLLATE utf8_spanish_ci NOT NULL,
  `geom` point NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `data_point`
--

INSERT INTO `data_point` (`gid`, `notes`, `geom`) VALUES
(6, 'DISTRIBUIDORA1', 0xe6100000010100000073d712f2411656c07db08c0ddd1c2b40),
(7, 'MUNICIPIO DE LOLOTIQUE', 0xe610000001010000005e10919a761656c06490bb08531c2b40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_polygon`
--

CREATE TABLE `data_polygon` (
  `gid` int(3) NOT NULL,
  `notes` char(50) COLLATE utf8_spanish_ci NOT NULL,
  `geom` polygon NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `data_polygon`
--

INSERT INTO `data_polygon` (`gid`, `notes`, `geom`) VALUES
(4, 'CEMENTERIO LOLOTIQUE', 0xe61000000103000000010000001800000073672618ce1656c0209738f2401c2b409cdd5a26c31656c07349d576131c2b40e38920cec31656c0ff40b96ddf1b2b4083161230ba1656c05aba826dc41b2b408faa2688ba1656c093a8177c9a1b2b40001e51a1ba1656c0990e9d9e771b2b4016dee522be1656c0ddcd531d721b2b4095d233bdc41656c02a5437177f1b2b40ed815660c81656c0e6948098841b2b40f793313ecc1656c0e9818fc18a1b2b40ef54c03dcf1656c01c2785798f1b2b40f4ddad2cd11656c0490f43ab931b2b40be4eeacbd21656c066c0594a961b2b403a22dfa5d41656c0b8e68efe971b2b40cd1dfd2fd71656c0168733bf9a1b2b40d87dc7f0d81656c09f2287889b1b2b4013622ea9da1656c07427d87f9d1b2b408f1b7e37dd1656c0446ff1f09e1b2b40e71890bdde1656c0969526a5a01b2b40e0f3c308e11656c06b9a779ca21b2b4021af0793e21656c0828e56b5a41b2b406f66f4a3e11656c0c687d9cbb61b2b40e71890bdde1656c02c634337fb1b2b4073672618ce1656c0209738f2401c2b40),
(5, 'CEMENTERIO 2 LOLOTIQUE', 0xe6100000010300000001000000100000002cefaa07cc1656c040683d7c99102b401d2098a3c71656c00a2debfeb1102b401897aab4c51656c068cd8fbfb4102b401590f63fc01656c0da740470b3102b400038f6ecb91656c068cd8fbfb4102b40ed2de57cb11656c03815a930b6102b40ecf99ae5b21656c0f46dc1525d102b400d1afa27b81656c0520e661360102b40116f9d7fbb1656c0f46dc1525d102b4009168733bf1656c0aad4ec8156102b401fd61bb5c21656c0a4face2f4a102b4023f77475c71656c09f20b1dd3d102b4028806264c91656c08b19e1ed41102b4032c687d9cb1656c082c64ca25e102b402cd505bccc1656c0eb1a2d077a102b402cefaa07cc1656c040683d7c99102b40),
(6, 'LOTE1 LOLOTIQUE', 0xe610000001030000000100000005000000f86d88f19a1656c0cceb884336102b40aeba0ed5941656c08065a54929102b407288b839951656c036583849f30f2b40b66455849b1656c0897e6dfdf40f2b40f86d88f19a1656c0cceb884336102b40),
(7, 'CONUNICA1', 0xe610000001030000000100000006000000ed116a86540b56c02907b30930f42a40a565a4de530b56c092e7fa3e1cf42a40b2135e82530b56c06d8c9df012f42a407a1c06f3570b56c0c652245f09f42a4044a7e7dd580b56c081cd397826f42a40ed116a86540b56c02907b30930f42a40),
(8, 'CONUNICA2', 0xe610000001030000000100000007000000f1660dde570b56c08a20cec309f42a4033a48ae2550b56c07619fed30df42a403961c268560b56c0373465a71ff42a40700a2b15540b56c02fa704c424f42a40a54bff92540b56c02907b30930f42a40732b84d5580b56c0c879ff1f27f42a40f1660dde570b56c08a20cec309f42a40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_cliente`
--

CREATE TABLE `inv_cliente` (
  `cod_cliente` int(5) NOT NULL,
  `num_cuenta` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_crea` date NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_naci` date NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cod_municipio` int(3) NOT NULL,
  `cod_departamento` int(2) NOT NULL,
  `sexo` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `dui` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `celular` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nit` varchar(18) COLLATE utf8_spanish_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `num_medidor` int(5) NOT NULL,
  `lectura_ini` int(5) NOT NULL,
  `estado` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `latitud` decimal(10,6) NOT NULL DEFAULT 0.000000,
  `longitud` decimal(10,6) NOT NULL DEFAULT 0.000000,
  `altura` decimal(10,1) NOT NULL DEFAULT 0.0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inv_cliente`
--

INSERT INTO `inv_cliente` (`cod_cliente`, `num_cuenta`, `fecha_crea`, `nombre`, `apellido`, `fecha_naci`, `direccion`, `cod_municipio`, `cod_departamento`, `sexo`, `dui`, `telefono`, `celular`, `nit`, `mail`, `num_medidor`, `lectura_ini`, `estado`, `latitud`, `longitud`, `altura`) VALUES
(162, '123', '2020-06-16', 'Fabiola Cristina', 'Cano Quezada', '1964-04-09', 'CantÃ³n El brazo No. 34', 1, 1, '1', '25455255-5', '0', '6425-8455', '1245-090494-254-2', '0', 1, 0, '1', '0.000000', '0.000000', '0.0'),
(163, '1234', '2020-06-16', 'Samuel Alejandro', 'Cano', '1964-02-22', 'CantÃ³n El brazo No. 34', 1, 1, '2', '02699386-5', '0', '6125-4325', '1225-220264-254-5', '0', 2, 0, '1', '0.000000', '0.000000', '0.0'),
(165, '321', '2020-06-19', 'Samuel Alejandro ', 'Cano Quezada', '1993-03-10', 'CantÃ³n El brazo No. 34', 1, 1, '2', '04788318-0', '0', '7758-4522', '1217-100393-109-3', 'playciclista@hotmail.com', 3, 0, '1', '13.331158', '-88.165834', '49.0'),
(166, '2312', '2020-06-19', 'Fabiola Cristina', 'Cano Quezada', '1992-04-03', 'CantÃ³n El brazo No. 34', 1, 1, '1', '04607073-4', '0', '7576-4997', '1217-040492-101-9', 'borenocrystal@hotmail.com', 4, 0, '1', '0.000000', '0.000000', '0.0'),
(167, '3685', '2020-06-19', 'Rhina Alexandra', 'Cano Quezada', '1987-09-27', 'CantÃ³n El brazo No. 36', 1, 1, '1', '03799349-6', '0', '6147-5874', '1217-270987-109-0', '0', 5, 0, '2', '13.331196', '-88.166172', '45.0'),
(168, '34355', '2020-10-08', 'Daniela Cristina ', 'Abrego Sorto', '2020-10-08', 'Lotificación prados, pasaje 2 # 3', 1, 1, '1', '26254825-5', '0', '6147-4848', '0121-254522-655-5', '0', 878787, 0, '2', '0.000000', '0.000000', '0.0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_departamento`
--

CREATE TABLE `inv_departamento` (
  `cod_departamento` int(3) NOT NULL,
  `departamento` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inv_departamento`
--

INSERT INTO `inv_departamento` (`cod_departamento`, `departamento`) VALUES
(1, 'San Miguel'),
(2, 'Usulutan'),
(3, 'La Union'),
(4, 'Morazan'),
(5, 'San Vicente'),
(6, 'Cuscatlan'),
(7, 'La Paz'),
(8, 'Cabañas'),
(9, 'San Salvador'),
(10, 'La Libertad'),
(11, 'Sonsonate'),
(12, 'Ahuachapan'),
(13, 'Chalatenango'),
(14, 'Santa Ana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_desconexion`
--

CREATE TABLE `inv_desconexion` (
  `cod_orden_desco` int(5) NOT NULL,
  `cod_cuenta` int(5) NOT NULL,
  `fecha_orden` date NOT NULL,
  `motivo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_ejecucion` date NOT NULL,
  `ejecutada` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `observacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inv_desconexion`
--

INSERT INTO `inv_desconexion` (`cod_orden_desco`, `cod_cuenta`, `fecha_orden`, `motivo`, `fecha_ejecucion`, `ejecutada`, `observacion`) VALUES
(1, 1, '2014-09-07', '', '0000-00-00', 'NO', 'NO Ejecutada'),
(2, 2, '2014-09-07', '', '2014-09-07', 'SI', 'Orden Ejecutada'),
(3, 22, '2020-05-13', 'AcumulaciÃ³n de Mora', '0000-00-00', 'NO', 'NO Ejecutada'),
(4, 16, '2020-05-13', 'Solicitud de Cliente', '0000-00-00', 'NO', 'NO Ejecutada'),
(16, 321, '2020-07-24', 'Solicitud de Cliente', '2020-07-24', 'SI', 'Venta de inmueble'),
(14, 123, '2020-07-24', 'AcumulaciÃ³n de Mora', '2020-07-24', 'SI', 'Mora');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_manttoval`
--

CREATE TABLE `inv_manttoval` (
  `id` int(4) NOT NULL,
  `num_inventario` int(12) NOT NULL,
  `fecha_mantto` date NOT NULL,
  `ejecutado` varchar(2) NOT NULL,
  `observaciones` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inv_manttoval`
--

INSERT INTO `inv_manttoval` (`id`, `num_inventario`, `fecha_mantto`, `ejecutado`, `observaciones`) VALUES
(1, 111, '2020-09-26', 'SI', 'Ejecutado reemplazando la vÃ¡lvula '),
(7, 112, '2020-09-26', 'SI', 'Se efectuÃ³ el mantenimiento '),
(8, 112, '2020-09-26', 'SI', 'Se realizo el mantenimiento '),
(9, 112, '2020-09-30', 'SI', 'Se efectuÃ³ el mantenimiento '),
(10, 111, '2020-09-26', 'SI', 'Se realizo el mantenimiento en el cantÃ³n '),
(11, 114, '2020-09-30', 'SI', 'Se efectuÃ³ el mantenimiento ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_medidor`
--

CREATE TABLE `inv_medidor` (
  `cod_medidor` int(5) NOT NULL,
  `numero` int(10) NOT NULL,
  `fecha_crea` date NOT NULL,
  `cod_marca` int(3) NOT NULL,
  `serie` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `asignado` varchar(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inv_medidor`
--

INSERT INTO `inv_medidor` (`cod_medidor`, `numero`, `fecha_crea`, `cod_marca`, `serie`, `estado`, `asignado`) VALUES
(1, 45678, '0000-00-00', 2, '5tttt', 'Nuevo', 'SI'),
(2, 656565, '0000-00-00', 2, '5xxx', 'Nuevo', 'SI'),
(4, 878787, '0000-00-00', 6, '9xxxx', 'Nuevo', 'SI'),
(6, 666666, '0000-00-00', 1, '66666', 'Nuevo', 'NO'),
(7, 545454, '0000-00-00', 3, '4xxx', 'Usado', 'NO'),
(9, 44444, '0000-00-00', 4, '4g4g', 'Nuevo', 'NO'),
(10, 66666, '0000-00-00', 1, 'h4h4h4', 'Nuevo', 'NO'),
(115, 1, '0000-00-00', 2, 'as2', 'Nuevo', 'SI'),
(116, 2, '0000-00-00', 2, 'as2', 'Nuevo', 'SI'),
(117, 3, '0000-00-00', 2, 'as2', 'Nuevo', 'SI'),
(118, 4, '0000-00-00', 2, 'as2', 'Nuevo', 'SI'),
(119, 5, '0000-00-00', 2, 'as2', 'Nuevo', 'SI'),
(120, 6, '0000-00-00', 2, 'as2', 'Nuevo', 'NO'),
(121, 7, '0000-00-00', 2, 'as2', 'Nuevo', 'NO'),
(122, 8, '0000-00-00', 2, 'as2', 'Nuevo', 'NO'),
(123, 9, '0000-00-00', 2, 'as2', 'Nuevo', 'NO'),
(124, 10, '0000-00-00', 2, 'as2', 'Nuevo', 'NO'),
(125, 11, '0000-00-00', 2, 'as2', 'Nuevo', 'NO'),
(126, 12, '0000-00-00', 2, 'as2', 'Nuevo', 'NO'),
(127, 13, '0000-00-00', 2, 'as2', 'Nuevo', 'NO'),
(128, 14, '0000-00-00', 2, 'as2', 'Nuevo', 'NO'),
(129, 15, '0000-00-00', 2, 'as2', 'Nuevo', 'NO'),
(130, 16, '0000-00-00', 2, 'as2', 'Nuevo', 'NO'),
(131, 17, '0000-00-00', 2, 'as2', 'Nuevo', 'NO'),
(132, 18, '0000-00-00', 2, 'as2', 'Nuevo', 'NO'),
(133, 19, '0000-00-00', 2, 'as2', 'Nuevo', 'NO'),
(134, 20, '0000-00-00', 2, 'as2', 'Nuevo', 'NO'),
(137, 2222, '2020-06-17', 4, '343488', 'Usado', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_municipio`
--

CREATE TABLE `inv_municipio` (
  `cod_municipio` int(3) NOT NULL,
  `cod_departamento` int(3) NOT NULL,
  `municipio` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inv_municipio`
--

INSERT INTO `inv_municipio` (`cod_municipio`, `cod_departamento`, `municipio`) VALUES
(1, 1, 'San Miguel'),
(2, 1, 'Quelepa'),
(3, 1, 'San Luis de la Reina'),
(4, 1, 'Moncagua'),
(5, 1, 'Sesori'),
(6, 1, 'Chirilagua'),
(7, 1, 'Nueva Guadalupe'),
(8, 1, 'Chinameca'),
(10, 1, 'Chapeltique'),
(11, 1, 'Ciudad Barrios'),
(12, 1, 'Comacarán'),
(13, 1, 'El Tránsito'),
(14, 1, 'Lolotique'),
(15, 1, 'Nuevo Edén de San Juan'),
(16, 1, 'San Antonio del Mosco'),
(17, 1, 'San Gerardo'),
(18, 1, 'San Jorge'),
(19, 1, 'San Rafael Oriente'),
(20, 1, 'Uluazapa'),
(21, 12, 'Ahuachapán'),
(22, 12, 'Apaneca'),
(23, 12, 'Atiquizaya'),
(24, 12, 'Concepción de Ataco'),
(25, 12, 'El Refugio'),
(26, 12, 'Guaymango'),
(27, 12, 'Jujutla'),
(28, 12, 'San Francisco Menéndez'),
(29, 12, 'San Lorenzo'),
(30, 12, 'San Pedro Puxtla'),
(31, 12, 'Tacuba'),
(32, 12, 'Turín'),
(33, 8, 'Ilobasco'),
(34, 8, 'Cinquera'),
(35, 8, 'Villa Dolores'),
(36, 8, 'Guacotecti'),
(37, 8, 'Jutiapa'),
(38, 8, 'San Isidro'),
(39, 8, 'Sensuntepeque'),
(40, 8, 'Tejutepeque'),
(41, 8, 'Victoria'),
(42, 13, 'Agua Caliente'),
(43, 13, 'Arcatao'),
(44, 13, 'Azacualpa'),
(45, 13, 'Chalatenango'),
(46, 13, 'Citalá'),
(47, 13, 'Comalapa'),
(48, 13, 'Concepción Quezaltepeque'),
(49, 13, 'Dulce Nombre de María'),
(50, 13, 'El Carrizal'),
(51, 13, 'El Paraíso'),
(52, 13, 'La Laguna'),
(53, 13, 'La Palma'),
(54, 13, 'La Reina'),
(55, 13, 'Las Vueltas'),
(56, 13, 'Nombre de Jesús'),
(57, 13, 'Nueva Concepción'),
(58, 13, 'Nueva Trinidad'),
(59, 13, 'Ojos de Agua'),
(60, 13, 'Potonico'),
(61, 13, 'San Antonio de la Cruz'),
(62, 13, 'San Antonio Los Ranchos'),
(63, 13, 'San Fernando'),
(64, 13, 'San Francisco Lempa'),
(65, 13, 'San Francisco Morazán'),
(66, 13, 'San Ignacio'),
(67, 13, 'San Isidro Labrador'),
(68, 13, 'San José Cancasque / Cancasque'),
(69, 13, 'San José Las Flores / Las Flor'),
(70, 13, 'San Luis del Carmen'),
(71, 13, 'San Miguel de Mercedes'),
(72, 13, 'San Rafael'),
(73, 13, 'Santa Rita'),
(74, 13, 'Tejutla'),
(75, 6, 'Candelaria'),
(76, 6, 'Cojutepeque'),
(77, 6, 'El Carmen'),
(78, 6, 'El Rosario'),
(79, 6, 'Monte San Juan'),
(80, 6, 'Oratorio de Concepción'),
(81, 6, 'San Bartolomé Perulapía'),
(82, 6, 'San Cristóbal'),
(83, 6, 'San José Guayabal'),
(84, 6, 'San Pedro Perulapán'),
(85, 6, 'San Rafael Cedros'),
(88, 6, 'San Ramón'),
(89, 6, 'Santa Cruz Analquito'),
(90, 6, 'Santa Cruz Michapa'),
(91, 6, 'Suchitoto'),
(92, 6, 'Tenancingo'),
(93, 4, 'Arambala'),
(94, 4, 'Cacaopera'),
(95, 4, 'Chilanga'),
(96, 4, 'Corinto'),
(97, 4, 'Delicias de Concepción'),
(98, 4, 'El Divisadero'),
(99, 4, 'El Rosario'),
(100, 4, 'Gualococti'),
(101, 4, 'Guatajiagua'),
(102, 4, 'Joateca'),
(103, 4, 'Jocoaitique'),
(104, 4, 'Jocoro'),
(105, 4, 'Lolotiquillo'),
(106, 4, 'Meanguera'),
(107, 4, 'Osicala'),
(108, 4, 'Perquín'),
(109, 4, 'San Carlos'),
(110, 4, 'San Fernando'),
(111, 4, 'San Francisco Gotera'),
(112, 4, 'San Isidro'),
(113, 4, 'San Simón'),
(114, 4, 'Sensembra'),
(115, 4, 'Sociedad'),
(116, 4, 'Torola'),
(117, 4, 'Yamabal'),
(118, 4, 'Yoloaiquín'),
(119, 10, 'Antiguo Cuscatlán'),
(120, 10, 'Chiltiupán'),
(121, 10, 'Ciudad Arce'),
(122, 10, 'Colón'),
(123, 10, 'Comasagua'),
(124, 10, 'Huizúcar'),
(125, 10, 'Jayaque'),
(126, 10, 'Jicalapa'),
(127, 10, 'La Libertad'),
(128, 10, 'Santa Tecla'),
(129, 10, 'Nuevo Cuscatlán'),
(130, 10, 'San Juan Opico'),
(131, 10, 'Quezaltepeque'),
(132, 10, 'Sacacoyo'),
(133, 10, 'San José Villanueva'),
(134, 10, 'San Matías'),
(135, 10, 'San Pablo Tacachico'),
(136, 10, 'Talnique'),
(137, 10, 'Tamanique'),
(138, 10, 'Teotepeque'),
(139, 10, 'Tepecoyo'),
(140, 10, 'Zaragoza'),
(141, 7, 'Cuyultitán'),
(142, 7, 'El Rosario'),
(143, 7, 'Jerusalén'),
(144, 7, 'Mercedes La Ceiba'),
(145, 7, 'Olocuilta'),
(146, 7, 'Paraíso de Osorio'),
(147, 7, 'San Antonio Masahuat'),
(148, 7, 'San Emigdio'),
(149, 7, 'San Francisco Chinameca'),
(150, 7, 'San Juan Nonualco'),
(151, 7, 'San Juan Talpa'),
(152, 7, 'San Juan Tepezontes'),
(153, 7, 'San Luis La Herradura'),
(154, 7, 'San Luis Talpa'),
(155, 7, 'San Miguel Tepezontes'),
(156, 7, 'San Pedro Masahuat'),
(157, 7, 'San Pedro Nonualco'),
(158, 7, 'San Rafael Obrajuelo'),
(159, 7, 'Santa María Ostuma'),
(160, 7, 'Santiago Nonualco'),
(161, 7, 'Tapalhuaca'),
(162, 7, 'Zacatecoluca'),
(163, 3, 'La Unión'),
(164, 3, 'Anamorós'),
(165, 3, 'Bolívar'),
(166, 3, 'Concepción de Oriente'),
(167, 3, 'Conchagua'),
(168, 3, 'El Carmen'),
(169, 3, 'El Sauce'),
(170, 3, 'Intipucá'),
(171, 3, 'Lilisque'),
(172, 3, 'Meanguera del Golfo'),
(173, 3, 'Nueva Esparta'),
(174, 3, 'Pasaquina'),
(175, 3, 'Polorós'),
(176, 3, 'San Alejo'),
(177, 3, 'San José'),
(178, 3, 'Santa Rosa de Lima'),
(179, 3, 'Yayantique'),
(180, 3, 'Yucuaiquín'),
(181, 9, 'San Salvador'),
(182, 9, 'Aguilares'),
(183, 9, 'Apopa'),
(184, 9, 'Ayutuxtepeque'),
(185, 9, 'Delgado'),
(186, 9, 'Cuscatancingo'),
(187, 9, 'El Paisnal'),
(188, 9, 'Guazapa'),
(189, 9, 'Ilopango'),
(190, 9, 'Mejicanos'),
(191, 9, 'Nejapa'),
(192, 9, 'Panchimalco'),
(193, 9, 'Rosario de Mora'),
(194, 9, 'San Marcos'),
(195, 9, 'San Martín'),
(196, 9, 'Santiago Texacuangos'),
(197, 9, 'Santo Tomás'),
(198, 9, 'Soyapango'),
(199, 9, 'Tonacatepeque'),
(200, 5, 'San Vicente'),
(210, 5, 'Tecoluca'),
(211, 5, 'Tepetitán'),
(212, 5, 'Verapaz'),
(213, 14, 'Candelaria de la Frontera'),
(214, 14, 'Chalchuapa'),
(215, 14, 'Coatepeque'),
(216, 14, 'El Congo'),
(217, 14, 'El Porvenir'),
(218, 14, 'Masahuat'),
(219, 14, 'Metapán'),
(220, 14, 'San Antonio Pajonal'),
(221, 14, 'San Sebastián Salitrillo'),
(222, 14, 'Santa Rosa Guachipilín'),
(223, 14, 'Santiago de la Frontera'),
(224, 14, 'Texistepeque'),
(225, 14, 'Santa Ana'),
(226, 11, 'Sonsonate'),
(227, 11, 'Acajutla'),
(228, 11, 'Armenia'),
(229, 11, 'Caluco'),
(230, 11, 'Cuisnahuat'),
(231, 11, 'Izalco'),
(232, 11, 'Juayúa'),
(233, 11, 'Nahuizalco'),
(234, 11, 'Nahulingo'),
(235, 11, 'Salcoatitán'),
(236, 11, 'San Antonio del Monte'),
(237, 11, 'San Julián'),
(238, 11, 'Santa Catarina Masahuat'),
(239, 11, 'Santa Isabel Ishuatán'),
(240, 11, 'Santo Domingo de Guzmán'),
(241, 11, 'Sonzacate'),
(242, 2, 'Alegría'),
(243, 2, 'Berlín'),
(244, 2, 'California'),
(245, 2, 'Concepción Batres'),
(246, 2, 'El Triunfo'),
(247, 2, 'Ereguayquín'),
(248, 2, 'Estanzuelas'),
(249, 2, 'Jiquilisco'),
(250, 2, 'Jucuapa'),
(251, 5, 'Apastepeque'),
(252, 5, 'Guadalupe'),
(253, 5, 'San Cayetano Istepeque'),
(254, 5, 'San Esteban Catarina'),
(255, 5, 'San Ildefonso'),
(256, 5, 'San Lorenzo'),
(257, 5, 'San Sebastián'),
(258, 5, 'Santa Clara'),
(259, 5, 'Santo Domingo'),
(260, 1, 'Carolina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_reclamo`
--

CREATE TABLE `inv_reclamo` (
  `cod_reclamo` int(6) NOT NULL,
  `num_cuenta` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_rec` date NOT NULL,
  `nombres_rec` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos_rec` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `motivo_rec` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `detalle_rec` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `solucion_rec` varchar(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inv_reclamo`
--

INSERT INTO `inv_reclamo` (`cod_reclamo`, `num_cuenta`, `fecha_rec`, `nombres_rec`, `apellidos_rec`, `motivo_rec`, `detalle_rec`, `solucion_rec`) VALUES
(9, '1234', '2020-06-19', 'Samuel', 'Cano', 'Factura atrazada', 'fdsdfs', 'SI'),
(10, '123', '2020-06-19', 'Fabiola Cristina', 'Cano Quezada', 'Quejas', 'El servicio es irregular ', 'NO'),
(11, '3685', '2020-06-19', 'Rhina Alexandra', 'Cano Quezada', 'Robos', 'Urgente: en la noche le robaron el contador.', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_reconexion`
--

CREATE TABLE `inv_reconexion` (
  `cod_orden_recon` int(5) NOT NULL,
  `cod_cuenta` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_orden` date NOT NULL,
  `fecha_ejecucion` date DEFAULT NULL,
  `ejecutada` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `observacion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inv_reconexion`
--

INSERT INTO `inv_reconexion` (`cod_orden_recon`, `cod_cuenta`, `fecha_orden`, `fecha_ejecucion`, `ejecutada`, `observacion`) VALUES
(1, '1', '2014-09-07', '0000-00-00', 'NO', 'NO Ejecutada'),
(2, '2', '2014-09-07', '2014-09-07', 'SI', 'Orden Ejecutada'),
(3, '2', '2020-05-13', '2020-05-13', 'SI', 'Sin novedad'),
(4, '3685', '2020-09-24', '2020-09-24', 'SI', 'reco 1525');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_servicio`
--

CREATE TABLE `inv_servicio` (
  `cod_servicio` int(5) UNSIGNED ZEROFILL NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `costo` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inv_servicio`
--

INSERT INTO `inv_servicio` (`cod_servicio`, `nombre`, `costo`) VALUES
(00001, 'Servicio de Agua', '7.05'),
(00002, 'Pago de Acometida', '60.00'),
(00003, 'Alcantarillado', '2.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_tarifa`
--

CREATE TABLE `inv_tarifa` (
  `cod_tarifa` int(2) NOT NULL,
  `nivel` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `inicio` int(3) NOT NULL,
  `final` int(3) NOT NULL,
  `precio` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inv_tarifa`
--

INSERT INTO `inv_tarifa` (`cod_tarifa`, `nivel`, `inicio`, `final`, `precio`) VALUES
(1, 'Bajo', 0, 12, '7.30'),
(2, 'Medio', 13, 24, '10.00'),
(3, 'Alto', 25, 1000000, '15.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_tiposval`
--

CREATE TABLE `inv_tiposval` (
  `id` int(4) NOT NULL,
  `tipo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inv_tiposval`
--

INSERT INTO `inv_tiposval` (`id`, `tipo`) VALUES
(1, 'Válvulas swing-check, cuerpo de Ho. Fo.'),
(2, 'Válvulas de compuerta de asiento elástico, AWWA C-509 '),
(3, 'Válvulas de compuerta de asiento elástico, AWWA 515'),
(4, 'Válvulas de compuerta de hierro fundido montadas en bronce doble disco.'),
(5, 'Válvulas de compuerta de hierro fundido montadas en bronce disco sólido.'),
(6, 'vástago no ascendente: AWWA C-500'),
(7, 'válvulas de compuerta Ho. Fo.'),
(8, 'Válvula ANSI B16.1 clase 125'),
(9, 'Válvula ANSI B16.1 clase 250'),
(10, 'Válvula reguladora de presión'),
(11, 'Válvula de retención'),
(12, 'Válvula anti-golpe de ariete'),
(13, 'Válvulas de ventosas'),
(14, 'Válvula de mariposa.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_tuberias`
--

CREATE TABLE `inv_tuberias` (
  `cod_tuberia` int(5) NOT NULL,
  `cod_material` int(3) NOT NULL,
  `cod_jerarquia` int(3) NOT NULL,
  `diametro_nominal` decimal(4,2) NOT NULL,
  `presion_nominal` decimal(5,1) NOT NULL,
  `longitud_tub` decimal(4,2) NOT NULL,
  `estado` int(3) NOT NULL,
  `longitud_ini` decimal(8,6) NOT NULL,
  `latitud_ini` decimal(8,6) NOT NULL,
  `longitud_fin` decimal(8,6) NOT NULL,
  `latitud_fin` decimal(8,6) NOT NULL,
  `altura` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inv_tuberias`
--

INSERT INTO `inv_tuberias` (`cod_tuberia`, `cod_material`, `cod_jerarquia`, `diametro_nominal`, `presion_nominal`, `longitud_tub`, `estado`, `longitud_ini`, `latitud_ini`, `longitud_fin`, `latitud_fin`, `altura`) VALUES
(2, 1, 1, '1.00', '2.3', '3.00', 2, '-88.000000', '13.000000', '-88.000000', '13.000000', 3),
(10, 9, 21, '0.40', '0.5', '0.00', 1, '-88.000000', '13.000000', '-88.000000', '13.000000', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_valvula`
--

CREATE TABLE `inv_valvula` (
  `cod_valvula` int(5) NOT NULL,
  `num_inventario` varchar(12) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `tipo` varchar(150) NOT NULL,
  `instalacion` date NOT NULL,
  `estado` varchar(15) NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `mantenimiento` date NOT NULL,
  `latitud` decimal(10,6) DEFAULT NULL,
  `longitud` decimal(10,6) DEFAULT NULL,
  `altura` decimal(10,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inv_valvula`
--

INSERT INTO `inv_valvula` (`cod_valvula`, `num_inventario`, `marca`, `tipo`, `instalacion`, `estado`, `lugar`, `mantenimiento`, `latitud`, `longitud`, `altura`) VALUES
(1, '111', 'PRAHER', 'Vï¿½lvulas swing-check, cuerpo de Ho. Fo.', '2020-06-26', 'nuevo', 'cantÃ³n uno', '2020-12-26', NULL, NULL, NULL),
(2, '112', 'PRAHER', 'Vï¿½lvulas de compuerta de asiento elï¿½stico, AWWA C-509', '2020-06-26', 'nuevo', 'cantÃ³n dos', '2020-12-30', NULL, NULL, NULL),
(3, '113', 'PRAHER', 'Vï¿½lvulas de compuerta de hierro fundido montadas en bronce doble disco. ', '2020-06-26', 'nuevo', 'cantÃ³n tres', '2020-09-26', NULL, NULL, NULL),
(4, '1114', 'PRAHER', 'Vï¿½lvula ANSI B16.1 clase 125 ', '2020-06-28', 'Nueva', 'CantÃ³n cuatro ', '2020-09-30', NULL, NULL, NULL),
(5, '114', 'GEMU', 'Vï¿½lvula ANSI B16.1 clase 250', '2020-06-30', 'Nueva', 'CantÃ³n cinco', '2020-12-30', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jerarquia_tuberia`
--

CREATE TABLE `jerarquia_tuberia` (
  `cod_jerarquia` int(11) NOT NULL,
  `jerarquia` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jerarquia_tuberia`
--

INSERT INTO `jerarquia_tuberia` (`cod_jerarquia`, `jerarquia`) VALUES
(1, 'Red en alta'),
(21, 'jerarquia 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mat_tuberia`
--

CREATE TABLE `mat_tuberia` (
  `cod_material` int(11) NOT NULL,
  `material` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mat_tuberia`
--

INSERT INTO `mat_tuberia` (`cod_material`, `material`) VALUES
(1, 'PVC'),
(9, 'material 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media`
--

CREATE TABLE `media` (
  `id` int(11) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `media`
--

INSERT INTO `media` (`id`, `file_name`, `file_type`) VALUES
(1, 'filter.jpg', 'image/jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `buy_price` decimal(25,2) DEFAULT NULL,
  `sale_price` decimal(25,2) NOT NULL,
  `categorie_id` int(11) UNSIGNED NOT NULL,
  `media_id` int(11) DEFAULT 0,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `buy_price`, `sale_price`, `categorie_id`, `media_id`, `date`) VALUES
(1, 'Filtro de gasolina', '100', '5.00', '10.00', 1, 1, '2017-06-16 07:03:16'),
(2, 'Cuenta', '1', '1.00', '2.00', 2, 0, '2020-05-26 02:35:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ptos`
--

CREATE TABLE `ptos` (
  `puntos` geometry NOT NULL,
  `lugar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ptos`
--

INSERT INTO `ptos` (`puntos`, `lugar`) VALUES
(0x000000000101000000cd21a98592a92a40b360e28fa20a56c0, 'la canoa lote 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`) VALUES
(1, 'Admin Users', 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'hhskvuf1.jpg', 1, '2020-10-09 14:51:46'),
(2, 'Special User', 'special', 'ba36b97a41e7faf742ab09bf88405ac04f99599a', 2, 'special002.jpg', 1, '2020-06-20 02:01:51'),
(3, 'Default User', 'user', '12dea96fec20593566ab75692c9949596833adc9', 3, 'user001.jpg', 1, '2020-06-20 02:02:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
(1, 'Admin', 1, 1),
(2, 'Special', 2, 1),
(3, 'User', 3, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asociacion`
--
ALTER TABLE `asociacion`
  ADD PRIMARY KEY (`cod_asociacion`),
  ADD KEY `cod_municipio` (`cod_municipio`),
  ADD KEY `cod_departamento` (`cod_departamento`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `data_linestring`
--
ALTER TABLE `data_linestring`
  ADD PRIMARY KEY (`gid`);

--
-- Indices de la tabla `data_point`
--
ALTER TABLE `data_point`
  ADD PRIMARY KEY (`gid`);

--
-- Indices de la tabla `data_polygon`
--
ALTER TABLE `data_polygon`
  ADD PRIMARY KEY (`gid`);

--
-- Indices de la tabla `inv_cliente`
--
ALTER TABLE `inv_cliente`
  ADD PRIMARY KEY (`cod_cliente`),
  ADD KEY `cod_municipio` (`cod_municipio`),
  ADD KEY `cod_departamento` (`cod_departamento`);

--
-- Indices de la tabla `inv_departamento`
--
ALTER TABLE `inv_departamento`
  ADD PRIMARY KEY (`cod_departamento`);

--
-- Indices de la tabla `inv_desconexion`
--
ALTER TABLE `inv_desconexion`
  ADD PRIMARY KEY (`cod_orden_desco`),
  ADD KEY `cod_cuenta` (`cod_cuenta`);

--
-- Indices de la tabla `inv_manttoval`
--
ALTER TABLE `inv_manttoval`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inv_medidor`
--
ALTER TABLE `inv_medidor`
  ADD PRIMARY KEY (`cod_medidor`),
  ADD UNIQUE KEY `numero` (`numero`),
  ADD KEY `cod_marca` (`cod_marca`);

--
-- Indices de la tabla `inv_municipio`
--
ALTER TABLE `inv_municipio`
  ADD PRIMARY KEY (`cod_municipio`),
  ADD KEY `cod_departamento` (`cod_departamento`);

--
-- Indices de la tabla `inv_reclamo`
--
ALTER TABLE `inv_reclamo`
  ADD PRIMARY KEY (`cod_reclamo`),
  ADD KEY `cod_cliente` (`num_cuenta`);

--
-- Indices de la tabla `inv_reconexion`
--
ALTER TABLE `inv_reconexion`
  ADD PRIMARY KEY (`cod_orden_recon`),
  ADD KEY `cod_cuenta` (`cod_cuenta`);

--
-- Indices de la tabla `inv_servicio`
--
ALTER TABLE `inv_servicio`
  ADD PRIMARY KEY (`cod_servicio`);

--
-- Indices de la tabla `inv_tarifa`
--
ALTER TABLE `inv_tarifa`
  ADD PRIMARY KEY (`cod_tarifa`);

--
-- Indices de la tabla `inv_tiposval`
--
ALTER TABLE `inv_tiposval`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inv_tuberias`
--
ALTER TABLE `inv_tuberias`
  ADD PRIMARY KEY (`cod_tuberia`),
  ADD KEY `cod_material` (`cod_material`),
  ADD KEY `cod_jerarquia` (`cod_jerarquia`);

--
-- Indices de la tabla `inv_valvula`
--
ALTER TABLE `inv_valvula`
  ADD PRIMARY KEY (`cod_valvula`);

--
-- Indices de la tabla `jerarquia_tuberia`
--
ALTER TABLE `jerarquia_tuberia`
  ADD PRIMARY KEY (`cod_jerarquia`);

--
-- Indices de la tabla `mat_tuberia`
--
ALTER TABLE `mat_tuberia`
  ADD PRIMARY KEY (`cod_material`);

--
-- Indices de la tabla `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `categorie_id` (`categorie_id`),
  ADD KEY `media_id` (`media_id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `user_level` (`user_level`);

--
-- Indices de la tabla `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_level` (`group_level`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asociacion`
--
ALTER TABLE `asociacion`
  MODIFY `cod_asociacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `data_linestring`
--
ALTER TABLE `data_linestring`
  MODIFY `gid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `data_point`
--
ALTER TABLE `data_point`
  MODIFY `gid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `data_polygon`
--
ALTER TABLE `data_polygon`
  MODIFY `gid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `inv_cliente`
--
ALTER TABLE `inv_cliente`
  MODIFY `cod_cliente` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT de la tabla `inv_departamento`
--
ALTER TABLE `inv_departamento`
  MODIFY `cod_departamento` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `inv_desconexion`
--
ALTER TABLE `inv_desconexion`
  MODIFY `cod_orden_desco` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `inv_manttoval`
--
ALTER TABLE `inv_manttoval`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `inv_medidor`
--
ALTER TABLE `inv_medidor`
  MODIFY `cod_medidor` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT de la tabla `inv_municipio`
--
ALTER TABLE `inv_municipio`
  MODIFY `cod_municipio` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT de la tabla `inv_reclamo`
--
ALTER TABLE `inv_reclamo`
  MODIFY `cod_reclamo` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `inv_reconexion`
--
ALTER TABLE `inv_reconexion`
  MODIFY `cod_orden_recon` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `inv_servicio`
--
ALTER TABLE `inv_servicio`
  MODIFY `cod_servicio` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `inv_tarifa`
--
ALTER TABLE `inv_tarifa`
  MODIFY `cod_tarifa` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `inv_tiposval`
--
ALTER TABLE `inv_tiposval`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `inv_tuberias`
--
ALTER TABLE `inv_tuberias`
  MODIFY `cod_tuberia` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `inv_valvula`
--
ALTER TABLE `inv_valvula`
  MODIFY `cod_valvula` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `jerarquia_tuberia`
--
ALTER TABLE `jerarquia_tuberia`
  MODIFY `cod_jerarquia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `mat_tuberia`
--
ALTER TABLE `mat_tuberia`
  MODIFY `cod_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inv_tuberias`
--
ALTER TABLE `inv_tuberias`
  ADD CONSTRAINT `jerarquia` FOREIGN KEY (`cod_jerarquia`) REFERENCES `jerarquia_tuberia` (`cod_jerarquia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `material` FOREIGN KEY (`cod_material`) REFERENCES `mat_tuberia` (`cod_material`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `SK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
