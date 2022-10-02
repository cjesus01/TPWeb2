-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2022 a las 23:50:13
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `indumentaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prenda`
--

CREATE TABLE `prenda` (
  `id` int(100) NOT NULL,
  `id_tela` int(100) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `talla` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `prenda` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prenda`
--

INSERT INTO `prenda` (`id`, `id_tela`, `sexo`, `talla`, `color`, `prenda`) VALUES
(1, 7, 'Mujer', 'S', 'Rojo', 'Remera manga-larga'),
(2, 1, 'Hombre', 'M', 'Negro', 'Campera'),
(3, 2, 'Mujer', 'M', 'Gris', 'Calza'),
(24, 3, 'Mujer', 'XL', 'Azul', 'Vestido corto'),
(25, 1, 'Hombre', 'L', 'Verde', 'Chomba'),
(26, 6, 'Hombre', 'XL', 'Negro', 'Campera de cuero'),
(27, 4, 'Mujer', 'S', 'Rojo', 'Buzo'),
(28, 5, 'Mujer', 'M', 'Crema', 'Camisa'),
(29, 2, 'Hombre', 'L', 'Celeste', 'Remera manga-corta'),
(30, 8, 'Mujer', 'M', 'Violeta', 'Pollera'),
(31, 7, 'Mujer', 'L', 'Bordo', 'Short deportivo'),
(32, 3, 'Mujer', 'XXL', 'Blanco', 'Blazer '),
(33, 1, 'Hombre', 'S', 'Azul', 'Jean'),
(34, 4, 'Hombre', 'M', 'Marrón', 'Suéter'),
(35, 8, 'Mujer', 'L', 'Verde agua', 'Vestido largo'),
(36, 5, 'Mujer', 'M', 'Rosa', 'Mono'),
(37, 6, 'Mujer', 'L', 'Negro', 'jean palazzo'),
(38, 4, 'Hombre', 'L', 'Gris', 'Cardigan');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `prenda`
--
ALTER TABLE `prenda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tela` (`id_tela`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `prenda`
--
ALTER TABLE `prenda`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `prenda`
--
ALTER TABLE `prenda`
  ADD CONSTRAINT `id_tela` FOREIGN KEY (`id_tela`) REFERENCES `tela` (`id_tela`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
