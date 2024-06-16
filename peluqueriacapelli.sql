-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2024 a las 07:04:02
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
-- Base de datos: `peluqueriacapelli`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_citas` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `fo_clientes` int(11) NOT NULL,
  `fo_servicio` int(11) NOT NULL,
  `fo_mediodepago` int(11) NOT NULL,
  `observaciones` text NOT NULL,
  `atendido` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_citas`, `fecha`, `hora`, `fo_clientes`, `fo_servicio`, `fo_mediodepago`, `observaciones`, `atendido`) VALUES
(3, '2024-05-24', '16:10:31', 2, 3, 2, 'Cita cancelada por inasistencia', 'No'),
(4, '2024-05-23', '08:40:49', 1, 4, 4, '', 'Si'),
(5, '2024-05-23', '16:00:00', 3, 2, 3, ' ', 'Si'),
(7, '2024-05-24', '10:20:23', 4, 1, 1, 'Ninguna', 'Si'),
(8, '2024-05-29', '14:30:00', 3, 2, 2, ' Ninguna', ' n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_clientes` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `identificacion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_clientes`, `nombre`, `celular`, `correo`, `identificacion`) VALUES
(1, 'Natalia Reales Mercado', '3005468721', 'natareales@gmail.com', '1005438762'),
(2, 'Gabriela González García', '3105432679', 'gabrielag@gmail.com', '1086432560'),
(3, 'Alejandro Gutierrez Osorio', '3216543789', 'alejogo@gmail.com', '9876542391'),
(4, 'Camila Laverde Martinez ', '3102376591', 'camilaverdem@gmail.com', '1087654321');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mediodepago`
--

CREATE TABLE `mediodepago` (
  `id_mediodepago` int(11) NOT NULL,
  `medio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `mediodepago`
--

INSERT INTO `mediodepago` (`id_mediodepago`, `medio`) VALUES
(1, 'Efectivo'),
(2, 'PSE'),
(3, 'Tarjeta de crédito'),
(4, 'Tarjeta débito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(11) NOT NULL,
  `fo_tipodeservicio` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `fo_tipodeservicio`, `nombre`, `precio`) VALUES
(1, 1, 'Blower con ondas', 30000),
(2, 4, 'Depilación de cejas con hilo', 25000),
(3, 2, 'Manicure de uñas acrílicas ', 70000),
(4, 3, 'Pedicure regular', 15000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodeservicio`
--

CREATE TABLE `tipodeservicio` (
  `id_tipodeservicio` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tipodeservicio`
--

INSERT INTO `tipodeservicio` (`id_tipodeservicio`, `tipo`) VALUES
(1, 'Blower (ondas, planchado, curls, ondas de sirena)'),
(2, 'Manicure(uñas acrílicas, clásica, porcelana, seda)'),
(3, 'Pedicure (regular, spa, piedras calientes)'),
(4, 'Depilación (hilo, cuchilla, cera)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `correo`, `clave`) VALUES
(1, 'Gabriela Gonzalez', 'gabrielag@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(2, 'Alejandro Gutierrez', 'alejogo@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(3, 'Natalia Reales', 'natareales@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(4, 'Camila Laverde', 'camilaverde@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_citas`),
  ADD KEY `fo_cliente` (`fo_clientes`),
  ADD KEY `fo_servicio` (`fo_servicio`),
  ADD KEY `fo_mediodepago` (`fo_mediodepago`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_clientes`);

--
-- Indices de la tabla `mediodepago`
--
ALTER TABLE `mediodepago`
  ADD PRIMARY KEY (`id_mediodepago`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`),
  ADD KEY `fo_tipodeservicio` (`fo_tipodeservicio`);

--
-- Indices de la tabla `tipodeservicio`
--
ALTER TABLE `tipodeservicio`
  ADD PRIMARY KEY (`id_tipodeservicio`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_citas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_clientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mediodepago`
--
ALTER TABLE `mediodepago`
  MODIFY `id_mediodepago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `tipodeservicio`
--
ALTER TABLE `tipodeservicio`
  MODIFY `id_tipodeservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`fo_mediodepago`) REFERENCES `mediodepago` (`id_mediodepago`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`fo_servicio`) REFERENCES `servicio` (`id_servicio`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`fo_clientes`) REFERENCES `clientes` (`id_clientes`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`fo_tipodeservicio`) REFERENCES `tipodeservicio` (`id_tipodeservicio`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
