-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-03-2020 a las 13:04:15
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_sortides`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_activitat`
--

CREATE TABLE `tbl_activitat` (
  `id_activitat` int(11) NOT NULL,
  `nom_activitat` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `lloc_activitat` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tipus_activitat` enum('Curricular','No curricular') COLLATE utf8_spanish_ci NOT NULL,
  `ambit_activitat` enum('Nacional','Internacional') COLLATE utf8_spanish_ci NOT NULL,
  `jornada_activitat` enum('Mati','Tarda','Sencera') COLLATE utf8_spanish_ci NOT NULL,
  `objectiu_activitat` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_contacte_activitat` int(11) NOT NULL,
  `id_sortida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_asistencia`
--

CREATE TABLE `tbl_asistencia` (
  `id_asistencia` int(11) NOT NULL,
  `estado_asistencia` enum('Presente','Ausente') COLLATE utf8_spanish_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_activitat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clase`
--

CREATE TABLE `tbl_clase` (
  `id_clase` int(11) NOT NULL,
  `nom_classe` enum('1-2PRI','1-4PRIM','1AF','1BATX','1EAS','1ESO','1PRIM','2BATX','2ESO','2PRIM','3-4ESO/1BATX','3-4PRI','3ESO','3PRIM','4ESO','4PRIM','5PRIM','6PRIM','CAFEM','CAI','EAS','EDIN','P3','P3-P4','P3-P4-P5','P4','P5') COLLATE utf8_spanish_ci NOT NULL,
  `id_etapa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contacte_activitat`
--

CREATE TABLE `tbl_contacte_activitat` (
  `id_contacte_activitat` int(11) NOT NULL,
  `persona_contacte` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `web_contacte` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefon_contacte` int(9) NOT NULL,
  `email_contacte` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_etapa`
--

CREATE TABLE `tbl_etapa` (
  `id_etapa` int(11) NOT NULL,
  `nom_etapa` enum('BATX','CFGM','CFGS','ESO','ESO/BATX','INF','PRIM') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_nom_transport`
--

CREATE TABLE `tbl_nom_transport` (
  `id_nom_transport` int(11) NOT NULL,
  `nom_transport` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_preus`
--

CREATE TABLE `tbl_preus` (
  `id_preus` int(11) NOT NULL,
  `cost_substitucio` int(10) DEFAULT NULL,
  `cost_activitat_individual` int(10) NOT NULL,
  `cost_extra_activitat_profe` int(10) NOT NULL,
  `cost_global_activitat` int(11) NOT NULL,
  `cost_final` int(11) NOT NULL,
  `preu_fixe` int(11) NOT NULL,
  `preu_sense_topal` int(11) NOT NULL,
  `preu_amb_topal` int(11) NOT NULL,
  `preru_gestio` int(11) NOT NULL,
  `overhead` int(3) NOT NULL,
  `total_facturar` int(11) NOT NULL,
  `pagament_fraccionat` enum('si','no') COLLATE utf8_spanish_ci NOT NULL,
  `observacio_fraccionat` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sortida`
--

CREATE TABLE `tbl_sortida` (
  `id_sortida` int(11) NOT NULL,
  `codi_sortida` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `inici_sortida` date NOT NULL,
  `final_sortida` date NOT NULL,
  `observacions_sortida` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `n_vetlladors` int(11) NOT NULL,
  `profes_a_part` int(11) NOT NULL,
  `id_clase` int(11) NOT NULL,
  `id_transport` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipus_usuari`
--

CREATE TABLE `tbl_tipus_usuari` (
  `id_tipus_usuari` int(11) NOT NULL,
  `nom_tipus` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `descripcio` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estat` varchar(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_transport`
--

CREATE TABLE `tbl_transport` (
  `id_transport` int(11) NOT NULL,
  `cost_transport` int(5) NOT NULL,
  `codi_contacte` int(6) NOT NULL,
  `comentaris_transport` text COLLATE utf8_spanish_ci NOT NULL,
  `id_nom_transport` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuari`
--

CREATE TABLE `tbl_usuari` (
  `id_usuari` int(11) NOT NULL,
  `usuari` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenya` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nom_usuari` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cognom_usuari` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `computable` enum('si','no','alumne') COLLATE utf8_spanish_ci NOT NULL,
  `id_clase` int(11) NOT NULL,
  `id_tipus_usuari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_activitat`
--
ALTER TABLE `tbl_activitat`
  ADD PRIMARY KEY (`id_activitat`),
  ADD KEY `FK_activitat` (`id_contacte_activitat`),
  ADD KEY `FK_sortida_activitat` (`id_sortida`);

--
-- Indices de la tabla `tbl_asistencia`
--
ALTER TABLE `tbl_asistencia`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD KEY `FK_asistencia1` (`id_usuario`),
  ADD KEY `FK_asistencia2` (`id_activitat`);

--
-- Indices de la tabla `tbl_clase`
--
ALTER TABLE `tbl_clase`
  ADD PRIMARY KEY (`id_clase`),
  ADD KEY `FK_etapa` (`id_etapa`);

--
-- Indices de la tabla `tbl_contacte_activitat`
--
ALTER TABLE `tbl_contacte_activitat`
  ADD PRIMARY KEY (`id_contacte_activitat`);

--
-- Indices de la tabla `tbl_etapa`
--
ALTER TABLE `tbl_etapa`
  ADD PRIMARY KEY (`id_etapa`);

--
-- Indices de la tabla `tbl_nom_transport`
--
ALTER TABLE `tbl_nom_transport`
  ADD PRIMARY KEY (`id_nom_transport`);

--
-- Indices de la tabla `tbl_preus`
--
ALTER TABLE `tbl_preus`
  ADD PRIMARY KEY (`id_preus`);

--
-- Indices de la tabla `tbl_sortida`
--
ALTER TABLE `tbl_sortida`
  ADD PRIMARY KEY (`id_sortida`),
  ADD KEY `FK_sortida1` (`id_clase`),
  ADD KEY `FK_sortida2` (`id_transport`);

--
-- Indices de la tabla `tbl_tipus_usuari`
--
ALTER TABLE `tbl_tipus_usuari`
  ADD PRIMARY KEY (`id_tipus_usuari`);

--
-- Indices de la tabla `tbl_transport`
--
ALTER TABLE `tbl_transport`
  ADD PRIMARY KEY (`id_transport`),
  ADD KEY `FK_transport` (`id_nom_transport`);

--
-- Indices de la tabla `tbl_usuari`
--
ALTER TABLE `tbl_usuari`
  ADD PRIMARY KEY (`id_usuari`),
  ADD KEY `FK_usuari1` (`id_clase`),
  ADD KEY `FK_usuari2` (`id_tipus_usuari`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_activitat`
--
ALTER TABLE `tbl_activitat`
  MODIFY `id_activitat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_asistencia`
--
ALTER TABLE `tbl_asistencia`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_clase`
--
ALTER TABLE `tbl_clase`
  MODIFY `id_clase` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_contacte_activitat`
--
ALTER TABLE `tbl_contacte_activitat`
  MODIFY `id_contacte_activitat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_etapa`
--
ALTER TABLE `tbl_etapa`
  MODIFY `id_etapa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_nom_transport`
--
ALTER TABLE `tbl_nom_transport`
  MODIFY `id_nom_transport` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_preus`
--
ALTER TABLE `tbl_preus`
  MODIFY `id_preus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_sortida`
--
ALTER TABLE `tbl_sortida`
  MODIFY `id_sortida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_tipus_usuari`
--
ALTER TABLE `tbl_tipus_usuari`
  MODIFY `id_tipus_usuari` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_transport`
--
ALTER TABLE `tbl_transport`
  MODIFY `id_transport` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_usuari`
--
ALTER TABLE `tbl_usuari`
  MODIFY `id_usuari` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_activitat`
--
ALTER TABLE `tbl_activitat`
  ADD CONSTRAINT `FK_activitat` FOREIGN KEY (`id_contacte_activitat`) REFERENCES `tbl_contacte_activitat` (`id_contacte_activitat`),
  ADD CONSTRAINT `FK_sortida_activitat` FOREIGN KEY (`id_sortida`) REFERENCES `tbl_sortida` (`id_sortida`);

--
-- Filtros para la tabla `tbl_asistencia`
--
ALTER TABLE `tbl_asistencia`
  ADD CONSTRAINT `FK_asistencia1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuari` (`id_usuari`),
  ADD CONSTRAINT `FK_asistencia2` FOREIGN KEY (`id_activitat`) REFERENCES `tbl_activitat` (`id_activitat`);

--
-- Filtros para la tabla `tbl_clase`
--
ALTER TABLE `tbl_clase`
  ADD CONSTRAINT `FK_etapa` FOREIGN KEY (`id_etapa`) REFERENCES `tbl_etapa` (`id_etapa`);

--
-- Filtros para la tabla `tbl_sortida`
--
ALTER TABLE `tbl_sortida`
  ADD CONSTRAINT `FK_sortida1` FOREIGN KEY (`id_clase`) REFERENCES `tbl_clase` (`id_clase`),
  ADD CONSTRAINT `FK_sortida2` FOREIGN KEY (`id_transport`) REFERENCES `tbl_transport` (`id_transport`);

--
-- Filtros para la tabla `tbl_transport`
--
ALTER TABLE `tbl_transport`
  ADD CONSTRAINT `FK_transport` FOREIGN KEY (`id_nom_transport`) REFERENCES `tbl_nom_transport` (`id_nom_transport`);

--
-- Filtros para la tabla `tbl_usuari`
--
ALTER TABLE `tbl_usuari`
  ADD CONSTRAINT `FK_usuari1` FOREIGN KEY (`id_clase`) REFERENCES `tbl_clase` (`id_clase`),
  ADD CONSTRAINT `FK_usuari2` FOREIGN KEY (`id_tipus_usuari`) REFERENCES `tbl_tipus_usuari` (`id_tipus_usuari`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
