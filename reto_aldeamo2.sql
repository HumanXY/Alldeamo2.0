-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2018 a las 20:24:48
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aldeamo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llamado_turno`
--

CREATE TABLE `llamado_turno` (
  `id` bigint(20) NOT NULL,
  `shift_id` bigint(20) NOT NULL,
  `focal_point_id` bigint(20) NOT NULL,
  `call_date` datetime NOT NULL,
  `call_username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `llamado_turno`
--

INSERT INTO `llamado_turno` (`id`, `shift_id`, `focal_point_id`, `call_date`, `call_username`) VALUES
(1, 1, 5, '2018-04-10 08:40:00', 'username1'),
(2, 2, 3, '2018-04-10 08:45:00', 'username2'),
(3, 3, 3, '2018-04-10 08:45:00', 'username3'),
(4, 4, 4, '2018-04-10 09:30:00', 'username4'),
(5, 5, 5, '2018-04-10 09:35:00', 'username5'),
(6, 6, 1, '2018-04-10 09:45:00', 'username6'),
(7, 7, 5, '2018-04-10 11:10:00', 'username7'),
(8, 8, 4, '2018-04-10 12:15:00', 'username8'),
(9, 9, 2, '2018-04-10 11:25:00', 'username9'),
(10, 10, 2, '2018-04-10 08:43:13', 'username10'),
(11, 11, 1, '2018-04-11 07:20:00', 'username11'),
(12, 12, 3, '2018-04-11 07:55:00', 'username12'),
(13, 13, 5, '2018-04-11 07:20:00', 'username13'),
(14, 14, 4, '2018-04-11 13:35:00', 'username14'),
(15, 15, 2, '2018-04-11 13:50:00', 'username15'),
(16, 16, 1, '2018-04-11 13:25:00', 'username16'),
(17, 17, 2, '2018-04-11 14:50:00', 'username17'),
(18, 18, 2, '2018-04-11 14:35:00', 'username18'),
(19, 19, 5, '2018-04-11 14:20:00', 'username19'),
(20, 20, 4, '2018-04-11 14:15:00', 'username20'),
(21, 21, 4, '2018-04-12 08:10:00', 'username21'),
(22, 22, 3, '2018-04-12 08:25:00', 'username22'),
(23, 23, 4, '2018-04-12 09:50:00', 'username23'),
(24, 24, 3, '2018-04-12 10:25:00', 'username24'),
(25, 25, 1, '2018-04-12 12:10:00', 'username25'),
(26, 26, 2, '2018-04-12 11:55:00', 'username26'),
(27, 27, 5, '2018-04-12 12:50:00', 'username27'),
(28, 28, 1, '2018-04-12 14:10:00', 'username28'),
(29, 29, 1, '2018-04-12 14:20:00', 'username29'),
(30, 30, 5, '2018-04-12 16:10:00', 'username30');


-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `promediodias`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `promediodias` (
`Dias` varchar(9)
,`call_date` datetime
,`diferencia` time
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `tiempo_espera`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `tiempo_espera` (
`creation_date` datetime
,`call_date` datetime
,`diferencia` time
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `focal_point_id` bigint(20) NOT NULL,
  `priority` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `creation_username` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `cell_phone` varchar(100) NOT NULL,
  `no_cell_phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`id`, `user_id`, `focal_point_id`, `priority`, `creation_date`, `creation_username`, `status`, `cell_phone`, `no_cell_phone`) VALUES
(1, 1, 5, 1, '2018-04-10 08:30:00', 'username1', 1, '3112367338', 1),
(2, 2, 3, 2, '2018-04-10 08:35:00', 'username2', 0, '3153693265', 1),
(3, 3, 3, 1, '2018-04-10 08:40:00', 'username3', 1, '3157894253', 1),
(4, 4, 4, 2, '2018-04-10 09:20:00', 'username4', 0, '3113259845', 1),
(5, 5, 5, 3, '2018-04-10 09:25:00', 'username5', 1, '3129658742', 1),
(6, 6, 1, 1, '2018-04-10 09:40:00', 'username6', 1, '3112367338', 1),
(7, 7, 5, 3, '2018-04-10 11:00:00', 'username7', 0, '3112367338', 1),
(8, 8, 4, 2, '2018-04-10 11:15:00', 'username8', 0, '3112367338', 1),
(9, 9, 2, 4, '2018-04-10 11:20:00', 'username9', 1, '3112367338', 1),
(10, 10, 2, 1, '2018-04-10 08:33:13', 'username10', 0, '3122367338', 1),
(11, 11, 1, 2, '2018-04-11 07:10:00', 'username11', 1, '3115367338', 1),
(12, 12, 3, 3, '2018-04-11 07:45:00', 'username12', 0, '3112368338', 1),
(13, 13, 5, 1, '2018-04-11 07:15:00', 'username13', 0, '3112367338', 1),
(14, 14, 4, 1, '2018-04-11 13:25:00', 'username14', 1, '3112367318', 1),
(15, 15, 2, 3, '2018-04-11 13:45:00', 'username15', 1, '3112368338', 1),
(16, 16, 1, 5, '2018-04-11 13:15:00', 'username16', 0, '3112367438', 1),
(17, 17, 2, 4, '2018-04-11 14:45:00', 'username17', 1, '3112362138', 1),
(18, 18, 2, 4, '2018-04-11 14:30:00', 'username18', 0, '3122367338', 1),
(19, 19, 5, 3, '2018-04-11 14:00:00', 'username19', 1, '3112367358', 1),
(20, 20, 4, 3, '2018-04-11 14:05:00', 'username20', 1, '3142367338', 1),
(21, 21, 4, 4, '2018-04-12 08:00:00', 'username21', 0, '3115567338', 1),
(22, 22, 3, 5, '2018-04-12 08:15:00', 'username22', 0, '3112367338', 1),
(23, 23, 4, 2, '2018-04-12 09:45:00', 'username23', 0, '3112368738', 1),
(24, 24, 3, 1, '2018-04-12 10:15:00', 'username24', 1, '3102367338', 1),
(25, 25, 1, 3, '2018-04-12 12:00:00', 'username25', 0, '3112367338', 1),
(26, 26, 2, 4, '2018-04-12 11:45:00', 'username26', 1, '31125547338', 1),
(27, 27, 5, 1, '2018-04-12 12:45:00', 'username27', 1, '3112367538', 1),
(28, 28, 1, 2, '2018-04-12 14:00:00', 'username28', 0, '3112367368', 1),
(29, 29, 1, 5, '2018-04-12 14:15:00', 'username29', 1, '3110367338', 1),
(30, 30, 5, 3, '2018-04-12 16:00:00', 'username30', 1, '3112217338', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `cedula` char(15) NOT NULL,
  `celular` char(15) NOT NULL,
  `correo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `cedula`, `celular`, `correo`) VALUES
(1, 'Felipe', 'Godoy', '1012589654', '3112367338', 'felipe@godoy.com'),
(2, 'Raquel', 'Mancilla', '1012548976', '3153693265', 'raquel@mancilla.com'),
(3, 'Sorley', 'Salguero', '31987254', '3157894253', 'sorley@salguero.com'),
(4, 'Angela', 'Gutierrez', '1210420598', '3113259845', 'angela@gutierrez.com'),
(5, 'Joann', 'Villalobos', '1012402854', '3129658742', 'joann@villalobos.com'),
(6, 'Felie', 'Godoy', '1012589654', '3112367338', 'felipe@godoy.com'),
(7, 'quel', 'Mancilla', '1012548976', '3153693265', 'raquel@mancilla.com'),
(8, 'Sor', 'Salgero', '31987254', '3157894253', 'sorley@salguero.com'),
(9, 'Ang', 'Gutierrez', '1210420598', '3113259845', 'angela@gutierrez.com'),
(10, 'Jon', 'Villalobos', '1012402854', '3129658742', 'joann@villalobos.com'),
(11, 'Raqu', 'Manlla', '1012548976', '3153693265', 'raquel@mancilla.com'),
(12, 'ley', 'Salguero', '31987254', '3157894253', 'sorley@salguero.com'),
(13, 'Angla', 'Guierrez', '1210420598', '3113259845', 'angela@gutierrez.com'),
(14, 'Jann', 'Villobos', '1012402854', '3129658742', 'joann@villalobos.com'),
(15, 'Ra', 'Mancilla', '1012548976', '3153693265', 'raquel@mancilla.com'),
(16, 'Soey', 'Salguero', '31987254', '3157894253', 'sorley@salguero.com'),
(17, 'Ana', 'Gutierrez', '1210420598', '3113259845', 'angela@gutierrez.com'),
(18, 'ann', 'Villalobos', '1012402854', '3129658742', 'joann@villalobos.com'),
(19, 'quel', 'Mancilla', '1012548976', '3153693265', 'raquel@mancilla.com'),
(20, 'ley', 'Salguero', '31987254', '3157894253', 'sorley@salguero.com'),
(21, 'Anela', 'Guterrez', '1210420598', '3113259845', 'angela@gutierrez.com'),
(22, 'Jon', 'Villaobos', '1012402854', '3129658742', 'joann@villalobos.com'),
(23, 'Sorley', 'Salguero', '31987254', '3157894253', 'sorley@salguero.com'),
(24, 'Aela', 'Gutierrez', '1210420598', '3113259845', 'angela@gutierrez.com'),
(25, 'Joan', 'Villalobos', '1012402854', '3129658742', 'joann@villalobos.com'),
(26, 'Raquel', 'Mancilla', '1012548976', '3153693265', 'raquel@mancilla.com'),
(27, 'Soley', 'Salguero', '31987254', '3157894253', 'sorley@salguero.com'),
(28, 'Anga', 'Gutrrez', '1210420598', '3113259845', 'angela@gutierrez.com'),
(29, 'Jonn', 'Villalobos', '1012402854', '3129658742', 'joann@villalobos.com'),
(30, 'Rel', 'Mancilla', '1012548976', '3153693265', 'raquel@mancilla.com');

-- --------------------------------------------------------

--
-- Estructura para la vista `promediodias`
--
DROP TABLE IF EXISTS `promediodias`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `promediodias`  AS  select dayname(`t`.`creation_date`) AS `Dias`,`l`.`call_date` AS `call_date`,timediff(`l`.`call_date`,`t`.`creation_date`) AS `diferencia` from (`turno` `t` join `llamado_turno` `l` on((`t`.`id` = `l`.`shift_id`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `tiempo_espera`
--
DROP TABLE IF EXISTS `tiempo_espera`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tiempo_espera`  AS  select `t`.`creation_date` AS `creation_date`,`l`.`call_date` AS `call_date`,timediff(`l`.`call_date`,`t`.`creation_date`) AS `diferencia` from (`turno` `t` join `llamado_turno` `l` on((`t`.`id` = `l`.`shift_id`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `llamado_turno`
--
ALTER TABLE `llamado_turno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shift_id` (`shift_id`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `llamado_turno`
--
ALTER TABLE `llamado_turno`
  ADD CONSTRAINT `llamado_turno_ibfk_1` FOREIGN KEY (`shift_id`) REFERENCES `turno` (`id`);

--
-- Filtros para la tabla `turno`
--
ALTER TABLE `turno`
  ADD CONSTRAINT `turno_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
