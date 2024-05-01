-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/05/2024 às 02:44
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `medtime`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrar_usuario` (IN `nomeCad` VARCHAR(300), IN `emailCad` VARCHAR(300), IN `senhaCad` VARCHAR(300), IN `cpfCad` VARCHAR(11), IN `data_nascimentoCad` DATE, IN `id_categoriaCad` INT(11), IN `telefoneCad` INT(14))   BEGIN
DECLARE ultimo_id INT;
 
INSERT INTO usuarios(usuarios.nome, usuarios.email, usuarios.senha, usuarios.cpf, usuarios.data_nascimento, usuarios.id_categoria)
VALUES(nomeCad, emailCad, senhaCad, cpfCad, data_nascimentoCad, id_categoriaCad);
SET ultimo_id = LAST_INSERT_ID();
INSERT INTO telefone(id_usuario, telefone)
VALUES (ultimo_id, telefoneCad);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `id` int(11) NOT NULL,
  `id_convenio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_profissional` int(11) NOT NULL,
  `id_exame` int(11) NOT NULL,
  `id_local_exame` int(11) NOT NULL,
  `data_agendado` datetime NOT NULL,
  `situacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Gertrudes');

-- --------------------------------------------------------

--
-- Estrutura para tabela `convenio`
--

CREATE TABLE `convenio` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `especialidade`
--

CREATE TABLE `especialidade` (
  `id` int(11) NOT NULL,
  `nome` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `exames`
--

CREATE TABLE `exames` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `id_profissional` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `localizacao`
--

CREATE TABLE `localizacao` (
  `id` int(11) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `logradouro` varchar(300) NOT NULL,
  `complemento` varchar(300) NOT NULL,
  `bairro` varchar(300) NOT NULL,
  `localidade` varchar(300) NOT NULL,
  `uf` varchar(300) NOT NULL,
  `ddd` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `profissionais`
--

CREATE TABLE `profissionais` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `id_especialidade` int(11) NOT NULL,
  `id_localizacao` int(11) NOT NULL,
  `situacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `resultados`
--

CREATE TABLE `resultados` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_profissional` int(11) NOT NULL,
  `resultado` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `suporte`
--

CREATE TABLE `suporte` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `assunto` varchar(300) NOT NULL,
  `mensagem` varchar(300) NOT NULL,
  `situacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `suporte`
--

INSERT INTO `suporte` (`id`, `id_usuario`, `assunto`, `mensagem`, `situacao`) VALUES
(1, 5, 'Socorro', 'Olá, estou com problemas, me ajude por favor', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `telefone`
--

CREATE TABLE `telefone` (
  `telefone` int(14) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `telefone`
--

INSERT INTO `telefone` (`telefone`, `id_usuario`) VALUES
(129999999, 5),
(2147483647, 7),
(2147483647, 8),
(2147483647, 9),
(2147483647, 10),
(40028922, 11),
(2147483647, 14),
(0, 15),
(2147483647, 16);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `data_nascimento` date NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `cpf`, `data_nascimento`, `id_categoria`) VALUES
(1, 'a', '', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '00000000000', '2000-02-10', 1),
(5, 'Gertrudres', 'gertrudinha@gerts.com', '202cb962ac59075b964b07152d234b70', '12345678910', '2004-04-02', 1),
(6, 'Robsom', 'rom@rob.com', '202cb962ac59075b964b07152d234b70', '40404040400', '2000-01-01', 1),
(7, 'aphelios da silva', 'phel1@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', '12345674351', '2000-01-01', 1),
(9, 'Urgot Almeida Gomes', 'urgotinho@gmail.com', '19711b9a35735e677b499a567bb17e5c', '65465548456', '1880-01-01', 1),
(10, 'agua', 'aguinha@123.com', '19711b9a35735e677b499a567bb17e5c', '54353453453', '2222-01-01', 1),
(11, 'cauznnk', 'cauznn4@gmail.com', '32fdcddf26cbb5ded639ca413c000567', '', '0000-00-00', 1),
(14, 'adalberto', 'ada@ada.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '32817381273', '2000-01-01', 1),
(15, 'dwad', 'dwad@dwajdw', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', '', '0000-00-00', 1),
(16, 'admin', 'admin@admin.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '41824718471', '2000-10-02', 1);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `view_agendamentos`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `view_agendamentos` (
`id` int(11)
,`convenio` varchar(300)
,`cliente` varchar(300)
,`profissional` varchar(300)
,`exame` varchar(300)
,`localidade` varchar(300)
,`data_agendado` datetime
,`situacao` tinyint(1)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `view_resultado`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `view_resultado` (
`id` int(11)
,`cliente` varchar(300)
,`profissional` varchar(300)
,`resultado` varchar(300)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `view_suporte`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `view_suporte` (
`nome` varchar(300)
,`assunto` varchar(300)
,`mensagem` varchar(300)
,`situacao` tinyint(1)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `view_usuarios`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `view_usuarios` (
`id` int(11)
,`nome` varchar(300)
,`email` varchar(300)
,`cpf` varchar(11)
,`data_nascimento` date
,`telefone` int(14)
,`categoria` varchar(400)
);

-- --------------------------------------------------------

--
-- Estrutura para view `view_agendamentos`
--
DROP TABLE IF EXISTS `view_agendamentos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_agendamentos`  AS SELECT `agendamentos`.`id` AS `id`, `convenio`.`nome` AS `convenio`, `usuarios`.`nome` AS `cliente`, `profissionais`.`nome` AS `profissional`, `exames`.`nome` AS `exame`, `localizacao`.`localidade` AS `localidade`, `agendamentos`.`data_agendado` AS `data_agendado`, `agendamentos`.`situacao` AS `situacao` FROM (((((`agendamentos` join `convenio` on(`agendamentos`.`id_convenio` = `convenio`.`id`)) join `usuarios` on(`agendamentos`.`id_usuario` = `usuarios`.`id`)) join `profissionais` on(`agendamentos`.`id_profissional` = `profissionais`.`id`)) join `exames` on(`agendamentos`.`id_exame` = `exames`.`id`)) join `localizacao` on(`agendamentos`.`id_local_exame` = `localizacao`.`id`)) ;

-- --------------------------------------------------------

--
-- Estrutura para view `view_resultado`
--
DROP TABLE IF EXISTS `view_resultado`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_resultado`  AS SELECT `resultados`.`id` AS `id`, `usuarios`.`nome` AS `cliente`, `profissionais`.`nome` AS `profissional`, `resultados`.`resultado` AS `resultado` FROM ((`resultados` join `usuarios` on(`resultados`.`id_usuario` = `usuarios`.`id`)) join `profissionais` on(`resultados`.`id_profissional` = `profissionais`.`id`)) ;

-- --------------------------------------------------------

--
-- Estrutura para view `view_suporte`
--
DROP TABLE IF EXISTS `view_suporte`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_suporte`  AS SELECT `usuarios`.`nome` AS `nome`, `suporte`.`assunto` AS `assunto`, `suporte`.`mensagem` AS `mensagem`, `suporte`.`situacao` AS `situacao` FROM (`suporte` join `usuarios` on(`usuarios`.`id` = `suporte`.`id_usuario`)) ;

-- --------------------------------------------------------

--
-- Estrutura para view `view_usuarios`
--
DROP TABLE IF EXISTS `view_usuarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_usuarios`  AS SELECT `usuarios`.`id` AS `id`, `usuarios`.`nome` AS `nome`, `usuarios`.`email` AS `email`, `usuarios`.`cpf` AS `cpf`, `usuarios`.`data_nascimento` AS `data_nascimento`, `telefone`.`telefone` AS `telefone`, `categorias`.`nome` AS `categoria` FROM ((`usuarios` join `categorias` on(`categorias`.`id` = `usuarios`.`id_categoria`)) join `telefone` on(`telefone`.`id_usuario` = `usuarios`.`id`)) ;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_convenio` (`id_convenio`),
  ADD KEY `id_exame` (`id_exame`),
  ADD KEY `id_local_exame` (`id_local_exame`),
  ADD KEY `id_profissional` (`id_profissional`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `convenio`
--
ALTER TABLE `convenio`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `especialidade`
--
ALTER TABLE `especialidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `exames`
--
ALTER TABLE `exames`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_profissional` (`id_profissional`);

--
-- Índices de tabela `localizacao`
--
ALTER TABLE `localizacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `profissionais`
--
ALTER TABLE `profissionais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_localizacao` (`id_localizacao`),
  ADD KEY `id_especialidade` (`id_especialidade`);

--
-- Índices de tabela `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_profissional` (`id_profissional`);

--
-- Índices de tabela `suporte`
--
ALTER TABLE `suporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `telefone`
--
ALTER TABLE `telefone`
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `convenio`
--
ALTER TABLE `convenio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
