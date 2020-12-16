-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2020 a las 23:50:02
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `emape`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividad` int(11) NOT NULL,
  `tipo_actividad` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control`
--

CREATE TABLE `control` (
  `id_via` int(11) NOT NULL,
  `is_actividad` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vias`
--

CREATE TABLE `vias` (
  `id` int(11) NOT NULL,
  `codigo_via` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vias_detalle`
--

CREATE TABLE `vias_detalle` (
  `id_via_detalle` int(11) NOT NULL,
  `id_via` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `tiempo_desde` date NOT NULL,
  `tiempo_hasta` date NOT NULL,
  `nombre_via` text COLLATE utf8_spanish_ci NOT NULL,
  `cuadra_inicial` text COLLATE utf8_spanish_ci NOT NULL,
  `gps_inicial` text COLLATE utf8_spanish_ci NOT NULL,
  `cuadra_final` text COLLATE utf8_spanish_ci NOT NULL,
  `gps_final` text COLLATE utf8_spanish_ci NOT NULL,
  `longitud` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `distrito` text COLLATE utf8_spanish_ci NOT NULL,
  `userreg` text COLLATE utf8_spanish_ci NOT NULL,
  `usermod` text COLLATE utf8_spanish_ci NOT NULL,
  `fecreg` datetime NOT NULL,
  `feccmod` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `vias`
--
ALTER TABLE `vias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vias_detalle`
--
ALTER TABLE `vias_detalle`
  ADD PRIMARY KEY (`id_via_detalle`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `vias`
--
ALTER TABLE `vias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vias_detalle`
--
ALTER TABLE `vias_detalle`
  MODIFY `id_via_detalle` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
