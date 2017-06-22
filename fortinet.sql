-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-06-2017 a las 01:38:44
-- Versión del servidor: 5.7.18-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fortinet`
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
  `quarter` int(11) DEFAULT NULL,
  `smart_ticket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_executed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `execution_date` date DEFAULT NULL,
  `time_used` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `activities`
--

INSERT INTO `activities` (`id`, `user_id`, `activity_type_id`, `country_id`, `technology_id`, `se_id`, `date`, `quarter`, `smart_ticket`, `customer`, `description`, `activity_executed`, `execution_date`, `time_used`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 6, 13, 17, '2017-06-19', 1, NULL, NULL, 'prueba', 'prueba', NULL, 25, '2017-06-19 18:41:18', '2017-06-19 18:41:18'),
(2, 2, 2, 5, 14, 12, '2017-06-19', 2, NULL, NULL, 'Prueba', 'Prueba', NULL, 56, '2017-06-20 02:28:19', '2017-06-20 02:28:19'),
(3, 2, 4, 17, 16, 16, '2017-06-14', 2, '1223', 'CLARO', 'efsdcds', NULL, '2017-06-28', 60, '2017-06-20 02:44:09', '2017-06-20 02:44:09'),
(4, 2, 2, 6, 4, 18, '2017-06-08', 2, '4444', 'DIAN', 'dsds\r\ndsfndslkjb\r\n3255nb2\r\newfnkjefbjkdsbckjancialbjaslkbcjskbcyuvc\r\ndsiubd dsucbias c cx saoj saji ciuw dxois XIS', 'dsds\r\ndsfndslkjb\r\n3255nb2\r\newfnkjefbjkdsbckjancialbjaslkbcjskbcyuvc\r\ndsiubd dsucbias c cx saoj saji ciuw dxois XIS', '2017-06-28', 120, '2017-06-20 17:28:07', '2017-06-20 17:28:07');

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
(1, 'Administrative Activity', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(2, 'Customer/Partner Meeting', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(3, 'Docs Creation', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(4, 'Event Support', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(5, 'Internal Meeting', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(6, 'Internal Training Delivery', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(7, 'Lab Setup', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(8, 'Multimedia Content', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(9, 'Partner Training Delivery', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(10, 'PoC', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(11, 'Post Sales Support', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(12, 'Product Demo', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(13, 'Product Training Prep.', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(14, 'PTO', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(15, 'QBR', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(16, 'Response to concerns', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(17, 'RFP/RFI Response', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(18, 'Self Training', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(19, 'Site Survey', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(20, 'Translations', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00');

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
(1, 'Argentina', 'SolaEast', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(2, 'Belize', 'Caribbean', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(3, 'Bolivia', 'SolaEast', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(4, 'Brazil', 'Brazil', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(5, 'Chile', 'SolaWest', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(6, 'Colombia', 'Colombia', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(7, 'Costa Rica', 'Central', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(8, 'Dominican Republic', 'Caribbean', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(9, 'Ecuador', 'SolaWest', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(10, 'El Salvador', 'Central', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(11, 'English Caribbean', 'Caribbean', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(12, 'French Guiana', 'Caribbean', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(13, 'Guatemala', 'Central', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(14, 'Guyana', 'Caribbean', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(15, 'Haiti', 'Caribbean', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(16, 'Honduras', 'Central', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(17, 'Jamaica', 'Caribbean', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(18, 'LATAM and Caribbean', 'LATAM', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(19, 'Mexico', 'Mexico', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(20, 'Nicaragua', 'Central', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(21, 'Panama', 'Central', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(22, 'Paraguay', 'SolaEast', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(23, 'Peru', 'SolaWest', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(24, 'Puerto Rico', 'Caribbean', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(25, 'Suriname', 'Caribbean', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(26, 'Trinidad and Tobago', 'Caribbean', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(27, 'Uruguay', 'SolaEast', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(28, 'USA', 'USA', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(29, 'Venezuela', 'SolaEast', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00');

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
(1, '2017_05_19_164207_create_projects_table', 1),
(2, '2017_05_19_172019_create_plos_table', 1),
(3, '2017_06_12_013308_create_activity_types_table', 1),
(4, '2017_06_12_013351_create_countries_table', 1),
(5, '2017_06_12_013413_create_territories_table', 1),
(6, '2017_06_12_013514_create_technologies_table', 1),
(7, '2017_06_12_014114_create_ses_table', 1),
(8, '2017_06_12_175134_create_activities_table', 1),
(9, '2017_06_13_215929_create_users_table', 1),
(10, '2017_06_16_182151_add_column_remember_toker_to_users', 1),
(19, '2017_05_19_164207_create_projects_table', 1),
(20, '2017_05_19_172019_create_plos_table', 1),
(21, '2017_06_12_013308_create_activity_types_table', 1),
(22, '2017_06_12_013351_create_countries_table', 1),
(23, '2017_06_12_013413_create_territories_table', 1),
(24, '2017_06_12_013514_create_technologies_table', 1),
(25, '2017_06_12_014114_create_ses_table', 1),
(26, '2017_06_12_175134_create_activities_table', 1),
(27, '2017_06_13_215929_create_users_table', 1),
(28, '2017_06_16_182151_add_column_remember_toker_to_users', 1);

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
(1, 'Abraham Jaramillo', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(2, 'Adrian Vargas', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(3, 'Alan Aquino', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(4, 'Alan Hernandez', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(5, 'Alejandro Arriaga', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(6, 'Alessandro Nobre', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(7, 'Alex Fornaris', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(8, 'Alexandre Bonatti', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(9, 'Ana María Fuentes', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(10, 'Andre Lawrence', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(11, 'Andre Sostizzo', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(12, 'Andrés Cajamarca', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(13, 'Andres Restrepo', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(14, 'Antonio Chávez', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(15, 'Antonio Davila', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(16, 'Argenis Ramírez', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(17, 'Arturo Torres', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(18, 'Axel Gonzalez', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(19, 'Bruno Noronha', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(20, 'Bruno Rosa', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(21, 'Byron González', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(22, 'Carlos Andrés Zapata', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(23, 'Carlos Arturo Castro', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(24, 'Carlos Cortizo', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(25, 'Carlos Firpo', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(26, 'Carlos Martinez', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(27, 'Carlos Olivares', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(28, 'Carlos Suero', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(29, 'Carlos Yahir Ramirez', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(30, 'Cesar Navarrete', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(31, 'Cesar Romero', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(32, 'Cristian Ulrich', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(33, 'David Millan Geronimo', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(34, 'David Ramirez', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(35, 'Denis Albuquerque', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(36, 'Diego da Silva Oliveira', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(37, 'Douglas Bento da Silva', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(38, 'Douglas Santos', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(39, 'Edgar Gomez', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(40, 'Edgar Mercado', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(41, 'Edgar Rodriguez', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(42, 'Eduardo Louback Ramos', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(43, 'Emilio Borbolla', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(44, 'Emilio Sánchez', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(45, 'Emmanuel Oscar', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(46, 'Erika Rivera', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(47, 'Ernesto Lopez', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(48, 'Fabio Añino', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(49, 'Fábio Paim', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(50, 'Fernando Gallardo', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(51, 'Francisco Escamilla', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(52, 'Freddy Bello', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(53, 'Frederico Oliveira', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(54, 'Gabriel Barreto', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(55, 'Gabriel Salvador', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(56, 'Gerardo Cortes Hernandez', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(57, 'German Villavicencio', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(58, 'Gerson Watanabe', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(59, 'Guilherme Morais', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(60, 'Gustavo Cruz', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(61, 'Hector Salgado', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(62, 'Hernan Muller', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(63, 'Hernando Castiglioni', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(64, 'Hugo Carreon Cacho', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(65, 'Ibere Pereira', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(66, 'Jairo Mondragon', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(67, 'Javier Rosado', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(68, 'Jean Manuel Dessoliers', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(69, 'Jesus Bred', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(70, 'Jesus Morales', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(71, 'Jonathan Camacho', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(72, 'Jonathan Dominguez', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(73, 'Jorge Ayala', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(74, 'Jorge Martin', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(75, 'Jorge Mendes', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(76, 'Jose Adrian Gomez', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(77, 'Jose Daniel Gonzalez', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(78, 'Jose Sierra Sepulveda', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(79, 'Josue Vergara', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(80, 'Juan Carlos Pinzon', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(81, 'Juan Carlos Sanchez', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(82, 'Juan Manuel Lopez', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(83, 'Juan Pablo Fernández', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(84, 'Juan Pablo Mejía Moya', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(85, 'Julio Alberto Rodríguez', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(86, 'Julio Alberto Rodriguez Fleitas', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(87, 'Julio César Salas', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(88, 'Julio Uricari', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(89, 'Julio Serna', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(90, 'Lawrence Tai', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(91, 'Layard Terrero', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(92, 'Leandro Reyes', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(93, 'Leandro Werder', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(94, 'Leonardo Urrutia', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(95, 'Luis Guembes', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(96, 'Luis Hernandez', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(97, 'Luiz Bortoto', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(98, 'Marcelo Mayorga', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(99, 'Marco Avila', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(100, 'Marco Montes', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(101, 'Mark Ricárdez Zárate', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(102, 'Marlon Bustillo', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(103, 'Martin Hoz', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(104, 'Mauricio Barrera', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(105, 'Mauricio Carral', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(106, 'Maximiliano Noce', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(107, 'Michel Barbosa', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(108, 'Miguel Ángel Juárez', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(109, 'Monica Jimenez', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(110, 'Nehemias Mendoza', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(111, 'None', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(112, 'Omar Campos', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(113, 'Omar Jacinto', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(114, 'Orlando Nunez', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(115, 'Oscar Camacho', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(116, 'Oscar Cifuentes', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(117, 'Oscar Cortés', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(118, 'Oscar Molina', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(119, 'Pablo Aguayo', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(120, 'Pablo Miño', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(121, 'Paul Iván Morales', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(122, 'Pedro Ortiz', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(123, 'Rafael Lustosa', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(124, 'Ricardo Guzmán', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(125, 'Ricardo Prado', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(126, 'Rina Cortez', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(127, 'Rodolfo Castro', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(128, 'Rodrigo Garcia', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(129, 'Rodrigo Haidar', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(130, 'Rodrigo Vázquez', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(131, 'Rolando Antón', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(132, 'Rudiger Fogelbach', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(133, 'Sebastian Russo', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(134, 'Several', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(135, 'TBH', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(136, 'Thiago Borges', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(137, 'Tomas Asmat', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(138, 'Victor Hugo Piña', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(139, 'Vincent Corbett', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(140, 'Vitor Caike', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(141, 'Yamidt Henao', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00');

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
(1, 'FortiADC', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(2, 'FortiAnalyzer', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(3, 'FortiAP', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(4, 'FortiAuthenticator', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(5, 'FortiBridge', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(6, 'FortiCache', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(7, 'FortiCamera', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(8, 'FortiClient', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(9, 'FortiCloud/FortiDeploy', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(10, 'FortiConverter', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(11, 'FortiCore', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(12, 'FortiDB', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(13, 'FortiDDoS', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(14, 'FortiDirector', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(15, 'FortiExtender', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(16, 'FortiFone', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(17, 'FortiGate', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(18, 'FortiHypervisor', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(19, 'FortiMail', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(20, 'FortiManager', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(21, 'FortiPresence', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(22, 'FortiPortal', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(23, 'FortiRecorder', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(24, 'FortiSandbox', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(25, 'FortiSIEM', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(26, 'FortiSwitch', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(27, 'FortiTap', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(28, 'FortiTester', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(29, 'FortiToken', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(30, 'FortiVoice', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(31, 'FortiWAN', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(32, 'FortiWeb', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(33, 'None', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(34, 'Wireless Infrastructure', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(35, 'FortiConnect', NULL, '2017-06-19 00:00:00', '2017-06-19 00:00:00'),
(36, 'FortiCASB', NULL, '2017-06-20 02:46:53', '2017-06-20 02:46:53');

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
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `deleted_at`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Sergio Rios', 'sergioriosg@gmail.com', '$2y$10$68nRjrrOZrdigmN/1XUxhedxH5rlPr/WYBTo1gxzg2j2PlS/lAAPm', NULL, '2017-06-19 17:52:07', '2017-06-19 17:52:07', '1nV6UJt2qgb9Fc31PGhCdCTILRingC4LVszMCpctrNrDRw2yPtO9Y90JitIZ'),
(2, 'Oscar Cifuentes', 'oscarcif@gmail.com', '$2y$10$0mdTsSQNXnGMU6Notx0sd.2ogR7pgcFWGIzm.VS238Bjww4Q4S8Ee', NULL, '2017-06-20 02:27:39', '2017-06-20 02:27:39', '');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT de la tabla `technologies`
--
ALTER TABLE `technologies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
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
