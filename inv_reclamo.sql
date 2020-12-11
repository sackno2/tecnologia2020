-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2020 a las 17:53:47
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `oswa_inv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_reclamo`
--

CREATE TABLE `inv_reclamo` (
  `cod_reclamo` int(6) NOT NULL,
  `cod_cliente` int(5) NOT NULL,
  `detalle` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `cod_reclamo_motivo` int(2) NOT NULL,
  `receptor` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `solucionado` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `solucion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_reclamo` date NOT NULL,
  `fecha_solucion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inv_reclamo`
--

INSERT INTO `inv_reclamo` (`cod_reclamo`, `cod_cliente`, `detalle`, `cod_reclamo_motivo`, `receptor`, `solucionado`, `solucion`, `fecha_reclamo`, `fecha_solucion`) VALUES
(3, 1, 'Cobro caro', 2, 'Manuel de Jesus Cartagena', 'SI', 'Reintegro de valores eccedidos', '2014-07-18', '2014-07-18'),
(4, 1, 'alkjd', 1, 'Ever  Rosales', 'NO', 'Pendiente de Solucionar', '2014-08-28', '0000-00-00'),
(5, 1, '1\r\n', 3, 'Jose Oswaldo Alvarado Cruz', 'NO', 'Pendiente de Solucionar', '2014-08-28', '0000-00-00'),
(6, 1, 'Cobro de mas', 3, ' ', 'NO', 'Pendiente de Solucionar', '2014-09-21', '0000-00-00'),
(7, 1, 'retrazada', 1, ' ', 'NO', 'Pendiente de Solucionar', '2014-09-21', '0000-00-00'),
(8, 1, 'averia', 2, 'Ever Rosales', 'SI', 'Se reparo la averia', '2014-09-21', '2020-05-22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inv_reclamo`
--
ALTER TABLE `inv_reclamo`
  ADD PRIMARY KEY (`cod_reclamo`),
  ADD KEY `cod_cliente` (`cod_cliente`),
  ADD KEY `cod_reclamo_motivo` (`cod_reclamo_motivo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inv_reclamo`
--
ALTER TABLE `inv_reclamo`
  MODIFY `cod_reclamo` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
