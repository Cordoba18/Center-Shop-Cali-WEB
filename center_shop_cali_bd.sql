-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2023 a las 08:15:27
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `center_shop_cali_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`id`, `calificacion`, `id_user`, `id_producto`) VALUES
(1, 4, 24, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_compras`
--

CREATE TABLE `carrito_compras` (
  `id` int(11) NOT NULL,
  `cantidad_producto` int(11) NOT NULL,
  `total` int(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `color` varchar(45) NOT NULL,
  `talla` varchar(10) NOT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito_compras`
--

INSERT INTO `carrito_compras` (`id`, `cantidad_producto`, `total`, `id_user`, `id_producto`, `color`, `talla`, `estado`) VALUES
(1, 1, 60000, 8, 1, '', '', 'inactivo'),
(2, 1, 9000, 8, 3, '', '', 'inactivo'),
(3, 1, 40000, 8, 2, '', '', 'inactivo'),
(4, 1, 60000, 8, 1, '', '', 'inactivo'),
(5, 1, 20000, 8, 4, '', '', 'inactivo'),
(6, 1, 5000, 8, 8, '', '', 'inactivo'),
(7, 1, 90000, 8, 10, '', '', 'inactivo'),
(8, 1, 120000, 8, 6, 'null', 'null', 'inactivo'),
(9, 1, 240000, 8, 1, 'NARANJA', '41', 'inactivo'),
(10, 1, 45000, 8, 8, 'null', 'null', 'inactivo'),
(11, 8, 720000, 8, 1, 'MORADAS', '39', 'inactivo'),
(12, 2, 18000, 8, 6, 'null', 'null', 'inactivo'),
(13, 8, 288000, 8, 9, 'null', 'null', 'inactivo'),
(14, 4, 960000, 8, 10, 'null', 'null', 'inactivo'),
(15, 12, 1440000, 8, 3, 'null', 'null', 'inactivo'),
(16, 4, 360000, 8, 11, 'null', 'null', 'inactivo'),
(17, 1, 90000, 8, 1, 'MORADAS', '39', 'inactivo'),
(18, 1, 120000, 8, 6, 'null', 'null', 'inactivo'),
(19, 1, 240000, 8, 1, 'MORADAS', '39', 'inactivo'),
(20, 1, 120000, 8, 6, 'null', 'null', 'inactivo'),
(21, 1, 432243, 8, 14, 'null', 'null', 'inactivo'),
(22, 11, 4754673, 8, 14, 'null', 'null', 'inactivo'),
(23, 10, 4322430, 8, 14, 'null', 'null', 'inactivo'),
(24, 6, 540000, 8, 10, 'null', 'null', 'inactivo'),
(25, 4, 36000, 8, 3, 'ESTILO', 'null', 'inactivo'),
(26, 1, 90000, 8, 9, 'null', 'null', 'inactivo'),
(27, 10, 450000, 8, 8, 'null', 'null', 'inactivo'),
(28, 1, 40000, 8, 7, 'null', 'null', 'inactivo'),
(29, 1, 40000, 8, 7, 'null', 'null', 'inactivo'),
(30, 1, 45000, 8, 8, 'null', 'null', 'inactivo'),
(31, 5, 200000, 8, 15, 'GATOLO', 'null', 'inactivo'),
(32, 9, 360000, 8, 7, 'null', 'null', 'inactivo'),
(33, 8, 320000, 20, 4, 'null', 'null', 'inactivo'),
(34, 1, 40000, 20, 7, 'null', 'null', 'inactivo'),
(35, 2, 80000, 20, 2, 'null', 'null', 'inactivo'),
(36, 1, 40000, 20, 7, 'null', 'null', 'inactivo'),
(37, 1, 180000, 20, 15, 'GATOLO', 'null', 'inactivo'),
(38, 1, 40000, 21, 7, 'null', 'null', 'inactivo'),
(39, 1, 45000, 8, 42, 'null', 'null', 'inactivo'),
(40, 1, 60000, 8, 31, 'null', 'null', 'inactivo'),
(41, 1, 70000, 8, 39, 'null', 'null', 'inactivo'),
(42, 1, 45000, 8, 42, 'null', 'null', 'activo'),
(43, 1, 40000, 8, 17, 'null', 'null', 'inactivo'),
(44, 1, 40000, 8, 26, 'null', 'null', 'activo'),
(45, 1, 90000, 8, 10, 'null', 'null', 'inactivo'),
(46, 1, 16000, 8, 20, 'null', 'null', 'inactivo'),
(47, 1, 200000, 8, 34, 'null', 'null', 'inactivo'),
(48, 1, 24000, 8, 32, 'null', 'null', 'inactivo'),
(49, 1, 40000, 24, 26, 'null', 'null', 'activo'),
(50, 1, 90000, 8, 9, 'null', 'null', 'inactivo'),
(51, 1, 200000, 8, 34, 'null', 'null', 'inactivo'),
(52, 1, 200000, 8, 34, 'null', 'null', 'activo'),
(53, 1, 90000, 8, 28, 'null', 'null', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'Zapatillas'),
(2, 'Pantalones'),
(3, 'Camisas'),
(4, 'Gorras'),
(5, 'Gafas'),
(6, 'Conjuntos Hombre'),
(7, 'Conjuntos Mujer'),
(8, 'Conjuntos Juvenil'),
(9, 'Buso-Saco-Chaqueta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `id` int(11) NOT NULL,
  `color` varchar(45) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id`, `color`, `id_producto`, `id_empresa`, `imagen`, `estado`) VALUES
(1, 'MORADAS', 1, 4, 'moradas.jpg', 'activo'),
(2, 'NARANJA', 1, 4, 'Air_Force_1__07_Lv8_-_Naranja.png', 'activo'),
(3, 'AZUL', 1, 4, 'png-transparent-air-force-1-nike-air-max-skate-shoe-sneakers-nike-blue-white-leather.png', 'activo'),
(4, 'NEGRO', 1, 4, 'nike-air-force-1-sketch-release-date-price-011.webp', 'activo'),
(5, 'BLACO', 1, 4, 'zapatillasNike.jpg', 'activo'),
(6, 'MEJOR ESTILO', 3, 11, 'TNAMztAUz+ckpbWHQDMvsa31xDXGSkSAHMT/uVU/S/eIKDwtJsP+f925ve2/JZ4Me1.jpg', 'inactivo'),
(7, 'ESTILO', 3, 11, 'NLIbNnahNEu7Wc0MzyZuDWAc1cR2o5YXVttpU+rA8po=UA.jpg', 'activo'),
(8, 'GATOLO', 15, 9, '7ma.png', 'activo'),
(9, 'Verde', 17, 22, '8_2023-04-26_23_44_08.png', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(11) NOT NULL,
  `c_productos` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `fecha` varchar(11) NOT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_productos`
--

CREATE TABLE `imagenes_productos` (
  `id` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes_productos`
--

INSERT INTO `imagenes_productos` (`id`, `imagen`, `id_empresa`, `id_producto`, `estado`) VALUES
(1, 'melas.jpeg', 4, 1, 'inactivo'),
(2, 'zapatillasNike.jpg', 4, 1, 'inactivo'),
(3, 'nini.jpg', 4, 1, 'inactivo'),
(4, 'fc18c543cf4201088660706a3a50b4e1.jpg', 11, 2, 'activo'),
(5, 'UZLO0zE5RyvIoXYwb7t5Xtb7oN771hCTE3I3hJdwaFg=UA.jpg', 11, 3, 'activo'),
(6, '5488e151f8108f33a643120177cb66ac.jpg', 11, 4, 'activo'),
(7, '4758db0db440f5ba60c698dfb65b6787_tn.jpg', 5, 5, 'inactivo'),
(8, 'nikkkeeeeee.jpg', 4, 6, 'inactivo'),
(9, 'descarga.jpg', 4, 6, 'inactivo'),
(10, 'CamisaVersace.jpg', 6, 7, 'activo'),
(11, 'e0931f36b0d18c2c45f730a1964f6f81.jpg', 6, 8, 'activo'),
(12, '344661dacafd301c71f7e7f7b507e215.jpg', 13, 9, 'activo'),
(13, '8fcdfe218613075f6aeef87396ef09a9.jpg', 13, 10, 'activo'),
(14, '2195_5ee7b572651f8-WhatsApp_Image_2020-06-15_at_12.29.02_PM_(4).jpeg', 4, 11, 'inactivo'),
(15, '923bd300bc5bbfafa197de23d3fa7bb3.jpg', 4, 11, 'inactivo'),
(16, 'f356a106e4076856e08054fa4d873f05.jpg', 4, 11, 'inactivo'),
(17, 'MtaZoeoUN0XQ9Fjhe2aGW/ilZ/AXW1wdgKXBrcdPLbo=.png', 9, 12, 'inactivo'),
(18, 'CanT/RiTdid2KostPmxMkg==.png', 9, 13, 'inactivo'),
(19, '14_2023-02-24_11_33_44.jpg', 9, 14, 'inactivo'),
(20, 'zapatillasNike.jpg', 11, 3, 'inactivo'),
(21, '7xfhNjqRB07mU/baBYz+Y1W7y7vrrLj5tFRa9Ky1mTM=ke.jpg', 9, 14, 'inactivo'),
(22, '/CorZzPae7v+/j8R8TjAnYw/Ui9encMQRubbz+N6UAk=ke.jpg', 9, 14, 'inactivo'),
(23, '3ikpsxPTQt9UT5tz23nQPDhgqFuNZjJQM1DjoMBOzys=6).png', 9, 14, 'inactivo'),
(24, 'QmOZ4Iu/LreZvaGSoM9FFQ==14.png', 9, 14, 'inactivo'),
(25, 'k4jZ0BVus5SVR4GWcdwZHHAzl4XSoVAHhI6NUweFvoY=9).png', 9, 14, 'inactivo'),
(26, '15_1.png', 9, 15, 'inactivo'),
(27, '26_1.png', 9, 15, 'inactivo'),
(28, '27ng.png', 9, 15, 'inactivo'),
(29, '28_1.png', 9, 15, 'inactivo'),
(30, '29AS.png', 9, 15, 'inactivo'),
(31, '15_2023-03-02_17_19_53.png', 6, 16, 'activo'),
(32, '16_2023-04-19_02_42_59.png', 22, 17, 'activo'),
(33, '18_2023-04-19_02_48_36.png', 22, 18, 'activo'),
(34, '18_2023-04-19_02_44_08.png', 22, 19, 'activo'),
(35, '19_2023-04-19_02_45_06.png', 22, 20, 'activo'),
(36, '20_2023-04-19_02_51_56.png', 22, 21, 'activo'),
(37, '21_2023-04-19_02_52_34.png', 22, 22, 'activo'),
(38, '22_2023-04-19_02_53_28.jpg', 22, 23, 'activo'),
(39, '23_2023-04-19_02_53_58.jpg', 22, 24, 'activo'),
(40, '24_2023-04-19_02_55_29.png', 23, 25, 'activo'),
(41, '25_2023-04-19_02_56_04.png', 23, 26, 'activo'),
(42, '26_2023-04-19_02_57_10.jpg', 23, 27, 'activo'),
(43, '27_2023-04-19_03_04_20.jpg', 9, 28, 'activo'),
(44, '28_2023-04-19_03_05_04.jpg', 9, 29, 'activo'),
(45, '29_2023-04-19_03_06_29.jpg', 9, 30, 'activo'),
(46, '30_2023-04-19_03_10_45.jpg', 6, 31, 'activo'),
(47, '31_2023-04-19_03_11_15.png', 6, 32, 'activo'),
(48, '32_2023-04-19_03_12_38.png', 7, 33, 'activo'),
(49, '33_2023-04-19_03_13_38.png', 7, 34, 'activo'),
(50, '34_2023-04-19_03_14_13.png', 7, 35, 'activo'),
(51, '35_2023-04-19_03_16_38.jpg', 11, 36, 'activo'),
(52, '36_2023-04-19_03_17_15.jpg', 11, 37, 'activo'),
(53, '37_2023-04-19_03_17_54.jpg', 11, 38, 'activo'),
(54, '38_2023-04-19_03_21_49.png', 12, 39, 'activo'),
(55, '39_2023-04-19_03_22_13.png', 12, 40, 'activo'),
(56, '40_2023-04-19_03_22_48.png', 12, 41, 'activo'),
(57, '41_2023-04-19_03_23_15.png', 12, 42, 'activo'),
(58, '42_2023-04-19_03_23_45.jpg', 12, 43, 'activo'),
(59, '43_2023-04-19_03_24_13.jpg', 12, 44, 'activo'),
(60, '44_2023-04-19_03_24_52.png', 12, 45, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_deseos`
--

CREATE TABLE `lista_deseos` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lista_deseos`
--

INSERT INTO `lista_deseos` (`id`, `id_user`, `id_producto`, `estado`) VALUES
(1, 8, 1, 'inactivo'),
(2, 8, 2, 'inactivo'),
(3, 8, 1, 'inactivo'),
(4, 8, 2, 'inactivo'),
(5, 8, 1, 'inactivo'),
(6, 8, 3, 'inactivo'),
(7, 8, 2, 'inactivo'),
(8, 8, 4, 'inactivo'),
(9, 8, 2, 'inactivo'),
(10, 8, 6, 'inactivo'),
(11, 8, 11, 'inactivo'),
(12, 8, 5, 'inactivo'),
(13, 8, 7, 'inactivo'),
(14, 8, 6, 'inactivo'),
(15, 8, 3, 'inactivo'),
(16, 8, 11, 'inactivo'),
(17, 8, 4, 'inactivo'),
(18, 8, 8, 'inactivo'),
(19, 8, 8, 'inactivo'),
(20, 8, 14, 'inactivo'),
(21, 8, 14, 'inactivo'),
(22, 8, 9, 'inactivo'),
(23, 8, 8, 'inactivo'),
(24, 8, 7, 'activo'),
(25, 8, 2, 'activo'),
(26, 8, 3, 'activo'),
(27, 8, 10, 'activo'),
(28, 20, 2, 'activo'),
(29, 20, 7, 'activo'),
(30, 21, 15, 'inactivo'),
(31, 8, 27, 'activo'),
(32, 8, 8, 'activo'),
(33, 24, 8, 'activo'),
(34, 24, 4, 'activo'),
(35, 8, 4, 'activo'),
(36, 8, 28, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos_pago`
--

CREATE TABLE `metodos_pago` (
  `id` int(11) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `n_tarjeta` varchar(11) NOT NULL,
  `name_titular` varchar(45) NOT NULL,
  `fecha_e` varchar(10) NOT NULL,
  `c_tarjeta` varchar(3) NOT NULL,
  `id_user` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `precio` int(11) NOT NULL,
  `descuento` int(11) DEFAULT NULL,
  `descripcion` varchar(45) NOT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `n_p_calificaron` int(11) DEFAULT NULL,
  `categoria` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `descuento`, `descripcion`, `calificacion`, `n_p_calificaron`, `categoria`, `id_empresa`, `estado`) VALUES
(1, 'Air Force One', 300000, 20, 'ewgewrwerew', NULL, NULL, 1, 4, 'inactivo'),
(2, 'Gafas Asthetic', 40000, 0, 'Las mejores gafas', NULL, NULL, 5, 11, 'activo'),
(3, 'Gafas de sol', 9000, 0, 'Las mejores gafas anti sol', NULL, NULL, 5, 11, 'activo'),
(4, 'Gafas de lujo', 200000, 10, 'Las mejores que existen', NULL, NULL, 5, 11, 'activo'),
(5, 'Camiseta Hurbana', 56000, 0, 'sfggwegewgwe', NULL, NULL, 3, 5, 'inactivo'),
(6, 'Retro One', 120000, 0, 'Las mejorcitas', NULL, NULL, 1, 4, 'inactivo'),
(7, 'Camisa Versace', 40000, 0, 'kcaskjklokfjokwefw', NULL, NULL, 3, 6, 'activo'),
(8, 'Gorras de moda', 50000, 10, 'Hermosas gorras', NULL, NULL, 4, 6, 'activo'),
(9, 'Jeans Mujer', 90000, 0, 'sfwefwefewf', NULL, NULL, 2, 13, 'activo'),
(10, 'Jeans de hombre', 90000, 0, 'sdsfwefwefw', NULL, NULL, 2, 13, 'activo'),
(11, 'Promocion Camisetas Nike', 40000, 10, 'wefwegwegewgw', NULL, NULL, 3, 4, 'inactivo'),
(12, 'CHIBIRI', 3000, 0, 'DSFDSGFWE', NULL, NULL, 2, 9, 'inactivo'),
(13, 'ggwegfew', 24234324, 0, 'fdgergre', NULL, NULL, 1, 9, 'inactivo'),
(14, 'Zapatillas azules', 432243, 0, 'jbihjijij', NULL, NULL, 1, 9, 'inactivo'),
(15, 'Gatico', 40000, 0, 'rereret', NULL, NULL, 4, 9, 'inactivo'),
(16, 'Kenny', 2000, 50, 'Juego futboll', NULL, NULL, 1, 6, 'inactivo'),
(17, 'Zapatilla One', 40000, 0, 'Las care perro', 4, 1, 1, 22, 'activo'),
(18, 'Levanta Bandidas', 7000, 20, 'Holis', NULL, NULL, 1, 22, 'activo'),
(19, 'Las insanas pa', 80000, 90, 'Chi', NULL, NULL, 3, 22, 'activo'),
(20, 'Air Force Kellimporta', 20000, 20, 'Hola que mas', NULL, NULL, 8, 22, 'activo'),
(21, 'Lindas nike', 24145, 29, 'gweghwegweg', NULL, NULL, 1, 22, 'activo'),
(22, 'Hermosas Nike', 20000, 0, 'Lindas nike melas pa ya sabe ', NULL, NULL, 1, 22, 'activo'),
(23, 'Hermosas Pisa Huevo', 300000, 27, 'Hermosa pa', NULL, NULL, 1, 22, 'activo'),
(24, 'Pero que bendicion de nikes', 45000, 0, 'Mh', NULL, NULL, 1, 22, 'activo'),
(25, 'Retro One', 90000, 0, 'Hermosas Nike', NULL, NULL, 1, 23, 'activo'),
(26, 'Retro Once pa', 200000, 80, 'Chill', NULL, NULL, 1, 23, 'activo'),
(27, 'Ricas Zapas', 70000, 20, 'Hermosas', NULL, NULL, 1, 23, 'activo'),
(28, 'Conjunto hermoso de mujer', 90000, 0, 'hermoso conjuntos', NULL, NULL, 7, 9, 'activo'),
(29, 'Conjunto Estilo Party', 20000, 30, 'gewgweg', NULL, NULL, 7, 9, 'activo'),
(30, 'Conjunto Gramuroso', 190000, 20, 'Mejores conjunticos', NULL, NULL, 7, 9, 'activo'),
(31, 'Hermosa Camisa Versace', 60000, 0, 'Hermosa', NULL, NULL, 3, 6, 'activo'),
(32, 'Preciosa Camiseta', 30000, 20, 'Hermosa camiseta versace', NULL, NULL, 3, 6, 'activo'),
(33, 'Camiseta Gucci Praga', 30000, 0, 'Hermosas camisetas', NULL, NULL, 3, 7, 'activo'),
(34, 'Saco Tela Fria', 200000, 0, 'Hermoso saco', NULL, NULL, 9, 7, 'activo'),
(35, 'Beisbolera En Cuero', 200000, 20, 'beisbolera mela', NULL, NULL, 9, 7, 'activo'),
(36, 'Conjunto Melo', 90000, 0, 'Hermoso', NULL, NULL, 6, 11, 'activo'),
(37, 'Conjunto de lujo', 580000, 70, 'Hermoso Conjunto de lujo', NULL, NULL, 6, 11, 'activo'),
(38, 'Conjunto Chimba', 70000, 20, 'Chimbis', NULL, NULL, 6, 11, 'activo'),
(39, 'Adidas Bad Bunny', 70000, 0, 'Hola q mas', NULL, NULL, 1, 12, 'activo'),
(40, 'Zapatillas Adidas', 80000, 20, 'Hermosas', NULL, NULL, 1, 12, 'activo'),
(41, 'Ultima Oferta En Adidas', 80000, 10, 'Hermosas zapas', NULL, NULL, 1, 12, 'activo'),
(42, 'Adidas de locura', 90000, 50, 'Mejores adidas', NULL, NULL, 1, 12, 'activo'),
(43, 'Hermosas Gorras Insanas', 200000, 30, 'Chill', NULL, NULL, 4, 12, 'activo'),
(44, 'Gorra Adidas de marca', 20000, 30, 'Hermosas', NULL, NULL, 4, 12, 'activo'),
(45, 'Gorro Adidas Melo', 20000, 20, 'Hermosas Adidas de antologia', NULL, NULL, 4, 12, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_actividades`
--

CREATE TABLE `registro_actividades` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tabla` varchar(45) NOT NULL,
  `detalle` varchar(45) NOT NULL,
  `fecha` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `Rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `Rol`) VALUES
(1, 'Usuario'),
(2, 'Empresa'),
(3, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `info` varchar(45) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `slider`
--

INSERT INTO `slider` (`id`, `nombre`, `info`, `imagen`, `estado`) VALUES
(1, 'Los Mejores Descuentos', '40%', 'UUuDZ0n6bP5qqgTT3Xpj1A==29.png', 'activo'),
(2, 'YA NO TIENES QUE CORRER', 'COMPRA DESDE CASA ', 'Centro.jpg', 'activo'),
(3, 'LOS MEJORES PRODUCTOS', 'DISFRUTA', 'dragon-ball-super-broly-1577739305.jpg', 'activo'),
(4, 'EL CENTRO', 'TE VISTE BIEN', 'images.jpg', 'activo'),
(5, 'LOS MEJORES DADOS', 'DADOS CHILL', '5_1.png', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE `tallas` (
  `id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `talla` varchar(10) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tallas`
--

INSERT INTO `tallas` (`id`, `cantidad`, `talla`, `id_producto`, `id_empresa`, `estado`) VALUES
(1, 4, '39', 1, 4, 'activo'),
(2, 2, '40', 1, 4, 'activo'),
(3, 9, '41', 1, 4, 'activo'),
(4, 3, '42', 1, 4, 'activo'),
(5, 20, '43', 1, 4, 'activo'),
(6, 7, '43', 17, 22, 'activo'),
(7, 5, '22', 17, 22, 'activo'),
(8, 25, '42 EURO', 17, 22, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `f_nacimiento` varchar(10) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `n_propietario` varchar(45) DEFAULT NULL,
  `cedula` varchar(11) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `Roles_id` int(11) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `correo`, `contrasena`, `f_nacimiento`, `telefono`, `n_propietario`, `cedula`, `direccion`, `logo`, `Roles_id`, `estado`) VALUES
(3, 'Jhan Carlos', 'jccq12@gmail.com', 'ENh/iY4y8phucEWDP7Thrg==', NULL, NULL, NULL, NULL, NULL, NULL, 3, 'activo'),
(4, 'Nike', 'nikepelle@gmail.com', 'ENh/iY4y8phucEWDP7Thrg==', NULL, '3043711546', 'Alfonos', '324325323', '24 # 12 / 2b', 'CanT/RiTdid2KostPmxMkg==.png', 2, 'inactivo'),
(5, 'Puma', 'puma@gmail.com', 'ENh/iY4y8phucEWDP7Thrg==', NULL, '3043711546', 'Alex', '23523122', '23 # 12 / 34g', 'uArsJoX0duBNWbsg/NPXew==ma.png', 2, 'inactivo'),
(6, 'Versace', 'versace@gmail.com', 'ENh/iY4y8phucEWDP7Thrg==', NULL, '300021432', 'Isabella', '253413221', '20 # 21 / 301', '6_2023-04-19_03_02_03.png', 2, 'activo'),
(7, 'Gucci', 'gucci@gmail.com', 'ENh/iY4y8phucEWDP7Thrg==', NULL, '32532512', 'Jaime', '325234214', '23 # 10 / 35', 'Gucci-Logo-Free-PNG.png', 2, 'activo'),
(8, 'Jhan Carlos', 'jhon@gmail.com', 'ENh/iY4y8phucEWDP7Thrg==', '20/12/1992', '3043711546', NULL, '1111663045', 'calle 28 #86-29', NULL, 1, 'activo'),
(9, 'CORQUI', 'corqui10@gmail.com', 'ENh/iY4y8phucEWDP7Thrg==', NULL, '3043711546', 'Pamela', '2143242354', '28 # 86 / 29', 'corqui.png', 2, 'activo'),
(10, 'Reebook', 'reebook@gmail.com', 'ENh/iY4y8phucEWDP7Thrg==', NULL, '3043711546', 'Jorge', '234213213', '29 # 33 / 23', 'logo-Reebok.png', 2, 'activo'),
(11, 'Falabella', 'falabella@gmail.com', 'ENh/iY4y8phucEWDP7Thrg==', NULL, '3122479836', 'Linda', '2413412421', '34 # 40 / 26', 'iQ6HlUU6N+5Cy3GS6nCZkunkXLl+bvlEds4aFUvK010===.png', 2, 'activo'),
(12, 'Adidas', 'adidas@gmail.com', 'ENh/iY4y8phucEWDP7Thrg==', NULL, '32432432', 'Alexander Arnold', '42342342', '24 # 2b / 23', 'Adidas_logo.png', 2, 'activo'),
(13, 'Calvin Klein', 'klein@gmail.com', 'ENh/iY4y8phucEWDP7Thrg==', NULL, '3214324', 'Keylor', '12424242', '24 # 231 / 12b', 'CK_Calvin_Klein_logo.svg.png', 2, 'activo'),
(14, 'Gordon Blue', 'gordon@gmail.com', 'ENh/iY4y8phucEWDP7Thrg==', NULL, '3543654634', 'ewtewt', '25324324', '21 # 32 / 63', '1ZTF4mGO0STV86hvTVkIbg==.png', 2, 'inactivo'),
(15, 'CULIACAN', 'culiacan@gmail.com', 'ENh/iY4y8phucEWDP7Thrg==', NULL, '4543525', 'HGGUUUY', '5767676767', '78 # 68 / 07', 'ORlIOqzj1hwK6lTUc4lj1g==.png', 2, 'inactivo'),
(16, 'ZAPATILLAS EL PAISA', 'zapatillas@gmail.com', 'ENh/iY4y8phucEWDP7Thrg==', NULL, '3243252', 'EWRWEREW', '23424321', '12 # 42 / 12', '3mPdvFAxK0ChmFv77FF34ziVTKfw3oJ/JUimKp2RymdMPFX5WgBGaL/uVLT5mz3EJTP0OuD7CbbCRhi9ufwhdw==.png', 2, 'inactivo'),
(17, 'Nike', 'nikemalo@gmail.com', 'ENh/iY4y8phucEWDP7Thrg==', NULL, '3214215', 'rwgewgwegwe', '2532532532', '24 # 35 / 12n', '0ug1FaoWXRWl4SwHwOmzkdtJzlQnwifmYm7sHM/gN34=ke.jpg', 2, 'inactivo'),
(18, 'SIMSONPS', 'sim@gmail.com', 'ENh/iY4y8phucEWDP7Thrg==', NULL, '32532523', 'Alejandro', '23425325', '25 # 23 / 12', '17ng.png', 2, 'inactivo'),
(19, 'Dadis', 'dadis@gmail.com', 'ENh/iY4y8phucEWDP7Thrg==', NULL, '312421512', 'Carlos Paz', '34523522', '23 # 234 / 24', '19_2023-02-24_11_25_27.png', 2, 'inactivo'),
(20, 'Valentina', 'valen@gmail.com', 'ENh/iY4y8phucEWDP7Thrg==', '17/01/2004', '3423423', NULL, '1111538449', 'Calle CastroSerna 5', NULL, 1, 'activo'),
(21, 'Kenny David', 'kenny@gmail.com', 'ENh/iY4y8phucEWDP7Thrg==', '02/01/2002', '3173624335', NULL, NULL, NULL, NULL, 1, 'activo'),
(22, 'Nike', 'nike@gmail.com', 'ENh/iY4y8phucEWDP7Thrg==', NULL, '3043711546', 'Jhan Carlos', '1111663045', '18 # 26 / 345', '21_2023-04-19_02_39_51.png', 2, 'activo'),
(23, 'JORDAN', 'jordan@gmail.com', 'ENh/iY4y8phucEWDP7Thrg==', NULL, '4325235', 'Raul', '4523543252', '23 # 35n / 24b', '22_2023-04-19_02_40_46.png', 2, 'activo'),
(24, 'jhan carlos', 'jhanca18@gmail.com', 'ENh/iY4y8phucEWDP7Thrg==', '01/02/2005', '3515143', NULL, NULL, NULL, NULL, 1, 'activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_calificacion_Users1_idx` (`id_user`),
  ADD KEY `fk_calificacion_productos1_idx` (`id_producto`);

--
-- Indices de la tabla `carrito_compras`
--
ALTER TABLE `carrito_compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_carrito_compras_Users1_idx` (`id_user`),
  ADD KEY `fk_carrito_compras_productos1_idx` (`id_producto`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_colores_productos1_idx` (`id_producto`),
  ADD KEY `fk_colores_Users1_idx` (`id_empresa`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_factura_Users1_idx` (`id_empresa`);

--
-- Indices de la tabla `imagenes_productos`
--
ALTER TABLE `imagenes_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Imagenes_productos_Users1_idx` (`id_empresa`),
  ADD KEY `fk_Imagenes_productos_productos1_idx` (`id_producto`);

--
-- Indices de la tabla `lista_deseos`
--
ALTER TABLE `lista_deseos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lista_deseos_Users1_idx` (`id_user`),
  ADD KEY `fk_lista_deseos_productos1_idx` (`id_producto`);

--
-- Indices de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_metodos_pago_Users1_idx` (`id_user`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_productos_Users1_idx` (`id_empresa`),
  ADD KEY `fk_productos_categorias1_idx` (`categoria`);

--
-- Indices de la tabla `registro_actividades`
--
ALTER TABLE `registro_actividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_registro_actividades_Users1_idx` (`id_user`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tallas_productos1_idx` (`id_producto`),
  ADD KEY `fk_tallas_Users1_idx` (`id_empresa`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Users_Roles_idx` (`Roles_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `carrito_compras`
--
ALTER TABLE `carrito_compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes_productos`
--
ALTER TABLE `imagenes_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `lista_deseos`
--
ALTER TABLE `lista_deseos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `registro_actividades`
--
ALTER TABLE `registro_actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `fk_calificacion_Users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_calificacion_productos1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `carrito_compras`
--
ALTER TABLE `carrito_compras`
  ADD CONSTRAINT `fk_carrito_compras_Users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carrito_compras_productos1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `colores`
--
ALTER TABLE `colores`
  ADD CONSTRAINT `fk_colores_Users1` FOREIGN KEY (`id_empresa`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_colores_productos1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_factura_Users1` FOREIGN KEY (`id_empresa`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `imagenes_productos`
--
ALTER TABLE `imagenes_productos`
  ADD CONSTRAINT `fk_Imagenes_productos_Users1` FOREIGN KEY (`id_empresa`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Imagenes_productos_productos1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `lista_deseos`
--
ALTER TABLE `lista_deseos`
  ADD CONSTRAINT `fk_lista_deseos_Users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lista_deseos_productos1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  ADD CONSTRAINT `fk_metodos_pago_Users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_Users1` FOREIGN KEY (`id_empresa`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_categorias1` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registro_actividades`
--
ALTER TABLE `registro_actividades`
  ADD CONSTRAINT `fk_registro_actividades_Users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD CONSTRAINT `fk_tallas_Users1` FOREIGN KEY (`id_empresa`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tallas_productos1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_Users_Roles` FOREIGN KEY (`Roles_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
