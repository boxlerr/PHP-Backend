-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2023 a las 05:30:02
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
-- Estructura de tabla para la tabla `autos`
--

CREATE TABLE `autos` (
  `idAuto` int(8) NOT NULL,
  `nombreAuto` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precioAuto` float DEFAULT NULL,
  `fotoAuto` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT 'img.jpg',
  `detalleAuto` text CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `idCategoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autos`
--

INSERT INTO `autos` (`idAuto`, `nombreAuto`, `precioAuto`, `fotoAuto`, `detalleAuto`, `idCategoria`) VALUES
(21, 'Audi Q3', 250, '655ecec178a0d.jpg', 'El Audi Q3 le ofrece una gama de sistemas de asistencia al conductor para elegir. Un aspecto destacado es la asistencia de crucero adaptativa opcional. Te ayuda a acelerar, frenar, mantener la velocidad y la distancia, así como a permanecer en el carril.', 2),
(25, 'Audi A4', 199, '655ecf9af0194.jpg', 'Gracias al diseño progresivo con un aspecto frontal definido con precisión y una trasera característica, el carácter deportivo del Audi A4 Sedan se manifiesta más que nunca: un interior premium y funcional, tecnologías innovadoras en los ámbitos de la digitalización, el infoentretenimiento y los sistemas de asistencia al conductor, y una gama de potentes motores completan el paquete.', 2),
(26, 'Audi A7', 200, '655ecfcfb7bbe.jpg', 'Desde sus amplias superficies y bordes afilados hasta sus líneas atléticamente tensas, el Audi A7 Sportback transmite progresividad desde todos los ángulos.', 2),
(27, 'Chevrolet S10', 400, '655ed009a1ef1.webp', '\r\nSi venís del campo de la ganadería, del vitivinícola, de la construcción, o donde la vida real te encuentre, con la S10 High Country podés estar tranquilo que nunca pero nunca vas a dejar de avanzar en tu camino. Porque siempre vas a estar equipado con la potencia de un motor turbo 2.8L con 200 CV y 500 Nm de torque. Siempre vas a estar conectado sin importar el terreno ni la dirección que hayas elegido gracias a su tecnología exclusiva Wi-Fi y OnStar. Además de contar con toda la tranquilidad que te brinda: frenado autónomo de emergencia, 6 airbags, alerta de cambio de carril, de colisión frontal y de presión en los neumáticos.', 10),
(28, 'Chevrolet Camaro', 340, '655ed03e2242a.webp', 'Escuchá desde lejos como ruge su motor, el Camaro Coupé SS está listo para sorprenderte. Este imponente deportivo de sexta generación, te propone un diseño agresivo, un rendimiento inigualable y una tecnología jamás vista', 10),
(29, 'Chevrolet Cruze', 150, '655ed0562002f.webp', 'Además de la potencia de su motor turbo, la seguridad más avanzada, todo su confort y la exclusiva tecnología Wi-Fi, en el Nuevo Cruze disfrutás de la unión perfecta entre lo digital y lo analógico en un auto con lo mejor de los dos mundos. Encontrá tu camino con un auto tan único como la generación que lo inspiró.', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nombreCategoria`) VALUES
(2, 'Audi'),
(10, 'Chevrolet');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`idAuto`),
  ADD KEY `fk_categoria` (`idCategoria`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autos`
--
ALTER TABLE `autos`
  MODIFY `idAuto` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autos`
--
ALTER TABLE `autos`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
