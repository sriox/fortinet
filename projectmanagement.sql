-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2017 a las 02:53:53
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `projectmanagement`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activities`
--

CREATE TABLE `activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity_type_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `technology_id` int(11) NOT NULL,
  `se_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `quarter` int(11) NOT NULL,
  `smart_ticket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_executed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `execution_date` date DEFAULT NULL,
  `time_used` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `activities`
--

INSERT INTO `activities` (`id`, `user_id`, `activity_type_id`, `country_id`, `technology_id`, `se_id`, `date`, `quarter`, `smart_ticket`, `customer`, `description`, `activity_executed`, `execution_date`, `time_used`, `created_at`, `updated_at`) VALUES
(2, 1, 7, 2, 2, 2, '2017-06-12', 2, 'aaa', 'Fortinet', 'Description', 'Activity Executed', '2017-06-13', 120, '2017-06-13 05:31:53', '2017-06-13 05:31:53'),
(3, 2, 8, 3, 3, 3, '2017-06-11', 2, 'sss', 'Claro', 'Desc', 'Act Exe', '2017-06-13', 180, '2017-06-13 05:33:14', '2017-06-13 05:33:14'),
(4, 2, 9, 3, 2, 4, '2017-06-13', 3, 'ddd', 'Janssen', 'asd', 'dfg', '2017-06-21', 90, '2017-06-13 05:37:23', '2017-06-13 05:37:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity_types`
--

CREATE TABLE `activity_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `activity_types`
--

INSERT INTO `activity_types` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, 'Administrative Activity', NULL, '2017-06-13 05:28:35', '2017-06-13 05:28:35'),
(8, 'Customer/Partner Meeting', NULL, '2017-06-13 05:28:43', '2017-06-13 05:28:43'),
(9, 'Docs Creation', NULL, '2017-06-13 05:28:50', '2017-06-13 05:28:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `territory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`id`, `name`, `territory`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Argentina', 'SolaEast', NULL, '2017-06-13 05:29:08', '2017-06-13 05:29:08'),
(3, 'Belize', 'Caribbean', NULL, '2017-06-13 05:29:22', '2017-06-13 05:29:22'),
(4, 'Bolivia', 'SolaEast', NULL, '2017-06-13 05:29:36', '2017-06-13 05:29:36');

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
(42, '2017_05_19_164207_create_projects_table', 1),
(43, '2017_05_19_172019_create_plos_table', 1),
(44, '2017_06_12_013308_create_activity_types_table', 1),
(45, '2017_06_12_013351_create_countries_table', 1),
(46, '2017_06_12_013413_create_territories_table', 1),
(47, '2017_06_12_013514_create_technologies_table', 1),
(48, '2017_06_12_014114_create_ses_table', 1),
(49, '2017_06_12_175134_create_activities_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plos`
--

CREATE TABLE `plos` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `progress` int(11) NOT NULL,
  `estimated_start_at` datetime NOT NULL,
  `estimated_finish_at` datetime NOT NULL,
  `real_start_at` datetime NOT NULL,
  `real_finish_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ses`
--

CREATE TABLE `ses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ses`
--

INSERT INTO `ses` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Abraham Jaramillo', NULL, '2017-06-13 05:30:19', '2017-06-13 05:30:19'),
(3, 'Adrian Vargas', NULL, '2017-06-13 05:30:26', '2017-06-13 05:30:26'),
(4, 'Alan Aquino', NULL, '2017-06-13 05:30:35', '2017-06-13 05:30:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `technologies`
--

CREATE TABLE `technologies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `technologies`
--

INSERT INTO `technologies` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'FortiADC', NULL, '2017-06-13 05:29:47', '2017-06-13 05:29:47'),
(3, 'FortiAnalyzer', NULL, '2017-06-13 05:29:56', '2017-06-13 05:29:56'),
(4, 'FortiAP', NULL, '2017-06-13 05:30:04', '2017-06-13 05:31:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `territories`
--

CREATE TABLE `territories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sergio Rios', 'sergioriosg@gmail.com', '$2y$10$vLUcsyWO/bLG5weKD4TJCu.WeQ.ohGdpWxTIfD2HtvKHEPQ0XQyK2', 'mp3FBr0JB0rjGmFsUhgEtdDA7TXiUHDnbEOnpJJtLEPpdlw9FyXshfxA27vt', '2017-06-13 01:15:56', '2017-06-13 01:15:56'),
(2, 'Oscar Cifuentes', 'oscarcif@gmail.com', '$2y$10$UoEGnNCAqdapHdZ9ePtT3.bniKfyZ3sBvAU0WMVvjgeVe4jT1TG5W', 'NTtBcgSRlHE5mXcmZVSldU6cXKrZ9g9o1jtTZkNnFDmB4WiNsJS7rVWoUiD5', '2017-06-13 05:32:37', '2017-06-13 05:32:37');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `activity_types`
--
ALTER TABLE `activity_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plos`
--
ALTER TABLE `plos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ses`
--
ALTER TABLE `ses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `technologies`
--
ALTER TABLE `technologies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `territories`
--
ALTER TABLE `territories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `activity_types`
--
ALTER TABLE `activity_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT de la tabla `plos`
--
ALTER TABLE `plos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ses`
--
ALTER TABLE `ses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `technologies`
--
ALTER TABLE `technologies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `territories`
--
ALTER TABLE `territories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
