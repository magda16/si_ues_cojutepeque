-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 14-01-2019 a las 20:21:11
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
-- Estructura de tabla para la tabla `af_categoria`
--

DROP TABLE IF EXISTS `af_categoria`;
CREATE TABLE IF NOT EXISTS `af_categoria` (
  `idafcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_c` varchar(6) NOT NULL,
  `id_nombre_c` varchar(10) NOT NULL,
  `nombre_c` varchar(200) NOT NULL,
  `idafinsfk` int(11) NOT NULL,
  PRIMARY KEY (`idafcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `af_categoria`
--

INSERT INTO `af_categoria` (`idafcategoria`, `codigo_c`, `id_nombre_c`, `nombre_c`, `idafinsfk`) VALUES
(1, '00000', 'MB', 'Bienes Muebles', 1),
(2, '01000', 'EC', 'Equipo de Computo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `af_cod_institucional`
--

DROP TABLE IF EXISTS `af_cod_institucional`;
CREATE TABLE IF NOT EXISTS `af_cod_institucional` (
  `idafins` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(6) NOT NULL,
  `id_nombre` varchar(10) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`idafins`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `af_cod_institucional`
--

INSERT INTO `af_cod_institucional` (`idafins`, `codigo`, `id_nombre`, `nombre`) VALUES
(1, '11792', 'R', 'Código Institucional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `af_subcategoria`
--

DROP TABLE IF EXISTS `af_subcategoria`;
CREATE TABLE IF NOT EXISTS `af_subcategoria` (
  `idafsubc` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_s` varchar(6) NOT NULL,
  `id_nombre_s` varchar(10) NOT NULL,
  `nombre_s` varchar(200) NOT NULL,
  `cantidad_s` int(11) NOT NULL,
  `idafcategoriafk` int(11) NOT NULL,
  PRIMARY KEY (`idafsubc`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `af_subcategoria`
--

INSERT INTO `af_subcategoria` (`idafsubc`, `codigo_s`, `id_nombre_s`, `nombre_s`, `cantidad_s`, `idafcategoriafk`) VALUES
(1, '00001', 'EMM', 'Escritorio Mediano Metalico', 0, 1),
(2, '00002', 'EGM', 'Escritorio Grande Metalico', 0, 1),
(3, '00003', 'L', 'Laptop', 0, 2);

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`idaula`, `nombre_au`, `ubicacion_au`, `cantidad_au`, `estado_au`, `observacion_au`) VALUES
(1, 'Aula 19', 'Zona 10 Edifico A Segundo nivel', 35, 1, 'Registro'),
(2, 'Aula20', 'Zona 10 Edifico A Segundo nivel', 35, 1, 'Registro'),
(3, 'Aula21', 'Zona 10 Edifico A Segundo nivel', 35, 1, 'Registro'),
(4, 'Aula22', 'Zona 10 Edifico A Segundo nivel', 35, 1, 'Registro'),
(5, 'Aula23', 'Zona 10 Edifico A Segundo nivel', 35, 1, 'Registro'),
(6, 'Aula24', 'Zona 10 Edifico A Segundo nivel', 35, 1, 'Registro'),
(7, 'Laboratorio de Ciencias Naturales', 'Zona 26 pasillo uno aula 2', 30, 1, 'Registro');

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
(1, 'L10902', 'Licenciatura en InformÃ¡tica Educativa ', 5, 1, 'Registro', 1),
(2, 'L10904', 'Licenciatura en EnseÃ±anza de la MatemÃ¡tica', 5, 1, 'Registro', 1),
(3, 'L10415', 'Licenciatura en EnseÃ±anza del Ingles', 5, 1, 'Registro', 2),
(4, 'L10515', 'IngenierÃ­a de Sistemas InformÃ¡ticos', 5, 1, 'Registro', 3),
(5, 'L10502', 'IngenierÃ­a Industrial', 5, 1, 'Registro', 3),
(6, 'L10805', 'Licenciatura en Mercadeo internacional', 5, 1, 'Registro', 4);

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
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`idestudiante`, `carnet_es`, `nombre_es`, `apellido_es`, `genero_es`, `NIT_es`, `DUI_es`, `direccion_es`, `telefono_es`, `correo_es`, `procedencia_es`, `estado_es`, `idfacultad`, `idcarrera`, `idplan_estudio`, `observacion_es`) VALUES
(1, 'AM16123', 'Criseyda Guadalupe', 'Araujo de MelÃ©ndez', 'Femenino', '0106-051196-159-0', '01981613-7', 'Cojutepeque CuscatlÃ¡n ', '7096-0936', 'am16123@ues.edu.sv', 'Publica', 1, 1, 1, 1, 'Registro'),
(2, 'CH16038', 'MarÃ­a Erika', 'Castillo HernÃ¡ndez', 'Femenino', '0131-081192-122-0', '02853380-1', 'Ilobasco CabaÃ±as', '7923-2736', 'ch16038@ues.edu.sv', 'Publica', 1, 1, 1, 1, 'Registro'),
(3, 'MD16044', 'Jael Abigail', 'Morales de Orellana', 'Femenino', '0140-071195-122-2', '08479608-7', 'San Rafael Cedros', '7883-0229', 'md16044@ues.edu.sv', 'Publica', 1, 1, 1, 1, 'Registro'),
(4, 'HS16020', 'Edwin Alexander', 'HenrÃ­quez SÃ¡nchez', 'Masculino', '0148-240797-179-7', '09285981-4', 'El Carme CuscatlÃ¡n', '7693-5615', 'hs16020@ues.edu.sv', 'Privada', 1, 1, 1, 1, 'Registro'),
(5, 'LZ16005', 'Cristian Antonio', 'LÃ³pez Zepeda', 'Masculino', '0178-200795-171-5', '04630603-8', 'Santa Cruz Michapa', '7035-7129', 'lz16005@ues.edu.sv', 'Publica', 1, 1, 1, 1, 'Registro'),
(6, 'AC16097', 'Omar Ernesto', 'Alas Chachagua', 'Masculino', '0140-120397-139-5', '08241408-2', 'El Pino CuscatlÃ¡n', '7511-4061', 'ac16097@ues.edu.sv', 'Publica', 1, 1, 1, 1, 'Registro'),
(7, 'IM17005', 'Cruz Yesenia', 'Iraheta MelÃ©ndez', 'Femenino', '0135-151291-143-8', '05752082-8', 'Santo Domingo San Vicente', '7500-1603', 'im17005@ues.edu.sv', 'Publica', 1, 1, 1, 1, 'Registro'),
(8, 'MQ17007', 'Cecilia Arely', 'MartÃ­nez Quinteros', 'Femenino', '0133-211292-142-1', '08573271-0', 'San SebastiÃ¡n San Vicente', '7320-2085', 'mq17007@ues.edu.sv', 'Publica', 1, 1, 1, 1, 'Registro'),
(9, 'HC17041', 'Rafael Alfonso', 'HernÃ¡ndez Cruz', 'Masculino', '0102-010591-139-8', '08795145-4', 'Ilobasco CabaÃ±as', '7112-1710', 'hc17041@ues.edu.sv', 'Publica', 1, 1, 1, 1, 'Registro'),
(10, 'RD17028', 'Eduardo Antonio', 'Rosales DÃ­az', 'Masculino', '0117-250594-106-3', '00997348-1', 'El Carme CuscatlÃ¡n', '7167-9310', 'rd17028@ues.edu.sv', 'Publica', 1, 1, 1, 1, 'Registro'),
(11, 'VC17036', 'David Antonio', 'Valladares CÃ¡mpos', 'Masculino', '0178-100997-103-3', '09784224-8', 'Cojutepeque CuscatlÃ¡n', '7584-4011', 'vc17036@ues.edu.sv', 'Publica', 1, 1, 1, 1, 'Registro'),
(12, 'FH17017', 'Carlos AgustÃ­n', 'FernÃ¡ndez HernÃ¡ndez', 'Masculino', '0141-120897-154-8', '07514816-1', 'Cojutepeque CuscatlÃ¡n', '7039-8409', 'fh17017@ues.edu.sv', 'Publica', 1, 1, 1, 1, 'Registro'),
(13, 'MC17127', 'Roberto Alfonso', 'Masferrer Cornejo', 'Masculino', '0149-140993-169-1', '00130775-4', 'El Carme CuscatlÃ¡n', '7588-8927', 'mc17127@ues.edu.sv', 'Publica', 1, 1, 1, 1, 'Registro'),
(14, 'LC17037', 'Tania Judith', 'LÃ³pez ChÃ¡vez', 'Femenino', '0174-150995-121-3', '09092389-6', 'San Rafael Cedros', '7980-9817', 'lc17037@ues.edu.sv', 'Publica', 1, 1, 1, 1, 'Registro'),
(15, 'BM17042', 'Anabel de Jesus', 'BeltrÃ¡n MartÃ­nez', 'Femenino', '0184-180997-123-8', '04886805-3', 'Santo Domingo San Vicente', '7589-4138', 'bm17042@ues.edu.sv', 'Publica', 1, 1, 1, 1, 'Registro'),
(16, 'PD17012', 'MarÃ­a Reinita', 'PÃ©rez de Valladares', 'Femenino', '0186-260990-137-0', '09557015-1', 'Ilobasco CabaÃ±as', '7410-2594', 'pd17012@ues.edu.sv', 'Publica', 1, 1, 1, 1, 'Registro'),
(17, 'RG17064', 'Jaime Alberto', 'Reyes Gabriel', 'Masculino', '0118-230993-144-9', '03222202-5', 'Santo Domingo San Vicente', '7521-4168', 'rg17064@ues.edu.sv', 'Publica', 1, 1, 1, 1, 'Registro'),
(18, 'AF18025', 'Yasmina Soledad', 'Aguirre de Flores', 'Femenino', '0196-230992-127-2', '01936159-7', 'Cojutepeque CuscatlÃ¡n', '7610-0940', 'AF18025@ues.edu.sv', 'Publica', 1, 1, 1, 1, 'Registro'),
(19, 'HC18048', 'Josselyn del Carmen', 'HernÃ¡ndez Cruz', 'Femenino', '0163-220892-143-2', '08768194-7', 'El Pino CuscatlÃ¡n', '7152-1850', 'HC18048@ues.edu.sv', 'Publica', 1, 1, 1, 1, 'Registro'),
(20, 'PA18043', 'Alexis HernÃ¡n', 'Palacios Ardon', 'Masculino', '0167-260891-162-9', '03976913-7', 'Cojutepeque CuscatlÃ¡n', '7390-9289', 'PA18043@ues.edu.sv', 'Publica', 1, 1, 1, 1, 'Registro'),
(21, 'PS18014', 'Gustavo Adolfo', 'Palacios Sandoval', 'Masculino', '0108-290898-176-4', '02171159-4', 'Ilobasco CabaÃ±as', '7962-6314', 'PS18014@ues.edu.sv', 'Publica', 1, 1, 1, 1, 'Registro'),
(22, 'RE06011', 'Luis Humberto', 'Rivas Escalante', 'Masculino', '0140-150892-184-2', '05745112-0', 'San Rafael Cedros', '7922-6011', 'RE06011@ues.edu.sv', 'Publica', 1, 1, 1, 1, 'Registro'),
(23, 'SV16030', 'Elvin SaÃºl', 'Sibrian VÃ¡squez', 'Masculino', '0124-070491-197-1', '08326999-5', 'Ilobasco CabaÃ±as', '7294-5853', 'sv16030@ues.edu.sv', 'Publica', 1, 1, 2, 2, 'Registro'),
(24, 'MM16198', 'VÃ­ctor Manuel', 'MartÃ­nez MartÃ­nez', 'Masculino', '0124-040497-182-2', '06671667-4', 'Cojutepeque CuscatlÃ¡n', '7132-1283', 'mm16198@ues.edu.sv', 'Privada', 1, 1, 2, 2, 'Registro'),
(25, 'HS17024', 'Karen Yaneth', 'Hernandez Suria', 'Femenino', '0181-060495-187-3', '05477406-0', 'San Rafael Cedros', '7929-2619', 'hs17024@ues.edu.sv', 'Publica', 1, 1, 2, 2, 'Registro'),
(26, 'CM18088', 'Douglas Bladimir', 'Cruz MarroquÃ­n', 'Masculino', '0187-180890-187-4', '06104148-1', 'San Rafael Cedros', '7896-2770', 'CM18088@ues.edu.sv', 'Publica', 1, 1, 2, 2, 'Registro'),
(27, 'DM18029', 'Dora Alicia', 'DÃ­az MejÃ­a', 'Femenino', '0178-080891-134-4', '04029014-3', 'Cojutepeque CuscatlÃ¡n', '7277-8051', 'DM18029@ues.edu.sv', 'Publica', 1, 1, 2, 2, 'Registro'),
(28, 'MM18148', 'Gloria Yesenia', 'Marmol de MuÃ±oz', 'Femenino', '0176-010493-163-6', '00239980-2', 'Santo Domingo San Vicente', '7740-9941', 'MM18148@ues.edu.sv', 'Publica', 1, 1, 2, 2, 'Registro'),
(29, 'RL18030', 'Karina Lisbeth', 'Rivera Leiva', 'Femenino', '0168-070498-191-6', '04399122-0', 'Ilobasco CabaÃ±as', '7571-2998', 'RL18030@ues.edu.sv', 'Privada', 1, 1, 2, 2, 'Registro'),
(30, 'RM18087', 'Karen Yamileth', 'RodrÃ­guez Mendoza', 'Femenino', '0143-200694-141-3', '03605077-4', 'El Carme CuscatlÃ¡n', '7448-2094', 'RM18087@ues.edu.sv', 'Publica', 1, 1, 2, 2, 'Registro'),
(31, 'MM10061', 'Ana Maria', 'Ruth Mendoza', 'Femenino', '0173-240692-165-3', '01822512-7', 'Ilobasco CabaÃ±as', '7785-3246', 'mm10061@ues.edu.sv', 'Publica', 1, 1, 2, 2, 'Registro'),
(32, 'LM16044', 'Stefany Beatriz', 'Platero LÃ³pez', 'Femenino', '0142-130691-105-2', '07129607-6', 'Cojutepeque CuscatlÃ¡n', '7343-3386', 'lm16044@ues.edu.sv', 'Publica', 1, 1, 2, 2, 'Registro'),
(33, 'CH16041', 'Vilma Milagro', 'Castillo Hidalgo', 'Femenino', '0198-281193-114-6', '09356990-9', 'Santo Domingo San Vicente', '7346-3085', 'ch16041@ues.edu.sv', 'Publica', 1, 2, 3, 3, 'Registro'),
(34, 'MG18070', 'Bryan Alexis', 'MartÃ­nez GonzÃ¡lez', 'Masculino', '0135-211192-178-5', '07394877-6', 'San Rafael Cedros', '7449-0072', 'MG18070@ues.edu.sv', 'Publica', 1, 2, 3, 3, 'Registro'),
(35, 'LB18006', 'Aida Isabel', 'LÃ³pez Bonilla', 'Femenino', '0171-251194-190-0', '05100761-2', 'Cojutepeque CuscatlÃ¡n', '7986-2867', 'LB18006@ues.edu.sv', 'Publica', 1, 2, 3, 3, 'Registro'),
(36, 'MR18065', 'Liliana Elizabeth', 'MejÃ­a de Rosales', 'Femenino', '0101-130396-169-5', '01358493-7', 'Ilobasco CabaÃ±as', '7000-0940', 'MR18065@ues.edu.sv', 'Publica', 1, 2, 3, 3, 'Registro'),
(37, 'RR18090', 'Liliana del Carmen', 'Ramos Rivera', 'Femenino', '0165-100393-168-6', '02542614-6', 'El Pino CuscatlÃ¡n', '7511-5970', 'RR18090@ues.edu.sv', 'Publica', 1, 2, 3, 3, 'Registro'),
(38, 'RR18092', 'JosÃ© Roberto', 'Reyes RamÃ­rez', 'Masculino', '0184-261295-100-1', '01232368-5', 'San Rafael Cedros', '7007-0437', 'RR18092@ues.edu.sv', 'Privada', 1, 2, 3, 3, 'Registro'),
(39, 'TM18008', 'Roberto Leonel', 'Torres MartÃ­nez', 'Masculino', '0117-091292-114-2', '01228377-6', 'Santo Domingo San Vicente', '7410-8841', 'TM18008@ues.edu.sv', 'Publica', 1, 2, 3, 3, 'Registro'),
(40, 'VV18003', 'Juan Pablo', 'Ventura', 'Masculino', '0106-181291-161-4', '08509488-9', 'Cojutepeque CuscatlÃ¡n', '7839-8901', 'VV18003@ues.edu.sv', 'Publica', 1, 2, 3, 3, 'Registro'),
(41, 'PL18028', 'HÃ©ctor Isaac', 'Pineda Larreynaga', 'Masculino', '0192-201296-119-3', '00012080-2', 'El Carme CuscatlÃ¡n', '7963-9984', 'pl18028@ues.edu.sv', 'Publica', 1, 2, 3, 3, 'Registro'),
(42, 'LM18047', 'Iris MarÃ­a', 'LÃ³pez Morales', 'Femenino', '0101-110597-126-7', '01045889-8', 'Ilobasco CabaÃ±as', '7531-0541', 'lm18047@ies.edu.sv', 'Publica', 1, 2, 3, 3, 'Registro');

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
(1, 'Facultad de Ciencias Naturales', '2255-2310', 'ci_mat@ues.edu.sv', 1, 1),
(2, 'Facultad de Humanidades', '2530-8974', 'humanidades@ues.edu.sv', 1, 2),
(3, 'Facultad de IngenierÃ­a y Arquitectura', '2140-9021', 'ing_arq@ues.edu.sv', 1, 3),
(4, 'Facultad de Ciencias EconÃ³micas ', '2455-2145', 'ci_eco@ues.edu.sv', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_af`
--

DROP TABLE IF EXISTS `inventario_af`;
CREATE TABLE IF NOT EXISTS `inventario_af` (
  `idinaf` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_inv` int(11) NOT NULL,
  `tipo_bien_inv` int(11) NOT NULL,
  `codigo` varchar(40) NOT NULL,
  `descripcion` text NOT NULL,
  `observacion` text NOT NULL,
  `calidad` varchar(8) NOT NULL,
  `marca` text NOT NULL,
  `modelo` text NOT NULL,
  `nserie` text NOT NULL,
  `lote` text NOT NULL,
  `fecha_adquisicion` date NOT NULL,
  `financiamiento` int(11) NOT NULL,
  `valor_adq` varchar(20) NOT NULL,
  `valor_estimado` varchar(3) NOT NULL,
  `doc_adquisicion` text NOT NULL,
  `proveedor` text NOT NULL,
  `estado_af` int(11) NOT NULL,
  `observacion_af` text NOT NULL,
  PRIMARY KEY (`idinaf`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inventario_af`
--

INSERT INTO `inventario_af` (`idinaf`, `categoria_inv`, `tipo_bien_inv`, `codigo`, `descripcion`, `observacion`, `calidad`, `marca`, `modelo`, `nserie`, `lote`, `fecha_adquisicion`, `financiamiento`, `valor_adq`, `valor_estimado`, `doc_adquisicion`, `proveedor`, `estado_af`, `observacion_af`) VALUES
(1, 1, 1, '11792-00000-00001-00001', 'des', 'obs', 'Malo', 'm1', 'm23', '2', '', '2018-12-31', 3, '234', 'no', '../../../../Activo_Fijo/11792-00000-00001-00001/activo_fijo.jpeg', 'pro', 1, 'Registro'),
(2, 2, 3, '11792-01000-00003-00001', 'des', 'obs', 'Regular', 'mar', 'modelo', 'sw', '', '2018-12-31', 2, '258', 'no', '../../../../Activo_Fijo/11792-01000-00003-00001/activo_fijo.jpeg', 'edwe', 1, 'Registro'),
(3, 1, 1, '11792-00000-00001-00001', 'des', 'obs', 'Malo', 'mar', 'mod', 's2', '', '2019-01-14', 2, '650', 'no', '../../../../Activo_Fijo/11792-00000-00001-00001/activo_fijo.jpeg', 'prove', 1, 'Registro'),
(4, 1, 1, '11792-00000-00001-00001', 'des', 'ob', 'Regular', 'wew', 'ww', 'ww', '', '2019-01-06', 2, 'ww', 'no', '../../../../Activo_Fijo/11792-00000-00001-00001/activo_fijo.jpeg', 'ww', 1, 'Registro');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plan_estudio`
--

INSERT INTO `plan_estudio` (`idplanestudio`, `anio_pe`, `estado_pe`, `estadolleno_pe`, `idcarrerafk`) VALUES
(1, '2015', 1, 0, 1),
(2, '2015', 1, 0, 2),
(3, '2015', 1, 0, 3),
(4, '2016', 1, 0, 4),
(5, '2017', 1, 0, 5),
(6, '2017', 1, 0, 6);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `representante_facultad`
--

INSERT INTO `representante_facultad` (`id_re_fa`, `nombre_rf`, `apellido_rf`, `genero_rf`, `telefono_rf`, `correo_rf`, `estado_rf`, `observacion_rf`) VALUES
(1, 'Luis Antonio', 'RodrÃ­guez Lara', 'Masculino', '6785-4125', 'lara_ues@gmail.com', 1, 'Registro'),
(2, 'JosÃ© Roberto ', 'Carranza DÃ­az', 'Masculino', '6528-9900', 'carranza_ues@gmail.com', 1, 'Registro'),
(3, 'Anabel MarÃ­a', 'Arias Estrada', 'Femenino', '6021-1541', 'arias_ues@gamil.com', 1, 'Registro'),
(4, 'Carlos Francisco', 'MartÃ­nez MartÃ­nez ', 'Masculino', '6850-0000', 'martinez_ues@gmail.com', 1, 'Registro'),
(5, 'Ana Luisa', 'Duran SÃ¡nchez', 'Femenino', '6030-6674', 'duran_ues@gmail.com', 1, 'Registro'),
(6, 'VerÃ³nica Elizabeth', 'Escobar Mendoza', 'Femenino', '6155-9118', 'escobar_ues@gmail.com', 1, 'Registro');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
