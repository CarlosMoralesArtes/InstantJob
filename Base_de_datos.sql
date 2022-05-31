-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2022 a las 20:44:50
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `final`
--
DROP DATABASE IF EXISTS `final`;
CREATE DATABASE IF NOT EXISTS `final` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `final`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(4) NOT NULL,
  `id_cliente` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_admin`, `id_cliente`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(4) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellidos` varchar(15) NOT NULL,
  `contrasena` varchar(55) NOT NULL,
  `latitud` double DEFAULT NULL,
  `logitud` double NOT NULL,
  `correo` varchar(25) NOT NULL,
  `tarifa` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellidos`, `contrasena`, `latitud`, `logitud`, `correo`, `tarifa`) VALUES
(1, 'pepe2', 'pepe2 2', '1234', 1, 0, 'er@gm.com', 2),
(2, 'pepe', '', '0000', 1, 0, 'eri@gm.com', 0),
(3, 'eric', 'garcia', '9999', NULL, 0, 'ericgarcia@gmail.com', 2),
(17, 'operq', 'opera', 'opera', 2, 0, 'opera@opera.es', 0),
(18, 'joako', 'joako', 'joako', 2, 0, 'joako@joako.es', 0),
(19, 'j2', 'j2', 'j2', 2, 0, 'j2@j2.es', 0),
(22, 'awdf', 'asdf', 'asdf', 2, 0, 'asdf@asdf.e3s', 0),
(23, 'nonononon', 'noooonoo', 'nonoonnono', 2, 0, 'nononono@nonono', 0),
(24, 'sefg', 'sdfg', 'sdfg', 2, 0, 'sdfg@|sdfggh', 0),
(25, 'sdfgf', 'sgdfg', 'asdfa', 2, 0, 'sdfg@asdfas', 0),
(27, 'borrar', 'borrar', '1234', 2, 0, 'borrar@gmail', 0),
(28, 'borrar', 'borrar', '1324', 2, 0, 'sefgw@gmail', 0),
(33, 'u2', 'u2', '270c1b084f3f146eb5787075158d9c53', 41.4711808, 2.031616, 'u2@u2', 0),
(34, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 41.5521855, 2.0959525, 'a@a', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprar`
--

CREATE TABLE `comprar` (
  `id_comprar` int(4) NOT NULL,
  `id_clientes` int(4) NOT NULL,
  `id_servicios` int(4) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comprar`
--

INSERT INTO `comprar` (`id_comprar`, `id_clientes`, `id_servicios`, `fecha`) VALUES
(1, 3, 5, '2022-05-28'),
(2, 19, 1, '2022-05-28'),
(3, 1, 3, '2022-05-28'),
(4, 17, 5, '2022-05-28'),
(5, 1, 4, '2022-05-28'),
(6, 19, 2, '2022-05-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guardados`
--

CREATE TABLE `guardados` (
  `id_guardados` int(4) NOT NULL,
  `id_servicio` int(4) NOT NULL,
  `id_cliente` int(4) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `guardados`
--

INSERT INTO `guardados` (`id_guardados`, `id_servicio`, `id_cliente`, `fecha`) VALUES
(2, 6, 3, '2022-05-29'),
(4, 5, 33, '2022-05-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(4) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `descripcion` varchar(75) NOT NULL,
  `numero_clicks` int(8) NOT NULL,
  `imagen` mediumtext DEFAULT NULL,
  `categoria` int(3) NOT NULL,
  `precio` int(5) NOT NULL,
  `horario` varchar(55) NOT NULL,
  `dias` varchar(55) NOT NULL,
  `findes` int(1) NOT NULL,
  `24h` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `nombre`, `descripcion`, `numero_clicks`, `imagen`, `categoria`, `precio`, `horario`, `dias`, `findes`, `24h`) VALUES
(1, 'Fuster economic', 'Soc un fuster de sabadell', 1, '8393700', 2, 15, 'Lunes i Martes', '8h-3h', 0, 0),
(2, 'Pintor Sabadells', 'Pintar de calitat a sabadell', 1, '8510487', 3, 20, 'Martes i jueves', '9h-13h', 1, 0),
(3, 'Pintor de calidad', 'Pintor amb ganes de treballar a sabadell', 1, '8510487', 3, 30, 'Martes, jueves, viernes, sabados, domingos', '9h-18h', 1, 0),
(4, 'Lampista con experencia', 'Lampista con 20 de expericia', 1, '8510487', 1, 20, 'sabados, domingos', '0h-24h', 1, 1),
(5, 'Fuster barato', 'Fuster bbb.', 1, '8510487', 2, 20, 'Lunes i Martes', '8h-3h', 0, 0),
(6, 'barato informatic', 'informatic amb cicle mitja', 1, '8510487', 4, 20, 'Todos', '9h-13h', 1, 0),
(16, 'img', 'im', 1, '8510487', 1, 4, 'img', 'img', 0, 0),
(17, 'img', 'im', 1, '8510487', 0, 4, 'img', 'img', 0, 0),
(18, 'f', 'ed', 1, '8510487', 2, 3, 'd', 'd', 0, 0),
(19, 'codigo', 'hph', 1, '8510487', 7, 100, 'no', 'no', 1, 0),
(20, 'sdrthy', 'fdsgth', 5, '8510487', 1, 20, 'Lunes i Martes', '8h-3h', 0, 0),
(21, 'rghsdgsh', 'gdfhsghfdgdfh', 4, '8510487', 4, 456, 'Lunes i Martes', '8h-3h', 0, 0),
(22, 'asd', 'asdf', 1, '8510487', 2, 4, 'asd', 'bb', 0, 0),
(23, 'frvf', 'vfccf', 1, '8510487', 3, 4545, 'ff', 'vgv', 0, 0),
(24, 'aswdrf', 'sdfg', 1, '8510487', 6, 34, 'sdfg', 'sdf', 0, 0),
(25, 'ghgf', 'ggg', 1, '8510487', 5, 4, 'gg', 'gg', 0, 0),
(26, 'Fuck maderos', 'Gratis en vrd', 1, '594324', 2, 50, 'Los findes', '22h', 1, 0),
(27, 'ej', 'ejemplo', 1, '7102563', 4, 4, 'no', 'mo', 0, 0),
(28, 'df', 'ds', 1, '4305433', 2, 5, 'asd', 'asd', 0, 0),
(29, 'df', 'ds', 1, '5073815', 2, 5, 'asd', 'asd', 0, 0),
(30, 'to piko administravibo', 'na de locos', 1, '8873719', 5, 100, '23', '12', 0, 0),
(31, 'Marc metje', 'Merc pro', 1, '8674883', 7, 30, 'Dilluns', '8h-12h', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subir`
--

CREATE TABLE `subir` (
  `id_subir` int(4) NOT NULL,
  `id_clientes` int(4) NOT NULL,
  `id_servicios` int(4) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subir`
--

INSERT INTO `subir` (`id_subir`, `id_clientes`, `id_servicios`, `fecha`) VALUES
(1, 3, 6, '2022-05-26'),
(2, 19, 5, '2022-05-16'),
(3, 18, 1, '2022-05-27'),
(4, 17, 4, '2022-05-23'),
(5, 3, 3, '2022-05-11'),
(6, 19, 2, '2022-05-28'),
(9, 34, 26, '2022-05-30'),
(12, 34, 28, '2022-05-30'),
(13, 34, 30, '2022-05-30'),
(14, 34, 31, '2022-05-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones`
--

CREATE TABLE `valoraciones` (
  `id_valoraciones` int(4) NOT NULL,
  `id_servicio` int(4) NOT NULL,
  `id_cliente` int(4) NOT NULL,
  `estrellitas` int(1) NOT NULL,
  `valoracion` varchar(35) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `valoraciones`
--

INSERT INTO `valoraciones` (`id_valoraciones`, `id_servicio`, `id_cliente`, `estrellitas`, `valoracion`, `fecha`) VALUES
(1, 6, 3, 4, 'Profesional', '2022-05-28'),
(2, 6, 18, 2, 'Volvio a fallar y no se hace cargo', '2022-05-28'),
(3, 6, 17, 5, 'Muy amable', '2022-05-28'),
(4, 1, 3, 5, 'Correcto', '2022-05-28'),
(5, 1, 18, 5, 'Simple', '2022-05-28'),
(6, 3, 19, 5, 'Buen acabado pero caro', '2022-05-28'),
(7, 2, 1, 1, 'Se cae la pintura', '2022-05-28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `comprar`
--
ALTER TABLE `comprar`
  ADD PRIMARY KEY (`id_comprar`),
  ADD KEY `id_clientes` (`id_clientes`),
  ADD KEY `id_servicioes` (`id_servicios`);

--
-- Indices de la tabla `guardados`
--
ALTER TABLE `guardados`
  ADD PRIMARY KEY (`id_guardados`),
  ADD KEY `id_servicio` (`id_servicio`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `subir`
--
ALTER TABLE `subir`
  ADD PRIMARY KEY (`id_subir`),
  ADD KEY `id_servicios` (`id_servicios`),
  ADD KEY `id_clientes` (`id_clientes`);

--
-- Indices de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD PRIMARY KEY (`id_valoraciones`),
  ADD KEY `id_servicio` (`id_servicio`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `comprar`
--
ALTER TABLE `comprar`
  MODIFY `id_comprar` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `guardados`
--
ALTER TABLE `guardados`
  MODIFY `id_guardados` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `subir`
--
ALTER TABLE `subir`
  MODIFY `id_subir` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  MODIFY `id_valoraciones` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `comprar`
--
ALTER TABLE `comprar`
  ADD CONSTRAINT `comprar_ibfk_1` FOREIGN KEY (`id_clientes`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `comprar_ibfk_2` FOREIGN KEY (`id_servicios`) REFERENCES `servicio` (`id_servicio`);

--
-- Filtros para la tabla `guardados`
--
ALTER TABLE `guardados`
  ADD CONSTRAINT `guardados_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`),
  ADD CONSTRAINT `guardados_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `subir`
--
ALTER TABLE `subir`
  ADD CONSTRAINT `subir_ibfk_1` FOREIGN KEY (`id_servicios`) REFERENCES `servicio` (`id_servicio`),
  ADD CONSTRAINT `subir_ibfk_2` FOREIGN KEY (`id_clientes`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD CONSTRAINT `valoraciones_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`),
  ADD CONSTRAINT `valoraciones_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
