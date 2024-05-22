-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2024 a las 21:16:50
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
-- Base de datos: `tetris`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partida`
--

CREATE TABLE `partida` (
  `id_partida` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `puntuaje_total` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `partida`
--

INSERT INTO `partida` (`id_partida`, `id_usuario`, `puntuaje_total`, `fecha`) VALUES
(1, 1, 80, '2021-12-31 23:00:00'),
(3, 3, 90, '2022-01-02 23:00:00'),
(4, 4, 85, '2022-01-03 23:00:00'),
(5, 5, 70, '2022-01-04 23:00:00'),
(6, 6, 95, '2022-01-05 23:00:00'),
(7, 7, 60, '2022-01-06 23:00:00'),
(8, 8, 75, '2022-01-07 23:00:00'),
(9, 9, 85, '2022-01-08 23:00:00'),
(10, 10, 80, '2022-01-09 23:00:00'),
(14, 15, 100, '2024-05-18 19:23:19'),
(15, 15, 900, '2024-05-18 19:24:50'),
(16, 15, 0, '2024-05-18 19:47:35'),
(17, 15, 2200, '2024-05-19 14:44:06'),
(18, 15, 4800, '2024-05-19 14:49:26'),
(19, 15, 4500, '2024-05-19 14:54:53'),
(20, 15, 4100, '2024-05-19 15:09:52'),
(21, 15, 1700, '2024-05-19 17:07:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recuperar_contrasenia`
--

CREATE TABLE `recuperar_contrasenia` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `temp_key` varchar(200) NOT NULL,
  `frecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recuperar_contrasenia`
--

INSERT INTO `recuperar_contrasenia` (`id_usuario`, `email`, `temp_key`, `frecha`) VALUES
(0, 'c-rollan@hotmail.es', '896086b7ed5e566384b431f0b65df8d9', '2024-05-20 17:10:01'),
(0, 'c-rollan@hotmail.es', '22072cdb4f40f0bbf18cd8224d7631ab', '2024-05-20 17:21:38'),
(0, 'c-rollan@hotmail.es', '32f1578a637eda24ee41b68b51553127', '2024-05-20 18:57:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `super_usuario`
--

CREATE TABLE `super_usuario` (
  `id_super_usuario` int(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contrasenia` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `super_usuario`
--

INSERT INTO `super_usuario` (`id_super_usuario`, `email`, `contrasenia`, `nombre`) VALUES
(1, 'c-rollan@hotmail.es', '81dc9bdb52d04dc20036dbd8313ed055', 'Cristina Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contrasenia` varchar(50) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `email`, `contrasenia`, `fecha_registro`) VALUES
(1, 'usuario1', 'a@a.com', 'f01b3c52f07c341a28efbf804dbf703d', '2024-05-16 22:00:00'),
(3, 'usuario3', '', '799767da6adfa84f3d5feb6871d7ad95', '2024-05-16 22:00:00'),
(4, 'usuario4', '', 'f9eacee39de9756e1a095664ed1cd0d0', '2024-05-16 22:00:00'),
(5, 'usuario5', '', 'a19d9cac4977fec57cddc3f171858a98', '2024-05-16 22:00:00'),
(6, 'usuario6', '', 'b2d0380b8d77dc6c2228c26d915d59a7', '2024-05-16 22:00:00'),
(7, 'usuario7', '', 'b38ac4faa20891d5a2770e180f867ac2', '2024-05-16 22:00:00'),
(8, 'usuario8', '', '98c9bd10d33b7cd772a22936edfd9986', '2024-05-16 22:00:00'),
(9, 'usuario9', '', '30361bc72c65122ca8d9ccba005dedf9', '2024-05-16 22:00:00'),
(10, 'usuario10', '', 'fa44145ca9162eb8dcf5d49b6db24035', '2024-05-16 22:00:00'),
(13, 'a', 'j@j.es', '81dc9bdb52d04dc20036dbd8313ed055', '2024-05-17 16:42:52'),
(14, 'aaaaaaaa', 'aaaa@hotmail.es', '81dc9bdb52d04dc20036dbd8313ed055', '2024-05-17 16:44:41'),
(15, 'Cristina', 'c-rollan@hotmail.es', '81dc9bdb52d04dc20036dbd8313ed055', '2024-05-17 17:48:41'),
(17, 'cr', 'cr@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-05-22 17:45:18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `partida`
--
ALTER TABLE `partida`
  ADD PRIMARY KEY (`id_partida`),
  ADD KEY `fk_id_usuario` (`id_usuario`);

--
-- Indices de la tabla `super_usuario`
--
ALTER TABLE `super_usuario`
  ADD PRIMARY KEY (`id_super_usuario`);

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
  MODIFY `id_partida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `super_usuario`
--
ALTER TABLE `super_usuario`
  MODIFY `id_super_usuario` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
