-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2024 a las 11:50:21
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
-- Base de datos: `simuladorum`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amp`
--

CREATE TABLE `amp` (
  `nro` int(11) NOT NULL,
  `id` varchar(10) NOT NULL,
  `nro_empresa` int(11) NOT NULL,
  `id_empresa` varchar(10) NOT NULL,
  `cant_capmax_lc` decimal(30,2) NOT NULL,
  `cant_existencia_lc` decimal(30,2) NOT NULL,
  `cant_capdisp_lc` decimal(30,2) NOT NULL,
  `cant_capmax_ad` decimal(30,2) NOT NULL,
  `cant_existencia_ad` decimal(30,2) NOT NULL,
  `cant_capdisp_ad` decimal(30,2) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_reg` int(10) NOT NULL,
  `estatus_reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amp_cto`
--

CREATE TABLE `amp_cto` (
  `nro` int(10) NOT NULL,
  `id` varchar(10) NOT NULL,
  `nro_empresa` int(10) NOT NULL,
  `id_empresa` varchar(10) NOT NULL,
  `nro_almacen` int(10) NOT NULL,
  `nro_compra` int(10) NOT NULL,
  `ciclo` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `tipo_mov_lc` varchar(1) NOT NULL,
  `cant_lc` decimal(30,2) NOT NULL,
  `monto_cto_ltr_lc` decimal(30,2) NOT NULL,
  `monto_cto_total_lc` decimal(30,2) NOT NULL,
  `cant_acum_lc` decimal(30,2) NOT NULL,
  `monto_cto_acum_lc` decimal(30,2) NOT NULL,
  `monto_cto_promedio_lc` decimal(30,2) NOT NULL,
  `tipo_mov_ad` varchar(1) NOT NULL,
  `cant_ad` decimal(30,2) NOT NULL,
  `monto_cto_ltr_ad` decimal(30,2) NOT NULL,
  `monto_cto_total_ad` decimal(30,2) NOT NULL,
  `cant_acum_ad` decimal(30,2) NOT NULL,
  `monto_cto_acum_ad` decimal(30,2) NOT NULL,
  `monto_cto_promedio_ad` decimal(30,2) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_reg` int(10) NOT NULL,
  `estatus_reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla Costo Almacen Materia Prima';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amp_mov`
--

CREATE TABLE `amp_mov` (
  `nro` int(10) NOT NULL,
  `id` varchar(10) NOT NULL,
  `nro_empresa` int(10) NOT NULL,
  `id_empresa` varchar(10) NOT NULL,
  `nro_almacen` int(10) NOT NULL,
  `nro_compra` int(10) NOT NULL,
  `ciclo` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `tipo_mov_lc` varchar(1) NOT NULL,
  `cant_entrada_lc` decimal(30,2) NOT NULL,
  `cant_salida_lc` decimal(30,2) NOT NULL,
  `cant_total_lc` decimal(30,2) NOT NULL,
  `tipo_mov_ad` varchar(1) NOT NULL,
  `cant_entrada_ad` decimal(30,2) NOT NULL,
  `cant_salida_ad` decimal(30,2) NOT NULL,
  `cant_total_ad` decimal(30,2) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `producido` varchar(1) NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_reg` int(10) NOT NULL,
  `estatus_reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla Almacen de Materia Prima';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apt`
--

CREATE TABLE `apt` (
  `nro` int(10) NOT NULL,
  `id` varchar(10) NOT NULL,
  `nro_empresa` int(10) NOT NULL,
  `cant_cmax_qd` decimal(30,2) NOT NULL,
  `cant_e_qd` decimal(30,2) NOT NULL,
  `cant_disp_qd` decimal(30,2) NOT NULL,
  `cant_cmax_moz` decimal(30,2) NOT NULL,
  `cant_e_moz` decimal(30,2) NOT NULL,
  `cant_disp_moz` decimal(30,2) NOT NULL,
  `cant_cmax_gou` decimal(30,2) NOT NULL,
  `cant_e_gou` decimal(30,2) NOT NULL,
  `cant_disp_gou` decimal(30,2) NOT NULL,
  `cant_cmax_die` decimal(30,2) NOT NULL,
  `cant_e_die` decimal(30,2) NOT NULL,
  `cant_disp_die` decimal(30,2) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_reg` int(10) NOT NULL,
  `estatus_reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla APT';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apt_cto`
--

CREATE TABLE `apt_cto` (
  `nro` int(10) NOT NULL,
  `nro_empresa` int(10) NOT NULL,
  `ciclo` int(10) NOT NULL,
  `cant-entrada` decimal(30,2) NOT NULL,
  `costo-unidad-e` decimal(30,2) NOT NULL,
  `costo-total-e` decimal(30,2) NOT NULL,
  `cant-despacho` decimal(30,2) NOT NULL,
  `costo-unidad-d` decimal(30,2) NOT NULL,
  `costo-total-d` decimal(30,2) NOT NULL,
  `cant-acum` decimal(30,2) NOT NULL,
  `costo-promedio` decimal(30,2) NOT NULL,
  `costo-acum` decimal(30,2) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `fehca-reg` date NOT NULL,
  `usario-reg` int(10) NOT NULL,
  `estatus-reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla APT-CTO';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apt_despacho`
--

CREATE TABLE `apt_despacho` (
  `nro` int(10) NOT NULL,
  `id` varchar(10) NOT NULL,
  `nro-empresa` int(10) NOT NULL,
  `id-empresa` varchar(10) NOT NULL,
  `ciclo` int(10) NOT NULL,
  `id-ciclo` varchar(10) NOT NULL,
  `fecha-despacho` date NOT NULL,
  `cant-queso-duro` decimal(30,2) NOT NULL,
  `cant-queso-mozarella` decimal(30,2) NOT NULL,
  `cant-queso-gouda` decimal(30,2) NOT NULL,
  `cant-queso-dieta` decimal(30,2) NOT NULL,
  `cant.total-queso` decimal(30,2) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `fecha-reg` date NOT NULL,
  `usuario-reg` int(10) NOT NULL,
  `estatus-reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla APT-Despacho';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apt_dtienda`
--

CREATE TABLE `apt_dtienda` (
  `nro` int(10) NOT NULL,
  `nro_empresa` int(10) NOT NULL,
  `ciclo` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `cant_dub` decimal(30,0) NOT NULL,
  `cant_moz` decimal(30,0) NOT NULL,
  `cant_gou` decimal(30,0) NOT NULL,
  `cant_die` decimal(30,0) NOT NULL,
  `cant_total` decimal(30,0) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_reg` int(10) NOT NULL,
  `estatus_reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apt_mov`
--

CREATE TABLE `apt_mov` (
  `nro` int(10) NOT NULL,
  `id` varchar(10) NOT NULL,
  `nro_empresa` int(10) NOT NULL,
  `nro_almacen` int(10) NOT NULL,
  `nro_produccion` int(10) NOT NULL,
  `ciclo` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` varchar(1) NOT NULL,
  `cant_entrada` decimal(30,0) NOT NULL,
  `cant_salida` decimal(30,0) NOT NULL,
  `cant_total` decimal(30,0) NOT NULL,
  `nro_queso` int(10) NOT NULL,
  `nombre_queso` varchar(100) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_reg` int(10) NOT NULL,
  `estatus_reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Movimientos de almacén productos terminados';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `nro` int(10) NOT NULL,
  `id` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `nro_empresa` int(10) NOT NULL,
  `observacion` text NOT NULL,
  `monto_multa` decimal(30,2) NOT NULL,
  `fecha_pago` date NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_reg` int(10) NOT NULL,
  `estatus_reg` varchar(1) NOT NULL,
  `ciclo` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla bitacora';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE `calendario` (
  `nro` int(10) NOT NULL,
  `id` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `observacion` varchar(500) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_reg` int(10) NOT NULL,
  `estatus_reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla de Calendario';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_subasta`
--

CREATE TABLE `compra_subasta` (
  `nro` int(10) NOT NULL,
  `id` varchar(10) NOT NULL,
  `empresa` int(10) NOT NULL,
  `ciclo` int(10) NOT NULL,
  `fecha_ped` date NOT NULL,
  `fecha_recep` date NOT NULL,
  `monto_precio_lc` decimal(30,2) NOT NULL,
  `cant_contratos_lc` decimal(30,2) NOT NULL,
  `cant_litros_lc` decimal(30,2) NOT NULL,
  `monto_total_usb_lc` decimal(30,2) NOT NULL,
  `monto_precio_ad` decimal(30,2) NOT NULL,
  `cant_contratos_ad` decimal(30,2) NOT NULL,
  `cant_litros_ad` decimal(30,2) NOT NULL,
  `monto_total_usb_ad` decimal(30,2) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_reg` int(10) NOT NULL,
  `estatus_reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla Compra - Subasta';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `despacho`
--

CREATE TABLE `despacho` (
  `nro` int(10) NOT NULL,
  `nro_empresa` int(10) NOT NULL,
  `ciclo` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `nro_queso` int(10) NOT NULL,
  `nombre_queso` varchar(100) NOT NULL,
  `cant_xdespacho` decimal(30,0) NOT NULL,
  `cant_desp_arm` decimal(30,0) NOT NULL,
  `cant_desp_ciu` decimal(30,0) NOT NULL,
  `cant_desp_sfi` decimal(30,0) NOT NULL,
  `cant_desp_lsa` decimal(30,0) NOT NULL,
  `cost_t_arm` decimal(30,0) NOT NULL,
  `cost_t_ciu` decimal(30,0) NOT NULL,
  `cost_t_sfi` decimal(30,0) NOT NULL,
  `cost_t_lsa` decimal(30,0) NOT NULL,
  `cost_t_total` decimal(30,2) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_reg` int(10) NOT NULL,
  `estatus_reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `despacho_tienda`
--

CREATE TABLE `despacho_tienda` (
  `nro` int(10) NOT NULL,
  `id` varchar(10) NOT NULL,
  `nro-empresa` int(10) NOT NULL,
  `id-empresa` varchar(10) NOT NULL,
  `ciclo` int(10) NOT NULL,
  `id-ciclo` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `nro-queso` int(10) NOT NULL,
  `id-queso` varchar(10) NOT NULL,
  `nombre-queso` varchar(100) NOT NULL,
  `cant-disponible` decimal(30,2) NOT NULL,
  `cant-desp-armadillo` decimal(30,2) NOT NULL,
  `cant-desp-sanfierro` decimal(30,2) NOT NULL,
  `cant-desp-ciudadela` decimal(30,2) NOT NULL,
  `cant-desp-lossantos` decimal(30,2) NOT NULL,
  `costo-t-armadillo` decimal(30,2) NOT NULL,
  `costo-t-sanfierro` decimal(30,2) NOT NULL,
  `costo-t-ciudadela` decimal(30,2) NOT NULL,
  `costo-t-lossantos` decimal(30,2) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `fecha-reg` date NOT NULL,
  `usuario-reg` int(10) NOT NULL,
  `estatus-reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla Despacho Tienda';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `nro` int(10) NOT NULL,
  `id` varchar(10) NOT NULL,
  `usuario` int(10) NOT NULL,
  `id_usuario` varchar(10) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `estructura` varchar(300) NOT NULL,
  `departamentos` varchar(300) NOT NULL,
  `organigrama` varchar(300) NOT NULL,
  `monto_presupuesto` decimal(30,2) NOT NULL,
  `monto_saldo_actual` decimal(30,2) NOT NULL,
  `monto_multas` decimal(30,2) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `integrantes` mediumtext NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_reg` int(10) NOT NULL,
  `estatus_reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla empresa';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pcm`
--

CREATE TABLE `pcm` (
  `nro` int(10) NOT NULL,
  `id` varchar(10) NOT NULL,
  `nro_empresa` int(10) NOT NULL,
  `ciclo` int(10) NOT NULL,
  `tipo` varchar(1) NOT NULL,
  `fecha` date NOT NULL,
  `cant_lc` decimal(30,2) NOT NULL,
  `cant_ad` decimal(30,2) NOT NULL,
  `cant_queso` decimal(30,2) NOT NULL,
  `nro_queso` int(1) NOT NULL,
  `tipo_queso` varchar(300) NOT NULL,
  `monto_cto_prod_mp` decimal(30,2) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_reg` int(10) NOT NULL,
  `estatus_reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla Producción';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pcm_cf`
--

CREATE TABLE `pcm_cf` (
  `nro` int(10) NOT NULL,
  `nro-empresa` int(11) NOT NULL,
  `ciclo` int(11) NOT NULL,
  `monto_alquiler_galpon` decimal(30,0) NOT NULL,
  `monto_cto_amp` decimal(30,0) NOT NULL,
  `monto_cto_apt` decimal(30,0) NOT NULL,
  `monto_cto_transporte` decimal(30,0) NOT NULL,
  `monto_total_ciclo` decimal(30,0) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_reg` int(10) NOT NULL,
  `estatus-reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla PCM-CF';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pcm_cp`
--

CREATE TABLE `pcm_cp` (
  `nro` int(10) NOT NULL,
  `nro_empresa` int(10) NOT NULL,
  `ciclo` int(10) NOT NULL,
  `monto_inv_inicial` decimal(30,2) NOT NULL,
  `monto_compras` decimal(30,2) NOT NULL,
  `monto_total_mp` decimal(30,2) NOT NULL,
  `monto_inv_final_mp` decimal(30,2) NOT NULL,
  `monto_cto_mp` decimal(30,2) NOT NULL,
  `monto_mo_directa` decimal(30,2) NOT NULL,
  `monto_cto_fab` decimal(30,2) NOT NULL,
  `monto_total_ctoprod` decimal(30,2) NOT NULL,
  `monto_prod_sem` decimal(30,2) NOT NULL,
  `monto_cto_unit_sem` decimal(30,2) NOT NULL,
  `monto_cto_unit_mp` decimal(30,2) NOT NULL,
  `monto_cto_unit_mo` decimal(30,2) NOT NULL,
  `monto_cto_unit_gf` decimal(30,2) NOT NULL,
  `monto_cto_unit_ind` decimal(30,2) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_reg` int(10) NOT NULL,
  `estatus_reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla PCM-CP';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pcm_mod_mov`
--

CREATE TABLE `pcm_mod_mov` (
  `nro` int(10) NOT NULL,
  `id` varchar(10) NOT NULL,
  `nro_empresa` int(10) NOT NULL,
  `nro_operador` int(10) NOT NULL,
  `ciclo` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `cant_total_horas_trab` decimal(30,2) NOT NULL,
  `monto_pago_hora` decimal(30,2) NOT NULL,
  `monto_pago_adicional` decimal(30,2) NOT NULL,
  `monto_total_jornada` decimal(30,2) NOT NULL,
  `cant_porcentaje_trab` decimal(30,2) NOT NULL,
  `emoji1` varchar(300) NOT NULL,
  `emoji2` varchar(300) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_reg` int(10) NOT NULL,
  `estatus_reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla PCM-MOD';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pcm_mod_operador`
--

CREATE TABLE `pcm_mod_operador` (
  `nro` int(10) NOT NULL,
  `id` varchar(10) NOT NULL,
  `nro_empresa` int(10) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `cant_horas_sem` decimal(10,2) NOT NULL,
  `cant_horas_max_sem` decimal(10,2) NOT NULL,
  `cant_total_horas_trab` decimal(10,2) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_reg` int(10) NOT NULL,
  `estatus_reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla Operador';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicidad`
--

CREATE TABLE `publicidad` (
  `nro` int(10) NOT NULL,
  `nro_empresa` int(10) NOT NULL,
  `pub_dub_arm` decimal(30,0) NOT NULL,
  `pub_dub_ciu` decimal(30,0) NOT NULL,
  `pub_dub_sfi` decimal(30,0) NOT NULL,
  `pub_dub_lsa` decimal(30,0) NOT NULL,
  `pub_moz_arm` decimal(30,0) NOT NULL,
  `pub_moz_ciu` decimal(30,0) NOT NULL,
  `pub_moz_sfi` decimal(30,0) NOT NULL,
  `pub_moz_lsa` decimal(30,0) NOT NULL,
  `pub_gou_arm` decimal(30,0) NOT NULL,
  `pub_gou_ciu` decimal(30,0) NOT NULL,
  `pub_gou_sfi` decimal(30,0) NOT NULL,
  `pub_gou_lsa` decimal(30,0) NOT NULL,
  `pub_die_arm` decimal(30,0) NOT NULL,
  `pub_die_ciu` decimal(30,0) NOT NULL,
  `pub_die_sfi` decimal(30,0) NOT NULL,
  `pub_die_lsa` decimal(30,0) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_reg` int(10) NOT NULL,
  `estatus_reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla Publicidad';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `simulacion`
--

CREATE TABLE `simulacion` (
  `nro` int(10) NOT NULL,
  `id` varchar(10) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_reg` int(10) NOT NULL,
  `estatus_reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Define un entorno de trabajo de simulación. Inicializa valor';

--
-- Volcado de datos para la tabla `simulacion`
--

INSERT INTO `simulacion` (`nro`, `id`, `fecha_inicio`, `descripcion`, `estatus`, `fecha_reg`, `usuario_reg`, `estatus_reg`) VALUES
(1, 'S-0001', '2024-04-01', 'Simulación de Depuración', 'A', '2024-04-01', 2, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblauditoria`
--

CREATE TABLE `tblauditoria` (
  `nro` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `operacion` varchar(100) NOT NULL,
  `accion` varchar(200) NOT NULL,
  `proceso` varchar(100) NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_reg` int(10) NOT NULL,
  `estatus_reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpublicidad`
--

CREATE TABLE `tblpublicidad` (
  `nro` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblpublicidad`
--

INSERT INTO `tblpublicidad` (`nro`, `nombre`, `descripcion`) VALUES
(1, 'Ninguna', 'Ninguna Publicidad'),
(2, 'Videos Promocionales', 'Videos Promocionales'),
(3, 'Vallas en avenidas y carreteras', 'Vallas en avenidas y carreteras'),
(4, 'Flyers', 'Flyers'),
(5, 'Otros', 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblqueso`
--

CREATE TABLE `tblqueso` (
  `nro` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `alias` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblqueso`
--

INSERT INTO `tblqueso` (`nro`, `nombre`, `alias`) VALUES
(1, 'Queso Duro Blanco', 'DUB'),
(2, 'Queso Mozarella', 'MOZ'),
(3, 'Queso Gouda', 'GOU'),
(4, 'Queso Dietético', 'DIE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltienda`
--

CREATE TABLE `tbltienda` (
  `nro` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `alias` varchar(3) NOT NULL,
  `cant_cto_transporte` decimal(30,2) NOT NULL,
  `cant_cto_alquiler` decimal(30,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbltienda`
--

INSERT INTO `tbltienda` (`nro`, `nombre`, `alias`, `cant_cto_transporte`, `cant_cto_alquiler`) VALUES
(1, 'Armadillo', 'ARM', 0.08, 1500.00),
(2, 'Ciudadela', 'CIU', 0.09, 2500.00),
(3, 'San Fierro', 'SFI', 0.75, 1480.00),
(4, 'Los Santos', 'LSA', 0.85, 2400.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuarios`
--

CREATE TABLE `tblusuarios` (
  `nro` int(10) NOT NULL,
  `id` varchar(10) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `clave` varchar(16) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo` varchar(1) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_reg` int(10) NOT NULL,
  `estatus_reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla de usuario';

--
-- Volcado de datos para la tabla `tblusuarios`
--

INSERT INTO `tblusuarios` (`nro`, `id`, `usuario`, `clave`, `nombre`, `tipo`, `estatus`, `fecha_reg`, `usuario_reg`, `estatus_reg`) VALUES
(1, 'U-01', 'superusuario@santino.com', '123456', 'Super Usuario', 'A', 'A', '2024-01-02', 1, 'A'),
(2, 'UA-01', 'carlosadministrador@gmail.com', '123456', 'Carlos Administrador', 'A', 'A', '2024-01-05', 1, 'A'),
(3, 'US-002', 'carlosparticipante@gmail.com', '123456', 'Carlos Participante', 'P', 'A', '2024-01-08', 2, 'A'),
(4, 'U-003', 'homero@gmail.com', '123456', 'Homero Simpson', 'P', 'A', '2024-04-01', 2, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas`
--

CREATE TABLE `tiendas` (
  `nro` int(10) NOT NULL,
  `nro_empresa` int(10) NOT NULL,
  `cant_cap_almacen` decimal(30,0) NOT NULL,
  `cant_existencia` decimal(30,0) NOT NULL,
  `cant_cap_disp` decimal(30,0) NOT NULL,
  `monto_a_arm` decimal(30,0) NOT NULL,
  `monto_a_ciu` decimal(30,0) NOT NULL,
  `monto_a_sfi` decimal(30,0) NOT NULL,
  `monto_a_lsa` decimal(30,0) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_reg` int(10) NOT NULL,
  `estatus_reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla Tiendas';

--
-- Volcado de datos para la tabla `tiendas`
--

INSERT INTO `tiendas` (`nro`, `nro_empresa`, `cant_cap_almacen`, `cant_existencia`, `cant_cap_disp`, `monto_a_arm`, `monto_a_ciu`, `monto_a_sfi`, `monto_a_lsa`, `estatus`, `fecha_reg`, `usuario_reg`, `estatus_reg`) VALUES
(5, 8, 300000, 0, 300000, 1500, 2500, 1480, 2400, 'A', '2024-04-25', 2, 'A'),
(6, 2, 300000, 110000, 190000, 1500, 2500, 1480, 2400, 'A', '2024-04-25', 4, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas_existe`
--

CREATE TABLE `tiendas_existe` (
  `nro` int(10) NOT NULL,
  `nro_empresa` int(10) NOT NULL,
  `nro_almacen_tienda` int(10) NOT NULL,
  `cant_dub_arm` decimal(30,2) NOT NULL,
  `cant_dub_ciu` decimal(30,2) NOT NULL,
  `cant_dub_sfi` decimal(30,2) NOT NULL,
  `cant_dub_lsa` decimal(30,2) NOT NULL,
  `cant_moz_arm` decimal(30,2) NOT NULL,
  `cant_moz_ciu` decimal(30,2) NOT NULL,
  `cant_moz_sfi` decimal(30,2) NOT NULL,
  `cant_moz_lsa` decimal(30,2) NOT NULL,
  `cant_gou_arm` decimal(30,2) NOT NULL,
  `cant_gou_ciu` decimal(30,2) NOT NULL,
  `cant_gou_sfi` decimal(30,2) NOT NULL,
  `cant_gou_lsa` decimal(30,2) NOT NULL,
  `cant_die_arm` decimal(30,2) NOT NULL,
  `cant_die_ciu` decimal(30,2) NOT NULL,
  `cant_die_sfi` decimal(30,2) NOT NULL,
  `cant_die_lsa` decimal(30,2) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_reg` int(10) NOT NULL,
  `estatus_reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tiendas_existe`
--

INSERT INTO `tiendas_existe` (`nro`, `nro_empresa`, `nro_almacen_tienda`, `cant_dub_arm`, `cant_dub_ciu`, `cant_dub_sfi`, `cant_dub_lsa`, `cant_moz_arm`, `cant_moz_ciu`, `cant_moz_sfi`, `cant_moz_lsa`, `cant_gou_arm`, `cant_gou_ciu`, `cant_gou_sfi`, `cant_gou_lsa`, `cant_die_arm`, `cant_die_ciu`, `cant_die_sfi`, `cant_die_lsa`, `estatus`, `fecha_reg`, `usuario_reg`, `estatus_reg`) VALUES
(1, 8, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'A', '2024-04-25', 2, 'A'),
(2, 2, 1, 6000.00, 2000.00, 2000.00, 2000.00, 12500.00, 0.00, 0.00, 6000.00, 8000.00, 0.00, 4000.00, 0.00, 4500.00, 2000.00, 0.00, 1000.00, 'A', '2024-04-25', 4, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas_mov`
--

CREATE TABLE `tiendas_mov` (
  `nro` int(10) NOT NULL,
  `nro_empresa` int(10) NOT NULL,
  `nro_almacen_tienda` int(10) NOT NULL,
  `nro_tienda` int(1) NOT NULL,
  `nombre_tienda` varchar(100) NOT NULL,
  `ciclo` int(10) NOT NULL,
  `nro_queso` int(1) NOT NULL,
  `nombre_queso` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `tipo_operacion` varchar(1) NOT NULL,
  `cant_entrada` decimal(30,2) NOT NULL,
  `cant_venta` decimal(30,2) NOT NULL,
  `cant_monto_pvp` decimal(30,2) NOT NULL,
  `cant_ingreso` decimal(30,2) NOT NULL,
  `cant_disponible` decimal(30,2) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_reg` int(10) NOT NULL,
  `estatus_reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla Tiendas-Mov';

--
-- Volcado de datos para la tabla `tiendas_mov`
--

INSERT INTO `tiendas_mov` (`nro`, `nro_empresa`, `nro_almacen_tienda`, `nro_tienda`, `nombre_tienda`, `ciclo`, `nro_queso`, `nombre_queso`, `fecha`, `tipo_operacion`, `cant_entrada`, `cant_venta`, `cant_monto_pvp`, `cant_ingreso`, `cant_disponible`, `estatus`, `fecha_reg`, `usuario_reg`, `estatus_reg`) VALUES
(1, 2, 6, 1, 'Armadillo', 1, 2, 'Queso Mozarella', '2024-04-30', 'R', 1000.00, 0.00, 0.00, 0.00, 1000.00, 'A', '2024-04-25', 4, 'A'),
(2, 2, 6, 4, 'Los Santos', 1, 2, 'Queso Mozarella', '2024-04-30', 'R', 3500.00, 0.00, 0.00, 0.00, 3500.00, 'A', '2024-04-25', 4, 'A'),
(3, 2, 6, 1, 'Armadillo', 1, 2, 'Queso Mozarella', '2024-04-26', 'V', 0.00, 500.00, 20.00, 10000.00, 500.00, 'A', '2024-04-26', 4, 'A'),
(4, 2, 6, 4, 'Los Santos', 1, 2, 'Queso Mozarella', '2024-04-25', 'V', 0.00, 1500.00, 18.00, 27000.00, 2000.00, 'A', '2024-04-26', 4, 'A'),
(5, 2, 6, 1, 'Armadillo', 2, 1, 'Queso Duro Blanco', '2024-05-06', 'R', 1000.00, 0.00, 0.00, 0.00, 1000.00, 'A', '2024-04-27', 4, 'A'),
(6, 2, 6, 2, 'Ciudadela', 2, 1, 'Queso Duro Blanco', '2024-05-06', 'R', 1000.00, 0.00, 0.00, 0.00, 1000.00, 'A', '2024-04-27', 4, 'A'),
(7, 2, 6, 3, 'San Fierro', 2, 1, 'Queso Duro Blanco', '2024-05-06', 'R', 1000.00, 0.00, 0.00, 0.00, 1000.00, 'A', '2024-04-27', 4, 'A'),
(8, 2, 6, 4, 'Los Santos', 2, 1, 'Queso Duro Blanco', '2024-05-06', 'R', 1000.00, 0.00, 0.00, 0.00, 1000.00, 'A', '2024-04-27', 4, 'A'),
(9, 2, 6, 1, 'Armadillo', 2, 2, 'Queso Mozarella', '2024-05-06', 'R', 6000.00, 0.00, 0.00, 0.00, 6500.00, 'A', '2024-04-27', 4, 'A'),
(10, 2, 6, 1, 'Armadillo', 2, 3, 'Queso Gouda', '2024-05-06', 'R', 2000.00, 0.00, 0.00, 0.00, 2000.00, 'A', '2024-04-27', 4, 'A'),
(11, 2, 6, 3, 'San Fierro', 2, 3, 'Queso Gouda', '2024-05-06', 'R', 3000.00, 0.00, 0.00, 0.00, 3000.00, 'A', '2024-04-27', 4, 'A'),
(12, 2, 6, 1, 'Armadillo', 2, 4, 'Queso Dietético', '2024-05-06', 'R', 500.00, 0.00, 0.00, 0.00, 500.00, 'A', '2024-04-27', 4, 'A'),
(13, 2, 6, 2, 'Ciudadela', 2, 4, 'Queso Dietético', '2024-05-06', 'R', 1000.00, 0.00, 0.00, 0.00, 1000.00, 'A', '2024-04-27', 4, 'A'),
(14, 2, 6, 4, 'Los Santos', 2, 4, 'Queso Dietético', '2024-05-06', 'R', 1000.00, 0.00, 0.00, 0.00, 1000.00, 'A', '2024-04-27', 4, 'A'),
(15, 2, 6, 1, 'Armadillo', 2, 1, 'Queso Duro Blanco', '2024-05-06', 'R', 4000.00, 0.00, 0.00, 0.00, 5000.00, 'A', '2024-04-27', 4, 'A'),
(16, 2, 6, 1, 'Armadillo', 2, 2, 'Queso Mozarella', '2024-05-06', 'R', 6000.00, 0.00, 0.00, 0.00, 12500.00, 'A', '2024-04-27', 4, 'A'),
(17, 2, 6, 1, 'Armadillo', 2, 3, 'Queso Gouda', '2024-05-06', 'R', 5000.00, 0.00, 0.00, 0.00, 7000.00, 'A', '2024-04-27', 4, 'A'),
(18, 2, 6, 1, 'Armadillo', 2, 4, 'Queso Dietético', '2024-05-06', 'R', 2500.00, 0.00, 0.00, 0.00, 3000.00, 'A', '2024-04-27', 4, 'A'),
(19, 2, 6, 1, 'Armadillo', 2, 1, 'Queso Duro Blanco', '2024-05-06', 'R', 1000.00, 0.00, 0.00, 0.00, 6000.00, 'A', '2024-04-27', 4, 'A'),
(20, 2, 6, 2, 'Ciudadela', 2, 1, 'Queso Duro Blanco', '2024-05-06', 'R', 1000.00, 0.00, 0.00, 0.00, 2000.00, 'A', '2024-04-27', 4, 'A'),
(21, 2, 6, 3, 'San Fierro', 2, 1, 'Queso Duro Blanco', '2024-05-06', 'R', 1000.00, 0.00, 0.00, 0.00, 2000.00, 'A', '2024-04-27', 4, 'A'),
(22, 2, 6, 4, 'Los Santos', 2, 1, 'Queso Duro Blanco', '2024-05-06', 'R', 1000.00, 0.00, 0.00, 0.00, 2000.00, 'A', '2024-04-27', 4, 'A'),
(23, 2, 6, 1, 'Armadillo', 2, 2, 'Queso Mozarella', '2024-05-06', 'R', 2000.00, 0.00, 0.00, 0.00, 14500.00, 'A', '2024-04-27', 4, 'A'),
(24, 2, 6, 4, 'Los Santos', 2, 2, 'Queso Mozarella', '2024-05-06', 'R', 4000.00, 0.00, 0.00, 0.00, 6000.00, 'A', '2024-04-27', 4, 'A'),
(25, 2, 6, 1, 'Armadillo', 2, 3, 'Queso Gouda', '2024-05-06', 'R', 1000.00, 0.00, 0.00, 0.00, 8000.00, 'A', '2024-04-27', 4, 'A'),
(26, 2, 6, 3, 'San Fierro', 2, 3, 'Queso Gouda', '2024-05-06', 'R', 3000.00, 0.00, 0.00, 0.00, 6000.00, 'A', '2024-04-27', 4, 'A'),
(27, 2, 6, 1, 'Armadillo', 2, 4, 'Queso Dietético', '2024-05-06', 'R', 1500.00, 0.00, 0.00, 0.00, 4500.00, 'A', '2024-04-27', 4, 'A'),
(28, 2, 6, 2, 'Ciudadela', 2, 4, 'Queso Dietético', '2024-05-06', 'R', 1000.00, 0.00, 0.00, 0.00, 2000.00, 'A', '2024-04-27', 4, 'A'),
(29, 2, 6, 1, 'Armadillo', 1, 2, 'Queso Mozarella', '2024-05-20', 'V', 0.00, 2000.00, 10.00, 20000.00, 12500.00, 'A', '2024-04-27', 4, 'A'),
(30, 2, 6, 3, 'San Fierro', 1, 3, 'Queso Gouda', '2024-05-27', 'V', 0.00, 2000.00, 12.00, 24000.00, 4000.00, 'A', '2024-04-27', 4, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `nro` int(10) NOT NULL,
  `id` varchar(10) NOT NULL,
  `nro_empresa` int(10) NOT NULL,
  `ciclo` int(10) NOT NULL,
  `nro_tienda` int(10) NOT NULL,
  `nombre_tienda` varchar(100) NOT NULL,
  `nro_queso` int(10) NOT NULL,
  `nombre_queso` varchar(100) NOT NULL,
  `cant_kg` decimal(30,2) NOT NULL,
  `monto_pvp` decimal(30,2) NOT NULL,
  `monto_total` decimal(30,2) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_reg` int(10) NOT NULL,
  `estatus_reg` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla Ventas';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amp`
--
ALTER TABLE `amp`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `amp_cto`
--
ALTER TABLE `amp_cto`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `amp_mov`
--
ALTER TABLE `amp_mov`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `apt`
--
ALTER TABLE `apt`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `apt_cto`
--
ALTER TABLE `apt_cto`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `apt_despacho`
--
ALTER TABLE `apt_despacho`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `apt_dtienda`
--
ALTER TABLE `apt_dtienda`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `apt_mov`
--
ALTER TABLE `apt_mov`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `compra_subasta`
--
ALTER TABLE `compra_subasta`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `despacho`
--
ALTER TABLE `despacho`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `despacho_tienda`
--
ALTER TABLE `despacho_tienda`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `pcm`
--
ALTER TABLE `pcm`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `pcm_cf`
--
ALTER TABLE `pcm_cf`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `pcm_cp`
--
ALTER TABLE `pcm_cp`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `pcm_mod_mov`
--
ALTER TABLE `pcm_mod_mov`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `pcm_mod_operador`
--
ALTER TABLE `pcm_mod_operador`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `simulacion`
--
ALTER TABLE `simulacion`
  ADD PRIMARY KEY (`nro`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id-simulacion` (`id`);

--
-- Indices de la tabla `tblauditoria`
--
ALTER TABLE `tblauditoria`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `tblpublicidad`
--
ALTER TABLE `tblpublicidad`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `tblqueso`
--
ALTER TABLE `tblqueso`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `tbltienda`
--
ALTER TABLE `tbltienda`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD PRIMARY KEY (`nro`),
  ADD KEY `ID Usuario` (`id`);

--
-- Indices de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `tiendas_existe`
--
ALTER TABLE `tiendas_existe`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `tiendas_mov`
--
ALTER TABLE `tiendas_mov`
  ADD PRIMARY KEY (`nro`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`nro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `amp`
--
ALTER TABLE `amp`
  MODIFY `nro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `amp_cto`
--
ALTER TABLE `amp_cto`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `amp_mov`
--
ALTER TABLE `amp_mov`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apt`
--
ALTER TABLE `apt`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apt_cto`
--
ALTER TABLE `apt_cto`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apt_despacho`
--
ALTER TABLE `apt_despacho`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apt_dtienda`
--
ALTER TABLE `apt_dtienda`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apt_mov`
--
ALTER TABLE `apt_mov`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calendario`
--
ALTER TABLE `calendario`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compra_subasta`
--
ALTER TABLE `compra_subasta`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `despacho`
--
ALTER TABLE `despacho`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `despacho_tienda`
--
ALTER TABLE `despacho_tienda`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pcm`
--
ALTER TABLE `pcm`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pcm_cf`
--
ALTER TABLE `pcm_cf`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pcm_cp`
--
ALTER TABLE `pcm_cp`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pcm_mod_mov`
--
ALTER TABLE `pcm_mod_mov`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pcm_mod_operador`
--
ALTER TABLE `pcm_mod_operador`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `simulacion`
--
ALTER TABLE `simulacion`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tblauditoria`
--
ALTER TABLE `tblauditoria`
  MODIFY `nro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblpublicidad`
--
ALTER TABLE `tblpublicidad`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tblqueso`
--
ALTER TABLE `tblqueso`
  MODIFY `nro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbltienda`
--
ALTER TABLE `tbltienda`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tiendas_existe`
--
ALTER TABLE `tiendas_existe`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tiendas_mov`
--
ALTER TABLE `tiendas_mov`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `nro` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
