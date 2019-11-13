-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2019 a las 04:48:58
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `socialhero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiarios`
--

CREATE TABLE `beneficiarios` (
  `beneficiarios_id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `beneficiarios`
--

INSERT INTO `beneficiarios` (`beneficiarios_id`, `nombre`, `email`, `password`) VALUES
(1, 'José Sosa', 'jose.sosa@gmail.com', '123456'),
(2, 'Darynka', 'dary@gmail.com', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donaciones`
--

CREATE TABLE `donaciones` (
  `donaciones_id` int(11) NOT NULL,
  `beneficiario_id` int(11) NOT NULL,
  `donador_id` int(11) NOT NULL,
  `donacion` float NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `donaciones`
--

INSERT INTO `donaciones` (`donaciones_id`, `beneficiario_id`, `donador_id`, `donacion`, `fecha`) VALUES
(1, 1, 1, 50, '2019-11-13'),
(2, 1, 1, 598, '2019-11-13'),
(3, 2, 1, 150, '2019-11-13'),
(4, 2, 2, 150.2, '2019-11-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donador`
--

CREATE TABLE `donador` (
  `donador_id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `donador`
--

INSERT INTO `donador` (`donador_id`, `nombre`) VALUES
(1, 'Abril Darynka Tapia Sosa'),
(2, 'Oscar German Arredondo Martínez'),
(3, 'Daniel Ponce Gonzalez '),
(4, 'Miguel Angel Olea Díaz'),
(5, 'Esperanza Iris Sosa Marin'),
(6, 'Dulce Krystal Villagomez Marin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `beneficiarios`
--
ALTER TABLE `beneficiarios`
  ADD PRIMARY KEY (`beneficiarios_id`);

--
-- Indices de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD PRIMARY KEY (`donaciones_id`),
  ADD KEY `beneficiario_id` (`beneficiario_id`),
  ADD KEY `donador_id` (`donador_id`);

--
-- Indices de la tabla `donador`
--
ALTER TABLE `donador`
  ADD PRIMARY KEY (`donador_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `beneficiarios`
--
ALTER TABLE `beneficiarios`
  MODIFY `beneficiarios_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  MODIFY `donaciones_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `donador`
--
ALTER TABLE `donador`
  MODIFY `donador_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD CONSTRAINT `donaciones_ibfk_1` FOREIGN KEY (`donador_id`) REFERENCES `donador` (`donador_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donaciones_ibfk_2` FOREIGN KEY (`beneficiario_id`) REFERENCES `beneficiarios` (`beneficiarios_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
