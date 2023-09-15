-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2023 a las 03:16:16
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
-- Error leyendo la estructura de la tabla tornijohns.clientes: #1932 - Table &#039;tornijohns.clientes&#039; doesn&#039;t exist in engine
-- Error leyendo datos de la tabla tornijohns.clientes: #1064 - Algo está equivocado en su sintax cerca &#039;FROM `tornijohns`.`clientes`&#039; en la linea 1

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

--
-- Volcado de datos para la tabla `detalles_factura`
--

INSERT INTO `detalles_factura` (`id`, `factura_id`, `producto_id`, `cantidad`, `precio_unitario`, `total`) VALUES
(16, 14, 6, 2, 32, 64),
(17, 15, 6, 2, 32, 64),
(18, 16, 6, 2, 32, 64),
(19, 17, 6, 2, 32, 64),
(20, 18, 6, 2, 32, 64),
(21, 19, 10, 1, 70, 70),
(22, 19, 12, 200, 31, 6200),
(23, 20, 10, 1, 70, 70),
(24, 20, 12, 200, 31, 6200),
(25, 21, 10, 1, 70, 70),
(26, 21, 12, 200, 31, 6200),
(27, 22, 10, 1, 70, 70),
(28, 22, 12, 200, 31, 6200),
(29, 23, 10, 1, 70, 70),
(30, 23, 12, 200, 31, 6200),
(31, 24, 4, 1, 31, 31),
(32, 24, 12, 2, 31, 62),
(33, 25, 4, 2, 20, 40),
(34, 25, 15, 45, 62, 2790),
(35, 26, 6, 2, 32, 64),
(36, 26, 1, 4, 20, 80),
(37, 27, 6, 2, 32, 64),
(38, 27, 1, 4, 20, 80),
(39, 28, 6, 2, 32, 64),
(40, 28, 1, 4, 20, 80),
(41, 29, 6, 2, 32, 64),
(42, 29, 1, 4, 20, 80),
(43, 30, 6, 2, 32, 64),
(44, 30, 1, 4, 20, 80),
(45, 31, 6, 2, 32, 64),
(46, 31, 1, 4, 20, 80),
(47, 32, 6, 2, 32, 64),
(48, 32, 1, 4, 20, 80),
(49, 33, 6, 2, 32, 64),
(50, 33, 1, 4, 20, 80),
(51, 34, 6, 2, 32, 64),
(52, 34, 1, 4, 20, 80),
(53, 35, 6, 2, 32, 64),
(54, 35, 1, 4, 20, 80),
(55, 36, 3, 200, 26, 5200),
(56, 36, 6, 500, 32, 16000),
(57, 37, 5, 2, 32, 64),
(58, 37, 17, 5, 76, 380),
(59, 38, 6, 2, 32, 64),
(60, 38, 8, 3, 34, 102),
(61, 39, 6, 2, 32, 64),
(62, 39, 8, 3, 34, 102),
(63, 40, 6, 2, 32, 64),
(64, 40, 8, 3, 34, 102),
(65, 41, 6, 2, 32, 64),
(66, 41, 8, 3, 34, 102),
(67, 42, 6, 2, 32, 64),
(68, 42, 8, 3, 34, 102),
(69, 43, 6, 2, 32, 64),
(70, 43, 8, 3, 34, 102),
(71, 44, 6, 2, 32, 64),
(72, 44, 8, 3, 34, 102),
(73, 45, 6, 2, 32, 64),
(74, 45, 8, 3, 34, 102),
(75, 46, 6, 2, 32, 64),
(76, 46, 8, 3, 34, 102),
(77, 47, 6, 2, 32, 64),
(78, 47, 8, 3, 34, 102),
(79, 48, 6, 2, 32, 64),
(80, 48, 8, 3, 34, 102),
(81, 49, 6, 2, 32, 64),
(82, 49, 8, 3, 34, 102),
(83, 50, 6, 2, 32, 64),
(84, 50, 8, 3, 34, 102),
(85, 51, 6, 2, 32, 64),
(86, 51, 8, 3, 34, 102),
(87, 52, 6, 2, 32, 64),
(88, 52, 8, 3, 34, 102),
(89, 53, 6, 2, 32, 64),
(90, 53, 8, 3, 34, 102),
(91, 54, 6, 2, 32, 64),
(92, 54, 8, 3, 34, 102),
(93, 55, 6, 2, 32, 64),
(94, 55, 8, 3, 34, 102),
(95, 56, 6, 2, 32, 64),
(96, 56, 8, 3, 34, 102),
(97, 57, 6, 2, 32, 64),
(98, 57, 8, 3, 34, 102),
(99, 58, 3, 2, 26, 52),
(100, 58, 16, 22, 80, 1760),
(101, 58, 12, 200, 31, 6200),
(102, 58, 14, 300, 49, 14700),
(103, 58, 15, 500, 62, 31000),
(104, 58, 15, 200, 62, 12400),
(105, 59, 3, 2, 26, 52),
(106, 59, 16, 22, 80, 1760),
(107, 59, 12, 200, 31, 6200),
(108, 59, 14, 300, 49, 14700),
(109, 59, 15, 500, 62, 31000),
(110, 59, 15, 200, 62, 12400),
(111, 60, 3, 2, 26, 52),
(112, 60, 16, 22, 80, 1760),
(113, 60, 12, 200, 31, 6200),
(114, 60, 14, 300, 49, 14700),
(115, 60, 15, 500, 62, 31000),
(116, 60, 15, 200, 62, 12400),
(117, 61, 3, 2, 26, 52),
(118, 61, 16, 22, 80, 1760),
(119, 61, 12, 200, 31, 6200),
(120, 61, 14, 300, 49, 14700),
(121, 61, 15, 500, 62, 31000),
(122, 61, 15, 200, 62, 12400),
(123, 62, 1, 200, 20, 4000),
(124, 62, 2, 300, 23, 6900),
(125, 62, 3, 400, 26, 10400),
(126, 62, 4, 600, 31, 18600),
(127, 62, 5, 600, 32, 19200),
(128, 62, 9, 100, 53, 5300),
(129, 62, 11, 200, 32, 6400),
(130, 62, 13, 500, 43, 21500),
(131, 62, 16, 800, 80, 64000),
(132, 62, 17, 300, 76, 22800),
(133, 62, 12, 700, 31, 21700),
(134, 62, 6, 500, 32, 16000),
(135, 62, 10, 350, 70, 24500),
(136, 63, 1, 2, 20, 40),
(137, 63, 2, 2, 23, 46),
(138, 63, 3, 2, 26, 52),
(139, 63, 4, 4, 31, 124),
(140, 63, 6, 500, 32, 16000),
(141, 63, 11, 200, 32, 6400),
(142, 63, 18, 250, 148, 37000),
(143, 63, 36, 800, 49, 39200),
(144, 63, 45, 300, 411, 123300),
(145, 63, 31, 100, 29, 2900),
(146, 63, 46, 300, 18, 5400),
(147, 63, 55, 200, 52, 10400),
(148, 63, 120, 1, 360, 360),
(149, 63, 81, 400, 164, 65600),
(150, 63, 86, 50, 29, 1450),
(151, 63, 114, 200, 186, 37200),
(152, 63, 102, 1000, 50, 50000),
(153, 63, 119, 250, 317, 79250),
(154, 63, 111, 600, 106, 63600),
(155, 63, 95, 100, 67, 6700),
(156, 63, 87, 200, 29, 5800),
(157, 63, 35, 2000, 46, 92000),
(158, 63, 51, 2000, 48, 96000),
(159, 63, 65, 25, 79, 1975),
(160, 63, 50, 200, 45, 9000),
(161, 64, 1, 2, 20, 40),
(162, 64, 2, 2, 23, 46),
(163, 64, 3, 2, 26, 52),
(164, 64, 4, 4, 31, 124),
(165, 64, 6, 500, 32, 16000),
(166, 64, 11, 200, 32, 6400),
(167, 64, 18, 250, 148, 37000),
(168, 64, 36, 800, 49, 39200),
(169, 64, 45, 300, 411, 123300),
(170, 64, 31, 100, 29, 2900),
(171, 64, 46, 300, 18, 5400),
(172, 64, 55, 200, 52, 10400),
(173, 64, 120, 1, 360, 360),
(174, 64, 81, 400, 164, 65600),
(175, 64, 86, 50, 29, 1450),
(176, 64, 114, 200, 186, 37200),
(177, 64, 102, 1000, 50, 50000),
(178, 64, 119, 250, 317, 79250),
(179, 64, 111, 600, 106, 63600),
(180, 64, 95, 100, 67, 6700),
(181, 64, 87, 200, 29, 5800),
(182, 64, 35, 2000, 46, 92000),
(183, 64, 51, 2000, 48, 96000),
(184, 64, 65, 25, 79, 1975),
(185, 64, 50, 200, 45, 9000),
(186, 65, 1, 2, 20, 40),
(187, 65, 2, 2, 23, 46),
(188, 65, 3, 2, 26, 52),
(189, 65, 4, 4, 31, 124),
(190, 65, 6, 500, 32, 16000),
(191, 65, 11, 200, 32, 6400),
(192, 65, 18, 250, 148, 37000),
(193, 65, 36, 800, 49, 39200),
(194, 65, 45, 300, 411, 123300),
(195, 65, 31, 100, 29, 2900),
(196, 65, 46, 300, 18, 5400),
(197, 65, 55, 200, 52, 10400),
(198, 65, 120, 1, 360, 360),
(199, 65, 81, 400, 164, 65600),
(200, 65, 86, 50, 29, 1450),
(201, 65, 114, 200, 186, 37200),
(202, 65, 102, 1000, 50, 50000),
(203, 65, 119, 250, 317, 79250),
(204, 65, 111, 600, 106, 63600),
(205, 65, 95, 100, 67, 6700),
(206, 65, 87, 200, 29, 5800),
(207, 65, 35, 2000, 46, 92000),
(208, 65, 51, 2000, 48, 96000),
(209, 65, 65, 25, 79, 1975),
(210, 65, 50, 200, 45, 9000),
(211, 66, 47, 200, 18, 3600);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id` int(11) NOT NULL,
  `fecha_emision` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id`, `fecha_emision`, `id_cliente`) VALUES
(14, '2023-07-31 23:23:56', 1),
(15, '2023-07-31 23:25:24', 1),
(16, '2023-07-31 23:39:09', 1),
(17, '2023-07-31 23:39:13', 1),
(18, '2023-07-31 23:40:01', 1),
(19, '2023-08-01 07:48:08', 1),
(20, '2023-08-01 07:49:04', 1),
(21, '2023-08-01 07:51:38', 1),
(22, '2023-08-01 07:55:46', 1),
(23, '2023-08-01 07:56:51', 1),
(24, '2023-08-01 07:58:47', 1),
(25, '2023-08-01 08:04:23', 1),
(26, '2023-08-01 08:05:40', 1),
(27, '2023-08-01 08:05:53', 1),
(28, '2023-08-01 08:06:26', 1),
(29, '2023-08-01 08:07:16', 1),
(30, '2023-08-01 08:07:42', 1),
(31, '2023-08-01 08:11:09', 1),
(32, '2023-08-01 08:12:27', 1),
(33, '2023-08-01 08:13:28', 1),
(34, '2023-08-01 08:14:04', 1),
(35, '2023-08-01 08:18:25', 1),
(36, '2023-08-01 09:20:43', 1),
(37, '2023-08-01 13:44:18', 1),
(38, '2023-08-01 18:47:26', 1),
(39, '2023-08-01 18:52:09', 1),
(40, '2023-08-01 19:08:42', 1),
(41, '2023-08-01 19:11:22', 1),
(42, '2023-08-01 19:12:20', 1),
(43, '2023-08-01 19:13:03', 1),
(44, '2023-08-01 19:13:37', 1),
(45, '2023-08-01 19:15:45', 1),
(46, '2023-08-01 19:16:36', 1),
(47, '2023-08-01 19:18:01', 1),
(48, '2023-08-01 19:19:49', 1),
(49, '2023-08-01 19:20:31', 1),
(50, '2023-08-01 19:20:53', 1),
(51, '2023-08-01 19:21:24', 1),
(52, '2023-08-01 19:23:06', 1),
(53, '2023-08-01 19:24:18', 1),
(54, '2023-08-01 19:25:18', 1),
(55, '2023-08-01 19:26:20', 1),
(56, '2023-08-01 19:26:46', 1),
(57, '2023-08-01 19:27:04', 1),
(58, '2023-08-01 19:29:22', 1),
(59, '2023-08-01 19:30:59', 1),
(60, '2023-08-01 19:33:28', 1),
(61, '2023-08-01 19:34:15', 1),
(62, '2023-08-01 19:38:14', 1),
(63, '2023-08-02 17:17:51', 1),
(64, '2023-08-02 17:25:00', 1),
(65, '2023-08-02 17:26:09', 1),
(66, '2023-08-03 07:26:22', 1);

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
(1, 'samuel.canope@gmail.com', 123);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
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
  ADD KEY `id_cliente` (`id_cliente`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

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

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
