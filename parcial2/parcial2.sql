-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2020 a las 03:20:20
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parcial2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `alumnoid` int(11) NOT NULL,
  `carnet` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `grado` varchar(50) NOT NULL,
  `seccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`alumnoid`, `carnet`, `nombre`, `apellido`, `grado`, `seccion`) VALUES
(1, 20200001, 'Ingrid Noemi', 'Aguilar Marroquín', 'Primero Básico', 'A'),
(2, 20200002, 'Yadira Amairany', 'Ajcabul cal', 'Primero Básico', 'B'),
(3, 20200003, 'Elmer Rogelio', 'Alcántara Rodríguez', 'Segundo Básico', 'A'),
(4, 20200004, 'Madeline Elizabeth', 'Alija Carrillo', 'Segundo Básico', 'B'),
(5, 20200005, 'Rudy Saul', 'Alvarado Franco', 'Tercero Básico', 'A'),
(6, 20200006, 'Dulce Marina', 'Alvarez García', 'Tercero Básico', 'B');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
