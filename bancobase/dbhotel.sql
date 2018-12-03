-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Dez-2018 às 04:10
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
(1, '11111111111', 'Teste 01 ', 'rua teste', '111111111', 1, '2018-12-02 09:39:42', '2018-12-02 09:39:42', 0),
(2, '22222222222', 'Teste 02', 'Rua Teste 2', '222222222', 1, '2018-12-02 09:40:15', '2018-12-02 09:40:15', 0),
(3, '33333333333', 'Teste 03 ', 'Rua Teste 3', '33333333', 1, '2018-12-02 09:40:54', '2018-12-02 09:40:54', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `quarto`
--

CREATE TABLE `quarto` (
  `IdQuarto` int(11) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Situacao` tinyint(1) NOT NULL,
  `ValorDiaria` decimal(5,2) DEFAULT NULL,
  `titulo` varchar(80) NOT NULL,
  `descricao` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `quarto`
--

INSERT INTO `quarto` (`IdQuarto`, `Numero`, `Situacao`, `ValorDiaria`, `titulo`, `descricao`) VALUES
(1, 1, 1, '100.00', 'Apartamento Standard com 1 cama de casal', 'Moderno e convidativo o apartamento Ibis tem tudo que voce precisa, cama casal Sweet Bed com um banheiro confortavel e decoração moderna, internet e TV a cabo'),
(2, 2, 0, '150.00', 'Apartamento Standard com 1 cama de casal', 'Moderno e convidativo o apartamento Ibis tem tudo que voce precisa, cama casal Sweet Bed com um banheiro confortavel e decoração moderna, internet e TV a cabo'),
(3, 3, 0, '200.00', 'Apartamento Standard com 1 cama de casal + 1 cama para criança', 'Moderno e convidativo o apartamento Ibis tem tudo que voce precisa, cama casal Sweet Bed com um banheiro confortavel e decoração moderna, internet e TV a cabo'),
(4, 4, 0, '180.00', 'Apartamento Standard com 1 cama de casal', 'Moderno e convidativo o apartamento Ibis tem tudo que voce precisa, cama casal Sweet Bed com um banheiro confortavel e decoração moderna, internet e TV a cabo'),
(5, 5, 0, '160.00', 'Apartamento Standard com 1 cama de casal', 'Moderno e convidativo o apartamento Ibis tem tudo que voce precisa, cama casal Sweet Bed com um banheiro confortavel e decoração moderna, internet e TV a cabo'),
(6, 6, 0, '140.00', 'Apartamento Standard com 1 cama de casal', 'Moderno e convidativo o apartamento Ibis tem tudo que voce precisa, cama casal Sweet Bed com um banheiro confortavel e decoração moderna, internet e TV a cabo'),
(7, 7, 0, '130.00', 'Apartamento Standad com 2 camas de solteiro', 'Moderno e convidativo o apartamento Ibis tem tudo que você precisa, cama casal Sweet Bed e um sofá cama para criança até 12 anos, um banheiro confortável e decoração moderna, internet e TV a cabo'),
(8, 8, 0, '110.00', 'Apartamento Standard com 1 cama de casal', 'Moderno e convidativo o apartamento Ibis tem tudo que voce precisa, cama casal Sweet Bed com um banheiro confortavel e decoração moderna, internet e TV a cabo'),
(9, 9, 0, '120.00', 'Apartamento Standad com 2 camas de solteiro', 'Moderno e convidativo o apartamento Ibis tem tudo que voce precisa, camas solteiro Sweet Bed com um banheiro confortavel e decoração moderna, internet e TV a cabo'),
(10, 10, 0, '145.00', 'Apartamento Standad com 2 camas de solteiro', 'Moderno e convidativo o apartamento Ibis tem tudo que voce precisa, camas solteiro Sweet Bed com um banheiro confortavel e decoração moderna, internet e TV a cabo'),
(11, 11, 0, '155.00', 'Apartamento Standad com 2 camas de solteiro', 'Moderno e convidativo o apartamento Ibis tem tudo que voce precisa, camas solteiro Sweet Bed com um banheiro confortavel e decoração moderna, internet e TV a cabo'),
(12, 12, 0, '170.00', 'Apartamento Standard com 1 cama de casal', 'Moderno e convidativo o apartamento Ibis tem tudo que voce precisa, cama casal Sweet Bed com um banheiro confortavel e decoração moderna, internet e TV a cabo');

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
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`ID`, `IDCliente`, `IDQuarto`, `DataReserva`, `DataCheckin`, `DataCheckout`, `Situacao`) VALUES
(1, 1, 2, '2018-12-02 23:16:59', '2018-12-02 23:16:59', '2018-12-02 23:37:15', 0),
(2, 1, 3, '2018-12-02 23:31:43', '2018-12-02 23:31:43', '2018-12-02 23:31:47', 0),
(3, 1, 3, '2018-12-02 23:40:45', '2018-12-02 23:40:45', '2018-12-02 23:40:52', 0),
(4, 1, 3, '2018-12-03 00:48:26', '2018-12-03 00:48:26', '2018-12-03 01:06:03', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`IdCliente`);

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
-- AUTO_INCREMENT for table `quarto`
--
ALTER TABLE `quarto`
  MODIFY `IdQuarto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
