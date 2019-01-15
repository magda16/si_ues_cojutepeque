-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-01-2019 a las 19:48:20
-- Versión del servidor: 5.7.21
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ues`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

DROP TABLE IF EXISTS `asignatura`;
CREATE TABLE IF NOT EXISTS `asignatura` (
  `idasignatura` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_as` varchar(6) CHARACTER SET latin1 NOT NULL,
  `nombre_as` varchar(150) CHARACTER SET latin1 NOT NULL,
  `tipo_as` tinyint(1) NOT NULL,
  `uv_as` int(11) NOT NULL,
  `ciclo_as` int(11) NOT NULL,
  `estado_as` int(11) NOT NULL,
  `prerequisito` varchar(25) CHARACTER SET latin1 NOT NULL,
  `postrequisito` varchar(25) CHARACTER SET latin1 NOT NULL,
  `idplanestudiofk` int(11) NOT NULL,
  PRIMARY KEY (`idasignatura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

DROP TABLE IF EXISTS `aula`;
CREATE TABLE IF NOT EXISTS `aula` (
  `idaula` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_au` varchar(75) CHARACTER SET latin1 NOT NULL,
  `ubicacion_au` text CHARACTER SET latin1 NOT NULL,
  `cantidad_au` int(11) NOT NULL,
  `estado_au` int(11) NOT NULL,
  `observacion_au` text NOT NULL,
  PRIMARY KEY (`idaula`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE IF NOT EXISTS `cargo` (
  `id_ca_em` int(11) NOT NULL,
  `nombre_ca` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ca_em`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_ca_em`, `nombre_ca`) VALUES
(1, 'Tutor'),
(2, 'Tecnico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

DROP TABLE IF EXISTS `carrera`;
CREATE TABLE IF NOT EXISTS `carrera` (
  `idcarrera` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_ca` varchar(10) NOT NULL,
  `nombre_ca` text NOT NULL,
  `duracion_ca` int(11) NOT NULL,
  `estado_ca` int(11) NOT NULL,
  `observacion_ca` text NOT NULL,
  `idfacultadfk` int(11) NOT NULL,
  PRIMARY KEY (`idcarrera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_es`
--

DROP TABLE IF EXISTS `documentos_es`;
CREATE TABLE IF NOT EXISTS `documentos_es` (
  `iddoces` int(11) NOT NULL AUTO_INCREMENT,
  `pago_certificado_doces` varchar(10) NOT NULL,
  `certificado_medico_doces` text NOT NULL,
  `matricula_doces` text NOT NULL,
  `primera_cuota_doces` text NOT NULL,
  `DUI_doces` text NOT NULL,
  `NIT_doces` text NOT NULL,
  `paes_doces` text NOT NULL,
  `partida_nacimiento_doces` text NOT NULL,
  `estado_doces` int(11) NOT NULL,
  `idestudiantefk` int(11) NOT NULL,
  PRIMARY KEY (`iddoces`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ed_aspectos`
--

DROP TABLE IF EXISTS `ed_aspectos`;
CREATE TABLE IF NOT EXISTS `ed_aspectos` (
  `ed_idaspectos` int(11) NOT NULL AUTO_INCREMENT,
  `ed_nomasp` text NOT NULL,
  `ed_porasp` int(11) NOT NULL,
  `estado_asp` int(11) NOT NULL,
  `id_edfk` int(11) NOT NULL,
  PRIMARY KEY (`ed_idaspectos`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ed_aspectos`
--

INSERT INTO `ed_aspectos` (`ed_idaspectos`, `ed_nomasp`, `ed_porasp`, `estado_asp`, `id_edfk`) VALUES
(1, 'PlanificaciÃ³n de las Labores AcadÃ©micas', 0, 0, 1),
(2, 'DesempeÃ±o Administrativo AcadÃ©mico', 0, 0, 1),
(3, 'RelaciÃ³n Docente-Comunidad AcadÃ©mica', 0, 0, 1),
(4, 'EvaluaciÃ³n', 0, 0, 1),
(5, 'Actitudes y Valores Profesionales', 0, 0, 1),
(6, 'Responsabilidad Docente', 0, 0, 1),
(7, 'ParticipaciÃ³n en proyectos acadÃ©micos en cada unidad, departamento o escuela', 0, 0, 1),
(8, 'PlanificaciÃ³n de las Labores', 0, 0, 2),
(9, 'DesempeÃ±o Laboral', 0, 0, 2),
(10, 'Responsabilidad Profesional', 0, 0, 2),
(11, 'Actitudes y Valores', 0, 0, 2),
(12, 'Puntualidad', 0, 0, 3),
(13, 'Responsabilidad', 0, 0, 3),
(14, 'Material de Apoyo', 0, 0, 3),
(15, 'Puntualidadd', 0, 0, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ed_item`
--

DROP TABLE IF EXISTS `ed_item`;
CREATE TABLE IF NOT EXISTS `ed_item` (
  `ed_iditem` int(11) NOT NULL AUTO_INCREMENT,
  `ed_nomitem` text NOT NULL,
  `ed_poritem` int(11) NOT NULL,
  `estado_item` int(11) NOT NULL,
  `ed_idaspectofk` int(11) NOT NULL,
  PRIMARY KEY (`ed_iditem`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ed_item`
--

INSERT INTO `ed_item` (`ed_iditem`, `ed_nomitem`, `ed_poritem`, `estado_item`, `ed_idaspectofk`) VALUES
(1, 'Puntualidad en el trabajo.', 0, 0, 1),
(2, 'Permanencia en el trabajo', 0, 0, 1),
(3, 'Elabora recursos y material didÃ¡ctico acorde a la actividad que realizarÃ¡', 0, 0, 1),
(4, 'Elabora objetivos y / Ã³ cartas didÃ¡cticas para el desarrollo de las temÃ¡ticas a impartir cada ciclo', 0, 0, 1),
(5, 'Propicia la participaciÃ³n estudiantil en sus clases en el Ã¡mbito acadÃ©mico', 0, 0, 1),
(6, 'Es eficiente en el uso del tiempo que se le asigna para las actividades acadÃ©micas', 0, 0, 1),
(7, 'Mantiene ordenado su lugar de trabajo', 0, 0, 2),
(8, 'Tiene disposiciÃ³n para realizar las tareas asignadas', 0, 0, 2),
(9, 'Se integra con facilidad al trabajo en equipo', 0, 0, 2),
(10, 'PrÃ¡ctica la confidencialidad en funciÃ³n del interÃ©s institucional', 0, 0, 2),
(11, 'Cuida el material y equipo a su cargo en la realizaciÃ³n de las actividades diarias', 0, 0, 2),
(12, 'Mantiene un registro oportuno en el sistema de evaluaciones realizadas', 0, 0, 2),
(13, 'Asiste a las reuniones administrativas', 0, 0, 2),
(14, 'En el trabajo cotidiano, la comunicaciÃ³n con el jefe inmediato es clara y oportuna para un mejor entendimiento entre sÃ­', 0, 0, 3),
(15, 'Las interrelaciones con el personal acadÃ©mico y estudiantes son cordiales y respetuosos', 0, 0, 3),
(16, 'Es receptivo a las observaciones y las solventa para el mejor desempeÃ±o personal', 0, 0, 3),
(17, 'Realiza las evaluaciones con base a los objetivos del aprendizaje establecidos en el programa acadÃ©mico', 0, 0, 4),
(18, 'Utiliza un sistema de evaluaciÃ³n objetivo con parÃ¡metros establecidos de evaluaciÃ³n', 0, 0, 4),
(19, 'Se interesa en la mejora de la docencia', 0, 0, 5),
(20, 'Manifiesta principios Ã©ticos en la atenciÃ³n a los estudiantes y demÃ¡s personas', 0, 0, 5),
(21, 'La presentaciÃ³n personal va acorde a la actividad a desarrollar', 0, 0, 5),
(22, 'Justifica las inasistencias en las actividades programadas en la asignatura o mÃ³dulo', 0, 0, 6),
(23, 'Es respetuoso/a y fomenta el cumplimiento de la legislaciÃ³n universitaria', 0, 0, 6),
(24, 'Es responsable con el cumplimiento de sus actividades acadÃ©micas', 0, 0, 6),
(25, 'Se identifica con los fines, la misiÃ³n y visiÃ³n de la universidad', 0, 0, 6),
(26, 'Participa en la escuela o facultad en proyectos acadÃ©micos de: currÃ­culum, apoyo a la docencia, curso de capacitaciÃ³n, otros.', 0, 0, 7),
(27, 'Muestra interÃ©s en salir a participar en conferencias o eventos programados por la escuela y/o facultad', 0, 0, 7),
(28, 'Puntualidad y Asistencia en el trabajo', 0, 0, 8),
(29, 'Permenencia en su area de trabajo', 0, 0, 8),
(30, 'Es eficiente en el uso del tiempo', 0, 0, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE IF NOT EXISTS `empleado` (
  `idempleado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_em` varchar(75) NOT NULL,
  `apellido_em` varchar(75) NOT NULL,
  `DUI_em` varchar(10) NOT NULL,
  `NIT_em` varchar(18) NOT NULL,
  `direccion_em` text NOT NULL,
  `cargo_em` int(11) NOT NULL,
  `especialidad_em` varchar(75) NOT NULL,
  `genero_em` varchar(10) NOT NULL,
  `estado_em` int(11) NOT NULL,
  `estado_ci` varchar(30) NOT NULL,
  PRIMARY KEY (`idempleado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
CREATE TABLE IF NOT EXISTS `estudiante` (
  `idestudiante` int(11) NOT NULL AUTO_INCREMENT,
  `carnet_es` varchar(7) NOT NULL,
  `nombre_es` varchar(75) NOT NULL,
  `apellido_es` varchar(75) NOT NULL,
  `genero_es` varchar(10) NOT NULL,
  `NIT_es` varchar(18) NOT NULL,
  `DUI_es` varchar(10) NOT NULL,
  `direccion_es` text NOT NULL,
  `telefono_es` varchar(10) NOT NULL,
  `correo_es` varchar(100) NOT NULL,
  `procedencia_es` varchar(10) NOT NULL,
  `estado_es` int(11) NOT NULL,
  `idfacultad` int(11) NOT NULL,
  `idcarrera` int(11) NOT NULL,
  `idplan_estudio` int(11) NOT NULL,
  `observacion_es` text NOT NULL,
  PRIMARY KEY (`idestudiante`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciond`
--

DROP TABLE IF EXISTS `evaluaciond`;
CREATE TABLE IF NOT EXISTS `evaluaciond` (
  `id_ed` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_ed` varchar(200) NOT NULL,
  `criterio_ed` varchar(200) NOT NULL,
  `estado_ed` int(11) NOT NULL,
  PRIMARY KEY (`id_ed`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `evaluaciond`
--

INSERT INTO `evaluaciond` (`id_ed`, `nombre_ed`, `criterio_ed`, `estado_ed`) VALUES
(1, 'EvaluaciÃ³n 2018', 'Labor AcadÃ©mic', 0),
(2, 'EvaluaciÃ³n para Ordenanzas ', 'Cumplimiento de Objetivos 2018', 0),
(3, 'Evaluacion 2019', 'Labor Academica', 0),
(4, 'Evaluacion 2020', 'Labor Academica', 0),
(5, 'Evaluacion 2021', 'Cumplimiento de Metas', 0),
(6, 'Evaluacion 2022', 'Labor Academica', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

DROP TABLE IF EXISTS `facultad`;
CREATE TABLE IF NOT EXISTS `facultad` (
  `idfacultad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_fa` text NOT NULL,
  `telefono_fa` varchar(10) NOT NULL,
  `correo_fa` varchar(100) NOT NULL,
  `estado_fa` int(11) NOT NULL,
  `id_re_fafk` int(11) NOT NULL,
  PRIMARY KEY (`idfacultad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_estudio`
--

DROP TABLE IF EXISTS `plan_estudio`;
CREATE TABLE IF NOT EXISTS `plan_estudio` (
  `idplanestudio` int(11) NOT NULL AUTO_INCREMENT,
  `anio_pe` varchar(4) NOT NULL,
  `estado_pe` int(11) NOT NULL,
  `estadolleno_pe` int(11) NOT NULL,
  `idcarrerafk` int(11) NOT NULL,
  PRIMARY KEY (`idplanestudio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representante_facultad`
--

DROP TABLE IF EXISTS `representante_facultad`;
CREATE TABLE IF NOT EXISTS `representante_facultad` (
  `id_re_fa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rf` varchar(75) NOT NULL,
  `apellido_rf` varchar(75) NOT NULL,
  `genero_rf` varchar(10) NOT NULL,
  `telefono_rf` varchar(10) NOT NULL,
  `correo_rf` varchar(100) NOT NULL,
  `estado_rf` int(11) NOT NULL,
  `observacion_rf` text NOT NULL,
  PRIMARY KEY (`id_re_fa`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `representante_facultad`
--

INSERT INTO `representante_facultad` (`id_re_fa`, `nombre_rf`, `apellido_rf`, `genero_rf`, `telefono_rf`, `correo_rf`, `estado_rf`, `observacion_rf`) VALUES
(1, 'Luis Antonio', 'RodrÃ­guez Lara', 'Masculino', '6785-4125', 'lara_ues@gmail.com', 1, 'Registro'),
(2, 'JosÃ© Roberto ', 'Carranza DÃ­az', 'Masculino', '6528-9900', 'carranza_ues@gmail.com', 1, 'Registro'),
(3, 'Anabel MarÃ­a', 'Arias Estrada', 'Femenino', '6021-1541', 'arias_ues@gamil.com', 1, 'Registro'),
(4, 'Carlos Francisco', 'MartÃ­nez MartÃ­nez ', 'Masculino', '6850-0000', 'martinez_ues@gmail.com', 1, 'Registro');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
