-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2020 a las 19:01:12
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

--
-- Volcado de datos para la tabla `tbl_activitat`
--

INSERT INTO `tbl_activitat` (`id_activitat`, `nom_activitat`, `lloc_activitat`, `tipus_activitat`, `ambit_activitat`, `jornada_activitat`, `objectiu_activitat`, `id_contacte_activitat`, `id_sortida`) VALUES
(2, 'Salida el campo', 'Campo ', 'No curricular', 'Nacional', 'Sencera', 'Pasear', 3, 7),
(3, 'Visita al CERN', 'CERN', 'Curricular', 'Internacional', 'Sencera', 'Visitar el CERN', 4, 8),
(4, 'Visita al acuario', 'Acuario', 'Curricular', 'Nacional', 'Mati', 'Veure l\'aquari', 5, 9),
(5, 'Sortida a la neu', 'Molina', 'No curricular', 'Nacional', 'Sencera', 'Que els alumnes disfrutin de la neu', 6, 10);

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
  `nom_classe` enum('1-2PRI','1-4PRIM','1AF','1BATX','1EAS','1ESO','1PRIM','2BATX','2ESO','2PRIM','3-4ESO/1BATX','3-4PRI','3ESO','3PRIM','4ESO','4PRIM','5PRIM','6PRIM','CAFEM','CAI','EAS','EDIN','P3','P3-P4','P3-P4-P5','P4','P5','PERSONAL') COLLATE utf8_spanish_ci NOT NULL,
  `id_etapa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_clase`
--

INSERT INTO `tbl_clase` (`id_clase`, `nom_classe`, `id_etapa`) VALUES
(1, 'P3', 1),
(2, 'P4', 1),
(3, 'P5', 1),
(4, 'P3-P4', 1),
(5, 'P3-P4-P5', 1),
(6, '1PRIM', 2),
(7, '2PRIM', 2),
(8, '3PRIM', 2),
(9, '4PRIM', 2),
(10, '5PRIM', 2),
(11, '6PRIM', 2),
(12, '1-2PRI', 2),
(13, '1-4PRIM', 2),
(14, '3-4PRI', 2),
(15, '1ESO', 3),
(16, '2ESO', 3),
(17, '3ESO', 3),
(18, '4ESO', 3),
(19, '3-4ESO/1BATX', 4),
(20, '1BATX', 5),
(21, '2BATX', 5),
(22, '1AF', 7),
(23, '1EAS', 7),
(24, 'EAS', 7),
(25, 'EDIN', 7),
(26, '1AF', 7),
(27, 'CAFEM', 6),
(28, 'CAI', 6),
(29, 'PERSONAL', 8);

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

--
-- Volcado de datos para la tabla `tbl_contacte_activitat`
--

INSERT INTO `tbl_contacte_activitat` (`id_contacte_activitat`, `persona_contacte`, `web_contacte`, `telefon_contacte`, `email_contacte`) VALUES
(3, 'persona', 'www.dgdf.com', 123456789, 'kbcbjsd@gmail.com'),
(4, 'trabajador de CERN', 'cern.com', 214354657, 'cern@gmail.com'),
(5, 'contacte', 'aqua.com', 987654321, 'aqua@gmail.com'),
(6, 'instructor', 'lamolina.com', 765432167, 'lamolina@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_etapa`
--

CREATE TABLE `tbl_etapa` (
  `id_etapa` int(11) NOT NULL,
  `nom_etapa` enum('BATX','CFGM','CFGS','ESO','ESO/BATX','INF','PRIM','PERSONAL') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_etapa`
--

INSERT INTO `tbl_etapa` (`id_etapa`, `nom_etapa`) VALUES
(1, 'INF'),
(2, 'PRIM'),
(3, 'ESO'),
(4, 'ESO/BATX'),
(5, 'BATX'),
(6, 'CFGM'),
(7, 'CFGS'),
(8, 'PERSONAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_lista_profesores`
--

CREATE TABLE `tbl_lista_profesores` (
  `id_lista_profesores` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_excursion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_lista_profesores`
--

INSERT INTO `tbl_lista_profesores` (`id_lista_profesores`, `id_profesor`, `id_excursion`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 28, 2),
(4, 29, 1),
(5, 1, 6),
(6, 2, 7),
(7, 28, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_nom_transport`
--

CREATE TABLE `tbl_nom_transport` (
  `id_nom_transport` int(11) NOT NULL,
  `nom_transport` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_nom_transport`
--

INSERT INTO `tbl_nom_transport` (`id_nom_transport`, `nom_transport`) VALUES
(1, 'A peu'),
(2, 'Tren'),
(3, 'Autocar'),
(4, 'Avio'),
(5, 'Metro');

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
  `preu_gestio` int(11) NOT NULL,
  `overhead` int(3) NOT NULL,
  `total_facturar` int(11) NOT NULL,
  `pagament_fraccionat` enum('si','no') COLLATE utf8_spanish_ci NOT NULL,
  `observacio_fraccionat` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_preus`
--

INSERT INTO `tbl_preus` (`id_preus`, `cost_substitucio`, `cost_activitat_individual`, `cost_extra_activitat_profe`, `cost_global_activitat`, `cost_final`, `preu_fixe`, `preu_sense_topal`, `preu_amb_topal`, `preu_gestio`, `overhead`, `total_facturar`, `pagament_fraccionat`, `observacio_fraccionat`) VALUES
(7, 564, 456, 465564, 654, 54, 564, 54, 564, 654, 54, 546, 'si', 'Observacion'),
(8, 567, 56, 6, 65, 65, 56, 65, 67, 6, 6, 56, 'si', 'Observaciones '),
(9, 87, 78, 78, 87, 87, 78, 87, 78, 78, 78, 78, 'si', 'Mes observacions'),
(10, 10, 10, 101, 10, 1010, 10, 10, 101, 10, 10, 1, 'si', 'Mes obsevacions d\'exemple');

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
  `numero_alumnes` int(3) NOT NULL,
  `n_vetlladors` int(11) NOT NULL,
  `n_acompanyants` int(2) NOT NULL,
  `profes_a_part` int(11) NOT NULL,
  `profesor_asignat` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `id_clase` int(11) NOT NULL,
  `id_transport` int(11) NOT NULL,
  `id_precios` int(11) NOT NULL,
  `comanda_menu` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_sortida`
--

INSERT INTO `tbl_sortida` (`id_sortida`, `codi_sortida`, `inici_sortida`, `final_sortida`, `observacions_sortida`, `numero_alumnes`, `n_vetlladors`, `n_acompanyants`, `profes_a_part`, `profesor_asignat`, `id_clase`, `id_transport`, `id_precios`, `comanda_menu`) VALUES
(7, '1234', '2020-04-03', '2020-04-03', 'Observacion Okay', 4, 2, 2, 1, 'JCarcedo', 2, 7, 7, 0),
(8, '1', '2020-04-04', '2020-04-06', 'Observacion', 23, 0, 0, 1, 'DLarrea', 21, 8, 8, 0),
(9, '3', '2020-04-14', '2020-04-14', 'Altres observacions', 10, 6, 5, 2, 'MCarpallo', 1, 9, 9, 0),
(10, 'S-27', '2020-05-01', '2020-05-03', 'Varis profes', 120, 0, 0, 5, 'MCarpallo', 18, 10, 10, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipus_usuari`
--

CREATE TABLE `tbl_tipus_usuari` (
  `id_tipus_usuari` int(11) NOT NULL,
  `nom_tipus` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `descripcio` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estat` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_tipus_usuari`
--

INSERT INTO `tbl_tipus_usuari` (`id_tipus_usuari`, `nom_tipus`, `descripcio`, `estat`) VALUES
(1, 'Administracion', NULL, NULL),
(2, 'Profesores', NULL, NULL),
(3, 'Secretaria', NULL, NULL),
(4, 'Cocina', NULL, NULL),
(5, 'Enfermeria', NULL, NULL),
(6, 'Directores', NULL, NULL),
(7, 'Alumno', NULL, NULL),
(8, 'Personal', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_transport`
--

CREATE TABLE `tbl_transport` (
  `id_transport` int(11) NOT NULL,
  `hora_sortida` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `hora_arribada` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `cost_transport` int(5) NOT NULL,
  `codi_contacte` int(6) NOT NULL,
  `comentaris_transport` text COLLATE utf8_spanish_ci NOT NULL,
  `id_nom_transport` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_transport`
--

INSERT INTO `tbl_transport` (`id_transport`, `hora_sortida`, `hora_arribada`, `cost_transport`, `codi_contacte`, `comentaris_transport`, `id_nom_transport`) VALUES
(7, '10:00', '19:00', 10, 123, 'Comentario', 3),
(8, '08:00', '08:00', 50, 5, 'Salida de mas de un dia', 4),
(9, '09:00', '17:00', 5, 654, 'Comentarios varios', 3),
(10, '08:00', '21:00', 20, 9, 'Comentari d\'exemple', 3);

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
  `siei` enum('si','no') COLLATE utf8_spanish_ci NOT NULL,
  `computable` enum('si','no','alumne') COLLATE utf8_spanish_ci NOT NULL,
  `id_clase` int(11) NOT NULL,
  `id_tipus_usuari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_usuari`
--

INSERT INTO `tbl_usuari` (`id_usuari`, `usuari`, `contrasenya`, `nom_usuari`, `cognom_usuari`, `siei`, `computable`, `id_clase`, `id_tipus_usuari`) VALUES
(1, 'MCarpallo', '81dc9bdb52d04dc20036dbd8313ed055', 'Mario', 'Carpallo', 'no', 'si', 1, 2),
(2, 'JCarcedo', '81dc9bdb52d04dc20036dbd8313ed055', 'Jaime', 'Carcedo', 'no', 'no', 2, 2),
(3, 'VPerez', '81dc9bdb52d04dc20036dbd8313ed055', 'Victor', 'Perez', 'no', 'alumne', 3, 7),
(4, 'SRueda', '81dc9bdb52d04dc20036dbd8313ed055', 'Sergio', 'Rueda', 'no', 'alumne', 4, 7),
(5, 'Junevo', '81dc9bdb52d04dc20036dbd8313ed055', 'Jose', 'Nuevo', 'no', 'alumne', 5, 7),
(6, 'JMellado', '81dc9bdb52d04dc20036dbd8313ed055', 'Jesus', 'Mellado', 'si', 'alumne', 21, 7),
(7, 'JPerez', '81dc9bdb52d04dc20036dbd8313ed055', 'Juanma', 'Perez', 'si', 'alumne', 21, 7),
(8, 'Admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', 'Admin', 'si', 'no', 29, 1),
(9, 'PSecre', '81dc9bdb52d04dc20036dbd8313ed055', 'Pancracia', 'Gomez', 'si', 'no', 29, 3),
(10, 'PCocina', '81dc9bdb52d04dc20036dbd8313ed055', 'Agnes', 'Gonzalez', 'si', 'no', 29, 4),
(11, 'PEnfermeria', '81dc9bdb52d04dc20036dbd8313ed055', 'Sergio', 'Mel', 'si', 'no', 29, 5),
(12, 'PDireccion', '81dc9bdb52d04dc20036dbd8313ed055', 'Paco', 'Perez', 'si', 'no', 29, 6),
(28, 'SGimenez', '81dc9bdb52d04dc20036dbd8313ed055', 'Sergio', 'Gimenez', 'no', 'si', 21, 2),
(29, 'DLarrea', '81dc9bdb52d04dc20036dbd8313ed055', 'Danny', 'Larrea', 'no', 'no', 21, 2);

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
-- Indices de la tabla `tbl_lista_profesores`
--
ALTER TABLE `tbl_lista_profesores`
  ADD PRIMARY KEY (`id_lista_profesores`),
  ADD KEY `FK_Lista_profe` (`id_profesor`),
  ADD KEY `FK_listaprofex` (`id_excursion`);

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
  ADD KEY `FK_sortida2` (`id_transport`),
  ADD KEY `FK_Precios` (`id_precios`);

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
  MODIFY `id_activitat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_asistencia`
--
ALTER TABLE `tbl_asistencia`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_clase`
--
ALTER TABLE `tbl_clase`
  MODIFY `id_clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `tbl_contacte_activitat`
--
ALTER TABLE `tbl_contacte_activitat`
  MODIFY `id_contacte_activitat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_etapa`
--
ALTER TABLE `tbl_etapa`
  MODIFY `id_etapa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_lista_profesores`
--
ALTER TABLE `tbl_lista_profesores`
  MODIFY `id_lista_profesores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_nom_transport`
--
ALTER TABLE `tbl_nom_transport`
  MODIFY `id_nom_transport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_preus`
--
ALTER TABLE `tbl_preus`
  MODIFY `id_preus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tbl_sortida`
--
ALTER TABLE `tbl_sortida`
  MODIFY `id_sortida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tbl_tipus_usuari`
--
ALTER TABLE `tbl_tipus_usuari`
  MODIFY `id_tipus_usuari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_transport`
--
ALTER TABLE `tbl_transport`
  MODIFY `id_transport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tbl_usuari`
--
ALTER TABLE `tbl_usuari`
  MODIFY `id_usuari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
-- Filtros para la tabla `tbl_lista_profesores`
--
ALTER TABLE `tbl_lista_profesores`
  ADD CONSTRAINT `FK_Lista_profe` FOREIGN KEY (`id_profesor`) REFERENCES `tbl_usuari` (`id_usuari`),
  ADD CONSTRAINT `FK_listaprofex` FOREIGN KEY (`id_excursion`) REFERENCES `tbl_sortida` (`id_sortida`);

--
-- Filtros para la tabla `tbl_sortida`
--
ALTER TABLE `tbl_sortida`
  ADD CONSTRAINT `FK_Precios` FOREIGN KEY (`id_precios`) REFERENCES `tbl_preus` (`id_preus`),
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
