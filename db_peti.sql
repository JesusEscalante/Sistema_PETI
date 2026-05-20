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
  `Origen` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.amenazas: ~4 rows (aproximadamente)
DELETE FROM `amenazas`;
INSERT INTO `amenazas` (`Id`, `Amenaza`, `Origen`) VALUES
	(1, 'Volatilidad en precios de materias primas para sensores', 'pest'),
	(2, 'Entrada de grandes tecnológicas globales al mercado sostenible', 'porter'),
	(3, 'Ciberseguridad: riesgos de ataques a infraestructura IoT', 'pest'),
	(4, 'Posibles cambios en regulaciones ambientales internacionales que exijan nuevas inversiones', 'porter');

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
	(1, 'La empresa tiene una política sistematizada de cero defectos en la producción de productos/servicios.', 4),
	(2, 'La empresa emplea los medios productivos tecnológicamente más avanzados de su sector.', 3),
	(3, 'La empresa dispone de un sistema de información y control de gestión  eficiente y eficaz. ', 2),
	(4, 'Los medios técnicos y técnológicos de la empresa están preparados para competir en un futuro a corto, medio y largo plazo.', 3),
	(5, 'La empresa es un referente en su sector en I+D+i.', 4),
	(6, 'La excelencia de los procedimientos de la empresa (en ISO, etc.) son una principal fuente de ventaja competiva.', 3),
	(7, 'La empresa dispone de página web, y esta se emplea no sólo como escaparate virtual de productos/servicios, sino también para establecer relaciones con clientes y proveedores.', 2),
	(8, 'Los productos/servicios que desarrolla nuestra empresa llevan incorporada una tecnología difícil de imitar.', 3),
	(9, 'La empresa es referente en su sector en la optimización, en términos de coste,  de su cadena de producción, siendo ésta una de sus principales ventajas competitivas.', 4),
	(10, 'La informatización de la empresa es una fuente de ventaja competitiva clara respecto a sus competidores.', 3),
	(11, 'Los canales de distribución de la empresa son una importante fuente de ventajas competitivas.', 2),
	(12, 'Los productos/servicios de la empresa son altamente, y diferencialmente, valorados por el cliente respecto a nuestros competidores.', 3),
	(13, 'La empresa dispone y ejecuta un sistematico plan de marketing y ventas.', 4),
	(14, 'La empresa tiene optimizada su gestión financiera.', 3),
	(15, 'La empresa busca continuamente el mejorar la relación con sus clientes cortando los plazos de ejecución, personalizando la oferta o mejorando las condiciones de entrega. Pero siempre partiendo de un plan previo.', 2),
	(16, 'La empresa es referente en su sector en el lanzamiento de innovadores productos y servicio de éxito demostrado en el mercado.', 3),
	(17, 'Los Recursos Humanos son especialmente responsables del éxito de la empresa, considerándolos incluso como el principal activo estratégico.', 4),
	(18, 'Se tiene una plantilla altamente motivada, que conoce con claridad las metas, objetivos y estrategias de la organización.', 3),
	(19, 'La empresa siempre trabaja conforme a una estrategia y objetivos claros. ', 2),
	(20, 'La gestión del circulante está optimizada.', 3),
	(21, 'Se tiene definido claramente el posicionamiento estratégico de todos los productos de la empresa.', 4),
	(22, 'Se dispone de una política de marca basada en la reputación que la empresa genera, en la gestión de relación con el cliente y en el posicionamiento estratégico previamente definido.', 3),
	(23, 'La cartera de clientes de nuestra empresa está altamente fidelizada, ya que tenemos como principal propósito el deleitarlos día a día.', 2),
	(24, 'Nuestra política y equipo de ventas y marketing es una importante ventaja competitiva de nuestra empresa respecto al sector.', 3),
	(25, 'El servicio al cliente que prestamos es uno de nuestras principales ventajas competitivas respecto a nuestros competidores.', 4);

-- Volcando estructura para tabla homestead.came
CREATE TABLE IF NOT EXISTS `came` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(50) NOT NULL DEFAULT '',
  `Accion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.came: ~17 rows (aproximadamente)
DELETE FROM `came`;
INSERT INTO `came` (`Id`, `Tipo`, `Accion`) VALUES
	(5, 'C1', 'Implementar software de gestión de proyectos. Automatizar flujos de aprobación y reportes. Capacitar al personal en metodologías ágiles.'),
	(6, 'C2', 'Desarrollar alianzas con 2 proveedores alternativos locales. Crear un stock de seguridad para componentes críticos. Diseñar sensores modulares que permitan sustituir partes fácilmente.'),
	(7, 'C3', 'Contratar especialista en marketing digital B2B. Lanzar campañas en LinkedIn y Google Ads. Crear contenido técnico (webinars, casos de éxito, whitepapers). Optimizar SEO.'),
	(8, 'C4', 'Contratar consultoría especializada. Asignar responsable interno de calidad ambiental. Presupuestar la certificación en 18 meses. Aprovechar incentivos fiscales para financiarla.'),
	(9, 'E1', 'Acelerar expansión geográfica. Abrir oficinas en 2 nuevas ciudades. Lanzar campaña agresiva de branding como "líder local en tecnología ecológica". Participar en cámaras de comercio.'),
	(10, 'E2', 'Crear un sello propio "EcoSoluciones Verified". Ofrecer consultoría en reportes ESG. Desarrollar dashboard de impacto ambiental para clientes.'),
	(11, 'E3', 'Contratar asesor fiscal para maximizar beneficios. Incluir en propuestas comerciales el ahorro fiscal para el cliente. Destinar los ahorros a I+D.'),
	(12, 'E4', 'Formar equipo de IA interno. Desarrollar prototipo de optimización energética predictiva en 6 meses. Lanzar alianza con universidad local para investigación conjunta.'),
	(13, 'A1', 'Diferenciarse por conocimiento local y atención personalizada. Ofrecer precios competitivos (ventaja F4). Fidelizar clientes con contratos de largo plazo. Crear barreras de cambio (integración a medida).'),
	(14, 'A2', 'Crear comité de vigilancia normativa. Suscribirse a boletines oficiales. Desarrollar soluciones flexibles que se adapten a distintos estándares. Obtener ISO 14001 como preparación.'),
	(15, 'A3', 'Negociar contratos fijos con proveedores por volumen. Investigar materiales alternativos más estables. Incorporar cláusulas de ajuste en contratos con clientes.'),
	(16, 'A4', 'Implementar auditorías de seguridad trimestrales. Contratar seguro de ciberseguridad. Capacitar al personal en buenas prácticas. Certificarse en ISO 27001.'),
	(17, 'M1', 'Renovar y ampliar patentes. Invertir anualmente en I+D (5% de ingresos). Registrar nuevas funcionalidades. Monitorear posibles infracciones de competidores.'),
	(18, 'M2', 'Actualizar hardware y software periódicamente. Mantener planes de respaldo y recuperación ante desastres. Realizar pruebas de estrés semestrales.'),
	(19, 'M3', 'Implementar programa de fidelización con descuentos por antigüedad. Realizar encuestas NPS trimestrales. Asignar account managers dedicados a clientes clave.'),
	(20, 'M5', 'Optimizar procesos productivos para mantener márgenes. Revisar precios anualmente. Monitorear constantemente la competencia local.'),
	(21, 'C20', NULL),
	(22, 'M6', '');

-- Volcando estructura para tabla homestead.competidores
CREATE TABLE IF NOT EXISTS `competidores` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Competidor` int(11) NOT NULL,
  `ProductoId` int(11) NOT NULL,
  `Venta` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.competidores: ~28 rows (aproximadamente)
DELETE FROM `competidores`;
INSERT INTO `competidores` (`Id`, `Competidor`, `ProductoId`, `Venta`) VALUES
	(1, 1, 1, 9),
	(2, 1, 2, 19),
	(3, 1, 3, 29),
	(4, 1, 4, 39),
	(5, 1, 5, 49),
	(6, 2, 1, 10),
	(7, 2, 2, 11),
	(8, 2, 3, 20),
	(9, 2, 4, 30),
	(10, 2, 5, 14),
	(11, 3, 1, 2),
	(12, 3, 2, 0),
	(13, 3, 3, 0),
	(14, 3, 4, 0),
	(15, 3, 5, 0),
	(16, 4, 1, 0),
	(17, 4, 2, 0),
	(18, 4, 3, 0),
	(19, 4, 4, 0),
	(20, 4, 5, 0),
	(21, 1, 6, 0),
	(22, 2, 6, 0),
	(23, 3, 6, 0),
	(24, 4, 6, 0),
	(25, 1, 7, 0),
	(26, 2, 7, 0),
	(27, 3, 7, 0),
	(28, 4, 7, 0);

-- Volcando estructura para tabla homestead.debilidades
CREATE TABLE IF NOT EXISTS `debilidades` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Debilidad` varchar(255) NOT NULL,
  `Origen` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.debilidades: ~4 rows (aproximadamente)
DELETE FROM `debilidades`;
INSERT INTO `debilidades` (`Id`, `Debilidad`, `Origen`) VALUES
	(1, 'Baja presencia en marketing digital comparado con competidores', 'participacion'),
	(2, 'Procesos internos manuales en gestión de proyectos', 'cadena'),
	(3, 'Falta de certificaciones ambientales internacionales (ISO 14001)', 'participacion'),
	(4, 'Dependencia de proveedores externos para componentes electrónicos', 'cadena');

-- Volcando estructura para tabla homestead.edgs
CREATE TABLE IF NOT EXISTS `edgs` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Periodo` int(11) NOT NULL DEFAULT '0',
  `ProductoId` int(11) NOT NULL DEFAULT '0',
  `Valor` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.edgs: ~42 rows (aproximadamente)
DELETE FROM `edgs`;
INSERT INTO `edgs` (`Id`, `Periodo`, `ProductoId`, `Valor`) VALUES
	(1, 2016, 1, 10.00),
	(2, 2016, 2, 0.00),
	(3, 2016, 3, 0.00),
	(4, 2016, 4, 0.00),
	(5, 2016, 5, 0.00),
	(6, 2017, 1, 0.00),
	(7, 2017, 2, 8.00),
	(8, 2017, 3, 0.00),
	(9, 2017, 4, 0.00),
	(10, 2017, 5, 0.00),
	(11, 2018, 1, 0.00),
	(12, 2018, 2, 0.00),
	(13, 2018, 3, 5.00),
	(14, 2018, 4, 0.00),
	(15, 2018, 5, 0.00),
	(16, 2019, 1, 0.00),
	(17, 2019, 2, 0.00),
	(18, 2019, 3, 0.00),
	(19, 2019, 4, 8.00),
	(20, 2019, 5, 0.00),
	(21, 2020, 1, 0.00),
	(22, 2020, 2, 0.00),
	(23, 2020, 3, 0.00),
	(24, 2020, 4, 0.00),
	(25, 2020, 5, 2.00),
	(26, 2026, 1, 0.00),
	(27, 2026, 2, 0.00),
	(28, 2026, 3, 0.00),
	(29, 2026, 4, 0.00),
	(30, 2026, 5, 0.00),
	(31, 2016, 6, 0.00),
	(32, 2017, 6, 0.00),
	(33, 2018, 6, 0.00),
	(34, 2019, 6, 0.00),
	(35, 2020, 6, 0.00),
	(36, 2026, 6, 0.00),
	(37, 2016, 7, 0.00),
	(38, 2017, 7, 0.00),
	(39, 2018, 7, 0.00),
	(40, 2019, 7, 0.00),
	(41, 2020, 7, 0.00),
	(42, 2026, 7, 0.00);

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
	(1, 'EcoSoluciones S.A.', 'Empresa dedicada a la consultoría y desarrollo de soluciones tecnológicas sostenibles para la gestión eficiente de recursos naturales en industrias como agricultura, manufactura y logística. Con 10 años de experiencia, combina IoT, inteligencia artificial y energías renovables para reducir la huella ecológica de sus clientes.', 'Proporcionar tecnologías innovadoras y sostenibles que optimicen el uso de recursos naturales, ayudando a las empresas a ser más productivas y responsables con el medio ambiente.', 'Ser líder regional en soluciones tecnológicas ecológicas para 2030, transformando la industria hacia un modelo de cero emisiones netas.');

-- Volcando estructura para tabla homestead.estrategia
CREATE TABLE IF NOT EXISTS `estrategia` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Estrategia` enum('FO','FA','DO','DA','NA') NOT NULL DEFAULT 'FO',
  `Tipo` varchar(255) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.estrategia: ~0 rows (aproximadamente)
DELETE FROM `estrategia`;
INSERT INTO `estrategia` (`Id`, `Estrategia`, `Tipo`, `Descripcion`) VALUES
	(1, 'FO', 'ESTRATEGIA OFENSIVA', 'Deberá adoptar estrategias de crecimiento.');

-- Volcando estructura para tabla homestead.foda
CREATE TABLE IF NOT EXISTS `foda` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` enum('FO','FA','DO','DA') NOT NULL,
  `Codigo` varchar(50) NOT NULL,
  `Valor` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.foda: ~72 rows (aproximadamente)
DELETE FROM `foda`;
INSERT INTO `foda` (`Id`, `Tipo`, `Codigo`, `Valor`) VALUES
	(137, 'FO', 'F1O1', 4),
	(138, 'FO', 'F1O2', 3),
	(139, 'FO', 'F1O3', 2),
	(140, 'FO', 'F1O4', 4),
	(141, 'FO', 'F2O1', 3),
	(142, 'FO', 'F2O2', 2),
	(143, 'FO', 'F2O3', 4),
	(144, 'FO', 'F2O4', 4),
	(145, 'FO', 'F3O1', 3),
	(146, 'FO', 'F3O2', 4),
	(147, 'FO', 'F3O3', 2),
	(148, 'FO', 'F3O4', 2),
	(149, 'FO', 'F5O1', 4),
	(150, 'FO', 'F5O2', 3),
	(151, 'FO', 'F5O3', 3),
	(152, 'FO', 'F5O4', 2),
	(153, 'FA', 'F1A1', 3),
	(154, 'FA', 'F1A2', 2),
	(155, 'FA', 'F1A3', 4),
	(156, 'FA', 'F1A4', 2),
	(157, 'FA', 'F2A1', 2),
	(158, 'FA', 'F2A2', 3),
	(159, 'FA', 'F2A3', 2),
	(160, 'FA', 'F2A4', 4),
	(161, 'FA', 'F3A1', 3),
	(162, 'FA', 'F3A2', 2),
	(163, 'FA', 'F3A3', 2),
	(164, 'FA', 'F3A4', 3),
	(165, 'FA', 'F5A1', 4),
	(166, 'FA', 'F5A2', 2),
	(167, 'FA', 'F5A3', 3),
	(168, 'FA', 'F5A4', 1),
	(169, 'DO', 'D1O1', 2),
	(170, 'DO', 'D1O2', 1),
	(171, 'DO', 'D1O3', 3),
	(172, 'DO', 'D1O4', 4),
	(173, 'DO', 'D2O1', 2),
	(174, 'DO', 'D2O2', 2),
	(175, 'DO', 'D2O3', 2),
	(176, 'DO', 'D2O4', 3),
	(177, 'DO', 'D3O1', 3),
	(178, 'DO', 'D3O2', 4),
	(179, 'DO', 'D3O3', 3),
	(180, 'DO', 'D3O4', 2),
	(181, 'DO', 'D4O1', 4),
	(182, 'DO', 'D4O2', 4),
	(183, 'DO', 'D4O3', 4),
	(184, 'DO', 'D4O4', 2),
	(185, 'DA', 'D1A1', 2),
	(186, 'DA', 'D1A2', 3),
	(187, 'DA', 'D1A3', 2),
	(188, 'DA', 'D1A4', 4),
	(189, 'DA', 'D2A1', 3),
	(190, 'DA', 'D2A2', 2),
	(191, 'DA', 'D2A3', 4),
	(192, 'DA', 'D2A4', 2),
	(193, 'DA', 'D3A1', 4),
	(194, 'DA', 'D3A2', 1),
	(195, 'DA', 'D3A3', 2),
	(196, 'DA', 'D3A4', 3),
	(197, 'DA', 'D4A1', 4),
	(198, 'DA', 'D4A2', 4),
	(199, 'DA', 'D4A3', 1),
	(200, 'DA', 'D4A4', 2),
	(201, 'FO', 'F7O1', 0),
	(202, 'FO', 'F7O2', 0),
	(203, 'FO', 'F7O3', 4),
	(204, 'FO', 'F7O4', 0),
	(205, 'FA', 'F7A1', 4),
	(206, 'FA', 'F7A2', 0),
	(207, 'FA', 'F7A3', 0),
	(208, 'FA', 'F7A4', 0),
	(209, 'FO', 'F6O1', 0),
	(210, 'FO', 'F6O2', 0),
	(211, 'FO', 'F6O3', 0),
	(212, 'FO', 'F6O4', 0),
	(213, 'FA', 'F6A1', 0),
	(214, 'FA', 'F6A2', 0),
	(215, 'FA', 'F6A3', 0),
	(216, 'FA', 'F6A4', 0);

-- Volcando estructura para tabla homestead.fortalezas
CREATE TABLE IF NOT EXISTS `fortalezas` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Fortaleza` varchar(255) NOT NULL,
  `Origen` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.fortalezas: ~4 rows (aproximadamente)
DELETE FROM `fortalezas`;
INSERT INTO `fortalezas` (`Id`, `Fortaleza`, `Origen`) VALUES
	(1, 'Patentes propias en sensores de bajo consumo energético', 'cadena'),
	(2, 'Alto nivel de retención de clientes (85% anual)', 'participacion'),
	(3, 'Infraestructura cloud escalable y segura', 'cadena'),
	(5, 'Liderazgo en costo-beneficio versus competidores locales', 'participacion');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.objetivo_especifico: ~9 rows (aproximadamente)
DELETE FROM `objetivo_especifico`;
INSERT INTO `objetivo_especifico` (`Id`, `ObjGeneral_Id`, `Tipo`, `Objetivo`) VALUES
	(1, 1, 'Funcional', 'Lanzar 2 nuevas funcionalidades de IA predictiva en la plataforma AgroTec por año'),
	(2, 1, 'Funcional', 'Capacitar a 100 ingenieros de cliente en prácticas sostenibles mediante talleres semestrales'),
	(3, 2, 'Operativo', 'Migrar el 100% de los servidores a energía renovable en 12 meses'),
	(4, 2, 'Funcional', 'Implementar una política de teletrabajo híbrido que reduzca viajes en un 30%'),
	(7, 4, 'Funcional', 'Establecer alianzas con 5 empresas de logística regional en el primer año'),
	(8, 4, 'Funcional', 'Desarrollar una versión localizada de LogiVerde para mercados de Centroamérica'),
	(9, 1, 'Operativo', 'Reducir el costo de entrada de las soluciones en un 15% mediante economías de escala'),
	(10, 2, 'Operativo', 'Medir y reportar la huella de carbono corporativa trimestralmente'),
	(11, 4, 'Operativo', 'Participar en 4 ferias internacionales de logística sostenible por año');

-- Volcando estructura para tabla homestead.objetivo_general
CREATE TABLE IF NOT EXISTS `objetivo_general` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Objetivo` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.objetivo_general: ~3 rows (aproximadamente)
DELETE FROM `objetivo_general`;
INSERT INTO `objetivo_general` (`Id`, `Objetivo`) VALUES
	(1, 'Incrementar la adopción de tecnologías sostenibles en clientes industriales en un 40% en 2 años.'),
	(2, 'Reducir la huella de carbono operativa de la propia empresa en un 50% para 2026.'),
	(4, 'Expandir la participación de mercado en el sector logístico centroamericano en un 25% en 18 meses.');

-- Volcando estructura para tabla homestead.oportunidades
CREATE TABLE IF NOT EXISTS `oportunidades` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Oportunidad` varchar(255) NOT NULL,
  `Origen` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.oportunidades: ~4 rows (aproximadamente)
DELETE FROM `oportunidades`;
INSERT INTO `oportunidades` (`Id`, `Oportunidad`, `Origen`) VALUES
	(1, 'Escasez de competidores locales especializados en tecnología ecológica', 'porter'),
	(2, 'Incentivos fiscales gubernamentales para empresas verdes', 'pest'),
	(3, 'Alta exigencia de clientes por soluciones sostenibles, lo que favorece a empresas especializadas', 'porter'),
	(4, 'Avances en inteligencia artificial aplicada a eficiencia energética', 'pest');

-- Volcando estructura para tabla homestead.periodos
CREATE TABLE IF NOT EXISTS `periodos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Periodo` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.periodos: ~5 rows (aproximadamente)
DELETE FROM `periodos`;
INSERT INTO `periodos` (`Id`, `Periodo`) VALUES
	(1, 2016),
	(2, 2017),
	(3, 2018),
	(4, 2019),
	(5, 2020);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.plan_estrategico: ~8 rows (aproximadamente)
DELETE FROM `plan_estrategico`;
INSERT INTO `plan_estrategico` (`Id`, `Fecha`, `Contenido`, `Conclucion`) VALUES
	(1, '2026-05-03 02:33:51', '<p>&nbsp;</p><h5 style=\'text-align: center;\'>RESUMEN EJECUTIVO DEL PLAN ESTRATÉGICO</h5><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Nombre de la Empresa: Empresa 011</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Fecha de elaboración: 03/05/2026</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Emprendedores / Promotores: Jesus Humberto Escalante Alanoca</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>MISIÓN:</h6><h6 style=\'padding-left: 80px;\'>msision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VISIÓN:</h6><h6 style=\'padding-left: 80px;\'>vision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VALORES:</h6><ul><li style=\'margin-left: 80px;\'>Integridad</li><li style=\'margin-left: 80px;\'>Compromiso con el desarrollo humano</li><li style=\'margin-left: 80px;\'>Ética profesional </li><li style=\'margin-left: 80px;\'>Responsabilidad social</li><li style=\'margin-left: 80px;\'>Innovación</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>UNIDADES ESTRATÉGICAS:</h6><ul><li style=\'margin-left: 80px;\'>Ventas1</li><li style=\'margin-left: 80px;\'>Contabilidad</li><li style=\'margin-left: 80px;\'>Marketing1</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>OBJETIVOS ESTRATÉGICOS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>MISIÓN</th><th style=\'text-align: center;\'>OBJETIVOS GENERALES O ESTRATÉGICOS</th><th style=\'text-align: center;\'>OBJETIVOS ESPECÍFICOS</th></tr></thead><tbody><tr><th rowspan=\'10\'>msision de la empresa 01</th></tr><tr><th rowspan=\'3\'>Objetivo general 01</th></tr><tr><td>Objetivo Especifico Funcional 01</td></tr><tr><td>Objetivo Especifico Operativo 01</td></tr><tr><th rowspan=\'3\'>Objetivo general 02</th></tr><tr><td>Objetivo Especifico Funcional 02</td></tr><tr><td>Objetivo Especifico Operativo 02</td></tr><tr><th rowspan=\'3\'>Objetivo general 03</th></tr><tr><td>Objetivo Especifico Funcional 03</td></tr><tr><td>Objetivo Especifico Operativo 03</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'> ANÁLISIS FODA:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><tbody><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>FORTALEZAS</th></tr><tr><td>Fortaleza 01</td></tr><tr><td>Fortaleza 02</td></tr><tr><td>Fortaleza 03</td></tr><tr><td>Fortaleza 05</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>DEBILIDADES</th></tr><tr><td>Debilidad 01</td></tr><tr><td>Debilidad 02</td></tr><tr><td>Debilidad 03</td></tr><tr><td>Debilidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>OPORTUNIDADES</th></tr><tr><td>Oportunidad 01</td></tr><tr><td>Oportunidad 02</td></tr><tr><td>Oportunidad 03</td></tr><tr><td>Oportunidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>AMENAZAS</th></tr><tr><td>Amenaza 01</td></tr><tr><td>Amenaza 02</td></tr><tr><td>Amenaza 03</td></tr><tr><td>Amenaza 04</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>IDENTIFICACIÓN DE ESTRATEGIA:</h6><ul style=\'padding-left: 80px;\'><li><strong>Relacion:</strong> FA</li><li><strong>Tipo:</strong> ESTRATEGIA DEFENSIVA</li><li><strong>Descripción:</strong> La empresa está preparada para enfrentarse a las amenazas.</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>ACCIONES COMPETITIVAS:</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>CONCLUSIONES:</h6>', NULL),
	(2, '2026-05-03 04:09:25', '<p>&nbsp;</p><h5 style=\'text-align: center;\'>RESUMEN EJECUTIVO DEL PLAN ESTRATÉGICO</h5><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Nombre de la Empresa: Empresa 011</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Fecha de elaboración: 03/05/2026</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Emprendedores / Promotores: Jesus Humberto Escalante Alanoca</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>MISIÓN:</h6><h6 style=\'padding-left: 80px;\'>msision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VISIÓN:</h6><h6 style=\'padding-left: 80px;\'>vision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VALORES:</h6><ul><li style=\'margin-left: 80px;\'>Integridad</li><li style=\'margin-left: 80px;\'>Compromiso con el desarrollo humano</li><li style=\'margin-left: 80px;\'>Ética profesional </li><li style=\'margin-left: 80px;\'>Responsabilidad social</li><li style=\'margin-left: 80px;\'>Innovación</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>UNIDADES ESTRATÉGICAS:</h6><ul><li style=\'margin-left: 80px;\'>Ventas1</li><li style=\'margin-left: 80px;\'>Contabilidad</li><li style=\'margin-left: 80px;\'>Marketing1</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>OBJETIVOS ESTRATÉGICOS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>MISIÓN</th><th style=\'text-align: center;\'>OBJETIVOS GENERALES O ESTRATÉGICOS</th><th style=\'text-align: center;\'>OBJETIVOS ESPECÍFICOS</th></tr></thead><tbody><tr><th rowspan=\'10\'>msision de la empresa 01</th></tr><tr><th rowspan=\'3\'>Objetivo general 01</th></tr><tr><td>Objetivo Especifico Funcional 01</td></tr><tr><td>Objetivo Especifico Operativo 01</td></tr><tr><th rowspan=\'3\'>Objetivo general 02</th></tr><tr><td>Objetivo Especifico Funcional 02</td></tr><tr><td>Objetivo Especifico Operativo 02</td></tr><tr><th rowspan=\'3\'>Objetivo general 03</th></tr><tr><td>Objetivo Especifico Funcional 03</td></tr><tr><td>Objetivo Especifico Operativo 03</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'> ANÁLISIS FODA:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><tbody><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>FORTALEZAS</th></tr><tr><td>Fortaleza 01</td></tr><tr><td>Fortaleza 02</td></tr><tr><td>Fortaleza 03</td></tr><tr><td>Fortaleza 05</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>DEBILIDADES</th></tr><tr><td>Debilidad 01</td></tr><tr><td>Debilidad 02</td></tr><tr><td>Debilidad 03</td></tr><tr><td>Debilidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>OPORTUNIDADES</th></tr><tr><td>Oportunidad 01</td></tr><tr><td>Oportunidad 02</td></tr><tr><td>Oportunidad 03</td></tr><tr><td>Oportunidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>AMENAZAS</th></tr><tr><td>Amenaza 01</td></tr><tr><td>Amenaza 02</td></tr><tr><td>Amenaza 03</td></tr><tr><td>Amenaza 04</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>IDENTIFICACIÓN DE ESTRATEGIA:</h6><ul style=\'padding-left: 80px;\'><li><strong>Relacion:</strong> FA</li><li><strong>Tipo:</strong> ESTRATEGIA DEFENSIVA</li><li><strong>Descripción:</strong> La empresa está preparada para enfrentarse a las amenazas.</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>ACCIONES COMPETITIVAS:</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>CONCLUSIONES:</h6>', NULL),
	(3, '2026-05-03 05:58:30', '<p>&nbsp;</p><h5 style=\'text-align: center;\'>RESUMEN EJECUTIVO DEL PLAN ESTRATÉGICO</h5><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Nombre de la Empresa: Empresa 011</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Fecha de elaboración: 03/05/2026</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Emprendedores / Promotores: Jesus Humberto Escalante Alanoca</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>MISIÓN:</h6><h6 style=\'padding-left: 80px;\'>msision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VISIÓN:</h6><h6 style=\'padding-left: 80px;\'>vision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VALORES:</h6><ul><li style=\'margin-left: 80px;\'>Integridad</li><li style=\'margin-left: 80px;\'>Compromiso con el desarrollo humano</li><li style=\'margin-left: 80px;\'>Ética profesional </li><li style=\'margin-left: 80px;\'>Responsabilidad social</li><li style=\'margin-left: 80px;\'>Innovación</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>UNIDADES ESTRATÉGICAS:</h6><ul><li style=\'margin-left: 80px;\'>Ventas1</li><li style=\'margin-left: 80px;\'>Contabilidad</li><li style=\'margin-left: 80px;\'>Marketing1</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>OBJETIVOS ESTRATÉGICOS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>MISIÓN</th><th style=\'text-align: center;\'>OBJETIVOS GENERALES O ESTRATÉGICOS</th><th style=\'text-align: center;\'>OBJETIVOS ESPECÍFICOS</th></tr></thead><tbody><tr><th rowspan=\'10\'>msision de la empresa 01</th></tr><tr><th rowspan=\'3\'>Objetivo general 01</th></tr><tr><td>Objetivo Especifico Funcional 01</td></tr><tr><td>Objetivo Especifico Operativo 01</td></tr><tr><th rowspan=\'3\'>Objetivo general 02</th></tr><tr><td>Objetivo Especifico Funcional 02</td></tr><tr><td>Objetivo Especifico Operativo 02</td></tr><tr><th rowspan=\'3\'>Objetivo general 03</th></tr><tr><td>Objetivo Especifico Funcional 03</td></tr><tr><td>Objetivo Especifico Operativo 03</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'> ANÁLISIS FODA:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><tbody><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>FORTALEZAS</th></tr><tr><td>Fortaleza 01</td></tr><tr><td>Fortaleza 02</td></tr><tr><td>Fortaleza 03</td></tr><tr><td>Fortaleza 05</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>DEBILIDADES</th></tr><tr><td>Debilidad 01</td></tr><tr><td>Debilidad 02</td></tr><tr><td>Debilidad 03</td></tr><tr><td>Debilidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>OPORTUNIDADES</th></tr><tr><td>Oportunidad 01</td></tr><tr><td>Oportunidad 02</td></tr><tr><td>Oportunidad 03</td></tr><tr><td>Oportunidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>AMENAZAS</th></tr><tr><td>Amenaza 01</td></tr><tr><td>Amenaza 02</td></tr><tr><td>Amenaza 03</td></tr><tr><td>Amenaza 04</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>IDENTIFICACIÓN DE ESTRATEGIA:</h6><ul style=\'padding-left: 80px;\'><li><strong>Relacion:</strong> FA</li><li><strong>Tipo:</strong> ESTRATEGIA DEFENSIVA</li><li><strong>Descripción:</strong> La empresa está preparada para enfrentarse a las amenazas.</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>ACCIONES COMPETITIVAS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>ID</th><th style=\'text-align: center;\'>ACCION</th></tr></thead><tbody><tr><td>5</td><td>asda</td></tr><tr><td>5</td><td>asda</td></tr><tr><td>5</td><td>asda</td></tr><tr><td>5</td><td>asda</td></tr><tr><td>6</td><td></td></tr><tr><td>6</td><td></td></tr><tr><td>6</td><td></td></tr><tr><td>6</td><td></td></tr><tr><td>7</td><td></td></tr><tr><td>7</td><td></td></tr><tr><td>7</td><td></td></tr><tr><td>7</td><td></td></tr><tr><td>8</td><td></td></tr><tr><td>8</td><td></td></tr><tr><td>8</td><td></td></tr><tr><td>9</td><td></td></tr><tr><td>9</td><td></td></tr><tr><td>9</td><td></td></tr><tr><td>9</td><td></td></tr><tr><td>10</td><td></td></tr><tr><td>10</td><td></td></tr><tr><td>10</td><td></td></tr><tr><td>10</td><td></td></tr><tr><td>11</td><td></td></tr><tr><td>11</td><td></td></tr><tr><td>11</td><td></td></tr><tr><td>11</td><td></td></tr><tr><td>12</td><td>SFD</td></tr><tr><td>12</td><td>SFD</td></tr><tr><td>12</td><td>SFD</td></tr><tr><td>13</td><td></td></tr><tr><td>13</td><td></td></tr><tr><td>13</td><td></td></tr><tr><td>13</td><td></td></tr><tr><td>14</td><td>SDF</td></tr><tr><td>14</td><td>SDF</td></tr><tr><td>14</td><td>SDF</td></tr><tr><td>14</td><td>SDF</td></tr><tr><td>15</td><td></td></tr><tr><td>15</td><td></td></tr><tr><td>15</td><td></td></tr><tr><td>15</td><td></td></tr><tr><td>16</td><td></td></tr><tr><td>16</td><td></td></tr><tr><td>16</td><td></td></tr><tr><td>17</td><td></td></tr><tr><td>17</td><td></td></tr><tr><td>17</td><td></td></tr><tr><td>17</td><td></td></tr><tr><td>18</td><td></td></tr><tr><td>18</td><td></td></tr><tr><td>18</td><td></td></tr><tr><td>18</td><td></td></tr><tr><td>19</td><td>SDF</td></tr><tr><td>19</td><td>SDF</td></tr><tr><td>19</td><td>SDF</td></tr><tr><td>19</td><td>SDF</td></tr><tr><td>20</td><td></td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>CONCLUSIONES:</h6>', NULL),
	(4, '2026-05-03 06:00:26', '<p>&nbsp;</p><h5 style=\'text-align: center;\'>RESUMEN EJECUTIVO DEL PLAN ESTRATÉGICO</h5><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Nombre de la Empresa: Empresa 011</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Fecha de elaboración: 03/05/2026</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Emprendedores / Promotores: Jesus Humberto Escalante Alanoca</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>MISIÓN:</h6><h6 style=\'padding-left: 80px;\'>msision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VISIÓN:</h6><h6 style=\'padding-left: 80px;\'>vision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VALORES:</h6><ul><li style=\'margin-left: 80px;\'>Integridad</li><li style=\'margin-left: 80px;\'>Compromiso con el desarrollo humano</li><li style=\'margin-left: 80px;\'>Ética profesional </li><li style=\'margin-left: 80px;\'>Responsabilidad social</li><li style=\'margin-left: 80px;\'>Innovación</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>UNIDADES ESTRATÉGICAS:</h6><ul><li style=\'margin-left: 80px;\'>Ventas1</li><li style=\'margin-left: 80px;\'>Contabilidad</li><li style=\'margin-left: 80px;\'>Marketing1</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>OBJETIVOS ESTRATÉGICOS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>MISIÓN</th><th style=\'text-align: center;\'>OBJETIVOS GENERALES O ESTRATÉGICOS</th><th style=\'text-align: center;\'>OBJETIVOS ESPECÍFICOS</th></tr></thead><tbody><tr><th rowspan=\'10\'>msision de la empresa 01</th></tr><tr><th rowspan=\'3\'>Objetivo general 01</th></tr><tr><td>Objetivo Especifico Funcional 01</td></tr><tr><td>Objetivo Especifico Operativo 01</td></tr><tr><th rowspan=\'3\'>Objetivo general 02</th></tr><tr><td>Objetivo Especifico Funcional 02</td></tr><tr><td>Objetivo Especifico Operativo 02</td></tr><tr><th rowspan=\'3\'>Objetivo general 03</th></tr><tr><td>Objetivo Especifico Funcional 03</td></tr><tr><td>Objetivo Especifico Operativo 03</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'> ANÁLISIS FODA:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><tbody><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>FORTALEZAS</th></tr><tr><td>Fortaleza 01</td></tr><tr><td>Fortaleza 02</td></tr><tr><td>Fortaleza 03</td></tr><tr><td>Fortaleza 05</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>DEBILIDADES</th></tr><tr><td>Debilidad 01</td></tr><tr><td>Debilidad 02</td></tr><tr><td>Debilidad 03</td></tr><tr><td>Debilidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>OPORTUNIDADES</th></tr><tr><td>Oportunidad 01</td></tr><tr><td>Oportunidad 02</td></tr><tr><td>Oportunidad 03</td></tr><tr><td>Oportunidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>AMENAZAS</th></tr><tr><td>Amenaza 01</td></tr><tr><td>Amenaza 02</td></tr><tr><td>Amenaza 03</td></tr><tr><td>Amenaza 04</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>IDENTIFICACIÓN DE ESTRATEGIA:</h6><ul style=\'padding-left: 80px;\'><li><strong>Relacion:</strong> FA</li><li><strong>Tipo:</strong> ESTRATEGIA DEFENSIVA</li><li><strong>Descripción:</strong> La empresa está preparada para enfrentarse a las amenazas.</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>ACCIONES COMPETITIVAS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>ID</th><th style=\'text-align: center;\'>ACCION</th></tr></thead><tbody><tr><td>5</td><td>asda</td></tr><tr><td>6</td><td></td></tr><tr><td>7</td><td></td></tr><tr><td>8</td><td></td></tr><tr><td>9</td><td></td></tr><tr><td>10</td><td></td></tr><tr><td>11</td><td></td></tr><tr><td>12</td><td>SFD</td></tr><tr><td>13</td><td></td></tr><tr><td>14</td><td>SDF</td></tr><tr><td>15</td><td></td></tr><tr><td>16</td><td></td></tr><tr><td>17</td><td></td></tr><tr><td>18</td><td></td></tr><tr><td>19</td><td>SDF</td></tr><tr><td>5</td><td>asda</td></tr><tr><td>6</td><td></td></tr><tr><td>7</td><td></td></tr><tr><td>8</td><td></td></tr><tr><td>9</td><td></td></tr><tr><td>10</td><td></td></tr><tr><td>11</td><td></td></tr><tr><td>12</td><td>SFD</td></tr><tr><td>13</td><td></td></tr><tr><td>14</td><td>SDF</td></tr><tr><td>15</td><td></td></tr><tr><td>16</td><td></td></tr><tr><td>17</td><td></td></tr><tr><td>18</td><td></td></tr><tr><td>19</td><td>SDF</td></tr><tr><td>5</td><td>asda</td></tr><tr><td>6</td><td></td></tr><tr><td>7</td><td></td></tr><tr><td>9</td><td></td></tr><tr><td>10</td><td></td></tr><tr><td>11</td><td></td></tr><tr><td>13</td><td></td></tr><tr><td>14</td><td>SDF</td></tr><tr><td>15</td><td></td></tr><tr><td>17</td><td></td></tr><tr><td>18</td><td></td></tr><tr><td>19</td><td>SDF</td></tr><tr><td>20</td><td></td></tr><tr><td>5</td><td>asda</td></tr><tr><td>6</td><td></td></tr><tr><td>7</td><td></td></tr><tr><td>8</td><td></td></tr><tr><td>9</td><td></td></tr><tr><td>10</td><td></td></tr><tr><td>11</td><td></td></tr><tr><td>12</td><td>SFD</td></tr><tr><td>13</td><td></td></tr><tr><td>14</td><td>SDF</td></tr><tr><td>15</td><td></td></tr><tr><td>16</td><td></td></tr><tr><td>17</td><td></td></tr><tr><td>18</td><td></td></tr><tr><td>19</td><td>SDF</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>CONCLUSIONES:</h6>', NULL),
	(5, '2026-05-03 06:07:04', '<p>&nbsp;</p><h5 style=\'text-align: center;\'>RESUMEN EJECUTIVO DEL PLAN ESTRATÉGICO</h5><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Nombre de la Empresa: Empresa 011</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Fecha de elaboración: 03/05/2026</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Emprendedores / Promotores: Jesus Humberto Escalante Alanoca</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>MISIÓN:</h6><h6 style=\'padding-left: 80px;\'>msision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VISIÓN:</h6><h6 style=\'padding-left: 80px;\'>vision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VALORES:</h6><ul><li style=\'margin-left: 80px;\'>Integridad</li><li style=\'margin-left: 80px;\'>Compromiso con el desarrollo humano</li><li style=\'margin-left: 80px;\'>Ética profesional </li><li style=\'margin-left: 80px;\'>Responsabilidad social</li><li style=\'margin-left: 80px;\'>Innovación</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>UNIDADES ESTRATÉGICAS:</h6><ul><li style=\'margin-left: 80px;\'>Ventas1</li><li style=\'margin-left: 80px;\'>Contabilidad</li><li style=\'margin-left: 80px;\'>Marketing1</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>OBJETIVOS ESTRATÉGICOS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>MISIÓN</th><th style=\'text-align: center;\'>OBJETIVOS GENERALES O ESTRATÉGICOS</th><th style=\'text-align: center;\'>OBJETIVOS ESPECÍFICOS</th></tr></thead><tbody><tr><th rowspan=\'10\'>msision de la empresa 01</th></tr><tr><th rowspan=\'3\'>Objetivo general 01</th></tr><tr><td>Objetivo Especifico Funcional 01</td></tr><tr><td>Objetivo Especifico Operativo 01</td></tr><tr><th rowspan=\'3\'>Objetivo general 02</th></tr><tr><td>Objetivo Especifico Funcional 02</td></tr><tr><td>Objetivo Especifico Operativo 02</td></tr><tr><th rowspan=\'3\'>Objetivo general 03</th></tr><tr><td>Objetivo Especifico Funcional 03</td></tr><tr><td>Objetivo Especifico Operativo 03</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'> ANÁLISIS FODA:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><tbody><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>FORTALEZAS</th></tr><tr><td>Fortaleza 01</td></tr><tr><td>Fortaleza 02</td></tr><tr><td>Fortaleza 03</td></tr><tr><td>Fortaleza 05</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>DEBILIDADES</th></tr><tr><td>Debilidad 01</td></tr><tr><td>Debilidad 02</td></tr><tr><td>Debilidad 03</td></tr><tr><td>Debilidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>OPORTUNIDADES</th></tr><tr><td>Oportunidad 01</td></tr><tr><td>Oportunidad 02</td></tr><tr><td>Oportunidad 03</td></tr><tr><td>Oportunidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>AMENAZAS</th></tr><tr><td>Amenaza 01</td></tr><tr><td>Amenaza 02</td></tr><tr><td>Amenaza 03</td></tr><tr><td>Amenaza 04</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>IDENTIFICACIÓN DE ESTRATEGIA:</h6><ul style=\'padding-left: 80px;\'><li><strong>Relacion:</strong> FA</li><li><strong>Tipo:</strong> ESTRATEGIA DEFENSIVA</li><li><strong>Descripción:</strong> La empresa está preparada para enfrentarse a las amenazas.</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>ACCIONES COMPETITIVAS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>ID</th><th style=\'text-align: center;\'>ACCION</th></tr></thead><tbody><tr><td>5</td><td>asda</td></tr><tr><td>6</td><td></td></tr><tr><td>7</td><td></td></tr><tr><td>8</td><td></td></tr><tr><td>13</td><td></td></tr><tr><td>14</td><td>SDF</td></tr><tr><td>15</td><td></td></tr><tr><td>16</td><td></td></tr><tr><td>17</td><td></td></tr><tr><td>18</td><td></td></tr><tr><td>19</td><td>SDF</td></tr><tr><td>20</td><td></td></tr><tr><td>9</td><td></td></tr><tr><td>10</td><td></td></tr><tr><td>11</td><td></td></tr><tr><td>12</td><td>SFD</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>CONCLUSIONES:</h6>', NULL),
	(6, '2026-05-03 06:09:07', '<p>&nbsp;</p><h5 style=\'text-align: center;\'>RESUMEN EJECUTIVO DEL PLAN ESTRATÉGICO</h5><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Nombre de la Empresa: Empresa 011</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Fecha de elaboración: 03/05/2026</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Emprendedores / Promotores: Jesus Humberto Escalante Alanoca</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>MISIÓN:</h6><h6 style=\'padding-left: 80px;\'>msision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VISIÓN:</h6><h6 style=\'padding-left: 80px;\'>vision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VALORES:</h6><ul><li style=\'margin-left: 80px;\'>Integridad</li><li style=\'margin-left: 80px;\'>Compromiso con el desarrollo humano</li><li style=\'margin-left: 80px;\'>Ética profesional </li><li style=\'margin-left: 80px;\'>Responsabilidad social</li><li style=\'margin-left: 80px;\'>Innovación</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>UNIDADES ESTRATÉGICAS:</h6><ul><li style=\'margin-left: 80px;\'>Ventas1</li><li style=\'margin-left: 80px;\'>Contabilidad</li><li style=\'margin-left: 80px;\'>Marketing1</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>OBJETIVOS ESTRATÉGICOS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>MISIÓN</th><th style=\'text-align: center;\'>OBJETIVOS GENERALES O ESTRATÉGICOS</th><th style=\'text-align: center;\'>OBJETIVOS ESPECÍFICOS</th></tr></thead><tbody><tr><th rowspan=\'10\'>msision de la empresa 01</th></tr><tr><th rowspan=\'3\'>Objetivo general 01</th></tr><tr><td>Objetivo Especifico Funcional 01</td></tr><tr><td>Objetivo Especifico Operativo 01</td></tr><tr><th rowspan=\'3\'>Objetivo general 02</th></tr><tr><td>Objetivo Especifico Funcional 02</td></tr><tr><td>Objetivo Especifico Operativo 02</td></tr><tr><th rowspan=\'3\'>Objetivo general 03</th></tr><tr><td>Objetivo Especifico Funcional 03</td></tr><tr><td>Objetivo Especifico Operativo 03</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'> ANÁLISIS FODA:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><tbody><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>FORTALEZAS</th></tr><tr><td>Fortaleza 01</td></tr><tr><td>Fortaleza 02</td></tr><tr><td>Fortaleza 03</td></tr><tr><td>Fortaleza 05</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>DEBILIDADES</th></tr><tr><td>Debilidad 01</td></tr><tr><td>Debilidad 02</td></tr><tr><td>Debilidad 03</td></tr><tr><td>Debilidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>OPORTUNIDADES</th></tr><tr><td>Oportunidad 01</td></tr><tr><td>Oportunidad 02</td></tr><tr><td>Oportunidad 03</td></tr><tr><td>Oportunidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>AMENAZAS</th></tr><tr><td>Amenaza 01</td></tr><tr><td>Amenaza 02</td></tr><tr><td>Amenaza 03</td></tr><tr><td>Amenaza 04</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>IDENTIFICACIÓN DE ESTRATEGIA:</h6><ul style=\'padding-left: 80px;\'><li><strong>Relacion:</strong> FA</li><li><strong>Tipo:</strong> ESTRATEGIA DEFENSIVA</li><li><strong>Descripción:</strong> La empresa está preparada para enfrentarse a las amenazas.</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>ACCIONES COMPETITIVAS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center; width: 80px;\'>ID</th><th style=\'text-align: center;\'>ACCION</th></tr></thead><tbody><tr><td style=\'text-align: center;\'>5</td><td>asda</td></tr><tr><td style=\'text-align: center;\'>6</td><td></td></tr><tr><td style=\'text-align: center;\'>7</td><td></td></tr><tr><td style=\'text-align: center;\'>8</td><td></td></tr><tr><td style=\'text-align: center;\'>13</td><td></td></tr><tr><td style=\'text-align: center;\'>14</td><td>SDF</td></tr><tr><td style=\'text-align: center;\'>15</td><td></td></tr><tr><td style=\'text-align: center;\'>16</td><td></td></tr><tr><td style=\'text-align: center;\'>17</td><td></td></tr><tr><td style=\'text-align: center;\'>18</td><td></td></tr><tr><td style=\'text-align: center;\'>19</td><td>SDF</td></tr><tr><td style=\'text-align: center;\'>20</td><td></td></tr><tr><td style=\'text-align: center;\'>9</td><td></td></tr><tr><td style=\'text-align: center;\'>10</td><td></td></tr><tr><td style=\'text-align: center;\'>11</td><td></td></tr><tr><td style=\'text-align: center;\'>12</td><td>SFD</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>CONCLUSIONES:</h6>', 'conclucion 000111'),
	(7, '2026-05-06 10:56:51', '<p>&nbsp;</p><h5 style=\'text-align: center;\'>RESUMEN EJECUTIVO DEL PLAN ESTRATÉGICO</h5><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Nombre de la Empresa: Empresa 011</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Fecha de elaboración: 06/05/2026</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Emprendedores / Promotores: Jesus Humberto Escalante Alanoca</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>MISIÓN:</h6><h6 style=\'padding-left: 80px;\'>msision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VISIÓN:</h6><h6 style=\'padding-left: 80px;\'>vision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VALORES:</h6><ul><li style=\'margin-left: 80px;\'>Integridad</li><li style=\'margin-left: 80px;\'>Compromiso con el desarrollo humano</li><li style=\'margin-left: 80px;\'>Ética profesional </li><li style=\'margin-left: 80px;\'>Responsabilidad social</li><li style=\'margin-left: 80px;\'>Innovación</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>UNIDADES ESTRATÉGICAS:</h6><ul><li style=\'margin-left: 80px;\'>Ventas1</li><li style=\'margin-left: 80px;\'>Contabilidad</li><li style=\'margin-left: 80px;\'>Marketing1</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>OBJETIVOS ESTRATÉGICOS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>MISIÓN</th><th style=\'text-align: center;\'>OBJETIVOS GENERALES O ESTRATÉGICOS</th><th style=\'text-align: center;\'>OBJETIVOS ESPECÍFICOS</th></tr></thead><tbody><tr><th rowspan=\'10\'>msision de la empresa 01</th></tr><tr><th rowspan=\'3\'>Objetivo general 01</th></tr><tr><td>Objetivo Especifico Funcional 01</td></tr><tr><td>Objetivo Especifico Operativo 01</td></tr><tr><th rowspan=\'3\'>Objetivo general 02</th></tr><tr><td>Objetivo Especifico Funcional 02</td></tr><tr><td>Objetivo Especifico Operativo 02</td></tr><tr><th rowspan=\'3\'>Objetivo general 03</th></tr><tr><td>Objetivo Especifico Funcional 03</td></tr><tr><td>Objetivo Especifico Operativo 03</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'> ANÁLISIS FODA:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><tbody><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>FORTALEZAS</th></tr><tr><td>Fortaleza 01</td></tr><tr><td>Fortaleza 02</td></tr><tr><td>Fortaleza 03</td></tr><tr><td>Fortaleza 05</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>DEBILIDADES</th></tr><tr><td>Debilidad 01</td></tr><tr><td>Debilidad 02</td></tr><tr><td>Debilidad 03</td></tr><tr><td>Debilidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>OPORTUNIDADES</th></tr><tr><td>Oportunidad 01</td></tr><tr><td>Oportunidad 02</td></tr><tr><td>Oportunidad 03</td></tr><tr><td>Oportunidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>AMENAZAS</th></tr><tr><td>Amenaza 01</td></tr><tr><td>Amenaza 02</td></tr><tr><td>Amenaza 03</td></tr><tr><td>Amenaza 04</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>IDENTIFICACIÓN DE ESTRATEGIA:</h6><ul style=\'padding-left: 80px;\'><li><strong>Relacion:</strong> FA</li><li><strong>Tipo:</strong> ESTRATEGIA DEFENSIVA</li><li><strong>Descripción:</strong> La empresa está preparada para enfrentarse a las amenazas.</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>ACCIONES COMPETITIVAS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center; width: 80px;\'>ID</th><th style=\'text-align: center;\'>ACCION</th></tr></thead><tbody><tr><td style=\'text-align: center;\'>5</td><td>asda</td></tr><tr><td style=\'text-align: center;\'>6</td><td></td></tr><tr><td style=\'text-align: center;\'>7</td><td></td></tr><tr><td style=\'text-align: center;\'>8</td><td></td></tr><tr><td style=\'text-align: center;\'>13</td><td></td></tr><tr><td style=\'text-align: center;\'>14</td><td>SDF</td></tr><tr><td style=\'text-align: center;\'>15</td><td></td></tr><tr><td style=\'text-align: center;\'>16</td><td></td></tr><tr><td style=\'text-align: center;\'>17</td><td></td></tr><tr><td style=\'text-align: center;\'>18</td><td></td></tr><tr><td style=\'text-align: center;\'>19</td><td>SDF</td></tr><tr><td style=\'text-align: center;\'>20</td><td></td></tr><tr><td style=\'text-align: center;\'>9</td><td></td></tr><tr><td style=\'text-align: center;\'>10</td><td></td></tr><tr><td style=\'text-align: center;\'>11</td><td></td></tr><tr><td style=\'text-align: center;\'>12</td><td>SFD</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>CONCLUSIONES:</h6>', NULL),
	(8, '2026-05-06 22:19:18', '<p>&nbsp;</p><h5 style=\'text-align: center;\'>RESUMEN EJECUTIVO DEL PLAN ESTRATÉGICO</h5><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Nombre de la Empresa: Empresa 011</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Fecha de elaboración: 06/05/2026</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Emprendedores / Promotores: Jesus Humberto Escalante Alanoca</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>MISIÓN:</h6><h6 style=\'padding-left: 80px;\'>msision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VISIÓN:</h6><h6 style=\'padding-left: 80px;\'>vision de la empresa 01</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VALORES:</h6><ul><li style=\'margin-left: 80px;\'>Integridad</li><li style=\'margin-left: 80px;\'>Compromiso con el desarrollo humano</li><li style=\'margin-left: 80px;\'>Ética profesional </li><li style=\'margin-left: 80px;\'>Responsabilidad social</li><li style=\'margin-left: 80px;\'>Innovación</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>UNIDADES ESTRATÉGICAS:</h6><ul><li style=\'margin-left: 80px;\'>Ventas1</li><li style=\'margin-left: 80px;\'>Contabilidad</li><li style=\'margin-left: 80px;\'>Marketing1</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>OBJETIVOS ESTRATÉGICOS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>MISIÓN</th><th style=\'text-align: center;\'>OBJETIVOS GENERALES O ESTRATÉGICOS</th><th style=\'text-align: center;\'>OBJETIVOS ESPECÍFICOS</th></tr></thead><tbody><tr><th rowspan=\'10\'>msision de la empresa 01</th></tr><tr><th rowspan=\'3\'>Objetivo general 01</th></tr><tr><td>Objetivo Especifico Funcional 01</td></tr><tr><td>Objetivo Especifico Operativo 01</td></tr><tr><th rowspan=\'3\'>Objetivo general 02</th></tr><tr><td>Objetivo Especifico Funcional 02</td></tr><tr><td>Objetivo Especifico Operativo 02</td></tr><tr><th rowspan=\'3\'>Objetivo general 03</th></tr><tr><td>Objetivo Especifico Funcional 03</td></tr><tr><td>Objetivo Especifico Operativo 03</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'> ANÁLISIS FODA:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><tbody><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>FORTALEZAS</th></tr><tr><td>Fortaleza 01</td></tr><tr><td>Fortaleza 02</td></tr><tr><td>Fortaleza 03</td></tr><tr><td>Fortaleza 05</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>DEBILIDADES</th></tr><tr><td>Debilidad 01</td></tr><tr><td>Debilidad 02</td></tr><tr><td>Debilidad 03</td></tr><tr><td>Debilidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>OPORTUNIDADES</th></tr><tr><td>Oportunidad 01</td></tr><tr><td>Oportunidad 02</td></tr><tr><td>Oportunidad 03</td></tr><tr><td>Oportunidad 04</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>AMENAZAS</th></tr><tr><td>Amenaza 01</td></tr><tr><td>Amenaza 02</td></tr><tr><td>Amenaza 03</td></tr><tr><td>Amenaza 04</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>IDENTIFICACIÓN DE ESTRATEGIA:</h6><ul style=\'padding-left: 80px;\'><li><strong>Relacion:</strong> FA</li><li><strong>Tipo:</strong> ESTRATEGIA DEFENSIVA</li><li><strong>Descripción:</strong> La empresa está preparada para enfrentarse a las amenazas.</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>ACCIONES COMPETITIVAS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center; width: 80px;\'>ID</th><th style=\'text-align: center;\'>ACCION</th></tr></thead><tbody><tr><td style=\'text-align: center;\'>5</td><td>asda</td></tr><tr><td style=\'text-align: center;\'>6</td><td></td></tr><tr><td style=\'text-align: center;\'>7</td><td></td></tr><tr><td style=\'text-align: center;\'>8</td><td></td></tr><tr><td style=\'text-align: center;\'>13</td><td></td></tr><tr><td style=\'text-align: center;\'>14</td><td>SDF</td></tr><tr><td style=\'text-align: center;\'>15</td><td></td></tr><tr><td style=\'text-align: center;\'>16</td><td></td></tr><tr><td style=\'text-align: center;\'>17</td><td></td></tr><tr><td style=\'text-align: center;\'>18</td><td></td></tr><tr><td style=\'text-align: center;\'>19</td><td>SDF</td></tr><tr><td style=\'text-align: center;\'>20</td><td></td></tr><tr><td style=\'text-align: center;\'>9</td><td></td></tr><tr><td style=\'text-align: center;\'>10</td><td></td></tr><tr><td style=\'text-align: center;\'>11</td><td></td></tr><tr><td style=\'text-align: center;\'>12</td><td>SFD</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>CONCLUSIONES:</h6>', NULL),
	(9, '2026-05-14 14:23:33', '<p>&nbsp;</p><h5 style=\'text-align: center;\'>RESUMEN EJECUTIVO DEL PLAN ESTRATÉGICO</h5><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Nombre de la Empresa: EcoSoluciones S.A.</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Fecha de elaboración: 14/05/2026</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Emprendedores / Promotores: Jesus Humberto Escalante Alanoca</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>MISIÓN:</h6><h6 style=\'padding-left: 80px;\'>Proporcionar tecnologías innovadoras y sostenibles que optimicen el uso de recursos naturales, ayudando a las empresas a ser más productivas y responsables con el medio ambiente.</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VISIÓN:</h6><h6 style=\'padding-left: 80px;\'>Ser líder regional en soluciones tecnológicas ecológicas para 2030, transformando la industria hacia un modelo de cero emisiones netas.</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VALORES:</h6><ul><li style=\'margin-left: 80px;\'>Sostenibilidad</li><li style=\'margin-left: 80px;\'>Innovación responsable</li><li style=\'margin-left: 80px;\'>Transparencia</li><li style=\'margin-left: 80px;\'>Compromiso con el cliente</li><li style=\'margin-left: 80px;\'>Mejora continua</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>UNIDADES ESTRATÉGICAS:</h6><ul><li style=\'margin-left: 80px;\'>AgroTec Sostenible</li><li style=\'margin-left: 80px;\'>LogiVerde</li><li style=\'margin-left: 80px;\'>EnerGea</li><li style=\'margin-left: 80px;\'>DataGreen Analytics</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>OBJETIVOS ESTRATÉGICOS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>MISIÓN</th><th style=\'text-align: center;\'>OBJETIVOS GENERALES O ESTRATÉGICOS</th><th style=\'text-align: center;\'>OBJETIVOS ESPECÍFICOS</th></tr></thead><tbody><tr><th rowspan=\'13\'>Proporcionar tecnologías innovadoras y sostenibles que optimicen el uso de recursos naturales, ayudando a las empresas a ser más productivas y responsables con el medio ambiente.</th></tr><tr><th rowspan=\'4\'>Incrementar la adopción de tecnologías sostenibles en clientes industriales en un 40% en 2 años.</th></tr><tr><td>Lanzar 2 nuevas funcionalidades de IA predictiva en la plataforma AgroTec por año</td></tr><tr><td>Capacitar a 100 ingenieros de cliente en prácticas sostenibles mediante talleres semestrales</td></tr><tr><td>Reducir el costo de entrada de las soluciones en un 15% mediante economías de escala</td></tr><tr><th rowspan=\'4\'>Reducir la huella de carbono operativa de la propia empresa en un 50% para 2026.</th></tr><tr><td>Migrar el 100% de los servidores a energía renovable en 12 meses</td></tr><tr><td>Implementar una política de teletrabajo híbrido que reduzca viajes en un 30%</td></tr><tr><td>Medir y reportar la huella de carbono corporativa trimestralmente</td></tr><tr><th rowspan=\'4\'>Expandir la participación de mercado en el sector logístico centroamericano en un 25% en 18 meses.</th></tr><tr><td>Establecer alianzas con 5 empresas de logística regional en el primer año</td></tr><tr><td>Desarrollar una versión localizada de LogiVerde para mercados de Centroamérica</td></tr><tr><td>Participar en 4 ferias internacionales de logística sostenible por año</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'> ANÁLISIS FODA:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><tbody><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>FORTALEZAS</th></tr><tr><td>Patentes propias en sensores de bajo consumo energético</td></tr><tr><td>Alto nivel de retención de clientes (85% anual)</td></tr><tr><td>Infraestructura cloud escalable y segura</td></tr><tr><td>Liderazgo en costo-beneficio versus competidores locales</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>DEBILIDADES</th></tr><tr><td>Baja presencia en marketing digital comparado con competidores</td></tr><tr><td>Procesos internos manuales en gestión de proyectos</td></tr><tr><td>Falta de certificaciones ambientales internacionales (ISO 14001)</td></tr><tr><td>Dependencia de proveedores externos para componentes electrónicos</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>OPORTUNIDADES</th></tr><tr><td>Escasez de competidores locales especializados en tecnología ecológica</td></tr><tr><td>Incentivos fiscales gubernamentales para empresas verdes</td></tr><tr><td>Alta exigencia de clientes por soluciones sostenibles, lo que favorece a empresas especializadas</td></tr><tr><td>Avances en inteligencia artificial aplicada a eficiencia energética</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>AMENAZAS</th></tr><tr><td>Volatilidad en precios de materias primas para sensores</td></tr><tr><td>Entrada de grandes tecnológicas globales al mercado sostenible</td></tr><tr><td>Ciberseguridad: riesgos de ataques a infraestructura IoT</td></tr><tr><td>Posibles cambios en regulaciones ambientales internacionales que exijan nuevas inversiones</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>IDENTIFICACIÓN DE ESTRATEGIA:</h6><ul style=\'padding-left: 80px;\'><li><strong>Relacion:</strong> FO</li><li><strong>Tipo:</strong> ESTRATEGIA OFENSIVA</li><li><strong>Descripción:</strong> Deberá adoptar estrategias de crecimiento.</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>ACCIONES COMPETITIVAS:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center; width: 80px;\'>ID</th><th style=\'text-align: center;\'>ACCION</th></tr></thead><tbody><tr><td style=\'text-align: center;\'>5</td><td>Implementar software de gestión de proyectos. Automatizar flujos de aprobación y reportes. Capacitar al personal en metodologías ágiles.</td></tr><tr><td style=\'text-align: center;\'>6</td><td>Desarrollar alianzas con 2 proveedores alternativos locales. Crear un stock de seguridad para componentes críticos. Diseñar sensores modulares que permitan sustituir partes fácilmente.</td></tr><tr><td style=\'text-align: center;\'>7</td><td>Contratar especialista en marketing digital B2B. Lanzar campañas en LinkedIn y Google Ads. Crear contenido técnico (webinars, casos de éxito, whitepapers). Optimizar SEO.</td></tr><tr><td style=\'text-align: center;\'>8</td><td>Contratar consultoría especializada. Asignar responsable interno de calidad ambiental. Presupuestar la certificación en 18 meses. Aprovechar incentivos fiscales para financiarla.</td></tr><tr><td style=\'text-align: center;\'>13</td><td>Diferenciarse por conocimiento local y atención personalizada. Ofrecer precios competitivos (ventaja F4). Fidelizar clientes con contratos de largo plazo. Crear barreras de cambio (integración a medida).</td></tr><tr><td style=\'text-align: center;\'>14</td><td>Crear comité de vigilancia normativa. Suscribirse a boletines oficiales. Desarrollar soluciones flexibles que se adapten a distintos estándares. Obtener ISO 14001 como preparación.</td></tr><tr><td style=\'text-align: center;\'>15</td><td>Negociar contratos fijos con proveedores por volumen. Investigar materiales alternativos más estables. Incorporar cláusulas de ajuste en contratos con clientes.</td></tr><tr><td style=\'text-align: center;\'>16</td><td>Implementar auditorías de seguridad trimestrales. Contratar seguro de ciberseguridad. Capacitar al personal en buenas prácticas. Certificarse en ISO 27001.</td></tr><tr><td style=\'text-align: center;\'>17</td><td>Renovar y ampliar patentes. Invertir anualmente en I+D (5% de ingresos). Registrar nuevas funcionalidades. Monitorear posibles infracciones de competidores.</td></tr><tr><td style=\'text-align: center;\'>18</td><td>Actualizar hardware y software periódicamente. Mantener planes de respaldo y recuperación ante desastres. Realizar pruebas de estrés semestrales.</td></tr><tr><td style=\'text-align: center;\'>19</td><td>Implementar programa de fidelización con descuentos por antigüedad. Realizar encuestas NPS trimestrales. Asignar account managers dedicados a clientes clave.</td></tr><tr><td style=\'text-align: center;\'>20</td><td>Optimizar procesos productivos para mantener márgenes. Revisar precios anualmente. Monitorear constantemente la competencia local.</td></tr><tr><td style=\'text-align: center;\'>9</td><td>Acelerar expansión geográfica. Abrir oficinas en 2 nuevas ciudades. Lanzar campaña agresiva de branding como "líder local en tecnología ecológica". Participar en cámaras de comercio.</td></tr><tr><td style=\'text-align: center;\'>10</td><td>Crear un sello propio "EcoSoluciones Verified". Ofrecer consultoría en reportes ESG. Desarrollar dashboard de impacto ambiental para clientes.</td></tr><tr><td style=\'text-align: center;\'>11</td><td>Contratar asesor fiscal para maximizar beneficios. Incluir en propuestas comerciales el ahorro fiscal para el cliente. Destinar los ahorros a I+D.</td></tr><tr><td style=\'text-align: center;\'>12</td><td>Formar equipo de IA interno. Desarrollar prototipo de optimización energética predictiva en 6 meses. Lanzar alianza con universidad local para investigación conjunta.</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>CONCLUSIONES:</h6>', NULL),
	(10, '2026-05-14 14:25:38', '<p>&nbsp;</p><h5 style=\'text-align: center;\'>RESUMEN EJECUTIVO DEL PLAN ESTRATÉGICO</h5><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Nombre de la Empresa: EcoSoluciones S.A.</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Fecha de elaboración: 14/05/2026</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Emprendedores / Promotores: Jesus Humberto Escalante Alanoca</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>MISIÓN:</h6><h6 style=\'padding-left: 80px;\'>Proporcionar tecnologías innovadoras y sostenibles que optimicen el uso de recursos naturales, ayudando a las empresas a ser más productivas y responsables con el medio ambiente.</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VISIÓN:</h6><h6 style=\'padding-left: 80px;\'>Ser líder regional en soluciones tecnológicas ecológicas para 2030, transformando la industria hacia un modelo de cero emisiones netas.</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VALORES:</h6><ul><li style=\'margin-left: 80px;\'>Sostenibilidad</li><li style=\'margin-left: 80px;\'>Innovación responsable</li><li style=\'margin-left: 80px;\'>Transparencia</li><li style=\'margin-left: 80px;\'>Compromiso con el cliente</li><li style=\'margin-left: 80px;\'>Mejora continua</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>UNIDADES ESTRATÉGICAS:</h6><ul><li style=\'margin-left: 80px;\'>AgroTec Sostenible</li><li style=\'margin-left: 80px;\'>LogiVerde</li><li style=\'margin-left: 80px;\'>EnerGea</li><li style=\'margin-left: 80px;\'>DataGreen Analytics</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>OBJETIVOS ESTRATÉGICOS:</h6><table style=\'width: 100%; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>MISIÓN</th><th style=\'text-align: center;\'>OBJETIVOS GENERALES O ESTRATÉGICOS</th><th style=\'text-align: center;\'>OBJETIVOS ESPECÍFICOS</th></tr></thead><tbody><tr><th rowspan=\'13\'>Proporcionar tecnologías innovadoras y sostenibles que optimicen el uso de recursos naturales, ayudando a las empresas a ser más productivas y responsables con el medio ambiente.</th></tr><tr><th rowspan=\'4\'>Incrementar la adopción de tecnologías sostenibles en clientes industriales en un 40% en 2 años.</th></tr><tr><td>Lanzar 2 nuevas funcionalidades de IA predictiva en la plataforma AgroTec por año</td></tr><tr><td>Capacitar a 100 ingenieros de cliente en prácticas sostenibles mediante talleres semestrales</td></tr><tr><td>Reducir el costo de entrada de las soluciones en un 15% mediante economías de escala</td></tr><tr><th rowspan=\'4\'>Reducir la huella de carbono operativa de la propia empresa en un 50% para 2026.</th></tr><tr><td>Migrar el 100% de los servidores a energía renovable en 12 meses</td></tr><tr><td>Implementar una política de teletrabajo híbrido que reduzca viajes en un 30%</td></tr><tr><td>Medir y reportar la huella de carbono corporativa trimestralmente</td></tr><tr><th rowspan=\'4\'>Expandir la participación de mercado en el sector logístico centroamericano en un 25% en 18 meses.</th></tr><tr><td>Establecer alianzas con 5 empresas de logística regional en el primer año</td></tr><tr><td>Desarrollar una versión localizada de LogiVerde para mercados de Centroamérica</td></tr><tr><td>Participar en 4 ferias internacionales de logística sostenible por año</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'> ANÁLISIS FODA:</h6><table style=\'width: 100%; max-width: 1050px; border-collapse: collapse;\' border=\'1\'><tbody><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>FORTALEZAS</th></tr><tr><td>Patentes propias en sensores de bajo consumo energético</td></tr><tr><td>Alto nivel de retención de clientes (85% anual)</td></tr><tr><td>Infraestructura cloud escalable y segura</td></tr><tr><td>Liderazgo en costo-beneficio versus competidores locales</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>DEBILIDADES</th></tr><tr><td>Baja presencia en marketing digital comparado con competidores</td></tr><tr><td>Procesos internos manuales en gestión de proyectos</td></tr><tr><td>Falta de certificaciones ambientales internacionales (ISO 14001)</td></tr><tr><td>Dependencia de proveedores externos para componentes electrónicos</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>OPORTUNIDADES</th></tr><tr><td>Escasez de competidores locales especializados en tecnología ecológica</td></tr><tr><td>Incentivos fiscales gubernamentales para empresas verdes</td></tr><tr><td>Alta exigencia de clientes por soluciones sostenibles, lo que favorece a empresas especializadas</td></tr><tr><td>Avances en inteligencia artificial aplicada a eficiencia energética</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>AMENAZAS</th></tr><tr><td>Volatilidad en precios de materias primas para sensores</td></tr><tr><td>Entrada de grandes tecnológicas globales al mercado sostenible</td></tr><tr><td>Ciberseguridad: riesgos de ataques a infraestructura IoT</td></tr><tr><td>Posibles cambios en regulaciones ambientales internacionales que exijan nuevas inversiones</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>IDENTIFICACIÓN DE ESTRATEGIA:</h6><ul style=\'padding-left: 80px;\'><li><strong>Relacion:</strong> FO</li><li><strong>Tipo:</strong> ESTRATEGIA OFENSIVA</li><li><strong>Descripción:</strong> Deberá adoptar estrategias de crecimiento.</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>ACCIONES COMPETITIVAS:</h6><table style=\'width: 100%; border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center; width: 80px;\'>ID</th><th style=\'text-align: center;\'>ACCION</th></tr></thead><tbody><tr><td style=\'text-align: center;\'>5</td><td>Implementar software de gestión de proyectos. Automatizar flujos de aprobación y reportes. Capacitar al personal en metodologías ágiles.</td></tr><tr><td style=\'text-align: center;\'>6</td><td>Desarrollar alianzas con 2 proveedores alternativos locales. Crear un stock de seguridad para componentes críticos. Diseñar sensores modulares que permitan sustituir partes fácilmente.</td></tr><tr><td style=\'text-align: center;\'>7</td><td>Contratar especialista en marketing digital B2B. Lanzar campañas en LinkedIn y Google Ads. Crear contenido técnico (webinars, casos de éxito, whitepapers). Optimizar SEO.</td></tr><tr><td style=\'text-align: center;\'>8</td><td>Contratar consultoría especializada. Asignar responsable interno de calidad ambiental. Presupuestar la certificación en 18 meses. Aprovechar incentivos fiscales para financiarla.</td></tr><tr><td style=\'text-align: center;\'>13</td><td>Diferenciarse por conocimiento local y atención personalizada. Ofrecer precios competitivos (ventaja F4). Fidelizar clientes con contratos de largo plazo. Crear barreras de cambio (integración a medida).</td></tr><tr><td style=\'text-align: center;\'>14</td><td>Crear comité de vigilancia normativa. Suscribirse a boletines oficiales. Desarrollar soluciones flexibles que se adapten a distintos estándares. Obtener ISO 14001 como preparación.</td></tr><tr><td style=\'text-align: center;\'>15</td><td>Negociar contratos fijos con proveedores por volumen. Investigar materiales alternativos más estables. Incorporar cláusulas de ajuste en contratos con clientes.</td></tr><tr><td style=\'text-align: center;\'>16</td><td>Implementar auditorías de seguridad trimestrales. Contratar seguro de ciberseguridad. Capacitar al personal en buenas prácticas. Certificarse en ISO 27001.</td></tr><tr><td style=\'text-align: center;\'>17</td><td>Renovar y ampliar patentes. Invertir anualmente en I+D (5% de ingresos). Registrar nuevas funcionalidades. Monitorear posibles infracciones de competidores.</td></tr><tr><td style=\'text-align: center;\'>18</td><td>Actualizar hardware y software periódicamente. Mantener planes de respaldo y recuperación ante desastres. Realizar pruebas de estrés semestrales.</td></tr><tr><td style=\'text-align: center;\'>19</td><td>Implementar programa de fidelización con descuentos por antigüedad. Realizar encuestas NPS trimestrales. Asignar account managers dedicados a clientes clave.</td></tr><tr><td style=\'text-align: center;\'>20</td><td>Optimizar procesos productivos para mantener márgenes. Revisar precios anualmente. Monitorear constantemente la competencia local.</td></tr><tr><td style=\'text-align: center;\'>9</td><td>Acelerar expansión geográfica. Abrir oficinas en 2 nuevas ciudades. Lanzar campaña agresiva de branding como "líder local en tecnología ecológica". Participar en cámaras de comercio.</td></tr><tr><td style=\'text-align: center;\'>10</td><td>Crear un sello propio "EcoSoluciones Verified". Ofrecer consultoría en reportes ESG. Desarrollar dashboard de impacto ambiental para clientes.</td></tr><tr><td style=\'text-align: center;\'>11</td><td>Contratar asesor fiscal para maximizar beneficios. Incluir en propuestas comerciales el ahorro fiscal para el cliente. Destinar los ahorros a I+D.</td></tr><tr><td style=\'text-align: center;\'>12</td><td>Formar equipo de IA interno. Desarrollar prototipo de optimización energética predictiva en 6 meses. Lanzar alianza con universidad local para investigación conjunta.</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>CONCLUSIONES:</h6>', NULL);

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
	(1, 'Hosting', 5, 6.67, ''),
	(2, 'Producto 02', 10, 13.33, NULL),
	(3, 'Producto 03', 15, 20.00, NULL),
	(4, 'Producto 04', 20, 26.67, NULL),
	(5, 'Producto 05', 25, 33.33, NULL);

-- Volcando estructura para tabla homestead.tcm
CREATE TABLE IF NOT EXISTS `tcm` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Periodo` int(11) NOT NULL DEFAULT '0',
  `ProductoId` int(11) NOT NULL DEFAULT '0',
  `Valor` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.tcm: ~42 rows (aproximadamente)
DELETE FROM `tcm`;
INSERT INTO `tcm` (`Id`, `Periodo`, `ProductoId`, `Valor`) VALUES
	(1, 2016, 1, 1.00),
	(2, 2016, 2, 9.00),
	(3, 2016, 3, 10.00),
	(4, 2016, 4, 5.00),
	(5, 2016, 5, 1.00),
	(6, 2017, 1, 2.00),
	(7, 2017, 2, 8.00),
	(8, 2017, 3, 4.00),
	(9, 2017, 4, 6.00),
	(10, 2017, 5, 4.00),
	(11, 2018, 1, 3.00),
	(12, 2018, 2, 7.00),
	(13, 2018, 3, 7.00),
	(14, 2018, 4, 7.00),
	(15, 2018, 5, 5.00),
	(16, 2019, 1, 4.00),
	(17, 2019, 2, 6.00),
	(18, 2019, 3, 8.00),
	(19, 2019, 4, 8.00),
	(20, 2019, 5, 2.00),
	(21, 2020, 1, 5.00),
	(22, 2020, 2, 5.00),
	(23, 2020, 3, 15.00),
	(24, 2020, 4, 10.00),
	(25, 2020, 5, 9.00),
	(26, 2026, 1, 0.00),
	(27, 2026, 2, 0.00),
	(28, 2026, 3, 0.00),
	(29, 2026, 4, 0.00),
	(30, 2026, 5, 0.00),
	(31, 2016, 6, 0.00),
	(32, 2017, 6, 0.00),
	(33, 2018, 6, 0.00),
	(34, 2019, 6, 0.00),
	(35, 2020, 6, 0.00),
	(36, 2026, 6, 0.00),
	(37, 2016, 7, 0.00),
	(38, 2017, 7, 0.00),
	(39, 2018, 7, 0.00),
	(40, 2019, 7, 0.00),
	(41, 2020, 7, 0.00),
	(42, 2026, 7, 0.00);

-- Volcando estructura para tabla homestead.unidad_estrategica
CREATE TABLE IF NOT EXISTS `unidad_estrategica` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Unidad` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.unidad_estrategica: ~4 rows (aproximadamente)
DELETE FROM `unidad_estrategica`;
INSERT INTO `unidad_estrategica` (`Id`, `Unidad`) VALUES
	(1, 'AgroTec Sostenible'),
	(2, 'LogiVerde'),
	(5, 'EnerGea'),
	(6, 'DataGreen Analytics');

-- Volcando estructura para tabla homestead.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Apellido` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Correo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Avatar` int(1) DEFAULT NULL,
  `Rol` enum('Administrador','Editor','Visualizador') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Editor',
  `Estado` int(1) NOT NULL,
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

-- Volcando datos para la tabla homestead.valores: ~5 rows (aproximadamente)
DELETE FROM `valores`;
INSERT INTO `valores` (`Id`, `Valor`) VALUES
	(1, 'Sostenibilidad'),
	(2, 'Innovación responsable'),
	(3, 'Transparencia'),
	(4, 'Compromiso con el cliente'),
	(5, 'Mejora continua');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
