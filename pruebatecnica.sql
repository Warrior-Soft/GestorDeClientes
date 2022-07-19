-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 05:03 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pruebatecnica`
--

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `Estado` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombre`, `apellido`, `Estado`) VALUES
(3, 'Wilfredis Laureano', 'Pichardo Rosario', b'0'),
(4, 'Nereida', 'Ecker Medina', b'1'),
(5, 'Orlando', 'De la Rosa Castro', b'0'),
(6, 'Rosalva', 'Ecker Medina', b'1'),
(7, 'Dominga', 'Calderón ', b'1'),
(8, 'Maycol', 'Guerrero Calderon', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `cliente_direccion`
--

CREATE TABLE `cliente_direccion` (
  `idClienteDireccion` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `idDireccion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cliente_direccion`
--

INSERT INTO `cliente_direccion` (`idClienteDireccion`, `idCliente`, `idDireccion`) VALUES
(7, 3, 7),
(8, 3, 8),
(9, 4, 9),
(10, 5, 10),
(11, 6, 11),
(12, 4, 12),
(13, 7, 13),
(14, 7, 14),
(15, 8, 15);

-- --------------------------------------------------------

--
-- Table structure for table `direccion`
--

CREATE TABLE `direccion` (
  `idDireccion` int(11) NOT NULL,
  `direccion` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `direccion`
--

INSERT INTO `direccion` (`idDireccion`, `direccion`) VALUES
(4, ' F3QV+J34, Calle Mauricio Baez, Santo Domingo 10412'),
(5, 'C. Gaston Fernando Deligne 168, La Romana 22000'),
(6, 'F2P3+54V, Calle 3ra, Santo Domingo 10901'),
(7, 'Calle, Enrique segoviano, casa # 7, San Pedro de Macoris.'),
(8, 'Avenida chaputepec #28'),
(9, 'Calle Gaston F. Deligne, Esquina Doctor Rosario, casa #5'),
(10, 'Teniente Amado García #2'),
(11, 'Calle 17,esquina 4.ª, la aviación.'),
(12, 'Calle 17, Esquina 4.ª, Casa #5, La Aviación'),
(13, 'Calle Enriquillo, Esquina Gaston  F. de Deligne, Casa #136'),
(14, 'Calle 17, Esquina 4ta, Casa #5, Pica Piedra, Villa Hermosa.'),
(15, 'Calle 17, Esquina 2da, Apartamento #4');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `clave`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `cliente_direccion`
--
ALTER TABLE `cliente_direccion`
  ADD PRIMARY KEY (`idClienteDireccion`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idDireccion` (`idDireccion`);

--
-- Indexes for table `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`idDireccion`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cliente_direccion`
--
ALTER TABLE `cliente_direccion`
  MODIFY `idClienteDireccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `direccion`
--
ALTER TABLE `direccion`
  MODIFY `idDireccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cliente_direccion`
--
ALTER TABLE `cliente_direccion`
  ADD CONSTRAINT `cliente_direccion_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `cliente_direccion_ibfk_2` FOREIGN KEY (`idDireccion`) REFERENCES `direccion` (`idDireccion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
