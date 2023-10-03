-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3308
-- Tiempo de generación: 03-10-2023 a las 18:48:57
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nombre_empresa` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `ubicacion` varchar(100) DEFAULT NULL,
  `foto_empresa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nombre_empresa`, `descripcion`, `ubicacion`, `foto_empresa`) VALUES
(1, 'Ossur', 'Össur se dedica a mejorar la movilidad de las personas. Como empresa líder en\r\nortopedia no invasiva', 'Madrid, España.', 'ossur.png'),
(2, 'Ottobock', 'Las soluciones protésicas Ottobock están diseñadas\r\n                                    para mantene', 'Alemania', 'Ottobock.jpg'),
(3, 'Exii', 'La start-up nipona Exii ha diseñado un brazo protésico electrónico con funciones\r\n                  ', 'Japón', 'exii.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `ID_Biblioteca` int(11) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Autor` varchar(50) NOT NULL,
  `Sinopsis` varchar(350) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `Fecha_Publicacion` date NOT NULL,
  `PortadaURL` varchar(255) NOT NULL,
  `ruta_pdf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`ID_Biblioteca`, `Titulo`, `Autor`, `Sinopsis`, `categoria`, `Fecha_Publicacion`, `PortadaURL`, `ruta_pdf`) VALUES
(73, 'Esta bien ser diferente', 'Todd Par', 'Ser diferente es una historia que fomenta la tolerancia en los niños, invitándolos a ser amables ya construir relaciones de amistad y solidaridad con quienes tienen particularidades únicas. Desde una edad temprana, les enseña la importancia de tratar a todos con respeto, independientemente de cómo luzcan', 'Infantil', '2020-07-07', 'Esta bien ser diferente.jpg', 'esta bien ser diferente.pdf'),
(75, 'Persona con amputación - Guía de rehabilitación', 'Universidad Tecnológica de Pereira ', 'A través de investigaciones y estudios clínicos, el libro revela que la amputación no solo afecta la salud física, sino que también tiene un impacto significativo en la salud mental y en las relaciones familiares.', 'Adultos', '2013-01-01', 'imgonline-com-ua-resize-vXV2DgZqI84.jpg', 'GUIA-AMPUTADOS.pdf'),
(76, 'Herramientas de afrontamiento en duelo por amputacion', 'Julieth Mayerly Patiño Martínez, Paola Andrea Soto', 'El libro se enfoca en recopilar y analizar información de diversas fuentes para destacar la importancia de desarrollar estrategias de afrontamiento cuando una persona experimenta la pérdida de una extremidad.', 'Adultos', '2020-02-01', 'PORTADA BASICA.jpg', '2020_herramientas_afrontamiento_duelo.pdf'),
(77, 'Amputeddy Makes a Choice', 'Kate Policani', '¡Este fue un proyecto maravilloso y una hermosa experiencia para todos nosotros y espero que descargues y leas mi libro con su fantástico arte! No olvides leer nuestro mensaje especial para todos los amputados. Hemos tenido especial cuidado en escribirlo desde el fondo de nuestro corazón.', 'Infantil', '2017-01-01', 'Portada libro make ingles.jpeg', 'amputeddy-makes-a-choice-for-print.pdf'),
(78, 'Amputeddy Helps a Friend', 'Jean bolter', 'Brandon Bear está preocupado porque su papá resultó herido mientras servía en el ejército. Durante una cita de juegos con Todd el Amputeddy, Brandon le hace algunas preguntas importantes a su amigo sobre cómo será diferente su papá. ', 'Infantil', '2012-10-21', 'Captura de pantalla 2023-09-20 183052.png', 'amputeddy-helps-a-friend-for-generic.pdf'),
(79, 'Los amputados y su rehabilitación. -Un reto para el estado.', 'Eduardo Vázquez Vela Sánchez', 'El objetivo de las presentaciones es dar una perspectiva de cuál es el impacto social de\r\nlos amputados en México, qué se vislumbra en el futuro para ayudarlos a rehabilitarse.\r\nAl dar esta panorámica sobre el problema.', 'Apoyo', '2016-01-01', 'PORTADA BASICA.jpg', 'Los amputados y su rehabilitacion.pdf'),
(80, 'Opciones de tratamiento para síndrome de miembro fantasma.', 'Jose Cid Calzada', 'Trata acerca del síndrome: \"Miembro fantasma\" es un fenómeno común entre las personas amputadas, que experimentan sensaciones en la extremidad ausente. Este fenómeno puede afectar significativamente la calidad de vida de quienes lo padecen.', 'Adultos', '2015-01-01', 'miembro fantasma.jpg', 'opciones de tratamiento para sindrome del miembro fantasma.pdf'),
(81, 'EL TRATAMIENTO DEL DUELO. ASESORAMIENTO PSICOLÓGICO Y TERAPIA', 'J William Worden', 'En esta magnífica guía, J. William Worden describe los mecanismos del duelo y los procedimientos que se deben emplear para que las personas puedan afrontar su pérdida y su dolor y consigan superarlos. ', 'Adultos', '2022-11-30', 'tratamientoduelo7.jpg', 'worden william - el tratamiento del duelo.pdf'),
(82, 'Discapacidades e inclusión social', 'Colectivo Loé', 'El presente estudio ofrece un panorama actualizado de la población\r\ncon discapacidades en España y de su evolución en la última\r\ndécada.', 'Apoyo', '2012-01-01', 'Captura de pantalla 2023-09-20 213521.png', 'Libro1.pdf'),
(83, 'Guía para  la inclusión de personas con discapacidad. Acceso a la justicia y derechos político-elect', 'María del Carmen  Carreón Castro', 'Guía a la inclusión de personas con discapacidad para tener garantía que los derechos adquieren aún mayor importancia en \r\nestos tiempos porque la pluralidad y diversidad obligan no solo a reconocer la igualdad formal ante la Constitución y las leyes, sino a propiciar que las personas en condición de discapacidad.', 'Apoyo', '2019-01-01', 'Captura de pantalla 2023-09-20 214009.png', 'Libro2.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(11) NOT NULL,
  `nombre_servicio` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_cliente`
--

CREATE TABLE `servicio_cliente` (
  `id_servicio_cliente` int(11) NOT NULL,
  `id_usuarios` int(11) DEFAULT NULL,
  `id_servicio` int(11) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL,
  `nombre_completo` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(150) NOT NULL,
  `ultimo_acceso` datetime NOT NULL,
  `cod_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `nombre_completo`, `correo`, `usuario`, `contrasena`, `ultimo_acceso`, `cod_rol`) VALUES
(2, 'Pavel', 'pavelrodriguez616@gmail.com', 'PavelR31', 'Leon.2004', '0000-00-00 00:00:00', 1),
(34, 'pavel', 'pavelrodriguez@gmail.com', 'pavel12345', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', '0000-00-00 00:00:00', NULL),
(35, 'Erving', 'ervingcaco@gmail.com', 'Erving Pulpin', 'd62fadbb6398dc2bd0c2d7a404e2223c9a702a3062dc8b0e9e373ba5ae37ecfe752e826ed04d8bddcb09fe1c6ed239360172ba53ef7f1b5b81f63ca8c562d2c7', '2023-09-24 02:59:15', 2),
(36, 'jose', 'antonio.170603@gmail.com', 'Chepe', 'ef921f8ec203f9667f67dc320dbb856f0883b32f154ca1a06239a095ba9538c2ca43c922036d60e11110b7bcd5099c7307819caa50e90df08b01499fb90c3061', '0000-00-00 00:00:00', NULL),
(37, 'pavel', 'pavelrodriguez777@gmail.com', 'pavel123', 'b9a51ab4472863939a8e2e18fc95100bcdd12e86d1105f52aa6624d2a327685883dea8e1cb952ccd76e7fb44c5a24addbefa488efd5b366e36f479f6666977bb', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_roles`
--

CREATE TABLE `usuario_roles` (
  `cod_rol` int(11) NOT NULL,
  `nombre_rol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_roles`
--

INSERT INTO `usuario_roles` (`cod_rol`, `nombre_rol`) VALUES
(1, 'cliente'),
(2, 'administrador'),
(3, 'moderador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`ID_Biblioteca`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `servicio_cliente`
--
ALTER TABLE `servicio_cliente`
  ADD PRIMARY KEY (`id_servicio_cliente`),
  ADD KEY `id_usuarios` (`id_usuarios`),
  ADD KEY `id_servicio` (`id_servicio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `cod_rol` (`cod_rol`);

--
-- Indices de la tabla `usuario_roles`
--
ALTER TABLE `usuario_roles`
  ADD PRIMARY KEY (`cod_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `ID_Biblioteca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicio_cliente`
--
ALTER TABLE `servicio_cliente`
  MODIFY `id_servicio_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Filtros para la tabla `servicio_cliente`
--
ALTER TABLE `servicio_cliente`
  ADD CONSTRAINT `servicio_cliente_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`Id`),
  ADD CONSTRAINT `servicio_cliente_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`cod_rol`) REFERENCES `usuario_roles` (`cod_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
