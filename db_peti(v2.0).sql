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
  `UsuarioId` int(11) NOT NULL,
  `PlanId` int(11) NOT NULL,
  `Amenaza` varchar(255) NOT NULL,
  `Accion` text,
  `Origen` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.amenazas: ~4 rows (aproximadamente)
DELETE FROM `amenazas`;
INSERT INTO `amenazas` (`Id`, `UsuarioId`, `PlanId`, `Amenaza`, `Accion`, `Origen`) VALUES
	(1, 5, 15, 'Volatilidad en precios de materias primas para sensores', 'Negociar contratos fijos con proveedores por volumen.\r\nInvestigar materiales alternativos más estables.\r\nIncorporar cláusulas de ajuste en contratos con clientes.', 'pest'),
	(2, 5, 15, 'Entrada de grandes tecnológicas globales al mercado sostenible', 'Diferenciarse por conocimiento local y atención personalizada.\r\nOfrecer precios competitivos.\r\nFidelizar clientes con contratos de largo plazo.\r\nCrear barreras de cambio (integración a medida).', 'porter'),
	(3, 5, 15, 'Ciberseguridad: riesgos de ataques a infraestructura IoT', 'Implementar auditorías de seguridad trimestrales.\r\nContratar seguro de ciberseguridad.\r\nCapacitar al personal en buenas prácticas.\r\nCertificarse en ISO 27001.', 'pest'),
	(4, 5, 15, 'Posibles cambios en regulaciones ambientales internacionales que exijan nuevas inversiones', 'Crear comité de vigilancia normativa.\r\nSuscribirse a boletines oficiales.\r\nDesarrollar soluciones flexibles que se adapten a distintos estándares.\r\nObtener ISO 14001 como preparación.', 'porter');

-- Volcando estructura para tabla homestead.cadena_valor
CREATE TABLE IF NOT EXISTS `cadena_valor` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `PlanId` int(11) NOT NULL,
  `Pregunta` varchar(10) NOT NULL,
  `Valor` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.cadena_valor: ~50 rows (aproximadamente)
DELETE FROM `cadena_valor`;
INSERT INTO `cadena_valor` (`Id`, `PlanId`, `Pregunta`, `Valor`) VALUES
	(1, 15, 'P1', 4),
	(2, 15, 'P2', 3),
	(3, 15, 'P3', 2),
	(4, 15, 'P4', 3),
	(5, 15, 'P5', 4),
	(6, 15, 'P6', 3),
	(7, 15, 'P7', 2),
	(8, 15, 'P8', 3),
	(9, 15, 'P9', 4),
	(10, 15, 'P10', 3),
	(11, 15, 'P11', 2),
	(12, 15, 'P12', 3),
	(13, 15, 'P13', 4),
	(14, 15, 'P14', 3),
	(15, 15, 'P15', 2),
	(16, 15, 'P16', 3),
	(17, 15, 'P17', 4),
	(18, 15, 'P18', 3),
	(19, 15, 'P19', 2),
	(20, 15, 'P20', 3),
	(21, 15, 'P21', 4),
	(22, 15, 'P22', 3),
	(23, 15, 'P23', 2),
	(24, 15, 'P24', 3),
	(25, 15, 'P25', 4),
	(27, 14, 'P1', 1),
	(28, 14, 'P2', 2),
	(29, 14, 'P3', 1),
	(30, 14, 'P4', 3),
	(31, 14, 'P5', 0),
	(32, 14, 'P6', 0),
	(33, 14, 'P7', 0),
	(34, 14, 'P8', 0),
	(35, 14, 'P9', 0),
	(36, 14, 'P10', 0),
	(37, 14, 'P11', 0),
	(38, 14, 'P12', 0),
	(39, 14, 'P13', 0),
	(40, 14, 'P14', 0),
	(41, 14, 'P15', 0),
	(42, 14, 'P16', 0),
	(43, 14, 'P17', 0),
	(44, 14, 'P18', 0),
	(45, 14, 'P19', 0),
	(46, 14, 'P20', 0),
	(47, 14, 'P21', 0),
	(48, 14, 'P22', 0),
	(49, 14, 'P23', 0),
	(50, 14, 'P24', 0),
	(51, 14, 'P25', 0);

-- Volcando estructura para tabla homestead.came
CREATE TABLE IF NOT EXISTS `came` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `PlanId` int(11) NOT NULL,
  `Tipo` varchar(50) NOT NULL DEFAULT '',
  `Accion` text,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.came: ~50 rows (aproximadamente)
DELETE FROM `came`;
INSERT INTO `came` (`Id`, `PlanId`, `Tipo`, `Accion`) VALUES
	(5, 15, 'C1', 'Implementar software de gestión de proyectos. Automatizar flujos de aprobación y reportes. Capacitar al personal en metodologías ágiles.'),
	(6, 15, 'C2', 'Desarrollar alianzas con 2 proveedores alternativos locales. Crear un stock de seguridad para componentes críticos. Diseñar sensores modulares que permitan sustituir partes fácilmente.'),
	(7, 15, 'C3', 'Contratar especialista en marketing digital B2B. Lanzar campañas en LinkedIn y Google Ads. Crear contenido técnico (webinars, casos de éxito, whitepapers). Optimizar SEO.'),
	(8, 15, 'C4', 'Contratar consultoría especializada. Asignar responsable interno de calidad ambiental. Presupuestar la certificación en 18 meses. Aprovechar incentivos fiscales para financiarla.'),
	(9, 15, 'E1', 'Acelerar expansión geográfica. Abrir oficinas en 2 nuevas ciudades. Lanzar campaña agresiva de branding como "líder local en tecnología ecológica". Participar en cámaras de comercio.'),
	(10, 15, 'E2', 'Crear un sello propio "EcoSoluciones Verified". Ofrecer consultoría en reportes ESG. Desarrollar dashboard de impacto ambiental para clientes.'),
	(11, 15, 'E3', 'Contratar asesor fiscal para maximizar beneficios. Incluir en propuestas comerciales el ahorro fiscal para el cliente. Destinar los ahorros a I+D.'),
	(12, 15, 'E4', 'Formar equipo de IA interno. Desarrollar prototipo de optimización energética predictiva en 6 meses. Lanzar alianza con universidad local para investigación conjunta.'),
	(13, 15, 'A1', 'Diferenciarse por conocimiento local y atención personalizada. Ofrecer precios competitivos (ventaja F4). Fidelizar clientes con contratos de largo plazo. Crear barreras de cambio (integración a medida).'),
	(14, 15, 'A2', 'Crear comité de vigilancia normativa. Suscribirse a boletines oficiales. Desarrollar soluciones flexibles que se adapten a distintos estándares. Obtener ISO 14001 como preparación.'),
	(15, 15, 'A3', 'Negociar contratos fijos con proveedores por volumen. Investigar materiales alternativos más estables. Incorporar cláusulas de ajuste en contratos con clientes.'),
	(16, 15, 'A4', 'Implementar auditorías de seguridad trimestrales. Contratar seguro de ciberseguridad. Capacitar al personal en buenas prácticas. Certificarse en ISO 27001.'),
	(17, 15, 'M1', 'Renovar y ampliar patentes. Invertir anualmente en I+D (5% de ingresos). Registrar nuevas funcionalidades. Monitorear posibles infracciones de competidores.'),
	(18, 15, 'M2', 'Actualizar hardware y software periódicamente. Mantener planes de respaldo y recuperación ante desastres. Realizar pruebas de estrés semestrales.'),
	(19, 15, 'M3', 'Implementar programa de fidelización con descuentos por antigüedad. Realizar encuestas NPS trimestrales. Asignar account managers dedicados a clientes clave.'),
	(20, 15, 'M5', 'Optimizar procesos productivos para mantener márgenes. Revisar precios anualmente. Monitorear constantemente la competencia local.'),
	(21, 15, 'C20', NULL),
	(22, 15, 'M6', ''),
	(23, 14, 'M1', 'acción plan14'),
	(24, 14, 'M2', NULL),
	(25, 14, 'M3', NULL),
	(26, 14, 'M5', NULL),
	(27, 14, 'C1', NULL),
	(28, 14, 'C2', NULL),
	(29, 14, 'C3', NULL),
	(30, 14, 'C4', NULL),
	(31, 14, 'E1', NULL),
	(32, 14, 'E2', NULL),
	(33, 14, 'E3', NULL),
	(34, 14, 'E4', NULL),
	(35, 14, 'A1', NULL),
	(36, 14, 'A2', NULL),
	(37, 14, 'A3', NULL),
	(38, 14, 'A4', NULL),
	(39, 10, 'M1', NULL),
	(40, 10, 'M2', NULL),
	(41, 10, 'M3', NULL),
	(42, 10, 'M5', NULL),
	(43, 10, 'C1', NULL),
	(44, 10, 'C2', NULL),
	(45, 10, 'C3', NULL),
	(46, 10, 'C4', NULL),
	(47, 10, 'E1', NULL),
	(48, 10, 'E2', NULL),
	(49, 10, 'E3', NULL),
	(50, 10, 'E4', NULL),
	(51, 10, 'A1', NULL),
	(52, 10, 'A2', NULL),
	(53, 10, 'A3', NULL),
	(54, 10, 'A4', NULL);

-- Volcando estructura para tabla homestead.colaboradores
CREATE TABLE IF NOT EXISTS `colaboradores` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `PlanId` int(11) NOT NULL,
  `UsuarioId` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.colaboradores: ~2 rows (aproximadamente)
DELETE FROM `colaboradores`;
INSERT INTO `colaboradores` (`Id`, `PlanId`, `UsuarioId`) VALUES
	(1, 15, 6),
	(2, 15, 7);

-- Volcando estructura para tabla homestead.competidores
CREATE TABLE IF NOT EXISTS `competidores` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioId` int(11) NOT NULL,
  `PlanId` int(11) NOT NULL,
  `Competidor` int(11) NOT NULL,
  `ProductoId` int(11) NOT NULL,
  `Venta` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.competidores: ~31 rows (aproximadamente)
DELETE FROM `competidores`;
INSERT INTO `competidores` (`Id`, `UsuarioId`, `PlanId`, `Competidor`, `ProductoId`, `Venta`) VALUES
	(1, 5, 15, 1, 1, 9),
	(2, 5, 15, 1, 2, 19),
	(3, 5, 15, 1, 3, 29),
	(4, 5, 15, 1, 4, 39),
	(5, 5, 15, 1, 5, 49),
	(6, 5, 15, 2, 1, 10),
	(7, 5, 15, 2, 2, 11),
	(8, 5, 15, 2, 3, 20),
	(9, 5, 15, 2, 4, 30),
	(10, 5, 15, 2, 5, 14),
	(11, 5, 15, 3, 1, 2),
	(12, 5, 15, 3, 2, 0),
	(13, 5, 15, 3, 3, 0),
	(14, 5, 15, 3, 4, 0),
	(15, 5, 15, 3, 5, 0),
	(16, 5, 15, 4, 1, 1),
	(17, 5, 15, 4, 2, 2),
	(18, 5, 15, 4, 3, 0),
	(19, 5, 15, 4, 4, 0),
	(20, 5, 15, 4, 5, 0),
	(21, 5, 15, 1, 6, 0),
	(22, 5, 15, 2, 6, 0),
	(23, 5, 15, 3, 6, 0),
	(24, 5, 15, 4, 6, 0),
	(25, 5, 15, 1, 7, 0),
	(26, 5, 15, 2, 7, 0),
	(27, 5, 15, 3, 7, 0),
	(28, 5, 15, 4, 7, 0),
	(29, 5, 15, 5, 1, 0),
	(30, 5, 15, 5, 2, 0),
	(31, 5, 15, 5, 3, 0),
	(32, 5, 15, 5, 4, 0),
	(33, 5, 15, 5, 5, 0),
	(34, 5, 16, 1, 6, 10),
	(35, 5, 16, 1, 7, 60);

-- Volcando estructura para tabla homestead.debilidades
CREATE TABLE IF NOT EXISTS `debilidades` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioId` int(11) NOT NULL,
  `PlanId` int(11) NOT NULL,
  `Debilidad` varchar(255) NOT NULL,
  `Accion` text,
  `Origen` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.debilidades: ~4 rows (aproximadamente)
DELETE FROM `debilidades`;
INSERT INTO `debilidades` (`Id`, `UsuarioId`, `PlanId`, `Debilidad`, `Accion`, `Origen`) VALUES
	(1, 5, 15, 'Baja presencia en marketing digital comparado con competidores', 'Contratar especialista en marketing digital B2B.\r\nLanzar campañas en LinkedIn y Google Ads.\r\nCrear contenido técnico (webinars, casos de éxito, whitepapers).\r\nOptimizar SEO.', 'participacion'),
	(2, 5, 15, 'Procesos internos manuales en gestión de proyectos', 'Implementar software de gestión de proyectos.\r\nAutomatizar flujos de aprobación y reportes.\r\nCapacitar al personal en metodologías ágiles.', 'cadena'),
	(3, 5, 15, 'Falta de certificaciones ambientales internacionales (ISO 14001)', 'Contratar consultoría especializada.\r\nAsignar responsable interno de calidad ambiental.\r\nPresupuestar la certificación en 18 meses.\r\nAprovechar incentivos fiscales para financiarla.', 'participacion'),
	(4, 5, 15, 'Dependencia de proveedores externos para componentes electrónicos', 'Desarrollar alianzas con 2 proveedores alternativos locales.\r\nCrear un stock de seguridad para componentes críticos.\r\nDiseñar sensores modulares que permitan sustituir partes fácilmente.', 'cadena');

-- Volcando estructura para tabla homestead.detalle_estrategia
CREATE TABLE IF NOT EXISTS `detalle_estrategia` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Relacion` enum('FO','FA','DO','DA') NOT NULL,
  `Tipo` varchar(100) NOT NULL,
  `Descripcion` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.detalle_estrategia: ~4 rows (aproximadamente)
DELETE FROM `detalle_estrategia`;
INSERT INTO `detalle_estrategia` (`Id`, `Relacion`, `Tipo`, `Descripcion`) VALUES
	(1, 'FO', 'OFENSIVA', 'Deberá adoptar estrategias de crecimiento.'),
	(2, 'FA', 'DEFENSIVA', 'La empresa está preparada para enfrentarse a las amenazas.'),
	(3, 'DO', 'REORIENTACIÓN', 'La empresa no puede aprovechar las oportunidades porque carece de preparación adecuada.'),
	(4, 'DA', 'SUPERVIVENCIA', 'Se enfrenta a amenazas externas sin las fortalezas necesarias para luchar con la competencia.');

-- Volcando estructura para tabla homestead.edgs
CREATE TABLE IF NOT EXISTS `edgs` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioId` int(11) NOT NULL,
  `PlanId` int(11) NOT NULL,
  `Periodo` int(11) NOT NULL DEFAULT '0',
  `ProductoId` int(11) NOT NULL DEFAULT '0',
  `Valor` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.edgs: ~67 rows (aproximadamente)
DELETE FROM `edgs`;
INSERT INTO `edgs` (`Id`, `UsuarioId`, `PlanId`, `Periodo`, `ProductoId`, `Valor`) VALUES
	(1, 5, 15, 2016, 1, 10.00),
	(2, 5, 15, 2016, 2, 0.00),
	(3, 5, 15, 2016, 3, 0.00),
	(4, 5, 15, 2016, 4, 0.00),
	(5, 5, 15, 2016, 5, 0.00),
	(6, 5, 15, 2017, 1, 0.00),
	(7, 5, 15, 2017, 2, 8.00),
	(8, 5, 15, 2017, 3, 0.00),
	(9, 5, 15, 2017, 4, 0.00),
	(10, 5, 15, 2017, 5, 0.00),
	(11, 5, 15, 2018, 1, 0.00),
	(12, 5, 15, 2018, 2, 0.00),
	(13, 5, 15, 2018, 3, 5.00),
	(14, 5, 15, 2018, 4, 0.00),
	(15, 5, 15, 2018, 5, 0.00),
	(16, 5, 15, 2019, 1, 0.00),
	(17, 5, 15, 2019, 2, 0.00),
	(18, 5, 15, 2019, 3, 0.00),
	(19, 5, 15, 2019, 4, 8.00),
	(20, 5, 15, 2019, 5, 0.00),
	(21, 5, 15, 2020, 1, 0.00),
	(22, 5, 15, 2020, 2, 0.00),
	(23, 5, 15, 2020, 3, 0.00),
	(24, 5, 15, 2020, 4, 0.00),
	(25, 5, 15, 2020, 5, 2.00),
	(26, 5, 15, 2026, 1, 0.00),
	(27, 5, 15, 2026, 2, 0.00),
	(28, 5, 15, 2026, 3, 0.00),
	(29, 5, 15, 2026, 4, 0.00),
	(30, 5, 15, 2026, 5, 0.00),
	(31, 5, 15, 2016, 6, 0.00),
	(32, 5, 15, 2017, 6, 0.00),
	(33, 5, 15, 2018, 6, 0.00),
	(34, 5, 15, 2019, 6, 0.00),
	(35, 5, 15, 2020, 6, 0.00),
	(36, 5, 15, 2026, 6, 0.00),
	(37, 5, 15, 2016, 7, 0.00),
	(38, 5, 15, 2017, 7, 0.00),
	(39, 5, 15, 2018, 7, 0.00),
	(40, 5, 15, 2019, 7, 0.00),
	(41, 5, 15, 2020, 7, 0.00),
	(42, 5, 15, 2026, 7, 0.00),
	(43, 5, 15, 2021, 1, 1.00),
	(44, 5, 15, 2021, 2, 0.00),
	(45, 5, 15, 2021, 3, 0.00),
	(46, 5, 15, 2021, 4, 0.00),
	(47, 5, 15, 2021, 5, 0.00),
	(48, 5, 15, 2022, 1, 0.00),
	(49, 5, 15, 2022, 2, 0.00),
	(50, 5, 15, 2022, 3, 0.00),
	(51, 5, 15, 2022, 4, 0.00),
	(52, 5, 15, 2022, 5, 0.00),
	(53, 5, 15, 2023, 1, 0.00),
	(54, 5, 15, 2023, 2, 0.00),
	(55, 5, 15, 2023, 3, 0.00),
	(56, 5, 15, 2023, 4, 0.00),
	(57, 5, 15, 2023, 5, 0.00),
	(58, 5, 15, 2024, 1, 0.00),
	(59, 5, 15, 2024, 2, 0.00),
	(60, 5, 15, 2024, 3, 0.00),
	(61, 5, 15, 2024, 4, 0.00),
	(62, 5, 15, 2024, 5, 0.00),
	(63, 5, 15, 2025, 1, 0.00),
	(64, 5, 15, 2025, 2, 0.00),
	(65, 5, 15, 2025, 3, 0.00),
	(66, 5, 15, 2025, 4, 0.00),
	(67, 5, 15, 2025, 5, 0.00),
	(68, 5, 16, 2015, 6, 0.00),
	(69, 5, 16, 2015, 7, 0.00),
	(70, 5, 16, 2021, 6, 0.00),
	(71, 5, 16, 2021, 7, 0.00),
	(72, 5, 16, 2019, 6, 0.00),
	(73, 5, 16, 2019, 7, 0.00),
	(74, 5, 16, 2020, 6, 0.00),
	(75, 5, 16, 2020, 7, 0.00);

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

-- Volcando estructura para tabla homestead.estrategia_plan
CREATE TABLE IF NOT EXISTS `estrategia_plan` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `PlanId` int(11) NOT NULL,
  `RelacionEstrategia` enum('FO','FA','DO','DA') NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.estrategia_plan: ~1 rows (aproximadamente)
DELETE FROM `estrategia_plan`;
INSERT INTO `estrategia_plan` (`Id`, `PlanId`, `RelacionEstrategia`) VALUES
	(1, 10, 'FO'),
	(2, 15, 'FA');

-- Volcando estructura para tabla homestead.foda
CREATE TABLE IF NOT EXISTS `foda` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `PlanId` int(11) NOT NULL,
  `Tipo` enum('FO','FA','DO','DA') NOT NULL,
  `Codigo` varchar(50) NOT NULL,
  `Valor` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.foda: ~80 rows (aproximadamente)
DELETE FROM `foda`;
INSERT INTO `foda` (`Id`, `PlanId`, `Tipo`, `Codigo`, `Valor`) VALUES
	(137, 15, 'FO', 'F1O1', 4),
	(138, 15, 'FO', 'F1O2', 3),
	(139, 15, 'FO', 'F1O3', 2),
	(140, 15, 'FO', 'F1O4', 4),
	(141, 15, 'FO', 'F2O1', 3),
	(142, 15, 'FO', 'F2O2', 2),
	(143, 15, 'FO', 'F2O3', 4),
	(144, 15, 'FO', 'F2O4', 4),
	(145, 15, 'FO', 'F3O1', 3),
	(146, 15, 'FO', 'F3O2', 4),
	(147, 15, 'FO', 'F3O3', 2),
	(148, 15, 'FO', 'F3O4', 2),
	(149, 15, 'FO', 'F5O1', 4),
	(150, 15, 'FO', 'F5O2', 3),
	(151, 15, 'FO', 'F5O3', 3),
	(152, 15, 'FO', 'F5O4', 2),
	(153, 15, 'FA', 'F1A1', 3),
	(154, 15, 'FA', 'F1A2', 2),
	(155, 15, 'FA', 'F1A3', 4),
	(156, 15, 'FA', 'F1A4', 2),
	(157, 15, 'FA', 'F2A1', 2),
	(158, 15, 'FA', 'F2A2', 3),
	(159, 15, 'FA', 'F2A3', 2),
	(160, 15, 'FA', 'F2A4', 4),
	(161, 15, 'FA', 'F3A1', 3),
	(162, 15, 'FA', 'F3A2', 2),
	(163, 15, 'FA', 'F3A3', 2),
	(164, 15, 'FA', 'F3A4', 3),
	(165, 15, 'FA', 'F5A1', 4),
	(166, 15, 'FA', 'F5A2', 2),
	(167, 15, 'FA', 'F5A3', 3),
	(168, 15, 'FA', 'F5A4', 1),
	(169, 15, 'DO', 'D1O1', 2),
	(170, 15, 'DO', 'D1O2', 1),
	(171, 15, 'DO', 'D1O3', 3),
	(172, 15, 'DO', 'D1O4', 4),
	(173, 15, 'DO', 'D2O1', 2),
	(174, 15, 'DO', 'D2O2', 2),
	(175, 15, 'DO', 'D2O3', 2),
	(176, 15, 'DO', 'D2O4', 3),
	(177, 15, 'DO', 'D3O1', 3),
	(178, 15, 'DO', 'D3O2', 4),
	(179, 15, 'DO', 'D3O3', 3),
	(180, 15, 'DO', 'D3O4', 2),
	(181, 15, 'DO', 'D4O1', 4),
	(182, 15, 'DO', 'D4O2', 4),
	(183, 15, 'DO', 'D4O3', 4),
	(184, 15, 'DO', 'D4O4', 2),
	(185, 15, 'DA', 'D1A1', 2),
	(186, 15, 'DA', 'D1A2', 3),
	(187, 15, 'DA', 'D1A3', 2),
	(188, 15, 'DA', 'D1A4', 4),
	(189, 15, 'DA', 'D2A1', 3),
	(190, 15, 'DA', 'D2A2', 2),
	(191, 15, 'DA', 'D2A3', 4),
	(192, 15, 'DA', 'D2A4', 2),
	(193, 15, 'DA', 'D3A1', 4),
	(194, 15, 'DA', 'D3A2', 1),
	(195, 15, 'DA', 'D3A3', 2),
	(196, 15, 'DA', 'D3A4', 3),
	(197, 15, 'DA', 'D4A1', 4),
	(198, 15, 'DA', 'D4A2', 4),
	(199, 15, 'DA', 'D4A3', 1),
	(200, 15, 'DA', 'D4A4', 2),
	(201, 15, 'FO', 'F7O1', 0),
	(202, 15, 'FO', 'F7O2', 0),
	(203, 15, 'FO', 'F7O3', 4),
	(204, 15, 'FO', 'F7O4', 0),
	(205, 15, 'FA', 'F7A1', 4),
	(206, 15, 'FA', 'F7A2', 0),
	(207, 15, 'FA', 'F7A3', 0),
	(208, 15, 'FA', 'F7A4', 0),
	(209, 15, 'FO', 'F6O1', 0),
	(210, 15, 'FO', 'F6O2', 0),
	(211, 15, 'FO', 'F6O3', 0),
	(212, 15, 'FO', 'F6O4', 0),
	(213, 15, 'FA', 'F6A1', 4),
	(214, 15, 'FA', 'F6A2', 4),
	(215, 15, 'FA', 'F6A3', 4),
	(216, 15, 'FA', 'F6A4', 4);

-- Volcando estructura para tabla homestead.fortalezas
CREATE TABLE IF NOT EXISTS `fortalezas` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioId` int(11) NOT NULL,
  `PlanId` int(11) NOT NULL,
  `Fortaleza` varchar(255) NOT NULL,
  `Accion` text,
  `Origen` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.fortalezas: ~5 rows (aproximadamente)
DELETE FROM `fortalezas`;
INSERT INTO `fortalezas` (`Id`, `UsuarioId`, `PlanId`, `Fortaleza`, `Accion`, `Origen`) VALUES
	(1, 5, 15, 'Patentes propias en sensores de bajo consumo energético', 'Renovar y ampliar patentes.\r\nInvertir anualmente en I+D (5% de ingresos).\r\nRegistrar nuevas funcionalidades.\r\nMonitorear posibles infracciones de competidores.', 'cadena'),
	(2, 5, 15, 'Alto nivel de retención de clientes (85% anual)', 'Implementar programa de fidelización con descuentos por antigüedad.\r\nRealizar encuestas NPS trimestrales.\r\nAsignar account managers dedicados a clientes clave.', 'participacion'),
	(3, 5, 15, 'Infraestructura cloud escalable y segura', 'Actualizar hardware y software periódicamente.\r\nMantener planes de respaldo y recuperación ante desastres.\r\nRealizar pruebas de estrés semestrales.', 'cadena'),
	(5, 5, 15, 'Liderazgo en costo-beneficio versus competidores locales', 'Optimizar procesos productivos para mantener márgenes.\r\nRevisar precios anualmente.\r\nMonitorear constantemente la competencia local.', 'participacion'),
	(6, 7, 15, 'F0111', 'AF0111', 'cadena');

-- Volcando estructura para tabla homestead.fuerzas_porter
CREATE TABLE IF NOT EXISTS `fuerzas_porter` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioId` int(11) NOT NULL,
  `PlanId` int(11) NOT NULL,
  `Fuerza` varchar(50) NOT NULL,
  `Valor` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.fuerzas_porter: ~34 rows (aproximadamente)
DELETE FROM `fuerzas_porter`;
INSERT INTO `fuerzas_porter` (`Id`, `UsuarioId`, `PlanId`, `Fuerza`, `Valor`) VALUES
	(1, 5, 15, 'F1S1', 5),
	(2, 5, 15, 'F1S2', 4),
	(3, 5, 15, 'F1S3', 3),
	(4, 5, 15, 'F1S4', 2),
	(5, 5, 15, 'F1S5', 1),
	(6, 5, 15, 'F1S6', 1),
	(7, 5, 15, 'F2S1', 1),
	(8, 5, 15, 'F2S2', 2),
	(9, 5, 15, 'F2S3', 3),
	(10, 5, 15, 'F2S4', 4),
	(11, 5, 15, 'F2S5', 5),
	(12, 5, 15, 'F2S6', 5),
	(13, 5, 15, 'F3S1', 1),
	(14, 5, 15, 'F3S2', 1),
	(15, 5, 15, 'F3S3', 1),
	(16, 5, 15, 'F3S4', 1),
	(17, 5, 15, 'F4S1', 1),
	(18, 5, 16, 'F1S1', 1),
	(19, 5, 16, 'F1S2', 1),
	(20, 5, 16, 'F1S3', 1),
	(21, 5, 16, 'F1S4', 1),
	(22, 5, 16, 'F1S5', 1),
	(23, 5, 16, 'F1S6', 1),
	(24, 5, 16, 'F2S1', 1),
	(25, 5, 16, 'F2S2', 1),
	(26, 5, 16, 'F2S3', 1),
	(27, 5, 16, 'F2S4', 1),
	(28, 5, 16, 'F2S5', 1),
	(29, 5, 16, 'F2S6', 1),
	(30, 5, 16, 'F3S1', 1),
	(31, 5, 16, 'F3S2', 1),
	(32, 5, 16, 'F3S3', 1),
	(33, 5, 16, 'F3S4', 1),
	(34, 5, 16, 'F4S1', 5);

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
  `UsuarioId` int(11) NOT NULL,
  `PlanId` int(11) NOT NULL,
  `Oportunidad` varchar(255) NOT NULL,
  `Accion` text,
  `Origen` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.oportunidades: ~4 rows (aproximadamente)
DELETE FROM `oportunidades`;
INSERT INTO `oportunidades` (`Id`, `UsuarioId`, `PlanId`, `Oportunidad`, `Accion`, `Origen`) VALUES
	(1, 5, 15, 'Escasez de competidores locales especializados en tecnología ecológica', 'Crear un sello propio "EcoSoluciones Verified".\r\nOfrecer consultoría en reportes ESG.\r\nDesarrollar dashboard de impacto ambiental para clientes.', 'porter'),
	(2, 5, 15, 'Incentivos fiscales gubernamentales para empresas verdes', 'Contratar asesor fiscal para maximizar beneficios.\r\nIncluir en propuestas comerciales el ahorro fiscal para el cliente.\r\nDestinar los ahorros a I+D.', 'pest'),
	(3, 5, 15, 'Alta exigencia de clientes por soluciones sostenibles, lo que favorece a empresas especializadas', 'Acelerar expansión geográfica.\r\nAbrir oficinas en 2 nuevas ciudades.\r\nLanzar campaña agresiva de branding como "líder local en tecnología ecológica".\r\nParticipar en cámaras de comercio.', 'porter'),
	(4, 5, 15, 'Avances en inteligencia artificial aplicada a eficiencia energética', 'Formar equipo de IA interno.\r\nDesarrollar prototipo de optimización energética predictiva en 6 meses.\r\nLanzar alianza con universidad local para investigación conjunta.', 'pest');

-- Volcando estructura para tabla homestead.periodos
CREATE TABLE IF NOT EXISTS `periodos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioId` int(11) NOT NULL,
  `PlanId` int(11) NOT NULL,
  `Periodo` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.periodos: ~7 rows (aproximadamente)
DELETE FROM `periodos`;
INSERT INTO `periodos` (`Id`, `UsuarioId`, `PlanId`, `Periodo`) VALUES
	(9, 5, 15, 2020),
	(11, 5, 15, 2017),
	(12, 5, 15, 2018),
	(13, 5, 15, 2019),
	(14, 5, 15, 2021),
	(18, 5, 16, 2019),
	(19, 5, 16, 2020),
	(20, 5, 16, 2021);

-- Volcando estructura para tabla homestead.pest
CREATE TABLE IF NOT EXISTS `pest` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioId` int(11) NOT NULL,
  `PlanId` int(11) NOT NULL,
  `Codigo` varchar(50) NOT NULL,
  `Valor` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.pest: ~75 rows (aproximadamente)
DELETE FROM `pest`;
INSERT INTO `pest` (`Id`, `UsuarioId`, `PlanId`, `Codigo`, `Valor`) VALUES
	(1, 5, 15, 'P1', 0),
	(2, 5, 15, 'P2', 1),
	(3, 5, 15, 'P3', 2),
	(4, 5, 15, 'P4', 3),
	(5, 5, 15, 'P5', 4),
	(6, 5, 15, 'P6', 3),
	(7, 5, 15, 'P7', 2),
	(8, 5, 15, 'P8', 1),
	(9, 5, 15, 'P9', 0),
	(10, 5, 15, 'P10', 1),
	(11, 5, 15, 'P11', 2),
	(12, 5, 15, 'P12', 3),
	(13, 5, 15, 'P13', 4),
	(14, 5, 15, 'P14', 3),
	(15, 5, 15, 'P15', 2),
	(16, 5, 15, 'P16', 1),
	(17, 5, 15, 'P17', 0),
	(18, 5, 15, 'P18', 1),
	(19, 5, 15, 'P19', 2),
	(20, 5, 15, 'P20', 3),
	(21, 5, 15, 'P21', 4),
	(22, 5, 15, 'P22', 3),
	(23, 5, 15, 'P23', 2),
	(24, 5, 15, 'P24', 1),
	(25, 5, 15, 'P25', 0),
	(26, 5, 16, 'P1', 0),
	(27, 5, 16, 'P2', 0),
	(28, 5, 16, 'P3', 0),
	(29, 5, 16, 'P4', 0),
	(30, 5, 16, 'P5', 0),
	(31, 5, 16, 'P6', 0),
	(32, 5, 16, 'P7', 0),
	(33, 5, 16, 'P8', 0),
	(34, 5, 16, 'P9', 0),
	(35, 5, 16, 'P10', 0),
	(36, 5, 16, 'P11', 0),
	(37, 5, 16, 'P12', 0),
	(38, 5, 16, 'P13', 0),
	(39, 5, 16, 'P14', 0),
	(40, 5, 16, 'P15', 0),
	(41, 5, 16, 'P16', 0),
	(42, 5, 16, 'P17', 0),
	(43, 5, 16, 'P18', 0),
	(44, 5, 16, 'P19', 0),
	(45, 5, 16, 'P20', 0),
	(46, 5, 16, 'P21', 0),
	(47, 5, 16, 'P22', 0),
	(48, 5, 16, 'P23', 0),
	(49, 5, 16, 'P24', 0),
	(50, 5, 16, 'P25', 0),
	(51, 5, 14, 'P1', 0),
	(52, 5, 14, 'P2', 0),
	(53, 5, 14, 'P3', 0),
	(54, 5, 14, 'P4', 0),
	(55, 5, 14, 'P5', 0),
	(56, 5, 14, 'P6', 0),
	(57, 5, 14, 'P7', 0),
	(58, 5, 14, 'P8', 0),
	(59, 5, 14, 'P9', 0),
	(60, 5, 14, 'P10', 0),
	(61, 5, 14, 'P11', 0),
	(62, 5, 14, 'P12', 0),
	(63, 5, 14, 'P13', 0),
	(64, 5, 14, 'P14', 0),
	(65, 5, 14, 'P15', 0),
	(66, 5, 14, 'P16', 0),
	(67, 5, 14, 'P17', 0),
	(68, 5, 14, 'P18', 0),
	(69, 5, 14, 'P19', 0),
	(70, 5, 14, 'P20', 0),
	(71, 5, 14, 'P21', 0),
	(72, 5, 14, 'P22', 0),
	(73, 5, 14, 'P23', 0),
	(74, 5, 14, 'P24', 0),
	(75, 5, 14, 'P25', 0);

-- Volcando estructura para tabla homestead.plan_estrategico
CREATE TABLE IF NOT EXISTS `plan_estrategico` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UsuarioId` int(11) NOT NULL,
  `Contenido` text,
  `Conclucion` text,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.plan_estrategico: ~9 rows (aproximadamente)
DELETE FROM `plan_estrategico`;
INSERT INTO `plan_estrategico` (`Id`, `Fecha`, `UsuarioId`, `Contenido`, `Conclucion`) VALUES
	(10, '2026-05-14 14:25:38', 1, '<p>&nbsp;</p><h5 style=\'text-align: center;\'>RESUMEN EJECUTIVO DEL PLAN ESTRATÉGICO</h5><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Nombre de la Empresa: EcoSoluciones S.A.</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Fecha de elaboración: 14/05/2026 09:25:38</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Emprendedores / Promotores: Jose Luis SAIRA NINA</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>MISIÓN:</h6><h6 style=\'padding-left: 80px;\'>Proporcionar tecnologías innovadoras y sostenibles que optimicen el uso de recursos naturales, ayudando a las empresas a ser más productivas y responsables con el medio ambiente.</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VISIÓN:</h6><h6 style=\'padding-left: 80px;\'>Ser líder regional en soluciones tecnológicas ecológicas para 2030, transformando la industria hacia un modelo de cero emisiones netas.</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VALORES:</h6><ul><li style=\'margin-left: 80px;\'>Sostenibilidad</li><li style=\'margin-left: 80px;\'>Innovación responsable</li><li style=\'margin-left: 80px;\'>Transparencia</li><li style=\'margin-left: 80px;\'>Compromiso con el cliente</li><li style=\'margin-left: 80px;\'>Mejora continua</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>UNIDADES ESTRATÉGICAS:</h6><ul><li style=\'margin-left: 80px;\'>AgroTec Sostenible</li><li style=\'margin-left: 80px;\'>LogiVerde</li><li style=\'margin-left: 80px;\'>EnerGea</li><li style=\'margin-left: 80px;\'>DataGreen Analytics</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>OBJETIVOS ESTRATÉGICOS:</h6><table style=\'margin-left: 40px; width: calc(100% - 40px); border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>MISIÓN</th><th style=\'text-align: center;\'>OBJETIVOS GENERALES O ESTRATÉGICOS</th><th style=\'text-align: center;\'>OBJETIVOS ESPECÍFICOS</th></tr></thead><tbody><tr><th rowspan=\'13\'>Proporcionar tecnologías innovadoras y sostenibles que optimicen el uso de recursos naturales, ayudando a las empresas a ser más productivas y responsables con el medio ambiente.</th></tr><tr><th rowspan=\'4\'>Incrementar la adopción de tecnologías sostenibles en clientes industriales en un 40% en 2 años.</th></tr><tr><td>Lanzar 2 nuevas funcionalidades de IA predictiva en la plataforma AgroTec por año</td></tr><tr><td>Capacitar a 100 ingenieros de cliente en prácticas sostenibles mediante talleres semestrales</td></tr><tr><td>Reducir el costo de entrada de las soluciones en un 15% mediante economías de escala</td></tr><tr><th rowspan=\'4\'>Reducir la huella de carbono operativa de la propia empresa en un 50% para 2026.</th></tr><tr><td>Migrar el 100% de los servidores a energía renovable en 12 meses</td></tr><tr><td>Implementar una política de teletrabajo híbrido que reduzca viajes en un 30%</td></tr><tr><td>Medir y reportar la huella de carbono corporativa trimestralmente</td></tr><tr><th rowspan=\'4\'>Expandir la participación de mercado en el sector logístico centroamericano en un 25% en 18 meses.</th></tr><tr><td>Establecer alianzas con 5 empresas de logística regional en el primer año</td></tr><tr><td>Desarrollar una versión localizada de LogiVerde para mercados de Centroamérica</td></tr><tr><td>Participar en 4 ferias internacionales de logística sostenible por año</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'> ANÁLISIS FODA:</h6><table style=\'margin-left: 40px; width: calc(100% - 40px); border-collapse: collapse;\' border=\'1\'><tbody><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>FORTALEZAS</th></tr><tr><td>Patentes propias en sensores de bajo consumo energético</td></tr><tr><td>Alto nivel de retención de clientes (85% anual)</td></tr><tr><td>Infraestructura cloud escalable y segura</td></tr><tr><td>Liderazgo en costo-beneficio versus competidores locales</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>DEBILIDADES</th></tr><tr><td>Baja presencia en marketing digital comparado con competidores</td></tr><tr><td>Procesos internos manuales en gestión de proyectos</td></tr><tr><td>Falta de certificaciones ambientales internacionales (ISO 14001)</td></tr><tr><td>Dependencia de proveedores externos para componentes electrónicos</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>OPORTUNIDADES</th></tr><tr><td>Escasez de competidores locales especializados en tecnología ecológica</td></tr><tr><td>Incentivos fiscales gubernamentales para empresas verdes</td></tr><tr><td>Alta exigencia de clientes por soluciones sostenibles, lo que favorece a empresas especializadas</td></tr><tr><td>Avances en inteligencia artificial aplicada a eficiencia energética</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>AMENAZAS</th></tr><tr><td>Volatilidad en precios de materias primas para sensores</td></tr><tr><td>Entrada de grandes tecnológicas globales al mercado sostenible</td></tr><tr><td>Ciberseguridad: riesgos de ataques a infraestructura IoT</td></tr><tr><td>Posibles cambios en regulaciones ambientales internacionales que exijan nuevas inversiones</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>IDENTIFICACIÓN DE ESTRATEGIA:</h6><ul style=\'padding-left: 80px;\'><li><strong>Relacion:</strong> FO</li><li><strong>Tipo:</strong> OFENSIVA</li><li><strong>Descripción:</strong> Deberá adoptar estrategias de crecimiento.</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>ACCIONES COMPETITIVAS:</h6><table style=\'margin-left: 40px; width: calc(100% - 40px); border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center; width: 80px;\'>N°</th><th style=\'text-align: center;\'>ACCION</th></tr></thead><tbody><tr><td style=\'text-align: center;\'>1</td><td></td></tr><tr><td style=\'text-align: center;\'>2</td><td></td></tr><tr><td style=\'text-align: center;\'>3</td><td></td></tr><tr><td style=\'text-align: center;\'>4</td><td></td></tr><tr><td style=\'text-align: center;\'>5</td><td></td></tr><tr><td style=\'text-align: center;\'>6</td><td></td></tr><tr><td style=\'text-align: center;\'>7</td><td></td></tr><tr><td style=\'text-align: center;\'>8</td><td></td></tr><tr><td style=\'text-align: center;\'>9</td><td></td></tr><tr><td style=\'text-align: center;\'>10</td><td></td></tr><tr><td style=\'text-align: center;\'>11</td><td></td></tr><tr><td style=\'text-align: center;\'>12</td><td></td></tr><tr><td style=\'text-align: center;\'>13</td><td></td></tr><tr><td style=\'text-align: center;\'>14</td><td></td></tr><tr><td style=\'text-align: center;\'>15</td><td></td></tr><tr><td style=\'text-align: center;\'>16</td><td></td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>CONCLUSIONES:</h6>', NULL),
	(11, '2026-05-16 13:50:26', 1, NULL, NULL),
	(12, '2026-05-16 13:51:06', 1, NULL, NULL),
	(13, '2026-05-16 13:51:12', 1, NULL, NULL),
	(14, '2026-05-16 13:51:16', 5, '<p>&nbsp;</p><h5 style=\'text-align: center;\'>RESUMEN EJECUTIVO DEL PLAN ESTRATÉGICO</h5><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Empresa:  EcoSoluciones S.A.</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Fecha de elaboración: 16/05/2026 08:51:16</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Emprendedores / Promotores:</h6><ul><li style=\'margin-left: 80px;\'>Jesus Humberto Escalante Alanoca</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>MISIÓN:</h6><h6 style=\'padding-left: 80px; width: calc(100% - 40px);\'>Proporcionar tecnologías innovadoras y sostenibles que optimicen el uso de recursos naturales, ayudando a las empresas a ser más productivas y responsables con el medio ambiente.</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VISIÓN:</h6><h6 style=\'padding-left: 80px; width: calc(100% - 40px);\'>Ser líder regional en soluciones tecnológicas ecológicas para 2030, transformando la industria hacia un modelo de cero emisiones netas.</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VALORES:</h6><ul><li style=\'margin-left: 80px;\'>Sostenibilidad</li><li style=\'margin-left: 80px;\'>Innovación responsable</li><li style=\'margin-left: 80px;\'>Transparencia</li><li style=\'margin-left: 80px;\'>Compromiso con el cliente</li><li style=\'margin-left: 80px;\'>Mejora continua</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>UNIDADES ESTRATÉGICAS:</h6><ul><li style=\'margin-left: 80px;\'>AgroTec Sostenible</li><li style=\'margin-left: 80px;\'>LogiVerde</li><li style=\'margin-left: 80px;\'>EnerGea</li><li style=\'margin-left: 80px;\'>DataGreen Analytics</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>OBJETIVOS ESTRATÉGICOS:</h6><table style=\'margin-left: 40px; width: calc(100% - 80px); border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>MISIÓN</th><th style=\'text-align: center;\'>OBJETIVOS GENERALES O ESTRATÉGICOS</th><th style=\'text-align: center;\'>OBJETIVOS ESPECÍFICOS</th></tr></thead><tbody><tr><th rowspan=\'13\'>Proporcionar tecnologías innovadoras y sostenibles que optimicen el uso de recursos naturales, ayudando a las empresas a ser más productivas y responsables con el medio ambiente.</th></tr><tr><th rowspan=\'4\'>Incrementar la adopción de tecnologías sostenibles en clientes industriales en un 40% en 2 años.</th></tr><tr><td>Lanzar 2 nuevas funcionalidades de IA predictiva en la plataforma AgroTec por año</td></tr><tr><td>Capacitar a 100 ingenieros de cliente en prácticas sostenibles mediante talleres semestrales</td></tr><tr><td>Reducir el costo de entrada de las soluciones en un 15% mediante economías de escala</td></tr><tr><th rowspan=\'4\'>Reducir la huella de carbono operativa de la propia empresa en un 50% para 2026.</th></tr><tr><td>Migrar el 100% de los servidores a energía renovable en 12 meses</td></tr><tr><td>Implementar una política de teletrabajo híbrido que reduzca viajes en un 30%</td></tr><tr><td>Medir y reportar la huella de carbono corporativa trimestralmente</td></tr><tr><th rowspan=\'4\'>Expandir la participación de mercado en el sector logístico centroamericano en un 25% en 18 meses.</th></tr><tr><td>Establecer alianzas con 5 empresas de logística regional en el primer año</td></tr><tr><td>Desarrollar una versión localizada de LogiVerde para mercados de Centroamérica</td></tr><tr><td>Participar en 4 ferias internacionales de logística sostenible por año</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'> ANÁLISIS FODA:</h6><table style=\'margin-left: 40px; width: calc(100% - 80px); border-collapse: collapse;\' border=\'1\'><tbody><tr><th rowspan=\'1\' width=\'150px\' style=\'text-align: center;\'>FORTALEZAS</th></tr><tr><th rowspan=\'1\' width=\'150px\' style=\'text-align: center;\'>DEBILIDADES</th></tr><tr><th rowspan=\'1\' width=\'150px\' style=\'text-align: center;\'>OPORTUNIDADES</th></tr><tr><th rowspan=\'1\' width=\'150px\' style=\'text-align: center;\'>AMENAZAS</th></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>IDENTIFICACIÓN DE ESTRATEGIA:</h6><ul style=\'padding-left: 80px;\'><li><strong>Relacion:</strong> Estrategia NO Identificada</li><li><strong>Tipo:</strong> Estrategia NO Identificada</li><li><strong>Descripción:</strong> Estrategia NO Identificada</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>ACCIONES COMPETITIVAS:</h6><table style=\'margin-left: 40px; width: calc(100% - 80px); border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center; width: 80px;\'>N°</th><th style=\'text-align: center;\'>ACCION</th></tr></thead><tbody><tr><th colspan=\'2\'>CORREGIR DEBILIDADES</th></tr><tr><th colspan=\'2\'>AFRONTAR AMENAZAS</th></tr><tr><th colspan=\'2\'>MANTENER FORTALEZAS</th></tr><tr><th colspan=\'2\'>EXPLORAR OPORTUNIDADES</th></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>CONCLUSIONES:</h6>', NULL),
	(15, '2026-05-16 13:58:31', 5, '<p>&nbsp;</p><h5 style=\'text-align: center;\'>RESUMEN EJECUTIVO DEL PLAN ESTRATÉGICO</h5><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Empresa:  EcoSoluciones S.A.</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Fecha de elaboración: 16/05/2026 08:58:31</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Emprendedores / Promotores:</h6><ul><li style=\'margin-left: 80px;\'>Jesus Humberto Escalante Alanoca</li><li style=\'margin-left: 80px;\'>Usuario 2 Apellido Usuario2</li><li style=\'margin-left: 80px;\'>Jose Luis SAIRA NINA</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>MISIÓN:</h6><h6 style=\'padding-left: 80px; width: calc(100% - 40px);\'>Proporcionar tecnologías innovadoras y sostenibles que optimicen el uso de recursos naturales, ayudando a las empresas a ser más productivas y responsables con el medio ambiente.</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VISIÓN:</h6><h6 style=\'padding-left: 80px; width: calc(100% - 40px);\'>Ser líder regional en soluciones tecnológicas ecológicas para 2030, transformando la industria hacia un modelo de cero emisiones netas.</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VALORES:</h6><ul><li style=\'margin-left: 80px;\'>Sostenibilidad</li><li style=\'margin-left: 80px;\'>Innovación responsable</li><li style=\'margin-left: 80px;\'>Transparencia</li><li style=\'margin-left: 80px;\'>Compromiso con el cliente</li><li style=\'margin-left: 80px;\'>Mejora continua</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>UNIDADES ESTRATÉGICAS:</h6><ul><li style=\'margin-left: 80px;\'>AgroTec Sostenible</li><li style=\'margin-left: 80px;\'>LogiVerde</li><li style=\'margin-left: 80px;\'>EnerGea</li><li style=\'margin-left: 80px;\'>DataGreen Analytics</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>OBJETIVOS ESTRATÉGICOS:</h6><table style=\'margin-left: 40px; width: calc(100% - 80px); border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>MISIÓN</th><th style=\'text-align: center;\'>OBJETIVOS GENERALES O ESTRATÉGICOS</th><th style=\'text-align: center;\'>OBJETIVOS ESPECÍFICOS</th></tr></thead><tbody><tr><th rowspan=\'13\'>Proporcionar tecnologías innovadoras y sostenibles que optimicen el uso de recursos naturales, ayudando a las empresas a ser más productivas y responsables con el medio ambiente.</th></tr><tr><th rowspan=\'4\'>Incrementar la adopción de tecnologías sostenibles en clientes industriales en un 40% en 2 años.</th></tr><tr><td>Lanzar 2 nuevas funcionalidades de IA predictiva en la plataforma AgroTec por año</td></tr><tr><td>Capacitar a 100 ingenieros de cliente en prácticas sostenibles mediante talleres semestrales</td></tr><tr><td>Reducir el costo de entrada de las soluciones en un 15% mediante economías de escala</td></tr><tr><th rowspan=\'4\'>Reducir la huella de carbono operativa de la propia empresa en un 50% para 2026.</th></tr><tr><td>Migrar el 100% de los servidores a energía renovable en 12 meses</td></tr><tr><td>Implementar una política de teletrabajo híbrido que reduzca viajes en un 30%</td></tr><tr><td>Medir y reportar la huella de carbono corporativa trimestralmente</td></tr><tr><th rowspan=\'4\'>Expandir la participación de mercado en el sector logístico centroamericano en un 25% en 18 meses.</th></tr><tr><td>Establecer alianzas con 5 empresas de logística regional en el primer año</td></tr><tr><td>Desarrollar una versión localizada de LogiVerde para mercados de Centroamérica</td></tr><tr><td>Participar en 4 ferias internacionales de logística sostenible por año</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'> ANÁLISIS FODA:</h6><table style=\'margin-left: 40px; width: calc(100% - 80px); border-collapse: collapse;\' border=\'1\'><tbody><tr><th rowspan=\'6\' width=\'150px\' style=\'text-align: center;\'>FORTALEZAS</th></tr><tr><td>Patentes propias en sensores de bajo consumo energético</td></tr><tr><td>Alto nivel de retención de clientes (85% anual)</td></tr><tr><td>Infraestructura cloud escalable y segura</td></tr><tr><td>Liderazgo en costo-beneficio versus competidores locales</td></tr><tr><td>F0111</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>DEBILIDADES</th></tr><tr><td>Baja presencia en marketing digital comparado con competidores</td></tr><tr><td>Procesos internos manuales en gestión de proyectos</td></tr><tr><td>Falta de certificaciones ambientales internacionales (ISO 14001)</td></tr><tr><td>Dependencia de proveedores externos para componentes electrónicos</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>OPORTUNIDADES</th></tr><tr><td>Escasez de competidores locales especializados en tecnología ecológica</td></tr><tr><td>Incentivos fiscales gubernamentales para empresas verdes</td></tr><tr><td>Alta exigencia de clientes por soluciones sostenibles, lo que favorece a empresas especializadas</td></tr><tr><td>Avances en inteligencia artificial aplicada a eficiencia energética</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>AMENAZAS</th></tr><tr><td>Volatilidad en precios de materias primas para sensores</td></tr><tr><td>Entrada de grandes tecnológicas globales al mercado sostenible</td></tr><tr><td>Ciberseguridad: riesgos de ataques a infraestructura IoT</td></tr><tr><td>Posibles cambios en regulaciones ambientales internacionales que exijan nuevas inversiones</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>IDENTIFICACIÓN DE ESTRATEGIA:</h6><ul style=\'padding-left: 80px;\'><li><strong>Relacion:</strong> FA</li><li><strong>Tipo:</strong> DEFENSIVA</li><li><strong>Descripción:</strong> La empresa está preparada para enfrentarse a las amenazas.</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>ACCIONES COMPETITIVAS:</h6><table style=\'margin-left: 40px; width: calc(100% - 80px); border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center; width: 80px;\'>N°</th><th style=\'text-align: center;\'>ACCION</th></tr></thead><tbody><tr><th colspan=\'2\'>CORREGIR DEBILIDADES</th></tr><tr><td style=\'text-align: center;\'>1</td><td>Contratar especialista en marketing digital B2B.\r\nLanzar campañas en LinkedIn y Google Ads.\r\nCrear contenido técnico (webinars, casos de éxito, whitepapers).\r\nOptimizar SEO.</td></tr><tr><td style=\'text-align: center;\'>2</td><td>Implementar software de gestión de proyectos.\r\nAutomatizar flujos de aprobación y reportes.\r\nCapacitar al personal en metodologías ágiles.</td></tr><tr><td style=\'text-align: center;\'>3</td><td>Contratar consultoría especializada.\r\nAsignar responsable interno de calidad ambiental.\r\nPresupuestar la certificación en 18 meses.\r\nAprovechar incentivos fiscales para financiarla.</td></tr><tr><td style=\'text-align: center;\'>4</td><td>Desarrollar alianzas con 2 proveedores alternativos locales.\r\nCrear un stock de seguridad para componentes críticos.\r\nDiseñar sensores modulares que permitan sustituir partes fácilmente.</td></tr><tr><th colspan=\'2\'>AFRONTAR AMENAZAS</th></tr><tr><td style=\'text-align: center;\'>5</td><td>Negociar contratos fijos con proveedores por volumen.\r\nInvestigar materiales alternativos más estables.\r\nIncorporar cláusulas de ajuste en contratos con clientes.</td></tr><tr><td style=\'text-align: center;\'>6</td><td>Diferenciarse por conocimiento local y atención personalizada.\r\nOfrecer precios competitivos.\r\nFidelizar clientes con contratos de largo plazo.\r\nCrear barreras de cambio (integración a medida).</td></tr><tr><td style=\'text-align: center;\'>7</td><td>Implementar auditorías de seguridad trimestrales.\r\nContratar seguro de ciberseguridad.\r\nCapacitar al personal en buenas prácticas.\r\nCertificarse en ISO 27001.</td></tr><tr><td style=\'text-align: center;\'>8</td><td>Crear comité de vigilancia normativa.\r\nSuscribirse a boletines oficiales.\r\nDesarrollar soluciones flexibles que se adapten a distintos estándares.\r\nObtener ISO 14001 como preparación.</td></tr><tr><th colspan=\'2\'>MANTENER FORTALEZAS</th></tr><tr><td style=\'text-align: center;\'>9</td><td>Renovar y ampliar patentes.\r\nInvertir anualmente en I+D (5% de ingresos).\r\nRegistrar nuevas funcionalidades.\r\nMonitorear posibles infracciones de competidores.</td></tr><tr><td style=\'text-align: center;\'>10</td><td>Implementar programa de fidelización con descuentos por antigüedad.\r\nRealizar encuestas NPS trimestrales.\r\nAsignar account managers dedicados a clientes clave.</td></tr><tr><td style=\'text-align: center;\'>11</td><td>Actualizar hardware y software periódicamente.\r\nMantener planes de respaldo y recuperación ante desastres.\r\nRealizar pruebas de estrés semestrales.</td></tr><tr><td style=\'text-align: center;\'>12</td><td>Optimizar procesos productivos para mantener márgenes.\r\nRevisar precios anualmente.\r\nMonitorear constantemente la competencia local.</td></tr><tr><td style=\'text-align: center;\'>13</td><td>AF0111</td></tr><tr><th colspan=\'2\'>EXPLORAR OPORTUNIDADES</th></tr><tr><td style=\'text-align: center;\'>14</td><td>Crear un sello propio "EcoSoluciones Verified".\r\nOfrecer consultoría en reportes ESG.\r\nDesarrollar dashboard de impacto ambiental para clientes.</td></tr><tr><td style=\'text-align: center;\'>15</td><td>Contratar asesor fiscal para maximizar beneficios.\r\nIncluir en propuestas comerciales el ahorro fiscal para el cliente.\r\nDestinar los ahorros a I+D.</td></tr><tr><td style=\'text-align: center;\'>16</td><td>Acelerar expansión geográfica.\r\nAbrir oficinas en 2 nuevas ciudades.\r\nLanzar campaña agresiva de branding como "líder local en tecnología ecológica".\r\nParticipar en cámaras de comercio.</td></tr><tr><td style=\'text-align: center;\'>17</td><td>Formar equipo de IA interno.\r\nDesarrollar prototipo de optimización energética predictiva en 6 meses.\r\nLanzar alianza con universidad local para investigación conjunta.</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>CONCLUSIONES:</h6>', 'sdfsdf'),
	(16, '2026-05-16 23:40:36', 5, '<p>&nbsp;</p><h5 style=\'text-align: center;\'>RESUMEN EJECUTIVO DEL PLAN ESTRATÉGICO</h5><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Empresa:  EcoSoluciones S.A.</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Fecha de elaboración: 16/05/2026 06:40:36</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>Emprendedores / Promotores:</h6><ul><li style=\'margin-left: 80px;\'>Jesus Humberto Escalante Alanoca</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>MISIÓN:</h6><h6 style=\'padding-left: 80px; width: calc(100% - 40px);\'>Proporcionar tecnologías innovadoras y sostenibles que optimicen el uso de recursos naturales, ayudando a las empresas a ser más productivas y responsables con el medio ambiente.</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VISIÓN:</h6><h6 style=\'padding-left: 80px; width: calc(100% - 40px);\'>Ser líder regional en soluciones tecnológicas ecológicas para 2030, transformando la industria hacia un modelo de cero emisiones netas.</h6><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>VALORES:</h6><ul><li style=\'margin-left: 80px;\'>Sostenibilidad</li><li style=\'margin-left: 80px;\'>Innovación responsable</li><li style=\'margin-left: 80px;\'>Transparencia</li><li style=\'margin-left: 80px;\'>Compromiso con el cliente</li><li style=\'margin-left: 80px;\'>Mejora continua</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>UNIDADES ESTRATÉGICAS:</h6><ul><li style=\'margin-left: 80px;\'>AgroTec Sostenible</li><li style=\'margin-left: 80px;\'>LogiVerde</li><li style=\'margin-left: 80px;\'>EnerGea</li><li style=\'margin-left: 80px;\'>DataGreen Analytics</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>OBJETIVOS ESTRATÉGICOS:</h6><table style=\'margin-left: 40px; width: calc(100% - 80px); border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center;\'>MISIÓN</th><th style=\'text-align: center;\'>OBJETIVOS GENERALES O ESTRATÉGICOS</th><th style=\'text-align: center;\'>OBJETIVOS ESPECÍFICOS</th></tr></thead><tbody><tr><th rowspan=\'13\'>Proporcionar tecnologías innovadoras y sostenibles que optimicen el uso de recursos naturales, ayudando a las empresas a ser más productivas y responsables con el medio ambiente.</th></tr><tr><th rowspan=\'4\'>Incrementar la adopción de tecnologías sostenibles en clientes industriales en un 40% en 2 años.</th></tr><tr><td>Lanzar 2 nuevas funcionalidades de IA predictiva en la plataforma AgroTec por año</td></tr><tr><td>Capacitar a 100 ingenieros de cliente en prácticas sostenibles mediante talleres semestrales</td></tr><tr><td>Reducir el costo de entrada de las soluciones en un 15% mediante economías de escala</td></tr><tr><th rowspan=\'4\'>Reducir la huella de carbono operativa de la propia empresa en un 50% para 2026.</th></tr><tr><td>Migrar el 100% de los servidores a energía renovable en 12 meses</td></tr><tr><td>Implementar una política de teletrabajo híbrido que reduzca viajes en un 30%</td></tr><tr><td>Medir y reportar la huella de carbono corporativa trimestralmente</td></tr><tr><th rowspan=\'4\'>Expandir la participación de mercado en el sector logístico centroamericano en un 25% en 18 meses.</th></tr><tr><td>Establecer alianzas con 5 empresas de logística regional en el primer año</td></tr><tr><td>Desarrollar una versión localizada de LogiVerde para mercados de Centroamérica</td></tr><tr><td>Participar en 4 ferias internacionales de logística sostenible por año</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'> ANÁLISIS FODA:</h6><table style=\'margin-left: 40px; width: calc(100% - 80px); border-collapse: collapse;\' border=\'1\'><tbody><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>FORTALEZAS</th></tr><tr><td>Patentes propias en sensores de bajo consumo energético</td></tr><tr><td>Alto nivel de retención de clientes (85% anual)</td></tr><tr><td>Infraestructura cloud escalable y segura</td></tr><tr><td>Liderazgo en costo-beneficio versus competidores locales</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>DEBILIDADES</th></tr><tr><td>Baja presencia en marketing digital comparado con competidores</td></tr><tr><td>Procesos internos manuales en gestión de proyectos</td></tr><tr><td>Falta de certificaciones ambientales internacionales (ISO 14001)</td></tr><tr><td>Dependencia de proveedores externos para componentes electrónicos</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>OPORTUNIDADES</th></tr><tr><td>Escasez de competidores locales especializados en tecnología ecológica</td></tr><tr><td>Incentivos fiscales gubernamentales para empresas verdes</td></tr><tr><td>Alta exigencia de clientes por soluciones sostenibles, lo que favorece a empresas especializadas</td></tr><tr><td>Avances en inteligencia artificial aplicada a eficiencia energética</td></tr><tr><th rowspan=\'5\' width=\'150px\' style=\'text-align: center;\'>AMENAZAS</th></tr><tr><td>Volatilidad en precios de materias primas para sensores</td></tr><tr><td>Entrada de grandes tecnológicas globales al mercado sostenible</td></tr><tr><td>Ciberseguridad: riesgos de ataques a infraestructura IoT</td></tr><tr><td>Posibles cambios en regulaciones ambientales internacionales que exijan nuevas inversiones</td></tr></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>IDENTIFICACIÓN DE ESTRATEGIA:</h6><ul style=\'padding-left: 80px;\'><li><strong>Relacion:</strong> Estrategia NO Identificada</li><li><strong>Tipo:</strong> Estrategia NO Identificada</li><li><strong>Descripción:</strong> Estrategia NO Identificada</li></ul><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>ACCIONES COMPETITIVAS:</h6><table style=\'margin-left: 40px; width: calc(100% - 80px); border-collapse: collapse;\' border=\'1\'><thead><tr><th style=\'text-align: center; width: 80px;\'>N°</th><th style=\'text-align: center;\'>ACCION</th></tr></thead><tbody></tbody></table><p>&nbsp;</p><h6 style=\'padding-left: 40px;\'>CONCLUSIONES:</h6>', NULL),
	(17, '2026-05-17 01:04:26', 6, NULL, NULL),
	(18, '2026-05-24 02:04:36', 7, NULL, NULL);

-- Volcando estructura para tabla homestead.preguntas_cv
CREATE TABLE IF NOT EXISTS `preguntas_cv` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(10) DEFAULT NULL,
  `Pregunta` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.preguntas_cv: ~25 rows (aproximadamente)
DELETE FROM `preguntas_cv`;
INSERT INTO `preguntas_cv` (`Id`, `Codigo`, `Pregunta`) VALUES
	(1, 'P1', 'La empresa tiene una política sistematizada de cero defectos en la producción de productos/servicios.'),
	(2, 'P2', 'La empresa emplea los medios productivos tecnológicamente más avanzados de su sector.'),
	(3, 'P3', 'La empresa dispone de un sistema de información y control de gestión eficiente y eficaz.'),
	(4, 'P4', 'Los medios técnicos y tecnológicos de la empresa están preparados para competir en un futuro a corto, medio y largo plazo.'),
	(5, 'P5', 'La empresa es un referente en su sector en I+D+i.'),
	(6, 'P6', 'La excelencia de los procedimientos de la empresa (en ISO, etc.) son una principal fuente de ventaja competitiva.'),
	(7, 'P7', 'La empresa dispone de página web, y esta se emplea no sólo como escaparate virtual de productos/servicios, sino también para establecer relaciones con clientes y proveedores.'),
	(8, 'P8', 'Los productos/servicios que desarrolla nuestra empresa llevan incorporada una tecnología difícil de imitar.'),
	(9, 'P9', 'La empresa es referente en su sector en la optimización, en términos de coste, de su cadena de producción, siendo ésta una de sus principales ventajas competitivas.'),
	(10, 'P10', 'La informatización de la empresa es una fuente de ventaja competitiva clara respecto a sus competidores.'),
	(11, 'P11', 'Los canales de distribución de la empresa son una importante fuente de ventajas competitivas.'),
	(12, 'P12', 'Los productos/servicios de la empresa son altamente, y diferencialmente, valorados por el cliente respecto a nuestros competidores.'),
	(13, 'P13', 'La empresa dispone y ejecuta un sistemático plan de marketing y ventas.'),
	(14, 'P14', 'La empresa tiene optimizada su gestión financiera.'),
	(15, 'P15', 'La empresa busca continuamente el mejorar la relación con sus clientes cortando los plazos de ejecución, personalizando la oferta o mejorando las condiciones de entrega. Pero siempre partiendo de un plan previo.'),
	(16, 'P16', 'La empresa es referente en su sector en el lanzamiento de innovadores productos y servicio de éxito demostrado en el mercado.'),
	(17, 'P17', 'Los Recursos Humanos son especialmente responsables del éxito de la empresa, considerándolos incluso como el principal activo estratégico.'),
	(18, 'P18', 'Se tiene una plantilla altamente motivada, que conoce con claridad las metas, objetivos y estrategias de la organización.'),
	(19, 'P19', 'La empresa siempre trabaja conforme a una estrategia y objetivos claros.'),
	(20, 'P20', 'La gestión del circulante está optimizada.'),
	(21, 'P21', 'Se tiene definido claramente el posicionamiento estratégico de todos los productos de la empresa.'),
	(22, 'P22', 'Se dispone de una política de marca basada en la reputación que la empresa genera, en la gestión de relación con el cliente y en el posicionamiento estratégico previamente definido.'),
	(23, 'P23', 'La cartera de clientes de nuestra empresa está altamente fidelizada, ya que tenemos como principal propósito el deleitarlos día a día.'),
	(24, 'P24', 'Nuestra política y equipo de ventas y marketing es una importante ventaja competitiva de nuestra empresa respecto al sector.'),
	(25, 'P25', 'El servicio al cliente que prestamos es uno de nuestras principales ventajas competitivas respecto a nuestros competidores.');

-- Volcando estructura para tabla homestead.preguntas_fp
CREATE TABLE IF NOT EXISTS `preguntas_fp` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(50) NOT NULL,
  `Perfil` varchar(255) NOT NULL,
  `Hostil` varchar(50) NOT NULL,
  `Favorable` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.preguntas_fp: ~16 rows (aproximadamente)
DELETE FROM `preguntas_fp`;
INSERT INTO `preguntas_fp` (`Id`, `Codigo`, `Perfil`, `Hostil`, `Favorable`) VALUES
	(1, 'F1S1', 'Crecimiento', 'Lento', 'Rápido'),
	(2, 'F1S2', 'Naturaleza de los competidores', 'Muchos', 'Pocos'),
	(3, 'F1S3', 'Exceso de capacidad productiva', 'Si', 'No'),
	(4, 'F1S4', 'Rentabilidad media del sector', 'Baja', 'Alta'),
	(5, 'F1S5', 'Diferenciación del producto', 'Escasa', 'Elevada'),
	(6, 'F1S6', 'Barreras de salida', 'Bajas', 'Altas'),
	(7, 'F2S1', 'Economías de escala', 'No', 'Si'),
	(8, 'F2S2', 'Necesidad de capital', 'Bajas', 'Altas'),
	(9, 'F2S3', 'Acceso a la tecnología', 'Fácil', 'Difícil'),
	(10, 'F2S4', 'Reglamentos o leyes limitativos', 'No', 'Si'),
	(11, 'F2S5', 'Trámites burocráticos', 'No', 'Si'),
	(12, 'F2S6', 'Reacción esperada actuales competidores', 'Escasa', 'Enérgica'),
	(13, 'F3S1', 'Número de clientes', 'Pocos', 'Muchos'),
	(14, 'F3S2', 'Posibilidad de integración ascendente', 'Pequeña', 'Grande'),
	(15, 'F3S3', 'Rentabilidad de los clientes', 'Baja', 'Alta'),
	(16, 'F3S4', 'Coste de cambio de proveedor para cliente', 'Bajo', 'Alto'),
	(17, 'F4S1', 'Disponibilidad de Productos Sustitutivos', 'Grande', 'Pequeña');

-- Volcando estructura para tabla homestead.preguntas_pest
CREATE TABLE IF NOT EXISTS `preguntas_pest` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(50) NOT NULL,
  `Pregunta` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.preguntas_pest: ~25 rows (aproximadamente)
DELETE FROM `preguntas_pest`;
INSERT INTO `preguntas_pest` (`Id`, `Codigo`, `Pregunta`) VALUES
	(1, 'P1', 'Los cambios en la composición étnica de los consumidores de nuestro mercado está teniendo un notable impacto.'),
	(2, 'P2', 'El envejecimiento de la población tiene un importante impacto en la demanda.'),
	(3, 'P3', 'Los nuevos estilos de vida y tendencias originan cambios en la oferta de nuestro sector.'),
	(4, 'P4', 'El envejecimiento de la población tiene un importante impacto en la oferta del sector donde operamos.'),
	(5, 'P5', 'Las variaciones en el nivel de riqueza de la población impactan considerablemente en la demanda de los productos/servicios del sector donde operamos.'),
	(6, 'P6', 'La legislación fiscal afecta muy considerablemente a la economía de las empresas del sector donde operamos.'),
	(7, 'P7', 'La legislación laboral afecta muy considerablemente a la operativa del sector donde actuamos.'),
	(8, 'P8', 'Las subvenciones otorgadas por las Administraciones Públicas son claves en el desarrollo competitivo del mercado donde operamos.'),
	(9, 'P9', 'El impacto que tiene la legislación de protección al consumidor, en la manera de producir bienes y/o servicios es muy importante.'),
	(10, 'P10', 'La normativa autonómica tiene un impacto considerable en el funcionamiento del sector donde actuamos.'),
	(11, 'P11', 'Las expectativas de crecimiento económico generales afectan crucialmente al mercado donde operamos.'),
	(12, 'P12', 'La política de tipos de interés es fundamental en el desarrollo financiero del sector donde trabaja nuestra empresa.'),
	(13, 'P13', 'La globalización permite a nuestra industria gozar de importantes oportunidades en nuevos mercados.'),
	(14, 'P14', 'La situación del empleo es fundamental para el desarrollo económico de nuestra empresa y nuestro sector.'),
	(15, 'P15', 'Las expectativas del ciclo económico de nuestro sector impactan en la situación económica de sus empresas.'),
	(16, 'P16', 'Las Administraciones Públicas están incentivando el esfuerzo tecnológico de las empresas de nuestro sector.'),
	(17, 'P17', 'Internet, el comercio electrónico, el wireless y otras NTIC están impactando en la demanda de nuestros productos/servicios y en los de la competencia.'),
	(18, 'P18', 'El empleo de NTIC´s es generalizado en el sector donde trabajamos.'),
	(19, 'P19', 'En nuestro sector, es de gran importancia ser pionero o referente en el empleo de aplicaciones tecnológicas.'),
	(20, 'P20', 'En el sector donde operamos, para ser competitivos, es condición "sine qua non" innovar constantemente.'),
	(21, 'P21', 'La legislación medioambiental afecta al desarrollo de nuestro sector.'),
	(22, 'P22', 'Los clientes de nuestro mercado exigen que se seamos socialmente responsables, en el plano medioambiental.'),
	(23, 'P23', 'En nuestro sector, la políticas medioambientales son una fuente de ventajas competitivas.'),
	(24, 'P24', 'La creciente preocupación social por el medio ambiente impacta notablemente en la demanda de productos/servicios ofertados en nuestro mercado.'),
	(25, 'P25', 'El factor ecológico es una fuente de diferenciación clara en el sector donde opera nuestra empresa.');

-- Volcando estructura para tabla homestead.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioId` int(11) NOT NULL,
  `PlanId` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Ventas` int(11) NOT NULL DEFAULT '0',
  `Porcentaje` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.productos: ~7 rows (aproximadamente)
DELETE FROM `productos`;
INSERT INTO `productos` (`Id`, `UsuarioId`, `PlanId`, `Nombre`, `Ventas`, `Porcentaje`) VALUES
	(1, 5, 15, 'Hosting', 5, 6.67),
	(2, 5, 15, 'Producto 02', 10, 13.33),
	(3, 5, 15, 'Producto 03', 15, 20.00),
	(4, 5, 15, 'Producto 04', 20, 26.67),
	(5, 5, 15, 'Producto 05', 25, 33.33),
	(6, 5, 16, 'Producto 1 - PE16', 33, 35.87),
	(7, 5, 16, 'Producto 2 - PE16', 59, 64.13);

-- Volcando estructura para tabla homestead.tcm
CREATE TABLE IF NOT EXISTS `tcm` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioId` int(11) NOT NULL,
  `PlanId` int(11) NOT NULL,
  `Periodo` int(11) NOT NULL DEFAULT '0',
  `ProductoId` int(11) NOT NULL DEFAULT '0',
  `Valor` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla homestead.tcm: ~67 rows (aproximadamente)
DELETE FROM `tcm`;
INSERT INTO `tcm` (`Id`, `UsuarioId`, `PlanId`, `Periodo`, `ProductoId`, `Valor`) VALUES
	(1, 5, 15, 2016, 1, 1.00),
	(2, 5, 15, 2016, 2, 9.00),
	(3, 5, 15, 2016, 3, 10.00),
	(4, 5, 15, 2016, 4, 5.00),
	(5, 5, 15, 2016, 5, 1.00),
	(6, 5, 15, 2017, 1, 2.00),
	(7, 5, 15, 2017, 2, 8.00),
	(8, 5, 15, 2017, 3, 4.00),
	(9, 5, 15, 2017, 4, 6.00),
	(10, 5, 15, 2017, 5, 4.00),
	(11, 5, 15, 2018, 1, 3.00),
	(12, 5, 15, 2018, 2, 7.00),
	(13, 5, 15, 2018, 3, 7.00),
	(14, 5, 15, 2018, 4, 7.00),
	(15, 5, 15, 2018, 5, 5.00),
	(16, 5, 15, 2019, 1, 4.00),
	(17, 5, 15, 2019, 2, 6.00),
	(18, 5, 15, 2019, 3, 8.00),
	(19, 5, 15, 2019, 4, 8.00),
	(20, 5, 15, 2019, 5, 2.00),
	(21, 5, 15, 2020, 1, 5.00),
	(22, 5, 15, 2020, 2, 5.00),
	(23, 5, 15, 2020, 3, 15.00),
	(24, 5, 15, 2020, 4, 10.00),
	(25, 5, 15, 2020, 5, 9.00),
	(26, 5, 15, 2026, 1, 0.00),
	(27, 5, 15, 2026, 2, 0.00),
	(28, 5, 15, 2026, 3, 0.00),
	(29, 5, 15, 2026, 4, 0.00),
	(30, 5, 15, 2026, 5, 0.00),
	(31, 5, 15, 2016, 6, 0.00),
	(32, 5, 15, 2017, 6, 0.00),
	(33, 5, 15, 2018, 6, 0.00),
	(34, 5, 15, 2019, 6, 0.00),
	(35, 5, 15, 2020, 6, 0.00),
	(36, 5, 15, 2026, 6, 0.00),
	(37, 5, 15, 2016, 7, 0.00),
	(38, 5, 15, 2017, 7, 0.00),
	(39, 5, 15, 2018, 7, 0.00),
	(40, 5, 15, 2019, 7, 0.00),
	(41, 5, 15, 2020, 7, 0.00),
	(42, 5, 15, 2026, 7, 0.00),
	(43, 5, 15, 2021, 1, 3.00),
	(44, 5, 15, 2021, 2, 0.00),
	(45, 5, 15, 2021, 3, 0.00),
	(46, 5, 15, 2021, 4, 0.00),
	(47, 5, 15, 2021, 5, 0.00),
	(48, 5, 15, 2022, 1, 0.00),
	(49, 5, 15, 2022, 2, 0.00),
	(50, 5, 15, 2022, 3, 0.00),
	(51, 5, 15, 2022, 4, 0.00),
	(52, 5, 15, 2022, 5, 0.00),
	(53, 5, 15, 2023, 1, 0.00),
	(54, 5, 15, 2023, 2, 0.00),
	(55, 5, 15, 2023, 3, 0.00),
	(56, 5, 15, 2023, 4, 0.00),
	(57, 5, 15, 2023, 5, 0.00),
	(58, 5, 15, 2024, 1, 0.00),
	(59, 5, 15, 2024, 2, 0.00),
	(60, 5, 15, 2024, 3, 0.00),
	(61, 5, 15, 2024, 4, 0.00),
	(62, 5, 15, 2024, 5, 0.00),
	(63, 5, 15, 2025, 1, 0.00),
	(64, 5, 15, 2025, 2, 0.00),
	(65, 5, 15, 2025, 3, 0.00),
	(66, 5, 15, 2025, 4, 0.00),
	(67, 5, 15, 2025, 5, 0.00),
	(68, 5, 16, 2015, 6, 0.00),
	(69, 5, 16, 2015, 7, 0.00),
	(70, 5, 16, 2021, 6, 0.00),
	(71, 5, 16, 2021, 7, 0.00),
	(72, 5, 16, 2019, 6, 15.00),
	(73, 5, 16, 2019, 7, 0.00),
	(74, 5, 16, 2020, 6, 0.00),
	(75, 5, 16, 2020, 7, 16.00);

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
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Avatar` int(1) NOT NULL DEFAULT '1',
  `Rol` enum('Administrador','Editor','Visualizador') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Editor',
  `Estado` int(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla homestead.usuario: ~4 rows (aproximadamente)
DELETE FROM `usuario`;
INSERT INTO `usuario` (`Id`, `Nombre`, `Apellido`, `Correo`, `password`, `Avatar`, `Rol`, `Estado`) VALUES
	(1, 'Admin', NULL, 'admin@virtual.upt.pe', '$2y$10$hn3NlEYExkoOHHqHm9lXDelSIm7U8KpnJ4xkHW2CbaWucUEQg9eqS', 1, 'Administrador', 1),
	(5, 'Jesus Humberto', 'Escalante Alanoca', 'je2015050641@virtual.upt.pe', '$2y$10$hn3NlEYExkoOHHqHm9lXDelSIm7U8KpnJ4xkHW2CbaWucUEQg9eqS', 1, 'Administrador', 1),
	(6, 'Usuario 2', 'Apellido Usuario2', 'usuario2@virtual.upt.pe', '$2y$10$gU2dILCOuLpcgfzrz0EFCOhkwYFAQXidAFG4KXB2spuLIOsxTWodO', 1, 'Visualizador', 1),
	(7, 'Jose Luis', 'SAIRA NINA', 'js2009035689@virtual.upt.pe', '$2y$10$3KqbHlPTWwkZa9C2tsoayuxDNycsFYbWF7GPofI3qedYYCPjJT9qy', 1, 'Editor', 1);

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
