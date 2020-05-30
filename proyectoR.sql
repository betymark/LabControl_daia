-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2020 a las 14:51:34
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario2`
--

CREATE TABLE `inventario2` (
  `idproducto` int(10) NOT NULL,
  `matricula` text NOT NULL,
  `email` text NOT NULL,
  `material` text NOT NULL,
  `estado` text NOT NULL,
  `marca` text NOT NULL,
  `codigo` text NOT NULL,
  `cantidad` text NOT NULL,
  `presdes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventario2`
--

INSERT INTO `inventario2` (`idproducto`, `matricula`, `email`, `material`, `estado`, `marca`, `codigo`, `cantidad`, `presdes`) VALUES
(4, '145H13004', '145H13004@alumno.ujat.mx', 'Xileno', 'MEYER', 'Bueno', '4567', '2L', '15-05-2020'),
(5, '1', 'betys7023@gmail.com', 'm', 'bien', 'mayer', '5626', '1', '23-04-2'),
(6, '1', 'bety@gmail.com', 'vaso', 'bueno', 'meyer', '6745', '1', '1'),
(8, '2', 'de@gmail.com', '2', '2', '2', '2', '2', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellidoP` text NOT NULL,
  `apellidoM` text NOT NULL,
  `email` text NOT NULL,
  `ocupacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `apellidoP`, `apellidoM`, `email`, `ocupacion`) VALUES
(8, 'RICARDO', '22', 'MENDEZ', 'Ricar@gmail.com', 'Estudiante'),
(9, 'maco', '22', 'bety', 'maco@gmaiil.com', 'estudiante'),
(10, 'juan', '21', 'PEREZ', 'junito@gmail.com', 'Encargado'),
(12, 'Laura', 'LEÃ“N', 'PINEDA', 'LAU.M@GMAIL.COM', 'alumno'),
(13, 'Martha', 'Piedras', 'campan', 'M.PIedra@gmail.com', 'ESTUDIANTE'),
(14, 'bety', 'sanche', 'damina', 'betys@gmail.com', 'estudiante');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inventario2`
--
ALTER TABLE `inventario2`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inventario2`
--
ALTER TABLE `inventario2`
  MODIFY `idproducto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
