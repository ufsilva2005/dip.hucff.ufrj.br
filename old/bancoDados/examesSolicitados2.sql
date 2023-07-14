-- phpMyAdmin SQL Dump
-- version 5.0.4deb2~bpo10+1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 23/08/2022 às 12:49
-- Versão do servidor: 10.3.34-MariaDB-0+deb10u1
-- Versão do PHP: 7.3.31-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbcihiv`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `examesSolicitados`
--

CREATE TABLE `examesSolicitados` (
  `idExamesSolicitados` int(11) NOT NULL,
  `numAmostra` int(11) DEFAULT NULL,
  `dataAmostra` date DEFAULT NULL,
  `tiposExames` varchar(255)  DEFAULT NULL,
  `idPaciente` int(11) DEFAULT NULL,
  `idOrigem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `examesSolicitados`
--

INSERT INTO `examesSolicitados` (`idExamesSolicitados`, `numAmostra`, `dataAmostra`, `tiposExames`,`idPaciente`, `idOrigem`) VALUES
(1, 220821001, '2022-08-21', NULL, NULL, NULL),
(2, 220822001, '2022-08-22', NULL, NULL, NULL),
(3, 220822002, '2022-08-22', NULL, NULL, NULL),
(4, 220822003, '2022-08-22', NULL, NULL, NULL),
(5, 220822004, '2022-08-22', NULL, NULL, NULL),
(6, 220823001, '2022-08-23', NULL, NULL, NULL),
(7, 220823002, '2022-08-23', NULL, NULL, NULL),
(8, 220824001, '2022-08-24', NULL, NULL, NULL),
(9, 220824002, '2022-08-24', NULL, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `examesSolicitados`
--
ALTER TABLE `examesSolicitados`
  ADD PRIMARY KEY (`idExamesSolicitados`),
  ADD KEY `idPaciente` (`idPaciente`),
  ADD KEY `idOrigem` (`idOrigem`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `examesSolicitados`
--
ALTER TABLE `examesSolicitados`
  MODIFY `idExamesSolicitados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `examesSolicitados`
--
ALTER TABLE `examesSolicitados`
  ADD CONSTRAINT `examesSolicitados_ibfk_1` FOREIGN KEY (`idPaciente`) REFERENCES `paciente` (`idPaciente`),
  ADD CONSTRAINT `examesSolicitados_ibfk_3` FOREIGN KEY (`idOrigem`) REFERENCES `origem` (`idOrigem`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
