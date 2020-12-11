-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2020 a las 16:23:11
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
-- Base de datos: `geoprueba1`
--
CREATE DATABASE IF NOT EXISTS `geoprueba1` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `geoprueba1`;

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
(9, 'SECCION3', 0xe610000001020000000500000044352559870756c0e7c6f48425de2a40359a5c8c810756c00f441669e2dd2a404fe61f7d930756c01c28f04e3edd2a407e5358a9a00756c00cb265f9badc2a408b389d64ab0756c078978bf84edc2a40),
(7, 'SECCION1', 0xe6100000010200000003000000cf876709320856c074232c2ae2e42a403737a6272c0856c01827beda51e42a408fc6a17e170856c042226de34fe42a40),
(8, 'SECCION2', 0xe610000001020000000300000088a1d5c9190856c0ea5be67459e42a40492eff21fd0756c093c5fd47a6e32a40e50e9bc8cc0756c07365506d70e22a40);

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
(4, 'VALVULA1', 0xe610000001010000009770e82d1e0856c0179b560a81e42a40),
(5, 'VALVULA2', 0xe6100000010100000038876bb5870756c0d3bf249529de2a40);

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
(3, 'ZONA_SM1', 0xe610000001030000000100000006000000e4874a23660756c03d5fb35c36e22a40f04fa912650756c07d5c1b2ac6e12a40dd5f3dee5b0756c0c11bd2a8c0e12a40d2191879590756c0f1643733fae12a40d2e5cde15a0756c0821e6adb30e22a40e4874a23660756c03d5fb35c36e22a40),
(4, 'CEMENTERIO LOLOTIQUE', 0xe61000000103000000010000001800000073672618ce1656c0209738f2401c2b409cdd5a26c31656c07349d576131c2b40e38920cec31656c0ff40b96ddf1b2b4083161230ba1656c05aba826dc41b2b408faa2688ba1656c093a8177c9a1b2b40001e51a1ba1656c0990e9d9e771b2b4016dee522be1656c0ddcd531d721b2b4095d233bdc41656c02a5437177f1b2b40ed815660c81656c0e6948098841b2b40f793313ecc1656c0e9818fc18a1b2b40ef54c03dcf1656c01c2785798f1b2b40f4ddad2cd11656c0490f43ab931b2b40be4eeacbd21656c066c0594a961b2b403a22dfa5d41656c0b8e68efe971b2b40cd1dfd2fd71656c0168733bf9a1b2b40d87dc7f0d81656c09f2287889b1b2b4013622ea9da1656c07427d87f9d1b2b408f1b7e37dd1656c0446ff1f09e1b2b40e71890bdde1656c0969526a5a01b2b40e0f3c308e11656c06b9a779ca21b2b4021af0793e21656c0828e56b5a41b2b406f66f4a3e11656c0c687d9cbb61b2b40e71890bdde1656c02c634337fb1b2b4073672618ce1656c0209738f2401c2b40),
(5, 'CEMENTERIO 2 LOLOTIQUE', 0xe6100000010300000001000000100000002cefaa07cc1656c040683d7c99102b401d2098a3c71656c00a2debfeb1102b401897aab4c51656c068cd8fbfb4102b401590f63fc01656c0da740470b3102b400038f6ecb91656c068cd8fbfb4102b40ed2de57cb11656c03815a930b6102b40ecf99ae5b21656c0f46dc1525d102b400d1afa27b81656c0520e661360102b40116f9d7fbb1656c0f46dc1525d102b4009168733bf1656c0aad4ec8156102b401fd61bb5c21656c0a4face2f4a102b4023f77475c71656c09f20b1dd3d102b4028806264c91656c08b19e1ed41102b4032c687d9cb1656c082c64ca25e102b402cd505bccc1656c0eb1a2d077a102b402cefaa07cc1656c040683d7c99102b40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea`
--

CREATE TABLE `linea` (
  `geoid` int(3) NOT NULL,
  `lineas` linestring NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `linea`
--

INSERT INTO `linea` (`geoid`, `lineas`) VALUES
(1, 0xfeffffff0102000000090000000cc452215bb016414b08b1a94fb536412be61d2483ad1641976a6e7724b536412f68381960ad1641b264af6721b536412f68381960ad1641b264af6721b53641adbc1ce8ceac164127c06eec13b536410ba9032c7cac1641bf41ffbe05b536415345683372ac16415e22e6ff06b536415345683372ac16415e22e6ff06b536415345683372ac16415e22e6ff06b53641);

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `linea`
--
ALTER TABLE `linea`
  ADD PRIMARY KEY (`geoid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `data_linestring`
--
ALTER TABLE `data_linestring`
  MODIFY `gid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `data_point`
--
ALTER TABLE `data_point`
  MODIFY `gid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `data_polygon`
--
ALTER TABLE `data_polygon`
  MODIFY `gid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `linea`
--
ALTER TABLE `linea`
  MODIFY `geoid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
