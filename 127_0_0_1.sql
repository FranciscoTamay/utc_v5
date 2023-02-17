-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-02-2023 a las 21:14:44
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ararat`
--
CREATE DATABASE IF NOT EXISTS `ararat` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;
USE `ararat`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`) VALUES
(1, 'ROPA DAMA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_venta`
--

DROP TABLE IF EXISTS `detalles_venta`;
CREATE TABLE IF NOT EXISTS `detalles_venta` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(90) NOT NULL,
  `precio_producto` float NOT NULL,
  `cantidad` int NOT NULL,
  `fecha` date NOT NULL,
  `folio` int UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `folio` (`folio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `id_categorias` int UNSIGNED DEFAULT NULL,
  `id_producto` int UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categorias` (`id_categorias`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `cantidad`, `id_categorias`, `id_producto`) VALUES
(1, 'CALCETIN', 23, 6, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

DROP TABLE IF EXISTS `tipo_producto`;
CREATE TABLE IF NOT EXISTS `tipo_producto` (
  `id_tipoProducto` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tipoProducto`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id_tipoProducto`, `nombre`) VALUES
(1, 'DIOS'),
(2, 'JALA'),
(3, 'PORFA'),
(4, 'Hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `folio` int UNSIGNED NOT NULL DEFAULT '0',
  `fecha` date NOT NULL,
  `cantidad_productos` int NOT NULL,
  `total` int NOT NULL,
  PRIMARY KEY (`folio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles_venta`
--
ALTER TABLE `detalles_venta`
  ADD CONSTRAINT `detalles_venta_ibfk_1` FOREIGN KEY (`folio`) REFERENCES `ventas` (`folio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `tipo_producto` (`id_tipoProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_categorias`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Base de datos: `bd_quiz`
--
CREATE DATABASE IF NOT EXISTS `bd_quiz` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_quiz`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL,
  `totalPreguntas` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`id`, `usuario`, `password`, `totalPreguntas`) VALUES
(1, 'admin', 'admin', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas`
--

DROP TABLE IF EXISTS `estadisticas`;
CREATE TABLE IF NOT EXISTS `estadisticas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `visitas` int NOT NULL,
  `respondidas` int NOT NULL,
  `completados` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `estadisticas`
--

INSERT INTO `estadisticas` (`id`, `visitas`, `respondidas`, `completados`) VALUES
(1, 32, 60, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
CREATE TABLE IF NOT EXISTS `preguntas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tema` int NOT NULL,
  `pregunta` text NOT NULL,
  `opcion_a` text NOT NULL,
  `opcion_b` text NOT NULL,
  `opcion_c` text NOT NULL,
  `correcta` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `tema`, `pregunta`, `opcion_a`, `opcion_b`, `opcion_c`, `correcta`) VALUES
(1, 1, 'La definición de algoritmo es...', 'Un tipo de código informático', 'Una secuencia de instrucciones que representan un modelo de solución para determinado tipo de problemas, incluyendo todos los pasos necesarios.', 'Un lenguaje de programación', 'B'),
(2, 1, '¿Qué es C++?', 'Un juego', 'Un programa', 'Un lenguaje de programación', 'C'),
(3, 1, '¿Qué es una variable?', 'Un valor o dato', 'Un espacio dentro del espacio de memoria ram', 'Un lenguaje', 'B'),
(4, 1, 'En javascript, la sentencia for sirve para', 'Repetir la ejecución de instrucciones', 'Cargar datos en un arreglo', 'Ninguna de las anteriores', 'A'),
(5, 1, 'En un lenguaje de programación las constantes son...', 'Datos que varían', 'Datos regulares', 'Datos que no cambian en el proceso', 'C'),
(6, 1, 'Un diagrama de flujo es ...', 'la forma de resolver un problema', 'La representación gráfica de un problema', 'El proceso de diseño de un algoritmo', 'B'),
(7, 1, '¿Qué tipo de dato es el ejemplo A=5?', 'char', 'integer', 'string', 'B'),
(8, 1, '¿Para qué sirve los lenguajes de programación de tipo general?', 'Crear y facilitar datos', 'Crear diferentes mecanismos', 'Crear distintos tipos de aplicaciones', 'C'),
(9, 1, 'El número en binario 1010 corresponde', '10 en decimal', '8 en decimal', '7 en decimal', 'A'),
(10, 1, 'Un &quot;array&quot; es...', 'Un tipo de dato estructurado que almacena datos, del mismo tipo y relacionados.', 'Una estructura que me permite repetir instrucciones la cantidad de veces que quiera', 'Ninguna de las anteriores', 'A'),
(11, 2, '¿Con qué nombre se conoce el escándalo que obligó al presidente estadounidense Richard Nixon a dimitir?', 'Vietnam', 'NixonPrecess', 'Watergate', 'C'),
(12, 2, '¿Qué emperador romano legalizó el cristianismo y puso fin a la persecución de los cristianos?', 'Nerón', 'Constanstino', 'Adriano', 'B'),
(13, 2, '¿Qué hito informático de 1969 cambiaría radicalmente el curso de la historia de la humanidad?', 'El primer router wi-fi', 'La primera computadora personal', 'Internet', 'C'),
(14, 2, '¿Quién fue el primer Presidente de Estados Unidos?', 'George Washington', 'Abraham Lincoln', 'Andrew Jackson', 'A'),
(15, 2, '¿Por qué es significativo el Poema de Gilgamesh?', 'Fue un libro de estrategia militar de 500 páginas que sirvió en la antigua Mesopotamia', 'Es la primera obra épica que hace referencia a la inmortalidad y la percepción humana del alma', 'El tratado más antiguo que existe sobre el Inframundo.', 'B'),
(16, 2, '¿Cuál es el nombre de la famosa batalla donde Napoleón Bonaparte fue derrotado?', 'La batalla de Hstings', 'La batalla de Álamo', 'La batalla de Waterloo', 'C'),
(17, 2, '¿A través de qué río africano se alzó el antiguo Egipto?', 'Amazonas', 'Tigris', 'Nilo', 'C'),
(18, 2, '¿A qué filósofo griego se atribuye la famosa obra “La República”?', 'Platón', 'Sócrates', 'Aristótleles', 'A'),
(19, 2, '¿En qué año se disolvió la Unión Soviética?', 'En 1987', 'En 1989', 'En 1991', 'C'),
(20, 2, '¿Qué científico es considerado el Padre de la Bomba Atómica?', 'Albert Einsein', 'Robert Openheimer', 'Leó Szilárd', 'B'),
(21, 3, '¿Qué contienen los cloroplastos de las células vegetales?', 'Clorofila', 'Agua', 'Sábila', 'A'),
(22, 3, '¿Qué es la malacología?', 'La ciencia que estudia los hongos', 'La ciencia que estudia los molusculos', 'La ciencia que estudia los ácaros', 'B'),
(23, 3, '¿Qué significan las siglas ADN?', ' Ácido deoxinucleico', 'Ácido desorribonucleico', 'Ácido desoxirribonucleico', 'C'),
(24, 3, 'Todos los organismos en el reino Animalia son:', 'Multicelulares y autótrofos', 'Multicelulares y autótrofos', 'Unicelulares y heterótrofos', 'B'),
(25, 3, '¿Qué es un cardumen?', 'Una especie de planta', 'Un banco de peces', 'Una parte del abdomen de los insectos', 'B'),
(26, 3, 'El sistema de clasificación taxonómica actual fue ideado por:', 'Darwin', 'Pateur', 'Linneo', 'B'),
(27, 3, '¿Cuál de los siguientes animales tiene incisivos que continúan creciendo toda su vida?', 'Morsa', 'Hámster', 'Elefante', 'B'),
(28, 3, '¿Cuánto vive un erizo?', 'Aproximadamente entre 4 y 5 años', 'Aproximadamente entre 7 y 8 años', 'Aproximadamente entre 9 y 12 años', 'A'),
(29, 3, '¿Dónde realizan las plantas la fotosíntesis?', 'En las hojas', 'En la raíz', 'En el aire', 'A'),
(30, 3, '¿Qué músculo impulsa la sangre por todo nuestro cuerpo?', 'El cerebro', 'Los pulmones', 'El corazón', 'C'),
(31, 4, '¿Cómo se llama en tenis un punto de saque directo?', 'Revés', 'Love', 'Ace', 'C'),
(32, 4, 'En natación, ¿cuánto mide de largo una piscina de competición para olimpiadas y mundiales?', '50 metros', '25 metros', '30 metros', 'A'),
(33, 4, '¿Con cuántos jugadores en pista juega un equipo de voleibol?', '5', '9', '6', 'C'),
(34, 4, '¿Cómo se llama en golf cuando completas un hoyo en un lanzamiento menos que el par del hoyo?', 'Albatros', 'Birdie', 'Eagle', 'B'),
(35, 4, 'Las tres modalidades de la esgrima son: sable, espada y ...', 'Estoque', 'Florete', 'Estilo lbre', 'B'),
(36, 4, '¿Cómo se llama en béisbol cuando un bateador golpea la bola y ésta sale del campo de juego, lo que le permite recorrer todas las bases con facilidad?', 'Strike', 'Hit', 'Home run', 'C'),
(37, 4, '¿A qué distancia está el punto de penalty de la portería en fútbol?', '7 metros', '11 metros', '12 metros', 'B'),
(38, 4, 'Completa esta frase de baloncesto: &quot;El arbitro pitó _____ segundos en la zona y el equipo local perdió el balón&quot;', 'Cinco', 'Venticuatro', 'Tres', 'C'),
(39, 4, 'Si hablamos del jugador boya, estamos hablando de...', 'Boleibol', 'Hockey sobre patines', 'Waterpolo', 'C'),
(40, 4, '¿Cómo se llama en rugby la lucha frente a frente de dos grupos de jugadores de los dos equipos que empujan para obtener el balón sin tocarlo con la mano?', 'Placaje', 'Melé', 'Ensayo', 'B'),
(41, 5, 'Un poco de historia. ¿Qué sabio griego creía que la única ley básica que gobernaba el universo era el principio del cambio y que nada permanecía en el mismo estado indefinidamente?', 'Tales de Mileto', 'Heráclito', 'Aristóteles', 'B'),
(42, 5, 'El método científico se usa en todas las ciencias, incluidas la física y la psicología.', 'Verdadero', 'Falso, en física no', 'Ninguna de las anteriores', 'A'),
(43, 5, '¿Cómo se llama el instrumento que mide y registra la humedad relativa del aire?', 'Barómetro', 'Hidrómetro', 'Higrómetro', 'C'),
(44, 5, 'Todo cuerpo que cae libremente en el vacío se caracteriza por tener...', 'Aceleración constante y velocidad variable', 'Fuerza variable y velocidad decreciente', 'Energía potencial constante y aceleración creciente', 'B'),
(45, 5, 'Hablando de fuerzas... ¿cuál es la que mantiene unidas las moléculas de un cuerpo?', 'La fuerza de gravedad', 'La fuerza de cohesión', 'La fuerza de adhesión', 'B'),
(46, 5, '¿Cuál es la distancia más pequeña posible en mecánica cuántica?', 'Tiempo de Wearden', 'Espuma cuántica', 'Longitud de Planck', 'C'),
(47, 5, '¿Qué dos partículas elementales se describen como &lt;sin masa&gt;?', 'Fotón y gluón', ' Muón y neutrino', 'Electrón y protón', 'A'),
(48, 5, '¿Cuál de estos fenómenos inspiró a Albert Einstein en su desarrollo de la relatividad general?', 'Ver a dos trenes moverse en direcciones opuestas', 'Ver a un hombre caerse de un tejado', 'La vibración de las cuerdas en un violín', 'B'),
(49, 5, '¿El tiempo va siempre hacia adelante?', 'Siempre', 'No', 'En teoría...sí', 'C'),
(50, 5, '¿Qué es la hidrostática?', 'Cantidad de masa encerrada en un volumen', 'Presión de los líquidos a todas las direcciones', 'Cuerpo de masa que crece de una forma', 'B'),
(51, 7, 'Originario del Oriente Medio, el falafel es una de las comidas callejeras favoritas de todo el mundo. ¿Cuál es el ingrediente principal del falafel?', 'Las semillas de sésamo', 'La harina', 'Los garbanzos', 'C'),
(52, 7, 'Las arepas son pasteles de maíz a menudo rellenos con ingredientes como queso, verduras y carne. ¿Qué 2 países dicen haber inventado este delicioso plato?', 'Colombia y Venezuela', 'Venezuela y Argentina', 'Chile y Colombia', 'A'),
(53, 7, 'La comida callejera más popular del Perú, y éxito de exportación culinaria, es sin duda el ceviche. En este plato, ¿el pescado crudo se cura agregándole qué ingrediente?', 'Vinagre', 'Zumos cítricos', 'Aceite caliente', 'B'),
(54, 7, '¿En qué país se considera de mala educación comer mientras se camina (con algunas excepciones)?', 'Italia', 'China', 'Japón', 'C'),
(55, 7, 'En Italia, ¿los arancini son unas albóndigas fritas de qué?', 'Espaguetis', 'Risotto', 'Aceitunas', 'B'),
(56, 7, '¿En qué país se considera de mala educación comer mientras se camina (con algunas excepciones)?', 'Italia', 'China', 'Japón', 'C'),
(57, 7, 'Un buen mate se prepara con el agua...', 'A 80 grados', 'Hirviendo', 'Tibia', 'A'),
(58, 7, '¿Qué otro país nos disputa la invención del argentinísimo dulce de leche?', 'Chile', 'Brasil', 'Uruguay', 'C'),
(59, 7, 'Una milanesa con jamón, queso y salsa de tomate se llama...', 'Milanesa siciliana', 'Milanesa napolitana', 'Milanesa maradoniana', 'B'),
(60, 7, '¿Cuáles son los ingredientes más comunes de toda empanada de carne?', 'Carne picada, huevos, cebollas y aceitunas', 'Carne picada, huevos, tomate y aceitunas', 'Carne picada, huevos, uva y choclo', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

DROP TABLE IF EXISTS `temas`;
CREATE TABLE IF NOT EXISTS `temas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`id`, `nombre`) VALUES
(1, 'Programación'),
(2, 'Historia'),
(3, 'Biología'),
(4, 'Deporte'),
(5, 'Física'),
(6, 'Ingles'),
(7, 'Comida');
--
-- Base de datos: `cbta_soft`
--
CREATE DATABASE IF NOT EXISTS `cbta_soft` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cbta_soft`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autors`
--

DROP TABLE IF EXISTS `autors`;
CREATE TABLE IF NOT EXISTS `autors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_completo_autor` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `creacion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `autors`
--

INSERT INTO `autors` (`id`, `nombre_completo_autor`, `created_at`, `updated_at`, `creacion`) VALUES
(1, 'PEDRO FUENTES PEREZ', '2022-07-14 10:49:25', '2022-07-14 19:40:18', '2022-07-14'),
(2, 'SALOME CELIS', '2022-07-14 10:49:40', '2022-07-14 10:49:40', '2022-07-14'),
(3, 'HEDY LOPEZ FUENTES', '2022-07-14 10:49:47', '2022-08-08 21:58:05', '2022-07-14'),
(4, 'HUERTA DOMINGUEZ2', '2022-07-15 22:14:49', '2022-07-15 22:14:49', '2022-07-15'),
(7, 'PEDRO HUERTA LOPEZ', '2022-07-16 02:06:38', '2022-08-08 21:57:27', '2022-07-15'),
(10, 'HECTOR ORTIZ CAN', '2022-07-21 08:52:45', '2022-07-21 08:55:33', '2022-07-20'),
(11, 'PEDRO FUENTES PEREZ1', '2022-08-13 03:25:45', '2022-08-13 03:25:45', '2022-08-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenido` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorials`
--

DROP TABLE IF EXISTS `editorials`;
CREATE TABLE IF NOT EXISTS `editorials` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_editorial` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `creacion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `editorials`
--

INSERT INTO `editorials` (`id`, `nombre_editorial`, `created_at`, `updated_at`, `creacion`) VALUES
(1, 'CASA negra', '2022-07-14 10:51:52', '2023-01-25 04:44:09', '2022-07-14'),
(2, 'SISTEMA EDUCATIVO LAM LIBRO AGUILA MEALO', '2022-07-14 10:52:14', '2022-07-14 10:52:14', '2022-07-14'),
(3, 'EDITORIAL TORRES', '2022-07-14 10:52:36', '2022-08-08 21:59:01', '2022-07-14'),
(4, 'ONLINE.DE', '2022-07-21 08:57:26', '2022-08-08 21:59:12', '2022-07-20'),
(5, 'ONLINE.DEe', '2022-08-13 03:38:11', '2022-08-13 03:38:11', '2022-08-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventarios`
--

DROP TABLE IF EXISTS `inventarios`;
CREATE TABLE IF NOT EXISTS `inventarios` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `libro_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inventarios_libro_id_foreign` (`libro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

DROP TABLE IF EXISTS `libros`;
CREATE TABLE IF NOT EXISTS `libros` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_libro` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `autor_id` bigint UNSIGNED NOT NULL,
  `editorial_id` bigint UNSIGNED NOT NULL,
  `materia_id` bigint UNSIGNED NOT NULL,
  `numero_ejemplares` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ubicacion_id` bigint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `libros_autor_id_foreign` (`autor_id`),
  KEY `libros_editorial_id_foreign` (`editorial_id`),
  KEY `libros_materia_id_foreign` (`materia_id`),
  KEY `fkidubicacion` (`ubicacion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `nombre_libro`, `autor_id`, `editorial_id`, `materia_id`, `numero_ejemplares`, `created_at`, `updated_at`, `ubicacion_id`) VALUES
(1, 'ALGEBRA LINEA CON FUNCIONES IV', 10, 3, 1, 19, '2022-07-14 10:59:51', '2023-02-03 05:53:22', 1),
(2, 'VACUNACION DE GANADO Y VIDA SUSTENTABLE', 3, 1, 2, 5, '2022-07-14 11:01:00', '2022-07-14 11:01:00', 4),
(3, 'HISTORIA DE LA REVILUCION MEXICANA', 2, 3, 2, 13, '2022-07-14 11:01:55', '2022-07-14 11:01:55', 2),
(7, 'FUNDAMENTOS MYSQL', 7, 3, 6, 9, '2022-07-16 11:51:39', '2022-08-08 21:55:51', 53),
(10, 'GEOGRAFIA II', 1, 2, 1, 12, '2022-07-16 12:33:15', '2022-08-08 21:56:39', 2),
(12, 'LUGUEN', 3, 1, 2, 1, '2022-07-17 22:25:10', '2022-07-17 22:25:10', 53),
(13, 'ESPAÑOL EXTRANJERO', 10, 4, 2, 2, '2022-07-21 09:06:33', '2022-08-08 21:56:21', 55),
(14, 'SALOME LUNA', 2, 4, 2, 2, '2022-08-13 04:10:24', '2022-08-13 04:10:24', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

DROP TABLE IF EXISTS `materias`;
CREATE TABLE IF NOT EXISTS `materias` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `materia_campo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `creacion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `materia_campo`, `created_at`, `updated_at`, `creacion`) VALUES
(1, 'ESPAÑOL IV', '2022-07-14 10:50:32', '2022-07-14 10:50:32', '2022-07-14'),
(2, 'HISTORIA DE MEXICO III', '2022-07-14 10:50:41', '2022-07-14 10:50:41', '2022-07-14'),
(3, 'GEOGRAFIA I', '2022-07-14 10:50:56', '2022-07-14 10:50:56', '2022-07-14'),
(6, 'MATEMATICAS', '2022-07-16 02:14:46', '2022-08-08 21:59:40', '2022-07-15'),
(8, 'MSQL', '2022-07-21 08:57:09', '2022-07-21 08:57:09', '2022-07-20'),
(9, 'ESPAÑOL I3', '2022-08-13 03:26:30', '2022-08-13 03:26:30', '2022-08-12'),
(10, 'GEOGRAFIA I23', '2022-08-13 03:30:43', '2022-08-13 03:30:43', '2022-08-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_05_02_160200_create_ocupacions_table', 1),
(7, '2022_05_02_160706_create_modalidads_table', 1),
(8, '2022_06_02_070352_create_sessions_table', 1),
(9, '2022_06_02_101104_create_personas_table', 1),
(10, '2022_06_02_101113_create_editorials_table', 1),
(11, '2022_06_02_101122_create_materias_table', 1),
(12, '2022_06_02_101140_create_autors_table', 1),
(13, '2022_06_02_101150_create_libros_table', 1),
(14, '2022_06_02_101205_create_prestamos_table', 1),
(15, '2022_06_02_101223_create_inventarios_table', 1),
(16, '2022_06_13_010227_create_blogs_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidads`
--

DROP TABLE IF EXISTS `modalidads`;
CREATE TABLE IF NOT EXISTS `modalidads` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `modalidad` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `creacion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `modalidads`
--

INSERT INTO `modalidads` (`id`, `modalidad`, `created_at`, `updated_at`, `creacion`) VALUES
(1, 'DOMICILIO', '2022-07-14 10:56:03', '2022-07-14 10:56:03', '2022-07-14'),
(3, 'CLASES EN AULA', '2022-07-14 10:56:31', '2022-07-14 10:56:31', '2022-07-14'),
(6, 'EJEMPLO 1', '2022-08-17 08:52:06', '2022-08-17 08:52:06', '2022-08-16'),
(7, 'EJEMPLO 2', '2022-08-17 08:52:13', '2022-08-17 08:52:13', '2022-08-16'),
(8, 'EJEMPLO 3', '2022-08-17 08:52:22', '2022-08-17 08:52:22', '2022-08-16'),
(9, 'EJEMPLO 4', '2022-08-17 08:52:30', '2022-08-17 08:52:30', '2022-08-16'),
(10, 'EJEMPLO 5', '2022-08-17 08:52:36', '2022-08-17 08:52:36', '2022-08-16'),
(11, 'EJEMPLO 6', '2022-08-17 08:52:44', '2022-08-17 08:52:44', '2022-08-16'),
(12, 'PRUEBA', '2022-08-17 09:34:37', '2022-08-17 09:34:37', '2022-08-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ocupacions`
--

DROP TABLE IF EXISTS `ocupacions`;
CREATE TABLE IF NOT EXISTS `ocupacions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ocupaciones` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `creacion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ocupacions`
--

INSERT INTO `ocupacions` (`id`, `ocupaciones`, `created_at`, `updated_at`, `creacion`) VALUES
(1, 'LACTEOS', '2022-07-14 10:53:58', '2023-01-25 05:00:12', '2022-07-14'),
(2, 'SALCHICHONERIA', '2022-07-14 10:55:07', '2023-01-25 05:00:23', '2022-07-14'),
(3, 'CARNES FRIAS', '2022-07-14 10:55:20', '2023-01-25 05:00:41', '2022-07-14'),
(5, 'DETERGENTES', '2022-07-17 22:19:19', '2023-01-25 05:01:00', '2022-07-17'),
(6, 'ALIMENTO MASCOTAS', '2022-07-21 08:58:40', '2023-01-25 05:01:12', '2022-07-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

DROP TABLE IF EXISTS `personas`;
CREATE TABLE IF NOT EXISTS `personas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ocupacion_id` bigint UNSIGNED NOT NULL,
  `nombre_persona` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_persona` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_persona` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `referencia_persona` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `genero` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personas_ocupacion_id_foreign` (`ocupacion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `ocupacion_id`, `nombre_persona`, `telefono_persona`, `direccion_persona`, `referencia_persona`, `created_at`, `updated_at`, `genero`) VALUES
(1, 2, 'ALBERTO EDUARDO MEDINA CAN', '9981972312', 'AVENIDA TALLERES, REGION 101,MANZANA 82,LOTE 27.', 'CASA AMARILLA', '2022-07-14 10:57:29', '2022-07-14 10:57:29', 'MASCULINO'),
(2, 3, 'BRAULIO RONALDO ORTIZ CAN', '9983781321', 'Calle 32 Parque de los cañones', 'ALADO DEL HOTEL MAYA', '2022-07-14 10:58:09', '2022-07-14 10:58:09', 'MASCULINO'),
(3, 1, 'REGINA SALOME LUNA CELIS', '9982981245', 'CALLE 45, LOTE 2', 'ALADO DE DUNOSUSA', '2022-07-14 10:58:55', '2022-07-14 10:58:55', 'FEMENINO'),
(17, 6, 'CROQUETAS PERRO', '9', 'AV TALLERRES', 'CASA AZUL', '2022-07-21 09:00:46', '2023-01-25 05:02:15', 'FEMENINO'),
(18, 2, '1234572', '00928387382323232', '23', '23', '2022-08-13 04:00:26', '2022-08-13 04:00:26', 'MASCULINO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

DROP TABLE IF EXISTS `prestamos`;
CREATE TABLE IF NOT EXISTS `prestamos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `libro_id` bigint UNSIGNED NOT NULL,
  `persona_id` bigint UNSIGNED NOT NULL,
  `modalidad_id` bigint UNSIGNED NOT NULL,
  `fecha_devolucion` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fecha_p` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_devolucion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prestamos_modalidad_id_foreign` (`modalidad_id`),
  KEY `prestamos_libro_id_foreign` (`libro_id`),
  KEY `prestamos_persona_id_foreign` (`persona_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id`, `libro_id`, `persona_id`, `modalidad_id`, `fecha_devolucion`, `cantidad`, `created_at`, `updated_at`, `fecha_p`, `estado_devolucion`) VALUES
(24, 3, 3, 3, '2022-07-17', 23, '2022-07-17 22:32:09', '2022-08-31 00:02:08', '2022-07-17', 'ENTREGADO'),
(27, 3, 3, 3, '2022-07-17', 1, '2022-07-17 22:32:40', '2022-08-30 23:27:29', '2022-07-17', 'ENTREGADO'),
(30, 1, 1, 1, '2022-08-19', 52, '2022-08-13 04:32:18', '2022-08-13 04:32:18', '2022-08-12', 'PENDIENTE'),
(31, 1, 1, 3, '2022-08-30', 2, '2022-08-30 23:27:24', '2022-08-30 23:27:24', '2022-08-30', 'PENDIENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('UZyGtCaDJILBnKBr3gODGaRfVwvbwuf3M2iJGYHi', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV2x2SlNrcGx4bnZyb1o5TDZvVDFhakZyclZDWlpIcTBxdERla2dwTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9saWJyb3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1674756015),
('wg7Sj4WaqY1mVeAs8cpFW0ouV7M75l7EFNjrMoZo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36 Edg/109.0.1518.61', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid1kwcXh3RHBkR3RMdDZqWEF5ZVdsaGlyU25FeWZVTWxsRXRkbUtsMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1674756018),
('P5vROZXkyOMYfQXZsGUo9t0Ts1fEKPwGl3IlvbjG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNXFhYVdkR0hvYnN5NExoVFc0MThrUjhyc0diamZkVHEwVE5LYTE0UCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c3VhcmlvIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1674663583),
('xl4wXEu2X6VuYrnL4ssdWZx6GrhoUZ5NyquYWnD0', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNGY1SjNPVFN1YUZWQzJ2Y09GRWhidERtS3NzM0hPamNCb2VsUjFOZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hdXRvciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1674601486),
('xHYyqTbAbvxT1gKE0WFbPjiwBPS3SQtoMmZrFFIi', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36 Edg/109.0.1518.61', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVUR6dzljNjAxdlczbkhMZnNLcWFKMklXbmFBM0F0THdMSmRpTXhJeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1674756018),
('rfP3RElY6X0Y2gufqtrjWWsy2AgCjTGg3qCO1c0y', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSzlFa05NWWgySUFvMW42b2tScHlNZXRtMmMxZm5xdXBvamg3TVJVMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9saWJyb3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1675382775),
('OOZm9o9t0J2igxWyAqWorezVdQYSTFiOttJKepCS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieGN5N2Q5dERrU25OM0NUNmlZaktOQkJ5aHl2dHVDbjV3WTFlVFYwVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1675467015),
('rpenxWQQmpifBp5WOdn39Q0IgugyB8BCm4sPawnA', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ21WYXNiOTlyT293STFxYVR4ajBOY0F1T2pMVE93bWpxV1FYWWltbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9sb2NhbGhvc3QvY2J0YTIvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1676313019),
('V6PdsyNsUOuM7ggd0kfpiTHzxk3k9417o0rHj5bt', 7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 Edg/110.0.1587.41', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVlA2b3NXdGo1RXRCdGJPVTlZVlA4V0hMNTBpeWdkeTZvRE1EUXR0TiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3QvY2J0YTIvcHVibGljL2F1dG9yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Nzt9', 1676313409),
('ERaunpJ1tknm4xm2LhqPiBH9aSPI66xPJwU27irP', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 Edg/110.0.1587.41', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaFR4dVZVMWJOcDRibWd4d0pwcmhYMFNEMlR3VTY4TXJDUDJtWXNvNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3QvY2J0YTIvcHVibGljL2F1dG9yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1676327754),
('RMY2rDs9mWvb4bfjU0cxzOx1LxAtAtTeAhF2U3DW', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiejZlSHprUTRHYlExUmlZZkw5dWNNcU1JQ0dNUXJWRFRVN1FDaWc5bCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3QvY2J0YTIvcHVibGljL2F1dG9yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1676327766),
('EtzjsoaoBKloFMpIapfg76hE3vY6s168F1jlvIPo', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMFlyRnZJb25TYjV2YWFyd2JZeWxxS0JsZEg3N2ZWMVp2bVVWbHdlYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3QvY2J0YTIvcHVibGljL2F1dG9yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1676397874),
('fl9Iu4LeybRju8jTj47fX0hpcZLndXJvtwnUm6F5', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOUJPeVZBc3pwSjRWd2syTDVLQ0tNdkMxeVVjd2VOZVlrT0VBWkttRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3QvY2J0YTIvcHVibGljL2F1dG9yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1676409831);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicaciones`
--

DROP TABLE IF EXISTS `ubicaciones`;
CREATE TABLE IF NOT EXISTS `ubicaciones` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `anaquel_fila` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ubicaciones`
--

INSERT INTO `ubicaciones` (`id`, `anaquel_fila`, `created_at`, `updated_at`) VALUES
(1, 'ANAQUEL 1, FILA 1', '2022-07-14 05:47:05', '2022-07-14 05:47:05'),
(2, 'ANAQUEL 1, FILA 2', '2022-07-14 05:47:20', '2022-07-14 05:47:20'),
(3, 'ANAQUEL 1, FILA 3', '2022-07-14 05:47:34', '2022-07-14 05:47:34'),
(4, 'ANAQUEL 1, FILA 4', '2022-07-14 05:47:54', '2022-07-14 05:47:54'),
(53, 'ANAQUEL 3, FILA 1', '2022-07-15 06:06:33', '2022-07-21 04:07:47'),
(55, 'ANAQUEL 5, FILA 2', '2022-07-21 03:56:42', '2022-08-08 16:57:07'),
(56, 'Prueba', '2022-08-12 22:22:18', '2022-08-12 22:22:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'MARITZA JAQUELINE ORTIZ CAN', 'reynacen7@gmail.com', NULL, '$2y$10$.4bT8pqWDWdXtL4KLJFE9uB.lXdvLinjYLuBrN2HgW9etMReu.wNC', NULL, NULL, NULL, 'Vg2XokPePVH94cdjVyoyr00SL74B3FARYQr2aGevTe52TBTEUen4ztwjBs9L', NULL, NULL, '2022-06-03 20:11:22', '2022-06-03 20:11:22'),
(2, 'Salome Luna Celis', 'salomeluna.c@gmail.com', NULL, '$2y$10$3FwDF8J3m1klgqvEq8.T2.L.kEFsKzmVZBt8BbDMWIJI/yfHTMZkG', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-14 02:30:03', '2022-06-14 02:30:03'),
(3, 'Hector Eduardo CAN', 'laloeros56@gmail.com', NULL, '$2y$10$hdF9zOOxRICBv2MUEAc60OH7HdMgYfCr2r7QXj8YdHEeyCNxBZ4Ym', NULL, NULL, NULL, 'S97MObL0dazcqaNtmk7LKzrjDVMZZHchrIkfiJ9SNO7Lj58EyV5Ek57aH9rZ', NULL, NULL, '2022-06-17 22:15:53', '2022-06-17 22:15:53'),
(7, 'MARITZA JAQUELINE ORTIZ CAN', 'reynacen77@gmail.com', NULL, '$2y$10$ThrNFgIkCSFDaojaYXxw1uP3mVVjJuwv66KeuuldqADcdSPsO776e', NULL, NULL, NULL, 'sOvPb82HtHzNRWEei6llLAQuC00aDseP5B1opjiMuQTz0NRD1okoDyerv7tR', NULL, NULL, '2022-07-11 00:56:20', '2022-07-11 00:56:20');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inventarios`
--
ALTER TABLE `inventarios`
  ADD CONSTRAINT `inventarios_libro_id_foreign` FOREIGN KEY (`libro_id`) REFERENCES `libros` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_autor_id_foreign` FOREIGN KEY (`autor_id`) REFERENCES `autors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `libros_editorial_id_foreign` FOREIGN KEY (`editorial_id`) REFERENCES `editorials` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`ubicacion_id`) REFERENCES `ubicaciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libros_materia_id_foreign` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ocupacion_id_foreign` FOREIGN KEY (`ocupacion_id`) REFERENCES `ocupacions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_libro_id_foreign` FOREIGN KEY (`libro_id`) REFERENCES `libros` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prestamos_modalidad_id_foreign` FOREIGN KEY (`modalidad_id`) REFERENCES `modalidads` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prestamos_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE CASCADE;
--
-- Base de datos: `laravel`
--
CREATE DATABASE IF NOT EXISTS `laravel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `laravel`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `contenido` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_08_22_012813_create_permission_tables', 1),
(6, '2021_08_22_020736_create_blogs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb3_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
--
-- Base de datos: `prueba32`
--
CREATE DATABASE IF NOT EXISTS `prueba32` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `prueba32`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre alumno` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correro` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_carrera` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

DROP TABLE IF EXISTS `carreras`;
CREATE TABLE IF NOT EXISTS `carreras` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `carrera` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Columna 5` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_01_223650_create_carreras_table', 1),
(6, '2023_02_01_223711_create_alumnos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
--
-- Base de datos: `relaciona`
--
CREATE DATABASE IF NOT EXISTS `relaciona` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `relaciona`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

DROP TABLE IF EXISTS `asignaturas`;
CREATE TABLE IF NOT EXISTS `asignaturas` (
  `id` int NOT NULL,
  `id_re` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_re` (`id_re`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prrp`
--

DROP TABLE IF EXISTS `prrp`;
CREATE TABLE IF NOT EXISTS `prrp` (
  `id` int NOT NULL,
  `nombre_asig` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nombre_asig` (`nombre_asig`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
--
-- Base de datos: `utc_soft`
--
CREATE DATABASE IF NOT EXISTS `utc_soft` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `utc_soft`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `curp` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `num_seguro` int DEFAULT NULL,
  `apellido_paterno` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `apellido_materno` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nombres` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sexo` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefono` int NOT NULL,
  `correo` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `localidad` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `municipio` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `curp`, `num_seguro`, `apellido_paterno`, `apellido_materno`, `nombres`, `sexo`, `telefono`, `correo`, `direccion`, `localidad`, `municipio`, `updated_at`, `created_at`) VALUES
(1, '233232323', 34434, 'Ortiz', 'Can', 'Hector Eduardo', 'Masculino', 998192312, 'laloeros34@gtmal.com', 'por aHI', 'SI', 'YWES', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

DROP TABLE IF EXISTS `asignaturas`;
CREATE TABLE IF NOT EXISTS `asignaturas` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `codigo_asignatura` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nombre_asignatura` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `num_unidades` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

DROP TABLE IF EXISTS `carreras`;
CREATE TABLE IF NOT EXISTS `carreras` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `codigo_carrera` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nombre_carrera` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_plan` int UNSIGNED NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_plan` (`id_plan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado_prof`
--

DROP TABLE IF EXISTS `grado_prof`;
CREATE TABLE IF NOT EXISTS `grado_prof` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `grado_nombre` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE IF NOT EXISTS `grupos` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_matricula` int UNSIGNED DEFAULT NULL,
  `id_asignatura` int UNSIGNED DEFAULT NULL,
  `id_profesor` int UNSIGNED DEFAULT NULL,
  `id_carrera` int UNSIGNED NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_matricula` (`id_matricula`),
  KEY `id_asignatura` (`id_asignatura`),
  KEY `id_profesor` (`id_profesor`),
  KEY `carrea_id` (`id_carrera`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

DROP TABLE IF EXISTS `maestros`;
CREATE TABLE IF NOT EXISTS `maestros` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `	codigo` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `	sexo` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `apellido_paterno` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `apellido_materno` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nombres` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `	curp` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `num_seguro` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rfc` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `id_grado` int UNSIGNED NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_grado` (`id_grado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

DROP TABLE IF EXISTS `matriculas`;
CREATE TABLE IF NOT EXISTS `matriculas` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `matricula` int DEFAULT NULL,
  `id_alumno` int UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Índice 2` (`id_alumno`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`id`, `matricula`, `id_alumno`, `updated_at`, `created_at`) VALUES
(1, 202426, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_estudio`
--

DROP TABLE IF EXISTS `plan_estudio`;
CREATE TABLE IF NOT EXISTS `plan_estudio` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_asignatura` int UNSIGNED NOT NULL,
  `nombre_plan` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `anio` int NOT NULL,
  `cuatrimestres` int NOT NULL,
  `horas` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_plan` (`id_asignatura`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_pagos`
--

DROP TABLE IF EXISTS `registro_pagos`;
CREATE TABLE IF NOT EXISTS `registro_pagos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_servicio` int UNSIGNED DEFAULT NULL,
  `id_matricula` int UNSIGNED DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_servicio` (`id_servicio`),
  KEY `id_alumno` (`id_matricula`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro_pagos`
--

INSERT INTO `registro_pagos` (`id`, `id_servicio`, `id_matricula`, `estado`, `updated_at`, `created_at`) VALUES
(34, 1, 1, '2023-02-09', '2023-02-10 00:56:48', '2023-02-10 00:56:48'),
(37, 12, 1, '2023-02-09', '2023-02-10 04:12:37', '2023-02-10 04:12:37'),
(39, 14, 1, '2023-02-09', '2023-02-10 05:29:46', '2023-02-10 05:29:46'),
(40, 2, 1, '2023-02-09', '2023-02-10 05:29:51', '2023-02-10 05:29:51'),
(41, 2, 1, '2023-02-09', '2023-02-10 05:29:58', '2023-02-10 05:29:58'),
(42, 15, 1, '2023-02-09', '2023-02-10 05:30:07', '2023-02-10 05:30:07'),
(43, 1, 1, '2023-02-09', '2023-02-10 05:30:17', '2023-02-10 05:30:17'),
(44, 14, 1, '2023-02-09', '2023-02-10 05:30:36', '2023-02-10 05:30:36'),
(45, 30, 1, '2023-02-09', '2023-02-10 06:20:51', '2023-02-10 06:20:51'),
(46, 15, 1, '2023-02-14', '2023-02-14 12:57:57', '2023-02-14 12:57:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

DROP TABLE IF EXISTS `servicios`;
CREATE TABLE IF NOT EXISTS `servicios` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `codigo_serv` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nombre_serv` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `precio_serv` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `codigo_serv`, `nombre_serv`, `precio_serv`, `created_at`, `updated_at`) VALUES
(1, '0933', 'INSCRIPCION A TSU2', 7, '2023-02-07 05:51:09', '2023-02-09 01:29:09'),
(2, '0934', 'GLOBAL DE MATEMATICAS', 400, '2023-02-07 05:51:11', '2023-02-07 13:25:47'),
(12, '0923', 'EXAMEN REMEDIAlL', 230, '2023-02-08 00:37:15', '2023-02-09 06:51:09'),
(14, '0932', 'DAVID', 777, '2023-02-08 02:44:37', '2023-02-08 02:44:37'),
(15, '7774', 'PANCHO', 230, '2023-02-08 03:02:59', '2023-02-08 23:39:03'),
(23, 'PRUEBA 12', '1', 2, '2023-02-10 01:14:37', '2023-02-10 01:14:37'),
(26, '2', '2', 2, '2023-02-10 01:14:48', '2023-02-10 01:14:48'),
(27, '2', '1', 2, '2023-02-10 01:14:55', '2023-02-10 01:14:55'),
(30, '8888', 'SERVICIO X', 400, '2023-02-10 06:20:15', '2023-02-10 06:20:15');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD CONSTRAINT `carreras_ibfk_1` FOREIGN KEY (`id_plan`) REFERENCES `plan_estudio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `grupos_ibfk_1` FOREIGN KEY (`id_profesor`) REFERENCES `maestros` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grupos_ibfk_2` FOREIGN KEY (`id_asignatura`) REFERENCES `asignaturas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grupos_ibfk_3` FOREIGN KEY (`id_matricula`) REFERENCES `matriculas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grupos_ibfk_4` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD CONSTRAINT `maestros_ibfk_1` FOREIGN KEY (`id_grado`) REFERENCES `grado_prof` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `matriculas_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `plan_estudio`
--
ALTER TABLE `plan_estudio`
  ADD CONSTRAINT `plan_estudio_ibfk_1` FOREIGN KEY (`id_asignatura`) REFERENCES `asignaturas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registro_pagos`
--
ALTER TABLE `registro_pagos`
  ADD CONSTRAINT `registro_pagos_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registro_pagos_ibfk_2` FOREIGN KEY (`id_matricula`) REFERENCES `matriculas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Base de datos: `utc_v2`
--
CREATE DATABASE IF NOT EXISTS `utc_v2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `utc_v2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `curp` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `num_seguro` int DEFAULT NULL,
  `apellido_paterno` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `apellido_materno` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nombres` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sexo` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefono` int NOT NULL,
  `correo` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `localidad` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `municipio` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `curp`, `num_seguro`, `apellido_paterno`, `apellido_materno`, `nombres`, `sexo`, `telefono`, `correo`, `direccion`, `localidad`, `municipio`, `updated_at`, `created_at`) VALUES
(1, '233232323', 34434, 'Ortiz', 'Can', 'Hector Eduardo', 'Masculino', 998192312, 'laloeros34@gtmal.com', 'por aHI', 'SI', 'YWES', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

DROP TABLE IF EXISTS `asignaturas`;
CREATE TABLE IF NOT EXISTS `asignaturas` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `codigo_asignatura` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nombre_asignatura` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `num_unidades` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aspirantes`
--

DROP TABLE IF EXISTS `aspirantes`;
CREATE TABLE IF NOT EXISTS `aspirantes` (
  `id` int NOT NULL,
  `folio` int NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` int NOT NULL,
  `localidad` int NOT NULL,
  `genero` varchar(20) NOT NULL,
  `id_procedencia` int DEFAULT NULL,
  `id_carrera` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_procedencia` (`id_procedencia`),
  KEY `id_carrera` (`id_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `contenido` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

DROP TABLE IF EXISTS `carreras`;
CREATE TABLE IF NOT EXISTS `carreras` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `codigo_carrera` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nombre_carrera` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_plan` int UNSIGNED NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_plan` (`id_plan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado_prof`
--

DROP TABLE IF EXISTS `grado_prof`;
CREATE TABLE IF NOT EXISTS `grado_prof` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `grado_nombre` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE IF NOT EXISTS `grupos` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_matricula` int UNSIGNED DEFAULT NULL,
  `id_asignatura` int UNSIGNED DEFAULT NULL,
  `id_profesor` int UNSIGNED DEFAULT NULL,
  `id_carrera` int UNSIGNED NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_matricula` (`id_matricula`),
  KEY `id_asignatura` (`id_asignatura`),
  KEY `id_profesor` (`id_profesor`),
  KEY `carrea_id` (`id_carrera`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

DROP TABLE IF EXISTS `maestros`;
CREATE TABLE IF NOT EXISTS `maestros` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `	codigo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `	sexo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `apellido_paterno` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `apellido_materno` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nombres` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `	curp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `num_seguro` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rfc` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_grado` int UNSIGNED NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_grado` (`id_grado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

DROP TABLE IF EXISTS `matriculas`;
CREATE TABLE IF NOT EXISTS `matriculas` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `matricula` int DEFAULT NULL,
  `id_alumno` int UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Índice 2` (`id_alumno`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`id`, `matricula`, `id_alumno`, `updated_at`, `created_at`) VALUES
(1, 202426, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_08_22_012813_create_permission_tables', 1),
(6, '2021_08_22_020736_create_blogs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb3_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_estudio`
--

DROP TABLE IF EXISTS `plan_estudio`;
CREATE TABLE IF NOT EXISTS `plan_estudio` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_asignatura` int UNSIGNED NOT NULL,
  `nombre_plan` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `anio` int NOT NULL,
  `cuatrimestres` int NOT NULL,
  `horas` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_plan` (`id_asignatura`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedencia`
--

DROP TABLE IF EXISTS `procedencia`;
CREATE TABLE IF NOT EXISTS `procedencia` (
  `id` int NOT NULL,
  `nombre_esc` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_pagos`
--

DROP TABLE IF EXISTS `registro_pagos`;
CREATE TABLE IF NOT EXISTS `registro_pagos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_servicio` int UNSIGNED DEFAULT NULL,
  `id_matricula` int UNSIGNED DEFAULT NULL,
  `estado` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_servicio` (`id_servicio`),
  KEY `id_alumno` (`id_matricula`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro_pagos`
--

INSERT INTO `registro_pagos` (`id`, `id_servicio`, `id_matricula`, `estado`, `updated_at`, `created_at`) VALUES
(51, 33, 1, '2023-02-14', '2023-02-15 00:34:04', '2023-02-15 00:27:30'),
(53, 33, 1, '2023-03-11', '2023-02-15 01:20:23', '2023-02-15 01:03:32'),
(54, 33, 1, '2023-02-04', '2023-02-15 01:20:31', '2023-02-15 01:03:52'),
(59, 35, 1, '2023-02-14', '2023-02-16 00:01:42', '2023-02-15 05:31:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

DROP TABLE IF EXISTS `servicios`;
CREATE TABLE IF NOT EXISTS `servicios` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `codigo_serv` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nombre_serv` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `precio_serv` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `codigo_serv`, `nombre_serv`, `precio_serv`, `created_at`, `updated_at`) VALUES
(33, '09234', 'SI YESsasadesad', 12321, '2023-02-15 00:09:31', '2023-02-15 23:54:10'),
(34, 'PRUEBA 12', 'privado cariñosa', 2, '2023-02-15 00:27:38', '2023-02-15 00:40:05'),
(35, '0923', 'PAGO DE CARIÑOSA', 800, '2023-02-15 00:35:09', '2023-02-15 00:35:09'),
(38, '092323', 'SERVICIO Y', 200, '2023-02-15 05:31:11', '2023-02-15 23:54:16'),
(39, 'SERVICIO 3', 'W', 1, '2023-02-15 12:02:42', '2023-02-15 12:02:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Hector eduardo Ortiz can', 'laloeros56@gmail.com', NULL, '$2y$10$Gvqgueq82AuycaqGXRt8O.uD.zJOHQtoss4Kvk9I9eh34yIK72d7u', 'zIBcuUoMj5t48tfkPygJnQnyylUo5kgMdC5oiOTkobfGnmX9dWqHGinDjBmL', '2023-02-15 03:31:23', '2023-02-15 03:31:23');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aspirantes`
--
ALTER TABLE `aspirantes`
  ADD CONSTRAINT `aspirantes_ibfk_1` FOREIGN KEY (`id_procedencia`) REFERENCES `procedencia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aspirantes_ibfk_2` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD CONSTRAINT `carreras_ibfk_1` FOREIGN KEY (`id_plan`) REFERENCES `plan_estudio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `grupos_ibfk_1` FOREIGN KEY (`id_profesor`) REFERENCES `maestros` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grupos_ibfk_2` FOREIGN KEY (`id_asignatura`) REFERENCES `asignaturas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grupos_ibfk_3` FOREIGN KEY (`id_matricula`) REFERENCES `matriculas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grupos_ibfk_4` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD CONSTRAINT `maestros_ibfk_1` FOREIGN KEY (`id_grado`) REFERENCES `grado_prof` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `matriculas_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `plan_estudio`
--
ALTER TABLE `plan_estudio`
  ADD CONSTRAINT `plan_estudio_ibfk_1` FOREIGN KEY (`id_asignatura`) REFERENCES `asignaturas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registro_pagos`
--
ALTER TABLE `registro_pagos`
  ADD CONSTRAINT `registro_pagos_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registro_pagos_ibfk_2` FOREIGN KEY (`id_matricula`) REFERENCES `matriculas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
