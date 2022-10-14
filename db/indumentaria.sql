-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2022 a las 03:33:59
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
(1, 6, 'Mujer', 'S', 'Rojo', 'Campera'),
(2, 1, 'Hombre', 'M', 'Azul', 'Remeron'),
(3, 2, 'Mujer', 'M', 'Gris', 'Calza'),
(24, 3, 'Mujer', 'XL', 'Azul', 'Vestido corto'),
(26, 6, 'Hombre', 'XL', 'Negro', 'Campera de cuero'),
(27, 4, 'Mujer', 'S', 'Rojo', 'Buzo'),
(28, 5, 'Mujer', 'M', 'Crema', 'Camisa'),
(29, 2, 'Hombre', 'L', 'Celeste', 'Remera manga-corta'),
(31, 7, 'Mujer', 'L', 'Bordo', 'Short deportivo'),
(32, 3, 'Mujer', 'XXL', 'Blanco', 'Blazer '),
(34, 4, 'Hombre', 'M', 'Marrón', 'Suéter'),
(35, 8, 'Mujer', 'L', 'Verde agua', 'Vestido largo'),
(36, 5, 'Mujer', 'M', 'Rosa', 'Mono'),
(38, 4, 'Hombre', 'L', 'Gris', 'Cardigan'),
(42, 3, 'Mujer', 'M', 'Fucsia', 'Pollera'),
(44, 3, 'Mujer', 'L', 'Negro', 'Pollera'),
(46, 1, 'Mujer', 'S', 'Rojo', 'Campera'),
(47, 1, 'Mujer', 'L', 'Negro', 'Jean'),
(48, 1, 'Mujer', 'L', 'Negro', 'Jean'),
(49, 1, 'Mujer', 'L', 'Negro', 'Jean'),
(50, 1, 'Mujer', 'L', 'Negro', 'Jean'),
(51, 1, 'Mujer', 'L', 'Rosa', 'Chomba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tela`
--

CREATE TABLE `tela` (
  `id_tela` int(100) NOT NULL,
  `tipo_de_tela` varchar(100) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `lavado_de_tela` varchar(300) NOT NULL,
  `temperatura_de_lavado` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tela`
--

INSERT INTO `tela` (`id_tela`, `tipo_de_tela`, `descripcion`, `lavado_de_tela`, `temperatura_de_lavado`) VALUES
(1, 'Algodón', 'Es un material muy resistente. Se puede teñir y también blanquear sin problemas. Es una tela respirable. Es aislante, por eso nos puede abrigar en invierno.', 'Se aconseja lavar a mano pero se puede lavar en el lavarropas.', 'Se recomienda lavar con agua fría.'),
(2, 'Poliéster', ' Es un tejido ligero y de poco peso, a pesar de su gran resistencia. Admite tintes y productos químicos con gran facilidad, por lo tanto tendremos una gran variedad de diseños estampados en las prendas fabricadas.', 'Se puede lavar en el lavarropas.', 'Agua tibia o fría.'),
(3, 'Seda', 'Esta fibra se caracteriza por su suavidad y brillo único. Además, tiene una alta resistencia a la tracción y una alta tenacidad.', 'Se lava a mano. No se recomienda lavar en el lavarropas.', 'Agua fría. '),
(4, 'Lana', 'Es una fibra gruesa y elástica, que retiene muy bien el calor ya que se trata de un aislante térmico. Por ende, protege del frío, además es de fácil coloración.', 'Se recomienda lavar a mano aunque se puede lavar en el lavarropas en un programa de ropa delicada.', 'Agua fría. '),
(5, 'Lino', 'Es un material muy resistente y duradero, protege la piel de los rayos ultravioleta, es un material muy ligero, de poco peso. Es antibacteriano y fungicida, y neutraliza los malos olores.', 'Puede lavarse a mano o en lavarropas.', 'Agua fría.'),
(6, 'Cuerina', 'Es una tela muy resistente y flexible. Su principal característica es la similitud con el cuero auténtico.', 'Se recomienda lavarlo a mano. ', 'Agua fría. '),
(7, 'Lycra', 'Puede estirarse varias veces en la medida de su tamaño y retomar su forma original. Además, es liviana, durable, fácil de teñir y resiste el prensado y la abrasión. También absorbe la humedad en forma natural.', 'Se puede lavar tanto a mano como a lavarropas. ', 'Agua fría o tibia.'),
(8, 'Acetato', 'No se encoge ni destiñe ni se arruga. Puede ser teñida en prácticamente cualquier color. Es una tela flexible. ', 'Puede lavar su prenda a mano o en el lavarropas.', 'Agua fría.'),
(13, 'Nylon', 'Muy suave', 'A mano', 'Agua fria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usser`
--

CREATE TABLE `usser` (
  `id` int(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `contraseña` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usser`
--

INSERT INTO `usser` (`id`, `nombre`, `Mail`, `contraseña`) VALUES
(1, 'Valentina', 'valencastillo158@gmail.com', '$2y$10$YVi0jbyTLqsYoPIbIs2puOCSci178YuLB0CVRpx/eNf2yf468IMZy'),
(2, 'Juan', 'Juan220@gmail.com', '$2y$10$g9nQ2XdxwJNHu7KB5ExGKOb5Ez/wDjXjBgi081.ZZjru5v3gxfdqS'),
(3, 'Susana', 'Susi22@gmail.com', '$2y$10$HpcIbGziOpgZQhU47656fOV7yKqa.BJaLO//SaW9FTrJIZZunI8ku');

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
-- Indices de la tabla `tela`
--
ALTER TABLE `tela`
  ADD PRIMARY KEY (`id_tela`);

--
-- Indices de la tabla `usser`
--
ALTER TABLE `usser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `prenda`
--
ALTER TABLE `prenda`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `tela`
--
ALTER TABLE `tela`
  MODIFY `id_tela` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usser`
--
ALTER TABLE `usser`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
