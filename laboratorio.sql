-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 14-04-2020 a las 04:19:46
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laboratorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `cedula` int(12) NOT NULL,
  `nombre_Medico` varchar(30) DEFAULT NULL,
  `apellido1_Medico` varchar(30) DEFAULT NULL,
  `apellido2_Medico` varchar(30) DEFAULT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `rol` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`cedula`, `nombre_Medico`, `apellido1_Medico`, `apellido2_Medico`, `usuario`, `password`, `rol`) VALUES
(1, 'Leo', 'A', 'C', 'leo', '$2y$12$.svFbIrqY86PNFoO3Q7dSOOTh9sn7.BkuAJV.aoD9pMK4hyraY5Lm', 1),
(3, 'Admi', 'A', 'A', 'admi', '$2y$12$H8gcb5ZsOUI9R61Dimy7AuKBOgzCMC15/UOkGakGuvnWvkAW9ZdFS', 1),
(4, 'Paciente', 'A', 'A', 'paciente', '$2y$12$aUF.giCjG8blV/KwfNAOf.FaKqZs6DZaQvtIOV9wf0b13H6vFeiCu', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `cedula` int(12) NOT NULL,
  `nombre_Paciente` varchar(30) DEFAULT NULL,
  `apellido1_Paciente` varchar(30) DEFAULT NULL,
  `apellido2_Paciente` varchar(30) DEFAULT NULL,
  `edad` int(3) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `genero` varchar(1) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `diagnostico` varchar(1) DEFAULT NULL,
  `modificado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`cedula`, `nombre_Paciente`, `apellido1_Paciente`, `apellido2_Paciente`, `edad`, `email`, `genero`, `telefono`, `diagnostico`, `modificado`) VALUES
(2, 'A', 'A', 'A', 23, 'a@a.com', 'm', '123', 'p', '2020-04-13 22:15:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_Usuario` int(12) NOT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `rol` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_Usuario` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
