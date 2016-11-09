-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2016 a las 10:42:15
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lim_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `longitud` varchar(80) NOT NULL,
  `latitud` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id`, `nombre`, `descripcion`, `longitud`, `latitud`) VALUES
(1, 'SEDE CENTRAL', 'LA SUCURSAL MAS PEGADA DEL MOMENTO', '-75.49935579299927', '10.402221755841511');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `nombre`) VALUES
(1, 'ADMINISTRADOR/A'),
(2, 'MENSAJERO/A'),
(3, 'CAJERO/A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'CONSTRUCCION'),
(2, 'TORNILLERIA'),
(3, 'PINTURA'),
(4, 'EXTERIORES'),
(5, 'INTERIORES'),
(6, 'TRABAJO EN ALTURAS'),
(7, 'TUBERIAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `pass` text NOT NULL,
  `sexo` char(1) NOT NULL,
  `rol` char(1) DEFAULT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `estado` char(1) NOT NULL,
  `cantidad_compras` int(11) NOT NULL,
  `total_compras` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `asunto` varchar(30) NOT NULL,
  `mensaje` varchar(1000) NOT NULL,
  `fecha` date DEFAULT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `correo`, `asunto`, `mensaje`, `fecha`, `estado`) VALUES
(15, 'JESUS', 'jesuselora.16@hotmail.com', 'PROBLEMAS PARA ACCEDER', 'Tengo una cuenta desde el aÃ±o 2014 y nunca me habia presentado problemas hasta el dia de hoy. Estoy seguro que ingreso correctamente mi usuario y contraseÃ±a, pero me rechaza la peticion. Â¿Que podria ser? Gracias.', '2016-10-15', 't');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `pass` text NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `rol` char(1) NOT NULL,
  `estado` char(1) NOT NULL,
  `estado_laboral` varchar(15) NOT NULL,
  `estado_civil` varchar(15) NOT NULL,
  `fecha_nac` date NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `id_jefe` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `nombre`, `apellidos`, `correo`, `pass`, `direccion`, `telefono`, `rol`, `estado`, `estado_laboral`, `estado_civil`, `fecha_nac`, `id_cargo`, `id_jefe`) VALUES
('1052092569', 'JESUS HERNANDO', 'ESCORCIA LORA', 'jesuselora.16@hotmail.com', 'Laddyslora', 'JARDINES DE SAN PEDRO MZ G LT 8', '3127488903', 'A', 't', 'LABORANDO', 'SOLTERO/A', '1996-07-16', 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `codigo` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `precio` double NOT NULL,
  `id_cliente` varchar(30) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_minimo` int(11) NOT NULL,
  `precio` double NOT NULL,
  `veces_vendido` int(11) NOT NULL,
  `estado` char(1) NOT NULL,
  `estado_online` char(1) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `imagen` text,
  `id_almacen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo`, `nombre`, `descripcion`, `stock`, `stock_minimo`, `precio`, `veces_vendido`, `estado`, `estado_online`, `id_categoria`, `marca`, `imagen`, `id_almacen`) VALUES
('105066', 'BROCHA 1', 'PARA TODO TIPO DE PINTURA', 100, 10, 5000, 0, 't', 't', 3, 'ABRACOL', 'files/105066.jpg', NULL),
('167884', 'PINZAS MULTIUSOS', 'PINZA RESISTENTE AL OXIDO', 99, 10, 30000, 1, 't', 't', 1, 'HERRAMIENTAS DEL CARIBE', 'files/167884.jpg', NULL),
('282177', 'MARTILLO 16MM', 'MANGO DE MADERA', 4, 10, 15000, 0, 't', 't', 1, 'HERRAGRO', 'files/282177.jpg', NULL),
('531722', 'PINTURA ANOLOC BRONCE', 'ESPECIAL PARA EXTERIORES', 1, 5, 30000, 0, 't', 't', 3, 'NOVAFLEX', 'files/531722.jpg', NULL),
('569897', 'CEMENTO', 'DURADERO', 15, 5, 50000, 0, 't', 't', 1, 'ARGOS', 'files/569897.png', NULL),
('997157', 'ABRAZADERA METALICA 1"', 'GALVANIZADO', 10, 20, 2000, 0, 't', 't', 7, 'OMEGA', 'files/997157.jpg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_factura`
--

CREATE TABLE `productos_factura` (
  `id` int(11) NOT NULL,
  `codigo_factura` varchar(30) NOT NULL,
  `codigo_producto` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` int(11) NOT NULL,
  `precio` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_empleado_cargo` (`id_cargo`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `FK__categoria` (`id_categoria`),
  ADD KEY `FK__almacen` (`id_almacen`);

--
-- Indices de la tabla `productos_factura`
--
ALTER TABLE `productos_factura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK__factura` (`codigo_factura`),
  ADD KEY `FK__producto` (`codigo_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `productos_factura`
--
ALTER TABLE `productos_factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `FK_empleado_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK__categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos_factura`
--
ALTER TABLE `productos_factura`
  ADD CONSTRAINT `FK__factura` FOREIGN KEY (`codigo_factura`) REFERENCES `factura` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK__producto` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
