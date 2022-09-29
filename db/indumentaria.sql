-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2022 a las 00:43:35
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
-- Estructura de tabla para la tabla `ropa`
--

CREATE TABLE `ropa` (
  `Id_prenda` int(100) NOT NULL,
  `Id_tela` int(100) NOT NULL,
  `Sexo` varchar(100) NOT NULL,
  `Talla` varchar(100) NOT NULL,
  `Color` varchar(100) NOT NULL,
  `Tipo_de_prenda` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ropa`
--

INSERT INTO `ropa` (`Id_prenda`, `Id_tela`, `Sexo`, `Talla`, `Color`, `Tipo_de_prenda`) VALUES
(1, 1, 'Mujer', 'S', 'Rojo', 'Remera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tela`
--

CREATE TABLE `tela` (
  `Id_tela` int(100) NOT NULL,
  `Tipo_de_tela` varchar(100) NOT NULL,
  `Descripcion` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tela`
--

INSERT INTO `tela` (`Id_tela`, `Tipo_de_tela`, `Descripcion`) VALUES
(1, 'Algodon', 'Es un material muy resistente, se puede teñir y tambien blanquear sin problemas. Es una tela respirable, es aislante, por eso no puede abrigar en invierno');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ropa`
--
ALTER TABLE `ropa`
  ADD PRIMARY KEY (`Id_prenda`),
  ADD KEY `Id_tela` (`Id_tela`),
  ADD KEY `Id_tela_2` (`Id_tela`);

--
-- Indices de la tabla `tela`
--
ALTER TABLE `tela`
  ADD PRIMARY KEY (`Id_tela`),
  ADD KEY `Id_tela` (`Id_tela`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ropa`
--
ALTER TABLE `ropa`
  MODIFY `Id_prenda` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tela`
--
ALTER TABLE `tela`
  MODIFY `Id_tela` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ropa`
--
ALTER TABLE `ropa`
  ADD CONSTRAINT `ropa_ibfk_1` FOREIGN KEY (`Id_tela`) REFERENCES `tela` (`Id_tela`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
