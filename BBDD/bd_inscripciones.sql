-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2021 a las 15:30:36
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_inscripciones`
--
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_admin`
--

CREATE DATABASE bd_inscripciones;
USE bd_inscripciones;

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nombre_admin` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido_admin` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email_admin` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `pass_admin` char(32) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nombre_admin`, `apellido_admin`, `email_admin`, `pass_admin`) VALUES
(1, 'Marc', 'Ortiz', 'marcortiz@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3'),
(2, 'Miguel', 'Gras', 'miguelgras@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_eventos`
--

CREATE TABLE `tbl_eventos` (
  `id_ev` int(11) NOT NULL,
  `nombre_ev` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `desc_ev` varchar(1000) COLLATE utf8mb4_spanish_ci NOT NULL,
  `img_ev` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `edad_ev` int(3) NOT NULL,
  `capacidad_ev` int(6) NOT NULL,
  `fecha_ev` date NOT NULL,
  `direccion_ev` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telf_contacto_ev` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_eventos`
--

INSERT INTO `tbl_eventos` (`id_ev`, `nombre_ev`, `desc_ev`, `img_ev`, `edad_ev`, `capacidad_ev`, `fecha_ev`, `direccion_ev`, `telf_contacto_ev`) VALUES
(1, 'Cursa dels Nassos', 'La Cursa dels Nassos es una carrera atlética de carácter popular, de 10 kilómetros de recorrido, que tiene lugar el 31 de diciembre de cada año (día de San Silvestre) en Barcelona, España. Empezó a disputarse en 1999 como San Silvestre Barcelonesa, hasta que en 2004 tomó la denominación actual.\\r\\nLa carrera está organizada por el Ayuntamiento de Barcelona, a través del Institut Barcelona Esports, y cuenta con la dirección técnica de la Agrupació Atlètica Catalunya.', '../img/25-11-21-cursa_nassos.png', 18, 10000, '2021-12-31', 'Calle de Selva de Mar', 932812841),
(2, 'La Cursa El Corte Inglés', 'La Cursa El Corte Inglés, popularmente conocida como \"La Cursa\", es una carrera atlética de carácter popular que tiene lugar cada año, desde 1979, en un circuito urbano en las calles de Barcelona. Está organizada por la empresa El Corte Inglés, con el apoyo del Ayuntamiento de Barcelona.', '../img/25-11-21-cursa_corteingles.jpg', 6, 100000, '2022-04-03', 'Parque de la Ciudadela', 932701730),
(3, 'Cursa de les Empreses', '!Ya tenemos fecha para la Cursa de les Empreses!\r\n\r\nEl 17 de diciembre de 2021 no dudes en participar con tus compañeros de trabajo en una prueba que te hará disfrutar de un recorrido llano y sin dificultad técnica.\r\n\r\nCompite por equipos de 2, 3 o 4 participantes de la misma empresa, o si eres más atrevido corre con traje de manera individual en la categoría executive!\r\n\r\n¡Una experiencia difícil de repetir y que hacen que la prueba se convierta en única!', '../img/25-11-21-cursa_empreses.jpg', 18, 35000, '2021-12-17', 'Plaza Europa', 931594040),
(4, 'Maratón de Barcelona', 'Corre el maratón más mágico y completo del mundo: urbano, animado, mediterráneo, monumental, escénico, rápido y accesible para todos/as.', '../img/26-11-21-marato_bcn_cursa.png', 18, 25000, '2022-04-03', 'Plaça Espanya', 934315533);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `dni_usu` char(9) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre_usu` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido_usu` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `edad_usu` int(3) NOT NULL,
  `email_usu` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `img_dni_usu` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_voluntarios`
--

CREATE TABLE `tbl_voluntarios` (
  `id_par` int(11) NOT NULL,
  `dni_par` char(9) COLLATE utf8mb4_spanish_ci NOT NULL,
  `evento_par` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `tbl_eventos`
--
ALTER TABLE `tbl_eventos`
  ADD PRIMARY KEY (`id_ev`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`dni_usu`);

--
-- Indices de la tabla `tbl_voluntarios`
--
ALTER TABLE `tbl_voluntarios`
  ADD PRIMARY KEY (`id_par`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_eventos`
--
ALTER TABLE `tbl_eventos`
  MODIFY `id_ev` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_voluntarios`
--
ALTER TABLE `tbl_voluntarios`
  MODIFY `id_par` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
