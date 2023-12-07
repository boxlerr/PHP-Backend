-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2023 a las 01:05:43
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parcial2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(8) UNSIGNED NOT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `APELLIDO` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `CLAVE` varchar(100) DEFAULT NULL,
  `NIVEL` varchar(100) DEFAULT NULL,
  `FECHA_ALTA` datetime DEFAULT NULL,
  `ESTADO` enum('activo','banneado') NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `NOMBRE`, `APELLIDO`, `EMAIL`, `CLAVE`, `NIVEL`, `FECHA_ALTA`, `ESTADO`) VALUES
(1, 'Bautista', 'Carloni', 'gr@dv.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', '2014-11-06 21:35:46', 'activo'),
(2, NULL, NULL, 'facu@dv.net', '81dc9bdb52d04dc20036dbd8313ed055', 'usuario', NULL, 'activo'),
(3, NULL, NULL, 'facu2@dv.net', '81dc9bdb52d04dc20036dbd8313ed055', 'usuario', '2014-11-06 21:41:12', 'activo'),
(4, NULL, NULL, 'asdadasd@asdasd', '81dc9bdb52d04dc20036dbd8313ed055', 'usuario', '2014-11-06 21:50:21', 'banneado'),
(6, NULL, NULL, 'a@email.com', '81dc9bdb52d04dc20036dbd8313ed055', 'usuario', '2014-11-06 22:03:47', 'activo'),
(7, 'julian', 'boxler', 'boxler@hotmail.com', '031c5d181c40eb0d367a670bb5849b21', 'usuario', '2023-12-06 12:06:16', 'activo'),
(8, 'asd', 'asd', 'asd@asd', '7815696ecbf1c96e6894b779456d330e', 'usuario', '2023-12-06 12:07:45', 'activo'),
(9, 'p', 'p', 'p@p', '83878c91171338902e0fe0fb97a8c47a', 'usuario', '2023-12-06 12:17:25', 'activo'),
(10, 'k', 'k', 'k@k', '8ce4b16b22b58894aa86c421e8759df3', 'usuario', '2023-12-06 12:17:47', 'activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `sdfsdfsdfdsfdsf` (`EMAIL`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
