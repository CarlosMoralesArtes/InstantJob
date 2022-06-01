-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2022 a las 04:37:36
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
(3, 43),
(4, 44),
(5, 45);

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
(41, 'Eric', 'Garcia Juliana', '4a7d1ed414474e4033ac29ccb8653d9b', 41.5521855, 2.0959525, 'ericgarcia@gmail.com', 0),
(42, 'Carlos', 'Morales Artes', '4a7d1ed414474e4033ac29ccb8653d9b', 41.5521855, 2.0959525, 'carlosmorales@gmail.com', 2),
(43, 'CAdministradorP', 'CAdministradorP', '4a7d1ed414474e4033ac29ccb8653d9b', 2, 2, 'CAdministradorProductes@g', 0),
(44, 'CRRHH', 'CRRHH', '4a7d1ed414474e4033ac29ccb8653d9b', 2, 2, 'CRRHH@gmail.com', 0),
(45, 'CSocis', 'CSocis', '4a7d1ed414474e4033ac29ccb8653d9b', 2, 2, 'CSocis@gmail.com', 0),
(46, 'Ariana', 'Lopez', '4a7d1ed414474e4033ac29ccb8653d9b', 41.5521855, 2.0959525, 'arianalopez@gmail.com', 0),
(47, 'Carlota', 'Rives', '4a7d1ed414474e4033ac29ccb8653d9b', 41.5521855, 2.0959525, 'carlotarives@gmail.com', 0),
(48, 'Roger', 'Luna', '4a7d1ed414474e4033ac29ccb8653d9b', 41.5521855, 2.0959525, 'rogerluna@gmail.com', 2),
(49, 'Lluis', 'Pera', '4a7d1ed414474e4033ac29ccb8653d9b', 41.5521855, 2.0959525, 'lluispera@gmail.com', 0);

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
(28, 42, 42, '2022-05-31'),
(29, 40, 47, '2022-05-31'),
(30, 41, 47, '2022-05-31'),
(31, 46, 48, '2022-05-31'),
(32, 43, 48, '2022-05-31'),
(33, 47, 48, '2022-05-31'),
(34, 40, 49, '2022-05-31'),
(35, 46, 49, '2022-05-31'),
(36, 44, 49, '2022-05-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id_mensaje` int(4) NOT NULL,
  `emisor` int(5) NOT NULL,
  `receptor` int(5) NOT NULL,
  `mensaje` int(100) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(4) NOT NULL,
  `nombre` varchar(35) NOT NULL,
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
(38, 'Informatic amb cicle mitja', 'Soc un estudiant de cicle superior amb la capacitat de repar ordinadors rap', 1, '9898576', 4, 30, 'Dilluns-Divendres', '8h-14h', 0, 0),
(40, 'Jardiner a temps lliure', 'La meva aficio es ser jardiner, et puc ajudar!', 1, '3995287', 6, 20, 'Dimarts', '8h-10h', 0, 0),
(41, 'Pintor los fines de semana', 'Pintor que solo tiene libre los fines de semana', 1, '463761', 3, 30, 'Sabado-Domingo', 'Todo el dia', 1, 1),
(42, 'Doctora solo urgencias', 'Doctora especializada en deportistas profesionales', 1, '6502806', 7, 80, 'Dilluns-Divendres', '9h-13h', 0, 0),
(43, 'Titulat en exel', 'Tinc el titol oficial del exel, puc ajudarte a fer un script.', 1, '5344677', 4, 30, 'Dilluns-Divendres', '8h-14h', 0, 0),
(44, 'Carpintera amb molta experiencia', 'Carpintera amb 25 anys de experiencia, amb moltes ganes de treballar.', 1, '3914601', 2, 25, 'Dilluns-Divendres', '7h-14h', 0, 0),
(45, 'Obrer disponible 24h/7', 'Obrer dispos a cualsevol hora del dia!', 1, '7763186', 8, 50, 'Dilluns-Diumenge', '0h-0h', 1, 1),
(46, 'Pintor amb experiencia', 'Pintor amb experiencia de 20 anys.', 1, '2020933', 3, 22, 'Dilluns-Divendres', '8h-14h', 0, 0),
(47, 'Programador full stack', 'Programador full stack php amb informacio de jacascript', 1, '7513081', 4, 60, 'Dilluns-Divendres', '15h-20h', 0, 0),
(48, 'Lampista titulat amb experiencia', 'Lampista titulat amb experiencia amb moltes ganes de entrar amb una empresa', 1, '5806427', 1, 10, 'Dilluns-Divendres', '5h-10h', 0, 0),
(49, 'Becario Administrativo', 'Becario Administrativo recien salido de la facultad', 1, '8573925', 5, 16, 'Dilluns-Divendres', '10-22', 1, 0);

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
(21, 42, 38, '2022-05-30'),
(23, 42, 40, '2022-05-30'),
(24, 41, 41, '2022-05-30'),
(25, 46, 42, '2022-05-30'),
(26, 42, 43, '2022-05-30'),
(27, 47, 44, '2022-05-30'),
(28, 41, 45, '2022-05-30'),
(29, 48, 46, '2022-05-30'),
(30, 48, 47, '2022-05-30'),
(31, 49, 48, '2022-05-30'),
(32, 49, 49, '2022-05-30');

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
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id_mensaje`);

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
  MODIFY `id_admin` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `comprar`
--
ALTER TABLE `comprar`
  MODIFY `id_comprar` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `guardados`
--
ALTER TABLE `guardados`
  MODIFY `id_guardados` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id_mensaje` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `subir`
--
ALTER TABLE `subir`
  MODIFY `id_subir` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
