-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2023 a las 03:17:07
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tornijohns`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Tornillo'),
(2, 'Herramienta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_factura`
--

CREATE TABLE `detalles_factura` (
  `id` int(11) NOT NULL,
  `factura_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(100) NOT NULL,
  `precio_unitario` int(100) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id` int(11) NOT NULL,
  `fecha_emision` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre_producto` varchar(400) NOT NULL,
  `precio_actual` int(40) NOT NULL,
  `categoria_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre_producto`, `precio_actual`, `categoria_id`) VALUES
(1, 'Drywall 6x1/2', 20, 1),
(2, 'Drywall 6x3/4', 23, 1),
(3, 'Drywall 6x1', 26, 1),
(4, 'Drywall 6x1 1/4', 31, 1),
(5, 'Drywall 6x1 1/2', 32, 1),
(6, 'Drywall 6x1 5/8', 32, 1),
(7, 'Drywall 6x2', 40, 1),
(8, 'Drywall 6x2 1/4', 34, 1),
(9, 'Drywall 6x2 1/2', 53, 1),
(10, 'Drywall 6x3', 70, 1),
(11, 'Drywall 8x3/4', 32, 1),
(12, 'Drywall 8x1', 31, 1),
(13, 'Drywall 8x1 1/4', 43, 1),
(14, 'Drywall 8x1 1/2', 49, 1),
(15, 'Drywall 8x2', 62, 1),
(16, 'Drywall 8x2 1/2', 80, 1),
(17, 'Drywall 8x3', 76, 1),
(18, 'Drywall 8x3 1/2', 148, 1),
(19, 'Drywall 8x4', 148, 1),
(20, 'Drywall 10x1', 46, 1),
(21, 'Drywall 10x1 1/4', 71, 1),
(22, 'Drywall 10x1 1/2', 55, 1),
(23, 'Drywall 10x2', 74, 1),
(24, 'Drywall 10x2 1/2', 107, 1),
(25, 'Drywall 10x3', 124, 1),
(26, 'Drywall 10x3 1/2', 103, 1),
(27, 'Drywall 10x4', 103, 1),
(28, 'Drywall 6x1 R.F placa', 31, 1),
(29, 'Drywall 7x7/16 EST', 31, 1),
(30, 'Drywall Zincado 6x3/4', 23, 1),
(31, 'Drywall Zincado 6x5/8', 29, 1),
(32, 'Drywall Zincado 6x1', 28, 1),
(33, 'Drywall Zincado 6x1 1/4', 40, 1),
(34, 'Drywall Zincado 6x1 1/2', 49, 1),
(35, 'Drywall 7x1 5/8', 46, 1),
(36, 'Drywall Zincado 6x2', 49, 1),
(37, 'Drywall Zincado 6x2 1/2', 79, 1),
(38, 'Drywall Zincado 8x1', 42, 1),
(39, 'Drywall Zincado 8x1 1/4', 52, 1),
(40, 'Drywall Zincado 8x1 1/2', 54, 1),
(41, 'Drywall 7x2', 60, 1),
(42, 'Drywall Zincado 8x2 1/2', 85, 1),
(43, 'Drywall Zincado 10x2', 85, 1),
(44, 'Drywall 10x5', 221, 1),
(45, 'Drywall 10x6', 411, 1),
(46, 'Tornillo Lamina 4x1/4', 18, 1),
(47, 'Tornillo Lamina 4x1/2', 18, 1),
(48, 'Tornillo Lamina 4x1', 29, 1),
(49, 'Tornillo Lamina 6x1/2', 41, 1),
(50, 'Tornillo Lamina 6x3/4', 45, 1),
(51, 'Tornillo Lamina 6x1', 48, 1),
(52, 'Tornillo Lamina 6x1 1/4', 57, 1),
(53, 'Tornillo Lamina 6x1 1/2', 65, 1),
(54, 'Tornillo Lamina 6x2', 76, 1),
(55, 'Tornillo Lamina 8x1/2', 52, 1),
(56, 'Tornillo Lamina 8x3/4', 63, 1),
(57, 'Tornillo Lamina 8x1', 77, 1),
(58, 'Tornillo Lamina 8x1 1/4', 98, 1),
(59, 'Tornillo Lamina 8x1 1/2', 79, 1),
(60, 'Tornillo Lamina 8x2', 128, 1),
(61, 'Tornillo Lamina 8x2 1/2', 158, 1),
(62, 'Tornillo Lamina 8x3', 186, 1),
(63, 'Tornillo Lamina 10x1/2', 68, 1),
(64, 'Tornillo Lamina 10x3/4', 68, 1),
(65, 'Tornillo Lamina 10x1', 79, 1),
(66, 'Tornillo Lamina 10x1 1/4', 121, 1),
(67, 'Tornillo Lamina 10x1 1/2', 108, 1),
(68, 'Tornillo Lamina 10x2', 167, 1),
(69, 'Tornillo Lamina 10x2 1/2', 189, 1),
(70, 'Tornillo Lamina 10x3', 166, 1),
(71, 'Tornillo Lamina 12x1/2', 97, 1),
(72, 'Tornillo Lamina 12x3/4', 93, 1),
(73, 'Tornillo Lamina 12x1', 138, 1),
(74, 'Tornillo Lamina 12x1 1/4', 149, 1),
(75, 'Tornillo Lamina 12x1 1/2', 178, 1),
(76, 'Tornillo Lamina 12x2', 181, 1),
(77, 'Tornillo Lamina 12x2 1/2', 201, 1),
(78, 'Tornillo Lamina 12x3', 311, 1),
(79, 'Tornillo Lamina 14x1/2', 154, 1),
(80, 'Tornillo Lamina 14x3/4', 172, 1),
(81, 'Tornillo Lamina 14x1', 164, 1),
(82, 'Tornillo Lamina 14x1 1/2', 216, 1),
(83, 'Tornillo Lamina 14x2', 296, 1),
(84, 'Tornillo Lamina 14x2 1/2', 330, 1),
(85, 'Tornillo Lamina 14x3', 385, 1),
(86, 'Lamina Avellan 4x3/8', 29, 1),
(87, 'Lamina Avellan 4x1', 29, 1),
(88, 'Lamina Avellan 4x1/2', 14, 1),
(89, 'Lamina Avellan 6x1', 23, 1),
(90, 'Lamina Avellan 6x3/8', 25, 1),
(91, 'Lamina Avellan 6x2', 76, 1),
(92, 'Lamina Avellan 6x1 1/4', 57, 1),
(93, 'Lamina Avellan 6X1 1/2', 65, 1),
(94, 'Lamina Avellan 8x1/2', 45, 1),
(95, 'Lamina Avellan 8x3/4', 67, 1),
(96, 'Lamina Avellan 8x1', 68, 1),
(97, 'Lamina Avellan 8x1 1/4', 57, 1),
(98, 'Lamina Avellan 8x1 1/2', 91, 1),
(99, 'Lamina Avellan 8x2', 107, 1),
(100, 'Lamina Avellan 8x2 1/2', 103, 1),
(101, 'Lamina Avellan 6x1/2', 23, 1),
(102, 'Lamina Avellan con nervaduras 6x7/8', 50, 1),
(103, 'Lamina Avellan 10x1/2', 50, 1),
(104, 'Lamina Avellan 10x3/4', 77, 1),
(105, 'Lamina Avellan 10x1', 91, 1),
(106, 'Lamina Avellan 10x1 1/4', 99, 1),
(107, 'Lamina Avellan 10x1 1/2', 121, 1),
(108, 'Lamina Avellan 10x2', 139, 1),
(109, 'Lamina Avellan 10x2 1/2', 170, 1),
(110, 'Lamina Avellan 10x3', 203, 1),
(111, 'Lamina Avellan 12x3/4', 106, 1),
(112, 'Lamina Avellan 12x1', 110, 1),
(113, 'Lamina Avellan 12x1 1/2', 140, 1),
(114, 'Lamina Avellan 12x2', 186, 1),
(115, 'Lamina Avellan 12x2 1/2', 233, 1),
(116, 'Lamina Avellan 12x3', 281, 1),
(117, 'Lamina Avellan 14x1 1/4', 253, 1),
(118, 'Lamina Avellan 14x2', 250, 1),
(119, 'Lamina Avellan 14x2 1/2', 317, 1),
(120, 'Lamina Avellan 14x3', 360, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `contrasena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `contrasena`) VALUES
(1, 'admin', 123);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `factura_id` (`factura_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_cliente_2` (`id_cliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  ADD CONSTRAINT `detalles_factura_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `detalles_factura_ibfk_2` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`id`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
