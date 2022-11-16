-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2022 a las 22:25:01
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
  `prenda` varchar(100) NOT NULL,
  `imagen_prenda` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prenda`
--

INSERT INTO `prenda` (`id`, `id_tela`, `sexo`, `talla`, `color`, `prenda`, `imagen_prenda`) VALUES
(1, 6, 'Mujer', 'S', 'Rojo', 'Campera', './imgs/clothing/b9f6e6309b726ca0a25ad59af64f2e12--balmain-leather-jacket-leather-biker-jackets.jpg'),
(3, 1, 'Mujer', 'S', 'Gris', 'Calza', './imgs/clothing/634b5bfedc1d0.jpg'),
(24, 3, 'Mujer', 'XL', 'Azul', 'Vestido corto', './imgs/clothing/Vestido-corto-informal-de-lujo-para-mujer-minivestido-Sexy-de-manga-larga-con-cuello-en-V.jpg'),
(26, 6, 'Hombre', 'XL', 'Negro', 'Campera de cuero', './imgs/clothing/2-campera-de-cuero-james-freaks-and-geeks-liam-leather1-419ef386d72553175b15675230463381-1024-1024.jpg'),
(27, 4, 'Mujer', 'S', 'Violeta', 'Cardigan', './imgs/clothing/Su-ter-de-lana-para-mujer-c-rdigan-fino-suelto-flor-p-rpura-Primavera-2021.jpg'),
(28, 5, 'Mujer', 'M', 'Crema', 'Camisa', './imgs/clothing/D_NQ_NP_828430-MLA50990179537_082022-W.jpg'),
(29, 2, 'Hombre', 'L', 'Blanco', 'Remera manga-corta', './imgs/clothing/D_NQ_NP_633856-MLA31034692939_062019-W.jpg'),
(31, 7, 'Mujer', 'L', 'Negro', 'Short deportivo', './imgs/clothing/D_NQ_NP_692432-MLA49591183050_042022-W.jpg'),
(32, 3, 'Mujer', 'L', 'Blanco', 'Blazer', './imgs/clothing/istockphoto-451301207-612x612.jpg'),
(34, 4, 'Hombre', 'M', 'Marrón', 'Suéter', './imgs/clothing/D_NQ_NP_910849-MLA50226075850_062022-W.jpg'),
(35, 8, 'Mujer', 'L', 'Verde', 'Vestido largo', './imgs/clothing/rBVaq2B-GbWAHksGAADq2P4C_PY008.jpg'),
(36, 5, 'Mujer', 'M', 'Rosa', 'Mono', './imgs/clothing/mono-rosa-vaquero-baratos-se-agotan-nueva-coleccion-hym-mango-1-kZtD-U1304915552265EI-624x936@MujerHoy.jpg'),
(38, 4, 'Hombre', 'L', 'Gris', 'Cardigan', './imgs/clothing/Urban-Chicago-Gris-Oscuro-600x600.jpg'),
(44, 3, 'Mujer', 'L', 'Negro', 'Pollera', './imgs/clothing/D_NQ_NP_636793-MLA51811440417_102022-V.jpg'),
(46, 4, 'Mujer', 'S', 'Rojo', 'Campera', './imgs/clothing/6349e023ea654.jpg'),
(51, 1, 'Mujer', 'S', 'Rosa', 'Chomba', './imgs/clothing/634b2eee1d890.jpg'),
(52, 1, 'Mujer', 'S', 'Rojo', 'vestido', './imgs/clothing/637554b116aa3.jpg'),
(53, 1, 'Hombre', 'M', 'Amarillo', 'Buzo', './imgs/clothing/6349d45635b78.jpg'),
(54, 1, 'Hombre', 'M', 'Negro', 'Pantalón deportivo', './imgs/clothing/6349da1ba6430.jpg'),
(57, 8, 'Mujer', 'M', 'Rosa', 'vestido', './imgs/clothing/634b1462b203a.jpg'),
(61, 1, 'Mujer', 'M', 'Verde', 'Campera de abrigo', './imgs/clothing/63755492d9eed.jpg'),
(63, 1, 'Mujer', 'M', 'violeta', 'vestido', './imgs/clothing/63754cf003dae.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tela`
--

CREATE TABLE `tela` (
  `id_tela` int(100) NOT NULL,
  `tipo_de_tela` varchar(100) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `lavado_de_tela` varchar(300) NOT NULL,
  `temperatura_de_lavado` varchar(300) NOT NULL,
  `imagen` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tela`
--

INSERT INTO `tela` (`id_tela`, `tipo_de_tela`, `descripcion`, `lavado_de_tela`, `temperatura_de_lavado`, `imagen`) VALUES
(1, 'Algodón', 'Es un material muy resistente.', 'Se aconseja lavar a mano pero se puede lavar en el lavarropas.', 'Se recomienda lavar con agua fría.', './imgs/categories/634b5c560cf2d.jpg'),
(2, 'Poliéster', ' Es un tejido ligero y de poco peso, a pesar de su gran resistencia. Admite tintes y productos químicos con gran facilidad, por lo tanto tendremos una gran variedad de diseños estampados en las prendas fabricadas.', 'Se puede lavar en el lavarropas.', 'Agua tibia o fría.', './imgs/categories/634b0fb37be1b.jpg'),
(3, 'Seda', 'Esta fibra se caracteriza por su suavidad y brillo único. Además, tiene una alta resistencia a la tracción y una alta tenacidad.', 'Se lava a mano. No se recomienda lavar en el lavarropas.', 'Agua fría. ', './imgs/categories/634b0fd3114bc.jpg'),
(4, 'Lana', 'Es una fibra gruesa y elástica, que retiene muy bien el calor ya que se trata de un aislante térmico. Por ende, protege del frío, además es de fácil coloración.', 'Se recomienda lavar a mano aunque se puede lavar en el lavarropas en un programa de ropa delicada.', 'Agua fría. ', './imgs/categories/LANA_7443468_EGE564VBYT_KUY_HRTW.jpg'),
(5, 'Lino', 'Es un material muy resistente y duradero, protege la piel de los rayos ultravioleta, es un material muy ligero, de poco peso. Es antibacteriano y fungicida, y neutraliza los malos olores.', 'Puede lavarse a mano o en lavarropas.', 'Agua fría.', './imgs/categories/telas-divinas-tela-de-lino-863x513.jpg'),
(6, 'Cuerina', 'Es una tela muy resistente y flexible. Su principal característica es la similitud con el cuero auténtico.', 'Se recomienda lavarlo a mano. ', 'Agua fría. ', './imgs/categories/eco-cuero1-01ebf627f4330719a715637328512139-1024-1024.jpg'),
(7, 'Lycra', 'Puede estirarse varias veces en la medida de su tamaño y retomar su forma original. Además, es liviana, durable, fácil de teñir y resiste el prensado y la abrasión. También absorbe la humedad en forma natural.', 'Se puede lavar tanto a mano como a lavarropas. ', 'Agua fría o tibia.', './imgs/categories/D_NQ_NP_720530-MLA49298149153_032022-W.jpg'),
(8, 'Acetato', 'No se encoge ni destiñe ni se arruga. Puede ser teñida en prácticamente cualquier color. Es una tela flexible. ', 'Puede lavar su prenda a mano o en el lavarropas.', 'Agua fría.', './imgs/categories/634a12928c1ad.jpg'),
(15, 'Gazar', 'muy suave', 'A mano.', 'Agua fria', './imgs/categories/6349dcf73f5f8.jpg');

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
(3, 'Susana', 'Susi22@gmail.com', '$2y$10$HpcIbGziOpgZQhU47656fOV7yKqa.BJaLO//SaW9FTrJIZZunI8ku'),
(4, 'Mica', 'Mica_56@hotmail.com', '$2y$10$zNsPiZMEsBq.YxwLzswCLOAPzSyvOaAGGjCr3gy3mFwndM8.tfIZ.');

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `tela`
--
ALTER TABLE `tela`
  MODIFY `id_tela` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usser`
--
ALTER TABLE `usser`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
