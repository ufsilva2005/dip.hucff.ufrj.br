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
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `idEndereco` int(11) NOT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `numero` varchar(6) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `uf` varchar(30) DEFAULT NULL,
  `idPaciente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `endereco`
--

INSERT INTO `endereco` (`idEndereco`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `cep`, `uf`, `idPaciente`) VALUES
(1, 'RUA MONTE AZUL', '0', 'LOTE 4 QUADRA 21', 'CAMPO GRANDE', 'RIO DE JANEIRO', '23.071-000', 'RJ', 1),
(2, 'RUA MONTE AZUL', '0', 'LOTE 4 QUDARA 21', 'CAMPO GRANDE', 'RIO DE JANEIRO', '23.071-000', 'RJ', 2),
(3, 'RUA ANTENOR', '120', '', 'SANTA CRUZ', 'RIO DE JANEIRO', '23.520-120', 'RJ', 3),
(4, 'PRAÇA AUGUSTO MONTE TEIXEIRA', '120', '', 'SANTA CRUZ', 'RIO DE JANEIRO', '23.560-000', 'RJ', 6),
(5, 'RUA CORONEL BATISTA DA SILVA', '26', '', 'MORIN', 'PETRÓPOLIS', '25.630-000', 'RJ', 7),
(6, 'TRAVESSA CARDINA', '23', '', 'SÃO MATEUS', 'SÃO JOÃO DE MERITI', '25.520-000', 'RJ', 8);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idEndereco`),
  ADD KEY `idPaciente` (`idPaciente`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idEndereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`idPaciente`) REFERENCES `paciente` (`idPaciente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
