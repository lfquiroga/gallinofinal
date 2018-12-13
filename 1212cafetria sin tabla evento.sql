-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2018 a las 04:46:17
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cafeteria`
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
(4, 1, 'Havanna', 'Florida 948', '4212-5901', 'El café es exquisito, intenso y sabroso. Las opciones para comer dulces y saladas muy buenas, con cosas veganas y cosas sin harina, la carrot cake es fenomenal! el alfajor de higos muy rico también las bolitas proteicas. De los desayunos me pido siempre el de huevos revueltos que está bárbaro, rico y abundante y con una rodaja de pan de masa madre alveolado buenísimo, si querés te traen oliva, pimentero y sal del himalaya lo cual lo hace aún mejor. La última vez le agregamos para compartir un yogur con granola y nos encantó, super casero y espeso y con arándanos! El lugar es lindísimo, decorado con mucho talento, los precios son buenos, sólo tengo una crítica para hacer, que vengo intentando hacer una campaña en todos los cafés que voy para que consideren a las personas que tenemos intolerancia a la lactosa, ahora hay en el mercado muchas marcas de leches deslactosadas hasta un 90 % y eso es nuestra salvación para poder disfrutar de un buen latte o un flat white! La opción de la leche de almendras encarece mucho el café, aquí la cobran hasta $35 y me parece que es muy buena opción si sos vegano, pero no para el resto que tenemos otras opciones. Sería muy bueno que en los cafés empezaran a pensar en esto como una realidad, como cuando se incorporaron las opciones sin TACC.', 'havanna@gmail.com', 'www.havana.com', 'San Nicolas', 4, 0, 3),
(5, 1, 'Labiela', 'Av. Quintana 600', '011 4804-0449', 'El café es exquisito, intenso y sabroso. Las opciones para comer dulces y saladas muy buenas, con cosas veganas y cosas sin harina, la carrot cake es fenomenal! el alfajor de higos muy rico también las bolitas proteicas. De los desayunos me pido siempre el de huevos revueltos que está bárbaro, rico y abundante y con una rodaja de pan de masa madre alveolado buenísimo, si querés te traen oliva, pimentero y sal del himalaya lo cual lo hace aún mejor. La última vez le agregamos para compartir un yogur con granola y nos encantó, super casero y espeso y con arándanos! El lugar es lindísimo, decorado con mucho talento, los precios son buenos, sólo tengo una crítica para hacer, que vengo intentando hacer una campaña en todos los cafés que voy para que consideren a las personas que tenemos intolerancia a la lactosa, ahora hay en el mercado muchas marcas de leches deslactosadas hasta un 90 % y eso es nuestra salvación para poder disfrutar de un buen latte o un flat white! La opción de la leche de almendras encarece mucho el café, aquí la cobran hasta $35 y me parece que es muy buena opción si sos vegano, pero no para el resto que tenemos otras opciones. Sería muy bueno que en los cafés empezaran a pensar en esto como una realidad, como cuando se incorporaron las opciones sin TACC.', 'labiela@gmail.com', 'www.labiela.com/', 'Recoleta', 51, 0, 1),
(6, 1, 'Hard Rock Cafe', 'Av. Pueyrredon 2501', '011 4807-7625', 'Hard Rock Cafe es una cadena de restaurantes fundada en 1971 por Isaac Tigrett y Peter Morton. Todos los establecimientos están decorados con objetos de culto del rock como guitarras de grupos famosos, y mientras se sirve comida típica estadounidense se visualizan videoclips de bandas pertenecientes al género.', 'hardrockar@gmail.com', 'www.hardrockcafebuenosaires.com.ar', 'Recoleta', 6, 0, 1),
(8, 1, 'StarBucks', 'cordoba 1989', '4555-6565', 'El primer local con el nombre Starbucks fue abierto en Seattle, Washington en 1971 por tres socios: el profesor de inglés Jerry Baldwin, el profesor de historia Zev Siegel, y el escritor Gordon Bowker. Los tres, inspirados por el empresario cafetero Alfred Peet, abrieron su primera tienda de venta de granos y máquinas para café, ubicada en el 2000 de la Avenida Western, de 1971 a 1976. Durante el primer año fueron clientes exclusivos de Alfred Peet para luego comenzar a adquirir granos verdes de café de otros proveedores.\r\n\r\nEl empresario Howard Schultz se incorporó a la empresa en 1982, y después de un viaje a Milán, propuso a sus socios ampliar la operación de venta de granos de café, con la venta de café exprés y otros, lo que fue rechazado por éstos por considerar que esta nueva actividad distraería el objetivo original de la empresa, además estimaban que el café era algo que debía ser preparado en el hogar.\r\n\r\nSchultz abrió en 1985 su propia cadena de cafeterías con el nombre Il Giornale, tomando el nombre de un periódico publicado en Milán. Un año antes, los tres dueños originales habían decidido comprar la empresa de Alfred Peet, Peet\'s, y vender la cadena Starbucks a Howard Schutz, quien a su vez decidió cambiar el nombre de su empresa Il Giornale por Starbucks.\r\n\r\nEn 1987 la nueva cadena de cafeterías Starbucks abrió sus primeros locales en las afueras de Seattle y en Chicago. La empresa se incorporó a la bolsa de valores el 26 de junio de 1992, desde entonces las acciones han tenido un crecimiento sostenido alcanzando los 39 dólares en 2006. A partir de ese año la tendencia ha sido a la baja alcanzando el 2008 los 17 dólares.\r\n\r\nEn 1999 varios locales fueron vandalizados durante las Manifestaciones contra la cumbre de la OMC en Seattle.[cita requerida]\r\n\r\nEn el año 2000 se introdujeron unos productos bajo la etiqueta comercio justo', 'starbucksar@gmail.com', 'http://www.starbucks.com', 'San Nicolas', 8, 0, 1),
(9, 1, 'Iceland San Telmo', 'Defensa 1105', '011 4361-4889', 'Más de 40 años de experiencia, innovación y creatividad -\r\n\r\nDesde nuestros inicios asumimos el compromiso de desarrollar productos con la más alta calidad, con ingredientes naturales, elaborados a través de procesos artesanales acompañados de la mejor tecnología. Nos apasiona nuestro trabajo y por eso -día a día- cuidamos todos los detalles y perfeccionamos nuestros productos y servicios.\r\n\r\nActualmente contamos con más de 30 sucursales, en donde podés encontrar una carta con una amplia variedad de nuevas propuestas para todo el día con la mejor calidad, una línea propia de productos para llevar y como siempre el mejor helado y postres exquisitos. Además, creamos una nueva unidad de negocio de barras y stands para tener presencia en los diferentes eventos como recitales, las charlas TEDx o acciones de responsabilidad social empresarial, competencias deportivas y más!', 'icelandhelados@gmail.com', 'www.iceland.com', 'San Telmo', 9, 0, 2),
(10, 1, 'Moliere Cafe', 'Chile 299', '4343-2623', 'Moliere Barrio Norte cuenta con una excelente opción gastronómica y servicios de atención de primer nivel.Es la opción perfecta para disfrutar con amigos o en familia de exquisitos desayunos y almuerzos ejecutivos, tardes de happy hours o llevar adelante un evento diferente en uno de los barrios más prestigiosos de Buenos Aires.', 'molierecafe@gmail.com', 'moliere.com.ar', 'San Telmo', 10, 0, 2),
(11, 1, 'Cafe Martinez', 'Av. Callao 858', '4936-5865', 'Desde 1933 tostamos nuestro propio café. Lo cuidamos desde la selección de sus granos, hasta la taza, conservando el amor y el respeto que tenemos por lo que hacemos, desde el primer día. Por eso nuestro café es ÚNICO.\r\n\r\nA través de nuestro proceso exclusivo de tostación, logramos resaltar las notas y características propias de los diferentes granos. Un aroma pleno, con notas de chocolate, pan tostado, miel y caramelo y un sabor con cuerpo, con un toque de frescura, es lo que hace inconfundible a un Café Martínez, siempre.', 'cafemartinez@gmail.com', 'cuartito.com', 'Recoleta', 5, 0, 1),
(59, 1, 'Negro Cueva de Café', 'Suipacha 637', '4884-9889', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 'negrocueva@gmail.com', 'http://negrocuevadecafe.com/', 'Recoleta', 2, 0, 1),
(60, 1, 'The shelter cofee', 'libertad 1260', '4212-5901', 'En la paqueta calle Arroyo, The Shelter no desentona: refinado en su imagen, ofrece, en un local silencioso y de luces tenues, una gran alternativa para meterse en el mundo del café de especialidad. Patrick Popovich y Susana Hewitt son los baristas encargados de despachar café en medidas italianas con una máquina Marzocco que tiene todos los chiches e incluye cronómetro y medidor de temperatura digital. El espresso ($33) aquí es el resultado de la combinación de granos de Colombia, Zambia y Bolivia y que al paladar recuerdan a sabores frutales. Claro que también se puede pedir el cada día más popular Flat White ($44), o incluso paladear el café de autor de la casa, llamado Shelter, a base de espresso, chocolate y crema chantilly ($55). Para hacerla completa, no dejar de probar la croissant de manzana. El dato a tener en cuenta es que por estos días incorporarán la opción del brunch, que se sumará a la interesante propuesta de pastelería, que aquí acerca L’épi.', 'sheltercofee@gmail.com', 'sheltercofee@gmail.com', 'recoleta', NULL, 1, 1);

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
(0, 1, 27, ' mutr buena ', 1, '2018-12-05 12:57:29'),
(0, 1, 27, ' Esta cafeteria es muy buena , tiene buenos precios , la atencion es la mejor .\n\nLa recomiendo 100%', 1, '2018-12-08 23:51:31'),
(0, 1, 27, ' No dejan al azar ni el más mínimo detalle! El café es delicioso , la mermelada de frutos rojos es alucinante, la música de fondo es un detalle excelente la atención al público es espectacular ! Recomiendo al 100%', 1, '2018-12-08 23:51:53'),
(0, 1, 27, ' Hice una cola de 30 minutos, que es el promedio de tiempo que tardan en atenderte para darte un \"take away\".\nUna chica en la caja, otra chica en la máquina de café y otros dos empleados mirando...todo tranqui.\nMientras esperas en la cola (15 personas) podes matar el tiempo conectándote al wifi del café... ahhh no, no les anda.', 1, '2018-12-08 23:52:07'),
(0, 59, 27, ' Me encanta esta cafeteria', 1, '2018-12-13 02:37:00');

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
(25, 11, 37),
(26, 11, 38),
(27, 59, 39),
(28, 6, 40),
(29, 4, 41),
(30, 4, 42),
(31, 4, 43),
(32, 4, 44),
(33, 4, 45),
(34, 9, 46),
(35, 9, 47),
(36, 9, 48),
(37, 5, 49),
(38, 60, 50),
(39, 9, 51),
(40, 10, 52),
(41, 9, 53),
(42, 9, 54),
(43, 8, 55);

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
(40, 'tyu', 'tyutyutyutyutyutyutyutyutyutyutyutyutyutyutyutyu', '          utyu                    utyu                    utyu                    utyu                    utyu                    utyu                    utyu                    utyu                    utyu                    utyu                    utyu                    utyu                    utyu                    utyu                    utyu          tyutyutyutyutyutyutyutyutyutyutyutyu', '2018-12-08', 'img/eventos/id_40_descarga.jpg', 3),
(41, 'tyu', 'tyutyutyutyutyutyutyutyutyutyutyutyutyutyutyutyu', '          utyu                    utyu                    utyu                    utyu                    utyu                    utyu                    utyu                    utyu                    utyu                    utyu                    utyu                    utyu                    utyu                    utyu                    utyu          tyutyutyutyutyutyutyutyutyutyutyutyu', '2018-12-05', 'img/eventos/', 2),
(42, 'Evento del sol', 'Nuevo evento para bailar y divertirse', 'Nuevo evento para bailar y divertirseNuevo evento para bailar y divertirseNuevo evento para bailar y divertirseNuevo evento para bailar y divertirseNuevo evento para bailar y divertirseNuevo evento para bailar y divertirseNuevo evento para bailar y divertirseNuevo evento para bailar y divertirseNuevo evento para bailar y divertirseNuevo evento para bailar y divertirse', '2018-12-05', 'img/eventos/id_42_3ce8182125899a823b050ebe603b5323.jpg', 1),
(43, '¿De qué se trata?', 'Domingo 16 de diciembre | 17 a 20 h ', 'Es una actividad urbana, similar a una búsqueda del tesoro, que combina caminar, correr, utilizar el transporte público (colectivos, subtes y trenes) y conocer la Ciudad de manera divertida, inclusiva, saludable y sustentable, visitando museos, teatros, espacios dependientes del gobierno y rincones escondidos de los barrios porteños.\r\n\r\nSe participa en equipos de dos personas y para hacerlo no hace falta ser atleta ni tener conocimientos de la Ciudad. Es una actividad totalmente gratuita, pensada para duplas integradas por familias y vecinos de la Ciudad. Una vez inscriptos y con la aplicación necesaria descargada en un celular, los competidores reciben por mail las instrucciones de uso y un código personal único para activar su registro en el teléfono. El día del evento, a la hora señalada, la app “lanzará” a todos los participantes la lista de consignas que deberán cumplir para completar la carrera en un tiempo estipulado por la organización (es un desafío de regularidad, con hora de largada y hora de llegada).\r\n\r\nUno de los dos integrantes será el copiloto, diseñando el recorrido, la estrategia de equipo (si eligen caminar, correr, subir al Metrobus o viajar en subte, por ejemplo) y googleando para develar las consignas y alcanzar todas las postas. Al llegar a cada una de ellas, deben sacarse una selfie con la consigna de fondo (monumento, edificio, etc.). Utilizando la geolocalización, la app automáticamente le sumará los puntos correspondientes, según su grado de dificultad. El objetivo es sumar la mayor cantidad de puntos. Si el equipo no está en el lugar indicado, la app le dará una alerta y la distancia aproximada hasta la misma. En la pantalla de la app el equipo tendrá siempre visibles las consignas, el tiempo transcurrido, los puntos acumulados y su posición. Deberán llegar al punto de encuentro (llegada) a la hora indicada. Los que lleguen más tarde tendrán una penalización de puntos automática, que será más alta cuanto más se retrasen. Mientras la actividad transcurre, miles de seguidores observan en tiempo real las alternativas a través de las redes sociales, viendo las selfies que cada participante toma en los lugares designados en las consignas.\r\n\r\nEl evento concluye en un Family Park, donde todos los participantes comparten vivencias y disfrutan de un encuentro distinto, cerrando la actividad en un marco distendido y familiar. Al final, se entregarán premios simbólicos a los mejores equipos, por categorías (padres e hijos, mayores, etc.).', '2018-12-07', 'img/eventos/id_39_descarga.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `nombre_sistema` varchar(80) DEFAULT NULL,
  `ubicacion` tinytext,
  `descripcion` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `usuarios_id`, `nombre_sistema`, `ubicacion`, `descripcion`) VALUES
(37, 1, 'id_7_cafe-martinez-logo-2-85-1398126116.jpg', 'img/cafeterias/id_7_cafe-martinez-logo-2-85-1398126116.jpg', 'Portada cafeteria'),
(38, 1, 'id_7_cafe-martinez-logo-2-85-1398126116.jpg', 'img/cafeterias/id_7_cafe-martinez-logo-2-85-1398126116.jpg', 'Portada cafeteria'),
(39, 1, 'id_59_negro1_1000.jpg', 'img/cafeterias/id_59_negro1_1000.jpg', 'Portada cafeteria'),
(40, 1, 'id_6_hrc-pattaya.jpg', 'img/cafeterias/id_6_hrc-pattaya.jpg', 'Portada cafeteria'),
(41, 1, 'id_4_descarga.jpg', 'img/cafeterias/id_4_descarga.jpg', 'Portada cafeteria'),
(42, 1, 'id_4_image.jpg', 'img/cafeterias/id_4_image.jpg', 'Portada cafeteria'),
(43, 1, 'id_4_image.jpg', 'img/cafeterias/id_4_image.jpg', 'Portada cafeteria'),
(44, 1, 'id_4_descarga.jpg', 'img/cafeterias/id_4_descarga.jpg', 'Portada cafeteria'),
(45, 1, 'id_4_index.jpg', 'img/cafeterias/id_4_index.jpg', 'Portada cafeteria'),
(46, 1, 'id_9_heladeria-y-cafeteria-iceland-fondo-de-comercio-D_NQ_NP_843898-MLA284818684', 'id_9_heladeria-y-cafeteria-iceland-fondo-de-comercio-D_NQ_NP_843898-MLA28481868441_102018-F.jpg', 'Portada cafeteria'),
(47, 1, 'id_9_heladeria-y-cafeteria-iceland-fondo-de-comercio-D_NQ_NP_843898-MLA284818684', 'img/cafeterias/id_9_heladeria-y-cafeteria-iceland-fondo-de-comercio-D_NQ_NP_8438', 'Portada cafeteria'),
(48, 1, 'id_9_heladeria-y-cafeteria-iceland-fondo-de-comercio-D_NQ_NP_843898-MLA284818684', 'img/cafeterias/id_9_heladeria-y-cafeteria-iceland-fondo-de-comercio-D_NQ_NP_843898-MLA28481868441_102018-F.jpg', 'Portada cafeteria'),
(49, 1, 'id_5_biela.jpg', 'img/cafeterias/id_5_biela.jpg', 'Portada cafeteria'),
(50, 1, 'id_60_shelter_coffee1.jpg', 'img/cafeterias/id_60_shelter_coffee1.jpg', 'Portada cafeteria'),
(51, 1, 'id_9_descarga.jpg', 'img/cafeterias/id_9_descarga.jpg', 'Portada cafeteria'),
(52, 1, 'id_10_index.jpg', 'img/cafeterias/id_10_index.jpg', 'Portada cafeteria'),
(53, 1, 'id_9_index.jpg', 'img/cafeterias/id_9_index.jpg', 'Portada cafeteria'),
(54, 1, 'id_9_biela.jpg', 'img/cafeterias/id_9_biela.jpg', 'Portada cafeteria'),
(55, 1, 'id_8_245px-Starbucks_logo.jpg', 'img/cafeterias/id_8_245px-Starbucks_logo.jpg', 'Portada cafeteria');

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
(1, 1, 2, 'Admin', 'Admin', 'halonso@cafeteriasba.com.ar', '$2y$10$prXfaT96WFmAZ08VS3ejG.HgvLgnc0yczuJK2RPNxUgyNOfJ8Ruq.', 'img/usuarios/id_4_id_64_1.jpg', '2018-05-18 06:00:00'),
(3, 3, 2, 'Editor nuevo', 'Editor nuevo', 'editornuevo@cafeteriasba.com', '$2y$10$ixpEnUbzIYyEIjkj8wAaXeTH6Srl8khoSpJ.DLGGmZUNJ/sYBumNe', 'img/usuarios/id_4_id_64_1.jpg', '2018-05-18 06:00:00'),
(4, 4, 1, 'Sergio', 'Martinez', 'sergio@gmail.com', '$2y$10$562rsYtXrixj1rKvbbOt4eKIT5PFQVT9uvxv.N83d5Xa0j23PMk.m', 'img/usuarios/id_4_id_64_1.jpg', '2018-05-18 06:00:00'),
(5, 2, 2, 'All saint', 'cafe', 'allsaint@gmail.com', '12121325', 'img/usuarios/id_4_id_64_1.jpg', '2018-05-20 06:00:00'),
(6, 2, 1, 'cofee town', 'caefteria', 'cofeetown@gmail.com', '$2y$10$VODtxlfGdv2kEWUcH9BirOO4g9/CyY/W8WlqWaQN2a0Zo9GL3R1H6', 'img/usuarios/nopicture.png', '2018-05-20 06:00:00'),
(26, 3, 2, 'pedro', 'gonzales', 'g@g.com', '$2y$10$/JfnGQxXxdV76xtcVDAc3uQD9kG9hGj/B6QJj2HdkoClcAWSeYVV2', 'img/usuarios/id_26_descarga.jpg', NULL),
(27, 1, 1, 'laureano', 'quiroga', 'lalo.q2121@gmail.com', '$2y$10$cUPhUXDpNTLj8QUYCyMARue4uU6PwsdbXzzaROBbgDjHqz4fkcHSm', 'img/usuarios/id_27_FKoXWmZ.jpg', NULL);

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
(20, 1, 26, '2018-12-08 23:52:07', 4),
(21, 1, 4, '2018-12-08 23:52:07', 4),
(22, 1, 27, '2018-12-04 17:22:03', 0),
(23, 59, 27, '2018-12-05 12:59:22', 0),
(24, 5, 27, '2018-12-13 03:11:12', 0),
(25, 8, 27, '2018-12-13 03:11:38', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT de la tabla `cafeterias_estado`
--
ALTER TABLE `cafeterias_estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cafeteria_has_imagenes`
--
ALTER TABLE `cafeteria_has_imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `usuarios_cafeterias_favoritas`
--
ALTER TABLE `usuarios_cafeterias_favoritas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cafeteria`
--
ALTER TABLE `cafeteria`
  ADD CONSTRAINT `fk_cafeteria_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
