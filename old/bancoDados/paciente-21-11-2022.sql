-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 21/11/2022 às 10:49
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
  `nomePaciente` varchar(60) DEFAULT NULL,
  `prontuario` varchar(30) DEFAULT NULL,
  `gestante` varchar(3) DEFAULT NULL,
  `numSus` varchar(30) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `sexo` varchar(15) DEFAULT NULL,
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
-- Despejando dados para a tabela `paciente`
--

INSERT INTO `paciente` (`idPaciente`, `nomePaciente`, `prontuario`, `gestante`, `numSus`, `cpf`, `sexo`, `identidade`, `orgaoEmissor`, `naturalidade`, `nacionalidade`, `dataCadastroP`, `idFuncionario`, `dataAltCad`, `idFuncionarioAlt`) VALUES
(1, 'ULISSES DE SOUZA', '123', 'não', '123456', '011.726.807-01', 'Masculino', '', '', '', '', '2022-09-02', 1, '2022-11-09', 1),
(2, 'ULISSES FERREIRA', '123456', 'não', '7891011', '011.726.807-01', 'Masculino', '', '', '', '', NULL, 1, '0000-00-00', 0),
(3, 'SUZANA VIRGINIO', '123456', 'não', '1234', '009.569.527-39', 'Feminino', '', '', '', '', '2022-10-14', 1, '2022-11-07', 1),
(4, 'AMOSTRA CEGA', '', 'não', ' ', '', 'Masculino', '', '', '', '', '2022-10-26', 1, '0000-00-00', 0),
(5, 'AMOSTRA CEGA', '', 'não', ' ', '', 'Masculino', '', '', '', '', '2022-10-26', 1, '0000-00-00', 0),
(6, 'ULISSES DA SILVA', '789546', 'não', '854954', '009.569.527-39', 'Masculino', '', '', '', '', '2022-11-17', 1, '0000-00-00', 0),
(7, 'SUSY', '458287', 'não', ' 4865446587', '011.726.807-01', 'Feminino', '', '', '', '', '2022-11-17', 1, '0000-00-00', 0),
(8, 'ALFREDO', '25841887', 'não', ' 97258554', '011.726.807-01', 'Masculino', '', '', '', '', '2022-11-17', 3, '0000-00-00', 0);

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
  MODIFY `idPaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
