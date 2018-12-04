-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2018 a las 00:05:08
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cafeterias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cafeteria`
--

CREATE TABLE `cafeteria` (
  `id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `descripcion` text NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sitioweb` varchar(100) DEFAULT NULL,
  `sucursal` varchar(45) DEFAULT NULL,
  `ranking` bigint(20) DEFAULT NULL,
  `puntaje` bigint(20) DEFAULT NULL,
  `id_estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cafeteria`
--

INSERT INTO `cafeteria` (`id`, `usuarios_id`, `nombre`, `direccion`, `telefono`, `descripcion`, `email`, `sitioweb`, `sucursal`, `ranking`, `puntaje`, `id_estado`) VALUES
(1, 1, 'All Saint Cafe', ' Cdad. de La Paz 2300', '011-4706-0016', 'El café es exquisito, intenso y sabroso. Las opciones para comer dulces y saladas muy buenas, con cosas veganas y cosas sin harina, la carrot cake es fenomenal! el alfajor de higos muy rico también las bolitas proteicas. De los desayunos me pido siempre el de huevos revueltos que está bárbaro, rico y abundante y con una rodaja de pan de masa madre alveolado buenísimo, si querés te traen oliva, pimentero y sal del himalaya lo cual lo hace aún mejor. La última vez le agregamos para compartir un yogur con granola y nos encantó, super casero y espeso y con arándanos! El lugar es lindísimo, decorado con mucho talento, los precios son buenos, sólo tengo una crítica para hacer, que vengo intentando hacer una campaña en todos los cafés que voy para que consideren a las personas que tenemos intolerancia a la lactosa, ahora hay en el mercado muchas marcas de leches deslactosadas hasta un 90 % y eso es nuestra salvación para poder disfrutar de un buen latte o un flat white! La opción de la leche de almendras encarece mucho el café, aquí la cobran hasta $35 y me parece que es muy buena opción si sos vegano, pero no para el resto que tenemos otras opciones. Sería muy bueno que en los cafés empezaran a pensar en esto como una realidad, como cuando se incorporaron las opciones sin TACC.', 'allsaint@gmail.com', 'https://allsaintscafe.com.ar', 'Belgrano', 1, 0, 2),
(2, 6, 'Coffee Town', 'Defensa 961', '4361-0019', 'Después de años de recorrer cafetales, de trabajar directamente con los caficultores en América Latina y África y de perfeccionarnos en los mejores centros internacionales decidimos crear Coffee Town en el corazón de Buenos Aires y con filosofía propia; ofrecer los mejores cafés del mundo a un precio justo.   Somos un grupo de profesionales (Baristas, maestros tostadores y los únicos catadores profesionales del país) que trabajamos para garantizar la máxima calidad en todos los momentos del café (crudo, tostado y en la bebida).  Nuestros catadores analizan los granos de café antes y después de ser tostados para asegurar que los estándares de sus cafés y sus puntuaciones de cata sean siempre Grand Cru o de Especialidad y Premium. Los maestros tostadores estudian cada café y realizan las curvas de tueste indicadas para optimizar su aroma, sabor y cuerpo. Los baristas aplican rigurosamente las técnicas correctas de preparación según los protocolos internacionales y utilizan el método más adecuado para cada tipo de café.  La responsabilidad que cada uno de nosotros pone en su tarea, hace de Coffee Town la primera cafetería de cafés de Especialidad en Argentina y epicentro del café saludable en esta parte del mundo.   Desde el Mercado de San Telmo, inmersos en un ambiente de alimentos gourmet, quienes hacemos Coffee Town le proponemos a través de nuestros cafés iniciar juntos un viaje por la ruta de los sentidos ', 'cofeetown@gmail.com', 'coffeetowncompany.com/', 'San Telmo', 2, 0, 2),
(3, 1, 'Café Tortoni', 'Avenida de Mayo 825', '011 4342-4328', 'El café es exquisito, intenso y sabroso. Las opciones para comer dulces y saladas muy buenas, con cosas veganas y cosas sin harina, la carrot cake es fenomenal! el alfajor de higos muy rico también las bolitas proteicas. De los desayunos me pido siempre el de huevos revueltos que está bárbaro, rico y abundante y con una rodaja de pan de masa madre alveolado buenísimo, si querés te traen oliva, pimentero y sal del himalaya lo cual lo hace aún mejor. La última vez le agregamos para compartir un yogur con granola y nos encantó, super casero y espeso y con arándanos! El lugar es lindísimo, decorado con mucho talento, los precios son buenos, sólo tengo una crítica para hacer, que vengo intentando hacer una campaña en todos los cafés que voy para que consideren a las personas que tenemos intolerancia a la lactosa, ahora hay en el mercado muchas marcas de leches deslactosadas hasta un 90 % y eso es nuestra salvación para poder disfrutar de un buen latte o un flat white! La opción de la leche de almendras encarece mucho el café, aquí la cobran hasta $35 y me parece que es muy buena opción si sos vegano, pero no para el resto que tenemos otras opciones. Sería muy bueno que en los cafés empezaran a pensar en esto como una realidad, como cuando se incorporaron las opciones sin TACC.', 'cafetortoni@gmail.com', 'http://www.cafetortoni.com.ar/', 'San Nicolas', 3, 0, 2),
(4, 1, 'Havanna', 'Florida 948', NULL, 'El café es exquisito, intenso y sabroso. Las opciones para comer dulces y saladas muy buenas, con cosas veganas y cosas sin harina, la carrot cake es fenomenal! el alfajor de higos muy rico también las bolitas proteicas. De los desayunos me pido siempre el de huevos revueltos que está bárbaro, rico y abundante y con una rodaja de pan de masa madre alveolado buenísimo, si querés te traen oliva, pimentero y sal del himalaya lo cual lo hace aún mejor. La última vez le agregamos para compartir un yogur con granola y nos encantó, super casero y espeso y con arándanos! El lugar es lindísimo, decorado con mucho talento, los precios son buenos, sólo tengo una crítica para hacer, que vengo intentando hacer una campaña en todos los cafés que voy para que consideren a las personas que tenemos intolerancia a la lactosa, ahora hay en el mercado muchas marcas de leches deslactosadas hasta un 90 % y eso es nuestra salvación para poder disfrutar de un buen latte o un flat white! La opción de la leche de almendras encarece mucho el café, aquí la cobran hasta $35 y me parece que es muy buena opción si sos vegano, pero no para el resto que tenemos otras opciones. Sería muy bueno que en los cafés empezaran a pensar en esto como una realidad, como cuando se incorporaron las opciones sin TACC.', 'havanna@gmail.com', 'http://www.havanna.com.ar/', 'San Nicolas', 4, 0, 0),
(5, 1, 'Labiela', 'Av. Quintana 600', '011 4804-0449', 'El café es exquisito, intenso y sabroso. Las opciones para comer dulces y saladas muy buenas, con cosas veganas y cosas sin harina, la carrot cake es fenomenal! el alfajor de higos muy rico también las bolitas proteicas. De los desayunos me pido siempre el de huevos revueltos que está bárbaro, rico y abundante y con una rodaja de pan de masa madre alveolado buenísimo, si querés te traen oliva, pimentero y sal del himalaya lo cual lo hace aún mejor. La última vez le agregamos para compartir un yogur con granola y nos encantó, super casero y espeso y con arándanos! El lugar es lindísimo, decorado con mucho talento, los precios son buenos, sólo tengo una crítica para hacer, que vengo intentando hacer una campaña en todos los cafés que voy para que consideren a las personas que tenemos intolerancia a la lactosa, ahora hay en el mercado muchas marcas de leches deslactosadas hasta un 90 % y eso es nuestra salvación para poder disfrutar de un buen latte o un flat white! La opción de la leche de almendras encarece mucho el café, aquí la cobran hasta $35 y me parece que es muy buena opción si sos vegano, pero no para el resto que tenemos otras opciones. Sería muy bueno que en los cafés empezaran a pensar en esto como una realidad, como cuando se incorporaron las opciones sin TACC.', 'labiela@gmail.com', 'www.labiela.com/', 'Recoleta', 5, 0, 0),
(6, 1, 'Hard Rock Cafe', 'Av. Pueyrredon 2501', '011 4807-7625', '                                                dfgddfgdfgdfgdfgdfgd', 'hardrockar@gmail.com', 'www.hardrockcafebuenosaires.com.ar', 'Recoleta', 6, 0, 0),
(7, 1, 'Cafe Martinez', 'Av. Callao 858', '22222222222222222', '                                                            Cadena rockera con un ambiente muy energético que ofrece hamburguesas y clásicos estadounidenses.\r\nDirección: Avenida Pueyrredón y Libertador, Buenos Aires Design, 1119 CABA', 'cafemartinez@gmail.com', 'cuartito.com', 'Recoleta', 7, 0, 0),
(8, 1, 'StarBucks', NULL, NULL, '', 'starbucksar@gmail.com', 'http://www.starbucks.com', 'San Nicolas', 8, 0, 0),
(9, 1, 'Iceland San Telmo', 'Defensa 1105', '011 4361-4889', '', 'icelandhelados@gmail.com', 'http://icelandhelados.com.ar', 'San Telmo', 9, 0, 0),
(10, 1, 'Moliere Cafe', 'Chile 299', '4343-2623', '', 'molierecafe@gmail.com', 'http://www.moliere-cafe.com/', 'San Telmo', 10, 0, 0),
(59, 1, 'Negro Cueva de Café', 'Suipacha 637', '4884-9889', '', 'negrocueva@gmail.com', 'http://negrocuevadecafe.com/', 'Recoleta', 2, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cafeterias_comentarios`
--

CREATE TABLE `cafeterias_comentarios` (
  `id` int(11) NOT NULL,
  `id_cafeteria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cafeterias_comentarios`
--

INSERT INTO `cafeterias_comentarios` (`id`, `id_cafeteria`, `id_usuario`, `comentario`, `estado`, `fecha`) VALUES
(1, 2, 4, ' priumer comentario', 1, '2018-08-07 20:03:20'),
(2, 59, 4, ' probando comentarios', 1, '2018-08-08 15:23:33'),
(3, 3, 26, ' coenmtario prueba', 1, '2018-08-08 16:47:50'),
(4, 1, 26, ' kkkkk', 1, '2018-08-08 19:16:07'),
(5, 1, 4, ' qweqweqweqwe', 1, '2018-08-08 19:16:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cafeterias_estado`
--

CREATE TABLE `cafeterias_estado` (
  `id` int(11) NOT NULL,
  `estados_id` int(11) NOT NULL,
  `cafeteria_id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `comentario` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cafeteria_has_imagenes`
--

CREATE TABLE `cafeteria_has_imagenes` (
  `id` int(11) NOT NULL,
  `cafeteria_id` int(11) NOT NULL,
  `imagenes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cafeteria_has_imagenes`
--

INSERT INTO `cafeteria_has_imagenes` (`id`, `cafeteria_id`, `imagenes_id`) VALUES
(25, 7, 37),
(26, 7, 38),
(27, 59, 39);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_cafeterias`
--

CREATE TABLE `categorias_cafeterias` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias_cafeterias`
--

INSERT INTO `categorias_cafeterias` (`id`, `descripcion`) VALUES
(1, 'Historica'),
(2, 'Gourmet'),
(3, 'Degustacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_cafeteria`
--

CREATE TABLE `categoria_cafeteria` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_cafeteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria_cafeteria`
--

INSERT INTO `categoria_cafeteria` (`id`, `id_categoria`, `id_cafeteria`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `estados_id` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `comentario` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `usuarios_id`, `estados_id`, `fecha`, `comentario`) VALUES
(1, 4, 1, '2018-05-20 00:00:00', 'Fui varias veces, inclusive fui a su antigua sucursal de Arenales, y nunca me decepciono. Lo coloco entre los mejores junto '),
(2, 4, 2, '2018-05-20 00:00:00', 'Fui a probar el cafe en el el lugar que, segun habia leido, era muy bueno. Decepcionante, pedi un cafe cargado ( ya que generalmente suelo hacer este comentario para advertir que no me gusta un \"jugo de paeaguas ) fy recibi un cafe muy suave, sin cuerpo y casi sin gusto.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `descripcion`) VALUES
(1, 'Activo'),
(2, 'Inactivo'),
(3, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `titulo` tinytext NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_evento` date NOT NULL,
  `ubicacion_imagen` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `titulo`, `descripcion`, `fecha_evento`, `ubicacion_imagen`, `estado`) VALUES
(39, 'onocer la planta y las diferentes variedades', 'Análisis sensorial del cafe', '          Objetivos:\r\n• Conocer la historia de la caficultura\r\n• Identificar los cafés de las diferentes regiones y países\r\n• Poder realizar diferentes preparaciones de las mas simples a las mas complejas\r\nContenidos Mínimos:\r\n• Historia del Café\r\n• Caficultura en el mundo\r\n• Preparación de cafés filtrados\r\n• Preparación básica de espresso y cappuccino\r\n• Arte Latte\r\n• Coctelería Básica\r\nCatación\r\nObjetivos:\r\n• Conocer la planta y las diferentes variedades\r\n• Identificar los diferentes procesos de elaboración\r\n• Identificar las diferentes calidades mediante el análisis sensorial\r\nContenidos Mínimos:\r\n• Botánica y variedades\r\n• Cultivo\r\n• Cosecha y Post cosecha\r\n• Procesos\r\n• Calidades\r\n• Análisis sensorial\r\n• Tueste\r\n• Cataciones', '2018-08-30', 'img/eventos/id_39_descarga.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `nombre_sistema` varchar(80) DEFAULT NULL,
  `ubicacion` varchar(80) DEFAULT NULL,
  `descripcion` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `usuarios_id`, `nombre_sistema`, `ubicacion`, `descripcion`) VALUES
(37, 1, 'id_7_cafe-martinez-logo-2-85-1398126116.jpg', 'img/cafeterias/id_7_cafe-martinez-logo-2-85-1398126116.jpg', 'Portada cafeteria'),
(38, 1, 'id_7_cafe-martinez-logo-2-85-1398126116.jpg', 'img/cafeterias/id_7_cafe-martinez-logo-2-85-1398126116.jpg', 'Portada cafeteria'),
(39, 1, 'id_59_negro1_1000.jpg', 'img/cafeterias/id_59_negro1_1000.jpg', 'Portada cafeteria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_usuario`
--

CREATE TABLE `rol_usuario` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol_usuario`
--

INSERT INTO `rol_usuario` (`id`, `descripcion`) VALUES
(1, 'Admin'),
(2, 'Cafeteria'),
(3, 'Editor'),
(4, 'Registrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `rol_usuario_id` int(11) NOT NULL,
  `estados_id` int(11) NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `apellido` varchar(80) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `ubicacion_foto` varchar(45) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `rol_usuario_id`, `estados_id`, `nombre`, `apellido`, `email`, `pass`, `ubicacion_foto`, `fecha_registro`) VALUES
(1, 1, 1, 'Admin', 'Admin', 'admin@cafeteriasba.com', '$2y$10$prXfaT96WFmAZ08VS3ejG.HgvLgnc0yczuJK2RPNxUgyNOfJ8Ruq.', 'img/usuarios/id_4_id_64_1.jpg', '2018-05-18 06:00:00'),
(3, 3, 1, 'Editor nuevo', 'Editor nuevo', 'editornuevo@cafeteriasba.com', '$2y$10$ixpEnUbzIYyEIjkj8wAaXeTH6Srl8khoSpJ.DLGGmZUNJ/sYBumNe', 'img/usuarios/id_4_id_64_1.jpg', '2018-05-18 06:00:00'),
(4, 4, 1, 'Sergio', 'Martinez', 'sergio@gmail.com', '$2y$10$562rsYtXrixj1rKvbbOt4eKIT5PFQVT9uvxv.N83d5Xa0j23PMk.m', 'img/usuarios/id_4_id_64_1.jpg', '2018-05-18 06:00:00'),
(5, 2, 1, 'All saint', 'cafe', 'allsaint@gmail.com', '12121325', 'img/usuarios/id_4_id_64_1.jpg', '2018-05-20 06:00:00'),
(6, 2, 1, 'cofee town', 'caefteria', 'cofeetown@gmail.com', '225213', 'img/usuarios/id_4_id_64_1.jpg', '2018-05-20 06:00:00'),
(26, 3, 1, 'pedro', 'gonzales', 'g@g.com', '$2y$10$/JfnGQxXxdV76xtcVDAc3uQD9kG9hGj/B6QJj2HdkoClcAWSeYVV2', 'img/usuarios/id_26_descarga.jpg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_cafeterias_favoritas`
--

CREATE TABLE `usuarios_cafeterias_favoritas` (
  `id` int(11) NOT NULL,
  `id_cafeteria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nuevo_comentario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_cafeterias_favoritas`
--

INSERT INTO `usuarios_cafeterias_favoritas` (`id`, `id_cafeteria`, `id_usuario`, `fecha`, `nuevo_comentario`) VALUES
(20, 1, 26, '2018-08-08 19:16:56', 0),
(21, 1, 4, '2018-08-08 19:16:27', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cafeteria`
--
ALTER TABLE `cafeteria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_cafeteria_usuarios1_idx` (`usuarios_id`);

--
-- Indices de la tabla `cafeterias_comentarios`
--
ALTER TABLE `cafeterias_comentarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_comentarios_has_usuarios_cafeteria1_idx` (`id_cafeteria`);

--
-- Indices de la tabla `cafeterias_estado`
--
ALTER TABLE `cafeterias_estado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_estados_has_cafeteria_cafeteria1_idx` (`cafeteria_id`),
  ADD KEY `fk_estados_has_cafeteria_estados1_idx` (`estados_id`),
  ADD KEY `fk_cafeterias_estado_usuarios1_idx` (`usuarios_id`);

--
-- Indices de la tabla `cafeteria_has_imagenes`
--
ALTER TABLE `cafeteria_has_imagenes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_cafeteria_has_imagenes_imagenes1_idx` (`imagenes_id`),
  ADD KEY `fk_cafeteria_has_imagenes_cafeteria1_idx` (`cafeteria_id`);

--
-- Indices de la tabla `categorias_cafeterias`
--
ALTER TABLE `categorias_cafeterias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indices de la tabla `categoria_cafeteria`
--
ALTER TABLE `categoria_cafeteria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_categorias_has_cafeteria_cafeteria1_idx` (`id_cafeteria`),
  ADD KEY `fk_categorias_has_cafeteria_categorias1_idx` (`id_categoria`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_comentarios_usuarios1_idx` (`usuarios_id`),
  ADD KEY `fk_comentarios_estados1_idx` (`estados_id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_imagenes_usuarios1_idx` (`usuarios_id`);

--
-- Indices de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_usuarios_rol_usuario1_idx` (`rol_usuario_id`),
  ADD KEY `fk_usuarios_estados1_idx` (`estados_id`);

--
-- Indices de la tabla `usuarios_cafeterias_favoritas`
--
ALTER TABLE `usuarios_cafeterias_favoritas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cafeteria`
--
ALTER TABLE `cafeteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `cafeterias_comentarios`
--
ALTER TABLE `cafeterias_comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cafeterias_estado`
--
ALTER TABLE `cafeterias_estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cafeteria_has_imagenes`
--
ALTER TABLE `cafeteria_has_imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `categorias_cafeterias`
--
ALTER TABLE `categorias_cafeterias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categoria_cafeteria`
--
ALTER TABLE `categoria_cafeteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuarios_cafeterias_favoritas`
--
ALTER TABLE `usuarios_cafeterias_favoritas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cafeteria`
--
ALTER TABLE `cafeteria`
  ADD CONSTRAINT `fk_cafeteria_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cafeterias_comentarios`
--
ALTER TABLE `cafeterias_comentarios`
  ADD CONSTRAINT `fk_comentarios_has_usuarios_cafeteria1` FOREIGN KEY (`id_cafeteria`) REFERENCES `cafeteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comentarios_has_usuarios_comentarios1` FOREIGN KEY (`id_usuario`) REFERENCES `comentarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cafeterias_estado`
--
ALTER TABLE `cafeterias_estado`
  ADD CONSTRAINT `fk_cafeterias_estado_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estados_has_cafeteria_cafeteria1` FOREIGN KEY (`cafeteria_id`) REFERENCES `cafeteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estados_has_cafeteria_estados1` FOREIGN KEY (`estados_id`) REFERENCES `estados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cafeteria_has_imagenes`
--
ALTER TABLE `cafeteria_has_imagenes`
  ADD CONSTRAINT `fk_cafeteria_has_imagenes_cafeteria1` FOREIGN KEY (`cafeteria_id`) REFERENCES `cafeteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cafeteria_has_imagenes_imagenes1` FOREIGN KEY (`imagenes_id`) REFERENCES `imagenes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `categoria_cafeteria`
--
ALTER TABLE `categoria_cafeteria`
  ADD CONSTRAINT `fk_categorias_has_cafeteria_cafeteria1` FOREIGN KEY (`id_cafeteria`) REFERENCES `cafeteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_categorias_has_cafeteria_categorias1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_cafeterias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_comentarios_estados1` FOREIGN KEY (`estados_id`) REFERENCES `estados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comentarios_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `fk_imagenes_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_estados1` FOREIGN KEY (`estados_id`) REFERENCES `estados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuarios_rol_usuario1` FOREIGN KEY (`rol_usuario_id`) REFERENCES `rol_usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
