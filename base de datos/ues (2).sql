-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-01-2019 a las 11:42:15
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`idasignatura`, `codigo_as`, `nombre_as`, `tipo_as`, `uv_as`, `ciclo_as`, `estado_as`, `prerequisito`, `postrequisito`, `idplanestudiofk`) VALUES
(2, 'pro175', 'Programacion I', 2, 4, 2, 1, 'introduccion', 'Programacion II', 1),
(3, 'Mat175', 'MatemÃ¡tica III', 2, 4, 2, 1, 'Matematica I', 'Matematica II', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`idaula`, `nombre_au`, `ubicacion_au`, `cantidad_au`, `estado_au`, `observacion_au`) VALUES
(1, 'Aula 193', 'Edificio A Segundo Nivell', 33, 1, 'Finalizacion del Mantenimiento de Infresetructura'),
(2, 'Aula 20', 'Edificio A Segundo Nivel', 30, 1, 'Registro'),
(3, 'Aula 21', 'Edificio A Segundo Nivel', 32, 1, 'Registro'),
(4, 'Aula 22', 'Edificio A Segundo Nivel', 25, 1, 'Registro'),
(5, 'Aula 23', 'Edificio A Segundo Nivel', 35, 1, 'Registro'),
(6, 'Aula 24', 'Edificio A Segundo Nivel', 30, 1, 'Registro'),
(7, 'Aula 25', 'Edificio A Segundo Nivel', 30, 1, 'Registro'),
(8, 'Aula', 'Edificio A Segundo Nivel', 35, 1, 'Registro'),
(9, 'Aula 27', 'Edificio A Segundo Nivel ', 30, 1, 'Termino el Mantenimiento'),
(10, 'Aula 40', 'Edificio 3A', 15, 0, 'se inundo'),
(11, 'Aula 65', 'Edifico AE', 15, 1, 'Registro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula_ca`
--

DROP TABLE IF EXISTS `aula_ca`;
CREATE TABLE IF NOT EXISTS `aula_ca` (
  `id_au_ca` int(11) NOT NULL AUTO_INCREMENT,
  `idaula` int(11) NOT NULL,
  `id_co_au` int(11) NOT NULL,
  PRIMARY KEY (`id_au_ca`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aula_ca`
--

INSERT INTO `aula_ca` (`id_au_ca`, `idaula`, `id_co_au`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 1),
(4, 3, 2),
(5, 4, 2),
(6, 5, 1),
(7, 6, 1),
(8, 6, 2),
(9, 7, 1),
(10, 7, 2),
(11, 9, 1),
(12, 9, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`idcarrera`, `codigo_ca`, `nombre_ca`, `duracion_ca`, `estado_ca`, `observacion_ca`, `idfacultadfk`) VALUES
(1, 'L10904', 'Licenciatura en la EnseÃ±anza de la MatemÃ¡tica', 5, 1, 'Registro', 1),
(2, 'L10902', 'Licenciatura en InformÃ¡tica Educativa', 5, 1, 'Registro', 1),
(3, 'L10906', 'Licenciatura en la EnseÃ±anza de las Ciencias Naturales', 5, 1, 'Registro', 1),
(4, 'L10415', 'Licenciatura en la EnseÃ±anza del Ingles', 5, 1, 'Registro', 2),
(5, 'L10515', 'IngenierÃ­a de Sistemas InformÃ¡ticos', 5, 1, 'Registro', 3),
(6, 'L10502', 'IngenierÃ­a Industrial', 5, 1, 'Registro', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `complemento_aula`
--

DROP TABLE IF EXISTS `complemento_aula`;
CREATE TABLE IF NOT EXISTS `complemento_aula` (
  `id_co_au` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_co_au` text NOT NULL,
  PRIMARY KEY (`id_co_au`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `complemento_aula`
--

INSERT INTO `complemento_aula` (`id_co_au`, `nombre_co_au`) VALUES
(1, 'Aire Acondicionado'),
(2, 'Proyector Multimedia'),
(3, 'Computadoras');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idempleado`, `nombre_em`, `apellido_em`, `DUI_em`, `NIT_em`, `direccion_em`, `cargo_em`, `especialidad_em`, `genero_em`, `estado_em`, `estado_ci`) VALUES
(1, 'Marcos Julio', 'Duran ', '0489568-9', '1003-020690-101-1', 'San Vicente', 1, '2', 'Masculino', 1, ''),
(2, 'Ana Gloria', 'Flores Maravilla', '0396895-9', '1003-020680-101-1', 'Barrio el Calvario Casa No. 10, San Vicente', 1, '1', 'Masculino', 1, 'Separado(a)'),
(3, 'Luis Aldair', 'Martinez', '0589639-9', '1003-030590-101-3', 'San Vicente Barrio centro casa No 2', 1, '1', 'Masculino', 1, 'Conviviente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_correo`
--

DROP TABLE IF EXISTS `empleado_correo`;
CREATE TABLE IF NOT EXISTS `empleado_correo` (
  `id_em_co` int(11) NOT NULL AUTO_INCREMENT,
  `correo_em` varchar(100) NOT NULL,
  `idempleadocofk` int(11) NOT NULL,
  PRIMARY KEY (`id_em_co`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado_correo`
--

INSERT INTO `empleado_correo` (`id_em_co`, `correo_em`, `idempleadocofk`) VALUES
(1, 'gloria@gmail.com', 2),
(2, 'luis@ues.edu.sv', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_telefono`
--

DROP TABLE IF EXISTS `empleado_telefono`;
CREATE TABLE IF NOT EXISTS `empleado_telefono` (
  `id_em_te` int(11) NOT NULL AUTO_INCREMENT,
  `telefono_em` varchar(10) NOT NULL,
  `idempleadotefk` int(11) NOT NULL,
  PRIMARY KEY (`id_em_te`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado_telefono`
--

INSERT INTO `empleado_telefono` (`id_em_te`, `telefono_em`, `idempleadotefk`) VALUES
(1, '7895-9685', 2),
(2, '7896-8956', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad_empleado`
--

DROP TABLE IF EXISTS `especialidad_empleado`;
CREATE TABLE IF NOT EXISTS `especialidad_empleado` (
  `id_es_em` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_es` varchar(50) NOT NULL,
  `cargo_es` int(11) NOT NULL,
  PRIMARY KEY (`id_es_em`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especialidad_empleado`
--

INSERT INTO `especialidad_empleado` (`id_es_em`, `nombre_es`, `cargo_es`) VALUES
(1, 'Licenciado en Matematicas', 1),
(2, 'Licenciado en Lenguaje', 1);

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
  `observacion_es` text NOT NULL,
  PRIMARY KEY (`idestudiante`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`idestudiante`, `carnet_es`, `nombre_es`, `apellido_es`, `genero_es`, `NIT_es`, `DUI_es`, `direccion_es`, `telefono_es`, `correo_es`, `procedencia_es`, `estado_es`, `idfacultad`, `idcarrera`, `observacion_es`) VALUES
(1, 'EM11010', 'Julio Cesar', 'EspaÃ±a Mejia', 'Masculino', '0716-250992-101-1', '04700556-2', 'San  Vicente', '7792-7235', 'cesar@gmail.com', 'Publica', 1, 3, 5, 'Reingreso Actividades Academicas'),
(2, 'LM10991', 'Juan Carlos', 'Lopez Mendoza', 'Masculino', '0716-200790-101-6', '02314567-9', 'Cojutepeque Cuscatlan', '7854-9960', 'lm10991@ues.edu.sv', 'Privada', 1, 3, 5, 'Registro'),
(3, 'CM10101', 'Ana Maria', 'Cordova Martinez', 'Femenino', '0187-020489-101-6', '69015670-9', 'Cojutepeque Cuscatlan', '6122-8745', 'cm10101@ues.edu.sv', 'Publica', 1, 6, 12, 'Registro'),
(4, 'EA12050', 'Marta Alicia', 'Espinoza Aragon', 'Femenino', '0199-020691-101-8', '02134567-9', 'San Rafeal Cedros Cuscatlan', '6199-6630', 'ea12050@ues.edu.sv', 'Publica', 1, 1, 2, 'Registro'),
(5, 'EL13045', 'Melvin Ernesto', 'Escobar Lopez', 'Masculino', '0124-031090-102-9', '07895231-9', 'Ilobasco CabaÃ±as', '6100-9874', 'el13045@ues.edu.sv', 'Privada', 1, 1, 1, 'Registro'),
(6, 'MM10991', 'Katherin Sarai', 'Martinez Martinez', 'Femenino', '0171-031194-101-1', '02357891-8', 'Apastepeque San Vicente', '7711-3210', 'mm@ues.edu.sv', 'Privada', 1, 1, 1, 'Registro'),
(7, 'LL11081', 'Marcos Alexander', 'Lopez Landaverde', 'Masculino', '0174-241289-102-9', '04442598-9', 'San Rafael Cedros Cuscatlan', '7525-9971', 'll11081@ues.edu.sv', 'Publica', 1, 6, 12, 'Registro'),
(8, 'IV12334', 'Gabriela Abigail', 'Iraheta Vaquerano', 'Femenino', '0155-250893-102-3', '01245789-6', 'Cojutepeque Cuscatlan', '7966-9800', 'iv@ues.edu.sv', 'Publica', 1, 2, 4, 'Registro'),
(9, 'PR13009', 'Maria Elizabeth', 'Perez Rodriguez', 'Femenino', '0147-250191-102-0', '07895509-8', 'Apastepeque San Vicente', '7000-1247', 'pr13009@ues.edu.sv', 'Privada', 1, 3, 6, 'Registro'),
(10, 'EA15001', 'Noe Edelison', 'Escobar Alas', 'Masculino', '0174-011089-101-7', '03354879-9', 'Tenancingo Cuscatlan', '7332-9801', 'ea15001@ues.edu.sv', 'Privada', 1, 3, 6, 'Registro'),
(11, 'TM10991', 'Jeniffer Daniela', 'Torres Melgal', 'Femenino', '0188-120889-101-8', '01142687-1', 'Cojutepeque Cuscatlan', '6198-8800', 'tm10991@ues.edu.sv', 'Privada', 1, 2, 4, 'Registro'),
(12, 'GM11015', 'Cesar Isaac', 'EspaÃ±a Cartagena', 'Masculino', '0716-100197-101-1', '04700556-1', 'Tenancingo Cuscatlan', '7792-6100', 'gm11015@ues.edu.sv', 'Privada', 1, 3, 6, 'Registro'),
(13, 'VG12018', 'Raul Arcangel', 'Vega Guzman', 'Masculino', '1004-120506-103-2', '52968574-9', 'San Vicente', '2285-9685', 'raul@gmail.com', 'Privada', 1, 1, 2, 'Registro');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`idfacultad`, `nombre_fa`, `telefono_fa`, `correo_fa`, `estado_fa`, `id_re_fafk`) VALUES
(1, 'Facultad de Ciencias Naturales y MatemÃ¡tica', '2355-8876', 'ccn_mat@ues.edu.sv', 1, 3),
(2, 'Facultad de Humanidades', '2133-0988', 'humanidades@ues.edu.sv', 1, 2),
(3, 'Facultad de IngenierÃ­a y Arquitectura', '2766-4780', 'ing_arq@ues.edu.sv', 1, 8),
(4, 'Facultad de Ciencias Agronomicas', '2113-8775', 'ciencia@ues.edu.sv', 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plan_estudio`
--

INSERT INTO `plan_estudio` (`idplanestudio`, `anio_pe`, `estado_pe`, `estadolleno_pe`, `idcarrerafk`) VALUES
(1, '1998', 1, 0, 5),
(2, '2017', 1, 0, 1),
(3, '2016', 1, 0, 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `representante_facultad`
--

INSERT INTO `representante_facultad` (`id_re_fa`, `nombre_rf`, `apellido_rf`, `genero_rf`, `telefono_rf`, `correo_rf`, `estado_rf`, `observacion_rf`) VALUES
(1, 'Luis Antonio', 'Rodriguez Lara', 'Masculino', '7785-4125', 'luisantonio@ues.edu.sv', 1, ''),
(2, 'Jose Roberto', 'Carranza Diaz', 'Masculino', '2334-4710', 'carranza21@gmail.com', 0, 'se salio'),
(3, 'Francisco ', 'Martinez', 'Masculino', '7899-2147', 'martinez@ues.edu.sv', 1, ''),
(4, 'Roberto', 'Lopez', 'Masculino', '2112-8997', 'lopez@ues.edu.sv', 1, ''),
(5, 'Jorge Isai', 'Duran Escobar', 'Masculino', '7696-8574', 'jorge@gmail.com', 1, ''),
(6, 'Maria ', 'Arias', 'Femenino', '7963-8573', 'maria@ues.edu.sv', 1, 'volvio de regreso'),
(7, 'Lucas Raul', 'Martinez Escamilla', 'Masculino', '7896-8574', 'lu@gmail.com', 1, 'se dio de alta'),
(8, 'Ricardo Amaya', 'Martinez Ramirez', 'Masculino', '2255-9685', 'Ricard@gmail.com', 1, 'Registro');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
