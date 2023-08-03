-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 03-Ago-2023 às 15:56
-- Versão do servidor: 10.5.15-MariaDB-0+deb11u1
-- versão do PHP: 8.2.0RC7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `testeDbCihiv`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `examesSolicitados`
--

CREATE TABLE `examesSolicitados` (
  `idExamesSolicitados` int(11) NOT NULL,
  `numAmostra` int(11) DEFAULT NULL,
  `numAmostraCega` varchar(100) DEFAULT NULL,
  `dataCadastroE` date DEFAULT NULL,
  `horaCadastro` time DEFAULT NULL,
  `dataAmostra` date DEFAULT NULL,
  `tiposExames` varchar(255) DEFAULT NULL,
  `idFuncionario` int(11) DEFAULT NULL,
  `idPaciente` int(11) DEFAULT NULL,
  `idOrigem` int(11) DEFAULT NULL,
  `imprimir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `examesSolicitados`
--

INSERT INTO `examesSolicitados` (`idExamesSolicitados`, `numAmostra`, `numAmostraCega`, `dataCadastroE`, `horaCadastro`, `dataAmostra`, `tiposExames`, `idFuncionario`, `idPaciente`, `idOrigem`, `imprimir`) VALUES
(1, 230313001, '0', '2023-03-13', '17:09:54', '2023-03-13', 'a:1:{i:0;s:1:\"1\";}', 4, 1, 66, 0),
(2, 230314001, '0', '2023-03-15', '18:39:41', '2023-03-14', 'a:4:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"8\";i:3;s:2:\"11\";}', 4, 2, 334, 0),
(3, 230705001, '0', '2023-07-05', '18:01:02', '2023-07-05', '', 2, 3, 233, 0),
(4, 230705002, '0', '2023-07-05', '18:01:16', '2023-07-05', 'a:1:{i:0;s:1:\"3\";}', 2, 3, 233, 0),
(5, 230703001, '0', '2023-07-05', '18:02:50', '2023-07-03', '', 2, 4, 22, 0),
(6, 230703002, '0', '2023-07-05', '18:04:06', '2023-07-03', 'a:1:{i:0;s:1:\"2\";}', 2, 4, 22, 0),
(7, 230703003, '0', '2023-07-05', '18:11:34', '2023-07-03', '', 2, 5, 139, 0),
(8, 230703004, '0', '2023-07-05', '18:15:04', '2023-07-03', 'a:1:{i:0;s:1:\"2\";}', 2, 6, 139, 0),
(9, 230629001, '0', '2023-07-05', '18:16:27', '2023-06-29', 'a:1:{i:0;s:1:\"2\";}', 2, 7, 281, 0),
(10, 230629002, '0', '2023-07-05', '18:16:44', '2023-06-29', 'a:1:{i:0;s:1:\"2\";}', 2, 7, 281, 0),
(11, 230705003, '0', '2023-07-05', '18:27:32', '2023-07-05', 'a:1:{i:0;s:1:\"3\";}', 2, 8, 34, 0),
(12, 230705004, '0', '2023-07-05', '18:27:39', '2023-07-05', 'a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}', 2, 8, 34, 0),
(13, 230703005, '0', '2023-07-05', '18:33:27', '2023-07-03', 'a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}', 2, 9, 75, 0),
(14, 230712001, '0', '2023-07-12', '17:31:37', '2023-07-12', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}', 4, 1, 61, 0),
(15, 230717001, '0', '2023-07-17', '16:23:47', '2023-07-17', 'a:1:{i:0;s:1:\"2\";}', 2, 10, 75, 0),
(16, 230731001, '0', '2023-07-31', '16:43:21', '2023-07-31', 'a:1:{i:0;s:1:\"2\";}', 2, 12, 32, 0),
(17, 230731002, '0', '2023-07-31', '16:45:13', '2023-07-31', 'a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}', 2, 13, 212, 0),
(18, 220731001, '0', '2023-07-31', '16:46:54', '2022-07-31', 'a:1:{i:0;s:1:\"2\";}', 2, 14, 310, 0),
(19, 230731003, '0', '2023-08-02', '16:47:12', '2023-07-31', 'a:1:{i:0;s:1:\"2\";}', 2, 15, 75, 0),
(20, 230731004, '0', '2023-08-02', '16:48:30', '2023-07-31', 'a:1:{i:0;s:1:\"2\";}', 2, 16, 333, 0),
(21, 230731005, '0', '2023-08-02', '16:51:02', '2023-07-31', 'a:1:{i:0;s:1:\"2\";}', 2, 17, 36, 0),
(22, 230731006, '0', '2023-08-02', '16:52:38', '2023-07-31', 'a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}', 2, 18, 34, 0),
(23, 230731007, '0', '2023-08-02', '17:46:12', '2023-07-31', 'a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}', 2, 19, 34, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `examesSolicitados`
--
ALTER TABLE `examesSolicitados`
  ADD PRIMARY KEY (`idExamesSolicitados`),
  ADD KEY `idFuncionario` (`idFuncionario`),
  ADD KEY `idPaciente` (`idPaciente`),
  ADD KEY `idOrigem` (`idOrigem`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `examesSolicitados`
--
ALTER TABLE `examesSolicitados`
  MODIFY `idExamesSolicitados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `examesSolicitados`
--
ALTER TABLE `examesSolicitados`
  ADD CONSTRAINT `examesSolicitados_ibfk_1` FOREIGN KEY (`idFuncionario`) REFERENCES `funcionario` (`idFuncionario`),
  ADD CONSTRAINT `examesSolicitados_ibfk_2` FOREIGN KEY (`idPaciente`) REFERENCES `paciente` (`idPaciente`),
  ADD CONSTRAINT `examesSolicitados_ibfk_3` FOREIGN KEY (`idOrigem`) REFERENCES `origem` (`idOrigem`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
