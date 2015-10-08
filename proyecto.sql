-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2015 a las 14:52:58
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosformulario`
--

CREATE TABLE IF NOT EXISTS `datosformulario` (
  `Id` int(6) NOT NULL,
  `Recepcion` date DEFAULT NULL,
  `Estado` varchar(255) DEFAULT NULL,
  `Entrega` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE IF NOT EXISTS `equipo` (
  `Id` int(6) NOT NULL,
  `Equipo` varchar(50) DEFAULT NULL,
  `Marca` varchar(50) DEFAULT NULL,
  `Serie` varchar(50) DEFAULT NULL,
  `Modelo` varchar(50) DEFAULT NULL,
  `Servicio` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `grafica`
--
CREATE TABLE IF NOT EXISTS `grafica` (
`Atendio` varchar(50)
,`Servicio` varchar(50)
,`Entrega` date
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `Idusuario` int(6) NOT NULL,
  `Nickname` varchar(255) DEFAULT NULL,
  `Usuario` varchar(255) DEFAULT NULL,
  `Contrasena` varchar(255) DEFAULT NULL,
  `Tipocuenta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`Idusuario`, `Nickname`, `Usuario`, `Contrasena`, `Tipocuenta`) VALUES
(9, 'JCZM', 'Juan Carlos Zárate Moguel', 'juan carlos', 'Estandar'),
(10, 'Administrador', 'Administrador', 'admin', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `registros`
--
CREATE TABLE IF NOT EXISTS `registros` (
`Id` int(6)
,`Recepcion` date
,`Estado` varchar(255)
,`Entrega` date
,`Equipo` varchar(50)
,`Marca` varchar(50)
,`Serie` varchar(50)
,`Modelo` varchar(50)
,`Servicio` varchar(50)
,`Problema` varchar(255)
,`Diagnostico` varchar(255)
,`Solucion` varchar(255)
,`Observaciones` varchar(255)
,`Atendio` varchar(50)
,`Usuario` varchar(50)
,`Departamento` varchar(50)
,`Direccion` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `reporte`
--
CREATE TABLE IF NOT EXISTS `reporte` (
`Id` int(6)
,`Recepcion` date
,`Entrega` date
,`Atendio` varchar(50)
,`Servicio` varchar(50)
,`Usuario` varchar(50)
,`Problema` varchar(255)
,`solucion` varchar(255)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdiagnostico`
--

CREATE TABLE IF NOT EXISTS `tdiagnostico` (
  `Id` int(6) NOT NULL,
  `Problema` varchar(255) DEFAULT NULL,
  `Diagnostico` varchar(255) DEFAULT NULL,
  `Solucion` varchar(255) DEFAULT NULL,
  `Observaciones` varchar(255) DEFAULT NULL,
  `Atendio` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testado`
--

CREATE TABLE IF NOT EXISTS `testado` (
  `Id` int(2) NOT NULL,
  `Estado` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `testado`
--

INSERT INTO `testado` (`Id`, `Estado`) VALUES
(1, 'Equipo en espera de servicio'),
(2, 'Equipo de diagnostico'),
(3, 'Equipo en espera de refacción'),
(4, 'Equipo en fase de prueba'),
(5, 'Equipo en reparación'),
(6, 'Equipo para baja de inventario'),
(7, 'Servicio terminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tservicio`
--

CREATE TABLE IF NOT EXISTS `tservicio` (
  `Id` int(2) NOT NULL,
  `Servicio` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tservicio`
--

INSERT INTO `tservicio` (`Id`, `Servicio`) VALUES
(1, 'Asesoría'),
(2, 'Correctivo'),
(3, 'Especial'),
(4, 'Preventivo'),
(5, 'Red'),
(6, 'Telefonía'),
(7, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `Id` int(6) NOT NULL,
  `Usuario` varchar(50) DEFAULT NULL,
  `Departamento` varchar(50) DEFAULT NULL,
  `Direccion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura para la vista `grafica`
--
DROP TABLE IF EXISTS `grafica`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `grafica` AS select `tdiagnostico`.`Atendio` AS `Atendio`,`equipo`.`Servicio` AS `Servicio`,`datosformulario`.`Entrega` AS `Entrega` from ((`tdiagnostico` join `equipo` on((`tdiagnostico`.`Id` = `equipo`.`Id`))) join `datosformulario` on((`tdiagnostico`.`Id` = `datosformulario`.`Id`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `registros`
--
DROP TABLE IF EXISTS `registros`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `registros` AS select `datosformulario`.`Id` AS `Id`,`datosformulario`.`Recepcion` AS `Recepcion`,`datosformulario`.`Estado` AS `Estado`,`datosformulario`.`Entrega` AS `Entrega`,`equipo`.`Equipo` AS `Equipo`,`equipo`.`Marca` AS `Marca`,`equipo`.`Serie` AS `Serie`,`equipo`.`Modelo` AS `Modelo`,`equipo`.`Servicio` AS `Servicio`,`tdiagnostico`.`Problema` AS `Problema`,`tdiagnostico`.`Diagnostico` AS `Diagnostico`,`tdiagnostico`.`Solucion` AS `Solucion`,`tdiagnostico`.`Observaciones` AS `Observaciones`,`tdiagnostico`.`Atendio` AS `Atendio`,`usuario`.`Usuario` AS `Usuario`,`usuario`.`Departamento` AS `Departamento`,`usuario`.`Direccion` AS `Direccion` from (((`datosformulario` join `equipo` on((`datosformulario`.`Id` = `equipo`.`Id`))) join `tdiagnostico` on((`datosformulario`.`Id` = `tdiagnostico`.`Id`))) join `usuario` on((`datosformulario`.`Id` = `usuario`.`Id`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `reporte`
--
DROP TABLE IF EXISTS `reporte`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reporte` AS select `datosformulario`.`Id` AS `Id`,`datosformulario`.`Recepcion` AS `Recepcion`,`datosformulario`.`Entrega` AS `Entrega`,`tdiagnostico`.`Atendio` AS `Atendio`,`equipo`.`Servicio` AS `Servicio`,`usuario`.`Usuario` AS `Usuario`,`tdiagnostico`.`Problema` AS `Problema`,`tdiagnostico`.`Solucion` AS `solucion` from (((`datosformulario` join `tdiagnostico` on((`datosformulario`.`Id` = `tdiagnostico`.`Id`))) join `equipo` on((`datosformulario`.`Id` = `equipo`.`Id`))) join `usuario` on((`datosformulario`.`Id` = `usuario`.`Id`)));

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datosformulario`
--
ALTER TABLE `datosformulario`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`Idusuario`);

--
-- Indices de la tabla `tdiagnostico`
--
ALTER TABLE `tdiagnostico`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `testado`
--
ALTER TABLE `testado`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tservicio`
--
ALTER TABLE `tservicio`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datosformulario`
--
ALTER TABLE `datosformulario`
  MODIFY `Id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `Id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `Idusuario` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tdiagnostico`
--
ALTER TABLE `tdiagnostico`
  MODIFY `Id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `testado`
--
ALTER TABLE `testado`
  MODIFY `Id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tservicio`
--
ALTER TABLE `tservicio`
  MODIFY `Id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id` int(6) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
