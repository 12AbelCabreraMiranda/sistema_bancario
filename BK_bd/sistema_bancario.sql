-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2019 a las 09:40:11
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
(3, 'Banco G&T', '3453-2343', '34324-6');

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
-- Estructura de tabla para la tabla `chequeras`
--

CREATE TABLE `chequeras` (
  `id_chequeras` int(11) NOT NULL,
  `numero_de_cuenta` varchar(45) DEFAULT NULL,
  `saldo_actual` decimal(12,2) DEFAULT NULL,
  `cuenta_id_chequera` int(11) NOT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `chequeras`
--

INSERT INTO `chequeras` (`id_chequeras`, `numero_de_cuenta`, `saldo_actual`, `cuenta_id_chequera`, `estado`) VALUES
(1, '12345678953', '9100.00', 1, 1),
(2, '65765456265', '6000.00', 2, 1),
(3, '99999999559', '150.00', 3, 1),
(4, '21474836437', '7200.00', 8, 1),
(15, '67676767444', '100.00', 20, 1),
(17, '93929292954', '100.00', 22, 1),
(19, '93929292927', '100.00', 24, 1),
(20, '39451572019', '100.00', 25, 1),
(21, '40659052019', '100.00', 26, 1),
(22, '41544042019', '100.00', 27, 0),
(23, '42339272019', '100.00', 28, 1),
(24, '47535292019', '2100.00', 29, 1),
(25, '48739112019', '100.00', 30, 1),
(26, '49529322019', '100.00', 31, 1),
(27, '50440202019', '1200.00', 32, 1),
(28, '52626372019', '100.00', 33, 1),
(29, '54517502019', '1605.00', 34, 1),
(30, '55711332019', '4000.00', 35, 1),
(31, '56506252019', '3600.00', 36, 1),
(32, '57531002019', '980.00', 37, 1);

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
  `direccion` varchar(45) DEFAULT NULL,
  `usuario_cliente` varchar(45) DEFAULT NULL,
  `contrasenia_cliente` varchar(200) DEFAULT NULL,
  `tipoUsu` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_clientes`, `nombre`, `apellido`, `dpi`, `nit`, `telefono`, `direccion`, `usuario_cliente`, `contrasenia_cliente`, `tipoUsu`) VALUES
(1, 'Bernardo', 'Sales', '345343434', '345434-2', '4554-4534', 'Retalhuleu', 'berna', 'S0VzZnJQOG9sVStpLzEvYXhjMHpaQT09', 'cliente'),
(2, 'Leonardo', 'Rotosa', '4336324523', '435323-2', '4353-3453', 'Retalhuleu', 'leonardo', 'c0pXZEhlaGJXZ295ODRaUjdUaEVTUT09', 'cliente'),
(3, 'Felipe', 'GarcÃ­a', '435235232', '34532-1', '3452-3452', 'San Andres', 'felipe', 'SWFoTFZ1M3JNT2tiM3BTQUJqUVk2QT09', 'cliente'),
(12, 'Alan', 'Chocho', '098765443218', '12335', '8584-3949', 'San Carlos', 'alan', 'WFI3VUFIS2E3V0VTZEJrVkh4NUxCZz09', 'cliente'),
(23, 'Chenchos', 'Vargas', '8878787878', '39838', '3837-2323', 'Reu', 'chencho', 'ZzdEZVFhM0k1N00zTkVNYWtPdHNhZz09', 'cliente'),
(28, 'Adalberto', 'GollÃ³n', '12345612', '234', '4949-3333', 'Reu', 'adalberto', 'ZWVtTWlSbERQQjN3UVllM2dVWEpidz09', 'cliente'),
(32, 'Jorge', 'Yobani', '123456122', '234', '4949-3333', 'Reu', 'jorge2', 'jorge', 'cliente'),
(34, 'Jorge', 'Yobani', '1234561229', '234', '4949-3333', 'Reu', 'jorge29', 'dmZlSEdBK0NtOTV3dTMvcDBCTUlOUT09', 'cliente'),
(39, 'Luis', 'Salvatorres', '123456789123', '35643-3', '0398-2398', 'San Andres', 'luis', 'Zm05WHdMV1I4WXFtVkRTTGNySlFvUT09', 'cliente'),
(40, 'Vanesa', 'ChachÃ¡n', '123456789987', '43938-2', '3402-3223', 'Reu', 'vanesa', 'NWszbmMwZTFKYTc1OG0vWlBGSmZvQT09', 'cliente'),
(41, 'Marlon', 'Gallaz', '193823949', '40930-23', '3029-3223', 'Retalhuleu', 'marlon', 'eHVvYkRqWGFUYzQ4NytnTm04b3hpUT09', 'cliente'),
(42, 'Eddy', 'Ramos', '838383939', '394893-1', '9493-2343', 'Retalhuleu', 'edy', 'R2dmeU1ZQTJjQTZSQkZCV3RDV0VKUT09', 'cliente'),
(47, 'Porki', 'porkitos', '543564454', '5465456', '2823-3333', 'Caballo Blanco', 'porkis', 'V1JscEVYS2IxNnR0aWJoVGdNbExQdz09', 'cliente'),
(48, 'Simpsons', 'Omero', '94302093202', '09230-2', '3200-2323', 'San Sebastian', 'omero', 'QkZmQ0NzWEp2dmozMnE3ZHRNajZjUT09', 'cliente'),
(49, 'Oscar', 'Robles', '3403920223', '32525-2', '0343-2342', 'Retalhuleu', 'oscar', 'TkVRai80VGhEanVKNWx0MStHWW9Jdz09', 'cliente'),
(50, 'Juan', 'Barrote', '9348394892389', '304538503', '3489-2323', 'San Carlos', 'juan', 'UVhldFFBODVldHlKQmFvRE9BakM2QT09', 'cliente'),
(52, 'Andres', 'Sepeda', '0293849382390', '094303020', '0493-2342', 'El Palmar', 'andres', 'Snd1NUtSM0p2OHRTenJMb0VLMi9YQT09', 'cliente'),
(54, 'Elena', 'Gonzalez Romeo', '0192839287292', '398229019', '8480-3423', 'Caballo Blanco', 'elena', 'QmFMejJlTVpDclJrT3FXRTBGZFJKUT09', 'cliente'),
(55, 'Ricardo', 'Andrade Valdaz', '3409302384384', '302485342', '0398-3453', 'El Palmar', 'ricardo', 'Y1JPQ0EvQmc1R1JiZ3d3UC9TU0Z0dz09', 'cliente'),
(56, 'Pollo', 'pollitoBlanco', '3023924829923', '239402842', '3092-3432', 'El Asintal', 'pollo', 'UzU5T0FMTWtodk1GMkwwUG05bE9NUT09', 'cliente'),
(57, 'Elder', 'Conosa', '3923230942739', '304930239', '4933-4343', 'San Carlos', 'elder', 'MU1ocUFmc1dnQWxoZG1zVXFHeEVxdz09', 'cliente');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `cliente_logueadotransferencia`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `cliente_logueadotransferencia` (
`numero_de_cuenta` varchar(45)
,`id_clientes` int(11)
,`nombre` varchar(45)
,`apellido` varchar(45)
,`usuario_cliente` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `id_cuentas` int(11) NOT NULL,
  `banco_id` int(11) NOT NULL,
  `hora_apertura` varchar(45) DEFAULT NULL,
  `fecha_apertura` varchar(45) DEFAULT NULL,
  `tipo_cuentas` int(11) NOT NULL,
  `empleado_id_cuenta` int(11) DEFAULT NULL,
  `cliente_id_cuenta` int(11) NOT NULL,
  `heredarCuenta` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id_cuentas`, `banco_id`, `hora_apertura`, `fecha_apertura`, `tipo_cuentas`, `empleado_id_cuenta`, `cliente_id_cuenta`, `heredarCuenta`) VALUES
(1, 1, '23:20:21', '22-04-2019', 1, 10, 1, 'Hernesto'),
(2, 2, '01:29:21', '24-04-2019', 2, 10, 2, 'Porki'),
(3, 2, '16:19:21', '24-04-2019', 2, 10, 3, 'PapaPorki'),
(8, 2, '11:03:34', '26-04-2019', 1, 11, 12, 'hijoChocho'),
(20, 2, '12:53:54', '26-04-2019', 1, 11, 23, 'mamaachencho'),
(22, 2, '13:22:33', '26-04-2019', 1, 11, 28, 'hijoJorge'),
(23, 2, '13:28:01', '26-04-2019', 1, 11, 32, 'hijoJorge'),
(24, 2, '13:32:28', '26-04-2019', 1, 11, 34, 'hijoJorge'),
(25, 1, '14:57:51', '26-04-2019', 1, 10, 39, 'hijoLuis'),
(26, 1, '15:05:59', '26-04-2019', 1, 10, 40, 'hijaVanesa'),
(27, 1, '17:04:44', '26-04-2019', 1, 10, 41, 'porkito'),
(28, 2, '18:27:39', '26-04-2019', 1, 11, 42, 'hijo edy'),
(29, 1, '18:29:35', '26-04-2019', 1, 10, 47, 'porkinio'),
(30, 2, '17:11:38', '27-04-2019', 1, 11, 48, 'barth'),
(31, 2, '21:32:29', '27-04-2019', 1, 11, 49, 'Hijo Oscar'),
(32, 1, '00:20:40', '28-04-2019', 1, 10, 50, 'Juanito'),
(33, 2, '01:37:26', '28-04-2019', 1, 11, 52, 'Hijo unico'),
(34, 2, '01:50:17', '28-04-2019', 1, 11, 54, 'Hijo Ãšnico'),
(35, 2, '18:33:11', '28-04-2019', 1, 11, 55, 'Hijo de Ricardo'),
(36, 2, '00:25:05', '05-05-2019', 1, 11, 56, 'pollito'),
(37, 2, '01:00:31', '13-05-2019', 1, 11, 57, 'Hijo primero');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `cuentaclientebanco`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `cuentaclientebanco` (
`id_cuentas` int(11)
,`numero_de_cuenta` varchar(45)
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
,`usuario_cliente` varchar(45)
,`contrasenia_cliente` varchar(200)
,`hora_apertura` varchar(45)
,`fecha_apertura` varchar(45)
,`banco_id` int(11)
,`nombre_tipoCuenta` varchar(45)
,`numero_de_cuenta` varchar(45)
,`estado` int(11)
,`saldo_actual` decimal(12,2)
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
(19, 27, '500.00', '01:36:03', '13-05-2019', 1);

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
(10, 'Pedro Luis', 'Somosa', '3454-3453', 'Reu', 4, 'ledro', '4410d99cefe57ec2c2cdbd3f1d5cf862bb4fb6f8', 1, 1, '15:06:52', '22-04-2019'),
(11, 'Jaime Pancracio', 'Toma', '9993-2032', 'Xab, El Asintal', 4, 'jaime', 'f10ff193e4b526402f977a3c71d9e876bcfcded9', 1, 2, '01:51:42', '25-04-2019'),
(12, '', '', '', '', 1, '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 1, 1, '02:16:26', '25-04-2019'),
(13, 'Alan', 'Godinez Gonzalez', '3940-2323', 'Mazatenango', 2, 'alan', '91e38e63b890fbb214c8914809fde03c73e7f24d', 1, 1, '16:30:00', '30-04-2019'),
(14, 'Rodrigo', 'Cardona', '3029-2343', 'Retalhuleu', 2, 'rodrigo', '6dfa9cecb562e345739f2e4eb69e9ebd0fbff687', 1, 2, '20:46:38', '02-05-2019'),
(15, 'Checha', 'Vaquero', '3403-2342', 'Retalhuleu', 2, 'checha', '1da8c910181b892ff9db19912a60790f6de5b645', 1, 3, '23:10:42', '04-05-2019');

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
(5, '100', 50, 27, '02:24:06', '03-05-2019', 1);

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
(5, '54517502019', 29, '505.00', 'Ricardo', 'Andrade Valdaz', '55711332019', '23:50:20', '05-05-2019');

-- --------------------------------------------------------

--
-- Estructura para la vista `banco_cliente`
--
DROP TABLE IF EXISTS `banco_cliente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `banco_cliente`  AS  select `banco`.`nombre_banco` AS `nombre_banco`,`clientes`.`usuario_cliente` AS `usuario_cliente` from ((`cuenta` join `clientes` on((`clientes`.`id_clientes` = `cuenta`.`cliente_id_cuenta`))) join `banco` on((`banco`.`id_banco` = `cuenta`.`banco_id`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `cliente_logueadotransferencia`
--
DROP TABLE IF EXISTS `cliente_logueadotransferencia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cliente_logueadotransferencia`  AS  select `chequeras`.`numero_de_cuenta` AS `numero_de_cuenta`,`clientes`.`id_clientes` AS `id_clientes`,`clientes`.`nombre` AS `nombre`,`clientes`.`apellido` AS `apellido`,`clientes`.`usuario_cliente` AS `usuario_cliente` from ((`chequeras` join `cuenta` on((`cuenta`.`id_cuentas` = `chequeras`.`cuenta_id_chequera`))) join `clientes` on((`clientes`.`id_clientes` = `cuenta`.`cliente_id_cuenta`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `cuentaclientebanco`
--
DROP TABLE IF EXISTS `cuentaclientebanco`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cuentaclientebanco`  AS  select `cuenta`.`id_cuentas` AS `id_cuentas`,`chequeras`.`numero_de_cuenta` AS `numero_de_cuenta`,`clientes`.`id_clientes` AS `id_clientes`,`clientes`.`nombre` AS `nombre`,`clientes`.`apellido` AS `apellido`,`banco`.`nombre_banco` AS `nombreBancoCliente`,`cuenta`.`banco_id` AS `banco_id` from (((`chequeras` join `cuenta` on((`cuenta`.`id_cuentas` = `chequeras`.`cuenta_id_chequera`))) join `clientes` on((`clientes`.`id_clientes` = `cuenta`.`cliente_id_cuenta`))) join `banco` on((`banco`.`id_banco` = `cuenta`.`banco_id`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `cuenta_clientes`
--
DROP TABLE IF EXISTS `cuenta_clientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cuenta_clientes`  AS  select `chequeras`.`id_chequeras` AS `id_chequeras`,`clientes`.`id_clientes` AS `id_clientes`,`clientes`.`nombre` AS `nombre`,`clientes`.`apellido` AS `apellido`,`clientes`.`dpi` AS `dpi`,`clientes`.`nit` AS `nit`,`clientes`.`telefono` AS `telefono`,`clientes`.`direccion` AS `direccion`,`clientes`.`usuario_cliente` AS `usuario_cliente`,`clientes`.`contrasenia_cliente` AS `contrasenia_cliente`,`cuenta`.`hora_apertura` AS `hora_apertura`,`cuenta`.`fecha_apertura` AS `fecha_apertura`,`cuenta`.`banco_id` AS `banco_id`,`tipo_cuentas`.`nombre_tipoCuenta` AS `nombre_tipoCuenta`,`chequeras`.`numero_de_cuenta` AS `numero_de_cuenta`,`chequeras`.`estado` AS `estado`,`chequeras`.`saldo_actual` AS `saldo_actual` from (((`chequeras` join `cuenta` on((`cuenta`.`id_cuentas` = `chequeras`.`cuenta_id_chequera`))) join `tipo_cuentas` on((`tipo_cuentas`.`id_tipo_cuenta` = `cuenta`.`tipo_cuentas`))) join `clientes` on((`clientes`.`id_clientes` = `cuenta`.`cliente_id_cuenta`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `cuenta_cliente_logueado`
--
DROP TABLE IF EXISTS `cuenta_cliente_logueado`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cuenta_cliente_logueado`  AS  select `chequeras`.`numero_de_cuenta` AS `numero_de_cuenta`,`clientes`.`nombre` AS `nombre`,`clientes`.`apellido` AS `apellido`,`clientes`.`usuario_cliente` AS `usuario_cliente`,`chequeras`.`saldo_actual` AS `saldo_actual` from ((`chequeras` join `cuenta` on((`cuenta`.`id_cuentas` = `chequeras`.`cuenta_id_chequera`))) join `clientes` on((`clientes`.`id_clientes` = `cuenta`.`cliente_id_cuenta`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `idcuenta`
--
DROP TABLE IF EXISTS `idcuenta`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `idcuenta`  AS  select `cuenta`.`id_cuentas` AS `id_cuentas`,`clientes`.`dpi` AS `dpi` from (`cuenta` join `clientes` on((`clientes`.`id_clientes` = `cuenta`.`cliente_id_cuenta`))) ;

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
-- Indices de la tabla `chequeras`
--
ALTER TABLE `chequeras`
  ADD PRIMARY KEY (`id_chequeras`),
  ADD UNIQUE KEY `numero_de_cuenta_UNIQUE` (`numero_de_cuenta`),
  ADD KEY `fk_chequeras_cuenta1_idx` (`cuenta_id_chequera`);

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
  ADD UNIQUE KEY `dpi_UNIQUE` (`dpi`),
  ADD UNIQUE KEY `usuario_cliente_UNIQUE` (`usuario_cliente`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id_cuentas`),
  ADD KEY `fk_cuentas_tipo_cuentas1_idx` (`tipo_cuentas`),
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
-- Indices de la tabla `retiros`
--
ALTER TABLE `retiros`
  ADD PRIMARY KEY (`id_retiro`),
  ADD KEY `cliente_id_ret_idx` (`cliente_id_retiro`),
  ADD KEY `chequ_id_idx` (`chequera_id`),
  ADD KEY `tipo_doc_ret_idx` (`tipo_documento_retiro`);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banco`
--
ALTER TABLE `banco`
  MODIFY `id_banco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `bitacora_inicio`
--
ALTER TABLE `bitacora_inicio`
  MODIFY `idbitacora` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `chequeras`
--
ALTER TABLE `chequeras`
  MODIFY `id_chequeras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `cheques_anulados`
--
ALTER TABLE `cheques_anulados`
  MODIFY `idcheques_anulados` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_clientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id_cuentas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `depositos`
--
ALTER TABLE `depositos`
  MODIFY `id_deposito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `retiros`
--
ALTER TABLE `retiros`
  MODIFY `id_retiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  MODIFY `Id_transferencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
-- Filtros para la tabla `chequeras`
--
ALTER TABLE `chequeras`
  ADD CONSTRAINT `fk_chequeras_cuenta1` FOREIGN KEY (`cuenta_id_chequera`) REFERENCES `cuenta` (`id_cuentas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `emplead_id_cuenta` FOREIGN KEY (`empleado_id_cuenta`) REFERENCES `empleado` (`id_empleados`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cuentas_tipo_cuentas1` FOREIGN KEY (`tipo_cuentas`) REFERENCES `tipo_cuentas` (`id_tipo_cuenta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Filtros para la tabla `retiros`
--
ALTER TABLE `retiros`
  ADD CONSTRAINT `chequ_id` FOREIGN KEY (`chequera_id`) REFERENCES `chequeras` (`id_chequeras`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cliente_id_ret` FOREIGN KEY (`cliente_id_retiro`) REFERENCES `clientes` (`id_clientes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tipo_doc_ret` FOREIGN KEY (`tipo_documento_retiro`) REFERENCES `tipo_documento` (`idtipo_documento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `transferencia`
--
ALTER TABLE `transferencia`
  ADD CONSTRAINT `chequera_trans` FOREIGN KEY (`chequera_id_transaccion`) REFERENCES `chequeras` (`id_chequeras`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
