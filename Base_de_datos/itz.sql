-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2020 a las 21:54:44
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `itz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `cve_alu` int(11) NOT NULL,
  `nombre_alu` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `app_alu` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apm_alu` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`cve_alu`, `nombre_alu`, `app_alu`, `apm_alu`) VALUES
(16650271, 'Daniela', 'Gonzalez', 'Miralrio'),
(16650275, 'Alexis', 'Hernandez', 'Mondragon'),
(16650281, 'Erik Salvador', 'Padilla', 'Gonzalez'),
(16650284, 'Hernan Vinicio', 'Perez', 'Mora');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `cve_cal` int(11) NOT NULL,
  `califi_cal` int(11) NOT NULL,
  `cve_alu` int(11) NOT NULL,
  `cve_usu` int(11) NOT NULL,
  `datetime_cal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`cve_cal`, `califi_cal`, `cve_alu`, `cve_usu`, `datetime_cal`) VALUES
(1, 100, 16650281, 2, '2020-06-08 07:45:00'),
(12, 100, 16650275, 3, '2020-06-10 17:30:44'),
(18, 100, 16650275, 2, '2020-06-10 18:00:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `cve_dep` int(11) NOT NULL,
  `nombre_dep` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `abrevia_dep` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `jefe_cve_per` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`cve_dep`, `nombre_dep`, `abrevia_dep`, `jefe_cve_per`) VALUES
(1, 'Servicios Escolares', 'S.E.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personals`
--

CREATE TABLE `personals` (
  `cve_per` int(11) NOT NULL,
  `titulo_per` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre_per` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `app_per` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apm_per` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `sexo_per` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `rfc_per` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `curp_per` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `foto_per` varchar(250) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo_per` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `personals`
--

INSERT INTO `personals` (`cve_per`, `titulo_per`, `nombre_per`, `app_per`, `apm_per`, `sexo_per`, `rfc_per`, `curp_per`, `foto_per`, `correo_per`) VALUES
(1, 'Ingeniero en Sistemas Computacionales', 'Gamaliel Yahave', 'Mondragon', 'Flores', 'Masculino', 'MOFG980103HMNNLM08_RFC', 'MOFG980103HMNNLM08', 'yahave.png', 'yahave48@gmail.com'),
(2, 'Ingeniero en Sistemas Computacionales', 'Aaron', 'Ocaña', 'Soto', 'Masculino', 'OASA982704HMNNLM07_RFC', 'OASA982704HMNNLM07', 'aaron.png', 'aaron@gmail.com'),
(3, 'Ingeniero en Sistemas Computacionales', 'Jesus Manuel', 'Arriola', 'Soto', 'Masculino', 'ARSJ981010HMNNLM07_RFC', 'ARSJ981010HMNNLM07', 'chus.png', 'chus@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestos`
--

CREATE TABLE `puestos` (
  `cve_pue` int(11) NOT NULL,
  `nombre_pue` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `puestos`
--

INSERT INTO `puestos` (`cve_pue`, `nombre_pue`) VALUES
(1, 'admin'),
(2, 'docente'),
(3, 'secretaria'),
(4, 'coordinador'),
(5, 'auxiliar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_cargos`
--

CREATE TABLE `usuarios_cargos` (
  `cve_usu` int(11) NOT NULL,
  `user_usu` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `pass_usu` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cve_per` int(11) NOT NULL,
  `cve_pue` int(11) NOT NULL,
  `cve_dep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios_cargos`
--

INSERT INTO `usuarios_cargos` (`cve_usu`, `user_usu`, `pass_usu`, `cve_per`, `cve_pue`, `cve_dep`) VALUES
(1, 'yahave', 'admin', 1, 1, 1),
(2, 'aaron', 'docente', 2, 2, 1),
(3, 'chus', 'docente', 3, 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`cve_alu`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`cve_cal`),
  ADD KEY `id_alu` (`cve_alu`),
  ADD KEY `id_usu` (`cve_usu`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`cve_dep`),
  ADD KEY `jefe_id_per` (`jefe_cve_per`);

--
-- Indices de la tabla `personals`
--
ALTER TABLE `personals`
  ADD PRIMARY KEY (`cve_per`);

--
-- Indices de la tabla `puestos`
--
ALTER TABLE `puestos`
  ADD PRIMARY KEY (`cve_pue`);

--
-- Indices de la tabla `usuarios_cargos`
--
ALTER TABLE `usuarios_cargos`
  ADD PRIMARY KEY (`cve_usu`),
  ADD KEY `id_pue` (`cve_pue`) USING BTREE,
  ADD KEY `id_dep` (`cve_dep`),
  ADD KEY `id_per` (`cve_per`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `cve_alu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16650285;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `cve_cal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `cve_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personals`
--
ALTER TABLE `personals`
  MODIFY `cve_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `puestos`
--
ALTER TABLE `puestos`
  MODIFY `cve_pue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios_cargos`
--
ALTER TABLE `usuarios_cargos`
  MODIFY `cve_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`cve_alu`) REFERENCES `alumnos` (`cve_alu`),
  ADD CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`cve_usu`) REFERENCES `usuarios_cargos` (`cve_usu`);

--
-- Filtros para la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD CONSTRAINT `departamentos_ibfk_1` FOREIGN KEY (`jefe_cve_per`) REFERENCES `personals` (`cve_per`);

--
-- Filtros para la tabla `usuarios_cargos`
--
ALTER TABLE `usuarios_cargos`
  ADD CONSTRAINT `usuarios_cargos_ibfk_1` FOREIGN KEY (`cve_pue`) REFERENCES `puestos` (`cve_pue`),
  ADD CONSTRAINT `usuarios_cargos_ibfk_2` FOREIGN KEY (`cve_dep`) REFERENCES `departamentos` (`cve_dep`),
  ADD CONSTRAINT `usuarios_cargos_ibfk_3` FOREIGN KEY (`cve_per`) REFERENCES `personals` (`cve_per`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
