/*
 Navicat Premium Data Transfer

 Source Server         : ConexionAND
 Source Server Type    : MySQL
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : db_finca

 Target Server Type    : MySQL
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 15/11/2021 10:22:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_baja
-- ----------------------------
DROP TABLE IF EXISTS `tb_baja`;
CREATE TABLE `tb_baja`  (
  `id_baja` int NOT NULL AUTO_INCREMENT,
  `fehca_baja` datetime NOT NULL,
  `descripcion_baja` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `idexpeiente_baja` int NOT NULL,
  PRIMARY KEY (`id_baja`) USING BTREE,
  INDEX `fk_bajaExpediente`(`idexpeiente_baja`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_baja
-- ----------------------------

-- ----------------------------
-- Table structure for tb_cargo
-- ----------------------------
DROP TABLE IF EXISTS `tb_cargo`;
CREATE TABLE `tb_cargo`  (
  `idcargo` int NOT NULL AUTO_INCREMENT,
  `nva_nom_cargo` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`idcargo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 202112355 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_cargo
-- ----------------------------
INSERT INTO `tb_cargo` VALUES (202109351, 'Administrador de Sistema');
INSERT INTO `tb_cargo` VALUES (202110272, 'Vaquero Ordeñador a Máquina');
INSERT INTO `tb_cargo` VALUES (202112353, 'Granjero');

-- ----------------------------
-- Table structure for tb_categoria
-- ----------------------------
DROP TABLE IF EXISTS `tb_categoria`;
CREATE TABLE `tb_categoria`  (
  `int_idcategoria` int NOT NULL AUTO_INCREMENT,
  `nva_nom_categoria` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`int_idcategoria`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_categoria
-- ----------------------------
INSERT INTO `tb_categoria` VALUES (1, 'DERIVADOS DE LECHE');
INSERT INTO `tb_categoria` VALUES (2, 'BOVINOS');
INSERT INTO `tb_categoria` VALUES (3, 'MEDICINA');

-- ----------------------------
-- Table structure for tb_clientes
-- ----------------------------
DROP TABLE IF EXISTS `tb_clientes`;
CREATE TABLE `tb_clientes`  (
  `int_idcliente` int NOT NULL AUTO_INCREMENT,
  `nva_dui_cliente` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nva_nom_cliente` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nva_ape_cliente` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `txt_direc_cliente` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `nva_telefono_cliente` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nva_estado_cliente` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`int_idcliente`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_clientes
-- ----------------------------
INSERT INTO `tb_clientes` VALUES (2, NULL, 'Cliente Frecuente', NULL, NULL, NULL, 'Activo');
INSERT INTO `tb_clientes` VALUES (4, '05592129-3', 'Fabri', 'Corvera', 'Santo', '6300-3455', 'Activo');
INSERT INTO `tb_clientes` VALUES (8, '05966849-9', 'Moisés', 'Corvera', 'Santo Domingo', '7365-7821', 'Activo');
INSERT INTO `tb_clientes` VALUES (27, '98765432-1', 'Claudia', 'Rivas', 'San Ildefonso', '2235-2257', 'Inactivo');

-- ----------------------------
-- Table structure for tb_compra
-- ----------------------------
DROP TABLE IF EXISTS `tb_compra`;
CREATE TABLE `tb_compra`  (
  `int_idcompra` int NOT NULL AUTO_INCREMENT,
  `txt_descrip_compra` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dou_total_compra` double(8, 2) NOT NULL,
  `dou_iva_aplicado` double(8, 2) NULL DEFAULT NULL,
  `dat_fecha_compra` datetime NOT NULL,
  `dat_fecha_sistema` datetime NOT NULL,
  `nva_tipo_documento` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nva_numero_documento` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `txt_sitio_compra` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `int_idproveedor` int NOT NULL,
  `int_idempleado` int NOT NULL,
  PRIMARY KEY (`int_idcompra`) USING BTREE,
  INDEX `idempleado_fk`(`int_idempleado`) USING BTREE,
  INDEX `idproveedor_fk`(`int_idproveedor`) USING BTREE,
  CONSTRAINT `idempleado_fk` FOREIGN KEY (`int_idempleado`) REFERENCES `tb_empleado` (`int_idempleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `idproveedor_fk` FOREIGN KEY (`int_idproveedor`) REFERENCES `tb_proveedor` (`int_idproveedor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 202159012 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_compra
-- ----------------------------
INSERT INTO `tb_compra` VALUES (1, 'Primera prueba de la compra', 5.00, 0.00, '2021-11-11 11:27:00', '0000-00-00 00:00:00', 'Factura', '1233446', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (2, 'Primera prueba de la compra', 5.00, 0.00, '2021-11-09 11:46:00', '0000-00-00 00:00:00', 'Factura', '1233446', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (3, 'Segunda prueba de la compra', 294.50, 0.00, '2021-11-28 13:43:00', '0000-00-00 00:00:00', 'Factura', '1233446', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (4, 'Tercerea prueba de la compra', 55.50, 0.00, '2021-11-20 23:01:00', '0000-00-00 00:00:00', 'Factura', '1233446', 'n/a', 2, 202152261);
INSERT INTO `tb_compra` VALUES (5, 'Tercerea prueba de la compra', 55.50, 0.00, '2021-11-20 23:01:00', '0000-00-00 00:00:00', 'Factura', '1233446', 'n/a', 2, 202152261);
INSERT INTO `tb_compra` VALUES (6, 'Cuarta prueba de la compra', 5.00, 0.00, '2021-11-09 23:06:00', '0000-00-00 00:00:00', 'Factura', '1233446', 'n/a', 3, 202152261);
INSERT INTO `tb_compra` VALUES (7, 'Sexta prueba de la compra', 288.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Factura', '12345678', 'n/a', 4, 202152261);
INSERT INTO `tb_compra` VALUES (8, 'Sexta prueba de la compra', 288.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Factura', '12345678', 'n/a', 4, 202152261);
INSERT INTO `tb_compra` VALUES (9, 'Septima prueba de la compra', 5.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Factura', '12345678', 'n/a', 4, 202152261);
INSERT INTO `tb_compra` VALUES (10, 'Probando Fecha', 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Factura', '365489', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (11, 'Probando fecha 2', 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Factura', '123123', 'n/a', 2, 202152261);
INSERT INTO `tb_compra` VALUES (12, 'Probando Fecha 3', 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Factura', '123123', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (13, 'Probando Fecha', 471.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Factura', '123434', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (14, 'Probando Fecha', 471.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Factura', '123434', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (15, 'Probando Fecha 6', 234.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Factura', '323454', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (16, 'Probando Fecha 7', 0.00, 0.00, '0000-00-00 00:00:00', '2021-11-12 11:05:26', 'Factura', '123345', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (17, 'Probando Fecha 8', 234.00, 0.00, '0000-00-00 00:00:00', '2021-11-12 11:07:27', 'Factura', '123345', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (18, 'Probando Fecha 8', 5.00, 0.00, '0000-00-00 00:00:00', '2021-11-12 11:11:41', 'Factura', '233456', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (19, 'Probando Fecha 10', 54.00, 0.00, '0000-00-00 00:00:00', '2021-11-12 11:13:47', 'Factura', '123434', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (20, 'Probando Fecha 11', 54.00, 0.00, '0000-00-00 00:00:00', '2021-11-12 11:17:56', 'Factura', '122345', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (21, 'Probando Fecha 12', 54.00, 0.00, '0000-00-00 00:00:00', '2021-11-12 11:19:04', 'Factura', '123235', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (22, 'Probando Fecha 13', 54.00, 0.00, '0000-00-00 00:00:00', '2021-11-12 11:20:41', 'Factura', '123455', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (23, 'Probando Fecha 14', 1.50, 0.00, '0000-00-00 00:00:00', '2021-11-12 11:23:15', 'Factura', '123234', 'n/a', 2, 202152261);
INSERT INTO `tb_compra` VALUES (24, 'Probando Fecha 15', 5.00, 0.00, '0000-00-00 00:00:00', '2021-11-12 11:25:59', 'Factura', '123213', 'n/a', 2, 202152261);
INSERT INTO `tb_compra` VALUES (25, 'Probando Fecha 16', 54.00, 0.00, '0000-00-00 00:00:00', '2021-11-12 11:28:33', 'Factura', '123124', 'n/a', 2, 202152261);
INSERT INTO `tb_compra` VALUES (26, 'Probando Fecha 16', 5.00, 0.00, '0000-00-00 00:00:00', '2021-11-12 11:34:18', 'Ticket', '121231', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (27, 'Probando Fecha 18', 1.50, 0.00, '0000-00-00 00:00:00', '2021-11-12 11:39:50', 'Factura', '679678', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (28, 'Probando Fecha 18', 234.00, 0.00, '0000-00-00 00:00:00', '2021-11-12 11:44:55', 'Factura', '123324', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (29, 'Probando Fecha 20', 5.00, 0.00, '2021-11-12 11:52:00', '2021-11-12 11:52:34', 'Factura', '234234', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (30, 'Nueva Compra Diferente', 1.00, 0.00, '2021-11-13 03:27:12', '2021-11-13 15:27:43', 'Ticket', '000001', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (31, 'Nueva Compra Diferente', 1.00, 0.00, '2021-11-13 03:27:12', '2021-11-13 15:27:48', 'Ticket', '000001', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (32, 'Nueva Compra Diferente', 3.00, 0.00, '2021-11-13 03:53:34', '2021-11-13 15:54:00', 'Factura', '000001', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (33, 'Nueva Compra Diferente 2', 3.00, 0.00, '2021-11-13 04:14:02', '2021-11-13 16:14:37', 'Factura', '000002', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (34, 'Nueva Compra Diferente 2', 3.00, 0.00, '2021-11-13 04:14:02', '2021-11-13 16:14:44', 'Factura', '000002', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (35, 'Nueva Compra Diferente 2', 6.75, 0.00, '2021-11-13 04:14:02', '2021-11-13 16:16:33', 'Factura', '000002', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (36, 'Nueva Compra Diferente 2', 6.75, 0.00, '2021-11-13 04:14:02', '2021-11-13 16:16:40', 'Factura', '000002', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (37, 'Nueva Compra Diferente 2', 3.00, 0.00, '2021-11-13 04:20:05', '2021-11-13 16:20:38', 'Factura', '000002', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (38, 'Nueva Compra Diferente 9', 1.00, 0.00, '2021-11-13 08:34:25', '2021-11-13 20:36:37', 'Ticket', '000009', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (39, 'Nueva Compra Diferente 9', 3.00, 0.00, '2021-11-13 08:34:25', '2021-11-13 20:36:43', 'Ticket', '000009', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (40, 'Nueva Compra Diferente 9', 3.00, 0.00, '2021-11-13 08:34:25', '2021-11-13 20:36:53', 'Ticket', '000009', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (41, 'Nueva Compra Diferente 12', 3.00, 0.00, '2021-11-13 08:56:15', '2021-11-13 20:56:52', 'Factura', '000012', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (42, 'Nueva Compra Diferente 12', 13.00, 0.00, '2021-11-13 11:15:38', '2021-11-13 21:21:35', 'Factura', '000012', 'n/a', 2, 202152261);
INSERT INTO `tb_compra` VALUES (43, 'Nueva Compra Diferente 12', 13.00, 0.00, '2021-11-13 11:15:38', '2021-11-13 21:22:15', 'Factura', '000012', 'n/a', 2, 202152261);
INSERT INTO `tb_compra` VALUES (44, 'Nueva Compra Diferente 12', 13.00, 0.00, '2021-11-13 11:15:38', '2021-11-13 21:22:40', 'Factura', '000012', 'n/a', 2, 202152261);
INSERT INTO `tb_compra` VALUES (45, 'Nueva Compra Diferente 12', 3.00, 0.00, '2021-11-13 09:40:00', '2021-11-13 21:47:18', 'Factura', '000012', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (46, 'Nueva Compra Diferente 12', 3.00, 0.00, '2021-11-13 09:45:26', '2021-11-13 21:50:12', 'Factura', '000012', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (47, 'Nueva Compra Diferente 12', 3.00, 0.00, '2021-11-13 09:51:03', '2021-11-13 21:52:10', 'Factura', '000012', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (48, 'Nueva Compra Diferente 12', 3.00, 0.00, '2021-11-13 09:52:31', '2021-11-13 21:53:02', 'Factura', '000012', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (49, 'Nueva Compra Diferente 12', 3.00, 0.00, '2021-11-13 09:53:15', '2021-11-13 21:53:39', 'Factura', '000012', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (50, 'Nueva Compra Diferente 12', 4.00, 0.00, '2021-11-13 10:08:11', '2021-11-13 22:10:20', 'Factura', '000012', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (51, 'Nueva Compra Diferente 12', 4.00, 0.00, '2021-11-13 10:18:09', '2021-11-13 22:18:38', 'Factura', '000012', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (52, 'Nueva Compra Diferente 12', 4.00, 0.00, '2021-11-13 10:20:11', '2021-11-13 22:20:46', 'Factura', '000012', 'n/a', 2, 202152261);
INSERT INTO `tb_compra` VALUES (53, 'Nueva Compra Diferente 9', 4.00, 0.00, '2021-11-13 10:26:37', '2021-11-13 22:27:21', 'Factura', '000012', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (54, 'Nueva Compra Diferente 9', 4.00, 0.00, '2021-11-13 10:26:37', '2021-11-13 22:41:15', 'Factura', '000012', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (55, 'Nueva Compra Diferente 12', 4.00, 0.00, '2021-11-13 10:41:23', '2021-11-13 22:41:48', 'Factura', '000012', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (56, 'Nueva Compra Diferente 12', 4.00, 0.00, '2021-11-13 10:42:36', '2021-11-13 22:43:02', 'Factura', '000012', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (57, 'Nueva Compra Diferente 9', 4.00, 0.00, '2021-11-13 10:48:18', '2021-11-13 22:48:52', 'Factura', '000012', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (58, 'Nueva Compra Diferente 29', 7.00, 0.00, '2021-11-14 01:27:05', '2021-11-14 01:28:25', 'Factura', '000029', 'n/a', 2, 202152261);
INSERT INTO `tb_compra` VALUES (59, 'Nueva Compra Diferente 30', 5.00, 0.00, '2021-11-14 01:31:42', '2021-11-14 01:32:41', 'Ticket', '000030', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (60, 'Nueva Compra Diferente 31', 6.00, 0.00, '2021-11-14 01:38:31', '2021-11-14 01:39:24', 'Factura', '000030', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (61, 'Nueva Compra Diferente 32', 5.00, 0.00, '2021-11-14 01:41:14', '2021-11-14 01:41:59', 'Factura', '000032', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (62, 'Nueva Compra Diferente 32', 5.00, 0.00, '2021-11-14 01:41:14', '2021-11-14 01:43:56', 'Factura', '000032', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (63, 'Nueva Compra Diferente 34', 5.00, 0.00, '2021-11-14 01:45:23', '2021-11-14 01:46:05', 'Factura', '000034', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (64, 'Nueva Compra Diferente 34', 5.00, 0.00, '2021-11-14 01:45:23', '2021-11-14 01:47:13', 'Factura', '000034', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (65, 'Nueva Compra Diferente 36', 5.00, 0.00, '2021-11-14 01:45:23', '2021-11-14 01:53:28', 'Factura', '000036', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (66, 'Nueva Compra Diferente 37', 5.00, 0.00, '2021-11-14 01:45:23', '2021-11-14 02:04:13', 'Factura', '000037', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (67, 'Nueva Compra Diferente 38', 0.00, 0.00, '2021-11-14 02:23:41', '2021-11-14 02:24:01', 'Factura', '000038', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (68, 'Nueva Compra Diferente 38', 0.00, 0.00, '2021-11-14 02:23:41', '2021-11-14 02:24:59', 'Factura', '000038', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (69, 'Nueva Compra Diferente 40', 0.00, 0.00, '2021-11-14 02:28:52', '2021-11-14 02:29:13', 'Factura', '000040', 'n/a', 2, 202152261);
INSERT INTO `tb_compra` VALUES (70, 'Nueva Compra Diferente 40', 0.00, 0.00, '2021-11-14 02:28:52', '2021-11-14 02:30:56', 'Factura', '000040', 'n/a', 2, 202152261);
INSERT INTO `tb_compra` VALUES (71, 'Nueva Compra Diferente 42 - ultima prueba', 2.00, 0.00, '2021-11-14 02:32:04', '2021-11-14 02:38:21', 'Factura', '000042', 'n/a', 1, 202152261);
INSERT INTO `tb_compra` VALUES (72, 'Compra Bovino 1', 325.00, 0.00, '2021-11-15 12:05:06', '2021-11-15 00:05:40', 'Certificado de Carta de Venta', '000001', 'n/a', 2, 202152261);
INSERT INTO `tb_compra` VALUES (73, 'Compra Bovino 2', 450.00, 0.00, '2021-11-15 12:07:06', '2021-11-15 00:08:12', 'Certificado de Carta de Venta', '000002', 'n/a', 2, 202152261);

-- ----------------------------
-- Table structure for tb_control_vacunas
-- ----------------------------
DROP TABLE IF EXISTS `tb_control_vacunas`;
CREATE TABLE `tb_control_vacunas`  (
  `int_id_control_vac` int NOT NULL AUTO_INCREMENT,
  `dat_fecha_aplicacion` datetime NOT NULL,
  `nva_vacuna_aplicada` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_exped_aplicado` int NOT NULL,
  PRIMARY KEY (`int_id_control_vac`) USING BTREE,
  INDEX `fk_expeaplicada`(`id_exped_aplicado`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_control_vacunas
-- ----------------------------

-- ----------------------------
-- Table structure for tb_detalle_compra
-- ----------------------------
DROP TABLE IF EXISTS `tb_detalle_compra`;
CREATE TABLE `tb_detalle_compra`  (
  `int_iddcompra` int NOT NULL AUTO_INCREMENT,
  `int_cantidad_compra` int NOT NULL,
  `dou_costo_compra` double(8, 2) NOT NULL,
  `dou_subtotal_item_compra` double(8, 2) NOT NULL,
  `int_idproducto` int NULL DEFAULT NULL,
  `int_idcompra` int NULL DEFAULT NULL,
  `int_idexpediente` int NULL DEFAULT NULL,
  PRIMARY KEY (`int_iddcompra`) USING BTREE,
  INDEX `idproducto`(`int_idproducto`) USING BTREE,
  INDEX `idcompra`(`int_idcompra`) USING BTREE,
  INDEX `idexpediente`(`int_idexpediente`) USING BTREE,
  CONSTRAINT `fk_tbexpediente` FOREIGN KEY (`int_idexpediente`) REFERENCES `tb_expediente` (`int_idexpediente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_detalle_compra_ibfk_1` FOREIGN KEY (`int_idcompra`) REFERENCES `tb_compra` (`int_idcompra`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_detalle_compra_ibfk_2` FOREIGN KEY (`int_idproducto`) REFERENCES `tb_producto` (`int_idproducto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2021074711 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_detalle_compra
-- ----------------------------
INSERT INTO `tb_detalle_compra` VALUES (1, 1, 5.00, 0.00, 8, 2, NULL);
INSERT INTO `tb_detalle_compra` VALUES (2, 1, 54.00, 0.00, 5, 2, NULL);
INSERT INTO `tb_detalle_compra` VALUES (3, 1, 234.00, 0.00, 6, 2, NULL);
INSERT INTO `tb_detalle_compra` VALUES (4, 1, 1.50, 0.00, 7, 2, NULL);
INSERT INTO `tb_detalle_compra` VALUES (5, 1, 5.00, 0.00, 8, 2, NULL);
INSERT INTO `tb_detalle_compra` VALUES (6, 1, 54.00, 0.00, 5, 2, NULL);
INSERT INTO `tb_detalle_compra` VALUES (7, 1, 1.50, 0.00, 7, 2, NULL);
INSERT INTO `tb_detalle_compra` VALUES (8, 1, 54.00, 0.00, 5, 2, NULL);
INSERT INTO `tb_detalle_compra` VALUES (9, 1, 1.50, 0.00, 7, 2, NULL);
INSERT INTO `tb_detalle_compra` VALUES (10, 1, 5.00, 0.00, 8, 2, NULL);
INSERT INTO `tb_detalle_compra` VALUES (11, 1, 54.00, 0.00, 5, 7, NULL);
INSERT INTO `tb_detalle_compra` VALUES (12, 1, 234.00, 0.00, 6, 7, NULL);
INSERT INTO `tb_detalle_compra` VALUES (13, 1, 54.00, 0.00, 5, 8, NULL);
INSERT INTO `tb_detalle_compra` VALUES (14, 1, 234.00, 0.00, 6, 8, NULL);
INSERT INTO `tb_detalle_compra` VALUES (15, 1, 5.00, 0.00, 8, 9, NULL);
INSERT INTO `tb_detalle_compra` VALUES (16, 1, 5.00, 5.00, 8, 10, NULL);
INSERT INTO `tb_detalle_compra` VALUES (17, 1, 5.00, 5.00, 8, 11, NULL);
INSERT INTO `tb_detalle_compra` VALUES (18, 1, 5.00, 5.00, 8, 12, NULL);
INSERT INTO `tb_detalle_compra` VALUES (19, 1, 1.50, 1.50, 7, 12, NULL);
INSERT INTO `tb_detalle_compra` VALUES (20, 1, 234.00, 234.00, 6, 12, NULL);
INSERT INTO `tb_detalle_compra` VALUES (21, 1, 54.00, 54.00, 5, 12, NULL);
INSERT INTO `tb_detalle_compra` VALUES (22, 2, 234.00, 468.00, 6, 13, NULL);
INSERT INTO `tb_detalle_compra` VALUES (23, 2, 1.50, 3.00, 7, 13, NULL);
INSERT INTO `tb_detalle_compra` VALUES (24, 2, 234.00, 468.00, 6, 14, NULL);
INSERT INTO `tb_detalle_compra` VALUES (25, 2, 1.50, 3.00, 7, 14, NULL);
INSERT INTO `tb_detalle_compra` VALUES (26, 1, 234.00, 234.00, 6, 15, NULL);
INSERT INTO `tb_detalle_compra` VALUES (27, 1, 234.00, 234.00, 6, 16, NULL);
INSERT INTO `tb_detalle_compra` VALUES (28, 1, 234.00, 234.00, 6, 17, NULL);
INSERT INTO `tb_detalle_compra` VALUES (29, 1, 5.00, 5.00, 8, 18, NULL);
INSERT INTO `tb_detalle_compra` VALUES (30, 1, 54.00, 54.00, 5, 19, NULL);
INSERT INTO `tb_detalle_compra` VALUES (31, 1, 54.00, 54.00, 5, 20, NULL);
INSERT INTO `tb_detalle_compra` VALUES (32, 1, 54.00, 54.00, 5, 21, NULL);
INSERT INTO `tb_detalle_compra` VALUES (33, 1, 54.00, 54.00, 5, 22, NULL);
INSERT INTO `tb_detalle_compra` VALUES (34, 1, 1.50, 1.50, 7, 23, NULL);
INSERT INTO `tb_detalle_compra` VALUES (35, 1, 5.00, 5.00, 8, 24, NULL);
INSERT INTO `tb_detalle_compra` VALUES (36, 1, 54.00, 54.00, 5, 25, NULL);
INSERT INTO `tb_detalle_compra` VALUES (37, 1, 5.00, 5.00, 8, 26, NULL);
INSERT INTO `tb_detalle_compra` VALUES (38, 1, 1.50, 1.50, 7, 27, NULL);
INSERT INTO `tb_detalle_compra` VALUES (39, 1, 234.00, 234.00, 6, 28, NULL);
INSERT INTO `tb_detalle_compra` VALUES (40, 1, 5.00, 5.00, 8, 29, NULL);
INSERT INTO `tb_detalle_compra` VALUES (41, 7, 7.00, 7.00, 7, 30, NULL);
INSERT INTO `tb_detalle_compra` VALUES (42, 7, 7.00, 7.00, 7, 31, NULL);
INSERT INTO `tb_detalle_compra` VALUES (43, 0, 0.00, 0.00, 7, 64, NULL);
INSERT INTO `tb_detalle_compra` VALUES (44, 0, 0.00, 0.00, 8, 64, NULL);
INSERT INTO `tb_detalle_compra` VALUES (45, 1, 3.00, 5.00, 7, 65, NULL);
INSERT INTO `tb_detalle_compra` VALUES (46, 1, 2.00, 0.00, 8, 65, NULL);
INSERT INTO `tb_detalle_compra` VALUES (47, 1, 3.00, 3.00, 7, 66, NULL);
INSERT INTO `tb_detalle_compra` VALUES (48, 1, 2.00, 2.00, 8, 66, NULL);
INSERT INTO `tb_detalle_compra` VALUES (49, 1, 1.00, 1.00, 7, 71, NULL);
INSERT INTO `tb_detalle_compra` VALUES (50, 1, 1.00, 1.00, 8, 71, NULL);
INSERT INTO `tb_detalle_compra` VALUES (51, 1, 450.00, 450.00, NULL, 73, 14);

-- ----------------------------
-- Table structure for tb_detalle_venta
-- ----------------------------
DROP TABLE IF EXISTS `tb_detalle_venta`;
CREATE TABLE `tb_detalle_venta`  (
  `int_iddventa` int NOT NULL AUTO_INCREMENT,
  `int_cantidad_vender` int NULL DEFAULT NULL,
  `dou_precio_venta` double NULL DEFAULT NULL,
  `int_idventa` int NULL DEFAULT NULL,
  `int_idproducto` int NULL DEFAULT NULL,
  `int_idexpediente` int NULL DEFAULT NULL,
  PRIMARY KEY (`int_iddventa`) USING BTREE,
  INDEX `idventa`(`int_idventa`) USING BTREE,
  INDEX `idproducto`(`int_idproducto`) USING BTREE,
  INDEX `idexpediente`(`int_idexpediente`) USING BTREE,
  CONSTRAINT `tb_detalle_venta_ibfk_1` FOREIGN KEY (`int_idventa`) REFERENCES `tb_venta` (`int_idventa`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_detalle_venta
-- ----------------------------

-- ----------------------------
-- Table structure for tb_empleado
-- ----------------------------
DROP TABLE IF EXISTS `tb_empleado`;
CREATE TABLE `tb_empleado`  (
  `int_idempleado` int NOT NULL AUTO_INCREMENT,
  `nva_dui_empledao` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nva_nom_empleado` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nva_ape_empleado` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `txt_direc_empleado` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `dat_fechanaci_empleado` date NULL DEFAULT NULL,
  `dou_salario_empleado` double NULL DEFAULT NULL,
  `nva_telefono_empleado` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nva_email_empleado` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `int_idcargo` int NULL DEFAULT NULL,
  `nva_estado_empleado` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nva_sexo_empleado` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`int_idempleado`) USING BTREE,
  INDEX `idcargo`(`int_idcargo`) USING BTREE,
  CONSTRAINT `fk_idcargo` FOREIGN KEY (`int_idcargo`) REFERENCES `tb_cargo` (`idcargo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 202152262 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_empleado
-- ----------------------------
INSERT INTO `tb_empleado` VALUES (202152261, '98654578-9', 'Katherine Lorena', 'Peña Sigüenza', 'Cantón las Flores, municipio de Cojutepeque, departamento de Cuscatlán', '1998-03-26', 350, '7856-5139', 'cm16057@ues.edu.sv', 202109351, 'Activo', 'Femenino');

-- ----------------------------
-- Table structure for tb_expediente
-- ----------------------------
DROP TABLE IF EXISTS `tb_expediente`;
CREATE TABLE `tb_expediente`  (
  `int_idexpediente` int NOT NULL AUTO_INCREMENT,
  `nva_nom_bovino` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nva_estado_bovino` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nva_carta_venta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nva_sexo_bovino` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `int_cant_parto` int NULL DEFAULT NULL,
  `txt_descrip_expediente` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `int_id_propietario` int NULL DEFAULT NULL,
  `int_idraza` int NULL DEFAULT NULL,
  `nva_foto_bovino` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nva_tipo_bovino` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `dat_fecha_ult_parto` date NULL DEFAULT NULL,
  `dou_costo_bovino` double(8, 2) NULL DEFAULT NULL,
  `dou_precio_veenta` double(8, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`int_idexpediente`) USING BTREE,
  INDEX `fk_propietario`(`int_id_propietario`) USING BTREE,
  INDEX `fk_raza`(`int_idraza`) USING BTREE,
  CONSTRAINT `fk_propietario` FOREIGN KEY (`int_id_propietario`) REFERENCES `tb_propietario` (`int_id_propietario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_raza` FOREIGN KEY (`int_idraza`) REFERENCES `tb_raza` (`int_idraza`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_expediente
-- ----------------------------
INSERT INTO `tb_expediente` VALUES (2, 'Dulce', 'activo', 'vaca.png', 'femenino', 1, 'Blanco con Negro', 1, 1, 'carta3.png', 'ternero', '2021-09-25', 325.00, NULL);
INSERT INTO `tb_expediente` VALUES (14, 'Parchada', 'activo', 'vaca.png', 'femenino', 1, 'sadasd', 1, 1, 'carta3.png', 'ternero', '2021-09-25', 450.00, NULL);

-- ----------------------------
-- Table structure for tb_natalidad
-- ----------------------------
DROP TABLE IF EXISTS `tb_natalidad`;
CREATE TABLE `tb_natalidad`  (
  `int_id_natalidad` int NOT NULL AUTO_INCREMENT,
  `dat_fecha_nacimiento` datetime NOT NULL,
  `int_id_expe_madre` int NOT NULL,
  `int_id_expe_ternero` int NOT NULL,
  PRIMARY KEY (`int_id_natalidad`) USING BTREE,
  INDEX `fk_expe_ternero`(`int_id_expe_ternero`) USING BTREE,
  INDEX `fk_expe_madre`(`int_id_expe_madre`) USING BTREE,
  CONSTRAINT `fk_expe_madre` FOREIGN KEY (`int_id_expe_madre`) REFERENCES `tb_expediente` (`int_idexpediente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_expe_ternero` FOREIGN KEY (`int_id_expe_ternero`) REFERENCES `tb_expediente` (`int_idexpediente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_natalidad
-- ----------------------------

-- ----------------------------
-- Table structure for tb_preñez
-- ----------------------------
DROP TABLE IF EXISTS `tb_preñez`;
CREATE TABLE `tb_preñez`  (
  `int_id_preñez` int NOT NULL AUTO_INCREMENT,
  `int_bovino_fk` int NULL DEFAULT NULL,
  `dat_fecha_monta` datetime NULL DEFAULT NULL,
  `dat_fecha_parto` datetime NULL DEFAULT NULL,
  `dat_fecha_celo` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`int_id_preñez`) USING BTREE,
  INDEX `fk_expdt`(`int_bovino_fk`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_preñez
-- ----------------------------

-- ----------------------------
-- Table structure for tb_producto
-- ----------------------------
DROP TABLE IF EXISTS `tb_producto`;
CREATE TABLE `tb_producto`  (
  `int_idproducto` int NOT NULL AUTO_INCREMENT,
  `nva_nom_producto` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `int_existencia` int NULL DEFAULT NULL,
  `dou_costo_producto` double NULL DEFAULT NULL,
  `txt_descrip_producto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `dat_fecha_vencimiento` datetime NULL DEFAULT NULL,
  `int_idcategoria` int NULL DEFAULT NULL,
  PRIMARY KEY (`int_idproducto`) USING BTREE,
  INDEX `idcategoria`(`int_idcategoria`) USING BTREE,
  CONSTRAINT `fk_categoria` FOREIGN KEY (`int_idcategoria`) REFERENCES `tb_categoria` (`int_idcategoria`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 202152270 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_producto
-- ----------------------------
INSERT INTO `tb_producto` VALUES (5, 'Marqueta de Queso', 15, 54, 'Queso Duro Blando', '2021-10-24 13:33:00', 1);
INSERT INTO `tb_producto` VALUES (6, 'tsetse', 35, 234, 'estests', '2021-10-14 13:34:00', 1);
INSERT INTO `tb_producto` VALUES (7, 'Botella de Leche', 4, 1.5, 'leche de vaca', '2021-11-26 10:47:43', 1);
INSERT INTO `tb_producto` VALUES (8, 'Desparasitante', 15, 5, 'Desparasistante en polvo', '2021-11-28 10:51:14', 3);

-- ----------------------------
-- Table structure for tb_propietario
-- ----------------------------
DROP TABLE IF EXISTS `tb_propietario`;
CREATE TABLE `tb_propietario`  (
  `int_id_propietario` int NOT NULL AUTO_INCREMENT,
  `nva_dui_propietario` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nva_nombres_propietario` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nva_apellidos_propietario` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`int_id_propietario`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_propietario
-- ----------------------------
INSERT INTO `tb_propietario` VALUES (1, '12345678-9', 'Fabricio', 'Corvera');

-- ----------------------------
-- Table structure for tb_proveedor
-- ----------------------------
DROP TABLE IF EXISTS `tb_proveedor`;
CREATE TABLE `tb_proveedor`  (
  `int_idproveedor` int NOT NULL AUTO_INCREMENT,
  `nva_nom_proveedor` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `txt_direc_proveedor` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `nva_telefono` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nva_nrc` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`int_idproveedor`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_proveedor
-- ----------------------------
INSERT INTO `tb_proveedor` VALUES (1, 'Salinera Turcios', 'san salvador', '7878-9898', '12345-6');
INSERT INTO `tb_proveedor` VALUES (2, 'Agroservicio El Frutal', 'san salvador', '7979-7878', '21213-4');
INSERT INTO `tb_proveedor` VALUES (3, 'Agua El Manantial', 'cuscatlan', '7373-2121', '31312-3');
INSERT INTO `tb_proveedor` VALUES (4, 'Finca Cuscatlán', 'cojutepeque', '6398-6598', '78932-4');

-- ----------------------------
-- Table structure for tb_raza
-- ----------------------------
DROP TABLE IF EXISTS `tb_raza`;
CREATE TABLE `tb_raza`  (
  `int_idraza` int NOT NULL AUTO_INCREMENT,
  `nva_nom_raza` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`int_idraza`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_raza
-- ----------------------------
INSERT INTO `tb_raza` VALUES (1, 'holtein');

-- ----------------------------
-- Table structure for tb_usuario
-- ----------------------------
DROP TABLE IF EXISTS `tb_usuario`;
CREATE TABLE `tb_usuario`  (
  `int_idusuario` int NOT NULL AUTO_INCREMENT,
  `nva_nom_usuario` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nva_contraseña_usuario` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `int_idempleado` int NULL DEFAULT NULL,
  PRIMARY KEY (`int_idusuario`) USING BTREE,
  INDEX `fk_empleado`(`int_idempleado`) USING BTREE,
  CONSTRAINT `fk_empleado` FOREIGN KEY (`int_idempleado`) REFERENCES `tb_empleado` (`int_idempleado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 202138342 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_usuario
-- ----------------------------
INSERT INTO `tb_usuario` VALUES (202138341, 'kathy', '$2y$10$Ctks1F6Z5SS6kYWansP3OuNo/U9qbDoBdytBx0CsWA.BAkCgOmPdm', 202152261);

-- ----------------------------
-- Table structure for tb_venta
-- ----------------------------
DROP TABLE IF EXISTS `tb_venta`;
CREATE TABLE `tb_venta`  (
  `int_idventa` int NOT NULL AUTO_INCREMENT,
  `dou_total_venta` double NULL DEFAULT NULL,
  `dat_fecha_venta` datetime NULL DEFAULT NULL,
  `int_idempleado` int NULL DEFAULT NULL,
  `int_id_cliente` int NULL DEFAULT NULL,
  PRIMARY KEY (`int_idventa`) USING BTREE,
  INDEX `idusuario`(`int_idempleado`) USING BTREE,
  INDEX `tb_clientes_fk`(`int_id_cliente`) USING BTREE,
  CONSTRAINT `tb_clientes_fk` FOREIGN KEY (`int_id_cliente`) REFERENCES `tb_clientes` (`int_idcliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_empleado_fk` FOREIGN KEY (`int_idempleado`) REFERENCES `tb_empleado` (`int_idempleado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_venta
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
