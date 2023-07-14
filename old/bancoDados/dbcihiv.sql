-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 22/08/2022 às 12:25
-- Versão do servidor: 10.5.15-MariaDB-0+deb11u1
-- Versão do PHP: 8.0.21

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

-- --------------------------------------------------------

--
-- Estrutura para tabela `examesSolicitados`
--

CREATE TABLE `examesSolicitados` (
  `idExamesSolicitados` int(11) NOT NULL,
  `numAmostra` varchar(20) DEFAULT NULL,
  `dataAmostra` date DEFAULT NULL,
  `idPaciente` int(11) DEFAULT NULL,
  `idTipoExames` int(11) DEFAULT NULL,
  `idOrigem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idFuncionario` int(11) NOT NULL,
  `login` varchar(20) DEFAULT NULL,
  `senha` varchar(150) DEFAULT NULL,
  `nomeFuncionario` varchar(60) DEFAULT NULL,
  `status` varchar(8) DEFAULT NULL,
  `dataCadastro` date DEFAULT NULL,
  `idPermissoes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`idFuncionario`, `login`, `senha`, `nomeFuncionario`, `status`, `dataCadastro`, `idPermissoes`) VALUES
(1, 'administrador', '$2y$12$/nz/dju7PaMTU/lS16R6OOKOqBvL6WvGD1qzsZ56EW8Uvcnvdrtt.', 'administrador', 'ativo', NULL, 1);

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
(1, 'Teste Controle', '', 0, 'ativo'),
(2, 'Comtro Lab ( Controle de Proeficiência )', '', 1, 'ativo'),
(3, 'Aloysio Augusto Novis-007-CF-3.1', '3.1', 7, 'ativo'),
(4, 'Faim Pedro-008 -CF-5.1', '5.1', 8, 'ativo'),
(5, 'Mata Atlântica-16-CMS-4.0', '4.0', 16, 'ativo'),
(6, 'Santa Maria-17-CMS-4.0', '4.0', 17, 'ativo'),
(7, 'Cuibá-20-Serviço de Assist Esp', '', 20, 'ativo'),
(8, 'Hospital Lourenço Jorge-43', '', 43, 'ativo'),
(9, 'Hospital Municipal Lourenço Jorge-0043-4.0', '4.0', 43, 'ativo'),
(10, 'Hosp Nossa S Conceição-71 ', '', 71, 'ativo'),
(11, 'Hospital Municipal Salgado Filho-0107-3.2', '3.2', 107, 'ativo'),
(12, 'HOSPITAL NAVAL MARCILIO DIAS', '1.0', 110, 'ativo'),
(13, 'Everton de Souza Santos-116-CF-5.2', '5.2', 116, 'ativo'),
(14, 'Cesar Pernetta PAM Meier-124-CMS-3.2', '3.2', 124, 'ativo'),
(15, 'Carioca-127-SMS-CF-3.2', '3.2', 127, 'ativo'),
(16, 'Anna Nery-CF-0128-3.2', '3.2', 128, 'ativo'),
(17, 'Izabel dos Santos-0128-CF-3.2', '3.2', 128, 'ativo'),
(18, 'Emydio Costa Alves Filho-161-CF-3.2', '3.2', 161, 'ativo'),
(19, 'Herbet Jose de Souza-192-CF-3.2', '3.2', 192, 'ativo'),
(20, 'Centro de Saude e Ensino Lapa-247-SMS', '', 247, 'ativo'),
(21, 'Nelio de Oliveira-248-CF', '', 248, 'ativo'),
(22, 'Felippe Cardoso Dr.-259-CF-3.1', '3.1', 259, 'ativo'),
(23, 'Augusto Baul-260-CF-5.2', '5.2', 260, 'ativo'),
(24, 'Augusto Boal-260-CF-3.1', '3.1', 260, 'ativo'),
(25, 'Zilda Arns-265-CF-3.1', '3.1', 265, 'ativo'),
(26, 'Samora Machel-304-CMS-5.2', '5.2', 304, 'ativo'),
(27, 'Jose Breves dos Santos Dr.-305-CMS-3.1', '3.1', 305, 'ativo'),
(28, 'Iraci Lopes-310-CMS-3.1', '3.1', 310, 'ativo'),
(29, 'Oswaldo Cruz-351-CMS-4.0', '4.0', 351, 'ativo'),
(30, 'Parque União-368-CMS-3.1', '3.1', 368, 'ativo'),
(31, 'Gustavo Capanema-377-CF-3.1', '3.1', 377, 'ativo'),
(32, 'Hospital dos Servidores do Estado RJ-389', '1.0', 389, 'ativo'),
(33, 'Laboratorio de Imunologia-Fio Cruz-412-FioCruz', '', 412, 'ativo'),
(34, 'Hospital Univ Clement Fraga Filho', '3.1', 414, 'ativo'),
(35, 'Hospital Universitário Gaffree e Guinle-417', '1.0', 417, 'ativo'),
(36, 'Hospital São Francisco de Assis-418', '1.0', 418, 'ativo'),
(37, 'Hospital Universitário Pedro Ernesto-419', '3.3', 419, 'ativo'),
(38, 'Hospital Geral de Nova Iguaçu-420', '', 420, 'ativo'),
(39, 'Valter Felisbino de Souza-511-CF-4.0', '4.0', 511, 'ativo'),
(40, 'Hospital Eduardo Menezes-0513', '', 513, 'ativo'),
(41, 'Parque Royal-523-CMS-3.1', '3.1', 523, 'ativo'),
(42, 'Maria Cristina Roma Paugartten-527-CMS-3.1', '3.1', 527, 'ativo'),
(43, 'Victor Valla-528-CF-3.1', '3.1', 528, 'ativo'),
(44, 'Joao Candido-534-CMS-3.1', '3.1', 534, 'ativo'),
(45, 'Nagib Jorge Farah  Dr-555-CMS-3.1', '3.1', 555, 'ativo'),
(46, 'Santos Dumond -SMS- 565', '', 565, 'ativo'),
(47, 'Madre Teresa de Calcutá-567-CMS-3.1', '3.1', 567, 'ativo'),
(48, 'Assis Valente-568-CF-3.1', '3.1', 568, 'ativo'),
(49, 'Hosp Alcides Carneiro-572', '', 572, 'ativo'),
(50, 'Germano Sinval Faria-SMS FioCruz-596 -3.1', '3.1', 596, 'ativo'),
(51, 'Marcolino Candau -CMS- 598', '', 598, 'ativo'),
(52, 'Duque de Caxias-599-CMS', '', 599, 'ativo'),
(53, 'Jose Messias do Carmo-601-CMS', '', 601, 'ativo'),
(54, 'Lincoln de F Filho-Sta Cruz-602-CMS-5.3', '', 602, 'ativo'),
(55, 'Manuel Jose Ferreira-603-CF', '', 603, 'ativo'),
(56, 'Pindaro de Carvalho Rodrigues-0604-CMS', '', 604, 'ativo'),
(57, 'Belizario Penna Campo Grande-605-CMS-5.2', '5.2', 605, 'ativo'),
(58, 'Ariadne Lopes de Menezes-607-CMS-3.2', '3.2', 607, 'ativo'),
(59, 'Joao Barros Barreto-608-CMS', '', 608, 'ativo'),
(60, 'Necker Pinto-Ilha do Governador-609-CMS-3.1', '3.1', 609, 'ativo'),
(61, 'Milton Fontes Magarao-611-CMS-3.2', '3.2', 611, 'ativo'),
(62, 'Jose Paranhos Fontenelle  -CMS-  612', '', 612, 'ativo'),
(63, 'Americo Veloso-Ramos-613-CMS-3.1', '3.1', 613, 'ativo'),
(64, 'Ramos X RA-CMS- 613', '', 613, 'ativo'),
(65, 'Waldir Franco-Bangu-614-CMS-5.1', '5.1', 614, 'ativo'),
(66, 'Hospital do Exercito RJ-616', '', 616, 'ativo'),
(67, 'Carmela Dultra-0620-CMS-3.3', '3.3', 620, 'ativo'),
(68, 'Hospital Municipal Souza Aguiar', '1.0', 623, 'ativo'),
(69, 'Hospital Antonio Pedro-624-HUAP-UFF', '', 624, 'ativo'),
(70, 'Hospital Universitario Antonio Pedro-624', '', 624, 'ativo'),
(71, 'São Sebastiao-626-Ist Est de Inf', '', 626, 'ativo'),
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
(311, 'Hospital N.S.do Loreto 3.1', '3.1', NULL, 'ativo'),
(312, 'Manguinhos-CMS-3.1', '3.1', NULL, 'ativo');

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
  `dataCadastro` date DEFAULT NULL,
  `idFuncionario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `cadFucionario` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `permissoes`
--

INSERT INTO `permissoes` (`idPermissoes`, `gerenExames`, `verDadosPaciente`, `editarPaciente`, `cadPaciente`, `cadFucionario`) VALUES
(1, 'sim', 'não', 'não', 'não', 'sim');

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
(1, 'Sangue de devolvido', 'ativo'),
(2, 'CD4 / CD8', 'ativo'),
(3, 'Carga viral', 'ativo'),
(4, 'Teste de gravidez', 'ativo'),
(5, 'Separação de células', 'ativo'),
(6, 'Coleta para envio', 'ativo'),
(7, 'Outros', 'ativo'),
(8, 'HIV - Elisa', 'ativo'),
(9, 'HIV - W.Blot', 'ativo'),
(10, 'HTLV-1 Elisa', 'ativo'),
(11, 'HTLV-1 W.Blot', 'ativo'),
(12, 'Sifilis - VDRL / RPR', 'ativo'),
(13, 'Siflis - FTA-ABS', 'ativo'),
(14, 'Hepatite B', 'ativo'),
(15, 'GS HIV-1 W BLOT', 'ativo'),
(16, 'GENOTIPAGEM', 'ativo'),
(17, 'Carga Viral - Abbott', 'ativo'),
(18, 'Siflis - RPR', 'ativo'),
(19, 'CD4 / CD8 F Critério', 'ativo');

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
  ADD KEY `idPaciente` (`idPaciente`),
  ADD KEY `idTipoExames` (`idTipoExames`),
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
  MODIFY `idContato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idEndereco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `examesSolicitados`
--
ALTER TABLE `examesSolicitados`
  MODIFY `idExamesSolicitados` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `origem`
--
ALTER TABLE `origem`
  MODIFY `idOrigem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idPaciente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `permissoes`
--
ALTER TABLE `permissoes`
  MODIFY `idPermissoes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `examesSolicitados_ibfk_1` FOREIGN KEY (`idPaciente`) REFERENCES `paciente` (`idPaciente`),
  ADD CONSTRAINT `examesSolicitados_ibfk_2` FOREIGN KEY (`idTipoExames`) REFERENCES `tipoExames` (`idTipoExames`),
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
