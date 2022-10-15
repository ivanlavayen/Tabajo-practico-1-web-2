-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2022 a las 02:19:35
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `genero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `genero`) VALUES
(1, 'Aventura'),
(2, 'Comics'),
(3, 'Policial'),
(4, 'Romantica'),
(5, 'Ciencia Ficcion'),
(37, 'accion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulos`
--

CREATE TABLE `titulos` (
  `id` int(11) NOT NULL,
  `obra` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `precio` double NOT NULL,
  `id_genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `titulos`
--

INSERT INTO `titulos` (`id`, `obra`, `autor`, `precio`, `id_genero`) VALUES
(1, 'LA ISLA DEL TESORO', 'ROBERT LOUIS STEVENSON', 1234, 1),
(2, 'LOS TRES MOSQUETEROS', 'ALEXANDER DUMAS', 2150, 1),
(3, 'DUNE', 'FRANK HERBERT', 1800, 5),
(4, 'CRONICAS MARCIANAS', 'RAY BRADBURY', 2350, 5),
(5, 'YO ROBOT', 'ISAAC ASIMOV', 2100, 5),
(11, 'LOS HIJOS DEL TOPO', 'ALEJANDRO JODOROWSKY', 2150, 3),
(12, 'HANAKO-KUN', 'AIDA IRO', 1500, 2),
(13, 'MUERTE EN LA VICARIA', 'AGATHA CHRISTIE', 2350, 3),
(14, 'CUENTOS POLICIALES', 'EDGAR ALAN POE', 1990, 3),
(15, 'EL AMOR EN TIEMPOS DE COLERA', 'GABRIEL GARCIA MARQUEZ', 2350, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'alguien@gmail.com', '$2y$10$MFFBvf3mbdEjvGGVNsmE9engw8fLsimnlnWF6gQDOwo4ohvLV7bz.'),
(2, 'sarasa@gmail.com', '$2y$10$/2YeWVFnGavOvyWWqvX7NO80Z74LDxYQsWBUDutDc/5OPGp2VWYTS');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `titulos`
--
ALTER TABLE `titulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_genero` (`id_genero`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `titulos`
--
ALTER TABLE `titulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `titulos`
--
ALTER TABLE `titulos`
  ADD CONSTRAINT `titulos_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
