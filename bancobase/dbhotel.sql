-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Dez-2018 às 03:32
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbhotel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `IdCliente` int(11) NOT NULL,
  `Cpf` varchar(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Endereco` varchar(255) DEFAULT NULL,
  `Telefone` varchar(14) NOT NULL,
  `SituacaoCliente` tinyint(1) NOT NULL,
  `DataCadastro` datetime NOT NULL,
  `DataAtualizado` datetime DEFAULT NULL,
  `EmDebito` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`IdCliente`, `Cpf`, `Nome`, `Endereco`, `Telefone`, `SituacaoCliente`, `DataCadastro`, `DataAtualizado`, `EmDebito`) VALUES
(1, '03175264094', 'thales', 'sepe 340', '97673063', 0, '2018-11-10 23:00:00', '2018-11-10 23:00:00', 0),
(2, '65413597152', 'lucas matos ', 'sepe 350', '987535682', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, '6231485620', 'mathues', 'albertos bins ', '98621456', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(4, '56482013569', 'gleicy barbosa', 'algusto factun 365', '975123569', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, '02147564921', 'alicinario', 'rua sepe tiaraju', '998793256', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientereserva`
--

CREATE TABLE `clientereserva` (
  `id` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idquarto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `quarto`
--

CREATE TABLE `quarto` (
  `IdQuarto` int(11) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Situacao` tinyint(1) NOT NULL,
  `ValorDiaria` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `quarto`
--

INSERT INTO `quarto` (`IdQuarto`, `Numero`, `Situacao`, `ValorDiaria`) VALUES
(1, 1, 1, '100.00'),
(2, 2, 0, '150.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `ID` int(11) NOT NULL,
  `IDCliente` int(11) NOT NULL,
  `IDQuarto` int(11) NOT NULL,
  `DataReserva` datetime DEFAULT NULL,
  `DataCheckin` datetime DEFAULT NULL,
  `DataCheckout` datetime DEFAULT NULL,
  `Situacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Indexes for table `clientereserva`
--
ALTER TABLE `clientereserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idquarto` (`idquarto`);

--
-- Indexes for table `quarto`
--
ALTER TABLE `quarto`
  ADD PRIMARY KEY (`IdQuarto`);

--
-- Indexes for table `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDQuarto` (`IDQuarto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientereserva`
--
ALTER TABLE `clientereserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quarto`
--
ALTER TABLE `quarto`
  MODIFY `IdQuarto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
