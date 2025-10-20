-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2025 a las 03:45:06
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
-- Base de datos: `motorium`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `slug` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `descripcion`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Deportivas', 'Motos diseñadas para la velocidad y el alto rendimiento en pista y carretera.', 'motos-deportivas', '2025-10-19 19:11:35', '2025-10-19 19:11:35'),
(2, 'Scooters', 'Vehículos urbanos de baja cilindrada, ideales para la movilidad diaria.', 'scooters-urbanos', '2025-10-19 19:11:35', '2025-10-19 19:11:35'),
(3, 'Adventure/Touring', 'Motos versátiles y robustas, perfectas para viajes largos y todo tipo de terreno.', 'adventure-touring', '2025-10-19 19:11:35', '2025-10-19 19:11:35'),
(4, 'Cruiser', 'Motos con un estilo clásico, asientos bajos y manillares altos, pensadas para el confort.', 'motos-cruiser', '2025-10-19 19:11:35', '2025-10-19 19:11:35'),
(5, 'Accesorios', 'Productos complementarios como cascos, guantes y equipamiento de seguridad.', 'accesorios-moto', '2025-10-19 19:11:35', '2025-10-19 19:11:35'),
(6, 'Urbana', 'Estas motocicletas están especializadas en conducción por tramos cerrados, baches y lugares muy cerrados', 'versatil-ventajas', '2025-10-20 04:07:27', '2025-10-20 04:07:27'),
(7, 'Triscooter', 'Generalmente vehículos de tres ruedas diseñados para el transporte de carga o personas', 'trimotos-tres-ruedas', '2025-10-20 04:22:43', '2025-10-20 04:22:43'),
(8, 'Cuatrimotod', 'Cuatrimotos y Quads: Potencia, tracción y control total para dominar cualquier terreno.', 'cuatrimotos-quads', '2025-10-20 04:24:06', '2025-10-20 04:24:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(10) UNSIGNED NOT NULL,
  `id_categoria` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL,
  `sku` varchar(50) NOT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `anio` year(4) DEFAULT NULL,
  `imagen` blob DEFAULT NULL,
  `ficha_tecnica` text DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_categoria`, `nombre`, `descripcion`, `precio`, `stock`, `sku`, `marca`, `modelo`, `anio`, `imagen`, `ficha_tecnica`, `activo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kawasaki Ninja ZX-10R', 'Motocicleta deportiva de alto rendimiento, 998cc.', 19999.00, 3, 'KW-ZX10R-2024', 'Kawasaki', 'Ninja ZX-10R', '2024', 0x70726f647563746f732f44657976706d744633774733345544424c4d6338374768746b4c7465674446444a5636494b63336c2e706e67, 'Cilindrada: 998cc, Potencia: 203 CV', 1, '2025-10-19 19:11:35', '2025-10-20 03:39:51'),
(2, 2, 'Honda PCX 160', 'Scooter cómodo y eficiente, ideal para la ciudad. Bajo consumo de combustible.', 3500.50, 15, 'HN-PCX160-2023', 'Honda', 'PCX 160', '2023', 0x70726f647563746f732f766d7049734445744350787874763257716b714230746b747a735138586d6e747a533057416f4a6f2e706e67, 'Motor: 4 Tiempos, Refrigeración: Líquida', 1, '2025-10-19 19:11:35', '2025-10-20 03:42:15'),
(3, 3, 'BMW R 1250 GS', 'Máquina de aventura con suspensión adaptable y gran autonomía.', 25500.00, 5, 'BMW-R1250GS-2024', 'BMW', 'R 1250 GS', '2024', 0x70726f647563746f732f3461465a7a62387473375767316e4c32466e4f7a6364524a38496d6e6d5069776b39776b5163384a2e706e67, 'Motor: Boxer de 1254cc, Modos de conducción Pro', 1, '2025-10-19 19:11:35', '2025-10-20 03:57:57'),
(4, 4, 'Harley-Davidson Fat Boy', 'El ícono de las cruisers. Diseño musculoso y motor Milwaukee-Eight 114.', 28000.00, 2, 'HD-FATBOY-2023', 'Harley-Davidson', 'Fat Boy', '2023', 0x70726f647563746f732f6a6470357272704a7a6c47354d51366754656a5a75455978483579677571643147423033535a47752e706e67, 'Motor: Milwaukee-Eight 114, Peso: 304 kg', 1, '2025-10-19 19:11:35', '2025-10-20 03:54:55'),
(8, 6, 'Bajaj Boxer / CT100', 'Utilitaria — 100 cc — ideal para trabajo y uso diario', 6099000.00, 10, 'boxer-1212-knm', NULL, NULL, NULL, 0x70726f647563746f732f5531343754765248303842384b4d6f6b4e4f677a6c64447544794c7135766d6d6a597a30645136482e706e67, NULL, 1, '2025-10-20 04:11:32', '2025-10-20 04:11:44'),
(9, 6, 'Suzuki GN 125 ABS', 'Urbana / sport ligera — confiable y de amplia aceptación', 7049000.00, 10, 'gn-125hh-abs', NULL, NULL, NULL, 0x70726f647563746f732f6b756c5a645779545a757066676f68496e787a324953714e3934636171474a777a574c79453852362e706e67, NULL, 1, '2025-10-20 04:25:30', '2025-10-20 04:25:30'),
(10, 7, '2025 Ryker', 'Descubre la libertad total mientras exploras nuevos lugares en la carretera, en el terreno y en cualquier lugar que te guste con el fácil de conducir Ryker de 3 ruedas.', 9599.00, 2, 'rik-125-asd', NULL, NULL, NULL, 0x70726f647563746f732f34585850326d455943386c694c63514931305a6c6a324c336a7733707a6b4b634a323853476d55792e706e67, NULL, 1, '2025-10-20 04:36:10', '2025-10-20 04:36:10'),
(11, 5, 'Casco de Motocicleta', 'Casco de Motocicleta Modular con Visera Abatible y Cara Abierta Aprobado DOT', 201186.00, 12, 'HP481161', NULL, NULL, NULL, 0x70726f647563746f732f7866415076524c6745514a6c69676b4d356c4a36616e4f46754631437a4f586f39363457736a6d4a2e706e67, NULL, 1, '2025-10-20 04:50:30', '2025-10-20 04:50:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5Ej3504J98cGt4v56yeP0OgXmCoAsJiy1ToTHQkT', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidzF4aU5qV1NCaFhGdldNTUtla1dvSWQyRkM1OGszYndSQ1V6S3lBdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760924038);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `fk_productos_categorias` (`id_categoria`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_categorias` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
