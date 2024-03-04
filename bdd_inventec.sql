-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 10:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdd_inventec`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `DELETE_CATEGORIA` (IN `ctgid` INT)   BEGIN

UPDATE `bdd_inventec`.`tbl_categoria`
SET

`ctg_estado` = 1
WHERE `ctg_id` = ctgid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DELETE_DETALLEPEDIDO` (IN `detid` INT)   BEGIN
UPDATE `bdd_inventec`.`tbl_detallepedido`
SET
`det_estado` = 1
WHERE `det_id` = detid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DELETE_PEDIDO` (IN `pedid` INT)   BEGIN
UPDATE `bdd_inventec`.`tbl_pedido`
SET

`ped_estado` = 1

WHERE `ped_id` = pedid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DELETE_PRODUCTO` (IN `proid` INT)   BEGIN
UPDATE `bdd_inventec`.`tbl_producto`
SET

`pro_estado` = 1

WHERE `pro_id` = proid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DELETE_PROVEEDOR` (IN `prvid` INT)   BEGIN
UPDATE `bdd_inventec`.`tbl_proveedor`
SET

`prv_estado` = 1

WHERE `prv_id` = prvid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_CATEGORIA` (IN `nombre` VARCHAR(45))   BEGIN
INSERT INTO `bdd_inventec`.`tbl_categoria`
(
`ctg_nombre`,
`ctg_estado`)
VALUES
(
nombre,
0);

select * from tbl_categoria;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_DETALLEPEDIDO` (IN `proid` INT, IN `cantidad` INT, IN `pedid` INT)   BEGIN
INSERT INTO `bdd_inventec`.`tbl_detallepedido`
(
`pro_id`,
`det_cantidad`,
`ped_id`,
`det_estado`)
VALUES
(
proid,
cantidad,
pedid,
0);

select * from tbl_detallepedido;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_PEDIDO` (IN `fecha` VARCHAR(45), IN `prvid` INT)   BEGIN
INSERT INTO `bdd_inventec`.`tbl_pedido`
(
`ped_fecha`,
`prv_id`,
`ped_estado`)
VALUES
(
fecha,
prvid,
0);

select * from tbl_pedido;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_PRODUCTO` (IN `nombre` VARCHAR(45), IN `cantidad` INT, IN `precio` DOUBLE, IN `prvid` INT, IN `codigo` VARCHAR(45), IN `ctgid` INT)   BEGIN
INSERT INTO `bdd_inventec`.`tbl_producto`
(
`pro_nombre`,
`pro_cantidad`,
`pro_precio`,
`prv_id`,
`pro_codigo`,
`ctg_id`,
`pro_estado`)
VALUES
(
nombre,
cantidad,
precio,
prvid,
codigo,
ctgid,
0);

select * from tbl_producto;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_PROVEEDOR` (IN `nombre` VARCHAR(45), IN `ruc` VARCHAR(45), IN `direccion` VARCHAR(45), IN `email` VARCHAR(45), IN `telefono` VARCHAR(45))   BEGIN
INSERT INTO `bdd_inventec`.`tbl_proveedor`
(
`prv_nombre`,
`prv_ruc`,
`prv_direccion`,
`prv_email`,
`prv_telefono`,
`prv_estado`)
VALUES
(
nombre,
ruc,
direccion,
email,
telefono,
0);

select * from tbl_proveedor;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SELECT_CATEGORIAS` ()   BEGIN
select * from tbl_categoria where ctg_estado = 0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SELECT_DETALLEPEDIDOPORPEDIDOID` (IN `pedid` INT)   BEGIN
select 
tbl_detallepedido.det_id,
tbl_producto.prv_id,
tbl_pedido.ped_id,
ped_fecha,
pro_codigo,
pro_nombre,
det_cantidad

FROM tbl_detallepedido
INNER JOIN tbl_pedido
ON tbl_detallepedido.ped_id = tbl_pedido.ped_id

INNER JOIN tbl_producto
ON tbl_detallepedido.pro_id = tbl_producto.pro_id

WHERE det_estado = 0 AND tbl_detallepedido.ped_id=pedid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SELECT_PEDIDOPORID` (IN `pedid` INT)   BEGIN

select
ped_id,
ped_fecha,
prv_nombre

FROM tbl_pedido
INNER JOIN tbl_proveedor
ON tbl_pedido.prv_id = tbl_proveedor.prv_id
where tbl_pedido.ped_id = pedid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SELECT_PEDIDOS` ()   BEGIN
select 

ped_id,
ped_fecha,
prv_nombre,
tbl_pedido.prv_id,
ped_comprobante

FROM tbl_pedido
INNER JOIN tbl_proveedor
ON tbl_pedido.prv_id = tbl_proveedor.prv_id

WHERE ped_estado = 0;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SELECT_PRODUCTOPORCATEGORIA` (IN `ctgid` INT)   BEGIN
select 

pro_id,
pro_codigo,
pro_nombre,
prv_nombre,
ctg_nombre,
pro_cantidad,
pro_precio

FROM tbl_producto
INNER JOIN tbl_proveedor
ON tbl_producto.prv_id = tbl_proveedor.prv_id

INNER JOIN tbl_categoria
ON tbl_producto.ctg_id = tbl_categoria.ctg_id

where tbl_producto.ctg_id = ctgid AND tbl_producto.pro_estado = 0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SELECT_PRODUCTOPORCODIGO` (IN `procodigo` VARCHAR(45))   BEGIN
select * from tbl_producto where pro_codigo = procodigo AND pro_estado = 0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SELECT_PRODUCTOPORID` (IN `proid` INT)   BEGIN
select * from tbl_producto where pro_id = proid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SELECT_PRODUCTOPORPEDID` (IN `pedid` INT, IN `proid` VARCHAR(45))   BEGIN
select * from tbl_detallepedido where pro_id = proid AND ped_id = pedid AND det_estado = 0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SELECT_PRODUCTOPORPROVEEDOR` (IN `prvid` INT)   BEGIN
select 

pro_id,
pro_codigo,
pro_nombre,
prv_nombre,
ctg_nombre,
pro_cantidad,
pro_precio

FROM tbl_producto
INNER JOIN tbl_proveedor
ON tbl_producto.prv_id = tbl_proveedor.prv_id

INNER JOIN tbl_categoria
ON tbl_producto.ctg_id = tbl_categoria.ctg_id

where tbl_producto.prv_id = prvid AND tbl_producto.pro_estado = 0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SELECT_PRODUCTOS` ()   BEGIN
select 

pro_id,
pro_codigo,
pro_nombre,
prv_nombre,
ctg_nombre,
pro_cantidad,
pro_precio

FROM tbl_producto
INNER JOIN tbl_proveedor
ON tbl_producto.prv_id = tbl_proveedor.prv_id

INNER JOIN tbl_categoria
ON tbl_producto.ctg_id = tbl_categoria.ctg_id

WHERE pro_estado = 0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SELECT_PROVEEDORES` ()   BEGIN

select * from tbl_proveedor where prv_estado = 0;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SELECT_PROVEEDORPORID` (IN `prvid` INT)   BEGIN
select * from tbl_proveedor where prv_id = prvid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SELECT_PROVEEDORPORRUC` (IN `prvruc` VARCHAR(45))   BEGIN
select * from tbl_proveedor where prv_ruc = prvruc AND prv_estado = 0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SELECT_ULTIMOPEDIDO` ()   BEGIN
select 

ped_id,
ped_fecha,
prv_nombre

FROM tbl_pedido
INNER JOIN tbl_proveedor
ON tbl_pedido.prv_id = tbl_proveedor.prv_id

ORDER BY ped_id DESC LIMIT 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE CATEGORIA` (IN `ctgid` INT)   BEGIN
UPDATE `bdd_inventec`.`tbl_categoria`
SET
`ctg_estado` = 1
WHERE `ctg_id` = ctgid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_CANTIDADDETALLE` (IN `cantidad` INT, IN `detid` INT)   BEGIN
UPDATE `bdd_inventec`.`tbl_detallepedido`
SET
`det_cantidad` = cantidad
WHERE `det_id` = detid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_PRODUCTO` (IN `proid` INT, IN `nombre` VARCHAR(45), IN `cantidad` INT, IN `precio` DOUBLE, IN `codigo` VARCHAR(45))   BEGIN
UPDATE `bdd_inventec`.`tbl_producto`
SET
`pro_nombre` = nombre,
`pro_cantidad` = cantidad,
`pro_precio` = precio,
`pro_codigo` = codigo

WHERE `pro_id` = proid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_PROVEEDOR` (IN `prvid` INT, IN `nombre` VARCHAR(45), IN `ruc` VARCHAR(45), IN `direccion` VARCHAR(45), IN `email` VARCHAR(45), IN `telefono` VARCHAR(45))   BEGIN
UPDATE `bdd_inventec`.`tbl_proveedor`
SET

`prv_nombre` = nombre,
`prv_ruc` = ruc,
`prv_direccion` = direccion,
`prv_email` = email,
`prv_telefono` = telefono

WHERE `prv_id` = prvid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_SUBIRCOMPROBANTE` (IN `ruta` LONGTEXT, IN `pedid` INT)   BEGIN
UPDATE `bdd_inventec`.`tbl_pedido`
SET
`ped_comprobante` = ruta
WHERE `ped_id` = pedid;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categoria`
--

CREATE TABLE `tbl_categoria` (
  `ctg_id` int(11) NOT NULL,
  `ctg_nombre` varchar(45) DEFAULT NULL,
  `ctg_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_categoria`
--

INSERT INTO `tbl_categoria` (`ctg_id`, `ctg_nombre`, `ctg_estado`) VALUES
(1, 'HIGIENE', 0),
(2, 'BEBIDAS', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detallepedido`
--

CREATE TABLE `tbl_detallepedido` (
  `det_id` int(11) NOT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `det_cantidad` double DEFAULT NULL,
  `ped_id` int(11) DEFAULT NULL,
  `det_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_detallepedido`
--

INSERT INTO `tbl_detallepedido` (`det_id`, `pro_id`, `det_cantidad`, `ped_id`, `det_estado`) VALUES
(1, 2, 15, 84, 0),
(2, 2, 15, 84, 0),
(3, 1, 12, 88, 0),
(4, 1, 10, 88, 0),
(5, 2, 12, 89, 0),
(6, 2, 10, 90, 0),
(7, 2, 2, 1, 0),
(8, 2, 2, 10, 0),
(9, 1, 12, 92, 0),
(10, 2, 12, 96, 0),
(11, 2, 1, 97, 0),
(12, 2, 12, 101, 0),
(13, 1, 12, 102, 0),
(14, 1, 14, 103, 0),
(15, 2, 12, 8, 0),
(16, 2, 20, 105, 0),
(17, 2, 2, 108, 0),
(18, 4, 2, 108, 0),
(19, 2, 12, 109, 0),
(20, 4, 1, 109, 0),
(21, 2, 12, 111, 0),
(22, 4, 10, 111, 0),
(23, 4, 12, 112, 0),
(24, 4, 12, 114, 0),
(25, 4, 10, 115, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pedido`
--

CREATE TABLE `tbl_pedido` (
  `ped_id` int(11) NOT NULL,
  `ped_fecha` varchar(45) DEFAULT NULL,
  `prv_id` int(11) DEFAULT NULL,
  `ped_estado` int(11) DEFAULT NULL,
  `ped_comprobante` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pedido`
--

INSERT INTO `tbl_pedido` (`ped_id`, `ped_fecha`, `prv_id`, `ped_estado`, `ped_comprobante`) VALUES
(115, '05/07/2023', 1, 0, '05080706_pedido (1).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_producto`
--

CREATE TABLE `tbl_producto` (
  `pro_id` int(11) NOT NULL,
  `pro_nombre` varchar(45) DEFAULT NULL,
  `pro_cantidad` double DEFAULT NULL,
  `pro_precio` double DEFAULT NULL,
  `prv_id` int(11) DEFAULT NULL,
  `pro_codigo` varchar(45) DEFAULT NULL,
  `ctg_id` int(11) DEFAULT NULL,
  `pro_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_producto`
--

INSERT INTO `tbl_producto` (`pro_id`, `pro_nombre`, `pro_cantidad`, `pro_precio`, `prv_id`, `pro_codigo`, `ctg_id`, `pro_estado`) VALUES
(1, 'Jabon Dove', 10, 2.6, 2, 'ABC124', 1, 0),
(2, 'Pasta de dientes', 7, 1.5, 1, 'LOR001', 1, 0),
(4, 'Leche 1L', 10, 1.5, 1, 'LOR002', 2, 0),
(5, 'Shampoo', 11, 14.5, 5, 'FUCK69', 1, 1),
(6, 'Pinoklin', 40, 12, 5, 'SEX69', 1, 1),
(7, 'L', 1, 2, 1, 'HJKHJK', 2, 1),
(8, '45', 4, 4, 2, '4545', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proveedor`
--

CREATE TABLE `tbl_proveedor` (
  `prv_id` int(11) NOT NULL,
  `prv_nombre` varchar(45) DEFAULT NULL,
  `prv_ruc` varchar(45) DEFAULT NULL,
  `prv_direccion` varchar(60) DEFAULT NULL,
  `prv_email` varchar(45) DEFAULT NULL,
  `prv_telefono` varchar(45) DEFAULT NULL,
  `prv_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_proveedor`
--

INSERT INTO `tbl_proveedor` (`prv_id`, `prv_nombre`, `prv_ruc`, `prv_direccion`, `prv_email`, `prv_telefono`, `prv_estado`) VALUES
(1, 'La Oriental', '10020030001', 'Av Almeida', 'laoriental@gmail.com', '099001002', 0),
(2, 'Nataly Salazar', '1003909908001', 'Atuntaqui', 'npsalazar@pucesi.edu.ec', '09963608', 0),
(3, 'Nataly Salazar', '1003909908001', 'Atuntaqui', 'npsalazar@pucesi.edu.ec', '0996360874', 1),
(4, 'Nataly Salazar', '1003909908001', 'Atuntaqui', 'npsalazar@pucesi.edu.ec', '0996360874', 1),
(5, 'KAI', '100500204', 'COREA', 'kaicomeback@gmail.com', '06969694', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  ADD PRIMARY KEY (`ctg_id`);

--
-- Indexes for table `tbl_detallepedido`
--
ALTER TABLE `tbl_detallepedido`
  ADD PRIMARY KEY (`det_id`),
  ADD KEY `proid_idx` (`pro_id`),
  ADD KEY `pedid_idx` (`ped_id`);

--
-- Indexes for table `tbl_pedido`
--
ALTER TABLE `tbl_pedido`
  ADD PRIMARY KEY (`ped_id`),
  ADD KEY `prvid1_idx` (`prv_id`);

--
-- Indexes for table `tbl_producto`
--
ALTER TABLE `tbl_producto`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `prvid_idx` (`prv_id`),
  ADD KEY `ctgid_idx` (`ctg_id`);

--
-- Indexes for table `tbl_proveedor`
--
ALTER TABLE `tbl_proveedor`
  ADD PRIMARY KEY (`prv_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  MODIFY `ctg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_detallepedido`
--
ALTER TABLE `tbl_detallepedido`
  MODIFY `det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_pedido`
--
ALTER TABLE `tbl_pedido`
  MODIFY `ped_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `tbl_producto`
--
ALTER TABLE `tbl_producto`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_proveedor`
--
ALTER TABLE `tbl_proveedor`
  MODIFY `prv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_detallepedido`
--
ALTER TABLE `tbl_detallepedido`
  ADD CONSTRAINT `pedid` FOREIGN KEY (`ped_id`) REFERENCES `tbl_pedido` (`ped_id`),
  ADD CONSTRAINT `proid` FOREIGN KEY (`pro_id`) REFERENCES `tbl_producto` (`pro_id`);

--
-- Constraints for table `tbl_pedido`
--
ALTER TABLE `tbl_pedido`
  ADD CONSTRAINT `prvid1` FOREIGN KEY (`prv_id`) REFERENCES `tbl_proveedor` (`prv_id`);

--
-- Constraints for table `tbl_producto`
--
ALTER TABLE `tbl_producto`
  ADD CONSTRAINT `ctgid` FOREIGN KEY (`ctg_id`) REFERENCES `tbl_categoria` (`ctg_id`),
  ADD CONSTRAINT `prvid` FOREIGN KEY (`prv_id`) REFERENCES `tbl_proveedor` (`prv_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
