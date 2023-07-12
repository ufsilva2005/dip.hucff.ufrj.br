-- phpMyAdmin SQL Dump
-- version 5.0.4deb2~bpo10+1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 26/08/2022 às 15:03
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
  `dataCadastro` date DEFAULT NULL,
  `dataAmostra` date DEFAULT NULL,
  `tiposExames` varchar(255) DEFAULT NULL,
  `idFuncionario` int(11) DEFAULT NULL,
  `idPaciente` int(11) DEFAULT NULL,
  `idOrigem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `examesSolicitados`
--
ALTER TABLE `examesSolicitados`
  ADD PRIMARY KEY (`idExamesSolicitados`),
  ADD KEY `idFuncionario` (`idFuncionario`),
  ADD KEY `idPaciente` (`idPaciente`),
  ADD KEY `idOrigem` (`idOrigem`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `examesSolicitados`
--
ALTER TABLE `examesSolicitados`
  MODIFY `idExamesSolicitados` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `examesSolicitados`
--
ALTER TABLE `examesSolicitados`
  ADD CONSTRAINT `examesSolicitados_ibfk_1` FOREIGN KEY (`idFuncionario`) REFERENCES `funcionario` (`idFuncionario`),
  ADD CONSTRAINT `examesSolicitados_ibfk_2` FOREIGN KEY (`idPaciente`) REFERENCES `paciente` (`idPaciente`),
  ADD CONSTRAINT `examesSolicitados_ibfk_3` FOREIGN KEY (`idOrigem`) REFERENCES `origem` (`idOrigem`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
