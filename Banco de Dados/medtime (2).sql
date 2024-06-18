-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/06/2024 às 03:00
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrar_funcionario_localizacao` (IN `cepCad` VARCHAR(10), IN `logradouroCad` VARCHAR(300), IN `complementoCad` VARCHAR(300), IN `bairroCad` VARCHAR(300), IN `localidadeCad` VARCHAR(300), IN `ufCad` VARCHAR(300), IN `dddCad` VARCHAR(300), IN `tipoLocal` VARCHAR(15), IN `nomeCad` VARCHAR(300), IN `emailCad` VARCHAR(300), IN `senhaCad` VARCHAR(300), IN `cpfCad` VARCHAR(11), IN `data_nascimentoCad` DATE, IN `telefone_celularCad` VARCHAR(10), IN `telefone_residencialCad` VARCHAR(10), IN `id_convenioCad` INT(11), IN `id_cargoCad` INT(11), IN `id_especialidadeCad` INT(11), IN `situacaoCad` TINYINT(1))   BEGIN
#Declarando a variaval para armazenar o id do insert
DECLARE ultimo_id INT;
#Cadastrando uma nova localização
INSERT INTO localizacoes(cep, logradouro, complemento, bairro, localidade, uf, ddd, tipo)
 
VALUES (cepCad, logradouroCad, complementoCad, bairroCad, localidadeCad, ufCad, dddCad, tipoLocal);
 
#Armazenando o id na variavel
SET ultimo_id = LAST_INSERT_ID();
 
#Cadastrando um novo usuário
INSERT INTO usuarios(nome, email, senha, cpf, data_nascimento, telefone_celular, telefone_residencial, id_localizacao, id_convenio, id_cargo, id_especialidade, situacao)
VALUES (nomeCad, emailCad, senhaCad, cpfCad, data_nascimentoCad, telefone_celularCad, telefone_residencialCad, ultimo_id, id_convenioCad, id_cargoCad, id_especialidadeCad, situacaoCad);
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrar_usuario_localizacao` (IN `cepCad` VARCHAR(10), IN `logradouroCad` VARCHAR(300), IN `complementoCad` VARCHAR(300), IN `bairroCad` VARCHAR(300), IN `localidadeCad` VARCHAR(300), IN `ufCad` VARCHAR(300), IN `dddCad` VARCHAR(300), IN `tipoLocal` VARCHAR(15), IN `nomeCad` VARCHAR(300), IN `emailCad` VARCHAR(300), IN `senhaCad` VARCHAR(300), IN `cpfCad` VARCHAR(11), IN `data_nascimentoCad` DATE, IN `telefone_celularCad` VARCHAR(10), IN `telefone_residencialCad` VARCHAR(10), IN `id_convenioCad` INT(11))   BEGIN
#Declarando a variaval para armazenar o id do insert
DECLARE ultimo_id INT;
#Cadastrando uma nova localização
INSERT INTO localizacoes(cep, logradouro, complemento, bairro, localidade, uf, ddd, tipo)
VALUES (cepCad, logradouroCad, complementoCad, bairroCad, localidadeCad, ufCad, dddCad, tipoLocal);
 
#Armazenando o id na variavel
SET ultimo_id = LAST_INSERT_ID();
 
#Cadastrando um novo usuário
INSERT INTO usuarios(nome, email, senha, cpf, data_nascimento, telefone_celular, telefone_residencial, id_localizacao, id_convenio)
VALUES (nomeCad, emailCad, senhaCad, cpfCad, data_nascimentoCad, telefone_celularCad, telefone_residencialCad, ultimo_id, id_convenioCad);
 
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `id_exame` int(11) NOT NULL,
  `id_convenio` int(11) DEFAULT NULL,
  `id_localizacao` int(11) NOT NULL,
  `data_agendado` datetime NOT NULL,
  `situacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `id_cliente`, `id_funcionario`, `id_exame`, `id_convenio`, `id_localizacao`, `data_agendado`, `situacao`) VALUES
(4, 66, 64, 4, 2, 40, '0001-01-01 00:00:00', 0),
(5, 65, 64, 4, 2, 40, '2024-12-11 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `nome` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cargos`
--

INSERT INTO `cargos` (`id`, `nome`) VALUES
(2, 'Atendente'),
(3, 'Enfermeiro'),
(4, 'Médico'),
(5, 'Gerente'),
(35, 'Psicólogo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `convenios`
--

CREATE TABLE `convenios` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `telefone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `convenios`
--

INSERT INTO `convenios` (`id`, `nome`, `email`, `telefone`) VALUES
(0, 'Sem convênio', 'medtime@gmail.com', '12876567558'),
(1, 'Sorriso Seguro Saúde', 'sss@gmail.com', '40028922'),
(2, 'Taubaté Saúde', 'taubatesaude@gmail.com', '12576478953');

-- --------------------------------------------------------

--
-- Estrutura para tabela `especialidades`
--

CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `especificacao` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `especialidades`
--

INSERT INTO `especialidades` (`id`, `id_cargo`, `especificacao`) VALUES
(1, 4, 'Otorrinolaringologista'),
(2, 4, 'Psicanalista'),
(8, 4, 'Oftalmologista');

-- --------------------------------------------------------

--
-- Estrutura para tabela `exames`
--

CREATE TABLE `exames` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `id_responsavel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `exames`
--

INSERT INTO `exames` (`id`, `nome`, `id_responsavel`) VALUES
(3, 'Audiometria', 59),
(4, 'Psicanalista', 64),
(5, 'Oftalmologista', 69);

-- --------------------------------------------------------

--
-- Estrutura para tabela `localizacoes`
--

CREATE TABLE `localizacoes` (
  `id` int(11) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `logradouro` varchar(300) NOT NULL,
  `complemento` varchar(300) DEFAULT NULL,
  `bairro` varchar(300) NOT NULL,
  `localidade` varchar(300) NOT NULL,
  `uf` varchar(300) NOT NULL,
  `ddd` varchar(300) NOT NULL,
  `tipo` varchar(15) NOT NULL DEFAULT 'Residencial'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `localizacoes`
--

INSERT INTO `localizacoes` (`id`, `cep`, `logradouro`, `complemento`, `bairro`, `localidade`, `uf`, `ddd`, `tipo`) VALUES
(0, '0', 'sem', 'sem', 'sem', 'sem', 'sem', 'sem', 'sem'),
(32, '12440560', 'Rua Maria Augusta da Silva Pouza', '(Moreira Cesar)', 'Residencial e Comercial Laerte Asumpção', 'Pindamonhangaba', 'SP', '12', 'Residencial'),
(34, '12440410', 'Avenida das Orquídeas', '', 'Residencial Vale das Acácias', 'Pindamonhangaba', 'SP', '12', 'Residencial'),
(38, '58046470', 'Granja Esperança', '', 'Altiplano Cabo Branco', 'João Pessoa', 'PB', '83', 'Residencial'),
(39, '59122490', 'Rua Rio Salgado', '', 'Redinha', 'Natal', 'RN', '84', 'Residencial'),
(40, '12441400', 'Avenida Júlio de Paula Claro', 'Clinica Taubaté', 'Feital', 'Pindamonhangaba', 'SP', '12', 'Clinica'),
(41, '12440400', 'Rua dos Crisântemos', '', 'Residencial Vale das Acácias', 'Pindamonhangaba', 'SP', '12', 'Residencial'),
(42, '12030383', 'Praça Taipei', '', 'Jardim das Nações', 'Taubaté', 'SP', '12', 'Residencial'),
(43, '12440430', 'Praça Santa Rita de Cássia', '', 'Residencial Vale das Acácias', 'Pindamonhangaba', 'SP', '12', 'Residencial'),
(45, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `resultados`
--

CREATE TABLE `resultados` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `data_realizacao` date NOT NULL,
  `id_localizacao` int(11) NOT NULL,
  `resultado` varchar(300) NOT NULL,
  `reagendamento` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `suportes`
--

CREATE TABLE `suportes` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `assunto` varchar(300) NOT NULL,
  `mensagem` varchar(300) NOT NULL,
  `situacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `telefone_celular` varchar(10) DEFAULT NULL,
  `telefone_residencial` varchar(10) DEFAULT NULL,
  `id_localizacao` int(11) DEFAULT 0,
  `id_convenio` int(11) DEFAULT 0,
  `id_cargo` int(11) DEFAULT NULL,
  `id_especialidade` int(11) DEFAULT NULL,
  `situacao` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `cpf`, `data_nascimento`, `telefone_celular`, `telefone_residencial`, `id_localizacao`, `id_convenio`, `id_cargo`, `id_especialidade`, `situacao`) VALUES
(43, 'teste', 'teste@teste.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '21312837218', '2000-01-01', '', '', 43, 0, NULL, NULL, 0),
(44, 'a', 'a@a.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '29313123193', '2000-01-01', '', '', 34, 1, 2, NULL, 0),
(58, 'b', 'b@b.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3 ', '42147182481', '1888-02-20', '', '', 39, 1, 3, NULL, 0),
(59, 'cauebr', 'c@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '', '2000-01-01', '', '', 32, 1, 4, NULL, 1),
(63, 'd', 'd@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '421412412', '2000-01-01', NULL, NULL, 34, 0, 5, NULL, 1),
(64, 'Guilherme', 'gui@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '54354354354', '2002-02-10', '1298574784', '', 41, 1, 4, 2, 1),
(65, 'Juninho', 'juninho@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '5932i95829', '2000-01-01', '', '', 0, 1, NULL, NULL, 1),
(66, 'Pedrinho', 'pedrinho@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '5893589', '2000-01-01', '', '', 0, 2, NULL, NULL, 1),
(67, 'Zézinho', 'zezinho@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '53928529', '2000-01-01', '', '', 42, 2, NULL, NULL, 1),
(68, 'Tikomia Nakama', 'tk@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '48271', '2000-01-01', '', '', 34, 1, 35, 2, 1),
(69, 'Simas Turbo', 'st@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '5883258', '2000-01-01', '', '', 43, 1, 4, 8, 1),
(70, 'Mih Enrrabah', 'mih@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '48718471', '2000-01-01', '', '', 0, 0, NULL, NULL, 1),
(71, 'Kevin Mamar', 'kevin@hotmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '948194892', '2000-02-01', '', '', 34, 0, 2, NULL, 1),
(72, 'Jahlin Rahbei', 'jjjg@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '48329', '2000-02-01', '', '', 34, 2, 5, NULL, 1),
(77, 'Jacinto Pinto Aquino Rego', 'jpar@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '643683', '2000-01-01', '', NULL, 0, NULL, NULL, NULL, 1),
(78, 'Thomas Turbando', 'toto@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '5835', '2000-01-01', '', NULL, 0, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `view_agendamentos`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `view_agendamentos` (
`paciente` varchar(300)
,`id` int(11)
,`médico` varchar(300)
,`exame` varchar(300)
,`convenio` varchar(300)
,`clinica` varchar(300)
,`data consulta` datetime
,`situacao` varchar(7)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `view_funcionarios`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `view_funcionarios` (
`nome` varchar(300)
,`email` varchar(300)
,`cpf` varchar(11)
,`data_nascimento` date
,`telefone_celular` varchar(10)
,`telefone_residencial` varchar(10)
,`cep` varchar(10)
,`convenio` varchar(300)
,`cargo` varchar(400)
,`especificacao` varchar(300)
,`situacao` varchar(7)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `view_usuarios`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `view_usuarios` (
`nome` varchar(300)
,`email` varchar(300)
,`cpf` varchar(11)
,`data_nascimento` date
,`cep` varchar(10)
,`convenio` varchar(300)
,`cargo` varchar(400)
,`especialdade` varchar(300)
,`situacao` tinyint(1)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `view_usuario_com_localizacao`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `view_usuario_com_localizacao` (
`nome` varchar(300)
,`email` varchar(300)
,`cpf` varchar(11)
,`data_nascimento` date
,`telefone_celular` varchar(10)
,`telefone_residencial` varchar(10)
,`cep` varchar(10)
,`convenio` varchar(300)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `view_usuario_sem_localizacao`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `view_usuario_sem_localizacao` (
`nome` varchar(300)
,`email` varchar(300)
,`cpf` varchar(11)
,`data_nascimento` date
,`telefone_celular` varchar(10)
,`telefone_residencial` varchar(10)
,`convenio` varchar(300)
);

-- --------------------------------------------------------

--
-- Estrutura para view `view_agendamentos`
--
DROP TABLE IF EXISTS `view_agendamentos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_agendamentos`  AS SELECT `usuarios`.`nome` AS `paciente`, `agendamentos`.`id` AS `id`, (select `usuarios`.`nome` from `usuarios` where `usuarios`.`id` = `agendamentos`.`id_funcionario`) AS `médico`, `exames`.`nome` AS `exame`, `convenios`.`nome` AS `convenio`, `localizacoes`.`complemento` AS `clinica`, `agendamentos`.`data_agendado` AS `data consulta`, if(`agendamentos`.`situacao` > 0,'Ativo','Inativo') AS `situacao` FROM ((((`agendamentos` join `usuarios` on(`agendamentos`.`id_cliente` = `usuarios`.`id`)) join `exames` on(`agendamentos`.`id_exame` = `exames`.`id`)) join `convenios` on(`agendamentos`.`id_convenio` = `convenios`.`id`)) join `localizacoes` on(`agendamentos`.`id_localizacao` = `localizacoes`.`id`)) ;

-- --------------------------------------------------------

--
-- Estrutura para view `view_funcionarios`
--
DROP TABLE IF EXISTS `view_funcionarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_funcionarios`  AS SELECT `usuarios`.`nome` AS `nome`, `usuarios`.`email` AS `email`, `usuarios`.`cpf` AS `cpf`, `usuarios`.`data_nascimento` AS `data_nascimento`, `usuarios`.`telefone_celular` AS `telefone_celular`, `usuarios`.`telefone_residencial` AS `telefone_residencial`, `localizacoes`.`cep` AS `cep`, `convenios`.`nome` AS `convenio`, `cargos`.`nome` AS `cargo`, `especialidades`.`especificacao` AS `especificacao`, if(`usuarios`.`situacao` > 0,'Ativo','Inativo') AS `situacao` FROM ((((`usuarios` join `localizacoes` on(`usuarios`.`id_localizacao` = `localizacoes`.`id`)) join `convenios` on(`usuarios`.`id_convenio` = `convenios`.`id`)) join `cargos` on(`usuarios`.`id_cargo` = `cargos`.`id`)) join `especialidades` on(`usuarios`.`id_especialidade` = `especialidades`.`id`)) WHERE `usuarios`.`id_cargo` is not null ;

-- --------------------------------------------------------

--
-- Estrutura para view `view_usuarios`
--
DROP TABLE IF EXISTS `view_usuarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_usuarios`  AS SELECT `usuarios`.`nome` AS `nome`, `usuarios`.`email` AS `email`, `usuarios`.`cpf` AS `cpf`, `usuarios`.`data_nascimento` AS `data_nascimento`, `localizacoes`.`cep` AS `cep`, `convenios`.`nome` AS `convenio`, `cargos`.`nome` AS `cargo`, `especialidades`.`especificacao` AS `especialdade`, `usuarios`.`situacao` AS `situacao` FROM ((((`usuarios` join `localizacoes` on(`usuarios`.`id_localizacao` = `localizacoes`.`id`)) join `convenios` on(`usuarios`.`id_convenio` = `convenios`.`id`)) join `cargos` on(`usuarios`.`id_cargo` = `cargos`.`id`)) join `especialidades` on(`usuarios`.`id_especialidade` = `especialidades`.`id`)) ;

-- --------------------------------------------------------

--
-- Estrutura para view `view_usuario_com_localizacao`
--
DROP TABLE IF EXISTS `view_usuario_com_localizacao`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_usuario_com_localizacao`  AS SELECT `usuarios`.`nome` AS `nome`, `usuarios`.`email` AS `email`, `usuarios`.`cpf` AS `cpf`, `usuarios`.`data_nascimento` AS `data_nascimento`, `usuarios`.`telefone_celular` AS `telefone_celular`, `usuarios`.`telefone_residencial` AS `telefone_residencial`, `localizacoes`.`cep` AS `cep`, `convenios`.`nome` AS `convenio` FROM ((`usuarios` join `localizacoes` on(`usuarios`.`id_localizacao` = `localizacoes`.`id`)) join `convenios` on(`usuarios`.`id_convenio` = `convenios`.`id`)) WHERE `usuarios`.`id_cargo` is null ;

-- --------------------------------------------------------

--
-- Estrutura para view `view_usuario_sem_localizacao`
--
DROP TABLE IF EXISTS `view_usuario_sem_localizacao`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_usuario_sem_localizacao`  AS SELECT `usuarios`.`nome` AS `nome`, `usuarios`.`email` AS `email`, `usuarios`.`cpf` AS `cpf`, `usuarios`.`data_nascimento` AS `data_nascimento`, `usuarios`.`telefone_celular` AS `telefone_celular`, `usuarios`.`telefone_residencial` AS `telefone_residencial`, `convenios`.`nome` AS `convenio` FROM (`usuarios` join `convenios` on(`usuarios`.`id_convenio` = `convenios`.`id`)) WHERE `usuarios`.`id_localizacao` is null AND `usuarios`.`id_cargo` is null ;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cliente2` (`id_cliente`),
  ADD KEY `fk_convenio1` (`id_convenio`),
  ADD KEY `fk_exame` (`id_exame`),
  ADD KEY `fk_funcionarios2` (`id_funcionario`),
  ADD KEY `fk_localizacao3` (`id_localizacao`);

--
-- Índices de tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `convenios`
--
ALTER TABLE `convenios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cargo1` (`id_cargo`);

--
-- Índices de tabela `exames`
--
ALTER TABLE `exames`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_responsavel` (`id_responsavel`);

--
-- Índices de tabela `localizacoes`
--
ALTER TABLE `localizacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cliente` (`id_cliente`),
  ADD KEY `fk_funcionario` (`id_funcionario`),
  ADD KEY `fk_localizacao2` (`id_localizacao`);

--
-- Índices de tabela `suportes`
--
ALTER TABLE `suportes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cliente3` (`id_cliente`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf_unico` (`cpf`),
  ADD KEY `fk_localizacao` (`id_localizacao`),
  ADD KEY `fk_convenio` (`id_convenio`),
  ADD KEY `fk_cargo` (`id_cargo`),
  ADD KEY `fk_especialidade` (`id_especialidade`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `convenios`
--
ALTER TABLE `convenios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `exames`
--
ALTER TABLE `exames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `localizacoes`
--
ALTER TABLE `localizacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `suportes`
--
ALTER TABLE `suportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD CONSTRAINT `fk_cliente2` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_convenio1` FOREIGN KEY (`id_convenio`) REFERENCES `convenios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_exame` FOREIGN KEY (`id_exame`) REFERENCES `exames` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_funcionarios2` FOREIGN KEY (`id_funcionario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_localizacao3` FOREIGN KEY (`id_localizacao`) REFERENCES `localizacoes` (`id`);

--
-- Restrições para tabelas `especialidades`
--
ALTER TABLE `especialidades`
  ADD CONSTRAINT `fk_cargo1` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `exames`
--
ALTER TABLE `exames`
  ADD CONSTRAINT `fk_responsavel` FOREIGN KEY (`id_responsavel`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_localizacao2` FOREIGN KEY (`id_localizacao`) REFERENCES `localizacoes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `suportes`
--
ALTER TABLE `suportes`
  ADD CONSTRAINT `fk_cliente3` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_convenio` FOREIGN KEY (`id_convenio`) REFERENCES `convenios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_especialidade` FOREIGN KEY (`id_especialidade`) REFERENCES `especialidades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_localizacao` FOREIGN KEY (`id_localizacao`) REFERENCES `localizacoes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
