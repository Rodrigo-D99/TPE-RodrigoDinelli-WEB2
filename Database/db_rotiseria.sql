-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2022 a las 20:13:40
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_rotiseria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id_category`, `name`, `description`) VALUES
(1, 'Milanesa de pollo', 'Una milanesa de pollo'),
(2, 'Milanesa de ternera', 'Una milanesa de ternera'),
(3, 'Pizza de Mozzarela', 'Contiene mozzarella y orégano'),
(4, 'Pizza Calabreza', 'Contiene mozzarella y salame'),
(5, 'Pizza Especial', 'Contiene mozzarella, paleta y morron');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foods`
--

CREATE TABLE `foods` (
  `Id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `id_category_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `foods`
--

INSERT INTO `foods` (`Id`, `name`, `price`, `id_category_fk`) VALUES
(1, 'Milanesa de pollo', '600', 1),
(2, 'Milanesa de ternera', '630', 2),
(3, 'Pizza de Mozzarela', '900', 3),
(4, 'Pizza Calabreza', '1050', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `id_category_fk` (`id_category_fk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `foods`
--
ALTER TABLE `foods`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `foods`
--
ALTER TABLE `foods`
  ADD CONSTRAINT `foods_ibfk_1` FOREIGN KEY (`id_category_fk`) REFERENCES `categories` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
