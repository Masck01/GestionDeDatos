
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbfarmacia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas`
--

CREATE TABLE `cajas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('abierta','cerrada') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cerrada',
  `saldoPesos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldoDolares` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cajas`
--

INSERT INTO `cajas` (`id`, `nombre`, `estado`, `saldoPesos`, `saldoDolares`, `created_at`, `updated_at`) VALUES
(1, 'Caja DHS', 'abierta', '81390.5', '320500', '2020-09-08 20:40:52', '2020-10-21 00:53:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacidades`
--

CREATE TABLE `capacidades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `estado` enum('Activo','Inactivo') DEFAULT 'Activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `capacidades`
--

INSERT INTO `capacidades` (`id`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
(1, '50 mg', 'Activo', '2020-10-22 00:29:13', '2020-10-22 00:29:13'),
(2, '85 mg', 'Inactivo', '2020-10-22 00:29:28', '2020-10-22 00:30:49'),
(3, '100 mg', 'Activo', '2020-10-22 00:29:39', '2020-10-22 00:29:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Celulares', 'Inactivo', '2020-09-09 23:07:33', '2020-10-02 01:44:58'),
(2, 'Computadoras', 'Activo', '2020-10-02 00:52:37', '2020-10-21 01:28:19'),
(3, 'Motorolas', 'Activo', '2020-10-02 00:53:00', '2020-10-21 01:26:31'),
(4, 'Tablets', 'Activo', '2020-10-02 00:53:15', '2020-10-02 00:53:30'),
(5, 'Celular', 'Inactivo', '2020-10-02 01:19:03', '2020-10-02 01:45:09'),
(6, 'Celulares', 'Activo', '2020-10-02 01:43:59', '2020-10-02 23:16:48'),
(7, 'Fragancias', 'Activo', '2020-10-02 02:14:31', '2020-10-22 01:23:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cedes`
--

CREATE TABLE `cedes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domicilio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cliente_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_Fantasia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razon_Social` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuit_cuil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefonos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagina_web` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_postal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero` enum('masculino','femenino','otro') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'otro',
  `tipo` enum('persona','empresa') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'persona',
  `provincia_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre_Fantasia`, `razon_Social`, `cuit_cuil`, `telefonos`, `email`, `pagina_web`, `direccion`, `ciudad`, `codigo_postal`, `genero`, `tipo`, `provincia_id`, `created_at`, `updated_at`) VALUES
(1, 'Cliente Sin Registrar', 'Cliente Sin Registrar', '00000000', '0000000', 'No Posee', NULL, 'Calle Falsa 1234', 'San Miguel de Tucuman', '1234', 'otro', 'persona', 23, '2020-09-09 23:34:47', '2020-09-09 23:34:47'),
(6, 'Maccedo Virginia Natalia', 'Virginia Natalia', '3356971', '42325512', 'virginia3@gmail.com', NULL, 'Humaita 1', 'La Trinidad', '4110', 'femenino', '', 23, '2020-10-07 00:37:28', '2020-10-07 00:37:28'),
(7, 'Rasgido Franco', 'Franco', '1111111', '42325512', 'franco@gmail.com', NULL, 'San Martin 65', 'Concepcion', '4000', 'masculino', '', 23, '2020-10-09 01:31:28', '2020-10-09 01:31:28'),
(9, 'romano gustavo', 'gustavo', '1111111', '42325512', 'franco@gmail.com', NULL, 'San Martin 65', 'Concepcion', '4000', 'masculino', '', 23, '2020-10-09 01:32:29', '2020-10-09 01:32:29'),
(18, 'Bensi Natalia', 'Bensi Natalia', '20-28764963-6', '03816427989', 'nati@gmail.com', NULL, 'Italia 2000', 'Concepcion', '4000', 'femenino', '', 23, '2020-10-09 01:40:05', '2020-10-19 20:00:49'),
(19, 'Nati Carolina', 'Nati Carolina', '27-28764963-6', '03816427989', 'caro@gmail.com', NULL, 'Italia 2415', 'Concepcion', '4000', 'femenino', '', 23, '2020-10-09 01:41:02', '2020-10-19 20:02:37'),
(20, 'Oscar Brock', 'Oscar Brock', '78-28764963-6', '555-5555', 'oscar@toon.com', NULL, 'Casillas 1458', 'Cordoba', '7840', 'masculino', 'persona', 5, '2020-10-19 20:10:54', '2020-10-19 20:10:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proveedor_id` bigint(20) UNSIGNED NOT NULL,
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `fecha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `proveedor_id`, `usuario_id`, `fecha`, `hora`, `total`, `created_at`, `updated_at`) VALUES
(11, 1, 2, '2020-10-20 21:24:26', '2020-10-20 21:24:26', '50000', '2020-10-21 00:24:26', '2020-10-21 00:24:26'),
(12, 2, 2, '2020-10-20 21:52:27', '2020-10-20 21:52:27', '60000', '2020-10-21 00:52:27', '2020-10-21 00:52:27'),
(13, 2, 2, '2020-10-20 21:53:52', '2020-10-20 21:53:52', '20', '2020-10-21 00:53:52', '2020-10-21 00:53:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos`
--

CREATE TABLE `conceptos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `tipo` enum('Haberes','Retenciones') COLLATE utf8mb4_unicode_ci DEFAULT 'Haberes',
  `montoFijo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montoVariable` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `conceptos`
--

INSERT INTO `conceptos` (`id`, `descripcion`, `tipo`, `montoFijo`, `montoVariable`, `created_at`, `updated_at`) VALUES
(1, 'Basico', 'Haberes', '23000', '0', NULL, NULL),
(2, 'Antiguedad', 'Haberes', '982.13', '0', NULL, NULL),
(3, 'Jubilacion', 'Retenciones', '0', '0.11', NULL, NULL),
(4, 'Horas extras:', 'Haberes', '180', '0', NULL, NULL),
(5, 'Adicionales', 'Haberes', '0', '0', NULL, NULL),
(6, 'Obra Social', 'Retenciones', '0', '0.03', NULL, NULL),
(7, 'Cuota sindical', 'Retenciones', '0', '0.03', NULL, NULL),
(8, 'SAC', 'Haberes', '0', '0.50', NULL, NULL),
(9, 'Asignaciones', 'Retenciones', '0', '0.05', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depositos`
--

CREATE TABLE `depositos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefonos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_postal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provincia_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `depositos`
--

INSERT INTO `depositos` (`id`, `nombre`, `telefonos`, `direccion`, `ciudad`, `codigo_postal`, `provincia_id`, `created_at`, `updated_at`) VALUES
(1, 'Almacen Oscuro', '4361146 / 4364239', 'Pellegrini 1531', 'San Miguel de Tucumán', '4000', 23, '2020-09-08 20:34:40', '2020-09-08 20:34:40'),
(2, 'Almacen Pellegrini', '4361146 / 4364239', 'Pellegrini 1531', 'San Miguel de Tucumán', '4000', 23, '2020-09-08 20:34:40', '2020-09-08 20:34:40'),
(3, 'Almacen Salta', '4361146 / 4364239', 'Guemes 1500', 'Salta Capital', '4400', 16, '2020-09-08 20:34:41', '2020-09-08 20:34:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_liquidaciones`
--

CREATE TABLE `detalle_liquidaciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `liquidacion_id` bigint(20) UNSIGNED NOT NULL,
  `concepto_id` int(11) NOT NULL,
  `unidad` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `haberes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `detalle_liquidaciones`
--

INSERT INTO `detalle_liquidaciones` (`id`, `liquidacion_id`, `concepto_id`, `unidad`, `haberes`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, '23000', '2020-10-23 02:31:51', '2020-10-23 02:31:51'),
(2, 3, 2, 1, '982.13', '2020-10-23 02:31:51', '2020-10-23 02:31:51'),
(3, 4, 1, 1, '23000', '2020-10-23 14:38:56', '2020-10-23 14:38:56'),
(4, 4, 2, 1, '982.13', '2020-10-23 14:38:56', '2020-10-23 14:38:56'),
(5, 4, 4, 2, '360', '2020-10-23 14:38:56', '2020-10-23 14:38:56'),
(6, 5, 1, 1, '23000', '2020-10-23 14:40:55', '2020-10-23 14:40:55'),
(7, 5, 2, 3, '2946.39', '2020-10-23 14:40:55', '2020-10-23 14:40:55'),
(8, 5, 3, 1, '0', '2020-10-23 14:40:55', '2020-10-23 14:40:55'),
(9, 5, 4, 1, '180', '2020-10-23 14:40:55', '2020-10-23 14:40:55'),
(10, 5, 5, 1, '1000', '2020-10-23 14:40:55', '2020-10-23 14:40:55'),
(11, 5, 6, 1, '0', '2020-10-23 14:40:55', '2020-10-23 14:40:55'),
(12, 5, 7, 1, '0', '2020-10-23 14:40:55', '2020-10-23 14:40:55'),
(13, 5, 8, 1, '12500', '2020-10-23 14:40:55', '2020-10-23 14:40:55'),
(14, 6, 1, 1, '23000', '2020-10-23 15:14:06', '2020-10-23 15:14:06'),
(15, 6, 8, 1, '12500', '2020-10-23 15:14:06', '2020-10-23 15:14:06'),
(16, 7, 1, 1, '23000', '2020-10-23 16:51:01', '2020-10-23 16:51:01'),
(17, 7, 2, 1, '982.13', '2020-10-23 16:51:01', '2020-10-23 16:51:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_familiar`
--

CREATE TABLE `grupo_familiar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaNacimiento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parentesco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dni` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `grupo_familiar`
--

INSERT INTO `grupo_familiar` (`id`, `nombre`, `fechaNacimiento`, `parentesco`, `dni`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, 'Emilia Bensi', '1984-06-21', 'Madre', '14589625', '15', '2020-10-22 02:21:35', '2020-10-22 02:21:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_compras`
--

CREATE TABLE `linea_compras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `compra_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `linea_compras`
--

INSERT INTO `linea_compras` (`id`, `compra_id`, `producto_id`, `cantidad`, `costo`, `created_at`, `updated_at`) VALUES
(1, 11, 2, '100', '500', '2020-10-21 00:24:26', '2020-10-21 00:24:26'),
(2, 12, 2, '1500', '40', '2020-10-21 00:52:27', '2020-10-21 00:52:27'),
(3, 13, 2, '2', '10', '2020-10-21 00:53:52', '2020-10-21 00:53:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_ventas`
--

CREATE TABLE `linea_ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `venta_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `linea_ventas`
--

INSERT INTO `linea_ventas` (`id`, `venta_id`, `producto_id`, `cantidad`, `precio`, `created_at`, `updated_at`) VALUES
(3, 3, 1, '5', '18000.00', '2020-09-11 13:35:15', '2020-09-11 13:35:15'),
(5, 6, 1, '5', '18000.00', '2020-09-14 01:40:12', '2020-09-14 01:40:12'),
(6, 7, 1, '2', '18000.00', '2020-09-14 01:43:11', '2020-09-14 01:43:11'),
(7, 8, 1, '1', '18000.00', '2020-09-14 01:46:41', '2020-09-14 01:46:41'),
(10, 11, 1, '4', '18000.00', '2020-09-14 01:54:37', '2020-09-14 01:54:37'),
(11, 12, 1, '1', '18000.00', '2020-09-14 02:16:26', '2020-09-14 02:16:26'),
(12, 13, 1, '5', '18000.00', '2020-09-14 02:20:02', '2020-09-27 15:56:47'),
(13, 14, 1, '4', '18000.00', '2020-09-28 01:09:04', '2020-09-28 01:40:35'),
(14, 20, 1, '5', '18000.00', '2020-10-19 21:26:41', '2020-10-19 21:26:41'),
(15, 21, 3, '4', '15000.00', '2020-10-19 21:28:48', '2020-10-19 21:28:48'),
(16, 22, 3, '5', '15000.00', '2020-10-20 18:59:21', '2020-10-20 18:59:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidaciones`
--

CREATE TABLE `liquidaciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `fechaDesde` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaHasta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periodo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salarioNeto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salarioBruto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `retenciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` enum('pagado','cancelado') COLLATE utf8mb4_unicode_ci DEFAULT 'pagado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `liquidaciones`
--

INSERT INTO `liquidaciones` (`id`, `usuario_id`, `fechaDesde`, `fechaHasta`, `periodo`, `salarioNeto`, `salarioBruto`, `retenciones`, `estado`, `created_at`, `updated_at`) VALUES
(1, 3, '2020-10-22 22:04:10', '2020-10-22 22:04:10', '10/20', '18400', '23000', '4600', 'pagado', '2020-10-23 01:04:10', '2020-10-23 01:04:10'),
(3, 1, '2020-10-22 23:31:51', '2020-10-22 23:31:51', '10/20', '22310', '23000', '690', 'pagado', '2020-10-23 02:31:51', '2020-10-23 02:31:51'),
(4, 4, '2020-10-23 11:38:56', '2020-10-23 11:38:56', '10/20', '24342.13', '24342.13', '0', 'pagado', '2020-10-23 14:38:56', '2020-10-23 14:38:56'),
(5, 6, '2020-10-23 11:40:55', '2020-10-23 11:40:55', '10/20', '18846.39', '27126.39', '8280', 'pagado', '2020-10-23 14:40:55', '2020-10-23 14:40:55'),
(6, 2, '2020-10-23 12:14:06', '2020-10-23 12:14:06', '10/20', '35500', '35500', '0', 'pagado', '2020-10-23 15:14:06', '2020-10-23 15:14:06'),
(7, 2, '1/10', '30/10', '10/20', '23982.13', '23982.13', '0', 'pagado', '2020-10-23 16:51:01', '2020-10-23 16:51:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `estado` enum('Activo','Inactivo') DEFAULT 'Activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Huwai', 'Activo', '2020-10-06 00:54:32', '2020-10-06 00:54:32'),
(2, 'Samsungss', 'Activo', '2020-10-06 00:54:45', '2020-10-21 01:27:34'),
(3, 'Motorola', 'Activo', '2020-10-06 01:07:14', '2020-10-06 01:07:14'),
(4, 'Phillip', 'Activo', '2020-10-21 01:27:50', '2020-10-21 01:27:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_02_21_015131_create_provincias_table', 1),
(5, '2020_02_21_015132_create_unidad_negocio_table', 1),
(6, '2020_02_21_015510_create_unidad_negocio_usuario_table', 1),
(7, '2020_02_21_020337_create_rubros_table', 1),
(8, '2020_02_21_020338_create_clientes_table', 1),
(9, '2020_02_21_020340_create_clientes_unidad_negocio_table', 1),
(10, '2020_02_21_020808_create_cedes_table', 1),
(11, '2020_02_21_020940_create_servicios_table', 1),
(12, '2020_02_21_024605_create_productos_table', 1),
(13, '2020_02_21_024817_create_productos_en_servicios_table', 1),
(14, '2020_02_21_025327_create_historial_producto_en_servicio_table', 1),
(15, '2020_03_07_224102_create_mov_productos_servicios_table', 1),
(16, '2020_06_15_235300_create_cajas_table', 1),
(17, '2020_06_16_023706_create_depositos_table', 1),
(18, '2020_06_16_054520_create_depositos_productos_table', 1),
(19, '2020_06_17_021145_create_presupuesto_table', 1),
(20, '2020_06_17_021650_create__detalle_presupuesto_table', 1),
(21, '2020_07_14_124829_create_pedidos_table', 1),
(22, '2020_07_14_125024_create_detalle_pedidos_table', 1),
(23, '2020_07_15_114708_create_movimientos_deposito_table', 1),
(24, '2020_07_15_121024_create_tipos_tareas_table', 1),
(25, '2020_07_15_121043_create_tareas_table', 1),
(26, '2020_07_15_123425_create_movimientos_tareas_table', 1),
(27, '2020_07_21_091838_create_historial_movimientos', 1),
(28, '2020_08_03_115618_create_proveedores', 1),
(29, '2020_08_03_121810_create_contacto_proveedor', 1),
(30, '2020_08_03_122242_create_proveedores_unidad_negocio', 1),
(31, '2020_08_04_083550_create_contacto_cliente', 1),
(32, '2020_08_04_084939_create_compra', 1),
(33, '2020_08_04_085020_create_detalle_compra', 1),
(34, '2020_08_11_111308_create_presupuesto_compra', 1),
(35, '2020_08_11_111346_create_detalle_presupuesto_compra', 1),
(36, '2020_08_18_114813_create_permission_tables', 1),
(37, '2020_09_04_115848_create__tabla_categorias', 1),
(38, '2020_09_08_120342_create_tabla_movimiento_cajas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos_cajas`
--

CREATE TABLE `movimientos_cajas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cajas_id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entrada` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salida` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `moneda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldoparcialpesos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saldoparcialdolares` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `movimientos_cajas`
--

INSERT INTO `movimientos_cajas` (`id`, `cajas_id`, `descripcion`, `fecha`, `entrada`, `salida`, `created_at`, `updated_at`, `moneda`, `saldoparcialpesos`, `saldoparcialdolares`) VALUES
(3, 1, 'Apertura de Caja', '2020-09-08 17:50:03', '0', '0', '2020-09-08 20:50:03', '2020-09-08 20:50:03', 'Pesos', '0', '0'),
(4, 1, 'Saldo Inicial', '2020-09-08 18:45:39', '8900', '0', '2020-09-08 21:45:39', '2020-09-08 21:45:39', 'Pesos', '8900', '0'),
(5, 1, 'Ingreso Inicial Dolares', '2020-09-08 18:54:04', '5000', '0', '2020-09-08 21:54:04', '2020-09-08 21:54:04', 'Dolares', '8900', '5000'),
(6, 1, 'Cobro Atrasado', '2020-09-08 18:54:52', '800', '0', '2020-09-08 21:54:52', '2020-09-08 21:54:52', 'Pesos', '9700', '5000'),
(7, 1, 'Puto el que Lee', '2020-09-08 18:56:02', '8000', '0', '2020-09-08 21:56:02', '2020-09-08 21:56:02', 'Pesos', '17700', '5000'),
(8, 1, 'Cobro Cuota', '2020-09-08 18:56:30', '500', '0', '2020-09-08 21:56:30', '2020-09-08 21:56:30', 'Dolares', '17700', '5500'),
(9, 1, 'Cierre de Caja', '2020-09-08 19:07:39', '0', '0', '2020-09-08 22:07:39', '2020-09-08 22:07:39', 'Pesos', '17700', '5500'),
(10, 1, 'Apertura de Caja', '2020-09-09 16:59:52', '0', '0', '2020-09-09 19:59:53', '2020-09-09 19:59:53', 'Pesos', '17700', '5500'),
(11, 1, 'Cierre de Caja', '2020-09-09 17:38:21', '0', '0', '2020-09-09 20:38:21', '2020-09-09 20:38:21', 'Pesos', '17700', '5500'),
(12, 1, 'Apertura de Caja', '2020-09-09 18:02:32', '0', '0', '2020-09-09 21:02:32', '2020-09-09 21:02:32', 'Pesos', '17700', '5500'),
(13, 1, 'Cierre de Caja', '2020-09-09 18:07:53', '0', '0', '2020-09-09 21:07:54', '2020-09-09 21:07:54', 'Pesos', '17700', '5500'),
(14, 1, 'Apertura de Caja', '2020-09-09 18:08:58', '0', '0', '2020-09-09 21:08:58', '2020-09-09 21:08:58', 'Pesos', '17700', '5500'),
(19, 1, 'Compra de Productos a Musimundo', '2020-09-09 20:53:41', '0', '8000', '2020-09-09 23:53:41', '2020-09-09 23:53:41', 'Pesos', '9700', '5500'),
(20, 1, 'Cierre de Caja', '2020-09-10 15:27:11', '0', '0', '2020-09-10 18:27:11', '2020-09-10 18:27:11', 'Pesos', '9700', '5500'),
(21, 1, 'Apertura de Caja', '2020-09-13 22:37:56', '0', '0', '2020-09-14 01:37:56', '2020-09-14 01:37:56', 'Pesos', '9700', '5500'),
(22, 1, 'Venta Nº20200913-104012', '2020-09-13 22:40:12', '90000', '0', '2020-09-14 01:40:12', '2020-09-14 01:40:12', 'Pesos', '9700', '5500'),
(23, 1, 'Venta Nº20200913-104311', '2020-09-13 22:43:11', '36000', '0', '2020-09-14 01:43:11', '2020-09-14 01:43:11', 'Pesos', '9700', '5500'),
(24, 1, 'Venta Nº 20200913-104641', '2020-09-13 22:46:41', '18000', '0', '2020-09-14 01:46:41', '2020-09-14 01:46:41', 'Pesos', '9700', '5500'),
(25, 1, 'Venta Nº 20200913-105436', '2020-09-13 22:54:37', '72000', '0', '2020-09-14 01:54:37', '2020-09-14 01:54:37', 'Pesos', '9700', '5500'),
(26, 1, 'Pago de Almuerzo', '2020-09-13 23:12:54', '0', '500', '2020-09-14 02:12:54', '2020-09-14 02:12:54', 'Pesos', '9200', '5500'),
(27, 1, 'Venta Nº 20200913-111626', '2020-09-13 23:16:26', '18000', '0', '2020-09-14 02:16:26', '2020-09-14 02:16:26', 'Pesos', '27200', '5500'),
(28, 1, 'Venta Nº 20200913-112002', '2020-09-13 23:20:02', '90000', '0', '2020-09-14 02:20:02', '2020-09-14 02:20:02', 'Pesos', '189200', '5500'),
(29, 1, 'Cierre de Caja', '2020-09-21 21:35:06', '0', '0', '2020-09-22 00:35:07', '2020-09-22 00:35:07', 'Pesos', '99200', '5500'),
(30, 1, 'Apertura de Caja', '2020-09-27 13:15:26', '0', '0', '2020-09-27 16:15:26', '2020-09-27 16:15:26', 'Pesos', '99200', '5500'),
(31, 1, 'Ingreso de Mora', '2020-09-27 13:17:43', '0', '4028', '2020-09-27 16:17:43', '2020-09-27 16:17:43', 'Pesos', '95172', '5500'),
(32, 1, 'asasasa', '2020-09-27 13:24:22', '0', '8780', '2020-09-27 16:24:22', '2020-09-27 16:24:22', 'Pesos', '103952', '5500'),
(33, 1, 'asasasa', '2020-09-27 13:27:06', '14000', '0', '2020-09-27 16:27:06', '2020-09-27 16:27:06', 'Pesos', '117952', '5500'),
(34, 1, 'Cobro de Cuota', '2020-09-27 13:31:31', '1458.50', '0', '2020-09-27 16:31:32', '2020-09-27 16:31:32', 'Pesos', '119410.5', '5500'),
(35, 1, 'Venta Nº 20200927-100904', '2020-09-27 22:09:05', '72000', '0', '2020-09-28 01:09:05', '2020-09-28 01:09:05', 'Pesos', '191410.5', '5500'),
(36, 1, 'Venta Nº   20200927-202120', '2020-10-19 18:21:21', '90000', '0', '2020-10-19 21:21:21', '2020-10-19 21:21:21', 'Pesos', '191410.5', '95500'),
(37, 1, 'Venta Nº   20200927-202020', '2020-10-19 18:26:41', '90000', '0', '2020-10-19 21:26:41', '2020-10-19 21:26:41', 'Pesos', '191410.5', '185500'),
(38, 1, 'Venta Nº   20200927-191020', '2020-10-19 18:28:48', '60000', '0', '2020-10-19 21:28:48', '2020-10-19 21:28:48', 'Pesos', '191410.5', '245500'),
(39, 1, 'Venta Nº 20201020-035921', '2020-10-20 15:59:21', '75000', '0', '2020-10-20 18:59:21', '2020-10-20 18:59:21', 'Pesos', '191410.5', '320500'),
(40, 1, 'Compra de Productos a ', '2020-10-20 21:24:26', '0', '50000', '2020-10-21 00:24:26', '2020-10-21 00:24:26', 'Pesos', '141410.5', '0'),
(41, 1, 'Compra de Productos a ', '2020-10-20 21:52:27', '0', '60000', '2020-10-21 00:52:27', '2020-10-21 00:52:27', 'Pesos', '81410.5', '0'),
(42, 1, 'Compra de Productos a ', '2020-10-20 21:53:52', '0', '20', '2020-10-21 00:53:52', '2020-10-21 00:53:52', 'Pesos', '81390.5', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `Id` int(11) NOT NULL,
  `venta_id` int(11) DEFAULT NULL,
  `monto` varchar(255) DEFAULT NULL,
  `vuelto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`Id`, `venta_id`, `monto`, `vuelto`, `created_at`, `updated_at`) VALUES
(1, 12, '12', '0', '2020-10-19 19:42:04', '2020-10-19 19:42:04'),
(2, 11, '11', '0', '2020-10-19 19:42:22', '2020-10-19 19:42:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'ventas_list', 'web', '2020-09-08 20:34:31', '2020-09-08 20:34:31'),
(2, 'compras_list', 'web', '2020-09-08 20:34:32', '2020-09-08 20:34:32'),
(3, 'inventario_list', 'web', '2020-09-08 20:34:32', '2020-09-08 20:34:32'),
(4, 'tareas_list', 'web', '2020-09-08 20:34:32', '2020-09-08 20:34:32'),
(5, 'ajustes_list', 'web', '2020-09-08 20:34:32', '2020-09-08 20:34:32'),
(6, 'ayuda_index', 'web', '2020-09-08 20:34:33', '2020-09-08 20:34:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `estado` enum('Activo','Inactivo') CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'Activo',
  `fechaVencimiento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precioVenta` decimal(9,2) NOT NULL DEFAULT 0.00,
  `precioCompra` decimal(9,2) NOT NULL DEFAULT 0.00,
  `subcategoria_id` bigint(20) UNSIGNED NOT NULL,
  `marcas_id` int(11) NOT NULL,
  `proveedor_id` int(10) UNSIGNED NOT NULL,
  `deposito_id` int(11) NOT NULL,
  `capacidad_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `nombre`, `descripcion`, `imagen`, `stock`, `estado`, `fechaVencimiento`, `precioVenta`, `precioCompra`, `subcategoria_id`, `marcas_id`, `proveedor_id`, `deposito_id`, `capacidad_id`, `created_at`, `updated_at`) VALUES
(1, '0', 'Samsung Galaxy J7', 'Celular J7', '2297-descarga.jpg', 50, 'Activo', '', '18000.00', '17500.00', 1, 2, 2, 2, 1, '2020-09-09 23:14:22', '2020-09-09 23:14:22'),
(2, '0', 'Celulares', 'CAMARA BUENA PRECIO MALO', '2480-210-1366-2000.png', 1522, 'Activo', '', '0.00', '0.00', 1, 2, 2, 1, 2, '2020-09-23 17:58:07', '2020-10-21 00:53:52'),
(3, '0', 'Men Intense Blue', 'Men Intense Blue', '2381-2113048.png', 15, 'Activo', '2020-11-07', '1500.00', '1400.00', 1, 3, 2, 1, 2, '2020-10-06 01:08:59', '2020-10-22 01:22:38'),
(4, '0', 'Tensiómetro Digital Automático', 'Tensiómetro Digital Automático CHU-304', '7302-san-up-tensiometro-digital-automatico-muneca-hl168za-imagen1.jpg', 10, 'Activo', '2020-10-21', '5700.00', '4700.00', 1, 2, 2, 2, 1, '2020-10-21 22:13:11', '2020-10-21 22:13:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `razon_Social` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuit_cuil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefonos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_postal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provincia_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `razon_Social`, `cuit_cuil`, `telefonos`, `email`, `direccion`, `ciudad`, `codigo_postal`, `provincia_id`, `created_at`, `updated_at`) VALUES
(1, 'Musimundoass', '27-28764963-6', '03816427989', NULL, '25 de Mayo 346', 'San Miguel de Tucuman', '411178', 4, '2020-09-09 23:05:47', '2020-10-20 19:27:39'),
(2, 'Farmaceutas del Valle', '00000000', '784987458', NULL, 'San Martin 650', 'San Miguel de Tucuman', '1458', 23, '2020-10-20 18:47:29', '2020-10-20 18:47:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Buenos Aires', '2020-09-08 20:34:36', '2020-09-08 20:34:36'),
(2, 'Catamarca', '2020-09-08 20:34:36', '2020-09-08 20:34:36'),
(3, 'Chaco', '2020-09-08 20:34:36', '2020-09-08 20:34:36'),
(4, 'Chubut', '2020-09-08 20:34:37', '2020-09-08 20:34:37'),
(5, 'Córdoba', '2020-09-08 20:34:37', '2020-09-08 20:34:37'),
(6, 'Corrientes', '2020-09-08 20:34:37', '2020-09-08 20:34:37'),
(7, 'Entre Ríos', '2020-09-08 20:34:37', '2020-09-08 20:34:37'),
(8, 'Formosa', '2020-09-08 20:34:37', '2020-09-08 20:34:37'),
(9, 'Jujuy', '2020-09-08 20:34:37', '2020-09-08 20:34:37'),
(10, 'La Pampa', '2020-09-08 20:34:37', '2020-09-08 20:34:37'),
(11, 'La Rioja', '2020-09-08 20:34:37', '2020-09-08 20:34:37'),
(12, 'Mendoza', '2020-09-08 20:34:37', '2020-09-08 20:34:37'),
(13, 'Misiones', '2020-09-08 20:34:38', '2020-09-08 20:34:38'),
(14, 'Neuquén', '2020-09-08 20:34:38', '2020-09-08 20:34:38'),
(15, 'Río Negro', '2020-09-08 20:34:38', '2020-09-08 20:34:38'),
(16, 'Salta', '2020-09-08 20:34:38', '2020-09-08 20:34:38'),
(17, 'San Juan', '2020-09-08 20:34:38', '2020-09-08 20:34:38'),
(18, 'San Luis', '2020-09-08 20:34:39', '2020-09-08 20:34:39'),
(19, 'Santa Cruz', '2020-09-08 20:34:39', '2020-09-08 20:34:39'),
(20, 'Santa Fe', '2020-09-08 20:34:39', '2020-09-08 20:34:39'),
(21, 'Santiago del Estero', '2020-09-08 20:34:39', '2020-09-08 20:34:39'),
(22, 'Tierra del Fuego', '2020-09-08 20:34:39', '2020-09-08 20:34:39'),
(23, 'Tucumán', '2020-09-08 20:34:39', '2020-09-08 20:34:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administrador', 'web', '2020-09-08 20:34:33', '2020-09-08 20:34:33'),
(2, 'tecnico', 'web', '2020-09-08 20:34:36', '2020-09-08 20:34:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL DEFAULT 0,
  `nombre` varchar(255) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` enum('Activo','Inactivo') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `categoria_id`, `nombre`, `created_at`, `updated_at`, `estado`) VALUES
(1, 7, 'Fragancia de Hombre', '2020-10-21 19:45:58', '2020-10-22 01:24:14', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen_perfil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_celular` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_fijo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicilio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagina_principal` enum('home','visor','ventas','administracion','tecnico','deposito') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'home',
  `estado` enum('activo','suspendido','baja') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `tipo` enum('admin','usuario','recurso humano') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'usuario',
  `cuil_cuit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `imagen_perfil`, `username`, `password`, `email`, `telefono_celular`, `telefono_fijo`, `domicilio`, `pagina_principal`, `estado`, `tipo`, `cuil_cuit`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Roberto Huallí', 'Torfe', NULL, 'rtorfe', '$2y$10$L9PYoeGYMRwm3WX98tgJWeqOpn6N6BK/Q.JK6NHZ4HtoDGwrSYmsG', 'roberto@torfe.com', NULL, NULL, NULL, 'home', 'activo', 'usuario', '20-15695-5', NULL, NULL, '2020-09-08 20:34:35', '2020-09-08 20:34:35'),
(2, 'Angel', 'Gauna', NULL, 'admin', '$2y$10$JCW2e1rCgq6TqoF1Wp6ZB.yTUXKht6f9.V3.h3FPzsIkHXgHkwO1i', 'angel@gauna.com', NULL, NULL, NULL, 'home', 'activo', 'admin', '21-15695-5', NULL, NULL, '2020-09-08 20:34:35', '2020-09-08 20:34:35'),
(3, 'Virginia Natalia', 'Maccedo', NULL, 'nvirginia', '$2y$10$E7ofROcdLn15BH/WNyBrSO3IVU.orcXMTZxa5o0jvZgi8yqpkm31e', NULL, NULL, NULL, NULL, 'home', 'activo', 'usuario', '25-15695-5', NULL, NULL, '2020-10-07 00:37:28', '2020-10-07 00:37:28'),
(4, 'Franco', 'Rasgido', NULL, 'frasgido', '$2y$10$Bh2JG8n38/ZHwF1YhjE9wuYWo5BClX.6vyLvuG6PKE/kgqE0yb48e', NULL, NULL, NULL, NULL, 'home', 'activo', 'recurso humano', '20-15695-8', NULL, NULL, '2020-10-09 01:31:32', '2020-10-09 01:31:32'),
(6, 'gustavo', 'romano', NULL, 'gromano', '$2y$10$pCiH4.6IFknp03YkDI3mfezhX/PUbkzRhmnZSYIwGLG7I5.l4PG.S', NULL, NULL, NULL, NULL, 'home', 'activo', 'admin', '10-15695-5', NULL, NULL, '2020-10-09 01:32:29', '2020-10-09 01:32:29'),
(15, 'Carolina', 'bensi', NULL, 'cbensi', '$2y$10$YqMlysXGvHo8jjT6HJKUBun4/RJ4NWRh0zJLToDVKVFTNS9NyT1xq', NULL, NULL, NULL, NULL, 'home', 'activo', 'usuario', '18-9815695-5', NULL, NULL, '2020-10-09 01:40:05', '2020-10-09 01:40:05'),
(17, 'Edwin', 'Cardona', NULL, 'eCardona', '$2y$10$4EpRJAZ3T1CjPCAnqyichOTBK5nfyFgULKg3jzf6TTTjwYgCJhYv.', 'ecardona@gmail.com', '3816427898', '3816427898', 'Santa Fe 2450', 'home', 'activo', 'usuario', NULL, NULL, NULL, '2020-10-22 01:42:19', '2020-10-22 01:42:19'),
(19, 'Lavessi', 'Carlos', NULL, 'clavessi', '$2y$10$1tyV.2ZFY8zK6FP7UABzmOoBacMp0eIJWCbVJqLnHBFCwKaGBKYoa', 'clavessi@gmail.com', '3816427898', '3816427898', 'Santa Fe 2450', 'home', 'activo', 'usuario', NULL, NULL, NULL, '2020-10-22 01:43:10', '2020-10-22 01:43:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `fecha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `usuario_id`, `fecha`, `hora`, `total`, `estado`, `created_at`, `updated_at`) VALUES
(3, 2, '2020-09-11 10:35:15', '', '90000', 'Pendiente', '2020-09-11 13:35:15', '2020-09-11 13:35:15'),
(6, 2, '2020-09-13 22:40:12', '', '90000', 'Pendiente', '2020-09-14 01:40:12', '2020-09-14 01:40:12'),
(7, 2, '2020-09-13 22:43:11', '', '36000', 'Pendiente', '2020-09-14 01:43:11', '2020-09-14 01:43:11'),
(8, 2, '2020-09-13 22:46:41', '', '18000', 'Pendiente', '2020-09-14 01:46:41', '2020-09-14 01:46:41'),
(11, 2, '2020-09-13 22:54:36', '', '72000', 'Pagado', '2020-09-14 01:54:36', '2020-10-19 19:42:22'),
(12, 2, '2020-09-13 23:16:26', '', '18000', 'Pagado', '2020-09-14 02:16:26', '2020-10-19 19:42:04'),
(13, 2, '2020-09-13 23:20:02', '', '90000', 'Pagado', '2020-09-14 02:20:02', '2020-09-28 02:23:53'),
(14, 2, '2020-09-27 22:09:04', '', '72000', 'Pagado', '2020-09-28 01:09:04', '2020-09-28 02:20:50'),
(19, 2, '2020-10-19 18:21:20', '', '90000', 'Pendiente', '2020-10-19 21:21:20', '2020-10-19 21:21:20'),
(20, 2, '2020-10-19 18:26:41', '', '90000', 'Pendiente', '2020-10-19 21:26:41', '2020-10-19 21:26:41'),
(21, 2, '2020-10-19 18:28:48', '', '60000', 'Pendiente', '2020-10-19 21:28:48', '2020-10-19 21:28:48'),
(22, 2, '2020-10-20 15:59:21', '', '75000', 'Pendiente', '2020-10-20 18:59:21', '2020-10-20 18:59:21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cajas`
--
ALTER TABLE `cajas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `capacidades`
--
ALTER TABLE `capacidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cedes`
--
ALTER TABLE `cedes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cedes_cliente_id_foreign` (`cliente_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientes_provincia_id_foreign` (`provincia_id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compras_proveedor_id_foreign` (`proveedor_id`),
  ADD KEY `compras_usuario_id_foreign` (`usuario_id`);

--
-- Indices de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compras_proveedor_id_foreign` (`descripcion`),
  ADD KEY `compras_usuario_id_foreign` (`tipo`);

--
-- Indices de la tabla `depositos`
--
ALTER TABLE `depositos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `depositos_provincia_id_foreign` (`provincia_id`);

--
-- Indices de la tabla `detalle_liquidaciones`
--
ALTER TABLE `detalle_liquidaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupo_familiar`
--
ALTER TABLE `grupo_familiar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `linea_compras`
--
ALTER TABLE `linea_compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalle_pedido_pedido_id_foreign` (`compra_id`),
  ADD KEY `detalle_pedido_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `linea_ventas`
--
ALTER TABLE `linea_ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalle_pedido_pedido_id_foreign` (`venta_id`),
  ADD KEY `detalle_pedido_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `liquidaciones`
--
ALTER TABLE `liquidaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compras_usuario_id_foreign` (`usuario_id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `movimientos_cajas`
--
ALTER TABLE `movimientos_cajas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movimientos_cajas_cajas_id_foreign` (`cajas_id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proveedores_provincia_id_foreign` (`provincia_id`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidos_usuario_id_foreign` (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cajas`
--
ALTER TABLE `cajas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `capacidades`
--
ALTER TABLE `capacidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cedes`
--
ALTER TABLE `cedes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `depositos`
--
ALTER TABLE `depositos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalle_liquidaciones`
--
ALTER TABLE `detalle_liquidaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo_familiar`
--
ALTER TABLE `grupo_familiar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `linea_compras`
--
ALTER TABLE `linea_compras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `linea_ventas`
--
ALTER TABLE `linea_ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `liquidaciones`
--
ALTER TABLE `liquidaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `movimientos_cajas`
--
ALTER TABLE `movimientos_cajas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cedes`
--
ALTER TABLE `cedes`
  ADD CONSTRAINT `cedes_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
