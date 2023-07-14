-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 23/11/2022 às 14:45
-- Versão do servidor: 10.3.36-MariaDB-0+deb10u2
-- Versão do PHP: 8.0.24

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
-- Estrutura para tabela `paciente`
--

CREATE TABLE `paciente` (
  `idPaciente` int(11) NOT NULL,
  `PAC_CODIGO` int(11) DEFAULT NULL,
  `nomePaciente` varchar(60) DEFAULT NULL,
  `prontuario` varchar(30) DEFAULT NULL,
  `gestante` varchar(3) DEFAULT NULL,
  `numSus` varchar(30) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `sexo` varchar(15) DEFAULT NULL,
  `dataNascimento` date DEFAULT '0000-00-00',
  `identidade` varchar(20) DEFAULT NULL,
  `orgaoEmissor` varchar(15) DEFAULT NULL,
  `naturalidade` varchar(30) DEFAULT NULL,
  `nacionalidade` varchar(30) DEFAULT NULL,
  `dataCadastroP` date DEFAULT NULL,
  `idFuncionario` int(11) DEFAULT NULL,
  `dataAltCad` date DEFAULT NULL,
  `idFuncionarioAlt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`idPaciente`),
  ADD KEY `idFuncionario` (`idFuncionario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idPaciente` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`idFuncionario`) REFERENCES `funcionario` (`idFuncionario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
