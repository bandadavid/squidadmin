-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-02-2022 a las 23:42:17
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `squidadmin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acls`
--

CREATE TABLE `acls` (
  `id_acl` bigint(11) NOT NULL,
  `nombre_acl` varchar(500) COLLATE armscii8_bin DEFAULT NULL,
  `expresiones_acl` varchar(500) COLLATE armscii8_bin DEFAULT NULL,
  `estado_acl` text COLLATE armscii8_bin DEFAULT 'ACTIVO',
  `observacion_acl` varchar(500) COLLATE armscii8_bin DEFAULT NULL,
  `fecha_creacion_acl` datetime DEFAULT current_timestamp(),
  `fk_id_usu` varchar(11) COLLATE armscii8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Volcado de datos para la tabla `acls`
--

INSERT INTO `acls` (`id_acl`, `nombre_acl`, `expresiones_acl`, `estado_acl`, `observacion_acl`, `fecha_creacion_acl`, `fk_id_usu`) VALUES
(1, 'Prohibir web facebook', 'facebook.com', 'ACTIVO', 'Facebook bloquear', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dominio`
--

CREATE TABLE `dominio` (
  `codigo_dom` bigint(11) NOT NULL,
  `nombre_dom` varchar(500) COLLATE armscii8_bin DEFAULT NULL,
  `dominio_dom` varchar(500) COLLATE armscii8_bin DEFAULT NULL,
  `estado_dom` text COLLATE armscii8_bin DEFAULT 'ACTIVO',
  `observacion_dom` varchar(500) COLLATE armscii8_bin DEFAULT NULL,
  `fecha_creacion_dom` datetime DEFAULT current_timestamp(),
  `fk_id_usu` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Volcado de datos para la tabla `dominio`
--

INSERT INTO `dominio` (`codigo_dom`, `nombre_dom`, `dominio_dom`, `estado_dom`, `observacion_dom`, `fecha_creacion_dom`, `fk_id_usu`) VALUES
(1, 'Restriccion Facebook', 'facebook.com', 'ACTIVO', 'Dominio Facebook', '2022-02-22 15:56:32', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ip`
--

CREATE TABLE `ip` (
  `codigo_ip` bigint(11) NOT NULL,
  `nombre_ip` varchar(500) COLLATE armscii8_bin DEFAULT NULL,
  `palabra_ip` varchar(500) COLLATE armscii8_bin DEFAULT NULL,
  `estado_ip` varchar(50) COLLATE armscii8_bin DEFAULT 'ACTIVO',
  `obsertacion_ip` varchar(500) COLLATE armscii8_bin DEFAULT NULL,
  `fecha_creacion_ip` datetime DEFAULT current_timestamp(),
  `fk_id_usu` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `palabra`
--

CREATE TABLE `palabra` (
  `codigo_pal` bigint(11) NOT NULL,
  `nombre_pal` varchar(500) COLLATE armscii8_bin DEFAULT NULL,
  `palabra_pal` varchar(500) COLLATE armscii8_bin DEFAULT NULL,
  `estado_pal` varchar(50) COLLATE armscii8_bin DEFAULT 'ACTIVO',
  `observaciones_pal` varchar(500) COLLATE armscii8_bin DEFAULT NULL,
  `fecha_creacion_pal` datetime DEFAULT current_timestamp(),
  `fk_id_usu` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codigo_usu` bigint(11) NOT NULL,
  `apellido_usu` varchar(500) COLLATE armscii8_bin DEFAULT NULL,
  `nombre_usu` varchar(500) COLLATE armscii8_bin DEFAULT NULL,
  `usuario_usu` varchar(500) COLLATE armscii8_bin DEFAULT NULL,
  `perfil_usu` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `estado_usu` text COLLATE armscii8_bin DEFAULT 'ACTIVO',
  `password_usu` varchar(500) COLLATE armscii8_bin DEFAULT NULL,
  `hora_creacion_usu` datetime DEFAULT current_timestamp(),
  `usuario_creacion_usu` varchar(500) COLLATE armscii8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codigo_usu`, `apellido_usu`, `nombre_usu`, `usuario_usu`, `perfil_usu`, `estado_usu`, `password_usu`, `hora_creacion_usu`, `usuario_creacion_usu`) VALUES
(0, 'Gavilanez', 'Diego', 'diego', 'INVITADO', 'ACTIVO', '827ccb0eea8a706c4c34a16891f84e7b', '2022-02-22 11:31:40', NULL),
(1, 'Banda', 'David', 'david', 'ADMINISTRADOR', 'ACTIVO', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-22 11:24:29', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acls`
--
ALTER TABLE `acls`
  ADD PRIMARY KEY (`id_acl`);

--
-- Indices de la tabla `dominio`
--
ALTER TABLE `dominio`
  ADD PRIMARY KEY (`codigo_dom`),
  ADD UNIQUE KEY `fk_id_usu` (`fk_id_usu`);

--
-- Indices de la tabla `ip`
--
ALTER TABLE `ip`
  ADD PRIMARY KEY (`codigo_ip`),
  ADD UNIQUE KEY `fk_id_usu` (`fk_id_usu`);

--
-- Indices de la tabla `palabra`
--
ALTER TABLE `palabra`
  ADD PRIMARY KEY (`codigo_pal`),
  ADD UNIQUE KEY `fk_id_usu` (`fk_id_usu`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acls`
--
ALTER TABLE `acls`
  MODIFY `id_acl` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `dominio`
--
ALTER TABLE `dominio`
  MODIFY `codigo_dom` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ip`
--
ALTER TABLE `ip`
  MODIFY `codigo_ip` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `palabra`
--
ALTER TABLE `palabra`
  MODIFY `codigo_pal` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dominio`
--
ALTER TABLE `dominio`
  ADD CONSTRAINT `dominio_ibfk_1` FOREIGN KEY (`fk_id_usu`) REFERENCES `usuario` (`codigo_usu`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ip`
--
ALTER TABLE `ip`
  ADD CONSTRAINT `ip_ibfk_1` FOREIGN KEY (`fk_id_usu`) REFERENCES `usuario` (`codigo_usu`) ON DELETE CASCADE;

--
-- Filtros para la tabla `palabra`
--
ALTER TABLE `palabra`
  ADD CONSTRAINT `palabra_ibfk_1` FOREIGN KEY (`fk_id_usu`) REFERENCES `usuario` (`codigo_usu`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
