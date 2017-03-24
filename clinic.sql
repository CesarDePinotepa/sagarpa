/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50620
Source Host           : 127.0.0.1:3306
Source Database       : clinic

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2017-03-19 03:57:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for paciente
-- ----------------------------
DROP TABLE IF EXISTS `paciente`;
CREATE TABLE `paciente` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `curp` varchar(255) DEFAULT NULL,
  `apaterno` varchar(255) DEFAULT NULL,
  `amaterno` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ocupacion` varchar(255) DEFAULT NULL,
  `edoCivil` varchar(255) DEFAULT NULL,
  `alergias` varchar(255) DEFAULT NULL,
  `expediente` varchar(255) DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `fechaAlta` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of paciente
-- ----------------------------
INSERT INTO `paciente` VALUES ('1', 'asd', 'asd', 'asd', 'asd', '          dasdasd                                  ', 'asd', 'asdas@asd.cd', 'sdasd', 'asd', 'dasda', 'asdas', '0000-00-00', '0000-00-00');
INSERT INTO `paciente` VALUES ('5', 'asd asd', 'as asd', 'asd asd', 'as dasd ', 'as dasd', 'as dasd', 'asdas@asd.cd', 'as dasd', 'asd as', 'sd asd ', 'asda sda', '0000-00-00', '0000-00-00');
INSERT INTO `paciente` VALUES ('6', 'asdasdasd', 'asdasd', 'sdasd', 'asdasdas', 'asdasdasd', 'asd', 'asdas@asd.cd', 'asda', 'dasda', 'sdasd', 'asda', '0000-00-00', '0000-00-00');
INSERT INTO `paciente` VALUES ('8', null, 'as asd', null, 'admin asd asd asda s', null, null, 'asdas@asd.cd', null, null, null, null, null, null);
INSERT INTO `paciente` VALUES ('9', 'asdasda', 'asd', 'sdasd', 'asda', 'asd', 'sdasda', 'asdas@asd.cd', 'sdasd', 'asdasd', 'asdasd', 'asda sdasdas', '0000-00-00', '0000-00-00');

-- ----------------------------
-- Table structure for personal
-- ----------------------------
DROP TABLE IF EXISTS `personal`;
CREATE TABLE `personal` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `apaterno` varchar(255) DEFAULT NULL,
  `amaterno` varchar(255) DEFAULT NULL,
  `direccion` text,
  `telefono` varchar(255) DEFAULT NULL,
  `edoCivil` varchar(255) DEFAULT NULL,
  `tipo` int(255) unsigned DEFAULT NULL,
  `rfc` varchar(255) DEFAULT NULL,
  `especialidad` varchar(255) DEFAULT NULL,
  `escuela` varchar(255) DEFAULT NULL,
  `experiencia` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of personal
-- ----------------------------
INSERT INTO `personal` VALUES ('1', 'asdasd', 'asd', 'asd', 'asdas', 'asd', 'dasdasda', '1', 'asd', 'asd', 'asd', '1');

-- ----------------------------
-- Table structure for sala
-- ----------------------------
DROP TABLE IF EXISTS `sala`;
CREATE TABLE `sala` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `comment` text,
  `status` int(255) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sala
-- ----------------------------
INSERT INTO `sala` VALUES ('1', 'asd asda das da', 'as dasd sda sda s', 'asd asd ', '0');
INSERT INTO `sala` VALUES ('2', 'asdasd', 'asd', 'asd', '1');

-- ----------------------------
-- Table structure for servicio
-- ----------------------------
DROP TABLE IF EXISTS `servicio`;
CREATE TABLE `servicio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `precio` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of servicio
-- ----------------------------
INSERT INTO `servicio` VALUES ('2', 'asd', 'asd', '123');
INSERT INTO `servicio` VALUES ('3', 'asdasd', 'asd', '123');
INSERT INTO `servicio` VALUES ('4', 'asdasd', 'aasd', '1');
INSERT INTO `servicio` VALUES ('5', 'asdasd', 'aasd', '1');
INSERT INTO `servicio` VALUES ('6', 'asdasd', 'asd', '23');
INSERT INTO `servicio` VALUES ('7', 'asdasd', 'asd', '235');
INSERT INTO `servicio` VALUES ('8', 'asdasd', 'asdasd', '333');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `passwordrecovery` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'admin', 'admin', 'asd@as.ci', 'fsdf', null);
INSERT INTO `usuarios` VALUES ('2', 'asdasd', null, 'asdas@asd.cd', 'asdasd asd', null);
INSERT INTO `usuarios` VALUES ('3', 'asd asd', null, 'asd@as.ci', 'asdasd', null);
INSERT INTO `usuarios` VALUES ('4', 'asdasda sasd', 'admin', 'zxczxc@sd.ss', 'admin', null);
INSERT INTO `usuarios` VALUES ('5', 'asdasd', 'admin', 'asdas@asd.cd', 'admin', null);
INSERT INTO `usuarios` VALUES ('6', 'asd', 'admin', 'asdas@asd.cd', 'admin', null);
INSERT INTO `usuarios` VALUES ('8', 'admin', 'admin', 'asdas@asd.cd', 'asdasd', null);
INSERT INTO `usuarios` VALUES ('9', 'admin', 'admin', 'asdas@asd.cd', 'aasd', null);
