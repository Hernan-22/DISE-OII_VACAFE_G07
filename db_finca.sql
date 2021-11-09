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

 Date: 07/11/2021 17:07:56
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
  `dou_total_compra` double NOT NULL,
  `dat_fecha_compra` datetime NOT NULL,
  `dat_fecha_sistema` datetime NOT NULL,
  `nva_tipo_documento` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nva_numero_documento` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `txt_sitio_compra` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `int_idproveedor` int NOT NULL,
  `int_idempleado` int NOT NULL,
  PRIMARY KEY (`int_idcompra`) USING BTREE,
  INDEX `idempleado_fk`(`int_idempleado`) USING BTREE,
  INDEX `idproveedor_fk`(`int_idproveedor`) USING BTREE,
  CONSTRAINT `idempleado_fk` FOREIGN KEY (`int_idempleado`) REFERENCES `tb_empleado` (`int_idempleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `idproveedor_fk` FOREIGN KEY (`int_idproveedor`) REFERENCES `tb_proveedor` (`int_idproveedor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_compra
-- ----------------------------

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
  `dou_costo_compra` double NULL DEFAULT NULL,
  `int_idproducto` int NULL DEFAULT NULL,
  `int_idcompra` int NOT NULL,
  `int_idexpediente` int NULL DEFAULT NULL,
  PRIMARY KEY (`int_iddcompra`) USING BTREE,
  INDEX `idproducto`(`int_idproducto`) USING BTREE,
  INDEX `idcompra`(`int_idcompra`) USING BTREE,
  INDEX `idexpediente`(`int_idexpediente`) USING BTREE,
  CONSTRAINT `fk_tbexpediente` FOREIGN KEY (`int_idexpediente`) REFERENCES `tb_expediente` (`int_idexpediente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_detalle_compra_ibfk_1` FOREIGN KEY (`int_idcompra`) REFERENCES `tb_compra` (`int_idcompra`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_detalle_compra_ibfk_2` FOREIGN KEY (`int_idproducto`) REFERENCES `tb_producto` (`int_idproducto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_detalle_compra
-- ----------------------------

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
  PRIMARY KEY (`int_idexpediente`) USING BTREE,
  INDEX `fk_propietario`(`int_id_propietario`) USING BTREE,
  INDEX `fk_raza`(`int_idraza`) USING BTREE,
  CONSTRAINT `fk_propietario` FOREIGN KEY (`int_id_propietario`) REFERENCES `tb_propietario` (`int_id_propietario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_raza` FOREIGN KEY (`int_idraza`) REFERENCES `tb_raza` (`int_idraza`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_expediente
-- ----------------------------
INSERT INTO `tb_expediente` VALUES (2, 'Dulce', 'inactivo', 'vaca.png', 'femenino', 1, 'Blanco con Negro', 1, 1, 'carta3.png', 'ternero', '2021-09-25');
INSERT INTO `tb_expediente` VALUES (14, 'Parchada', 'inactivo', 'vaca.png', 'femenino', 1, 'sadasd', 1, 1, 'carta3.png', 'ternero', '2021-09-25');

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
  CONSTRAINT `fk_expe_ternero` FOREIGN KEY (`int_id_expe_ternero`) REFERENCES `tb_expediente` (`int_idexpediente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_expe_madre` FOREIGN KEY (`int_id_expe_madre`) REFERENCES `tb_expediente` (`int_idexpediente`) ON DELETE CASCADE ON UPDATE CASCADE
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
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_producto
-- ----------------------------
INSERT INTO `tb_producto` VALUES (5, 'Marqueta de Queso', 4, 54, 'Queso Duro Blando', '2021-10-24 13:33:00', 1);
INSERT INTO `tb_producto` VALUES (6, 'tsetse', 23, 234, 'estests', '2021-10-14 13:34:00', 1);
INSERT INTO `tb_producto` VALUES (7, 'Botella de Leche', 50, 1.5, 'leche de vaca', '2021-11-26 10:47:43', 1);
INSERT INTO `tb_producto` VALUES (8, 'Desparasitante', 1, 5, 'Desparasistante en polvo', '2021-11-28 10:51:14', 3);

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
  PRIMARY KEY (`int_idproveedor`) USING BTREE,
  CONSTRAINT `tb_proveedor_ibfk_1` FOREIGN KEY (`int_idproveedor`) REFERENCES `tb_compra` (`int_idcompra`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_proveedor
-- ----------------------------

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
