-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2019 a las 09:52:10
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
-- Base de datos: `sistema_bancario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco`
--

CREATE TABLE `banco` (
  `id_banco` int(11) NOT NULL,
  `nombre_banco` varchar(45) DEFAULT NULL,
  `telefono_banco` varchar(20) DEFAULT NULL,
  `nit_banco` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `banco`
--

INSERT INTO `banco` (`id_banco`, `nombre_banco`, `telefono_banco`, `nit_banco`) VALUES
(1, 'Banrural', '4534-4365', '12345-2'),
(2, 'Banco Industrial', '7745-2342', '54421-2'),
(3, 'Banco G&T', '3453-2343', '34324-6'),
(4, 'otro', '34343', '3434343'),
(5, 'otro2', '34343', '3434343');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `banco_cliente`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `banco_cliente` (
`nombre_banco` varchar(45)
,`usuario_cliente` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora_inicio`
--

CREATE TABLE `bitacora_inicio` (
  `idbitacora` int(11) NOT NULL,
  `hora_inicio_sesion` varchar(45) DEFAULT NULL,
  `fecha_inicio_sesion` varchar(45) DEFAULT NULL,
  `empleado_id_bitacoraInicio` int(11) DEFAULT NULL,
  `chequeras_id_bitacoraInicio` int(11) NOT NULL,
  `chequesAnulados_id_bitacoraInicio` int(11) NOT NULL,
  `retiro_id_bitacoraInicio` int(11) NOT NULL,
  `deposito_id_bitacoraInicio` int(11) NOT NULL,
  `transferenciaId_bitacoraInicio` int(11) DEFAULT NULL,
  `hora_cerrarSesion` varchar(45) DEFAULT NULL,
  `fecha_cerrarSesion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajero_automatico`
--

CREATE TABLE `cajero_automatico` (
  `idcajero_automatico` int(11) NOT NULL,
  `tarjetaDebito_id_cajero` int(11) DEFAULT NULL,
  `monto_retirar` decimal(10,2) DEFAULT NULL,
  `hora_cajero` varchar(45) DEFAULT NULL,
  `fecha_cajero` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cajero_automatico`
--

INSERT INTO `cajero_automatico` (`idcajero_automatico`, `tarjetaDebito_id_cajero`, `monto_retirar`, `hora_cajero`, `fecha_cajero`) VALUES
(1, 19, '100.00', '00:54:48', '30-05-2019'),
(2, 19, '200.00', '00:55:19', '30-05-2019'),
(3, 19, '1.00', '00:59:06', '30-05-2019'),
(4, 19, '2.00', '00:59:34', '30-05-2019'),
(5, 19, '3.00', '00:59:59', '30-05-2019'),
(6, 19, '2.00', '01:38:10', '30-05-2019'),
(7, 19, '50.00', '02:06:11', '31-05-2019'),
(8, 18, '1000.00', '03:10:42', '31-05-2019'),
(9, 18, '250.00', '03:25:37', '31-05-2019'),
(10, 18, '500.00', '03:32:46', '31-05-2019'),
(11, 19, '22.00', '12:55:26', '14-06-2019'),
(12, 20, '90.00', '21:35:03', '24-06-2019'),
(13, 21, '100.00', '21:45:48', '24-06-2019'),
(14, 21, '100.00', '22:07:01', '24-06-2019'),
(15, 21, '100.00', '22:08:57', '24-06-2019'),
(16, 21, '100.00', '22:09:47', '24-06-2019'),
(17, 21, '10.00', '22:58:41', '24-06-2019'),
(18, 20, '320.00', '23:03:39', '24-06-2019'),
(19, 20, '20.00', '23:11:45', '24-06-2019'),
(20, 20, '20.00', '23:12:20', '24-06-2019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chequeras`
--

CREATE TABLE `chequeras` (
  `id_chequeras` int(11) NOT NULL,
  `numero_de_cuenta` varchar(45) DEFAULT NULL,
  `saldo_actual` decimal(12,2) DEFAULT NULL,
  `cuenta_id_chequera` int(11) NOT NULL,
  `tipo_cuentas` int(11) DEFAULT NULL,
  `hora_apertura` varchar(45) DEFAULT NULL,
  `fecha_apertura` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `chequeras`
--

INSERT INTO `chequeras` (`id_chequeras`, `numero_de_cuenta`, `saldo_actual`, `cuenta_id_chequera`, `tipo_cuentas`, `hora_apertura`, `fecha_apertura`, `estado`) VALUES
(1, '12345678953', '9119.00', 1, 1, '23:20:21', '22-04-2019', 1),
(2, '65765456265', '6200.00', 2, 1, '01:29:21', '24-04-2019', 1),
(3, '99999999559', '150.00', 3, 1, '16:19:21', '24-04-2019', 1),
(4, '21474836437', '13000.00', 8, 1, '11:03:34', '26-04-2019', 1),
(15, '67676767444', '100.00', 20, 1, '12:53:54', '26-04-2019', 1),
(17, '93929292954', '200.00', 22, 1, '13:22:33', '26-04-2019', 0),
(19, '93929292927', '100.00', 24, 1, '13:28:01', '26-04-2019', 1),
(20, '39451572019', '100.00', 25, 1, '13:32:28', '26-04-2019', 1),
(21, '40659052019', '-20.00', 26, 1, '14:57:51', '26-04-2019', 1),
(22, '41544042019', '100.00', 27, 1, '15:05:59', '26-04-2019', 0),
(23, '42339272019', '100.00', 28, 1, '17:04:44', '26-04-2019', 1),
(24, '47535292019', '2100.00', 29, 1, '18:27:39', '26-04-2019', 1),
(25, '48739112019', '100.00', 30, 1, '18:29:35', '26-04-2019', 1),
(26, '49529322019', '71.00', 31, 1, '17:11:38', '27-04-2019', 1),
(27, '50440202019', '3400.00', 32, 1, '21:32:29', '27-04-2019', 1),
(28, '52626372019', '100.00', 33, 1, '00:20:40', '28-04-2019', 1),
(29, '54517502019', '1620.00', 34, 1, '01:37:26', '28-04-2019', 1),
(30, '55711332019', '3180.00', 35, 1, '01:50:17', '28-04-2019', 0),
(31, '56506252019', '3598.00', 36, 1, '18:33:11', '28-04-2019', 1),
(32, '57531002019', '980.00', 37, 1, '00:25:05', '05-05-2019', 1),
(40, '12340956789', '300.00', 22, 1, '01:00:31', '13-05-2019', 0),
(42, '5262243201940', '100.00', 28, 1, '17:04:33', '16-05-2019', 1),
(46, '4240047201942', '100.00', 23, 1, '17:29:24', '16-05-2019', 1),
(47, '1240351201946', '6970.00', 8, 1, '01:00:31', '16-05-2019', 0),
(48, '5261751201947', '100.00', 33, 1, '01:00:31', '26-04-2019', 1),
(49, '59933042019', '100.00', 38, 1, '17:04:33', '16-05-2019', 1),
(50, '2891221201949', '1100.00', 22, 1, '18:33:11', '16-05-2019', 0),
(51, '5994724201950', '1000.00', 38, 1, '18:27:39', '24-04-2019', 1),
(52, '5992425201951', '1000.00', 38, 1, '17:11:38', '16-05-2019', 1),
(53, '60624292019', '101.00', 39, 1, '18:27:39', '24-04-2019', 1),
(54, '6065829201953', '500.00', 39, 1, '17:11:38', '26-04-2019', 1),
(55, '6060830201954', '1500.00', 39, 1, '13:32:28', '26-04-2019', 1),
(56, '184637201955', '50019.00', 1, 1, '01:00:31', '16-05-2019', 1),
(57, '4751631201956', '100.00', 29, 1, '18:31:16', '16-05-2019', 1),
(58, '62437322019', '1200.00', 41, 1, '18:32:37', '16-05-2019', 0),
(59, '6240733201958', '1500.00', 41, 1, '18:33:07', '16-05-2019', 0),
(60, '63710182019', '100.00', 42, 1, '14:18:10', '17-05-2019', 1),
(61, '28114041201960', '200.00', 22, 1, '14:41:40', '17-05-2019', 0),
(62, '28114041201961', '200.00', 22, 1, '14:41:40', '17-05-2019', 0),
(63, '28115041201962', '200.00', 22, 1, '14:41:50', '17-05-2019', 0),
(65, '28110843201963', '200.00', 22, 1, '14:43:08', '17-05-2019', 0),
(66, '28110943201963', '200.00', 22, 1, '14:43:09', '17-05-2019', 0),
(67, '28112845201966', '200.00', 22, 1, '14:45:28', '17-05-2019', 0),
(69, '1245752201967', '6817.00', 8, 1, '14:52:57', '17-05-2019', 1),
(71, '5261009201969', '100.00', 33, 1, '15:09:10', '17-05-2019', 1),
(73, '5263542201971', '100.00', 33, 1, '15:42:35', '17-05-2019', 1),
(75, '6243051201973', '1200.00', 41, 1, '15:51:30', '17-05-2019', 0),
(77, '5633461234987', '1220.00', 41, 1, '15:51:30', '17-05-2019', 0),
(78, '569743334987', '1220.00', 41, 1, '15:51:30', '17-05-2019', 0),
(79, '56903948327', '1220.00', 41, 1, '15:51:30', '17-05-2019', 0),
(80, '6245107201979', '1200.00', 41, 1, '16:07:51', '17-05-2019', 0),
(82, '6244309201980', '1200.00', 41, 1, '16:09:43', '17-05-2019', 0),
(84, '6243110201982', '1200.00', 41, 1, '16:10:31', '17-05-2019', 0),
(86, '65755192019', '-150.00', 43, 1, '16:19:55', '17-05-2019', 0),
(87, '66404532019', '100.00', 44, 1, '16:53:04', '17-05-2019', 1),
(88, '68553582019', '100.00', 45, 1, '16:58:53', '17-05-2019', 1),
(89, '70734112019', '100.00', 46, 1, '17:11:34', '17-05-2019', 1),
(90, '72732172019', '100.00', 47, 1, '17:17:32', '17-05-2019', 1),
(91, '6241229201990', '1200.00', 41, 1, '22:29:12', '19-05-2019', 0),
(92, '6240330201991', '1200.00', 41, 1, '22:30:03', '19-05-2019', 1),
(93, '87613362019', '100.00', 48, 1, '22:36:13', '19-05-2019', 1),
(94, '89549402019', '100.00', 49, 1, '22:40:49', '19-05-2019', 1),
(95, '65135542201994', '-150.00', 43, 1, '22:42:55', '19-05-2019', 0),
(96, '65132143201995', '-150.00', 43, 1, '22:43:21', '19-05-2019', 0),
(97, '65133443201996', '-150.00', 43, 1, '22:43:34', '19-05-2019', 0),
(98, '183246201997', '119.00', 1, 1, '22:46:32', '19-05-2019', 1),
(99, '90646492019', '100.00', 50, 1, '22:49:46', '19-05-2019', 1),
(100, '91828512019', '100.00', 51, 1, '22:51:28', '19-05-2019', 1),
(101, '93628532019', '100.00', 52, 1, '22:53:28', '19-05-2019', 0),
(102, '94629552019', '100.00', 53, 1, '22:55:29', '19-05-2019', 1),
(103, '98900002019', '100.00', 54, 1, '23:00:00', '19-05-2019', 1),
(104, '93611012019103', '100.00', 52, 1, '23:01:11', '19-05-2019', 0),
(105, '93623012019104', '100.00', 52, 1, '23:01:23', '19-05-2019', 0),
(106, '93630012019105', '100.00', 52, 1, '23:01:30', '19-05-2019', 0),
(107, '93614472019106', '100.00', 52, 1, '23:47:14', '19-05-2019', 0),
(108, '99754482019', '100.00', 55, 1, '23:48:54', '19-05-2019', 1),
(109, '93654352019108', '100.00', 52, 1, '00:35:54', '20-05-2019', 0),
(110, '93639422019109', '100.00', 52, 1, '00:42:39', '20-05-2019', 0),
(111, '93644422019110', '100.00', 52, 1, '00:42:44', '20-05-2019', 0),
(112, '93647422019111', '100.00', 52, 1, '00:42:47', '20-05-2019', 0),
(113, '93651422019112', '100.00', 52, 1, '00:42:51', '20-05-2019', 0),
(114, '100644492019', '100.00', 56, 1, '00:49:44', '20-05-2019', 1),
(115, '651320032019114', '-150.00', 43, 1, '01:03:20', '20-05-2019', 0),
(116, '651320032019115', '-150.00', 43, 1, '01:03:20', '20-05-2019', 1),
(117, '101815032019', '100.00', 57, 1, '02:03:15', '20-05-2019', 1),
(118, '103537052019', '100.00', 58, 1, '02:05:37', '20-05-2019', 1),
(119, '105513082019', '100.00', 59, 1, '02:08:12', '20-05-2019', 1),
(120, '106705312019', '100.00', 60, 1, '02:31:05', '20-05-2019', 1),
(121, '281150312019120', '200.00', 22, 1, '02:31:50', '20-05-2019', 0),
(122, '281158312019121', '130.00', 22, 1, '02:31:58', '20-05-2019', 1),
(123, '107528312019', '100.00', 61, 1, '03:31:28', '23-05-2019', 0),
(124, '107526322019123', '800.00', 61, 1, '03:32:26', '23-05-2019', 1),
(125, '55705142019124', '1030.00', 35, 1, '01:14:05', '29-05-2019', 1),
(126, '12455122019125', '6900.00', 8, 1, '00:12:55', '13-06-2019', 1),
(127, '108933332019', '5010.00', 62, 2, '16:33:33', '14-06-2019', 1),
(128, '109844352019', '450.00', 63, 1, '16:35:44', '14-06-2019', 1),
(129, '111600162019', '50000.00', 64, 2, '17:16:00', '14-06-2019', 1),
(130, '112610182019', '41300.00', 65, 2, '17:18:10', '14-06-2019', 1),
(131, '107516292019130', '100.00', 61, 1, '17:29:16', '14-06-2019', 1),
(132, '651351292019131', '50.00', 43, 2, '17:29:51', '14-06-2019', 1),
(133, '113942072019', '2019.00', 66, 2, '22:07:42', '15-06-2019', 1),
(134, '114448152019', '550.00', 67, 2, '00:15:48', '16-06-2019', 1),
(135, '115603192019', '540.00', 68, 1, '00:19:02', '16-06-2019', 1),
(136, '116548212019', '450.00', 69, 1, '00:21:48', '16-06-2019', 1),
(137, '107526252019136', '100.00', 61, 2, '00:25:26', '16-06-2019', 1),
(138, '117535262019', '320.00', 70, 1, '00:26:35', '16-06-2019', 1),
(139, '118704322019', '103.00', 71, 2, '00:32:04', '16-06-2019', 1),
(140, '40646392019139', '-380.00', 26, 2, '21:39:46', '24-06-2019', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cheques_anulados`
--

CREATE TABLE `cheques_anulados` (
  `idcheques_anulados` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `cuenta_id_cheq_null` int(11) NOT NULL,
  `hora` varchar(45) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_clientes` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `dpi` varchar(45) DEFAULT NULL,
  `nit` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_clientes`, `nombre`, `apellido`, `dpi`, `nit`, `telefono`, `direccion`) VALUES
(1, 'Bernardo', 'Sales', '345343434', '345434-2', '4554-4534', 'Retalhuleu'),
(2, 'Leonardo', 'Rotosa', '4336324523', '435323-2', '4353-3453', 'Retalhuleu'),
(3, 'Felipe', 'GarcÃ­a', '435235232', '34532-1', '3452-3452', 'San Andres'),
(12, 'Alan', 'Chocho', '098765443218', '12335', '8584-3949', 'San Carlos'),
(23, 'Chenchos', 'Vargas', '8878787878', '39838', '3837-2323', 'Reu'),
(28, 'Adalberto F', 'GollÃ³n', '12345612', '234', '4949-3333', 'Retalhuleu'),
(32, 'Jorge', 'Yobani', '123456122', '234', '4949-3333', 'Reu'),
(34, 'Jorge', 'Yobani', '1234561229', '234', '4949-3333', 'Reu'),
(39, 'Luis', 'Salvatorres', '123456789123', '35643-3', '0398-2398', 'San Andres'),
(40, 'Vanesa', 'ChachÃ¡n', '123456789987', '43938-2', '3402-3223', 'Reu'),
(41, 'Marlon', 'Gallaz', '193823949', '40930-23', '3029-3223', 'Retalhuleu'),
(42, 'Eddy', 'Ramos', '838383939', '394893-1', '9493-2343', 'Retalhuleu'),
(47, 'Porki', 'porkitos', '543564454', '5465456', '2823-3333', 'Caballo Blanco'),
(48, 'Simpsons', 'Omero', '94302093202', '09230-2', '3200-2323', 'San Sebastian'),
(49, 'Oscar', 'Robles', '3403920223', '32525-2', '0343-2342', 'Retalhuleu'),
(50, 'Juan', 'Barrote', '9348394892389', '304538503', '3489-2323', 'San Carlos'),
(52, 'Andres', 'Sepeda', '0293849382390', '094303020', '0493-2342', 'El Palmar'),
(54, 'Elena', 'Gonzalez Romeo', '0192839287292', '398229019', '8480-3423', 'Caballo Blanco'),
(55, 'Ricardo', 'Andrade Valdaz', '3409302384384', '302485342', '0398-3453', 'El Palmar'),
(56, 'Pollo', 'pollitoBlanco', '3023924829923', '239402842', '3092-3432', 'El Asintal'),
(57, 'Elder', 'Conosa', '3923230942739', '304930239', '4933-4343', 'San Carlos'),
(59, 'Alexander', 'Casacas', '4830430384302', '384293284', '4893-3434', 'San Carlos'),
(60, 'Bebeto', 'Camarrote', '3049023534992', '043925439', '3049-2345', 'El Asintal'),
(61, 'Angelina', 'Malente', '0349253409302', '043920523', '3453-2342', 'El Asintal'),
(62, 'Axel', 'Bonaparte', '3409082520385', '328492345', '4353-3452', 'San Felipe'),
(63, 'Brandon', 'Carreto', '0394852304939', '843020950', '0433-2345', 'Reu'),
(65, 'Arnoldo Lenco', 'Ramado', '0932402384098', '049385093', '3452-3242', 'Guate'),
(66, 'Omar', 'carrillo', '3490203948134', '432535235', '4352-4325', 'Reu'),
(68, 'Carol', 'perez', '3402003340023', '904032952', '0423-2345', 'Guate'),
(70, 'Orlando', 'Casacas', '4098302032948', '934828383', '0342-3453', 'El Asintal'),
(72, 'Colocho', 'chocho', '3490583745732', '984792353', '3492-3452', 'Guate'),
(74, 'Holsen', 'Camacho', '3847592384702', '349292305', '9343-3422', 'Reu'),
(76, 'Cantoon', 'cato', '4325632452352', '546663464', '4564-5446', 'Guate'),
(78, 'cato', 'cato', '4309875082397', '345234535', '3232-3453', 'Reu'),
(79, 'Tino', 'tinitio', '3498790832795', '920348705', '3982-3452', 'Reu'),
(81, 'Otto', 'omar', '4382079832059', '987503242', '9348-2345', 'Reu'),
(83, 'Daniel', 'papaya', '4398070298302', '983472904', '98347922', 'reu'),
(85, 'Chomo', 'carreto', '8974390875908', '984379023', '930249230', 'reu'),
(87, 'Brenda', 'Casacas', '0493875938592', '923485790', '3429-3245', 'Mazate'),
(89, 'Rambo', 'matul', '9483028975904', '903874923', '4932-3243', 'Mazate'),
(90, 'Naruto', 'shipuden', '9402384753927', '239485293', '9043-3453', 'Reu'),
(91, 'Ezequiel', 'Gonzales', '3402857093402', '934287520', '9328-2342', 'Mazate'),
(93, 'Arnold Binicio', 'Srek', '0983475934287', '238490532', '3498-3452', 'Huehuetenango'),
(94, 'Benito', 'Janson', '0439287509233', '984378723', '3982-2342', 'Caballo Blanco'),
(98, 'Don Ramon', 'Valdez', '0139847502398', '843790253', '3942-3453', 'Reu'),
(99, 'Rodolfo', 'Gonzales', '4398750924509', '490328792', '9328-3452', 'Reu'),
(100, 'Karol ', 'Vinicio', '3408753948750', '932847502', '9843-3423', 'Reu'),
(101, 'Arnulfo ', 'Gonzalez', '2304873927923', '975934280', '4322-2345', 'Quetzaltenango'),
(103, 'Karla', 'Vasquez', '3429875023945', '293847523', '3423-2345', 'Reu'),
(105, 'Omero', 'Simpson', '2034986752039', '984032958', '4534-5463', 'Reu'),
(106, 'Rodrigo', 'Perez', '4302857439573', '320485345', '3489-2345', 'Santa Rosa'),
(107, 'Angel', 'Barreno', '4563465346654', '563349234', '3253-2345', 'Retalhuleu'),
(108, 'Joel Otto', 'Torres', '3289247934853', '984375923', '4938-3949', 'Xela'),
(109, 'Katarina', 'Meduza', '1983475987105', '438795203', '3984-3434', 'Champerico'),
(111, 'Sandra', 'Torres', '1843729753758', '843975984', '3498-2323', 'Guatemala'),
(112, 'Thelma', 'Rivera', '4390810984905', '409852398', '9034-3432', 'Zacapa'),
(113, 'Esmeralda', 'Perez', '3049805239840', '049830598', '3094-3432', 'Reu'),
(114, 'Rubi', 'Camarreno', '0439348098509', '049808520', '3409-2342', 'Mazatenango'),
(115, 'Romero', 'Domingo', '2094875874837', '843975938', '3943-2343', 'Mazatenango'),
(116, 'RenÃ©', 'Gonzales', '8493473495349', '843978573', '3948-3432', 'Reu'),
(117, 'Cesar', 'Tuch', '2039580490358', '903840380', '9034-3443', 'Reu'),
(118, 'Cecilia', 'Castarofo', '9438753872582', '843795237', '9384-2342', 'Reu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `id_cuentas` int(11) NOT NULL,
  `banco_id` int(11) NOT NULL,
  `empleado_id_cuenta` int(11) DEFAULT NULL,
  `cliente_id_cuenta` int(11) NOT NULL,
  `heredarCuenta` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id_cuentas`, `banco_id`, `empleado_id_cuenta`, `cliente_id_cuenta`, `heredarCuenta`) VALUES
(1, 1, 10, 1, 'Hernesto'),
(2, 2, 10, 2, 'Porki'),
(3, 2, 10, 3, 'PapaPorki'),
(8, 2, 11, 12, 'hijoChocho'),
(20, 2, 11, 23, 'mamaachencho'),
(22, 2, 11, 28, 'hijoJorge'),
(23, 2, 11, 32, 'hijoJorge'),
(24, 2, 11, 34, 'hijoJorge'),
(25, 1, 10, 39, 'hijoLuis'),
(26, 1, 10, 40, 'hijaVanesa'),
(27, 1, 10, 41, 'porkito'),
(28, 2, 11, 42, 'hijo edy'),
(29, 1, 10, 47, 'porkinio'),
(30, 2, 11, 48, 'barth'),
(31, 2, 11, 49, 'Hijo Oscar'),
(32, 1, 10, 50, 'Juanito'),
(33, 2, 11, 52, 'Hijo unico'),
(34, 2, 11, 54, 'Hijo Ãšnico'),
(35, 2, 11, 55, 'Hijo de Ricardo'),
(36, 2, 11, 56, 'pollito'),
(37, 2, 11, 57, 'Hijo primero'),
(38, 2, 11, 59, 'hijo'),
(39, 2, 11, 60, 'hijo'),
(40, 1, 10, 61, 'Hija'),
(41, 1, 10, 62, 'Hija'),
(42, 2, 11, 63, 'Hijo'),
(43, 1, 10, 65, 'Hijo'),
(44, 1, 10, 66, 'Hijo'),
(45, 1, 10, 68, 'Hijo'),
(46, 1, 10, 70, 'Hijo'),
(47, 1, 10, 72, 'Hijo'),
(48, 1, 10, 87, 'hijo'),
(49, 1, 10, 89, 'sd'),
(50, 1, 10, 90, 'Hijo'),
(51, 1, 10, 91, 'lsd'),
(52, 1, 10, 93, 'Hijo'),
(53, 1, 10, 94, 'Hijo'),
(54, 1, 10, 98, 'lskad'),
(55, 1, 10, 99, 'Hijo'),
(56, 1, 10, 100, 'Hijo'),
(57, 1, 16, 101, 'Hijo'),
(58, 1, 10, 103, 'Hija'),
(59, 1, 10, 105, 'Jiho'),
(60, 2, 11, 106, 'Hijo'),
(61, 1, 10, 107, 'Hijo'),
(62, 1, 10, 108, 'hijo'),
(63, 1, 10, 109, 'hijo'),
(64, 1, 10, 111, 'hijo'),
(65, 1, 10, 112, 'Hija'),
(66, 1, 10, 113, 'hijo'),
(67, 1, 10, 114, 'hija'),
(68, 1, 10, 115, 'Hijo'),
(69, 1, 10, 116, 'hijoi'),
(70, 1, 10, 117, 'hijo'),
(71, 1, 10, 118, 'hjo');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `cuentaclientebanco`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `cuentaclientebanco` (
`id_cuentas` int(11)
,`numero_de_cuenta` varchar(45)
,`id_tipo_cuenta` int(11)
,`nombre_tipoCuenta` varchar(45)
,`saldo_actual` decimal(12,2)
,`id_clientes` int(11)
,`nombre` varchar(45)
,`apellido` varchar(45)
,`nombreBancoCliente` varchar(45)
,`banco_id` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `cuenta_clientes`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `cuenta_clientes` (
`id_chequeras` int(11)
,`id_clientes` int(11)
,`nombre` varchar(45)
,`apellido` varchar(45)
,`dpi` varchar(45)
,`nit` varchar(45)
,`telefono` varchar(45)
,`direccion` varchar(45)
,`hora_apertura` varchar(45)
,`fecha_apertura` varchar(45)
,`banco_id` int(11)
,`nombre_tipoCuenta` varchar(45)
,`numero_de_cuenta` varchar(45)
,`estado` int(11)
,`saldo_actual` decimal(12,2)
,`empleado_id_cuenta` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `cuenta_cliente_logueado`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `cuenta_cliente_logueado` (
`numero_de_cuenta` varchar(45)
,`nombre` varchar(45)
,`apellido` varchar(45)
,`usuario_cliente` varchar(45)
,`contrasenia_cliente` varchar(200)
,`saldo_actual` decimal(12,2)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depositos`
--

CREATE TABLE `depositos` (
  `id_deposito` int(11) NOT NULL,
  `chequera_id_deposito` int(11) NOT NULL,
  `monto_depositado` decimal(12,2) DEFAULT NULL,
  `hora_deDeposito` varchar(45) DEFAULT NULL,
  `fecha_deDeposito` varchar(45) DEFAULT NULL,
  `tipo_documento_deposito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `depositos`
--

INSERT INTO `depositos` (`id_deposito`, `chequera_id_deposito`, `monto_depositado`, `hora_deDeposito`, `fecha_deDeposito`, `tipo_documento_deposito`) VALUES
(2, 27, '50.00', '20:43:51', '02-05-2019', 1),
(3, 27, '700.00', '20:44:52', '02-05-2019', 1),
(4, 30, '600.00', '20:47:17', '02-05-2019', 1),
(5, 30, '700.00', '21:27:49', '02-05-2019', 1),
(6, 30, '500.00', '23:07:41', '02-05-2019', 1),
(7, 27, '50.00', '00:16:11', '03-05-2019', 1),
(8, 27, '50.00', '00:17:59', '03-05-2019', 1),
(9, 27, '50.00', '00:18:29', '03-05-2019', 1),
(10, 27, '50.00', '00:21:17', '03-05-2019', 1),
(11, 27, '300.00', '00:22:23', '03-05-2019', 1),
(12, 27, '4.00', '00:35:12', '03-05-2019', 1),
(13, 27, '5.00', '01:11:19', '03-05-2019', 1),
(14, 27, '10.00', '01:41:52', '03-05-2019', 1),
(15, 27, '5.00', '01:45:18', '03-05-2019', 1),
(16, 27, '50.00', '02:06:54', '03-05-2019', 1),
(17, 27, '500.00', '02:15:38', '03-05-2019', 1),
(18, 27, '500.00', '02:23:41', '03-05-2019', 1),
(19, 27, '500.00', '01:36:03', '13-05-2019', 1),
(20, 1, '75.00', '10:22:07', '14-06-2019', 1),
(21, 2, '200.00', '12:24:47', '14-06-2019', 1),
(22, 4, '7000.00', '12:30:05', '14-06-2019', 2),
(23, 27, '400.00', '20:28:07', '15-06-2019', 1),
(24, 27, '500.00', '20:31:58', '15-06-2019', 1),
(25, 27, '500.00', '20:32:55', '15-06-2019', 1),
(26, 27, '500.00', '22:30:28', '15-06-2019', 1),
(27, 27, '500.00', '22:40:20', '15-06-2019', 1),
(28, 127, '200.00', '22:55:55', '15-06-2019', 2),
(29, 127, '500.00', '22:58:26', '15-06-2019', 2),
(30, 127, '500.00', '22:59:03', '15-06-2019', 2),
(31, 127, '5000.00', '22:59:37', '15-06-2019', 2),
(32, 27, '500.00', '23:01:10', '15-06-2019', 1),
(33, 130, '1200.00', '01:33:13', '16-06-2019', 2),
(34, 130, '100.00', '01:35:49', '16-06-2019', 2),
(35, 91, '1200.00', '01:58:47', '16-06-2019', 1),
(36, 127, '4000.00', '02:02:08', '16-06-2019', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleados` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `tipoUsuario_id` int(11) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `contrasenia` varchar(200) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `banco_id_empleado` int(11) DEFAULT NULL,
  `hora_registrado` varchar(45) DEFAULT NULL,
  `fecha_registrado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleados`, `nombre`, `apellido`, `telefono`, `direccion`, `tipoUsuario_id`, `usuario`, `contrasenia`, `estado`, `banco_id_empleado`, `hora_registrado`, `fecha_registrado`) VALUES
(7, 'Tomy', 'Vargas', '3403-4353', 'Reu', 1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 2, '23:54:06', '21-04-2019'),
(10, 'Pedro Luis', 'Somosa', '3454-3453', 'Reu', 4, 'pedro', '4410d99cefe57ec2c2cdbd3f1d5cf862bb4fb6f8', 1, 1, '15:06:52', '22-04-2019'),
(11, 'Jaime Pancracio', 'Toma', '9993-2032', 'Xab, El Asintal', 4, 'jaime', 'f10ff193e4b526402f977a3c71d9e876bcfcded9', 1, 2, '01:51:42', '25-04-2019'),
(12, '', '', '', '', 1, '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 1, 1, '02:16:26', '25-04-2019'),
(13, 'Alan', 'Godinez Gonzalez', '3940-2323', 'Mazatenango', 2, 'alan', '91e38e63b890fbb214c8914809fde03c73e7f24d', 1, 1, '16:30:00', '30-04-2019'),
(14, 'Rodrigo', 'Cardona', '3029-2343', 'Retalhuleu', 2, 'rodrigo', '6dfa9cecb562e345739f2e4eb69e9ebd0fbff687', 1, 2, '20:46:38', '02-05-2019'),
(15, 'Checha', 'Vaquero', '3403-2342', 'Retalhuleu', 2, 'checha', '1da8c910181b892ff9db19912a60790f6de5b645', 1, 3, '23:10:42', '04-05-2019'),
(16, 'Denis', 'Cardona', '3429-3245', 'Retalhuleu', 4, 'denisumg', '9f339c4b510c2d0415fc33ed6e4c08441a507f8a', 1, 1, '01:50:56', '20-05-2019');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `idcuenta`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `idcuenta` (
`id_cuentas` int(11)
,`dpi` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `misaldovirtual`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `misaldovirtual` (
`nombre` varchar(45)
,`apellido` varchar(45)
,`usuario_cliente` varchar(45)
,`contrasenia_cliente` varchar(200)
,`numero_de_cuenta` varchar(45)
,`saldo_actual` decimal(12,2)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numeros_cheques`
--

CREATE TABLE `numeros_cheques` (
  `idnumeros_cheques` int(11) NOT NULL,
  `chequera_id_numCheque` int(11) DEFAULT NULL,
  `nombre_documento` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `movimiento` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `numeros_cheques`
--

INSERT INTO `numeros_cheques` (`idnumeros_cheques`, `chequera_id_numCheque`, `nombre_documento`, `estado`, `movimiento`) VALUES
(1, 127, 'Cheque', 0, 'cobrado'),
(2, 127, 'Cheque', 0, 'cobrado'),
(3, 127, 'Cheque', 0, 'cobrado'),
(4, 127, 'Cheque', 0, 'no_cobrado'),
(5, 127, 'Cheque', 1, 'no_cobrado'),
(6, 130, 'Cheque', 1, 'no_cobrado'),
(7, 130, 'Cheque', 0, 'cobrado'),
(8, 130, 'Cheque', 1, 'no_cobrado'),
(9, 130, 'Cheque', 1, 'no_cobrado'),
(10, 130, 'Cheque', 1, 'no_cobrado'),
(11, 132, 'Cheque', 1, 'no_cobrado'),
(12, 132, 'Cheque', 1, 'no_cobrado'),
(13, 132, 'Cheque', 1, 'cobrado'),
(14, 132, 'Cheque', 1, 'no_cobrado'),
(15, 132, 'Cheque', 0, 'cobrado'),
(17, 137, 'Cheque', 1, 'no_cobrado'),
(18, 137, 'Cheque', 1, 'no_cobrado'),
(19, 137, 'Cheque', 1, 'no_cobrado'),
(20, 137, 'Cheque', 1, 'no_cobrado'),
(21, 137, 'Cheque', 1, 'no_cobrado'),
(22, 139, 'Cheque', 1, 'no_cobrado'),
(23, 139, 'Cheque', 1, 'no_cobrado'),
(24, 139, 'Cheque', 1, 'no_cobrado'),
(25, 139, 'Cheque', 1, 'no_cobrado'),
(26, 139, 'Cheque', 1, 'no_cobrado'),
(27, 140, 'Cheque', 1, 'no_cobrado'),
(28, 140, 'Cheque', 1, 'no_cobrado'),
(29, 140, 'Cheque', 1, 'no_cobrado'),
(30, 140, 'Cheque', 1, 'no_cobrado'),
(31, 140, 'Cheque', 1, 'no_cobrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE `prueba` (
  `id_clientes` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `dpi` varchar(45) DEFAULT NULL,
  `nit` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `prueba`
--

INSERT INTO `prueba` (`id_clientes`, `nombre`, `apellido`, `dpi`, `nit`, `telefono`, `direccion`) VALUES
(17, '', '', '4830430384399', '', '', ''),
(18, '', '', '4830430384399', '', '', ''),
(19, '', '', '4830430384302', '', '', ''),
(20, '', '', '4830430384302', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retiros`
--

CREATE TABLE `retiros` (
  `id_retiro` int(11) NOT NULL,
  `monto_retirado` varchar(45) DEFAULT NULL,
  `cliente_id_retiro` int(11) NOT NULL,
  `chequera_id` int(11) NOT NULL,
  `hora_deRetiro` varchar(45) DEFAULT NULL,
  `fecha_deRetiro` varchar(45) DEFAULT NULL,
  `tipo_documento_retiro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `retiros`
--

INSERT INTO `retiros` (`id_retiro`, `monto_retirado`, `cliente_id_retiro`, `chequera_id`, `hora_deRetiro`, `fecha_deRetiro`, `tipo_documento_retiro`) VALUES
(1, '10', 50, 27, '02:08:27', '03-05-2019', 1),
(2, '40', 50, 27, '02:08:45', '03-05-2019', 1),
(3, '40', 50, 27, '02:16:20', '03-05-2019', 1),
(4, '460', 50, 27, '02:20:06', '03-05-2019', 1),
(5, '100', 50, 27, '02:24:06', '03-05-2019', 1),
(6, '70', 1, 1, '10:22:52', '14-06-2019', 1),
(7, '120', 55, 125, '12:25:17', '14-06-2019', 1),
(8, '2', 56, 31, '12:28:19', '14-06-2019', 1),
(9, '200', 12, 4, '12:32:22', '14-06-2019', 2),
(10, '100', 50, 27, '23:26:14', '15-06-2019', 1),
(11, '300', 108, 127, '23:28:00', '15-06-2019', 2),
(12, '100', 65, 132, '01:40:16', '16-06-2019', 2),
(13, '150', 65, 132, '01:42:46', '16-06-2019', 2),
(14, '100', 62, 91, '01:59:27', '16-06-2019', 1),
(15, '200', 108, 127, '02:01:15', '16-06-2019', 2),
(16, '5000', 108, 127, '12:02:41', '21-06-2019', 2),
(17, '100', 40, 140, '21:45:48', '24-06-2019', 2),
(18, '100', 40, 140, '22:07:01', '24-06-2019', 2),
(19, '100', 40, 140, '22:09:47', '24-06-2019', 2),
(20, '10', 40, 140, '22:58:41', '24-06-2019', 2),
(21, '10', 40, 140, '22:59:41', '24-06-2019', 2),
(22, '320', 40, 21, '23:03:39', '24-06-2019', 1),
(23, '20', 40, 21, '23:12:20', '24-06-2019', 1),
(24, '20', 40, 21, '23:15:36', '24-06-2019', 1),
(25, '20', 40, 21, '23:15:36', '24-06-2019', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta_debito`
--

CREATE TABLE `tarjeta_debito` (
  `idtarjeta_debito` int(11) NOT NULL,
  `cliente_id_tdebito` int(11) DEFAULT NULL,
  `chequera_id_tdebito` int(11) DEFAULT NULL,
  `codigo_tarjeta` varchar(45) DEFAULT NULL,
  `pin_tarjeta` varchar(200) DEFAULT NULL,
  `tipo_tarjeta` varchar(45) DEFAULT NULL,
  `hora_solicitado` varchar(45) DEFAULT NULL,
  `fecha_solicitado` varchar(45) DEFAULT NULL,
  `empleado_id_atiende` int(11) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tarjeta_debito`
--

INSERT INTO `tarjeta_debito` (`idtarjeta_debito`, `cliente_id_tdebito`, `chequera_id_tdebito`, `codigo_tarjeta`, `pin_tarjeta`, `tipo_tarjeta`, `hora_solicitado`, `fecha_solicitado`, `empleado_id_atiende`, `estado`) VALUES
(1, NULL, NULL, '57', NULL, NULL, NULL, NULL, NULL, 'Desabilitado'),
(18, 55, 30, '55720191430', 'UFQwS2ptTmdaM1V2N2FJWXlISUMvUT09', 'debito', '01:48:47', '29-05-2019', 11, 'Habilitado'),
(19, 50, 27, '5042019727', 'SGlDSXJSelFqQlV5Uk12ak9JVUs0Zz09', 'debito', '01:51:41', '29-05-2019', 10, 'Habilitado'),
(20, 40, 21, '4062019821', 'ajR2Mlo2K1F3eEVTMFhCWEZRVzg1QT09', 'debito', '21:30:36', '24-06-2019', 10, 'Habilitado'),
(21, 40, 140, '40620198140', 'MVM3L2oyQVBKWmdRUlVaaUxaTVg3QT09', 'debito', '21:42:15', '24-06-2019', 10, 'Habilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cuentas`
--

CREATE TABLE `tipo_cuentas` (
  `id_tipo_cuenta` int(11) NOT NULL,
  `nombre_tipoCuenta` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_cuentas`
--

INSERT INTO `tipo_cuentas` (`id_tipo_cuenta`, `nombre_tipoCuenta`) VALUES
(1, 'Ahorro'),
(2, 'Monetario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `idtipo_documento` int(11) NOT NULL,
  `nombre_documento` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`idtipo_documento`, `nombre_documento`) VALUES
(1, 'Boleta'),
(2, 'Cheque');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `idtipo_usuario` int(11) NOT NULL,
  `nombre_tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`idtipo_usuario`, `nombre_tipo`) VALUES
(1, 'Administrador'),
(2, 'Receptor Pagador'),
(3, 'Secretaria'),
(4, 'Servicio al Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transferencia`
--

CREATE TABLE `transferencia` (
  `Id_transferencia` int(11) NOT NULL,
  `numeroCuenta_a_transferir` varchar(45) DEFAULT NULL,
  `chequera_id_transaccion` int(11) NOT NULL,
  `monto_deTransaccion` decimal(12,2) DEFAULT NULL,
  `cliente_que_transfiere` varchar(45) DEFAULT NULL,
  `apellido_que_transfiere` varchar(45) DEFAULT NULL,
  `cuenta_transfiere` varchar(45) DEFAULT NULL,
  `hora_deTransaccion` varchar(45) DEFAULT NULL,
  `fecha_deTransaccion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `transferencia`
--

INSERT INTO `transferencia` (`Id_transferencia`, `numeroCuenta_a_transferir`, `chequera_id_transaccion`, `monto_deTransaccion`, `cliente_que_transfiere`, `apellido_que_transfiere`, `cuenta_transfiere`, `hora_deTransaccion`, `fecha_deTransaccion`) VALUES
(1, '50440202019', 27, '195.00', 'Ricardo', 'Andrade Valdaz', '55711332019', '23:39:59', '05-05-2019'),
(2, '50440202019', 27, '100.00', 'Ricardo', 'Andrade Valdaz', '55711332019', '23:42:31', '05-05-2019'),
(3, '12345678953', 1, '100.00', 'Ricardo', 'Andrade Valdaz', '55711332019', '23:43:19', '05-05-2019'),
(4, '21474836437', 4, '100.00', 'Ricardo', 'Andrade Valdaz', '55711332019', '23:49:33', '05-05-2019'),
(5, '54517502019', 29, '505.00', 'Ricardo', 'Andrade Valdaz', '55711332019', '23:50:20', '05-05-2019'),
(6, '281158312019121', 122, '50.00', 'Alan', 'Chocho', '1245752201967', '02:35:52', '23-05-2019'),
(7, '281158312019121', 122, '50.00', 'Alan', 'Chocho', '1245752201967', '02:36:51', '23-05-2019'),
(8, '1245752201967', 69, '70.00', 'Adalberto F', 'GollÃ³n', '281158312019121', '02:44:50', '23-05-2019'),
(9, '50440202019', 27, '3.00', 'Alan', 'Chocho', '1245752201967', '00:10:47', '13-06-2019'),
(10, '12345678953', 1, '7.00', 'Oscar', 'Robles', '49529322019', '00:19:41', '13-06-2019'),
(11, '50440202019', 27, '7.00', 'Oscar', 'Robles', '49529322019', '00:56:47', '13-06-2019'),
(12, '54517502019', 29, '15.00', 'Oscar', 'Robles', '49529322019', '01:17:49', '13-06-2019'),
(13, '50440202019', 27, '50.00', 'Alan', 'Chocho', '1245752201967', '01:20:35', '13-06-2019'),
(14, '50440202019', 27, '20.00', 'Alan', 'Chocho', '21474836437', '01:28:15', '13-06-2019'),
(15, '55711332019', 30, '50.00', 'Alan', 'Chocho', '21474836437', '01:28:30', '13-06-2019'),
(16, '55711332019', 30, '1000.00', 'Alan', 'Chocho', '21474836437', '01:28:47', '13-06-2019'),
(17, '12345678953', 1, '7.00', 'Alan', 'Chocho', '12455122019125', '01:32:44', '13-06-2019'),
(18, '108933332019', 127, '10.00', 'Vanesa', 'ChachÃ¡n', '40659052019', '12:06:04', '21-06-2019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_banca_virtual`
--

CREATE TABLE `usuario_banca_virtual` (
  `idusuario_banca_virtual` int(11) NOT NULL,
  `cliente_id_virtual` int(11) DEFAULT NULL,
  `chequera_id_virtual` int(11) DEFAULT NULL,
  `usuario_cliente` varchar(45) DEFAULT NULL,
  `contrasenia_cliente` varchar(200) DEFAULT NULL,
  `tipoUsu` varchar(45) DEFAULT NULL,
  `hora_solicitado` varchar(45) DEFAULT NULL,
  `fecha_solicitado` varchar(45) DEFAULT NULL,
  `empleado_id_creaSolicitud` int(11) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_banca_virtual`
--

INSERT INTO `usuario_banca_virtual` (`idusuario_banca_virtual`, `cliente_id_virtual`, `chequera_id_virtual`, `usuario_cliente`, `contrasenia_cliente`, `tipoUsu`, `hora_solicitado`, `fecha_solicitado`, `empleado_id_creaSolicitud`, `estado`) VALUES
(1, 87, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 12, 69, 'mivirtual46', 'NjdqSnlpMnpZdzlRTytLejdnWDVxQT09', 'cliente', '01:13:27', '23-05-2019', 11, 'Habilitado'),
(72, 28, 122, 'mivirtual117', 'QXozR2pxbFBaRWRKVStzc0k4d0srZz09', 'cliente', '01:19:17', '23-05-2019', 11, 'Habilitado'),
(73, 65, 116, 'mivirtual136', 'OFd4UHdzSFgvdWZyM2UrMjl2MlRaQT09', 'cliente', '02:48:45', '23-05-2019', 10, 'Habilitado'),
(74, 62, 91, 'mivirtual49', 'NFd1NTZ1SFRnSy8zbTlWMEdCNWVCUT09', 'cliente', '02:51:11', '23-05-2019', 10, 'Bloqueado'),
(75, 68, 88, 'mivirtual55', 'TkRZL0tkS2JubjJlbFQ1Und4dFIzdz09', 'cliente', '02:54:18', '23-05-2019', 10, 'Habilitado'),
(76, 40, 21, 'mivirtual68', 'REloTm1FendlYTN0RUZibXAvYUQ1dz09', 'cliente', '03:02:10', '23-05-2019', 10, 'Habilitado'),
(77, 62, 82, 'mivirtual49', 'QXV4allpb3pRYitXWDFHOGd5SUZGZz09', 'cliente', '03:26:56', '23-05-2019', 10, 'Bloqueado'),
(78, 12, 4, 'mivirtual46', 'bXpteDRESFRCUDVVTVB2elI2anZLUT09', 'cliente', '18:20:35', '25-05-2019', 11, 'Habilitado'),
(79, 49, 26, 'mivirtual56', 'R3pzNkx5VjBQZ2VzLzQ2Y2FBbkl4UT09', 'cliente', '14:06:26', '31-05-2019', 11, 'Habilitado'),
(80, 12, 126, 'mivirtual46', 'RkN6YzMvYkg1ZGRWaGFjRXJHVDNJQT09', 'cliente', '00:13:33', '13-06-2019', 11, 'Habilitado');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `visa_movimiento_cajero`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `visa_movimiento_cajero` (
`codigo_tarjeta` varchar(45)
,`Monto_Retirado` decimal(10,2)
,`Hora_Retirado` varchar(45)
,`Fecha_retirado` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_cheque_monetaria`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_cheque_monetaria` (
`id_cuentas` int(11)
,`numero_de_cuenta` varchar(45)
,`id_tipo_cuenta` int(11)
,`nombre_tipoCuenta` varchar(45)
,`saldo_actual` decimal(12,2)
,`id_clientes` int(11)
,`nombre` varchar(45)
,`apellido` varchar(45)
,`nombreBancoCliente` varchar(45)
,`banco_id` int(11)
,`numeroCheque` int(11)
,`movimiento` varchar(45)
,`idnumeros_cheques` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_depositos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_depositos` (
`nombre` varchar(45)
,`apellido` varchar(45)
,`numero_de_cuenta` varchar(45)
,`monto_depositado` decimal(12,2)
,`hora_deDeposito` varchar(45)
,`fecha_deDeposito` varchar(45)
,`nombre_documento` varchar(100)
,`banco_id` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_numeros_chequera`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_numeros_chequera` (
`estado` int(11)
,`nombre` varchar(45)
,`apellido` varchar(45)
,`numero_de_cuenta` varchar(45)
,`nombre_documento` varchar(45)
,`idnumeros_cheques` int(11)
,`nombre_banco` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_tarjeta_debito`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_tarjeta_debito` (
`codigo_tarjeta` varchar(45)
,`pin_tarjeta` varchar(200)
,`tipo_tarjeta` varchar(45)
,`nombre` varchar(45)
,`apellido` varchar(45)
,`numero_de_cuenta` varchar(45)
,`saldo_actual` decimal(12,2)
,`hora_solicitado` varchar(45)
,`fecha_solicitado` varchar(45)
,`nombre_tipoCuenta` varchar(45)
,`estado` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_usuarios_banca_virtual`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_usuarios_banca_virtual` (
`usuario_cliente` varchar(45)
,`contrasenia_cliente` varchar(200)
,`nombre` varchar(45)
,`apellido` varchar(45)
,`numero_de_cuenta` varchar(45)
,`hora_solicitado` varchar(45)
,`fecha_solicitado` varchar(45)
,`nombre_tipoCuenta` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `banco_cliente`
--
DROP TABLE IF EXISTS `banco_cliente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `banco_cliente`  AS  select `banco`.`nombre_banco` AS `nombre_banco`,`usuario_banca_virtual`.`usuario_cliente` AS `usuario_cliente` from ((((`usuario_banca_virtual` join `chequeras` on((`chequeras`.`id_chequeras` = `usuario_banca_virtual`.`chequera_id_virtual`))) join `cuenta` on((`cuenta`.`id_cuentas` = `chequeras`.`cuenta_id_chequera`))) join `clientes` on((`clientes`.`id_clientes` = `cuenta`.`cliente_id_cuenta`))) join `banco` on((`banco`.`id_banco` = `cuenta`.`banco_id`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `cuentaclientebanco`
--
DROP TABLE IF EXISTS `cuentaclientebanco`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cuentaclientebanco`  AS  select `cuenta`.`id_cuentas` AS `id_cuentas`,`chequeras`.`numero_de_cuenta` AS `numero_de_cuenta`,`tipo_cuentas`.`id_tipo_cuenta` AS `id_tipo_cuenta`,`tipo_cuentas`.`nombre_tipoCuenta` AS `nombre_tipoCuenta`,`chequeras`.`saldo_actual` AS `saldo_actual`,`clientes`.`id_clientes` AS `id_clientes`,`clientes`.`nombre` AS `nombre`,`clientes`.`apellido` AS `apellido`,`banco`.`nombre_banco` AS `nombreBancoCliente`,`cuenta`.`banco_id` AS `banco_id` from ((((`chequeras` join `cuenta` on((`cuenta`.`id_cuentas` = `chequeras`.`cuenta_id_chequera`))) join `clientes` on((`clientes`.`id_clientes` = `cuenta`.`cliente_id_cuenta`))) join `banco` on((`banco`.`id_banco` = `cuenta`.`banco_id`))) join `tipo_cuentas` on((`tipo_cuentas`.`id_tipo_cuenta` = `chequeras`.`tipo_cuentas`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `cuenta_clientes`
--
DROP TABLE IF EXISTS `cuenta_clientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cuenta_clientes`  AS  select `chequeras`.`id_chequeras` AS `id_chequeras`,`clientes`.`id_clientes` AS `id_clientes`,`clientes`.`nombre` AS `nombre`,`clientes`.`apellido` AS `apellido`,`clientes`.`dpi` AS `dpi`,`clientes`.`nit` AS `nit`,`clientes`.`telefono` AS `telefono`,`clientes`.`direccion` AS `direccion`,`chequeras`.`hora_apertura` AS `hora_apertura`,`chequeras`.`fecha_apertura` AS `fecha_apertura`,`cuenta`.`banco_id` AS `banco_id`,`tipo_cuentas`.`nombre_tipoCuenta` AS `nombre_tipoCuenta`,`chequeras`.`numero_de_cuenta` AS `numero_de_cuenta`,`chequeras`.`estado` AS `estado`,`chequeras`.`saldo_actual` AS `saldo_actual`,`cuenta`.`empleado_id_cuenta` AS `empleado_id_cuenta` from (((`chequeras` join `cuenta` on((`cuenta`.`id_cuentas` = `chequeras`.`cuenta_id_chequera`))) join `clientes` on((`clientes`.`id_clientes` = `cuenta`.`cliente_id_cuenta`))) join `tipo_cuentas` on((`tipo_cuentas`.`id_tipo_cuenta` = `chequeras`.`tipo_cuentas`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `cuenta_cliente_logueado`
--
DROP TABLE IF EXISTS `cuenta_cliente_logueado`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cuenta_cliente_logueado`  AS  select `chequeras`.`numero_de_cuenta` AS `numero_de_cuenta`,`clientes`.`nombre` AS `nombre`,`clientes`.`apellido` AS `apellido`,`usuario_banca_virtual`.`usuario_cliente` AS `usuario_cliente`,`usuario_banca_virtual`.`contrasenia_cliente` AS `contrasenia_cliente`,`chequeras`.`saldo_actual` AS `saldo_actual` from (((`usuario_banca_virtual` join `chequeras` on((`chequeras`.`id_chequeras` = `usuario_banca_virtual`.`chequera_id_virtual`))) join `cuenta` on((`cuenta`.`id_cuentas` = `chequeras`.`cuenta_id_chequera`))) join `clientes` on((`clientes`.`id_clientes` = `cuenta`.`cliente_id_cuenta`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `idcuenta`
--
DROP TABLE IF EXISTS `idcuenta`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `idcuenta`  AS  select `cuenta`.`id_cuentas` AS `id_cuentas`,`clientes`.`dpi` AS `dpi` from (`cuenta` join `clientes` on((`clientes`.`id_clientes` = `cuenta`.`cliente_id_cuenta`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `misaldovirtual`
--
DROP TABLE IF EXISTS `misaldovirtual`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `misaldovirtual`  AS  select `clientes`.`nombre` AS `nombre`,`clientes`.`apellido` AS `apellido`,`usuario_banca_virtual`.`usuario_cliente` AS `usuario_cliente`,`usuario_banca_virtual`.`contrasenia_cliente` AS `contrasenia_cliente`,`chequeras`.`numero_de_cuenta` AS `numero_de_cuenta`,`chequeras`.`saldo_actual` AS `saldo_actual` from ((`usuario_banca_virtual` join `chequeras` on((`chequeras`.`id_chequeras` = `usuario_banca_virtual`.`chequera_id_virtual`))) join `clientes` on((`clientes`.`id_clientes` = `usuario_banca_virtual`.`cliente_id_virtual`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `visa_movimiento_cajero`
--
DROP TABLE IF EXISTS `visa_movimiento_cajero`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `visa_movimiento_cajero`  AS  select `tarjeta_debito`.`codigo_tarjeta` AS `codigo_tarjeta`,`cajero_automatico`.`monto_retirar` AS `Monto_Retirado`,`cajero_automatico`.`hora_cajero` AS `Hora_Retirado`,`cajero_automatico`.`fecha_cajero` AS `Fecha_retirado` from (`cajero_automatico` join `tarjeta_debito` on((`tarjeta_debito`.`idtarjeta_debito` = `cajero_automatico`.`tarjetaDebito_id_cajero`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_cheque_monetaria`
--
DROP TABLE IF EXISTS `vista_cheque_monetaria`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_cheque_monetaria`  AS  select `cuenta`.`id_cuentas` AS `id_cuentas`,`chequeras`.`numero_de_cuenta` AS `numero_de_cuenta`,`tipo_cuentas`.`id_tipo_cuenta` AS `id_tipo_cuenta`,`tipo_cuentas`.`nombre_tipoCuenta` AS `nombre_tipoCuenta`,`chequeras`.`saldo_actual` AS `saldo_actual`,`clientes`.`id_clientes` AS `id_clientes`,`clientes`.`nombre` AS `nombre`,`clientes`.`apellido` AS `apellido`,`banco`.`nombre_banco` AS `nombreBancoCliente`,`cuenta`.`banco_id` AS `banco_id`,`numeros_cheques`.`idnumeros_cheques` AS `numeroCheque`,`numeros_cheques`.`movimiento` AS `movimiento`,`numeros_cheques`.`idnumeros_cheques` AS `idnumeros_cheques` from (((((`numeros_cheques` join `chequeras` on((`chequeras`.`id_chequeras` = `numeros_cheques`.`chequera_id_numCheque`))) join `cuenta` on((`cuenta`.`id_cuentas` = `chequeras`.`cuenta_id_chequera`))) join `clientes` on((`clientes`.`id_clientes` = `cuenta`.`cliente_id_cuenta`))) join `banco` on((`banco`.`id_banco` = `cuenta`.`banco_id`))) join `tipo_cuentas` on((`tipo_cuentas`.`id_tipo_cuenta` = `chequeras`.`tipo_cuentas`))) where (`numeros_cheques`.`movimiento` = 'no_cobrado') ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_depositos`
--
DROP TABLE IF EXISTS `vista_depositos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_depositos`  AS  select `clientes`.`nombre` AS `nombre`,`clientes`.`apellido` AS `apellido`,`chequeras`.`numero_de_cuenta` AS `numero_de_cuenta`,`depositos`.`monto_depositado` AS `monto_depositado`,`depositos`.`hora_deDeposito` AS `hora_deDeposito`,`depositos`.`fecha_deDeposito` AS `fecha_deDeposito`,`tipo_documento`.`nombre_documento` AS `nombre_documento`,`cuenta`.`banco_id` AS `banco_id` from ((((`depositos` join `chequeras` on((`chequeras`.`id_chequeras` = `depositos`.`chequera_id_deposito`))) join `cuenta` on((`cuenta`.`id_cuentas` = `chequeras`.`cuenta_id_chequera`))) join `clientes` on((`clientes`.`id_clientes` = `cuenta`.`cliente_id_cuenta`))) join `tipo_documento` on((`tipo_documento`.`idtipo_documento` = `depositos`.`tipo_documento_deposito`))) order by `depositos`.`fecha_deDeposito` desc ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_numeros_chequera`
--
DROP TABLE IF EXISTS `vista_numeros_chequera`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_numeros_chequera`  AS  select `numeros_cheques`.`estado` AS `estado`,`clientes`.`nombre` AS `nombre`,`clientes`.`apellido` AS `apellido`,`chequeras`.`numero_de_cuenta` AS `numero_de_cuenta`,`numeros_cheques`.`nombre_documento` AS `nombre_documento`,`numeros_cheques`.`idnumeros_cheques` AS `idnumeros_cheques`,`banco`.`nombre_banco` AS `nombre_banco` from ((((`numeros_cheques` join `chequeras` on((`chequeras`.`id_chequeras` = `numeros_cheques`.`chequera_id_numCheque`))) join `cuenta` on((`cuenta`.`id_cuentas` = `chequeras`.`cuenta_id_chequera`))) join `clientes` on((`clientes`.`id_clientes` = `cuenta`.`cliente_id_cuenta`))) join `banco` on((`banco`.`id_banco` = `cuenta`.`banco_id`))) where (`numeros_cheques`.`estado` = 1) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_tarjeta_debito`
--
DROP TABLE IF EXISTS `vista_tarjeta_debito`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_tarjeta_debito`  AS  select `tarjeta_debito`.`codigo_tarjeta` AS `codigo_tarjeta`,`tarjeta_debito`.`pin_tarjeta` AS `pin_tarjeta`,`tarjeta_debito`.`tipo_tarjeta` AS `tipo_tarjeta`,`clientes`.`nombre` AS `nombre`,`clientes`.`apellido` AS `apellido`,`chequeras`.`numero_de_cuenta` AS `numero_de_cuenta`,`chequeras`.`saldo_actual` AS `saldo_actual`,`tarjeta_debito`.`hora_solicitado` AS `hora_solicitado`,`tarjeta_debito`.`fecha_solicitado` AS `fecha_solicitado`,`tipo_cuentas`.`nombre_tipoCuenta` AS `nombre_tipoCuenta`,`tarjeta_debito`.`estado` AS `estado` from (((`tarjeta_debito` join `chequeras` on((`chequeras`.`id_chequeras` = `tarjeta_debito`.`chequera_id_tdebito`))) join `clientes` on((`clientes`.`id_clientes` = `tarjeta_debito`.`cliente_id_tdebito`))) join `tipo_cuentas` on((`tipo_cuentas`.`id_tipo_cuenta` = `chequeras`.`tipo_cuentas`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_usuarios_banca_virtual`
--
DROP TABLE IF EXISTS `vista_usuarios_banca_virtual`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_usuarios_banca_virtual`  AS  select `usuario_banca_virtual`.`usuario_cliente` AS `usuario_cliente`,`usuario_banca_virtual`.`contrasenia_cliente` AS `contrasenia_cliente`,`clientes`.`nombre` AS `nombre`,`clientes`.`apellido` AS `apellido`,`chequeras`.`numero_de_cuenta` AS `numero_de_cuenta`,`usuario_banca_virtual`.`hora_solicitado` AS `hora_solicitado`,`usuario_banca_virtual`.`fecha_solicitado` AS `fecha_solicitado`,`tipo_cuentas`.`nombre_tipoCuenta` AS `nombre_tipoCuenta` from (((`usuario_banca_virtual` join `chequeras` on((`chequeras`.`id_chequeras` = `usuario_banca_virtual`.`chequera_id_virtual`))) join `clientes` on((`clientes`.`id_clientes` = `usuario_banca_virtual`.`cliente_id_virtual`))) join `tipo_cuentas` on((`tipo_cuentas`.`id_tipo_cuenta` = `chequeras`.`tipo_cuentas`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banco`
--
ALTER TABLE `banco`
  ADD PRIMARY KEY (`id_banco`);

--
-- Indices de la tabla `bitacora_inicio`
--
ALTER TABLE `bitacora_inicio`
  ADD PRIMARY KEY (`idbitacora`),
  ADD KEY `chequeras_bitacora_idx` (`chequeras_id_bitacoraInicio`),
  ADD KEY `chequeNull_bitacora_idx` (`chequesAnulados_id_bitacoraInicio`),
  ADD KEY `retiros_bitacora_idx` (`retiro_id_bitacoraInicio`),
  ADD KEY `deposito_bitacora_idx` (`deposito_id_bitacoraInicio`),
  ADD KEY `empleado_id_bitacoraInicio_idx` (`empleado_id_bitacoraInicio`),
  ADD KEY `transferencia_bitacoraIni_idx` (`transferenciaId_bitacoraInicio`);

--
-- Indices de la tabla `cajero_automatico`
--
ALTER TABLE `cajero_automatico`
  ADD PRIMARY KEY (`idcajero_automatico`),
  ADD KEY `tarjeatadebito_id_idx` (`tarjetaDebito_id_cajero`);

--
-- Indices de la tabla `chequeras`
--
ALTER TABLE `chequeras`
  ADD PRIMARY KEY (`id_chequeras`),
  ADD UNIQUE KEY `numero_de_cuenta_UNIQUE` (`numero_de_cuenta`),
  ADD KEY `fk_chequeras_cuenta1_idx` (`cuenta_id_chequera`),
  ADD KEY `tipo_cuenta_id_idx` (`tipo_cuentas`);

--
-- Indices de la tabla `cheques_anulados`
--
ALTER TABLE `cheques_anulados`
  ADD PRIMARY KEY (`idcheques_anulados`),
  ADD KEY `fk_cheques:anulados_cuenta1_idx` (`cuenta_id_cheq_null`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_clientes`),
  ADD UNIQUE KEY `dpi_UNIQUE` (`dpi`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id_cuentas`),
  ADD KEY `bank_id_idx` (`banco_id`),
  ADD KEY `client_id_idx` (`cliente_id_cuenta`),
  ADD KEY `emplead_id_cuenta_idx` (`empleado_id_cuenta`);

--
-- Indices de la tabla `depositos`
--
ALTER TABLE `depositos`
  ADD PRIMARY KEY (`id_deposito`),
  ADD KEY `deposito_transferencia_idx` (`chequera_id_deposito`),
  ADD KEY `tip_docu_deposito_idx` (`tipo_documento_deposito`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleados`),
  ADD UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  ADD KEY `tipo_usu_idx` (`tipoUsuario_id`),
  ADD KEY `bank_id_emp_idx` (`banco_id_empleado`);

--
-- Indices de la tabla `numeros_cheques`
--
ALTER TABLE `numeros_cheques`
  ADD PRIMARY KEY (`idnumeros_cheques`),
  ADD KEY `chequera_id_numcheque_idx` (`chequera_id_numCheque`);

--
-- Indices de la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`id_clientes`);

--
-- Indices de la tabla `retiros`
--
ALTER TABLE `retiros`
  ADD PRIMARY KEY (`id_retiro`),
  ADD KEY `cliente_id_ret_idx` (`cliente_id_retiro`),
  ADD KEY `chequ_id_idx` (`chequera_id`),
  ADD KEY `tipo_doc_ret_idx` (`tipo_documento_retiro`);

--
-- Indices de la tabla `tarjeta_debito`
--
ALTER TABLE `tarjeta_debito`
  ADD PRIMARY KEY (`idtarjeta_debito`),
  ADD KEY `cliente_ditarjetadebito_idx` (`cliente_id_tdebito`),
  ADD KEY `chequera_idtarjetadebito_idx` (`chequera_id_tdebito`),
  ADD KEY `empleadoAtiende_idtarjetadebito_idx` (`empleado_id_atiende`);

--
-- Indices de la tabla `tipo_cuentas`
--
ALTER TABLE `tipo_cuentas`
  ADD PRIMARY KEY (`id_tipo_cuenta`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`idtipo_documento`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`idtipo_usuario`);

--
-- Indices de la tabla `transferencia`
--
ALTER TABLE `transferencia`
  ADD PRIMARY KEY (`Id_transferencia`),
  ADD KEY `chequera_trans_idx` (`chequera_id_transaccion`);

--
-- Indices de la tabla `usuario_banca_virtual`
--
ALTER TABLE `usuario_banca_virtual`
  ADD PRIMARY KEY (`idusuario_banca_virtual`),
  ADD KEY `cliente_virtual1_idx` (`cliente_id_virtual`),
  ADD KEY `chequera_virtual1_idx` (`chequera_id_virtual`),
  ADD KEY `empleado_virtual1_idx` (`empleado_id_creaSolicitud`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banco`
--
ALTER TABLE `banco`
  MODIFY `id_banco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `bitacora_inicio`
--
ALTER TABLE `bitacora_inicio`
  MODIFY `idbitacora` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cajero_automatico`
--
ALTER TABLE `cajero_automatico`
  MODIFY `idcajero_automatico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `chequeras`
--
ALTER TABLE `chequeras`
  MODIFY `id_chequeras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT de la tabla `cheques_anulados`
--
ALTER TABLE `cheques_anulados`
  MODIFY `idcheques_anulados` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_clientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id_cuentas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT de la tabla `depositos`
--
ALTER TABLE `depositos`
  MODIFY `id_deposito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `numeros_cheques`
--
ALTER TABLE `numeros_cheques`
  MODIFY `idnumeros_cheques` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `prueba`
--
ALTER TABLE `prueba`
  MODIFY `id_clientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `retiros`
--
ALTER TABLE `retiros`
  MODIFY `id_retiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `tarjeta_debito`
--
ALTER TABLE `tarjeta_debito`
  MODIFY `idtarjeta_debito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `tipo_cuentas`
--
ALTER TABLE `tipo_cuentas`
  MODIFY `id_tipo_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `idtipo_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `idtipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `transferencia`
--
ALTER TABLE `transferencia`
  MODIFY `Id_transferencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `usuario_banca_virtual`
--
ALTER TABLE `usuario_banca_virtual`
  MODIFY `idusuario_banca_virtual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora_inicio`
--
ALTER TABLE `bitacora_inicio`
  ADD CONSTRAINT `chequeNull_bitacora` FOREIGN KEY (`chequesAnulados_id_bitacoraInicio`) REFERENCES `cheques_anulados` (`idcheques_anulados`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `chequeras_bitacora` FOREIGN KEY (`chequeras_id_bitacoraInicio`) REFERENCES `chequeras` (`id_chequeras`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `deposito_bitacora` FOREIGN KEY (`deposito_id_bitacoraInicio`) REFERENCES `depositos` (`id_deposito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `empleado_id_bitacoraInicio` FOREIGN KEY (`empleado_id_bitacoraInicio`) REFERENCES `empleado` (`id_empleados`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `retiros_bitacora` FOREIGN KEY (`retiro_id_bitacoraInicio`) REFERENCES `retiros` (`id_retiro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `transferencia_bitacoraIni` FOREIGN KEY (`transferenciaId_bitacoraInicio`) REFERENCES `transferencia` (`Id_transferencia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cajero_automatico`
--
ALTER TABLE `cajero_automatico`
  ADD CONSTRAINT `tarjeatadebito_id` FOREIGN KEY (`tarjetaDebito_id_cajero`) REFERENCES `tarjeta_debito` (`idtarjeta_debito`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `chequeras`
--
ALTER TABLE `chequeras`
  ADD CONSTRAINT `fk_chequeras_cuenta1` FOREIGN KEY (`cuenta_id_chequera`) REFERENCES `cuenta` (`id_cuentas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tipo_cuenta_id` FOREIGN KEY (`tipo_cuentas`) REFERENCES `tipo_cuentas` (`id_tipo_cuenta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cheques_anulados`
--
ALTER TABLE `cheques_anulados`
  ADD CONSTRAINT `fk_cheques_anulados_cuenta1` FOREIGN KEY (`cuenta_id_cheq_null`) REFERENCES `cuenta` (`id_cuentas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `bank_id` FOREIGN KEY (`banco_id`) REFERENCES `banco` (`id_banco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `client_id` FOREIGN KEY (`cliente_id_cuenta`) REFERENCES `clientes` (`id_clientes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `emplead_id_cuenta` FOREIGN KEY (`empleado_id_cuenta`) REFERENCES `empleado` (`id_empleados`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `depositos`
--
ALTER TABLE `depositos`
  ADD CONSTRAINT `deposito_mi_cuenta` FOREIGN KEY (`chequera_id_deposito`) REFERENCES `chequeras` (`id_chequeras`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tip_docu_deposito` FOREIGN KEY (`tipo_documento_deposito`) REFERENCES `tipo_documento` (`idtipo_documento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `bank_id_emp` FOREIGN KEY (`banco_id_empleado`) REFERENCES `banco` (`id_banco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tipo_usu` FOREIGN KEY (`tipoUsuario_id`) REFERENCES `tipo_usuario` (`idtipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `numeros_cheques`
--
ALTER TABLE `numeros_cheques`
  ADD CONSTRAINT `chequera_id_numcheque` FOREIGN KEY (`chequera_id_numCheque`) REFERENCES `chequeras` (`id_chequeras`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `retiros`
--
ALTER TABLE `retiros`
  ADD CONSTRAINT `chequ_id` FOREIGN KEY (`chequera_id`) REFERENCES `chequeras` (`id_chequeras`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cliente_id_ret` FOREIGN KEY (`cliente_id_retiro`) REFERENCES `clientes` (`id_clientes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tipo_doc_ret` FOREIGN KEY (`tipo_documento_retiro`) REFERENCES `tipo_documento` (`idtipo_documento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tarjeta_debito`
--
ALTER TABLE `tarjeta_debito`
  ADD CONSTRAINT `chequera_idtarjetadebito` FOREIGN KEY (`chequera_id_tdebito`) REFERENCES `chequeras` (`id_chequeras`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cliente_ditarjetadebito` FOREIGN KEY (`cliente_id_tdebito`) REFERENCES `clientes` (`id_clientes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `empleadoAtiende_idtarjetadebito` FOREIGN KEY (`empleado_id_atiende`) REFERENCES `empleado` (`id_empleados`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `transferencia`
--
ALTER TABLE `transferencia`
  ADD CONSTRAINT `chequera_trans` FOREIGN KEY (`chequera_id_transaccion`) REFERENCES `chequeras` (`id_chequeras`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_banca_virtual`
--
ALTER TABLE `usuario_banca_virtual`
  ADD CONSTRAINT `chequera_virtual1` FOREIGN KEY (`chequera_id_virtual`) REFERENCES `chequeras` (`id_chequeras`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cliente_virtual1` FOREIGN KEY (`cliente_id_virtual`) REFERENCES `clientes` (`id_clientes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `empleado_virtual1` FOREIGN KEY (`empleado_id_creaSolicitud`) REFERENCES `empleado` (`id_empleados`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
