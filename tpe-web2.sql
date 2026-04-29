-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-04-2026 a las 22:08:17
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpe-web2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `nombre_album` varchar(40) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `fecha_lanzamiento` date NOT NULL,
  `duracion_minutos` int(11) NOT NULL,
  `cantidad_canciones` int(11) NOT NULL,
  `id_artista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`id_album`, `nombre_album`, `genero`, `fecha_lanzamiento`, `duracion_minutos`, `cantidad_canciones`, `id_artista`) VALUES
(1, '24K Magic', 'Funk, Pop', '2016-11-18', 33, 9, 1),
(2, 'The Romantic', 'Pop', '2026-02-27', 31, 9, 1),
(3, 'Keep The Faith', 'Rock', '1992-11-03', 65, 12, 2),
(4, 'Slippery When Wet', 'Hard Rock', '1986-08-18', 43, 10, 2),
(5, 'Red', 'Country,Pop', '2012-10-22', 65, 16, 3),
(6, '1989', 'Pop', '2014-10-27', 48, 13, 3),
(7, 'Blizzard Of Ozz', 'Metal', '1980-09-12', 93, 19, 4),
(8, 'Diary Of A Madman', 'Metal', '1981-11-07', 53, 10, 4),
(9, 'Future Nostalgia', 'Pop', '2020-03-27', 43, 13, 5),
(10, 'Radical Optimism', 'Pop', '2024-05-03', 36, 11, 5),
(11, 'Rebel Yell', 'Rock', '1983-11-10', 38, 9, 6),
(12, 'CyberPunk', 'Rock', '1993-06-29', 71, 20, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista`
--

CREATE TABLE `artista` (
  `id_artista` int(11) NOT NULL,
  `nombre_artista` varchar(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_fallecimiento` date DEFAULT NULL,
  `lugar_origen` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `artista`
--

INSERT INTO `artista` (`id_artista`, `nombre_artista`, `fecha_nacimiento`, `fecha_fallecimiento`, `lugar_origen`) VALUES
(1, 'Bruno Mars', '1985-10-08', NULL, 'Hawaii, EE.UU'),
(2, 'Bon Jovi', '1962-03-02', NULL, 'New Jersey, EE.UU'),
(3, 'Taylor Swift', '1989-12-13', NULL, 'Pensilvania, EE.UU'),
(4, 'Ozzy Osbourne', '1948-12-03', '2025-07-22', 'Marston Green, Inglaterra'),
(5, 'Dua Lipa', '1995-08-22', NULL, 'London, Inglaterra'),
(6, 'Billy Idol', '1955-11-30', NULL, 'Stanmore, Inglaterra');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`),
  ADD KEY `fk_album_artista` (`id_artista`);

--
-- Indices de la tabla `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`id_artista`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `artista`
--
ALTER TABLE `artista`
  MODIFY `id_artista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `fk_album_artista` FOREIGN KEY (`id_artista`) REFERENCES `artista` (`id_artista`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
