/*
Navicat MySQL Data Transfer

Source Server         : Caravela
Source Server Version : 50505
Source Host           : 35.185.102.175:3306
Source Database       : futebol

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-10-11 21:10:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for jogadores
-- ----------------------------
DROP TABLE IF EXISTS `jogadores`;
CREATE TABLE `jogadores` (
  `id_jogador` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `nivel` enum('1','2','3','4','5') NOT NULL DEFAULT '1',
  `goleiro` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_jogador`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of jogadores
-- ----------------------------
INSERT INTO `jogadores` VALUES ('21', 'Thiago', '1', '1');
INSERT INTO `jogadores` VALUES ('25', 'Cadu', '2', '1');
INSERT INTO `jogadores` VALUES ('26', 'Felipe', '3', '0');
INSERT INTO `jogadores` VALUES ('27', 'Gabriel', '3', '0');
INSERT INTO `jogadores` VALUES ('28', 'João', '2', '0');
INSERT INTO `jogadores` VALUES ('29', 'Fred', '2', '0');
INSERT INTO `jogadores` VALUES ('30', 'Pedro', '3', '0');
INSERT INTO `jogadores` VALUES ('31', 'Guilherme', '2', '0');
INSERT INTO `jogadores` VALUES ('32', 'Cristiano', '2', '0');
INSERT INTO `jogadores` VALUES ('33', 'Ronaldo', '4', '0');
INSERT INTO `jogadores` VALUES ('34', 'Pedro', '3', '0');
INSERT INTO `jogadores` VALUES ('35', 'Lucas', '2', '0');
INSERT INTO `jogadores` VALUES ('38', 'Walace', '3', '0');
INSERT INTO `jogadores` VALUES ('39', 'William', '2', '0');
INSERT INTO `jogadores` VALUES ('40', 'Dimer', '4', '0');
INSERT INTO `jogadores` VALUES ('41', 'Gustavo', '2', '0');
INSERT INTO `jogadores` VALUES ('42', 'Breno', '4', '1');
INSERT INTO `jogadores` VALUES ('43', 'Brendo', '2', '1');
INSERT INTO `jogadores` VALUES ('44', 'Pará', '2', '0');
INSERT INTO `jogadores` VALUES ('45', 'Rodinei', '3', '0');
INSERT INTO `jogadores` VALUES ('46', 'Trauco ', '4', '0');
INSERT INTO `jogadores` VALUES ('47', 'Renê', '2', '0');
INSERT INTO `jogadores` VALUES ('48', 'Réver', '4', '0');
INSERT INTO `jogadores` VALUES ('49', 'Juan', '5', '0');
INSERT INTO `jogadores` VALUES ('50', 'Rafael Vaz', '3', '0');
INSERT INTO `jogadores` VALUES ('51', 'Léo Duarte', '4', '0');
INSERT INTO `jogadores` VALUES ('52', 'Rhodolfo', '3', '0');
INSERT INTO `jogadores` VALUES ('54', 'Diego ', '2', '0');
INSERT INTO `jogadores` VALUES ('55', 'Éverton Ribeiro', '2', '0');
INSERT INTO `jogadores` VALUES ('56', 'Ederson', '5', '0');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `nivel` enum('ADM','NORMAL') NOT NULL,
  `tipo` enum('FACE','NORMAL') NOT NULL DEFAULT 'NORMAL',
  `senha` varchar(100) NOT NULL,
  `dt_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'Alisson', 'Alisson', 'ADM', 'NORMAL', '202cb962ac59075b964b07152d234b70', '2018-10-09 21:03:56', 'abe6ad3294a3d295218627187cf098d8.jpg');
