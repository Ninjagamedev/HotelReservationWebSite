-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Jun-2020 às 18:53
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pap`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alojamento`
--

CREATE TABLE `alojamento` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Categoria` varchar(50) NOT NULL,
  `Cidade` varchar(40) NOT NULL,
  `Pais` varchar(50) NOT NULL,
  `Descricao` text NOT NULL,
  `Morada` varchar(50) NOT NULL,
  `Preco` int(11) NOT NULL,
  `Classificacao` int(11) NOT NULL,
  `Thumbnail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alojamento`
--

INSERT INTO `alojamento` (`ID`, `Nome`, `Categoria`, `Cidade`, `Pais`, `Descricao`, `Morada`, `Preco`, `Classificacao`, `Thumbnail`) VALUES
(98, 'Four Seasons', 'Hotel', 'Lisboa', 'PORTUGAL', 'Em frente ao Parque Eduardo VII, este hotel luxuoso fica a 5 minutos a pé da estação de metro Marquês de Pombal e a 2 km da Praça do Rossio.\r\nOs quartos e suites de luxo dispõem de Wi-Fi grátis, TV de ecrã plano, minibar e produtos de higiene pessoal de marca. A maioria das unidades inclui varanda com vista panorâmica para a cidade. Serviço de quartos disponível. As crianças com idade igual ou inferior a 18 anos têm direito a alojamento gratuito quando acompanhadas por um adulto.\r\n\r\nInclui um restaurante, um bar de verão com esplanada e um café, bem como um ginásio e uma zona de spa com piscina interior. O pequeno-almoço tem um custo adicional. Estacionamento disponível.\r\n\r\nHora de Check-In: 13:00-17:30\r\nHora de Check-Out: 08:30-12:00\r\n                    ', 'R. Rodrigo da Fonseca 88, 1099-039', 590, 5, '1592915500.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

CREATE TABLE `atividade` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Categoria` varchar(50) NOT NULL,
  `Cidade` varchar(30) NOT NULL,
  `Pais` varchar(50) NOT NULL,
  `Descricao` text NOT NULL,
  `Morada` varchar(50) NOT NULL,
  `Preco` int(11) NOT NULL,
  `Horario` varchar(30) NOT NULL,
  `Classificacao` int(15) NOT NULL,
  `Thumbnail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `atividade`
--

INSERT INTO `atividade` (`ID`, `Nome`, `Categoria`, `Cidade`, `Pais`, `Descricao`, `Morada`, `Preco`, `Horario`, `Classificacao`, `Thumbnail`) VALUES
(3, 'Tour por Lisboa', 'Tours', 'Lisboa', 'PORTUGAL', 'O ponto de início de nosso tour por Lisboa será junto da estátua de Fernando Pessoa na Rua Garrett, onde nos encontraremos na hora indicada. Passeando pelas ruas do centro da cidade, você descobrirá o bairro do Chiado, considerado o mais boêmio de Lisboa. Ao longo deste passeio, você mergulhará na história da cidade através de histórias e curiosidades que nunca esquecerá!\r\n\r\nEm seguida, caminharemos pelas pitorescas ruas do Bairro Alto. Este bairro parece muito tranquilo durante o dia, mas se transforma completamente ao cair da noite, já que os jovens de Lisboa se convergem nesse ponto para tomar uma bebida e divertir-se ao longo da noite.\r\n\r\nDepois, descobriremos a encantadora Praça do Carmo, que abriga uma bela igreja de estilo gótico. Você sabe por que razão parte do convento não tem teto e apenas estão visíveis os arcos?\r\n\r\nContinuando o tour, iremos até outro lugar conhecido da cidade, a praça do Rossio, com as suas duas fontes e uma enorme estátua a D. Pedro IV (D. Pedro I do Brasil), chamado de \"o Libertador\". Sabia que este homem teve um papel crucial na história de Portugal e do Brasil?\r\n\r\nA próxima etapa do nosso tour terá lugar na Baixa Pombalina, com suas numerosas lojas e museus. Esta zona foi gravemente afetada por um terrível terremoto em 1755 e totalmente reconstruída para se tornar num bairro totalmente burguês, ao sabor da época.\r\n\r\nA visita terminará perto da Praça do Comércio.\r\n        ', 'Praça Luís de Camões', 15, '14-17', 0, '1592915785.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(40) NOT NULL,
  `Pais` varchar(50) NOT NULL,
  `Descricao` text NOT NULL,
  `Imagem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`ID`, `Nome`, `Pais`, `Descricao`, `Imagem`) VALUES
(4, 'Lisboa', 'PORTUGAL', 'Capital de Portugal\r\n              ', '1592915222.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `ID` int(11) NOT NULL,
  `IDProduto` int(10) NOT NULL,
  `CaminhoImagem` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `imagem`
--

INSERT INTO `imagem` (`ID`, `IDProduto`, `CaminhoImagem`) VALUES
(68, 98, '1592915500.jpeg'),
(69, 98, '1592915501.jpg'),
(70, 98, '1592915503.jpg'),
(71, 98, '1592915504.jpg'),
(72, 98, '1592915505.jpg'),
(73, 3, '1592915785.jpg'),
(74, 3, '1592915787.jpg'),
(75, 3, '1592915788.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

CREATE TABLE `pais` (
  `paisId` tinyint(3) UNSIGNED NOT NULL,
  `paisNome` varchar(50) NOT NULL,
  `paisName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pais`
--

INSERT INTO `pais` (`paisId`, `paisNome`, `paisName`) VALUES
(1, 'AFEGANISTÃO', 'AFGHANISTAN'),
(2, 'ACROTÍRI E DECELIA', 'AKROTIRI E DEKÉLIA'),
(3, 'ÁFRICA DO SUL', 'SOUTH AFRICA'),
(4, 'ALBÂNIA', 'ALBANIA'),
(5, 'ALEMANHA', 'GERMANY'),
(6, 'AMERICAN SAMOA', 'AMERICAN SAMOA'),
(7, 'ANDORRA', 'ANDORRA'),
(8, 'ANGOLA', 'ANGOLA'),
(9, 'ANGUILLA', 'ANGUILLA'),
(10, 'ANTÍGUA E BARBUDA', 'ANTIGUA AND BARBUDA'),
(11, 'ANTILHAS NEERLANDESAS', 'NETHERLANDS ANTILLES'),
(12, 'ARÁBIA SAUDITA', 'SAUDI ARABIA'),
(13, 'ARGÉLIA', 'ALGERIA'),
(14, 'ARGENTINA', 'ARGENTINA'),
(15, 'ARMÉNIA', 'ARMENIA'),
(16, 'ARUBA', 'ARUBA'),
(17, 'AUSTRÁLIA', 'AUSTRALIA'),
(18, 'ÁUSTRIA', 'AUSTRIA'),
(19, 'AZERBAIJÃO', 'AZERBAIJAN'),
(20, 'BAHAMAS', 'BAHAMAS, THE'),
(21, 'BANGLADECHE', 'BANGLADESH'),
(22, 'BARBADOS', 'BARBADOS'),
(23, 'BARÉM', 'BAHRAIN'),
(24, 'BASSAS DA ÍNDIA', 'BASSAS DA INDIA'),
(25, 'BÉLGICA', 'BELGIUM'),
(26, 'BELIZE', 'BELIZE'),
(27, 'BENIM', 'BENIN'),
(28, 'BERMUDAS', 'BERMUDA'),
(29, 'BIELORRÚSSIA', 'BELARUS'),
(30, 'BOLÍVIA', 'BOLIVIA'),
(31, 'BÓSNIA E HERZEGOVINA', 'BOSNIA AND HERZEGOVINA'),
(32, 'BOTSUANA', 'BOTSWANA'),
(33, 'BRASIL', 'BRAZIL'),
(34, 'BRUNEI DARUSSALAM', 'BRUNEI DARUSSALAM'),
(35, 'BULGÁRIA', 'BULGARIA'),
(36, 'BURQUINA FASO', 'BURKINA FASO'),
(37, 'BURUNDI', 'BURUNDI'),
(38, 'BUTÃO', 'BHUTAN'),
(39, 'CABO VERDE', 'CAPE VERDE'),
(40, 'CAMARÕES', 'CAMEROON'),
(41, 'CAMBOJA', 'CAMBODIA'),
(42, 'CANADÁ', 'CANADA'),
(43, 'CATAR', 'QATAR'),
(44, 'CAZAQUISTÃO', 'KAZAKHSTAN'),
(45, 'CENTRO-AFRICANA REPÚBLICA', 'CENTRAL AFRICAN REPUBLIC'),
(46, 'CHADE', 'CHAD'),
(47, 'CHILE', 'CHILE'),
(48, 'CHINA', 'CHINA'),
(49, 'CHIPRE', 'CYPRUS'),
(50, 'COLÔMBIA', 'COLOMBIA'),
(51, 'COMORES', 'COMOROS'),
(52, 'CONGO', 'CONGO'),
(53, 'CONGO REPÚBLICA DEMOCRÁTICA', 'CONGO DEMOCRATIC REPUBLIC'),
(54, 'COREIA DO NORTE', 'KOREA NORTH'),
(55, 'COREIA DO SUL', 'KOREA SOUTH'),
(56, 'COSTA DO MARFIM', 'IVORY COAST'),
(57, 'COSTA RICA', 'COSTA RICA'),
(58, 'CROÁCIA', 'CROATIA'),
(59, 'CUBA', 'CUBA'),
(60, 'DINAMARCA', 'DENMARK'),
(61, 'DOMÍNICA', 'DOMINICA'),
(62, 'EGIPTO', 'EGYPT'),
(63, 'EMIRADOS ÁRABES UNIDOS', 'UNITED ARAB EMIRATES'),
(64, 'EQUADOR', 'ECUADOR'),
(65, 'ERITREIA', 'ERITREA'),
(66, 'ESLOVÁQUIA', 'SLOVAKIA'),
(67, 'ESLOVÉNIA', 'SLOVENIA'),
(68, 'ESPANHA', 'SPAIN'),
(69, 'ESTADOS UNIDOS', 'UNITED STATES'),
(70, 'ESTÓNIA', 'ESTONIA'),
(71, 'ETIÓPIA', 'ETHIOPIA'),
(72, 'FAIXA DE GAZA', 'GAZA STRIP'),
(73, 'FIJI', 'FIJI'),
(74, 'FILIPINAS', 'PHILIPPINES'),
(75, 'FINLÂNDIA', 'FINLAND'),
(76, 'FRANÇA', 'FRANCE'),
(77, 'GABÃO', 'GABON'),
(78, 'GÂMBIA', 'GAMBIA'),
(79, 'GANA', 'GHANA'),
(80, 'GEÓRGIA', 'GEORGIA'),
(81, 'GIBRALTAR', 'GIBRALTAR'),
(82, 'GRANADA', 'GRENADA'),
(83, 'GRÉCIA', 'GREECE'),
(84, 'GRONELÂNDIA', 'GREENLAND'),
(85, 'GUADALUPE', 'GUADELOUPE'),
(86, 'GUAM', 'GUAM'),
(87, 'GUATEMALA', 'GUATEMALA'),
(88, 'GUERNSEY', 'GUERNSEY'),
(89, 'GUIANA', 'GUYANA'),
(90, 'GUIANA FRANCESA', 'FRENCH GUIANA'),
(91, 'GUINÉ', 'GUINEA'),
(92, 'GUINÉ EQUATORIAL', 'EQUATORIAL GUINEA'),
(93, 'GUINÉ-BISSAU', 'GUINEA-BISSAU'),
(94, 'HAITI', 'HAITI'),
(95, 'HONDURAS', 'HONDURAS'),
(96, 'HONG KONG', 'HONG KONG'),
(97, 'HUNGRIA', 'HUNGARY'),
(98, 'IÉMEN', 'YEMEN'),
(99, 'ILHA BOUVET', 'BOUVET ISLAND'),
(100, 'ILHA CHRISTMAS', 'CHRISTMAS ISLAND'),
(101, 'ILHA DE CLIPPERTON', 'CLIPPERTON ISLAND'),
(102, 'ILHA DE JOÃO DA NOVA', 'JUAN DE NOVA ISLAND'),
(103, 'ILHA DE MAN', 'ISLE OF MAN'),
(104, 'ILHA DE NAVASSA', 'NAVASSA ISLAND'),
(105, 'ILHA EUROPA', 'EUROPA ISLAND'),
(106, 'ILHA NORFOLK', 'NORFOLK ISLAND'),
(107, 'ILHA TROMELIN', 'TROMELIN ISLAND'),
(108, 'ILHAS ASHMORE E CARTIER', 'ASHMORE AND CARTIER ISLANDS'),
(109, 'ILHAS CAIMAN', 'CAYMAN ISLANDS'),
(110, 'ILHAS COCOS (KEELING)', 'COCOS (KEELING) ISLANDS'),
(111, 'ILHAS COOK', 'COOK ISLANDS'),
(112, 'ILHAS DO MAR DE CORAL', 'CORAL SEA ISLANDS'),
(113, 'ILHAS FALKLANDS (ILHAS MALVINAS)', 'FALKLAND ISLANDS (ISLAS MALVINAS)'),
(114, 'ILHAS FEROE', 'FAROE ISLANDS'),
(115, 'ILHAS GEÓRGIA DO SUL E SANDWICH DO SUL', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS'),
(116, 'ILHAS MARIANAS DO NORTE', 'NORTHERN MARIANA ISLANDS'),
(117, 'ILHAS MARSHALL', 'MARSHALL ISLANDS'),
(118, 'ILHAS PARACEL', 'PARACEL ISLANDS'),
(119, 'ILHAS PITCAIRN', 'PITCAIRN ISLANDS'),
(120, 'ILHAS SALOMÃO', 'SOLOMON ISLANDS'),
(121, 'ILHAS SPRATLY', 'SPRATLY ISLANDS'),
(122, 'ILHAS VIRGENS AMERICANAS', 'UNITED STATES VIRGIN ISLANDS'),
(123, 'ILHAS VIRGENS BRITÂNICAS', 'BRITISH VIRGIN ISLANDS'),
(124, 'ÍNDIA', 'INDIA'),
(125, 'INDONÉSIA', 'INDONESIA'),
(126, 'IRÃO', 'IRAN'),
(127, 'IRAQUE', 'IRAQ'),
(128, 'IRLANDA', 'IRELAND'),
(129, 'ISLÂNDIA', 'ICELAND'),
(130, 'ISRAEL', 'ISRAEL'),
(131, 'ITÁLIA', 'ITALY'),
(132, 'JAMAICA', 'JAMAICA'),
(133, 'JAN MAYEN', 'JAN MAYEN'),
(134, 'JAPÃO', 'JAPAN'),
(135, 'JERSEY', 'JERSEY'),
(136, 'JIBUTI', 'DJIBOUTI'),
(137, 'JORDÂNIA', 'JORDAN'),
(138, 'KIRIBATI', 'KIRIBATI'),
(139, 'KOWEIT', 'KUWAIT'),
(140, 'LAOS', 'LAOS'),
(141, 'LESOTO', 'LESOTHO'),
(142, 'LETÓNIA', 'LATVIA'),
(143, 'LÍBANO', 'LEBANON'),
(144, 'LIBÉRIA', 'LIBERIA'),
(145, 'LÍBIA', 'LIBYAN ARAB JAMAHIRIYA'),
(146, 'LISTENSTAINE', 'LIECHTENSTEIN'),
(147, 'LITUÂNIA', 'LITHUANIA'),
(148, 'LUXEMBURGO', 'LUXEMBOURG'),
(149, 'MACAU', 'MACAO'),
(150, 'MACEDÓNIA', 'MACEDONIA'),
(151, 'MADAGÁSCAR', 'MADAGASCAR'),
(152, 'MALÁSIA', 'MALAYSIA'),
(153, 'MALAVI', 'MALAWI'),
(154, 'MALDIVAS', 'MALDIVES'),
(155, 'MALI', 'MALI'),
(156, 'MALTA', 'MALTA'),
(157, 'MARROCOS', 'MOROCCO'),
(158, 'MARTINICA', 'MARTINIQUE'),
(159, 'MAURÍCIA', 'MAURITIUS'),
(160, 'MAURITÂNIA', 'MAURITANIA'),
(161, 'MAYOTTE', 'MAYOTTE'),
(162, 'MÉXICO', 'MEXICO'),
(163, 'MIANMAR', 'MYANMAR BURMA'),
(164, 'MICRONÉSIA', 'MICRONESIA'),
(165, 'MOÇAMBIQUE', 'MOZAMBIQUE'),
(166, 'MOLDÁVIA', 'MOLDOVA'),
(167, 'MÓNACO', 'MONACO'),
(168, 'MONGÓLIA', 'MONGOLIA'),
(169, 'MONTENEGRO', 'MONTENEGRO'),
(170, 'MONTSERRAT', 'MONTSERRAT'),
(171, 'NAMÍBIA', 'NAMIBIA'),
(172, 'NAURU', 'NAURU'),
(173, 'NEPAL', 'NEPAL'),
(174, 'NICARÁGUA', 'NICARAGUA'),
(175, 'NÍGER', 'NIGER'),
(176, 'NIGÉRIA', 'NIGERIA'),
(177, 'NIUE', 'NIUE'),
(178, 'NORUEGA', 'NORWAY'),
(179, 'NOVA CALEDÓNIA', 'NEW CALEDONIA'),
(180, 'NOVA ZELÂNDIA', 'NEW ZEALAND'),
(181, 'OMÃ', 'OMAN'),
(182, 'PAÍSES BAIXOS', 'NETHERLANDS'),
(183, 'PALAU', 'PALAU'),
(184, 'PALESTINA', 'PALESTINE'),
(185, 'PANAMÁ', 'PANAMA'),
(186, 'PAPUÁSIA-NOVA GUINÉ', 'PAPUA NEW GUINEA'),
(187, 'PAQUISTÃO', 'PAKISTAN'),
(188, 'PARAGUAI', 'PARAGUAY'),
(189, 'PERU', 'PERU'),
(190, 'POLINÉSIA FRANCESA', 'FRENCH POLYNESIA'),
(191, 'POLÓNIA', 'POLAND'),
(192, 'PORTO RICO', 'PUERTO RICO'),
(193, 'PORTUGAL', 'PORTUGAL'),
(194, 'QUÉNIA', 'KENYA'),
(195, 'QUIRGUIZISTÃO', 'KYRGYZSTAN'),
(196, 'REINO UNIDO', 'UNITED KINGDOM'),
(197, 'REPÚBLICA CHECA', 'CZECH REPUBLIC'),
(198, 'REPÚBLICA DOMINICANA', 'DOMINICAN REPUBLIC'),
(199, 'ROMÉNIA', 'ROMANIA'),
(200, 'RUANDA', 'RWANDA'),
(201, 'RÚSSIA', 'RUSSIAN FEDERATION'),
(202, 'SAHARA OCCIDENTAL', 'WESTERN SAHARA'),
(203, 'SALVADOR', 'EL SALVADOR'),
(204, 'SAMOA', 'SAMOA'),
(205, 'SANTA HELENA', 'SAINT HELENA'),
(206, 'SANTA LÚCIA', 'SAINT LUCIA'),
(207, 'SANTA SÉ', 'HOLY SEE'),
(208, 'SÃO CRISTÓVÃO E NEVES', 'SAINT KITTS AND NEVIS'),
(209, 'SÃO MARINO', 'SAN MARINO'),
(210, 'SÃO PEDRO E MIQUELÃO', 'SAINT PIERRE AND MIQUELON'),
(211, 'SÃO TOMÉ E PRÍNCIPE', 'SAO TOME AND PRINCIPE'),
(212, 'SÃO VICENTE E GRANADINAS', 'SAINT VINCENT AND THE GRENADINES'),
(213, 'SEICHELES', 'SEYCHELLES'),
(214, 'SENEGAL', 'SENEGAL'),
(215, 'SERRA LEOA', 'SIERRA LEONE'),
(216, 'SÉRVIA', 'SERBIA'),
(217, 'SINGAPURA', 'SINGAPORE'),
(218, 'SÍRIA', 'SYRIA'),
(219, 'SOMÁLIA', 'SOMALIA'),
(220, 'SRI LANCA', 'SRI LANKA'),
(221, 'SUAZILÂNDIA', 'SWAZILAND'),
(222, 'SUDÃO', 'SUDAN'),
(223, 'SUÉCIA', 'SWEDEN'),
(224, 'SUÍÇA', 'SWITZERLAND'),
(225, 'SURINAME', 'SURINAME'),
(226, 'SVALBARD', 'SVALBARD'),
(227, 'TAILÂNDIA', 'THAILAND'),
(228, 'TAIWAN', 'TAIWAN'),
(229, 'TAJIQUISTÃO', 'TAJIKISTAN'),
(230, 'TANZÂNIA', 'TANZANIA'),
(231, 'TERRITÓRIO BRITÂNICO DO OCEANO ÍNDICO', 'BRITISH INDIAN OCEAN TERRITORY'),
(232, 'TERRITÓRIO DAS ILHAS HEARD E MCDONALD', 'HEARD ISLAND AND MCDONALD ISLANDS'),
(233, 'TIMOR-LESTE', 'TIMOR-LESTE'),
(234, 'TOGO', 'TOGO'),
(235, 'TOKELAU', 'TOKELAU'),
(236, 'TONGA', 'TONGA'),
(237, 'TRINDADE E TOBAGO', 'TRINIDAD AND TOBAGO'),
(238, 'TUNÍSIA', 'TUNISIA'),
(239, 'TURKS E CAICOS', 'TURKS AND CAICOS ISLANDS'),
(240, 'TURQUEMENISTÃO', 'TURKMENISTAN'),
(241, 'TURQUIA', 'TURKEY'),
(242, 'TUVALU', 'TUVALU'),
(243, 'UCRÂNIA', 'UKRAINE'),
(244, 'UGANDA', 'UGANDA'),
(245, 'URUGUAI', 'URUGUAY'),
(246, 'USBEQUISTÃO', 'UZBEKISTAN'),
(247, 'VANUATU', 'VANUATU'),
(248, 'VENEZUELA', 'VENEZUELA'),
(249, 'VIETNAME', 'VIETNAM'),
(250, 'WALLIS E FUTUNA', 'WALLIS AND FUTUNA'),
(251, 'ZÂMBIA', 'ZAMBIA'),
(252, 'ZIMBABUÉ', 'ZIMBABWE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `quarto`
--

CREATE TABLE `quarto` (
  `ID` int(11) NOT NULL,
  `NQuarto` int(11) NOT NULL,
  `IDAlojamento` int(10) UNSIGNED NOT NULL,
  `Disponivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `quarto`
--

INSERT INTO `quarto` (`ID`, `NQuarto`, `IDAlojamento`, `Disponivel`) VALUES
(38, 0, 98, 0),
(39, 1, 98, 1),
(40, 2, 98, 1),
(41, 3, 98, 1),
(42, 4, 98, 1),
(43, 5, 98, 1),
(44, 6, 98, 1),
(45, 7, 98, 1),
(46, 8, 98, 1),
(47, 9, 98, 1),
(48, 10, 98, 1),
(49, 11, 98, 1),
(50, 12, 98, 1),
(51, 13, 98, 1),
(52, 14, 98, 1),
(53, 15, 98, 1),
(54, 16, 98, 1),
(55, 17, 98, 1),
(56, 18, 98, 1),
(57, 19, 98, 1),
(58, 20, 98, 1),
(59, 21, 98, 1),
(60, 22, 98, 1),
(61, 23, 98, 1),
(62, 24, 98, 1),
(63, 25, 98, 1),
(64, 26, 98, 1),
(65, 27, 98, 1),
(66, 28, 98, 1),
(67, 29, 98, 1),
(68, 30, 98, 1),
(69, 31, 98, 1),
(70, 32, 98, 1),
(71, 33, 98, 1),
(72, 34, 98, 1),
(73, 35, 98, 1),
(74, 36, 98, 1),
(75, 37, 98, 1),
(76, 38, 98, 1),
(77, 39, 98, 1),
(78, 40, 98, 1),
(79, 41, 98, 1),
(80, 42, 98, 1),
(81, 43, 98, 1),
(82, 44, 98, 1),
(83, 45, 98, 1),
(84, 46, 98, 1),
(85, 47, 98, 1),
(86, 48, 98, 1),
(87, 49, 98, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `ID` int(11) NOT NULL,
  `IDUtilizador` int(5) NOT NULL,
  `IDAlojamento` int(10) NOT NULL,
  `NQuarto` int(11) NOT NULL,
  `DataInicio` varchar(30) NOT NULL,
  `DataFim` varchar(30) NOT NULL,
  `Hospedes` int(11) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`ID`, `IDUtilizador`, `IDAlojamento`, `NQuarto`, `DataInicio`, `DataFim`, `Hospedes`, `Total`) VALUES
(20, 1, 98, 0, '  29/6/2020', '30/6/2020', 1, 590);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `ID` int(5) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Admin` tinyint(1) NOT NULL,
  `PerfilFoto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`ID`, `Nome`, `Username`, `Email`, `Password`, `Admin`, `PerfilFoto`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', '123', 1, '1592668821.jpg'),
(2, 'Joao', 'Joao', 'joao@gmail.com', '1234', 0, '1592921498.jpeg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alojamento`
--
ALTER TABLE `alojamento`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Cidade` (`Cidade`),
  ADD KEY `Pais` (`Pais`);

--
-- Índices para tabela `atividade`
--
ALTER TABLE `atividade`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Cidade` (`Cidade`);

--
-- Índices para tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Pais` (`Pais`),
  ADD KEY `Nome` (`Nome`);

--
-- Índices para tabela `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`ID`,`IDProduto`),
  ADD KEY `IDProduto` (`IDProduto`);

--
-- Índices para tabela `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`paisId`),
  ADD UNIQUE KEY `paisNome` (`paisNome`);

--
-- Índices para tabela `quarto`
--
ALTER TABLE `quarto`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDAlojamento` (`IDAlojamento`),
  ADD KEY `NQuarto` (`NQuarto`);

--
-- Índices para tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDAlojamento` (`IDAlojamento`),
  ADD KEY `IDUtilizador` (`IDUtilizador`),
  ADD KEY `NQuarto` (`NQuarto`);

--
-- Índices para tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alojamento`
--
ALTER TABLE `alojamento`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de tabela `atividade`
--
ALTER TABLE `atividade`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `imagem`
--
ALTER TABLE `imagem`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de tabela `pais`
--
ALTER TABLE `pais`
  MODIFY `paisId` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT de tabela `quarto`
--
ALTER TABLE `quarto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `alojamento`
--
ALTER TABLE `alojamento`
  ADD CONSTRAINT `alojamento_ibfk_1` FOREIGN KEY (`Cidade`) REFERENCES `cidade` (`Nome`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `atividade`
--
ALTER TABLE `atividade`
  ADD CONSTRAINT `atividade_ibfk_1` FOREIGN KEY (`Cidade`) REFERENCES `cidade` (`Nome`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `quarto`
--
ALTER TABLE `quarto`
  ADD CONSTRAINT `quarto_ibfk_1` FOREIGN KEY (`IDAlojamento`) REFERENCES `alojamento` (`ID`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`IDUtilizador`) REFERENCES `utilizador` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`NQuarto`) REFERENCES `quarto` (`NQuarto`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
