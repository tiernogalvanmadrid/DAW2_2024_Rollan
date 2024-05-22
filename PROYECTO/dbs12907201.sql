-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Servidor: db5015831001.hosting-data.io
-- Tiempo de generación: 22-05-2024 a las 19:25:53
-- Versión del servidor: 8.0.32
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbs12907201`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partida`
--

CREATE TABLE `partida` (
  `id_partida` int NOT NULL,
  `id_usuario` int DEFAULT NULL,
  `puntuaje_total` int DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `partida`
--

INSERT INTO `partida` (`id_partida`, `id_usuario`, `puntuaje_total`, `fecha`) VALUES
(13, 16, 900, '2024-05-18 19:41:33'),
(17, 19, 3900, '2024-05-18 20:17:15'),
(18, 16, 5500, '2024-05-19 15:30:32'),
(19, 23, 0, '2024-05-19 15:47:23'),
(20, 23, 0, '2024-05-19 15:48:43'),
(21, 23, 300, '2024-05-19 15:50:04'),
(23, 19, 2800, '2024-05-19 16:09:06'),
(24, 25, 2900, '2024-05-19 16:49:49'),
(25, 25, 4400, '2024-05-19 16:54:23'),
(26, 19, 4000, '2024-05-19 17:12:58'),
(27, 16, 6600, '2024-05-19 17:12:59'),
(30, 16, 400, '2024-05-19 19:29:29'),
(31, 16, 5000, '2024-05-19 19:34:02'),
(32, 16, 6700, '2024-05-19 19:39:21'),
(34, 16, 4700, '2024-05-19 19:46:00'),
(35, 16, 7100, '2024-05-19 19:50:47'),
(36, 16, 4300, '2024-05-19 19:57:07'),
(37, 16, 5500, '2024-05-19 20:01:54'),
(38, 16, 5700, '2024-05-19 20:06:56'),
(39, 16, 6400, '2024-05-19 20:14:10'),
(40, 16, 6300, '2024-05-19 20:20:00'),
(41, 26, 0, '2024-05-20 07:12:31'),
(42, 27, 0, '2024-05-20 07:58:56'),
(43, 27, 100, '2024-05-20 07:59:32'),
(44, 27, 0, '2024-05-20 08:02:10'),
(45, 24, 0, '2024-05-20 08:17:59'),
(46, 16, 3100, '2024-05-20 08:33:58'),
(47, 28, 200, '2024-05-20 09:26:34'),
(48, 16, 2500, '2024-05-20 11:03:53'),
(49, 16, 900, '2024-05-20 11:29:56'),
(50, 16, 3300, '2024-05-20 11:32:54'),
(51, 16, 0, '2024-05-20 11:34:29'),
(52, 16, 6700, '2024-05-20 11:47:50'),
(53, 16, 1900, '2024-05-20 11:59:27'),
(54, 16, 5700, '2024-05-20 13:18:41'),
(55, 16, 6500, '2024-05-20 13:25:01'),
(56, 16, 6600, '2024-05-20 13:49:10'),
(57, 17, 100, '2024-05-20 14:43:05'),
(58, 30, 300, '2024-05-20 17:05:51'),
(59, 33, 3500, '2024-05-21 17:30:47'),
(60, 36, 500, '2024-05-21 17:49:05'),
(61, 36, 1800, '2024-05-21 17:52:11'),
(62, 16, 9200, '2024-05-21 17:56:03'),
(63, 23, 800, '2024-05-21 17:59:31'),
(64, 23, 200, '2024-05-21 18:00:36'),
(65, 36, 6000, '2024-05-21 18:00:59'),
(66, 23, 1200, '2024-05-21 18:03:33'),
(67, 36, 4800, '2024-05-21 18:06:16'),
(68, 37, 200, '2024-05-21 19:09:12'),
(69, 16, 12400, '2024-05-21 19:54:29'),
(70, 36, 7200, '2024-05-21 20:19:45'),
(71, 36, 2300, '2024-05-21 20:23:54'),
(72, 36, 5800, '2024-05-21 20:33:16'),
(73, 36, 200, '2024-05-21 20:35:07'),
(74, 36, 800, '2024-05-21 20:38:41'),
(75, 32, 200, '2024-05-22 13:50:24'),
(76, 32, 700, '2024-05-22 13:55:59'),
(77, 32, 3200, '2024-05-22 14:04:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recuperar_contrasenia`
--

CREATE TABLE `recuperar_contrasenia` (
  `id` int NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `temp_key` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL,
  `nombre_usuario` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contrasenia` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `email`, `contrasenia`) VALUES
(16, 'Cristina', 'c-rollan@hotmail.es', '81dc9bdb52d04dc20036dbd8313ed055'),
(17, 'tuxboy', 'mateo@hola.es', '827ccb0eea8a706c4c34a16891f84e7b'),
(18, 'mariam.piccetti', 'bfdsf7aefq7f@jfjf', 'a0d05eaabbee2588f739e3f12c18ee15'),
(19, 'Marchio', 'mariofer_303@hotmail.com', '1be6c35eb029bb62399a53f9c908686b'),
(20, 'Juan', 'JuanJoseMariaRigobertoAguascacasdeSantoDomingodelo', '25f9e794323b453885f5181f1b624d0b'),
(23, 'Alex', 'alex@gmail.com', '202cb962ac59075b964b07152d234b70'),
(24, 'ilias', 'elias@gmail.com', 'a722c63db8ec8625af6cf71cb8c2d939'),
(25, 'Ironh3ad', 'ironhead_furiaeterna@hotmail.com', '46104f9c08c4552561f94a524ea68b8e'),
(26, 'hugo', 'aaaa@gmail.com', '202cb962ac59075b964b07152d234b70'),
(27, 'Rosita11', 'nataly.guanoluisa95@gmail.com', 'b4f4e97b13b2d638dea366532de32fea'),
(28, 'jooweeel', 'joel@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(29, 'Cristinat', 'macrtrsa97@gmail.com', 'f4020e91252aafd4b18d8acd17f883db'),
(30, 'Zhor', 'thor.pedo@gmail.com', '5bca0a712fb2b099312ebfef594f6a84'),
(31, 'Cristina2', 'rollancristina@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(32, 'Emilio', 'logeloki@gmail.com', '256d23053d4749dc0d1e28433f878254'),
(33, 'ElMejor', 'fdafaf@gmail.com', 'bb020008565b6844c327ccd4c6fac766'),
(34, 'barroso347', 'barroso347@gmail.com', '32250170a0dca92d53ec9624f336ca24'),
(35, 'Kal', 'kalef.villanueva@gmail.com', 'b65cb28b7c2569d90631cef9c8a8c29e'),
(36, 'jeanpier', 'je5x.1.jnes@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
(37, 'PEDRO', 'ferucepe@yahoo.es', 'b969da0ea42c2c0eb01a2f405c9b4f1c'),
(38, 'Julian', 'julian@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `partida`
--
ALTER TABLE `partida`
  ADD PRIMARY KEY (`id_partida`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `recuperar_contrasenia`
--
ALTER TABLE `recuperar_contrasenia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `partida`
--
ALTER TABLE `partida`
  MODIFY `id_partida` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `recuperar_contrasenia`
--
ALTER TABLE `recuperar_contrasenia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `partida`
--
ALTER TABLE `partida`
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `partida_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
