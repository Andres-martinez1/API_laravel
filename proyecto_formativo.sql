-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 15-07-2025 a las 18:58:36
-- Versión del servidor: 8.4.3
-- Versión de PHP: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_formativo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id_area` bigint UNSIGNED NOT NULL,
  `nombre_area` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_id_sedes` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id_area`, `nombre_area`, `fk_id_sedes`, `created_at`, `updated_at`) VALUES
(1, 'Tic\r\n', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodegas`
--

CREATE TABLE `bodegas` (
  `id_bodega` bigint UNSIGNED NOT NULL,
  `nombre_bodega` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `encargado` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_id_sede` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bodegas`
--

INSERT INTO `bodegas` (`id_bodega`, `nombre_bodega`, `encargado`, `fk_id_sede`, `created_at`, `updated_at`) VALUES
(1, 'Bodega TIC', 'Carlos', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centros`
--

CREATE TABLE `centros` (
  `id_centro` bigint UNSIGNED NOT NULL,
  `nombre_centro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_id_municipio` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `centros`
--

INSERT INTO `centros` (`id_centro`, `nombre_centro`, `fk_id_municipio`, `created_at`, `updated_at`) VALUES
(1, 'Yamboró pitalito', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles`
--

CREATE TABLE `detalles` (
  `id` bigint UNSIGNED NOT NULL,
  `movimiento` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_id_elemento` bigint UNSIGNED NOT NULL,
  `asignado` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `retorno` date NOT NULL,
  `fecha` date NOT NULL,
  `fk_id_ficha` bigint UNSIGNED NOT NULL,
  `id_solicitud` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalles`
--

INSERT INTO `detalles` (`id`, `movimiento`, `fk_id_elemento`, `asignado`, `estado`, `retorno`, `fecha`, `fk_id_ficha`, `id_solicitud`, `created_at`, `updated_at`) VALUES
(1, 'transferencia', 1, 'Pedro', 'Activo', '2025-07-09', '2025-07-15', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_entrega`
--

CREATE TABLE `detalles_entrega` (
  `id_detalle_entrega` bigint UNSIGNED NOT NULL,
  `id_entrega` bigint UNSIGNED NOT NULL,
  `id_instructor_receptor` bigint UNSIGNED NOT NULL,
  `id_ficha_formacion` bigint UNSIGNED NOT NULL,
  `visto_bueno_aprendiz` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalles_entrega`
--

INSERT INTO `detalles_entrega` (`id_detalle_entrega`, `id_entrega`, `id_instructor_receptor`, `id_ficha_formacion`, `visto_bueno_aprendiz`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_solicitud`
--

CREATE TABLE `detalle_solicitud` (
  `id_detalle_solicitud` bigint UNSIGNED NOT NULL,
  `id_solicitud` bigint UNSIGNED NOT NULL,
  `id_producto` bigint UNSIGNED NOT NULL,
  `cantidad_solicitada` decimal(8,2) NOT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_solicitud`
--

INSERT INTO `detalle_solicitud` (`id_detalle_solicitud`, `id_solicitud`, `id_producto`, `cantidad_solicitada`, `observaciones`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10.00, 'manejo responsable', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elementos`
--

CREATE TABLE `elementos` (
  `id_elemento` bigint UNSIGNED NOT NULL,
  `nombre_elemento` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` decimal(8,2) NOT NULL,
  `clasificacion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ficha_tecnica` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `uso` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_id_bodega` bigint UNSIGNED DEFAULT NULL,
  `tipo` text COLLATE utf8mb4_unicode_ci,
  `fecha_salida` date DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_caducidad` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `elementos`
--

INSERT INTO `elementos` (`id_elemento`, `nombre_elemento`, `stock`, `clasificacion`, `ficha_tecnica`, `uso`, `estado`, `serial`, `fk_id_bodega`, `tipo`, `fecha_salida`, `fecha_ingreso`, `fecha_caducidad`, `created_at`, `updated_at`) VALUES
(1, 'Computador', 20.00, 'tecnologia', 'ajdi4sdfs4dsfd', 'laboral', 'activo', 'aha4ajja4ajja5a', 1, 'material de formacion', '2025-08-14', '2025-07-01', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `id_entrada` bigint UNSIGNED NOT NULL,
  `fk_id_bodega` bigint UNSIGNED NOT NULL,
  `fk_id_elemento` bigint UNSIGNED NOT NULL,
  `cantidad_ingresada` decimal(8,2) NOT NULL,
  `proveedor` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id_entrada`, `fk_id_bodega`, `fk_id_elemento`, `cantidad_ingresada`, `proveedor`, `fecha_ingreso`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 50.00, 'Pedro', '2025-07-15', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega_material`
--

CREATE TABLE `entrega_material` (
  `id_entrega` bigint UNSIGNED NOT NULL,
  `id_solicitud` bigint UNSIGNED NOT NULL,
  `id_usuario_responsable` bigint UNSIGNED NOT NULL,
  `fecha_entrega` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `entrega_material`
--

INSERT INTO `entrega_material` (`id_entrega`, `id_solicitud`, `id_usuario_responsable`, `fecha_entrega`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-07-17', NULL, NULL),
(2, 1, 1, '2025-07-17', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE `ficha` (
  `id_ficha` bigint UNSIGNED NOT NULL,
  `numero_ficha` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_id_programa` bigint UNSIGNED NOT NULL,
  `fk_id_municipio` bigint UNSIGNED NOT NULL,
  `fk_id_sede` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ficha`
--

INSERT INTO `ficha` (`id_ficha`, `numero_ficha`, `fk_id_programa`, `fk_id_municipio`, `fk_id_sede`, `created_at`, `updated_at`) VALUES
(1, '2900810', 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(73, '0001_01_01_000000_create_users_table', 1),
(74, '0001_01_01_000001_create_cache_table', 1),
(75, '0001_01_01_000002_create_jobs_table', 1),
(76, '2025_07_14_234637_create_personal_access_tokens_table', 1),
(77, '2025_07_15_160334_create_municipio_table', 1),
(78, '2025_07_15_160406_create_modulos_table', 1),
(79, '2025_07_15_160457_create_roles_table', 1),
(80, '2025_07_15_160712_create_programas_table', 1),
(81, '2025_07_15_160737_create_centros_table', 1),
(82, '2025_07_15_160939_create_sedes_table', 1),
(83, '2025_07_15_161018_create_areas_table', 1),
(84, '2025_07_15_161043_create_usuarios_table', 1),
(85, '2025_07_15_161112_create_ficha_table', 1),
(86, '2025_07_15_161200_create_bodegas_table', 1),
(87, '2025_07_15_161440_create_elementos_table', 1),
(88, '2025_07_15_161507_create_entradas_table', 1),
(89, '2025_07_15_161555_create_salidas_table', 1),
(90, '2025_07_15_161637_create_movimientos_table', 1),
(91, '2025_07_15_161707_create_trazabilidad_table', 1),
(92, '2025_07_15_161728_create_solicitudes_table', 1),
(93, '2025_07_15_161748_create_detalle_solicitud_table', 1),
(94, '2025_07_15_161815_create_entrega_material_table', 1),
(95, '2025_07_15_161835_create_detalles_entrega_table', 1),
(96, '2025_07_15_161946_create_detalles_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre_modulo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id_movimientos` bigint UNSIGNED NOT NULL,
  `fk_id_usuario` bigint UNSIGNED NOT NULL,
  `fk_id_elemento` bigint UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `responsable` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pedir` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `suministrar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `devolver` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`id_movimientos`, `fk_id_usuario`, `fk_id_elemento`, `fecha`, `responsable`, `pedir`, `suministrar`, `devolver`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-07-15', 'Peña', 'Material', 'Material', 'Material', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id_municipio` bigint UNSIGNED NOT NULL,
  `nombre_municipio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id_municipio`, `nombre_municipio`, `created_at`, `updated_at`) VALUES
(1, 'pitalitó', NULL, NULL),
(2, 'san agustin ', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `id_programa` bigint UNSIGNED NOT NULL,
  `nombre_programa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id_programa`, `nombre_programa`, `created_at`, `updated_at`) VALUES
(1, 'ADSO', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` bigint UNSIGNED NOT NULL,
  `nombre_rol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`, `created_at`, `updated_at`) VALUES
(1, 'Administrador\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas`
--

CREATE TABLE `salidas` (
  `id_salida` bigint UNSIGNED NOT NULL,
  `fk_id_bodega` bigint UNSIGNED NOT NULL,
  `fk_id_elemento` bigint UNSIGNED NOT NULL,
  `cantidad_entregada` decimal(8,2) NOT NULL,
  `area_destino` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_salida` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `salidas`
--

INSERT INTO `salidas` (`id_salida`, `fk_id_bodega`, `fk_id_elemento`, `cantidad_entregada`, `area_destino`, `fecha_salida`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 400.00, 'tic', '2025-07-15', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id_sedes` bigint UNSIGNED NOT NULL,
  `nombre_sede` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_id_centro` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id_sedes`, `nombre_sede`, `fk_id_centro`, `created_at`, `updated_at`) VALUES
(1, 'Sede Central', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id_solicitud` bigint UNSIGNED NOT NULL,
  `id_usuario_solicitante` bigint UNSIGNED NOT NULL,
  `estado_solicitud` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id_solicitud`, `id_usuario_solicitante`, `estado_solicitud`, `fecha_solicitud`, `created_at`, `updated_at`) VALUES
(1, 1, 'prestamo', '2025-07-15', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trazabilidad`
--

CREATE TABLE `trazabilidad` (
  `id_trazabilidad` bigint UNSIGNED NOT NULL,
  `fk_id_elemento` bigint UNSIGNED NOT NULL,
  `tipo_movimiento` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `bodega_origen` bigint UNSIGNED DEFAULT NULL,
  `bodega_destino` bigint UNSIGNED DEFAULT NULL,
  `estado_actual` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` bigint UNSIGNED NOT NULL,
  `identificacion` bigint UNSIGNED NOT NULL,
  `nombres` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_id_area` bigint UNSIGNED NOT NULL,
  `fk_id_rol` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `identificacion`, `nombres`, `apellidos`, `correo`, `password`, `fk_id_area`, `fk_id_rol`, `created_at`, `updated_at`) VALUES
(1, 1015115, 'Andres', 'Peña', 'andres@gmail.com', 'andres123', 1, 1, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id_area`),
  ADD KEY `areas_fk_id_sedes_foreign` (`fk_id_sedes`);

--
-- Indices de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  ADD PRIMARY KEY (`id_bodega`),
  ADD KEY `bodegas_fk_id_sede_foreign` (`fk_id_sede`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `centros`
--
ALTER TABLE `centros`
  ADD PRIMARY KEY (`id_centro`);

--
-- Indices de la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalles_fk_id_ficha_foreign` (`fk_id_ficha`),
  ADD KEY `detalles_fk_id_elemento_foreign` (`fk_id_elemento`),
  ADD KEY `detalles_id_solicitud_foreign` (`id_solicitud`);

--
-- Indices de la tabla `detalles_entrega`
--
ALTER TABLE `detalles_entrega`
  ADD PRIMARY KEY (`id_detalle_entrega`),
  ADD KEY `detalles_entrega_id_entrega_foreign` (`id_entrega`),
  ADD KEY `detalles_entrega_id_instructor_receptor_foreign` (`id_instructor_receptor`),
  ADD KEY `detalles_entrega_id_ficha_formacion_foreign` (`id_ficha_formacion`);

--
-- Indices de la tabla `detalle_solicitud`
--
ALTER TABLE `detalle_solicitud`
  ADD PRIMARY KEY (`id_detalle_solicitud`),
  ADD KEY `detalle_solicitud_id_solicitud_foreign` (`id_solicitud`),
  ADD KEY `detalle_solicitud_id_producto_foreign` (`id_producto`);

--
-- Indices de la tabla `elementos`
--
ALTER TABLE `elementos`
  ADD PRIMARY KEY (`id_elemento`),
  ADD KEY `elementos_fk_id_bodega_foreign` (`fk_id_bodega`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `entradas_fk_id_bodega_foreign` (`fk_id_bodega`),
  ADD KEY `entradas_fk_id_elemento_foreign` (`fk_id_elemento`);

--
-- Indices de la tabla `entrega_material`
--
ALTER TABLE `entrega_material`
  ADD PRIMARY KEY (`id_entrega`),
  ADD KEY `entrega_material_id_solicitud_foreign` (`id_solicitud`),
  ADD KEY `entrega_material_id_usuario_responsable_foreign` (`id_usuario_responsable`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`id_ficha`),
  ADD KEY `ficha_fk_id_programa_foreign` (`fk_id_programa`),
  ADD KEY `ficha_fk_id_municipio_foreign` (`fk_id_municipio`),
  ADD KEY `ficha_fk_id_sede_foreign` (`fk_id_sede`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id_movimientos`),
  ADD KEY `movimientos_fk_id_usuario_foreign` (`fk_id_usuario`),
  ADD KEY `movimientos_fk_id_elemento_foreign` (`fk_id_elemento`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id_municipio`),
  ADD UNIQUE KEY `municipio_nombre_municipio_unique` (`nombre_municipio`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`id_programa`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `roles_nombre_rol_unique` (`nombre_rol`);

--
-- Indices de la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD PRIMARY KEY (`id_salida`),
  ADD KEY `salidas_fk_id_bodega_foreign` (`fk_id_bodega`),
  ADD KEY `salidas_fk_id_elemento_foreign` (`fk_id_elemento`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id_sedes`),
  ADD KEY `sedes_fk_id_centro_foreign` (`fk_id_centro`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `solicitudes_id_usuario_solicitante_foreign` (`id_usuario_solicitante`);

--
-- Indices de la tabla `trazabilidad`
--
ALTER TABLE `trazabilidad`
  ADD PRIMARY KEY (`id_trazabilidad`),
  ADD KEY `trazabilidad_fk_id_elemento_foreign` (`fk_id_elemento`),
  ADD KEY `trazabilidad_bodega_origen_foreign` (`bodega_origen`),
  ADD KEY `trazabilidad_bodega_destino_foreign` (`bodega_destino`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `usuarios_fk_id_area_foreign` (`fk_id_area`),
  ADD KEY `usuarios_fk_id_rol_foreign` (`fk_id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id_area` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  MODIFY `id_bodega` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `centros`
--
ALTER TABLE `centros`
  MODIFY `id_centro` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalles`
--
ALTER TABLE `detalles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalles_entrega`
--
ALTER TABLE `detalles_entrega`
  MODIFY `id_detalle_entrega` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_solicitud`
--
ALTER TABLE `detalle_solicitud`
  MODIFY `id_detalle_solicitud` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `elementos`
--
ALTER TABLE `elementos`
  MODIFY `id_elemento` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id_entrada` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `entrega_material`
--
ALTER TABLE `entrega_material`
  MODIFY `id_entrega` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ficha`
--
ALTER TABLE `ficha`
  MODIFY `id_ficha` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id_movimientos` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id_municipio` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `id_programa` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `salidas`
--
ALTER TABLE `salidas`
  MODIFY `id_salida` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id_sedes` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id_solicitud` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `trazabilidad`
--
ALTER TABLE `trazabilidad`
  MODIFY `id_trazabilidad` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_fk_id_sedes_foreign` FOREIGN KEY (`fk_id_sedes`) REFERENCES `sedes` (`id_sedes`);

--
-- Filtros para la tabla `bodegas`
--
ALTER TABLE `bodegas`
  ADD CONSTRAINT `bodegas_fk_id_sede_foreign` FOREIGN KEY (`fk_id_sede`) REFERENCES `sedes` (`id_sedes`);

--
-- Filtros para la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD CONSTRAINT `detalles_fk_id_elemento_foreign` FOREIGN KEY (`fk_id_elemento`) REFERENCES `elementos` (`id_elemento`),
  ADD CONSTRAINT `detalles_fk_id_ficha_foreign` FOREIGN KEY (`fk_id_ficha`) REFERENCES `ficha` (`id_ficha`),
  ADD CONSTRAINT `detalles_id_solicitud_foreign` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitudes` (`id_solicitud`);

--
-- Filtros para la tabla `detalles_entrega`
--
ALTER TABLE `detalles_entrega`
  ADD CONSTRAINT `detalles_entrega_id_entrega_foreign` FOREIGN KEY (`id_entrega`) REFERENCES `entrega_material` (`id_entrega`),
  ADD CONSTRAINT `detalles_entrega_id_ficha_formacion_foreign` FOREIGN KEY (`id_ficha_formacion`) REFERENCES `ficha` (`id_ficha`),
  ADD CONSTRAINT `detalles_entrega_id_instructor_receptor_foreign` FOREIGN KEY (`id_instructor_receptor`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `detalle_solicitud`
--
ALTER TABLE `detalle_solicitud`
  ADD CONSTRAINT `detalle_solicitud_id_producto_foreign` FOREIGN KEY (`id_producto`) REFERENCES `elementos` (`id_elemento`),
  ADD CONSTRAINT `detalle_solicitud_id_solicitud_foreign` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitudes` (`id_solicitud`);

--
-- Filtros para la tabla `elementos`
--
ALTER TABLE `elementos`
  ADD CONSTRAINT `elementos_fk_id_bodega_foreign` FOREIGN KEY (`fk_id_bodega`) REFERENCES `bodegas` (`id_bodega`);

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `entradas_fk_id_bodega_foreign` FOREIGN KEY (`fk_id_bodega`) REFERENCES `bodegas` (`id_bodega`),
  ADD CONSTRAINT `entradas_fk_id_elemento_foreign` FOREIGN KEY (`fk_id_elemento`) REFERENCES `elementos` (`id_elemento`);

--
-- Filtros para la tabla `entrega_material`
--
ALTER TABLE `entrega_material`
  ADD CONSTRAINT `entrega_material_id_solicitud_foreign` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitudes` (`id_solicitud`),
  ADD CONSTRAINT `entrega_material_id_usuario_responsable_foreign` FOREIGN KEY (`id_usuario_responsable`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD CONSTRAINT `ficha_fk_id_municipio_foreign` FOREIGN KEY (`fk_id_municipio`) REFERENCES `municipio` (`id_municipio`),
  ADD CONSTRAINT `ficha_fk_id_programa_foreign` FOREIGN KEY (`fk_id_programa`) REFERENCES `programas` (`id_programa`),
  ADD CONSTRAINT `ficha_fk_id_sede_foreign` FOREIGN KEY (`fk_id_sede`) REFERENCES `sedes` (`id_sedes`);

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `movimientos_fk_id_elemento_foreign` FOREIGN KEY (`fk_id_elemento`) REFERENCES `elementos` (`id_elemento`),
  ADD CONSTRAINT `movimientos_fk_id_usuario_foreign` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD CONSTRAINT `salidas_fk_id_bodega_foreign` FOREIGN KEY (`fk_id_bodega`) REFERENCES `bodegas` (`id_bodega`),
  ADD CONSTRAINT `salidas_fk_id_elemento_foreign` FOREIGN KEY (`fk_id_elemento`) REFERENCES `elementos` (`id_elemento`);

--
-- Filtros para la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD CONSTRAINT `sedes_fk_id_centro_foreign` FOREIGN KEY (`fk_id_centro`) REFERENCES `centros` (`id_centro`);

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_id_usuario_solicitante_foreign` FOREIGN KEY (`id_usuario_solicitante`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `trazabilidad`
--
ALTER TABLE `trazabilidad`
  ADD CONSTRAINT `trazabilidad_bodega_destino_foreign` FOREIGN KEY (`bodega_destino`) REFERENCES `bodegas` (`id_bodega`),
  ADD CONSTRAINT `trazabilidad_bodega_origen_foreign` FOREIGN KEY (`bodega_origen`) REFERENCES `bodegas` (`id_bodega`),
  ADD CONSTRAINT `trazabilidad_fk_id_elemento_foreign` FOREIGN KEY (`fk_id_elemento`) REFERENCES `elementos` (`id_elemento`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_fk_id_area_foreign` FOREIGN KEY (`fk_id_area`) REFERENCES `areas` (`id_area`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_fk_id_rol_foreign` FOREIGN KEY (`fk_id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
