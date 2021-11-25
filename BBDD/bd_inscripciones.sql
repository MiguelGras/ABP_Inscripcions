-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2021 a las 19:28:50
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
  `pass_admin` varchar(8) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_eventos`
--

CREATE TABLE `tbl_eventos` (
  `id_ev` int(11) NOT NULL,
  `nombre_ev` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `desc_ev` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `img_ev` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `edad_ev` int(3) NOT NULL,
  `max_participantes_ev` int(6) NOT NULL,
  `horario_ev` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `direccion_ev` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telf_contacto_ev` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_eventos`
--
ALTER TABLE `tbl_eventos`
  MODIFY `id_ev` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_voluntarios`
--
ALTER TABLE `tbl_voluntarios`
  MODIFY `id_par` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
