-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.16-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para creando
CREATE DATABASE IF NOT EXISTS `creando` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `creando`;


-- Volcando estructura para tabla creando.asociados
CREATE TABLE IF NOT EXISTS `asociados` (
  `asoc_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `asoc_descripcion` varchar(250) DEFAULT NULL,
  `asoc_tipo` int(11) DEFAULT NULL,
  `asoc_nombre` varchar(250) DEFAULT NULL,
  `asoc_telefono` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`asoc_codigo`),
  UNIQUE KEY `asoc_descripcion` (`asoc_descripcion`),
  KEY `asoc_tipo` (`asoc_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla creando.asociados: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `asociados` DISABLE KEYS */;
INSERT INTO `asociados` (`asoc_codigo`, `asoc_descripcion`, `asoc_tipo`, `asoc_nombre`, `asoc_telefono`) VALUES
	(4, 'Alcaldía Municipio Barinas', 3, 'Berenice Méndez', '0273-5350130');
/*!40000 ALTER TABLE `asociados` ENABLE KEYS */;


-- Volcando estructura para tabla creando.estructura
CREATE TABLE IF NOT EXISTS `estructura` (
  `estr_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `estr_descripcion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`estr_codigo`),
  UNIQUE KEY `estr_descripcion` (`estr_descripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla creando.estructura: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `estructura` DISABLE KEYS */;
INSERT INTO `estructura` (`estr_codigo`, `estr_descripcion`) VALUES
	(1, 'Regional');
/*!40000 ALTER TABLE `estructura` ENABLE KEYS */;


-- Volcando estructura para tabla creando.estruc_regional
CREATE TABLE IF NOT EXISTS `estruc_regional` (
  `estreg_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `estreg_descripcion` varchar(250) DEFAULT NULL,
  `estreg_nombre` varchar(250) DEFAULT NULL,
  `estreg_telefono` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`estreg_codigo`),
  UNIQUE KEY `estreg_descripcion` (`estreg_descripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla creando.estruc_regional: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `estruc_regional` DISABLE KEYS */;
INSERT INTO `estruc_regional` (`estreg_codigo`, `estreg_descripcion`, `estreg_nombre`, `estreg_telefono`) VALUES
	(2, 'Director regional', 'Leomyr Rojas', '0273-5');
/*!40000 ALTER TABLE `estruc_regional` ENABLE KEYS */;


-- Volcando estructura para tabla creando.mensajes
CREATE TABLE IF NOT EXISTS `mensajes` (
  `men_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `men_fecha` date DEFAULT NULL,
  `men_nombre` varchar(250) DEFAULT NULL,
  `men_correo` varchar(250) DEFAULT NULL,
  `men_asunto` varchar(250) DEFAULT NULL,
  `men_mensaje` text,
  PRIMARY KEY (`men_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla creando.mensajes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `mensajes` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensajes` ENABLE KEYS */;


-- Volcando estructura para tabla creando.municipio
CREATE TABLE IF NOT EXISTS `municipio` (
  `mun_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `mun_descripcion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`mun_codigo`),
  UNIQUE KEY `mun_descripcion` (`mun_descripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla creando.municipio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
INSERT INTO `municipio` (`mun_codigo`, `mun_descripcion`) VALUES
	(1, 'ALBERTO ARVELO TORREALBA');
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;


-- Volcando estructura para tabla creando.m_menu_emp_menj
CREATE TABLE IF NOT EXISTS `m_menu_emp_menj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ConexMenuMaster` int(11) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `menu` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conex` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `funcion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Imagen` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `ancho` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alto` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nivel` text COLLATE utf8_unicode_ci,
  `CA` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CAdmin` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orden` (`orden`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla creando.m_menu_emp_menj: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `m_menu_emp_menj` DISABLE KEYS */;
INSERT INTO `m_menu_emp_menj` (`id`, `ConexMenuMaster`, `orden`, `menu`, `conex`, `funcion`, `Imagen`, `ancho`, `alto`, `nivel`, `CA`, `CAdmin`) VALUES
	(1, NULL, 1, 'Administrador', 'menu.php', NULL, 'fa fa-life-ring', NULL, NULL, NULL, NULL, NULL),
	(58, NULL, NULL, 'Comunidades', NULL, NULL, 'fa fa-life-ring', NULL, NULL, NULL, NULL, NULL),
	(59, NULL, NULL, 'Estructuras', NULL, NULL, 'fa fa-life-ring', NULL, NULL, NULL, NULL, NULL),
	(60, NULL, NULL, 'Socios/Aliados', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `m_menu_emp_menj` ENABLE KEYS */;


-- Volcando estructura para tabla creando.m_menu_emp_sub_menj
CREATE TABLE IF NOT EXISTS `m_menu_emp_sub_menj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enlace` int(11) NOT NULL DEFAULT '0',
  `enlacesub` char(3) DEFAULT NULL,
  `Act` char(1) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `menu` varchar(250) DEFAULT NULL,
  `conex` varchar(250) DEFAULT NULL,
  `Url_1` varchar(100) NOT NULL,
  `Url_2` varchar(100) NOT NULL,
  `Url_3` varchar(100) NOT NULL,
  `Url_4` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Url_5` varchar(100) NOT NULL,
  `Url_6` varchar(100) DEFAULT NULL,
  `Url_7` varchar(100) DEFAULT NULL,
  `Url_8` varchar(100) DEFAULT NULL,
  `Url_9` varchar(100) DEFAULT NULL,
  `Url_10` varchar(100) DEFAULT NULL,
  `Inserte` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Updated` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Deleted` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Acciones` varchar(80) NOT NULL,
  `Ejecutar` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `conexd` varchar(200) DEFAULT NULL,
  `funcion` varchar(100) DEFAULT NULL,
  `nivel` text,
  `CA` char(2) DEFAULT NULL,
  `CAdmin` int(1) DEFAULT NULL,
  `CssColor` varchar(50) NOT NULL,
  `CssImagen` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `enlace` (`enlace`),
  CONSTRAINT `m_menu_emp_sub_menj_ibfk_1` FOREIGN KEY (`enlace`) REFERENCES `m_menu_emp_menj` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla creando.m_menu_emp_sub_menj: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `m_menu_emp_sub_menj` DISABLE KEYS */;
INSERT INTO `m_menu_emp_sub_menj` (`id`, `enlace`, `enlacesub`, `Act`, `orden`, `menu`, `conex`, `Url_1`, `Url_2`, `Url_3`, `Url_4`, `Url_5`, `Url_6`, `Url_7`, `Url_8`, `Url_9`, `Url_10`, `Inserte`, `Updated`, `Deleted`, `Acciones`, `Ejecutar`, `conexd`, `funcion`, `nivel`, `CA`, `CAdmin`, `CssColor`, `CssImagen`) VALUES
	(55, 1, NULL, NULL, 2, 'Usuarios', 'menu.php', 'conf_usuario/crear_usuario.php', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
	(110, 1, NULL, NULL, 1, 'Administrar Perfiles', 'menu.php', 'admin_perfil/conf_perfil.php', 'admin_perfil/conf_menu_list.php', 'admin_perfil/conf_menu_accion.php', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
	(135, 58, NULL, NULL, NULL, 'Municipios', NULL, 'sistema/municipios/municipios.php', '', '', '', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
	(137, 58, NULL, NULL, NULL, 'Parroquias', NULL, 'sistema/parroquias/parroquias.php', '', '', '', '', NULL, NULL, NULL, NULL, 'sistema/parroquias/recargar.php', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
	(138, 59, NULL, NULL, NULL, 'Listado de Estrcuturas', NULL, 'sistema/estructura/estructura.php', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
	(139, 59, NULL, NULL, NULL, 'Estructura Regional', NULL, 'sistema/estructura/regional.php', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
	(141, 59, NULL, NULL, NULL, 'Voluntarios', NULL, 'sistema/estructura/voluntario.php', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
	(143, 60, NULL, NULL, NULL, 'Listado de Socios', NULL, 'sistema/socios/socios.php', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '');
/*!40000 ALTER TABLE `m_menu_emp_sub_menj` ENABLE KEYS */;


-- Volcando estructura para tabla creando.parroquia
CREATE TABLE IF NOT EXISTS `parroquia` (
  `par_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `par_muncodigo` int(11) NOT NULL DEFAULT '0',
  `par_descripcion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`par_codigo`),
  UNIQUE KEY `par_descripcion` (`par_descripcion`),
  KEY `par_muncodigo` (`par_muncodigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla creando.parroquia: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `parroquia` DISABLE KEYS */;
INSERT INTO `parroquia` (`par_codigo`, `par_muncodigo`, `par_descripcion`) VALUES
	(1, 1, 'Alto Barinas');
/*!40000 ALTER TABLE `parroquia` ENABLE KEYS */;


-- Volcando estructura para tabla creando.perfiles
CREATE TABLE IF NOT EXISTS `perfiles` (
  `CodPerfil` int(11) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`CodPerfil`),
  UNIQUE KEY `Nombre` (`Nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla creando.perfiles: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
INSERT INTO `perfiles` (`CodPerfil`, `Nombre`) VALUES
	(1, 'Administrador'),
	(2, 'god'),
	(3, 'Operador');
/*!40000 ALTER TABLE `perfiles` ENABLE KEYS */;


-- Volcando estructura para tabla creando.perfiles_det
CREATE TABLE IF NOT EXISTS `perfiles_det` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `IdPerfil` int(11) NOT NULL DEFAULT '0',
  `Submenu` int(11) NOT NULL DEFAULT '0',
  `Menu` int(11) NOT NULL DEFAULT '0',
  `S` tinyint(4) NOT NULL,
  `U` tinyint(4) NOT NULL,
  `D` tinyint(4) NOT NULL,
  `I` tinyint(4) NOT NULL,
  `P` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `IdPerfil_2` (`IdPerfil`,`Submenu`,`Menu`),
  KEY `IdPerfil` (`IdPerfil`),
  KEY `Submenu` (`Submenu`),
  KEY `Menu` (`Menu`),
  CONSTRAINT `perfiles_det_ibfk_1` FOREIGN KEY (`IdPerfil`) REFERENCES `perfiles` (`CodPerfil`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `perfiles_det_ibfk_2` FOREIGN KEY (`Menu`) REFERENCES `m_menu_emp_menj` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `perfiles_det_ibfk_3` FOREIGN KEY (`Submenu`) REFERENCES `m_menu_emp_sub_menj` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=367 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla creando.perfiles_det: ~23 rows (aproximadamente)
/*!40000 ALTER TABLE `perfiles_det` DISABLE KEYS */;
INSERT INTO `perfiles_det` (`id`, `IdPerfil`, `Submenu`, `Menu`, `S`, `U`, `D`, `I`, `P`) VALUES
	(1, 1, 110, 1, 0, 1, 1, 0, 1),
	(113, 1, 55, 1, 1, 1, 1, 1, 1),
	(225, 2, 110, 1, 1, 1, 1, 1, 1),
	(226, 2, 55, 1, 1, 1, 1, 1, 1),
	(278, 2, 135, 58, 1, 1, 1, 1, 1),
	(283, 2, 137, 58, 1, 1, 1, 1, 1),
	(288, 2, 138, 58, 1, 1, 1, 1, 1),
	(293, 2, 138, 59, 1, 1, 1, 1, 1),
	(298, 2, 139, 59, 1, 1, 1, 1, 1),
	(303, 2, 141, 59, 1, 1, 1, 1, 1),
	(308, 2, 143, 60, 1, 1, 1, 1, 1),
	(313, 1, 135, 58, 1, 1, 1, 1, 1),
	(314, 1, 137, 58, 1, 1, 1, 1, 1),
	(315, 1, 139, 59, 1, 1, 1, 1, 1),
	(316, 1, 138, 59, 1, 1, 1, 1, 1),
	(317, 1, 141, 59, 1, 1, 1, 1, 1),
	(318, 1, 143, 60, 1, 1, 1, 1, 1),
	(343, 3, 135, 58, 1, 1, 1, 1, 0),
	(344, 3, 137, 58, 1, 1, 1, 1, 0),
	(345, 3, 139, 59, 1, 1, 1, 1, 0),
	(346, 3, 138, 59, 1, 1, 1, 1, 0),
	(347, 3, 141, 59, 1, 1, 1, 1, 0),
	(348, 3, 143, 60, 1, 1, 1, 1, 0);
/*!40000 ALTER TABLE `perfiles_det` ENABLE KEYS */;


-- Volcando estructura para tabla creando.recargar
CREATE TABLE IF NOT EXISTS `recargar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `URL` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `actd` int(1) NOT NULL,
  `Accion` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=354 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla creando.recargar: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `recargar` DISABLE KEYS */;
INSERT INTO `recargar` (`id`, `URL`, `actd`, `Accion`) VALUES
	(1, 'uploader/receiver.php', 0, ''),
	(2, 'recargar/recargar.php', 0, ''),
	(3, 'recargar/recargar.php', 0, ''),
	(4, 'sistema/documentos/selectorAnual.php', 0, ''),
	(5, 'sistema/documentos/selectorMes.php', 0, ''),
	(351, 'sistema/index.php', 0, ''),
	(352, 'recargar/recargar.php', 1, ''),
	(353, 'sistema/reportes/pdf_constancia.php', 0, '');
/*!40000 ALTER TABLE `recargar` ENABLE KEYS */;


-- Volcando estructura para tabla creando.registrados
CREATE TABLE IF NOT EXISTS `registrados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nacionalidad` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Usuario` int(11) NOT NULL,
  `cedula` int(11) NOT NULL DEFAULT '0',
  `Nombres` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Apellidos` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla creando.registrados: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `registrados` DISABLE KEYS */;
INSERT INTO `registrados` (`id`, `nacionalidad`, `Usuario`, `cedula`, `Nombres`, `Apellidos`, `sexo`, `correo`) VALUES
	(1, '', 0, 12345, 'laya', 'juan', '', ''),
	(2, '', 0, 21589306, 'Maria', 'Fernandez', '', ''),
	(3, '', 0, 19191493, 'gabriel', 'rojas', '', ''),
	(4, '', 0, 19191492, 'sadasd', 'asdas', '', ''),
	(6, '', 0, 123123, 'operador', 'operador', '', ''),
	(8, '', 0, 123456, 'admin', 'admin', '', ''),
	(9, '', 0, 123321, 'adminpre', 'adminpre', '', '');
/*!40000 ALTER TABLE `registrados` ENABLE KEYS */;


-- Volcando estructura para tabla creando.sexo
CREATE TABLE IF NOT EXISTS `sexo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Sexo';

-- Volcando datos para la tabla creando.sexo: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `sexo` DISABLE KEYS */;
INSERT INTO `sexo` (`id`, `Nombre`) VALUES
	(1, 'Masculino'),
	(2, 'Femenino');
/*!40000 ALTER TABLE `sexo` ENABLE KEYS */;


-- Volcando estructura para tabla creando.tools_estatus
CREATE TABLE IF NOT EXISTS `tools_estatus` (
  `est_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `est_descripcion` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`est_codigo`),
  UNIQUE KEY `est_descripcion` (`est_descripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla creando.tools_estatus: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tools_estatus` DISABLE KEYS */;
INSERT INTO `tools_estatus` (`est_codigo`, `est_descripcion`) VALUES
	(1, 'ACTIVO'),
	(3, 'APROBADO'),
	(4, 'EJECUTADO'),
	(2, 'INACTIVO');
/*!40000 ALTER TABLE `tools_estatus` ENABLE KEYS */;


-- Volcando estructura para tabla creando.tools_tipo
CREATE TABLE IF NOT EXISTS `tools_tipo` (
  `tip_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `tip_descripcion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`tip_codigo`),
  UNIQUE KEY `tip_descripcion` (`tip_descripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla creando.tools_tipo: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tools_tipo` DISABLE KEYS */;
INSERT INTO `tools_tipo` (`tip_codigo`, `tip_descripcion`) VALUES
	(3, 'INDEPENDIENTE'),
	(2, 'PRIVADO'),
	(1, 'PUBLICO');
/*!40000 ALTER TABLE `tools_tipo` ENABLE KEYS */;


-- Volcando estructura para tabla creando.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Cedula` int(11) NOT NULL DEFAULT '0',
  `Usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Nombres` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Apellidos` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `contrasena` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `CodSede` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Tipo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Nivel` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Stilo` int(1) NOT NULL,
  `theme_color` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Codigo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Registro` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Fecha` datetime NOT NULL,
  `Observacion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Usuario` (`Usuario`),
  UNIQUE KEY `Cedula_2` (`Tipo`,`Cedula`),
  KEY `Tipo` (`Cedula`,`Tipo`,`Usuario`),
  KEY `Cedula` (`Codigo`,`Usuario`,`Cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla creando.usuarios: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `Cedula`, `Usuario`, `Nombres`, `Apellidos`, `contrasena`, `CodSede`, `Tipo`, `Nivel`, `Stilo`, `theme_color`, `Codigo`, `Registro`, `Fecha`, `Observacion`) VALUES
	(101, 12345, 'GOD', '', '', 'a1b995eb2627f17bfd5fcb1de8533c62', NULL, 'Empleado', '2', 0, '', 'a04c4', NULL, '0000-00-00 00:00:00', NULL),
	(115, 123123, 'operador', '', '', '06d4f07c943a4da1c8bfe591abbc3579', NULL, 'Empleado', '3', 0, '', '6fa0b', NULL, '0000-00-00 00:00:00', NULL),
	(116, 12345, '', '', '', '', NULL, '', NULL, 0, '', 'a04c4', NULL, '0000-00-00 00:00:00', NULL),
	(118, 123321, 'admin', '', '', '21232f297a57a5a743894a0e4a801fc3', NULL, 'Empleado', '1', 0, '', '0dde2', NULL, '0000-00-00 00:00:00', NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;


-- Volcando estructura para tabla creando.voluntario
CREATE TABLE IF NOT EXISTS `voluntario` (
  `vol_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `vol_cedula` int(11) DEFAULT NULL,
  `vol_nombres` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `vol_apellidos` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `vol_telefonos` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `vol_correo` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `vol_direccion` text COLLATE utf8_bin,
  `vol_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`vol_codigo`),
  UNIQUE KEY `vol_cedula` (`vol_cedula`),
  KEY `per_status` (`vol_status`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla creando.voluntario: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `voluntario` DISABLE KEYS */;
INSERT INTO `voluntario` (`vol_codigo`, `vol_cedula`, `vol_nombres`, `vol_apellidos`, `vol_telefonos`, `vol_correo`, `vol_direccion`, `vol_status`) VALUES
	(6, 12345, 'operador', 'operador', '02735356699', 'correo@gmail.com', 'correo', 1);
/*!40000 ALTER TABLE `voluntario` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
