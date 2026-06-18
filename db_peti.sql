-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.38-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.17.0.7270
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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla homestead.cadena_valor
CREATE TABLE IF NOT EXISTS `cadena_valor` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `PlanId` int(11) NOT NULL,
  `Pregunta` varchar(10) NOT NULL,
  `Valor` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla homestead.came
CREATE TABLE IF NOT EXISTS `came` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `PlanId` int(11) NOT NULL,
  `Tipo` varchar(50) NOT NULL DEFAULT '',
  `Accion` text,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla homestead.colaboradores
CREATE TABLE IF NOT EXISTS `colaboradores` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `PlanId` int(11) NOT NULL,
  `UsuarioId` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla homestead.detalle_estrategia
CREATE TABLE IF NOT EXISTS `detalle_estrategia` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Relacion` enum('FO','FA','DO','DA') NOT NULL,
  `Tipo` varchar(100) NOT NULL,
  `Descripcion` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla homestead.empresa
CREATE TABLE IF NOT EXISTS `empresa` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Descripcion` text,
  `Mision` text NOT NULL,
  `Vision` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla homestead.estrategia_plan
CREATE TABLE IF NOT EXISTS `estrategia_plan` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `PlanId` int(11) NOT NULL,
  `RelacionEstrategia` enum('FO','FA','DO','DA') NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla homestead.foda
CREATE TABLE IF NOT EXISTS `foda` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `PlanId` int(11) NOT NULL,
  `Tipo` enum('FO','FA','DO','DA') NOT NULL,
  `Codigo` varchar(50) NOT NULL,
  `Valor` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla homestead.fuerzas_porter
CREATE TABLE IF NOT EXISTS `fuerzas_porter` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioId` int(11) NOT NULL,
  `PlanId` int(11) NOT NULL,
  `Fuerza` varchar(50) NOT NULL,
  `Valor` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla homestead.objetivo_especifico
CREATE TABLE IF NOT EXISTS `objetivo_especifico` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioId` int(11) NOT NULL,
  `PlanId` int(11) NOT NULL,
  `ObjGeneral_Id` int(11) NOT NULL,
  `Tipo` enum('Funcional','Operativo') NOT NULL,
  `Objetivo` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla homestead.objetivo_general
CREATE TABLE IF NOT EXISTS `objetivo_general` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UnidadId` int(11) NOT NULL,
  `Objetivo` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla homestead.periodos
CREATE TABLE IF NOT EXISTS `periodos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioId` int(11) NOT NULL,
  `PlanId` int(11) NOT NULL,
  `Periodo` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla homestead.pest
CREATE TABLE IF NOT EXISTS `pest` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioId` int(11) NOT NULL,
  `PlanId` int(11) NOT NULL,
  `Codigo` varchar(50) NOT NULL,
  `Valor` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla homestead.plan_estrategico
CREATE TABLE IF NOT EXISTS `plan_estrategico` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UsuarioId` int(11) NOT NULL,
  `Contenido` text,
  `Conclucion` text,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla homestead.preguntas_cv
CREATE TABLE IF NOT EXISTS `preguntas_cv` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(10) DEFAULT NULL,
  `Pregunta` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla homestead.preguntas_fp
CREATE TABLE IF NOT EXISTS `preguntas_fp` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(50) NOT NULL,
  `Perfil` varchar(255) NOT NULL,
  `Hostil` varchar(50) NOT NULL,
  `Favorable` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla homestead.preguntas_pest
CREATE TABLE IF NOT EXISTS `preguntas_pest` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(50) NOT NULL,
  `Pregunta` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla homestead.unidad_estrategica
CREATE TABLE IF NOT EXISTS `unidad_estrategica` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Unidad` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla homestead.valores
CREATE TABLE IF NOT EXISTS `valores` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Valor` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
