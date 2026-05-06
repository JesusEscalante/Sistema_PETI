-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.38-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.10.0.7000
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para homestead
CREATE DATABASE IF NOT EXISTS `homestead` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `homestead`;

-- Volcando estructura para tabla homestead.amenazas
CREATE TABLE IF NOT EXISTS `amenazas` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Amenaza` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.amenazas: ~4 rows (aproximadamente)
DELETE FROM `amenazas`;
INSERT INTO `amenazas` (`Id`, `Amenaza`) VALUES
	(1, 'Amenaza 01'),
	(2, 'Amenaza 02'),
	(3, 'Amenaza 03'),
	(4, 'Amenaza 04');

-- Volcando estructura para tabla homestead.cadena_valor
CREATE TABLE IF NOT EXISTS `cadena_valor` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pregunta` varchar(255) NOT NULL,
  `Valor` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.cadena_valor: ~25 rows (aproximadamente)
DELETE FROM `cadena_valor`;
INSERT INTO `cadena_valor` (`Id`, `Pregunta`, `Valor`) VALUES
	(1, 'La empresa tiene una política sistematizada de cero defectos en la producción de productos/servicios.', 0),
	(2, 'La empresa emplea los medios productivos tecnológicamente más avanzados de su sector.', 1),
	(3, 'La empresa dispone de un sistema de información y control de gestión  eficiente y eficaz. ', 2),
	(4, 'Los medios técnicos y técnológicos de la empresa están preparados para competir en un futuro a corto, medio y largo plazo.', 3),
	(5, 'La empresa es un referente en su sector en I+D+i.', 4),
	(6, 'La excelencia de los procedimientos de la empresa (en ISO, etc.) son una principal fuente de ventaja competiva.', 3),
	(7, 'La empresa dispone de página web, y esta se emplea no sólo como escaparate virtual de productos/servicios, sino también para establecer relaciones con clientes y proveedores.', 2),
	(8, 'Los productos/servicios que desarrolla nuestra empresa llevan incorporada una tecnología difícil de imitar.', 1),
	(9, 'La empresa es referente en su sector en la optimización, en términos de coste,  de su cadena de producción, siendo ésta una de sus principales ventajas competitivas.', 0),
	(10, 'La informatización de la empresa es una fuente de ventaja competitiva clara respecto a sus competidores.', 1),
	(11, 'Los canales de distribución de la empresa son una importante fuente de ventajas competitivas.', 2),
	(12, 'Los productos/servicios de la empresa son altamente, y diferencialmente, valorados por el cliente respecto a nuestros competidores.', 3),
	(13, 'La empresa dispone y ejecuta un sistematico plan de marketing y ventas.', 4),
	(14, 'La empresa tiene optimizada su gestión financiera.', 3),
	(15, 'La empresa busca continuamente el mejorar la relación con sus clientes cortando los plazos de ejecución, personalizando la oferta o mejorando las condiciones de entrega. Pero siempre partiendo de un plan previo.', 2),
	(16, 'La empresa es referente en su sector en el lanzamiento de innovadores productos y servicio de éxito demostrado en el mercado.', 1),
	(17, 'Los Recursos Humanos son especialmente responsables del éxito de la empresa, considerándolos incluso como el principal activo estratégico.', 0),
	(18, 'Se tiene una plantilla altamente motivada, que conoce con claridad las metas, objetivos y estrategias de la organización.', 1),
	(19, 'La empresa siempre trabaja conforme a una estrategia y objetivos claros. ', 2),
	(20, 'La gestión del circulante está optimizada.', 3),
	(21, 'Se tiene definido claramente el posicionamiento estratégico de todos los productos de la empresa.', 4),
	(22, 'Se dispone de una política de marca basada en la reputación que la empresa genera, en la gestión de relación con el cliente y en el posicionamiento estratégico previamente definido.', 3),
	(23, 'La cartera de clientes de nuestra empresa está altamente fidelizada, ya que tenemos como principal propósito el deleitarlos día a día.', 2),
	(24, 'Nuestra política y equipo de ventas y marketing es una importante ventaja competitiva de nuestra empresa respecto al sector.', 1),
	(25, 'El servicio al cliente que prestamos es uno de nuestras principales ventajas competitivas respecto a nuestros competidores.', 0);

-- Volcando estructura para tabla homestead.came
CREATE TABLE IF NOT EXISTS `came` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(50) NOT NULL DEFAULT '',
  `Accion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.came: ~17 rows (aproximadamente)
DELETE FROM `came`;
INSERT INTO `came` (`Id`, `Tipo`, `Accion`) VALUES
	(5, 'C1', 'asda'),
	(6, 'C2', NULL),
	(7, 'C3', NULL),
	(8, 'C4', NULL),
	(9, 'E1', NULL),
	(10, 'E2', NULL),
	(11, 'E3', NULL),
	(12, 'E4', 'SFD'),
	(13, 'A1', NULL),
	(14, 'A2', 'SDF'),
	(15, 'A3', NULL),
	(16, 'A4', NULL),
	(17, 'M1', NULL),
	(18, 'M2', NULL),
	(19, 'M3', 'SDF'),
	(20, 'M5', NULL),
	(21, 'C20', NULL);

-- Volcando estructura para tabla homestead.debilidades
CREATE TABLE IF NOT EXISTS `debilidades` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Debilidad` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.debilidades: ~4 rows (aproximadamente)
DELETE FROM `debilidades`;
INSERT INTO `debilidades` (`Id`, `Debilidad`) VALUES
	(1, 'Debilidad 01'),
	(2, 'Debilidad 02'),
	(3, 'Debilidad 03'),
	(4, 'Debilidad 04');

-- Volcando estructura para tabla homestead.empresa
CREATE TABLE IF NOT EXISTS `empresa` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Descripcion` text,
  `Mision` text NOT NULL,
  `Vision` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.empresa: ~0 rows (aproximadamente)
DELETE FROM `empresa`;
INSERT INTO `empresa` (`Id`, `Nombre`, `Descripcion`, `Mision`, `Vision`) VALUES
	(1, 'Empresa 011', 'descripcion de la empresa 01', 'msision de la empresa 01', 'vision de la empresa 01');

-- Volcando estructura para tabla homestead.estrategia
CREATE TABLE IF NOT EXISTS `estrategia` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Estrategia` enum('FO','FA','DO','DA','NA') NOT NULL DEFAULT 'FO',
  `Tipo` varchar(255) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.estrategia: ~1 rows (aproximadamente)
DELETE FROM `estrategia`;
INSERT INTO `estrategia` (`Id`, `Estrategia`, `Tipo`, `Descripcion`) VALUES
	(1, 'FA', 'ESTRATEGIA DEFENSIVA', 'La empresa está preparada para enfrentarse a las amenazas.');

-- Volcando estructura para tabla homestead.foda
CREATE TABLE IF NOT EXISTS `foda` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` enum('FO','FA','DO','DA') NOT NULL,
  `Codigo` varchar(50) NOT NULL,
  `Valor` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.foda: ~64 rows (aproximadamente)
DELETE FROM `foda`;
INSERT INTO `foda` (`Id`, `Tipo`, `Codigo`, `Valor`) VALUES
	(137, 'FO', 'F1O1', 1),
	(138, 'FO', 'F1O2', 0),
	(139, 'FO', 'F1O3', 0),
	(140, 'FO', 'F1O4', 0),
	(141, 'FO', 'F2O1', 0),
	(142, 'FO', 'F2O2', 0),
	(143, 'FO', 'F2O3', 0),
	(144, 'FO', 'F2O4', 0),
	(145, 'FO', 'F3O1', 0),
	(146, 'FO', 'F3O2', 0),
	(147, 'FO', 'F3O3', 0),
	(148, 'FO', 'F3O4', 0),
	(149, 'FO', 'F5O1', 0),
	(150, 'FO', 'F5O2', 0),
	(151, 'FO', 'F5O3', 0),
	(152, 'FO', 'F5O4', 0),
	(153, 'FA', 'F1A1', 0),
	(154, 'FA', 'F1A2', 0),
	(155, 'FA', 'F1A3', 0),
	(156, 'FA', 'F1A4', 0),
	(157, 'FA', 'F2A1', 2),
	(158, 'FA', 'F2A2', 0),
	(159, 'FA', 'F2A3', 0),
	(160, 'FA', 'F2A4', 0),
	(161, 'FA', 'F3A1', 0),
	(162, 'FA', 'F3A2', 0),
	(163, 'FA', 'F3A3', 0),
	(164, 'FA', 'F3A4', 0),
	(165, 'FA', 'F5A1', 0),
	(166, 'FA', 'F5A2', 0),
	(167, 'FA', 'F5A3', 0),
	(168, 'FA', 'F5A4', 0),
	(169, 'DO', 'D1O1', 0),
	(170, 'DO', 'D1O2', 0),
	(171, 'DO', 'D1O3', 0),
	(172, 'DO', 'D1O4', 0),
	(173, 'DO', 'D2O1', 0),
	(174, 'DO', 'D2O2', 0),
	(175, 'DO', 'D2O3', 0),
	(176, 'DO', 'D2O4', 0),
	(177, 'DO', 'D3O1', 0),
	(178, 'DO', 'D3O2', 0),
	(179, 'DO', 'D3O3', 0),
	(180, 'DO', 'D3O4', 0),
	(181, 'DO', 'D4O1', 0),
	(182, 'DO', 'D4O2', 0),
	(183, 'DO', 'D4O3', 0),
	(184, 'DO', 'D4O4', 0),
	(185, 'DA', 'D1A1', 0),
	(186, 'DA', 'D1A2', 0),
	(187, 'DA', 'D1A3', 0),
	(188, 'DA', 'D1A4', 0),
	(189, 'DA', 'D2A1', 0),
	(190, 'DA', 'D2A2', 0),
	(191, 'DA', 'D2A3', 0),
	(192, 'DA', 'D2A4', 0),
	(193, 'DA', 'D3A1', 0),
	(194, 'DA', 'D3A2', 0),
	(195, 'DA', 'D3A3', 0),
	(196, 'DA', 'D3A4', 0),
	(197, 'DA', 'D4A1', 0),
	(198, 'DA', 'D4A2', 0),
	(199, 'DA', 'D4A3', 0),
	(200, 'DA', 'D4A4', 0),
	(201, 'FO', 'F7O1', 0),
	(202, 'FO', 'F7O2', 0),
	(203, 'FO', 'F7O3', 4),
	(204, 'FO', 'F7O4', 0),
	(205, 'FA', 'F7A1', 4),
	(206, 'FA', 'F7A2', 0),
	(207, 'FA', 'F7A3', 0),
	(208, 'FA', 'F7A4', 0);

-- Volcando estructura para tabla homestead.fortalezas
CREATE TABLE IF NOT EXISTS `fortalezas` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Fortaleza` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.fortalezas: ~4 rows (aproximadamente)
DELETE FROM `fortalezas`;
INSERT INTO `fortalezas` (`Id`, `Fortaleza`) VALUES
	(1, 'Fortaleza 01'),
	(2, 'Fortaleza 02'),
	(3, 'Fortaleza 03'),
	(5, 'Fortaleza 05');

-- Volcando estructura para tabla homestead.fuerzas_porter
CREATE TABLE IF NOT EXISTS `fuerzas_porter` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Fuerza` int(11) NOT NULL,
  `Perfil` varchar(255) NOT NULL,
  `Hostil` varchar(100) NOT NULL,
  `Valor` int(11) NOT NULL DEFAULT '1',
  `Favorable` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.fuerzas_porter: ~17 rows (aproximadamente)
DELETE FROM `fuerzas_porter`;
INSERT INTO `fuerzas_porter` (`Id`, `Fuerza`, `Perfil`, `Hostil`, `Valor`, `Favorable`) VALUES
	(1, 1, 'Crecimiento', 'Lento', 5, 'Rápido'),
	(2, 1, 'Naturaleza de los competidores', 'Muchos', 4, 'Pocos'),
	(3, 1, 'Exceso de capacidad productiva', 'Si', 3, 'No'),
	(4, 1, 'Rentabilidad media del sector', 'Baja', 2, 'Alta'),
	(5, 1, 'Diferenciación del producto', 'Escasa', 1, 'Elevada'),
	(6, 1, 'Barreras de salida', 'Bajas', 1, 'Altas'),
	(7, 2, 'Economías de escala', 'No', 1, 'Si'),
	(8, 2, 'Necesidad de capital', 'Bajas', 2, 'Altas'),
	(9, 2, 'Acceso a la tecnología', 'Fácil', 3, 'Difícil\r\n'),
	(10, 2, 'Reglamentos o leyes limitativos', 'No\r\n', 4, 'Sí\r\n'),
	(11, 2, 'Trámites burocráticos', 'No\r\n', 5, 'Sí\r\n'),
	(12, 2, 'Reacción esperada actuales competidores', 'Escasa\r\n', 5, 'Enérgica'),
	(13, 3, 'Número de clientes ', 'Pocos\r\n', 1, 'Muchos\r\n'),
	(14, 3, 'Posibilidad de integración ascendente', 'Pequeña\r\n', 1, 'Grande'),
	(15, 3, 'Rentabilidad de los clientes', 'Baja', 1, 'Alta'),
	(16, 3, 'Coste de cambio de proveedor para cliente', 'Bajo\r\n', 1, 'Alto'),
	(17, 4, 'Disponibilidad de Productos Sustitutivos', 'Grande\r\n', 1, 'Pequeña\r\n');

-- Volcando estructura para tabla homestead.objetivo_especifico
CREATE TABLE IF NOT EXISTS `objetivo_especifico` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ObjGeneral_Id` int(11) NOT NULL,
  `Tipo` enum('Funcional','Operativo') NOT NULL,
  `Objetivo` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_objetivo_especifico_objetivo_general` (`ObjGeneral_Id`),
  CONSTRAINT `FK_objetivo_especifico_objetivo_general` FOREIGN KEY (`ObjGeneral_Id`) REFERENCES `objetivo_general` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.objetivo_especifico: ~6 rows (aproximadamente)
DELETE FROM `objetivo_especifico`;
INSERT INTO `objetivo_especifico` (`Id`, `ObjGeneral_Id`, `Tipo`, `Objetivo`) VALUES
	(1, 1, 'Funcional', 'Objetivo Especifico Funcional 01'),
	(2, 1, 'Operativo', 'Objetivo Especifico Operativo 01'),
	(3, 2, 'Funcional', 'Objetivo Especifico Funcional 02'),
	(4, 2, 'Operativo', 'Objetivo Especifico Operativo 02'),
	(7, 4, 'Funcional', 'Objetivo Especifico Funcional 03'),
	(8, 4, 'Operativo', 'Objetivo Especifico Operativo 03');

-- Volcando estructura para tabla homestead.objetivo_general
CREATE TABLE IF NOT EXISTS `objetivo_general` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Objetivo` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.objetivo_general: ~3 rows (aproximadamente)
DELETE FROM `objetivo_general`;
INSERT INTO `objetivo_general` (`Id`, `Objetivo`) VALUES
	(1, 'Objetivo general 01'),
	(2, 'Objetivo general 02'),
	(4, 'Objetivo general 03');

-- Volcando estructura para tabla homestead.oportunidades
CREATE TABLE IF NOT EXISTS `oportunidades` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Oportunidad` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.oportunidades: ~4 rows (aproximadamente)
DELETE FROM `oportunidades`;
INSERT INTO `oportunidades` (`Id`, `Oportunidad`) VALUES
	(1, 'Oportunidad 01'),
	(2, 'Oportunidad 02'),
	(3, 'Oportunidad 03'),
	(4, 'Oportunidad 04');

-- Volcando estructura para tabla homestead.pest
CREATE TABLE IF NOT EXISTS `pest` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pregunta` varchar(255) NOT NULL,
  `Valor` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.pest: ~25 rows (aproximadamente)
DELETE FROM `pest`;
INSERT INTO `pest` (`Id`, `Pregunta`, `Valor`) VALUES
	(1, 'Los cambios en la composicón étnica de los consumidores de nuestro mercado está teniendo un notable impacto.', 0),
	(2, 'El envejecimiento de la población tiene un importante impacto en la demanda.', 1),
	(3, 'Los nuevos estilos de vida y tendencias originan cambios en la oferta de nuestro sector.', 2),
	(4, 'El envejecimiento de la población tiene un importante impacto en la oferta del sector donde operamos.', 3),
	(5, 'Las variaciones en el nivel de riqueza de la población impactan considerablemente en la demanda de los productos/servicios del sector donde operamos.', 4),
	(6, 'La legislación fiscal afecta muy considerablemente a la economía de las empresas del sector donde operamos.', 3),
	(7, 'La legislación laboral afecta muy considerablemente a la operativa del sector donde actuamos.', 2),
	(8, 'Las subvenciones otorgadas por las Administraciones Públicas son claves en el desarrollo competitivo del mercado donde operamos.', 1),
	(9, 'El impacto que tiene la legislación de protección al consumidor, en la manera de producir bienes y/o servicios es muy importante. ', 0),
	(10, 'La normativa autonómica tiene un impacto considerable en el funcionamiento del sector donde actuamos. ', 1),
	(11, 'Las expectativas de crecimiento económico generales afectan crucialmente al mercado donde operamos.', 2),
	(12, 'La política de tipos de interés es fundamental en el desarrollo financiero del sector donde trabaja nuestra empresa.', 3),
	(13, 'La globalización permite a nuestra industria gozar de importantes oportunidades en  nuevos mercados.', 4),
	(14, 'La situación del empleo es fundamental para el desarrollo económico de nuestra empresa y nuestro sector.', 3),
	(15, 'Las expectativas del ciclo económico de nuestro sector impactan en la situación económica de sus empresas.', 2),
	(16, 'Las Administraciones Públicas están incentivando el esfuerzo tecnológico de las empresas de nuestro sector.', 1),
	(17, 'Internet, el comercio electrónico, el wireless y otras NTIC están impactando en la demanda de nuestros productos/servicios y en los de la competencia. ', 0),
	(18, 'El empleo de NTIC´s es generalizado en el sector donde trabajamos.', 1),
	(19, 'En nuestro sector, es de gran importancia ser pionero o referente en el empleo de aplicaciones tecnológicas.', 2),
	(20, 'En el sector donde operamos, para ser competitivos, es condición "sine qua non" innovar constantemente. ', 3),
	(21, 'La legislación medioambiental afecta al desarrollo de nuestro sector.', 4),
	(22, 'Los clientes de nuestro mercado exigen que se seamos socialmente responsables, en el plano medioambiental. ', 3),
	(23, 'En nuestro sector, la políticas medioambientales son una fuente de ventajas competitivas. ', 2),
	(24, 'La creciente preocupación social por el medio ambiente impacta notablemente en la demanda de productos/servicios ofertados en nuestro mercado.', 1),
	(25, 'El factor ecológico es una fuente de diferenciación clara en el sector donde opera nuestra empresa.', 0);

-- Volcando estructura para tabla homestead.plan_estrategico
CREATE TABLE IF NOT EXISTS `plan_estrategico` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Contenido` text NOT NULL,
  `Conclucion` text,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.plan_estrategico: ~6 rows (aproximadamente)
DELETE FROM `plan_estrategico`;
INSERT INTO `plan_estrategico` (`Id`, `Fecha`, `Contenido`, `Conclucion`) VALUES
	(1, '2026-05-03 02:33:51', '<p>&nbsp;</p><h5 style=\'text-align: center;\'>RESUMEN EJECUTIVO DEL PLAN ESTRATÉGICO</h5><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Nombre de la Empresa: Empresa 011</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Fecha de elaboración: 03/05/2026</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Emprendedores / Promotores: Jesus Humberto Escalante Alanoca</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>MISIÓN:</h6><h6 style=\'padding-left: 80px;\'>msision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VISIÓN:</h6><h6 style=\'padding-left: 80px;\'>vision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VALORES:</h6><ul><li style=\'margin-left: 80px;\'>Integridad</li><li style=\'margin-left: 80px;\'>Compromiso con el desarrollo humano</li><li style=\'margin-left: 80px;\'>Ética profesional </li><li style=\'margin-left: 80px;\'>Responsabilidad social</li><li style=\'margin-left: 80px;\'>Innovación</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>UNIDADES ESTRATÉGICAS:</h6><ul><li style=\'margin-left: 80px;\'>Ventas1</li><li style=\'margin-left: 80px;\'>Contabilidad</li><li style=\'margin-left: 80px;\'>Marketing1</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>OBJETIVOS ESTRATÉGICOS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>MISIÓN</th><th style=\'text-align: center;\'>OBJETIVOS GENERALES O ESTRATÉGICOS</th><th style=\'text-align: center;\'>OBJETIVOS ESPECÍFICOS</th></tr></thead><tbody><tr><th rowspan=\'10\'>msision de la empresa 01</th></tr><tr><th rowspan=\'3\'>Objetivo general 01</th></tr><tr><td>Objetivo Especifico Funcional 01</td></tr><tr><td>Objetivo Especifico Operativo 01</td></tr><tr><th rowspan=\'3\'>Objetivo general 02</th></tr><tr><td>Objetivo Especifico Funcional 02</td></tr><tr><td>Objetivo Especifico Operativo 02</td></tr><tr><th rowspan=\'3\'>Objetivo general 03</th></tr><tr><td>Objetivo Especifico Funcional 03</td></tr><tr><td>Objetivo Especifico Operativo 03</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'> ANÁLISIS FODA:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><tbody><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>FORTALEZAS</th></tr><tr><td>Fortaleza 01</td></tr><tr><td>Fortaleza 02</td></tr><tr><td>Fortaleza 03</td></tr><tr><td>Fortaleza 05</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>DEBILIDADES</th></tr><tr><td>Debilidad 01</td></tr><tr><td>Debilidad 02</td></tr><tr><td>Debilidad 03</td></tr><tr><td>Debilidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>OPORTUNIDADES</th></tr><tr><td>Oportunidad 01</td></tr><tr><td>Oportunidad 02</td></tr><tr><td>Oportunidad 03</td></tr><tr><td>Oportunidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>AMENAZAS</th></tr><tr><td>Amenaza 01</td></tr><tr><td>Amenaza 02</td></tr><tr><td>Amenaza 03</td></tr><tr><td>Amenaza 04</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>IDENTIFICACIÓN DE ESTRATEGIA:</h6><ul style=\'padding-left: 80px;\'><li><strong>Relacion:</strong> FA</li><li><strong>Tipo:</strong> ESTRATEGIA DEFENSIVA</li><li><strong>Descripción:</strong> La empresa está preparada para enfrentarse a las amenazas.</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>ACCIONES COMPETITIVAS:</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>CONCLUSIONES:</h6>', NULL),
	(2, '2026-05-03 04:09:25', '<p>&nbsp;</p><h5 style=\'text-align: center;\'>RESUMEN EJECUTIVO DEL PLAN ESTRATÉGICO</h5><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Nombre de la Empresa: Empresa 011</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Fecha de elaboración: 03/05/2026</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Emprendedores / Promotores: Jesus Humberto Escalante Alanoca</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>MISIÓN:</h6><h6 style=\'padding-left: 80px;\'>msision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VISIÓN:</h6><h6 style=\'padding-left: 80px;\'>vision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VALORES:</h6><ul><li style=\'margin-left: 80px;\'>Integridad</li><li style=\'margin-left: 80px;\'>Compromiso con el desarrollo humano</li><li style=\'margin-left: 80px;\'>Ética profesional </li><li style=\'margin-left: 80px;\'>Responsabilidad social</li><li style=\'margin-left: 80px;\'>Innovación</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>UNIDADES ESTRATÉGICAS:</h6><ul><li style=\'margin-left: 80px;\'>Ventas1</li><li style=\'margin-left: 80px;\'>Contabilidad</li><li style=\'margin-left: 80px;\'>Marketing1</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>OBJETIVOS ESTRATÉGICOS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>MISIÓN</th><th style=\'text-align: center;\'>OBJETIVOS GENERALES O ESTRATÉGICOS</th><th style=\'text-align: center;\'>OBJETIVOS ESPECÍFICOS</th></tr></thead><tbody><tr><th rowspan=\'10\'>msision de la empresa 01</th></tr><tr><th rowspan=\'3\'>Objetivo general 01</th></tr><tr><td>Objetivo Especifico Funcional 01</td></tr><tr><td>Objetivo Especifico Operativo 01</td></tr><tr><th rowspan=\'3\'>Objetivo general 02</th></tr><tr><td>Objetivo Especifico Funcional 02</td></tr><tr><td>Objetivo Especifico Operativo 02</td></tr><tr><th rowspan=\'3\'>Objetivo general 03</th></tr><tr><td>Objetivo Especifico Funcional 03</td></tr><tr><td>Objetivo Especifico Operativo 03</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'> ANÁLISIS FODA:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><tbody><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>FORTALEZAS</th></tr><tr><td>Fortaleza 01</td></tr><tr><td>Fortaleza 02</td></tr><tr><td>Fortaleza 03</td></tr><tr><td>Fortaleza 05</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>DEBILIDADES</th></tr><tr><td>Debilidad 01</td></tr><tr><td>Debilidad 02</td></tr><tr><td>Debilidad 03</td></tr><tr><td>Debilidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>OPORTUNIDADES</th></tr><tr><td>Oportunidad 01</td></tr><tr><td>Oportunidad 02</td></tr><tr><td>Oportunidad 03</td></tr><tr><td>Oportunidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>AMENAZAS</th></tr><tr><td>Amenaza 01</td></tr><tr><td>Amenaza 02</td></tr><tr><td>Amenaza 03</td></tr><tr><td>Amenaza 04</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>IDENTIFICACIÓN DE ESTRATEGIA:</h6><ul style=\'padding-left: 80px;\'><li><strong>Relacion:</strong> FA</li><li><strong>Tipo:</strong> ESTRATEGIA DEFENSIVA</li><li><strong>Descripción:</strong> La empresa está preparada para enfrentarse a las amenazas.</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>ACCIONES COMPETITIVAS:</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>CONCLUSIONES:</h6>', NULL),
	(3, '2026-05-03 05:58:30', '<p>&nbsp;</p><h5 style=\'text-align: center;\'>RESUMEN EJECUTIVO DEL PLAN ESTRATÉGICO</h5><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Nombre de la Empresa: Empresa 011</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Fecha de elaboración: 03/05/2026</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Emprendedores / Promotores: Jesus Humberto Escalante Alanoca</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>MISIÓN:</h6><h6 style=\'padding-left: 80px;\'>msision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VISIÓN:</h6><h6 style=\'padding-left: 80px;\'>vision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VALORES:</h6><ul><li style=\'margin-left: 80px;\'>Integridad</li><li style=\'margin-left: 80px;\'>Compromiso con el desarrollo humano</li><li style=\'margin-left: 80px;\'>Ética profesional </li><li style=\'margin-left: 80px;\'>Responsabilidad social</li><li style=\'margin-left: 80px;\'>Innovación</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>UNIDADES ESTRATÉGICAS:</h6><ul><li style=\'margin-left: 80px;\'>Ventas1</li><li style=\'margin-left: 80px;\'>Contabilidad</li><li style=\'margin-left: 80px;\'>Marketing1</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>OBJETIVOS ESTRATÉGICOS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>MISIÓN</th><th style=\'text-align: center;\'>OBJETIVOS GENERALES O ESTRATÉGICOS</th><th style=\'text-align: center;\'>OBJETIVOS ESPECÍFICOS</th></tr></thead><tbody><tr><th rowspan=\'10\'>msision de la empresa 01</th></tr><tr><th rowspan=\'3\'>Objetivo general 01</th></tr><tr><td>Objetivo Especifico Funcional 01</td></tr><tr><td>Objetivo Especifico Operativo 01</td></tr><tr><th rowspan=\'3\'>Objetivo general 02</th></tr><tr><td>Objetivo Especifico Funcional 02</td></tr><tr><td>Objetivo Especifico Operativo 02</td></tr><tr><th rowspan=\'3\'>Objetivo general 03</th></tr><tr><td>Objetivo Especifico Funcional 03</td></tr><tr><td>Objetivo Especifico Operativo 03</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'> ANÁLISIS FODA:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><tbody><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>FORTALEZAS</th></tr><tr><td>Fortaleza 01</td></tr><tr><td>Fortaleza 02</td></tr><tr><td>Fortaleza 03</td></tr><tr><td>Fortaleza 05</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>DEBILIDADES</th></tr><tr><td>Debilidad 01</td></tr><tr><td>Debilidad 02</td></tr><tr><td>Debilidad 03</td></tr><tr><td>Debilidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>OPORTUNIDADES</th></tr><tr><td>Oportunidad 01</td></tr><tr><td>Oportunidad 02</td></tr><tr><td>Oportunidad 03</td></tr><tr><td>Oportunidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>AMENAZAS</th></tr><tr><td>Amenaza 01</td></tr><tr><td>Amenaza 02</td></tr><tr><td>Amenaza 03</td></tr><tr><td>Amenaza 04</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>IDENTIFICACIÓN DE ESTRATEGIA:</h6><ul style=\'padding-left: 80px;\'><li><strong>Relacion:</strong> FA</li><li><strong>Tipo:</strong> ESTRATEGIA DEFENSIVA</li><li><strong>Descripción:</strong> La empresa está preparada para enfrentarse a las amenazas.</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>ACCIONES COMPETITIVAS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>ID</th><th style=\'text-align: center;\'>ACCION</th></tr></thead><tbody><tr><td>5</td><td>asda</td></tr><tr><td>5</td><td>asda</td></tr><tr><td>5</td><td>asda</td></tr><tr><td>5</td><td>asda</td></tr><tr><td>6</td><td></td></tr><tr><td>6</td><td></td></tr><tr><td>6</td><td></td></tr><tr><td>6</td><td></td></tr><tr><td>7</td><td></td></tr><tr><td>7</td><td></td></tr><tr><td>7</td><td></td></tr><tr><td>7</td><td></td></tr><tr><td>8</td><td></td></tr><tr><td>8</td><td></td></tr><tr><td>8</td><td></td></tr><tr><td>9</td><td></td></tr><tr><td>9</td><td></td></tr><tr><td>9</td><td></td></tr><tr><td>9</td><td></td></tr><tr><td>10</td><td></td></tr><tr><td>10</td><td></td></tr><tr><td>10</td><td></td></tr><tr><td>10</td><td></td></tr><tr><td>11</td><td></td></tr><tr><td>11</td><td></td></tr><tr><td>11</td><td></td></tr><tr><td>11</td><td></td></tr><tr><td>12</td><td>SFD</td></tr><tr><td>12</td><td>SFD</td></tr><tr><td>12</td><td>SFD</td></tr><tr><td>13</td><td></td></tr><tr><td>13</td><td></td></tr><tr><td>13</td><td></td></tr><tr><td>13</td><td></td></tr><tr><td>14</td><td>SDF</td></tr><tr><td>14</td><td>SDF</td></tr><tr><td>14</td><td>SDF</td></tr><tr><td>14</td><td>SDF</td></tr><tr><td>15</td><td></td></tr><tr><td>15</td><td></td></tr><tr><td>15</td><td></td></tr><tr><td>15</td><td></td></tr><tr><td>16</td><td></td></tr><tr><td>16</td><td></td></tr><tr><td>16</td><td></td></tr><tr><td>17</td><td></td></tr><tr><td>17</td><td></td></tr><tr><td>17</td><td></td></tr><tr><td>17</td><td></td></tr><tr><td>18</td><td></td></tr><tr><td>18</td><td></td></tr><tr><td>18</td><td></td></tr><tr><td>18</td><td></td></tr><tr><td>19</td><td>SDF</td></tr><tr><td>19</td><td>SDF</td></tr><tr><td>19</td><td>SDF</td></tr><tr><td>19</td><td>SDF</td></tr><tr><td>20</td><td></td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>CONCLUSIONES:</h6>', NULL),
	(4, '2026-05-03 06:00:26', '<p>&nbsp;</p><h5 style=\'text-align: center;\'>RESUMEN EJECUTIVO DEL PLAN ESTRATÉGICO</h5><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Nombre de la Empresa: Empresa 011</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Fecha de elaboración: 03/05/2026</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Emprendedores / Promotores: Jesus Humberto Escalante Alanoca</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>MISIÓN:</h6><h6 style=\'padding-left: 80px;\'>msision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VISIÓN:</h6><h6 style=\'padding-left: 80px;\'>vision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VALORES:</h6><ul><li style=\'margin-left: 80px;\'>Integridad</li><li style=\'margin-left: 80px;\'>Compromiso con el desarrollo humano</li><li style=\'margin-left: 80px;\'>Ética profesional </li><li style=\'margin-left: 80px;\'>Responsabilidad social</li><li style=\'margin-left: 80px;\'>Innovación</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>UNIDADES ESTRATÉGICAS:</h6><ul><li style=\'margin-left: 80px;\'>Ventas1</li><li style=\'margin-left: 80px;\'>Contabilidad</li><li style=\'margin-left: 80px;\'>Marketing1</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>OBJETIVOS ESTRATÉGICOS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>MISIÓN</th><th style=\'text-align: center;\'>OBJETIVOS GENERALES O ESTRATÉGICOS</th><th style=\'text-align: center;\'>OBJETIVOS ESPECÍFICOS</th></tr></thead><tbody><tr><th rowspan=\'10\'>msision de la empresa 01</th></tr><tr><th rowspan=\'3\'>Objetivo general 01</th></tr><tr><td>Objetivo Especifico Funcional 01</td></tr><tr><td>Objetivo Especifico Operativo 01</td></tr><tr><th rowspan=\'3\'>Objetivo general 02</th></tr><tr><td>Objetivo Especifico Funcional 02</td></tr><tr><td>Objetivo Especifico Operativo 02</td></tr><tr><th rowspan=\'3\'>Objetivo general 03</th></tr><tr><td>Objetivo Especifico Funcional 03</td></tr><tr><td>Objetivo Especifico Operativo 03</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'> ANÁLISIS FODA:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><tbody><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>FORTALEZAS</th></tr><tr><td>Fortaleza 01</td></tr><tr><td>Fortaleza 02</td></tr><tr><td>Fortaleza 03</td></tr><tr><td>Fortaleza 05</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>DEBILIDADES</th></tr><tr><td>Debilidad 01</td></tr><tr><td>Debilidad 02</td></tr><tr><td>Debilidad 03</td></tr><tr><td>Debilidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>OPORTUNIDADES</th></tr><tr><td>Oportunidad 01</td></tr><tr><td>Oportunidad 02</td></tr><tr><td>Oportunidad 03</td></tr><tr><td>Oportunidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>AMENAZAS</th></tr><tr><td>Amenaza 01</td></tr><tr><td>Amenaza 02</td></tr><tr><td>Amenaza 03</td></tr><tr><td>Amenaza 04</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>IDENTIFICACIÓN DE ESTRATEGIA:</h6><ul style=\'padding-left: 80px;\'><li><strong>Relacion:</strong> FA</li><li><strong>Tipo:</strong> ESTRATEGIA DEFENSIVA</li><li><strong>Descripción:</strong> La empresa está preparada para enfrentarse a las amenazas.</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>ACCIONES COMPETITIVAS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>ID</th><th style=\'text-align: center;\'>ACCION</th></tr></thead><tbody><tr><td>5</td><td>asda</td></tr><tr><td>6</td><td></td></tr><tr><td>7</td><td></td></tr><tr><td>8</td><td></td></tr><tr><td>9</td><td></td></tr><tr><td>10</td><td></td></tr><tr><td>11</td><td></td></tr><tr><td>12</td><td>SFD</td></tr><tr><td>13</td><td></td></tr><tr><td>14</td><td>SDF</td></tr><tr><td>15</td><td></td></tr><tr><td>16</td><td></td></tr><tr><td>17</td><td></td></tr><tr><td>18</td><td></td></tr><tr><td>19</td><td>SDF</td></tr><tr><td>5</td><td>asda</td></tr><tr><td>6</td><td></td></tr><tr><td>7</td><td></td></tr><tr><td>8</td><td></td></tr><tr><td>9</td><td></td></tr><tr><td>10</td><td></td></tr><tr><td>11</td><td></td></tr><tr><td>12</td><td>SFD</td></tr><tr><td>13</td><td></td></tr><tr><td>14</td><td>SDF</td></tr><tr><td>15</td><td></td></tr><tr><td>16</td><td></td></tr><tr><td>17</td><td></td></tr><tr><td>18</td><td></td></tr><tr><td>19</td><td>SDF</td></tr><tr><td>5</td><td>asda</td></tr><tr><td>6</td><td></td></tr><tr><td>7</td><td></td></tr><tr><td>9</td><td></td></tr><tr><td>10</td><td></td></tr><tr><td>11</td><td></td></tr><tr><td>13</td><td></td></tr><tr><td>14</td><td>SDF</td></tr><tr><td>15</td><td></td></tr><tr><td>17</td><td></td></tr><tr><td>18</td><td></td></tr><tr><td>19</td><td>SDF</td></tr><tr><td>20</td><td></td></tr><tr><td>5</td><td>asda</td></tr><tr><td>6</td><td></td></tr><tr><td>7</td><td></td></tr><tr><td>8</td><td></td></tr><tr><td>9</td><td></td></tr><tr><td>10</td><td></td></tr><tr><td>11</td><td></td></tr><tr><td>12</td><td>SFD</td></tr><tr><td>13</td><td></td></tr><tr><td>14</td><td>SDF</td></tr><tr><td>15</td><td></td></tr><tr><td>16</td><td></td></tr><tr><td>17</td><td></td></tr><tr><td>18</td><td></td></tr><tr><td>19</td><td>SDF</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>CONCLUSIONES:</h6>', NULL),
	(5, '2026-05-03 06:07:04', '<p>&nbsp;</p><h5 style=\'text-align: center;\'>RESUMEN EJECUTIVO DEL PLAN ESTRATÉGICO</h5><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Nombre de la Empresa: Empresa 011</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Fecha de elaboración: 03/05/2026</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Emprendedores / Promotores: Jesus Humberto Escalante Alanoca</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>MISIÓN:</h6><h6 style=\'padding-left: 80px;\'>msision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VISIÓN:</h6><h6 style=\'padding-left: 80px;\'>vision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VALORES:</h6><ul><li style=\'margin-left: 80px;\'>Integridad</li><li style=\'margin-left: 80px;\'>Compromiso con el desarrollo humano</li><li style=\'margin-left: 80px;\'>Ética profesional </li><li style=\'margin-left: 80px;\'>Responsabilidad social</li><li style=\'margin-left: 80px;\'>Innovación</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>UNIDADES ESTRATÉGICAS:</h6><ul><li style=\'margin-left: 80px;\'>Ventas1</li><li style=\'margin-left: 80px;\'>Contabilidad</li><li style=\'margin-left: 80px;\'>Marketing1</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>OBJETIVOS ESTRATÉGICOS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>MISIÓN</th><th style=\'text-align: center;\'>OBJETIVOS GENERALES O ESTRATÉGICOS</th><th style=\'text-align: center;\'>OBJETIVOS ESPECÍFICOS</th></tr></thead><tbody><tr><th rowspan=\'10\'>msision de la empresa 01</th></tr><tr><th rowspan=\'3\'>Objetivo general 01</th></tr><tr><td>Objetivo Especifico Funcional 01</td></tr><tr><td>Objetivo Especifico Operativo 01</td></tr><tr><th rowspan=\'3\'>Objetivo general 02</th></tr><tr><td>Objetivo Especifico Funcional 02</td></tr><tr><td>Objetivo Especifico Operativo 02</td></tr><tr><th rowspan=\'3\'>Objetivo general 03</th></tr><tr><td>Objetivo Especifico Funcional 03</td></tr><tr><td>Objetivo Especifico Operativo 03</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'> ANÁLISIS FODA:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><tbody><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>FORTALEZAS</th></tr><tr><td>Fortaleza 01</td></tr><tr><td>Fortaleza 02</td></tr><tr><td>Fortaleza 03</td></tr><tr><td>Fortaleza 05</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>DEBILIDADES</th></tr><tr><td>Debilidad 01</td></tr><tr><td>Debilidad 02</td></tr><tr><td>Debilidad 03</td></tr><tr><td>Debilidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>OPORTUNIDADES</th></tr><tr><td>Oportunidad 01</td></tr><tr><td>Oportunidad 02</td></tr><tr><td>Oportunidad 03</td></tr><tr><td>Oportunidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>AMENAZAS</th></tr><tr><td>Amenaza 01</td></tr><tr><td>Amenaza 02</td></tr><tr><td>Amenaza 03</td></tr><tr><td>Amenaza 04</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>IDENTIFICACIÓN DE ESTRATEGIA:</h6><ul style=\'padding-left: 80px;\'><li><strong>Relacion:</strong> FA</li><li><strong>Tipo:</strong> ESTRATEGIA DEFENSIVA</li><li><strong>Descripción:</strong> La empresa está preparada para enfrentarse a las amenazas.</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>ACCIONES COMPETITIVAS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>ID</th><th style=\'text-align: center;\'>ACCION</th></tr></thead><tbody><tr><td>5</td><td>asda</td></tr><tr><td>6</td><td></td></tr><tr><td>7</td><td></td></tr><tr><td>8</td><td></td></tr><tr><td>13</td><td></td></tr><tr><td>14</td><td>SDF</td></tr><tr><td>15</td><td></td></tr><tr><td>16</td><td></td></tr><tr><td>17</td><td></td></tr><tr><td>18</td><td></td></tr><tr><td>19</td><td>SDF</td></tr><tr><td>20</td><td></td></tr><tr><td>9</td><td></td></tr><tr><td>10</td><td></td></tr><tr><td>11</td><td></td></tr><tr><td>12</td><td>SFD</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>CONCLUSIONES:</h6>', NULL),
	(6, '2026-05-03 06:09:07', '<p>&nbsp;</p><h5 style=\'text-align: center;\'>RESUMEN EJECUTIVO DEL PLAN ESTRATÉGICO</h5><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Nombre de la Empresa: Empresa 011</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Fecha de elaboración: 03/05/2026</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Emprendedores / Promotores: Jesus Humberto Escalante Alanoca</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>MISIÓN:</h6><h6 style=\'padding-left: 80px;\'>msision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VISIÓN:</h6><h6 style=\'padding-left: 80px;\'>vision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VALORES:</h6><ul><li style=\'margin-left: 80px;\'>Integridad</li><li style=\'margin-left: 80px;\'>Compromiso con el desarrollo humano</li><li style=\'margin-left: 80px;\'>Ética profesional </li><li style=\'margin-left: 80px;\'>Responsabilidad social</li><li style=\'margin-left: 80px;\'>Innovación</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>UNIDADES ESTRATÉGICAS:</h6><ul><li style=\'margin-left: 80px;\'>Ventas1</li><li style=\'margin-left: 80px;\'>Contabilidad</li><li style=\'margin-left: 80px;\'>Marketing1</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>OBJETIVOS ESTRATÉGICOS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>MISIÓN</th><th style=\'text-align: center;\'>OBJETIVOS GENERALES O ESTRATÉGICOS</th><th style=\'text-align: center;\'>OBJETIVOS ESPECÍFICOS</th></tr></thead><tbody><tr><th rowspan=\'10\'>msision de la empresa 01</th></tr><tr><th rowspan=\'3\'>Objetivo general 01</th></tr><tr><td>Objetivo Especifico Funcional 01</td></tr><tr><td>Objetivo Especifico Operativo 01</td></tr><tr><th rowspan=\'3\'>Objetivo general 02</th></tr><tr><td>Objetivo Especifico Funcional 02</td></tr><tr><td>Objetivo Especifico Operativo 02</td></tr><tr><th rowspan=\'3\'>Objetivo general 03</th></tr><tr><td>Objetivo Especifico Funcional 03</td></tr><tr><td>Objetivo Especifico Operativo 03</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'> ANÁLISIS FODA:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><tbody><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>FORTALEZAS</th></tr><tr><td>Fortaleza 01</td></tr><tr><td>Fortaleza 02</td></tr><tr><td>Fortaleza 03</td></tr><tr><td>Fortaleza 05</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>DEBILIDADES</th></tr><tr><td>Debilidad 01</td></tr><tr><td>Debilidad 02</td></tr><tr><td>Debilidad 03</td></tr><tr><td>Debilidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>OPORTUNIDADES</th></tr><tr><td>Oportunidad 01</td></tr><tr><td>Oportunidad 02</td></tr><tr><td>Oportunidad 03</td></tr><tr><td>Oportunidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>AMENAZAS</th></tr><tr><td>Amenaza 01</td></tr><tr><td>Amenaza 02</td></tr><tr><td>Amenaza 03</td></tr><tr><td>Amenaza 04</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>IDENTIFICACIÓN DE ESTRATEGIA:</h6><ul style=\'padding-left: 80px;\'><li><strong>Relacion:</strong> FA</li><li><strong>Tipo:</strong> ESTRATEGIA DEFENSIVA</li><li><strong>Descripción:</strong> La empresa está preparada para enfrentarse a las amenazas.</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>ACCIONES COMPETITIVAS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center; width: 80px;\'>ID</th><th style=\'text-align: center;\'>ACCION</th></tr></thead><tbody><tr><td style=\'text-align: center;\'>5</td><td>asda</td></tr><tr><td style=\'text-align: center;\'>6</td><td></td></tr><tr><td style=\'text-align: center;\'>7</td><td></td></tr><tr><td style=\'text-align: center;\'>8</td><td></td></tr><tr><td style=\'text-align: center;\'>13</td><td></td></tr><tr><td style=\'text-align: center;\'>14</td><td>SDF</td></tr><tr><td style=\'text-align: center;\'>15</td><td></td></tr><tr><td style=\'text-align: center;\'>16</td><td></td></tr><tr><td style=\'text-align: center;\'>17</td><td></td></tr><tr><td style=\'text-align: center;\'>18</td><td></td></tr><tr><td style=\'text-align: center;\'>19</td><td>SDF</td></tr><tr><td style=\'text-align: center;\'>20</td><td></td></tr><tr><td style=\'text-align: center;\'>9</td><td></td></tr><tr><td style=\'text-align: center;\'>10</td><td></td></tr><tr><td style=\'text-align: center;\'>11</td><td></td></tr><tr><td style=\'text-align: center;\'>12</td><td>SFD</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>CONCLUSIONES:</h6>', 'conclucion 000111');

-- Volcando estructura para tabla homestead.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Ventas` int(11) NOT NULL DEFAULT '0',
  `Porcentaje` decimal(10,2) NOT NULL DEFAULT '0.00',
  `Color` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.productos: ~5 rows (aproximadamente)
DELETE FROM `productos`;
INSERT INTO `productos` (`Id`, `Nombre`, `Ventas`, `Porcentaje`, `Color`) VALUES
	(1, 'Producto 01', 0, 0.00, ''),
	(2, 'Producto 02', 0, 0.00, NULL),
	(3, 'Producto 03', 0, 0.00, NULL),
	(4, 'Producto 04', 0, 0.00, NULL),
	(5, 'Producto 05', 0, 0.00, NULL);

-- Volcando estructura para tabla homestead.unidad_estrategica
CREATE TABLE IF NOT EXISTS `unidad_estrategica` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Unidad` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.unidad_estrategica: ~3 rows (aproximadamente)
DELETE FROM `unidad_estrategica`;
INSERT INTO `unidad_estrategica` (`Id`, `Unidad`) VALUES
	(1, 'Ventas1'),
	(2, 'Contabilidad'),
	(5, 'Marketing1');

-- Volcando estructura para tabla homestead.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Apellido` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Correo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Avatar` int(1) DEFAULT NULL,
  `Rol` enum('Administrador','Editor','Visualizador') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Editor',
  `Estado` int(1) unsigned zerofill NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla homestead.usuario: ~3 rows (aproximadamente)
DELETE FROM `usuario`;
INSERT INTO `usuario` (`Id`, `Nombre`, `Apellido`, `Correo`, `password`, `Avatar`, `Rol`, `Estado`) VALUES
	(1, 'Admin', NULL, 'admin@virtual.upt.pe', '$2y$10$Iq62mkkgTScJVEMoQ/P3ouLeVm/Zjq1dujuBvlAlY1Z6EbRjkBS9W', 1, 'Administrador', 1),
	(5, 'Jesus Humberto', 'Escalante Alanoca', 'je2015050641@virtual.upt.pe', '$2y$10$hn3NlEYExkoOHHqHm9lXDelSIm7U8KpnJ4xkHW2CbaWucUEQg9eqS', 1, 'Administrador', 1),
	(6, 'Usuario 2', 'Apellifo Usuario2', 'usuario2@virtual.upt.pe', '$2y$10$gU2dILCOuLpcgfzrz0EFCOhkwYFAQXidAFG4KXB2spuLIOsxTWodO', 2, 'Editor', 1);

-- Volcando estructura para tabla homestead.valores
CREATE TABLE IF NOT EXISTS `valores` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Valor` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.valores: ~6 rows (aproximadamente)
DELETE FROM `valores`;
INSERT INTO `valores` (`Id`, `Valor`) VALUES
	(1, 'Integridad'),
	(2, 'Compromiso con el desarrollo humano'),
	(3, 'Ética profesional '),
	(4, 'Responsabilidad social'),
	(5, 'Innovación');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
