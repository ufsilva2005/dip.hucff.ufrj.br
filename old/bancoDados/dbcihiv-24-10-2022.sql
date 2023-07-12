-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 24/10/2022 às 13:03
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
-- Estrutura para tabela `contato`
--

CREATE TABLE `contato` (
  `idContato` int(11) NOT NULL,
  `telefone` varchar(16) DEFAULT NULL,
  `celular` varchar(17) DEFAULT NULL,
  `possuiWhatsApp` varchar(3) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `idPaciente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `contato`
--

INSERT INTO `contato` (`idContato`, `telefone`, `celular`, `possuiWhatsApp`, `email`, `idPaciente`) VALUES
(1, '(21) 3497-07889', '(21) 98448-8549', 'não', 'vcd@hhg.hhg', 1),
(2, '(21) 3497-0789', '(21) 99122-8549', 'não', 'ufs@hucff.ufrj.br', 2),
(3, '(21) 3938-2895', '(21) 96589-8562', 'não', 'vcd@hhg.hhg', 3);

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
(3, 'RUA DO IMPERADOR', '120', '', 'CENTRO', 'PETRÓPOLIS', '25.620-000', 'RJ', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `examesSolicitados`
--

CREATE TABLE `examesSolicitados` (
  `idExamesSolicitados` int(11) NOT NULL,
  `numAmostra` int(11) DEFAULT NULL,
  `numAmostraCega` int(11) DEFAULT NULL,
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
-- Despejando dados para a tabela `examesSolicitados`
--

INSERT INTO `examesSolicitados` (`idExamesSolicitados`, `numAmostra`, `numAmostraCega`, `dataCadastroE`, `horaCadastro`, `dataAmostra`, `tiposExames`, `idFuncionario`, `idPaciente`, `idOrigem`, `imprimir`) VALUES
(1, 220927001, 0, '2022-09-27', '14:33:04', '2022-09-27', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}', 1, 2, 10, 1),
(2, 221014001, 0, '2022-10-14', '14:33:30', '2022-10-14', 'a:2:{i:0;s:1:\"1\";i:1;s:2:\"16\";}', 1, 3, 50, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idFuncionario` int(11) NOT NULL,
  `login` varchar(20) DEFAULT NULL,
  `senha` varchar(150) DEFAULT NULL,
  `nomeFuncionario` varchar(60) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `status` varchar(8) DEFAULT NULL,
  `dataCadastroF` date DEFAULT NULL,
  `idPermissoes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`idFuncionario`, `login`, `senha`, `nomeFuncionario`, `cpf`, `status`, `dataCadastroF`, `idPermissoes`) VALUES
(1, 'administrador', '$2y$12$/nz/dju7PaMTU/lS16R6OOKOqBvL6WvGD1qzsZ56EW8Uvcnvdrtt.', 'administrador', 'NULL', 'ativo', NULL, 1),
(2, 'ufs', '$2y$12$BonxC.NPU4oTir/nqLWtMudDhiJsARd5MR69cKbviEN5M/DxH0B66', 'ULISSES FERREIRA DA SILVA', '011.726.807-01', 'ativo', '2022-10-14', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `origem`
--

CREATE TABLE `origem` (
  `idOrigem` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `cap` varchar(10) DEFAULT NULL,
  `numOrigem` int(11) DEFAULT NULL,
  `statusOrigem` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `origem`
--

INSERT INTO `origem` (`idOrigem`, `descricao`, `cap`, `numOrigem`, `statusOrigem`) VALUES
(1, 'TESTE CONTROLE', '', 0, 'ativo'),
(2, 'COMTRO LAB ( CONTROLE DE PROEFICIÊNCIA )', '', 1, 'ativo'),
(3, 'ALOYSIO AUGUSTO NOVIS-007-CF-3.1', '3.1', 7, 'ativo'),
(4, 'FAIM PEDRO-008 -CF-5.1', '5.1', 8, 'ativo'),
(5, 'MATA ATLÂNTICA-16-CMS-4.0', '4.0', 16, 'ativo'),
(6, 'SANTA MARIA-17-CMS-4.0', '4.0', 17, 'ativo'),
(7, 'CUIBÁ-20-SERVIÇO DE ASSIST ESP', '', 20, 'ativo'),
(8, 'HOSPITAL LOURENÇO JORGE-43', '', 43, 'ativo'),
(9, 'HOSPITAL MUNICIPAL LOURENÇO JORGE-0043-4.0', '4.0', 43, 'ativo'),
(10, 'HOSP NOSSA S CONCEIÇÃO-71 ', '', 71, 'ativo'),
(11, 'HOSPITAL MUNICIPAL SALGADO FILHO-0107-3.2', '3.2', 107, 'ativo'),
(12, 'HOSPITAL NAVAL MARCILIO DIAS', '1.0', 110, 'ativo'),
(13, 'EVERTON DE SOUZA SANTOS-116-CF-5.2', '5.2', 116, 'ativo'),
(14, 'CESAR PERNETTA PAM MEIER-124-CMS-3.2', '3.2', 124, 'ativo'),
(15, 'CARIOCA-127-SMS-CF-3.2', '3.2', 127, 'ativo'),
(16, 'ANNA NERY-CF-0128-3.2', '3.2', 128, 'ativo'),
(17, 'IZABEL DOS SANTOS-0128-CF-3.2', '3.2', 128, 'ativo'),
(18, 'EMYDIO COSTA ALVES FILHO-161-CF-3.2', '3.2', 161, 'ativo'),
(19, 'HERBET JOSE DE SOUZA-192-CF-3.2', '3.2', 192, 'ativo'),
(20, 'CENTRO DE SAUDE E ENSINO LAPA-247-SMS', '', 247, 'ativo'),
(21, 'NELIO DE OLIVEIRA-248-CF', '', 248, 'ativo'),
(22, 'FELIPPE CARDOSO DR.-259-CF-3.1', '3.1', 259, 'ativo'),
(23, 'AUGUSTO BAUL-260-CF-5.2', '5.2', 260, 'ativo'),
(24, 'AUGUSTO BOAL-260-CF-3.1', '3.1', 260, 'ativo'),
(25, 'ZILDA ARNS-265-CF-3.1', '3.1', 265, 'ativo'),
(26, 'SAMORA MACHEL-304-CMS-5.2', '5.2', 304, 'ativo'),
(27, 'JOSE BREVES DOS SANTOS DR.-305-CMS-3.1', '3.1', 305, 'ativo'),
(28, 'IRACI LOPES-310-CMS-3.1', '3.1', 310, 'ativo'),
(29, 'OSWALDO CRUZ-351-CMS-4.0', '4.0', 351, 'ativo'),
(30, 'PARQUE UNIÃO-368-CMS-3.1', '3.1', 368, 'ativo'),
(31, 'GUSTAVO CAPANEMA-377-CF-3.1', '3.1', 377, 'ativo'),
(32, 'HOSPITAL DOS SERVIDORES DO ESTADO RJ-389', '1.0', 389, 'ativo'),
(33, 'LABORATORIO DE IMUNOLOGIA-FIO CRUZ-412-FIOCRUZ', '', 412, 'ativo'),
(34, 'HOSPITAL UNIV CLEMENT FRAGA FILHO', '3.1', 414, 'ativo'),
(35, 'HOSPITAL UNIVERSITÁRIO GAFFREE E GUINLE-417', '1.0', 417, 'ativo'),
(36, 'HOSPITAL SÃO FRANCISCO DE ASSIS-418', '1.0', 418, 'ativo'),
(37, 'HOSPITAL UNIVERSITÁRIO PEDRO ERNESTO-419', '3.3', 419, 'ativo'),
(38, 'HOSPITAL GERAL DE NOVA IGUAÇU-420', '', 420, 'ativo'),
(39, 'VALTER FELISBINO DE SOUZA-511-CF-4.0', '4.0', 511, 'ativo'),
(40, 'HOSPITAL EDUARDO MENEZES-0513', '', 513, 'ativo'),
(41, 'PARQUE ROYAL-523-CMS-3.1', '3.1', 523, 'ativo'),
(42, 'MARIA CRISTINA ROMA PAUGARTTEN-527-CMS-3.1', '3.1', 527, 'ativo'),
(43, 'VICTOR VALLA-528-CF-3.1', '3.1', 528, 'ativo'),
(44, 'JOAO CANDIDO-534-CMS-3.1', '3.1', 534, 'ativo'),
(45, 'NAGIB JORGE FARAH  DR-555-CMS-3.1', '3.1', 555, 'ativo'),
(46, 'SANTOS DUMOND -SMS- 565', '', 565, 'ativo'),
(47, 'MADRE TERESA DE CALCUTÁ-567-CMS-3.1', '3.1', 567, 'ativo'),
(48, 'ASSIS VALENTE-568-CF-3.1', '3.1', 568, 'ativo'),
(49, 'HOSP ALCIDES CARNEIRO-572', '', 572, 'ativo'),
(50, 'GERMANO SINVAL FARIA-SMS FIOCRUZ-596 -3.1', '3.1', 596, 'ativo'),
(51, 'MARCOLINO CANDAU -CMS- 598', '', 598, 'ativo'),
(52, 'DUQUE DE CAXIAS-599-CMS', '', 599, 'ativo'),
(53, 'JOSE MESSIAS DO CARMO-601-CMS', '', 601, 'ativo'),
(54, 'LINCOLN DE F FILHO-STA CRUZ-602-CMS-5.3', '', 602, 'ativo'),
(55, 'MANUEL JOSE FERREIRA-603-CF', '', 603, 'ativo'),
(56, 'PINDARO DE CARVALHO RODRIGUES-0604-CMS', '', 604, 'ativo'),
(57, 'BELIZARIO PENNA CAMPO GRANDE-605-CMS-5.2', '5.2', 605, 'ativo'),
(58, 'ARIADNE LOPES DE MENEZES-607-CMS-3.2', '3.2', 607, 'ativo'),
(59, 'JOAO BARROS BARRETO-608-CMS', '', 608, 'ativo'),
(60, 'NECKER PINTO-ILHA DO GOVERNADOR-609-CMS-3.1', '3.1', 609, 'ativo'),
(61, 'MILTON FONTES MAGARAO-611-CMS-3.2', '3.2', 611, 'ativo'),
(62, 'JOSE PARANHOS FONTENELLE  -CMS-  612', '', 612, 'ativo'),
(63, 'AMERICO VELOSO-RAMOS-613-CMS-3.1', '3.1', 613, 'ativo'),
(64, 'RAMOS X RA-CMS- 613', '', 613, 'ativo'),
(65, 'WALDIR FRANCO-BANGU-614-CMS-5.1', '5.1', 614, 'ativo'),
(66, 'HOSPITAL DO EXERCITO RJ-616', '', 616, 'ativo'),
(67, 'CARMELA DULTRA-0620-CMS-3.3', '3.3', 620, 'ativo'),
(68, 'HOSPITAL MUNICIPAL SOUZA AGUIAR', '1.0', 623, 'ativo'),
(69, 'HOSPITAL ANTONIO PEDRO-624-HUAP-UFF', '', 624, 'ativo'),
(70, 'HOSPITAL UNIVERSITARIO ANTONIO PEDRO-624', '', 624, 'ativo'),
(71, 'SÃO SEBASTIAO-626-IST EST DE INF', '', 626, 'ativo'),
(72, 'IPPMG/UFRJ-627', '', 627, 'ativo'),
(73, 'Neves-PAM-630', '', 630, 'ativo'),
(74, 'Piquet Carneiro-0633-Policlinica', '', 633, 'ativo'),
(75, 'Antonio Ribeiro Neto-0634-PAM-4.0', '4.0', 634, 'ativo'),
(76, 'Carlos Antonio da Silva-POL-636', '', 636, 'ativo'),
(77, 'Nilópolis-CMS- 639', '', 639, 'ativo'),
(78, 'SMS NILOPOLIS 639', '4.0', 639, 'ativo'),
(79, 'Nicola Albano-0689-CMS', '', 689, 'ativo'),
(80, 'Campos Eliseos-737-SAE DST', '', 737, 'ativo'),
(81, 'Matão-768-CS II', '', 768, 'ativo'),
(82, 'Maria Helena Ponpeu-794-AMI', '', 794, 'ativo'),
(83, 'Hospital São Luiz Gonzaga-926', '', 926, 'ativo'),
(84, 'Evandro Chagas-1019-Inst Pesq Clinica', '', 1019, 'ativo'),
(85, 'Fernandes Fiqueira-1020-FIOTEC IFF Inst', '', 1020, 'ativo'),
(86, 'Largo da Batalha-1030-Policlinica', '', 1030, 'ativo'),
(87, 'Hospital M Raphael de Paula Souza-HMRPS-1031-4.0', '4.0', 1031, 'ativo'),
(88, 'Hospital Municipal Raphael de Paula Souza-1031', '4.0', 1031, 'ativo'),
(89, 'Heitor Beltao-1032-CMS-2.2', '2.2', 1032, 'ativo'),
(90, 'MARIA AUGUSTA ESTRELLA-1033-CMS', '1.0', 1033, 'ativo'),
(91, 'Jorge Saldanha Bandeira de Mello-1034-CMS-4.0', '4.0', 1034, 'ativo'),
(92, 'Casa Dia-1039', '', 1039, 'ativo'),
(93, 'Palhoça-Ambulatorio de DST/Aids-1062', '', 1062, 'ativo'),
(94, 'Hospital Cardoso Fontes-1067', '', 1067, 'ativo'),
(95, 'SMS MARICA 1069', '4.0', 1069, 'ativo'),
(96, 'Alberto Borgeth-1109-PAM Policlinica -3.3', '3.3', 1109, 'ativo'),
(97, 'Hospital Santa Casa de Misericordia-1114', '1.0', 1114, 'ativo'),
(98, 'Helio Pellegrino-1124-Policlinica 2.2', '2.2', 1124, 'ativo'),
(99, 'Clementino Fraga XIV-1126-CMS-5.3', '5.3', 1126, 'ativo'),
(100, 'Centro d Testagem e Aconcelhamento-1149', '', 1149, 'ativo'),
(101, 'Petropólis -1240-SMS', '', 1240, 'ativo'),
(102, 'Nova Friburgo -1245-PAM', '', 1245, 'ativo'),
(103, 'Dr Luiz Gonzaga-1247-CDI', '', 1247, 'ativo'),
(104, 'Tres Rios -1250-SMS', '', 1250, 'ativo'),
(105, 'Mage-1272-SMS', '', 1272, 'ativo'),
(106, 'Petropólis -1278-CMS', '', 1278, 'ativo'),
(107, 'Lapa-1291-CF', '', 1291, 'ativo'),
(108, 'Vasco Barcelos-Centro de Saude Dr.-1314', '', 1314, 'ativo'),
(109, 'Euphrasio Jose Rodrigues DR-1356-CMS', '', 1356, 'ativo'),
(110, 'Serviço de Assist Esp de Boa Vista RR-1439', '', 1439, 'ativo'),
(111, 'Instituto Assitencia Servidor do RJ-1460', '', 1460, 'ativo'),
(112, 'Teresopolis-1476-CMS', '', 1476, 'ativo'),
(113, 'Nova Friburgo -1479-CMS', '', 1479, 'ativo'),
(114, 'Barra Mansa-1482 -CMS', '', 1482, 'ativo'),
(115, 'Posto Belfor roxo-1483', '', 1483, 'ativo'),
(116, 'Cabo Frio-1485-SMS', '', 1485, 'ativo'),
(117, 'Itaguai -1488-PC-SMS', '', 1488, 'ativo'),
(118, 'Itatiaia-1490-CMS', '', 1490, 'ativo'),
(119, 'Miguel Pereira-1493-CMS', '', 1493, 'ativo'),
(120, 'Valença-1503-CMS', '', 1503, 'ativo'),
(121, 'Resende-1504-CMS', '', 1504, 'ativo'),
(122, 'Vassouras-1504-CMS', '', 1504, 'ativo'),
(123, 'Volta Redonda-1505-CMS', '', 1505, 'ativo'),
(124, 'Hospital  Municipal Piedade-1518', '', 1518, 'ativo'),
(125, 'Hospital Penal Desipe RJ-1526', '', 1526, 'ativo'),
(126, 'Cachoeira de Macacu-1625-SMS', '', 1625, 'ativo'),
(127, 'Hospital Municipail Paulino Werneck-1626-3.0', '3.0', 1626, 'ativo'),
(128, 'NECKER PINTO – ILHA DO GOVERN-1648-CMS -3.1', '3.1', 1648, 'ativo'),
(129, 'Enesto Zeferino Tibau Jr-1654-CMS', '1.0', 1654, 'ativo'),
(130, 'Antonio Pinheiro Cavalcante-1690', '', 1690, 'ativo'),
(131, 'QUEIMADOS 1753', '4.0', 1753, 'ativo'),
(132, 'HOSPITAL MUNICIPAL JESUS 1813', '4.0', 1813, 'ativo'),
(133, 'Jose Paranhos Fontenelle-1816-Policlínica 3.1', '3.1', 1816, 'ativo'),
(134, 'Hospital Santa Maria-1847', '', 1847, 'ativo'),
(135, 'Teresopolis-1893-SMS', '', 1893, 'ativo'),
(136, 'Hospital Naval Marcilio Dias-1977', '', 1977, 'ativo'),
(137, 'Conjunto Penitencial de Valença-2187', '', 2187, 'ativo'),
(138, 'SEMAE SERVIÇO M DE ASSISTENCIA ESPECIALIZADA-BA', '', 2195, 'ativo'),
(139, 'Newton Bethlem-2350-Policlínica-4.0', '4.0', 2350, 'ativo'),
(140, 'Hospital São Francisco na Providencia de Deus-2421', '', 2421, 'ativo'),
(141, 'Rodolpho Rocco-2431-Policlinica 3.2', '3.2', 2431, 'ativo'),
(142, 'Newton Alves Cardoso-2565-Policlínica-3.1', '3.1', 2565, 'ativo'),
(143, 'Dr Sylvio Henrique Braune-2566-Policlinica', '', 2566, 'ativo'),
(144, 'Adão Pereira Nunes-2680-CMS-5.2', '5.2', 2680, 'ativo'),
(145, 'Mário Rodrigues Cid Dr.-2681-CMS-5.2', '5.2', 2681, 'ativo'),
(146, 'Garfield de Almeida Dr.-2682-CMS-5.2', '5.2', 2682, 'ativo'),
(147, 'Edgard Magalhaes Gomes Prof. 2683-CMS-5.2', '5.2', 2683, 'ativo'),
(148, 'Savio Antunes Prof.-2684-CMS-5.3', '5.3', 2684, 'ativo'),
(149, 'Cattapreta-2685-CMS-5.3', '5.3', 2685, 'ativo'),
(150, 'Waldemar Berardinelli-2686-CMS-5.3', '5.3', 2686, 'ativo'),
(151, 'Cyro de Mello Manguariba-2687-CMS -5.3', '5.3', 2687, 'ativo'),
(152, 'Antônio Gonçalves Villa Sobrinho-2688-CF-5.2', '5.2', 2688, 'ativo'),
(153, 'Helande de Mello Gonçalves-2689-CF 5.3', '5.3', 2689, 'ativo'),
(154, 'Lenice Maria M. Coelho-2690-CF-5.3', '5.3', 2690, 'ativo'),
(155, 'Carlos Alberto do Nascimento-2691-Polc 5.2', '5.2', 2691, 'ativo'),
(156, 'Masão Goto Professor-2694-CMS-5.1', '5.1', 2694, 'ativo'),
(157, 'Eithel Pinheiro de Oliveira Lima Dr.-2695-CMS  5.1', '5.1', 2695, 'ativo'),
(158, 'Jose Antoni Ciraudo-2696-CF -5.3', '5.3', 2696, 'ativo'),
(159, 'Ruy da Costa Leite Dr.-2697-CMS-5.3', '5.3', 2697, 'ativo'),
(160, 'Emydio Cabral-2698-CMS-5.3', '5.3', 2698, 'ativo'),
(161, 'Sergio Arouca-2700-CF 5.3', '5.3', 2700, 'ativo'),
(162, 'Sílvio Barbosa Dr.-2701-CMS-5.1', '5.1', 2701, 'ativo'),
(163, 'Hans Jurgen Fernando Dohmann Dr.-2702-CF-5.2', '5.2', 2702, 'ativo'),
(164, 'Mourão Filho-2703-CMS-5.2', '5.2', 2703, 'ativo'),
(165, 'Lourenço de Mello-2704-CF-5.3', '5.3', 2704, 'ativo'),
(166, 'Ilzo Motta de Melo-2708-CF-5.3', '5.3', 2708, 'ativo'),
(167, 'Adelino Simões Nova Sepetiba-2709-CMS-5.3', '5.3', 2709, 'ativo'),
(168, 'Kelly Cristina de Sá Lacerda Silva-2711-CF-5.1', '5.1', 2711, 'ativo'),
(169, 'Oswaldo Vilella Dr.-2713-CMS-5.2', '5.2', 2713, 'ativo'),
(170, 'Rogerio Rocco Dr.-2714-CF-5.2', '5.2', 2714, 'ativo'),
(171, 'Jose de Paula Lopes Pontes Dr.-2715-CF-5.2', '5.2', 2715, 'ativo'),
(172, 'Olimpia Esteves-2717-CF-5.1', '5.1', 2717, 'ativo'),
(173, 'Henrique Monat Dr.-2721-CMS-5.1', '5.1', 2721, 'ativo'),
(174, 'Sergio Nicolau Amin-2722-CF-3.2', '3.2', 2722, 'ativo'),
(175, 'Padre John Cribbin-2723-CF-5.1', '5.1', 2723, 'ativo'),
(176, 'Padre Miguel-2725 -CMS-5.1', '5.1', 2725, 'ativo'),
(177, 'Maia Bittencourt-2728-CMS-5.2', '5.2', 2728, 'ativo'),
(178, 'Souza Marques-CF-2729', '', 2729, 'ativo'),
(179, 'Ana Macia Conceicao dos S C-2731-CF-3.1', '3.1', 2731, 'ativo'),
(180, 'Ana Maria Conceição dos Santos Correia-2731-CF-3.1', '3.1', 2731, 'ativo'),
(181, 'Deolindo Couto-2734-CF-5.3', '5.3', 2734, 'ativo'),
(182, 'Nascimento Gurgel-2735-CMS-3.3', '3.3', 2735, 'ativo'),
(183, 'Izabel dos Santos-2737-CF-3.2', '3.2', 2737, 'ativo'),
(184, 'Barbara Starfield-2738-CF-3.2', '3.2', 2738, 'ativo'),
(185, 'Alvimar de Carvalho Dr.-2740-CMS-5.2', '5.2', 2740, 'ativo'),
(186, 'Manoel de Abreu Professor-2741-CMS-5.2', '5.2', 2741, 'ativo'),
(187, 'Vila do Céu-2742-CMS-5.2', '5.2', 2742, 'ativo'),
(188, 'Ernani de Paiva Ferreira Braga-2743-CF-5.3', '5.3', 2743, 'ativo'),
(189, 'Vila Moretti-2744-CMS', '', 2744, 'ativo'),
(190, 'Joao Batista Chagas-2747-CMS-5.3', '5.3', 2747, 'ativo'),
(191, 'Maria Aparecida de Almeida Drª-2748-CMS-5.3', '5.3', 2748, 'ativo'),
(192, 'Maria de Azevedo Rodrigues-2757-CF-5.1', '5.1', 2757, 'ativo'),
(193, 'Manoel Fernandes de Araujo-2759-CF', '', 2759, 'ativo'),
(194, 'Dante Romano Junior-2760-CF', '', 2760, 'ativo'),
(195, 'Raul Barroso-2763-CMS-5.2', '5.2', 2763, 'ativo'),
(196, 'Alkindar Soares Pereira Filho-2764-CF 5.2', '5.2', 2764, 'ativo'),
(197, 'Ana Gonzaga-2765-CMS-5.2', '5.2', 2765, 'ativo'),
(198, 'Jamil Haddad-2766-CF-5.3', '5.3', 2766, 'ativo'),
(199, 'Aloysio Amâncio da Silva-2767-CMS-5.3', '5.3', 2767, 'ativo'),
(200, 'Vila São Jorge-2768-CMS-5.2', '5.2', 2768, 'ativo'),
(201, 'Decio Amaral Filho Dr.-2770-CMS-5.3', '5.3', 2770, 'ativo'),
(202, 'Cabo Edney Canazaro de Oliveira-2771-CF-3.2', '3.2', 2771, 'ativo'),
(203, 'Familia Tia Alice-2772-CMS-3.2', '3.2', 2772, 'ativo'),
(204, 'Eduardo Araujo Vilhena leite Dr. 2773-CMS-3.2', '3.2', 2773, 'ativo'),
(205, 'Harvey Ribeiro de Souza Filho-2777-CMS-4.0', '4.0', 2777, 'ativo'),
(206, 'Valdecir Salustiano Cardozo-2787-CF-5.2', '5.2', 2787, 'ativo'),
(207, 'Cesario de Mello-2788-CMS-5.3', '5.3', 2788, 'ativo'),
(208, 'Sonia Maria Ferreira Machado-2789-CF-5.2', '5.2', 2789, 'ativo'),
(209, 'Bua Boanerges Borges da Fonseca-2790-CMS-5.1', '5.1', 2790, 'ativo'),
(210, 'Otto Alves de Carvalho-2791-CF-4.0', '4.0', 2791, 'ativo'),
(211, 'Edson Abdalla Saad-2792-CF-5.3', '5.3', 2792, 'ativo'),
(212, 'Hamilton Land-2793-CMS-4.0', '4.0', 2793, 'ativo'),
(213, 'Ernesto Zeferino Tibaú Jr.-2794-CMS-4.0', '4.0', 2794, 'ativo'),
(214, 'Padre Jose de Azevedo Tiúba-2798-CF-4.0', '4.0', 2798, 'ativo'),
(215, 'Carlos Gentille de Mello Dr-2799-CMS-3.2', '3.2', 2799, 'ativo'),
(216, 'Dalmir de Abreu Salgado Dr.-2800-CF-5.2', '5.2', 2800, 'ativo'),
(217, 'Agenor de Miranda Araujo Neto-2801-CF-5.2', '5.2', 2801, 'ativo'),
(218, 'Catiri-2802-CMS-5.1', '5.1', 2802, 'ativo'),
(219, 'Pedro Nava Dr.-2804-CMS-5.2', '5.2', 2804, 'ativo'),
(220, 'Samuel Penha Valle-2805-CMS', '', 2805, 'ativo'),
(221, 'Sanuel Penha Valle-2805-CF 5.3', '5.3', 2805, 'ativo'),
(222, 'Aguiar Torres-2806-CMS-5.2', '5.2', 2806, 'ativo'),
(223, 'Canal do Anil-2807-CMS-4.0', '4.0', 2807, 'ativo'),
(224, 'Athayde José da Fonseca-2808-CMS-5.1', '5.1', 2808, 'ativo'),
(225, 'Mario Victor de Assi Pacheco-2816-CMS-5.2', '5.2', 2816, 'ativo'),
(226, 'Alexander Fleming-2817-CMS-5.1', '5.1', 2817, 'ativo'),
(227, 'Flavio do Couto Vieira Dr.-2819-CMS-5.1', '5.1', 2819, 'ativo'),
(228, 'Mario Olito de Oliveira -CMS -2826', '', 2826, 'ativo'),
(229, 'Mario Pinto de Oliveira -CMS- 2826', '', 2826, 'ativo'),
(230, 'Valéria Gomes Esteves-2827-CF 5.3', '5.3', 2827, 'ativo'),
(231, 'Rosino Baccarini-2830-CF-5.1', '5.1', 2830, 'ativo'),
(232, 'Fiorello Raymundo-2831-CF-5.1', '5.1', 2831, 'ativo'),
(233, 'Nildo Eymar de Almeida Aguiar-2835-CF-5.1', '5.1', 2835, 'ativo'),
(234, 'Antonio Gonçalves da Silva-2836-CF-5.1', '5.1', 2836, 'ativo'),
(235, 'Antenor Nascentes Prof-2841-CMS-3.2', '3.2', 2841, 'ativo'),
(236, 'Anthidio Dias da Silveira-2842-CF-3.2', '3.2', 2842, 'ativo'),
(237, 'Maria Sebastiana de Oliveira-2853-CF-3.1', '3.1', 2853, 'ativo'),
(238, 'Bibi Vogel-2860-CF-3.2', '3.2', 2860, 'ativo'),
(239, 'Cecília Donnangelo-2863-CMS-4.0', '4.0', 2863, 'ativo'),
(240, 'Joaosinho Trinta-2868-CF-3.1', '3.1', 2868, 'ativo'),
(241, 'Dom Helder Camara-2870-CMS-2.1', '2.1', 2870, 'ativo'),
(242, 'Manoel Guilherme da Silveira Filho-2871-CMS-5.1', '5.1', 2871, 'ativo'),
(243, 'Hospital Federal Andarai-2873-5.2', '5.2', 2873, 'ativo'),
(244, 'Armando Palhares-2879-CF-5.1', '5.1', 2879, 'ativo'),
(245, 'Woodrow Pimentel Pantoja Dr.-2882 -CMS-5.2', '5.2', 2882, 'ativo'),
(246, 'Curicica-2963-CMS-4.0', '4.0', 2963, 'ativo'),
(247, 'Novo Palmares-2964-CMS-4.0', '4.0', 2964, 'ativo'),
(248, 'Itanhangá-2965-CMS 4.0', '4.0', 2965, 'ativo'),
(249, 'Maury Alves de Pinho-2966-CF-4.0', '4.0', 2966, 'ativo'),
(250, 'Renato Rocco Dr.-4122-CMS-3.2', '3.2', 4122, 'ativo'),
(251, 'Carlos Alberto Nascimento-4518-CMS-5.2', '5.2', 4518, 'ativo'),
(252, 'David Capistrano Filho Dr.-4520-CF-5.2', '5.2', 4520, 'ativo'),
(253, 'Hospital Maternidade-4975-Escola -UFRJ', '', 4975, 'ativo'),
(254, 'Rodrigo Yamawaki Aguilar Roig-7684-CF-3.1', '3.1', 7684, 'ativo'),
(255, 'Marcos Valadão-7713-CF-3.1', '3.1', 7713, 'ativo'),
(256, 'Mário Dias Alencar-7720-CF-5.1', '5.1', 7720, 'ativo'),
(257, 'Nova Holanda- 8815-CMS-3.1', '3.1', 8815, 'ativo'),
(258, 'Floripes Galdino Pereira Enfª-9026-CMS-5.3', '5.3', 9026, 'ativo'),
(259, 'Vila do João-9044-CMS-3.1', '3.1', 9044, 'ativo'),
(260, 'Heitor dos Prazeres-9301-CF-3.1', '3.1', 9301, 'ativo'),
(261, 'Clínica Jabour-9415', '', 9415, 'ativo'),
(262, 'Jabour-9415-CF-5.1', '5.1', 9415, 'ativo'),
(263, 'Alemão-9476-CMS-3.1', '3.1', 9476, 'ativo'),
(264, 'Fernando Antonio Braga Lopes-9488-CMS', '', 9488, 'ativo'),
(265, 'Maria Jose de Sousa Barbosa-9620-CF-5.1', '5.1', 9620, 'ativo'),
(266, 'Dona Zica CF-12248', '3.2', 12248, 'ativo'),
(267, 'Sandra Regina Sampaio de Souza-12689-CF-5.1', '5.1', 12689, 'ativo'),
(268, 'Helio Smidt-12818-CMS-3.1', '3.1', 12818, 'ativo'),
(269, 'Wilson de Mello Santos-12864-CF-5.1', '5.1', 12864, 'ativo'),
(270, 'SALLES NETTO-12999-CMS', '', 12999, 'ativo'),
(271, 'Fundação Osvaldo Cruz-13026', '', 13026, 'ativo'),
(272, 'Isabela Severo da Silva-13081-CF-5.2', '5.2', 13081, 'ativo'),
(273, 'São Godofredo-13119-CMS-3.1', '3.1', 13119, 'ativo'),
(274, 'Ambulatorio da Providencia-13291', '1.0', 13291, 'ativo'),
(275, 'Jose de Souza Herdy-13314-CF-4.0', '4.0', 13314, 'ativo'),
(276, 'Adib Jatene-13338-CF-3.1', '3.1', 13338, 'ativo'),
(277, 'Alice de Jesus Rego-13342-CF 5.3', '5.3', 13342, 'ativo'),
(278, 'Helena Besserman Vianna-13471-CF-4.0', '4.0', 13471, 'ativo'),
(279, 'Barbara Mosley de Souza-14289-CF-4.0', '4.0', 14289, 'ativo'),
(280, 'Paulino Werneck-15178-CMS 3.1', '3.1', 15178, 'ativo'),
(281, 'Eidimir Thiago de Souza-15436-CF-3.1', '3.1', 15436, 'ativo'),
(282, 'Lecy Ranquine-Campo Grande-15437-CF-5.2', '5.2', 15437, 'ativo'),
(283, 'Luiz Célio Pereira-15565-CF-3.2', '3.2', 15565, 'ativo'),
(284, 'Nilda Campos de Lima-17345-CF-3.1', '3.1', 17345, 'ativo'),
(285, 'Maicon Siqueira-17347-CF-4.0', '4.0', 17347, 'ativo'),
(286, 'Olga Pereira Pacheco-17348-CF-3.2', '3.2', 17348, 'ativo'),
(287, 'Aderson Fernandes-17462-CF-3.3', '3.3', 17462, 'ativo'),
(288, 'Medalhista Olímpico Arthur Zanetti-17500-CF -5.2', '5.2', 17500, 'ativo'),
(289, 'Medalhista Olímpico Bruno Schimidt-17501-CF-5.2', '5.2', 17501, 'ativo'),
(290, 'Álvaro Ramos-17570-CMS-4.0', '4.0', 17570, 'ativo'),
(291, 'Raphael de Paula Souza-17571-CMS-4.0', '4.0', 17571, 'ativo'),
(292, 'Cypriano das Chagas Medeiros-17591-CF', '', 17591, 'ativo'),
(293, 'Rogerio Pinto da Mota-17621-CF-5.1', '5.1', 17621, 'ativo'),
(294, 'Wilma Costa-17652-CF-3.1', '3.1', 17652, 'ativo'),
(295, 'MEDALHISTA MAURICIO SILVA  17940', '1.0', 17940, 'ativo'),
(296, 'Klebel de Oliveira Rocha-17983-CF-3.1', '3.1', 17983, 'ativo'),
(297, 'Gerson Bergher-18050 ou 18049-CF-4.0', '4.0', 18050, 'ativo'),
(298, 'Erivaldo Fernandes Nobrega-18068-CF-3.2', '3.2', 18068, 'ativo'),
(299, 'Amelia dos Santos Ferreira-18209-CMS -3.2', '3.2', 18209, 'ativo'),
(300, 'Newton Alves Cardoso-19921-CMS-3.1', '3.1', 19921, 'ativo'),
(301, 'Maria Jose Papera de Azevedo-20419-CF 5.3', '5.3', 20419, 'ativo'),
(302, 'Romulo Carlos Teixeira -20662-CF-5.1', '5.1', 20662, 'ativo'),
(303, 'Diniz Batista dos Santos-21833-CF 3.1', '3.1', 21833, 'ativo'),
(304, 'Jeremias Moraes da Silva-21928-CF-3.1', '3.1', 21928, 'ativo'),
(305, 'Jose Neves-23085-SMS-CF-4.0', '4.0', 23085, 'ativo'),
(306, 'Dr Myrtes Amoreli Gonzaga-24529-CF', '5.2', 24529, 'ativo'),
(307, 'Myrtes Amorelli-CF-24529', '', 24529, 'ativo'),
(308, 'Cristiani Vieira Pinho-CF-25142', '5.1', 25142, 'ativo'),
(309, 'Lourival Francisco de Oliveira-CF-25143', '', 25143, 'ativo'),
(310, 'Padre Marcos Vinicio Miranda Vieira-CF-25279', '', 25279, 'ativo'),
(311, 'HOSPITAL N.S.DO LORETO 3.1', '3.1', 0, 'ativo'),
(312, 'MANGUINHOS-CMS-3.1', '3.1', 0, 'ativo');

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
(1, 'ULISSES', '123', 'não', '123456', '011.726.807-01', 'Masculino', '', '', '', '', '2022-09-02', 1, NULL, NULL),
(2, 'FERREIRA', '123456', 'não', '7891011', '011.726.807-01', 'Masculino', '', '', '', '', NULL, 1, '0000-00-00', 0),
(3, 'SUZANA VIRGINIO', '123456', 'não', '1234', '009.569.527-39', 'Feminino', '', '', '', '', '2022-10-14', 1, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `permissoes`
--

CREATE TABLE `permissoes` (
  `idPermissoes` int(11) NOT NULL,
  `gerenExames` varchar(4) DEFAULT NULL,
  `verDadosPaciente` varchar(4) DEFAULT NULL,
  `editarPaciente` varchar(4) DEFAULT NULL,
  `cadPaciente` varchar(4) DEFAULT NULL,
  `cadFucionario` varchar(4) DEFAULT NULL,
  `administrador` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `permissoes`
--

INSERT INTO `permissoes` (`idPermissoes`, `gerenExames`, `verDadosPaciente`, `editarPaciente`, `cadPaciente`, `cadFucionario`, `administrador`) VALUES
(1, 'sim', 'não', 'não', 'não', 'sim', 'sim'),
(2, 'sim', 'sim', 'sim', 'sim', 'não', 'não'),
(3, 'sim', 'sim', 'sim', 'sim', 'sim', 'sim'),
(4, 'sim', 'sim', 'não', 'sim', 'não', 'não');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipoExames`
--

CREATE TABLE `tipoExames` (
  `idTipoExames` int(11) NOT NULL,
  `tipoExame` varchar(255) DEFAULT NULL,
  `statusExame` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tipoExames`
--

INSERT INTO `tipoExames` (`idTipoExames`, `tipoExame`, `statusExame`) VALUES
(1, 'SANGUE DEVOLVIDO', 'ativo'),
(2, 'CD4 / CD8', 'ativo'),
(3, 'CARGA VIRAL', 'inativo'),
(4, 'TESTE DE GRAVIDEZ', 'ativo'),
(5, 'SEPARAÇÃO DE CÉLULAS', 'inativo'),
(6, 'COLETA PARA ENVIO', 'inativo'),
(7, 'OUTROS', 'inativo'),
(8, 'HIV - ELISA', 'inativo'),
(9, 'HIV - W.BLOT', 'ativo'),
(10, 'HTLV-1 ELISA', 'ativo'),
(11, 'HTLV-1 W.BLOT', 'ativo'),
(12, 'SIFILIS - VDRL / RPR', 'ativo'),
(13, 'SIFLIS - FTA-ABS', 'ativo'),
(14, 'HEPATITE B', 'ativo'),
(15, 'GS HIV-1 W BLOT', 'ativo'),
(16, 'GENOTIPAGEM', 'inativo'),
(17, 'CARGA VIRAL - ABBOTT', 'inativo'),
(18, 'SIFLIS - RPR', 'inativo'),
(19, 'CD4 / CD8 F CRITÉRIO', 'inativo');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`idContato`),
  ADD KEY `idPaciente` (`idPaciente`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idEndereco`),
  ADD KEY `idPaciente` (`idPaciente`);

--
-- Índices de tabela `examesSolicitados`
--
ALTER TABLE `examesSolicitados`
  ADD PRIMARY KEY (`idExamesSolicitados`),
  ADD KEY `idFuncionario` (`idFuncionario`),
  ADD KEY `idPaciente` (`idPaciente`),
  ADD KEY `idOrigem` (`idOrigem`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idFuncionario`),
  ADD KEY `idPermissoes` (`idPermissoes`);

--
-- Índices de tabela `origem`
--
ALTER TABLE `origem`
  ADD PRIMARY KEY (`idOrigem`);

--
-- Índices de tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`idPaciente`),
  ADD KEY `idFuncionario` (`idFuncionario`);

--
-- Índices de tabela `permissoes`
--
ALTER TABLE `permissoes`
  ADD PRIMARY KEY (`idPermissoes`);

--
-- Índices de tabela `tipoExames`
--
ALTER TABLE `tipoExames`
  ADD PRIMARY KEY (`idTipoExames`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `idContato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idEndereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `examesSolicitados`
--
ALTER TABLE `examesSolicitados`
  MODIFY `idExamesSolicitados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `origem`
--
ALTER TABLE `origem`
  MODIFY `idOrigem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idPaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `permissoes`
--
ALTER TABLE `permissoes`
  MODIFY `idPermissoes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tipoExames`
--
ALTER TABLE `tipoExames`
  MODIFY `idTipoExames` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `contato`
--
ALTER TABLE `contato`
  ADD CONSTRAINT `contato_ibfk_1` FOREIGN KEY (`idPaciente`) REFERENCES `paciente` (`idPaciente`);

--
-- Restrições para tabelas `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`idPaciente`) REFERENCES `paciente` (`idPaciente`);

--
-- Restrições para tabelas `examesSolicitados`
--
ALTER TABLE `examesSolicitados`
  ADD CONSTRAINT `examesSolicitados_ibfk_1` FOREIGN KEY (`idFuncionario`) REFERENCES `funcionario` (`idFuncionario`),
  ADD CONSTRAINT `examesSolicitados_ibfk_2` FOREIGN KEY (`idPaciente`) REFERENCES `paciente` (`idPaciente`),
  ADD CONSTRAINT `examesSolicitados_ibfk_3` FOREIGN KEY (`idOrigem`) REFERENCES `origem` (`idOrigem`);

--
-- Restrições para tabelas `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`idPermissoes`) REFERENCES `permissoes` (`idPermissoes`);

--
-- Restrições para tabelas `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`idFuncionario`) REFERENCES `funcionario` (`idFuncionario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
