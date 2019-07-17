-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-07-2019 a las 06:23:57
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siaz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aereolineas`
--

CREATE TABLE `aereolineas` (
  `idAereolinea` int(11) NOT NULL,
  `aereolinea` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `aereolineas`
--

INSERT INTO `aereolineas` (`idAereolinea`, `aereolinea`) VALUES
(1, 'Estelar'),
(2, 'Conviasa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `cargo` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `cargo`) VALUES
(1, 'Administrador'),
(2, 'Gerente'),
(3, 'Administrador de caja'),
(4, 'Asesor de viajes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `departamento` varchar(35) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `departamento`) VALUES
(1, 'Viajes y Turismo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinos`
--

CREATE TABLE `destinos` (
  `idDestino` int(11) NOT NULL,
  `destino` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `destinos`
--

INSERT INTO `destinos` (`idDestino`, `destino`) VALUES
(1, 'Maracaibo'),
(2, 'Caracas'),
(3, 'Medellín'),
(4, 'Bogotá'),
(5, 'Santiago'),
(6, 'Quito'),
(7, 'Miami');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cargo_id` int(11) NOT NULL,
  `departamento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `apellido`, `cedula`, `telefono`, `usuario`, `password`, `cargo_id`, `departamento_id`) VALUES
(18, 'Jean', 'Acosta', '273123123', '0412334120', 'jean', '123', 2, 1),
(21, 'Viktor', 'Ivanov', '5635668', '02656424300', NULL, NULL, 3, 1),
(22, 'Vladimir', 'Putin', '20232342', '0414020283', NULL, NULL, 2, 1),
(24, 'Juan', 'Castillo', '23672373', '02656424300', NULL, NULL, 2, 1),
(37, 'Juan', 'Gonzales', '5635668', '02656424300', 'juang', '123', 1, 1),
(71, 'Jelit', 'Estrada', '5635668', '02656424300', 'aestrada', 'asdasd', 1, 1),
(91, 'Karmen', 'Gonzales', '5635668', '02656424300', 'karmeng', '123', 2, 1),
(92, 'Almir', 'Sanchez', '27348293', '04142323985', NULL, NULL, 1, 1),
(93, 'Adán', 'Coste', '27323293', '02656432430', NULL, NULL, 3, 1),
(94, 'John', 'López', '24323256', '0412757393', NULL, NULL, 4, 1),
(95, 'Gabriel', 'Otero', '28323442', '0414232384', NULL, NULL, 4, 1),
(96, 'Alejandra', 'Castellano', '28323237', '04147337235', NULL, NULL, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `idFactura` int(11) NOT NULL,
  `nombreCliente` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoCliente` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `cedulaCliente` varchar(15) CHARACTER SET latin1 NOT NULL,
  `telefonoCliente` varchar(15) CHARACTER SET latin1 NOT NULL,
  `aereolinea_id` int(11) NOT NULL,
  `idDestino_salida` int(11) NOT NULL,
  `idDestino_llegada` int(11) NOT NULL,
  `fecha_salida` date NOT NULL,
  `fecha_llegada` date NOT NULL,
  `hora_salida` time NOT NULL,
  `hora_llegada` time NOT NULL,
  `costo` int(255) NOT NULL,
  `idForma_pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`idFactura`, `nombreCliente`, `apellidoCliente`, `cedulaCliente`, `telefonoCliente`, `aereolinea_id`, `idDestino_salida`, `idDestino_llegada`, `fecha_salida`, `fecha_llegada`, `hora_salida`, `hora_llegada`, `costo`, `idForma_pago`) VALUES
(7, 'Josefa', 'Gutierrez', '23791332', '0412121222', 2, 1, 3, '2019-09-18', '2019-09-18', '16:50:00', '18:20:00', 500000, 1),
(8, 'Diosdado', 'Cabello', '26913463', '0412169552', 2, 2, 7, '2019-07-31', '2019-07-31', '10:38:00', '12:00:00', 800000, 1),
(9, 'María', 'Bermudez', '23422393', '041238833', 1, 1, 4, '2019-09-20', '2019-09-20', '05:35:00', '06:00:00', 400000, 2),
(10, 'Teresa', 'Rivero', '23233232', '02656424321', 1, 1, 3, '2019-08-16', '2019-08-16', '06:00:00', '07:00:00', 400000, 2),
(11, 'Gregori', 'Kaio', '27832323', '04163232324', 1, 1, 6, '2019-08-23', '2019-08-23', '07:00:00', '08:00:00', 900000, 3),
(12, 'Margareth', 'Toro', '23448484', '04142323545', 1, 2, 7, '2019-09-27', '2019-09-27', '04:00:00', '06:30:00', 800000, 3),
(13, 'Viktor', 'Ivanov', '25128238', '0414283238', 1, 1, 6, '2019-09-12', '2019-09-12', '06:00:00', '08:00:00', 450000, 2),
(14, 'Johan', 'Godoy', '23734784', '04142323855', 1, 2, 4, '2019-08-25', '2019-08-25', '09:00:00', '11:00:00', 750000, 2),
(15, 'Luis', 'Hernández', '782323', '04122373092', 1, 2, 6, '2019-10-18', '2019-10-18', '04:00:00', '05:00:00', 870000, 2),
(16, 'Karen', 'Luján', '8397237', '04124387867', 2, 2, 5, '2019-09-12', '2019-09-12', '07:00:00', '08:00:00', 540000, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

CREATE TABLE `forma_pago` (
  `idPago` int(11) NOT NULL,
  `pago` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `forma_pago`
--

INSERT INTO `forma_pago` (`idPago`, `pago`) VALUES
(1, 'Crédito'),
(2, 'Débito'),
(3, 'Transferencia');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aereolineas`
--
ALTER TABLE `aereolineas`
  ADD PRIMARY KEY (`idAereolinea`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `destinos`
--
ALTER TABLE `destinos`
  ADD PRIMARY KEY (`idDestino`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cargo_id` (`cargo_id`),
  ADD KEY `departamento_id` (`departamento_id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`idFactura`),
  ADD KEY `idDestino_salida` (`idDestino_salida`),
  ADD KEY `idDestino_llegada` (`idDestino_llegada`),
  ADD KEY `aereolinea_id` (`aereolinea_id`),
  ADD KEY `idForma_pago` (`idForma_pago`);

--
-- Indices de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  ADD PRIMARY KEY (`idPago`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aereolineas`
--
ALTER TABLE `aereolineas`
  MODIFY `idAereolinea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `destinos`
--
ALTER TABLE `destinos`
  MODIFY `idDestino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `idFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  MODIFY `idPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleados_ibfk_2` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`idDestino_salida`) REFERENCES `destinos` (`idDestino`) ON DELETE NO ACTION,
  ADD CONSTRAINT `facturas_ibfk_2` FOREIGN KEY (`idDestino_llegada`) REFERENCES `destinos` (`idDestino`) ON DELETE NO ACTION,
  ADD CONSTRAINT `facturas_ibfk_3` FOREIGN KEY (`aereolinea_id`) REFERENCES `aereolineas` (`idAereolinea`),
  ADD CONSTRAINT `facturas_ibfk_4` FOREIGN KEY (`idForma_pago`) REFERENCES `forma_pago` (`idPago`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
