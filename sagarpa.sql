/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100119
Source Host           : localhost:3306
Source Database       : sagarpa

Target Server Type    : MYSQL
Target Server Version : 100119
File Encoding         : 65001

Date: 2017-03-30 17:11:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for asignacion
-- ----------------------------
DROP TABLE IF EXISTS `asignacion`;
CREATE TABLE `asignacion` (
  `programa_id` int(11) NOT NULL,
  `candidato_id` int(11) NOT NULL,
  `fecha_inscripcion` date NOT NULL,
  `fecha_aprobacion` date DEFAULT NULL,
  `precio_unitario` int(11) DEFAULT NULL,
  `inversion_total` int(11) DEFAULT NULL,
  `num_autorizacion` int(6) DEFAULT NULL,
  `status` char(1) NOT NULL,
  `apoyo_fed_autorizado` int(11) DEFAULT NULL,
  `razon_soc_proveedor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`programa_id`,`candidato_id`),
  KEY `fk_programas_has_candidatos_candidatos1_idx` (`candidato_id`),
  KEY `fk_programas_has_candidatos_programas_idx` (`programa_id`),
  CONSTRAINT `fk_programas_has_candidatos_candidatos1` FOREIGN KEY (`candidato_id`) REFERENCES `candidato` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_programas_has_candidatos_programas` FOREIGN KEY (`programa_id`) REFERENCES `programa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of asignacion
-- ----------------------------

-- ----------------------------
-- Table structure for candidato
-- ----------------------------
DROP TABLE IF EXISTS `candidato`;
CREATE TABLE `candidato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rfc` varchar(13) DEFAULT NULL,
  `curp` varchar(18) NOT NULL,
  `tipo_persona` char(1) NOT NULL,
  `apellido1` varchar(15) NOT NULL,
  `apellido2` varchar(15) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `direccion` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of candidato
-- ----------------------------
INSERT INTO `candidato` VALUES ('1', 'asd', 'asd', 'm', 'sdada', 'sdas', 'zzzzzzzzzzzzzzz', 'dasdasd');

-- ----------------------------
-- Table structure for componente
-- ----------------------------
DROP TABLE IF EXISTS `componente`;
CREATE TABLE `componente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_componente` varchar(15) NOT NULL,
  `subconceptos` varchar(45) NOT NULL,
  `programa_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_conceptos_programas1_idx` (`programa_id`),
  CONSTRAINT `fk_conceptos_programas1` FOREIGN KEY (`programa_id`) REFERENCES `programa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of componente
-- ----------------------------
INSERT INTO `componente` VALUES ('2', 'asda', 'sdasd', '2');
INSERT INTO `componente` VALUES ('4', 'asdasasdasd', 'dasdasdasdasd', '2');
INSERT INTO `componente` VALUES ('6', 'asdasd', 'asdasd', '2');

-- ----------------------------
-- Table structure for personal
-- ----------------------------
DROP TABLE IF EXISTS `personal`;
CREATE TABLE `personal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rfc` varchar(13) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `apellido1` varchar(15) NOT NULL,
  `apellido2` varchar(15) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `puesto` varchar(15) NOT NULL,
  `direccion` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of personal
-- ----------------------------
INSERT INTO `personal` VALUES ('2', 'asd', 'asd', 'Miguel', 'Agustin', 'Pedro', 't', 'asd asd asd ');
INSERT INTO `personal` VALUES ('3', 'sdasd', 'sda', 'sdas', 'das', 'sada', 'j', 'dasdasda');

-- ----------------------------
-- Table structure for programa
-- ----------------------------
DROP TABLE IF EXISTS `programa`;
CREATE TABLE `programa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `concepto` varchar(15) NOT NULL,
  `tipo` char(1) NOT NULL,
  `tipo_persona` char(1) NOT NULL,
  `convocatoria` varchar(45) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `monto` decimal(11,2) DEFAULT NULL,
  `beneficio` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of programa
-- ----------------------------
INSERT INTO `programa` VALUES ('2', 'asdasdasd', 'a', 'f', 'zadeh19881.pdf', '343', '55.00', 'asdasdasd');

-- ----------------------------
-- Table structure for requisito
-- ----------------------------
DROP TABLE IF EXISTS `requisito`;
CREATE TABLE `requisito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `programa_id` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `tipo` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisitos_programas1_idx` (`programa_id`),
  CONSTRAINT `fk_requisitos_programas1` FOREIGN KEY (`programa_id`) REFERENCES `programa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of requisito
-- ----------------------------
INSERT INTO `requisito` VALUES ('1', '2', 'a', '2');
INSERT INTO `requisito` VALUES ('6', '2', 'aaaaa', '2');
INSERT INTO `requisito` VALUES ('8', '2', 'adxcxzczxczxc', '2');

-- ----------------------------
-- Table structure for requisito_cumplido
-- ----------------------------
DROP TABLE IF EXISTS `requisito_cumplido`;
CREATE TABLE `requisito_cumplido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) NOT NULL,
  `tipo` char(1) NOT NULL,
  `ruta` varchar(255) NOT NULL,
  `programa_id` int(11) NOT NULL,
  `candidato_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisitos_cumplidos_programas1_idx` (`programa_id`),
  KEY `fk_requisitos_cumplidos_candidatos1_idx` (`candidato_id`),
  CONSTRAINT `fk_requisitos_cumplidos_candidatos1` FOREIGN KEY (`candidato_id`) REFERENCES `candidato` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisitos_cumplidos_programas1` FOREIGN KEY (`programa_id`) REFERENCES `programa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of requisito_cumplido
-- ----------------------------

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personal_id` int(11) DEFAULT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipo` char(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwordrecovery` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios_personal1_idx` (`personal_id`),
  CONSTRAINT `fk_usuarios_personal1` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', null, 'admin', 'admin admin', '21232f297a57a5a743894a0e4a801fc3', 'a', 'admin@admin.com', null);
