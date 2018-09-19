-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2018 a las 19:57:25
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eje`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sport_team`
--

CREATE TABLE `sport_team` (
  `id` int(11) NOT NULL,
  `carrera` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `id_type` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `posicion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sport_team`
--

INSERT INTO `sport_team` (`id`, `carrera`, `email`, `id_type`, `nombre`, `posicion`) VALUES
(1, 'dsaads', '1530405@upv.edu.mx', '0', 'Edwin Lopez', 'sdad'),
(2, 'sadsda', '1530405@upv.edu.mx', '0', 'Edwin Lopez', 'asd'),
(3, 'asd', '1530405@upv.edu.mx', '<? =$t?>', 'Edwin Lopez', 'aads'),
(4, 'asd', '1530405@upv.edu.mx', '<? =$t?>', 'Edwin Lopez', 'aads');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `sport_team`
--
ALTER TABLE `sport_team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `sport_team`
--
ALTER TABLE `sport_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
